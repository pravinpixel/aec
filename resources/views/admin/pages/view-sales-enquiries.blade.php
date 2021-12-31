@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page"  ng-app="AdminEnqView">
        <div class="content"  ng-controller="EnqController" >

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')

                <!-- end page title -->
                 
                <div class="card">
                    <div  class="card-header ">
                        <div class="d-flex justify-content-between ">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#right-modal" title="Click to Filter" class="btn btn-light border">
                                <i class="mdi mdi-filter-menu"></i> Filters
                            </button>
                            <a  href="{{ route('admin-create-sales-enquiries') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> New Enquiry</a>
                        </div>
                    </div>
                    {{-- <div id="tooltip-container2">
                        <button type="button" class="btn btn-info" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Tooltip on top</button>
                        <button type="button" class="btn btn-info" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>
                        <button type="button" class="btn btn-info" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">Tooltip on left</button>
                        <button type="button" class="btn btn-info" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">Tooltip on right</button>
                    </div> --}}
                    <div class="card-body">
                        <table datatable="ng" dt-options="vm.dtOptions" class="table dt-responsive nowrap table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Enquiry No</th>
                                    <th>Type of Project</th>
                                    <th>No. Of Property</th>
                                    <th>Esti. Date</th>
                                    <th>Pipeline</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody> 
                                <tr ng-repeat="(index,m) in module_get">
                                    <td> @{{ index+1 }}</td>
                                    <td> 
                                        <span ng-click="toggle('edit', m.customer_id)" class="badge badge-primary-lighten btn  p-2">@{{ m.enquiry_number }}</span>
                                    </td>
                                    <td>ABC00@{{ index+1 }}</td>
                                    <td>@{{ index+1 }}</td>
                                    <td>@{{ m.enquiry_date }}</td>
                                    <td>
                                        <div id="toolTip_@{{ index+1 }}" ng-click="toggle('edit', m.customer_id)">
                                            <button type="button" class="btn progress-btn active" data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Enquiry initiation"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical assessment"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Cost Estimated"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Invoice placed"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Proposal sharing"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project delivered"> </button>
                                        </div>
                                    </td>
                                    <td>	
                                        <span class="badge bg-success shadow-sm rounded-pill">Active</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            {{-- <button type="button"  class="btn btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="dripicons-dots-3 "></i>
                                            </button> --}}
                                            
                                            {{-- <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('view-enquiry') }}/@{{ m.customer_id }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('admin-estimation-single-view') }}">Technical Estimate</a>
                                                <a class="dropdown-item" href="{{ route('admin-cost-estimation-single-view') }}">Cost Estimate</a>
                                                <a class="dropdown-item" href="#">Move to proposal</a>
                                            </div> --}}
                                            
                                            <a class="btn btn-outline-primary btn-sm  rounded-pill shadow-sm" href="{{ route('view-enquiry') }}/@{{ m.customer_id }}"><i class="fa fa-pencil"></i></a>
                                        </div>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                </div>

                <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-right" style="width:100% !important">
                        <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
                            <div>
                                <div class="border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                </div>
                                <div >
                                    <div class="my-3">
                                        <h3 class="page-title">Filter</h3>
                                    </div>
                                    <div class="mb-3 row mx-0">
                                        
                                        <div class="col p-0 me-md-2">
                                            <label class="form-label">From Date</label>
                                            <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" ng-model="filter.from_date" name="from_date">
                                        </div>
                                        <div class="col p-0">
                                            <label class="form-label">End Date</label>
                                            <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" ng-model="filter.to_date" name="to_date">
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col p-0 me-md-2">
                                            <div class="mb-3 ">
                                                <label class="form-label">Project Type</label>
                                                <select class="form-select" ng-model="filter.type" name="type">
                                                    <option selected>-- select --</option>
                                                    <option value="1">Construction</option>
                                                    <option value="2">New Construction</option>
                                                    <option value="3">Old Construction</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col p-0">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" ng-model="filter.status" name="status">
                                                    <option selected>-- select --</option>
                                                    <option value="1">In Progress </option>
                                                    <option value="2">Awarded</option>
                                                    <option value="0">Yet to Start</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Enqiury Number | Project Name</label>
                                        <input type="text" class="form-control" placeholder="Type Here..."  ng-model="filter.others" name="others">
                                    </div> 
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" ng-click="fiterData()">
                                            <i class="mdi mdi-filter-menu"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            
                <div id="right-modal-progress" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
                        <div class="p-3 shadow-sm">
                            <h3>Project Name : <b class="text-primary"> @{{ enqData.project_name }} </b></h3>
                            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
                        </div>
                        <div class="modal-content h-100 p-4" style="overflow: auto">
                            <div class="card mt-3">
                                <div class="card-body p-2">
                                    <table class="table table-bordered m-0">
                                        <tr>
                                            <th>Enquiry Number</th>
                                            <th>Name</th>
                                            <th>Company Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Type Of Project</th>
                                        </tr>
                                        <tr>
                                            <td>@{{ enqData.enquiry_number }}</td>
                                            <td>@{{ enqData.customer.full_name }} </td>
                                            <td>@{{ enqData.customer.company_name }}</td>
                                            <td>@{{ enqData.customer.mobile_no }}</td>
                                            <td>@{{ enqData.customer.email }} </td>
                                            <td>New</td>
                                        </tr>
                                    </table>
                                </div>
                            </div> 
                            <div class="card">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item m-0">
                                      <h2 class="accordion-header m-0" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Project Information
                                        </button>
                                      </h2>
                                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mx-0 container ">
                                                <div class="col-12 text-center">
                                                    <h4 class="f-20 m-0 p-3">Project Information</h4>
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <table class="table m-0  table-bordered">
                                                        <tbody>
                                                                <tr class="border">
                                                                    <th  class=" ">Project Name
                                                                    </th><td  class="bg-white">@{{ enqData.project_name }}</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Construction Site Address
                                                                    </th><td  class="bg-white">@{{ enqData.site_address }}</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Zip Code
                                                                    </th><td  class="bg-white">@{{ enqData.zipcode }}</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Place
                                                                    </th><td  class="bg-white">@{{ enqData.place }}</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">State
                                                                    </th><td  class="bg-white">@{{ enqData.state }}</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Country
                                                                    </th><td  class="bg-white">@{{ enqData.site_address }}</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Type of Project
                                                                    </th><td  class="bg-white">1</td>
                                                                </tr> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <table class="table m-0   table-bordered">
                                                    <tbody><tr class="border">
                                                            <th  class=" ">Type of Building
                                                            </th><td  class="bg-white">2</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Number of Buildings
                                                            </th><td  class="bg-white">@{{ enqData.no_of_building }}</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Type of Delivery
                                                            </th><td  class="bg-white">1</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Deliveryd Date 
                                                            </th><td  class="bg-white">2021-02-25</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">State
                                                            </th><td  class="bg-white">non</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Contact Person name
                                                            </th><td  class="bg-white">@{{ enqData.customer.contact_person }} </td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">E-post
                                                            </th><td  class="bg-white">@{{ enqData.customer.email }} </td>
                                                        </tr> 
                                                    </tbody></table>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Services Selection
                                        </button>
                                      </h2>
                                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mx-0 container ">
                                                <div class="col-12 text-center">
                                                    <h4 class="f-20 m-0 p-3">Selected Services</h4>
                                                </div>
                                                <div class="col-md-6 p-3 mx-auto">
                                                    <table class="table m-0   table-bordered">
                                                        <tbody>
                                                            <tr class="border">
                                                                <th class="bg-primary text-white">S.no</th>
                                                                <th class="bg-primary text-white">Services</th>
                                                            </tr> 
                                                        <tr class="border">
                                                            <td class=" ">1
                                                            </td><td class="bg-white">CAD / CAM Modelling</td>
                                                        </tr>  
                                                        <tr class="border">
                                                            <td class=" ">2
                                                            </td><td class="bg-white">Approval Drawings</td>
                                                        </tr>  
                                                    </tbody></table>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                FC Model & Upload Docs 
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <table class="table m-0  ">
                                                                                
                                                    <tbody>
                                                        <tr>
                                                            <th class="">S.no
                                                            </th><th class="">File Name</th>
                                                            <th class="">Type</th>
                                                            <th class="">Action</th>
                                                        </tr> 
                                                        <tr class="border">
                                                        <th class="bg-white">1
                                                        </th><td class="bg-white">Modelling</td>
                                                        <td class="bg-white">IFC Modelling</td>
                                                        <td>
                                                            <i class="feather-eye text-success mr-3"></i>
                                                            <i class="feather-trash text-danger"></i>
                                                        </td>
                                                    </tr>  
                                                    <tr class="border">
                                                        <th class="bg-white">1
                                                        </th><td class="bg-white">Modelling</td>
                                                        <td class="bg-white">IFC Modelling</td>
                                                        <td>
                                                            <i class="feather-eye text-success mr-3"></i>
                                                            <i class="feather-trash text-danger"></i>
                                                        </td>
                                                    </tr>  
                                                    <tr class="border">
                                                        <th class="bg-white">1
                                                        </th><td class="bg-white">Modelling</td>
                                                        <td class="bg-white">IFC Modelling</td>
                                                        <td>
                                                            <i class="feather-eye text-success mr-3"></i>
                                                            <i class="feather-trash text-danger"></i>
                                                        </td>
                                                    </tr>  
                                                    <tr class="border">
                                                        <th class="bg-white">1
                                                        </th><td class="bg-white">Modelling</td>
                                                        <td class="bg-white">IFC Modelling</td>
                                                        <td>
                                                            <i class="feather-eye text-success mr-3"></i>
                                                            <i class="feather-trash text-danger"></i>
                                                        </td>
                                                    </tr>  
                                                    <tr class="border">
                                                        <th class="bg-white">1
                                                        </th><td class="bg-white">Modelling</td>
                                                        <td class="bg-white">IFC Modelling</td>
                                                        <td>
                                                            <i class="feather-eye text-success mr-3"></i>
                                                            <i class="feather-trash text-danger"></i>
                                                        </td>
                                                    </tr>  
                                                </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThreer">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreer" aria-expanded="false" aria-controls="collapseThree">
                                                Building components
                                            </button>
                                        </h2>
                                        <div id="collapseThreer" class="accordion-collapse collapse" aria-labelledby="headingThreer" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row mx-0 container ">
                                                    <div class="col-12 text-center">
                                                        <h4 class="f-20 m-0 p-3">Building components</h4>
                                                    </div>
                                                    <div class="col-md-8 p-3 mx-auto">
                                                        <table class="table m-0 table-bordered " id="menu-table">
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <th  class="bg-primary text-white">EW_DEWS
                                                                    </th>
                                                                    <th  class="bg-primary text-white">
                                                                        Delivery Type : Element Type
                                                                    </th>
                                                                    <th  class="bg-primary text-white">
                                                                        Total : 10
                                                                    </th>
                                                                </tr> 
                                                            <tr class="border  ">
                                                                <td>Layer Details</td>
                                                                <td>Dimensions ( mm )</td>
                                                                <td>Estimates length ( mm )</td>
                                                            </tr>
                                                            <tr class="border">
                                                                <td>Horizontal Nails</td>
                                                                <td>250X298</td>
                                                                <td>0.58</td>
                                                            </tr>  
                                                            <tr class="border">
                                                                <td>Horizontal Nails</td>
                                                                <td>250X298</td>
                                                                <td>0.58</td>
                                                            </tr>  
                                                            <tr class="border">
                                                                <td>Horizontal Nails</td>
                                                                <td>250X298</td>
                                                                <td>0.58</td>
                                                            </tr>  
                                                            <tr class="border">
                                                                <td>Horizontal Nails</td>
                                                                <td>250X298</td>
                                                                <td>0.58</td>
                                                            </tr>  
                                                            <tr class="border">
                                                                <td>Horizontal Nails</td>
                                                                <td>250X298</td>
                                                                <td>0.58</td>
                                                            </tr>  
                                                            <tr class="border">
                                                                <td>Horizontal Nails</td>
                                                                <td>250X298</td>
                                                                <td>0.58</td>
                                                            </tr>  
                                                            <tr class="border">
                                                                <td>Horizontal Nails</td>
                                                                <td>250X298</td>
                                                                <td>0.58</td>
                                                            </tr>  
                                                        </tbody></table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThreew">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreew" aria-expanded="false" aria-controls="collapseThreew">
                                                Additional Info
                                            </button>
                                        </h2>
                                        <div id="collapseThreew" class="accordion-collapse collapse" aria-labelledby="headingThreew" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="col-md-10 p-0 mx-auto  border">
                                                    <div class="col-12  text-center p-2  ">
                                                        Additional Info
                                                    </div>
                                                    <div class="p-2">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus numquam illum sint perspiciatis tempore cumque ipsa asperiores tempora earum molestias aperiam doloremque facere placeat officiis iure, ea eum architecto sunt?
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center mt-4">
                                                    <button class="btn button_print progress-btn mx-2 px-3 btn-rounded">
                                                        Print
                                                    </button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div> <!-- container -->

        </div> <!-- content -->
    </div> 

    
    

