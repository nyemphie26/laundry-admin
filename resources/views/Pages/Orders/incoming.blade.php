@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <div class="d-sm-flex justify-content-end">
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
            <h5 class="mb-0">New Requests Order</h5>
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
                <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <p class="text-xs font-weight-normal ms-2 mb-0">#10425</p>
                      </div>
                    </td>
                    <td class="font-weight-normal">
                      <span class="my-2 text-xs">1 Nov, 1:40 PM</span>
                    </td>
                    <td class="text-xs font-weight-normal">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-sm" aria-hidden="true">notifications</i></button>
                        <span>New Order</span>
                      </div>
                    </td>
                    <td class="text-xs font-weight-normal">
                      <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <img src="../../../assets/img/team-4.jpg" class="avatar avatar-xs me-2" alt="user image">
                          <span>Sebastian Koga</span>
                        </div>
                      </div>
                    </td>
                    <td class="text-xs font-weight-normal">
                      <span class="my-2 text-xs">
                          Wash, Dry, and Fold
                        <span class="text-secondary ms-2"> x 2 </span>
                      </span>
                    </td>
                    <td class="text-xs font-weight-normal">
                      <span class="my-2 text-xs">$44,90</span>
                    </td>
                    <td class="text-xs font-weight-normal">
                      <a href="{{ route('dashboard.incoming.details') }}" class="btn btn-link btn-sm m-0">
                        assign order
                      </a>
                    </td>
                  </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <p class="text-xs font-weight-normal ms-2 mb-0">#10421</p>
                    </div>
                  </td>
                  <td class="font-weight-normal">
                    <span class="my-2 text-xs">1 Nov, 10:20 AM</span>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-sm" aria-hidden="true">notifications</i></button>
                      <span>New Order</span>
                    </div>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <div class="d-flex align-items-center">
                      <img src="../../../assets/img/team-2.jpg" class="avatar avatar-xs me-2" alt="user image">
                      <span>Orlando Imieto</span>
                    </div>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <span class="my-2 text-xs">Wash, Dry, and Fold</span>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <span class="my-2 text-xs">$140,20</span>
                  </td>
                  <td class="text-xs font-weight-normal">
                    <a href="{{ route('dashboard.incoming.details') }}" class="btn btn-link btn-sm m-0">
                      assign order
                    </a>
                  </td>
                </tr>
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