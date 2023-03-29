<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.6') }}" rel="stylesheet" /> --}}
    <style>
        .container,
        .container-fluid,
        .container-sm,
        .container-md,
        .container-lg,
        .container-xl,
        .container-xxl {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-right: auto;
            margin-left: auto;
        }
        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-.5 * var(--bs-gutter-x));
            margin-left: calc(-.5 * var(--bs-gutter-x));
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y);
        }
        .text-start {
            text-align: left !important;
        }

        .text-end {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }
        .text-xs {
            line-height: 1.25;
            font-size: 0.75rem !important;
        }
        p,
        .p {
            font-size: 1rem;
        }
        hr {
            margin: 1rem 0;
            color: inherit;
            border: 0;
            border-top: 1px solid;
            opacity: 0.25;
        }
        hr {
            border-top: none;
            height: 1px;
        }

        h1,.h1,h2,.h2,h3,.h3,h4,.h4,h5,.h5,h6,.h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            line-height: 1.2;
            color: #344767;
            font-weight: 600;
            font-family: "Roboto Slab", sans-serif;
            letter-spacing: -0.05rem;
        }
        hr.horizontal {
            background-color: transparent;
        }

        hr.horizontal.dark {
            background-image: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.4), transparent);
        }
        .table {
        --bs-table-color: #7b809a;
        --bs-table-bg: transparent;
        --bs-table-border-color: #f0f2f5;
        --bs-table-accent-bg: transparent;
        --bs-table-striped-color: #7b809a;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #7b809a;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #7b809a;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: var(--bs-table-color);
        vertical-align: top;
        border-color: var(--bs-table-border-color);
        }
        .table>tbody {
            vertical-align: inherit;
        }

        .table>thead {
            vertical-align: bottom;
        }
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        thead,tbody,tfoot,tr,td,th {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }
        .table thead th {
            padding: 0.75rem 1.5rem;
            text-transform: capitalize;
            letter-spacing: 0px;
            border-bottom: 1px solid #f0f2f5;
        }

        .table th {
            font-weight: 600;
        }
        .table td,.table th {
            white-space: nowrap;
        }
        .table tbody tr:last-child td {
            border-width: 0;
        }

        .table> :not(:last-child)> :last-child>* {
            border-bottom-color: #f0f2f5;
        }

        .table> :not(:first-child) {
            border-top: 1px solid currentColor;
        }
        .d-flex {
            display: flex !important;
        }
        .flex-column {
            flex-direction: column !important;
        }
        .ms-4 {
            margin-left: 1.5rem !important;
        }
        .ms-auto {
            margin-left: auto !important;
        }
        .font-weight-normal {
            font-weight: 400 !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row text-center">
            <h3 class="mb-0">Summary Reports</h3>
            <span class="text-secondary">From {{ date('M d, Y', strtotime(request()->route('start'))) }} to {{ date('M d, Y', strtotime(request()->route('end'))) }}</span>
        </div>
        <hr class="horizontal dark mt-0 mb-4">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-search">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-start px-0">Date</th>
                      <th>Orders</th>
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
                                $ {{ number_format($row->income, 2) }}
                            </td>
                            <td class="text-end">
                                $ {{ number_format($row->tax, 2) }}
                            </td>
                            <td class="text-end">
                                $ {{ number_format($row->revenue, 2) }}
                            </td>
                        </tr>
                    @endforeach
                    {{--  --}}
                    <tr>
                        <td class="text-end" colspan="4">Gross Revenue</td>
                        <td class="text-end font-weight-bold">
                            $ {{ number_format($total->revenue, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-end" colspan="4">Total Tax</td>
                        <td class="text-end text-danger">
                            $ {{ number_format($total->tax, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-end" colspan="4">Nett Revenue</td>
                        <td class="text-end text-bold">
                            $ {{ number_format($total->income, 2) }}
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
</body>
</html>