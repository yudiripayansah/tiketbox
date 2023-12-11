@extends('layout.layout')
@section('screen')
  <section id="event" class="mt-100">
    <div class="container">
      <div class="event-slider">
        <div id="event-banner-carousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item carousel-item-main" v-for="(image,index) in event.images" :key="index" :class="(index == 0) ? 'active' : '' ">
              <img :src="image.image_url" class="wp-100 h-450 d-block" style="object-fit:contain;" alt="">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#event-banner-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#event-banner-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="event-details d-flex justify-content-between align-items-start mt-25 mb-50">
        <div class="ed-left wp-70 pe-25">
          <div class="ed-box br-tl-10 br-tr-10" style="background-color:#252525;">
            <div class="edb-heading row border-bottom border-primary g-0" style="box-shadow: 0px 8px 27px 0px rgba(0, 0, 0, 0.37);">
              <div class="col text-center py-20 cursor-pointer">
                <span class="fw-400 fs-17 text-white" :class="(tab == 'buy-ticket') ? 'fw-700' : ''" @click="tab='buy-ticket'">Buy Ticket</span>
              </div>
              <div class="col text-center py-20 cursor-pointer">
                <span class="fw-400 fs-17 text-white" :class="(tab == 'description') ? 'fw-700' : ''" @click="tab='description'">Description</span>
              </div>
              <div class="col text-center py-20 cursor-pointer">
                <span class="fw-400 fs-17 text-white" :class="(tab == 'information') ? 'fw-700' : ''" @click="tab='information'">Information</span>
              </div>
            </div>
            <div class="edb-content">
              <div v-show="tab=='buy-ticket'">
                <div class="pt-40 pb-25 px-70">
                  <h1 class="fs-20 fw-700 text-white" v-text="event.name"></h1>
                </div>
                <div class="edb-select-date d-flex justify-content-between align-items-center px-70 py-25 border-top border-primary">
                  <label class="fw-700 fs-18 text-white">Select Date</label>
                  <select style="background-color: #929292;" class="text-white fs-18 fw-400 px-30 py-10 br-5" v-model="form.data.date" :est="form.data.date" v-if="event.type == 'event'">
                    <option style="background-color: #929292;" class="text-white" v-for="(date,index) in event_days" :key="index" v-text="dateIndo(date)" :value="date"></option>
                  </select>
                  <div v-else>
                    <input type="date" name="" id="" v-model="form.data.date" style="background-color: #929292;" class="flatpickr text-dark fs-18 fw-400 px-30 py-10 br-5">
                  </div>
                </div>
                <div class="px-70 py-25 border-top border-primary">
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
                      <label v-text="`IDR ${getPrice(index)}`" class="fs-18 fw-700 mt-15 text-white"></label>
                      <button type="button" class="btn btn-primary mt-20" @click="selectTicket(ticket)">Select</button>
                    </div>
                  </div>
                </div>
              </div>
              <div v-show="tab=='description'">
                <div class="py-40 px-70">
                  <div v-html="event.description" class="text-white fs-20"></div>
                </div>
              </div>
              <div v-show="tab=='information'">
                <div class="py-40 px-70">
                  <div v-html="event.toc" class="text-white fs-20"></div>
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
                    <div class="d-flex justify-content-between align-items-center wp-50 mt-25" v-if="order.seat.section == '-'">
                      <button type="button" class="bg-primary fs-14 p-5 br-3 border-0 text-light" @click="countPrice(index,'minus')">
                        <i class="fa-solid fa-minus"></i>
                      </button>
                      <input type="text" class="bg-transparent border-0 text-light fs-14 fw-700 p-5 wp-50 text-center" v-model="order.amount">
                      <button type="button" class="bg-primary fs-14 p-5 br-3 border-0 text-light" @click="countPrice(index,'plus')">
                        <i class="fa-solid fa-plus"></i>
                      </button>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-25">
                      <span class="fs-18 fw-700 text-white wp-50" v-text="`IDR ${thousand((order.seat.section != '-') ? order.seat.price: order.ticket.price * order.amount)}`"></span>
                      <span class="cursor-pointer text-light" @click="removeTicket(index)">
                        <i class="fa-solid fa-trash"></i>                          
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
                  <a href="{{ url('checkout') }}" class="btn btn-primary wp-100">Continue Order</a>
                </div>
              </div>
              <div class="py-30 px-20 text-center" v-else>
                <span class="text-center text-white fs-20 fw-400">No ticket ordered</span>
              </div>
            </div>
          </div>
          <div class="edbc-seats br-tl-10 br-tr-10 mt-25" style="background-color:#252525;" v-if="event.type == 'event'">
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
      .event-slider .carousel-item img {
        height: auto !important;
      }
      .event-details {
        flex-wrap: wrap;
      }
      .event-details .ed-left {
        width: 100% !important;
        padding-right: 0 !important;
      }
      .event-details .ed-right {
        width: 100% !important;
        margin-top: 20px; 
      }
      .edb-content > div > div {
        padding: 20px 15px !important;
      }
      .edb-content > div > div > h1 {
        margin: 0 !important;
      }
      .edb-select-date {
        flex-direction: column;
        align-items: flex-start !important;
      }
      .edb-select-date label {
        margin-bottom: 15px;
      }
      .ti-left span {
        font-size: 16px !important;
      }
      .ti-right span {
        font-size: 10px !important;
      }
      .edbco-item {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .ticket-item {
        flex-direction: column !important;
      }
      .ti-right {
        margin-top: 20px;
        padding-left: 0 !important;
      }
    }
  </style>
