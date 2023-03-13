@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-md-9 col-lg-10 mx-auto my-5">
        <h3 class="mt-5 text-center">{{ isset($edit) ? 'Update' : 'Build' }} Your Employee Profile</h3>
        <h5 class="font-weight-normal opacity-6 text-center mb-5">This information will let you know more about your employee.</h5>
        <div class="card mb-9">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <h4 class="text-white font-weight-bolder text-center mt-2">{{ isset($edit) ? 'Update' : 'Fill' }} the information below</h4>
            </div>
          </div>
          <div class="card-body">
            <form class="form" action="{{ isset($edit) ? route('users.employees.update', $user) : route('users.employees.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @isset($edit)
                  @method('PUT')
              @endisset
              <div class="row mt-3">
                <div class="col-12 col-sm-4">
                  <div class="input-group input-group-dynamic @error('name') my-3 is-invalid {{ old('name') ? "is-filled" : null }} @enderror">
                    <label class="form-label">First Name</label>
                    <input id="firstname" class="form-control" type="text" name="name" value="{{ old('name', $user->name ?? false ) }}" onfocus="focused(this)" onfocusout="defocused(this)"/>
                    @error('name')
                      <small>{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                  <div class="input-group input-group-dynamic @error('last_name') my-3 is-invalid {{ old('last_name') ? "is-filled" : null }} @enderror">
                    <label class="form-label">Last Name</label>
                    <input id="lastname" class="form-control" type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? false ) }}" onfocus="focused(this)" onfocusout="defocused(this)"/>
                    @error('last_name')
                      <small>{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                  <select class="form-control mb-0 @error('role') is-invalid @enderror" name="role[]" id="choicesRole" multiple>
                      <option value="">Select Role</option>
                      <option value="admin">Admin</option>
                      <option value="employee">Employee</option>
                      <option value="driver">Driver</option>
                  </select>
                  @error('role')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                  @isset($edit)
                  <p class="text-xs text-success py-0 my-0">Last user role(s): {{ $user->getRoleNames() }}</p>
                  <p class="text-xs text-success py-0 my-0">Leave this blank if no role updates</p>
                  @endisset
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 col-sm-6">
                  <div class="input-group input-group-dynamic @error('phone') my-3 is-invalid {{ old('phone') ? "is-filled" : null }} @enderror">
                    <label class="form-label">Phone Number</label>
                    <input id="phonenumber" name="phone" class="form-control" type="text" value="{{ old('phone', $user->phone ?? false ) }}" onfocus="focused(this)" onfocusout="defocused(this)"/>
                    @error('phone')
                      <small>{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <div class="input-group input-group-dynamic @error('email') my-3 is-invalid {{ old('email') ? "is-filled" : null }} @enderror">
                    <label class="form-label">Email Address</label>
                    <input id="email" name="email" type="text" class="form-control" value="{{ old('email', $user->email ?? false ) }}" onfocus="focused(this)" onfocusout="defocused(this)">
                    {{-- <small>Error message</small> --}}
                    @error('email')
                      <small>{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 col-sm-6">
                  <div class="input-group input-group-dynamic @error('password') my-3 is-invalid @enderror">
                    <label class="form-label">Password</label>
                    <input id="password" name="password" type="text" class="form-control" onfocus="focused(this)" onfocusout="focused(this)">
                    @error('password')
                    <small>{{ $message }}</small>
                    @enderror
                  </div>
                  @isset($edit)
                  <p class="text-xs text-success py-2">Leave this blank if no password updates</p>
                  @endisset
                </div>
                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <div class="input-group input-group-dynamic @error('password') my-3 is-invalid @enderror">
                    <label class="form-label">Repeat Password</label>
                    <input id="confirm_password" name="password_confirmation" type="password" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                  @isset($edit)
                  <p class="text-xs text-success py-2">Leave this blank if no password updates</p>
                  @endisset
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-2">
                  @if(isset($edit))
                  <img src="{{ asset($user->avatar_path) }}"  class="preview-img img-fluid shadow border-radius-lg" alt="avatar">
                  @else
                  <img src="{{ asset('assets/img/avatar.png') }}"  class="preview-img img-fluid shadow border-radius-lg" alt="avatar">
                  @endif
                </div>
                <div class="col-10">
                  <label class="form-label">Profile images</label>
                  <input type="file" name="avatar" id="avatar" class="form-control border @error('avatar') border-danger my-3 is-invalid @enderror" onchange="previewImg(this.id,'preview-img')">
                  @error('avatar')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                  @isset($edit)
                  <p class="text-xs text-success py-2">Leave this blank if no avatar updates</p>
                  @endisset
                </div>
              </div>
              <div class="button-row d-flex mt-4">
                @isset($edit)
                <a href="{{ route('users.employees') }}" class="btn bg-gradient-secondary ms-auto mb-0">Cancel</a>
                @endisset
                <button class="btn bg-gradient-primary ms-auto mb-0" type="submit" title="Send">{{ isset($edit) ? 'Update' : 'Submit' }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('page-script')
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/formPreviewImage.js') }}"></script>
    <script>

var values="driver, employee";
        if (document.getElementById('choicesRole')) {
        var element = document.getElementById('choicesRole');
        const example = new Choices(element, {
            searchEnabled: false,
            removeItemButton: true,
            duplicateItemsAllowed: false,
        });
      }

    </script>

@endsection