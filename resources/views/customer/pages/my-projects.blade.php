@extends('layouts.customer')

@section('customer-content')
   
    <div class="content-page">
        <div class="content">

            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('customer.includes.page-navigater')

                <!-- end page title --> 
               
                <div class="card">
                    <div  class="card-header ">
                        <div class="d-flex justify-content-between ">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#right-modal" title="Click to Filter" class="btn btn-light border">
                                <i class="mdi mdi-filter-menu"></i> Filters
                            </button>
                            <a  href="{{ route('customers.create-enquiry') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> Create Enquiry</a>
                        </div>
                    </div>
                    <div class="card-body">
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
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal-progress" class="badge badge-primary-lighten btn  p-2">
                                                {{ $row->enquiry_number }}
                                            </span>
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
                                            <a class="btn btn-outline-primary btn-sm  rounded-pill shadow-sm" href="{{ route("customers.edit-enquiry",$row->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div> <!-- container -->

        </div> <!-- content --> 
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
                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                            </div>
                            <div class="col p-0">
                                <label class="form-label">End Date</label>
                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col p-0 me-md-2">
                                <div class="mb-3 ">
                                    <label class="form-label">Project Type</label>
                                    <select class="form-select">
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
                                    <select class="form-select">
                                        <option selected>-- select --</option>
                                        <option value="1">In Progress </option>
                                        <option value="2">Awarded</option>
                                        <option value="3">Yet to Start</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enqiury Number | Project Name</label>
                            <input type="text" class="form-control" placeholder="Type Here...">
                        </div> 
                        <div class="text-center">
                            <button type="button" class="btn btn-primary  ">
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
            <div class="modal-content h-100 p-4" style="overflow: auto">
                
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-hidden="true"></button>
              
                <h3>Project Name : <b>XXX</b></h3>
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
                                <td>ENQXXX</td>
                                <td>Nishantha Kumar</td>
                                <td>Solen Tech</td>
                                <td>9876764875</td>
                                <td>NishanthaNishantha@gmail.com</td>
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
                                                        </th><td  class="bg-white">ABCD Building</td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Construction Site Address
                                                        </th><td  class="bg-white">Strandgata-12</td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Post Code
                                                        </th><td  class="bg-white">2134</td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Place
                                                        </th><td  class="bg-white">Austvath</td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">State
                                                        </th><td  class="bg-white">Hedmark</td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Country
                                                        </th><td  class="bg-white">Norway</td>
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
                                                </th><td  class="bg-white">2</td>
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
                                                </th><td  class="bg-white">XXXXXXX </td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">E-post
                                                </th><td  class="bg-white">dummyemail@gmail.com</td>
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
                                            <table class="table m-0 table-bordered ">
                                                
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
                                        <button class="btn button_print btn-info mx-2 px-3 btn-rounded">
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