@extends('layouts.admin')

@section('admin-content')
@include('flash::message') 
    <div class="content-page"  ng-app="Myapp">
        <div class="content" ng-controller="dashboardController">

            @include('admin.includes.top-bar')
  
			@if (Route::is('admin-dashboard'))
				<!-- Start Content-->
				<div class="container-fluid"> 
 
					<!-- Start Content-->
					<div>
					   <!-- start page title -->
					   <div class="row my-2">
					   		<div class="col-6"> 		
								<h4 class="page-title">Dashboard</h4>
							</div>
						   	<div class="col-6"> 		
								<input type="text" id="_date" ng-model="enquiry_summary.date" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" />
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
											<p class="count">{{$result['new_enquiries']}}</p>
											<span class="btn btn-success">
												<i class="mdi mdi-comment-plus-outline"></i>
											</span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="live-status-bg">
											<h3>Unattended Enquiries</h3>
											<p class="count">{{$result['unattended_enquiries']}}</p>
											<span class="btn btn-danger">
												<i class="mdi mdi-comment-remove-outline"></i>
											</span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="live-status-bg">
											<h3>Ready for Project</h3>
											<p class="count">{{$result['ready_for_projects']}}</p>
											<span class="btn btn-primary">
												<i class="mdi mdi-comment-check-outline"></i>
											</span>
										</div>
									</div>
									<div class="col-md-3">
										<div class="live-status-bg">
											<h3>Waiting for Customer Response</h3>
											<p class="count">{{$result['waiting_for_customer_response']}}</p>
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
												   <div class="text-success me-2"><i class="mdi mdi-arrow-up-bold fa-2x"></i> <span class="fa-2x">{{$result['new_enquiries_last_month']}}</span></div>
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
												   <div class="text-danger me-2"><i class="mdi mdi-arrow-down-bold fa-2x"></i> <span class="fa-2x">{{$result['lost_enquiries_last_month']}}</span></div>
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
							@include('admin.dashboard.table.enquiry-summary')
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
				var category = {!! json_encode($result['category'])!!}
				var count = {!! json_encode($result['category_count'])!!}
				
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
				var chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
				chart.render();
			</script> 
		@endif

	{{-- ================ ENQUIRIES CHRT ============= --}}
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
				let url = `${baseUrl}admin/dashboard?start_date=${moment(start).format('DD-MM-Y')}&end_date=${moment(end).format('DD-MM-Y')}`;
				location.href = url;
			});
		});
	</script>

	{{-- ======== Angular Controllers ========== --}}
	<script src="{{ asset("public/custom/js/ngControllers/admin/dashboard.js") }}"></script>
@endpush

