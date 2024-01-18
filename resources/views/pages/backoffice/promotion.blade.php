@extends('layout.layout')
@section('screen')
  <section id="bpromotion" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
    <div class="boc-title py-15 px-25 fw-700 fs-14 text-light border-bottom border-primary d-flex justify-content-between align-items-center">
      <span>
        Promotion/ Voucher
      </span>
      <a href="{{ url('/'.request()->segment(1).'/promotion-and-voucher/form')}}" class="d-inline-flex align-items-center text-decoration-none" v-if="!list.loading">
        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path id="Vector" d="M12.1094 0C5.41992 0 0 5.41992 0 12.1094C0 18.7988 5.41992 24.2188 12.1094 24.2188C18.7988 24.2188 24.2188 18.7988 24.2188 12.1094C24.2188 5.41992 18.7988 0 12.1094 0ZM19.1406 13.4766C19.1406 13.7988 18.877 14.0625 18.5547 14.0625H14.0625V18.5547C14.0625 18.877 13.7988 19.1406 13.4766 19.1406H10.7422C10.4199 19.1406 10.1562 18.877 10.1562 18.5547V14.0625H5.66406C5.3418 14.0625 5.07812 13.7988 5.07812 13.4766V10.7422C5.07812 10.4199 5.3418 10.1562 5.66406 10.1562H10.1562V5.66406C10.1562 5.3418 10.4199 5.07812 10.7422 5.07812H13.4766C13.7988 5.07812 14.0625 5.3418 14.0625 5.66406V10.1562H18.5547C18.877 10.1562 19.1406 10.4199 19.1406 10.7422V13.4766Z" fill="#3E63F9"/>
        </svg>
        <span class="ms-10 fs-14 fw-500 text-light">
          Create Promo/ Voucher
        </span>
      </a>
    </div>
    <div class="boc-content">
      {{-- Filter --}}
      <div class="d-flex align-items-center py-15 px-25 border-bottom border-primary justify-content-between">
        <div class="bocc-search d-flex align-items-center py-10 px-20 br-10 wp-100 border border-light max-w-480">
          <input type="text" class="border-0 bg-transparent text-light fs-14 wp-100" placeholder="Search...">
          <button class="border-0 bg-transparent">
            <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20">
              <g id="Frame" opacity="0.5">
              <path id="Vector" d="M31.408 18.5622C31.408 21.1632 30.6345 23.7059 29.1853 25.8686C27.7361 28.0314 25.6762 29.7171 23.2662 30.7126C20.8562 31.7081 18.2043 31.9686 15.6458 31.4614C13.0873 30.9541 10.7371 29.7018 8.89232 27.8627C7.04759 26.0236 5.79119 23.6805 5.28198 21.1294C4.77278 18.5784 5.03364 15.9341 6.03158 13.5309C7.02952 11.1277 8.71972 9.07351 10.8885 7.62809C13.0572 6.18267 15.6071 5.41094 18.2157 5.41046C19.948 5.41015 21.6635 5.75009 23.264 6.41089C24.8645 7.07168 26.3189 8.04038 27.5439 9.26166C28.769 10.4829 29.7407 11.9329 30.4037 13.5287C31.0668 15.1245 31.408 16.8349 31.408 18.5622V18.5622Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
              <path id="Vector_2" d="M27.5459 27.8636L35.1778 35.4735" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
            </svg>                
          </button>
        </div>
        <div class="bocc-filter d-flex align-items-center">
          <span class="fs-14 fw-700 text-light me-15">
            Filter
          </span>
          <select name="" id="" class="py-10 px-20 br-10 wp-100 border border-light max-w-480 fs-14 fw-400 text-light bg-transparent">
            <option value="Aktif">Aktif</option>
          </select>
        </div>
      </div>
      <div class="px-25 py-15">
        {{-- List Promo --}}
        <div v-if="list.data.length > 0">
          <div class="d-flex p-15 br-8 mb-25 bg-blackchoco" v-for="(ld,idx) in list.data" :key="idx">
            <div class="el-image">
              <img :src="ld.images[0].image_url" alt="" class="wp-100 max-w-165 br-10">
            </div>
            <div class="el-content ps-15 wp-100">
              <div class="border-bottom border-primary pb-10 mb-10">
                <div class="d-flex align-items-center justify-content-between">
                  <h3 class="fw-700 fs-20 text-white" v-text="`${ld.name} - ${ld.code}`"></h3>
                  <div>
                    <a :href="`{{ url('/'.request()->segment(1).'/promotion-and-voucher/form/${ld.id}') }}`" class="btn br-10 btn-sm btn-info text-light">
                      @include('svg.edit')                    
                      Update
                    </a>
                    <a href="#" class="btn br-10 btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" @click="doDelete(ld.id,false)">
                      @include('svg.trash')                  
                      Hapus
                    </a>
                  </div>
                </div>
                <p class="fw-700 fs-12 m-0" :class="(ld.status == 'active') ? 'text-success':'text-danger'" v-text="ld.status"></p>
              </div>
              <div class="row wp-100 ">
                <div class="col">
                  <h6 class="fs-16 fw-600 text-white">Promo & Periode</h6>
                  <div>
                    @include('svg.ticket-star')
                    <span v-text="(ld.target_event > 0) ? `Event Tertentu` : `Semua Event`" class="text-white fs-12 fw-400 ms-10"></span>
                  </div>
                  <div>
                    @include('svg.eye')
                    <span v-text="ld.type" class="text-white fs-12 fw-400 ms-10"></span>
                  </div>
                </div>
                <div class="col">
                  <h6 class="fs-16 fw-600 text-white">Tanggal & Waktu</h6>
                  <div>
                    @include('svg.calendar')
                    <span v-text="`${dateIndo(ld.date_start)}-${dateIndo(ld.date_end)}`" class="text-white fs-12 fw-400 ms-10"></span>
                  </div>
                  <div>
                    @include('svg.time')
                    <span v-text="`${timeIndo(ld.date_start+' '+ld.time_start)}-${timeIndo(ld.date_start+' '+ld.time_end)}`" class="text-white fs-12 fw-400 ms-10"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- No Promo --}}
        <div class="d-flex flex-column align-items-center justify-content-center py-200" v-else>
          <div v-if="!list.loading">
            <h4 class="text-light text-center fs-20 fw-600 mb-15">Tidak ada Promo!</h4>
            <p class="text-light fs-12 fw-400 text-center">Buat kode promo untuk memberikan discount atau penawaran menarik pada eventmu.</p>
          </div>
          <div v-else>
            <h4 class="text-light text-center fs-20 fw-600 mb-15">Memuat Data...</h4>
            <p class="text-light fs-12 fw-400">Mohon tunggu sedang memuat data.</p>
          </div>
          <a href="{{ url('/'.request()->segment(1).'/promotion-and-voucher/form')}}" class="d-inline-flex align-items-center mt-45 text-decoration-none" v-if="!list.loading">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector" d="M12.1094 0C5.41992 0 0 5.41992 0 12.1094C0 18.7988 5.41992 24.2188 12.1094 24.2188C18.7988 24.2188 24.2188 18.7988 24.2188 12.1094C24.2188 5.41992 18.7988 0 12.1094 0ZM19.1406 13.4766C19.1406 13.7988 18.877 14.0625 18.5547 14.0625H14.0625V18.5547C14.0625 18.877 13.7988 19.1406 13.4766 19.1406H10.7422C10.4199 19.1406 10.1562 18.877 10.1562 18.5547V14.0625H5.66406C5.3418 14.0625 5.07812 13.7988 5.07812 13.4766V10.7422C5.07812 10.4199 5.3418 10.1562 5.66406 10.1562H10.1562V5.66406C10.1562 5.3418 10.4199 5.07812 10.7422 5.07812H13.4766C13.7988 5.07812 14.0625 5.3418 14.0625 5.66406V10.1562H18.5547C18.877 10.1562 19.1406 10.4199 19.1406 10.7422V13.4766Z" fill="#3E63F9"/>
            </svg>
            <span class="ms-10 fs-14 fw-500 text-light">
              Create Promo/ Voucher
            </span>
          </a>
        </div>
      </div>
    </div>
    {{-- Modal Delete --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-bg-black-choco max-w-400 modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom border-primary pt-30 pb-20 px-30 position-relative">
            <h5 class="modal-title text-center text-light fs-20 fw-600 wp-100" id="deleteModalLabel">Delete</h5>
            <button type="button" class="btn-close btn-close-white position-absolute right-30" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-30">
            <p class="text-center text-light fs-16 fw-400">
              Are you sure to delete this data ?
            </p>
          </div>
          <div class="modal-footer text-center justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary fs-16 fw-600 mx-5" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            <button type="button" class="btn btn-danger fs-16 fw-600 mx-5" data-bs-dismiss="modal" @click="doDelete(form.deleteId,true)">Delete</button>
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
<script>
  const vueBpromotion = new Vue( {
    el: '#bpromotion',
    data: {
      form: {
        deleteId: null
      },
      list: {
        data: [],
        total: 0,
        totalPage: 0,
        loading: false
      },
      paging: {
        perPage: 10,
        page: 1,
        sortDir: 'desc',
        sortBy: 'id',
        search: null,
        id_user: null,
      },
      alert: {
        show: 'hide',
        bg: 'bg-primary',
        title: null,
        msg: null
      }
    },
    computed: {
      users() {
        return store.getters.users
      },
    },
    methods: {
      ...helper,
      async doGet() {
        this.list.loading = true
        let payload = {...this.paging}
        if(this.users.type != 'admin'){
          payload.id_user = this.users.id
        }
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.readPromotion(payload,token)
          let { status, msg, data, total, totalPage} = req.data
          if(status){
            this.list.data = data
            this.list.total = total
            this.list.totalPage = totalPage
            this.notify('success','Success',msg)
          } else {
            this.notify('error','Error',msg)
          }
          this.list.loading = false
        } catch (error) {
          this.notify('error','Error',error.message)
          this.list.loading = false
        }
      },
      async doDelete(id,state) {
        if(state){
          try {
            if(id){
              let payload = {
                id: id
              }
              let token = 'abcdreUYBH&^*VHGY^&GY'
                let req = await tiketboxApi.deletePromotion(payload,token)
                let { status, msg, data} = req.data
                if(status){
                  this.notify('success','Success',msg)
                  this.doGet()
                } else {
                  this.notify('error','Error',msg)
                }
              } else {
                this.notify('error','Error','No Data Selected')
              }
            } catch (error) {
            this.notify('error','Error',msg)
          }
        } else {
          this.form.deleteId = id
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
      this.doGet()
      if(this.users.type == 'user') {
        window.location.href = "{{ url('/promotor') }}"
      }
    }
  });
</script>
@endsection