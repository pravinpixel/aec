@extends('layouts.customer')

@section('customer-content')
    @include('flash::message')

    <div class="content-page">
        <div class="content">

            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid ">

                <div class="content container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-start">Dashboard</h4>
                                <h4 class="page-title text-uppercase text-end float-end"><strong>Month</strong></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="main">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">

                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="live-status-bg">
                                            <h3>Active Enquiries</h3>
                                            <p class="count">{{ $totalActiveEnquiries }}</p>
                                            <span class="btn btn-success">
                                                <i class="mdi mdi-comment-check-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="live-status-bg">
                                            <h3>Proposals waiting for Approval</h3>
                                            <p class="count">{{ $totalWaitingApprovals }}</p>
                                            <span class="btn btn-secondary">
                                                <i class="mdi mdi-comment-processing-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="live-status-bg">
                                            <h3>New Invoices</h3>
                                            <p class="count">{{ $totalNewInvoices }}</p>
                                            <span class="btn btn-primary">
                                                <i class="mdi mdi-comment-plus-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="live-status-bg">
                                            <h3>Unpaid Invoices</h3>
                                            <p class="count">{{ $totalUnpaidInvoices }}</p>
                                            <span class="btn btn-info text-white">
                                                <i class="mdi mdi-comment-remove-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

                        <hr />
                        <div class="row">
                            <div class="col-xl-3 col-lg-3">
                                <h4 class="header-title text-uppercase"><strong>Statistics</strong></h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-comment-plus-outline widget-icon text-success"></i>
                                                </div>
                                                <h3 class="card-heading">Completed Projects</h3>
                                                <div class="text-success me-2"><span class="fa-2x">40</span></div>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                    <div class="col-lg-12">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-comment-remove-outline widget-icon text-danger"></i>
                                                </div>
                                                <h3 class="card-heading">Waiting for Feed back</h3>
                                                <div class="text-danger me-2"><span class="fa-2x">3</span></div>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end col -->

                            <div class="col-xl-9 col-lg-9">
                                <h4 class="header-title text-uppercase">Enquiries vs Projects</h4>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-content-bg">
                                            <div class="row text-center">
                                                <div class="col-md-6">
                                                    <p class="text-muted mb-0 mt-3">Current Month</p>
                                                    <h3 class="fw-normal mb-3">
                                                        <small
                                                            class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                                                        <span>$58,254</span>
                                                    </h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-muted mb-0 mt-3">Previous Month</p>
                                                    <h3 class="fw-normal mb-3">
                                                        <small
                                                            class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                                        <span>$69,524</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dash-item-overlay d-none d-md-block" dir="ltr">
                                            <h5>Total Enquiries: 125</h5>
                                        </div>
                                            <div id="revenue-chart" class="apex-charts mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <h4 class="header-title text-uppercase">
                                    Project Status
                                </h4>
                                <div class="card">
                                    <div class="card-body d-flex overflow-hidden">
                                        <nav class="sidebar">
                                            <ul class="nav flex-column" id="nav_accordion">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"> Link name </a>
                                                </li>
                                                <li class="nav-item has-submenu">
                                                    <a class="nav-link" href="#"> Submenu links </a>
                                                    <ul class="submenu collapse">
                                                        <li><a class="nav-link" href="#">Submenu item 1 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 2 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 3 </a> </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item has-submenu">
                                                    <a class="nav-link" href="#"> More menus </a>
                                                    <ul class="submenu collapse">
                                                        <li><a class="nav-link" href="#">Submenu item 4 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 5 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 6 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 7 </a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"> Something </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"> Other link </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <div id="project-status-chart"></div>
                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card-->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-12 col-lg-12">
                                <h4 class="header-title text-uppercase">Total Sales</h4>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="dropdown float-end ms-2">
                                            <a href="#" class="dropdown-toggle arrow-none btn btn-light btn-xs border"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Monthly</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Quarter</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Year</a>
                                            </div>
                                        </div>
                                        <select name="" id="" class="form-select float-end w-auto">
                                            <option value="">-- Choose -- </option>
                                            <option value="" selected>1 Month</option>
                                            <option value="">1 Quarter</option>
                                            <option value="">1 Year</option>
                                            <option value="">2 Years</option>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <div id="sales-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->
                </div>

            </div>
            <!-- container -->

        </div> <!-- content -->

    </div>
