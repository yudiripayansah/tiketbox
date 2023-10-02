@extends('layout.layout')
@section('screen')
  <section id="bhome" class="backoffice">
    <!-- Title -->
    <div class="row boc-title align-items-center border-bottom border-primary g-0 position-sticky top-72 br-tl-10 br-tr-10">
      <div class="col-6">
        <div class="py-15 px-25 fw-700 fs-14 text-light">
          Buat Promo
        </div>
      </div>
      <div class="col-6 text-end">
        <div class="px-20 py-10">
          <a href="{{ url('/backoffice/promotion-and-voucher') }}" class="btn m-5 br-10 btn-sm btn-danger">
            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector" d="M18 5H3.83L7.41 1.41L6 0L0 6L6 12L7.41 10.59L3.83 7H18V5Z" fill="white"/>
            </svg>            
            Back
          </a>
          <button class="btn m-5 br-10 btn-sm btn-secondary" @click="dummyContent()">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="save">
              <path id="Vector" d="M12.5943 2.33301H3.70432C2.882 2.33301 2.22266 2.99976 2.22266 3.81467V14.1863C2.22266 15.0013 2.882 15.668 3.70432 15.668H14.076C14.8909 15.668 15.5577 15.0013 15.5577 14.1863V5.29634L12.5943 2.33301ZM14.076 14.1863H3.70432V3.81467H11.9794L14.076 5.91123V14.1863ZM8.89016 9.00051C7.66037 9.00051 6.66766 9.99323 6.66766 11.223C6.66766 12.4528 7.66037 13.4455 8.89016 13.4455C10.1199 13.4455 11.1127 12.4528 11.1127 11.223C11.1127 9.99323 10.1199 9.00051 8.89016 9.00051ZM4.44516 4.55551H11.1127V7.51884H4.44516V4.55551Z" fill="white"/>
              </g>
            </svg>                     
            Use Dummy
          </button>
          <button class="btn m-5 br-10 btn-sm btn-info" @click="doSave('draft')">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="save">
              <path id="Vector" d="M12.5943 2.33301H3.70432C2.882 2.33301 2.22266 2.99976 2.22266 3.81467V14.1863C2.22266 15.0013 2.882 15.668 3.70432 15.668H14.076C14.8909 15.668 15.5577 15.0013 15.5577 14.1863V5.29634L12.5943 2.33301ZM14.076 14.1863H3.70432V3.81467H11.9794L14.076 5.91123V14.1863ZM8.89016 9.00051C7.66037 9.00051 6.66766 9.99323 6.66766 11.223C6.66766 12.4528 7.66037 13.4455 8.89016 13.4455C10.1199 13.4455 11.1127 12.4528 11.1127 11.223C11.1127 9.99323 10.1199 9.00051 8.89016 9.00051ZM4.44516 4.55551H11.1127V7.51884H4.44516V4.55551Z" fill="white"/>
              </g>
            </svg>                     
            Draft
          </button>
          <button class="btn m-5 br-10 btn-sm btn-primary" @click="doSave('active')">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"/>
            </svg>                       
            Simpan
          </button>
        </div>
      </div>
    </div>
    <!-- Main Form -->
    <div class="boc-content px-45 py-35">
      <div class="row">
        <!-- Promo Target -->
        <div class="col-12 pb-25 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Pilih Event</label>
          <div class="d-flex justify-content-between align-items-center row">
            <div class="col-3">
              <div class="form-check wp-100">
                <input class="form-check-input" type="radio" value="all" id="event_target_all" name="event_target" v-model="form.data.event_target">
                <label class="form-check-label fs-16 fw-400 text-light" for="event_target_all">
                  All Event
                </label>
              </div>
            </div>
            <div class="col-3">
              <div class="form-check wp-100">
                <input class="form-check-input" type="radio" value="one" id="event_target_one" name="event_target" v-model="form.data.event_target">
                <label class="form-check-label fs-16 fw-400 text-light" for="event_target_one">
                  Event Tertentu
                </label>
              </div>
            </div>
            <div class="col-6">
              <select class="py-10 px-20 br-10 wp-100 border border-light max-w-480 fs-14 fw-400 text-light bg-transparent" v-model="form.data.target_event">
                <option :value="event.id" v-for="(event, index) in opt.event" :key="index" v-text="event.name">Aktif</option>
              </select>
            </div>
          </div>
        </div>
        <!-- Images -->
        <div class="col-12 py-25 border-bottom border-primary">
          <input type="file" @change="previewImage" multiple class="d-none" id="input-poster">
          <div id="event-banner-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ url('assets/images/events/bg-banner.png') }}" alt="" class="wp-100 img-fluid">
                <div class="carousel-caption left-0 right-0 top-0 bottom-0 d-flex align-items-center">
                  <label class="wp-100 position-relative image-poster cursor-pointer hp-100" for="input-poster">
                    <div class="d-flex flex-column align-items-center justify-content-center hp-100">
                      <svg width="80" height="63" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                      </svg>
                      <span class="fs-20 fw-600 text-light text-center max-w-350 mt-15">Upload Banner / Poster Event</span>
                      <span class="fs-12 fw-400 text-light text-center max-w-350">Rekomendasi ukuran 798px x 450px, bisa mengupload lebih dari satu gambar.</span>              
                    </div>
                  </label>
                </div>
              </div>
              <div class="carousel-item carousel-item-main" v-for="(poster, index) in images_clone" :key="index" v-show="!poster.deleted">
                <img :src="(poster.id) ? poster.image_url : poster " class="d-block wp-100" :alt="form.data.name">
                <div class="carousel-caption left-0 right-0 top-0 bottom-0 d-flex align-items-center flex-column">
                  <label class="wp-100 position-relative image-poster cursor-pointer hp-100" for="input-poster">
                    <div class="d-flex flex-column align-items-center justify-content-center hp-100">
                      <svg width="80" height="63" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                      </svg>
                      <span class="fs-20 fw-600 text-light text-center max-w-350 mt-15">Upload Banner / Poster Event</span>
                      <span class="fs-12 fw-400 text-light text-center max-w-350">Rekomendasi ukuran 798px x 450px, bisa mengupload lebih dari satu gambar.</span>              
                    </div>
                  </label>
                  <button class="btn btn-danger btn-sm" @click="deleteImage(index)">Hapus</button>
                </div>
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
        <!-- Promo Type -->
        <div class="col-12 py-25 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100 mb-15">Tipe Promo</label>
          <div class="row g-0">
            <div class="col-6">
              <div class="form-check wp-100">
                <input class="form-check-input" type="radio" value="Public" id="event_type_public" name="event_type" v-model="form.data.type">
                <label class="form-check-label fs-16 fw-400 text-light" for="event_type_public">
                  Public
                </label>
              </div>
              <p class="fs-16 fw-400 text-secondary mt-10">Promo bersifat publik akan muncul otomatis pada halaman promo.</p>
            </div>
            <div class="col-6">
              <div class="form-check wp-100">
                <input class="form-check-input" type="radio" value="Private" id="event_type_private" name="event_type" v-model="form.data.type">
                <label class="form-check-label fs-16 fw-400 text-light" for="event_type_private">
                  Private
                </label>
              </div>
              <p class="fs-16 fw-400 text-secondary mt-10">Promo bersifat tertutup calon audience akan melihat voucher code pada saat membeli.</p>
            </div>
          </div>
        </div>
        <!-- Promo Name -->
        <div class="col-6 py-25 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Promo Name</label>
          <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" v-model="form.data.name" placeholder="Eg: Promo Tahun Baru">
        </div>
        <!-- Promo Code -->
        <div class="col-6 py-25 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Promo Code</label>
          <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" v-model="form.data.code" placeholder="Eg: TahunBaruAsik">
        </div>
        <!-- Promo Quota -->
        <div class="col-6 py-25 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Kuota Pengguna</label>
          <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="Eg: 1000" :value="quota_val" @keyup="onChangeThousand('quota',event)" @keypress="NumbersOnly">
        </div>
        <!-- Promo Minimum Amount -->
        <div class="col-6 py-25 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Minimal Transaksi</label>
          <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="Eg: 10.000" :value="minimum_amount_val" @keyup="onChangeThousand('minimum_amount',event)" @keypress="NumbersOnly">
        </div>
        <!-- Promo Discount Type -->
        <div class="col-3 py-25 border-bottom border-primary">
          <label class="fs-20 mb-10 fw-600 text-light wp-100">Nilai Diskon</label>
          <select class="py-10 px-20 br-10 wp-100 border border-light max-w-480 fs-14 fw-400 text-light bg-transparent" v-model="form.data.discount_type">
            <option value="Persen & Rupiah">Persen & Rupiah</option>
            <option value="Persen">Persen</option>
            <option value="Rupiah">Rupiah</option>
          </select>
        </div>
        <!-- Promo Persen -->
        <div :class="(form.data.discount_type == 'Persen') ? 'col-6' : 'col-3'" class="py-25 border-bottom border-primary" v-if="form.data.discount_type != 'Rupiah'">
          <label class="fs-20 mb-10 fw-600 text-light wp-100">Persen</label>
          <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="%" :value="amount_percent_val" @keyup="onChangeThousand('amount_percent',event)" @keypress="NumbersOnly">
        </div>
        <!-- Promo Rupiah -->
        <div :class="(form.data.discount_type == 'Rupiah') ? 'col-6' : 'col-3'" class="py-25 border-bottom border-primary" v-if="form.data.discount_type != 'Persen'">
          <label class="fs-20 mb-10 fw-600 text-light wp-100">Rupiah</label>
          <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="Eg: 10.000" :value="amount_rupiah_val" @keyup="onChangeThousand('amount_rupiah',event)" @keypress="NumbersOnly">
        </div>
        <!-- Promo Maksimal Discount -->
        <div class="col-3 py-25 border-bottom border-primary">
          <label class="fs-20 mb-10 fw-600 text-light wp-100">Maksimal Discount</label>
          <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="Eg: 100.000" :value="maximum_discount_val" @keyup="onChangeThousand('maximum_discount',event)" @keypress="NumbersOnly">
        </div>
        <!-- Promo Details -->
        <div class="col-12 py-25 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Detail Promo</label>
          <div class="d-flex bg-secondary p-10 mt-15 br-tl-10 br-tr-10">
            <button class="nav-link fs-16 text-light fw-700">Terms & Condition</button>
          </div>
          <div class="tab-content br-br-10 br-bl-10 overflow-hidden">
            <div class="tab-pane fade show active">
              <ckeditor :editor="editor" v-model="form.data.description" :config="editorConfig"></ckeditor>
            </div>
          </div>
        </div>
        <!-- Promo Periode -->
        <div class="col-12 py-25 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100 mb-15">Periode Promo</label>
          <div class="row">
            <div class="col-3">
              <label class="fs-14 fw-400 text-light wp-100">Tanggal Mulai</label>
              <input type="date" class="border-0 bg-transparent py-10 text-light wp-100" v-model="form.data.date_start">
            </div>
            <div class="col-3">
              <label class="fs-14 fw-400 text-light wp-100">Tanggal Berakhir</label>
              <input type="date" class="border-0 bg-transparent py-10 text-light wp-100" v-model="form.data.date_end">
            </div>
            <div class="col-3">
              <label class="fs-14 fw-400 text-light wp-100">Waktu Mulai</label>
              <input type="time" class="border-0 bg-transparent py-10 text-light wp-100" v-model="form.data.time_start">
            </div>
            <div class="col-3">
              <label class="fs-14 fw-400 text-light wp-100">Waktu Berakhir</label>
              <input type="time" class="border-0 bg-transparent py-10 text-light wp-100" v-model="form.data.time_start">
            </div>
          </div>
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
  <p class="d-block text-end fs-14 fw-400 text-light mt-35 wp-100">Copyright © Tiketbox.com. All Copyright Protected</p>
