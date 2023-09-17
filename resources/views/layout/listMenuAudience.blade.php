<h6 class="fs-14 fw-500 text-light">Menu</h6>
<ul class="list-unstyled m-0 p-0 bo-list-menu">
  @foreach ($menus['audience'] as $m)
  <li>
    <a href="{{ $m['url'] }}" class="p-15 br-5 text-secondary text-hover-dark d-flex align-items-center text-decoration-none {{ (Request::url() == $m['url']) ? 'active' : '' }}">
      @include('svg.'.$m['icon'])
      <span class="ms-10">
        {{$m['label']}}
      </span>         
    </a>
  </li>
  @endforeach
</ul>
<h6 class="fs-14 fw-500 text-light mt-25">Informasi Akun</h6>
<ul class="list-unstyled m-0 p-0 bo-list-menu">
  @foreach ($menus['audienceBot'] as $m)
  <li>
    <a href="{{ $m['url'] }}" class="p-15 br-5 text-secondary text-hover-dark d-flex align-items-center text-decoration-none {{ (Request::url() == $m['url']) ? 'active' : '' }}">
      @include('svg.'.$m['icon'])
      <span class="ms-10">
        {{$m['label']}}
      </span>         
    </a>
  </li>
  @endforeach
</ul>