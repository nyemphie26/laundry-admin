@extends('Layout.mobile')

@section('content')
<div class="container-fluid pb-4">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card card-background card-background-mask-dark align-items-start">
                <div class="full-background cursor-pointer" style="background-image: url('https://images.unsplash.com/photo-1604213410393-89f141bb96b8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTA5fHxuYXR1cmV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60')"></div>
                <div class="card-body">
                  <h5 class="text-white mb-0">Welcome back,</h5>
                  <p class="text-white text-sm">John Doe.</p>
                  <div class="d-flex mt-4 pt-2 justify-content-end text-right">
                    <h1>{{ env('APP_NAME') }}</h1>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-5 col-sm-6 mt-sm-0 mt-4">
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="material-icons opacity-10">account_balance</i>
                  </div>
                </div>
                <div class="card-body pt-0 p-3 text-center">
                  <h6 class="text-center mb-0">Today's Work</h6>
                  <span class="text-xs">See All</span>
                  <hr class="horizontal dark my-3">
                  <h5 class="mb-0">5 Works</h5>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="material-icons opacity-10">account_balance_wallet</i>
                  </div>
                </div>
                <div class="card-body pt-0 p-3 text-center">
                  <h6 class="text-center mb-0">Upcoming Work</h6>
                  <span class="text-xs">See All</span>
                  <hr class="horizontal dark my-3">
                  <h5 class="mb-0">10+ Work(s)</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mt-sm-0 mt-4">
          <div class="card mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-4">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="material-icons opacity-10">battery_charging_full</i>
                  </div>
                </div>
                <div class="col-8 my-auto text-end">
                  <p class="text-sm mb-0 opacity-7">Battery Health</p>
                  <h5 class="font-weight-bolder mb-0">
                    99 %
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-4">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="material-icons opacity-10">volume_down</i>
                  </div>
                </div>
                <div class="col-8 my-auto text-end">
                  <p class="text-sm mb-0 opacity-7">Music Volume</p>
                  <h5 class="font-weight-bolder mb-0">
                    30/100
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4 col-md-7">
        <div class="card">
          <div class="card-header p-3 pb-0">
            <h6 class="mb-0">Upcoming events</h6>
            <p class="text-sm mb-0 text-capitalize font-weight-normal">Joined</p>
          </div>
          <div class="card-body border-radius-lg p-3">
            <div class="d-flex">
              <div>
                <div class="icon icon-shape bg-gradient-dark icon-md text-center border-radius-md shadow-none">
                  <i class="material-icons text-white opacity-10" aria-hidden="true">savings</i>
                </div>
              </div>
              <div class="ms-3">
                <div class="numbers">
                  <h6 class="mb-1 text-dark text-sm">Cyber Week</h6>
                  <span class="text-sm">27 March 2020, at 12:30 PM</span>
                </div>
              </div>
            </div>
            <div class="d-flex mt-4">
              <div>
                <div class="icon icon-shape bg-gradient-dark icon-md text-center border-radius-md shadow-none">
                  <i class="material-icons text-white opacity-10" aria-hidden="true">notifications_active</i>
                </div>
              </div>
              <div class="ms-3">
                <div class="numbers">
                  <h6 class="mb-1 text-dark text-sm">Meeting with Marry</h6>
                  <span class="text-sm">24 March 2020, at 10:00 PM</span>
                </div>
              </div>
            </div>
            <div class="d-flex mt-4">
              <div>
                <div class="icon icon-shape bg-gradient-dark icon-md text-center border-radius-md shadow-none">
                  <i class="material-icons text-white opacity-10" aria-hidden="true">task</i>
                </div>
              </div>
              <div class="ms-3">
                <div class="numbers">
                  <h6 class="mb-1 text-dark text-sm">Tasks planification</h6>
                  <span class="text-sm">24 March 2020, at 12:30 AM</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 mt-lg-0 mt-4">
        <div class="card overflow-hidden h-100">
          <div class="card-header p-3 pb-0">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
              </div>
              <div class="ms-3">
                <p class="text-sm mb-0 text-capitalize font-weight-normal">Tasks</p>
                <h5 class="font-weight-bolder mb-0">
                  480
                </h5>
              </div>
              <div class="progress-wrapper ms-auto w-25">
                <div class="progress-info">
                  <div class="progress-percentage">
                    <span class="text-xs font-weight-bold">60%</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-gradient-primary w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body mt-3 p-0">
            <div class="chart">
              <canvas id="chart-line-widgets" class="chart-canvas" height="200"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-3 col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex">
              <p>Full Body</p>
              <div class="ms-auto">
                <span class="badge badge-primary">Moderate</span>
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <p class="mb-0">What matters is the people who are sparked by it. And the people who are liked.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mt-md-0 mt-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex">
              <p class="mb-0">On</p>
              <div class="form-check form-switch ms-auto">
                <input class="form-check-input ms-0" type="checkbox" checked id="flexSwitchCheckDefault00">
              </div>
            </div>
            <img class="img-fluid pt-3 pb-2" src="../../assets/img/small-logos/icon-bulb.svg" alt="bulb_icon">
            <p class="mb-0">Lights</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mt-lg-0 mt-4">
        <div class="card overflow-hidden">
          <div class="card-header p-3 pb-0">
            <p class="text-sm mb-0 text-capitalize font-weight-normal">Calories</p>
            <h5 class="font-weight-bolder mb-0">
              97
              <span class="text-success text-sm font-weight-bolder">+5%</span>
            </h5>
          </div>
          <div class="card-body p-0">
            <div class="chart">
              <canvas id="chart-widgets-1" class="chart-canvas" height="100"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mt-lg-0 mt-4">
        <div class="card">
          <div class="card-body">
            <div class="icon icon-shape bg-gradient-primary shadow text-center">
              <i class="material-icons opacity-10" aria-hidden="true">refresh</i>
            </div>
            <h5 class="mt-3 mb-0">754 <span class="text-secondary text-sm">m</span></h5>
            <p class="mb-0">New York City</p>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mt-lg-0 mt-4">
        <div class="card">
          <div class="card-body">
            <p>Steps</p>
            <h3>11.4K</h3>
            <span class="badge badge-success">+4.3%</span>
          </div>
        </div>
      </div>
    </div>
