<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Events;
use App\Models\EventTickets;
use App\Models\EventTicketSeats;
use App\Models\EventImages;
use App\Mail\TicketEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
  public function __construct(){
    
  }
  public function index() {
    return view('pages/frontend/home');
  }
  public function promotions() {
    return view('pages/frontend/promotions');
  }
  public function events() {
    return view('pages/frontend/events');
  }
  public function event($id) {
    $data['id'] = $id;
    return view('pages/frontend/eventDetail',$data);
  }
  public function category($category = null) {
    $data['category'] = $category;
    return view('pages/frontend/events',$data);
  }
  public function search($search = null) {
    $data['search'] = $search;
    return view('pages/frontend/events',$data);
  }
  public function promotion($id) {
    $data['id'] = $id;
    return view('pages/frontend/promotionDetail',$data);
  }
  public function order($code) {
    $data['code'] = $code;
    return view('pages/frontend/order',$data);
  }
  public function checkout() {
    return view('pages/frontend/checkout');
  }
  public function login() {
    return view('pages/frontend/login');
  }
  public function email() {
    $orders = Orders::find(5);
    $items = OrderItems::where('id_order', $orders->id)->get();
    foreach($items as $item) {
      $item->event_detail = Events::find($item->id_event);
      $item->event_detail->images = EventImages::where('id_event', $item->id_event)->get();
      foreach($item->event_detail->images as $image){
        $image->image_url = Storage::disk('public')->url('event/'.$image->image);
      }
      $item->ticket_detail = EventTickets::find($item->id_ticket);
      $item->seat_detail = EventTicketSeats::find($item->id_seat);
    }
    $orders->items = $items;
    $orders->payment_description = json_decode($orders->payment_description);
    $orders->payment_expired = '1999-01-01 00:00:00';
    if($orders->payment_description) {
      if($orders->payment_description->expiry_date) {
        $orders->payment_expired = $orders->payment_description->expiry_date;
      }
    }
    $email = (object)array();
    $email->title = 'E-Ticket';
    $email->orders = $orders;
    $data['dEmail'] = $email;
    // return $this->sendEmail($orders);
    $this->sendEmailWelcome('Yudi','yudiripayansah@gmail.com','123');
    // return view('email/ticketEmail',$data);
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
  function sendEmailWelcome($name,$email,$password) {
    $mailInfo = new \stdClass();
    $mailInfo->recieverName = $name;
    $mailInfo->sender = "Tiketbox";
    $mailInfo->senderCompany = "Tiketbox.com";
    $mailInfo->to = $email;
    $mailInfo->subject = "Welcome to tiketbox.com";
    $mailInfo->name = "Tiketbox";
    $mailInfo->cc = "tiket@tiketbox.com";
    $mailInfo->bcc = "crew@tiketbox.com";
    $mailInfo->from = "ticket@tiketbox.com";
    $mailInfo->title = 'Welcome to tiketbox.com';
    $mailInfo->name = $name;
    $mailInfo->email = $email;
    $mailInfo->password = $password;
    Mail::to($email)
        ->send(new WelcomeEmail($mailInfo));
  }
}
