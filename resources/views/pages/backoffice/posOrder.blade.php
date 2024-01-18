@extends('layout.layout')
@section('screen')
  <section id="bposOrder" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
    <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
      POS
    </div>
    <div class="boc-content">
      <div class="order-details d-flex justify-content-between align-items-start mt-25 mb-50">
        <div class="od-main wp-100">
          <div class="od-box br-tl-10 br-tr-10" style="background-color:#252525;">
            <div class="odb-heading row border-bottom border-primary g-0" style="box-shadow: 0px 8px 27px 0px rgba(0, 0, 0, 0.37);">
              <div class="fs-20 fw-400 text-white py-20 text-center wp-100">Order details for, <span class="fw-700" v-text="order.items[0].event_detail.name"></span></div>
            </div>
            <div class="odb-content pb-50">
              <div class="odb-title d-flex justify-content-between align-items-center py-30 px-50 border-bottom border-primary">
                <div>
                  <h1 class="fs-30 fw-700 text-white" v-text="order.items[0].event_detail.name">Ticket Dunia Fantasi (Dufan) Ancol</h1>
                  <p class="fs-20 fw-400 text-white" v-text="order.items[0].event_detail.location_name">Taman Impian Jaya Ancol</p>
                </div>
                <div>
                  <img :src="order.items[0].event_detail.images[0].image_url" alt="" class="w-150">
                </div>
              </div>
              <div class="odb-payment pt-50 px-50">
                <div class="border border-white d-flex justify-content-between align-items-start py-20 px-30 br-8">
                  <div>
                    <span class="fs-20 fw-600 text-white">Payment</span>
                    <div>
                      <label class="fs-18 fw-400 text-white">Order ID : </label>
                      <span class="fs-18 fw-600 text-white" v-text="order.order_code">TXB-1512001</span>
                    </div>
                    <div>
                      <label class="fs-18 fw-400 text-white">Email : </label>
                      <span class="fs-18 fw-600 text-white" v-text="order.email">wildan@tiketbox.com</span>
                    </div>
                  </div>
                  <div>
                    <h6 class="fs-18 fw-300 text-white wp-100 text-end">Please complete the payment before :</h6>
                    <span class="fs-20 fw-600 text-white text-end" v-text="(order.payment_expired) ? `${dateIndo(order.payment_expired)} | ${timeIndo(order.payment_expired)}` : ``">Kamis, 31 Agustus 2023 | 17:14 WIB</span>
                  </div>
                </div>
                <div class="border border-white py-20 px-30 br-8 mt-30">
                  <div class="odb-detail-title border-bottom border-primary fs-20 fw-600 pb-20 text-white">
                    Detail Order
                  </div>
                  <div class="odb-detail-items py-20 border-bottom border-primary text-white" v-for="(oi,index) in order.items" :key="index">
                    <div>
                      <h6 class="fs-20 fw-700" v-text="oi.ticket_detail.name">Ticket Kendaraan Mobil</h6>
                      <span class="fs-14 fw-400" v-text="`${dateIndo(oi.date)}`">Kamis, 15 Desember 2022</span>
                      <h6 class="fs-14 fw-400 wp-100" v-text="`Section: ${oi.section} | Row: ${oi.row} | Seat: ${oi.seat}`" v-if="order.items[0].event_detail.type == 'event'">Kamis, 15 Desember 2022</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-20">
                      <span class="fs-20 fw-700" v-text="`IDR ${thousand(oi.price)}`">IDR 25.000</span>
                      <span class="fs-20 fw-200" v-text="`${oi.amount}X e-Ticket`">1x e-Ticket</span>
                    </div>
                  </div>
                  <div class="odb-detail-summary py-30 text-white">
                    <h6 class="fs-20 fw-600">Order Summary</h6>
                    <div class="wp-100 d-flex justify-content-between align-items-center">
                      <label class="fs-20 fw-400">Subtotal</label>
                      <span class="fs-20 fw-600" v-text="`IDR ${thousand(order.total_amount)}`">IDR 60.000</span>
                    </div>
                    <div class="wp-100 d-flex justify-content-between align-items-center">
                      <label class="fs-20 fw-400">Payment Fee</label>
                      <span class="fs-20 fw-600">IDR 0</span>
                    </div>
                    <div class="wp-100 d-flex justify-content-between align-items-center">
                      <label class="fs-20 fw-400">Service Fee</label>
                      <span class="fs-20 fw-600">IDR 0</span>
                    </div>
                    <div class="wp-100 d-flex justify-content-between align-items-center">
                      <label class="fs-20 fw-400">Tax</label>
                      <span class="fs-20 fw-600">IDR 0</span>
                    </div>
                    <div class="wp-100 d-flex justify-content-between align-items-center">
                      <label class="fs-20 fw-400">Discount</label>
                      <span class="fs-20 fw-600">IDR 0</span>
                    </div>
                    <div class="wp-100 d-flex justify-content-between align-items-center mt-20 pt-20 border-top border-primary">
                      <label class="fs-20 fw-700">Total</label>
                      <span class="fs-20 fw-600" v-text="`IDR ${thousand(order.total_amount)}`">IDR 60.000</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="odb-voucher py-30 px-50">
                <div class="d-flex justify-content-end align-items-center text-white">
                  <label class="fs-20 fw-600 me-10">Voucher Code</label>
                  <input type="text" class="p-10 border border-white h-40 bg-transparent me-15">
                  <button class="btn btn-primary h-40">Use Voucher</button>
                </div>
              </div>
              {{-- <div class="odb-payment-method px-50 text-white">
                <div class="border border-white py-20 px-30 br-8">
                  <h6 class="pb-20 border-bottom border-primary fs-20 fw-600">Payment Method</h6>
                  <div class="pt-30" v-for="(pm,index) in payment_methods" :key="index">
                    <h6 class="fs-20 fw-400 mb-15" v-text="pm.title"></h6>
                    <div class="accordion border-secondary" id="accordion-virtual-accounts">
                      <div class="accordion-item border-secondary mb-15 bg-transparent text-white" v-for="(pmi,index) in pm.list" :key="index">
                        <h2 class="accordion-header" :id="`ava-${pmi.key}-title`">
                          <button class="accordion-button bg-secondary text-white collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="`#ava-${pmi.key}`" aria-expanded="false" :aria-controls="`ava-${pmi.key}`" v-text="pmi.name"></button>
                        </h2>
                        <div :id="`ava-${pmi.key}`" class="accordion-collapse collapse" :aria-labelledby="`ava-${pmi.key}-title`" data-bs-parent="#accordion-virtual-accounts">
                          <div class="accordion-body">
                            <div v-if="pmi.key == 'qris'" class="d-flex justify-content-center">
                              <div class="p-20 bg-white w-296 text-dark">
                                <div id="qrcode" class=" mb-15 mx-auto">
                                </div>
                                <h6 class="fs-16 fw-600 text-center">QRIS</h6>
                                <ol class="fs-10 m-0 pl-10">
                                  <li>Buka aplikasi e-wallet pilihan anda di ponsel (LinkAja, Ovo, Gopay, DANA, Shopeepay, dll)</li>
                                  <li>Scan QR di atas</li>
                                  <li>Selesaikan pembayaran melalui aplikasi tersebut</li>
                                </ol>
                                <div class="d-flex justify-content-between mt-20">
                                  <span class="fs-10">Order Number</span>
                                  <span class="fs-10 fw-600" v-text="order.order_code"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
              <div class="odb-continue pt-30 px-50">
                <div class="d-flex align-items-center justify-content-between">
                  <button class="btn btn-light wp-48">Back</button>
                  <a :href="order.payment_description.invoice_url" class="btn btn-primary wp-48" target="_blank">Continue to Payment</a>
                </div>
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
  const posOrder = new Vue( {
    store,
    el: '#bposOrder',
    data: {
      order: {
        "id": null,
        "order_code": null,
        "id_user": null,
        "email": null,
        "phone": null,
        "name": null,
        "gender": null,
        "dob": null,
        "domicile": null,
        "total_items": null,
        "total_amount": null,
        "payment_id": null,
        "payment_method": null,
        "payment_status": null,
        "payment_description": {
            "id": null,
            "external_id": null,
            "user_id": null,
            "status": null,
            "merchant_name": null,
            "merchant_profile_picture_url": null,
            "amount": null,
            "payer_email": null,
            "description": null,
            "expiry_date": null,
            "invoice_url": null,
            "available_banks": [],
            "available_retail_outlets": [],
            "available_ewallets": [],
            "available_qr_codes": [],
            "available_direct_debits": [],
            "available_paylaters": [],
            "should_exclude_credit_card": null,
            "should_send_email": null,
            "created": null,
            "updated": null,
            "currency": null
        },
        "payment_date": null,
        "status": null,
        "description": null,
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "items": [],
        "payment_expired": null
      },
      payment_link: null,
      payment_methods: [
        {
          title: 'Virtual Account',
          list: [
            {
              key: 'bri',
              name: 'Bank BRI'
            },
            {
              key: 'mandiri',
              name: 'Bank Mandiri'
            },
            {
              key: 'bni',
              name: 'Bank BNI'
            },
            {
              key: 'permata',
              name: 'Bank Permata'
            },
            {
              key: 'bjb',
              name: 'Bank BJB'
            },
            {
              key: 'bsi',
              name: 'Bank BSI'
            },
          ]
        },
        {
          title: 'E-Wallet',
          list: [
            {
              key: 'ovo',
              name: 'OVO'
            },
            {
              key: 'dana',
              name: 'DANA'
            },
            {
              key: 'shopee_pay',
              name: 'SHOPEE PAY'
            },
            {
              key: 'astra_pay',
              name: 'ASTRA PAY'
            },
          ],
        },
        {
          title: 'QR Code',
          list: [
            {
              key: 'qris',
              name: 'Qris'
            }
          ],
        },
        {
          title: 'Paylater',
          list: [
            {
              key: 'akulaku',
              name: 'Akulaku'
            },
            {
              key: 'uang_me',
              name: 'Uang Me'
            }
          ]
        }
      ],
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
      }
    },
    methods: {
      ...helper,
      async detailOrder() {
        let payload = {
          code: '{{ $code }}'
        }
        let token = 'abcdreUYBH&^*VHGY^&GY'
        try {
          let req = await tiketboxApi.getOrder(payload,token)
          let { status, msg, data} = req.data
          if(status){
            this.order = data
            // this.createInvoice()
          } else {
            this.notify('error','Error',msg)
          }
        } catch (error) {
          this.notify('error','Error',error.message)
        }
      },
      async createQR() {
        var payload = {
          'postfields' : `{
            "reference_id": "${this.order.order_code}",
            "type": "DYNAMIC",
            "currency": "IDR",
            "amount": ${this.order.total_amount},
            "expires_at": "2023-12-30T09:56:43.60445Z"
          }`
        };
        try {
          let req = await tiketboxApi.createQR(payload)
          let { status, msg, data, qr_string} = req.data
          if(req.status == 200){
            // this.order = data
          } else {
            this.notify('error','Error',msg)
          }
        } catch (error) {
          this.notify('error','Error',error.message)
        }
      },
      async createVA(bank) {
        var payload = {
          'bank' : bank
        };
        try {
          let req = await tiketboxApi.createVA(payload)
          let { status, msg, data, qr_string} = req.data
          if(req.status == 200){
          } else {
            this.notify('error','Error',msg)
          }
        } catch (error) {
          this.notify('error','Error',error.message)
        }
      },
      async createInvoice() {
        let payload = {
          'postfields': `{
                          "external_id": "${this.order.order_code}",
                          "amount": ${this.order.total_amount},
                          "payer_email": "${this.order.email}",
                          "description": "Invoice for Order: ${this.order.order_code}"
                        }`
        }
        try {
          let req = await tiketboxApi.createInvoice(payload)
          let { invoice_url } = req.data
          if(req.status == 200){
            this.payment_link = invoice_url
          } else {
            this.notify('error','Error',msg)
          }
        } catch (error) {
          this.notify('error','Error',error.message)
        }
      },
      qrCode(string) {
        let qrcode = new QRCode("qrcode");
        qrcode.makeCode(string);
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
      this.detailOrder()
    }
  });
</script>
@endsection