@endsection
@section('script')
  <script>
    const vueEvent = new Vue( {
      store,
      el: '#event',
      data: {
        swiper: null,
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
      watch: {
        orders: {
          handler(val) {
            this.countTotal();
          },
          deep: true,
        },
      },
      methods: {
        ...helper,
        async detailEvent() {
          let payload = {
            id: '{{ $id }}'
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
          if(this.event.type != 'event' || this.ticket.seats.length == 0) {
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
        countPrice(index,type) {
          let orders = store.getters.orders
          if(type == 'plus'){
            orders[index].amount += 1 
          } else {
            orders[index].amount -= 1 
            if(orders[index].amount < 1){
              this.removeTicket(index)
            }
          }
          store.dispatch('setOrders', orders)
        },
        countTotal(){
          let orders = [...store.getters.orders]
          let total = {...this.total}
          orders.map((order) => {
            console.log(order.ticket)
            let price = order.ticket.price * order.amount
            if(order.seat.section != '-') {
              price = order.seat.price
            }
            total.price += price
            total.amount += order.amount
          })
          this.total = total
        },
        event_date() {
          let start = new Date(this.event.date_start)
          let end = new Date(this.event.date_end)
          let days = end.getTime() - start.getTime()
          days = (days / (1000 * 3600 * 24)) + 1
          for(let i = 0; i < days; i++) {
            let dDay = new Date(this.event.date_start)
            let day = this.formatDate(dDay.setDate(dDay.getDate() + i));
            this.event_days.push(day)
          }
        },
        getPrice(idx) {
          let theDate = this.form.data.date
          let day = new Date(this.form.data.date).getDay()
          day = day.toString()
          let event = {...this.event}
          let ticket = {...this.event.tickets[idx]}
          if(event.holiday.includes(day) || event.holidate.includes(theDate)){
            this.event.tickets[idx].price = ticket.price_holiday
            return this.thousand(ticket.price_holiday)
          } else {
            this.event.tickets[idx].price = ticket.price_def
            return this.thousand(ticket.price_def)
          }
        },
        initDatePicker() {
          flatpickr(".flatpickr", {
            minDate: 'today'
          });
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
        this.detailEvent()
        this.initDatePicker()
      }
    });
  </script>
@endsection