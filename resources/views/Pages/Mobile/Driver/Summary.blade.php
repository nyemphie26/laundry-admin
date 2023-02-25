@extends('Layout.mobile')
@section('content')
    <div class="content-fluid pb-4">
        <h1 class="text-center mb-4">All Works</h1>
        <div class="nav-wrapper position-relative end-0 mb-4">
          <ul class="nav nav-pills nav-fill p-1" role="tablist">
            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" data-bs-target="#pickup" href="javascript:;" role="tab" aria-controls="preview" aria-selected="true">
              <span class="material-icons align-middle mb-1">
                badge
              </span>
              Pickup
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" data-bs-target="#delivery" href="javascript:;" role="tab" aria-controls="code" aria-selected="false">
                <span class="material-icons align-middle mb-1">
                  laptop
                </span>
                Delivery
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="pickup" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            @foreach ($works->pickupWorks as $work)
            <a href="{{ route('mobile.details', $work->order) }}">
              <div class="card mb-4">
                  <div class="card-body px-0 py-3">
                    <div class="d-flex my-0 mx-3 justify-content-between">
                      <div class="col-sm-6 my-auto text-start">
                        <h6 class="text-sm mb-0 font-weight-bolder text-uppercase">{{ date('M d, Y - H:i A', strtotime($work->order->pickup->schedule_date))  }}</h6>
                        <h5 class="font-weight-bolder mb-0">
                          #{{ $work->order->order_no }}
                        </h5>
                      </div>
                      <div class="col-sm-6 text-end">
                        <p class="text-sm mb-0 font-weight-bolder text-uppercase">Pickup Work</p>
                        <p class="text-sm mb-0">{{ GenerateStatus::SummaryStatus($work->status) }}</p>
                      </div>
                    </div>
                  </div>
              </div>
            </a>
            @endforeach
          </div>
          <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            @foreach ($works->deliveryWork as $work)
            <a href="{{ route('mobile.details', $work->order) }}">
              <div class="card mb-4">
                  <div class="card-body px-0 py-3">
                    <div class="d-flex my-0 mx-3 justify-content-between">
                      <div class="col-sm-6 my-auto text-start">
                        <h6 class="text-sm mb-0 font-weight-bolder text-uppercase">{{ date('M d, Y', strtotime($work->order->deliveryDate->schedule_date))  }}</h6>
                        <h5 class="font-weight-bolder mb-0">
                          #{{ $work->order->order_no }}
                        </h5>
                      </div>
                      <div class="col-sm-6 text-end">
                        <p class="text-sm mb-0 font-weight-bolder text-uppercase">Delivery Work</p>
                        <p class="text-sm mb-0">{{ GenerateStatus::SummaryStatus($work->status) }}</p>
                      </div>
                    </div>
                  </div>
              </div>
            </a>
            @endforeach
          </div>
        </div>
    </div>
@endsection