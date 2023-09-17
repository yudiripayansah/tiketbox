@extends('layout.layout')
@section('screen')
  <section id="bhome" class="backoffice">
    <!-- Title -->
    <div class="row boc-title align-items-center border-bottom border-primary g-0 position-sticky top-72 br-tl-10 br-tr-10">
      <div class="col-6">
        <div class="py-15 px-25 fw-700 fs-14 text-light">
          Buat
          <select v-model="form.data.type" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100 bg-dark">
            <option value="event" class="bg-dark">Event</option>
            <option value="amusement" class="bg-dark">Amusement Park</option>
          </select>
        </div>
      </div>
      <div class="col-6 text-end">
        <div class="px-20 py-10">
          <a href="{{ url('/backoffice/my-events') }}" class="btn m-5 br-10 btn-sm btn-danger">
            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector" d="M18 5H3.83L7.41 1.41L6 0L0 6L6 12L7.41 10.59L3.83 7H18V5Z" fill="white"/>
            </svg>            
            Back
          </a>
          <button class="btn m-5 br-10 btn-sm btn-secondary" @click="dummyContent()">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="save">
              <path id="Vector" d="M12.5943 2.33301H3.70432C2.882 2.33301 2.22266 2.99976 2.22266 3.81467V14.1863C2.22266 15.0013 2.882 15.668 3.70432 15.668H14.076C14.8909 15.668 15.5577 15.0013 15.5577 14.1863V5.29634L12.5943 2.33301ZM14.076 14.1863H3.70432V3.81467H11.9794L14.076 5.91123V14.1863ZM8.89016 9.00051C7.66037 9.00051 6.66766 9.99323 6.66766 11.223C6.66766 12.4528 7.66037 13.4455 8.89016 13.4455C10.1199 13.4455 11.1127 12.4528 11.1127 11.223C11.1127 9.99323 10.1199 9.00051 8.89016 9.00051ZM4.44516 4.55551H11.1127V7.51884H4.44516V4.55551Z" fill="white"/>
              </g>
            </svg>                     
            Use Dummy
          </button>
          <button class="btn m-5 br-10 btn-sm btn-info" @click="doSave('draft')">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="save">
              <path id="Vector" d="M12.5943 2.33301H3.70432C2.882 2.33301 2.22266 2.99976 2.22266 3.81467V14.1863C2.22266 15.0013 2.882 15.668 3.70432 15.668H14.076C14.8909 15.668 15.5577 15.0013 15.5577 14.1863V5.29634L12.5943 2.33301ZM14.076 14.1863H3.70432V3.81467H11.9794L14.076 5.91123V14.1863ZM8.89016 9.00051C7.66037 9.00051 6.66766 9.99323 6.66766 11.223C6.66766 12.4528 7.66037 13.4455 8.89016 13.4455C10.1199 13.4455 11.1127 12.4528 11.1127 11.223C11.1127 9.99323 10.1199 9.00051 8.89016 9.00051ZM4.44516 4.55551H11.1127V7.51884H4.44516V4.55551Z" fill="white"/>
              </g>
            </svg>                     
            Draft
          </button>
          <button class="btn m-5 br-10 btn-sm btn-primary" @click="doSave('active')">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"/>
            </svg>                       
            Simpan
          </button>
        </div>
      </div>
    </div>
    <!-- Main Form -->
    <div class="boc-content px-45 py-35">
      <div class="row">
        <!-- Images -->
        <div class="col-12">
          <input type="file" @change="previewImage" multiple class="d-none" id="input-poster">
          <div id="event-banner-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ url('assets/images/events/bg-banner.png') }}" alt="" class="wp-100 img-fluid">
                <div class="carousel-caption left-0 right-0 top-0 bottom-0 d-flex align-items-center">
                  <label class="wp-100 position-relative image-poster cursor-pointer hp-100" for="input-poster">
                    <div class="d-flex flex-column align-items-center justify-content-center hp-100">
                      <svg width="80" height="63" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                      </svg>
                      <span class="fs-20 fw-600 text-light text-center max-w-350 mt-15">Upload Banner / Poster Event</span>
                      <span class="fs-12 fw-400 text-light text-center max-w-350">Rekomendasi ukuran 798px x 450px, bisa mengupload lebih dari satu gambar.</span>              
                    </div>
                  </label>
                </div>
              </div>
              <div class="carousel-item carousel-item-main" v-for="(poster, index) in images_clone" :key="index" v-show="!poster.deleted">
                <img :src="(poster.id) ? poster.image_url : poster " class="d-block wp-100" :alt="form.data.name">
                <div class="carousel-caption left-0 right-0 top-0 bottom-0 d-flex align-items-center flex-column">
                  <label class="wp-100 position-relative image-poster cursor-pointer hp-100" for="input-poster">
                    <div class="d-flex flex-column align-items-center justify-content-center hp-100">
                      <svg width="80" height="63" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                      </svg>
                      <span class="fs-20 fw-600 text-light text-center max-w-350 mt-15">Upload Banner / Poster Event</span>
                      <span class="fs-12 fw-400 text-light text-center max-w-350">Rekomendasi ukuran 798px x 450px, bisa mengupload lebih dari satu gambar.</span>              
                    </div>
                  </label>
                  <button class="btn btn-danger btn-sm" @click="deleteImage(index)">Hapus</button>
                </div>
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
        <!-- Event Name -->
        <div class="col-5 pt-35 pb-5 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Nama</label>
          <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="Nama" v-model="form.data.name">
        </div>
        <!-- Event Category -->
        <div class="col-7 pt-35 pb-5 border-bottom border-primary" data-bs-toggle="modal" data-bs-target="#jenisKategoriModal">
          <label class="fs-20 fw-600 text-light wp-100 cursor-pointer">Jenis & Kategori</label>
          <div class="d-flex align-items-center py-10 cursor-pointer">
            <div class="d-flex align-items-center">
              <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="Vector" d="M17.78 5.334V1.778C17.78 0.8001 16.9799 0 16.002 0H1.778C0.8001 0 0.00888999 0.8001 0.00888999 1.778V5.334C0.98679 5.334 1.778 6.1341 1.778 7.112C1.778 8.0899 0.98679 8.89 0 8.89V12.446C0 13.4239 0.8001 14.224 1.778 14.224H16.002C16.9799 14.224 17.78 13.4239 17.78 12.446V8.89C16.8021 8.89 16.002 8.0899 16.002 7.112C16.002 6.1341 16.8021 5.334 17.78 5.334ZM16.002 4.03606C14.9441 4.64947 14.224 5.80517 14.224 7.112C14.224 8.41883 14.9441 9.57453 16.002 10.1879V12.446H1.778V10.1879C2.83591 9.57453 3.556 8.41883 3.556 7.112C3.556 5.79628 2.8448 4.64947 1.78689 4.03606L1.778 1.778H16.002V4.03606ZM6.28523 10.668L8.89 8.99668L11.4948 10.668L10.7036 7.68096L13.095 5.72516L10.0101 5.53847L8.89 2.667L7.76097 5.52958L4.67614 5.71627L7.06755 7.67207L6.28523 10.668Z" fill="white"/>
              </svg>
              <span class="text-secondary ms-10" v-text="(form.data.category) ? form.data.category : 'Kategori'"></span>                
            </div>
            <div class="d-flex align-items-center ms-30">
              <svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="Vector" d="M8.89 1.61636C11.953 1.61636 14.6847 3.33779 16.0182 6.06136C14.6847 8.78494 11.953 10.5064 8.89 10.5064C5.82699 10.5064 3.09534 8.78494 1.76184 6.06136C3.09534 3.33779 5.82699 1.61636 8.89 1.61636ZM8.89 0C4.84909 0 1.39815 2.51345 0 6.06136C1.39815 9.60928 4.84909 12.1227 8.89 12.1227C12.9309 12.1227 16.3818 9.60928 17.78 6.06136C16.3818 2.51345 12.9309 0 8.89 0ZM8.89 4.04091C10.0053 4.04091 10.9105 4.94607 10.9105 6.06136C10.9105 7.17665 10.0053 8.08182 8.89 8.08182C7.77471 8.08182 6.86955 7.17665 6.86955 6.06136C6.86955 4.94607 7.77471 4.04091 8.89 4.04091ZM8.89 2.42455C6.88571 2.42455 5.25318 4.05707 5.25318 6.06136C5.25318 8.06565 6.88571 9.69818 8.89 9.69818C10.8943 9.69818 12.5268 8.06565 12.5268 6.06136C12.5268 4.05707 10.8943 2.42455 8.89 2.42455Z" fill="white"/>
              </svg>                  
              <span class="text-secondary ms-10" v-text="(form.data.subcategory) ? form.data.subcategory : 'Jenis'"></span>                
            </div>
          </div>
        </div>
        <!-- Event Powered By -->
        <div class="col-5 pt-20 pb-20 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Powered By</label>
          <div class="d-flex">
            <label for="input-powered" class="cursor-pointer">
              <img :src='(form.data.powered_by_image && form.data.powered_by_image != "default") ? form.data.powered_by_image : "{{ url('assets/images/events/powered.png') }}"' alt="" class="w-60 h-60 br-100 me-15">
            </label>
            <input type="file" @change="previewImagePowered" class="d-none" id="input-powered">
            <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="PT Tiket" v-model="form.data.powered_by">
          </div>
        </div>
        <!-- Tanggal dan Waktu -->
        <div class="col-7 pt-20 pb-20 border-bottom border-primary">
          <div class="row">
            <div class="col-6" data-bs-toggle="modal" data-bs-target="#tanggalWaktuModal">
              <label class="fs-20 fw-600 text-light wp-100 cursor-pointer">Tanggal & Waktu</label>
              <div class="d-flex flex-column py-10 cursor-pointer">
                <div class="d-flex align-items-center" v-if="form.data.type == 'event'">
                  <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                  </svg>                      
                  <span class="text-secondary ms-10" v-text="(form.data.date_start) ? form.data.date_start : 'Pilih Tanggal'"></span>                
                </div>
                <div class="d-flex align-items-center mt-10">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="bxs:time">
                    <path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"/>
                    </g>
                  </svg>                                       
                  <span class="text-secondary ms-10"><span v-text="(form.data.time_start) ? form.data.time_start :'--:--'"></span>-<span v-text="(form.data.time_end) ? form.data.time_end :'--:--'"></span></span>                
                </div>
              </div>
            </div>
            <div class="col-6" data-bs-toggle="modal" data-bs-target="#lokasiModal">
              <label class="fs-20 fw-600 text-light wp-100 cursor-pointer">Lokasi</label>
              <div class="d-flex flex-column py-10 cursor-pointer">
                <div class="d-flex align-items-center">
                  <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="Vector" d="M11.6019 4.66706L12.0464 6.88956H1.73396L2.17846 4.66706H11.6019ZM12.8168 0.962891H0.96349V2.44456H12.8168V0.962891ZM12.8168 3.18539H0.96349L0.222656 6.88956V8.37122H0.96349V12.8162H8.37182V8.37122H11.3352V12.8162H12.8168V8.37122H13.5577V6.88956L12.8168 3.18539ZM2.44516 11.3346V8.37122H6.89016V11.3346H2.44516Z" fill="white"/>
                  </svg>                                     
                  <span class="text-secondary ms-10" v-text="(form.data.location_name) ? form.data.location_name : 'Lokasi'"></span>                
                </div>
                <div class="d-flex align-items-center mt-10">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="carbon:location-filled">
                    <path id="Vector" d="M8.83635 1.10938C7.22584 1.11129 5.68184 1.75575 4.54304 2.90139C3.40424 4.04703 2.76363 5.6003 2.76173 7.22049C2.7598 8.5445 3.1897 9.83259 3.98549 10.8872C3.98549 10.8872 4.15116 11.1066 4.17822 11.1383L8.83635 16.6649L13.4967 11.1355C13.521 11.106 13.6872 10.8872 13.6872 10.8872L13.6878 10.8855C14.4832 9.83138 14.9129 8.54389 14.911 7.22049C14.9091 5.6003 14.2685 4.04703 13.1297 2.90139C11.9909 1.75575 10.4469 1.11129 8.83635 1.10938ZM8.83635 9.44271C8.39946 9.44271 7.97238 9.31238 7.60912 9.06819C7.24586 8.82401 6.96273 8.47695 6.79554 8.07089C6.62835 7.66483 6.58461 7.21802 6.66984 6.78695C6.75507 6.35588 6.96546 5.95992 7.27438 5.64914C7.58331 5.33835 7.97691 5.12671 8.40541 5.04096C8.8339 4.95522 9.27805 4.99922 9.68168 5.16742C10.0853 5.33561 10.4303 5.62044 10.673 5.98589C10.9158 6.35133 11.0453 6.78097 11.0453 7.22049C11.0446 7.80963 10.8116 8.37443 10.3975 8.79102C9.98341 9.20761 9.42198 9.44197 8.83635 9.44271Z" fill="white"/>
                    </g>
                  </svg>
                  <span class="text-secondary ms-10" v-text="(form.data.location_city) ? form.data.location_city : 'Kota'"></span>                
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Desc and TOC -->
        <div class="col-12 pt-20 pb-20 border-bottom border-primary">
          <label class="fs-20 fw-600 text-light wp-100">Detil</label>
          <div class="d-flex bg-secondary p-10 mt-15 br-tl-10 br-tr-10">
            <button class="nav-link fs-16 text-light me-35" :class="(detilForm == 'description') ? 'fw-700' : 'fw-400'" @click="detilForm = 'description'">Deskripsi</button>
            <button class="nav-link fs-16 text-light" :class="(detilForm == 'toc') ? 'fw-700' : 'fw-400'" @click="detilForm = 'toc'">Terms & Condition</button>
          </div>
          <div class="tab-content br-br-10 br-bl-10 overflow-hidden">
            <div class="tab-pane fade" :class="(detilForm == 'description') ? 'show active' : ''">
              <ckeditor :editor="editor" v-model="form.data.description" :config="editorConfig"></ckeditor>
            </div>
            <div class="tab-pane fade" :class="(detilForm == 'toc') ? 'show active' : ''">
              <ckeditor :editor="editor" v-model="form.data.toc" :config="editorConfig"></ckeditor>
            </div>
          </div>
        </div>
        <!-- Ticket -->
        <div class="col-12 pt-20 pb-20 border-bottom border-primary">
          <div class="row">
            <div class="col-5">
              <label class="fs-20 fw-600 text-light wp-100">Data Tiket</label>
            </div>
            <div class="col-7 text-end">
              <button class="btn btn-primary fs-16 fw-700 me-20" data-bs-toggle="modal" data-bs-target="#tiketBerbayarModal" @click="ticket_index=null;clearTicketForm()">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"/>
                </svg>                    
                Buat Tiket Berbayar
              </button>
              <button class="btn btn-primary fs-16 fw-700" data-bs-toggle="modal" data-bs-target="#freeGiftModal" @click="ticket_index=null;clearTicketForm()">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"/>
                </svg>                    
                Buat Tiket Free
              </button>
            </div>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-center text-center pt-60 pb-40" v-if="form.data.ticket < 1">
            <h5 class="text-secondary max-w-350 fs-16 fw-600">Tiket Masih Kosong</h5>
            <p class="text-secondary max-w-350 fs-12 fw-400">Tiket Anda masih kosong, silahkan buat tiket berbayar atau free sekarang! klik tombol di atas.</p>
          </div>
          <div class="py-45 row" v-else>
            <div class="col-12" v-for="(ticket, index) in form.data.ticket" :key="index" v-show="!ticket.deleted">
              <div class="p-20 d-flex border border-secondary br-10 wp-100 justify-content-between" :class="(index+1 == form.data.ticket.length) ? 'mb-0' : 'mb-20'">
                <div class="max-wp-70 d-flex flex-column">
                  <h6 class="fs-20 fw-700 text-light" v-text="ticket.name"></h6>
                  <div class="d-flex mt-20 align-items-center">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                    </svg>
                    <span class="fs-18 fw-400 text-light ms-10" v-text="`Tiket berlaku sampai ${ticket.date_end}`"></span>
                  </div>
                  <div class="d-flex mt-10 align-items-center">
                    <svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M6.33398 3.51562C6.33398 1.57397 8.03545 0 10.1344 0C12.2333 0 13.9348 1.57397 13.9348 3.51562C13.9348 5.45723 12.2333 7.03125 10.1344 7.03125C8.03545 7.03125 6.33398 5.45723 6.33398 3.51562ZM19.774 3.58267C19.1144 2.97246 18.045 2.97246 17.3854 3.58267L12.8129 7.8125H7.45584L2.88338 3.58267C2.2238 2.97246 1.1543 2.97246 0.494724 3.58267C-0.164908 4.19287 -0.164908 5.18218 0.494724 5.79238L5.48945 10.4128V23.4375C5.48945 24.3004 6.24567 25 7.17851 25H8.02305C8.95588 25 9.71211 24.3004 9.71211 23.4375V17.9688H10.5566V23.4375C10.5566 24.3004 11.3129 25 12.2457 25H13.0902C14.0231 25 14.7793 24.3004 14.7793 23.4375V10.4128L19.774 5.79233C20.4337 5.18213 20.4337 4.19287 19.774 3.58267V3.58267Z" fill="white"/>
                    </svg>
                    <span class="fs-18 fw-400 text-light ms-10" v-text="`${ticket.description}`"></span>                   
                  </div>
                  <div class="d-flex mt-10 align-items-center">
                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M19.666 10.8589H10.8244L16.7127 16.8174C16.9378 17.0452 17.3081 17.0636 17.5395 16.8431C18.9815 15.4683 19.9734 13.6151 20.2644 11.5319C20.3144 11.1752 20.0219 10.8589 19.666 10.8589V10.8589ZM19.0762 8.41562C18.7691 3.91137 15.2122 0.312053 10.761 0.00136342C10.4212 -0.0223907 10.135 0.267561 10.135 0.612185V9.04906H18.4729C18.8135 9.04906 19.0997 8.75949 19.0762 8.41562ZM8.34652 10.8589V1.91188C8.34652 1.55179 8.03391 1.25581 7.68179 1.30633C3.24141 1.94129 -0.152688 5.86676 0.00529796 10.5712C0.167756 15.4027 4.27875 19.3648 9.0556 19.3041C10.9335 19.2803 12.6688 18.668 14.0955 17.6439C14.3899 17.4328 14.4092 16.9943 14.154 16.736L8.34652 10.8589Z" fill="white"/>
                    </svg>
                    <span class="fs-18 fw-400 text-light ms-10" v-text="`${ticket.quota} Tiket`"></span>
                  </div>
                </div>
                <div class="max-wp-30 d-flex flex-column align-items-end">
                  <a href="#" class="text-decoration-none text-secondary fs-12 fw-400">Lihat detil tiket</a>
                  <h6 class="fs-18 fw-700 text-light mt-10" v-text="(ticket.type == 'paid') ? `IDR ${ticket.price}` : `Free`"></h6>
                  <div class="d-flex align-items-center mt-10">
                    <button class="btn btn-sm btn-secondary p-10 br-10">
                      <svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M8.89 1.61636C11.953 1.61636 14.6847 3.33779 16.0182 6.06136C14.6847 8.78494 11.953 10.5064 8.89 10.5064C5.82699 10.5064 3.09534 8.78494 1.76184 6.06136C3.09534 3.33779 5.82699 1.61636 8.89 1.61636ZM8.89 0C4.84909 0 1.39815 2.51345 0 6.06136C1.39815 9.60928 4.84909 12.1227 8.89 12.1227C12.9309 12.1227 16.3818 9.60928 17.78 6.06136C16.3818 2.51345 12.9309 0 8.89 0ZM8.89 4.04091C10.0053 4.04091 10.9105 4.94607 10.9105 6.06136C10.9105 7.17665 10.0053 8.08182 8.89 8.08182C7.77471 8.08182 6.86955 7.17665 6.86955 6.06136C6.86955 4.94607 7.77471 4.04091 8.89 4.04091ZM8.89 2.42455C6.88571 2.42455 5.25318 4.05707 5.25318 6.06136C5.25318 8.06565 6.88571 9.69818 8.89 9.69818C10.8943 9.69818 12.5268 8.06565 12.5268 6.06136C12.5268 4.05707 10.8943 2.42455 8.89 2.42455Z" fill="white"/>
                      </svg>                        
                      Hide
                    </button>
                    <button class="btn btn-sm btn-danger p-10 br-10 ms-5">
                      <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"/>
                      </svg>                                              
                      Sold
                    </button>
                    <button class="btn btn-sm btn-primary p-10 br-10 ms-5" >
                      <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M17.78 6.2217V2.6657C17.78 1.67891 16.9799 0.887695 16.002 0.887695H1.778C0.8001 0.887695 0.00888999 1.67891 0.00888999 2.6657V6.2217C0.98679 6.2217 1.778 7.0218 1.778 7.9997C1.778 8.9776 0.98679 9.7777 0 9.7777V13.3337C0 14.3116 0.8001 15.1117 1.778 15.1117H16.002C16.9799 15.1117 17.78 14.3116 17.78 13.3337V9.7777C16.8021 9.7777 16.002 8.9776 16.002 7.9997C16.002 7.0218 16.8021 6.2217 17.78 6.2217ZM16.002 4.92376C14.9441 5.53717 14.224 6.69287 14.224 7.9997C14.224 9.30653 14.9441 10.4622 16.002 11.0756V13.3337H1.778V11.0756C2.83591 10.4622 3.556 9.30653 3.556 7.9997C3.556 6.68398 2.8448 5.53717 1.78689 4.92376L1.778 2.6657H16.002V4.92376ZM8.001 10.6667H9.779V12.4447H8.001V10.6667ZM8.001 7.1107H9.779V8.8887H8.001V7.1107ZM8.001 3.5547H9.779V5.3327H8.001V3.5547Z" fill="white"/>
                      </svg>
                      Jual
                    </button>
                  </div>
                  <div class="d-flex align-items-center mt-10">
                    <a href="#" title="Update" data-bs-toggle="modal" :data-bs-target="(ticket.type == 'paid') ? '#tiketBerbayarModal' : '#freeGiftModal'" @click="updateTicket(ticket, index)">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="edit" clip-path="url(#clip0_417_1078)">
                        <path id="Vector" d="M11.9801 3.42788L14.6642 6.11196C14.7773 6.22503 14.7773 6.40952 14.6642 6.5226L8.16531 13.0215L5.40386 13.328C5.03487 13.3697 4.72243 13.0572 4.76409 12.6882L5.07058 9.9268L11.5695 3.42788C11.6826 3.3148 11.8671 3.3148 11.9801 3.42788ZM16.8008 2.74645L15.3486 1.29431C14.8963 0.842002 14.1613 0.842002 13.706 1.29431L12.6527 2.3477C12.5396 2.46078 12.5396 2.64527 12.6527 2.75835L15.3367 5.44242C15.4498 5.5555 15.6343 5.5555 15.7474 5.44242L16.8008 4.38903C17.2531 3.93375 17.2531 3.19875 16.8008 2.74645ZM11.4267 11.254V14.2832H1.90444V4.76099H8.74259C8.83781 4.76099 8.92708 4.72231 8.99552 4.65684L10.1858 3.46656C10.412 3.24041 10.2513 2.85655 9.93287 2.85655H1.42833C0.639774 2.85655 0 3.49632 0 4.28488V14.7593C0 15.5479 0.639774 16.1877 1.42833 16.1877H11.9028C12.6913 16.1877 13.3311 15.5479 13.3311 14.7593V10.0637C13.3311 9.74528 12.9472 9.58757 12.7211 9.81074L11.5308 11.001C11.4654 11.0695 11.4267 11.1587 11.4267 11.254Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_417_1078">
                        <rect width="17.14" height="17.14" fill="white"/>
                        </clipPath>
                        </defs>
                      </svg>                        
                    </a>
                    <span class="ms-10 cursor-pointer" title="Delete" @click="removeTicket(index)">
                      <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M1.07143 15.5357C1.07143 15.962 1.24075 16.3707 1.54215 16.6721C1.84355 16.9735 2.25233 17.1429 2.67857 17.1429H12.3214C12.7477 17.1429 13.1565 16.9735 13.4578 16.6721C13.7592 16.3707 13.9286 15.962 13.9286 15.5357V4.28572H1.07143V15.5357ZM10.1786 6.96429C10.1786 6.82221 10.235 6.68595 10.3355 6.58548C10.4359 6.48502 10.5722 6.42858 10.7143 6.42858C10.8564 6.42858 10.9926 6.48502 11.0931 6.58548C11.1936 6.68595 11.25 6.82221 11.25 6.96429V14.4643C11.25 14.6064 11.1936 14.7426 11.0931 14.8431C10.9926 14.9436 10.8564 15 10.7143 15C10.5722 15 10.4359 14.9436 10.3355 14.8431C10.235 14.7426 10.1786 14.6064 10.1786 14.4643V6.96429ZM6.96429 6.96429C6.96429 6.82221 7.02073 6.68595 7.12119 6.58548C7.22166 6.48502 7.35792 6.42858 7.5 6.42858C7.64208 6.42858 7.77834 6.48502 7.87881 6.58548C7.97927 6.68595 8.03571 6.82221 8.03571 6.96429V14.4643C8.03571 14.6064 7.97927 14.7426 7.87881 14.8431C7.77834 14.9436 7.64208 15 7.5 15C7.35792 15 7.22166 14.9436 7.12119 14.8431C7.02073 14.7426 6.96429 14.6064 6.96429 14.4643V6.96429ZM3.75 6.96429C3.75 6.82221 3.80644 6.68595 3.90691 6.58548C4.00737 6.48502 4.14363 6.42858 4.28571 6.42858C4.42779 6.42858 4.56406 6.48502 4.66452 6.58548C4.76499 6.68595 4.82143 6.82221 4.82143 6.96429V14.4643C4.82143 14.6064 4.76499 14.7426 4.66452 14.8431C4.56406 14.9436 4.42779 15 4.28571 15C4.14363 15 4.00737 14.9436 3.90691 14.8431C3.80644 14.7426 3.75 14.6064 3.75 14.4643V6.96429ZM14.4643 1.07143H10.4464L10.1317 0.445318C10.065 0.311462 9.96233 0.198864 9.83515 0.120193C9.70798 0.0415218 9.56137 -0.000101383 9.41183 5.87033e-06H5.58482C5.43562 -0.000567697 5.28927 0.0409003 5.16255 0.119659C5.03582 0.198417 4.93385 0.311281 4.8683 0.445318L4.55357 1.07143H0.535714C0.393634 1.07143 0.257373 1.12788 0.156907 1.22834C0.0564412 1.32881 0 1.46507 0 1.60715L0 2.67858C0 2.82066 0.0564412 2.95692 0.156907 3.05738C0.257373 3.15785 0.393634 3.21429 0.535714 3.21429H14.4643C14.6064 3.21429 14.7426 3.15785 14.8431 3.05738C14.9436 2.95692 15 2.82066 15 2.67858V1.60715C15 1.46507 14.9436 1.32881 14.8431 1.22834C14.7426 1.12788 14.6064 1.07143 14.4643 1.07143V1.07143Z" fill="white"/>
                      </svg>                                              
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Form Order Data -->
        <div class="col-12 pt-20 pb-20 border-bottom border-primary">
          <div class="row align-items-center">
            <div class="col-5">
              <label class="fs-20 fw-600 text-light wp-100">Form Order Data</label>
            </div>
            <div class="col-7 text-end">
              <div class="fs-12 fw-400 text-secondary">Addkan Formulir Order Data dimenu <a href="#" class="text-light">Custome Form</a></div>
            </div>
          </div>
          <div class="row mt-20">
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Full Name" id="fullname" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="fullname">
                  Full Name
                </label>
              </div>
            </div>
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Gender" id="gender" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="gender">
                  Gender
                </label>
              </div>
            </div>
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="NIK" id="nik" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="nik">
                  NIK
                </label>
              </div>
            </div>
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="No Handphone" id="nohp" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="nohp">
                  No Handphone
                </label>
              </div>
            </div>
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tanggal Lahir" id="tgllahir" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="tgllahir">
                  Tanggal Lahir
                </label>
              </div>
            </div>
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Email" id="email" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="email">
                  Email
                </label>
              </div>
            </div>
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Domisili" id="domisili" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="domisili">
                  Domisili
                </label>
              </div>
            </div>
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Custom Field 1" id="cf1" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="cf1">
                  Custom Field 1
                </label>
              </div>
            </div>
            <div class="col-4 py-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Custom Field 2" id="cf2" v-model="form.data.form_order">
                <label class="form-check-label fs-16 fw-400 text-light" for="cf2">
                  Custom Field 2
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- Ticket Settings -->
        <div class="col-12 pt-20 pb-20">
          <label class="fs-20 fw-600 text-light wp-100">Pengaturan Tiket</label>
          <div class="d-flex align-items-center justify-content-between mt-20">
            <span class="fs-16 fw-400 text-light">Jumlah maksimal tiket dapat dibeli dalam 1 transaksi</span>
            <select class="border border-light bg-transparent p-10 text-light fs-14 fw-400 br-10 bg-dark" v-model="form.data.max_ticket">
              <option :value="max_ticket" class="bg-dark" v-for="(max_ticket,idx) in opt.max_ticket" :key="idx" v-text="max_ticket"/>
            </select>
          </div>
          <div class="d-flex align-items-center justify-content-between mt-15">
            <span class="fs-16 fw-400 text-light">1 akun email hanya 1 kali transaksi</span>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="oneemailonetrans" v-model="form.data.one_email_one_transaction">
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mt-15">
            <span class="fs-16 fw-400 text-light">1 tiket hanya 1 order data</span>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="oneticketoneorder" v-model="form.data.one_ticket_one_order">
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mt-15">
            <span class="fs-16 fw-400 text-light">Aktifkan Peduli Lindungi</span>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="pedulilindungi" v-model="form.data.peduli_lindungi">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Kategori -->
    <div class="modal fade" id="jenisKategoriModal" tabindex="-1" aria-labelledby="jenisKategoriModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-bg-black-choco max-w-570">
        <div class="modal-content">
          <div class="modal-header border-bottom border-primary pt-30 pb-20 px-30 position-relative">
            <h5 class="modal-title text-center text-light fs-20 fw-600 wp-100" id="jenisKategoriModalLabel">Kategori & Jenis</h5>
            <button type="button" class="btn-close btn-close-white position-absolute right-30" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-30 pt-40">
            <div class="form-group">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Kategori</label>
              <select class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100 bg-dark" v-model="form.data.category">
                <option :value="category" class="bg-dark" v-for="(category,idx) in opt.category" :key="idx" v-text="category"/>
              </select>
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Subkategori</label>
              <select class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100 bg-dark" v-model="form.data.subcategory">
                <option :value="subcategory" class="bg-dark" v-for="(subcategory,idx) in opt.subcategory" :key="idx" v-text="subcategory"/>
              </select>
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Kata Kunci</label>
              <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="Masukan kata kunci dengan pemisah koma (,)" v-model="form.data.keyword">
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Jenis</label>
              <div class="row">
                <div class="col-6 border-end border-primary d-flex">
                  <div class="form-check wp-50">
                    <input class="form-check-input" type="radio" value="1" name="is_public" id="jenis_public" v-model="form.data.is_public">
                    <label class="form-check-label fs-16 fw-400 text-light" for="jenis_public">
                      Public
                    </label>
                  </div>
                  <div class="form-check wp-50">
                    <input class="form-check-input" type="radio" value="0" name="is_public" id="jenis_private" v-model="form.data.is_public">
                    <label class="form-check-label fs-16 fw-400 text-light" for="jenis_private">
                      Private
                    </label>
                  </div>
                </div>
                <div class="col-6 d-flex">
                  <div class="form-check wp-50">
                    <input class="form-check-input" type="radio" value="1" name="is_offline" id="type_offline" v-model="form.data.is_offline">
                    <label class="form-check-label fs-16 fw-400 text-light" for="type_offline">
                      Offline
                    </label>
                  </div>
                  <div class="form-check wp-50">
                    <input class="form-check-input" type="radio" value="0" name="is_offline" id="type_online" v-model="form.data.is_offline">
                    <label class="form-check-label fs-16 fw-400 text-light" for="type_online">
                      Online
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer text-center justify-content-center pt-50 pb-45 border-top-0">
            <button type="button" class="btn btn-primary max-w-430 wp-100 fs-16 fw-600 py-13" data-bs-dismiss="modal">Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Lokasi -->
    <div class="modal fade" id="lokasiModal" tabindex="-1" aria-labelledby="lokasiModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-bg-black-choco max-w-570">
        <div class="modal-content">
          <div class="modal-header border-bottom border-primary pt-30 pb-20 px-30 position-relative">
            <h5 class="modal-title text-center text-light fs-20 fw-600 wp-100" id="lokasiModalLabel">Lokasi</h5>
            <button type="button" class="btn-close btn-close-white position-absolute right-30" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-30 pt-40">
            <div class="form-group">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Nama Lokasi</label>
              <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g GBK" v-model="form.data.location_name">
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Alamat</label>
              <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g Jl Gatot Subroto" v-model="form.data.location_address">
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Kota</label>
              <select class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100 bg-dark" v-model="form.data.location_city">
                <option :value="city" class="bg-dark" v-for="(city,idx) in opt.city" :key="idx" v-text="city"/>
              </select>
              <div id="lokasi-event" class="wp-100 h-300"></div>
              {{-- <img src="{{ url('assets/images/events/peta.png') }}" alt="" class="img-fluid wp-100 mt-15"> --}}
              <span class="text-light wp-100 d-block mt-15 fs-12 fw-400 text-center">Jika lokasi tidak akurat, silahkan geser map pointer!</span>
            </div>
          </div>
          <div class="modal-footer text-center justify-content-center pt-50 pb-45 border-top-0">
            <button type="button" class="btn btn-primary max-w-430 wp-100 fs-16 fw-600 py-13" data-bs-dismiss="modal">Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Tanggal Waktu -->
    <div class="modal fade" id="tanggalWaktuModal" tabindex="-1" aria-labelledby="tanggalWaktuModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-bg-black-choco max-w-570">
        <div class="modal-content">
          <div class="modal-header border-bottom border-primary pt-30 pb-20 px-30 position-relative">
            <h5 class="modal-title text-center text-light fs-20 fw-600 wp-100" id="tanggalWaktuModalLabel">Tanggal & Waktu</h5>
            <button type="button" class="btn-close btn-close-white position-absolute right-30" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-30 pt-40">
            <div class="form-group pb-20 border-bottom border-primary" v-if="form.data.type == 'event'">
              <label class="fs-20 fw-600 text-light mb-20 form-label">Tanggal</label>
              <div class="row">
                <div class="col-6">
                  <label class="fs-14 fw-400 text-light mb-10">Tanggal Mulai</label>
                  <div class="d-flex align-items-center">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                    </svg>  
                    <input type="date" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="form.data.date_start">                    
                  </div>
                </div>
                <div class="col-6">
                  <label class="fs-14 fw-400 text-light mb-10">Tanggal Berakhir</label>
                  <div class="d-flex align-items-center">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                    </svg>  
                    <input type="date" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="form.data.date_end">                    
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group pb-20 border-bottom border-primary mt-20">
              <label class="fs-20 fw-600 text-light mb-20 form-label">Waktu</label>
              <div class="row">
                <div class="col-6">
                  <label class="fs-14 fw-400 text-light mb-10">Waktu Mulai</label>
                  <div class="d-flex align-items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="bxs:time">
                      <path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"/>
                      </g>
                    </svg>                      
                    <input type="time" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="form.data.time_start">                    
                  </div>
                </div>
                <div class="col-6">
                  <label class="fs-14 fw-400 text-light mb-10">Waktu Berakhir</label>
                  <div class="d-flex align-items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="bxs:time">
                      <path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"/>
                      </g>
                    </svg>                       
                    <input type="time" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="form.data.time_end">                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer text-center justify-content-center pt-50 pb-45 border-top-0">
            <button type="button" class="btn btn-primary max-w-430 wp-100 fs-16 fw-600 py-13" data-bs-dismiss="modal">Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Tiket Berbayar -->
    <div class="modal fade" id="tiketBerbayarModal" tabindex="-1" aria-labelledby="tiketBerbayarModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-bg-black-choco max-w-800">
        <div class="modal-content">
          <div class="modal-header border-bottom border-primary pt-30 pb-20 px-30 position-relative">
            <h5 class="modal-title text-center text-light fs-20 fw-600 wp-100" id="tiketBerbayarModalLabel">Tiket Berbayar</h5>
            <button type="button" class="btn-close btn-close-white position-absolute right-30" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-30 pt-40">
            <div class="form-group">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Image</label>
              <label class="d-flex justify-content-center align-items-center bg-primary overflow-hidden br-6 cursor-pointer">
                <img :src="ticket_paid.image" v-if="ticket_paid.image && ticket_paid.image != 'default'" class="wp-100">
                <svg v-else width="200" height="155" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto my-50">
                  <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                </svg>
                <input type="file" class="d-none" id="image_ticket_paid" @change="ticketImage('paid',event)">
              </label>
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Nama Tiket</label>
              <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g GA (Standing)" v-model="ticket_paid.name">
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Kuota Tiket</label>
              <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g 1000" :value="ticket_paid_quota" @keyup="onChangeThousand('ticketpaid_quota',event)" @keypress="NumbersOnly">
            </div>
            <div class="row mt-20 g-0">
              <div class="col-6 border-bottom border-primary">
                <div class="form-group">
                  <label class="fs-20 fw-600 text-light mb-10 form-label">Harga Tiket</label>
                  <input type="text" class="border-0 bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g 500.000" :value="ticket_paid_price" @keyup="onChangeThousand('ticketpaid_price',event)" @keypress="NumbersOnly">
                </div>
              </div>
              <div class="col-6 border-bottom border-primary">
                <div class="form-group">
                  <label class="fs-20 fw-600 text-light mb-10 form-label">Tax Tiket</label>
                  <div class="row align-items-center">
                    <div class="col-7 border-end">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="tax_use" v-model="ticket_paid.tax">
                        <label class="form-check-label fs-16 fw-400 text-light" for="tax_use">
                          Gunakan
                        </label>
                      </div>
                    </div>
                    <div class="col-5">
                      <input type="text" class="border-0 bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g 5%" v-model="ticket_paid.tax_amount">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group pb-20 border-bottom border-primary mt-20">
              <label class="fs-20 fw-600 text-light mb-20 form-label">Tanggal Penjualan</label>
              <div class="row">
                <div class="col-3">
                  <label class="fs-14 fw-400 text-light mb-10">Tanggal Mulai</label>
                  <div class="d-flex align-items-center">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                    </svg>  
                    <input type="date" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="ticket_paid.date_start">                    
                  </div>
                </div>
                <div class="col-3">
                  <label class="fs-14 fw-400 text-light mb-10">Tanggal Berakhir</label>
                  <div class="d-flex align-items-center">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                    </svg>  
                    <input type="date" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="ticket_paid.date_end">                    
                  </div>
                </div>
                <div class="col-3">
                  <label class="fs-14 fw-400 text-light mb-10">Waktu Mulai</label>
                  <div class="d-flex align-items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="bxs:time">
                      <path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"/>
                      </g>
                    </svg>                      
                    <input type="time" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="ticket_paid.time_start">                    
                  </div>
                </div>
                <div class="col-3">
                  <label class="fs-14 fw-400 text-light mb-10">Waktu Berakhir</label>
                  <div class="d-flex align-items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="bxs:time">
                      <path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"/>
                      </g>
                    </svg>                       
                    <input type="time" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="ticket_paid.time_end">                    
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Deskripsi Tiket</label>
              <textarea rows="5" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g berlaku untuk tiket tertentu" v-model="ticket_paid.description"></textarea>
            </div>
            <div class="form-group mt-20" v-if="form.data.type == 'event'">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Seat</label>
              <div class="row g-0">
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label"></label>
                </div>
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label">Section</label>
                </div>
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label">Row</label>
                </div>
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label">Jumlah Seat</label>
                </div>
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label">Harga</label>
                </div>
                <div class="col-1">

                </div>
              </div>
              <div class="row align-items-center py-10 border-bottom border-primary g-0" v-for="(seat,index) in ticket_paid.seats" :key="index" v-show="!seat.deleted">
                <div class="col">
                  <label class="w-100 d-flex align-items-center justify-content-between bg-primary br-6 cursor-pointer overflow-hidden">
                    <img :src="seat.image" v-if="seat.image && seat.image != 'default'" class="w-100">
                    <svg v-else width="40" height="31" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto my-15">
                      <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                    </svg>
                    <input type="file" :id="`seat-${index}`" class="d-none" @change="seatImage('paid',index, event)">
                  </label>
                </div>
                <div class="col">
                  <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="E.g: 300" v-model="seat.section">
                </div>
                <div class="col">
                  <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="E.g: A" v-model="seat.row">
                </div>
                <div class="col">
                  <input type="number" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="E.g: 10" v-model="seat.seat">
                </div>
                <div class="col">
                  <input type="number" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="E.g: 200.000" v-model="seat.price">
                </div>
                <div class="col-1">
                  <a href="#" @click="removeSeat('paid',index)">
                    <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" d="M1.07143 15.5357C1.07143 15.962 1.24075 16.3707 1.54215 16.6721C1.84355 16.9735 2.25233 17.1429 2.67857 17.1429H12.3214C12.7477 17.1429 13.1565 16.9735 13.4578 16.6721C13.7592 16.3707 13.9286 15.962 13.9286 15.5357V4.28572H1.07143V15.5357ZM10.1786 6.96429C10.1786 6.82221 10.235 6.68595 10.3355 6.58548C10.4359 6.48502 10.5722 6.42858 10.7143 6.42858C10.8564 6.42858 10.9926 6.48502 11.0931 6.58548C11.1936 6.68595 11.25 6.82221 11.25 6.96429V14.4643C11.25 14.6064 11.1936 14.7426 11.0931 14.8431C10.9926 14.9436 10.8564 15 10.7143 15C10.5722 15 10.4359 14.9436 10.3355 14.8431C10.235 14.7426 10.1786 14.6064 10.1786 14.4643V6.96429ZM6.96429 6.96429C6.96429 6.82221 7.02073 6.68595 7.12119 6.58548C7.22166 6.48502 7.35792 6.42858 7.5 6.42858C7.64208 6.42858 7.77834 6.48502 7.87881 6.58548C7.97927 6.68595 8.03571 6.82221 8.03571 6.96429V14.4643C8.03571 14.6064 7.97927 14.7426 7.87881 14.8431C7.77834 14.9436 7.64208 15 7.5 15C7.35792 15 7.22166 14.9436 7.12119 14.8431C7.02073 14.7426 6.96429 14.6064 6.96429 14.4643V6.96429ZM3.75 6.96429C3.75 6.82221 3.80644 6.68595 3.90691 6.58548C4.00737 6.48502 4.14363 6.42858 4.28571 6.42858C4.42779 6.42858 4.56406 6.48502 4.66452 6.58548C4.76499 6.68595 4.82143 6.82221 4.82143 6.96429V14.4643C4.82143 14.6064 4.76499 14.7426 4.66452 14.8431C4.56406 14.9436 4.42779 15 4.28571 15C4.14363 15 4.00737 14.9436 3.90691 14.8431C3.80644 14.7426 3.75 14.6064 3.75 14.4643V6.96429ZM14.4643 1.07143H10.4464L10.1317 0.445318C10.065 0.311462 9.96233 0.198864 9.83515 0.120193C9.70798 0.0415218 9.56137 -0.000101383 9.41183 5.87033e-06H5.58482C5.43562 -0.000567697 5.28927 0.0409003 5.16255 0.119659C5.03582 0.198417 4.93385 0.311281 4.8683 0.445318L4.55357 1.07143H0.535714C0.393634 1.07143 0.257373 1.12788 0.156907 1.22834C0.0564412 1.32881 0 1.46507 0 1.60715L0 2.67858C0 2.82066 0.0564412 2.95692 0.156907 3.05738C0.257373 3.15785 0.393634 3.21429 0.535714 3.21429H14.4643C14.6064 3.21429 14.7426 3.15785 14.8431 3.05738C14.9436 2.95692 15 2.82066 15 2.67858V1.60715C15 1.46507 14.9436 1.32881 14.8431 1.22834C14.7426 1.12788 14.6064 1.07143 14.4643 1.07143V1.07143Z" fill="white"></path></svg>
                  </a>
                </div>
              </div>
              <div class="row pt-10">
                <div class="col">
                  <button class="btn btn-primary wp-100 btn-sm" type="button" @click="addSeat()">
                    + Add Seat
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer text-center justify-content-center pt-50 pb-45 border-top-0">
            <button type="button" class="btn btn-secondary max-w-430 wp-100 fs-16 fw-600 py-13" @click="dummyTicket('paid')">Use Dummy</button>
            <button type="button" class="btn btn-primary max-w-430 wp-100 fs-16 fw-600 py-13" data-bs-dismiss="modal" @click="addTicket('paid',ticket_index)">Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Free Gift -->
    <div class="modal fade" id="freeGiftModal" tabindex="-1" aria-labelledby="freeGiftModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-bg-black-choco max-w-800">
        <div class="modal-content">
          <div class="modal-header border-bottom border-primary pt-30 pb-20 px-30 position-relative">
            <h5 class="modal-title text-center text-light fs-20 fw-600 wp-100" id="freeGiftModalLabel">Tiket Free</h5>
            <button type="button" class="btn-close btn-close-white position-absolute right-30" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-30 pt-40">
            <div class="form-group">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Image</label>
              <label class="d-flex justify-content-center align-items-center bg-primary overflow-hidden br-6 cursor-pointer">
                <img :src="ticket_free.image" v-if="ticket_free.image && ticket_free.image != 'default'" class="wp-100">
                <svg v-else width="200" height="155" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto my-50">
                  <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                </svg>
                <input type="file" class="d-none" id="image_ticket_free" @change="ticketImage('free',event)">
              </label>
            </div>
            <div class="form-group">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Nama Tiket</label>
              <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g GA (Standing)" v-model="ticket_free.name">
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Kuota Tiket</label>
              <input type="text" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g 1000" v-model="ticket_free.quota">
            </div>
            <div class="form-group pb-20 border-bottom border-primary mt-20">
              <label class="fs-20 fw-600 text-light mb-20 form-label">Tanggal Penjualan</label>
              <div class="row">
                <div class="col-3">
                  <label class="fs-14 fw-400 text-light mb-10">Tanggal Mulai</label>
                  <div class="d-flex align-items-center">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                    </svg>  
                    <input type="date" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="ticket_free.date_start">                    
                  </div>
                </div>
                <div class="col-3">
                  <label class="fs-14 fw-400 text-light mb-10">Tanggal Berakhir</label>
                  <div class="d-flex align-items-center">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="Vector" d="M0 16.1131C0 17.0334 0.746621 17.78 1.66688 17.78H13.8906C14.8109 17.78 15.5575 17.0334 15.5575 16.1131V6.6675H0V16.1131ZM11.1125 9.30672C11.1125 9.07752 11.3 8.89 11.5292 8.89H12.9183C13.1475 8.89 13.335 9.07752 13.335 9.30672V10.6958C13.335 10.925 13.1475 11.1125 12.9183 11.1125H11.5292C11.3 11.1125 11.1125 10.925 11.1125 10.6958V9.30672ZM11.1125 13.7517C11.1125 13.5225 11.3 13.335 11.5292 13.335H12.9183C13.1475 13.335 13.335 13.5225 13.335 13.7517V15.1408C13.335 15.37 13.1475 15.5575 12.9183 15.5575H11.5292C11.3 15.5575 11.1125 15.37 11.1125 15.1408V13.7517ZM6.6675 9.30672C6.6675 9.07752 6.85502 8.89 7.08422 8.89H8.47328C8.70248 8.89 8.89 9.07752 8.89 9.30672V10.6958C8.89 10.925 8.70248 11.1125 8.47328 11.1125H7.08422C6.85502 11.1125 6.6675 10.925 6.6675 10.6958V9.30672ZM6.6675 13.7517C6.6675 13.5225 6.85502 13.335 7.08422 13.335H8.47328C8.70248 13.335 8.89 13.5225 8.89 13.7517V15.1408C8.89 15.37 8.70248 15.5575 8.47328 15.5575H7.08422C6.85502 15.5575 6.6675 15.37 6.6675 15.1408V13.7517ZM2.2225 9.30672C2.2225 9.07752 2.41002 8.89 2.63922 8.89H4.02828C4.25748 8.89 4.445 9.07752 4.445 9.30672V10.6958C4.445 10.925 4.25748 11.1125 4.02828 11.1125H2.63922C2.41002 11.1125 2.2225 10.925 2.2225 10.6958V9.30672ZM2.2225 13.7517C2.2225 13.5225 2.41002 13.335 2.63922 13.335H4.02828C4.25748 13.335 4.445 13.5225 4.445 13.7517V15.1408C4.445 15.37 4.25748 15.5575 4.02828 15.5575H2.63922C2.41002 15.5575 2.2225 15.37 2.2225 15.1408V13.7517ZM13.8906 2.2225H12.2237V0.555625C12.2237 0.250031 11.9737 0 11.6681 0H10.5569C10.2513 0 10.0012 0.250031 10.0012 0.555625V2.2225H5.55625V0.555625C5.55625 0.250031 5.30622 0 5.00062 0H3.88937C3.58378 0 3.33375 0.250031 3.33375 0.555625V2.2225H1.66688C0.746621 2.2225 0 2.96912 0 3.88938V5.55625H15.5575V3.88938C15.5575 2.96912 14.8109 2.2225 13.8906 2.2225Z" fill="white"/>
                    </svg>  
                    <input type="date" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="ticket_free.date_end">                    
                  </div>
                </div>
                <div class="col-3">
                  <label class="fs-14 fw-400 text-light mb-10">Waktu Mulai</label>
                  <div class="d-flex align-items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="bxs:time">
                      <path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"/>
                      </g>
                    </svg>                      
                    <input type="time" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="ticket_free.time_start">                    
                  </div>
                </div>
                <div class="col-3">
                  <label class="fs-14 fw-400 text-light mb-10">Waktu Berakhir</label>
                  <div class="d-flex align-items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="bxs:time">
                      <path id="Vector" d="M9.07533 1.48145C4.99037 1.48145 1.66699 4.80482 1.66699 8.88978C1.66699 12.9747 4.99037 16.2981 9.07533 16.2981C13.1603 16.2981 16.4837 12.9747 16.4837 8.88978C16.4837 4.80482 13.1603 1.48145 9.07533 1.48145ZM13.3351 9.63061H8.33449V4.44478H9.81616V8.14895H13.3351V9.63061Z" fill="white"/>
                      </g>
                    </svg>                       
                    <input type="time" class="bg-transparent border-0 text-light fs-16 fw-700 ms-10" v-model="ticket_free.time_end">                    
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group mt-20">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Deskripsi Tiket</label>
              <textarea rows="5" class="border-top-0 border-start-0 border-end-0 border-bottom border-primary bg-transparent py-12 text-light fs-16 fw-400 wp-100" placeholder="E.g berlaku untuk tiket tertentu" v-model="ticket_free.description"></textarea>
            </div>
            <div class="form-group mt-20" v-if="form.data.type == 'event'">
              <label class="fs-20 fw-600 text-light mb-10 form-label">Seat</label>
              <div class="row g-0">
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label"></label>
                </div>
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label">Section</label>
                </div>
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label">Row</label>
                </div>
                <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label">Jumlah Seat</label>
                </div>
                <!-- <div class="col">
                  <label class="fs-14 fw-600 text-light mb-10 form-label">Harga</label>
                </div> -->
                <div class="col-1">

                </div>
              </div>
              <div class="row align-items-center py-10 border-bottom border-primary g-0" v-for="(seat,index) in ticket_free.seats" :key="index" v-show="!seat.deleted">
                <div class="col">
                  <label class="w-100 d-flex align-items-center justify-content-between bg-primary br-6 cursor-pointer overflow-hidden">
                    <img :src="seat.image" v-if="seat.image && seat.image != 'default'" class="w-100">
                    <svg v-else width="40" height="31" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto my-15">
                      <path id="Vector" d="M66.6667 53.3333V55.5556C66.6667 59.2375 63.6819 62.2222 60 62.2222H6.66667C2.98472 62.2222 0 59.2375 0 55.5556V20C0 16.3181 2.98472 13.3333 6.66667 13.3333H8.88889V42.2222C8.88889 48.3489 13.8733 53.3333 20 53.3333H66.6667ZM80 42.2222V6.66667C80 2.98472 77.0153 0 73.3333 0H20C16.3181 0 13.3333 2.98472 13.3333 6.66667V42.2222C13.3333 45.9042 16.3181 48.8889 20 48.8889H73.3333C77.0153 48.8889 80 45.9042 80 42.2222ZM35.5556 13.3333C35.5556 17.0153 32.5708 20 28.8889 20C25.2069 20 22.2222 17.0153 22.2222 13.3333C22.2222 9.65139 25.2069 6.66667 28.8889 6.66667C32.5708 6.66667 35.5556 9.65139 35.5556 13.3333ZM22.2222 33.3333L29.9326 25.6229C30.5835 24.9721 31.6388 24.9721 32.2897 25.6229L37.7778 31.1111L56.5993 12.2896C57.2501 11.6387 58.3054 11.6387 58.9564 12.2896L71.1111 24.4444V40H22.2222V33.3333Z" fill="white"/>
                    </svg>
                    <input type="file" :id="`seat-${index}`" class="d-none" @change="seatImage('free',index, event)">
                  </label>
                </div>
                <div class="col">
                  <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="E.g: 300" v-model="seat.section">
                </div>
                <div class="col">
                  <input type="text" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="E.g: A" v-model="seat.row">
                </div>
                <div class="col">
                  <input type="number" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="E.g: 10" v-model="seat.seat">
                </div>
                <!-- <div class="col">
                  <input type="number" class="border-0 bg-transparent py-10 text-light wp-100" placeholder="E.g: 200.000" v-model="seat.price">
                </div> -->
                <div class="col-1">
                  <a href="#" @click="removeSeat('free',index)">
                    <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" d="M1.07143 15.5357C1.07143 15.962 1.24075 16.3707 1.54215 16.6721C1.84355 16.9735 2.25233 17.1429 2.67857 17.1429H12.3214C12.7477 17.1429 13.1565 16.9735 13.4578 16.6721C13.7592 16.3707 13.9286 15.962 13.9286 15.5357V4.28572H1.07143V15.5357ZM10.1786 6.96429C10.1786 6.82221 10.235 6.68595 10.3355 6.58548C10.4359 6.48502 10.5722 6.42858 10.7143 6.42858C10.8564 6.42858 10.9926 6.48502 11.0931 6.58548C11.1936 6.68595 11.25 6.82221 11.25 6.96429V14.4643C11.25 14.6064 11.1936 14.7426 11.0931 14.8431C10.9926 14.9436 10.8564 15 10.7143 15C10.5722 15 10.4359 14.9436 10.3355 14.8431C10.235 14.7426 10.1786 14.6064 10.1786 14.4643V6.96429ZM6.96429 6.96429C6.96429 6.82221 7.02073 6.68595 7.12119 6.58548C7.22166 6.48502 7.35792 6.42858 7.5 6.42858C7.64208 6.42858 7.77834 6.48502 7.87881 6.58548C7.97927 6.68595 8.03571 6.82221 8.03571 6.96429V14.4643C8.03571 14.6064 7.97927 14.7426 7.87881 14.8431C7.77834 14.9436 7.64208 15 7.5 15C7.35792 15 7.22166 14.9436 7.12119 14.8431C7.02073 14.7426 6.96429 14.6064 6.96429 14.4643V6.96429ZM3.75 6.96429C3.75 6.82221 3.80644 6.68595 3.90691 6.58548C4.00737 6.48502 4.14363 6.42858 4.28571 6.42858C4.42779 6.42858 4.56406 6.48502 4.66452 6.58548C4.76499 6.68595 4.82143 6.82221 4.82143 6.96429V14.4643C4.82143 14.6064 4.76499 14.7426 4.66452 14.8431C4.56406 14.9436 4.42779 15 4.28571 15C4.14363 15 4.00737 14.9436 3.90691 14.8431C3.80644 14.7426 3.75 14.6064 3.75 14.4643V6.96429ZM14.4643 1.07143H10.4464L10.1317 0.445318C10.065 0.311462 9.96233 0.198864 9.83515 0.120193C9.70798 0.0415218 9.56137 -0.000101383 9.41183 5.87033e-06H5.58482C5.43562 -0.000567697 5.28927 0.0409003 5.16255 0.119659C5.03582 0.198417 4.93385 0.311281 4.8683 0.445318L4.55357 1.07143H0.535714C0.393634 1.07143 0.257373 1.12788 0.156907 1.22834C0.0564412 1.32881 0 1.46507 0 1.60715L0 2.67858C0 2.82066 0.0564412 2.95692 0.156907 3.05738C0.257373 3.15785 0.393634 3.21429 0.535714 3.21429H14.4643C14.6064 3.21429 14.7426 3.15785 14.8431 3.05738C14.9436 2.95692 15 2.82066 15 2.67858V1.60715C15 1.46507 14.9436 1.32881 14.8431 1.22834C14.7426 1.12788 14.6064 1.07143 14.4643 1.07143V1.07143Z" fill="white"></path></svg>
                  </a>
                </div>
              </div>
              <div class="row pt-10">
                <div class="col">
                  <button class="btn btn-primary wp-100 btn-sm" type="button" @click="addSeat('free')">
                    + Add Seat
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer text-center justify-content-center pt-50 pb-45 border-top-0">
            <button type="button" class="btn btn-secondary max-w-430 wp-100 fs-16 fw-600 py-13" @click="dummyTicket('free')">Use Dummy</button>
            <button type="button" class="btn btn-primary max-w-430 wp-100 fs-16 fw-600 py-13" data-bs-dismiss="modal" @click="addTicket('free',ticket_index)">Save</button>
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
  <p class="d-block text-end fs-14 fw-400 text-light mt-35 wp-100">Copyright © Tiketbox.com. All Copyright Protected</p>
