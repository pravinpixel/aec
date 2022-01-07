@extends('layouts.admin')

@section('admin-content')
   

    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

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
                                            {{-- <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a> --}}
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
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control " placeholder="Search..." id="top-search">
                                                    <span class="mdi mdi-magnify search-icon"></span>
                                                    <button class="input-group-text btn-primary" type="submit">Search</button>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                      
                                </div>
                            </div>  
                            <div id="carouselExampleControls" class="carousel slide" data-interval="false" >
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
                                                    <ul id="myDIV" class="nav nav-pills rounded nav-justified form-wizard-header mt-0 pt-0 bg-white timeline-steps">
                                                         
                                                        <li class="nav-item  Project_Info">
                                                            <a href="#!/Project_Info"   style="min-height: 40px;" class="timeline-step">
                                                                <div class="timeline-content">
                                                                    <div class="inner-circle  bg-success">
                                                                        <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                                                    </div>
                                                                </div>
                                                                <p class="h5 mt-2">Project Info</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item  admin-Technical_Estimate-wiz">
                                                            <a href="#!/Technical_Estimate" style="min-height: 40px;" class="timeline-step">
                                                                <div class="timeline-content">
                                                                    <div class="inner-circle bg-success">
                                                                        <img src="{{ asset("public/assets/icons/technical-support.png") }}" class="w-50 invert">
                                                                    </div>
                                                                </div>
                                                                <p class="h5 mt-2">Technical Estimate</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item admin-Cost_Estimate-wiz">
                                                            <a href="#!/Cost_Estimate" style="min-height: 40px;" class="timeline-step">
                                                                <div class="timeline-content">
                                                                    <div class="inner-circle  bg-success">
                                                                        <img src="{{ asset("public/assets/icons/budget.png") }}" class="w-50 invert">
                                                                    </div>
                                                                </div>
                                                                <p class="h5 mt-2">Cost Estimate</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item admin-Project_Schedule-wiz">
                                                            <a href="#!/Project_Schedule" style="min-height: 40px;" class="timeline-step">
                                                                <div class="timeline-content">
                                                                    <div class="inner-circle  bg-success">
                                                                        <img src="{{ asset("public/assets/icons/timetable.png") }}" class="w-50 invert">
                                                                    </div>                                                                        
                                                                </div>
                                                                <p class="h5 mt-2">Project Schedule</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item admin-Proposal_Sharing-wiz">
                                                            <a href="#!/Proposal_Sharing" style="min-height: 40px;" class="timeline-step">
                                                                <div class="timeline-content">
                                                                    <div class="inner-circle  bg-success">
                                                                        <img src="{{ asset("public/assets/icons/share.png") }}" class="w-50 invert">
                                                                    </div>                                                                        
                                                                </div>
                                                                <p class="h5 mt-2">Proposal Sharing</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item admin-Project_Award-wiz" >
                                                            <a href="#!/Response_status"  style="min-height: 40px;"  class="timeline-step">
                                                                <div class="timeline-content ">
                                                                    <div class="inner-circle  bg-secondary">
                                                                        <img src="{{ asset("public/assets/icons/result.png") }}" class="w-50 invert">
                                                                    </div>
                                                                </div>
                                                                <p class="h5  mt-2">Response status</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item admin-Delivery-wiz">
                                                            <a href="#!/Move_to_project" style="min-height: 40px;"  class="timeline-step">
                                                                <div class="timeline-content">
                                                                    <div class="inner-circle  bg-secondary">
                                                                        <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                                                                    </div>
                                                                </div>
                                                                <p class="h5  mts-2">Move to project</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row m-0 ">
                                                    <div class="col-xl-12 ">
                                                        <div class="row m-0">      
                                                            <div class="col">
                                                                <div class="card tilebox-one">
                                                                    <div class="card-body">
                                                                        <i class='dripicons-document dashboard-icon'></i>
                                                                        <h6 class=" text-primary mt-0">Total Invoice</h6>
                                                                        <h2 class="my-2 h4" >3</h2>
                                                                    </div> <!-- end card-body-->
                                                                </div>
                                                            </div>
                                                            <!--end card-->
                                                            
                                                            <div class="col">
                                                                <div class="card tilebox-one">
                                                                    <div class="card-body">
                                                                        <i class='uil-receipt float-end dashboard-icon'></i>
                                                                        <h6 class=" text-success mt-0">Pending Invoice</h6>
                                                                        <h2 class="my-2 h4"  >1</h2>
                                                                    </div> <!-- end card-body-->
                                                                </div>
                                                            </div>
                                                            <!--end card-->
                                                            
                                                            <div class="col">
                                                                <div class="card tilebox-one">
                                                                    <div class="card-body">
                                                                        <i class='uil-bill float-end dashboard-icon'></i>
                                                                        <h6 class=" text-warning mt-0">Total Cost</h6>
                                                                        <h2 class="my-2 h4"  >25</h2>
                                                                    </div> <!-- end card-body-->
                                                                </div>
                                                            </div>     
                                                            <div class="col">
                                                                <div class="card tilebox-one">
                                                                    <div class="card-body">
                                                                        <i class='uil-usd-square float-end dashboard-icon'></i>
                                                                        <h6 class=" text-danger mt-0">Invoiced Amount</h6>
                                                                        <h2 class="my-2 h4"  >84000</h2>
                                                                    </div> <!-- end card-body-->
                                                                </div>
                                                            </div>
                                                            <!--end card-->
                                                            
                                                            <div class="col">
                                                                <div class="card   tilebox-one">
                                                                    <div class="card-body">
                                                                        <i class='uil-briefcase float-end dashboard-icon'></i>
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
                                                                         <i class='uil-cloud-upload float-end dashboard-icon'></i>
                                                                        <h6 class=" text-secondary mt-0">No of Files Uploaded</h6>
                                                                        <h2 class="my-2 h3 text-primary" >109</h2>
                                                                    </div> <!-- end card-body-->
                                                                </div>
                                                            </div>
                                                            <!--end card-->
                                                            <div class="col-sm">
                                                                <div class="card tilebox-one">
                                                                    <div class="card-body">
                                                                         <i class='uil-file-check-alt float-end dashboard-icon'></i>
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
                                                                         <i class='uil-file-check-alt float-end dashboard-icon'></i>
                                                                        <h6 class=" text-secondary mt-0">No of Proposals</h6>
                                                                        <h2 class="my-2 h3  text-warning"  >84</h2>
                                                                    </div> <!-- end card-body-->
                                                                </div> 
                                                            </div>
                                                            <!--end card-->
                                                            <div class="col-sm">
                                                                <div class="card tilebox-one">
                                                                    <div class="card-body">
                                                                         <i class='uil-document float-end dashboard-icon'></i>
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
                                                                         <i class='uil-cloud-upload float-end dashboard-icon'></i>
                                                                        <h6 class=" text-secondary mt-0">Total No of files Uploaded</h6>
                                                                        <h2 class="my-2 h3 text-primary" >109</h2>
                                                                    </div> <!-- end card-body-->
                                                                </div>
                                                            </div>
                                                            <!--end card-->
                                                            <div class="col-sm">
                                                                <div class="card tilebox-one">
                                                                    <div class="card-body">
                                                                         <i class='uil-file-check-alt float-end dashboard-icon'></i>
                                                                        <h6 class=" text-secondary mt-0">Files Approved</h6>
                                                                        <h2 class="my-2 h3  text-info"  >84</h2>
                                                                    </div> <!-- end card-body-->
                                                                </div> 
                                                            </div>
                                                            <!--end card-->
                                                            <div class="col-sm">
                                                                <div class="card tilebox-one">
                                                                    <div class="card-body">
                                                                         <i class='uil-document float-end dashboard-icon'></i>
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
                                <a class="carousel-control-prev" style="left:-36px" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                    <span class="btn-outline-primary btn"><i class="fa fa-chevron-left  "></i></span>
                                </a>
                                <a class="carousel-control-next" style="right: -78px;" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                    <span class="btn-outline-primary btn"><i class="fa fa-chevron-right  "></i></span>
                                </a>    
                            </div>
                        </div>
                        <!-- end row --> 
                    </div>
                    <!-- container -->

				</div>

                
            </div> <!-- container -->

        </div> <!-- content -->


    </div> 

@endsection

@push('custom-styles')
 <!-- third party css -->
   <link href="{{ asset('public/assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
       
    <style>
         
        li.nav-item .timeline-step::after {
            content: "";
            position: absolute;
            top: 34%;
            right: -38px;
            border: 1px dashed;
            width: 50%; 
        }
        li.nav-item {
            position: relative;
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
            border: 3px solid white;
            transform: scale(1.1);

        }
        .timeline-content {
            display: flex;
            justify-content:center;
            align-items: center;
            flex-direction: column;
        }
        .admin-Delivery-wiz .timeline-step::after {
            visibility: hidden;
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
            font-size: 3rem !important;
        }
        #SvgjsText1885 {
            display: none !important;
        }
    </style> 
@endpush

@push('custom-scripts')
    <!-- third party js -->
    <script src="{{ asset('public/assets/js/vendor/Chart.bundle.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- third party js -->
    <!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
    <script src="{{ asset('public/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('public/assets/js/pages/demo.dashboard.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.dashboard-analytics.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.apex-column.js') }}"></script>

    <!-- end demo js-->
@endpush