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
                          <input type="text" class="form-control" placeholder="Hero Title" id="hero_title" value="{{ $data['Header_title'] ?? '' }}">
                        </div>
                        <div class="input-group input-group-static mb-4">
                          <label>Sub Title</label>
                          <input type="text" class="form-control" placeholder="Sub Title" id="sub_title" value="{{ $data['Header_subTitle'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group input-group-static">
                          <label>Background Image</label>
                            <input type="file" name="backgroundImage" id="backgroundImage" class="form-control" onchange="previewImg(this.id,'preview-header-background')">
                        </div>
                        <div class="py-3 text-center">
                          <img src="{{ $data['Header_background'] ?? '' }}" class="preview-header-background img-fluid shadow border-radius-lg">
                        </div>
                    </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updateHeader(this)">Save</button>
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
                              <input type="text" class="form-control" placeholder="Section Title" id="section-steps-title" value="{{ $data['Steps_title'] ?? '' }}">
                            </div>
                            <div class="input-group input-group-static mb-4">
                              <label>Sub Title</label>
                              <input type="text" class="form-control" placeholder="Section Subtitle" id="section-steps-subTitle" value="{{ $data['Steps_subTitle'] ?? '' }}">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="input-group input-group-static">
                              <label>Background Image</label>
                                <input type="file" name="stepsBackgroundImage" id="stepsBackgroundImage" class="form-control" onchange="previewImg(this.id,'preview-steps-background')">
                            </div>
                            <div class="py-3 text-center">
                              <img src="{{ $data['Steps_background'] ?? '' }}" class="preview-steps-background img-fluid shadow border-radius-lg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control" id="steps-one-title" value="{{ $data['Steps_one_title'] ?? '' }}">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                    <textarea name="sub1" class="form-control" id="steps-one-desc" cols="30" rows="3">{{ $data['Steps_one_desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control" id="steps-two-title" value="{{ $data['Steps_two_title'] ?? '' }}">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                    <textarea name="sub1" class="form-control" id="steps-two-desc" cols="30" rows="3">{{ $data['Steps_two_desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control" id="steps-three-title" value="{{ $data['Steps_three_title'] ?? '' }}">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                    <textarea name="sub1" class="form-control" id="steps-three-desc" cols="30" rows="3">{{ $data['Steps_three_desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updateSteps(this)">Save</button>
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
                            <input type="text" class="form-control" placeholder="Section Title" id="greetings_title" value="{{ $data['Greetings_title'] ?? '' }}">
                            </div>
                            <label>Description</label>
                            <div id="greetings_desc_quill" class="h-50">
                              {!! $data['Greetings_desc'] ?? '' !!}
                            </div>
                            <input type="hidden" class="form-control" placeholder="Section Description" id="greetings_desc" value="{{ $data['Greetings_desc'] ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group input-group-static">
                              <label>Image</label>
                              <input type="file" name="greetingsBackgroundImage" id="greetingsBackgroundImage" class="form-control" onchange="previewImg(this.id, 'preview-greetings-background')">
                            </div>
                            <div class="py-3 text-center">
                              <img src="{{ $data['Greetings_background'] ?? '' }}" class="preview-greetings-background img-fluid shadow border-radius-lg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updateGreeting(this)">Save</button>
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
                              <input type="text" class="form-control" placeholder="Section Title" id="section-highlight-title" value="{{ $data['Highlight_title'] ?? '' }}">
                            </div>
                            <div class="input-group input-group-static mb-4">
                              <label>Sub Title</label>
                              <input type="text" class="form-control" placeholder="Section Title" id="section-highlight-subTitle" value="{{ $data['Highlight_subTitle'] ?? '' }}">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="input-group input-group-static">
                              <label>Background Image</label>
                                <input type="file" name="highlightBackgroundImage" id="highlightBackgroundImage" class="form-control" onchange="previewImg(this.id, 'preview-highlight-background')">
                            </div>
                            <div class="py-3 text-center">
                              <img src="{{ $data['Highlight_background'] ?? '' }}" class="preview-highlight-background img-fluid shadow border-radius-lg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control" id="highlight-one-title" value="{{ $data['Highlight_one_title'] ?? '' }}">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    <textarea name="sub1" class="form-control" cols="30" rows="3" id="highlight-one-desc">{{ $data['Highlight_one_desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Step Title</label>
                                    <input type="text" class="form-control" id="highlight-two-title" value="{{ $data['Highlight_two_title'] ?? '' }}">
                                </div>
                                <div class="input-group input-group-static">
                                    <label>Description</label>
                                    <textarea name="sub1" class="form-control" cols="30" rows="3" id="highlight-two-desc">{{ $data['Highlight_two_desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updateHighlight(this)">Save</button>
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
                                    <input type="text" class="form-control" placeholder="Facebook Account" id="Social_facebook" value="{{ $data['Social_facebook'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Twitter Link</label>
                                    <input type="text" class="form-control" placeholder="Twitter Account" id="Social_twitter" value="{{ $data['Social_twitter'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="row mb-2">
                                <div class="input-group input-group-static mb-2">
                                    <label>Instagram Link</label>
                                    <input type="text" class="form-control" placeholder="Instagram Account" id="Social_instagram" value="{{ $data['Social_instagram'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn bg-gradient-primary btn-sm float-lg-end" onclick="updateSocial(this)">Save</button>
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
  <script src="{{ asset('assets/js/plugins/LandingPageFunction.js') }}"></script>
  <script>

      if (document.getElementById('greetings_desc_quill')) {
        var quill = new Quill('#greetings_desc_quill', {
          theme: 'snow' // Specify theme in configuration
        });
        
        let inputElement = document.getElementById('greetings_desc')
        quill.on('text-change', function() {
          // sets the value of the hidden input from
          // the editor content
          inputElement.value = quill.root.innerHTML
        });
      };

      function updateHeader(e){
        var heroTitle        = document.getElementById('hero_title').value;
        var subTitle         = document.getElementById('sub_title').value;
        var backgroundImage  = document.getElementById("backgroundImage");
        let formdata    = new FormData();
        formdata.append('Header.title', heroTitle);
        formdata.append('Header.subTitle', subTitle);
        formdata.append('Header.background',backgroundImage.files[0]);
        updateValue(formdata);
      }

      function updateSteps(e){
        var stepsTitle        = document.getElementById('section-steps-title').value;
        var stepsSubTitle     = document.getElementById('section-steps-subTitle').value;
        var backgroundImage   = document.getElementById("stepsBackgroundImage");

        var stepsOneTitle     = document.getElementById('steps-one-title').value;
        var stepsTwoTitle     = document.getElementById('steps-two-title').value;
        var stepsThreeTitle   = document.getElementById('steps-three-title').value;
        
        var stepsOneDesc      = document.getElementById('steps-one-desc').value;
        var stepsTwoDesc      = document.getElementById('steps-two-desc').value;
        var stepsThreeDesc    = document.getElementById('steps-three-desc').value;
        
        let formdata    = new FormData();
        formdata.append('Steps.title', stepsTitle);
        formdata.append('Steps.subTitle', stepsSubTitle);
        formdata.append('Steps.background',backgroundImage.files[0]);

        formdata.append('Steps.one.title', stepsOneTitle);
        formdata.append('Steps.two.title', stepsTwoTitle);
        formdata.append('Steps.three.title', stepsThreeTitle);

        formdata.append('Steps.one.desc', stepsOneDesc);
        formdata.append('Steps.two.desc', stepsTwoDesc);
        formdata.append('Steps.three.desc', stepsThreeDesc);
        
        updateValue(formdata);
      }

      function updateGreeting(e){
        var sectionTitle        = document.getElementById('greetings_title').value;
        var sectionSubtitle     = document.getElementById('greetings_desc').value;
        var backgroundImage     = document.getElementById("greetingsBackgroundImage");
        let formdata    = new FormData();
        formdata.append('Greetings.title', sectionTitle);
        formdata.append('Greetings.desc', sectionSubtitle);
        formdata.append('Greetings.picture',backgroundImage.files[0]);
        updateValue(formdata);
      }

      function updateHighlight(e){
        var highlightTitle        = document.getElementById('section-highlight-title').value;
        var highlightSubTitle     = document.getElementById('section-highlight-subTitle').value;
        var backgroundImage       = document.getElementById("highlightBackgroundImage");

        var highlightOneTitle     = document.getElementById('highlight-one-title').value;
        var highlightTwoTitle     = document.getElementById('highlight-two-title').value;
        
        var highlightOneDesc      = document.getElementById('highlight-one-desc').value;
        var highlightTwoDesc      = document.getElementById('highlight-two-desc').value;
        
        let formdata    = new FormData();
        formdata.append('Highlight.title', highlightTitle);
        formdata.append('Highlight.subTitle', highlightSubTitle);
        formdata.append('Highlight.background',backgroundImage.files[0]);

        formdata.append('Highlight.one.title', highlightOneTitle);
        formdata.append('Highlight.two.title', highlightTwoTitle);

        formdata.append('Highlight.one.desc', highlightOneDesc);
        formdata.append('Highlight.two.desc', highlightTwoDesc);

        updateValue(formdata);
      }

      function updateSocial(e){
        var facebook    = document.getElementById('Social_facebook').value;
        var twitter     = document.getElementById('Social_twitter').value;
        var instagram   = document.getElementById("Social_instagram").value;
        let formdata    = new FormData();
        formdata.append('Social.facebook', facebook);
        formdata.append('Social.twitter', twitter);
        formdata.append('Social.instagram',instagram);
        updateValue(formdata);
      }
      
      function updateValue(formdata){
        fetch('/main-page',{
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