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
                        <div class="row my-2">
					   		<div class="col-6"> 		
								<h4 class="page-title">Dashboard</h4>
							</div>
						   	<div class="col-6"> 		
								<input type="text" id="_date" ng-model="enquiry_summary.date" class="form-control" name="daterange"/>
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
                                                <div class="text-success me-2"><span class="fa-2x">{{$completedProject}}</span></div>
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
                                <h4 class="header-title text-uppercase">Enquiries</h4>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-content-bg">
                                            <div class="row text-center">
                                                <div class="col-md-6">
                                                    <p class="text-muted mb-0 mt-3">Current Month</p>
                                                    <h3 class="fw-normal mb-3">
                                                        <small
                                                            class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                                                        <span>${{$current_month_amount}}</span>
                                                    </h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-muted mb-0 mt-3">Previous Month</p>
                                                    <h3 class="fw-normal mb-3">
                                                        <small
                                                            class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                                        <span>${{$previous_month_amount}}</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dash-item-overlay d-none d-md-block" dir="ltr">
                                            <h5>Total Enquiries: {{$total_enquiry}}</h5>
                                        </div>
                                        <div dir="ltr">
											<div id="revenue-chart-total-enquiry" class="mt-3" data-currentMonth="12,30,23,45" data-colors="#163269,#0acf97"></div>
										</div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                    

                            <div class="col-xl-12 col-lg-12">
                                <h4 class="header-title text-uppercase">Total Projects</h4>
                                <div class="card">
                                    <div class="card-body">
                                        <div id="customer-sales-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->


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


    <script>
                var category = {!! json_encode($category)!!}
				var count = {!! json_encode($category_count)!!}
				
				var options = {
					floating: false,
					series: [{
						name: 'Enquiries',
						data: count
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
					yaxis: [
						{
							labels: {
								formatter: function(val) {
									return val.toFixed(0);
								}
							}
						}
					],
					xaxis: {
						type: 'date',
						categories: category
					},
					tooltip: {
						x: {
							format: 'dd/MM/yy'
						},

					},
				};
				var chart = new ApexCharts(document.querySelector("#revenue-chart-total-enquiry"), options);
				chart.render();
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
        var sale_categories = {!! json_encode($total_category) !!}
		var sale_data = {!! json_encode($total_category_count) !!}
        Highcharts.chart('customer-sales-chart', {
            chart: {
                type: 'area'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: sale_categories
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
                name: 'Total Project',
                color: '#008ffb',
                data: sale_data
            }]
        });
    </script>
    <script> 
		$(function() {
			let date =  {!! json_encode($date) !!};
			let baseUrl = $("#baseurl").val();
			$('input[name="daterange"]').daterangepicker({
				opens: 'left',
				timePicker: true,
				startDate: date.start_date,
				endDate: date.end_date,
				locale: {
					format: 'DD-MM-Y'
				},
				ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'This Quarter': [moment().quarter(moment().quarter()).startOf('quarter'),moment().quarter(moment().quarter()).endOf('quarter') ],
				'This Year':[moment().startOf('year'), moment().endOf('year')]
				}
			}, function(start, end, label) {
				let url = `${baseUrl}customers/dashboard?start_date=${moment(start).format('DD-MM-Y')}&end_date=${moment(end).format('DD-MM-Y')}`;
				location.href = url;
			});
		});
	</script>
@endpush
