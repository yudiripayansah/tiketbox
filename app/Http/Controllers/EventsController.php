<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Events;
use App\Models\User;
use App\Models\EventTickets;
use App\Models\EventTicketSeats;
use App\Models\EventImages;

class EventsController extends Controller
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
    $filter = ($request->filter) ? $request->filter : null;
    $category = ($request->category) ? $request->category : null;
    $id_user = ($request->id_user) ? $request->id_user : null;
    $today = date('Y-m-d');
    $listData = Events::select('events.*')->orderBy($sortBy, $sortDir);
    if ($perPage != '~') {
      $listData->skip($offset)->take($perPage);
    }
    if ($search != null) {
      $listData->whereRaw('(events.name LIKE "%'.$search.'%" OR events.keyword LIKE "%'.$search.'%")');
    }
    if ($category != null) {
      $listData->where('category',$category);
    }
    if ($id_user != null) {
      $listData->where('id_user',$id_user);
    }
    if ($filter != null) {
      switch ($filter) {
        case 'popular':
          $listData->where('is_popular',1);
          break;
        case 'bestDeals':
          $listData->where('is_bestdeal',1);
          $listData->where('type','amusement');
          break;
        case 'upcoming':
          $listData->where('date_start','>=',$today);
          $listData->where('type','event');
          break;
        case 'past':
          $listData->where('date_end','<',$today);
          $listData->where('type','event');
          break;
      }
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
      if($ld->id_user){
        $creator = User::find($ld->id_user);
        $creator = $creator->name;
      } else {
        $creator = 'Tiketbox';
      }
      $ld->creator_name = $creator;
    }
    if ($search || $id_user || $type || $category || $filter) {
        $total = Events::orderBy($sortBy, $sortDir);
        if ($search) {
            $total->whereRaw('(events.name LIKE "%'.$search.'%" OR events.keyword LIKE "%'.$search.'%")');
        }
        if ($category) {
            $total->where('category',$category);
        }
        if ($id_user) {
            $total->where('id_user',$id_user);
        }
        if ($filter != null) {
          switch ($filter) {
            case 'popular':
              $total->where('is_popular',1);
              break;
            case 'bestDeals':
              $total->where('is_bestdeal',1);
              $total->where('type','amusement');
              break;
            case 'upcoming':
              $total->where('date_start','>=',$today);
              $total->where('type','event');
              break;
            case 'past':
              $total->where('date_end','<',$today);
              $total->where('type','event');
              break;
          }
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
    if ($request->id) {
      $getData = Events::find($request->id);
      $images = EventImages::where('id_event', $getData->id)->get();
      $tickets = EventTickets::where('id_event', $getData->id)->get();
      foreach($tickets as $ticket){
        $ticket->image = ($ticket->image && $ticket->image != 'default') ? Storage::disk('public')->url('event/'.$ticket->image) : null;
        $ticket->deleted = false;
        $ticket->seats = EventTicketSeats::where('id_ticket', $ticket->id)->get();
        $ticket->price_def = $ticket->price;
        foreach($ticket->seats as $seat){
          $seat->image = ($seat->image && $seat->image != 'default') ? Storage::disk('public')->url('event/'.$seat->image) : null;
          $seat->deleted = false;
        }
      }
      foreach($images as $image){
        $image->image_url = Storage::disk('public')->url('event/'.$image->image);
        $image->deleted = false;
      }
      $getData->images = $images;
      $getData->tickets = $tickets;
      $getData->holidate = ($getData->holidate) ? explode(',', $getData->holidate) : [];
      $getData->holiday = ($getData->holiday) ? explode(',', $getData->holiday) : [];
      if ($getData) {
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
    $dataCreate['form_order'] = implode(',',$dataCreate['form_order']);
    unset($dataCreate['images']);
    unset($dataCreate['ticket']);
    if($request->powered_by_image){
      $filename = uniqid().time().'-'. '-event-powered-by.png';
      $filePath = 'event/' .$filename;
      $dataCreate['powered_by_image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->powered_by_image));
    } else {
      $dataCreate['powered_by_image'] = null;
    }
    if($request->type != 'event'){
      $dataCreate['date_start'] = '2999-01-01';
      $dataCreate['date_end'] = '2999-01-01';
    }
    // DB::beginTransaction();
    $validate = Events::validate($dataCreate);
    if ($validate['status']) {
      try {
        $dc = Events::create($dataCreate);
        if($request->ticket){
          $this->handleTicket($dc->id,$request->ticket);
        }
        if($request->images){
          $this->handleImage($dc->id,$request->images);
        }
        $dg = Events::find($dc->id);
        $res = array(
                'status' => true,
                'data' => $dg,
                'msg' => 'Data successfully created'
              );
        // DB::commit();
      } catch (Exception $e) {
        // DB::rollback();
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
    $validate = Events::validate($dataUpdate);
    $dataUpdate['form_order'] = implode(',',$dataUpdate['form_order']);
    unset($dataUpdate['images']);
    unset($dataUpdate['ticket']);
    unset($dataUpdate['tickets']);
    unset($dataUpdate['created_at']);
    unset($dataUpdate['updated_at']);
    unset($dataUpdate['deleted']);
    if (basename($request->powered_by_image) != basename($dataFind->powered_by_image)) {
      $filename = uniqid().time().'-'. '-event-powered-by.png';
      $filePath = 'event/' .$filename;
      $dataUpdate['powered_by_image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->powered_by_image));
    } else {
      unset($dataUpdate['powered_by_image']);
    }
    // DB::beginTransaction();
    if ($validate['status']) {
      try {
        $du = Events::where('id',$request->id)->update($dataUpdate);
        $this->handleTicket($request->id,$request->ticket);
        $this->handleImage($request->id,$request->images);
        $dg = Events::find($request->id);
        $res = array(
                'status' => true,
                'data' => $dg,
                'update_status' => $du,
                'msg' => 'Data Successfully Saved'
              );
        // DB::commit();
      } catch (Exception $e) {
        $res = array(
                'status' => false,
                'msg' => 'Failed to Save Data'
              );
        // DB::rollback();
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
      $delData = Events::find($id);
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
  function handleTicket($id_event,$tickets) {
    // DB::beginTransaction();
    foreach($tickets as $ticket) {
      $seats = $ticket['seats'];
      unset($ticket['seats']);
      unset($ticket['price_def']);
      if(isset($ticket['id'])) {
        $doProcess = EventTickets::where('id',$ticket['id']);
        if($ticket['deleted']){
          $doProcess->delete();
        } else {
          $dataFind = $doProcess->first();
          if (basename($ticket['image']) != basename($dataFind->image)) {
            $filename = uniqid().time().'-'. '-event-ticket.png';
            $filePath = 'event/' .$filename;
            $ticket['image'] = $filename;
            Storage::disk('public')->put($filePath, file_get_contents($ticket['image']));
          } else {
            $ticket['image'] = null;
          }
          unset($ticket['seats']);
          unset($ticket['deleted']);
          unset($ticket['created_at']);
          unset($ticket['updated_at']);
          $doProcess->update($ticket);
        }
        $id_ticket = $ticket['id'];
      } else {
        if($ticket['image']) {
          $filename = uniqid().time().'-'.$id_event. '-event-ticket.png';
          $filePath = 'event/' .$filename;
          Storage::disk('public')->put($filePath, file_get_contents($ticket['image']));
          $ticket['image'] = $filename;
        } else {
          $ticket['image'] = null;
        }
        $ticket['id_event'] = $id_event;
        $ticket['status'] = 'active';
        $ticket['tax_amount'] = 5;
        $ticket['date_start'] = date('Y-m-d',strtotime($ticket['date_start']));
        $ticket['date_end'] = date('Y-m-d',strtotime($ticket['date_end']));
        $doProcess = EventTickets::create($ticket);
        $id_ticket = $doProcess->id;
      }
      if($doProcess) {
        if($seats){
          $this->handleSeat($id_event,$id_ticket,$seats);
        }
        // DB::commit();
      } else {
        // DB::rollback();
        // return false;
        break;
      }
    }
    return true;
  }
  function handleSeat($id_event,$id_ticket,$seats) {
    // DB::beginTransaction();
    foreach($seats as $seat) {
      if($seat['section']){
        $seat['price'] = ($seat['price']) ? $seat['price'] : 0;
        if(isset($seat['id'])) {
          $doProcess = EventTicketSeats::where('id',$seat['id']);
          if($seat['deleted']){
            $doProcess->delete();
          } else {
            $dataFind = $doProcess->first();
            if (basename($seat['image']) != basename($dataFind->image)) {
              $filename = uniqid().time().'-'. '-event-ticket-seat.png';
              $filePath = 'event/' .$filename;
              $seat['image'] = $filename;
              Storage::disk('public')->put($filePath, file_get_contents($seat['image']));
            } else {
              $seat['image'] = null;
            }
            unset($seat['deleted']);
            unset($seat['created_at']);
            unset($seat['updated_at']);
            $doProcess->update($seat);
          }
        } else {
          if($seat['image']) {
            $filename = uniqid().time().'-'.$id_event. '-event-ticket-seat.png';
            $filePath = 'event/' .$filename;
            Storage::disk('public')->put($filePath, file_get_contents($seat['image']));
            $seat['image'] = $filename;
          } else {
            $seat['image'] = null;
          }
          $seat['id_event'] = $id_event;
          $seat['id_ticket'] = $id_ticket;
          $seat['status'] = 'active';
          $doProcess = EventTicketSeats::create($seat);
        }
      } else {
        $doProcess = true;
      }
      if($doProcess) {
        // DB::commit();
      } else {
        // DB::rollback();
        // return false;
        break;
      }
    }
    return true;
  }
  function handleImage($id_event,$images) {
    // DB::beginTransaction();
    foreach($images as $image) {
      if(isset($image['id'])) {
        if($image['deleted']){
          EventImages::where('id',$image['id'])->delete();
        }
        $doProcess = true;
      } else {
        $filename = uniqid().time().'-'.$id_event. '-event.png';
        $filePath = 'event/' .$filename;
        Storage::disk('public')->put($filePath, file_get_contents($image));
        $cimage = [];
        $cimage['title'] = $filename;
        $cimage['id_event'] = $id_event;
        $cimage['image'] = $filename;
        $doProcess = EventImages::create($cimage);
      }
      if($doProcess) {
        // DB::commit();
      } else {
        // DB::rollback();
        // return false;
        break;
      }
    }
    return true;
  }
}