@endsection
@section('script')
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script>
    Vue.use( CKEditor );
    const vueBhome = new Vue( {
      el: '#bhome',
      data: {
        detilForm: 'description',
        editor: ClassicEditor,
        editorConfig: {
            // The configuration of the editor.
        },
        form: {
          data: {
            _token:'{{ csrf_token() }}',
            event_target: 'all',
            target_event: null,
            name: null,
            code: null,
            type: null,
            quota: null,
            minimum_amount: null,
            discount_type: null,
            amount_percent: null,
            amount_rupiah: null,
            maximum_discount: null,
            description: null,
            date_start: null,
            date_end: null,
            time_start: null,
            time_end: null,
            status: null,
            images: [],
          }
        },
        images_clone: [],
        opt: {
          event: []
        },
        alert: {
          show: 'hide',
          bg: 'bg-primary',
          title: null,
          msg: null
        }
      },
      computed: {
        quota_val() {
          let value = this.thousand(this.form.data.quota)
          return value
        },
        minimum_amount_val() {
          let value = this.thousand(this.form.data.minimum_amount)
          return value
        },
        amount_percent_val() {
          let value = this.thousand(this.form.data.amount_percent)
          return value
        },
        amount_rupiah_val() {
          let value = this.thousand(this.form.data.amount_rupiah)
          return value
        },
        maximum_discount_val() {
          let value = this.thousand(this.form.data.maximum_discount)
          return value
        }
      },
      methods: {
        ...helper,
        async doGetEvent() {
          this.opt.event = []
          let payload = {
            perPage: '~',
            page: 1,
            sortBy: 'name',
            sortDir: 'ASC',
            search: null
          }
          payload.status = status
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readEvent(payload,token)
            let { status, msg, data, total, totalPage} = req.data
            if(status){
              data.map((item) => {
                this.opt.event.push(item)
              })
              this.notify('success','Success',msg)
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        async doGet() {
          try {
            let id = {{ $id }};
            if(id){
              let payload = {
                id: id
              }
              let token = 'abcdreUYBH&^*VHGY^&GY'
                let req = await tiketboxApi.getPromotion(payload,token)
                let { status, msg, data} = req.data
                if(status){
                  this.form.data = {...data}
                  this.form.data.event_target = (data.target_event > 0) ? "one": 'all'
                  this.images_clone = [...data.images]
                } else {
                  this.notify('error','Error',msg)
                }
              }
            } catch (error) {
            this.notify('error','Error',msg)
          }
        },
        onChangeThousand(target, e){
          this.form.data[target] = this.removeThousand(e.target.value);
        },
        async doSave(status) {
          this.notify('info','Processing','Menyimpan data...')
          let payload = {...this.form.data}
          payload.status = status
          payload.target_event = (payload.event_target == 'all') ? 0 : payload.target_event
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = {
              data : {
                status: false,
                msg: null,
                data: null
              }
            }
            if(payload.id) {
              req = await tiketboxApi.updatePromotion(payload,token)
            } else {
              req = await tiketboxApi.createPromotion(payload,token)
            }
            let { status, msg, data} = req.data
            if(status){
              this.notify('success','Success',msg)
              setTimeout(() => {
                window.location.href = '/backoffice/promotion-and-voucher'
              }, 1000)
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        deleteImage(idx){
          if(this.form.data.images[idx].id){
            this.form.data.images[idx].deleted = true
          } else {
            this.form.data.images.splice(idx,1)
          }
          this.images_clone.splice(idx,1)
        },
        previewImage(e) {
          let vm = this
          let inp = e.target
          let files = e.target.files
          for(let i = 0; i < files.length; i++) {
            let reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function () {
              vm.form.data.images.push(reader.result)
              vm.images_clone.push(reader.result)
              inp.type = 'text';
              inp.type = 'file';
            };
            reader.onerror = function () {
              inp.type = 'text';
              inp.type = 'file';
            };
          }
        },
        dummyContent() {
          let dummy = {
            _token:'{{ csrf_token() }}',
            event_target: 'all',
            target_event: 0,
            name: 'Promo Tahun Baru',
            code: 'TAHUNBARUPROMO',
            type: 'Public',
            quota: 1000,
            minimum_amount: 100000,
            discount_type: 'Persen & Rupiah',
            amount_percent: 10,
            amount_rupiah: 10000,
            maximum_discount: 15000,
            description: 'Deskripsi',
            date_start: '2023-01-01',
            date_end: '2024-01-01',
            time_start: '08:00',
            time_end: '18:00',
            status: null,
            images: [],
          }
          let formData = {...this.form.data}
          this.form.data = {...formData,...dummy}
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
        this.doGetEvent()
        this.doGet()
      }
    });
  </script>
@endsection
@section('styles')
  <style>
    .carousel-item-main .carousel-caption {
      background: rgba(0,0,0,.5);
      opacity: 0;
      transition: 500ms;
    }
    .carousel-item-main:hover .carousel-caption {
      opacity: 1;
    }
  </style>
@endsection