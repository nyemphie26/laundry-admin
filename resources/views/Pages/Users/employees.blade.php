@extends('Layout.main')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6">
          <h4>Employee List</h4>
          <p>List of your outstanding employee </p>
        </div>
        <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
          <a href="{{ route('users.employees.new') }}" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">
            +&nbsp;New Employee
          </a>
        </div>
      </div>
    <div class="row my-4">
      <div class="col-12">
        <div class="card">
          <div class="table-responsive">
            <table class="table align-items-center mb-0" id="employee-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Phone Number</th>
                  <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7 px-0">Active Task</th>
                  <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7 px-0">Complete Task</th>
                  <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7 px-0">Total Task</th>
                  <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Role</th>
                  <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="{{ asset($employee->avatar_path) }}" class="avatar avatar-sm me-3" alt="avatar image">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 font-weight-normal text-sm">{{ $employee->full_name }}</h6>
                          <p class="mb-0 font-weight-normal text-sm">{{ $employee->email }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm font-weight-normal mb-0">{{ $employee->phone }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="mb-0 font-weight-normal text-sm">5 Tasks</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="mb-0 font-weight-normal text-sm">10 Tasks</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="mb-0 font-weight-normal text-sm">15 Tasks</p>
                    </td>
                    <td class="align-middle text-center">
                      @foreach ($employee->getRoleNames() as $role)
                        <p class="text-sm font-weight-normal mb-0">{{ $role }}</p>
                      @endforeach
                    </td>
                    <td class="text-sm">
                      <a href="{{ route('users.employees.edit', $employee) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Employee">
                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
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
  const dataTableSearch = new simpleDatatables.DataTable("#employee-list", {
    searchable: false,
    perPageSelect: false,
    perPage: 6,
  });
</script>
@endsection