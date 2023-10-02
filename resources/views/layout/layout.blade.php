<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tiketbox</title>
  <link rel="shortcut icon" href="{{ url('assets/images/layout/logo-only.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ url('assets/plugin/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/swiper/swiper.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/flatpickr/flatpickr.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/autocomplete/autocomplete.css') }}">
  <script>
    const apiBaseUrl = "{{ env('APP_URL') }}/api";
  </script>
  <script src="{{ url('assets/plugin/flatpickr/flatpickr.js') }}"></script>
  <script src="{{ url('assets/plugin/autocomplete/autocomplete.js') }}"></script>
  <script src="{{ url('assets/plugin/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ url('assets/plugin/swiper/swiper.min.js') }}"></script>
  <script src="{{ url('assets/plugin/vue/vue.global.js') }}"></script>
  <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
  @yield('styles')
  <script src="{{ url('assets/plugin/vue/vue.js') }}"></script>
  <script src="{{ url('assets/plugin/vuex/vuex.js') }}"></script>
  <script src="{{ url('assets/plugin/axios/axios.js') }}"></script>
  <script src="{{ url('assets/plugin/chart/chartjs.js') }}"></script>
  <script src="{{ url('assets/js/services.js') }}"></script>
  <script src="{{ url('assets/js/helper.js') }}"></script>
  <script src="{{ url('assets/js/store.js') }}"></script>
  <script src="{{ url('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
  <script src="{{ url('node_modules/@ckeditor/ckeditor5-vue2/dist/ckeditor.js') }}"></script>
</head>
<body>
  @include('layout.header')
  @if(request()->segment(1) == 'backoffice' || request()->segment(1) == 'audience' || request()->segment(1) == 'promotor')
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
  @if(request()->segment(1) != 'backoffice' && request()->segment(1) != 'audience' && request()->segment(1) != 'promotor')
  @include('layout.footer')
  @endif
</body>
@yield('script')
</html>