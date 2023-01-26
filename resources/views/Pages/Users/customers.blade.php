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
                  <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Id</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../../../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="avatar image">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 font-weight-normal text-sm">John Michael</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 font-weight-normal text-sm">john@user.com</p>
                  </td>
                  <td>
                    <p class="text-sm font-weight-normal mb-0">555-00-123</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="mb-0 font-weight-normal text-sm">15 Orders</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">150k</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">43431</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../../../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="avatar image">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 font-weight-normal text-sm">Alexa Liras</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 font-weight-normal text-sm">alexa@user.com</p>
                  </td>
                  <td>
                    <p class="text-sm font-weight-normal mb-0">555-00-123</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="mb-0 font-weight-normal text-sm">15 Orders</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">150k</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">93021</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../../../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="avatar image">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 font-weight-normal text-sm">Laurent Perrier</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 font-weight-normal text-sm">laurent@user.com</p>
                  </td>
                  <td>
                    <p class="text-sm font-weight-normal mb-0">555-00-123</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="mb-0 font-weight-normal text-sm">15 Orders</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">150k</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">10392</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../../../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="avatar image">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 font-weight-normal text-sm">Michael Levi</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 font-weight-normal text-sm">michael@user.com</p>
                  </td>
                  <td>
                    <p class="text-sm font-weight-normal mb-0">555-00-123</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="mb-0 font-weight-normal text-sm">15 Orders</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">150k</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">34002</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../../../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="avatar image">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 font-weight-normal text-sm">Richard Gran</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 font-weight-normal text-sm">richard@user.com</p>
                  </td>
                  <td>
                    <p class="text-sm font-weight-normal mb-0">555-00-123</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="mb-0 font-weight-normal text-sm">15 Orders</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">150k</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">91879</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../../../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="avatar image">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 font-weight-normal text-sm">Miriam Eric</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 font-weight-normal text-sm">miriam@user.com</p>
                  </td>
                  <td>
                    <p class="text-sm font-weight-normal mb-0">555-00-123</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="mb-0 font-weight-normal text-sm">15 Orders</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">150k</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-sm font-weight-normal mb-0">23042</p>
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
  const dataTableSearch = new simpleDatatables.DataTable("#customer-list", {
    searchable: false,
    perPageSelect: false,
    perPage: 6,
  });
</script>
@endsection