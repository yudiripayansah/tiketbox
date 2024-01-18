@extends('layout.layout')
@section('screen')
  <section id="home" class="mt-100">
    <div class="container">
      {{-- Banner --}}
      <div class="home-banner position-relative mb-30 br-10 overflow-hidden">
        <div id="homeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item" v-for="(b,index) in banner" :key="index" :class="(index == 0) ? 'active' : ''">
              <img :src="b.image" class="d-block wp-100" alt="...">
              <div class="position-absolute hb-caption d-flex flex-column justify-content-center ps-35 pe-35 text-light">
                <h1 class="fw-700 fs-50" v-text="b.title"></h1>
                <h6 class="fw-500 fs-20" v-text="b.text"></h6>
                <form @submit.prevent="doSearch()" class="hbc-input-search d-flex align-items-center ps-30 pe-30 br-20 mt-24">
                  <input type="text" class="border-0 bg-transparent text-light fs-18" placeholder="Search, other places, event or tickets..." v-model="search">
                  <button class="border-0 bg-transparent" type="submit">
                    <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="Frame" opacity="0.5">
                      <path id="Vector" d="M31.408 18.5622C31.408 21.1632 30.6345 23.7059 29.1853 25.8686C27.7361 28.0314 25.6762 29.7171 23.2662 30.7126C20.8562 31.7081 18.2043 31.9686 15.6458 31.4614C13.0873 30.9541 10.7371 29.7018 8.89232 27.8627C7.04759 26.0236 5.79119 23.6805 5.28198 21.1294C4.77278 18.5784 5.03364 15.9341 6.03158 13.5309C7.02952 11.1277 8.71972 9.07351 10.8885 7.62809C13.0572 6.18267 15.6071 5.41094 18.2157 5.41046C19.948 5.41015 21.6635 5.75009 23.264 6.41089C24.8645 7.07168 26.3189 8.04038 27.5439 9.26166C28.769 10.4829 29.7407 11.9329 30.4037 13.5287C31.0668 15.1245 31.408 16.8349 31.408 18.5622V18.5622Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path id="Vector_2" d="M27.5459 27.8636L35.1778 35.4735" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                    </svg>                
                  </button>
                </form>
                <div class="hbc-tags mt-20 fs-18">
                  <a class="text-light text-decoration-none me-10" :href="`search/${t}`" v-for="(t,index) in b.tags" :key="index" v-text="t"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeCarousel" :data-bs-slide-to="index" :class="(index == 0) ? 'active' : ''" aria-current="true" aria-label="Slide 1" v-for="(b,index) in banner" :key="index"></button>
          </div>
        </div>
        {{-- <img src="{{ url('https://tiketbox.com/resources/images/main-banner.jpg') }}" alt="" class="wp-100">
        <div class="position-absolute hb-caption d-flex flex-column justify-content-center ps-35 pe-35 text-light">
          <h1 class="fw-700 fs-50">Book Yourself Your Fun</h1>
          <h6 class="fw-500 fs-20">Best events near you to get your 2023 started</h6>
          <form @submit.prevent="doSearch()" class="hbc-input-search d-flex align-items-center ps-30 pe-30 br-20 mt-24">
            <input type="text" class="border-0 bg-transparent text-light fs-18" placeholder="Search, other places, event or tickets..." v-model="search">
            <button class="border-0 bg-transparent" type="submit">
              <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Frame" opacity="0.5">
                <path id="Vector" d="M31.408 18.5622C31.408 21.1632 30.6345 23.7059 29.1853 25.8686C27.7361 28.0314 25.6762 29.7171 23.2662 30.7126C20.8562 31.7081 18.2043 31.9686 15.6458 31.4614C13.0873 30.9541 10.7371 29.7018 8.89232 27.8627C7.04759 26.0236 5.79119 23.6805 5.28198 21.1294C4.77278 18.5784 5.03364 15.9341 6.03158 13.5309C7.02952 11.1277 8.71972 9.07351 10.8885 7.62809C13.0572 6.18267 15.6071 5.41094 18.2157 5.41046C19.948 5.41015 21.6635 5.75009 23.264 6.41089C24.8645 7.07168 26.3189 8.04038 27.5439 9.26166C28.769 10.4829 29.7407 11.9329 30.4037 13.5287C31.0668 15.1245 31.408 16.8349 31.408 18.5622V18.5622Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path id="Vector_2" d="M27.5459 27.8636L35.1778 35.4735" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
              </svg>                
            </button>
          </form>
          <div class="hbc-tags mt-20 fs-18">
            <a class="text-light text-decoration-none me-10" href="search/OLXIMX2023">#OLXIMX2023</a>
            <a class="text-light text-decoration-none me-10" href="search/soundofunity">#soundofunity</a>
            <a class="text-light text-decoration-none me-10" href="search/jisphoria">#jisphoria</a>
          </div>
        </div> --}}
      </div>
      {{-- Category --}}
      <div class="home-category pb-50">
        <h1 class="fs-30 fw-700 wp-50 text-light mb-30">Select Category</h1>
        <div class="row">
          <div class="col-6 col-sm-4">
            <a href="{{ url('/category/Concert') }}" class="d-flex align-items-center wp-100 hc-item text-decoration-none mb-30 p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-concert.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Concert</span>
            </a>
          </div>
          <div class="col-6 col-sm-4">
            <a href="{{ url('/category/Attraction') }}" class="d-flex align-items-center wp-100 hc-item text-decoration-none mb-30 p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-attraction.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Attraction</span>
            </a>
          </div>
          <div class="col-6 col-sm-4">
            <a href="{{ url('/category/Free Gifts') }}" class="d-flex align-items-center wp-100 hc-item text-decoration-none mb-30 p-20 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-free-gift.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Free Gifts</span>
            </a>
          </div>
          <div class="col-6 col-sm-4">
            <a href="{{ url('/category/Sports') }}" class="d-flex align-items-center wp-100 hc-item text-decoration-none p-20 mb-30 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-sports.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Sports</span>
            </a>
          </div>
          <div class="col-6 col-sm-4">
            <a href="{{ url('/category/Amusement Park') }}" class="d-flex align-items-center wp-100 hc-item text-decoration-none p-20 mb-30 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-amusement-park.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">Amusement Park</span>
            </a>
          </div>
          <div class="col-6 col-sm-4">
            <a href="{{ url('/category/All Categories') }}" class="d-flex align-items-center wp-100 hc-item text-decoration-none p-20 mb-30 br-10">
              <img src="{{ url('assets/images/layout/icon/icon-all-categories.png') }}" alt="">
              <span class="fs-20 fw-600 text-light ms-30">All Categories</span>
            </a>
          </div>
        </div>
      </div>
      {{-- Best Deals --}}
      <div class="home-best-deals pb-50 overflow-hidden" v-show="bestDeals.length > 0">
        <div class="d-flex justify-content-between align-items-start mb-30">
          <h1 class="fs-30 fw-700 wp-50 text-light">Best Deals</h1>
          <a href="{{ url('/promotion') }}" class="fs-20 fw-500 text-light text-decoration-none">See All</a>
        </div>
        <div class="swiper-hbd position-relative">
          <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="(bd,index) in bestDeals" :key="index">
              <a :href="`/promotion/${bd.id}`" class="hbd-item text-decoration-none d-block br-10 overflow-hidden">
                <img :src="bd.images[0].image_url" alt="" class="wp-100">
              </a>
            </div>
          </div>
          {{-- <div class="swiper-nav position-absolute d-flex justify-content-between align-items-center top-0 bottom-0 left-0 right-0">
            <a href="#" class="text-decoration-none swiper-prev">
              <svg width="195" height="35" viewBox="0 0 195 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Group 35659" filter="url(#filter0_dddddd_14_506)">
                <circle id="Ellipse 9" cx="17.5" cy="17.5" r="17.5" transform="matrix(-1 0 0 1 115 0)" fill="white"/>
                <path id="Vector" d="M98.8618 9.61905L97.96 8.69384C97.5782 8.30209 96.9607 8.30209 96.583 8.69384L88.6863 16.7915C88.3045 17.1833 88.3045 17.8168 88.6863 18.2044L96.583 26.3062C96.9648 26.698 97.5822 26.698 97.96 26.3062L98.8618 25.381C99.2477 24.9851 99.2395 24.3391 98.8455 23.9515L93.9508 19.1671H105.625C106.165 19.1671 106.6 18.7211 106.6 18.1668V16.8332C106.6 16.2789 106.165 15.833 105.625 15.833H93.9508L98.8455 11.0485C99.2436 10.661 99.2517 10.015 98.8618 9.61905Z" fill="#3E63F9"/>
                </g>
                <defs>
                <filter id="filter0_dddddd_14_506" x="0" y="0" width="195" height="215" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="2.76726"/>
                <feGaussianBlur stdDeviation="1.1069"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0196802 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_14_506"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="6.6501"/>
                <feGaussianBlur stdDeviation="2.66004"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0282725 0"/>
                <feBlend mode="normal" in2="effect1_dropShadow_14_506" result="effect2_dropShadow_14_506"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="12.5216"/>
                <feGaussianBlur stdDeviation="5.00862"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.035 0"/>
                <feBlend mode="normal" in2="effect2_dropShadow_14_506" result="effect3_dropShadow_14_506"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="22.3363"/>
                <feGaussianBlur stdDeviation="8.93452"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0417275 0"/>
                <feBlend mode="normal" in2="effect3_dropShadow_14_506" result="effect4_dropShadow_14_506"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="41.7776"/>
                <feGaussianBlur stdDeviation="16.711"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0503198 0"/>
                <feBlend mode="normal" in2="effect4_dropShadow_14_506" result="effect5_dropShadow_14_506"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="100"/>
                <feGaussianBlur stdDeviation="40"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.07 0"/>
                <feBlend mode="normal" in2="effect5_dropShadow_14_506" result="effect6_dropShadow_14_506"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect6_dropShadow_14_506" result="shape"/>
                </filter>
                </defs>
              </svg>                
            </a>
            <a href="#" class="text-decoration-none swiper-next">
              <svg width="195" height="35" viewBox="0 0 195 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Group 35658" filter="url(#filter0_dddddd_14_503)">
                <circle id="Ellipse 9" cx="97.5" cy="17.5" r="17.5" fill="white"/>
                <path id="Vector" d="M96.1382 9.61905L97.04 8.69384C97.4218 8.30209 98.0393 8.30209 98.417 8.69384L106.314 16.7915C106.695 17.1833 106.695 17.8168 106.314 18.2044L98.417 26.3062C98.0352 26.698 97.4178 26.698 97.04 26.3062L96.1382 25.381C95.7523 24.9851 95.7605 24.3391 96.1545 23.9515L101.049 19.1671H89.3749C88.8347 19.1671 88.4 18.7211 88.4 18.1668V16.8332C88.4 16.2789 88.8347 15.833 89.3749 15.833H101.049L96.1545 11.0485C95.7564 10.661 95.7483 10.015 96.1382 9.61905Z" fill="#3E63F9"/>
                </g>
                <defs>
                <filter id="filter0_dddddd_14_503" x="0" y="0" width="195" height="215" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="2.76726"/>
                <feGaussianBlur stdDeviation="1.1069"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0196802 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_14_503"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="6.6501"/>
                <feGaussianBlur stdDeviation="2.66004"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0282725 0"/>
                <feBlend mode="normal" in2="effect1_dropShadow_14_503" result="effect2_dropShadow_14_503"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="12.5216"/>
                <feGaussianBlur stdDeviation="5.00862"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.035 0"/>
                <feBlend mode="normal" in2="effect2_dropShadow_14_503" result="effect3_dropShadow_14_503"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="22.3363"/>
                <feGaussianBlur stdDeviation="8.93452"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0417275 0"/>
                <feBlend mode="normal" in2="effect3_dropShadow_14_503" result="effect4_dropShadow_14_503"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="41.7776"/>
                <feGaussianBlur stdDeviation="16.711"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0503198 0"/>
                <feBlend mode="normal" in2="effect4_dropShadow_14_503" result="effect5_dropShadow_14_503"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="100"/>
                <feGaussianBlur stdDeviation="40"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.07 0"/>
                <feBlend mode="normal" in2="effect5_dropShadow_14_503" result="effect6_dropShadow_14_503"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect6_dropShadow_14_503" result="shape"/>
                </filter>
                </defs>
              </svg>
            </a>
          </div> --}}
        </div>
      </div>
      {{-- Popular --}}
      <div class="home-popular pb-20" v-if="popular.length > 0">
        <div class="d-flex justify-content-between align-items-start mb-30">
          <h1 class="fs-30 fw-700 wp-50 text-light">Popular at Tiketbox.com</h1>
          <a href="{{ url('/event') }}" class="fs-20 fw-500 text-light text-decoration-none">See All</a>
        </div>
        <div class="row">
          <a :href="`/event/${item.id}`" class="col-6 col-sm-4 mb-30" v-for="(item,index) in popular" :key="index">
            <div class="hp-item position-relative br-10 overflow-hidden hp-100">
              <div class="hp-label br-bl-10 text-light position-absolute top-0 right-0 bg-primary p-10 fs-14 fw-700" v-text="item.category"></div>
              <img :src="item.images[0].image_url" alt="" class="wp-100 h-250 object-fit-cover hp-image">
              <div class="hp-content-box p-10 h-100 d-flex flex-column justify-content-between">
                <h5 class="fs-16 fw-700 text-light" v-text="`${item.name}`"></h5>
                <div class="d-flex align-items-end justify-content-between hp-details mt-auto">
                  <div class="text-light pe-20 hp-address-box wp-65">
                    <div class="fs-12 d-block hp-address">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
                        <g id="carbon:location-filled">
                        <path id="Vector" d="M8.8806 1.11304C7.27009 1.11495 5.72609 1.75941 4.58729 2.90505C3.44849 4.05069 2.80788 5.60397 2.80598 7.22415C2.80405 8.54816 3.23395 9.83625 4.02974 10.8908C4.02974 10.8908 4.19541 11.1103 4.22247 11.1419L8.8806 16.6686L13.5409 11.1391C13.5652 11.1097 13.7315 10.8908 13.7315 10.8908L13.732 10.8891C14.5274 9.83504 14.9571 8.54755 14.9552 7.22415C14.9533 5.60397 14.3127 4.05069 13.1739 2.90505C12.0351 1.75941 10.4911 1.11495 8.8806 1.11304ZM8.8806 9.44637C8.44371 9.44637 8.01663 9.31604 7.65337 9.07186C7.29011 8.82768 7.00698 8.48061 6.83979 8.07455C6.6726 7.6685 6.62886 7.22168 6.71409 6.79061C6.79932 6.35954 7.00971 5.96358 7.31864 5.6528C7.62756 5.34202 8.02116 5.13037 8.44966 5.04462C8.87815 4.95888 9.3223 5.00289 9.72593 5.17108C10.1296 5.33928 10.4746 5.6241 10.7173 5.98955C10.96 6.35499 11.0896 6.78463 11.0896 7.22415C11.0888 7.81329 10.8559 8.3781 10.4418 8.79468C10.0277 9.21127 9.46623 9.44563 8.8806 9.44637Z" fill="white"/>
                        </g>
                      </svg>
                      <span v-text="`${item.location_name}, ${item.location_city}`"></span>
                    </div>
                    <div class="fs-12 d-block" :data-type="item.type" v-if="item.type != 'amusement'">
                      <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
                        <g id="bx:bx-time-five">
                        <path id="Vector" d="M8.88039 2.37866C4.82034 2.37866 1.51721 5.70162 1.51721 9.78607C1.51721 13.8705 4.82034 17.1935 8.88039 17.1935C12.9405 17.1935 16.2436 13.8705 16.2436 9.78607C16.2436 5.70162 12.9405 2.37866 8.88039 2.37866ZM8.88039 15.712C5.63249 15.712 2.98985 13.0535 2.98985 9.78607C2.98985 6.51866 5.63249 3.86014 8.88039 3.86014C12.1283 3.86014 14.7709 6.51866 14.7709 9.78607C14.7709 13.0535 12.1283 15.712 8.88039 15.712Z" fill="white"/>
                        <path id="Vector_2" d="M9.6168 6.07788H8.14417V10.0883L10.5689 12.5275L11.61 11.4801L9.6168 9.47492V6.07788Z" fill="white"/>
                        </g>
                      </svg>                        
                      <span v-text="item.date_start"></span>
                    </div>
                  </div>
                  <div class="text-light ps-20 hp-price">
                    <span class="fs-12 d-block">Start From</span>
                    <label class="fs-16 fw-700 d-block m-0" v-text="`Rp ${thousand(item.tickets[0].price)}`"></label>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      {{-- Place Best Deals --}}
      <div class="home-place-best-deals overflow-hidden pb-50" v-show="placeBestDeals.length > 0">
        <div class="d-flex justify-content-between align-items-start mb-30">
          <h1 class="fs-30 fw-700 wp-50 text-light">Places with Best Deals</h1>
          <a href="{{ url('/event') }}" class="fs-20 fw-500 text-light text-decoration-none">See All</a>
        </div>
        <div class="swiper-hpbd position-relative">
          <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="(item,index) in placeBestDeals" :key="index">
              <div class="hpbd-item br-10 overflow-hidden position-relative">
                <div class="hp-label br-bl-10 text-light position-absolute top-0 right-0 bg-danger p-10 fs-14 fw-700" v-text="item.category"></div>
                <img :src="item.images[0].image_url" alt="" class="wp-100">
                <div class="p-10">
                  <h5 class="fs-16 fw-700 text-light" v-text="item.title"></h5>
                  <div class="hpbd-details d-flex align-items-end justify-content-between">
                    <div class="text-light">
                      <span class="fs-12">Start From</span>
                      <label class="fs-16 fw-700 d-block m-0" v-text="`Rp ${thousand(item.tickets[0].price)}`"></label>
                      <span class="fs-12" v-text="`until ${item.date_end}`"></span>
                    </div>
                    <a class="hpbd-btn btn btn-primary fs-14 fw-500 px-30 py-5 br-100" :href="`/event/${item.id}`">Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- Upcoming --}}
      <div class="home-popular"  v-if="upcomingEvents.length > 0">
        <div class="d-flex justify-content-between align-items-start mb-30">
          <h1 class="fs-30 fw-700 wp-50 text-light">Upcoming Events</h1>
          <a href="{{ url('/event') }}" class="fs-20 fw-500 text-light text-decoration-none">See All</a>
        </div>
        <div class="row">
          <a :href="`/event/${item.id}`" class="col-6 col-sm-4 mb-30" v-for="(item,index) in upcomingEvents" :key="index">
            <div class="hp-item position-relative br-10 overflow-hidden hp-100">
              <div class="hp-label br-bl-10 text-light position-absolute top-0 right-0 bg-primary p-10 fs-14 fw-700" v-text="item.category"></div>
              <img :src="item.images[0].image_url" alt="" class="wp-100 h-250 object-fit-cover hp-image">
              <div class="hp-content-box p-10 h-100 d-flex flex-column justify-content-between">
                <h5 class="fs-16 fw-700 text-light" v-text="`${item.name}`"></h5>
                <div class="d-flex align-items-end justify-content-between hp-details mt-auto">
                  <div class="text-light pe-20 hp-address-box wp-65">
                    <div class="fs-12 d-block hp-address">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
                        <g id="carbon:location-filled">
                        <path id="Vector" d="M8.8806 1.11304C7.27009 1.11495 5.72609 1.75941 4.58729 2.90505C3.44849 4.05069 2.80788 5.60397 2.80598 7.22415C2.80405 8.54816 3.23395 9.83625 4.02974 10.8908C4.02974 10.8908 4.19541 11.1103 4.22247 11.1419L8.8806 16.6686L13.5409 11.1391C13.5652 11.1097 13.7315 10.8908 13.7315 10.8908L13.732 10.8891C14.5274 9.83504 14.9571 8.54755 14.9552 7.22415C14.9533 5.60397 14.3127 4.05069 13.1739 2.90505C12.0351 1.75941 10.4911 1.11495 8.8806 1.11304ZM8.8806 9.44637C8.44371 9.44637 8.01663 9.31604 7.65337 9.07186C7.29011 8.82768 7.00698 8.48061 6.83979 8.07455C6.6726 7.6685 6.62886 7.22168 6.71409 6.79061C6.79932 6.35954 7.00971 5.96358 7.31864 5.6528C7.62756 5.34202 8.02116 5.13037 8.44966 5.04462C8.87815 4.95888 9.3223 5.00289 9.72593 5.17108C10.1296 5.33928 10.4746 5.6241 10.7173 5.98955C10.96 6.35499 11.0896 6.78463 11.0896 7.22415C11.0888 7.81329 10.8559 8.3781 10.4418 8.79468C10.0277 9.21127 9.46623 9.44563 8.8806 9.44637Z" fill="white"/>
                        </g>
                      </svg>
                      <span v-text="`${item.location_name}, ${item.location_city}`"></span>
                    </div>
                    <div class="fs-12 d-block" :data-type="item.type" v-if="item.type != 'amusement'">
                      <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
                        <g id="bx:bx-time-five">
                        <path id="Vector" d="M8.88039 2.37866C4.82034 2.37866 1.51721 5.70162 1.51721 9.78607C1.51721 13.8705 4.82034 17.1935 8.88039 17.1935C12.9405 17.1935 16.2436 13.8705 16.2436 9.78607C16.2436 5.70162 12.9405 2.37866 8.88039 2.37866ZM8.88039 15.712C5.63249 15.712 2.98985 13.0535 2.98985 9.78607C2.98985 6.51866 5.63249 3.86014 8.88039 3.86014C12.1283 3.86014 14.7709 6.51866 14.7709 9.78607C14.7709 13.0535 12.1283 15.712 8.88039 15.712Z" fill="white"/>
                        <path id="Vector_2" d="M9.6168 6.07788H8.14417V10.0883L10.5689 12.5275L11.61 11.4801L9.6168 9.47492V6.07788Z" fill="white"/>
                        </g>
                      </svg>                        
                      <span v-text="item.date_start"></span>
                    </div>
                  </div>
                  <div class="text-light ps-20 hp-price">
                    <span class="fs-12 d-block">Start From</span>
                    <label class="fs-16 fw-700 d-block m-0" v-text="`Rp ${thousand(item.tickets[0].price)}`"></label>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      {{-- Past Events --}}
      <div class="home-popular home-pastEvents"  v-if="pastEvents.length > 0">
        <div class="d-flex justify-content-between align-items-start mb-30">
          <h1 class="fs-30 fw-700 wp-50 text-light">Past Events</h1>
          <a href="{{ url('/event') }}" class="fs-20 fw-500 text-light text-decoration-none">See All</a>
        </div>
        <div class="row">
          <a :href="`/event/${item.id}`" class="col-6 col-sm-4 mb-30" v-for="(item,index) in pastEvents" :key="index">
            <div class="hp-item position-relative br-10 overflow-hidden hp-100">
              <div class="hp-label br-bl-10 text-light position-absolute top-0 right-0 bg-primary p-10 fs-14 fw-700" v-text="item.category"></div>
              <img :src="item.images[0].image_url" alt="" class="wp-100 h-250 object-fit-cover hp-image">
              <div class="hp-content-box p-10 h-100 d-flex flex-column justify-content-between">
                <h5 class="fs-16 fw-700 text-light" v-text="`${item.name}`"></h5>
                <div class="d-flex align-items-end justify-content-between hp-details mt-auto">
                  <div class="text-light pe-20 hp-address-box wp-65">
                    <div class="fs-12 d-block hp-address">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
                        <g id="carbon:location-filled">
                        <path id="Vector" d="M8.8806 1.11304C7.27009 1.11495 5.72609 1.75941 4.58729 2.90505C3.44849 4.05069 2.80788 5.60397 2.80598 7.22415C2.80405 8.54816 3.23395 9.83625 4.02974 10.8908C4.02974 10.8908 4.19541 11.1103 4.22247 11.1419L8.8806 16.6686L13.5409 11.1391C13.5652 11.1097 13.7315 10.8908 13.7315 10.8908L13.732 10.8891C14.5274 9.83504 14.9571 8.54755 14.9552 7.22415C14.9533 5.60397 14.3127 4.05069 13.1739 2.90505C12.0351 1.75941 10.4911 1.11495 8.8806 1.11304ZM8.8806 9.44637C8.44371 9.44637 8.01663 9.31604 7.65337 9.07186C7.29011 8.82768 7.00698 8.48061 6.83979 8.07455C6.6726 7.6685 6.62886 7.22168 6.71409 6.79061C6.79932 6.35954 7.00971 5.96358 7.31864 5.6528C7.62756 5.34202 8.02116 5.13037 8.44966 5.04462C8.87815 4.95888 9.3223 5.00289 9.72593 5.17108C10.1296 5.33928 10.4746 5.6241 10.7173 5.98955C10.96 6.35499 11.0896 6.78463 11.0896 7.22415C11.0888 7.81329 10.8559 8.3781 10.4418 8.79468C10.0277 9.21127 9.46623 9.44563 8.8806 9.44637Z" fill="white"/>
                        </g>
                      </svg>
                      <span v-text="`${item.location_name}, ${item.location_city}`"></span>
                    </div>
                    <div class="fs-12 d-block" :data-type="item.type" v-if="item.type != 'amusement'">
                      <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
                        <g id="bx:bx-time-five">
                        <path id="Vector" d="M8.88039 2.37866C4.82034 2.37866 1.51721 5.70162 1.51721 9.78607C1.51721 13.8705 4.82034 17.1935 8.88039 17.1935C12.9405 17.1935 16.2436 13.8705 16.2436 9.78607C16.2436 5.70162 12.9405 2.37866 8.88039 2.37866ZM8.88039 15.712C5.63249 15.712 2.98985 13.0535 2.98985 9.78607C2.98985 6.51866 5.63249 3.86014 8.88039 3.86014C12.1283 3.86014 14.7709 6.51866 14.7709 9.78607C14.7709 13.0535 12.1283 15.712 8.88039 15.712Z" fill="white"/>
                        <path id="Vector_2" d="M9.6168 6.07788H8.14417V10.0883L10.5689 12.5275L11.61 11.4801L9.6168 9.47492V6.07788Z" fill="white"/>
                        </g>
                      </svg>                        
                      <span v-text="item.date_start"></span>
                    </div>
                  </div>
                  <div class="text-light ps-20 hp-price">
                    <span class="fs-12 d-block">Start From</span>
                    <label class="fs-16 fw-700 d-block m-0" v-text="`Rp ${thousand(item.tickets[0].price)}`"></label>
                  </div>
                </div>
              </div>
            </div>
          </a>
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
    .home-pastEvents .hp-item img {
      filter: grayscale(1);
    }
    @media screen and (max-width: 768px) {
      .hp-content-box {
        height: calc(100% - 150px) !important;
      }
      .home-banner .carousel-item img {
        height: 240px;
        object-fit: cover
      }
      .home-banner .hb-caption {
        padding: 0 15px !important;
      }
      .home-banner .hb-caption h1 {
        font-size: 28px;
      }
      .home-banner .hb-caption h6 {
        font-size: 16px;
      }
      .home-banner .hb-caption .hbc-input-search {
        height: 45px;
        padding: 0 15px !important;
        border-radius: 5px !important;
      }
      .home-banner .hb-caption .hbc-input-search input {
        font-size: 16px !important;
      }
      .home-banner .hb-caption .hbc-input-search button svg {
        width: 25px;
        height: 25px;
      }
      .home-banner .carousel-indicators {
        margin-bottom: 0;
      }
      .home-category > h1 {
        width: 100% !important;
        font-size: 20px !important;
        margin-bottom: 15px !important;
      }
      .home-category .hc-item {
        flex-direction: column !important;
      }
      .home-category .hc-item > span {
        margin-left: 0 !important;
        font-size: 14px;
        text-align: center;
        margin-top: 15px;
      }
      .home-best-deals > div > a {
        font-size: 16px !important;
      }
      .home-best-deals > div > h1 {
        font-size: 20px !important;
        margin-bottom: 15px !important;
        width: 80% !important;
      }
      .home-popular > div > a {
        font-size: 16px !important;
      }
      .home-popular > div > h1 {
        font-size: 20px !important;
        margin-bottom: 15px !important;
        width: 80% !important;
      }
      .home-popular .hp-details {
        flex-direction: column;
        align-items: flex-start !important;
      }
      .home-popular .hp-details > div {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .home-popular .hp-price {
        margin-top: 5px;
      }
      .hp-image {
        height: 150px !important;
      }
      .hp-item h5 {
        max-height: 38px;
        overflow: hidden;
      }
      .hp-address {
        width: 100% !important;
        max-height: 35px;
        overflow: hidden;
      }
      .hp-address-box {
        width: 100% !important;
      }
      .home-place-best-deals > div > a {
        font-size: 16px !important;
      }
      .home-place-best-deals > div > h1 {
        font-size: 20px !important;
        margin-bottom: 15px !important;
        width: 80% !important;
      }
      .home-place-best-deals .hpbd-details {
        flex-direction: column;
        align-items: flex-start !important;
      }
      .home-place-best-deals .hpbd-details > div {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .home-place-best-deals .hpbd-btn {
        margin-top: 15px;
      }
      .home-past-events > div > a {
        font-size: 16px !important;
      }
      .home-past-events > div > h1 {
        font-size: 20px !important;
        margin-bottom: 15px !important;
        width: 80% !important;
      }
      .home-past-events .hpe-details {
        flex-direction: column;
        align-items: flex-start !important;
      }
      .home-past-events .hpe-details > div {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .home-past-events .hpe-price {
        margin-top: 15px;
      }
    }
    @media screen and (min-width: 1024px) {
      .hp-content-box {
        height: calc(100% - 250px) !important;
      }
    }
  </style>
@endsection
@section('script')
  <script>
    const vueHome = new Vue( {
      el: '#home',
      data: {
        search: null,
        popular: [],
        placeBestDeals: [],
        upcomingEvents: [],
        pastEvents: [],
        bestDeals: [],
        banner: [],
        alert: {
          show: 'hide',
          bg: 'bg-primary',
          title: null,
          msg: null
        }
      },
      computed: {
        
      },
      methods: {
        ...helper,
        doSearch(){
          window.location.href="/search/"+this.search
        },
        async getBanner() {
          let payload = {
            perPage: 5,
            page: 1,
            sortDir: 'desc',
            sortBy: 'id',
            search: null
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readBanner(payload,token)
            let { status, msg, data} = req.data
            if(status){
              data.map((item) => {
                item.tags = item.tags.split(';')
              })
              this.banner = data
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        async getBestDeals() {
          let payload = {
            perPage: 3,
            page: 1,
            sortDir: 'desc',
            sortBy: 'id',
            search: null
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readPromotion(payload,token)
            let { status, msg, data} = req.data
            if(status){
              this.bestDeals = data
              if(data.length > 0){
                this.initSwiper()
              }
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        async getPopular() {
          let payload = {
            perPage: 9,
            page: 1,
            sortDir: 'desc',
            sortBy: 'id',
            search: null,
            filter: 'popular'
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readEvent(payload,token)
            let { status, msg, data} = req.data
            if(status){
              this.popular = data
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        async getPlaceBestDeals() {
          let payload = {
            perPage: 9,
            page: 1,
            sortDir: 'desc',
            sortBy: 'id',
            search: null,
            filter: 'bestDeals'
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readEvent(payload,token)
            let { status, msg, data} = req.data
            if(status){
              this.placeBestDeals = data
              if(data.length > 0){
                this.initSwiper()
              }
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        async getUpcomingEvents() {
          let payload = {
            perPage: 9,
            page: 1,
            sortDir: 'desc',
            sortBy: 'id',
            search: null,
            filter: 'upcoming'
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readEvent(payload,token)
            let { status, msg, data} = req.data
            if(status){
              this.upcomingEvents = data
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        async getPastEvents() {
          let payload = {
            perPage: 9,
            page: 1,
            sortDir: 'desc',
            sortBy: 'id',
            search: null,
            filter: 'past'
          }
          let token = 'abcdreUYBH&^*VHGY^&GY'
          try {
            let req = await tiketboxApi.readEvent(payload,token)
            let { status, msg, data} = req.data
            if(status){
              this.pastEvents = data
            } else {
              this.notify('error','Error',msg)
            }
          } catch (error) {
            this.notify('error','Error',error.message)
          }
        },
        initSwiper() {
          let s1 = document.querySelector('.swiper-hbd')
          let s2 = document.querySelector('.swiper-hpbd')
          console.log('ada',s1, s2)
          if(s1){
            const homeBestDeals = new Swiper('.swiper-hbd', {
              // Optional parameters
              autoplay: true,
              delay: 2000,
              slidesPerView: 2,
              spaceBetween: 30,
              loop: true,
              // Navigation arrows
              navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
              },
              breakpoints: {
                768: {
                  slidesPerView: 3
                },
              }
            });
            console.log('s1 init')
          }
          if(s2){
            const homePlaceBestDeals = new Swiper('.swiper-hpbd', {
              // Optional parameters
              autoplay: true,
              delay: 2000,
              slidesPerView: 2,
              spaceBetween: 30,
              loop: true,
              // Navigation arrows
              navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
              },
              breakpoints: {
                768: {
                  slidesPerView: 3
                },
              }
            });
            console.log('s2 init')
          }
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
        this.getBanner()
        this.getBestDeals()
        this.getPopular()
        this.getPlaceBestDeals()
        this.getUpcomingEvents()
        this.getPastEvents()
      }
    });
  </script>
@endsection