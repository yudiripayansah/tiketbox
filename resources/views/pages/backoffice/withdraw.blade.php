@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Withdraw
      </div>
      <div class="boc-content mt-25 br-10 py-30 px-40">
        <div class="text-light wp-100 my-50 text-center max-w-400 mx-auto">
          <h3 class="fs-20 fw-700">No Data!</h3>
          <p class="fs-12 fw-400 mt-10">Data penarikan pendapatan tidak ada, silahkan klik button dibawah ini untuk melakukan penarikan pendapatan </p>
          <a href="" class="fs-16 fw-400 mt-30 text-light d-inline-flex align-items-center mx-auto">
            <span class="me-10">
              @include('svg.plus')
            </span>
            Withdraw
          </a>
        </div>
      </div>
  </section>
@endsection