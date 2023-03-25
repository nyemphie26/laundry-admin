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
                    <div class="col-lg-12">
                        <div class="input-group input-group-static mb-4">
                            <label>Title</label>
                            <input type="text" class="form-control" id="location_title" value="{{ $data['Location_title'] ?? '' }}">
                        </div>
                        <label>Description</label>
                        <div id="location_desc_quill" class="h-50">
                          {!! $data['Location_desc'] ?? '' !!}
                        </div>
                        <input type="hidden" class="form-control" placeholder="Section Description" id="location_desc" value="{{ $data['Location_desc'] ?? '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group input-group-static mb-4">
                            <label>Location URL</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (input with no space)
                            </p>
                            <textarea name="url" id="url" cols="30" rows="4" class="form-control outline">{{ $data['Location_url'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group input-group-static mb-4">
                            <label class="text-danger">How to embed location url from google maps</label>
                            <ol class="text-sm">
                                <li>Go to Google Maps (https://www.google.com/maps) and search for the location you want to embed.</li>
                                <li>Click on the "Share" button located on the left side of the screen.</li>
                                <li>Select "Embed a map" from the list of sharing options.</li>
                                <li>Within the < iframe > tag, look for the src attribute, which will contain the link to the embedded map.</li>
                                <li>Copy the link provided in the src attribute.</li>
                                <li>Paste the code into the Location URL field above.</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="text-danger text-sm">Watch this code bellow for example. Only copy the highlight text (the text inside double quoted) from the src attribute</span>
                        <div class="card card-body border card-plain border-radius-lg mt-2">
                            <p class="text-sm">
                                src="<mark>https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.65368139313!2d151.17972371536112!3d-33.95003438063375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12b0f11b3383db%3A0xafdf355d5a4b6577!2sBandar%20Udara%20Sydney!5e0!3m2!1sid!2sid!4v1679713565636!5m2!1sid!2sid</mark>"
                            </p>
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
            var url                 = document.getElementById('url').value;
            let formdata    = new FormData();
            formdata.append('Location.title', locationTitle);
            formdata.append('Location.desc', locationDesc);
            formdata.append('Location.url', url);
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