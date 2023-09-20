@extends('layout.layout')
@section('screen')
  <section id="event" class="mt-100">
    <div class="container">
      <div class="event-slider">
        <div id="event-banner-carousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item carousel-item-main" v-for="(image,index) in promotion.images" :key="index" :class="(index == 0) ? 'active' : '' ">
              <img :src="image.image_url" class="wp-100 h-450 d-block" style="object-fit:contain;" alt="">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#event-banner-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#event-banner-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="event-details d-flex justify-content-between align-items-start mt-25 mb-50">
        <div class="ed-left wp-70 pe-25">
          <div class="fs-20 fw-700 text-light mt-40 mb-20 d-flex align-items-center text-primary fs-20">
            <a href="{{ url('/') }}" class="fs-20 fw-400 text-secondary me-10">Home</a> >
            <a href="{{ url('/promotion') }}" class="fs-20 fw-400 text-secondary me-10 ms-10">Promotion</a> >
            <span class="fs-20 fw-400 text-secondary me-10 ms-10">Detail</span>
          </div>
          <div class="ed-box br-tl-10 br-10" style="background-color:#252525;">
            <div class="edb-content py-40 px-50">
              <div v-html="promotion.description" class="text-white fs-20"></div>
            </div>
          </div>
        </div>
        <div class="ed-right wp-30">
          <h3 class="fs-20 fw-700 text-light mt-40 mb-20">Promotion Info</h3>
          <div class="edbc-orders br-tl-10 br-10" style="background-color:#252525;">
            <div class="edb-content p-20 text-light">
              <div class="mb-20">
                <div class="fs-16 fw-700 d-block wp-100">
                  @include('svg.stop-watch')
                  Promo Periode
                </div>
                <div class="fs-16 fw-400 mt-10 d-block">
                  <span v-text="dateIndo(promotion.date_start)"></span> - 
                  <span v-text="dateIndo(promotion.date_end)"></span>
                </div>
              </div>
              <div class="mb-20">
                <div class="fs-16 fw-700 d-block wp-100">
                  @include('svg.percent')
                  Voucher Code
                </div>
                <div class="fs-16 fw-400 pt-10 d-block">
                  <span v-text="promotion.code" class="p-10 br-5 d-inline-block" style="background-color: #929292;"></span>
                </div>
              </div>
              <div class="mb-20">
                <div class="fs-16 fw-400">
                  The minimum transaction for the promo above is IDR <span v-text="thousand(promotion.minimum_amount)"></span>
                </div>
              </div>
            </div>
          </div>
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
@section('script')
  <script>
    const vueEvent = new Vue( {
      store,
      el: '#event',
      data: {
        swiper: null,
        promotion: {
          images: [
            {
              image_url: null
            }
          ]
        },
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
        async detailPromotion() {
          let payload = {
            id: '{{ $id }}'
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.getPromotion(payload,token)
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
          switch (type) {
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
          setTimeout(() => {
            this.alert.show = 'hide'
          }, 2000);
        }
      },
      mounted() {
        this.detailPromotion()
      }
    });
  </script>
@endsection