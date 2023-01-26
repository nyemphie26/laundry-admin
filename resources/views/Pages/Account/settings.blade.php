@extends('Layout.main')
@section('content')
    <div class="col-lg-12 position-relative z-index-2">
        <div class="container-fluid my-3 py-3">
            <div class="row mb-5">
                <div class="col-lg-3">
                  <div class="card position-sticky top-1">
                    <ul class="nav flex-column bg-white border-radius-lg p-3">
                      <li class="nav-item">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#profile">
                          <i class="material-icons text-lg me-2">person</i>
                          <span class="text-sm">Profile</span>
                        </a>
                      </li>
                      <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#basic-info">
                          <i class="material-icons text-lg me-2">receipt_long</i>
                          <span class="text-sm">Basic Info</span>
                        </a>
                      </li>
                      <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#password">
                          <i class="material-icons text-lg me-2">lock</i>
                          <span class="text-sm">Change Password</span>
                        </a>
                      </li>
                      <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#2fa">
                          <i class="material-icons text-lg me-2">security</i>
                          <span class="text-sm">2FA</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-9 mt-lg-0 mt-4">
                  <!-- Card Profile -->
                  <div class="card card-body" id="profile">
                    <div class="row justify-content-center align-items-center">
                      <div class="col-sm-auto col-4">
                        <div class="avatar avatar-xl position-relative">
                          <img src="../../../assets/img/bruce-mars.jpg" alt="bruce" class="w-100 rounded-circle shadow-sm">
                        </div>
                      </div>
                      <div class="col-sm-auto col-8 my-auto">
                        <div class="h-100">
                          <h5 class="mb-1 font-weight-bolder">
                            Richard Davis
                          </h5>
                          <p class="mb-0 font-weight-normal text-sm">
                            Customer
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                        <label class="form-check-label mb-0">
                          <small id="profileVisibility">
                            Switch to invisible
                          </small>
                        </label>
                        <div class="form-check form-switch ms-2 my-auto">
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card Basic Info -->
                  <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                      <h5>Basic Info</h5>
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-6">
                          <div class="input-group input-group-static">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="Alec">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group input-group-static">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Thompson">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4 col-6">
                          <label class="form-label mt-4 ms-0">I'm</label>
                          <select class="form-control" name="choices-gender" id="choices-gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                        <div class="col-sm-8">
                          <div class="row">
                            <div class="col-sm-5 col-5">
                              <label class="form-label mt-4 ms-0">Birth Date</label>
                              <select class="form-control" name="choices-month" id="choices-month"></select>
                            </div>
                            <div class="col-sm-4 col-3">
                              <label class="form-label mt-4 ms-0">&nbsp;</label>
                              <select class="form-control" name="choices-day" id="choices-day"></select>
                            </div>
                            <div class="col-sm-3 col-4">
                              <label class="form-label mt-4">&nbsp;</label>
                              <select class="form-control" name="choices-year" id="choices-year"></select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-4">
                        <div class="col-6">
                          <div class="input-group input-group-static">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="example@email.com">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group input-group-static">
                            <label>Confirm Email</label>
                            <input type="email" class="form-control" placeholder="example@email.com">
                          </div>
                        </div>
                      </div>
                      <div class="row mt-4">
                        <div class="col-6">
                          <div class="input-group input-group-static">
                            <label>Your location</label>
                            <input type="text" class="form-control" placeholder="Sydney, A">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group input-group-static">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" placeholder="+40 735 631 620">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 align-self-center">
                          <label class="form-label mt-4 ms-0">Language</label>
                          <select class="form-control" name="choices-language" id="choices-language">
                            <option value="English">English</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label mt-4">Skills</label>
                          <input class="form-control" id="choices-skills" type="text" value="vuejs, angular, react" placeholder="Enter something" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card Change Password -->
                  <div class="card mt-4" id="password">
                    <div class="card-header">
                      <h5>Change Password</h5>
                    </div>
                    <div class="card-body pt-0">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Current password</label>
                        <input type="password" class="form-control">
                      </div>
                      <div class="input-group input-group-outline my-4">
                        <label class="form-label">New password</label>
                        <input type="password" class="form-control">
                      </div>
                      <div class="input-group input-group-outline">
                        <label class="form-label">Confirm New password</label>
                        <input type="password" class="form-control">
                      </div>
                      <h5 class="mt-5">Password requirements</h5>
                      <p class="text-muted mb-2">
                        Please follow this guide for a strong password:
                      </p>
                      <ul class="text-muted ps-4 mb-0 float-start">
                        <li>
                          <span class="text-sm">One special characters</span>
                        </li>
                        <li>
                          <span class="text-sm">Min 6 characters</span>
                        </li>
                        <li>
                          <span class="text-sm">One number (2 are recommended)</span>
                        </li>
                        <li>
                          <span class="text-sm">Change it often</span>
                        </li>
                      </ul>
                      <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update password</button>
                    </div>
                  </div>
                  <!-- Card Change Password -->
                  <div class="card mt-4" id="2fa">
                    <div class="card-header d-flex">
                      <h5 class="mb-0">Connected Social Accounts</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-youtube btn-icon-only disabled">
                                <span class="btn-inner--icon"><i class="fab fa-google"></i></span>
                            </button>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (connected)
                            </p>
                        </div>
                        <hr class="horizontal dark">
                        <div class="d-flex">
                            <button type="button" class="btn btn-facebook btn-icon">
                                <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                                <span class="btn-inner--text">Facebook</span>
                            </button>
                        </div>
                        <hr class="horizontal dark">
                        <div class="d-flex">
                            <button type="button" class="btn btn-twitter btn-icon">
                                <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                                <span class="btn-inner--text">Twitter</span>
                            </button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection