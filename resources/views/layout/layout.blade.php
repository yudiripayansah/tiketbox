<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tiketbox.com | Unboxing Your Fun</title>
  <meta name="google-site-verification" content="JoWxNah5zXDDWjwqKwCL0eEFAmlFHKnTVMcn69g30w4" />
  <meta name="description"
    content="Tiketbox.com platform pembelian tiket konser, online seminar, pameran seni, pertandingan olahraga, tempat wisata, dengan berbagai opsi tiket & metode pembayaran yg aman, beli tiketmu sekarang.">
  <meta name="keywords"
    content="tiketbox, tiket konser, online seminar, pameran seni, pertandingan olahraga, tempat wisata">
  <meta name="author" content="@tiketbox">
  <meta name="robots" content="index, follow">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://tiketbox.com/">
  <meta property="og:title" content="Tiketbox.com | Unboxing Your Fun">
  <meta property="og:description"
    content="Tiketbox.com platform pembelian tiket konser, online seminar, pameran seni, pertandingan olahraga, tempat wisata, dengan berbagai opsi tiket & metode pembayaran yg aman, beli tiketmu sekarang.">
  <meta property="og:image" content="{{ url('assets/images/layout/logo-only.png') }}">
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ url('assets/images/layout/logo-only.png') }}">
  <meta property="twitter:title" content="Tiketbox.com | Unboxing Your Fun">
  <meta property="twitter:description"
    content="Tiketbox.com platform pembelian tiket konser, online seminar, pameran seni, pertandingan olahraga, tempat wisata, dengan berbagai opsi tiket & metode pembayaran yg aman, beli tiketmu sekarang.">
  <meta property="twitter:image" content="{{ url('assets/images/layout/logo-only.png') }}">
  <link rel="shortcut icon" href="{{ url('assets/images/layout/logo-only.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ url('assets/plugin/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/swiper/swiper.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/flatpickr/flatpickr.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/autocomplete/autocomplete.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/fontawesome/css/solid.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/fontawesome/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugin/fontawesome/css/brands.css') }}">
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
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-VMS51V75E3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-VMS51V75E3');
  </script>
  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MQ86SRQ');
  </script>
  <!-- End Google Tag Manager -->
  <!-- Meta Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '256787650363032');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=256787650363032&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
</head>

<body>
  @include('layout.header')
  @if(request()->segment(1) == 'backoffice' || request()->segment(1) == 'audience' || request()->segment(1) ==
  'promotor')
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
  @if(request()->segment(1) != 'backoffice' && request()->segment(1) != 'audience' && request()->segment(1) !=
  'promotor')
  @include('layout.footer')
  @endif
</body>
@yield('script')

</html>