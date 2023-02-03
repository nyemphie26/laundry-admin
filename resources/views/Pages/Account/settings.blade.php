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
                      {{-- <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#2fa">
                          <i class="material-icons text-lg me-2">security</i>
                          <span class="text-sm">2FA</span>
                        </a>
                      </li> --}}
                    </ul>
                  </div>
                </div>
                <div class="col-lg-9 mt-lg-0 mt-4">
                  {{-- @include('Pages.Users.employees-new') --}}
                  <!-- Card Profile -->
                  <div class="card card-body" id="profile">
                    <div class="row justify-content-center align-items-center">
                      <div class="col-sm-auto col-4">
                        <div class="avatar avatar-xl position-relative">
                          <img src="{{ asset('storage/'.Auth::user()->avatar_path) }}" alt="bruce" class="w-100 rounded-circle shadow-sm">
                        </div>
                      </div>
                      <div class="col-sm-auto col-8 my-auto">
                        <div class="h-100">
                          <h5 class="mb-1 font-weight-bolder">
                            {{ Auth::user()->full_name }}
                          </h5>
                          <p class="mb-0 font-weight-normal text-sm">
                            @foreach (Auth::user()->getRoleNames() as $item)
                                {{ $item }},
                            @endforeach
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                        {{-- <label class="form-check-label mb-0">
                          <small id="profileVisibility">
                            Switch to invisible
                          </small>
                        </label>
                        <div class="form-check form-switch ms-2 my-auto">
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()">
                        </div> --}}
                      </div>
                    </div>
                  </div>
                  <!-- Card Basic Info -->
                  <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                      <h5>Basic Info</h5>
                    </div>
                    <form class="form pb-4" action="{{ route('account.settings.update', Auth::user()) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method("PUT")
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-6">
                            <div class="input-group input-group-static">
                              <label>First Name</label>
                              <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="input-group input-group-static">
                              <label>Last Name</label>
                              <input name="last_name" type="text" class="form-control" value="{{ Auth::user()->last_name }}">
                            </div>
                          </div>
                        </div>
                        <div class="row mt-4">
                          <div class="col-6">
                            <div class="input-group input-group-static">
                              <label>Email</label>
                              <input name="email" type="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="input-group input-group-static">
                              <label>Phone Number</label>
                              <input name="phone" type="number" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>
                          </div>
                        </div>
                        <div class="row mt-4">
                          <div class="col-2">
                            <img class="preview-img img-fluid shadow border-radius-lg">
                          </div>
                          <div class="col-10">
                            <label class="form-label">Profile images</label>
                            <input type="file" name="avatar" id="avatar" class="form-control border @error('avatar') border-danger my-3 is-invalid @enderror" onchange="previewImg(this.id,'preview-img')">
                            @error('avatar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <p class="text-xs text-success mt-2">Leave this blank if no avatar updates</p>
                          </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-3 mb-0">Update Profile</button>
                      </div>
                    </form>
                  </div>
                  <!-- Card Change Password -->
                  <div class="card mt-4" id="password">
                    <div class="card-header">
                      <h5>Change Password</h5>
                    </div>
                    <form class="form pb-4" action="{{ route('account.settings.updatePass', Auth::user()) }}" method="post">
                      @csrf
                      @method("PUT")
                      <div class="card-body pt-0">
                        <div class="input-group input-group-outline @error('current_password') mb-5 is-invalid @enderror">
                          <label class="form-label">Current password</label>
                          <input type="password" class="form-control" name="current_password">
                          @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="input-group input-group-outline my-4 @error('password') mb-5 is-invalid @enderror">
                          <label class="form-label">New password</label>
                          <input type="password" class="form-control" name="password">
                          @error('password')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Confirm New password</label>
                          <input type="password" class="form-control" name="password_confirmation">
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
                            <span class="text-sm">Min 8 characters</span>
                          </li>
                          <li>
                            <span class="text-sm">One number (2 are recommended)</span>
                          </li>
                          <li>
                            <span class="text-sm">Change it often</span>
                          </li>
                        </ul>
                        <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update password</button>
                      </div>
                    </form>
                  </div>
                  <!-- Card Change Password -->
                  {{-- <div class="card mt-4" id="2fa">
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
                  </div> --}}
                </div>
              </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/plugins/formPreviewImage.js') }}"></script>
@endsection