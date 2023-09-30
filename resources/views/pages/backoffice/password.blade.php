@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Password
      </div>
      <div class="boc-content py-40 mt-25 br-10">
        <h1 class="text-light fs-20 fw-600 text-center wp-100 m-0 p-0 mb-30">Change Password</h1>
        <div class="py-25 px-40 border-top border-primary">
          <label class="fs-20 fw-600 text-light mb-20">Old Password</label>
          <input type="password" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" placeholder="**********">
        </div>
        <div class="py-25 px-40 border-top border-primary">
          <label class="fs-20 fw-600 text-light mb-20">New Password</label>
          <input type="password" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" placeholder="**********">
        </div>
        <div class="py-10 px-40 border-top border-primary">
          <label class="fs-12 fw-400 text-secondary mb-20">Minimal 8 Karakter</label>
        </div>
        <div class="py-25 px-40 text-center">
          <button class="btn btn-primary py-15 px-40 fs-20 fw-600">Simpan</button>
        </div>
      </div>
  </section>
@endsection