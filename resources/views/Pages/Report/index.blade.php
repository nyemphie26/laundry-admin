@extends('Layout.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <form action="{{ route('summary.show') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-lg-flex">
                              <div>
                                <h5 class="mb-0">Choose Date Range</h5>
                              </div>
                              <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                  {{-- <a href="{{ route('category.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Category</a> --}}
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="card-body px0 pb-0">
                            <div class="input-group input-group-static">
                            <input name="dateRange" class="form-control dateRangePickers" placeholder="Please select range date" type="text" id="dateRange" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn bg-gradient-primary btn-sm m-0">Show Summary</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="col-lg-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <h3 class="mb-0">Summary Reports</h3>
                            <span class="text-secondary">From Month XX, 20xx to Month XX, 20xx</span>
                        </div>
                        <hr class="horizontal dark mt-0 mb-4">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-search">
                                  <thead class="thead-light">
                                    <tr>
                                      <th class="text-start px-0">Date</th>
                                      <th>Orders</th>
                                      <th>Customers Ordering</th>
                                      <th class="text-end">Tax</th>
                                      <th class="text-end">Revenue</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <td class="text-start px-0">March 01.2023</td>
                                        <td>7 Orders</td>
                                        <td>7 Customers</td>
                                        <td class="text-end">$ 35.00</td>
                                        <td class="text-end">$ 95.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-0">March 01.2023</td>
                                        <td>3 Orders</td>
                                        <td>1 Customers</td>
                                        <td class="text-end">$ 35.00</td>
                                        <td class="text-end">$ 95.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-0">March 01.2023</td>
                                        <td>5 Orders</td>
                                        <td>3 Customers</td>
                                        <td class="text-end">$ 35.00</td>
                                        <td class="text-end">$ 95.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-0">March 01.2023</td>
                                        <td>7 Orders</td>
                                        <td>2 Customers</td>
                                        <td class="text-end">$ 35.00</td>
                                        <td class="text-end">$ 95.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-0">March 01.2023</td>
                                        <td>9 Orders</td>
                                        <td>9 Customers</td>
                                        <td class="text-end">$ 35.00</td>
                                        <td class="text-end">$ 95.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="4">Gross Revenue</td>
                                        <td class="text-end text-bold">$ 350.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="4">Service Tax</td>
                                        <td class="text-end text-danger">$ 150.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="4">Nett Revenue</td>
                                        <td class="text-end text-bold">$ 200.00</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                        </div>
                        <hr class="horizontal dark mb-4 mt-4">
                        <div class="row text-center">
                            <h4 class="mb-0">WASH.PRESS</h4>
                            <span class="mt-0 text-secondary">Your Laundry Partner in Crime</span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/plugins/flatpickr.min.js') }}"></script>
    <script>
        new flatpickr('.dateRangePickers',{
            mode: "range",
            maxDate: "today",
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
@endsection