@extends('Layout.main')

@section('content')

<div class="col-lg-12 position-relative z-index-2">
    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
          <div class="col-lg-3">
            <div class="card position-sticky top-1">
              <ul class="nav flex-column bg-white border-radius-lg p-3">
                <li class="nav-item">
                  <a class="nav-link text-dark d-flex" data-scroll="" href="#1">
                    <i class="material-icons text-lg me-2">person</i>
                    <span class="text-sm">Location #1</span>
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
            <div class="card mt-4" id="1">
            <div class="card-header pb-0">
                <h5>Location #1</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group input-group-static mb-4">
                            <label>Title</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-12">
                            <label class="mt-4">Description</label>
                            <div id="edit-deschiption-edit" class="h-50">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group input-group-static mb-4">
                            <label>G-Maps Coordinate</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (latitude)
                            </p>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>G-Maps Coordinate</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (longitude)
                            </p>
                            <input type="text" class="form-control">
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

@section('page-script')
    <script src="{{ asset('assets/js/plugins/quill.min.js') }}"></script>
    <script>
        if (document.getElementById('edit-deschiption-edit')) {
            var quill = new Quill('#edit-deschiption-edit', {
                theme: 'snow' // Specify theme in configuration
            });
        };
    </script>
@endsection