@extends('Layout.mobile')
@section('content')
    <div class="content-fluid pb-4">
        <h1 class="text-center mb-4">All Works</h1>
        @foreach ($works as $work)
                <div class="card mb-4">
                    <div class="card-body px-0 py-3">
                      <div class="d-flex m-0">
                        <div class="col-sm-3 mx-3 my-auto text-center">
                          <a href="{{ route('mobile.details', $work->order) }}">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                              <i class="material-icons opacity-10">battery_charging_full</i>
                            </div>
                          </a>
                        </div>
                        <div class="col-9 text-start">
                          <h6 class="text-sm mb-0 font-weight-bolder text-uppercase">{{ GenerateStatus::forDriver($work->status)  }}</h6>
                          <h5 class="font-weight-bolder mb-0">
                            {{ date('M d, Y - H:i A', strtotime($work->order->pickup->schedule_date)) }}
                          </h5>
                          <p class="text-sm mb-0">{{ GenerateStatus::forDriver($work->order->getLatestStatus->status) }}</p>
                        </div>
                      </div>
                    </div>
                </div>
              @endforeach
    </div>
@endsection