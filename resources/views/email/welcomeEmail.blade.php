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
                <h1 class="fs-20 fw-700 text-light" style="color:white;font-size:20px;font-weight:700;margin:0;padding:0;">Welcome {{$dEmail->name }}</h1>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="order-toc p-20 text-light" style="padding: 20px;">
          <h2 class="mb-15 fs-20 fw-600 text-light wp-100 d-block" style="color:white;font-size:20px;font-weight:700;margin-bottom: 15px;">Informasi akun</h2>
          <div class="fs-12 fw-400" style="color:white;font-size:12px;font-weight:400;">
            Berikut informasi akun anda
            <p class="list-unstyled" style="list-style: none;margin:0;padding:0;">
              Email: {!!$dEmail->email!!} <br>
              Password: {!!$dEmail->password!!}
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