@extends('layout.layout')
@section('screen')
  <section id="home" class="mt-100">
    <div class="container">
      {{-- Banner --}}
      <div class="home-banner position-relative mb-30 br-10 overflow-hidden">
        <img src="{{ url('assets/images/events/bg-banner.png') }}" alt="" class="wp-100 h-400" style="object-fit:cover;">
        <div class="position-absolute hb-caption text-light d-flex flex-column justify-content-center pe-35">
          <div class="d-flex align-items-center justify-content-between ps-35 flex-wrap">
            <h1 class="fw-700 fs-50 m-0">Discover</h1>
            <div class="hbc-input-search d-flex align-items-center ps-30 pe-30 br-20 mt-24">
              <input type="text" class="border-0 bg-transparent text-light fs-18" placeholder="Search..." v-model="paging.search">
              <button class="border-0 bg-transparent" @click="getPopular()">
                <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="Frame" opacity="0.5">
                  <path id="Vector" d="M31.408 18.5622C31.408 21.1632 30.6345 23.7059 29.1853 25.8686C27.7361 28.0314 25.6762 29.7171 23.2662 30.7126C20.8562 31.7081 18.2043 31.9686 15.6458 31.4614C13.0873 30.9541 10.7371 29.7018 8.89232 27.8627C7.04759 26.0236 5.79119 23.6805 5.28198 21.1294C4.77278 18.5784 5.03364 15.9341 6.03158 13.5309C7.02952 11.1277 8.71972 9.07351 10.8885 7.62809C13.0572 6.18267 15.6071 5.41094 18.2157 5.41046C19.948 5.41015 21.6635 5.75009 23.264 6.41089C24.8645 7.07168 26.3189 8.04038 27.5439 9.26166C28.769 10.4829 29.7407 11.9329 30.4037 13.5287C31.0668 15.1245 31.408 16.8349 31.408 18.5622V18.5622Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path id="Vector_2" d="M27.5459 27.8636L35.1778 35.4735" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                </svg>                
              </button>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center ps-35 mt-40 flex-wrap">
            <span class="fs-18 fw-400">Filter Based</span>
            <div class="d-flex sm-justify-content-between align-items-center mt-10 sm-mt-0 flex-wrap">
              <select class="bg-transparent border border-light br-10 p-15 mx-5 my-5 text-light" v-model="paging.city">
                <option value="" class="bg-transparent text-light">Location</option>
                <option :value="c" v-for="(c,index) in opt.city" v-text="c"></option>
              </select>
              <select class="bg-transparent border border-light br-10 p-15 mx-5 my-5 text-light" v-model="paging.category">
                <option value="" class="bg-transparent text-light">Kategori</option>
                <option :value="c" v-for="(c,index) in opt.category" v-text="c"></option>
              </select>
              {{-- <select class="bg-transparent border border-light br-10 p-15 mx-5 my-5 text-light">
                <option value="Waktu" class="bg-transparent text-light">Waktu</option>
              </select>
              <select class="bg-transparent border border-light br-10 p-15 mx-5 my-5 text-light">
                <option value="Harga" class="bg-transparent text-light">Harga</option>
              </select> --}}
              <select class="bg-transparent border border-light br-10 p-15 mx-5 my-5 text-light" v-model="paging.sort">
                <option value="id-desc" class="bg-transparent text-light">Urutkan</option>
                <option value="name-asc" class="bg-transparent text-light">Nama Event (A-Z)</option>
                <option value="name-desc" class="bg-transparent text-light">Nama Event (Z-A)</option>
                <option value="date_start-asc" class="bg-transparent text-light">Tanggal Event (A-Z)</option>
                <option value="date_start-desc" class="bg-transparent text-light">Tanggal Event (Z-A)</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      {{-- Popular --}}
      <div class="home-popular pb-20">
        <div class="row" v-if="popular.data.length > 0">
          <div class="col-12 text-end pb-25">
            <div class="fs-14 fw-400 text-light">Menampilkan <span v-text="paging.perPage"></span> dari total <span v-text="popular.total"></span> events</div>
          </div>
          <a :href="`/event/${item.id}`" class="col-6 col-sm-4 mb-30" v-for="(item,index) in popular.data" :key="index">
            <div class="hp-item position-relative br-10 overflow-hidden hp-100">
              <div class="hp-label br-bl-10 text-light position-absolute top-0 right-0 bg-primary p-10 fs-14 fw-700" v-text="item.category"></div>
              <img :src="item.images[0].image_url" alt="" class="wp-100 h-250 object-fit-cover hp-image">
              <div class="hp-content-box p-10 h-100 d-flex flex-column justify-content-between">
                <h5 class="fs-16 fw-700 text-light" v-text="`${item.name}`"></h5>
                <div class="d-flex align-items-end justify-content-between hp-details mt-auto">
                  <div class="text-light pe-20 hp-address-box wp-65">
                    <div class="fs-12 d-block hp-address">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
                        <g id="carbon:location-filled">
                        <path id="Vector" d="M8.8806 1.11304C7.27009 1.11495 5.72609 1.75941 4.58729 2.90505C3.44849 4.05069 2.80788 5.60397 2.80598 7.22415C2.80405 8.54816 3.23395 9.83625 4.02974 10.8908C4.02974 10.8908 4.19541 11.1103 4.22247 11.1419L8.8806 16.6686L13.5409 11.1391C13.5652 11.1097 13.7315 10.8908 13.7315 10.8908L13.732 10.8891C14.5274 9.83504 14.9571 8.54755 14.9552 7.22415C14.9533 5.60397 14.3127 4.05069 13.1739 2.90505C12.0351 1.75941 10.4911 1.11495 8.8806 1.11304ZM8.8806 9.44637C8.44371 9.44637 8.01663 9.31604 7.65337 9.07186C7.29011 8.82768 7.00698 8.48061 6.83979 8.07455C6.6726 7.6685 6.62886 7.22168 6.71409 6.79061C6.79932 6.35954 7.00971 5.96358 7.31864 5.6528C7.62756 5.34202 8.02116 5.13037 8.44966 5.04462C8.87815 4.95888 9.3223 5.00289 9.72593 5.17108C10.1296 5.33928 10.4746 5.6241 10.7173 5.98955C10.96 6.35499 11.0896 6.78463 11.0896 7.22415C11.0888 7.81329 10.8559 8.3781 10.4418 8.79468C10.0277 9.21127 9.46623 9.44563 8.8806 9.44637Z" fill="white"/>
                        </g>
                      </svg>
                      <span v-text="`${item.location_name}, ${item.location_city}`"></span>
                    </div>
                    <div class="fs-12 d-block" :data-type="item.type" v-if="item.type != 'amusement'">
                      <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
                        <g id="bx:bx-time-five">
                        <path id="Vector" d="M8.88039 2.37866C4.82034 2.37866 1.51721 5.70162 1.51721 9.78607C1.51721 13.8705 4.82034 17.1935 8.88039 17.1935C12.9405 17.1935 16.2436 13.8705 16.2436 9.78607C16.2436 5.70162 12.9405 2.37866 8.88039 2.37866ZM8.88039 15.712C5.63249 15.712 2.98985 13.0535 2.98985 9.78607C2.98985 6.51866 5.63249 3.86014 8.88039 3.86014C12.1283 3.86014 14.7709 6.51866 14.7709 9.78607C14.7709 13.0535 12.1283 15.712 8.88039 15.712Z" fill="white"/>
                        <path id="Vector_2" d="M9.6168 6.07788H8.14417V10.0883L10.5689 12.5275L11.61 11.4801L9.6168 9.47492V6.07788Z" fill="white"/>
                        </g>
                      </svg>                        
                      <span v-text="item.date_start"></span>
                    </div>
                  </div>
                  <div class="text-light ps-20 hp-price">
                    <span class="fs-12 d-block">Start From</span>
                    <label class="fs-16 fw-700 d-block m-0" v-text="`Rp ${thousand(item.tickets[0].price)}`"></label>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div v-else>
          <p class="text-center fs-20 fw-700 text-light">
            No Events available for this terms...
          </p>
        </div>
      </div>
    </div>
    <!-- Toaster -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
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
<style>
  @media screen and (max-width: 768px) {
    .hp-content-box {
      height: calc(100% - 150px) !important;
    }
    .home-banner .carousel-item img {
      height: 240px;
      object-fit: cover
    }
    .home-banner .hb-caption {
      padding: 0 15px !important;
    }
    .home-banner .hb-caption h1 {
      font-size: 28px;
    }
    .home-banner .hb-caption h6 {
      font-size: 16px;
    }
    .home-banner .hb-caption .hbc-input-search {
      height: 45px;
      padding: 0 15px !important;
      border-radius: 5px !important;
    }
    .home-banner .hb-caption .hbc-input-search input {
      font-size: 16px !important;
    }
    .home-banner .hb-caption .hbc-input-search button svg {
      width: 25px;
      height: 25px;
    }
    .home-banner .carousel-indicators {
      margin-bottom: 0;
    }
    .home-category > h1 {
      width: 100% !important;
      font-size: 20px !important;
      margin-bottom: 15px !important;
    }
    .home-category .hc-item {
      flex-direction: column !important;
    }
    .home-category .hc-item > span {
      margin-left: 0 !important;
      font-size: 14px;
      text-align: center;
      margin-top: 15px;
    }
    .home-best-deals > div > a {
      font-size: 16px !important;
    }
    .home-best-deals > div > h1 {
      font-size: 20px !important;
      margin-bottom: 15px !important;
      width: 80% !important;
    }
    .home-popular > div > a {
      font-size: 16px !important;
    }
    .home-popular > div > h1 {
      font-size: 20px !important;
      margin-bottom: 15px !important;
      width: 80% !important;
    }
    .home-popular .hp-details {
      flex-direction: column;
      align-items: flex-start !important;
    }
    .home-popular .hp-details > div {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }
    .home-popular .hp-price {
      margin-top: 5px;
    }
    .hp-image {
      height: 150px !important;
    }
    .hp-item h5 {
      max-height: 38px;
      overflow: hidden;
    }
    .hp-address {
      width: 100% !important;
      max-height: 35px;
      overflow: hidden;
    }
    .hp-address-box {
      width: 100% !important;
    }
    .home-place-best-deals > div > a {
      font-size: 16px !important;
    }
    .home-place-best-deals > div > h1 {
      font-size: 20px !important;
      margin-bottom: 15px !important;
      width: 80% !important;
    }
    .home-place-best-deals .hpbd-details {
      flex-direction: column;
      align-items: flex-start !important;
    }
    .home-place-best-deals .hpbd-details > div {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }
    .home-place-best-deals .hpbd-btn {
      margin-top: 15px;
    }
    .home-past-events > div > a {
      font-size: 16px !important;
    }
    .home-past-events > div > h1 {
      font-size: 20px !important;
      margin-bottom: 15px !important;
      width: 80% !important;
    }
    .home-past-events .hpe-details {
      flex-direction: column;
      align-items: flex-start !important;
    }
    .home-past-events .hpe-details > div {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }
    .home-past-events .hpe-price {
      margin-top: 15px;
    }
  }
  @media screen and (min-width: 1024px) {
    .hp-content-box {
      height: calc(100% - 250px) !important;
    }
  }
