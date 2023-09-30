@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Bank Account
      </div>

      <div class="boc-content p-40 br-10 text-light">
        <h3 class="fs-20 fw-600">Bank Account Data</h3>
        <div class="d-flex justify-content-between align-items-start mt-20">
          <p class="wp-100 max-wp-60 fs-12 fw-400">Bank Account functions to process refunds or withdrawals on your balance.</p>
          <button class="btn btn-primary">Add Bank Account</button>
        </div>
        <div class="bg-dark br-10 mt-25">
          <div class="d-flex justify-content-between align-items-start p-25 border-bottom border-primary">
            <h4 class="fs-20 fw-700 d-flex align-items-center">
              Bank Central Asia ( BCA ) <small class="bg-primary p-5 br-10 fs-10 fw-600 ms-10">Primary</small>
            </h4>
            <button class="btn btn-secondary btn-sm">Update</button>
          </div>
          <div class="p-25 d-flex align-items-start justify-content-between">
            <div>
              <div class="d-flex align-items-center">
                <span class="fs-12 fw-400">John Doe</span> 
              </div>
              <div class="d-flex align-items-center mt-10">
                <span class="fs-12 fw-400">1234567890</span> 
              </div>
              <div class="d-flex align-items-center mt-10">
                <span class="fs-12 fw-400">Dago Bandung</span> 
              </div>
            </div>
            <button class="bg-transparent border-0">
              @include('svg.trash')
            </button>
          </div>
        </div>
      </div>
  </section>
@endsection