</div>
{{-- <h1>home</h1> --}}
@endsection
@section('page-script')
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script>
  var ctx1 = document.getElementById("chart-widgets-1").getContext("2d");

  new Chart(ctx1, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Calories",
        tension: 0.5,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#252f40",
        borderWidth: 2,
        backgroundColor: "transparent",
        data: [50, 45, 60, 60, 80, 65, 90, 80, 100],
        maxBarThickness: 6,
        fill: true
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
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            display: false
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            display: false
          }
        },
      },
    },
  });

  var ctx3 = document.getElementById("chart-line-widgets").getContext("2d");

  var gradientStroke3 = ctx3.createLinearGradient(0, 230, 0, 50);

  gradientStroke3.addColorStop(1, 'rgba(33,82,255,0.1)');
  gradientStroke3.addColorStop(0.2, 'rgba(33,82,255,0.0)');
  gradientStroke3.addColorStop(0, 'rgba(33,82,255,0)'); //purple colors

  new Chart(ctx3, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Tasks",
        tension: 0,
        pointRadius: 5,
        pointBackgroundColor: "#E91E63",
        pointBorderColor: "transparent",
        borderColor: "#E91E63",
        borderWidth: 4,
        backgroundColor: "transparent",
        data: [40, 45, 42, 41, 40, 43, 40, 42, 39],
        maxBarThickness: 6,
        fill: true
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
            display: false,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#9ca2b7',
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
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: '#c1c4ce5c'
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#9ca2b7',
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
</script>
@endsection