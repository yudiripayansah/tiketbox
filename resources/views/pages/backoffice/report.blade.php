@extends('layout.layout')
@section('screen')
  <section id="breport" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Report
      </div>
  </section>
@endsection

@section('script')
<script>
  const vueBreport = new Vue( {
    el: '#breport',
    data: {
    },
    computed: {
      users() {
        return store.getters.users
      },
    },
    methods: {
      
    },
    mounted() {
      if(this.users.type == 'user') {
        window.location.href = "{{ url('/promotor') }}"
      }
    },
  });
</script>
@endsection