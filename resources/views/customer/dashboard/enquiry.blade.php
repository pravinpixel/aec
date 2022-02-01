@extends('layouts.customer')

@section('customer-content')
   

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
                                <div class="page-title-right">
                                    <form class="d-flex">
                                        
                                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                            <i class="mdi mdi-autorenew"></i>
                                        </a>
                                    </form>
                                </div>
                                <h4 class="page-title">Enquiry Summary</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
					<div class="main">   
                        <div class="row">
                            <div class="col-xl-12  ">
                                <div class="row m-0">
                                    <div class="col-sm-3 tilebox-one">
                                        <div class="card card-body">
                                            <i class='fa-thumbs-up fa  float-end  dashboard-icon'></i>
                                            <h6 class=" text-info mt-0">Total enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totaEnq }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>

                                    <div class="col-sm-3 tilebox-one">
                                        <div class="card card-body">
                                            <i class='fa fa-bullhorn float-end  dashboard-icon'></i>
                                            <h6 class=" text-primary mt-0 ">New enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totaNewEnq }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>
                                    <!--end card-->
    
                                    <div class="col-sm-3 tilebox-one">
                                        <div class="card card-body">
                                            <i class='fa-thumbs-up fa  float-end  dashboard-icon'></i>
                                            <h6 class=" text-success mt-0">Active enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totaActiveEnq }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>
                                    <!--end card--> 

                                    <div class="col-sm-3 tilebox-one">
                                        <div class="card card-body">
                                            <i class='fa-thumbs-up fa  float-end  dashboard-icon'></i>
                                            <h6 class=" text-danger mt-0">Closed enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totaActiveEnq }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>
                                    <!--end card--> 
                                </div>
                                <!--end card-->
                            </div> <!-- end col -->
 
                        </div>
                        <div class="summary-group py-3 accordion rounded-0" id="summaryGroup">
                            {{-- New enquiries --}}
                                <fieldset class="accordion-item">
                                    <div class="accordion-header custom m-0 position-relative" id="ProjectInfo_header">
                                        <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#ProjectInfo" aria-expanded="true" aria-controls="ProjectInfo">
                                            New enquiries
                                        </div>
                                        <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                            <i data-bs-toggle="collapse" 
                                                href="#ProjectInfo" 
                                                aria-expanded="false" 
                                                aria-controls="ProjectInfo" 
                                                class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                                            </i>
                                        </div>
                                    </div>
                                    <div id="ProjectInfo" class="accordion-collapse collapse show" aria-labelledby="ProjectInfo_header" data-bs-parent="#summaryGroup">
                                        <div class="accordion-body">  
                                            <div class="cardw"> 
                                                <div class="card-bodyw">  
                                                    @if (!$data->isEmpty())
                                                        <table id="scroll-vertical-datatable" class="table custom custom-table dt-responsive nowrap table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Enquiry No</th>
                                                                    <th>Type of Project</th>
                                                                    <th>No. Of Property</th>
                                                                    <th>Enquiry Date</th>
                                                                    <th>Pipeline</th>
                                                                    <th>Status</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                        
                                                            <tbody>
                                                                @foreach ($data as $key => $row)
                                                                    <tr>
                                                                        <td>{{ $key +1 }}</td>
                                                                        <td><b>{{ $row->enquiry_number }}</b></td>
                                                                        <td>Construction</td>
                                                                        <td>{{ $row->no_of_building }}</td>
                                                                        <td>{{ $row->enquiry_date }}</td> 
                                                                        <td>
                                                                            <div class="btn-group" data-bs-toggle="modal" data-bs-target="#right-modal-progress">
                                                                                <button class="btn progress-btn active"></button>
                                                                                <button class="btn progress-btn"></button>
                                                                                <button class="btn progress-btn"></button>
                                                                                <button class="btn progress-btn"></button>
                                                                            </div>
                                                                        </td>
                                                                        <td>	
                                                                            <span class="badge bg-warning shadow-sm rounded-pill">In - Completed</span>
                                                                        </td>
                                                                        <td>                                            
                                                                            <div class="dropdown">
                                                                                <button type="button" class="btn btn-sm btn-light border shadow-sm rounded-pill shadow-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <a class="dropdown-item" href="{{ route("customers.edit",$row->id) }}">View </a>
                                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @else
                                                        <div class="text-center">
                                                            <small>No new enquiries !</small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>
                                </fieldset>
                            {{-- New enquiries --}}
                    
                            {{-- Active enquiries --}}
                                <fieldset class="accordion-item">
                                    <div class="accordion-header custom m-0 position-relative" id="selected_service_header">
                                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#selected_service" aria-expanded="false" aria-controls="selected_service">
                                            Active enquiries
                                        </div>
                                        <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                                            <i data-bs-toggle="collapse" 
                                                href="#selected_service" 
                                                aria-expanded="true" 
                                                aria-controls="selected_service" 
                                                class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                                                >
                                            </i>
                                        </div>
                                    </div>
                                    <div id="selected_service" class="accordion-collapse collapse" aria-labelledby="selected_service_header" data-bs-parent="#summaryGroup">
                                        <div class="accordion-body">  
                                            <div class="cardw"> 
                                                <div class="card-bodyw"> 
                                                    @if (!$data->isEmpty())
                                                        <table id="scroll-vertical-datatable" class="table custom custom-table dt-responsive nowrap table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Enquiry No</th>
                                                                    <th>Type of Project</th>
                                                                    <th>No. Of Property</th>
                                                                    <th>Enquiry Date</th>
                                                                    <th>Pipeline</th>
                                                                    <th>Status</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                        
                                                            <tbody>
                                                                @foreach ($data as $key => $row)
                                                                    <tr>
                                                                        <td>{{ $key +1 }}</td>
                                                                        <td>{{ $row->enquiry_number }}</td>
                                                                        <td>Construction</td>
                                                                        <td>1</td>
                                                                        <td>{{ $row->enquiry_date }}</td>
                                                                        <td>
                                                                            <div class="btn-group" data-bs-toggle="modal" data-bs-target="#right-modal-progress">
                                                                                <button class="btn progress-btn active"></button>
                                                                                <button class="btn progress-btn active"></button>
                                                                                <button class="btn progress-btn active"></button>
                                                                                <button class="btn progress-btn"></button>
                                                                            </div>
                                                                        </td>
                                                                        <td>	
                                                                            <span class="badge bg-success shadow-sm rounded-pill">Answered</span>
                                                                        </td>
                                                                        <td>                                            
                                                                            <div class="dropdown">
                                                                                <button type="button" class="btn btn-sm btn-light border shadow-sm rounded-pill shadow-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <a class="dropdown-item" href="{{ route("customers.edit",$row->id) }}">View </a>
                                                                                    <a class="dropdown-item" href="#">Approve</a>
                                                                                    <a class="dropdown-item" href="#">Cancel Enquiry</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @else
                                                        <div class="text-center">
                                                            <small>No active enquiries !</small>
                                                        </div>
                                                    @endif
                                                    
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>
                                </fieldset> 
                            {{-- Active enquiries --}}
                    
                            {{--  Closed enquiries --}}
                                <fieldset class="accordion-item">
                                    <div class="accordion-header custom m-0 position-relative" id="IFC_Models_Upload_Docs_header">
                                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#IFC_Models_Upload_Docs" aria-expanded="false" aria-controls="IFC_Models_Upload_Docs">
                                            Closed enquiries
                                        </div>
                                        <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                            <i data-bs-toggle="collapse" 
                                            href="#IFC_Models_Upload_Docs" 
                                            aria-expanded="false" 
                                            aria-controls="IFC_Models_Upload_Docs" 
                                            class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed ">
                                            </i>
                                        </div>
                                    </div>
                                    <div id="IFC_Models_Upload_Docs" class="accordion-collapse collapse " aria-labelledby="IFC_Models_Upload_Docs_header" data-bs-parent="#summaryGroup">
                                        <div class="accordion-body"> 
                                            <div class="cardw"> 
                                                <div class="card-bodyw">  
                                                    {{-- @if (!$dataActive->isEmpty()) --}}
                                                        <table id="scroll-vertical-datatable" class="table custom custom-table dt-responsive nowrap table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Enquiry No</th>
                                                                    <th>Type of Project</th>
                                                                    <th>No. Of Property</th>
                                                                    <th>Enquiry Date</th>
                                                                    <th>Pipeline</th>
                                                                    <th>Status</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                        
                                                            <tbody>
                                                                @foreach ($data as $key => $row)
                                                                    <tr>
                                                                        <td>{{ $key +1 }}</td>
                                                                        <td>{{ $row->enquiry_number }}</td>
                                                                        <td>Construction</td>
                                                                        <td>1</td>
                                                                        <td>{{ $row->enquiry_date }}</td>
                                                                        <td>
                                                                            <div class="btn-group" data-bs-toggle="modal" data-bs-target="#right-modal-progress">
                                                                                <button class="btn progress-btn"></button>
                                                                                <button class="btn progress-btn"></button>
                                                                                <button class="btn progress-btn"></button>
                                                                                <button class="btn progress-btn"></button>
                                                                            </div>
                                                                        </td>
                                                                        <td>	
                                                                            <span class="badge bg-danger shadow-sm rounded-pill">Closed</span>
                                                                        </td>
                                                                        <td>  
                                                                            <div class="dropdown">
                                                                                <button type="button" class="btn btn-sm btn-light border shadow-sm rounded-pill shadow-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <a class="dropdown-item" href="{{ route("customers.edit",$row->id) }}">View </a>
                                                                                    <a class="dropdown-item" href="#">Active</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        {{-- @else --}}
                                                        <div class="text-center">
                                                            <small>No Closed enquiries !</small>
                                                        </div>
                                                    {{-- @endif --}}
                                                    
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>
                                </fieldset>  
                            {{-- Closed enquiries --}} 
                        </div>
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
   <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    
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
@endpush