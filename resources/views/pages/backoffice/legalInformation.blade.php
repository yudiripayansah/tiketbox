@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Legal Information
      </div>
      <div class="boc-content br-10 py-30 px-40 mt-25 text-light">
        <div class="fs-20 fw-700 d-flex align-items-center justify-content-start">
          <h3 class="m-0 text-light">Legal Information</h3>
          <h3 class="m-0 text-danger ms-15">Belum Diverifikasi</h3>
        </div>
        <p class="fs-12 fw-400 mt-20">Dokumen yang sudah diunggah hanya dapat dichange dengan cara menghubungi tim kami. Hubungi kami.</p>
        <div style="background-color:#636363;" class="br-10 mt-30">
          <div class="row g-0 border-bottom border-dark">
            <div class="col-6">
              <h5 class="pt-25 pb-15 px-25 text-center fs-20 fw-700">Individu</h5>
            </div>
            <div class="col-6">
              <h5 class="pt-25 pb-15 px-25 text-center fs-20 fw-700">Badan Hukum</h5>
            </div>
          </div>
          <div class="row g-0">
            <div class="col-12 col-md-6 py-20 px-30">
              <div class="d-flex align-items-center justify-content-center br-10 h-130" style="background-color: rgba(5, 6, 7, 0.50);">
                <h5 class="fs-14 fw-700">Dokumen KTP</h5>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-15 pb-15 border-bottom border-secondary">
                <div class="mx-wp-50 fs-12 fw-400">
                  <span class="fw-600">Dokumen KTP</span>
                  <p class="m-0 p-0">Upload dokumen KTP, <br>
                  max. 2MB</p>
                </div>
                <label for="" class="btn btn-primary fs-12 fw-700">
                  <span class="me-10">
                    @include('svg.upload')
                  </span>
                  Upload KTP
                </label>
              </div>
              <div class="mt-15 pb-15 border-bottom border-secondary">
                <label for="" class="fs-12 fw-600">Nomor KTP</label>
                <input type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" placeholder="Eg: 1234345678901122">
              </div>
              <div class="mt-15 pb-15 border-bottom border-secondary">
                <label for="" class="fs-12 fw-600">Name sesuai ( KTP )</label>
                <input type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" placeholder="Eg: John Doe">
              </div>
              <div class="mt-15 pb-15 border-bottom border-secondary">
                <label for="" class="fs-12 fw-600">Alamat sesuai ( KTP )</label>
                <input type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" placeholder="Eg: Jl. Bersih Kec. Cerah Kab. Indah 11234">
              </div>
            </div>
            <div class="col-12 col-md-6 py-20 px-30">
              <div class="d-flex align-items-center justify-content-center br-10 h-130" style="background-color: rgba(5, 6, 7, 0.50);">
                <h5 class="fs-14 fw-700">Dokumen NPWP</h5>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-15 pb-15 border-bottom border-secondary">
                <div class="mx-wp-50 fs-12 fw-400">
                  <span class="fw-600">Dokumen NPWP</span>
                  <p class="m-0 p-0">Upload dokumen NPWP, <br>
                  max. 2MB</p>
                </div>
                <label for="" class="btn btn-primary fs-12 fw-700">
                  <span class="me-10">
                    @include('svg.upload')
                  </span>
                  Upload NPWP
                </label>
              </div>
              <div class="mt-15 pb-15 border-bottom border-secondary">
                <label for="" class="fs-12 fw-600">Nomor NPWP</label>
                <input type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" placeholder="Eg: 1234345678901122">
              </div>
              <div class="mt-15 pb-15 border-bottom border-secondary">
                <label for="" class="fs-12 fw-600">Name sesuai ( NPWP )</label>
                <input type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" placeholder="Eg: John Doe">
              </div>
              <div class="mt-15 pb-15 border-bottom border-secondary">
                <label for="" class="fs-12 fw-600">Alamat sesuai ( NPWP )</label>
                <input type="text" class="fs-12 fw-400 wp-100 d-block bg-transparent border-0 mt-10 text-light" placeholder="Eg: Jl. Bersih Kec. Cerah Kab. Indah 11234">
              </div>
            </div>
          </div>
        </div>
        <p class="fs-12 fw-400 mt-20">
          Harap perhatikan kesesuaian antara identitas pada KTP dan NPWP. Dalam hal terdapat ketidaksesuaian antara KTP dan NPWP, faktur tax akan diterbitkan sesuai dengan identitas pada NPWP. Dalam hal dokumen NPWP tidak diunggah, kamu dianggap tidak memiliki NPWP.
        </p>
        <div class="form-check mt-20">
          <input class="form-check-input" type="checkbox" value="yes" id="agreement" v-model="form.data.form_order">
          <label class="form-check-label fs-12 fw-400 text-light" for="agreement">
            Dengan ini saya menyatakan dengan sesungguhnya bahwa all informasi yang disampaikan dalam seluruh lampiran-lampirannya ini adalah benar adanya. Apabila diketemukan dan/atau dibuktikan adanya kesalahan/penipuan/pemalsuan atas informasi yang saya sampaikan PT. Eventori Media Semesta (Tiketbox.com) dibebaskan dari setiap akibat dari penggunaan data/dokumen tersebut.
          </label>
        </div>
        <button class="btn btn-primary mx-auto fs-16 fw-600 mt-25 px-40 d-block">Kirim Dokumen</button>
      </div>
  </section>
@endsection