@extends('layouts.admin')

@section('admin-content')
@include('flash::message') 
    <div class="content-page"  ng-app="Myapp">
        <div class="content" ng-controller="EnqController">

            @include('admin.includes.top-bar')
  
			@if (Route::is('admin-dashboard'))
				<!-- Start Content-->
				<div class="container-fluid"> 
 
					<!-- Start Content-->
					<div>
					   <!-- start page title -->
					   <div class="row">
						   <div class="col-12">
							   <div class="page-title-box">
								   <div class="page-title-right d-flex">
								   		
									   <div class="dropdown float-end">
										   <a href="#" class="dropdown-toggle arrow-none btn btn-success mr-3" data-bs-toggle="dropdown" aria-expanded="false">
											   <i class="mdi mdi-calendar"></i>
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
						   <div class="col-xl-12 col-lg-12">
								<h4 class="header-title text-uppercase"><strong>Live Status</strong></h4>
								<div class="row text-center">
									<div class="col-md-3">
										<div class="live-status-bg">
											<h3>New Enquiries</h3>
											<p class="count">30</p>
											<span class="btn btn-success">
												<i class="mdi mdi-comment-plus-outline"></i>
											</span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="live-status-bg">
											<h3>Unattended Enquiries</h3>
											<p class="count">10</p>
											<span class="btn btn-danger">
												<i class="mdi mdi-comment-remove-outline"></i>
											</span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="live-status-bg">
											<h3>Ready for Project</h3>
											<p class="count">15</p>
											<span class="btn btn-primary">
												<i class="mdi mdi-comment-check-outline"></i>
											</span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="live-status-bg">
											<h3>Waiting for Customer Response</h3>
											<p class="count">5</p>
											<span class="btn btn-secondary text-white">
												<i class="mdi mdi-comment-processing-outline"></i>
											</span>
										</div>
									</div>
								</div> 
						   </div> <!-- end col -->
					   </div>
					   <!-- end row -->
						 <hr/>
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
											   <h3 class="card-heading">New Enquiries</h3>											   
												   <div class="text-success me-2"><i class="mdi mdi-arrow-up-bold fa-2x"></i> <span class="fa-2x">40</span></div>
												   <span class="text-nowrap">Since last month</span>  
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
								   <div class="col-lg-12">
									   <div class="card widget-flat">
										   <div class="card-body">
											   <div class="float-end">
												   <i class="mdi mdi-comment-remove-outline widget-icon text-danger"></i>
											   </div>
											   <h3 class="card-heading">Lost Enquiries</h3>
												   <div class="text-danger me-2"><i class="mdi mdi-arrow-down-bold fa-2x"></i> <span class="fa-2x">3</span></div>
												   <span class="text-nowrap">Since last month</span>
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
											<div id="revenue-chart" class="apex-charts mt-3" data-currentMonth="12,30,23,45" data-colors="#163269,#0acf97"></div>
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
								   <h4 class="header-title text-uppercase mt-2"><strong>Enquiries Summary​</strong></h4>
									   <div >
										   <form class="d-flex p-2 justify-content-between">
											   <div>
												   <small>Date / Month</small>
												   <input type="date" name="" id="" class="form-control">
											   </div>
											   <div>
												   <small>Type of Delivery</small>
												   <select name="" id="" class="form-select">
													   <option value="">-- Choose -- </option>
													   <option value="">Type of Delivery 1</option>
													   <option value="">Type of Delivery 2</option>
													   <option value="">Others</option>
												   </select>
											   </div>
											   <div>
												   <small>Type of Project</small>
												   <select name="" id="" class="form-select">
													   <option value="">-- Choose -- </option>
													   <option value="">New contructions</option>
													   <option value="">Old contructions</option>
													   <option value="">Others</option>
												   </select>
											   </div>
											   <div>
												   <small>Customer</small>
												   <select name="" id="" class="form-select">
													   <option value="">-- Choose -- </option>
													   <option value="">Customer 1</option>
													   <option value="">Customer 2</option>
													   <option value="">Customer 3</option>
												   </select>
											   </div>
											   <div>
												   <small>Project Name</small>
												   <select name="" id="" class="form-select">
													   <option value="">-- Choose -- </option>
													   <option value="">Project Name 1</option>
													   <option value="">Project Name 2</option>
													   <option value="">Project Name 3</option>
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
									   <table datatable="ng" dt-options="vm.dtOptions" class="table custom dt-responsive nowrap custom table-striped">
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
				   </div>
				   <!-- container --> 
			   </div> 
			@endif 
        </div> <!-- content --> 
    </div> 

@endsection 


@push('custom-scripts')
		@if (Route::is('admin-dashboard'))
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
						categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
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

