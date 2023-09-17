@extends('layout.layout')
@section('screen')
  <section id="bpos" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
    <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
      POS
    </div>
    <div class="boc-content">
      <div class="row g-0">
        {{-- List Events --}}
        <div class="col-8 border-end border-primary">
          {{-- Filter --}}
          <div class="d-flex align-items-center py-15 px-25 border-bottom border-primary justify-content-between">
            <div class="bocc-events d-flex align-items-center py-10 px-20 br-10 wp-100 border border-light max-w-400">
              <select name="" id="" class="border-0 bg-transparent fs-14 text-light wp-100" @change="detailEvent()" v-model="eventId">
                <option value="">Select Event / Amusement Park</option>
                <option :value="event.id" v-for="(event,index) in opt.event" :key="index" v-text="event.name"></option>
              </select>
            </div>
            <div class="bocc-search d-flex align-items-center py-10 px-20 br-10 wp-100 border border-light max-w-200">
              <input type="text" class="border-0 bg-transparent text-light fs-14 wp-100" placeholder="Search..." v-model="search">
              <button class="border-0 bg-transparent">
                <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20">
                  <g id="Frame" opacity="0.5">
                  <path id="Vector" d="M31.408 18.5622C31.408 21.1632 30.6345 23.7059 29.1853 25.8686C27.7361 28.0314 25.6762 29.7171 23.2662 30.7126C20.8562 31.7081 18.2043 31.9686 15.6458 31.4614C13.0873 30.9541 10.7371 29.7018 8.89232 27.8627C7.04759 26.0236 5.79119 23.6805 5.28198 21.1294C4.77278 18.5784 5.03364 15.9341 6.03158 13.5309C7.02952 11.1277 8.71972 9.07351 10.8885 7.62809C13.0572 6.18267 15.6071 5.41094 18.2157 5.41046C19.948 5.41015 21.6635 5.75009 23.264 6.41089C24.8645 7.07168 26.3189 8.04038 27.5439 9.26166C28.769 10.4829 29.7407 11.9329 30.4037 13.5287C31.0668 15.1245 31.408 16.8349 31.408 18.5622V18.5622Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path id="Vector_2" d="M27.5459 27.8636L35.1778 35.4735" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                </svg>                
              </button>
            </div>
          </div>
          {{-- Tickets --}}
          <div class="d-block wp-100">
            {{-- Event Title --}}
            <div class="pt-40 pb-25 px-25">
              <h1 class="fs-20 fw-700 text-white" v-text="event.name"></h1>
            </div>
            {{-- Date --}}
            <div class="d-flex justify-content-between align-items-center px-25 py-25 border-top border-primary">
              <label class="fw-700 fs-18 text-white">Select Date</label>
              <select style="background-color: #929292;" class="text-white fs-18 fw-400 px-30 py-10 br-5" v-model="form.data.date" :est="form.data.date" v-if="event.type == 'event'">
                <option style="background-color: #929292;" class="text-white" v-for="(date,index) in event_days" :key="index" v-text="dateIndo(date)" :value="date"></option>
              </select>
              <input type="date" name="" id="" v-model="form.data.date" v-else style="background-color: #929292;" class="text-white fs-18 fw-400 px-30 py-10 br-5">
            </div>
            {{-- Ticket List --}}
            <div class="px-25 py-25 border-top border-primary">
              <div class="ticket-item p-20 border border-secondary br-10 mb-15 d-flex justify-content-between align-items-start" v-for="(ticket,index) in event.tickets" :key="index">
                <div class="ti-left pe-5 wp-75">
                  <h5 class="fs-20 fw-700 text-white mb-20" v-text="ticket.name"></h5>
                  <div class="fs-18 fw-400 text-light mb-10">
                    <span v-text="`${dateIndo(form.data.date)} | ${timeIndo(ticket.date_start+' '+ticket.time_start)}-${timeIndo(ticket.date_start+' '+ticket.time_end)}`"></span>
                  </div>
                  <div class="fs-18 fw-400 text-light">
                    <span v-text="`${ticket.description}`"></span>
                  </div>
                </div>
                <div class="ti-right ps-5 d-flex flex-column justify-content-end">
                  <span class="fs-12 fw-400 text-secondary">See Details Ticket</span>
                  <label v-text="`IDR ${thousand(ticket.price)}`" class="fs-18 fw-700 mt-15 text-white"></label>
                  <button type="button" class="btn btn-primary mt-20" @click="selectTicket(ticket)">Select</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          {{-- Orders --}}
          <div class="edbc-orders br-tl-10 br-tr-10" style="background-color:#252525;">
            <div class="edb-heading row border-bottom border-primary g-0" style="box-shadow: 0px 8px 27px 0px rgba(0, 0, 0, 0.37);">
              <div class="col text-center py-26 cursor-pointer">
                <span class="fw-400 fs-17 text-white">Order List</span>
              </div>
            </div>
            <div class="edb-content py-10">
              <div class="edbco-items" v-if="orders.length > 0">
                <div style="max-height: 400px;overflow-y:auto;">
                  <div class="edbco-item border-bottom border-primary px-20 py-20" v-for="(order,index) in orders" :key="index">
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
                <div class="px-20 pb-20">
                  <a href="{{ url('backoffice/pos/checkout') }}" class="btn btn-primary wp-100">Continue Order</a>
                </div>
              </div>
              <div class="py-30 px-20 text-center" v-else>
                <span class="text-center text-white fs-20 fw-400">No ticket ordered</span>
              </div>
            </div>
          </div>
          {{-- Seats --}}
          <div class="edbc-seats br-tl-10 br-tr-10 mt-25 border-top border-light" style="background-color:#252525;" v-if="event.type == 'event'">
            <div class="edb-heading row border-bottom border-primary g-0" style="box-shadow: 0px 8px 27px 0px rgba(0, 0, 0, 0.37);">
              <div class="col text-center py-20 cursor-pointer">
                <span class="fw-400 fs-17 text-white">Select Seat</span>
              </div>
            </div>
            <div class="edb-content py-10">
              <div class="edb-seats pt-10" v-if="ticket.seats.length > 0">
                <div class="edb-seat border-bottom border-primary py-20 px-20 cursor-pointer" v-for="(theseat,index) in ticket.seats">
                  <div class="d-flex justify-content-between align-items-center mb-10">
                    <h6 class="fs-20 fw-700 text-white m-0" v-text="`Sec ${theseat.section}, Row ${theseat.row}`"></h6>
                    <div class="d-flex align-items-center">
                      <span class="fs-20 fw-700 text-white me-10">Seat: </span>
                      <select v-model="theseat.selected_seat" class="text-white fs-18 fw-400 px-10 py-5 br-5" style="background-color: #929292;">
                        <option :value="optSeat" v-for="(optSeat,index) in theseat.seat" v-text="optSeat" class="text-white" style="background-color: #929292;"></option>
                      </select>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="fs-15 fw-400 text-light" v-text="ticket.name"></span>
                    <span class="fs-18 fw-700 text-white" v-text="`IDR ${thousand(theseat.price)}`"></span>
                  </div>
                  <button class="btn btn-primary btn-sm mt-10 wp-100" @click="addTicket(theseat)">Add</button>
                </div>
              </div>
              <div class="py-30 px-20 text-center" v-else>
                <span class="text-center text-white fs-20 fw-400">Select Ticket to see available Seats</span>
              </div>
            </div>
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
  const vueBpos = new Vue( {
    store,
    el: '#bpos',
    data: {
      swiper: null,
      eventId: null,
      form: {
        data: {
          date: null,
          amount: 0
        }
      },
      event: {
        images: [
          {
            image_url: null
          }
        ]
      },
      ticket: {
        seats: []
      },
      seat: Object,
      tab: 'buy-ticket',
      event_days: [],
      opt: {
        event: []
      },
      alert: {
        show: 'hide',
        bg: 'bg-primary',
        title: null,
        msg: null
      },
      search: null
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
      async doGetEvent() {
        this.opt.event = []
        let payload = {
          perPage: '~',
          page: 1,
          sortBy: 'name',
          sortDir: 'ASC',
          search: null
        }
        payload.status = status
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.readEvent(payload,token)
          let { status, msg, data, total, totalPage} = req.data
          if(status){
            data.map((item) => {
              this.opt.event.push({
                id: item.id,
                name: item.name
              })
            })
            this.notify('success','Success',msg)
          } else {
            this.notify('error','Error',msg)
          }
        } catch (error) {
          this.notify('error','Error',error.message)
        }
      },
      async detailEvent() {
        let payload = {
          id: this.eventId
        }
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.getEvent(payload,token)
          let { status, msg, data} = req.data
          if(status){
            this.event = data
            if(this.event.type == 'event'){
              this.form.data.date = data.date_start
            } else {
              this.form.data.date = this.formatDate(new Date())
            }
            this.event_date()
          } else {
            this.notify('error','Error',msg)
          }
        } catch (error) {
          this.notify('error','Error',error.message)
        }
      },
      selectTicket(ticket) {
        this.ticket = {...ticket}
        this.ticket.seats.map((seat) => {
          seat.selected_seat = 1
        })
        if(this.event.type != 'event') {
          let theSeat = {
              id: 0,
              id_event: this.event.id,
              id_ticket: this.ticket.id,
              image: 'default',
              section: '-',
              row: '-',
              seat: '-',
              selected_seat: '-',
              price: this.ticket.price,
              status: "active",
          }
          this.addTicket(theSeat)
        }
      },
      addTicket(seat = null) {
        let order  = {
          event: this.event,
          ticket: this.ticket,
          seat: {...seat},
          amount: 1,
          selected_date: this.form.data.date
        }
        let orders = store.getters.orders
        let orderExist = orders.find((item) => order.event.id == item.event.id && order.ticket.id == item.ticket.id && order.seat.id == item.seat.id && order.selected_date == item.selected_date)
        if(!orderExist){
          orders.unshift(order)
          let msg = `Item ${order.ticket.name} on ${this.dateIndo(order.selected_date)} at SEC: ${order.seat.section}, ROW: ${order.seat.row}, SEAT: ${order.seat.selected_seat} added to your order`
          this.notify('success','Success', msg)
        } else {
          let msg = `Item ${order.ticket.name} on ${this.dateIndo(order.selected_date)} at SEC: ${order.seat.section}, ROW: ${order.seat.row}, SEAT: ${order.seat.selected_seat} is already on your order`
          this.notify('error','Error', msg)
        }
        store.dispatch('setOrders', orders)
      },
      removeTicket(index) {
        let orders = store.getters.orders
        orders.splice(index,1)
        store.dispatch('setOrders', orders)
      },
      event_date() {
        let start = new Date(this.event.date_start)
        let end = new Date(this.event.date_end)
        let days = end.getDate() - start.getDate() + 1
        for(let i = 0; i < days; i++) {
          let dDay = new Date(this.event.date_start)
          let day = this.formatDate(dDay.setDate(dDay.getDate() + i));
          this.event_days.push(day)
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
      this.doGetEvent()
    }
  });
</script>
@endsection