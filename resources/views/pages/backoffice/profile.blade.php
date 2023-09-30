@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Profile
      </div>
      <div class="boc-content mt-25 br-10 py-40 text-light">
        <div class="px-40">
          <h3 class="fs-20 fw-600 m-0">Photo Profile</h3>
          <p class="fs-12 fw-400 mt-10">Your avatar and cover photo are the first images you will see on your account profile.</p>
          <div class="d-flex align-items-center mt-20">
            <div class="me-35">
              <img src="https://placehold.co/120x120" alt="" class="w-120 h-120 object-fit-contain br-10">
            </div>
            <div class="text-light d-flex flex-column align-items-start">
              <span class="fs-12 fw-700">Photo Profile</span>
              <span class="fs-12 fw-400 mt-5">Use a maximum high-resolution square image of 1MB.</span>
              <label for="file" class="btn btn-primary fs-12 fw-700 mt-5">
                @include('svg.upload')
                Upload Photo
              </label>
              <input type="file" name="" id="file" class="hide d-none">
            </div>
          </div>
        </div>
        <div class="py-25 px-40 border-top border-primary mt-25">
          <label class="fs-20 fw-600 text-light mb-10">Full Name</label>
          <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" placeholder="Eg: John Doe">
        </div>
        <div class="py-25 px-40 border-top border-primary">
          <label class="fs-20 fw-600 text-light mb-10">Phone Number</label>
          <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" placeholder="Eg: +6281234567890">
          <span class="fs-12 fw-400 mt-5 text-secondary">Untuk proses verifikasi pastikan terhubung dengan WhatsApp yang aktif.</span>
        </div>
        <div class="py-25 px-40 border-top border-primary">
          <label class="fs-20 fw-600 text-light mb-10">Email</label>
          <input type="text" class="fs-12 fw-400 wp-100 bg-transparent border-0 text-light" placeholder="Eg: email@email.com">
          <span class="fs-12 fw-400 mt-5 text-success">Verified</span>
        </div>
        <div class="py-25 px-40 text-center border-top border-primary">
          <button class="btn btn-primary py-15 px-40 fs-20 fw-600">Simpan</button>
        </div>
      </div>
  </section>
@endsection