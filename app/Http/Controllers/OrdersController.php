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
use App\Models\User;
use App\Models\UserOrderData;
use App\Mail\TicketEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Hash;

class OrdersController extends Controller
{
  public function __construct() {
    $this->key = base64_encode('xnd_production_1J52v7LRH1FVxQ49EG3RrOR5S5gGGlrjZGQ7tJkfIzGshO31pqG4o1bKSJtON:');
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
      $getData->payment_description = json_decode($getData->payment_description);
      $getData->payment_expired = '1999-01-01 00:00:00';
      if($getData->payment_description) {
        if($getData->payment_description->expiry_date) {
          $getData->payment_expired = $getData->payment_description->expiry_date;
        }
      }
      if ($getData) {
          // $this->sendEmail($getData);
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
    $dataCreate['order_code'] = 'TXB-'.uniqid().'-'.date('ymdHi');
    $dataCreate['payment_method'] = 'none';
    $dataCreate['payment_status'] = 'UNPAID';
    $dataCreate['payment_description'] = 'none';
    $dataCreate['payment_date'] = '2999-01-01';
    $dataCreate['status'] = 'UNPAID';
    $dataCreate['description'] = '-';
    $invoice = $this->createInvoice($dataCreate);
    $user = $this->createUser($dataCreate);
    $dataCreate['payment_id'] = $invoice->id;
    $dataCreate['payment_description'] = json_encode($invoice);
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
    $dataFind = Orders::find($request->id);
    $validate = Orders::validate($dataUpdate);
    DB::beginTransaction();
    if ($validate['status']) {
      try {
        $du = Orders::where('id',$request->id)->update($dataUpdate);
        $dg = Orders::find($request->id);
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
  public function createInvoice($data) {
    $payload = '{
                  "external_id": "'.$data['order_code'].'",
                  "amount": '.$data['total_amount'].',
                  "payer_email": "'.$data['email'].'",
                  "description": "Invoice for Order: '.$data['order_code'].'"
                }';
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.xendit.co/v2/invoices',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $payload,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Basic '.$this->key,
        'Cookie: incap_ses_1111_2182539=ddBbQu6Aqy9K+q2UrRFrD/vr2mQAAAAAd87Vvw5K+eKHjNr/Zvp+cw==; nlbi_2182539=tnNwFS0AF1fIXumCtAof7AAAAADbZqEFEwbsGAFVNRT39an0'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }
  public function createUser($data) {
    $pass = uniqid();
    $dataCreate = [
      'username' => $data['name'].$pass,
      'email' => $data['email'],
      'name' => $data['name'],
      'password' => Hash::make($pass),
      'phone' => $data['phone'],
      'address' => $data['domicile'],
      'gender' => $data['gender'],
      'dob' => $data['dob'],
      'domicile' => $data['domicile'],
      'status' => 'active',
      'type' => 'user',
    ];
    $user = User::where('email',$data['email']);
    if(count($user->get()) < 1){
      $this->sendEmailWelcome($data['name'],$data['email'],$pass);
      $dc = User::create($dataCreate);
      $user = User::find($dc->id);
      $res = $dc;
    } else {
      $user = $user->first();
      $res = 'User already exist';
    }
    $orderData = UserOrderData::where('id_user',$user->id)
                ->where('email',$data['email'])
                ->where('name',$data['name'])
                ->where('phone',$data['phone'])->get();
    if(count($orderData) < 1) {
      $dataCreateOrderData = [
        'id_user' => $user->id,
        'email' => $data['email'],
        'phone' => $data['phone'],
        'name' => $data['name'],
        'gender' => $data['gender'],
        'dob' => date('Y-m-d',strtotime($data['dob'])),
        'domicile' => $data['domicile']
      ];
      $dcOd = UserOrderData::create($dataCreateOrderData);
    }
    return $res;
  }
  public function checkTicket(Request $request) {
    
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
    $mailInfo->cc = "ripayansahyudi@gmail.com";
    $mailInfo->bcc = "yudiripayansah@gmail.com";
    $mailInfo->from = "ticket@tiketbox.com";
    $mailInfo->title = 'E-Ticket from tiketbox.com';
    $mailInfo->orders = $order;
    Mail::to($order->email)
        ->send(new TicketEmail($mailInfo));
  }
  function sendEmailWelcome($name,$email,$password) {
    $mailInfo = new \stdClass();
    $mailInfo->recieverName = $name;
    $mailInfo->sender = "Tiketbox";
    $mailInfo->senderCompany = "Tiketbox.com";
    $mailInfo->to = $email;
    $mailInfo->subject = "Welcome to tiketbox.com";
    $mailInfo->name = "Tiketbox";
    $mailInfo->cc = "ripayansahyudi@gmail.com";
    $mailInfo->bcc = "yudiripayansah@gmail.com";
    $mailInfo->from = "info@tiketbox.com";
    $mailInfo->title = 'Welcome to tiketbox.com';
    $mailInfo->name = $name;
    $mailInfo->email = $email;
    $mailInfo->password = $password;
    Mail::to($email)
        ->send(new WelcomeEmail($mailInfo));
  }
}
