<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/analytics.html " target="_blank">
        <img src="../../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">{{ env('APP_NAME') }}</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mb-2 mt-0">
          <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button" aria-expanded="false">
            <img src="../../assets/img/team-3.jpg" class="avatar">
            <span class="nav-link-text ms-2 ps-1">Brooklyn Alice</span>
          </a>
          <div class="collapse" id="ProfileNav" style="">
            <ul class="nav ">
              <li class="nav-item">
                <a class="nav-link text-white" href="../../pages/pages/profile/overview.html">
                  <span class="sidenav-mini-icon"> MP </span>
                  <span class="sidenav-normal  ms-3  ps-1"> My Profile </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white " href="../../pages/pages/account/settings.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Settings </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white " href="../../pages/authentication/signin/basic.html">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <hr class="horizontal light mt-0">
        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <i class="material-icons-round opacity-10">dashboard</i>
            <span class="nav-link-text ms-2 ps-1">Dashboards</span>
          </a>
          <div class="collapse  show" id="dashboardsExamples">
            <ul class="nav ">
              <li class="nav-item active">
                <a class="nav-link text-white active" href="/">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Analytics </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">Settings</h6>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#landingPage" class="nav-link text-white" aria-controls="landingPage" role="button" aria-expanded="false">
            <i class="material-icons-round opacity-10">dashboard</i>
            <span class="nav-link-text ms-2 ps-1">Landing Page</span>
          </a>
          <div class="collapse" id="landingPage">
            <ul class="nav ">
              <li class="nav-item">
                <a class="nav-link text-white" href="/main-page">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Main Page </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="../../pages/dashboards/analytics.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Service Page </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/about">
                  <span class="sidenav-mini-icon"> As </span>
                  <span class="sidenav-normal  ms-2  ps-1"> About Us Page </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="../../pages/dashboards/analytics.html">
                  <span class="sidenav-mini-icon"> Cs </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Contact Us Page </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </aside>