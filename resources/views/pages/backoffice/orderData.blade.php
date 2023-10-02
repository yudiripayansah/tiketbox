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
      <button class="btn btn-primary">Add Order Data</button>
    </div>
    <div class="bg-dark br-10 mt-25">
      <div class="d-flex justify-content-between align-items-start p-25 border-bottom border-primary">
        <h4 class="fs-20 fw-700 d-flex align-items-center">
          John Doe <small class="bg-primary p-5 br-10 fs-10 fw-600 ms-10">Primary</small>
        </h4>
        <button class="btn btn-secondary btn-sm">Update</button>
      </div>
      <div class="p-25 d-flex align-items-start justify-content-between">
        <div>
          <div class="d-flex align-items-center">
            <div class="icon-30 me-10">
              @include('svg.phone') 
            </div>
            <span class="fs-12 fw-400">+628123456789</span> 
          </div>
          <div class="d-flex align-items-center mt-10">
            <div class="icon-30 me-10">
              @include('svg.envelope') 
            </div>
            <span class="fs-12 fw-400">email@email.com</span> 
          </div>
        </div>
        <button class="bg-transparent border-0">
          @include('svg.trash')
        </button>
      </div>
    </div>
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
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Image</label>
                <label class="d-flex justify-content-center align-items-center bg-primary overflow-hidden br-6 cursor-pointer">
                  <img :src="form.data.image" v-if="form.data.image && form.data.image != 'default'" class="wp-100">
                  <svg v-else width="200" height="155" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto my-50">
                    <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                  </svg>
                  <input type="file" class="d-none" id="image_Category" @change="previewImage(event)">
                </label>
              </div>
            </div>
            <div class="col-8">
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Parent</label>
                <select class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.id_parent">
                  <option value="0">Main Category</option>
                  <option :value="c.id" v-text="c.name" v-for="(c,index) in opt.category" :key="index"></option>
                </select>
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">SVG Icon</label>
                <textarea rows="5" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.icon"></textarea>
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Name</label>
                <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.name">
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Description</label>
                <textarea rows="6" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.description"></textarea>
              </div>
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
        search: null
      },
      alert: {
        show: 'hide',
        bg: 'bg-primary',
        title: null,
        msg: null
      },
      opt: {
        category: []
      },
      modal: {
        delete: null,
        form: null
      }
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
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.readCategory(payload,token)
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
            req = await tiketboxApi.updateCategory(payload,token)
          } else {
            req = await tiketboxApi.createCategory(payload,token)
          }
          let { status, msg, data} = req.data
          if(status){
            this.notify('success','Success',msg)
            this.modal.form.hide()
            this.doGet()
            this.doGetParent()
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
              let req = await tiketboxApi.getCategory(payload,token)
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
                let req = await tiketboxApi.deleteCategory(payload,token)
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
    },
    mounted() {
      this.doGet()
      this.doGetParent()
    }
  });
</script>
@endsection