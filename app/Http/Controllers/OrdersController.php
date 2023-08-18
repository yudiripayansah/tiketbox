<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Events;
use App\Models\EventTickets;
use App\Models\EventTicketSeats;
use App\Models\EventImages;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Mail\TicketEmail;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrdersController extends Controller
{
  public function __construct() {
    
  }
  public function read(Request $request) {
    $page = ($request->page) ? $request->page : 1;
    $perPage = ($request->perPage) ? $request->perPage : '~';
    $offset = ($page > 1) ? ($page - 1) * $perPage : 0;
    $sortDir = ($request->sortDir) ? $request->sortDir : 'DESC';
    $sortBy = ($request->sortBy) ? $request->sortBy : 'updated_at';
    $search = ($request->search) ? $request->search : null;
    $total = 0;
    $totalPage = 1;
    $id_user = ($request->id_user) ? $request->id_user : null;
    $type = ($request->type) ? $request->type : null;
    $listData = Events::select('events.*')->orderBy($sortBy, $sortDir);
    if ($perPage != '~') {
        $listData->skip($offset)->take($perPage);
    }
    if ($search != null) {
        $listData->whereRaw('(events.name LIKE "%'.$search.'%")');
    }
    $listData = $listData->get();
    foreach($listData as $ld) {
      $images = EventImages::where('id_event', $ld->id)->get();
      $tickets = EventTickets::where('id_event', $ld->id)->get();
      foreach($tickets as $ticket){
        $ticket->seats = EventTicketSeats::where('id_ticket', $ticket->id)->get();
      }
      foreach($images as $image){
        $image->image_url = Storage::disk('public')->url('event/'.$image->image);
      }
      if(count($images) < 1){
        $images = (object) array(['image_url' => url('/assets/images/events/default.jpg')]);
      }
      $ld->images = $images;
      $ld->tickets = $tickets;
    }
    if ($search || $id_user || $type) {
        $total = Events::orderBy($sortBy, $sortDir);
        if ($search) {
            $total->whereRaw('(events.name LIKE "%'.$search.'%")');
        }
        $total = $total->count();
    } else {
        $total = Events::all()->count();
    }
    if ($perPage != '~') {
        $totalPage = ceil($total / $perPage);
    }
    $res = array(
        'status' => true,
        'data' => $listData,
        'msg' => 'List data available',
        'total' => $total,
        'totalPage' => $totalPage,
        'paging' => array(
          'page' => $page,
          'perPage' => $perPage,
          'sortDir' => $sortDir,
          'sortBy' => $sortBy,
          'search' => $search
        )
    );
    return response()->json($res, 200);
  }
  public function get(Request $request) {
    if ($request->id || $request->code) {
      if($request->id){
        $getData = Orders::find($request->id);
      } else {
        $getData = Orders::where('order_code', $request->code)->first();
      }
      $items = OrderItems::where('id_order', $getData->id)->get();
      foreach($items as $item) {
        $item->event_detail = Events::find($item->id_event);
        $item->event_detail->images = EventImages::where('id_event', $item->id_event)->get();
        foreach($item->event_detail->images as $image){
          $image->image_url = Storage::disk('public')->url('event/'.$image->image);
        }
        $item->ticket_detail = EventTickets::find($item->id_ticket);
        $item->seat_detail = EventTicketSeats::find($item->id_seat);
      }
      $getData->items = $items;
      $getData->qr = QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8');
      if ($getData) {
          $this->sendEmail($getData);
          $res = array(
                  'status' => true,
                  'data' => $getData,
                  'msg' => 'Data available'
                );
      } else {
          $res = array(
                  'status' => false,
                  'msg' => 'Data not found'
                );
      }
    } else {
      $res = array(
        'status' => false,
        'msg' => 'No data selected'
      );
    }
    return response()->json($res, 200);
  }
  public function create(Request $request) {
    $dataCreate = $request->all();
    $dataCreate['id_user'] = 0;
    $dataCreate['order_code'] = 'TXB-'.uniqid().'-'.date('ymdHi');
    $dataCreate['payment_method'] = 'default';
    $dataCreate['payment_status'] = 'default';
    $dataCreate['payment_description'] = 'default';
    $dataCreate['payment_date'] = '2999-01-01';
    $dataCreate['status'] = 'default';
    $dataCreate['description'] = 'default';
    unset($dataCreate['order_items']);
    DB::beginTransaction();
    $validate = Orders::validate($dataCreate);
    if ($validate['status']) {
      try {
        $dc = Orders::create($dataCreate);
        $this->handleItems($dc->id,$request->order_items);
        $dg = Orders::find($dc->id);
        $res = array(
                'status' => true,
                'data' => $dg,
                'msg' => 'Order successfully created'
              );
        DB::commit();
      } catch (Exception $e) {
        DB::rollback();
        $res = array(
                'status' => false,
                'data' => $dataCreate,
                'msg' => 'Failed to create data'
              );
      }
    } else {
      $res = array(
              'status' => false,
              'data' => $dataCreate,
              'msg' => 'Validation failed',
              'errors' => $validate['error']
            );
    }
    return response()->json($res, 200);
  }
  public function update(Request $request) {
    $dataUpdate = $request->all();
    $dataFind = Events::find($request->id);
    $validate = Promo::validate($dataUpdate);
    if (basename($request->powered_by_image) != basename($dataFind->powered_by_image)) {
      $filename = uniqid().time().'-'. '-event-powered-by.png';
      $filePath = 'event/' .$filename;
      $dataUpdate['powered_by_image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->powered_by_image));
    } else {
      unset($dataUpdate['powered_by_image']);
    }
    DB::beginTransaction();
    if ($validate['status']) {
      try {
        $du = Events::where('id',$request->id)->update($dataUpdate);
        $dg = Events::find($request->id);
        $res = array(
                'status' => true,
                'data' => $dg,
                'msg' => 'Data Successfully Saved'
              );
        DB::commit();
      } catch (Exception $e) {
        $res = array(
                'status' => false,
                'msg' => 'Failed to Save Data'
              );
        DB::rollback();
      }
    } else {
      $res = array(
        'status' => false,
        'data' => $request->all(),
        'msg' => 'Validation failed',
        'errors' => $validate['error']
      );
    }
    return response()->json($res, 200);
  }
  public function delete(Request $request) {
    $id = $request->id;
    if ($id) {
      $delData = Promo::find($id);
      try {
        $delData->delete();
        $res = array(
            'status' => true,
            'msg' => 'Data successfully deleted'
        );
      } catch (Exception $e) {
        $res = array(
                'status' => false,
                'msg' => 'Failed to delete Data'
              );
      }
    } else {
      $res = array(
              'status' => false,
              'msg' => 'No data selected'
            );
    }
    return response()->json($res, 200);
  }
  function handleItems($id_order,$items) {
    DB::beginTransaction();
    foreach($items as $item) {
      if(isset($item['id'])) {
        $doProcess = OrderItems::where('id',$item['id']);
        if($item['deleted']){
          $doProcess->delete();
        } else {
          $dataFind = $doProcess->first();
          $doProcess->update($item);
        }
      } else {
        $item['id_order'] = $id_order;
        $doProcess = OrderItems::create($item);
      }
      if($doProcess) {
        DB::commit();
      } else {
        DB::rollback();
        return false;
        break;
      }
    }
    return true;
  }
  function sendEmail($order) {
    $mailInfo = new \stdClass();
    $mailInfo->recieverName = $order->name;
    $mailInfo->sender = "Tiketbox";
    $mailInfo->senderCompany = "Tiketbox.com";
    $mailInfo->to = $order->email;
    $mailInfo->subject = "E-Ticket from tiketbox.com";
    $mailInfo->name = "Tiketbox";
    $mailInfo->cc = "tiket@tiketbox.com";
    $mailInfo->bcc = "crew@tiketbox.com";
    $mailInfo->from = "ticket@tiketbox.com";
    $mailInfo->title = 'E-Ticket from tiketbox.com';
    $mailInfo->orders = $order;
    Mail::to($order->email)
        ->send(new TicketEmail($mailInfo));
  }
}
