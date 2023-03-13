@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <div class="d-sm-flex justify-content-between">
      <div>
        <a href="javascript:;" class="btn btn-icon bg-gradient-primary">
          New order
        </a>
      </div>
      <div class="d-flex">
        <div class="dropdown d-inline">
          <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
            Filters
          </a>
          <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2" data-popper-placement="left-start">
            <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Delivered</a></li>
            <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: On process</a></li>
            <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: New Order</a></li>
            <li>
              <hr class="horizontal dark my-2">
            </li>
            <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Filter</a></li>
          </ul>
        </div>
        <button class="btn btn-icon btn-outline-dark ms-2 export" data-type="csv" type="button">
          <i class="material-icons text-xs position-relative">archive</i>
          Export .XLS
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Orders Table</h5>
            <p class="text-sm mb-0">
              View all the orders from the previous year.
            </p>
          </div>
          <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
              <thead class="thead-light">
                <tr>
                  <th>Id</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Customer</th>
                  <th>Service Orders</th>
                  <th>Revenue</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <p class="text-xs font-weight-normal ms-2 mb-0">#&nbsp;{{ $order->order_no }}</p>
                    </div>
                  </td>
                  <td class="font-weight-normal">
                    <span class="my-2 text-xs">{{ date('d M, H:i A', strtotime($order->getPlacedDate->created_at)) }}</span>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-sm" aria-hidden="true">notifications</i></button>
                      <span>{{ $order->getLatestStatus->status }}</span>
                    </div>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <div class="d-flex align-items-center">
                      <div class="d-flex align-items-center">
                        <img src="{{ asset($order->cust->avatar_path) }}" class="avatar avatar-xs me-2" alt="user image">
                        <span>{{ $order->cust->getFullNameAttribute() }}</span>
                      </div>
                    </div>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <span class="my-2 text-xs">
                        {{ $order->details->count() }}&nbsp;Item(s)
                    </span>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <span class="my-2 text-xs">$ {{ $order->grand_total }}</span>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <a href="{{ route('orders.list.details', $order) }}" class="btn btn-link btn-sm m-0">
                      @switch($order->getLatestStatus->status)
                          @case('placed')
                              assign order
                              @break
                          @case('processed')
                              assign delivery
                              @break
                          @default
                              see details
                      @endswitch
                        {{-- {{ $order->getLatestStatus->status == 'placed' ? 'assign order' : 'see details' }} --}}
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
  const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
    searchable: true,
    fixedHeight: false
  });

  document.querySelectorAll(".export").forEach(function(el) {
    el.addEventListener("click", function(e) {
      var type = el.dataset.type;

      var data = {
        type: type,
        filename: "order-list-" + type,
      };

      if (type === "csv") {
        data.columnDelimiter = "|";
      }

      dataTableSearch.export(data);
    });
  });
</script>
@endsection