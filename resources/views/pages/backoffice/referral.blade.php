@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Refferal and Commission
      </div>
      <div class="boc-content py-30 px-40 d-flex justify-content-between align-items-start br-10 mt-25">
        <div class="pe-70 text-light">
          <h3 class="fs-20 fw-700">Yuk Raih Komisi Sebanyaknya!</h3>
          <p class="fs-12 mt-10">Hanya dengan mempromosikan konten / ticket yang ada dilisting Tiketbox.com, Anda sudah bisa mendapatkan komisi, penghasilan dapat ditarik ke bank account bank Anda kapanpun anda inginkan!</p>
          <div class="mt-30 d-flex justify-content-start align-items-center">
            <a href="#" class="fs-12 fw-600 btn btn-secondary">
              Terms & conditions Program Refferal
            </a>
            <a href="" class="fs-12 fw-600 btn btn-primary ms-25">
              Lihat Performa Penjualan
            </a>
          </div>
        </div>
        <img src="{{ asset('/assets/images/layout/referral.png') }}" alt="" class="w-205">
      </div>
      <div class="row mt-25 text-light">
        <div class="col-12 col-md-6">
          <div class="boc-content br-10 py-30 px-40">
            <h3 class="fs-20 fw-700">Komisi Dari Penjualan Tiketbox.com</h3>
            <p class="fs-12 fw-400 mt-10">Dapatkan komisi hingga 10% untuk setiap transaksi dari link penjualan-mu.</p>
            <ul class="list-unstyled fs-12 fw-400 mt-20">
              <li>Browse konten Tiketbox.com</li>
              <li>Share link konten ke komunitas, Website atau Sosial Media</li>
              <li>Dapatkan komisi hingga 10% dari setiap transaksi</li>
            </ul>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="boc-content br-10 py-30 px-40 text-center">
            <h3 class="fs-20 fw-700">Belum ada komisi</h3>
            <p class="fs-12 fw-400 mt-30">Yuk, mulai promosikan beragam konten di Tiketbox.com untuk mulai mendapatkan komisi!</p>
            <p class="fs-12 fw-400 mt-50">Comingsoon!</p>
          </div>
        </div>
      </div>
  </section>
@endsection