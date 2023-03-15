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
                    <div class="row justify-content-center">
                        <div class="col-sm-auto col-lg-6">
                            <div class="input-group input-group-static">
                                <label>Page Title</label>
                                <input type="text" class="form-control" id="about_title" value="{{ $data['About_title'] ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-auto col-lg-6">
                            <div class="input-group input-group-static">
                                <label>Background Picture</label>
                                  <input type="file" name="about_background" id="about_background" class="form-control" onchange="previewImg(this.id, 'preview-about-background')">
                            </div>
                            <div class="py-3 text-center">
                              <img src="{{ $data['About_background'] ?? '' }}" class="preview-about-background img-fluid shadow border-radius-lg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updatePage()">Save</button>
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
                            {{-- <button class="btn btn-outline-primary btn-sm mb-0">New Row</button> --}}
                        </div>
                    </div>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Title</label>
                          <input type="text" class="form-control" id="first_row_title" value="{{ $data['First_row_title'] ?? '' }}">
                        </div>
                        <div class="input-group input-group-static mb-4">
                          <label>Description</label>
                          <textarea name="desc" cols="30" rows="5" class="form-control" id="first_row_desc">{{ $data['First_row_desc'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="input-group input-group-static">
                          <label>Picture</label>
                          <input type="file" name="first_row_picture" id="first_row_picture" class="form-control" onchange="previewImg(this.id, 'preview-first-row-picture')">
                      </div>
                      <div class="py-3 text-center">
                        <img src="{{ $data['First_row_picture'] ?? '' }}" class="preview-first-row-picture img-fluid shadow border-radius-lg">
                      </div>
                    </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updateRow()">Save</button>
              </div>
            </div>
            <!-- Teams -->
            {{-- <div class="card mt-4" id="teams">
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
            </div> --}}
          </div>
        </div>
      </div>
</div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/plugins/formPreviewImage.js') }}"></script>
    <script>
      function updatePage(){
        var heroTitle        = document.getElementById('about_title').value;
        var backgroundImage  = document.getElementById("about_background");
        let formdata    = new FormData();
        formdata.append('About.title', heroTitle);
        formdata.append('About.background',backgroundImage.files[0]);
        updateValue(formdata);
      }
      
      function updateRow(){
        var rowTitle        = document.getElementById('first_row_title').value;
        var rowDesc        = document.getElementById('first_row_desc').value;
        var backgroundImage  = document.getElementById("first_row_picture");
        
        let formdata    = new FormData();
        formdata.append('First.row.title', rowTitle);
        formdata.append('First.row.desc', rowDesc);
        formdata.append('First.row.picture',backgroundImage.files[0]);
        updateValue(formdata);
      }

      function updateValue(formdata){
        fetch('/about',{
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // replace with your own CSRF token
            },
            body: formdata
        })
        .then(res=>res.json())
        .then(data=>{
            location.reload();
        })
        // .then(data=>console.log(data))
        .catch(err=>console.log(err))
      };
    </script>
@endsection
