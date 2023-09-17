@extends('layout.layout')
@section('screen')
  <section id="bUsers" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Users
      </div>
      {{-- Table --}}
      <div class="boc-content">
        {{-- Filter --}}
        <div class="d-flex align-items-center py-15 px-25 border-bottom border-primary justify-content-between">
          <div class="bocc-search d-flex align-items-center py-10 px-20 br-10 wp-100 border border-light max-w-480">
            <input type="text" class="border-0 bg-transparent text-light fs-14 wp-100" placeholder="Search..." v-model="paging.search">
            <button class="border-0 bg-transparent">
              <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20">
                <g id="Frame" opacity="0.5">
                <path id="Vector" d="M31.408 18.5622C31.408 21.1632 30.6345 23.7059 29.1853 25.8686C27.7361 28.0314 25.6762 29.7171 23.2662 30.7126C20.8562 31.7081 18.2043 31.9686 15.6458 31.4614C13.0873 30.9541 10.7371 29.7018 8.89232 27.8627C7.04759 26.0236 5.79119 23.6805 5.28198 21.1294C4.77278 18.5784 5.03364 15.9341 6.03158 13.5309C7.02952 11.1277 8.71972 9.07351 10.8885 7.62809C13.0572 6.18267 15.6071 5.41094 18.2157 5.41046C19.948 5.41015 21.6635 5.75009 23.264 6.41089C24.8645 7.07168 26.3189 8.04038 27.5439 9.26166C28.769 10.4829 29.7407 11.9329 30.4037 13.5287C31.0668 15.1245 31.408 16.8349 31.408 18.5622V18.5622Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path id="Vector_2" d="M27.5459 27.8636L35.1778 35.4735" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
              </svg>                
            </button>
          </div>
          <div class="bocc-button">
            <button class="btn btn-primary" id="btn-add" data-bs-toggle="modal" data-bs-target="#formModal" @click="clearForm()">Add New</button>
          </div>
        </div>
        {{-- Main Table --}}
        <div class="d-flex align-items-center py-15 px-25 border-bottom border-primary justify-content-between">
          <table class="table table-bordered table-stripped table-dark table-sm">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Type</th>
                <th class="text-center"></th>
              </tr>
              <tr v-if="list.data.length < 1">
                <td colspan="7" class="text-center">No data available</td>
              </tr>
              <tr v-else v-for="(d,index) in list.data" :key="index">
                <td class="text-center" v-text="(paging.perPage * (paging.page-1))+(index+1)"></td>
                <td v-text="d.name"></td>
                <td v-text="d.email"></td>
                <td v-text="d.phone"></td>
                <td v-text="d.gender"></td>
                <td v-text="d.type"></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"  @click="doDelete(d.id,false)">
                    @include('svg.trash')
                  </button>
                  <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#formModal" @click="doUpdate(d.id)">
                    @include('svg.edit')
                  </button>
                </td>
              </tr>
            </thead>
          </table>
        </div>
        {{-- Paging --}}
        <div class="d-flex align-items-center py-15 px-25 border-bottom border-primary justify-content-between">
          <div class="bocc-filter d-flex align-items-center">
            <span class="fs-14 fw-700 text-light me-15">
              Show
            </span>
            <select name="" id="" class="py-10 px-20 br-10 wp-100 border border-light max-w-480 fs-14 fw-400 text-light bg-transparent" v-model="paging.perPage">
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="50">50</option>
              <option value="100">100</option>
            </select>
          </div>
          <div class="bocc-paging">
            <nav aria-label="...">
              <ul class="pagination mb-0">
                <li class="page-item" v-if="paging.page > 1">
                  <a href="#" class="page-link">Previous</a>
                </li>
                <li class="page-item" v-for="i in list.totalPage" :key="i" :class="i == paging.page">
                  <a class="page-link" href="#" @click="paging.page = i" v-text="i" v-if="i != paging.page"></a>
                  <span class="page-link" v-else v-text="i"></span>
                </li>
                <li class="page-item" v-if="paging.page < list.totalPage">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
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
                    <label class="fs-20 fw-600 text-light mb-10 form-label">Profile Image</label>
                    <label class="d-flex justify-content-center align-items-center bg-primary overflow-hidden br-6 cursor-pointer">
                      <img :src="form.data.image" v-if="form.data.image && form.data.image != 'default'" class="wp-100">
                      <svg v-else width="200" height="155" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto my-50">
                        <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                      </svg>
                      <input type="file" class="d-none" id="image_profile" @change="previewImage(event)">
                    </label>
                  </div>
                </div>
                <div class="col-8">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label class="fs-20 fw-600 text-light mb-10 form-label">Username</label>
                        <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g johndoe" v-model="form.data.username">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label class="fs-20 fw-600 text-light mb-10 form-label">Email</label>
                        <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g johndoe@email.com" v-model="form.data.email">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mt-20">
                        <label class="fs-20 fw-600 text-light mb-10 form-label">Name</label>
                        <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g John Doe" v-model="form.data.name">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mt-20">
                        <label class="fs-20 fw-600 text-light mb-10 form-label">Password</label>
                        <input type="password" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.password">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Phone</label>
                <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g John Doe" v-model="form.data.phone">
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Address</label>
                <textarea rows="5" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g berlaku untuk tiket tertentu" v-model="form.data.address"></textarea>
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Gender</label>
                <select class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.gender">
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">DOB</label>
                <input type="date" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.dob">
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Domicile</label>
                <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.domicile">
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Status</label>
                <select class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.status">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
              <div class="form-group mt-20">
                <label class="fs-20 fw-600 text-light mb-10 form-label">Type</label>
                <select class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" v-model="form.data.type">
                  <option value="User">User</option>
                  <option value="Admin">Admin</option>
                  <option value="Scanner">Scanner</option>
                </select>
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
  const vueBUsers = new Vue( {
    el: '#bUsers',
    data: {
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
          type: null
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
        payload.status = status
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.readUser(payload,token)
          let { status, msg, data, total, totalPage} = req.data
          if(status){
            this.list.data = data
            this.list.total = total
            this.list.totalPage = totalPage
          } else {
            console.log(req.data)
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
            req = await tiketboxApi.updateUser(payload,token)
          } else {
            req = await tiketboxApi.createUser(payload,token)
          }
          let { status, msg, data} = req.data
          if(status){
            this.notify('success','Success',msg)
            document.querySelector('#formModal .btn-close').click();
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
              let req = await tiketboxApi.getUser(payload,token)
              let { status, msg, data} = req.data
              if(status){
                this.form.data = data
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
                let req = await tiketboxApi.deleteUser(payload,token)
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
          type: null
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