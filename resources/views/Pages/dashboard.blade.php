
@extends('Layout.main')

@section('content')
    <div class="col-lg-6 position-relative z-index-2">
        <div class="row mb-4">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card  mb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">leaderboard</i>
                        </div>
                        <div class="text-end pt-1">
                        <h4 class="mb-0">{{ $orders->where('getLatestStatus.status','placed')->count() }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><a href="{{ route('orders.incoming') }}" class="text-primary">New Orders!</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card mb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">local_laundry_service</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">{{ $orders->where('getLatestStatus.status','processing')->count() }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><a href="{{ route('orders.list') }}" class="text-primary">Processing Orders</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-lg-0 mt-4">
                <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">local_shipping</i>
                    </div>
                    <div class="text-end pt-1">
                    <h4 class="mb-0 ">{{ $orders->where('getLatestStatus.status','processed')->count() }}</h4>
                    </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                    <p class="mb-0"><a href="{{ route('orders.assigning') }}" class="text-primary">Assign Deliveries!</a></p>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-8 col-md-6 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Website Views</h6>
                        <p class="text-sm ">Last Campaign Performance</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-end flex-column">
                <div class="card mb-auto mt-4">
                    <div class="card-header p-3 pt-2 bg-transparent">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person_add</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0 ">{{ $orders->where('getLatestStatus.status','delivered')->count() }}</h4>
                        </div>
                    </div>
                    <hr class="horizontal my-0 dark">
                    <div class="card-footer p-3">
                        <p class="mb-0 ">Complete Orders</p>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-warning shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">attach_money</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">35k</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0">Monthly Revenue</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 "> Daily Sales </h6>
                    <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm"> updated 4 min ago </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12 mt-4 mb-3">
                <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 ">Completed Tasks</h6>
                    <p class="text-sm ">Last Campaign Performance</p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">just updated</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 postition-relative z-index-z">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="mb-0">Quick Setup</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-sm-flex text-center flex-column">
                            <div>
                                <h5 class="mb-0">Serviced Area</h5>
                            </div>
                            <div>
                                <button type="button" class="btn btn-link btn-sm m-0" data-bs-toggle="modal" data-bs-target="#modal-area">New Area</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <div class="table-responsive">
                            <table class="table table-flush display" id="datatable-postal">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Postal Code</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($postals as $postal)
                                        <tr>
                                            <td>
                                                <span class="my-2 text-sm">{{ $postal->postal_code }}</span>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="postalStatus" data-postal="{{ $postal->postal_code }}" onchange="updatePostal(this)" {{ $postal->status == 0 ? '' : 'checked' }}>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-sm-flex text-center flex-column">
                            <div>
                                <h5 class="mb-0">Service Tax</h5>
                            </div>
                            <div>
                                <button type="button" class="btn btn-link btn-sm m-0" data-bs-toggle="modal" data-bs-target="#modal-tax">Update Tax</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-tax">
                                <thead>
                                    <tr>
                                        <th>Date Updated</th>
                                        <th>Tax</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($taxes as $tax)
                                        <tr>
                                            <td>
                                                <span class="my-2 text-sm">{{ date('d.m.y', strtotime($tax->created_at)) }}</span>
                                            </td>
                                            <td>
                                                <span class="my-2 text-sm">{{ $tax->tax }}</span>
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
        <div class="row">
            <div class="col-lg-12 position-relative">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-sm-flex text-center flex-column">
                            <div>
                                <h5 class="mb-0">Store Operational</h5>
                            </div>
                            <div>
                                <span class="btn btn-link-secondary btn-sm mb-0">
                                    Last Update :
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Days</th>
                                            <th>Hours</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @foreach ($storeDays as $day)
                                                @endforeach
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="fcustomCheck1" name="opDays"
                                                    @foreach ($storeDays as $item)
                                                        {{ $item->day == 1 ? 'checked' : '' }}
                                                    @endforeach>
                                                    <label class="custom-control-label" for="customCheck1">Monday</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="2" id="fcustomCheck1" name="opDays"
                                                    @foreach ($storeDays as $item)
                                                        {{ $item->day == 2 ? 'checked' : '' }}
                                                    @endforeach>
                                                    <label class="custom-control-label" for="customCheck1">Tuesday</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="3" id="fcustomCheck1" name="opDays"
                                                    @foreach ($storeDays as $item)
                                                        {{ $item->day == 3 ? 'checked' : '' }}
                                                    @endforeach>
                                                    <label class="custom-control-label" for="customCheck1">Wednesday</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="4" id="fcustomCheck1" name="opDays"
                                                    @foreach ($storeDays as $item)
                                                        {{ $item->day == 4 ? 'checked' : '' }}
                                                    @endforeach>
                                                    <label class="custom-control-label" for="customCheck1">Thursday</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="5" id="fcustomCheck1" name="opDays"
                                                    @foreach ($storeDays as $item)
                                                        {{ $item->day == 5 ? 'checked' : '' }}
                                                    @endforeach>
                                                    <label class="custom-control-label" for="customCheck1">Friday</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="6" id="fcustomCheck1" name="opDays"
                                                    @foreach ($storeDays as $item)
                                                        {{ $item->day == 6 ? 'checked' : '' }}
                                                    @endforeach>
                                                    <label class="custom-control-label" for="customCheck1">Saturday</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="0" id="fcustomCheck1" name="opDays"
                                                    @foreach ($storeDays as $item)
                                                        {{ $item->day == 0 ? 'checked' : '' }}
                                                    @endforeach>
                                                    <label class="custom-control-label" for="customCheck1">Sunday</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-static my-3">
                                                    <label>Hour From</label>
                                                    <input type="time" class="form-control" name="storeHourFrom" value="{{ $storeHour['operational']->hourFrom ?? '00:00' }}">
                                                </div>
                                                <div class="input-group input-group-static my-3">
                                                    <label>Until Hour</label>
                                                    <input type="time" class="form-control" name="storeHourUntil" value="{{ $storeHour['operational']->hourUntil ?? '00:00' }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                           <td colspan="2">
                                               <button type="button" class="btn bg-gradient-primary btn-sm m-0 w-100" onclick="updateOperational()">Update</button>
                                           </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table" id="datatable-offDays">
                                        <thead>
                                            <th>Off Days</th>
                                            <th>
                                                <button type="button" class="btn btn-link btn-sm m-0 p-0" data-bs-toggle="modal" data-bs-target="#modal-offDay">Add New</button>
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach ($offDays as $offDay)
                                                <tr>
                                                    <td><span class="my-2 text-sm">{{ date('D, d M Y', strtotime($offDay->date)) }}</span></td>
                                                    <td class="text-sm text-center">
                                                        <form action="#" class="form" method="post">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit "class="btn btn-link m-0 p-0" data-date="{{ $offDay->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete Day" onclick="deleteOffDay(this)">
                                                            <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                                        </button>
                                                        </form>
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
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 position-relative">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-sm-flex text-center flex-column">
                            <div>
                                <h5 class="mb-0">Pickup and Delivery</h5>
                            </div>
                            <div>
                                <span class="btn btn-link-secondary btn-sm mb-0">
                                    Last Update :
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        Morning Schedule
                                    </th>
                                    <th colspan="2">
                                        Afternoon Schedule
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-sm text-center">
                                        <div class="input-group input-group-static my-3">
                                            <label>Hour From</label>
                                            <input type="time" class="form-control" name="morningFrom" value="{{ $storeHour['morningSchedule']->hourFrom ?? '00:00' }}">
                                        </div>
                                    </td>
                                    <td class="text-sm text-center">
                                        <div class="input-group input-group-static my-3">
                                            <label>Until Hour</label>
                                            <input type="time" class="form-control" name="morningUntil" value="{{ $storeHour['morningSchedule']->hourUntil ?? '00:00' }}">
                                        </div>
                                    </td>
                                    <td class="text-sm text-center">
                                        <div class="input-group input-group-static my-3">
                                            <label>Hour From</label>
                                            <input type="time" class="form-control" name="afternoonFrom" value="{{ $storeHour['afternoonSchedule']->hourFrom ?? '00:00' }}">
                                        </div>
                                    </td>
                                    <td class="text-sm text-center">
                                        <div class="input-group input-group-static my-3">
                                            <label>Until Hour</label>
                                            <input type="time" class="form-control" name="afternoonUntil" value="{{ $storeHour['afternoonSchedule']->hourUntil ?? '00:00' }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <button type="button" class="btn bg-gradient-primary btn-sm m-0 w-100" onclick="updatePickup()">Update</button>
                                    </td>
                                 </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    {{-- Modal New Area --}}
    <div class="modal modal-sm fade" id="modal-area" tabindex="-1" role="dialog" aria-labelledby="modal-area" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title font-weight-normal" id="modal-title-area">New Serviced Area</h6>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-outline mb-0">
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="form-control" name="postalCode" id="postalCode">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn bg-gradient-primary" onclick="addPostal()">Add New</button>
            </div>
          </div>
        </div>
    </div>


    {{-- Modal New Tax --}}
    <div class="modal modal-sm fade" id="modal-tax" tabindex="-1" role="dialog" aria-labelledby="modal-tax" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title font-weight-normal" id="modal-title-tax">New Tax Service</h6>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-outline mb-0">
                    <label class="form-label">Tax (in percent)</label>
                    <input type="text" class="form-control" name="tax" id="tax">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn bg-gradient-primary" onclick="updateTax()">Add New</button>
            </div>
          </div>
        </div>
    </div>


    {{-- Modal New Off Day --}}
    <div class="modal modal-sm fade" id="modal-offDay" tabindex="-1" role="dialog" aria-labelledby="modal-offDay" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title font-weight-normal" id="modal-title-offDay">New Off Day</h6>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-static">
                <input class="form-control datepickers" placeholder="Please select date" type="text" id="offDay" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn bg-gradient-primary" onclick="updateOffDay()">Add New</button>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('page-script')
    <!-- Kanban scripts -->
    <script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
    <script>

        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["M", "T", "W", "T", "F", "S", "S"],
            datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, .8)",
            data: [50, 20, 10, 22, 50, 10, 40],
            maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                color: "#fff"
                },
            },
            x: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            },
        },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
            label: "Mobile apps",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
            maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            },
        },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
            label: "Mobile apps",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                display: true,
                padding: 10,
                color: '#f8f9fa',
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            },
        },
        });

        new flatpickr('.datepickers', {});

        const tablePostal = new simpleDatatables.DataTable("#datatable-postal", {
            searchable: true,
            perPageSelect: false,
            perPage: 3,
            sortable: false,
        });

        const tableTax = new simpleDatatables.DataTable("#datatable-tax", {
            searchable: false,
            perPageSelect: false,
            perPage: 3,
            sortable: false,
        });

        const tableOffDays = new simpleDatatables.DataTable("#datatable-offDays", {
            searchable: false,
            perPageSelect: false,
            perPage: 5,
            sortable: false,
        });
        
        function addPostal(){
            var link = '/status/postal';
            var postal = document.getElementById('postalCode').value;
            let formdata = new FormData();
            formdata.append('postal', postal);
            updateStatus(link, 'POST', formdata);
        }
        
        function updatePostal(e){
            var postal = e.dataset.postal;
            var link = '/status/postalUpdate/'+postal;
            let formdata = new FormData();
            if (e.checked != true)
            {
                formdata.append('status', '0');
                updateStatus(link, 'POST', formdata);
            }
            else
            {
                formdata.append('status', '1');
                updateStatus(link, 'POST', formdata);
            }
        }

        function updateTax(){
            var tax = document.getElementById('tax').value;
            var link = '/status/tax';
            let formdata = new FormData();
            formdata.append('tax', tax);
            updateStatus(link, 'POST', formdata);
        }

        function updateOffDay(){
            var offDay = document.getElementById('offDay').value;
            var link = '/status/offDay';
            let formdata = new FormData();
            formdata.append('date', offDay);
            updateStatus(link, 'POST', formdata);
        }

        function deleteOffDay(e){
            var id = e.dataset.date;
            var link = '/status/offDay/'+id;
            updateStatus(link, 'DELETE');
        }

        function updateOperational(){
            let days = [];
            const checked = document.querySelectorAll('input[name="opDays"]:checked');
            days = Array.from(checked).map(x => x.value);
            let hourFrom = document.querySelector('input[name="storeHourFrom"]').value;
            let hourUntil = document.querySelector('input[name="storeHourUntil"]').value;

            var link = '/status/operational';
            let formdata = new FormData();
            formdata.append('days', JSON.stringify(days));
            formdata.append('hourFrom', hourFrom);
            formdata.append('hourUntil', hourUntil);
            updateStatus(link, 'POST', formdata);
        }

        function updatePickup(){
            const morningFrom = document.querySelector('input[name="morningFrom"]').value;
            const morningUntil = document.querySelector('input[name="morningUntil"]').value;
            const afternoonFrom = document.querySelector('input[name="afternoonFrom"]').value;
            const afternoonUntil = document.querySelector('input[name="afternoonUntil"]').value;
            console.log('Morning From '+ morningFrom+' Until '+ morningUntil);
            console.log('Afternoon From '+ afternoonFrom+' Until '+ afternoonUntil);

            var link = '/status/pickupSchedule';
            let formdata = new FormData();
            formdata.append('morningFrom', morningFrom);
            formdata.append('morningUntil', morningUntil);
            formdata.append('afternoonFrom', afternoonFrom);
            formdata.append('afternoonUntil', afternoonUntil);
            updateStatus(link, 'POST', formdata);

        }

        function updateStatus(link, method, formdata){
        fetch(link,{
            method: method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // replace with your own CSRF token
            },
            body: formdata
        })
        .then(res=>res.json())
        .then(data=>{
            location.reload();
        })
        // .then(data=>console.log(data))
        .catch(err=>console.log(err))
    }
    </script>
@endsection