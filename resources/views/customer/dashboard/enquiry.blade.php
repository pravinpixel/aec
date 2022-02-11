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
                                            <h2 class="my-2 h3">{{ $totalEnquiry }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>

                                    <div class="col-sm-3 tilebox-one">
                                        <div class="card card-body">
                                            <i class='fa fa-bullhorn float-end  dashboard-icon'></i>
                                            <h6 class=" text-primary mt-0 ">New enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totalNewEnquiry }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>
                                    <!--end card-->
    
                                    <div class="col-sm-3 tilebox-one">
                                        <div class="card card-body">
                                            <i class='fa-thumbs-up fa  float-end  dashboard-icon'></i>
                                            <h6 class=" text-success mt-0">Active enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totaActiveEnquiry }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>
                                    <!--end card--> 

                                    <div class="col-sm-3 tilebox-one">
                                        <div class="card card-body">
                                            <i class='fa-thumbs-up fa  float-end  dashboard-icon'></i>
                                            <h6 class=" text-danger mt-0">Closed enquiries</h6>
                                            <h2 class="my-2 h3">{{ $totaCancelledEnquiry }}</h2>
                                        </div> <!-- end card-body-->
                                    </div>
                                    <!--end card--> 
                                </div>
                                <!--end card-->
                            </div> <!-- end col -->
 
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