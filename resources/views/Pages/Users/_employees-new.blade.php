@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="multisteps-form mb-9">
          <!--progress bar-->
          <div class="row">
            <div class="col-12 col-lg-8 mx-auto my-5">
            </div>
          </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-8 m-auto">
              <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="multisteps-form__progress">
                      <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                        <span>User Info</span>
                      </button>
                      <button class="multisteps-form__progress-btn" type="button" title="Address">Avatar</button>
                      <button class="multisteps-form__progress-btn" type="button" title="Profile">Profile</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form class="multisteps-form__form">
                    <!--single form panel-->
                    <div class="multisteps-form__panel border-radius-xl bg-white js-active" data-animation="FadeIn">
                      <h5 class="font-weight-bolder mb-0">Basic Information</h5>
                      <p class="mb-0 text-sm">Mandatory informations</p>
                      <div class="multisteps-form__content">
                        <div class="row mt-3">
                          <div class="col-12 col-sm-6">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">First Name</label>
                              <input class="multisteps-form__input form-control" type="text" name="first_name" />
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Last Name</label>
                              <input class="multisteps-form__input form-control" type="text" name="last_name" />
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-12 col-sm-6">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Phone Number</label>
                              <input class="multisteps-form__input form-control" type="text" name="phone" />
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Email Address</label>
                              <input class="multisteps-form__input form-control" type="email" name="email" />
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-12 col-sm-6">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Password</label>
                              <input class="multisteps-form__input form-control" type="password" name="password" />
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Repeat Password</label>
                              <input class="multisteps-form__input form-control" type="password" name="confirmation_password" />
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
                      <h5 class="font-weight-bolder">Avatar</h5>
                      <div class="multisteps-form__content">
                        <div class="row mt-3">
                          <div class="col-12">
                            <label class="form-control mb-0">Profile images</label>
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
                    <div class="multisteps-form__panel border-radius-xl bg-white h-100" data-animation="FadeIn">
                      <h5 class="font-weight-bolder mb-0">Profile Review</h5>
                      <p class="mb-0 text-sm">Detail informations</p>
                      <div class="multisteps-form__content mt-3">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                              <div class="input-group input-group-dynamic">
                                <label class="form-label">First Name</label>
                                <input class="multisteps-form__input form-control" type="text" />
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                              <div class="input-group input-group-dynamic">
                                <label class="form-label">Last Name</label>
                                <input class="multisteps-form__input form-control" type="text" />
                              </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <div class="input-group input-group-dynamic">
                            <label class="form-label">Phone Number</label>
                            <input class="multisteps-form__input form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                            <label class="form-label">Email Address</label>
                            <input class="multisteps-form__input form-control" type="email" />
                            </div>
                        </div>
                        </div>
                        <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <div class="input-group input-group-dynamic">
                            <label class="form-label">Password</label>
                            <input class="multisteps-form__input form-control" type="password" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                            <label class="form-label">Repeat Password</label>
                            <input class="multisteps-form__input form-control" type="password" />
                            </div>
                        </div>
                        </div>
                        <div class="button-row d-flex mt-4">
                          <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                          <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Send</button>
                        </div>
                      </div>
                    </div>
                  </form>
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
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/multistep-form.js') }}"></script>
    <script>
        if (document.getElementById('choices-state')) {
        var element = document.getElementById('choices-state');
        const example = new Choices(element, {
            searchEnabled: false
        });
        };
    </script>
@endsection