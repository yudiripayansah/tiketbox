<nav class="navbar navbar-expand-lg main-header position-fixed">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="{{ url('assets\images\layout\ticketboxlogo.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-nav">
      <ul class="navbar-nav me-auto d-ms-70">
        <li class="nav-item">
          <a class="nav-link text-light" href="#">
            <svg width="19" height="25" viewBox="0 0 19 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
              <path id="Vector" d="M8.41152 24.4956C1.31689 14.2105 0 13.1549 0 9.375C0 4.19731 4.19731 0 9.375 0C14.5527 0 18.75 4.19731 18.75 9.375C18.75 13.1549 17.4331 14.2105 10.3385 24.4956C9.8729 25.1682 8.87705 25.1681 8.41152 24.4956ZM9.375 13.2812C11.5324 13.2812 13.2812 11.5324 13.2812 9.375C13.2812 7.21763 11.5324 5.46875 9.375 5.46875C7.21763 5.46875 5.46875 7.21763 5.46875 9.375C5.46875 11.5324 7.21763 13.2812 9.375 13.2812Z" fill="#3E63F9"/>
            </svg>              
            Location
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item me-30">
          <a class="nav-link text-light" href="{{ url('backoffice/my-events/form') }}">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
              <path id="Vector" d="M12.1094 0C5.41992 0 0 5.41992 0 12.1094C0 18.7988 5.41992 24.2188 12.1094 24.2188C18.7988 24.2188 24.2188 18.7988 24.2188 12.1094C24.2188 5.41992 18.7988 0 12.1094 0ZM19.1406 13.4766C19.1406 13.7988 18.877 14.0625 18.5547 14.0625H14.0625V18.5547C14.0625 18.877 13.7988 19.1406 13.4766 19.1406H10.7422C10.4199 19.1406 10.1562 18.877 10.1562 18.5547V14.0625H5.66406C5.3418 14.0625 5.07812 13.7988 5.07812 13.4766V10.7422C5.07812 10.4199 5.3418 10.1562 5.66406 10.1562H10.1562V5.66406C10.1562 5.3418 10.4199 5.07812 10.7422 5.07812H13.4766C13.7988 5.07812 14.0625 5.3418 14.0625 5.66406V10.1562H18.5547C18.877 10.1562 19.1406 10.4199 19.1406 10.7422V13.4766Z" fill="#3E63F9"/>
            </svg>              
            Create Events
          </a>
        </li>
        <li class="nav-item me-30">
          <a class="nav-link text-light" href="#">
            <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5">
              <path id="Vector" d="M5.55556 4.16667H19.4444V12.5H5.55556V4.16667ZM22.9167 8.33333C22.9167 9.48394 23.8494 10.4167 25 10.4167V14.5833C25 15.7339 24.0673 16.6667 22.9167 16.6667H2.08333C0.932726 16.6667 0 15.7339 0 14.5833V10.4167C1.15061 10.4167 2.08333 9.48394 2.08333 8.33333C2.08333 7.18273 1.15061 6.25 0 6.25V2.08333C0 0.932726 0.932726 0 2.08333 0H22.9167C24.0673 0 25 0.932726 25 2.08333V6.25C23.8494 6.25 22.9167 7.18273 22.9167 8.33333ZM20.8333 3.81944C20.8333 3.24414 20.367 2.77778 19.7917 2.77778H5.20833C4.63303 2.77778 4.16667 3.24414 4.16667 3.81944V12.8472C4.16667 13.4225 4.63303 13.8889 5.20833 13.8889H19.7917C20.367 13.8889 20.8333 13.4225 20.8333 12.8472V3.81944Z" fill="#3E63F9"/>
            </svg>
            My Tickets
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary br-20 py-10 px-35 fs-14" href="#">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>