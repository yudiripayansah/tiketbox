<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8"><title>{{$dEmail->title}}</title>
    <link rel="shortcut icon" href="{{ url('assets/images/layout/logo-only.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('assets/plugin/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
  </head>
  <body>
    <table cellpadding="0" cellspacing="0" class="box-email ms-auto me-auto my-50 overflow-hidden br-tl-10 br-tr-10" style="background-color: #252525;border-top-left-radius: 10px;border-top-right-radius:10px;overflow:hidden;" width="800px">
      <tr>
        <td class="heading-email d-flex align-items-center justify-content-between p-20 bg-primary" style="background-color: #0D6EFD;padding: 20px;">
          <table  width="100%">
            <tr>
              <td width="30%">
                <img src="{{ asset('assets/images/auth/ticketboxlogo.png') }}" alt="">
              </td>
              <td class="text-light" width="70%" style="text-align: right;">
                <h1 class="fs-20 fw-700 text-light" style="color:white;font-size:20px;font-weight:700;margin:0;padding:0;">Ticket {{$dEmail->orders->items[0]->event_detail->name}}</h1>
                <h6 class="fs-12 fw-700" style="color:white;font-size:12px;font-weight:700;margin:0;padding:0;">Powered By : {{$dEmail->orders->items[0]->event_detail->powered_by}}</h6>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="subheading-email p-20 border-bottom border-primary d-flex justify-content-between align-items-start" style="padding: 20px;border-bottom: 1px solid #0D6EFD;">
          <table  width="100%">
            <tr>
              <td class="left wp-60 text-light" width="60%">
                <p class="d-flex align-items-center fs-12 fw-400" style="color:white;font-size:12px;font-weight:400;">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 me-10">
                    <g id="carbon:location-filled">
                    <path id="Vector" d="M8.83635 1.10938C7.22584 1.11129 5.68184 1.75575 4.54304 2.90139C3.40424 4.04703 2.76363 5.6003 2.76173 7.22049C2.7598 8.5445 3.1897 9.83259 3.98549 10.8872C3.98549 10.8872 4.15116 11.1066 4.17822 11.1383L8.83635 16.6649L13.4967 11.1355C13.521 11.106 13.6872 10.8872 13.6872 10.8872L13.6878 10.8855C14.4832 9.83138 14.9129 8.54389 14.911 7.22049C14.9091 5.6003 14.2685 4.04703 13.1297 2.90139C11.9909 1.75575 10.4469 1.11129 8.83635 1.10938ZM8.83635 9.44271C8.39946 9.44271 7.97238 9.31238 7.60912 9.06819C7.24586 8.82401 6.96273 8.47695 6.79554 8.07089C6.62835 7.66483 6.58461 7.21802 6.66984 6.78695C6.75507 6.35588 6.96546 5.95992 7.27438 5.64914C7.58331 5.33835 7.97691 5.12671 8.40541 5.04096C8.8339 4.95522 9.27805 4.99922 9.68168 5.16742C10.0853 5.33561 10.4303 5.62044 10.673 5.98589C10.9158 6.35133 11.0453 6.78097 11.0453 7.22049C11.0446 7.80963 10.8116 8.37443 10.3975 8.79102C9.98341 9.20761 9.42198 9.44197 8.83635 9.44271Z" fill="white"/>
                    </g>
                  </svg>              
                  {{$dEmail->orders->items[0]->event_detail->location_name}},
                  {{$dEmail->orders->items[0]->event_detail->location_address}},
                  {{$dEmail->orders->items[0]->event_detail->location_city}}
                </p>
                <p class="d-flex align-items-center fs-12 fw-400" style="color:white;font-size:12px;font-weight:400;">
                  <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 me-10">
                    <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                  </svg>                          
                  {{date('d F Y',strtotime($dEmail->orders->created_at))}}
                </p>
                <p class="d-flex align-items-center fs-12 fw-400" style="color:white;font-size:12px;font-weight:400;">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 me-10">
                    <g id="bxs:time">
                    <path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"/>
                    </g>
                  </svg>                          
                  {{date('H:i', strtotime($dEmail->orders->items[0]->event_detail->time_start))}} 
                  - 
                  {{date('H:i', strtotime($dEmail->orders->items[0]->event_detail->time_end))}} 
                  WIB
                </p>
                <p class="d-flex align-items-center fs-12 fw-400" style="color:white;font-size:12px;font-weight:400;">
                  <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 me-10">
                    <path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"/>
                  </svg>                           
                  {{count($dEmail->orders->items)}} Ticket
                </p>
              </td>
              <td class="right wp-30" width="30%">
                <img src="{{$dEmail->orders->items[0]->event_detail->images[0]->image_url }}" alt="" class="wp-100 br-10" style="width:200px;">
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="order-info p-20 border-bottom border-primary d-flex justify-content-between align-items-start flex-wrap" style="padding: 20px;border-bottom: 1px solid #0D6EFD;">
          <h2 class="mb-15 fs-20 fw-600 text-light wp-100 d-block" style="color:white;font-size:20px;font-weight:700;margin-bottom: 15px;padding:0;">Order Information</h2>
          @foreach($dEmail->orders->items as $items)
          <table  width="100%" style="margin-bottom: 25px">
            <tr>
              <td class="left wp-80 pe-25 text-light" width="80%" style="padding-right:25px;">
                <table class="row mb-25" style="margin-bottom: 25px;" width="100%">
                  <tr>
                    <td width="33%" style="padding-right: 15px;border-right:1px solid grey;" class="col border-end border-secondary">
                      <div class="mb-10" style="margin-bottom: 10px;">
                        <label class="fs-12 fw-400 d-block" style="color:white;font-size:12px;font-weight:400;display:block;width:100%">Name</label>
                        <span class="fs-12 fw-600" style="color:white;font-size:12px;font-weight:700;">{{ $dEmail->orders->name }}</span>
                      </div>
                      <div>
                        <label class="fs-12 fw-400 d-block" style="color:white;font-size:12px;font-weight:400;display:block;width:100%">Audience Date</label>
                        <span class="fs-12 fw-600" style="color:white;font-size:12px;font-weight:700;">{{ date('d F Y',strtotime($items->date)) }}</span>
                      </div>
                    </td>
                    <td width="33%" style="padding-right: 15px;padding-left:15px;border-right:1px solid grey;" class="col border-end border-secondary">
                      <div class="mb-10" style="margin-bottom: 10px;">
                        <label class="fs-12 fw-400 d-block" style="color:white;font-size:12px;font-weight:400;display:block;width:100%">Ticket Type</label>
                        <span class="fs-12 fw-600" style="color:white;font-size:12px;font-weight:700;">{{$items->ticket_detail->name}}</span>
                      </div>
                      <div>
                        <label class="fs-12 fw-400 d-block" style="color:white;font-size:12px;font-weight:400;display:block;width:100%">Nomor Ticket</label>
                        <span class="fs-12 fw-600" style="color:white;font-size:12px;font-weight:700;">{{'TXB-'.$items->id.'-'.date('dmY',strtotime($items->date))}}</span>
                      </div>
                    </td>
                    <td width="33%" style="padding-right: 15px;padding-left:15px;border-right:1px solid grey;" class="col">
                      <div class="mb-10" style="margin-bottom: 10px;">
                        <label class="fs-12 fw-400 d-block" style="color:white;font-size:12px;font-weight:400;display:block;width:100%">Nomor Kursi</label>
                        <span class="fs-12 fw-600" style="color:white;font-size:12px;font-weight:700;">{{$items->section}}-{{$items->row}}-{{$items->seat}}</span>
                      </div>
                      <div>
                        <label class="fs-12 fw-400 d-block" style="color:white;font-size:12px;font-weight:400;display:block;width:100%">Refferensi</label>
                        <span class="fs-12 fw-600" style="color:white;font-size:12px;font-weight:700;">Online</span>
                      </div>
                    </td>
                  </tr>
                </table>
                <div class="p-15 br-10" style="background-color:rgba(193, 193, 193, 0.40);padding:15px;border-radius:10px;">
                  <p class="m-0 p-0 list-unstyled" style="color:white;font-size:12px;font-weight:400;list-style:none;margin:0;padding:0">
                    {{$items->ticket_detail->description}}
                  </p>
                </div>
              </td>
              <td class="right wp-20 text-light" width="20%">
                <p class="text-center fs-12 fw-700 mb-10" style="color:white;font-size:12px;font-weight:700;text-align:center;">Tunjukan QR code di pintu login</p>
                @php 
                $qr = QrCode::size(150)->format('png')->generate('TXB-'.$items->id.'-'.date('dmY',strtotime($items->date)));
                @endphp
                <img src="{!!$message->embedData($qr, 'QrCode.png', 'image/png')!!}" alt="">
              </td>
            </tr>
          </table>
          @endforeach
        </td>
      </tr>
      <tr>
        <td class="order-toc p-20 text-light" style="padding: 20px;">
          <h2 class="mb-15 fs-20 fw-600 text-light wp-100 d-block" style="color:white;font-size:20px;font-weight:700;margin-bottom: 15px;">Terms & conditions</h2>
          <div class="fs-12 fw-400" style="color:white;font-size:12px;font-weight:400;">
            Ticket tidak perlu dicetak/print. Mohon untuk menyimpan ticket ini dalam versi pdf
            <p class="list-unstyled" style="list-style: none;margin:0;padding:0;">
              {!!$dEmail->orders->items[0]->event_detail->toc!!}
            </p>
          </div>
        </td>
      </tr>
      <tr>
        <td class="order-footer p-20 d-flex justify-content-between align-items-center text-light" style="background-color:black;padding:20px;">
          <table width="100%">
            <tr>
              <td class="left wp-40" width="40%">
                <img src="{{ url('assets/images/auth/ticketboxlogo.png') }}" alt="" class="h-30">
              </td>
              <td class="right fs-12 fw-400 d-flex justify-content-between wp-60" style="text-align: right;" width="60%">
                <a class="text-light" href="mailto:support@tiketbox.com" style="color:white;font-size:12px;font-weight:400;margin-right:25px;">support@tiketbox.com</a>
                <a class="text-light" href="https://wa.me/+628128882220" style="color:white;font-size:12px;font-weight:400;margin-right:25px;">+62 812 888 2220</a>
                <a class="text-light" href="https://instagram.com/ticketboxcom" style="color:white;font-size:12px;font-weight:400;">ticketboxcom</a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>