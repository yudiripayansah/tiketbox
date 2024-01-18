<style>
  @media screen and (max-width: 480px) {
    #modalLogin .ml-left,
    #modalLogin .ml-right,
    #modalRegister .ml-left,
    #modalRegister .ml-right,
    #modalForgot .ml-left,
    #modalForgot .ml-right {
      max-width: 100% !important;
      width: 100% !important;
    }
    #mainHeader .close-btn {
      top: 25px !important;
      right: 25px !important;
      left: unset !important;
    }
    #bottomNav {
      background-color: rgba(37,37,37,1);
      z-index: 2;
    }
  }
  @media screen and (min-width: 1024px) {
    #mainHeader #main-nav {
      width: 100%;
    }
  }
</style>
<div id="mainHeader" class="position-relative">
  <nav class="navbar navbar-expand-lg main-header position-fixed zi-3">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ url('assets\images\layout\ticketboxlogo.png') }}" alt="" class="d-md-block d-none">
        <img src="{{ url('assets\images\layout\favicon.png') }}" alt="" class="d-block d-md-none h-40">
      </a>
      <div class="d-flex" id="main-nav">
        <ul class="navbar-nav me-auto d-ms-70 me-25">
          <li class="nav-item dropdown">
            <a class="nav-link text-light dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <svg width="19" height="25" viewBox="0 0 19 25" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="me-5">
                <path id="Vector"
                  d="M8.41152 24.4956C1.31689 14.2105 0 13.1549 0 9.375C0 4.19731 4.19731 0 9.375 0C14.5527 0 18.75 4.19731 18.75 9.375C18.75 13.1549 17.4331 14.2105 10.3385 24.4956C9.8729 25.1682 8.87705 25.1681 8.41152 24.4956ZM9.375 13.2812C11.5324 13.2812 13.2812 11.5324 13.2812 9.375C13.2812 7.21763 11.5324 5.46875 9.375 5.46875C7.21763 5.46875 5.46875 7.21763 5.46875 9.375C5.46875 11.5324 7.21763 13.2812 9.375 13.2812Z"
                  fill="#3E63F9" />
              </svg>
              Location
            </a>
            <div class="dropdown-menu p-20 position-absolute">
              <form @submit.prevent="doSearch()"
                class="hbc-input-search d-flex align-items-center br-5 border border-secondary">
                <input type="text" placeholder="Search, other places, event or tickets..."
                  class="bg-transparent text-light fs-14 border-0 ps-10 pe-10" v-model="searchCity">
                <button type="submit" class="border-0 bg-transparent w-40">
                  <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="wp-100">
                    <g id="Frame" opacity="0.5">
                      <path id="Vector"
                        d="M31.408 18.5622C31.408 21.1632 30.6345 23.7059 29.1853 25.8686C27.7361 28.0314 25.6762 29.7171 23.2662 30.7126C20.8562 31.7081 18.2043 31.9686 15.6458 31.4614C13.0873 30.9541 10.7371 29.7018 8.89232 27.8627C7.04759 26.0236 5.79119 23.6805 5.28198 21.1294C4.77278 18.5784 5.03364 15.9341 6.03158 13.5309C7.02952 11.1277 8.71972 9.07351 10.8885 7.62809C13.0572 6.18267 15.6071 5.41094 18.2157 5.41046C19.948 5.41015 21.6635 5.75009 23.264 6.41089C24.8645 7.07168 26.3189 8.04038 27.5439 9.26166C28.769 10.4829 29.7407 11.9329 30.4037 13.5287C31.0668 15.1245 31.408 16.8349 31.408 18.5622V18.5622Z"
                        stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path id="Vector_2" d="M27.5459 27.8636L35.1778 35.4735" stroke="white" stroke-width="1.2"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </svg>
                </button>
              </form>
              <div class="d-flex flex-column pt-15">
                <a v-for="(city,index) in city" :key="city" :href="`/search/${city}`" class="text-light fs-14"
                  v-text="city"></a>
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item me-30" v-if="users && users.type == 'promotor'">
            <a class="nav-link text-light" href="{{ url('promotor/my-events/form') }}">
              <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="me-5">
                <path id="Vector"
                  d="M12.1094 0C5.41992 0 0 5.41992 0 12.1094C0 18.7988 5.41992 24.2188 12.1094 24.2188C18.7988 24.2188 24.2188 18.7988 24.2188 12.1094C24.2188 5.41992 18.7988 0 12.1094 0ZM19.1406 13.4766C19.1406 13.7988 18.877 14.0625 18.5547 14.0625H14.0625V18.5547C14.0625 18.877 13.7988 19.1406 13.4766 19.1406H10.7422C10.4199 19.1406 10.1562 18.877 10.1562 18.5547V14.0625H5.66406C5.3418 14.0625 5.07812 13.7988 5.07812 13.4766V10.7422C5.07812 10.4199 5.3418 10.1562 5.66406 10.1562H10.1562V5.66406C10.1562 5.3418 10.4199 5.07812 10.7422 5.07812H13.4766C13.7988 5.07812 14.0625 5.3418 14.0625 5.66406V10.1562H18.5547C18.877 10.1562 19.1406 10.4199 19.1406 10.7422V13.4766Z"
                  fill="#3E63F9" />
              </svg>
              Create Events
            </a>
          </li>
          <li class="nav-item me-30 d-none d-md-inline" v-if="users && (users.type == 'promotor' || users.type == 'user')">
            <a class="nav-link text-light" href="{{ url('audience/my-tickets') }}">
              <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="me-5">
                <path id="Vector"
                  d="M5.55556 4.16667H19.4444V12.5H5.55556V4.16667ZM22.9167 8.33333C22.9167 9.48394 23.8494 10.4167 25 10.4167V14.5833C25 15.7339 24.0673 16.6667 22.9167 16.6667H2.08333C0.932726 16.6667 0 15.7339 0 14.5833V10.4167C1.15061 10.4167 2.08333 9.48394 2.08333 8.33333C2.08333 7.18273 1.15061 6.25 0 6.25V2.08333C0 0.932726 0.932726 0 2.08333 0H22.9167C24.0673 0 25 0.932726 25 2.08333V6.25C23.8494 6.25 22.9167 7.18273 22.9167 8.33333ZM20.8333 3.81944C20.8333 3.24414 20.367 2.77778 19.7917 2.77778H5.20833C4.63303 2.77778 4.16667 3.24414 4.16667 3.81944V12.8472C4.16667 13.4225 4.63303 13.8889 5.20833 13.8889H19.7917C20.367 13.8889 20.8333 13.4225 20.8333 12.8472V3.81944Z"
                  fill="#3E63F9" />
              </svg>
              My Tickets
            </a>
          </li>
          <li class="nav-item dropdown" v-if="users">
            <a href="/backoffice" @click="dropDown($event)">
              <img src="{{ url('assets/images/layout/user.png') }}" alt="" class="w-40 h-40 br-100">
            </a>
            <div class="br-10 right-0 position-absolute w-250 bg-dark" aria-labelledby="dropdownAccount"
              v-show="dropdown">
              <div v-if="users.type != 'admin'">
                <div class="d-flex align-items-center justify-content-between">
                  <div @click="active = 'audience'"
                    class="cusrsor-pointer sm-title pb-15 pt-10 text-center fw-700 fs-14 text-light border-bottom wp-50"
                    :class="(active == 'audience') ? 'border-primary' : 'border-transparent'">
                    Audience
                  </div>
                  <div @click="active = 'promotor'"
                    class="cusrsor-pointer sm-title pb-15 pt-10 text-center fw-700 fs-14 text-light border-bottom wp-50"
                    :class="(active == 'promotor') ? 'border-primary' : 'border-transparent'">
                    Promotor
                  </div>
                </div>
                <div v-if="active == 'audience'">
                  <ul class="list-unstyled">
                    <li class="pt-20 pb-10 px-15"><a class="dropdown-item text-light" href="/audience/my-tickets">My
                        Tickets</a></li>
                    <li class="pb-20 pt-10 px-15"><a class="dropdown-item text-light" href="/category">Search Ticket</a>
                    </li>
                    <li class="pt-20 pb-10 px-15 border-top border-primary"><a class="dropdown-item text-light"
                        href="/audience/profile">Profile</a></li>
                    <li class="py-10 px-15"><a class="dropdown-item text-light" href="/audience/order-data">Order
                        Data</a></li>
                    <li class="pb-20 pt-10 px-15"><a class="dropdown-item text-light"
                        href="/audience/password">Password</a></li>
                    <li class="py-10 px-15 border-top border-primary"><a class="dropdown-item text-primary" href="#"
                        @click="doSignOut()">Logout</a></li>
                  </ul>
                </div>
                <div v-if="active == 'promotor'">
                  <ul class="list-unstyled">
                    <li class="pt-20 pb-10 px-15"><a class="dropdown-item text-light" href="/promotor">Dashboard</a>
                    </li>
                    <li class="pb-20 pt-10 px-15"><a class="dropdown-item text-light" href="/promotor">My Events</a>
                    </li>
                    <li class="pt-20 pb-10 px-15 border-top border-primary"><a class="dropdown-item text-light"
                        href="/promotor/profile">Profile</a></li>
                    <li class="py-10 px-15"><a class="dropdown-item text-light" href="/promotor/bank-account">Bank
                        Account</a></li>
                    <li class="pb-20 pt-10 px-15"><a class="dropdown-item text-light"
                        href="/promotor/password">Password</a></li>
                    <li class="py-10 px-15 border-top border-primary"><a class="dropdown-item text-primary" href="#"
                        @click="doSignOut()">Logout</a></li>
                  </ul>
                </div>
              </div>
              <div v-else>
                <ul class="list-unstyled">
                  <li class="py-10 px-15"><a class="dropdown-item text-light" href="/backoffice">Dashboard</a></li>
                  <li class="py-10 px-15 border-top border-primary"><a class="dropdown-item text-primary" href="#"
                      @click="doSignOut()">Logout</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item" v-if="!users">
            <a class="btn btn-primary br-20 py-10 px-35 fs-14" href="#" data-bs-toggle="modal"
              data-bs-target="#modalLogin">
              <i class="d-inline d-md-none fa-solid fa-user d-md-none d-inline-flex"></i>
              <span class="d-none d-md-inline">Login</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Modal Login -->
  <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered max-w-1000">
      <div class="modal-content">
        <div class="modal-body p-0 position-relative">
          <div class="cursor-pointer position-absolute top-40 left-50 close-btn" data-bs-dismiss="modal" aria-label="Close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector"
                d="M11.0998 8.36667L15.676 3.60955C16.2376 3.02579 16.2376 2.07931 15.676 1.49507L14.659 0.437824C14.0974 -0.145941 13.1869 -0.145941 12.6249 0.437824L8.04861 5.19494L3.47234 0.437824C2.91076 -0.145941 2.00026 -0.145941 1.43823 0.437824L0.42118 1.49507C-0.140393 2.07883 -0.140393 3.02531 0.42118 3.60955L4.99746 8.36667L0.42118 13.1238C-0.140393 13.7075 -0.140393 14.654 0.42118 15.2383L1.43823 16.2955C1.99981 16.8793 2.91076 16.8793 3.47234 16.2955L8.04861 11.5384L12.6249 16.2955C13.1865 16.8793 14.0974 16.8793 14.659 16.2955L15.676 15.2383C16.2376 14.6545 16.2376 13.708 15.676 13.1238L11.0998 8.36667Z"
                fill="white" />
            </svg>
          </div>
          <div class="d-flex flex-md-row flex-column align-items-center justify-content-between br-10 overflow-hidden">
            <div class="ml-left max-w-670 wp-60 d-none d-md-block">
              <img src="{{ url('assets/images/auth/authbanner.png') }}" alt="" class="wp-100">
            </div>
            <div class="ml-right max-w-480 wp-40 p-25">
              <img src="{{ url('assets/images/auth/ticketboxlogo.png') }}" alt="" class="mx-auto d-block">
              <div class="form-group text-secondary mt-40">
                <label for="" class="control-label fs-16 fw-400 mb-10">Email</label>
                <div class="d-flex align-items-center justify-content-between bg-white br-8">
                  <input type="email" class="wp-100 border-0 bg-transparent px-15 fs-14 fw-400"
                    v-model="form.signin.email">
                  <span class="bg-primary w-50 h-50 d-flex justify-content-center align-items-center br-8 p-15">
                    <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="Frame" clip-path="url(#clip0_179_17526)">
                        <path id="Vector"
                          d="M3.8027 3.48645L21.9778 3.48645C22.2456 3.48645 22.5024 3.59283 22.6918 3.78219C22.8811 3.97155 22.9875 4.22838 22.9875 4.49618V20.6518C22.9875 20.9196 22.8811 21.1764 22.6918 21.3658C22.5024 21.5551 22.2456 21.6615 21.9778 21.6615H3.8027C3.5349 21.6615 3.27807 21.5551 3.08871 21.3658C2.89935 21.1764 2.79297 20.9196 2.79297 20.6518L2.79297 4.49618C2.79297 4.22838 2.89935 3.97155 3.08871 3.78219C3.27807 3.59283 3.5349 3.48645 3.8027 3.48645ZM20.968 7.76567L12.9629 14.9347L4.81242 7.74346L4.81242 19.6421H20.968V7.76567ZM5.32839 5.5059L12.9518 12.2327L20.4652 5.5059L5.32839 5.5059Z"
                          fill="white" />
                      </g>
                      <defs>
                        <clipPath id="clip0_179_17526">
                          <rect width="24.2334" height="24.2334" fill="white"
                            transform="translate(0.773438 0.457275)" />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                </div>
              </div>
              <div class="form-group text-secondary mt-10">
                <label for="" class="control-label fs-16 fw-400 mb-10">Password</label>
                <div class="d-flex align-items-center justify-content-between bg-white br-8">
                  <input type="password" class="wp-100 border-0 bg-transparent px-15 fs-14 fw-400"
                    v-model="form.signin.password">
                  <span class="bg-primary w-50 h-50 d-flex justify-content-center align-items-center br-8 p-15">
                    <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="Frame" clip-path="url(#clip0_179_17534)">
                        <path id="Vector"
                          d="M19.9584 10.5544H20.9681C21.2359 10.5544 21.4927 10.6608 21.6821 10.8501C21.8714 11.0395 21.9778 11.2963 21.9778 11.5641V21.6614C21.9778 21.9292 21.8714 22.186 21.6821 22.3753C21.4927 22.5647 21.2359 22.6711 20.9681 22.6711H4.81246C4.54466 22.6711 4.28784 22.5647 4.09848 22.3753C3.90912 22.186 3.80273 21.9292 3.80273 21.6614L3.80273 11.5641C3.80273 11.2963 3.90912 11.0395 4.09848 10.8501C4.28784 10.6608 4.54466 10.5544 4.81246 10.5544H5.82219V9.54465C5.82219 8.61645 6.00501 7.69735 6.36021 6.83981C6.71542 5.98227 7.23605 5.20309 7.89238 4.54676C8.54871 3.89042 9.32789 3.36979 10.1854 3.01459C11.043 2.65938 11.9621 2.47656 12.8903 2.47656C13.8185 2.47656 14.7376 2.65938 15.5951 3.01459C16.4526 3.36979 17.2318 3.89042 17.8882 4.54676C18.5445 5.20309 19.0651 5.98227 19.4203 6.83981C19.7755 7.69735 19.9584 8.61645 19.9584 9.54465V10.5544ZM5.82219 12.5738L5.82219 20.6516H19.9584V12.5738L5.82219 12.5738ZM11.8805 14.5933H13.9L13.9 18.6322H11.8805L11.8805 14.5933ZM17.9389 10.5544V9.54465C17.9389 8.20567 17.407 6.92153 16.4602 5.97473C15.5134 5.02792 14.2293 4.49602 12.8903 4.49602C11.5513 4.49602 10.2672 5.02792 9.32035 5.97473C8.37355 6.92153 7.84164 8.20567 7.84164 9.54465L7.84164 10.5544H17.9389Z"
                          fill="white" />
                      </g>
                      <defs>
                        <clipPath id="clip0_179_17534">
                          <rect width="24.2334" height="24.2334" fill="white"
                            transform="translate(0.773438 0.457153)" />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                </div>
              </div>
              <div class="d-block text-end mt-25">
                <a href="#" class="text-secondary" data-bs-toggle="modal" data-bs-target="#modalForgot">Forgot
                  Password</a>
              </div>
              <button type="button" class="btn btn-primary wp-100 mt-25" @click="doSignIn()"
                v-text="(form.loading) ? `Please Wait...`: `Sign In`"></button>
              <p class="text-center text-danger fs-10 fw-400 d-block mt-10" v-text="alert.msg" v-if="alert.show"></p>
              <div class="d-flex align-items-center position-relative justify-content-between">
                <hr class="border-secondary wp-100">
                <span class="text-light p-25">OR</span>
                <hr class="border-secondary wp-100">
              </div>
              <button type="button" class="btn btn-primary wp-100">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="Facebook Logo">
                    <rect width="24" height="24" transform="translate(0.5)" fill="#1877F2" />
                    <path id="path14"
                      d="M24 12.0698C24 5.71857 18.8513 0.569849 12.5 0.569849C6.14872 0.569849 1 5.71857 1 12.0698C1 17.8098 5.20538 22.5674 10.7031 23.4301V15.3941H7.7832V12.0698H10.7031V9.53626C10.7031 6.65407 12.42 5.06204 15.0468 5.06204C16.305 5.06204 17.6211 5.28665 17.6211 5.28665V8.11672H16.171C14.7424 8.11672 14.2969 9.00319 14.2969 9.91263V12.0698H17.4863L16.9765 15.3941H14.2969V23.4301C19.7946 22.5674 24 17.8098 24 12.0698Z"
                      fill="white" />
                  </g>
                </svg>
                Sign In with Facebook
              </button>
              <button type="button" class="btn btn-light wp-100 mt-25">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="Google Logo">
                    <rect width="24" height="24" transform="translate(0.5)" fill="white" />
                    <g id="logo googleg 48dp">
                      <path id="Shape" fill-rule="evenodd" clip-rule="evenodd"
                        d="M23.54 12.2614C23.54 11.4459 23.4668 10.6618 23.3309 9.90909H12.5V14.3575H18.6891C18.4225 15.795 17.6123 17.013 16.3943 17.8284V20.7139H20.1109C22.2855 18.7118 23.54 15.7636 23.54 12.2614Z"
                        fill="#4285F4" />
                      <path id="Shape_2" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.4995 23.4998C15.6045 23.4998 18.2077 22.4701 20.1104 20.7137L16.3938 17.8283C15.364 18.5183 14.0467 18.926 12.4995 18.926C9.50425 18.926 6.96902 16.903 6.0647 14.1848H2.22266V17.1644C4.11493 20.9228 8.00402 23.4998 12.4995 23.4998Z"
                        fill="#34A853" />
                      <path id="Shape_3" fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.06523 14.1851C5.83523 13.4951 5.70455 12.758 5.70455 12.0001C5.70455 11.2421 5.83523 10.5051 6.06523 9.81506V6.83551H2.22318C1.44432 8.38801 1 10.1444 1 12.0001C1 13.8557 1.44432 15.6121 2.22318 17.1646L6.06523 14.1851Z"
                        fill="#FBBC05" />
                      <path id="Shape_4" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.4995 5.07386C14.1879 5.07386 15.7038 5.65409 16.8956 6.79364L20.194 3.49523C18.2024 1.63955 15.5992 0.5 12.4995 0.5C8.00402 0.5 4.11493 3.07705 2.22266 6.83545L6.0647 9.815C6.96902 7.09682 9.50425 5.07386 12.4995 5.07386Z"
                        fill="#EA4335" />
                    </g>
                  </g>
                </svg>
                Sign In with Google
              </button>
              <div class="text-center mt-25 d-block">
                <p class="text-secondary">
                  Don't you have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#modalRegister"
                    class="text-primary">Register Here</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Register -->
  <div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered max-w-1000">
      <div class="modal-content">
        <div class="modal-body p-0 position-relative">
          <div class="cursor-pointer position-absolute top-40 right-50 close-btn" data-bs-dismiss="modal" aria-label="Close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector"
                d="M11.0998 8.36667L15.676 3.60955C16.2376 3.02579 16.2376 2.07931 15.676 1.49507L14.659 0.437824C14.0974 -0.145941 13.1869 -0.145941 12.6249 0.437824L8.04861 5.19494L3.47234 0.437824C2.91076 -0.145941 2.00026 -0.145941 1.43823 0.437824L0.42118 1.49507C-0.140393 2.07883 -0.140393 3.02531 0.42118 3.60955L4.99746 8.36667L0.42118 13.1238C-0.140393 13.7075 -0.140393 14.654 0.42118 15.2383L1.43823 16.2955C1.99981 16.8793 2.91076 16.8793 3.47234 16.2955L8.04861 11.5384L12.6249 16.2955C13.1865 16.8793 14.0974 16.8793 14.659 16.2955L15.676 15.2383C16.2376 14.6545 16.2376 13.708 15.676 13.1238L11.0998 8.36667Z"
                fill="white" />
            </svg>
          </div>
          <div class="d-flex flex-md-row flex-column-reverse align-items-center justify-content-between br-10 overflow-hidden">
            <div class="ml-left max-w-670 wp-60 p-25">
              <img src="{{ url('assets/images/auth/ticketboxlogo.png') }}" alt="" class="mx-auto d-block">
              <div class="row d-mt-100 mt-50">
                <div class="col-12 col-sm-6">
                  <div class="form-group text-secondary">
                    <label for="" class="control-label fs-16 fw-400 mb-10">Full Name</label>
                    <div class="d-flex align-items-center justify-content-between bg-white br-8">
                      <input type="text" class="wp-100 border-0 bg-transparent px-15 py-15 fs-14 fw-400"
                        v-model="form.signup.name">
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="form-group text-secondary">
                    <label for="" class="control-label fs-16 fw-400 mb-10">Email</label>
                    <div class="d-flex align-items-center justify-content-between bg-white br-8">
                      <input type="email" class="wp-100 border-0 bg-transparent px-15 py-15 fs-14 fw-400"
                        v-model="form.signup.email">
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 mt-20">
                  <div class="form-group text-secondary">
                    <label for="" class="control-label fs-16 fw-400 mb-10">Phone</label>
                    <div class="d-flex align-items-center justify-content-between bg-white br-8">
                      <input type="number" class="wp-100 border-0 bg-transparent px-15 py-15 fs-14 fw-400"
                        v-model="form.signup.phone">
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 mt-20">
                  <div class="form-group text-secondary">
                    <label for="" class="control-label fs-16 fw-400 mb-10">Password</label>
                    <div class="d-flex align-items-center justify-content-between bg-white br-8">
                      <input type="password" class="wp-100 border-0 bg-transparent px-15 py-15 fs-14 fw-400"
                        v-model="form.signup.password">
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-block mt-30">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="toc" id="toc" v-model="form.signup.toc">
                  <label class="form-check-label fs-16 fw-400 text-light" for="toc">
                    By registering, I agree, <a href="">Terms & Conditions</a>, dan <a href="">Privacy Policy</a>
                    Tiketbox.com
                  </label>
                </div>
              </div>
              <button type="button" class="btn btn-primary wp-100 mt-40" @click="doSignUp()"
                v-text="(form.loading) ? `Please Wait...`: `Sign Up`"></button>
              <div class="text-center mt-25 d-block">
                <p class="text-secondary">
                  Already have an account? <a href="" class="text-primary" data-bs-toggle="modal"
                    data-bs-target="#modalLogin">Sign In Here</a>
                </p>
              </div>
            </div>
            <div class="ml-right max-w-480 wp-40 d-none d-md-block">
              <img src="{{ url('assets/images/auth/authbannerregister.png') }}" alt="" class="wp-100">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Forgot -->
  <div class="modal fade" id="modalForgot" tabindex="-1" aria-labelledby="modalForgotLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered max-w-1000">
      <div class="modal-content">
        <div class="modal-body p-0 position-relative">
          <div class="cursor-pointer position-absolute top-40 left-50 close-btn" data-bs-dismiss="modal" aria-label="Close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector"
                d="M11.0998 8.36667L15.676 3.60955C16.2376 3.02579 16.2376 2.07931 15.676 1.49507L14.659 0.437824C14.0974 -0.145941 13.1869 -0.145941 12.6249 0.437824L8.04861 5.19494L3.47234 0.437824C2.91076 -0.145941 2.00026 -0.145941 1.43823 0.437824L0.42118 1.49507C-0.140393 2.07883 -0.140393 3.02531 0.42118 3.60955L4.99746 8.36667L0.42118 13.1238C-0.140393 13.7075 -0.140393 14.654 0.42118 15.2383L1.43823 16.2955C1.99981 16.8793 2.91076 16.8793 3.47234 16.2955L8.04861 11.5384L12.6249 16.2955C13.1865 16.8793 14.0974 16.8793 14.659 16.2955L15.676 15.2383C16.2376 14.6545 16.2376 13.708 15.676 13.1238L11.0998 8.36667Z"
                fill="white" />
            </svg>
          </div>
          <div class="d-flex align-items-center justify-content-between br-10 overflow-hidden">
            <div class="ml-left max-w-670 wp-60 d-none d-md-block">
              <img src="{{ url('assets/images/auth/authbanner.png') }}" alt="" class="wp-100">
            </div>
            <div class="ml-right max-w-480 wp-40 p-25">
              <img src="{{ url('assets/images/auth/ticketboxlogo.png') }}" alt="" class="mx-auto d-block">
              <div class="form-group text-secondary mt-50 d-mt-100">
                <label for="" class="control-label fs-16 fw-400 mb-10">Email</label>
                <div class="d-flex align-items-center justify-content-between bg-white br-8">
                  <input type="text" class="border-0 bg-transparent px-15 fs-14 fw-400 wp-100">
                  <span class="bg-primary w-50 h-50 d-flex justify-content-center align-items-center br-8 p-15">
                    <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="Frame" clip-path="url(#clip0_179_17526)">
                        <path id="Vector"
                          d="M3.8027 3.48645L21.9778 3.48645C22.2456 3.48645 22.5024 3.59283 22.6918 3.78219C22.8811 3.97155 22.9875 4.22838 22.9875 4.49618V20.6518C22.9875 20.9196 22.8811 21.1764 22.6918 21.3658C22.5024 21.5551 22.2456 21.6615 21.9778 21.6615H3.8027C3.5349 21.6615 3.27807 21.5551 3.08871 21.3658C2.89935 21.1764 2.79297 20.9196 2.79297 20.6518L2.79297 4.49618C2.79297 4.22838 2.89935 3.97155 3.08871 3.78219C3.27807 3.59283 3.5349 3.48645 3.8027 3.48645ZM20.968 7.76567L12.9629 14.9347L4.81242 7.74346L4.81242 19.6421H20.968V7.76567ZM5.32839 5.5059L12.9518 12.2327L20.4652 5.5059L5.32839 5.5059Z"
                          fill="white" />
                      </g>
                      <defs>
                        <clipPath id="clip0_179_17526">
                          <rect width="24.2334" height="24.2334" fill="white"
                            transform="translate(0.773438 0.457275)" />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                </div>
              </div>
              <button type="button" class="btn btn-primary wp-100 mt-30" @click="doForgot()"
                v-text="(form.loading) ? `Please Wait...`: `Forgot Password`"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Modal Info --}}
  <div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="modalInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered max-w-1000">
      <div class="modal-content">
        <div class="modal-body p-0 position-relative">
          <div class="cursor-pointer position-absolute top-40 left-50 close-btn" data-bs-dismiss="modal" aria-label="Close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Vector"
                d="M11.0998 8.36667L15.676 3.60955C16.2376 3.02579 16.2376 2.07931 15.676 1.49507L14.659 0.437824C14.0974 -0.145941 13.1869 -0.145941 12.6249 0.437824L8.04861 5.19494L3.47234 0.437824C2.91076 -0.145941 2.00026 -0.145941 1.43823 0.437824L0.42118 1.49507C-0.140393 2.07883 -0.140393 3.02531 0.42118 3.60955L4.99746 8.36667L0.42118 13.1238C-0.140393 13.7075 -0.140393 14.654 0.42118 15.2383L1.43823 16.2955C1.99981 16.8793 2.91076 16.8793 3.47234 16.2955L8.04861 11.5384L12.6249 16.2955C13.1865 16.8793 14.0974 16.8793 14.659 16.2955L15.676 15.2383C16.2376 14.6545 16.2376 13.708 15.676 13.1238L11.0998 8.36667Z"
                fill="white" />
            </svg>
          </div>
          <div class="d-flex align-items-center justify-content-between br-10 overflow-hidden">
            <div class="ml-left max-w-670 wp-60">
              <img src="{{ url('assets/images/auth/authbanner.png') }}" alt="" class="wp-100">
            </div>
            <div class="ml-right max-w-480 wp-40 p-25">
              <img src="{{ url('assets/images/auth/ticketboxlogo.png') }}" alt="" class="mx-auto d-block">
              <div class="text-center text-light mt-50">
                <h3 class="fs-20 fw-700" v-text="info.title"></h3>
                <p class="fs-12 fw-400 mt-15" v-text="info.text"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Toaster -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="headerToast" class="toast" :class="alert.show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header" :class="alert.bg">
        <strong class="me-auto text-white" v-text="alert.title"></strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body" v-text="alert.msg">
      </div>
    </div>
  </div>
  {{-- bottom navbar --}}
  <div id="bottomNav" class="d-flex d-md-none position-fixed wp-100 bottom-0 left-0 right-0">
    <div class="container d-flex justify-content-center align-items-center">
      <a href="{{url('/')}}" class="wp-30 d-flex flex-column align-items-center justify-content-center text-primary py-20">
        <i class="fa-solid fa-house"></i>
        <span class="text-white fs-14 fw-400 mt-10">Home</span>
      </a>
      <a href="{{url('/audience/my-tickets')}}" class="wp-30 d-flex flex-column align-items-center justify-content-center text-primary py-20">
        <i class="fa-solid fa-ticket"></i>
        <span class="text-white fs-14 fw-400 mt-10">My Ticket</span>
      </a>
      <a href="{{url('#')}}" class="wp-30 d-flex flex-column align-items-center justify-content-center text-primary py-20">
        <i class="fa-solid fa-comments"></i>
        <span class="text-white fs-14 fw-400 mt-10">Live Chat</span>
      </a>
    </div>
  </div>
