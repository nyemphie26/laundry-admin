@extends('Layout.mobile')

@section('content')
<div class="container-fluid pb-4">
    <div class="row">
        <div class="col-lg-4 mt-lg-4">
            <div class="row"></div>
            <div class="card card-background card-background-mask-dark align-items-start">
                <div class="full-background cursor-pointer" style="background-image: url('https://images.unsplash.com/photo-1604213410393-89f141bb96b8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTA5fHxuYXR1cmV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60')"></div>
                <div class="card-body">
                  <h5 class="text-white mb-0">Welcome back,</h5>
                  <p class="text-white text-sm">John Doe.</p>
                  <div class="d-flex mt-4 pt-2 justify-content-end text-right">
                    <h1>{{ env('APP_NAME') }}</h1>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-8 mt-4 mt-lg-0">
            <div class="row">
                <div class="d-flex justify-content-between align-item-center">
                    <h3 class="text-center mb-0">Services</h3>
                    <span class="text-md">See All</span>
                </div>
            </div>
            <div class="d-inline-flex mt-4 mt-lg-0 w-lg-100 overflow-auto">
                <div class="col-lg-5 col-3 me-4">
                    <div class="card">
                      <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                          <i class="material-icons opacity-10">account_balance</i>
                        </div>
                      </div>
                      <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Today's Work</h6>
                        <span class="text-xs">See All</span>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">5 Works</h5>
                      </div>
                    </div>
                </div>
                <div class="col-lg-5 col-3 me-4">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="material-icons opacity-10">account_balance_wallet</i>
                        </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Upcoming Work</h6>
                        <span class="text-xs">See All</span>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">10+ Work(s)</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-3 me-4">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="material-icons opacity-10">account_balance_wallet</i>
                        </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Upcoming Work</h6>
                        <span class="text-xs">See All</span>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">10+ Work(s)</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-3">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="material-icons opacity-10">account_balance_wallet</i>
                        </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Upcoming Work</h6>
                        <span class="text-xs">See All</span>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">10+ Work(s)</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 px-0">
            <div class="card bg-white" style="height: 25vh">
                asdfsdafasdffsd
            </div>
        </div>
    </div>
</div>
@endsection