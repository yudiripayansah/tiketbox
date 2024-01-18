@extends('layout.layout')
@section('screen')
  <section id="bprofile" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
    <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
      Profile
    </div>
    <div class="boc-content mt-25 br-10 py-40 text-light" v-if="userType == 'audience'">
      <div class="px-40">
        <h3 class="fs-20 fw-600 m-0">Photo Profile</h3>
        <p class="fs-12 fw-400 mt-10">Your avatar and cover photo are the first images you will see on your account profile.</p>
        <div class="d-flex align-items-center mt-20">
          <div class="me-35">
            <img :src="form.data.image" alt="" class="w-120 h-120 object-fit-contain br-10">
          </div>
          <div class="text-light d-flex flex-column align-items-start">
            <span class="fs-12 fw-700">Photo Profile</span>
            <span class="fs-12 fw-400 mt-5">Use a maximum high-resolution square image of 1MB.</span>
            <label for="image" class="btn btn-primary fs-12 fw-700 mt-5">
              @include('svg.upload')
              Upload Photo
            </label>
            <input type="file" name="image" id="image" class="hide d-none" @change="previewImage(event)">
          </div>
        </div>
      </div>
      <div class="py-25 px-40 border-top border-primary mt-25">
        <label class="fs-20 fw-600 text-light mb-10">Full Name</label>
        <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.name" placeholder="Eg: John Doe">
      </div>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-10">Phone Number</label>
        <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.phone" placeholder="Eg: +6281234567890">
        <span class="fs-12 fw-400 mt-5 text-secondary">Untuk proses verifikasi pastikan terhubung dengan WhatsApp yang aktif.</span>
      </div>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-10">Email</label>
        <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.email" placeholder="Eg: email@email.com">
        <span class="fs-12 fw-400 mt-5 text-success">Verified</span>
      </div>
      <div class="py-25 px-40 text-center border-top border-primary">
        <button class="btn btn-primary py-15 px-40 fs-20 fw-600" :disabled="form.loading" v-text="(form.loading) ? 'Menyimpan...' : 'Simpan'" @click="doSave()"></button>
      </div>
    </div>
    <div class="boc-content mt-25 br-10 py-40 text-light" v-else>
      <div class="px-40">
        <h3 class="fs-20 fw-600 m-0">Photo Profile</h3>
        <p class="fs-12 fw-400 mt-10">Your avatar and cover photo are the first images you will see on your account profile.</p>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="d-flex align-items-center mt-20">
              <div class="me-35">
                <img :src="form.data.promotor_logo" alt="" class="w-120 h-120 object-fit-contain br-10">
              </div>
              <div class="text-light d-flex flex-column align-items-start">
                <span class="fs-12 fw-700">Logo Organizer</span>
                <span class="fs-12 fw-400 mt-5">Use a maximum high-resolution square image of 1MB.</span>
                <label for="promotor_logo" class="btn btn-primary fs-12 fw-700 mt-5">
                  @include('svg.upload')
                  Upload Photo
                </label>
                <input type="file" name="promotor_logo" id="promotor_logo" class="hide d-none" @change="previewImage(event)">
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="d-flex align-items-center mt-20">
              <div class="me-35">
                <img :src="form.data.promotor_banner" alt="" class="w-120 h-120 object-fit-contain br-10">
              </div>
              <div class="text-light d-flex flex-column align-items-start">
                <span class="fs-12 fw-700">Banner / Poster</span>
                <span class="fs-12 fw-400 mt-5">Use a maximum high-resolution square image of 1MB.</span>
                <label for="promotor_banner" class="btn btn-primary fs-12 fw-700 mt-5">
                  @include('svg.upload')
                  Upload Photo
                </label>
                <input type="file" name="promotor_banner" id="promotor_banner" class="hide d-none" @change="previewImage(event)">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="py-25 px-40 border-top border-primary mt-25">
        <div class="row">
          <div class="col-12 col-md-6">
            <label class="fs-20 fw-600 text-light mb-10">Organization Name</label>
            <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.promotor_name" placeholder="Eg: Tiketbox">
          </div>
          <div class="col-12 col-md-6">
            <label class="fs-20 fw-600 text-light mb-10">Short Link</label>
            <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.promotor_link" placeholder="Eg: https://tiketbox.com/p/tiketbox">
          </div>
        </div>
      </div>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-10">Phone</label>
        <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.promotor_phone" placeholder="Eg: +6281234567890">
      </div>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-10">Email</label>
        <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.promotor_email" placeholder="Eg: email@email.com">
      </div>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-10">Address</label>
        <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.promotor_address" placeholder="Eg: Jakarta">
      </div>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-10">About</label>
        <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.promotor_about" placeholder="Eg: email@email.com">
      </div>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-10">Social Media</label>
        <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" v-model="form.data.promotor_social_media" placeholder="Eg: @tiketbox">
      </div>
      <div class="py-25 px-40 text-center border-top border-primary">
        <button class="btn btn-primary py-15 px-40 fs-20 fw-600" :disabled="form.loading" v-text="(form.loading) ? 'Menyimpan...' : 'Simpan'" @click="doSave()"></button>
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
  const vueBUser = new Vue( {
    el: '#bprofile',
    data: {
      userType: '{{ request()->segment(1) }}',
      form: {
        data: {
          id: null,
          username: null,
          email: null,
          name: null,
          password: null,
          phone: null,
          image: null,
          address: null,
          gender: null,
          dob: null,
          domicile: null,
          status: null,
          type: null,
          promotor_logo: null,
          promotor_banner: null,
          promotor_name: null,
          promotor_link: null,
          promotor_phone: null,
          promotor_email: null,
          promotor_address: null,
          promotor_about: null,
          promotor_social_media: null,
        },
        deleteId: null,
        loading: false
      },
      alert: {
        show: 'hide',
        bg: 'bg-primary',
        title: null,
        msg: null
      },
      opt: {
        city: city
      },
      modal: {
        delete: null,
        form: null
      },
      autocomplete: {
        city: {
          el: null,
          config: {
            selector: "#autoCompleteCity",
            placeHolder: "Nama Kota/ Kabupaten...",
            data: {
              src: []
            },
            resultItem: {
              highlight: true,
            }
          }
        }
      },
    },
    computed: {
      users() {
        return store.getters.users
      },
    },
    watch: {
      paging: {
        handler(val) {
          this.doGet();
        },
        deep: true,
      },
    },
    methods: {
      async doSave() {
        this.notify('info','Processing','Menyimpan data...')
        let payload = {...this.form.data}
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
            req = await tiketboxApi.updateUser(payload,token)
          } else {
            req = await tiketboxApi.createUser(payload,token)
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
      },
      async doUpdate(id) {
        try {
          if(id){
            let payload = {
              id: id
            }
            let token = 'abcdreUYBH&^*VHGY^&GY'
              let req = await tiketboxApi.getUser(payload,token)
              let { status, msg, data} = req.data
              if(status){
                this.form.data = data
                this.form.data.image = (data.image) ? data.image : 'https://placehold.co/120x120'
                this.form.data.promotor_logo = (data.promotor_logo) ? data.promotor_logo : 'https://placehold.co/120x120'
                this.form.data.promotor_banner = (data.promotor_banner) ? data.promotor_banner : 'https://placehold.co/120x120'
              } else {
                this.notify('error','Error',msg)
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
        let files = e.target.files
        let target = inp.getAttribute('id')
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
          username: null,
          email: null,
          name: null,
          password: null,
          phone: null,
          image: null,
          address: null,
          gender: null,
          dob: null,
          domicile: null,
          status: null,
          type: null,
          promotor_logo: null,
          promotor_banner: null,
          promotor_name: null,
          promotor_link: null,
          promotor_phone: null,
          promotor_email: null,
          promotor_address: null,
          promotor_about: null,
          promotor_social_media: null,
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
      initDatePicker() {
        flatpickr(".flatpickr");
      },
      initAutocomplete() {
        this.autocomplete.city.config.data.src = []
        let cities = []
        this.opt.city.map((item) => {
          cities = [...cities, ...item.kota];
        })
        this.autocomplete.city.config.data.src = cities
        let vm = this
        document.querySelector("#autoCompleteCity").addEventListener("selection", function (event) {
            vm.form.data.domicile = event.detail.selection.value;
        });
        this.autocomplete.city.el = new autoComplete(this.autocomplete.city.config);
      },
    },
    mounted() {
      this.doUpdate(this.users.id)
      // this.initDatePicker()
      // this.initAutocomplete()
    },
  });
</script>
@endsection