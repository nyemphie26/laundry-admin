@extends('Layout.main')

@section('content')

<div class="col-lg-12 position-relative z-index-2">
    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
          <div class="col-lg-3">
            <div class="card position-sticky top-1">
              <ul class="nav flex-column bg-white border-radius-lg p-3">
                @foreach ($categories as $item)
                    <li class="nav-item">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#{{ $item->slug }}">
                            <i class="material-icons text-lg me-2">settings</i>
                            <span class="text-sm">{{ $item->name }}</span>
                        </a>
                    </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-lg-9 mt-lg-0 mt-4">
            @foreach ($categories as $item)
                <div class="card mb-4" id="{{ $item->slug }}">
                    <div class="card-header">
                        <h5>{{ $item->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-auto col-lg-6">
                                <div class="input-group input-group-static">
                                    <label>Page Title</label>
                                    <input type="text" class="form-control" id="{{ $item->slug }}_title" value="{{ $data[$item->slug.'_Page_title'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-auto col-lg-6">
                                <div class="input-group input-group-static">
                                    <label>Background Picture</label>
                                    <input type="file" name="{{ $item->slug }}_background" id="{{ $item->slug }}_background" class="form-control" onchange="previewImg(this.id, 'preview-{{ $item->slug }}-background')">
                                </div>
                                <div class="py-3 text-center">
                                <img src="{{ $data[$item->slug.'_Page_background'] ?? '' }}" class="preview-{{ $item->slug }}-background img-fluid shadow border-radius-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary btn-sm float-lg-end" data-page="{{ $item->slug }}" onclick="updatePage(this)">Save</button>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
</div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/plugins/formPreviewImage.js') }}"></script>
    <script>
        function updatePage(e){
            var keyPage          = e.dataset.page;
            var pageTitle        = document.getElementById(`${keyPage}_title`).value;
            var backgroundImage  = document.getElementById(`${keyPage}_background`);
            let formdata         = new FormData();
            formdata.append(`keyPage`, `Service_${keyPage}`);
            formdata.append(`${keyPage}.Page.title`, pageTitle);
            formdata.append(`${keyPage}.Page.background`,backgroundImage.files[0]);
            updateValue(formdata);
        }

        function updateValue(formdata){
            // console.log(formdata);
            fetch('/services',{
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' 
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