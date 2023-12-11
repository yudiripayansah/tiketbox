@extends('layout.layout')
@section('screen')
  <section id="checkout" class="mt-100">
    <div class="container">
      <div class="checkout-details d-flex justify-content-between align-items-start mt-25 mb-50">
        <div class="ed-left wp-70 pe-25">
          <div class="ed-box br-tl-10 br-tr-10" style="background-color:#252525;">
            <div class="edb-heading row border-bottom border-primary g-0" style="box-shadow: 0px 8px 27px 0px rgba(0, 0, 0, 0.37);">
              <div class="col text-center py-20 cursor-pointer">
                <span class="fw-400 fs-17 text-white">Order Confirmation</span>
              </div>
            </div>
            <div class="edb-content">
              <div class="py-40 px-70">
                <h3 class="fs-20 fw-700 text-white">Audience Information</h3>
                <p class="fs-18 fw-400 text-white">Make sure all the information provided is correct. You can change your mind in the future.</p>
                <div class="border border-white p-30 br-6">
                  <h4 class="fs-16 fw-600 text-white">Contact</h4>
                  <p class="fs-12 fw-300 text-secondary">e-Ticket & Account information will be sent to email or whatsapp</p>
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
                  <p class="fs-12 fw-300 text-secondary">Make sure the data is filled in correctly</p>
                  <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap wp-100">   
                    <label class="wp-100 fs-14 fw-400 text-white mb-15">Full Name</label>               
                    <input type="text" class="wp-100 bg-transparent border-0 fs-18 fw-400 text-white" placeholder="John Doe" v-model="form.data.name">
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
                  <div class="row g-0">
                    <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap mt-30 col-12 col-sm-6 pe-sm-3">   
                      <label class="wp-100 fs-14 fw-400 text-white mb-15">Date of Birth</label>               
                      <input type="date" class="flatpickr wp-100 bg-transparent border-0 fs-18 fw-400 text-white wp-100" placeholder="dd-mm-yyyy" v-model="form.data.dob">
                    </div>
                    <div class="d-flex align-items-center border-bottom border-white pb-10 flex-wrap mt-30 col-12 col-sm-6 ms-auto">   
                      <label class="wp-100 fs-14 fw-400 text-white mb-15">Domisili</label>       
                      <input type="text" class="wp-100 bg-transparent border-0 fs-18 fw-400 text-white wp-100" placeholder="Eg: Jakarta" v-model="form.data.domicile" id="autoCompleteCity">        
                      {{-- <select class="bg-transparent border-0 fs-18 fw-400 text-white wp-100" placeholder="Jakarta" v-model="form.data.domicile">
                        <option value="Jakarta">Jakarta</option>
                      </select> --}}
                    </div>
                  </div>
                </div>
                <div class="form-check mt-30">
                  <input class="form-check-input" type="checkbox" id="agree-toc" v-model="form.data.toc">
                  <label class="form-check-label fs-16 fw-400 text-light" for="agree-toc">
                    Saya setuju terhadap Peraturan Concert, Syarat dan Ketentuan, dan Privacy Policy Setujui dan tekan tombol continue untuk memproses pesanan Anda.
                  </label>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-30">
                  <a href="{{ url('/') }}" class="btn btn-light wp-30">Back</a>
                  {{-- <button type="button" class="btn btn-secondary wp-30" @click="useDummy()">Use Dummy</button> --}}
                  <button type="button" class="btn btn-primary wp-30" @click="processOrder()">Continue</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ed-right wp-30">
          <div class="edbc-orders br-tl-10 br-tr-10" style="background-color:#252525;">
            <div class="edb-heading row border-bottom border-primary g-0" style="box-shadow: 0px 8px 27px 0px rgba(0, 0, 0, 0.37);">
              <div class="col text-center py-20 cursor-pointer">
                <span class="fw-400 fs-17 text-white">Your Order</span>
              </div>
            </div>
            <div class="edb-content py-10">
              <div class="edbco-items" v-if="orders.length > 0">
                <div style="max-height: 400px;overflow-y:auto;">
                  <div class="edbco-item border-bottom border-primary px-20 py-20" v-for="(order,index) in orders" :key="index">
                    <h5 class="fs-20 fw-700 text-white" v-text="order.event.name"></h5>
                    <h5 class="fs-20 fw-700 text-white" v-text="order.ticket.name"></h5>
                    <span class="fs-15 fw-400 text-white" v-text="dateIndo(order.selected_date)"></span>
                    <div class="row g-0 border-top border-bottom border-primary py-10 border-dashed mt-10" v-if="order.seat.section != '-'">
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
                      <span class="fs-18 fw-700 text-white wp-50" v-text="`IDR ${thousand((order.seat.section != '-') ? order.seat.price: order.ticket.price)}`"></span>
                      <span class="cursor-pointer text-light" @click="removeTicket(index)">
                        <i class="fa-solid fa-trash"></i>                       
                      </span>
                    </div>
                    <div v-if="order.seat.section == '-'">
                      <span class="fs-18 fw-700 text-white wp-100 d-block" v-text="`X ${order.amount}`"></span>
                      <span class="fs-18 fw-700 text-white" v-text="`IDR ${thousand((order.seat.section != '-') ? order.seat.price: order.ticket.price * order.amount)}`"></span>
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
@section('styles')
  <style>
    @media screen and (max-width: 768px){
      .checkout-details {
        flex-direction: column-reverse;
      }
      .ed-left {
        width: 100% !important;
        padding-right: 0 !important; 
        margin-top: 20px; 
      }
      .ed-right {
        width: 100% !important;
      }
      .edb-content > div {
        padding: 20px 15px !important;
      }
    }
  </style>
@endsection
@section('script')
  <script src="{{ asset('assets/js/city.js') }}"></script>
  <script>
    const vuecheckout = new Vue( {
      store,
      el: '#checkout',
      data: {
        form: {
          data: {
            id_user: null,
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
        opt: {
          city: city
        },
        alert: {
          show: 'hide',
          bg: 'bg-primary',
          title: null,
          msg: null
        }
      },
      computed: {
        users() {
          return store.getters.users
        },
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
            console.log(order.ticket)
            let price = order.ticket.price * order.amount
            if(order.seat.section != '-') {
              price = order.seat.price
            }
            total.price += price
            total.amount += order.amount
          })
          return total
        }
      },
      methods: {
        ...helper,
        async processOrder() {
          let payload = {...this.form.data}
          if(this.users){
            payload.id_user = this.users.id 
          }
          payload.order_items = []
          payload.total_items = this.total.amount
          payload.total_amount = this.total.price
          let orders = store.getters.orders
          orders.map((item) => {
            let price = (item.seat.section != '-') ? item.seat.price : item.ticket.price
            let order_item = {
              date: item.selected_date,
              id_event: item.event.id,
              id_ticket: item.ticket.id,
              id_seat: item.seat.id,
              section: (item.seat.section != '-') ? item.seat.section: 'default',
              row: (item.seat.section != '-') ? item.seat.row: 'default',
              seat: (item.seat.section != '-') ? item.seat.selected_seat: 'default',
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
              window.location.href = '/order/'+data.order_code
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
        this.initDatePicker()
        this.initAutocomplete()
      }
    });
  </script>
@endsection