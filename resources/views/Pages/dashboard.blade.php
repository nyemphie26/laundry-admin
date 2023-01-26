
@extends('Layout.main')

@section('content')
    <div class="col-lg-12 position-relative z-index-2">
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card  mb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">leaderboard</i>
                        </div>
                        <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">New Orders</p>
                        <h4 class="mb-0">10</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><a href="{{ route('orders.incoming') }}" class="text-primary"> Click here</a> to see the orders</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-sm-0 mt-4">
                <div class="card  mb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">local_laundry_service</i>
                        </div>
                        <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">On process orders</p>
                        <h4 class="mb-0">35</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><a href="{{ route('orders.list') }}" class="text-primary"> Click here</a> to see the order list</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
                <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">store</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">Revenue</p>
                    <h4 class="mb-0 ">34k</h4>
                    </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                    <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">+105% </span>than last month</p>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
                <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person_add</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">Customer</p>
                    <h4 class="mb-0 ">+91</h4>
                    </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                    <p class="mb-0 ">Just updated</p>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
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
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
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
        <div class="col-lg-4 mt-4 mb-3">
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
        <div class="card mb-4">
            <div class="d-flex">
            <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                <i class="material-icons opacity-10" aria-hidden="true">language</i>
            </div>
            <h6 class="mt-3 mb-2 ms-3 ">Sales by Country</h6>
            </div>
            <div class="card-body p-3">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                <div class="table-responsive">
                    <table class="table align-items-center ">
                    <tbody>
                        <tr>
                        <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                            <div>
                                <img src="../../assets/img/icons/flags/US.png" alt="Country flag">
                            </div>
                            <div class="ms-4">
                                <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                <h6 class="text-sm font-weight-normal mb-0 ">United States</h6>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">2500</h6>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">$230,900</h6>
                            </div>
                        </td>
                        <td class="align-middle text-sm">
                            <div class="col text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">29.9%</h6>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                            <div>
                                <img src="../../assets/img/icons/flags/DE.png" alt="Country flag">
                            </div>
                            <div class="ms-4">
                                <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                <h6 class="text-sm font-weight-normal mb-0 ">Germany</h6>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">3.900</h6>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">$440,000</h6>
                            </div>
                        </td>
                        <td class="align-middle text-sm">
                            <div class="col text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">40.22%</h6>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                            <div>
                                <img src="../../assets/img/icons/flags/GB.png" alt="Country flag">
                            </div>
                            <div class="ms-4">
                                <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                <h6 class="text-sm font-weight-normal mb-0 ">Great Britain</h6>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">1.400</h6>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">$190,700</h6>
                            </div>
                        </td>
                        <td class="align-middle text-sm">
                            <div class="col text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">23.44%</h6>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                            <div>
                                <img src="../../assets/img/icons/flags/BR.png" alt="Country flag">
                            </div>
                            <div class="ms-4">
                                <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                <h6 class="text-sm font-weight-normal mb-0 ">Brasil</h6>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">562</h6>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">$143,960</h6>
                            </div>
                        </td>
                        <td class="align-middle text-sm">
                            <div class="col text-center">
                            <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                            <h6 class="text-sm font-weight-normal mb-0 ">32.14%</h6>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
                <div class="col-lg-6 col-md-5">
                <div id="map" class="mt-0 mt-lg-n4"></div>
                </div>
            </div>
            </div>
        </div>
        <div class="row mt-5">
        <div class="col-lg-4 col-md-6">
            <div class="card" data-animation="true">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <a class="d-block blur-shadow-image">
                <img src="../../assets/img/products/product-1-min.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
                <div class="colored-shadow" style="background-image: url(&quot;../../assets/img/products/product-1-min.jpg&quot;);"></div>
            </div>
            <div class="card-body text-center">
                <div class="d-flex mt-n6 mx-auto">
                <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Refresh">
                    <i class="material-icons text-lg">refresh</i>
                </a>
                <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                    <i class="material-icons text-lg">edit</i>
                </button>
                </div>
                <h5 class="font-weight-normal mt-3">
                <a href="javascript:;">Cozy 5 Stars Apartment</a>
                </h5>
                <p class="mb-0">
                The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                </p>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer d-flex">
                <p class="font-weight-normal my-auto">$899/night</p>
                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                <p class="text-sm my-auto"> Barcelona, Spain</p>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="card" data-animation="true">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <a class="d-block blur-shadow-image">
                <img src="../../assets/img/products/product-2-min.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
                <div class="colored-shadow" style="background-image: url(&quot;../../assets/img/products/product-2-min.jpg&quot;);"></div>
            </div>
            <div class="card-body text-center">
                <div class="d-flex mt-n6 mx-auto">
                <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Refresh">
                    <i class="material-icons text-lg">refresh</i>
                </a>
                <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                    <i class="material-icons text-lg">edit</i>
                </button>
                </div>
                <h5 class="font-weight-normal mt-3">
                <a href="javascript:;">Office Studio</a>
                </h5>
                <p class="mb-0">
                The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
                </p>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer d-flex">
                <p class="font-weight-normal my-auto">$1.119/night</p>
                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                <p class="text-sm my-auto"> London, UK</p>
            </div>
            </div>
        </div>
        <div class="col-lg-4 mt-5 mt-lg-0">
            <div class="card" data-animation="true">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <a class="d-block blur-shadow-image">
                <img src="../../assets/img/products/product-3-min.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
                <div class="colored-shadow" style="background-image: url(&quot;../../assets/img/products/product-3-min.jpg&quot;);"></div>
            </div>
            <div class="card-body text-center">
                <div class="d-flex mt-n6 mx-auto">
                <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Refresh">
                    <i class="material-icons text-lg">refresh</i>
                </a>
                <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                    <i class="material-icons text-lg">edit</i>
                </button>
                </div>
                <h5 class="font-weight-normal mt-3">
                <a href="javascript:;">Beautiful Castle</a>
                </h5>
                <p class="mb-0">
                The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
                </p>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer d-flex">
                <p class="font-weight-normal my-auto">$459/night</p>
                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                <p class="text-sm my-auto"> Milan, Italy</p>
            </div>
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
    {{-- <script src="../../assets/js/plugins/world.js"></script> --}}
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

        // Initialize the vector map
        var map = new jsVectorMap({
        selector: "#map",
        map: "world_merc",
        zoomOnScroll: false,
        zoomButtons: false,
        selectedMarkers: [1, 3],
        markersSelectable: true,
        markers: [{
            name: "USA",
            coords: [40.71296415909766, -74.00437720027804]
            },
            {
            name: "Germany",
            coords: [51.17661451970939, 10.97947735117339]
            },
            {
            name: "Brazil",
            coords: [-7.596735421549542, -54.781694323779185]
            },
            {
            name: "Russia",
            coords: [62.318222797104276, 89.81564777631716]
            },
            {
            name: "China",
            coords: [22.320178999475512, 114.17161225541399],
            style: {
                fill: '#E91E63'
            }
            }
        ],
        markerStyle: {
            initial: {
            fill: "#e91e63"
            },
            hover: {
            fill: "E91E63"
            },
            selected: {
            fill: "E91E63"
            }
        },


        });
    </script>
@endsection