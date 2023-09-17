@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 fw-700 fs-14 text-light border-bottom border-primary">
        My Events
      </div>
      <div class="boc-content">
        <div class="d-flex align-items-center py-15 px-25 border-bottom border-primary justify-content-between">
          <div class="bocc-search d-flex align-items-center py-10 px-20 br-10 wp-100 border border-light max-w-480">
            <input type="text" class="border-0 bg-transparent text-light fs-14 wp-100" placeholder="Search my events...">
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
          <div v-if="list.data.length > 0">
            <div class="d-flex p-15 br-8 mb-25 bg-blackchoco" v-for="(ld,idx) in list.data" :key="idx">
              <div class="el-image">
                <img :src="ld.images[0].image_url" alt="" class="wp-100 max-w-165 br-10">
              </div>
              <div class="el-content ps-15 wp-100">
                <div class="border-bottom border-primary pb-10 mb-10">
                  <div class="d-flex align-items-center justify-content-between">
                    <h3 class="fw-700 fs-20 text-white" v-text="`${ld.name} - ${ld.location_name}`"></h3>
                    <div>
                      <a :href="`{{ url('/backoffice/my-events/form/${ld.id}') }}`" class="btn br-10 btn-sm btn-info text-light">
                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"></path></svg>                       
                        Update
                      </a>
                      <a href="#" class="btn br-10 btn-sm btn-primary">
                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"></path></svg>                       
                        Detil
                      </a>
                    </div>
                  </div>
                  <p class="fw-700 fs-12 text-white m-0" v-text="ld.status"></p>
                </div>
                <div class="row wp-100 ">
                  <div class="col">
                    <h6 class="fs-16 fw-600 text-white">Kategori & Jenis</h6>
                    <div>
                      <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" d="M17.78 5.334V1.778C17.78 0.8001 16.9799 0 16.002 0H1.778C0.8001 0 0.00888999 0.8001 0.00888999 1.778V5.334C0.98679 5.334 1.778 6.1341 1.778 7.112C1.778 8.0899 0.98679 8.89 0 8.89V12.446C0 13.4239 0.8001 14.224 1.778 14.224H16.002C16.9799 14.224 17.78 13.4239 17.78 12.446V8.89C16.8021 8.89 16.002 8.0899 16.002 7.112C16.002 6.1341 16.8021 5.334 17.78 5.334ZM16.002 4.03606C14.9441 4.64947 14.224 5.80517 14.224 7.112C14.224 8.41883 14.9441 9.57453 16.002 10.1879V12.446H1.778V10.1879C2.83591 9.57453 3.556 8.41883 3.556 7.112C3.556 5.79628 2.8448 4.64947 1.78689 4.03606L1.778 1.778H16.002V4.03606ZM6.28523 10.668L8.89 8.99668L11.4948 10.668L10.7036 7.68096L13.095 5.72516L10.0101 5.53847L8.89 2.667L7.76097 5.52958L4.67614 5.71627L7.06755 7.67207L6.28523 10.668Z" fill="white"></path></svg>
                      <span v-text="`${ld.category}/${ld.category}`" class="text-white fs-12 fw-400 ms-10"></span>
                    </div>
                    <div>
                      <svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" d="M8.89 1.61636C11.953 1.61636 14.6847 3.33779 16.0182 6.06136C14.6847 8.78494 11.953 10.5064 8.89 10.5064C5.82699 10.5064 3.09534 8.78494 1.76184 6.06136C3.09534 3.33779 5.82699 1.61636 8.89 1.61636ZM8.89 0C4.84909 0 1.39815 2.51345 0 6.06136C1.39815 9.60928 4.84909 12.1227 8.89 12.1227C12.9309 12.1227 16.3818 9.60928 17.78 6.06136C16.3818 2.51345 12.9309 0 8.89 0ZM8.89 4.04091C10.0053 4.04091 10.9105 4.94607 10.9105 6.06136C10.9105 7.17665 10.0053 8.08182 8.89 8.08182C7.77471 8.08182 6.86955 7.17665 6.86955 6.06136C6.86955 4.94607 7.77471 4.04091 8.89 4.04091ZM8.89 2.42455C6.88571 2.42455 5.25318 4.05707 5.25318 6.06136C5.25318 8.06565 6.88571 9.69818 8.89 9.69818C10.8943 9.69818 12.5268 8.06565 12.5268 6.06136C12.5268 4.05707 10.8943 2.42455 8.89 2.42455Z" fill="white"></path></svg>
                      <span v-text="`${(ld.is_public) ? 'Public' : 'Private'}/${(ld.is_offline) ? 'Offline' : 'Online'}`" class="text-white fs-12 fw-400 ms-10"></span>
                    </div>
                  </div>
                  <div class="col">
                    <h6 class="fs-16 fw-600 text-white">Tanggal & Waktu</h6>
                    <div>
                      <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"></path></svg>
                      <span v-text="`${ld.date_start}`" class="text-white fs-12 fw-400 ms-10"></span>
                    </div>
                    <div>
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="bxs:time"><path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"></path></g></svg>
                      <span v-text="`${ld.time_start}-${ld.time_end}`" class="text-white fs-12 fw-400 ms-10"></span>
                    </div>
                  </div>
                  <div class="col">
                    <h6 class="fs-16 fw-600 text-white">Lokasi</h6>
                    <div>
                      <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" d="M11.6019 4.66706L12.0464 6.88956H1.73396L2.17846 4.66706H11.6019ZM12.8168 0.962891H0.96349V2.44456H12.8168V0.962891ZM12.8168 3.18539H0.96349L0.222656 6.88956V8.37122H0.96349V12.8162H8.37182V8.37122H11.3352V12.8162H12.8168V8.37122H13.5577V6.88956L12.8168 3.18539ZM2.44516 11.3346V8.37122H6.89016V11.3346H2.44516Z" fill="white"></path></svg>
                      <span v-text="`${ld.location_name}`" class="text-white fs-12 fw-400 ms-10"></span>
                    </div>
                    <div>
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="carbon:location-filled"><path id="Vector" d="M8.83635 1.10938C7.22584 1.11129 5.68184 1.75575 4.54304 2.90139C3.40424 4.04703 2.76363 5.6003 2.76173 7.22049C2.7598 8.5445 3.1897 9.83259 3.98549 10.8872C3.98549 10.8872 4.15116 11.1066 4.17822 11.1383L8.83635 16.6649L13.4967 11.1355C13.521 11.106 13.6872 10.8872 13.6872 10.8872L13.6878 10.8855C14.4832 9.83138 14.9129 8.54389 14.911 7.22049C14.9091 5.6003 14.2685 4.04703 13.1297 2.90139C11.9909 1.75575 10.4469 1.11129 8.83635 1.10938ZM8.83635 9.44271C8.39946 9.44271 7.97238 9.31238 7.60912 9.06819C7.24586 8.82401 6.96273 8.47695 6.79554 8.07089C6.62835 7.66483 6.58461 7.21802 6.66984 6.78695C6.75507 6.35588 6.96546 5.95992 7.27438 5.64914C7.58331 5.33835 7.97691 5.12671 8.40541 5.04096C8.8339 4.95522 9.27805 4.99922 9.68168 5.16742C10.0853 5.33561 10.4303 5.62044 10.673 5.98589C10.9158 6.35133 11.0453 6.78097 11.0453 7.22049C11.0446 7.80963 10.8116 8.37443 10.3975 8.79102C9.98341 9.20761 9.42198 9.44197 8.83635 9.44271Z" fill="white"></path></g></svg>
                      <span v-text="`${ld.location_city}`" class="text-white fs-12 fw-400 ms-10"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-center py-200" v-else>
            <div v-if="!list.loading">
              <h4 class="text-light text-center fs-20 fw-600 mb-15">Tidak ada Event!</h4>
              <p class="text-light fs-12 fw-400">Tidak ada event saat ini, untuk mulai memcreate events silahkan klik tombol dibawah ini untuk memulai.</p>
            </div>
            <div v-else>
              <h4 class="text-light text-center fs-20 fw-600 mb-15">Memuat Data...</h4>
              <p class="text-light fs-12 fw-400">Mohon tunggu sedang memuat data.</p>
            </div>
            <a href="{{ url('backoffice/my-events/form')}}" class="d-inline-flex align-items-center mt-45 text-decoration-none" v-if="!list.loading">
              <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="Vector" d="M12.1094 0C5.41992 0 0 5.41992 0 12.1094C0 18.7988 5.41992 24.2188 12.1094 24.2188C18.7988 24.2188 24.2188 18.7988 24.2188 12.1094C24.2188 5.41992 18.7988 0 12.1094 0ZM19.1406 13.4766C19.1406 13.7988 18.877 14.0625 18.5547 14.0625H14.0625V18.5547C14.0625 18.877 13.7988 19.1406 13.4766 19.1406H10.7422C10.4199 19.1406 10.1562 18.877 10.1562 18.5547V14.0625H5.66406C5.3418 14.0625 5.07812 13.7988 5.07812 13.4766V10.7422C5.07812 10.4199 5.3418 10.1562 5.66406 10.1562H10.1562V5.66406C10.1562 5.3418 10.4199 5.07812 10.7422 5.07812H13.4766C13.7988 5.07812 14.0625 5.3418 14.0625 5.66406V10.1562H18.5547C18.877 10.1562 19.1406 10.4199 19.1406 10.7422V13.4766Z" fill="#3E63F9"/>
              </svg>
              <span class="ms-10 fs-14 fw-500 text-light">
                Create Events
              </span>
            </a>
          </div>
        </div>
      </div>
  </section>
  <p class="d-block text-end fs-14 fw-400 text-light mt-35 wp-100">Copyright © Tiketbox.com. All Copyright Protected</p>
@endsection
@section('script')
<script>
  const vueBhome = new Vue( {
    el: '#bhome',
    data: {
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
        search: null
      },
      alert: {
        show: 'hide',
        bg: 'bg-primary',
        title: null,
        msg: null
      }
    },
    methods: {
      async doGet() {
        this.list.loading = true
        let payload = {...this.paging}
        payload.status = status
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.readEvent(payload,token)
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