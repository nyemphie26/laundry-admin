@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row min-vh-80">
      <div class="col-lg-8 col-md-10 col-12 m-auto">
        <h3 class="mt-3 mb-0 text-center">Add new Product</h3>
        <p class="lead font-weight-normal opacity-8 mb-7 text-center">This information will let us know more about you.</p>
        <div class="card">
          <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">
                  <span>1. Product Info</span>
                </button>
                <button class="multisteps-form__progress-btn" type="button" title="Media">2. Media</button>
                <button class="multisteps-form__progress-btn" type="button" title="Pricing">3. Pricing</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="multisteps-form__form">
              <!--single form panel-->
              <div class="multisteps-form__panel pt-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                <h5 class="font-weight-bolder">Product Information</h5>
                <div class="multisteps-form__content">
                  <div class="row mt-3">
                    <div class="col-12 col-sm-6">
                      <div class="input-group input-group-static">
                        <label for="exampleFormControlInput1">Name</label>
                        <input class="multisteps-form__input form-control" type="text" />
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <label class="form-control m-0 p-0">Category</label>
                        <select class="form-control" name="choices-category" id="choices-category">
                            <option value="Choice 1" selected="">Wash, Dry, and Fold</option>
                            <option value="Choice 2">Ironing</option>
                            <option value="Choice 3">Bed and Linen</option>
                        </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 mb-4">
                      <label class="mt-4">Description</label>
                      <p class="form-text text-muted text-xs ms-1 d-inline">
                        (optional)
                      </p>
                      <div id="edit-deschiption" class="h-50">
                        <p>Some initial <strong>bold</strong> text</p>
                      </div>
                    </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                <h5 class="font-weight-bolder">Media</h5>
                <div class="multisteps-form__content">
                  <div class="row mt-3">
                    <div class="col-12">
                      <label class="form-control mb-0">Product images</label>
                      <div action="/file-upload" class="form-control border dropzone" id="productImg"></div>
                    </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel pt-3 border-radius-xl bg-white h-100" data-animation="FadeIn">
                <div class="d-flex justify-content-between">
                    <h5 class="font-weight-bolder">Pricing</h5>
                    <button class="btn btn-link btn-sm">+&nbsp;Add more variant</button>
                </div>
                <div class="multisteps-form__content mt-3">
                  <div class="row mb-4">
                      <div class="col-9">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Variant Name</label>
                          <input class="multisteps-form__input form-control" type="text" />
                        </div>
                      </div>
                    <div class="col-3">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Price</label>
                        <input type="email" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                    </div>
                  </div>
                  <div class="button-row d-flex mt-0 mt-md-4">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Save</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('page-script')
    <script src="{{ asset('assets/js/plugins/multistep-form.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dropzone.min.js') }}"></script>

    <script>
        if (document.getElementById('edit-deschiption')) {
          var quill = new Quill('#edit-deschiption', {
            theme: 'snow' // Specify theme in configuration
          });
        };
    
        if (document.getElementById('choices-category')) {
          var element = document.getElementById('choices-category');
          const example = new Choices(element, {
            searchEnabled: false
          });
        };
    
        if (document.getElementById('choices-sizes')) {
          var element = document.getElementById('choices-sizes');
          const example = new Choices(element, {
            searchEnabled: false
          });
        };
    
        if (document.getElementById('choices-currency')) {
          var element = document.getElementById('choices-currency');
          const example = new Choices(element, {
            searchEnabled: false
          });
        };
    
        if (document.getElementById('choices-tags')) {
          var tags = document.getElementById('choices-tags');
          const examples = new Choices(tags, {
            removeItemButton: true
          });
    
          examples.setChoices(
            [{
                value: 'One',
                label: 'Expired',
                disabled: true
              },
              {
                value: 'Two',
                label: 'Out of Stock',
                selected: true
              }
            ],
            'value',
            'label',
            false,
          );
        }
      </script>
@endsection