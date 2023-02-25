@extends('Layout.mobile')
@section('content')
    <div class="content-fluid pb-4">
        <h1 class="text-center mb-4">All Works</h1>
        @foreach ($works->laundryWorks as $work)
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
                        <p class="text-sm mb-0 font-weight-bolder text-uppercase">Laundry Work</p>
                        <p class="text-sm mb-0">{{ GenerateStatus::SummaryStatus($work->status) }}</p>
                      </div>
                    </div>
                  </div>
              </div>
            </a>
          @endforeach
    </div>
@endsection