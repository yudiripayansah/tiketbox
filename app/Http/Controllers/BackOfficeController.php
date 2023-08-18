<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackOfficeController extends Controller
{
  public function __construct(){
    
  }
  public function index() {
    return view('pages/backoffice/home');
  }
  public function myEvents() {
    return view('pages/backoffice/myEvents');
  }
  public function myEventsForm() {
    return view('pages/backoffice/myEventsForm');
  }
}
