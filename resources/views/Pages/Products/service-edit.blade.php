@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
  <form class="multisteps-form__form" action="{{ route('service.update', $service) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")
    <div class="row">
      <div class="col-lg-6">
        <h4>Make the changes below</h4>
        <p>We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play.</p>
      </div>
      <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
        <button type="submit" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Save</button>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4">
        <div class="card mt-4" data-animation="true">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <a class="d-block blur-shadow-image">
              <img src="{{ asset('storage/'.$service->product_image) }}" alt="img-blur-shadow" class="preview-img img-fluid shadow border-radius-lg">
            </a>
            <div class="colored-shadow" style="background-color:black"></div>
          </div>
          <div class="card-body text-center">
            <div class="mt-n6 mx-auto">
              <button class="btn bg-gradient-primary btn-sm mb-0 me-2" type="button" name="add" onclick="addImage()">New Image</button>
              <button class="btn btn-outline-dark btn-sm mb-0" type="button" name="delete" onclick="clearImg('preview-img','prodImage')">Remove</button>
            </div>
            <h5 class="font-weight-normal mt-4">
              Product Image
            </h5>
            <p class="mb-0">
              This picture will show on the Landing Page and Service Information Page.
            </p>
            @error('product_image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <input type="file" name="product_image" id="prodImage" onchange="previewImg(this.id,'preview-img')">
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
                  <input type="text" class="form-control w-100" name="name_product" value="{{ $service->name }}" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <label class="form-control m-0 p-0">Category</label>
                <select class="form-control" name="category" id="choices-category">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $category->id==$service->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                  @endforeach
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
                  {!! $service->description !!}
                </div>
                <input type="hidden" name="description" id="description" value="{{ $service->description }}">
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="font-weight-bolder">Pricing</h5>
                @if ($service->price)
                <div class="col-3" id="singlePrice">
                  <div class="input-group input-group-dynamic  @error('singlePrice') is-invalid is-filled @enderror">
                      <label class="form-label">Price</label>
                      <input type="number" class="form-control w-100" name="singlePrice" id="singlePriceField" value="{{ $service->price }}">
                      @error('singlePrice')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
                  </div>
                </div>
                @else
                <button class="btn btn-link btn-sm" type="button" onclick="addField(true, 'variant','price')">+&nbsp;Add more variant</button>
                @endif
            </div>
            <div class="multisteps-form__content mt-3">
              <div class="container px-0" id="rowVariant">
                @if (!$service->price)
                  @foreach ($service->variants as $variant)
                  <div class="row mb-4">
                      <div class="col-6">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Variant Name</label>
                          <input class="multisteps-form__input form-control" type="text" name="variants[]" id="variant" value="{{ $variant->name }}"/>
                        </div>
                      </div>
                    <div class="col-3">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control w-100" name="price[]" id="price" value="{{ $variant->price }}">
                      </div>
                    </div>
                    <div class="col-3">
                      <button class="btn btn-link btn-sm" type="button" onclick="removeField(this)">-&nbsp;Remove Field</button>
                    </div>
                  </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/plugins/multistep-form.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/addRemoveVariantRow.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/formPreviewImage.js') }}"></script>

    <script>
        if (document.getElementById('edit-deschiption-edit')) {
          var quill = new Quill('#edit-deschiption-edit', {
            theme: 'snow' // Specify theme in configuration
          });
        };

        let inputElement = document.getElementById('description')
        quill.on('text-change', function() {
          // sets the value of the hidden input from
          // the editor content
          inputElement.value = quill.root.innerHTML
        });
    
        if (document.getElementById('choices-category')) {
          var element = document.getElementById('choices-category');
          const example = new Choices(element, {
            searchEnabled: false
          });
        };
        
        function addImage(){
            // alert('upload');
            document.getElementById('prodImage').click();
        }

        function clearImg(classImagePreview, fileId){
            const imgPreview = document.querySelector('.'+classImagePreview);
            var file = document.getElementById(fileId);

            imgPreview.setAttribute('src', '');
            imgPreview.style.display = 'none';

            file.value = "";

        }
      </script>
@endsection