@endsection
@section('script')
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script>
    Vue.use( CKEditor );
    const vueBhome = new Vue( {
      el: '#bhome',
      data: {
        detilForm: 'description',
        editor: ClassicEditor,
        editorConfig: {
            // The configuration of the editor.
        },
        form: {
          data: {
            _token:'{{ csrf_token() }}',
            name: null,
            powered_by: null,
            powered_by_image: null,
            category: null,
            subcategory: null,
            keyword: null,
            is_public: true,
            is_offline: true,
            date_start: null,
            date_end: null,
            time_start: null,
            time_end: null,
            location_name: null,
            location_address: null,
            location_city: null,
            location_coordinate: 'location,coordinate',
            description: '',
            toc: '',
            max_ticket: 1,
            one_email_one_transaction: false,
            one_ticket_one_order: false,
            peduli_lindungi: false,
            status: 'active',
            type: 'event',
            images: [],
            ticket: [],
            form_order: []
          }
        },
        images_clone: [],
        ticket_index: null,
        ticket_paid: {
          id: null,
          image: null,
          name: null,
          quota: null,
          price: 0,
          tax: false,
          tax_amount: 0,
          date_start: null,
          date_end: null,
          time_start: null,
          time_end: null,
          description: null,
          type: 'paid',
          status: 'active',
          deleted: false,
          seats: [
            {
              id: null,
              image: null,
              section: null,
              row: null,
              seat: null,
              price: null,
              deleted: false
            }
          ]
        },
        ticket_free: {
          id: null,
          image: null,
          name: null,
          quota: null,
          price: 0,
          tax: false,
          tax_amount: 0,
          date_start: null,
          date_end: null,
          time_start: null,
          time_end: null,
          description: null,
          type: 'free',
          status: 'active',
          deleted: false,
          seats: [
            {
              id: null,
              image: null,
              section: null,
              row: null,
              seat: null,
              price: 0,
              deleted: false
            }
          ]
        },
        opt: {
          category: ["Konser","Atraksi","Standup Comedy","Reality Show"],
          subcategory: ["Musik","Drama","Cosplay","Teater"],
          city: ["Jakarta","Bandung","Bogor","Bekasi","Tanggerang","Semarang","Jogja","Surabaya"],
          max_ticket: [1,5,10,15,20]
        },
        alert: {
          show: 'hide',
          bg: 'bg-primary',
          title: null,
          msg: null
        },
        googleMap: {
          map: null,
          marker: null,
        }
      },
      computed: {
        ticket_paid_price() {
          let price = this.thousand(this.ticket_paid.price)
          return price
        },
        ticket_paid_quota() {
          let quota = this.thousand(this.ticket_paid.quota)
          return quota
        }
      },
      methods: {
        ...helper,
        async doGet() {
          try {
            let id = {{ $id }};
            if(id){
              let payload = {
                id: id
              }
              let token = 'abcdreUYBH&^*VHGY^&GY'
                let req = await tiketboxApi.getEvent(payload,token)
                let { status, msg, data} = req.data
                if(status){
                  data.form_order = data.form_order.split(",")
                  this.form.data = {...data}
                  this.images_clone = [...data.images]
                  this.form.data.ticket = [...data.tickets]
                } else {
                  this.notify('error','Error',msg)
                }
              }
            } catch (error) {
            this.notify('error','Error',msg)
          }
        },
        onChangeThousand(target, e){
          switch (target) {
            case 'ticketpaid_price':
              this.ticket_paid.price = this.removeThousand(e.target.value);
              break;
            case 'ticketpaid_quota':
              this.ticket_paid.quota = this.removeThousand(e.target.value);
              break;
          }
        },
        async getCity() {
          let city = await axios.get('/assets/city.json')
          this.opt.city = city.data
        },
        async doSave(status) {
          this.notify('info','Processing','Menyimpan data...')
          let payload = {...this.form.data}
          payload.status = status
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = {
              data : {
                status: false,
                msg: null,
                data: null
              }
            }
            if(payload.id) {
              req = await tiketboxApi.updateEvent(payload,token)
            } else {
              req = await tiketboxApi.createEvent(payload,token)
            }
            let { status, msg, data} = req.data
            if(status){
              this.notify('success','Success',msg)
              setTimeout(() => {
                window.location.reload()
              }, 2000)
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        updateTicket(ticket,idx) {
          this.ticket_index = idx
          if(ticket.type == 'paid'){
            this.ticket_paid = {...ticket}
          } else {
            this.ticket_free = {...ticket}
          }
        },
        addTicket(type,idx=null) {
          let ticket = {...this.ticket_paid}
          if(type == 'free'){
            ticket = {...this.ticket_free}
          }
          console.log('ticket index',idx)
          if(idx >= 0 && idx != null){
            this.form.data.ticket[idx] = {...ticket}
            console.log('update')
          } else {
            console.log('new')
            this.form.data.ticket.push(ticket)
          }
          console.log(ticket)
          this.clearTicketForm()
        },
        removeTicket(idx) {
          if(this.form.data.ticket[idx].id){
            this.form.data.ticket[idx].deleted = true
          } else {
            this.form.data.ticket.splice(idx,1)
          }
        },
        clearTicketForm() {
          let empty_ticket = {
            id: null,
            image: null,
            name: null,
            quota: null,
            price: 0,
            tax: false,
            tax_amount: 0,
            date_start: null,
            date_end: null,
            time_start: null,
            time_end: null,
            description: null,
            type: 'paid',
            status: 'active',
            deleted: false,
            seats: [
              {
                id: null,
                image: null,
                section: null,
                row: null,
                seat: null,
                price: null,
                deleted: false
              }
            ]
          }
          this.ticket_paid = {...empty_ticket}
          this.ticket_free = {...empty_ticket}
          this.ticket_free.type = 'free'
        },
        addSeat(type) {
          let seat = {
                        id: null,
                        image: null,
                        section: null,
                        row: null,
                        seat: null,
                        price: null,
                        deleted: false
                      }
          if(type == 'free'){
            this.ticket_free.seats.push(seat)
          } else {
            this.ticket_paid.seats.push(seat)
          }
        },
        removeSeat(type,idx) {
          if(type == 'free'){
            if(this.ticket_free.seats[idx].id){
              this.ticket_free.seats[idx].deleted = true
            } else {
              this.ticket_free.seats.splice(idx,1)
            }
          } else {
            if(this.ticket_paid.seats[idx].id){
              this.ticket_paid.seats[idx].deleted = true
            } else {
              this.ticket_paid.seats.splice(idx,1)
            }
          }
        },
        deleteImage(idx){
          if(this.form.data.images[idx].id){
            this.form.data.images[idx].deleted = true
          } else {
            this.form.data.images.splice(idx,1)
          }
          this.images_clone.splice(idx,1)
        },
        previewImage(e) {
          let vm = this
          let inp = e.target
          let files = e.target.files
          for(let i = 0; i < files.length; i++) {
            let reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function () {
              vm.form.data.images.push(reader.result)
              vm.images_clone.push(reader.result)
              inp.type = 'text';
              inp.type = 'file';
            };
            reader.onerror = function () {
              inp.type = 'text';
              inp.type = 'file';
            };
          }
        },
        previewImagePowered(e) {
          let vm = this
          let inp = e.target
          let files = e.target.files
          for(let i = 0; i < files.length; i++) {
            let reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function () {
              vm.form.data.powered_by_image = reader.result
              inp.type = 'text';
              inp.type = 'file';
            };
            reader.onerror = function () {
              inp.type = 'text';
              inp.type = 'file';
            };
          }
        },
        seatImage(type,index,e) {
          let vm = this
          let inp = e.target
          let files = e.target.files
          for(let i = 0; i < files.length; i++) {
            let reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function () {
              if(type == 'free'){
                vm.ticket_free.seats[index].image = reader.result
              } else {
                vm.ticket_paid.seats[index].image = reader.result
              }
              inp.type = 'text';
              inp.type = 'file';
            };
            reader.onerror = function () {
              inp.type = 'text';
              inp.type = 'file';
            };
          }
        },
        ticketImage(type,e) {
          let vm = this
          let inp = e.target
          let files = e.target.files
          for(let i = 0; i < files.length; i++) {
            let reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function () {
              if(type == 'free'){
                vm.ticket_free.image = reader.result
              } else {
                vm.ticket_paid.image = reader.result
              }
              inp.type = 'text';
              inp.type = 'file';
            };
            reader.onerror = function () {
              inp.type = 'text';
              inp.type = 'file';
            };
          }
        },
        googleMapInit() {
          this.googleMap.map = new google.maps.Map(document.getElementById("lokasi-event"), {
            center: { lat: -6.2184580612406055, lng: 106.8391129723255 },
            zoom: 12,
          });
          this.googleMap.marker = new google.maps.Marker({
            position: this.googleMap.map.getCenter(),
            map: this.googleMap.map,
            draggable: true,
          });
          this.googleMap.marker.addListener("dragend", this.handleMarkerDragend);
        },
        handleMarkerDragend(event) {
          const newPosition = event.latLng;
          this.form.data.location_coordinate = `${newPosition.lat()},${newPosition.lng()}`
        },
        dummyContent() {
          let dummy = {
            '_token':'{{ csrf_token() }}',
            name: 'Nama Event',
            powered_by: 'Powered By',
            category: 'Konser',
            subcategory: 'Musik',
            keyword: 'Konser, Musik, Gebyar',
            is_public: true,
            is_offline: true,
            date_start: '2023-07-30',
            date_end: '2023-08-10',
            time_start: '07:00',
            time_end: '11:00',
            location_name: 'Nama Lokasi',
            location_address: 'Alamat',
            location_city: 'Jakarta',
            location_coordinate: '-6.2188519,106.7996837',
            description: `What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.`,
            toc: `What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.`,
            max_ticket: 1,
            one_email_one_transaction: false,
            one_ticket_one_order: false,
            peduli_lindungi: false,
            status: 'active',
            type: 'event',
          }
          let formData = {...this.form.data}
          this.form.data = {...formData,...dummy}
        },
        dummyTicket(type) {
          let dummy = {
            image: null,
            name: 'Nama Tiket',
            quota: 10000,
            price: 1000000,
            tax: true,
            tax_amount: 11,
            date_start: '2023-07-30',
            date_end: '2023-08-10',
            time_start: '07:00',
            time_end: '23:00',
            description: 'deskripsi tiket',
            status: 'active',
            type: type,
            seats: [{
              id: null,
              image: null,
              section: '300',
              row: 'A',
              seat: 10,
              price: 230000,
              deleted: false
            }]
          }
          if(type == 'free'){
            let ticketFree = {...this.ticket_free}
            this.ticket_free = {...ticketFree, ...dummy}
          } else {
            let ticketPaid = {...this.ticket_paid}
            this.ticket_paid = {...ticketPaid, ...dummy}
          }
        },
        notify(type,title,msg){
          let bg = 'bg-primary'
          switch (bg) {
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
        // this.getCity()
        this.doGet()
        this.googleMapInit()
      }
    });
  </script>
@endsection
@section('styles')
  <style>
    .carousel-item-main .carousel-caption {
      background: rgba(0,0,0,.5);
      opacity: 0;
      transition: 500ms;
    }
    .carousel-item-main:hover .carousel-caption {
      opacity: 1;
    }
  </style>
@endsection