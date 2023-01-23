@extends('Layout.main')

@section('content')

<div class="col-lg-12 position-relative z-index-2">
    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
          <div class="col-lg-3">
            <div class="card position-sticky top-1">
              <ul class="nav flex-column bg-white border-radius-lg p-3">
                <li class="nav-item">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#header">
                    <i class="material-icons text-lg me-2">person</i>
                    <span class="text-sm">Header Section</span>
                  </a>
                </li>
                <li class="nav-item pt-2">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#steps">
                    <i class="material-icons text-lg me-2">receipt_long</i>
                    <span class="text-sm">Steps Section</span>
                  </a>
                </li>
                <li class="nav-item pt-2">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#greetingBanner">
                    <i class="material-icons text-lg me-2">lock</i>
                    <span class="text-sm">Greeting Banner</span>
                  </a>
                </li>
                <li class="nav-item pt-2">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#highlight">
                    <i class="material-icons text-lg me-2">security</i>
                    <span class="text-sm">Highlight Section</span>
                  </a>
                </li>
                <li class="nav-item pt-2">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#services">
                    <i class="material-icons text-lg me-2">settings_applications</i>
                    <span class="text-sm">Services Section</span>
                  </a>
                </li>
                <li class="nav-item pt-2">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#footer">
                    <i class="material-icons text-lg me-2">delete</i>
                    <span class="text-sm">Footer Section</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9 mt-lg-0 mt-4">
            <!-- Header -->
            <div class="card" id="header">
              <div class="card-header">
                <h5>Page Header</h5>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Hero Title</label>
                          <input type="text" class="form-control" placeholder="Alec">
                        </div>
                        <div class="input-group input-group-static mb-4">
                          <label>Sub Title</label>
                          <input type="text" class="form-control" placeholder="Alec">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group input-group-static">
                          <label>Background Image</label>
                            <input type="file" name="backgroundImage" id="backgroundImage" class="form-control">
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- Steps Section -->
            <div class="card mt-4" id="steps">
                <div class="card-header">
                <h5>Steps Info</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group input-group-static mb-4">
                              <label>Title</label>
                              <input type="text" class="form-control" placeholder="Alec">
                            </div>
                            <div class="input-group input-group-static mb-4">
                              <label>Sub Title</label>
                              <input type="text" class="form-control" placeholder="Alec">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="input-group input-group-static">
                              <label>Background Image</label>
                                <input type="file" name="backgroundImage" id="backgroundImage" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                    <textarea name="sub1" class="form-control" id="sub1" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                    <textarea name="sub1" class="form-control" id="sub1" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                    <textarea name="sub1" class="form-control" id="sub1" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Greeting Banner -->
            <div class="card mt-4" id="greetingBanner">
                <div class="card-header">
                    <h5>Greeting Banner</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group input-group-static mb-4">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Alec">
                            </div>
                            <div class="input-group input-group-static mb-4">
                            <label>Description</label>
                            <input type="text" class="form-control" placeholder="Alec">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group input-group-static">
                            <label>Image</label>
                                <input type="file" name="backgroundImage" id="backgroundImage" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Highlight Section -->
            <div class="card mt-4" id="highlight">
                <div class="card-header">
                <h5>Highlight Section</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group input-group-static mb-4">
                              <label>Title</label>
                              <input type="text" class="form-control" placeholder="Alec">
                            </div>
                            <div class="input-group input-group-static mb-4">
                              <label>Sub Title</label>
                              <input type="text" class="form-control" placeholder="Alec">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="input-group input-group-static">
                              <label>Background Image</label>
                                <input type="file" name="backgroundImage" id="backgroundImage" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    <textarea name="sub1" class="form-control" id="sub1" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    <textarea name="sub1" class="form-control" id="sub1" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Section -->
            <div class="card mt-4" id="footer">
                <div class="card-header">
                <h5>Footer Section</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Facebook Link</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Twitter Link</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Instagram Link</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection