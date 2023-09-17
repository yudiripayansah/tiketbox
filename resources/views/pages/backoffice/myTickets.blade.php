@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title bg-dark py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        My Tickets
      </div>
      <div class="boc-content">
        <div class="d-flex align-items-center justify-content-between py-25 px-25 border-bottom border-primary">
          <span class="fs-14 fw-400 text-light">Here's a list of your Tickets</span>
          <select name="" id="" class="py-10 px-20 br-10 wp-100 border border-light max-w-480 fs-14 fw-400 text-light bg-transparent">
            <option value="Aktif">All</option>
          </select>
        </div>
        <div class="p-25">
          <a href="{{ url('backoffice/my-tickets/details') }}" class="d-block br-10 text-light border border-primary">
            <div class="mt-title px-25 py-20 border-bottom border-primary d-flex align-items-center justify-content-between">
              <div>
                <h4 class="fs-20 fw-700 m-0">Event details</h4>
                <p class="fs-12 fw-400 m-0">transaction date</p>
              </div>
              <div>
                <button class="btn btn-sm btn-primary me-10">
                  E-Ticket
                </button>
                <button class="btn btn-sm btn-light">
                  Invoice
                </button>
              </div>
            </div>
            <div class="mt-content px-25 py-20 d-flex align-items-center justify-content-between">
              <div>
                <div class="fs-12 fw-400 mt-details-item">
                  @include('svg.map-point')
                  Lokasi
                </div>
                <div class="fs-12 fw-400 mt-10 mt-details-item">
                  @include('svg.calendar')
                  Tanggal
                </div>
                <div class="fs-12 fw-400 mt-10 mt-details-item">
                  @include('svg.ticket')
                  Tiket
                </div>
                <div class="fs-12 fw-400 mt-10 mt-details-item">
                  @include('svg.money')
                  Payment
                </div>
              </div>
              <div>
                <img src="{{ asset('assets/images/popular/1.png') }}" alt="" class="br-10 wp-100 max-w-300">
              </div>
            </div>
          </a>
        </div>
      </div>
  </section>
@endsection
@section('styles')
  <style>
    .mt-details-item svg,
    .mt-details-item svg * {
      width: 20px;
      height: 20px;
      fill: white;
      margin-right: 10px;
    }
  </style>
@endsection