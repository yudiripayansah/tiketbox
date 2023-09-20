@extends('layout.layout')
@section('screen')
  <section id="promotion" class="mt-100">
    <div class="container">
      {{-- Banner --}}
      <div class="home-banner position-relative mb-30 br-10 overflow-hidden">
        <img src="{{ url('assets/images/promo/bannerpromo.png') }}" alt="" class="wp-100">
        
      </div>
      {{-- Category --}}
      <div class="home-category pb-50">
        <h1 class="fs-30 fw-700 text-light mb-30">Select Category</h1>
        <div class="row">
          <div class="col-4">
            <a href="#" class="d-flex align-items-center wp-100 hc-item text-decoration-none mb-30 p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-concert.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Concert</span>
            </a>
          </div>
          <div class="col-4">
            <a href="#" class="d-flex align-items-center wp-100 hc-item text-decoration-none mb-30 p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-attraction.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Attraction</span>
            </a>
          </div>
          <div class="col-4">
            <a href="#" class="d-flex align-items-center wp-100 hc-item text-decoration-none mb-30 p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-free-gift.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Free Gifts</span>
            </a>
          </div>
          <div class="col-4">
            <a href="#" class="d-flex align-items-center wp-100 hc-item text-decoration-none p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-sports.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Sports</span>
            </a>
          </div>
          <div class="col-4">
            <a href="#" class="d-flex align-items-center wp-100 hc-item text-decoration-none p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-amusement-park.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Amusement Park</span>
            </a>
          </div>
          <div class="col-4">
            <a href="#" class="d-flex align-items-center wp-100 hc-item text-decoration-none p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-all-categories.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">All Categories</span>
            </a>
          </div>
        </div>
      </div>
      {{-- Best Deals --}}
      <div class="home-popular">
        <div class="row">
          <a :href="`/promotion/${promotion.id}`" class="col-4" v-for="(promotion,index) in promotion" :key="index">
            <div class="hp-item position-relative mb-30 br-10 overflow-hidden">
              <img :src="promotion.images[0].image_url" alt="" class="wp-100 h-200 object-fit-cover">
              <div class="p-10">
                <h5 class="fs-16 fw-700 text-light" v-text="`${promotion.name}`"></h5>
                <div class="d-flex align-items-end justify-content-between">
                  <div class="text-light pe-20">
                    <div class="fs-12 d-block">
                      @include('svg.stop-watch')
                      <span class="ms-10" v-text="`${dateIndoShort(promotion.date_start)} - ${dateIndoShort(promotion.date_end)}`"></span>
                    </div>
                    <div class="fs-12 d-block mt-10">
                      @include('svg.percent')                        
                      <span class="ms-10" v-text="promotion.code"></span>
                    </div>
                  </div>
                  <div class="text-light ps-20">
                    <button class="btn btn-sm btn-primary">See Details</button>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- Toaster -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="liveToast" class="toast" :class="alert.show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" :class="alert.bg">
          <strong class="me-auto text-white" v-text="alert.title"></strong>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" v-text="alert.msg">
        </div>
      </div>
    </div>
  </section>
@endsection
@section('styles')
  
@endsection
@section('script')
  <script>
    const vuePromotion = new Vue( {
      el: '#promotion',
      data: {
        promotion: [],
        alert: {
          show: 'hide',
          bg: 'bg-primary',
          title: null,
          msg: null
        }
      },
      computed: {
        
      },
      methods: {
        ...helper,
        async doGet() {
          let payload = {
            perPage: 12,
            page: 1,
            sortDir: 'desc',
            sortBy: 'id',
            search: null
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readPromotion(payload,token)
            let { status, msg, data} = req.data
            if(status){
              this.promotion = data
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        notify(type,title,msg){
          let bg = 'bg-primary'
          switch (bg) {
            case 'error':
              bg = 'bg-danger'
              break;
            case 'success':
              bg = 'bg-success'
              break;
            case 'warning':
              bg = 'bg-warning'
              break;
            case 'info':
              bg = 'bg-info'
              break;
          }
          this.alert = {
            show: 'show',
            bg: bg,
            title: title,
            msg: msg
          }
          console.log(this.alert)
          setTimeout(() => {
            this.alert.show = 'hide'
          }, 2000);
        }
      },
      mounted() {
        this.doGet()
      }
    });
  </script>
@endsection