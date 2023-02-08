@extends('Layout.mobile')

@section('content')
<div class="container-fluid pb-4">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card card-background card-background-mask-dark align-items-start">
                <div class="full-background cursor-pointer" style="background-image: url('https://images.unsplash.com/photo-1604213410393-89f141bb96b8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTA5fHxuYXR1cmV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60')"></div>
                <div class="card-body">
                  <h5 class="text-white mb-0">Welcome back,</h5>
                  <p class="text-white text-sm">{{ Auth::user()->getFullNameAttribute() }}.</p>
                  <div class="d-flex mt-4 pt-2 justify-content-end text-right">
                    <h1>{{ env('APP_NAME') }}</h1>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <h1>Mobile Services Customer Page</h1>
</div>
{{-- <h1>home</h1> --}}
@endsection
@section('page-script')
@endsection