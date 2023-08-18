<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
