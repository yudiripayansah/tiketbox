@extends('layout.layout')
@section('screen')
<section id="verify" class="mt-100">
  <div class="container text-center pt-100 pb-200">
    <h1 class="text-light fs-24 fw-700" v-text="(verify.status) ? 'Verify Successfull' : 'Verify Failed'"></h1>
    <p class="text-light fs-14 fw-400" v-text="verify.msg"></p>
  </div>
</section>
@endsection
@section('styles')
<style>
</style>
@endsection
@section('script')
<script>
  const vueVerify = new Vue( {
      store,
      el: '#verify',
      data: {
        verify_token: '{{$verify_token}}',
        verify: {
          status: false,
          token: null,
          msg: null
        }
      },
      computed: {
        
      },
      watch: {
        
      },
      methods: {
        ...helper,
        async detailEvent() {
          let payload = {
            verify_token: '{{ $verify_token }}'
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.verifyToken(payload,token)
            let { status, msg, data} = req.data
            if(status){
              this.verify = {
                msg: 'Verify email success, you can login with your account now!',
                status: true
              }
            } else {
              this.verify = {
                msg: 'Verify email failed, account not found!',
                status: false
              }
            }
          } catch (error) {
            this.verify = {
              msg: 'Verify email failed, please try again!',
              status: false
            }
          }
        }
      },
      mounted() {
        this.detailEvent()
      }
    });
</script>
@endsection