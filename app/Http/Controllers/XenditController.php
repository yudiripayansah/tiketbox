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
}
