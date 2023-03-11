<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/" >
        <img src="../../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">{{ env('APP_NAME') }}</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        {{-- Account Nav --}}
        <li class="nav-item mb-2 mt-0 {{ request()->route()->named('account*') ? 'active' : '' }}">
          <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white {{ request()->route()->named('account*') ? 'active' : '' }}" aria-controls="ProfileNav" role="button" aria-expanded="false">
            <img src="{{Auth::user()->avatar_path }}" class="avatar">
            <span class="nav-link-text ms-2 ps-1">{{ Auth::user()->full_name }}</span>
          </a>
          <div class="collapse {{ request()->route()->named('account*') ? 'show' : '' }}" id="ProfileNav" style="">
            <ul class="nav ">
              <li class="nav-item {{ request()->route()->named('account.settings*') ? 'active' : '' }}">
                <a class="nav-link text-white {{ request()->route()->named('account.settings*') ? 'active' : '' }}" href="{{ route('account.settings') }}">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Account Settings </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                              document.getElementById('logout-form').submit();">

                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          </div>
        </li>
        <hr class="horizontal light mt-0">
        @can('access admin page')
        {{-- Dashboard Nav --}}
        <li class="nav-item {{ request()->route()->named('dashboard.main*') ? 'active' : '' }}">
          <a class="nav-link text-white {{ request()->route()->named('dashboard.main*') ? 'active bg-gradient-primary' : '' }}" href="/">
            <i class="material-icons-round opacity-10">dashboard</i>
            <span class="sidenav-normal  ms-2  ps-1"> Dashboard </span>
          </a>
        </li>
        {{-- Orders Nav --}}
        <li class="nav-item {{ request()->route()->named('orders*') ? 'active' : '' }}">
          <a data-bs-toggle="collapse" href="#ordersExamples" class="nav-link text-white {{ request()->route()->named('orders*') ? 'active' : '' }}" aria-controls="ordersExamples" role="button" aria-expanded="false">
            <i class="material-icons-round opacity-10">receipt_long</i>
            <span class="nav-link-text ms-2 ps-1">Orders</span>
          </a>
          <div class="collapse {{ request()->route()->named('orders*') ? 'show' : '' }}" id="ordersExamples">
            <ul class="nav ">
              <li class="nav-item {{ request()->route()->named('orders.incoming*') ? 'active' : '' }}">
                <a class="nav-link text-white {{ request()->route()->named('orders.incoming*') ? 'active' : '' }}" href="{{ route('orders.incoming') }}">
                  <span class="sidenav-mini-icon"> I </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Incoming Orders </span>
                </a>
              </li>
              <li class="nav-item {{ request()->route()->named('orders.list*') ? 'active' : '' }}">
                <a class="nav-link text-white {{ request()->route()->named('orders.list*') ? 'active' : '' }}" href="{{ route('orders.list') }}">
                  <span class="sidenav-mini-icon"> O </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">Settings</h6>
        </li>
        {{-- Services Nav --}}
        <li class="nav-item {{ request()->route()->named(['products*','service.*','category.*']) ? 'active' : '' }}">
          <a class="nav-link text-white {{ request()->route()->named(['products*','service.*','category.*']) ? 'active bg-gradient-primary' : '' }}" href="{{ route('products.index') }}">
            <i class="material-icons-round opacity-10">local_laundry_service</i>
            <span class="sidenav-normal  ms-2  ps-1"> Services & Categories </span>
          </a>
        </li>
         {{-- Landing Page Nav --}}
        <li class="nav-item {{ request()->route()->named('landingpage*') ? 'active' : '' }}">
          <a data-bs-toggle="collapse" href="#landingPage" class="nav-link text-white {{ request()->route()->named('landingpage*') ? 'active' : '' }}" aria-controls="landingPage" role="button" aria-expanded="false">
            <i class="material-icons-round opacity-10">language</i>
            <span class="nav-link-text ms-2 ps-1">Landing Page</span>
          </a>
          <div class="collapse {{ request()->route()->named('landingpage*') ? 'show' : '' }}" id="landingPage">
            <ul class="nav ">
              <li class="nav-item {{ request()->route()->named('landingpage.main*') ? 'active' : '' }}">
                <a class="nav-link text-white {{ request()->route()->named('landingpage.main*') ? 'active' : '' }}" href="/main-page">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Main Page </span>
                </a>
              </li>
              <li class="nav-item {{ request()->route()->named('landingpage.about*') ? 'active' : '' }}">
                <a class="nav-link text-white {{ request()->route()->named('landingpage.about*') ? 'active' : '' }}" href="/about">
                  <span class="sidenav-mini-icon"> As </span>
                  <span class="sidenav-normal  ms-2  ps-1"> About Us Page </span>
                </a>
              </li>
              <li class="nav-item {{ request()->route()->named('landingpage.contact*') ? 'active' : '' }}">
                <a class="nav-link text-white {{ request()->route()->named('landingpage.contact*') ? 'active' : '' }}" href="/contact">
                  <span class="sidenav-mini-icon"> Cs </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Contact Us Page </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        {{-- Users Nav --}}
        <li class="nav-item {{ request()->route()->named('users*') ? 'active' : '' }}">
          <a data-bs-toggle="collapse" href="#users" class="nav-link text-white {{ request()->route()->named('users*') ? 'active' : '' }}" aria-controls="users" role="button" aria-expanded="false">
            <i class="material-icons-round opacity-10">people</i>
            <span class="nav-link-text ms-2 ps-1">Users</span>
          </a>
          <div class="collapse {{ request()->route()->named('users*') ? 'show' : '' }}" id="users">
            <ul class="nav ">
              <li class="nav-item {{ request()->route()->named('users.customers*') ? 'active' : '' }}">
                <a class="nav-link text-white {{ request()->route()->named('users.customers*') ? 'active' : '' }}" href="{{ route('users.customers') }}">
                  <span class="sidenav-mini-icon"> Cl </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Customer Lists </span>
                </a>
              </li>
              <li class="nav-item {{ request()->route()->named('users.employees*') ? 'active' : '' }}">
                <a class="nav-link text-white {{ request()->route()->named('users.employees*') ? 'active' : '' }}" href="{{ route('users.employees') }}">
                  <span class="sidenav-mini-icon"> El </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Employee Lists </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        @endcan
      </ul>
    </div>
  </aside>