<section id="sidemenu" class="br-tl-10 br-tr-10 overflow-hidden" :data-role="users.type">
  <div v-if="users.type != 'admin'">
    <div class="d-flex align-items-center justify-content-between">
      <div @click="active = 'audience'" class="cusrsor-pointer sm-title py-15 text-center fw-700 fs-14 text-light border-bottom wp-50" :class="(active == 'audience') ? 'border-primary' : 'border-transparent'">
        Audience
      </div>
      <div @click="active = 'promotor'" class="cusrsor-pointer sm-title py-15 text-center fw-700 fs-14 text-light border-bottom wp-50"  :class="(active == 'promotor') ? 'border-primary' : 'border-transparent'">
        Promotor
      </div>
    </div>
    <div class="sm-menu py-25 px-15">
      <div v-if="active == 'audience'">
        @include('layout.listMenuAudience')
      </div>
      <div v-if="active == 'promotor'">
        @include('layout.listMenuPromotor')
      </div>
    </div>
  </div>
  <div v-else>
    <div class="sm-title py-15 text-center fw-700 fs-14 text-light border-bottom border-primary">
      Backoffice
    </div>
    <div class="sm-menu py-25 px-15">
      @include('layout.listMenu')
    </div>
  </div>
</section>

<script>
  const vueSideMenu = new Vue( {
    el: '#sidemenu',
    data: {
      active: '{{ request()->segment(1) }}'
    },
    computed: {
      users() {
        return store.getters.users
      },
    },
    methods: {
      ...helper,
    },
    mounted() {
      
    }
  });
</script>