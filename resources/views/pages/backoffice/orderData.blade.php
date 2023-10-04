@extends('layout.layout')
@section('screen')
<section id="buserorderdata" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
  <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
    Order data
  </div>
  <div class="boc-content p-40 br-10 text-light">
    <h3 class="fs-20 fw-600">Let's save order data now!</h3>
    <div class="d-flex justify-content-between align-items-start mt-20">
      <p class="wp-100 max-wp-60 fs-12 fw-400">To be selected when ordering later so that the ordering process is faster and simpler. You can save a maximum of 5 profiles.</p>
      <button class="btn btn-primary" @click="modal.form.show();clearForm()">Add Order Data</button>
    </div>
    <div class="bg-dark br-10 mt-25" v-for="(ld,index) in list.data" :key="index" v-if="list.data.length > 0">
      <div class="d-flex justify-content-between align-items-start p-25 border-bottom border-primary">
        <h4 class="fs-20 fw-700 d-flex align-items-center" v-text="ld.name">
          <small class="bg-primary p-5 br-10 fs-10 fw-600 ms-10" v-if="ld.status == 'primary'">Primary</small>
        </h4>
        <button class="btn btn-secondary btn-sm" @click="doUpdate(ld.id)">Update</button>
      </div>
      <div class="p-25 d-flex align-items-start justify-content-between">
        <div>
          <div class="d-flex align-items-center">
            <div class="icon-30 me-10">
              @include('svg.phone') 
            </div>
            <span class="fs-12 fw-400" v-text="ld.phone"></span> 
          </div>
          <div class="d-flex align-items-center mt-10">
            <div class="icon-30 me-10">
              @include('svg.envelope') 
            </div>
            <span class="fs-12 fw-400" v-text="ld.email">email@email.com</span> 
          </div>
        </div>
        <button class="bg-transparent border-0" type="button" @click="doDelete(ld.id,false)">
          @include('svg.trash')
        </button>
      </div>
    </div>
    <div class="v-else"></div>
  </div>
  {{-- Modal Form --}}
  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-bg-black-choco max-w-1000 modal-lg">
      <div class="modal-content">
        <div class="modal-header border-bottom border-primary pt-30 pb-20 px-30 position-relative">
          <h5 class="modal-title text-center text-light fs-20 fw-600 wp-100" id="formModalLabel">Form</h5>
          <button type="button" class="btn-close btn-close-white position-absolute right-30" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-30 pt-40">
          <div class="border border-white p-30 br-6">
            <h4 class="fs-16 fw-600 text-white">Contact</h4>
            <div class="d-flex align-items-center border-bottom border-white pb-10">
              @include('svg.envelope')
              <input type="text" class="wp-100 bg-transparent border-0 ms-15 fs-18 fw-400 text-white" placeholder="example@tiketbox.com" v-model="form.data.email">
            </div>
            <div class="d-flex align-items-center border-bottom border-white pb-10 mt-30">
              @include('svg.phone')
              <input type="text" class="wp-100 bg-transparent border-0 ms-15 fs-18 fw-400 text-white" placeholder="+62 812 1234 5678" v-model="form.data.phone">
            </div>
          </div>
          <div class="border border-white p-30 br-6 d-flex flex-wrap mt-30">
            <h4 class="fs-16 fw-600 text-white wp-100">Personal Data</h4>
            <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap wp-100">   
              <label class="wp-100 fs-14 fw-400 text-white mb-15">Full Name</label>               
              <input type="text" class="wp-100 bg-transparent border-0 fs-18 fw-400 text-white" placeholder="John Doe" v-model="form.data.name">
            </div>
            <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap mt-30 wp-100">   
              <label class="wp-100 fs-14 fw-400 text-white mb-15">Nik</label>               
              <input type="text" class="wp-100 bg-transparent border-0 fs-18 fw-400 text-white" placeholder="Eg: 8765432378906655" v-model="form.data.nik">
            </div>
            <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap mt-30 wp-100">   
              <label class="wp-100 fs-14 fw-400 text-white mb-15">Gender</label>
              <div class="d-flex align-items-center">
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="Male" id="gender-male" v-model="form.data.gender">
                  <label class="form-check-label fs-16 fw-400 text-light" for="gender-male">
                    Male
                  </label>
                </div>
                <div class="form-check ms-15">
                  <input class="form-check-input" type="radio" value="Female" id="gender-female" v-model="form.data.gender">
                  <label class="form-check-label fs-16 fw-400 text-light" for="gender-female">
                    Female
                  </label>
                </div>
              </div>            
            </div>
            <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap mt-30 wp-48">   
              <label class="wp-100 fs-14 fw-400 text-white mb-15">Date of Birth</label>               
              <input type="date" class="flatpickr wp-100 bg-transparent border-0 fs-18 fw-400 text-white wp-100" placeholder="dd-mm-yyyy" v-model="form.data.dob">
            </div>
            <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap mt-30 wp-48 ms-auto">   
              <label class="wp-100 fs-14 fw-400 text-white mb-15">Domisili</label>       
              <input type="text" class="wp-100 bg-transparent border-0 fs-18 fw-400 text-white wp-100" placeholder="Eg: Jakarta" v-model="form.data.domicile" id="autoCompleteCity">        
            </div>
          </div>
        </div>
        <div class="modal-footer text-center justify-content-center pt-50 pb-45 border-top-0">
          <button type="button" class="btn btn-secondary fs-16 fw-600 mx-5" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          <button type="button" class="btn btn-primary fs-16 fw-600 mx-5" @click="doSave()">Save</button>
        </div>
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
@endsection
@section('script')
<script src="{{ asset('assets/js/city.js') }}"></script>
<script>
  const vueBUserOrderData = new Vue( {
    el: '#buserorderdata',
    data: {
      form: {
        data: {
          id: null,
          id_user: null,
          email: null,
          phone: null,
          name: null,
          nik: null,
          gender: null,
          dob: null,
          domicile: null,
          status: null,
        },
        deleteId: null,
        loading: false
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
        id_user: null
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
      async doGet() {
        this.list.loading = true
        let payload = {...this.paging}
        payload.id_user = this.users.id
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.readUserOrderData(payload,token)
          let { status, msg, data, total, totalPage} = req.data
          if(status){
            this.list.data = data
            this.list.total = total
            this.list.totalPage = totalPage
          } else {
            console.log(msg)
          }
          this.list.loading = false
        } catch (error) {
          console.log(error)
          this.list.loading = false
        }
      },
      async doSave() {
        this.notify('info','Processing','Menyimpan data...')
        let payload = {...this.form.data}
        payload.id_user = this.users.id
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
            req = await tiketboxApi.updateUserOrderData(payload,token)
          } else {
            req = await tiketboxApi.createUserOrderData(payload,token)
          }
          let { status, msg, data} = req.data
          if(status){
            this.notify('success','Success',msg)
            this.modal.form.hide()
            this.doGet()
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
              let req = await tiketboxApi.getUserOrderData(payload,token)
              let { status, msg, data} = req.data
              if(status){
                this.form.data = data
                this.modal.form.show()
              } else {
                this.notify('error','Error',msg)
              }
            } else {
              this.notify('error','Error','No Data Selected')
            }
          } catch (error) {
          this.notify('error','Error',msg)
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
                let req = await tiketboxApi.deleteUserOrderData(payload,token)
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
          this.modal.delete.show()
        }
      },
      previewImage(e) {
        let vm = this
        let inp = e.target
        let files = e.target.files
        for(let i = 0; i < files.length; i++) {
          let reader = new FileReader();
          reader.readAsDataURL(files[i]);
          reader.onload = function () {
            vm.form.data.image = reader.result
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
          email: null,
          phone: null,
          name: null,
          nik: null,
          gender: null,
          dob: null,
          domicile: null,
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
      initModal() {
        this.modal = {
          form: new bootstrap.Modal(document.getElementById('formModal')),
          delete: new bootstrap.Modal(document.getElementById('deleteModal'))
        }
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
      this.doGet()
      this.initModal()
      this.initDatePicker()
      this.initAutocomplete()
    },
  });
</script>
@endsection