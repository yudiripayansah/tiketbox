@extends('layout.layout')
@section('screen')
  <section id="blegal" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
    <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
      Legal Information
    </div>
    <div class="boc-content br-10 py-30 px-40 mt-25 text-light">
      <div class="fs-20 fw-700 d-flex align-items-center justify-content-start">
        <h3 class="m-0 text-light">Legal Information</h3>
        <h3 class="m-0 text-danger ms-15" v-if="form.data.status == 'PENDING'">Belum Diverifikasi</h3>
        <h3 class="m-0 text-success ms-15" v-if="form.data.status == 'APPROVED'">Terverifikasi</h3>
        <h3 class="m-0 text-danger ms-15" v-if="form.data.status == 'DECILINED'">Ditolak</h3>
      </div>
      <p class="fs-12 fw-400 mt-20">Dokumen yang sudah diunggah hanya dapat dichange dengan cara menghubungi tim kami. Hubungi kami.</p>
      <div style="background-color:#636363;" class="br-10 mt-30">
        <div class="row g-0 border-bottom border-dark">
          <div class="col-6">
            <h5 class="pt-25 pb-15 px-25 text-center fs-20 fw-700">Individu</h5>
          </div>
          <div class="col-6">
            <h5 class="pt-25 pb-15 px-25 text-center fs-20 fw-700">Badan Hukum</h5>
          </div>
        </div>
        <div class="row g-0">
          <div class="col-12 col-md-6 py-20 px-30">
            <div class="d-flex align-items-center justify-content-center br-10 min-h-130 overflow-hidden" style="background-color: rgba(5, 6, 7, 0.50);">
              <img :src="form.data.ktp_image" alt="" v-if="form.data.ktp_image" class="wp-100 img-fluid">
              <h5 class="fs-14 fw-700" v-else>Dokumen KTP</h5>
            </div>
            <div class="d-flex align-items-end justify-content-between mt-15 pb-15 border-bottom border-secondary">
              <div class="mx-wp-50 fs-12 fw-400">
                <span class="fw-600">Dokumen KTP</span>
                <p class="m-0 p-0" v-if="!form.data.status">Upload dokumen KTP, <br>
                max. 2MB</p>
              </div>
              <label for="ktp_image" class="btn btn-primary fs-12 fw-700"  v-if="!form.data.status">
                <input type="file" name="ktp_image" id="ktp_image" class="hide d-none" @change="previewImage(event)">
                <span class="me-10">
                  @include('svg.upload')
                </span>
                Upload KTP
              </label>
            </div>
            <div class="mt-15 pb-15 border-bottom border-secondary">
              <label for="" class="fs-12 fw-600">Nomor KTP</label>
              <input :disabled="(!form.data.status) ? false: true" type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" v-model="form.data.ktp_no" placeholder="Eg: 1234345678901122">
            </div>
            <div class="mt-15 pb-15 border-bottom border-secondary">
              <label for="" class="fs-12 fw-600">Name sesuai ( KTP )</label>
              <input :disabled="(!form.data.status) ? false: true" type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" v-model="form.data.ktp_name" placeholder="Eg: John Doe">
            </div>
            <div class="mt-15 pb-15 border-bottom border-secondary">
              <label for="" class="fs-12 fw-600">Alamat sesuai ( KTP )</label>
              <input :disabled="(!form.data.status) ? false: true" type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" v-model="form.data.ktp_address" placeholder="Eg: Jl. Bersih Kec. Cerah Kab. Indah 11234">
            </div>
          </div>
          <div class="col-12 col-md-6 py-20 px-30">
            <div class="d-flex align-items-center justify-content-center br-10 min-h-130 overflow-hidden" style="background-color: rgba(5, 6, 7, 0.50);">
              <img :src="form.data.npwp_image" alt="" v-if="form.data.npwp_image" class="wp-100 img-fluid">
              <h5 class="fs-14 fw-700" v-else>Dokumen NPWP</h5>
            </div>
            <div class="d-flex align-items-end justify-content-between mt-15 pb-15 border-bottom border-secondary">
              <div class="mx-wp-50 fs-12 fw-400">
                <span class="fw-600">Dokumen NPWP</span>
                <p class="m-0 p-0" v-if="!form.data.status">Upload dokumen NPWP, <br>
                max. 2MB</p>
              </div>
              <label for="npwp_image" class="btn btn-primary fs-12 fw-700" v-if="!form.data.status">
                <input type="file" name="npwp_image" id="npwp_image" class="hide d-none" @change="previewImage(event)">
                <span class="me-10">
                  @include('svg.upload')
                </span>
                Upload NPWP
              </label>
            </div>
            <div class="mt-15 pb-15 border-bottom border-secondary">
              <label for="" class="fs-12 fw-600">Nomor NPWP</label>
              <input :disabled="(!form.data.status) ? false: true" type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" v-model="form.data.npwp_no" placeholder="Eg: 1234345678901122">
            </div>
            <div class="mt-15 pb-15 border-bottom border-secondary">
              <label for="" class="fs-12 fw-600">Name sesuai ( NPWP )</label>
              <input :disabled="(!form.data.status) ? false: true" type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" v-model="form.data.npwp_name" placeholder="Eg: John Doe">
            </div>
            <div class="mt-15 pb-15 border-bottom border-secondary">
              <label for="" class="fs-12 fw-600">Alamat sesuai ( NPWP )</label>
              <input :disabled="(!form.data.status) ? false: true" type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" v-model="form.data.npwp_address" placeholder="Eg: Jl. Bersih Kec. Cerah Kab. Indah 11234">
            </div>
          </div>
        </div>
      </div>
      <div v-if="!form.data.status">
        <p class="fs-12 fw-400 mt-20">
          Harap perhatikan kesesuaian antara identitas pada KTP dan NPWP. Dalam hal terdapat ketidaksesuaian antara KTP dan NPWP, faktur tax akan diterbitkan sesuai dengan identitas pada NPWP. Dalam hal dokumen NPWP tidak diunggah, kamu dianggap tidak memiliki NPWP.
        </p>
        <div class="form-check mt-20">
          <input class="form-check-input" type="checkbox" value="yes" id="agreement" v-model="form.agreement">
          <label class="form-check-label fs-12 fw-400 text-light" for="agreement">
            Dengan ini saya menyatakan dengan sesungguhnya bahwa all informasi yang disampaikan dalam seluruh lampiran-lampirannya ini adalah benar adanya. Apabila diketemukan dan/atau dibuktikan adanya kesalahan/penipuan/pemalsuan atas informasi yang saya sampaikan PT. Eventori Media Semesta (Tiketbox.com) dibebaskan dari setiap akibat dari penggunaan data/dokumen tersebut.
          </label>
        </div>
        <button class="btn btn-primary mx-auto fs-16 fw-600 mt-25 px-40 d-block" @click="doSave()" :disabled="form.loading" v-text="(form.loading) ? 'Processing...' : 'Kirim Dokumen'">Kirim Dokumen</button>
      </div>
      <div class="mt-20" v-else>
        <p class="fs-14 fw-400 text-light text-center">Legalitas sedang dalam peninjauan tim terkait.</p>
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
@section('script')
<script src="{{ asset('assets/js/city.js') }}"></script>
<script>
  const vueBLegal = new Vue( {
    el: '#blegal',
    data: {
      form: {
        data: {
          id: null,
          id_user: null,
          ktp_image: null,
          ktp_name: null,
          ktp_no: null,
          ktp_address: null,
          npwp_image: null,
          npwp_name: null,
          npwp_no: null,
          npwp_address: null,
          type: null,
          status: 'PENDING',
        },
        agreement: false,
        loading: false
      },
      alert: {
        show: 'hide',
        bg: 'bg-primary',
        title: null,
        msg: null
      },
    },
    computed: {
      users() {
        return store.getters.users
      },
    },
    watch: {

    },
    methods: {
      async doSave() {
        this.notify('info','Processing','Menyimpan data...')
        let payload = {...this.form.data}
        payload.id_user = this.users.id
        let token = 'abcdreUYBH&^*VHGY^&GY'
        if(this.form.agreement){
          try {
            let req = {
              data : {
                status: false,
                msg: null,
                data: null
              }
            }
            if(payload.id) {
              req = await tiketboxApi.updateUserLegal(payload,token)
            } else {
              req = await tiketboxApi.createUserLegal(payload,token)
            }
            let { status, msg, data} = req.data
            if(status){
              this.notify('success','Success',msg)
              this.doUpdate(this.users.id)
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        } else {
          this.notify('error','Error','Silahkan centang syarat dan ketentuan.')
        }
      },
      async doUpdate(id_user) {
        try {
          if(id_user){
            let payload = {
              id_user: id_user
            }
            let token = 'abcdreUYBH&^*VHGY^&GY'
              let req = await tiketboxApi.getUserLegal(payload,token)
              let { status, msg, data} = req.data
              if(status){
                if(data) {
                  this.form.data = data
                }
              } else {
                // this.notify('error','Error',msg)
              }
            } else {
              this.notify('error','Error','No Data Selected')
            }
          } catch (error) {
            console.log(error)
          this.notify('error','Error',error.message)
        }
      },
      previewImage(e) {
        let vm = this
        let inp = e.target
        let target = inp.getAttribute('name')
        let files = e.target.files
        for(let i = 0; i < files.length; i++) {
          let reader = new FileReader();
          reader.readAsDataURL(files[i]);
          reader.onload = function () {
            vm.form.data[target] = reader.result
            inp.type = 'text';
            inp.type = 'file';
          };
          reader.onerror = function () {
            inp.type = 'text';
            inp.type = 'file';
          };
        }
      },
      clearForm() {
        this.form.data = {
          id: null,
          id_user: null,
          ktp_image: null,
          ktp_name: null,
          ktp_no: null,
          ktp_address: null,
          npwp_image: null,
          npwp_name: null,
          npwp_no: null,
          npwp_address: null,
          type: null,
          status: null,
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
      },
    },
    mounted() {
      this.doUpdate(this.users.id)
    },
  });
</script>
@endsection