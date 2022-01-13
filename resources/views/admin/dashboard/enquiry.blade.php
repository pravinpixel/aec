@extends('layouts.admin')

@section('admin-content')
   

    <div class="content-page" ng-app="Myapp">
        <div class="content" ng-controller="EnqController">

            @include('admin.layouts.top-bar')
  
			@if (Route::is('admin-dashboard'))
				<!-- Start Content-->
				<div class="container-fluid">
               
					<!-- Start Content-->
					<div>
					   <!-- start page title -->
					   <div class="row">
						   <div class="col-12">
							   <div class="page-title-box">
								   <div class="page-title-right">
									   <form class="d-flex">
										   {{-- <div class="input-group">
											   <input type="text" class="form-control form-control-light" id="dash-daterange">
											   <span class="input-group-text bg-primary border-primary text-white">
												   <i class="mdi mdi-calendar-range font-13"></i>
											   </span>
										   </div> --}}
										   <a href="javascript: void(0);" class="btn btn-primary ms-2">
											   <i class="mdi mdi-autorenew"></i>
										   </a>
										   {{-- <a href="javascript: void(0);" class="btn btn-primary ms-1">
											   <i class="mdi mdi-filter-variant"></i>
										   </a> --}}
									   </form>
								   </div>
								   <h4 class="page-title">Dashboard</h4>
							   </div>
						   </div>
					   </div>
					   <!-- end page title -->
   
					   <div class="row">
						   <div class="col-xl-5 col-lg-6">
   
							   <div class="row">
								   <div class="col-lg-6">
									   <div class="card widget-flat">
										   <div class="card-body">
											   <div class="float-end">
												   <i class="mdi mdi-pulse widget-icon"></i>
											   </div>
											   <h5 class="text-muted fw-normal mt-0" title="Growth">New Enquiries</h5>
											   <p class="mb-0 text-muted">
												   <div class="text-success me-2"><i class="mdi mdi-arrow-up-bold fa-2x"></i> <span class="fa-2x">40</span></div>
												   <span class="text-nowrap">Since last month</span>  
											   </p>
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
								   <div class="col-lg-6">
									   <div class="card widget-flat">
										   <div class="card-body">
											   <div class="float-end">
												   <i class="mdi mdi-pulse widget-icon"></i>
											   </div>
											   <h5 class="text-muted fw-normal mt-0" title="Growth">Customer response awaiting</h5>
											   <p class="mb-0 text-muted">
												   <div class="text-danger me-2"><i class="mdi mdi-arrow-down-bold fa-2x"></i> <span class="fa-2x">3</span></div>
												   <span class="text-nowrap">Since last month</span>
											   </p>
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
								   
								   <div class="col-lg-6">
									   <div class="card widget-flat">
										   <div class="card-body">
											   <div class="float-end">
												   <i class="mdi mdi-account-multiple widget-icon"></i>
											   </div>
											   <h5 class="text-muted fw-normal mt-0" >Unattended Enquiries</h5>
											   <h3 class="mt-3 mb-3 text-primary">{{ $enquiryCount }}</h3>
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
   
								   <div class="col-lg-6">
									   <div class="card widget-flat">
										   <div class="card-body">
											   <div class="float-end">
												   <i class="mdi mdi-cart-plus widget-icon"></i>
											   </div>
											   <h5 class="text-muted fw-normal mt-0" >Active Enquiries</h5>
											   <h3 class="mt-3 mb-3 text-info">0</h3>
												
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
							   </div> <!-- end row -->
   
							   <div class="row">
								   <div class="col-lg-6">
									   <div class="card widget-flat">
										   <div class="card-body">
											   <div class="float-end">
												   <i class="mdi mdi-currency-usd widget-icon"></i>
											   </div>
											   <h5 class="text-muted fw-normal mt-0" title="Average Revenue">No of Tasks Assigned</h5>
											   <h3 class="mt-3 mb-3 text-info">0</h3>
												
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
   
								   <div class="col-lg-6">
									   <div class="card widget-flat">
										   <div class="card-body">
											   <div class="float-end">
												   <i class="mdi mdi-pulse widget-icon"></i>
											   </div>
											   <h5 class="text-muted fw-normal mt-0" title="Growth">No of Customers</h5>
											   <h3 class="mt-3 mb-3 text-primary"> {{ $customerCount }}</h3>
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
   
								   
									
							   </div> <!-- end row -->
   
						   </div> <!-- end col -->
   
						   <div class="col-xl-7 col-lg-6">
								<div class="card">
									<div class="card-body">
									 
										<h4 class="header-title mb-3">Enquiries</h4>
										<div class="chart-content-bg">
											<div class="row text-center">
												<div class="col-md-6">
													<p class="text-muted mb-0 mt-3">Current Month</p>
													<h3 class="fw-normal mb-3">
														<small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
														<span>$58,254</span>
													</h3>
												</div>
												<div class="col-md-6">
													<p class="text-muted mb-0 mt-3">Previous Month</p>
													<h3 class="fw-normal mb-3">
														<small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
														<span>$69,524</span>
													</h3>
												</div>
											</div>
										</div>

										<div class="dash-item-overlay d-none d-md-block" dir="ltr">
											<h5>Total Enquiries: 125</h5>
										</div>
										<div dir="ltr">
											<div id="revenue-chart" class="apex-charts mt-3" data-currentMonth="12,30,23,45" data-colors="#727cf5,#0acf97"></div>
										</div>
									</div> <!-- end card-body-->
								</div> <!-- end card-->
							   {{-- <div class="card card-h-100">
								   <div class="card-body">
									   <div class="dropdown float-end">
										   <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
											   <i class="mdi mdi-dots-vertical"></i>
										   </a>
										   <div class="dropdown-menu dropdown-menu-end">
											   <!-- item-->
											   <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
											   <!-- item-->
										   </div>
									   </div>
									   <h4 class="header-title mb-3">Customers wise sales count</h4>
   
									    <div dir="ltr">
										   <div id="simple-pie" class="apex-charts" data-series="10 ,{{ $customerCount }}" data-labels="New Users 10,Old users {{ $customerCount }}" data-colors="#727cf5,#6c757d,#0acf97,#fa5c7c,#e3eaef"></div>
									   </div> 
									   <div dir="ltr">
											<div id="revenue-chart" class="apex-charts mt-3" data-colors="#727cf5,#0acf97"></div>
										</div>
										   
								   </div> <!-- end card-body-->
							   </div> <!-- end card--> --}}
   
						   </div> <!-- end col -->
					   </div>
					   <!-- end row -->
   
					   <div class="row">
						   <div class="col-lg-12">
							   <div class="card shadow-sm">
								   <div class="card-header bg-light">
									   <div >
										   <form class="d-flex p-2 justify-content-between">
											   <div>
												   <small>Project From Date</small>
												   <input type="date" name="" id="" class="form-control">
											   </div>
											   <div>
												   <small>Project From Date</small>
												   <input type="date" name="" id="" class="form-control">
											   </div>
											   <div>
												   <small>Type of Project</small>
												   <select name="" id="" class="form-select">
													   <option value="">-- Choose -- </option>
													   <option value="">New contructions</option>
													   <option value="">Old contructions</option>
													   <option value="">others</option>
												   </select>
											   </div>
											   <div>
												   <small>Status</small>
												   <select name="" id="" class="form-select">
													   <option value="">-- Choose -- </option>
													   <option value="">Inprogress</option>
													   <option value="">Pending</option>
													   <option value="">Canceled</option>
												   </select>
											   </div>
											   <div>
												   <small>Search by Name | E.No</small>
												   <input type="text" name="" id="" placeholder="Type to Search .." class="form-control">
											   </div>
											   <div>
												   <small style="opacity:0">Search</small>
												   <button type="submit" class="btn btn-primary form-control"><i class="fa fa-search"></i></button>
											   </div>
										   </form> 
									   </div>
								   </div>
								   <div class="card-body ">
									   <table datatable="ng" dt-options="vm.dtOptions" class="table dt-responsive nowrap table-striped">
										   <thead>
											   <tr>
												   <th>S.No</th>
												   <th>Enquiry No</th>
												   <th>Contact Person</th>
												   <th>Enquiry Date</th>
												   <th>Email</th>
												   <th>Telephone</th>
												   <th>Actions</th>
											   </tr>
										   </thead>
										   <tbody>
												<tr ng-repeat="(index,m) in module_get">
													<td> @{{ index+1 }}</td>
													<td> @{{ m.enquiry_number }}</td>
													<td> @{{ m.contact_person }}</td>
													<td> @{{ m.enquiry_date }}</td>
													<td> @{{ m.email }}</td>
													<td>@{{ m.mobile_no }}</td>
													<td>
														<a class="btn btn-outline-primary btn-sm  rounded-pill shadow-sm" href="{{ route('view-enquiry') }}/@{{ m.customer_id }}"><i class="fa fa-edit"></i></a>
													</td>
												</tr> 
										   </tbody>
									   </table>
								   </div>
							   </div>
						   </div> <!-- end col--> 
					   </div>
					   <!-- end row -->
   
   
					   <div class="row">
						   
						   <div class="col-lg-5">
							   <div class="card">
								   <div class="card-body">
									   <div class="dropdown float-end">
										   <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
											   <i class="mdi mdi-dots-vertical"></i>
										   </a>
										   <div class="dropdown-menu dropdown-menu-end">
											   <!-- item-->
											   <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
											   <!-- item-->
											   <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
											   <!-- item-->
											   <a href="javascript:void(0);" class="dropdown-item">Action</a>
											   <!-- item-->
											   <a href="javascript:void(0);" class="dropdown-item">Settings</a>
										   </div>
									   </div>
									   <h4 class="header-title mb-3">Recent Activities</h4>
   
									   <div class="table-responsive">
										   
										   <table class="table table-centered table-nowrap table-hover mb-0">
											   <tbody>
												   @for ($i = 0; $i < 5;  $i++)
												   <tr>
													   <td>
															
														   <h5 class="mt-0 mb-1">Soren Drouin   </h5>
														   <span class="font-13">18 Jan 2019 11:28 pm</span>
																
													   </td>
													   <td>
														   <span class="text-muted font-13">Project</span> <br>
														   <p class="mb-0">New Building</p>
													   </td>
													   <td class="table-action" style="width: 50px;">
														   <div class="dropdown">
															   <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
																   <i class="mdi mdi-dots-horizontal"></i>
															   </a>
															   <div class="dropdown-menu dropdown-menu-end">
																   <!-- item-->
																   <a href="javascript:void(0);" class="dropdown-item">view</a>
																   <!-- item-->
															   </div>
														   </div>
													   </td>
												   </tr> 
												   @endfor
											   </tbody>
										   </table>
									   </div> <!-- end table-responsive-->
   
								   </div> <!-- end card body-->
							   </div>
						   </div> <!-- end col-->
   
						   <div class="col-lg-7">
							   <div class="card">
								   <div class="card-body">
									   <h4 class="header-title">Mothly Sales Reports</h4>
									   <div dir="ltr">
										   <div id="distributed-column" class="apex-charts" data-colors="#727cf5,#6c757d,#0acf97,#fa5c7c,#ffbc00,#39afd1,#e3eaef,#313a46"></div>
									   </div>
								   </div>
							   </div> <!-- end card-->
						   </div> <!-- end col-->
   
					   </div>
					   <!-- end row -->
   
				   </div>
				   <!-- container -->
				   
			   </div> <!-- container --> 
			@endif

        </div> <!-- content --> 
    </div> 

