@extends('Layout.mobile')
@section('content')
    <div class="container-fluid pb-4">
        <h1 class="text-center mb-4">Available Laundries</h1>
        @if ($works->isEmpty())
        <h5 class="text-center mb-4">No available work for today</h5>
        @else
        @foreach ($works as $work)
        <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex py-auto justify-content-between ">
                <div>
                  <h5 class="font-weight-bolder mb-0">
                    #{{ $work->order->order_no }}
                  </h5>
                  <p class="text-sm mb-0">{{ GenerateStatus::AssigningStatus($work->status) }}</p>
                </div>
                <div class="dropdown d-inline">
                  <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" id="more">
                  </a>
                  <ul class="dropdown-menu px-2 py-3" aria-labelledby="more" data-popper-placement="left-start">
                    <li><a href="{{ route('mobile.details', $work->order_id) }}" class="dropdown-item border-radius-md">Details</a></li>
                    @if ($work->status == 0)
                      <li>
                        <button class="dropdown-item border-radius-md" data-order="{{ $work->order_id }}" data-status="processing" data-assign="laundry" onclick="updateStats(this)">Process Now!</button>
                      </li>
                    @elseif($work->status == 1)
                      <li>
                        <button class="dropdown-item border-radius-md" data-order="{{ $work->order_id }}" data-status="processed" data-assign="laundry" onclick="updateStats(this)">Laundry Finished!</button>
                      </li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
        </div>
        @endforeach
        @endif
            
    </div>
@endsection
@section('page-script')
<script src="{{ asset('assets/js/plugins/updateStatusOrder.js') }}"></script>
@endsection