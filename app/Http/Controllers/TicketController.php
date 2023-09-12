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

class TicketController extends Controller
{
  public function __construct() {
    
  }
  public function check(Request $request) {
    try {
      $ticket = $request->ticket;
      if($ticket) {
        $idTicket = explode("-", $ticket);
        if($idTicket[1] && $idTicket[2]) {
          $year = substr($idTicket[2], -4);
          $month = substr($idTicket[2], -6,2);
          $day = substr($idTicket[2], -8,2);
          $date = $year.'-'.$month.'-'.$day;
          $dataTicket = OrderItems::where('id',$idTicket[1])->where('date',$date)->first();
          if($dataTicket) {
            $res = [
              'data' => $dataTicket,
              'status' => true,
              'msg' => 'Tiket ditemukan'
            ];
          } else {
            $res = [
              'status' => false,
              'msg' => 'Tiket tidak ditemukan'
            ];
          }
        } else {
          $res = [
            'status' => false,
            'msg' => 'Tiket tidak ditemukan'
          ];
        }
      } else {
        $res = [
          'status' => false,
          'msg' => 'Tiket tidak ditemukan'
        ];
      }
    } catch (\Throwable $th) {
      $res = [
        'status' => false,
        'msg' => $th
      ];
    }
    return response()->json($res, 200);
  }
  public function detail(Request $request) {
    try {
      $ticket = $request->id;
      if($ticket) {
        $dataTicket = OrderItems::find($ticket);
        $dataTicket->ticket_id = 'TXB-'.$dataTicket->id.'-'.date('dmY',strtotime($dataTicket->date));
        $dataTicket->event = Events::find($dataTicket->id_event);
        $dataTicket->ticket = EventTickets::find($dataTicket->id_ticket);
        $dataTicket->order = Orders::find($dataTicket->id_ticket);
        $dataTicket->event->images = EventImages::where('id_event', $dataTicket->id_event)->get();
        foreach($dataTicket->event->images as $image){
          $image->image_url = Storage::disk('public')->url('event/'.$image->image);
        }
        if($dataTicket) {
          $res = [
            'data' => $dataTicket,
            'status' => true,
            'msg' => 'Tiket ditemukan'
          ];
        } else {
          $res = [
            'status' => false,
            'msg' => 'Tiket tidak ditemukan'
          ];
        }
      } else {
        $res = [
          'status' => false,
          'msg' => 'Tiket tidak ditemukan'
        ];
      }
    } catch (\Throwable $th) {
      $res = [
        'status' => false,
        'msg' => $th
      ];
    }
    return response()->json($res, 200);
  }
  public function use(Request $request) {
    try {
      $id = $request->id;
      if($id) {
        $dataTicket = OrderItems::find($id);
        $dataTicket->status = 'USED';
        $dataTicket->updated_by = $request->id_user;
        $dataTicket->save();
        if($dataTicket->save()) {
          $res = [
            'data' => $dataTicket,
            'status' => true,
            'msg' => 'Ticket berhasil digunakan'
          ];
        } else {
          $res = [
            'status' => false,
            'msg' => 'Ticket gagal digunakan'
          ];
        }
      } else {
        $res = [
          'status' => false,
          'msg' => 'Tiket tidak ditemukan'
        ];
      }
    } catch (\Throwable $th) {
      $res = [
        'status' => false,
        'msg' => $th
      ];
    }
    return response()->json($res, 200);
  }
}