@endsection

@push('custom-styles')
    <!-- third party css -->
    <link href="{{ asset('public/assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('custom-scripts')
	<script src="{{ asset('public/assets/js/vendor/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('public/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.datatable-init.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.chartjs.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.dashboard.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.apex-pie.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.apex-column.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.dashboard-analytics.js') }}"></script>



    @if (Route::is('customers-dashboard'))
        <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
        <script>
            var firebaseConfig = {
                apiKey: "AIzaSyCZ8uoPo9bfpdc51gVpB91z_X5s-hF7bL4",
                authDomain: "aec-chat-app.firebaseapp.com",
                databaseURL: "https://aec-chat-app-default-rtdb.firebaseio.com",
                projectId: "aec-chat-app",
                storageBucket: "aec-chat-app.appspot.com",
                messagingSenderId: "917789039014",
                appId: "1:917789039014:web:b65a02b06faf684aff1767",
                measurementId: "G-Q0HGWESJ9T"
            };

            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            if (Notification.permission === "granted") {

                messaging.requestPermission().then(function() {
                    return messaging.getToken()
                }).then(function(token) {
                    console.log(token);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route('save-customer-token') }}',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            console.log('Token saved successfully.');
                        },
                        error: function(err) {
                            console.log('Error =>' + err);
                        },
                    });

                }).catch(function(err) {
                    console.log('User Chat Token Error' + err);
                });
            }

            messaging.onMessage(function(payload) {
                const noteTitle = payload.notification.title;
                const noteOptions = {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                };
                new Notification(noteTitle, noteOptions);
            });
        </script>
		<script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {

                element.addEventListener('click', function(e) {

                    let nextEl = element.nextElementSibling;
                    let parentEl = element.parentElement;

                    if (nextEl) {
                        e.preventDefault();
                        let mycollapse = new bootstrap.Collapse(nextEl);

                        if (nextEl.classList.contains('show')) {
                            mycollapse.hide();
                        } else {
                            mycollapse.show();
                            // find other submenus with class=show
                            var opened_submenu = parentEl.parentElement.querySelector(
                                '.submenu.show');
                            // if it exists, then close all of them
                            if (opened_submenu) {
                                new bootstrap.Collapse(opened_submenu);
                            }
                        }
                    }
                }); // addEventListener
            }) // forEach
        });
    </script>
		<script>
        $(".has-submenu a.nav-link").click(function() {
            $(".has-submenu a.nav-link").removeClass("active");
            $(this).addClass("active");
            $(this).closest('.has-submenu').addClass("active");
        });
    </script>
        <script>
            var options = {
                series: [{
                    name: 'series1',
                    data: [31, 40, 28, 51, 42, 109, 100]
                }, {
                    name: 'series2',
                    data: [11, 32, 45, 32, 34, 52, 41]
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'datetime',
                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
                        "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                        "2018-09-19T06:30:00.000Z"
                    ]
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
            };
            var chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
            chart.render();
        </script>
        <script>
            var options = {
                series: [{
                    name: 'Project Name',
                    data: [1, 2, 3, 4, 5, 6]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 0,
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                },
                yaxis: {
                    categories: ['1', '2', '3', '4', '5', '6'],
                }
            };

            var chart = new ApexCharts(document.querySelector("#project-status-chart"), options);
            chart.render();
        </script>
        <script>
        Highcharts.chart('sales-chart', {
            chart: {
                type: 'area'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Jan 1', 'Jan 5', 'Jan 9', 'Jan 13', 'Jan 17', 'Jan 21', 'Jan 25', 'Jan 29']
            },
            yAxis: {
                title: {
                    text: 'No of Projects'
                }
            },
            plotOptions: {
                area: {
                    fillOpacity: 0.5
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                showInLegend: false,
                name: 'Total Sales',
                color: '#008ffb',
                data: [0, 30, 10, 0, 120, 50, 80, 20]
            }]
        });
    </script>
    @endif
@endpush
