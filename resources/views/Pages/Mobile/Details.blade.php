@extends('Layout.mobile')
@section('content')
    <div class="container-fluid pb-4">
        <h1 class="text-center mb-4">#{{ $order->order_no }}</h1>
        <div class="card mb-4">
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
                <div class="col-12">
                  <div class="row">
                    <div class="col-lg-6 col-12 ms-auto order-lg-last">
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
                    <hr class="horizontal dark mt-4 mb-4 d-lg-none">
                    <div class="col-lg-6 col-md-12 col-12">
                      <h6 class="mb-3">Customer Information</h6>
                      <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">{{ $order->delivery->name }}</h6>
                            <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-2 font-weight-bold">{{ $order->delivery->email }}</span></span>
                            <span class="mb-2 text-xs">Phone Number: <span class="text-dark ms-2 font-weight-bold">{{ $order->delivery->phone }}</span></span>
                            <span class="text-xs">Address Details: <span class="text-dark font-weight-bold ms-2">{{ $order->delivery->address }}</span></span>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection

@section('page-script')
<script>

  document.getElementById("btnsave").addEventListener("click", function(){ 
    var status = this.dataset.status
    var id = this.dataset.order
    var assign = this.dataset.assign
    var url = '{{ route("mobile.updateStatus", ":id") }}';
    link = url.replace(":id", id);

    fetch(link,{
      method:'POST',
      headers: {
        Accept: 'application.json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
          status: status,
          assign: assign
        }
      )
    })
  .then(res=>res.json())
  .then(data=>console.log(data['message']))
  .catch(err=>console.log(err))



  });
</script>
@endsection