</div>
<script>
  Vue.use( CKEditor );
  const vueMainHeader = new Vue( {
    el: '#mainHeader',
    data: {
      form: {
        signin: {
          email: null,
          password: null
        },
        signup: {
          name: null,
          email: null,
          phone: null,
          password: null,
          toc: false,
          type: 'user'
        },
        forgot: {
          email: null
        },
        loading: false
      },
      modal: {
        signup: null,
        signin: null,
        forgot: null,
        info: null
      },
      active: '@if(request()->segment(1) == "audience" || request()->segment(1) == "promotor"){{ request()->segment(1) }}@else{{"audience"}}@endif',
      dropdown: false,
      alert: {
        show: 'hide',
        bg: 'bg-primary',
        title: null,
        msg: null
      },
      info: {
        title: null,
        text: null
      },
      city: [],
      searchCity: null
    },
    computed: {
      users() {
        return store.getters.users
      },
    },
    methods: {
      ...helper,
      dropDown(e){
        e.preventDefault()
        this.dropdown = !this.dropdown
      },
      async doSignIn() {
        this.alert = {
          show: false,
          msg: null
        }
        if(this.form.signin.email && this.form.signin.password && this.validateEmail(this.form.signin.email)) {
          this.form.loading = true
          try {
            let payload = {...this.form.signin}
            let req = await tiketboxApi.signIn(payload)
            if(req.status == 200) {
              let {data,msg,status} = req.data
              if(status) {
                store.dispatch('setUsers', data)
                this.modal.signin.hide()
              } else {
                this.notify('error','Error',msg)
              }
            } else {
              this.notify('error','Error','Signing in failed, Pleasy try again')
            }
            this.form.loading = false
          } catch (error) {
            this.form.loading = false
            console.log(error)
            this.notify('error','Error',error.message)
          }
        } else {
          this.notify('error','Error','Please enter valid email and password')
        }
      },
      async doSignOut() {
        this.alert = {
          show: false,
          msg: null
        }
        this.form.loading = true
        let token = this.users.access_token
        store.dispatch('setUsers', null)
        try {
          let payload = null
          let req = await tiketboxApi.signOut(payload,token)
          this.form.loading = false
          window.location.href = '{{ url("/") }}'
        } catch (error) {
          console.log(error)
          this.form.loading = false
        }
      },
      async doSignUp() {
        this.alert = {
          show: false,
          msg: null
        }
        if(this.form.signup.name && this.form.signup.email && this.form.signup.phone && this.form.signup.password && this.form.signup.toc && this.validateEmail(this.form.signup.email) && this.validatePhone(this.form.signup.phone)) {
          this.form.loading = true
          try {
            let payload = {...this.form.signup}
            let req = await tiketboxApi.createUser(payload)
            if(req.status == 200) {
              let {data,msg,status} = req.data
              if(status) {
                // store.dispatch('setUsers', data)
                // this.modal.signup.hide()
                this.info = {
                  title: 'Registrasi Berhasil',
                  text: 'Registrasi berhasil. Detil informasi akun anda telah dikirimkan ke email.'
                }
                this.modal.info.show()
              } else {
                this.notify('error','Error',msg)
              }
            } else {
              this.notify('error','Error','Signup in failed, Pleasy try again')
            }
            this.form.loading = false
          } catch (error) {
            this.form.loading = false
            console.log(error)
            this.notify('error','Error',error.message)
          }
        } else {
          this.notify(
            'error',
            'Error',
            'Please enter name, password, also valid email and phone number. Also check terms and conditions'
          )
        }
      },
      async doForgot() {

      },
      async doGetCity() {
        this.city = []
        try {
          let payload = {

          }
          let req = await tiketboxApi.readCity(payload)
          if(req.status == 200) {
            let {data,msg,status} = req.data
            if(status) {
              data.map((item) => {
                this.city.push(item.city)
              })
            }
          }
        } catch (error) {
          this.form.loading = false
          console.log(error)
          this.notify('error','Error',error.message)
        }
      },
      doSearch(){
        window.location.href="/search/"+this.searchCity
      },
      validateEmail(email) {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (email.match(validRegex)) {
          return true;
        } else {
          return false;
        }
      },
      validatePhone(phone) {
        if (phone.length >= 10 || phone.length <= 13) {
          return true;
        } else {
          return false;
        }
      },
      initModal() {
        this.modal = {
          signup: new bootstrap.Modal(document.getElementById('modalRegister')),
          signin: new bootstrap.Modal(document.getElementById('modalLogin')),
          forgot: new bootstrap.Modal(document.getElementById('modalForgot')),
          info: new bootstrap.Modal(document.getElementById('modalInfo')),
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
      this.initModal()
      this.doGetCity()
    }
  });
</script>