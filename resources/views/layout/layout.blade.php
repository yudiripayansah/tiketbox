<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tiketbox</title>
  <link rel="stylesheet" href="{{ url('assets/plugin/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/swiper/swiper.min.css') }}">
  <script src="{{ url('assets/plugin/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ url('assets/plugin/swiper/swiper.min.js') }}"></script>
  <script src="{{ url('assets/plugin/vue/vue.global.js') }}"></script>
  <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
  @yield('styles')
</head>
<body>
  @include('layout.header')
  @if(request()->segment(1) == 'backoffice')
    <section id="backoffice" class="mt-100">
      <div class="container">
        <div class="row">
          <div class="col col-sidemnu max-w-290">
            @include('layout.sidemenu')
          </div>
          <div class="col col-screen">
            @yield('screen')
          </div>
        </div>
      </div>
    </section>
  @else
    @yield('screen')
  @endif
  @if(request()->segment(1) != 'backoffice')
  @include('layout.footer')
  @endif
</body>
@yield('script')
</html>