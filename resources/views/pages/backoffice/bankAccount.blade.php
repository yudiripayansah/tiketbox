@extends('layout.layout')
@section('screen')
<section id="buserbank" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
  <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
    Bank Account
  </div>
  <div class="boc-content p-40 br-10 text-light">
    <h3 class="fs-20 fw-600">Bank Account Data</h3>
    <div class="d-flex justify-content-between align-items-start mt-20">
      <p class="wp-100 max-wp-60 fs-12 fw-400">Bank Account functions to process refunds or withdrawals on your balance.</p>
      <button class="btn btn-primary">Add Bank Account</button>
    </div>
    <div class="bg-dark br-10 mt-25">
      <div class="d-flex justify-content-between align-items-start p-25 border-bottom border-primary">
        <h4 class="fs-20 fw-700 d-flex align-items-center">
          Bank Central Asia ( BCA ) <small class="bg-primary p-5 br-10 fs-10 fw-600 ms-10">Primary</small>
        </h4>
        <button class="btn btn-secondary btn-sm">Update</button>
      </div>
      <div class="p-25 d-flex align-items-start justify-content-between">
        <div>
          <div class="d-flex align-items-center">
            <span class="fs-12 fw-400">John Doe</span> 
          </div>
          <div class="d-flex align-items-center mt-10">
            <span class="fs-12 fw-400">1234567890</span> 
          </div>
          <div class="d-flex align-items-center mt-10">
            <span class="fs-12 fw-400">Dago Bandung</span> 
          </div>
        </div>
        <button class="bg-transparent border-0">
          @include('svg.trash')
        </button>
      </div>
    </div>
  </div>
</section>
@endsection
@section('script')
<script src="{{ asset('assets/js/city.js') }}"></script>
<script>
  const vueBUserBank = new Vue( {
    el: '#buserbank',
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
      // this.initDatePicker()
      // this.initAutocomplete()
    },
  });
</script>
@endsection