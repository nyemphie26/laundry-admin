@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <form class="multisteps-form__form" action="{{ (isset($edit) ? route('category.update', $category) : route('category.store')) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($edit)
            @method("PUT")
        @endisset
        <div class="row">
            <div class="col-lg-6">
                <h4>Make the changes below</h4>
                <p>We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play.</p>
            </div>
            <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
                <button type="submit" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Save</button>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-lg-8 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Category Information</h5>
                        <div class="row mt-4">
                        <div class="col-12 col-sm-6">
                            <div class="input-group input-group-static @error('name_category') is-invalid @enderror">
                            <label>Category Name</label>
                            <input type="text" class="form-control w-100" name="name_category" value="{{ isset($edit) ? $category->name : '' }}" onfocus="focused(this)" onfocusout="defocused(this)">
                            @error('name_category')
                            <small>{{ $message }}</small>
                            @enderror
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection