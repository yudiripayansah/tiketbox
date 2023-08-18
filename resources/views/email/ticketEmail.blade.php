<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8"><title>{{$mailMessage->title}}</title>
    <style>
      .box-wrapper {
        max-width: 550px;
        margin: 40px auto;
        display: block;
        padding: 20px;
      }
      .box-items {
        border: 1px solid #d8dce8;
        border-radius: 8px;
        padding: 24px;
      }
      .bb-1 {
        border-bottom: 1px solid #d8dce8
      }
      .bt-1 {
        border-top: 1px solid #d8dce8
      }
      .br-1 {
        border-right: 1px solid #d8dce8
      }
      .bl-1 {
        border-left: 1px solid #d8dce8
      }
      .pt-1 {
        padding-top: 5px;
      }
      .pt-2 {
        padding-top: 10px;
      }
      .pt-3 {
        padding-top: 15px;
      }
      .pt-4 {
        padding-top: 20px;
      }
      .pt-5 {
        padding-top: 25px;
      }
      .pb-1 {
        padding-bottom: 5px;
      }
      .pb-2 {
        padding-bottom: 10px;
      }
      .pb-3 {
        padding-bottom: 15px;
      }
      .pb-4 {
        padding-bottom: 20px;
      }
      .pb-5 {
        padding-bottom: 25px;
      }
      .pl-1 {
        padding-left: 5px;
      }
      .pl-2 {
        padding-left: 10px;
      }
      .pl-3 {
        padding-left: 15px;
      }
      .pl-4 {
        padding-left: 20px;
      }
      .pl-5 {
        padding-left: 25px;
      }
      .pr-1 {
        padding-right: 5px;
      }
      .pr-2 {
        padding-right: 10px;
      }
      .pr-3 {
        padding-right: 15px;
      }
      .pr-4 {
        padding-right: 20px;
      }
      .pr-5 {
        padding-right: 25px;
      }
      .mt-1 {
        margin-top: 5px;
      }
      .mt-2 {
        margin-top: 10px;
      }
      .mt-3 {
        margin-top: 15px;
      }
      .mt-4 {
        margin-top: 20px;
      }
      .mt-5 {
        margin-top: 25px;
      }
      .mb-1 {
        margin-bottom: 5px;
      }
      .mb-2 {
        margin-bottom: 10px;
      }
      .mb-3 {
        margin-bottom: 15px;
      }
      .mb-4 {
        margin-bottom: 20px;
      }
      .mb-5 {
        margin-bottom: 25px;
      }
      .ml-1 {
        margin-left: 5px;
      }
      .ml-2 {
        margin-left: 10px;
      }
      .ml-3 {
        margin-left: 15px;
      }
      .ml-4 {
        margin-left: 20px;
      }
      .ml-5 {
        margin-left: 25px;
      }
      .mr-1 {
        margin-right: 5px;
      }
      .mr-2 {
        margin-right: 10px;
      }
      .mr-3 {
        margin-right: 15px;
      }
      .mr-4 {
        margin-right: 20px;
      }
      .mr-5 {
        margin-right: 25px;
      }
    </style>
  </head>
  <body>
    <table>
      <tbody class="box-wrapper">
        <tr>
          <td>
            <img src="{!! $message->embedData(asset('assets\images\layout\ticketboxlogo.png'), 'logo.png') !!}" width="160">
          </td>
        </tr>
        <tr>
          <td class="pt-2 pb-2">
            Hai, {{$mailMessage->orders->name}},
            Hore! Pemesanan tiketmu sudah dikonfirmasi, Cek E-Ticketmu yang terlampir di email ini. 
          </td>
        </tr>
        <tr>
          <td class="box-items">
            <table width="100%">
              <tr>
                <td class="bb-1 pb-1">Order ID: {{$mailMessage->orders->order_code}}</td>
              </tr>
              @foreach($mailMessage->orders->items as $item)
              <tr>
                <td class="pt-1">
                  <h4>{{$item->event_detail->name}}</h4>
                  <h6>Tiket ID: TXB-{{$item->id}}-{{date('dmY',strtotime($item->date))}}</h6>
                  <h5>Section: {{$item->section}}</h5>
                  <h5>Row: {{$item->row}}</h5>
                  <h5>Seat: {{$item->seat}}</h5>
                </td>
              </tr>
              <tr>
                <td class="pb-1 pt-1 bb-1">
                  <img src="{!! $message->embedData(QrCode::size(150)->format('png')->generate('TXB-'.$item->id.'-'.date('dmY',strtotime($item->date))), 'qr.png') !!}" alt="">
                </td>
              </tr>
              @endforeach
              <tr>
                <td class="pt-2 pb-1 bb-1">
                  Tiketbox.com
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>