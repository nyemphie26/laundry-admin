@extends('Layout.main')
@section('content')
<div class="col-lg-8 mx-auto">
    <div class="card mb-4">
      @isset($incoming)
      <form action="{{ route('orders.accept', $order) }}" method="post">
      @csrf
      @endisset
      <div class="card-header p-3 pb-0">
        <div class="d-flex justify-content-between align-items-center">
          <div class="w-50">
            <h6>Order Details</h6>
            <p class="text-sm mb-0">
              Order no. <b>{{ $order->order_no }}</b> from <b>{{ date('d.m.Y', strtotime($order->getPlacedDate->created_at)) }}</b>
            </p>
            <p class="text-sm">
              Pick up scheduled: <b>{{ date('D, d.m.Y', strtotime($order->pickup->schedule_date)) }}</b>
            </p>
          </div>
          @if (request()->route()->named('dashboard.orders*'))
          <a href="javascript:;" class="btn bg-gradient-dark ms-auto mb-0">Invoice</a>
          @endif
          @isset($incoming)
          <div class="w-25 me-4">
            <label class="form-control m-0 p-0 text-bold">Assign Driver</label>
            <select class="form-control" name="choiced-driver" id="choices-driver">
              <option value="" selected>-- Select One --</option>
              @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->getFullNameAttribute() }}</option>
              @endforeach
            </select>
          </div>
          <div class="w-25">
            <label class="form-control m-0 p-0 text-bold">Assign Employee</label>
            <select class="form-control" name="choiced-employee" id="choices-employee">
              <option value="" selected>-- Select One --</option>
              @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->getFullNameAttribute() }}</option>
              @endforeach
            </select>
          </div>
          @endisset
        </div>
        <div class="d-flex">
        </div>
      </div>
      <div class="card-body p-3 pt-0">
        <hr class="horizontal dark mt-0 mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-12">
                <div class="d-flex">
                    <h6 class="text-lg mb-0 mt-2">Item(s)</h6>
                </div>
                @foreach ($order->details as $item)
                  <div class="d-flex justify-content-between">
                      <p class="text-sm mb-0"><span class="text-sm mb-0 text-bold">{{ $item->qty }}</span>&nbsp;X&nbsp;{{ $item->item }}</p>
                      <span class="text-dark font-weight-bold">${{ $item->subtotal }}</span>
                  </div>
                @endforeach
            </div>
            {{-- <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
              <a href="javascript:;" class="btn bg-gradient-dark btn-sm mb-0">Contact Us</a>
              <p class="text-sm mt-2 mb-0">Do you like the product? Leave us a review <a href="javascript:;">here</a>.</p>
            </div> --}}
        </div>
        <hr class="horizontal dark mt-4 mb-4">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-12">
            <h6 class="mb-3">Track order</h6>
            <div class="timeline timeline-one-side">
              @foreach ($order->trackers as $tracker)
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-secondary text-lg">shopping_cart</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Order {{ $tracker->status }}</h6>
                    <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">{{ date('d M H:i A', strtotime($tracker->created_at)) }}</p>
                  </div>
                </div>
              @endforeach
              @if (request()->route()->named('dashboard.orders*'))
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-secondary text-lg">local_shipping</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Order picked up</h6>
                    <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">22 DEC 7:21 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-secondary text-lg">local_laundry_service</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Washed</h6>
                    <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">22 DEC 8:10 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-secondary text-lg">local_shipping</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Order delivered</h6>
                    <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">22 DEC 4:54 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient text-lg">done</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Order recieved</h6>
                    <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">22 DEC 4:54 PM</p>
                  </div>
                </div>
              @endif
            </div>
          </div>
          <div class="col-lg-9 col-md-6 col-12">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-12">
                <h6 class="mb-3">Customer Information</h6>
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                      <h6 class="mb-3 text-sm">{{ $order->delivery->name }}</h6>
                      <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-2 font-weight-bold">{{ $order->delivery->email }}</span></span>
                      <span class="mb-2 text-xs">Phone Number: <span class="text-dark ms-2 font-weight-bold">{{ $order->delivery->phone }}</span></span>
                      <span class="mb-2 text-xs">Address Details: </span>
                      <span class="text-xs"><span class="text-dark font-weight-bold ms-2">{{ $order->delivery->address }}</span></span>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 col-12 ms-auto">
                <h6 class="mb-3">Order Summary</h6>
                <div class="d-flex justify-content-between">
                  <span class="mb-2 text-sm">
                    Total:
                  </span>
                  <span class="text-dark font-weight-bold ms-2">${{ $order->total }}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span class="text-sm">
                    Taxes:
                  </span>
                  <span class="text-dark ms-2 font-weight-bold">${{ $order->tax }}</span>
                </div>
                <div class="d-flex justify-content-between mt-4">
                  <span class="mb-2 text-lg">
                    Grand Total:
                  </span>
                  <span class="text-dark text-lg ms-2 font-weight-bold">${{ $order->grand_total }}</span>
                </div>
              </div>
            </div>
            @if (!isset($incoming))
              <div class="row justify-content-between">
                <div class="d-flex">
                    <h6 class="text-lg mb-0 mt-2">Assigned Employees</h6>
                </div>
                <div class="w-25 me-4">
                  <label class="form-control m-0 p-0">Pickup Driver :</label>
                  <label class="form-control m-0 p-0 text-bold">{{ $order->assigns()->where('status','picker')->first()->employee->getFullNameAttribute() }}</label>
                </div>
                <div class="w-25 me-4">
                  <label class="form-control m-0 p-0">Laundryman :</label>
                  <label class="form-control m-0 p-0 text-bold">{{ $order->assigns()->where('status','washer')->first()->employee->getFullNameAttribute() }}</label>
                </div>
                <div class="w-25 me-4">
                  <label class="form-control m-0 p-0">Delivery Driver :</label>
                  <label class="form-control m-0 p-0 text-bold">{{ $courier = $order->assigns()->where('status','deliverer')->first() ? $courier->employee->getFullNameAttribute() : '-' }}</label>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
      @isset($incoming)
      <div class="card-footer">
        <button class="btn btn-primary btn-sm w-100" type="submit">
          Save
        </button>
      </div>
    </form>
    @endisset
    </div>
  </div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

    <script>
        if (document.getElementById('choices-driver')) {
          var element = document.getElementById('choices-driver');
          const example = new Choices(element, {
            searchEnabled: false
          });
        };
        if (document.getElementById('choices-employee')) {
          var element = document.getElementById('choices-employee');
          const example = new Choices(element, {
            searchEnabled: false
          });
        };
      </script>
@endsection