@endsection

@push('custom-styles')
    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
 

    <style>
        .progress-btn {
            clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
            background: lightgray
        }
        .progress-btn.active {
            background: #20CF98 !important
        }
        .table td,th {
            padding: 5px 10px !important     ;
            vertical-align: middle !important
        }
       
        
        #scroll-vertical-datatable th{
            padding:  0px !important     
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
        .accordion-header {
            margin:  0 !important
        }
        .accordion-item {
            border: 1px solid gray
        }
        
    </style>
@endpush

{{-- @push('custom-scripts')
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
    <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.datatable-init.js') }}"></script>
@endpush --}}

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
    {{-- <script src="{{ asset('public/assets/js/pages/demo.datatable-init.js') }}"></script> --}}
 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#menu-table').DataTable({
            "ordering": false
        });
    </script>
    <!-- AngularJS Application Scripts -->
    <script >
        var app = angular.module('AdminEnqView', ['datatables']).constant('API_URL', $("#baseurl").val());           
    </script>

    <script>
        
        // menuController

        app.controller('EnqController', function ($scope, $http, API_URL) {
            
            //fetch users listing from 
            
            getData = function($http, API_URL) {

                angular.element(document.querySelector("#loader")).removeClass("d-none"); 
            
                $http({
                    method: 'GET',
                    url: API_URL + "admin/api/v2/customers-enquiry"
                }).then(function (response) {

                    // angular.element(document.querySelector("#loader")).addClass("d-none");
                    
                    $scope.module_get = response.data;
                        
                }, function (error) {
                    console.log(error);
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
            getData($http, API_URL);
            //delete record
            
            $scope.fiterData = function () {
                    
                    // admin/api/v2/customers-enquiry
                
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
            
        Message = function (type, head) {
            $.toast({
                heading: head,
                icon: type,
                showHideTransition: 'plain', 
                allowToastClose: true,
                hideAfter: 5000,
                stack: 10, 
                position: 'bootom-left',
                textAlign: 'left', 
                loader: true, 
                loaderBg: '#252525',                
            });
        }
    </script>    
@endpush