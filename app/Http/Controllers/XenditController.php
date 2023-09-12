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

class XenditController extends Controller
{
  public function __construct() {
    $this->key = base64_encode('xnd_production_1J52v7LRH1FVxQ49EG3RrOR5S5gGGlrjZGQ7tJkfIzGshO31pqG4o1bKSJtON:');
  }
  function createVA(Request $request) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.xendit.co/callback_virtual_accounts',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
      "external_id": "VA_fixed-1693571765",
      "bank_code": "'.$request->bank.'",
      "name": "Tiketbox",
      "virtual_account_number": "397681000001"
    }
    ',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Basic '.$this->key,
        'Cookie: incap_ses_7264_2182539=r0S2R/wWvVVFS4Tz8OnOZKbV8WQAAAAAAxg+MITBu4yPIa2uoEYItQ==; nlbi_2182539=66nFb9IwqzE6MAImtAof7AAAAADNMn5pXTs+SGstGV1+3HYb; nlbi_2182539_2037854=No4qQNkF0ivTjJOgtAof7AAAAABso6UkocycifOmjvZl8nhI'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $res = [
      'curl' => json_decode($response),
      'bank' => $request->bank
    ];
    echo json_encode($res);
  }
  function createQR(Request $request) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.xendit.co/qr_codes',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $request->postfields,
      CURLOPT_HTTPHEADER => array(
        'api-version: 2022-07-31',
        'Content-Type: application/json',
        'Authorization: Basic '.$this->key,
        'Cookie: incap_ses_1111_2182539=BNqYLDjmKV/DiZaTrRFrD5aT2WQAAAAAxwWHcqx+lbbJXft5UIC8/g==; nlbi_2182539=Ud0VFCET0wARpP6ttAof7AAAAAC78jIgp0DBgI6TOMKROC87'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }
  function createInvoice(Request $request) {
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
      CURLOPT_POSTFIELDS => $request->postfields,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Basic '.$this->key,
        'Cookie: incap_ses_1111_2182539=ddBbQu6Aqy9K+q2UrRFrD/vr2mQAAAAAd87Vvw5K+eKHjNr/Zvp+cw==; nlbi_2182539=tnNwFS0AF1fIXumCtAof7AAAAADbZqEFEwbsGAFVNRT39an0'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }
  function callbackInvoice(Request $request) {
    // "id": "579c8d61f23fa4ca35e52da4",
    // "external_id": "invoice_123124123",
    // "user_id": "5781d19b2e2385880609791c",
    // "is_high": true,
    // "payment_method": "BANK_TRANSFER",
    // "status": "PAID",
    // "merchant_name": "Xendit",
    // "amount": 50000,
    // "paid_amount": 50000,
    // "bank_code": "PERMATA",
    // "paid_at": "2016-10-12T08:15:03.404Z",
    // "payer_email": "wildan@xendit.co",
    // "description": "This is a description",
    // "adjusted_received_amount": 47500,
    // "fees_paid_amount": 0,
    // "updated": "2016-10-10T08:15:03.404Z",
    // "created": "2016-10-10T08:15:03.404Z",
    // "currency": "IDR",
    // "payment_channel": "PERMATA",
    // "payment_destination": "888888888888"
    try {
      $dataUpdate['payment_method'] = $request->payment_method;
      $dataUpdate['payment_status'] = $request->status;
      $dataUpdate['payment_description'] = json_encode($request->all());
      $dataUpdate['payment_date'] = date('Y-m-d',strtotime($request->paid_at));
      $dataUpdate['status'] = 'PAID';
      $dataUpdate['description'] = '-';
      $order = Orders::where('order_code',$request->external_id);
      // $order = Orders::where('order_code','TXB-64d9ae893abe0-2308140433');
      $doUpdate = $order->update($dataUpdate);
      $dataOrder = $order->first();
      $res = [
        'data' => $dataOrder,
        'status' => true,
        'msg' => 'Callback Invoice successfully recieved'
      ];
    } catch (\Throwable $th) {
      $res = [
        'data' => $th,
        'status' => false,
        'msg' => 'Callback Failed'
      ];
    }
    return response()->json($res, 200);
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
