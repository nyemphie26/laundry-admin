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
                    <div class="row justify-content-center">
                        <div class="col-sm-auto col-lg-6">
                            <div class="input-group input-group-static">
                                <label>Page Title</label>
                                <input type="text" class="form-control" id="contact_title" value="{{ $data['Contact_title'] ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-auto col-lg-6">
                            <div class="input-group input-group-static">
                                <label>Background Picture</label>
                                  <input type="file" name="contact_background" id="contact_background" class="form-control" onchange="previewImg(this.id, 'preview-contact-background')">
                            </div>
                            <div class="py-3 text-center">
                              <img src="{{ $data['Contact_background'] ?? '' }}" class="preview-contact-background img-fluid shadow border-radius-lg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updatePage()">Save</button>
                </div>
            </div>
            <!-- First -->
            <div class="card mt-4" id="1">
            <div class="card-header pb-0">
                <h5>Location</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group input-group-static mb-4">
                            <label>Title</label>
                            <input type="text" class="form-control" id="location_title" value="{{ $data['Location_title'] ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label>Description</label>
                            <div id="location_desc_quill" class="h-50">
                              {!! $data['Location_desc'] ?? '' !!}
                            </div>
                            <input type="hidden" class="form-control" placeholder="Section Description" id="location_desc" value="{{ $data['Location_desc'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group input-group-static mb-4">
                            <label>G-Maps Coordinate</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (latitude)
                            </p>
                            <input type="text" class="form-control" id="location_latitude" value="{{ $data['Location_latitude'] ?? '' }}">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>G-Maps Coordinate</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (longitude)
                            </p>
                            <input type="text" class="form-control" id="location_longitude" value="{{ $data['Location_longitude'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updateLocation()">Save</button>
            </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/plugins/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/formPreviewImage.js') }}"></script>
    <script>
        if (document.getElementById('location_desc_quill')) {
            var quill = new Quill('#location_desc_quill', {
            theme: 'snow' // Specify theme in configuration
            });
            
            let inputElement = document.getElementById('location_desc')
            quill.on('text-change', function() {
            // sets the value of the hidden input from
            // the editor content
            inputElement.value = quill.root.innerHTML
            });
        };

        function updatePage(){
            var heroTitle        = document.getElementById('contact_title').value;
            var backgroundImage  = document.getElementById("contact_background");
            let formdata    = new FormData();
            formdata.append('Contact.title', heroTitle);
            formdata.append('Contact.background',backgroundImage.files[0]);
            updateValue(formdata);
        }

        function updateLocation(){
            var locationTitle       = document.getElementById('location_title').value;
            var locationDesc        = document.getElementById('location_desc').value;
            var latitude            = document.getElementById('location_latitude').value;
            var longitude           = document.getElementById('location_longitude').value;
            let formdata    = new FormData();
            formdata.append('Location.title', locationTitle);
            formdata.append('Location.desc', locationDesc);
            formdata.append('Location.latitude', latitude);
            formdata.append('Location.longitude', longitude);
            updateValue(formdata);
        }

        function updateValue(formdata){
            fetch('/contact',{
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