@endsection

 

@push('custom-styles')
	<link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('public/assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
       
    <style>
        .time-bar {
            width: 100% !important;
            height: 1px;
            position: absolute;
            border: 1px dashed  gray;
            top: 45px
        }
        .timeline-steps  {
            display: flex;
            justify-content:space-between;
            align-items: center;
            position: relative;
         
        }
        .timeline-step {
            padding: 10px;
            z-index: 1;
            
            border-radius: 15px;
           
            margin: 10px
        }
        .inner-circle {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px #bdbdbd;
            background: white;
            display: flex;
            justify-content:center;
            align-items: center;
            color: white;
            border: 3px solid white
        }
        .timeline-content {
            display: flex;
            justify-content:center;
            align-items: center;
            flex-direction: column;
        }
 
        .table td,th {
            padding: 5px 10px !important ;
            vertical-align: middle !important
        }
        .table thead,th {
            background: #757CF2 !important;
            color: white
        }
        
         .table tbody thead,th {
            background: #757CF2 !important
        }
        .daterangepicker .calendar-table th, .daterangepicker .calendar-table td {
            background:  white !important
        }
        .daterangepicker td.active, .daterangepicker td.active:hover {
            background: #757CF2 !important
        }
        .dashboard-icon {
            font-size: 2.5rem !important
        }
        #SvgjsText1885 {
            display: none !important;
        }
    </style>  
	<style>
		#scroll-vertical-datatable_wrapper .row:nth-child(1) {
		display: none !important
		}
		.table td,th {
				padding: 5px 10px !important     ;
				vertical-align: middle !important
			}
			.table thead,th {
				background: #757CF2 !important;
				color: white
			}
			#scroll-vertical-datatable th{
				padding:  0px !important     
			}
			.table tbody thead,th {
				background: #757CF2 !important
			}
	</style>
