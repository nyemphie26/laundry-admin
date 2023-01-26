@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-6">
        <h4>Make the changes below</h4>
        <p>We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play.</p>
      </div>
      <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
        <button type="button" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Save</button>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4">
        <div class="card mt-4" data-animation="true">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <a class="d-block blur-shadow-image">
              <img src="../../../assets/img/products/product-11.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
            </a>
            <div class="colored-shadow" style="background-image: url(&quot;../../../assets/img/products/product-11.jpg&quot;);"></div>
          </div>
          <div class="card-body text-center">
            <div class="mt-n6 mx-auto">
              <button class="btn bg-gradient-primary btn-sm mb-0 me-2" type="button" name="button">Edit</button>
              <button class="btn btn-outline-dark btn-sm mb-0" type="button" name="button">Remove</button>
            </div>
            <h5 class="font-weight-normal mt-4">
              Product Image
            </h5>
            <p class="mb-0">
              The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-8 mt-lg-0 mt-4">
        <div class="card">
          <div class="card-body">
            <h5 class="font-weight-bolder">Product Information</h5>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label>Name</label>
                  <input type="email" class="form-control w-100" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
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
            <div class="row mt-4">
              <div class="col-sm-12">
                <label class="mt-4">Description</label>
                <p class="form-text text-muted text-xs ms-1 d-inline">
                  (optional)
                </p>
                <div id="edit-deschiption-edit" class="h-50">
                  Long sleeves black denim jacket with a twisted design. Contrast stitching. Button up closure. White arrow prints on the back.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-8 mt-sm-0 mt-4">
        <div class="card">
          <div class="card-body">
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
            </div>
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
        if (document.getElementById('edit-deschiption-edit')) {
          var quill = new Quill('#edit-deschiption-edit', {
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