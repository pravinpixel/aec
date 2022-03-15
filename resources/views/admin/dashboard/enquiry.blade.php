@extends('layouts.admin')

@section('admin-content')
@include('flash::message')

    <div class="content-page"  ng-app="Myapp">
        <div class="content" ng-controller="EnqController">

            @include('admin.includes.top-bar')
  
			@if (Route::is('admin-dashboard'))
				<!-- Start Content-->
				<div class="container-fluid"> 

					@if ($adminData->notification == 0)
						<div id="fill-info-modal" class="modal fade show" tabindex="-1" aria-labelledby="fill-info-modalLabel" style="display: block;background: #0000006b;" aria-modal="true" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content modal-filled bg-info">
									<div class="modal-header">
										<h4 class="modal-title" id="fill-info-modalLabel">Allow Notification </h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
									</div>
									<div class="modal-body">
										Do You Want Allow notifications from this sites ?
									</div>
									<form action="{{ route('admin.allow-notification') }}" method="POST" class="modal-footer">
										@csrf
										<button type="submit" class="btn btn-light">Allow</button>
									</form>
								</div>
							</div>
						</div>
					@endif
					
					<!-- Start Content-->
					<div>
					   <!-- start page title -->
					   <div class="row">
						   <div class="col-12">
							   <div class="page-title-box">
								   <div class="page-title-right">
									   <form class="d-flex">
										   <a href="javascript: void(0);" class="btn btn-primary ms-2">
											   <i class="mdi mdi-autorenew"></i>
										   </a>
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
									   <table datatable="ng" dt-options="vm.dtOptions" class="table dt-responsive nowrap custom table-striped">
										   <thead>
											   <tr>
												   <th>S.No</th>
												   <th>Enquiry No</th>
												   <th>Contact Person</th>
												   <th>Enquiry Date</th>
												   <th>Email</th>
												   <th>Mobile Number</th>
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
										   
										   <table class=" table table-centered table-nowrap table-hover mb-0">
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
			   </div> 
			@endif 
        </div> <!-- content --> 
    </div> 

@endsection 


@push('custom-scripts')
		@if (Route::is('admin-dashboard'))
			<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script> 
			{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}
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

				if(Notification.permission === "granted") {
					
					messaging.requestPermission().then(function () {
							return messaging.getToken()
					}).then(function(token) {
						console.log(token);

						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});

						$.ajax({
							url: '{{ route("save-admin-token") }}',
							type: 'POST',
							data: {
								token: token
							},
							dataType: 'JSON',
							success: function (response) {
								console.log('Token saved successfully.');
							},
							error: function (err) {
								console.log('Error =>'+ err);
							},
						});

					}).catch(function (err) {
						console.log('Error =>'+ err);
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
		@endif

	{{-- =========  MOTHLY SALES REPORTS Chart ============== --}}
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

	{{-- ================ ENQUIRIES CHRT ============= --}}
	<script>
		! function (o) {
			"use strict";
			function e() {
				this.$body = o("body"), this.charts = []
			}
			e.prototype.initCharts = function () { 
				var e = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"],
					t = o("#revenue-chart").data("colors");
					t && (e = t.split(","));
			 
				var r = {
					chart: {
						height: 200,
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
			},e.prototype.init = function () {

				o("#dash-daterange").daterangepicker({
					singleDatePicker: !0
				}), this.initCharts()

			}, o.Dashboard = new e, o.Dashboard.Constructor = e
		}(window.jQuery),
		function (t) {
			"use strict";
			t(document).ready(function (e) {
				t.Dashboard.init()
			})
		}(window.jQuery);
	</script>

	{{-- ======== Angular Controllers ========== --}}
	<script src="{{ asset("public/custom/js/ngControllers/dashboard/enquiry.js") }}"></script>
@endpush