@endpush

@push('custom-scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.4.3/angular-datatables.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
 
	<script src="{{ asset('public/assets/js/vendor/apexcharts.min.js') }}"></script>
	<script>
		(dataColors = $("#distributed-column").data("colors")) && (colors = dataColors.split(","));
		options = {
			chart: {
				height: 380,
				type: "bar",
				toolbar: {
					show: !1
				},
				events: {
					click: function(o, a, t) {
						console.log(o, a, t)
					}
				}
			},
			colors: colors,
			plotOptions: {
				bar: {
					columnWidth: "45%",
					distributed: !0
				}
			},
			dataLabels: {
				enabled: !1
			},
			series: [{
				data: [21, 22, 10, 28, 16, 21, 13, 30]
			}],
			xaxis: {
				categories: ["John", "Joe", "Jake", "Amber", "Peter", "Mary", "David", "Lily"],
				labels: {
					style: {
						colors: colors,
						fontSize: "14px"
					}
				}
			},
			legend: {
				offsetY: 7
			},
			grid: {
				row: {
					colors: ["transparent", "transparent"],
					opacity: .2
				},
				borderColor: "#f1f3fa"
			}
		};
		(chart = new ApexCharts(document.querySelector("#distributed-column"), options)).render();
	</script>
	<script>
		! function (o) {
			"use strict";
			function e() {
				this.$body = o("body"), this.charts = []
			}
			e.prototype.initCharts = function () {
				// window.Apex = {
				// 	chart: {
				// 		parentHeightOffset: 0,
				// 		toolbar: {
				// 			show: !1
				// 		}
				// 	},
				// 	grid: {
				// 		padding: {
				// 			left: 0,
				// 			right: 0
				// 		}
				// 	},
				// 	colors: ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"]
				// };
				var e = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"],
					t = o("#revenue-chart").data("colors");
					t && (e = t.split(","));
			 
				var r = {
					chart: {
						height: 280,
						type: "line",
						dropShadow: {
							enabled: !0,
							opacity: .2,
							blur: 7,
							left: -7,
							top: 7
						}
					},
					dataLabels: {
						enabled: !1
					},
					stroke: {
						curve: "smooth",
						width: 4
					},
					series: [{
						name: "Current Month",
						data:   [10, 20, 15, 25, 20, 30, 20]
					}, {
						name: "Previous Month",
						data: [0, 15, 10, 30, 15, 35, 25]
					}],
					colors: e,
					zoom: {
						enabled: !1
					},
					legend: {
						show: !1
					},
					xaxis: {
						type: "string",
						categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
						tooltip: {
							enabled: !1
						},
						axisBorder: {
							show: !1
						}
					},
					yaxis: {
						labels: {
							formatter: function (e) {
								return e + "k"
							},
							offsetX: -15
						}
					}
				};
				new ApexCharts(document.querySelector("#revenue-chart"), r).render();



				e = ["#727cf5", "#e3eaef"];
				(t = o("#high-performing-product").data("colors")) && (e = t.split(","));
				r = {
					chart: {
						height: 257,
						type: "bar",
						stacked: !0
					},
					plotOptions: {
						bar: {
							horizontal: !1,
							columnWidth: "20%"
						}
					},
					dataLabels: {
						enabled: !1
					},
					stroke: {
						show: !0,
						width: 2,
						colors: ["transparent"]
					},
					series: [{
						name: "Actual",
						data: [65, 59, 80, 81, 56, 89, 40, 32, 65, 59, 80, 81]
					}, {
						name: "Projection",
						data: [89, 40, 32, 65, 59, 80, 81, 56, 89, 40, 65, 59]
					}],
					zoom: {
						enabled: !1
					},
					legend: {
						show: !1
					},
					colors: e,
					xaxis: {
						categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
						axisBorder: {
							show: !1
						}
					},
					yaxis: {
						labels: {
							formatter: function (e) {
								return e + "k"
							},
							offsetX: -15
						}
					},
					fill: {
						opacity: 1
					},
					tooltip: {
						y: {
							formatter: function (e) {
								return "$" + e + "k"
							}
						}
					}
				};
				new ApexCharts(document.querySelector("#high-performing-product"), r).render();
				e = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
				(t = o("#average-sales").data("colors")) && (e = t.split(","));
				r = {
					chart: {
						height: 208,
						type: "donut"
					},
					legend: {
						show: !1
					},
					stroke: {
						colors: ["transparent"]
					},
					series: [44, 55, 41, 17],
					labels: ["Direct", "Affilliate", "Sponsored", "E-mail"],
					colors: e,
					responsive: [{
						breakpoint: 480,
						options: {
							chart: {
								width: 200
							},
							legend: {
								position: "bottom"
							}
						}
					}]
				};
				new ApexCharts(document.querySelector("#average-sales"), r).render()
			},e.prototype.init = function () {
				o("#dash-daterange").daterangepicker({
					singleDatePicker: !0
				}), this.initCharts(), this.initMaps()
			}, o.Dashboard = new e, o.Dashboard.Constructor = e
		}(window.jQuery),
		function (t) {
			"use strict";
			t(document).ready(function (e) {
				t.Dashboard.init()
			})
		}(window.jQuery);
	</script>
	<script>
		 var app = angular.module('Myapp', ['datatables']).constant('API_URL', $("#baseurl").val()); 
		app.controller('EnqController', function ($scope, $http, API_URL) {
            getData = function($http, API_URL) {
                $http({
                    method: 'GET',
                    url: API_URL + "admin/api/v2/customers-enquiry"
                }).then(function (response) {
                    $scope.module_get = response.data;
                }, function (error) {
                    console.log(error);
                });
            } 
            getData($http, API_URL);
            
            $scope.fiterData = function () {
                
                var url = API_URL + "admin/api/v2/customers-enquiry" 

                var FormData = {
                    from_date   :   $scope.filter.from_date,
                    to_date     :   $scope.filter.to_date,
                    status      :   $scope.filter.status,
                    type        :   $scope.filter.type,
                    others      :   $scope.filter.others
                }
                alert( $scope.filter.from_date, 'DD/MM/YY');

                $http({
                    method: "POST",
                    url: url,
                    data: $.param(FormData),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function (response) {
                        
                    // getData($http, API_URL);
                    $scope.module_get = response.data;	

                    Message('success',response.msg);

                    }), (function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                
                }
                // getData($http, API_URL);
            // getMenuData($http, API_URL);

            $scope.checkIt = function (index , id) {

                var url = API_URL + "module" + "/status";
                // getData($http, API_URL);

                if (id) {

                    url += "admin/api/v2/customers-enquiry/" + id;
                    method = "PUT";

                    $http({
                        method: method,
                        url: url,
                        data: $.param({'is_active':0}),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function (response) {
                        
                        getData($http, API_URL);

                        Message('success',response.data.msg);

                    }), (function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });

                }
            }
 
            //show modal form
            $scope.toggle = function (modalstate, id) {
                $scope.modalstate = modalstate;
                $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create New";
                        $scope.form_color = "primary";
                        $('#right-modal-progress').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit an Update";
                        $scope.form_color = "success";
                        $scope.id = id;
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + id )

                            .then(function (response) {
                                
                                $scope.enqData = response.data;

                                console.log( $scope.enqData);

                                $('#right-modal-progress').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }
        
            //save new record and update existing record
            $scope.save = function (modalstate, id) {
                
                var url = API_URL + "module";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    method = "PUT";

                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function (response) {
                            
                        getData($http, API_URL);

                            $('#right-modal-progress').modal('hide');

                            Message('success',response.data.msg);

                    }), (function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });

                }else {

                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function (response) {
                            
                        getData($http, API_URL);

                        //location.reload();

                        $('#right-modal-progress').modal('hide');


                        Message('success', response.data.msg);

                    }), (function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }
                
            }
         
        }); 
	</script>
@endpush
 