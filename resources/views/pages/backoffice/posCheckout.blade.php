@extends('layout.layout')
@section('screen')
  <section id="bposCheckout" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
    <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
      POS
    </div>
    <div class="boc-content">
      <div class="row g-0">
        {{-- List Events --}}
        <div class="col-8 border-end border-primary">
          <div class="ed-box br-tl-10 br-tr-10" style="background-color:#252525;">
            <div class="edb-heading row border-bottom border-primary g-0" style="box-shadow: 0px 8px 27px 0px rgba(0, 0, 0, 0.37);">
              <div class="col text-center py-20 cursor-pointer">
                <span class="fw-400 fs-17 text-white">Order Confirmation</span>
              </div>
            </div>
            <div class="edb-content">
              <div class="py-40 px-25">
                <h3 class="fs-20 fw-700 text-white">Audience Information</h3>
                <p class="fs-18 fw-400 text-white">Make sure all the information provided is correct. You can change your mind in the future.</p>
                <div class="border border-white p-30 br-6">
                  <h4 class="fs-16 fw-600 text-white">Contact</h4>
                  <p class="fs-12 fw-300 text-secondary">e-Ticket & Account information will be sent to email or whatsapp</p>
                  <div class="d-flex align-items-center border-bottom border-white pb-10">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="Icon">
                      <path id="Vector" d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z" fill="#D5D5D5"/>
                      </g>
                    </svg>                      
                    <input type="text" class="bg-transparent border-0 ms-15 fs-18 fw-400 text-white" placeholder="example@tiketbox.com" v-model="form.data.email">
                  </div>
                  <div class="d-flex align-items-center border-bottom border-white pb-10 mt-30">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="Icon">
                      <path id="Vector" d="M20.9999 15.46L15.7299 14.85L13.2099 17.37C10.3799 15.93 8.0599 13.62 6.6199 10.78L9.1499 8.25L8.5399 3H3.0299C2.4499 13.18 10.8199 21.55 20.9999 20.97V15.46Z" fill="#D5D5D5"/>
                      </g>
                    </svg>                                          
                    <input type="text" class="bg-transparent border-0 ms-15 fs-18 fw-400 text-white" placeholder="+62 812 1234 5678" v-model="form.data.phone">
                  </div>
                </div>
                <div class="border border-white p-30 br-6 d-flex flex-wrap mt-30">
                  <h4 class="fs-16 fw-600 text-white wp-100">Personal Data</h4>
                  <p class="fs-12 fw-300 text-secondary">Make sure the data is filled in correctly</p>
                  <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap wp-100">   
                    <label class="wp-100 fs-14 fw-400 text-white mb-15">Full Name</label>               
                    <input type="text" class="bg-transparent border-0 fs-18 fw-400 text-white" placeholder="John Doe" v-model="form.data.name">
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
                    <input type="date" class="bg-transparent border-0 fs-18 fw-400 text-white wp-100" placeholder="dd-mm-yyyy" v-model="form.data.dob">
                  </div>
                  <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap mt-30 wp-48 ms-auto">   
                    <label class="wp-100 fs-14 fw-400 text-white mb-15">Domisili</label>               
                    <select class="bg-transparent border-0 fs-18 fw-400 text-white wp-100" placeholder="Jakarta" v-model="form.data.domicile">
                      <option value="Jakarta">Jakarta</option>
                    </select>
                  </div>
                </div>
                <div class="form-check mt-30">
                  <input class="form-check-input" type="checkbox" id="toc" v-model="form.data.toc">
                  <label class="form-check-label fs-16 fw-400 text-light" for="toc">
                    Saya setuju terhadap Peraturan Concert, Syarat dan Ketentuan, dan Privacy Policy Setujui dan tekan tombol continue untuk memproses pesanan Anda.
                  </label>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-30">
                  <a href="{{ url('/') }}" class="btn btn-light wp-30">Back</a>
                  <button type="button" class="btn btn-secondary wp-30" @click="useDummy()">Use Dummy</button>
                  <button type="button" class="btn btn-primary wp-30" @click="processOrder()">Continue</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="edbc-orders br-tl-10 br-tr-10" style="background-color:#252525;">
            <div class="edb-heading row border-bottom border-primary g-0" style="box-shadow: 0px 8px 27px 0px rgba(0, 0, 0, 0.37);">
              <div class="col text-center py-20 cursor-pointer">
                <span class="fw-400 fs-17 text-white">Order List</span>
              </div>
            </div>
            <div class="edb-content py-10">
              <div class="edbco-items" v-if="orders.length > 0">
                <div style="max-height: 400px;overflow-y:auto;">
                  <div class="edbco-item border-bottom border-primary px-20 py-20" v-for="(order,index) in orders" :key="index">
                    <h5 class="fs-20 fw-700 text-white" v-text="order.event.name"></h5>
                    <h5 class="fs-20 fw-700 text-white" v-text="order.ticket.name"></h5>
                    <span class="fs-15 fw-400 text-white" v-text="dateIndo(order.selected_date)"></span>
                    <div class="row g-0 border-top border-bottom border-primary py-10 border-dashed mt-10" v-if="order.event.type == 'event'">
                      <div class="col">
                        <span class="fs-15 fw-400 text-white me-5">SEC:</span>
                        <span class="fs-15 fw-700 text-white" v-text="order.seat.section"></span>
                      </div>
                      <div class="col">
                        <span class="fs-15 fw-400 text-white me-5">ROW:</span>
                        <span class="fs-15 fw-700 text-white" v-text="order.seat.row"></span>
                      </div>
                      <div class="col">
                        <span class="fs-15 fw-400 text-white me-5">SEAT:</span>
                        <span class="fs-15 fw-700 text-white" v-text="order.seat.selected_seat"></span>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-25">
                      <span class="fs-18 fw-700 text-white wp-50" v-text="`IDR ${thousand((order.seat) ? order.seat.price: order.ticket.price)}`"></span>
                      <span class="cursor-pointer" @click="removeTicket(index)">
                        <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path id="Vector" d="M1.07143 15.5357C1.07143 15.962 1.24075 16.3707 1.54215 16.6721C1.84355 16.9735 2.25233 17.1429 2.67857 17.1429H12.3214C12.7477 17.1429 13.1565 16.9735 13.4578 16.6721C13.7592 16.3707 13.9286 15.962 13.9286 15.5357V4.28572H1.07143V15.5357ZM10.1786 6.96429C10.1786 6.82221 10.235 6.68595 10.3355 6.58548C10.4359 6.48502 10.5722 6.42858 10.7143 6.42858C10.8564 6.42858 10.9926 6.48502 11.0931 6.58548C11.1936 6.68595 11.25 6.82221 11.25 6.96429V14.4643C11.25 14.6064 11.1936 14.7426 11.0931 14.8431C10.9926 14.9436 10.8564 15 10.7143 15C10.5722 15 10.4359 14.9436 10.3355 14.8431C10.235 14.7426 10.1786 14.6064 10.1786 14.4643V6.96429ZM6.96429 6.96429C6.96429 6.82221 7.02073 6.68595 7.12119 6.58548C7.22166 6.48502 7.35792 6.42858 7.5 6.42858C7.64208 6.42858 7.77834 6.48502 7.87881 6.58548C7.97927 6.68595 8.03571 6.82221 8.03571 6.96429V14.4643C8.03571 14.6064 7.97927 14.7426 7.87881 14.8431C7.77834 14.9436 7.64208 15 7.5 15C7.35792 15 7.22166 14.9436 7.12119 14.8431C7.02073 14.7426 6.96429 14.6064 6.96429 14.4643V6.96429ZM3.75 6.96429C3.75 6.82221 3.80644 6.68595 3.90691 6.58548C4.00737 6.48502 4.14363 6.42858 4.28571 6.42858C4.42779 6.42858 4.56406 6.48502 4.66452 6.58548C4.76499 6.68595 4.82143 6.82221 4.82143 6.96429V14.4643C4.82143 14.6064 4.76499 14.7426 4.66452 14.8431C4.56406 14.9436 4.42779 15 4.28571 15C4.14363 15 4.00737 14.9436 3.90691 14.8431C3.80644 14.7426 3.75 14.6064 3.75 14.4643V6.96429ZM14.4643 1.07143H10.4464L10.1317 0.445318C10.065 0.311462 9.96233 0.198864 9.83515 0.120193C9.70798 0.0415218 9.56137 -0.000101383 9.41183 5.87033e-06H5.58482C5.43562 -0.000567697 5.28927 0.0409003 5.16255 0.119659C5.03582 0.198417 4.93385 0.311281 4.8683 0.445318L4.55357 1.07143H0.535714C0.393634 1.07143 0.257373 1.12788 0.156907 1.22834C0.0564412 1.32881 0 1.46507 0 1.60715L0 2.67858C0 2.82066 0.0564412 2.95692 0.156907 3.05738C0.257373 3.15785 0.393634 3.21429 0.535714 3.21429H14.4643C14.6064 3.21429 14.7426 3.15785 14.8431 3.05738C14.9436 2.95692 15 2.82066 15 2.67858V1.60715C15 1.46507 14.9436 1.32881 14.8431 1.22834C14.7426 1.12788 14.6064 1.07143 14.4643 1.07143V1.07143Z" fill="white"/>
                          </svg>                          
                      </span>
                    </div>
                  </div>
                </div>
                <div class="edbco-total pb-20 pt-30 px-20">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-18 fw-400 text-white" v-text="`Total: ${total.amount}`"></span>
                    <span class="fs-18 fw-700 text-white" v-text="`IDR: ${thousand(total.price)}`"></span>
                  </div>
                </div>
              </div>
              <div class="py-30 px-20 text-center" v-else>
                <span class="text-center text-white fs-20 fw-400">No ticket ordered</span>
              </div>
            </div>
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
  const vuebPosCheckout = new Vue( {
    store,
    el: '#bposCheckout',
    data: {
      form: {
        data: {
          email: null,
          phone: null,
          name: null,
          gender: null,
          dob: null,
          domicile: null,
          total_items: null,
          total_amount: null,
          toc: false,
          order_items: []
        }
      },
      alert: {
        show: 'hide',
        bg: 'bg-primary',
        title: null,
        msg: null
      }
    },
    computed: {
      orders() {
        return store.getters.orders
      },
      total() {
        let orders = [...store.getters.orders]
        let total = {
          price: 0,
          amount: 0
        }
        orders.map((order) => {
          let price = order.ticket.price
          if(order.seat) {
            price = order.seat.price
          }
          total.price += price
          total.amount ++
        })
        return total
      }
    },
    methods: {
      ...helper,
      async processOrder() {
        let payload = {...this.form.data}
        payload.order_items = []
        payload.total_items = this.total.amount
        payload.total_amount = this.total.price
        let orders = store.getters.orders
        orders.map((item) => {
          let price = (item.seat) ? item.seat.price : item.ticket.price
          let order_item = {
            date: item.selected_date,
            id_event: item.event.id,
            id_ticket: item.ticket.id,
            id_seat: item.seat.id,
            section: (item.seat) ? item.seat.section: 'default',
            row: (item.seat) ? item.seat.row: 'default',
            seat: (item.seat) ? item.seat.selected_seat: 'default',
            price: price,
            amount: item.amount,
            total: item.amount * price,
            description: 'default',
            status: 'unused'
          }
          payload.order_items.unshift(order_item)
        })
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.createOrder(payload,token)
          let { status, msg, data} = req.data
          if(status){
            this.notify('success','Success',msg)
            store.dispatch('setOrders', [])
            window.location.href = '/backoffice/pos/order/'+data.order_code
          } else {
            this.notify('error','Error',msg)
          }
        } catch (error) {
          this.notify('error','Error',error.message)
        }
      },
      removeTicket(index) {
        let orders = store.getters.orders
        orders.splice(index,1)
        store.dispatch('setOrders', orders)
      },
      useDummy() {
        this.form.data = {
          email: 'yudiripayansah@gmail.com',
          phone: '08121913683',
          name: 'Yudi Ripayansah',
          gender: 'Male',
          dob: '1993-05-28',
          domicile: 'Jakarta',
          total_items: null,
          total_amount: null,
          toc: true,
          order_items: []
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
      }
    },
    mounted() {
    }
  });
</script>
@endsection