</style>  
@endsection
@section('script')
  <script>
    const homeBestDeals = new Swiper('.swiper-hbd', {
      // Optional parameters
      autoplay: true,
      delay: 2000,
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-next',
        prevEl: '.swiper-prev',
      },
    });
    const homePlaceBestDeals = new Swiper('.swiper-hpbd', {
      // Optional parameters
      autoplay: true,
      delay: 2000,
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-next',
        prevEl: '.swiper-prev',
      },
    });
  </script>
  <script>
    const vueHome = new Vue( {
      el: '#home',
      data: {
        popular: {
          data: [],
          total: 0,
          totalPage: 0
        },
        paging: {
          perPage: 12,
          page: 1,
          sort: 'id-desc',
          sortDir: 'desc',
          sortBy: 'id',
          search: '{{ (isset($search)) ? $search : "" }}',
          category: '{{ (isset($category) && $category != "All Categories") ? $category : "" }}',
          city: '{{ (isset($city) && $city != "All City") ? $city : "" }}',
        },
        bestDeals: [],
        alert: {
          show: 'hide',
          bg: 'bg-primary',
          title: null,
          msg: null
        },
        opt:  {
          category: ["Concert","Attraction","Free Gifts","Sports","Amusement Park","Exhibition","Talent Show"],
          city: []
        }
        
      },
      computed: {
        
      },
      watch: {
        paging: {
          handler(val) {
            this.getPopular();
          },
          deep: true,
        },
      },
      methods: {
        ...helper,
        async getPopular() {
          let payload = {...this.paging}
          let theSort = this.paging.sort.split('-')
          payload.sortBy = theSort[0]
          payload.sortDir = theSort[1]
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readEvent(payload,token)
            let { status, msg, data, total, totalPage} = req.data
            if(status){
              this.popular.data = data
              this.popular.total = total
              this.popular.totalPage = totalPage
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        async getBestDeals() {
          let payload = {
            perPage: 3,
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
              this.bestDeals = data
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        async doGetCity() {
          this.opt.city = []
          try {
            let payload = {

            }
            let req = await tiketboxApi.readCity(payload)
            if(req.status == 200) {
              let {data,msg,status} = req.data
              if(status) {
                data.map((item) => {
                  this.opt.city.push(item.city)
                })
              }
            }
          } catch (error) {
            this.form.loading = false
            console.log(error)
            this.notify('error','Error',error.message)
          }
        },
        initDatePicker() {
          flatpickr(".flatpickr", {
            minDate: 'today'
          });
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
        this.getPopular()
        this.doGetCity()
      }
    });
  </script>
@endsection