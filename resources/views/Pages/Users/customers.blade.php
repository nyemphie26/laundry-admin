@extends('Layout.main')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6">
          <h4>Customer List</h4>
          <p>Summary of your lovely customers</p>
        </div>
        {{-- <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
          <button type="button" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Save</button>
        </div> --}}
      </div>
    <div class="row my-4">
      <div class="col-12">
        <div class="card">
          <div class="table-responsive">
            <table class="table align-items-center mb-0" id="customer-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                  <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Phone Number</th>
                  <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Total Orders</th>
                  <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Total Payment</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customers as $customer)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="{{ asset($customer->avatar_path) }}" class="avatar avatar-sm me-3" alt="avatar image">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 font-weight-normal text-sm">{{ $customer->getFullNameAttribute() }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="mb-0 font-weight-normal text-sm">{{ $customer->email }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-normal mb-0">{{ $cutomer->phone ?? '-' }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="mb-0 font-weight-normal text-sm">{{ $customer->total_order }} Orders</p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm font-weight-normal mb-0">{{ $customer->revenue<1000 ? $customer->revenue : round($customer->revenue/1000, 1).'k' }}</p>
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
  const dataTableSearch = new simpleDatatables.DataTable("#customer-list", {
    searchable: false,
    perPageSelect: false,
    perPage: 6,
  });
</script>
@endsection