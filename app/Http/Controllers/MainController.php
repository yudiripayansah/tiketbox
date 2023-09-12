<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Mail\TicketEmail;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
  public function __construct(){
    
  }
  public function index() {
    return view('pages/frontend/home');
  }
  public function event($id) {
    $data['id'] = $id;
    return view('pages/frontend/event',$data);
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
    $email = (object)array();
    $email->title = 'E-Ticket';
    $email->orders = $orders;
    $data['dEmail'] = $email;
    // $this->sendEmail($orders);
    return view('email/ticketEmail',$data);
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
