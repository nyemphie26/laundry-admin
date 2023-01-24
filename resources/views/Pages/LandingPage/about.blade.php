@extends('Layout.main')

@section('content')

<div class="col-lg-12 position-relative z-index-2">
    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
          <div class="col-lg-3">
            <div class="card position-sticky top-1">
              <ul class="nav flex-column bg-white border-radius-lg p-3">
                <li class="nav-item">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#first">
                    <i class="material-icons text-lg me-2">person</i>
                    <span class="text-sm">First Row</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#teams">
                    <i class="material-icons text-lg me-2">person</i>
                    <span class="text-sm">Teams</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9 mt-lg-0 mt-4">
            <!-- Page Header -->
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-auto col-lg-5">
                            <div class="input-group input-group-static mb-4">
                                <label>Title</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                            <div class="avatar avatar-xl position-relative">
                            <img src="../../../assets/img/bruce-mars.jpg" alt="bruce" class="w-100 rounded-circle shadow-sm">
                            </div>
                        </div>
                        <div class="col-sm-auto col-lg-5">
                            <div class="input-group input-group-static">
                                <label>Background Picture</label>
                                  <input type="file" name="picture" id="picture" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn bg-gradient-primary btn-sm float-lg-end">Save</button>
                </div>
            </div>
            <!-- First -->
            <div class="card mt-4" id="first">
              <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5>First Row</h5>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <button class="btn btn-outline-primary btn-sm mb-0">New Row</button>
                        </div>
                    </div>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Title</label>
                          <input type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                          <label>Description</label>
                          <textarea name="desc" id="desc" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group input-group-static">
                          <label>Picture</label>
                            <input type="file" name="picture" id="picture" class="form-control">
                        </div>
                    </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn bg-gradient-primary btn-sm float-lg-end">Save</button>
              </div>
            </div>
            <!-- Teams -->
            <div class="card mt-4" id="teams">
                <div class="card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5>The Team</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <button class="btn btn-outline-primary btn-sm mb-0">New Team</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Title</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="input-group input-group-static mb-4">
                            <label>Description</label>
                            <textarea name="desc" id="desc" cols="30" rows="5" class="form-control"></textarea>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="input-group input-group-static">
                            <label>Avatar</label>
                              <input type="file" name="avatar" id="avatar" class="form-control">
                          </div>
                      </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn bg-gradient-primary btn-sm float-lg-end">Save</button>
                </div>
              </div>
          </div>
        </div>
      </div>
</div>
@endsection
