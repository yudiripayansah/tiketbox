@extends('layout.layout')
@section('screen')
  <section id="bpassword" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
    <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
      Password
    </div>
    <div class="boc-content py-40 mt-25 br-10">
      <h1 class="text-light fs-20 fw-600 text-center wp-100 m-0 p-0 mb-30">Change Password</h1>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-20">Old Password</label>
        <input type="password" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" placeholder="**********" v-model="form.data.password">
      </div>
      <div class="py-25 px-40 border-top border-primary">
        <label class="fs-20 fw-600 text-light mb-20">New Password</label>
        <input type="password" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" placeholder="**********" v-model="form.data.new_password">
      </div>
      <div class="py-10 px-40 border-top border-primary">
        <label class="fs-12 fw-400 text-secondary mb-20">Minimal 8 Karakter</label>
      </div>
      <div class="py-25 px-40 text-center">
        <button class="btn btn-primary py-15 px-40 fs-20 fw-600" @click="doSave()" v-text="(form.loading) ? 'Menyimpan...' : 'Simpan'"></button>
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
  const vueBPassword = new Vue( {
    el: '#bpassword',
    data: {
      form: {
        data: {
          id: null,
          email: null,
          password: null,
          new_password: null
        },
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
        payload.id = this.users.id
        payload.email = this.users.email
        let token = 'abcdreUYBH&^*VHGY^&GY'
        if(payload.new_password.length >= 8) {
          try {
            let req = {
              data : {
                status: false,
                msg: null,
                data: null
              }
            }
            req = await tiketboxApi.updateUserPassword(payload,token)
            let { status, msg, data} = req.data
            if(status){
              this.notify('success','Success',msg)
              this.clearForm()
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        } else {
          this.notify('error','Error','Password minimum 8 character')
        }
      },
      clearForm() {
        this.form.data = {
          id: null,
          email: null,
          password: null,
          new_password: null
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

    },
  });
</script>
@endsection