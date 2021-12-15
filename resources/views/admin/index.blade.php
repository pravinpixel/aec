@extends('layouts.admin')

@section('admin-content')
   

    <div class="content-page">
        <div class="content">

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
										   <div class="input-group">
											   <input type="text" class="form-control form-control-light" id="dash-daterange">
											   <span class="input-group-text bg-primary border-primary text-white">
												   <i class="mdi mdi-calendar-range font-13"></i>
											   </span>
										   </div>
										   <a href="javascript: void(0);" class="btn btn-primary ms-2">
											   <i class="mdi mdi-autorenew"></i>
										   </a>
										   <a href="javascript: void(0);" class="btn btn-primary ms-1">
											   <i class="mdi mdi-filter-variant"></i>
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
											   <h5 class="text-muted fw-normal mt-0" title="Growth">WON Opportunities</h5>
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
											   <h5 class="text-muted fw-normal mt-0" title="Growth">Lost Opportunities</h5>
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
											   <h5 class="text-muted fw-normal mt-0"  >No of Enquiries</h5>
											   <h3 class="mt-3 mb-3 text-primary">36,254</h3>
												
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
   
								   <div class="col-lg-6">
									   <div class="card widget-flat">
										   <div class="card-body">
											   <div class="float-end">
												   <i class="mdi mdi-cart-plus widget-icon"></i>
											   </div>
											   <h5 class="text-muted fw-normal mt-0"  >No of Projects</h5>
											   <h3 class="mt-3 mb-3 text-info">5,543</h3>
												
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
											   <h3 class="mt-3 mb-3 text-info">6,254</h3>
												
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
											   <h3 class="mt-3 mb-3 text-primary"> 30,2584</h3>
										   </div> <!-- end card-body-->
									   </div> <!-- end card-->
								   </div> <!-- end col-->
   
								   
									
							   </div> <!-- end row -->
   
						   </div> <!-- end col -->
   
						   <div class="col-xl-7 col-lg-6">
							   <div class="card card-h-100">
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
										   <div id="simple-pie" class="apex-charts" data-series="20,80" data-labels="New Users,Old users" data-colors="#727cf5,#6c757d,#0acf97,#fa5c7c,#e3eaef"></div>
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
												   <select name="" id="" class="form-control">
													   <option value="">Select Options</option>
													   <option value="">Select Options</option>
													   <option value="">Select Options</option>
													   <option value="">Select Options</option>
												   </select>
											   </div>
											   <div>
												   <small>Status</small>
												   <select name="" id="" class="form-control">
													   <option value="">Select Options</option>
													   <option value="">Select Options</option>
													   <option value="">Select Options</option>
													   <option value="">Select Options</option>
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
									   <table id="scroll-vertical-datatable" class="table dt-responsive nowrap ">
										   <thead class="">
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
											   @for ($i = 0; $i < 35;  $i++)
												   <tr>
													   <td>{{ $i+1 }}</td>
													   <td>ENQ0{{ $i+1 }}</td>
													   <td>Nishanth_{{ $i+1 }}</td>
													   <td>10-12-2022</td>
													   <td>abcd@gmail.com</td>
													   <td>73328254164</td>
													   <td>
														   <div class="dropdown">
															   <button type="button"  class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																   <i class="dripicons-dots-3 "></i>
															   </button>
															   
															   <div class="dropdown-menu dropdown-menu-end">
																   <a class="dropdown-item" href="#">View</a>
																   <a class="dropdown-item" href="#">Estimate</a>
															   </div>
														   </div>
													   </td>
												   </tr> 
												   
											   @endfor
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
									   <h4 class="header-title">Range Column Chart</h4>
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
			@if (Route::is('admin-project-dashboard'))
				   <!-- Start Content-->
				   <div class="container-fluid ">
 
					<div class="content container-fluid">
						 <!-- start page title -->
						 <div class="row">
							<div class="col-12">
								<div class="page-title-box">
									<div class="page-title-right">
										<form class="d-flex">
											<div class="input-group">
												<input type="text" class="form-control form-control-light" id="dash-daterange">
												<span class="input-group-text bg-primary border-primary text-white">
													<i class="mdi mdi-calendar-range font-13"></i>
												</span>
											</div>
											<a href="javascript: void(0);" class="btn btn-primary ms-2">
												<i class="mdi mdi-autorenew"></i>
											</a>
										</form>
									</div>
									<h4 class="page-title">Project Summary</h4>
								</div>
							</div>
						</div>
						<!-- end page title -->
						<div class="main">   
							<div class="row ">
								<div class="col-xl-12  ">
									<div class="row m-0">
										<div class="card col-sm shadow tilebox-one">
											<div class="card-body">
												<i class='uil-layer-group float-end  dashboard-icon'></i>
												<h6 class=" text-primary mt-0 ">Total</h6>
												<h2 class="my-2 h4">109</h2>
											</div> <!-- end card-body-->
										</div>
										<!--end card-->
		
										<div class="card col-sm tilebox-one">
											<div class="card-body">
												<i class='uil-presentation-check float-end  dashboard-icon'></i>
												<h6 class=" text-success mt-0">Completed</h6>
												<h2 class="my-2 h4">84</h2>
											</div> <!-- end card-body-->
										</div>
										<!--end card-->
		
										<div class="card col-sm tilebox-one">
											<div class="card-body">
												<i class='uil-chart-growth-alt float-end  dashboard-icon'></i>
												<h6 class=" text-warning mt-0">Inprogress</h6>
												<h2 class="my-2 h4">25</h2>
											</div> <!-- end card-body-->
										</div>
										<div class="card col-sm tilebox-one">
											<div class="card-body">
												<i class='uil-usd-circle float-end  dashboard-icon'></i>
												<h6 class=" text-danger mt-0">Total Cost</h6>
												<h2 class="my-2 h4">840000</h2>
											</div> <!-- end card-body-->
										</div>
										<!--end card-->
		
										<div class="card col-sm tilebox-one">
											<div class="card-body">
												<i class='uil-bill float-end  dashboard-icon'></i>
												<h6 class=" text-info mt-0">Invoiced Amount</h6>
												<h2 class="my-2 h4"  >252510</h2>
											</div> <!-- end card-body-->
										</div>
									</div>
									<!--end card-->
								</div> <!-- end col -->
	 
							</div>
	 
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-body">
											<a href="" class="p-0 float-end">Export <i class="mdi mdi-download ms-1"></i></a>
											<h4 class="header-title mt-1 mb-3">Awarded Projects</h4>
	
											<div class="table-responsive table-m">
												<table class="table table-sm table-centered mb-0 font-14">
													<thead class="table-light">
														<tr>
															<th>S:NO</th>
															<th>Project Name</th>
															<th>Enquiry date</th>
															<th>Project Name</th>
															<th>Project Status</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>XXX</td>
															<td>09/09/2021</td>
															<td>XXXXX</td>
															<td><span class="badge badge-outline-success rounded-pill">Completed</span></td>
														</tr>
														<tr>
															<td>2</td>
															<td>ENQ0022</td>
															<td>09/09/2021</td>
															<td>XXXXX</td>
															<td><span class="badge badge-outline-primary rounded-pill">In Progress</span></td>
														</tr>
														<tr>
															<td>3</td>
															<td>ENQ0023</td>
															<td>09/09/2021</td>
															<td>XXXXX</td>
															<td><span class="badge badge-outline-warning rounded-pill">Hold</span></td>
														</tr>
													</tbody>
												</table>
											</div> <!-- end table-responsive-->
										</div> <!-- end card-body-->
									</div> <!-- end card-->
								</div> <!-- end col--> 
								<div class="card-header pt-4 border-0">
									<div class="app-search row m-0 dropdown justify-content-center">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-10">
													<div class="input-group">
														<input type="text" class="form-control " placeholder="Search..." id="top-search">
														<span class="mdi mdi-magnify search-icon"></span>
														<button class="input-group-text btn-primary" type="submit">Search</button>
													</div>
												</div>
												<div class="col-md-2">
													<div class="btn-group">
														<a class="btn btn-outline-primary" href="#carouselExampleControls" role="button" data-bs-slide="prev">
															<span><i class="fa fa-chevron-left"></i></span>
														</a>
														<a class="btn btn-outline-primary" href="#carouselExampleControls" role="button" data-bs-slide="next">
															<span ><i class="fa fa-chevron-right"></i></span>
														</a>
													</div>
												</div>
											</div>
										</div> 
										 
										 
									</div>
								</div>
								
	
								<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner" role="listbox">
										<div class="carousel-item active">
											<div class="card">
											   
												<div class="card-body">
													<div class="container"> 
														<div class="p-3 d-flex justify-content-between">
															<div>
																<h3>Project Name : <b>XXX</b></h3>
																
															</div>
															<div class="float-end">
																<b class="badge bg-primary p-2 " style="font-size: 12px">Status : Inprogress</b>
															</div>
														</div>     
														<div class="row card m-0">
															<div class="col" style="overflow: auto">
																<div class="timeline-steps " data-aos="fade-up">
																	<div class="time-bar"></div>
																	<div class="timeline-step">
																		<div class="timeline-content" >
																			<div class="inner-circle  bg-success">
																				<i class="fa fa-address-book "></i>
																			</div>
																		</div>
																		<p class="h5 mt-2">Enquiry</p>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content" >
																			<div class="inner-circle  bg-success">
																				<i class="fa fa-building "></i>
																			</div>
																		</div>
																		<p class="h5 mt-2">Project Info</p>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content">
																			<div class="inner-circle bg-success">
																				<i class="fa fa-briefcase "></i>
																			</div>
																		</div>
																		<p class="h5 mt-2">Technical Estimate</p>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content"  >
																			<div class="inner-circle  bg-success">
																				<i class="fa fa-money"></i>
																			</div>
																		</div>
																		<p class="h5 mt-2">Cost Estimate</p>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content"  >
																			<div class="inner-circle  bg-primary">
																				<i class="fa fa-share-alt "></i>
																			</div>                                                                        
																		</div>
																		<p class="h5 mt-2">Proposal Sharing</p>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content "  >
																			<div class="inner-circle  bg-secondary">
																				<i class="fa fa-trophy "></i>
																			</div>
																		</div>
																		<p class="h5  mt-2">Project Award</p>
																	</div>
																	<div class="timeline-step mb-0">
																		<div class="timeline-content">
																			<div class="inner-circle bg-secondary">
																				<i class="fa  fa-truck "></i>
																			</div>
																		</div>
																		<p class="h5  mts-2">Delivery</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="card-body pt-0">
													<div class="row m-0 ">
														<div class="col-xl-12 ">
															<div class="row m-0">      
																<div class="col">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			<i class='dripicons-document'></i>
																			<h6 class=" text-primary mt-0">Total Invoice</h6>
																			<h2 class="my-2 h4" >3</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
																<!--end card-->
																
																<div class="col">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			<i class='uil-receipt float-end'></i>
																			<h6 class=" text-success mt-0">Pending Invoice</h6>
																			<h2 class="my-2 h4"  >1</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
																<!--end card-->
																
																<div class="col">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			<i class='uil-bill float-end'></i>
																			<h6 class=" text-warning mt-0">Total Cost</h6>
																			<h2 class="my-2 h4"  >25</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>     
																<div class="col">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			<i class='uil-usd-square float-end'></i>
																			<h6 class=" text-danger mt-0">Invoiced Amount</h6>
																			<h2 class="my-2 h4"  >84000</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
																<!--end card-->
																
																<div class="col">
																	<div class="card   tilebox-one">
																		<div class="card-body">
																			<i class='uil-briefcase float-end'></i>
																			<h6 class=" text-info mt-0">To be paid</h6>
																			<h2 class="my-2 h4"  >25</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
															</div>
															<!--end card-->
														</div> <!-- end col --> 
													</div>
													<div class="row">
														
														<div class="col-md-12">
															<div class="row m-0">
																<div class="col-sm">
																	<div class="card shadow tilebox-one">
																		<div class="card-body">
																			 <i class='uil-cloud-upload float-end fa-2x'></i>
																			<h6 class=" text-secondary mt-0">No of Files Uploaded</h6>
																			<h2 class="my-2 h3 text-primary" >109</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
																<!--end card-->
																<div class="col-sm">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			 <i class='uil-file-check-alt float-end fa-2x'></i>
																			<h6 class=" text-secondary mt-0">Files Approved</h6>
																			<h2 class="my-2 h3  text-info"  >84</h2>
																		</div> <!-- end card-body-->
																	</div> 
																</div>
																<!--end card-->
																<!--end card-->
																<div class="col-sm">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			 <i class='uil-file-check-alt float-end fa-2x'></i>
																			<h6 class=" text-secondary mt-0">No of Proposals</h6>
																			<h2 class="my-2 h3  text-warning"  >84</h2>
																		</div> <!-- end card-body-->
																	</div> 
																</div>
																<!--end card-->
																<div class="col-sm">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			 <i class='uil-document float-end fa-2x'></i>
																			<h6 class=" text-secondary mt-0">Pending Files</h6>
																			<h2 class="my-2 h3  text-success"  >25</h2>
																		</div> <!-- end card-body-->
																	</div> 
																</div> 
															</div>
															<div class="">
																<div class="card">
																	<div class="card-body">
																		<div class="dropdown float-end">
																			<a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
																				<i class="mdi mdi-dots-vertical"></i>
																			</a>
																			<div class="dropdown-menu dropdown-menu-end">
																				<!-- item-->
																				<a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
																				<!-- item-->
																				<a href="javascript:void(0);" class="dropdown-item">Export Report</a>
																				<!-- item-->
																				<a href="javascript:void(0);" class="dropdown-item">Profit</a>
																				<!-- item-->
																				<a href="javascript:void(0);" class="dropdown-item">Action</a>
																			</div>
																		</div>
																	  
																		<div class="row">
																			<div class="col-md-6 shadow py-4">
																				<h4 class="header-title text-center">Project Status</h4>
																				<div id="average-sales" class="apex-charts mb-4 mt-4"data-colors="#727cf5,#0acf97,#fa5c7c,#ffbc00"></div>
																			</div>
																			<div class="col-md-6">
																				<div class="chart-widget-list mt-md-5 p-md-4">
																					<p>
																						<i class="mdi mdi-square text-primary"></i> Inprogress
																						<span class="float-end">30%</span>
																					</p>
																					<p>
																						<i class="mdi mdi-square text-danger"></i> Hold
																						<span class="float-end">40%</span>
																					</p>
																					<p>
																						<i class="mdi mdi-square text-success"></i> Completed
																						<span class="float-end">30%</span>
																					</p>
																					<p class="mb-0">
																						<i class="mdi mdi-square text-warning"></i> Onschedule
																						<span class="float-end">10%</span>
																					</p>
																				</div>
																			</div>                                                            
																		</div>
																	</div> <!-- end card-body-->
																</div> <!-- end card-->
															</div>
														</div>
													</div>
												   
													<div class="row">
														<div class="col-md-4">
															<div class="card card-h-100">
																<div class="card-body">
																	<div class="dropdown float-end">
																		<a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="mdi mdi-dots-vertical"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-end">
																			<!-- item-->
																			<a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
																			<!-- item-->
																			<a href="javascript:void(0);" class="dropdown-item">Export Report</a>
																			<!-- item-->
																			<a href="javascript:void(0);" class="dropdown-item">Profit</a>
																			<!-- item-->
																			<a href="javascript:void(0);" class="dropdown-item">Action</a>
																		</div>
																	</div>
																	<h4 class="header-title  ">Invoice Plan
																	</h4>
																	
																	<div dir="ltr">
																		<div id="datalabels-column" class="apex-charts" data-colors="#727cf5"></div>
																	</div>
																		
																</div> <!-- end card-body-->
															</div> <!-- end card-->
														</div>
														<div class="col-md-8">
															 <!-- end row -->
															<div class="card">
																
																<div class="card-body">
																	<h3  class="header-title mb-2">Project Milestone <b class="text-success float-end">78% Completed</b></h3>
	
																	<table class="table m-0">
																		
																		<tbody>
																			<tr>
																				<td>GA Drawing</td>
																				<td width="75%">
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10"   aria-valuemin="25" aria-valuemax="100">25%</div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>Connection Details</td>
																				<td>
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>Framing </td>
																				<td>
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">40%</div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>CNC Data </td>
																				<td>
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">50%</div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>Fab Drawing</td>
																				<td>
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
																					</div>
																				</td>
																			</tr> 
																		</tbody>
																	</table> 
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="carousel-item  ">
											<div class="card">
											   
												<div class="card-body">
													<div class="container"> 
														<div class="p-3 d-flex justify-content-between">
															<div>
																<h3>Project Name : <b>XXX</b></h3>
																
															</div>
															<div class="float-end">
																<b class="badge bg-primary p-2 " style="font-size: 12px">Status : Inprogress</b>
															</div>
														</div>     
														<div class="row card m-0">
															<div class="col" style="overflow: auto">
																<div class="timeline-steps " data-aos="fade-up">
																	<div class="time-bar"></div>
																	<div class="timeline-step">
																		<div class="timeline-content" >
																			<div class="inner-circle  bg-success">
																				<i class="fa fa-address-book "></i>
																			</div>
																			<p class="h5">Enquiry</p>
																		</div>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content" >
																			<div class="inner-circle  bg-success">
																				<i class="fa fa-building "></i>
																			</div>
																			<p class="h5">Project Info</p>
																		</div>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content">
																			<div class="inner-circle bg-success">
																				<i class="fa fa-briefcase "></i>
																			</div>
																			<p class="h5">Technical Estimate</p>
																		</div>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content"  >
																			<div class="inner-circle  bg-success">
																				<i class="fa fa-money"></i>
																			</div>
																			<p class="h5">Cost Estimate</p>
																		</div>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content"  >
																			<div class="inner-circle  bg-primary">
																				<i class="fa fa-share-alt "></i>
																			</div>
																			<p class="h5">Proposal Sharing</p>
																		</div>
																	</div>
																	<div class="timeline-step">
																		<div class="timeline-content "  >
																			<div class="inner-circle  bg-secondary">
																				<i class="fa fa-trophy "></i>
				
																			</div>
																			<p class="h5 ">Project Award</p>
																		</div>
																	</div>
																	<div class="timeline-step mb-0 ">
																		<div class="timeline-content" >
																			<div class="inner-circle bg-secondary">
																				<i class="fa  fa-truck "></i>
																			</div>
																			<p class="h5 ">Delivery</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="card-body pt-0">
													<div class="row m-0 ">
														<div class="col-xl-12 ">
															<div class="row m-0">      
																<div class="col">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			<i class='dripicons-document'></i>
																			<h6 class=" text-primary mt-0">Total Invoice</h6>
																			<h2 class="my-2 h4" >3</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
																<!--end card-->
																
																<div class="col">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			<i class='uil-receipt float-end'></i>
																			<h6 class=" text-success mt-0">Pending Invoice</h6>
																			<h2 class="my-2 h4"  >1</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
																<!--end card-->
																
																<div class="col">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			<i class='uil-bill float-end'></i>
																			<h6 class=" text-warning mt-0">Total Cost</h6>
																			<h2 class="my-2 h4"  >25</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>     
																<div class="col">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			<i class='uil-usd-square float-end'></i>
																			<h6 class=" text-danger mt-0">Invoiced Amount</h6>
																			<h2 class="my-2 h4"  >84000</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
																<!--end card-->
																
																<div class="col">
																	<div class="card   tilebox-one">
																		<div class="card-body">
																			<i class='uil-briefcase float-end'></i>
																			<h6 class=" text-info mt-0">To be paid</h6>
																			<h2 class="my-2 h4"  >25</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
															</div>
															<!--end card-->
														</div> <!-- end col --> 
													</div>
													<div class="row">
														
														<div class="col-md-12">
															<div class="row m-0">
																<div class="col-sm">
																	<div class="card shadow tilebox-one">
																		<div class="card-body">
																			 <i class='uil-cloud-upload float-end fa-2x'></i>
																			<h6 class=" text-secondary mt-0">Total No of files Uploaded</h6>
																			<h2 class="my-2 h3 text-primary" >109</h2>
																		</div> <!-- end card-body-->
																	</div>
																</div>
																<!--end card-->
																<div class="col-sm">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			 <i class='uil-file-check-alt float-end fa-2x'></i>
																			<h6 class=" text-secondary mt-0">Files Approved</h6>
																			<h2 class="my-2 h3  text-info"  >84</h2>
																		</div> <!-- end card-body-->
																	</div> 
																</div>
																<!--end card-->
																<div class="col-sm">
																	<div class="card tilebox-one">
																		<div class="card-body">
																			 <i class='uil-document float-end fa-2x'></i>
																			<h6 class=" text-secondary mt-0">Pending Files</h6>
																			<h2 class="my-2 h3  text-success"  >25</h2>
																		</div> <!-- end card-body-->
																	</div> 
																</div> 
															</div>
															<div class="">
																<div class="card">
																	<div class="card-body">
																		<div class="dropdown float-end">
																			<a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
																				<i class="mdi mdi-dots-vertical"></i>
																			</a>
																			<div class="dropdown-menu dropdown-menu-end">
																				<!-- item-->
																				<a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
																				<!-- item-->
																				<a href="javascript:void(0);" class="dropdown-item">Export Report</a>
																				<!-- item-->
																				<a href="javascript:void(0);" class="dropdown-item">Profit</a>
																				<!-- item-->
																				<a href="javascript:void(0);" class="dropdown-item">Action</a>
																			</div>
																		</div>
																	  
																		<div class="row">
																			<div class="col-md-6 shadow py-4">
																				<h4 class="header-title text-center">Project Status</h4>
																				<div id="average-sales" class="apex-charts mb-4 mt-4"data-colors="#727cf5,#0acf97,#fa5c7c,#ffbc00"></div>
																			</div>
																			<div class="col-md-6">
																				<div class="chart-widget-list mt-md-5 p-md-4">
																					<p>
																						<i class="mdi mdi-square text-primary"></i> Inprogress
																						<span class="float-end">30%</span>
																					</p>
																					<p>
																						<i class="mdi mdi-square text-danger"></i> Hold
																						<span class="float-end">40%</span>
																					</p>
																					<p>
																						<i class="mdi mdi-square text-success"></i> Completed
																						<span class="float-end">30%</span>
																					</p>
																					<p class="mb-0">
																						<i class="mdi mdi-square text-warning"></i> Onschedule
																						<span class="float-end">10%</span>
																					</p>
																				</div>
																			</div>                                                            
																		</div>
																	</div> <!-- end card-body-->
																</div> <!-- end card-->
															</div>
														</div>
													</div>
												   
													<div class="row">
														<div class="col-md-4">
															<div class="card card-h-100">
																<div class="card-body">
																	<div class="dropdown float-end">
																		<a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="mdi mdi-dots-vertical"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-end">
																			<!-- item-->
																			<a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
																			<!-- item-->
																			<a href="javascript:void(0);" class="dropdown-item">Export Report</a>
																			<!-- item-->
																			<a href="javascript:void(0);" class="dropdown-item">Profit</a>
																			<!-- item-->
																			<a href="javascript:void(0);" class="dropdown-item">Action</a>
																		</div>
																	</div>
																	<h4 class="header-title  ">Invoice Plan
																	</h4>
																	
																	<div dir="ltr">
																		<div id="datalabels-column" class="apex-charts" data-colors="#727cf5"></div>
																	</div>
																		
																</div> <!-- end card-body-->
															</div> <!-- end card-->
														</div>
														<div class="col-md-8">
															 <!-- end row -->
															<div class="card">
																
																<div class="card-body">
																	<h3  class="header-title mb-2">Project Milestone <b class="text-success float-end">78% Completed</b></h3>
																	<table class="table m-0">
																		
																		<tbody>
																			<tr>
																				<td>GA Drawing</td>
																				<td width="75%">
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10"   aria-valuemin="25" aria-valuemax="100">25%</div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>Connection Details</td>
																				<td>
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>Framing </td>
																				<td>
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">40%</div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>CNC Data </td>
																				<td>
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">50%</div>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>Fab Drawing</td>
																				<td>
																					<div class="progress">
																						<div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
																					</div>
																				</td>
																			</tr> 
																		</tbody>
																	</table> 
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div> 
									<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</a>    
								</div>
							</div>
							<!-- end row --> 
						</div>
						<!-- container -->
	
					</div>
	
					
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
            /* align-items: center; */
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
	 
@endpush
 