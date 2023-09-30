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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class BackOfficeController extends Controller
{
  public function __construct(){
    
  }
  public function index() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/home',$data);
  }
  public function banner() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/banner',$data);
  }
  public function category() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/category',$data);
  }
  public function users() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/users',$data);
  }
  public function myEvents() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/myEvents',$data);
  }
  public function myEventsForm($id = 'null') {
    $data['menus'] = $this->adminMenu();
    $data['id'] = $id;
    return view('pages/backoffice/myEventsForm',$data);
  }
  public function pos() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/pos',$data);
  }
  public function posCheckout() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/posCheckout',$data);
  }
  public function posOrder($code) {
    $data['code'] = $code;
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/posOrder',$data);
  }
  public function promotion_and_voucher() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/promotion',$data);
  }
  public function promotion_and_voucher_form($id = 'null') {
    $data['menus'] = $this->adminMenu();
    $data['id'] = $id;
    return view('pages/backoffice/promotionForm',$data);
  }
  public function withdraw() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/withdraw',$data);
  }
  public function report() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/report',$data);
  }
  public function custom_form() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/custom-form',$data);
  }
  public function myTickets() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/myTickets',$data);
  }
  public function myTicketDetails() {
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
    $data['menus'] = $this->adminMenu();
    $data['myTicket'] = $orders;
    return view('pages/backoffice/myTicketDetails',$data);
  }
  public function explore() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/explore',$data);
  }
  public function referral() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/referral',$data);
  }
  public function profile() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/profile',$data);
  }
  public function legalInformation() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/legalInformation',$data);
  }
  public function bankAccount() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/bankAccount',$data);
  }
  public function password() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/password',$data);
  }
  public function orderData() {
    $data['menus'] = $this->adminMenu();
    return view('pages/backoffice/orderData',$data);
  }
  public function adminMenu() {
    $menuAdmin = [
      [
        'label' => 'Dashboard',
        'url' => url('/backoffice'),
        'icon' => 'dashboard'
      ],
      [
        'label' => 'Banner',
        'url' => url('/backoffice/banner'),
        'icon' => 'image'
      ],
      [
        'label' => 'Category',
        'url' => url('/backoffice/category'),
        'icon' => 'list'
      ],
      [
        'label' => 'Users',
        'url' => url('/backoffice/users'),
        'icon' => 'profile-cog'
      ],
      [
        'label' => 'Events/ Amusement Park',
        'url' => url('/backoffice/my-events'),
        'icon' => 'myevents'
      ],
      [
        'label' => 'POS',
        'url' => url('/backoffice/pos'),
        'icon' => 'pos'
      ],
      [
        'label' => 'Promotion/ Voucher',
        'url' => url('/backoffice/promotion-and-voucher'),
        'icon' => 'promotion'
      ],
      [
        'label' => 'Withdraw',
        'url' => url('/backoffice/withdraw'),
        'icon' => 'money'
      ],
      [
        'label' => 'Report',
        'url' => url('/backoffice/report'),
        'icon' => 'papper-roll'
      ],
      [
        'label' => 'Custom Form',
        'url' => url('/backoffice/custom-form'),
        'icon' => 'custom-form'
      ],
    ];
    $menuPromotor = [
      [
        'label' => 'Dashboard',
        'url' => url('/promotor'),
        'icon' => 'dashboard'
      ],
      [
        'label' => 'POS (Point Of Sales)',
        'url' => url('/promotor/pos'),
        'icon' => 'pos'
      ],
      [
        'label' => 'My Events',
        'url' => url('/promotor/my-events'),
        'icon' => 'myevents'
      ],
      [
        'label' => 'Promotion/ Voucher',
        'url' => url('/promotor/promotion-and-voucher'),
        'icon' => 'promotion'
      ],
      [
        'label' => 'Withdraw',
        'url' => url('/promotor/withdraw'),
        'icon' => 'money'
      ],
      [
        'label' => 'Report',
        'url' => url('/promotor/report'),
        'icon' => 'papper-roll'
      ],
      [
        'label' => 'Custom Form',
        'url' => url('/promotor/custom-form'),
        'icon' => 'custom-form'
      ],
    ];
    $menuPromotorBot = [
      [
        'label' => 'Profile',
        'url' => url('/promotor/profile'),
        'icon' => 'profile-cog'
      ],
      [
        'label' => 'Legal Information',
        'url' => url('/promotor/legal-information'),
        'icon' => 'scales'
      ],
      [
        'label' => 'Bank Account',
        'url' => url('/promotor/bank-account'),
        'icon' => 'credit-card'
      ],
      [
        'label' => 'Password',
        'url' => url('/promotor/password'),
        'icon' => 'lock'
      ],
    ];
    $menuAudience = [
      [
        'label' => 'My Tickets',
        'url' => url('/audience/my-tickets'),
        'icon' => 'ticket'
      ],
      [
        'label' => 'Explore',
        'url' => url('/category'),
        'icon' => 'explore'
      ],
      [
        'label' => 'Referral/ Commission',
        'url' => url('/audience/referral-and-commission'),
        'icon' => 'money'
      ]
    ];
    $menuAudienceBot = [
      [
        'label' => 'Profile',
        'url' => url('/audience/profile'),
        'icon' => 'profile-cog'
      ],
      [
        'label' => 'Order data',
        'url' => url('/audience/order-data'),
        'icon' => 'list'
      ],
      [
        'label' => 'Bank Account',
        'url' => url('/audience/bank-account'),
        'icon' => 'credit-card'
      ],
      [
        'label' => 'Password',
        'url' => url('/audience/password'),
        'icon' => 'lock'
      ],
    ];
    $menu = [
      'admin' => $menuAdmin,
      'promotor' => $menuPromotor,
      'promotorBot' => $menuPromotorBot,
      'audience' => $menuAudience,
      'audienceBot' => $menuAudienceBot,
    ];
    return $menu;
  }
}
