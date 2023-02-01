<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

        <!-- Nucleo Icons -->
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.6') }}" rel="stylesheet" />
    </head>
    <body class="g-sidenav-show  bg-gray-200">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container my-auto">
                  <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                      <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
                          <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h2 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ env('APP_NAME') }}</h2>
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                          </div>
                        </div>
                        <div class="card-body">
                          <form role="form" class="text-start" action="{{ route('login') }}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="input-group input-group-outline my-3">
                              <label class="form-label">Email</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror

                            </div>
                            <div class="input-group input-group-outline mb-3">
                              <label class="form-label">Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              
                          @enderror
                            </div>
                            <div class="form-check form-switch d-flex align-items-center mb-3">
                              <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                              <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </main>

        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.6') }}"></script>
    </body>
</html>
