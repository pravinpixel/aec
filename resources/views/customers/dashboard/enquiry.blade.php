@extends('layouts.customer')

@section('customer-content')
   

    <div class="content-page">
        <div class="content">

            @include('customers.layouts.top-bar')

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
                                    <div class="card col-sm-3 me-3 shadow tilebox-one">
                                        <div class="card-body">
                                            <i class='fa fa-bullhorn float-end  dashboard-icon'></i>
                                            <h6 class=" text-primary mt-0 ">New enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totaNewEnq }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>
                                    <!--end card-->
    
                                    <div class="card col-sm-3 me-3 tilebox-one">
                                        <div class="card-body">
                                            <i class='fa-thumbs-up fa  float-end  dashboard-icon'></i>
                                            <h6 class=" text-success mt-0">Active enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totaActiveEnq + 5 }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>
                                    <!--end card-->

                                    {{-- <div class="card col-sm-3 tilebox-one">
                                        <div class="card-body">
                                            <i class='fa-thumbs-up fa  float-end  dashboard-icon'></i>
                                            <h6 class=" text-success mt-0">Active enquiries</h6>
                                            <h2 class="my-2 h4">84</h2>
                                        </div> <!-- end card-body-->
                                    </div> --}}
                                    <!--end card-->
                                </div>
                                <!--end card-->
                            </div> <!-- end col -->
 
                        </div>
                        <div class="card"> 
                            <div class="card-body">
                                <h4 class="page-title mt-0">New enquiries</h4>    
                                <table id="scroll-vertical-datatable" class="table dt-responsive nowrap table-striped">
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
                                                <td> 
                                                   
                                                        {{ $row->enquiry_number }}
                                                    
                                                </td>
                                                <td>Construction</td>
                                                <td>1</td>
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
                                                    <span class="badge bg-success shadow-sm rounded-pill">Active</span>
                                                </td>
                                                <td>                                            
                                                    <a class="btn btn-outline-primary btn-sm  rounded-pill shadow-sm" href="{{ route("customers.edit",$row->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                        <div class="card"> 
                            <div class="card-body">
                                <h4 class="page-title mt-0">Active enquiries</h4>    
                                <table id="scroll-vertical-datatable" class="table dt-responsive nowrap table-striped">
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
                                                <td> 
                                                   
                                                        {{ $row->enquiry_number }}
                                                    
                                                </td>
                                                <td>Construction</td>
                                                <td>1</td>
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
                                                    <span class="badge bg-success shadow-sm rounded-pill">Active</span>
                                                </td>
                                                <td>                                            
                                                    <a class="btn btn-outline-primary btn-sm  rounded-pill shadow-sm" href="{{ route("customers.edit",$row->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
        #scroll-vertical-datatable th{
            padding:  0px !important     
        }
        #SvgjsText1885 {
            display: none !important;
        }
        #scroll-vertical-datatable_wrapper .row:nth-child(1) {
            display: none !important
        }
        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
            top : 2px !important
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            top : 2px !important
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
@endpush