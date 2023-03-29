@extends('Layout.main')

@section('content')
    <div class="container-fluid py-4">
        <form action="{{ route('summary.pdf',['start'=>$startDate,'end'=>$endDate]) }}" method="get">
            <div class="d-flex">
                <button class="btn btn-icon btn-outline-dark ms-auto export" type="submit">
                    <i class="material-icons text-xs position-relative">archive</i>
                    Export .XLS
                </button>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-4 mb-4">
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
                        <input class="form-control dateRangePickers" placeholder="Please select range date" type="text" id="dateRange" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-grid d-lg-none gap-2">
                            <button type="button" class="btn bg-gradient-primary btn-sm m-0 w-100">Show Summary</button>
                            <a href="{{ route('summary.index') }}" class="btn btn-outline-primary btn-sm m-0 w-100">Clear</a>
                        </div>
                        <div class="text-lg-end d-none d-lg-block">
                            <a href="{{ route('summary.index') }}" class="btn btn-outline-primary btn-sm m-0">Clear</a>
                            <button type="button" class="btn bg-gradient-primary btn-sm m-0">Show Summary</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4" id="container-to-print">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <h3 class="mb-0">Summary Reports</h3>
                            <span class="text-secondary">From {{ date('M d, Y', strtotime($startDate)) }} to {{ date('M d, Y', strtotime($endDate)) }}</span>
                        </div>
                        <hr class="horizontal dark mt-0 mb-4">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-search">
                                  <thead class="thead-light">
                                    <tr>
                                      <th class="text-start px-0">Date</th>
                                      <th class="w-30">Orders</th>
                                      <th class="text-end">Income</th>
                                      <th class="text-end">Tax</th>
                                      <th class="text-end">Revenue</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($report as $row)
                                        <tr>
                                            <td class="text-start px-0">{{ date('M d, Y', strtotime($row->date)) }}</td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center ms-2">
                                                    <h6 class="mb-0 font-weight-normal">{{ $row->orders }} Orders</h6>
                                                    <p class="mb-0 font-weight-normal text-xs">from {{ $row->customers }} Customers</p>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex">
                                                    <p class="ms-4 mb-0 font-weight-normal">$</p>
                                                    <p class="ms-auto mb-0 font-weight-normal">{{ number_format($row->income, 2) }}</p>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex">
                                                    <p class="ms-4 mb-0 font-weight-normal">$</p>
                                                    <p class="ms-auto mb-0 font-weight-normal">{{ number_format($row->tax, 2) }}</p>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex">
                                                    <p class="ms-4 mb-0 font-weight-normal">$</p>
                                                    <p class="ms-auto mb-0 font-weight-normal">{{ number_format($row->revenue, 2) }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{--  --}}
                                    <tr>
                                        <td class="text-end" colspan="4">Gross Revenue</td>
                                        <td class="text-end font-weight-bold">
                                            <div class="d-flex">
                                                <p class="ms-4 mb-0 font-weight-bold">$</p>
                                                <p class="ms-auto mb-0 font-weight-bold">{{ number_format($total->revenue, 2) }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="4">Total Tax</td>
                                        <td class="text-end text-danger">
                                            <div class="d-flex">
                                                <p class="ms-4 mb-0 font-weight-bold">$</p>
                                                <p class="ms-auto mb-0 font-weight-bold">{{ number_format($total->tax, 2) }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="4">Nett Revenue</td>
                                        <td class="text-end text-bold">
                                            <div class="d-flex">
                                                <p class="ms-4 mb-0 font-weight-bold">$</p>
                                                <p class="ms-auto mb-0 font-weight-bold">{{ number_format($total->income, 2) }}</p>
                                            </div>
                                        </td>
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
            </div>
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