@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page">
        <div class="content">

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')

                <!-- end page title --> 
               
                <div class="card">
                    <div  class="card-header ">
                        <div class="d-flex justify-content-between ">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#right-modal" title="Click to Filter" class="btn btn-light border">
                                <i class="mdi mdi-filter-menu"></i> Filters
                            </button>
                            {{-- <a  href="{{ route('admin-create-sales-enquiries') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> New Enquiry</a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="scroll-vertical-datatable" class="table custom dt-responsive nowrap table-striped">
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
                                @for ($i = 0; $i < 15;  $i++)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td> 
                                        <span data-bs-toggle="modal" data-bs-target="#right-modal-progress" class="badge badge-primary-lighten btn  p-2">ENQ0{{ $i+1 }}</span>
                                    </td>
                                    <td>Construction</td>
                                    <td>1</td>
                                    <td>10-12-2022</td>
                                    <td>
                                        <div>
                                            <div id="tooltip-_{{ $i+1 }}"   data-bs-toggle="modal" data-bs-target="#right-modal-progress">
                                                <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry initiation "></button>
                                                <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry sent"></button>
                                                <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Price negotiation"></button>
                                                <button class="btn progress-btn" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Project awarded"></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary shadow-sm rounded-pill">Inprogress</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="dripicons-dots-3 "></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('proposal-conversation') }}">View</a>
                                                <button class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#primary-header-modal">Generate   Proposal </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td> 
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal-progress" class="badge badge-primary-lighten btn  p-2">ENQ0{{ $i+1 }}</span>
                                        </td>
                                        <td>Construction</td>
                                        <td>1</td>
                                        <td>10-12-2022</td>
                                        <td>
                                            <div>
                                                <div id="tooltip-_{{ $i+1 }}"   data-bs-toggle="modal" data-bs-target="#right-modal-progress">
                                                    <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry initiation "></button>
                                                    <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry sent"></button>
                                                    <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Price negotiation"></button>
                                                    <button class="btn progress-btn" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Project awarded"></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary shadow-sm rounded-pill">Pending</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="dripicons-dots-3 "></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('proposal-conversation') }}">View</a>
                                                    <button class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#primary-header-modal">Generate   Proposal </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td> 
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal-progress" class="badge badge-primary-lighten btn  p-2">ENQ0{{ $i+1 }}</span>
                                        </td>
                                        <td>Construction</td>
                                        <td>1</td>
                                        <td>10-12-2022</td>
                                        <td>
                                            <div>
                                                <div id="tooltip-_{{ $i+1 }}"   data-bs-toggle="modal" data-bs-target="#right-modal-progress">
                                                    <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry initiation "></button>
                                                    <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry sent"></button>
                                                    <button class="btn progress-btn active" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Price negotiation"></button>
                                                    <button class="btn progress-btn" data-bs-container="#tooltip-_{{ $i+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Project awarded"></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info shadow-sm rounded-pill">Under review</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="dripicons-dots-3 "></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('proposal-conversation') }}">View</a>
                                                    <button class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#primary-header-modal">Generate   Proposal </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
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
                            <label class="form-label">Enquiry Number | Project Name</label>
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
                        <table class="table custom table-bordered m-0">
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
                                        <table class="table custom m-0  table-bordered">
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
                                                        <th  class=" ">Zip Code
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
                                        <table class="table custom m-0   table-bordered">
                                        <tbody><tr class="border">
                                                <th  class=" ">Type of Building
                                                </th><td  class="bg-white">2</td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">No. of Buildings
                                                </th><td  class="bg-white">2</td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">Type of Delivery
                                                </th><td  class="bg-white">1</td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">Delivery Date 
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
                                        <table class="table custom m-0   table-bordered">
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
                                    <table class="table custom m-0  ">
                                                                    
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
                                            <table class="table custom m-0 table-bordered ">
                                                
                                                <tbody>
                                                    <tr>
                                                        <th  class="bg-primary text-white">EW_DEWS
                                                        </th>
                                                        <th  class="bg-primary text-white">
                                                            Type of Delivery : Element Type
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
     
     
    <div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-right" style="width:100% !important">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body ">
                    <div class="p-2">
                        
                        <div class="d-flex justify-content-between align-items-center  mb-3 p-0">
                            <h4 class="p-2 m-0 h5"> Select a mail type </h4>
                            <button  data-bs-toggle="modal" data-bs-target="#createMail-modal" class="btn btn-success float-right" ><small><i class="fa fa-plus"></i> Create</small></button>
                        </div>
                        <div class="select-group " style="max-height: 350px; overflow:auto">
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio1">Offer letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio2">Thankyou letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio3" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio3">Invite Mail</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio4" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio4">Contract letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio5" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio5">Offer letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio6" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio6">Thankyou letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio7" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio7">Invite Mail</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio8" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio8">Contract letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio1">Offer letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio2">Thankyou letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio3" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio3">Invite Mail</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio4" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio4">Contract letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio5" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio5">Offer letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio6" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio6">Thankyou letter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio7" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio7">Invite Mail</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="radio" id="customRadio8" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio8">Contract letter</label>
                            </div>
                        </div>
                        <div class="mt-3 d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-info btn-sm"  data-bs-toggle="modal" data-bs-target="#bs-Preview-modal-lg"> <i class="fa fa-eye"></i> preview</button>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal"> <i class="fa fa-envelope"></i> Send Mail</button>
                        </div>
                    </div>
                </div> 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="createMail-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
            <div class="modal-content h-100">
                <div class="modal-header border modal-colored-header bg-primary">
                    <h3 class="text-center ps-3">ADD MAIL TEMPLATE FORM</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body "  style="overflow: auto">
                    <div class="p-2">
                                 
                        <div class="form-floatingx mb-3">
                            <label for="floatingInput" class="mb-2">Mail Title</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Type here...." />

                        </div>

                        <div class="form-floatingx mb-3">
                            <label for="floatingPassword" class="mb-2">Mail Type</label>
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Type here...." />

                        </div>

                        <div class="form-floatingx">
                            <label for="floatingPassword" class="mb-2">Mail Template Message </label>
                            {{-- <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea> --}}
                            <textarea id="editor">
                                <div class="card p-3">
                                    <table class="table custom table-borderless">
                                        <tr>
                                            <td>
                                                <img width="150px" src="{{ asset("public/assets/images/logo_customer.png") }}" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Offer: 2021-1 Revision: 1</td>
                                            <td width="20%">Dato: 15.12.2021</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    TilTREFAB AS (ORG. 916161514), 
                                                    Stålverkveien , <br>
                                                    4100 JØRPELAND 
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Our ref: Sigbjørn Daasvatn</td>
                                            <td>Yourref: Tom-Øystein Angelsen</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Re.: Engineering for framework elements for Fjelltun skole, Jørpeland</strong></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>1.	Delivery Price</strong>
                                                <p>
                                                    Thank you for your request for engineering services. We hereby submit an offer for engineering for manufacturing of elements and associated documentation for installation for your timber framework elementdelivery as specified in this offer to Fjelltunskole at Jørpeland.
                                                </p> 
                                                <ol>
                                                    <li>Price NOK XXper gross m2for XXXXXm2ofOuter Wallareas, summing up to XXX XXX NOK.</li>
                                                    <li>Price for engineering with respect to loadbearing relates only to building parts that are a part of the delivery.</li>
                                                    <li>All prices are ex VAT.</li>
                                                </ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>2. Delivery description</strong></p>
                                                <strong>2.1.	Design of timberframework walls for TEK17 standard</strong>
                                                <p>We will deliver outer wall façade elements according to project specifications as shown in Attachment-1</p>
                                                <p>Design is performed according to agreed details and layers as part of project.</p>
                                            </td>                                    
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>2.2	Delivery Schedule </strong></p> 
                                                <p>The typical delivery schedule for engineering work shall be agreed in each individual case. Typical minimum time from contract signature to first delivery will be minimum 4 weeks. Special agreements can be made otherwise.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>2.3. Electronic deliveries</strong>
                                                <p>All products delivered by AEC Prefab will be in electronic format. Such deliveries are:</p>
                                                <ul>
                                                    <li> General arrangement drawings for elements layout</li>
                                                    <li>Connection details</li>
                                                    <li>3D model of construction in IFC format.</li>
                                                    <li>Static calculations and report delivered structures.</li>
                                                    <li>CNC machine files for precut.</li>
                                                    <li>Element production drawings.</li>
                                                    <li>Element installation drawings.</li>
        
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>2.4. Doors and windows</strong>
                                                <p>Openingsfor doors and windows are designed using 15mm spacing between given window object in IFC model or drawing.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>2.5. Anchoringthestructure</strong>
                                                <p>It is assumed that the construction company at the building site, with their own carpenters, have the skills required to connect the building parts together, and mechanical means for anchoring the framework to the foundation. </p>
                                                <p>Angles, steel bolts and fixtures are considered for anchoring bolts for fixing elements against the concrete structure, only when ordered particularly.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>2.6. Transport to ConstructionSite</strong>
                                                <p>Not included from AEC Prefab AS, except generation of element transport packagedrawing. </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>2.7. Rigging and Lifting Design</strong>
                                                <p>Not included from AEC Prefab AS, except calculation of CoGfor individual elements in the fabrication drawing.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>2.8. Assembly Works</strong>
                                                <p>Not included from AEC Prefab AS.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>3.	Prerequisites, agreement and delivery schedule</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>3.1.	Prerequisites for offers</strong>
                                                <p>The offer is based on some assumptions and caveats as follows below. If these assumptions and caveats are not satisfied, this may result in adjustments in both total and partial prices, as well as obligations related to progress and fulfilment of deadlines as given in the contract.</p>
                                                <p>
                                                    The following prerequisites are stated in connection with the offer:
                                                </p>
                                                <ol>
                                                    <li>
                                                        Re-concealed project implementation plan - It is assumed that we will arrive at a reconciled progress plan that is feasible for both parties. AEC Prefab AS needs at least 4 weeks from the control measurement result provided by Client to start precut production. In addition, the parties must agree on a decision plan that has realistic deadlines for feedback and/or confirmations of factors that AEC Prefab AS needs to clarify in order to maintain deliverables in accordance with the reconciled progress plan.
                                                    </li>
                                                    <li>Information about existing buildings - It is assumed that AEC Prefab  receives  the IFC model and sufficient information about existing buildings,including building engineering details,  for modeling the element structures onto the concrete construction and carrying out static calculations. This means that electronic models and reports from previous works are made available to AEC Prefab within 3 weeks before production startup.</li>
                                                    <li>Measurement - It is assumed that relevant measurement data are available for the construction that may give us variation in real construction in relation to theoretical construction as provided in the regular IFC files.</li>
                                                    <li>Tolerances in measurement data- It is assumed that measuring the anchor points of the construction will take place within an accuracy of +/- 10 mm in relation to theoretical location. If measures are outside +/- 10 mm as predicted in the element production, this will result in additional work on the construction site to adapt the individual elements that will then not immediately fit onto the construction.</li>
                                                    <li>Measurement data format - It is assumed that measurement data can be digitally transferred from measurement station to text file with coordinate ID, X (Northing, Y (Easting), and Z (height) coordinates.</li>
                                                    <li>The timing of the delivery of relevant measurement data - It is assumed, that relevant measurement data for existing concrete construction in a foundation or a façade in a block has been transferred to AEC Prefab no later than 3 weeks before corresponding prefab data deliveries. If measurement data to AEC Prefab is delayed in time or the required scope changes, this could have further consequences for progress and thus AEC Prefab's ability to meet deadlines set out in the contract. This may require the need for progress or an agreement on extended delivery date. </li>
                                                    <li>Payment schedule – AEC Prefab AS assumes that a reconciled payment plan is reached that provides liquidity surplus for AEC Prefab AS.</li>
                                                </ol>
                                                <p>
                                                    The caveats and assumptions contained in this offer are repeated in the contract or clarified in other satisfactory manner e.g.  before the contract is signed.
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>3.2.	Validity of offers and confirmation.</strong></p>
                                                <p>The offer is valid until 14 days from the day of issued. If you wish to accept the offeror to proceed into contract negotiations, we ask that you confirm this in e-mail before the end of this period.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>3.3.	Contract signature and delivery schedule</strong></p>
                                                <p>The project's start date is defined at contract signature whichinitiate our production planning. An internal progress plan is being created for the project, in accordance with the aforementioned reconciled project implementation plan (customers's project plan) and the project then enters into our production plan.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>4. Attachments to quotations</strong></p>
                                                <p>Uploaddrawing as an Attachment 1: Wall element layers</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>5. Signature</strong></p>
                                                <p>
                                                    <b>For AEC Prefab AS</b> <br>
        
                                                    Kind regards, <br>
                                                    Sigbjørn Daasvatn <br>
                                                    Managing Director <br>
        
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </textarea> 
                        </div>  

                        <div class="form-floatingx mt-4">
                          
                            <button class="btn btn-primary"> Submit to Save</button>
                        </div>
                    </div>
                </div> 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Large modal -->
    {{-- mail Preview --}}
    
    <div class="modal fade" id="bs-Preview-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
            <div class="modal-content  h-100">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Sales Offer Letter</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body"  style="overflow: auto">
                    {{-- <textarea name="" id="editor2" > --}}
                        <div class="card p-3">
                            <table class="table custom table-borderless">
                                <tr>
                                    <td>
                                        <img width="150px" src="{{ asset("public/assets/images/logo_customer.png") }}" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Offer: 2021-1 Revision: 1</td>
                                    <td width="20%">Dato: 15.12.2021</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            TilTREFAB AS (ORG. 916161514), 
                                            Stålverkveien , <br>
                                            4100 JØRPELAND 
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Our ref: Sigbjørn Daasvatn</td>
                                    <td>Yourref: Tom-Øystein Angelsen</td>
                                </tr>
                                <tr>
                                    <td><strong>Re.: Engineering for framework elements for Fjelltun skole, Jørpeland</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>1.	Delivery Price</strong>
                                        <p>
                                            Thank you for your request for engineering services. We hereby submit an offer for engineering for manufacturing of elements and associated documentation for installation for your timber framework elementdelivery as specified in this offer to Fjelltunskole at Jørpeland.
                                        </p> 
                                        <ol>
                                            <li>Price NOK XXper gross m2for XXXXXm2ofOuter Wallareas, summing up to XXX XXX NOK.</li>
                                            <li>Price for engineering with respect to loadbearing relates only to building parts that are a part of the delivery.</li>
                                            <li>All prices are ex VAT.</li>
                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>2. Delivery description</strong></p>
                                        <strong>2.1.	Design of timberframework walls for TEK17 standard</strong>
                                        <p>We will deliver outer wall façade elements according to project specifications as shown in Attachment-1</p>
                                        <p>Design is performed according to agreed details and layers as part of project.</p>
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>2.2	Delivery Schedule </strong></p> 
                                        <p>The typical delivery schedule for engineering work shall be agreed in each individual case. Typical minimum time from contract signature to first delivery will be minimum 4 weeks. Special agreements can be made otherwise.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>2.3. Electronic deliveries</strong>
                                        <p>All products delivered by AEC Prefab will be in electronic format. Such deliveries are:</p>
                                        <ul>
                                            <li> General arrangement drawings for elements layout</li>
                                            <li>Connection details</li>
                                            <li>3D model of construction in IFC format.</li>
                                            <li>Static calculations and report delivered structures.</li>
                                            <li>CNC machine files for precut.</li>
                                            <li>Element production drawings.</li>
                                            <li>Element installation drawings.</li>

                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>2.4. Doors and windows</strong>
                                        <p>Openingsfor doors and windows are designed using 15mm spacing between given window object in IFC model or drawing.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>2.5. Anchoringthestructure</strong>
                                        <p>It is assumed that the construction company at the building site, with their own carpenters, have the skills required to connect the building parts together, and mechanical means for anchoring the framework to the foundation. </p>
                                        <p>Angles, steel bolts and fixtures are considered for anchoring bolts for fixing elements against the concrete structure, only when ordered particularly.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>2.6. Transport to ConstructionSite</strong>
                                        <p>Not included from AEC Prefab AS, except generation of element transport packagedrawing. </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>2.7. Rigging and Lifting Design</strong>
                                        <p>Not included from AEC Prefab AS, except calculation of CoGfor individual elements in the fabrication drawing.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>2.8. Assembly Works</strong>
                                        <p>Not included from AEC Prefab AS.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>3.	Prerequisites, agreement and delivery schedule</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>3.1.	Prerequisites for offers</strong>
                                        <p>The offer is based on some assumptions and caveats as follows below. If these assumptions and caveats are not satisfied, this may result in adjustments in both total and partial prices, as well as obligations related to progress and fulfilment of deadlines as given in the contract.</p>
                                        <p>
                                            The following prerequisites are stated in connection with the offer:
                                        </p>
                                        <ol>
                                            <li>
                                                Re-concealed project implementation plan - It is assumed that we will arrive at a reconciled progress plan that is feasible for both parties. AEC Prefab AS needs at least 4 weeks from the control measurement result provided by Client to start precut production. In addition, the parties must agree on a decision plan that has realistic deadlines for feedback and/or confirmations of factors that AEC Prefab AS needs to clarify in order to maintain deliverables in accordance with the reconciled progress plan.
                                            </li>
                                            <li>Information about existing buildings - It is assumed that AEC Prefab  receives  the IFC model and sufficient information about existing buildings,including building engineering details,  for modeling the element structures onto the concrete construction and carrying out static calculations. This means that electronic models and reports from previous works are made available to AEC Prefab within 3 weeks before production startup.</li>
                                            <li>Measurement - It is assumed that relevant measurement data are available for the construction that may give us variation in real construction in relation to theoretical construction as provided in the regular IFC files.</li>
                                            <li>Tolerances in measurement data- It is assumed that measuring the anchor points of the construction will take place within an accuracy of +/- 10 mm in relation to theoretical location. If measures are outside +/- 10 mm as predicted in the element production, this will result in additional work on the construction site to adapt the individual elements that will then not immediately fit onto the construction.</li>
                                            <li>Measurement data format - It is assumed that measurement data can be digitally transferred from measurement station to text file with coordinate ID, X (Northing, Y (Easting), and Z (height) coordinates.</li>
                                            <li>The timing of the delivery of relevant measurement data - It is assumed, that relevant measurement data for existing concrete construction in a foundation or a façade in a block has been transferred to AEC Prefab no later than 3 weeks before corresponding prefab data deliveries. If measurement data to AEC Prefab is delayed in time or the required scope changes, this could have further consequences for progress and thus AEC Prefab's ability to meet deadlines set out in the contract. This may require the need for progress or an agreement on extended delivery date. </li>
                                            <li>Payment schedule – AEC Prefab AS assumes that a reconciled payment plan is reached that provides liquidity surplus for AEC Prefab AS.</li>
                                        </ol>
                                        <p>
                                            The caveats and assumptions contained in this offer are repeated in the contract or clarified in other satisfactory manner e.g.  before the contract is signed.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>3.2.	Validity of offers and confirmation.</strong></p>
                                        <p>The offer is valid until 14 days from the day of issued. If you wish to accept the offeror to proceed into contract negotiations, we ask that you confirm this in e-mail before the end of this period.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>3.3.	Contract signature and delivery schedule</strong></p>
                                        <p>The project's start date is defined at contract signature whichinitiate our production planning. An internal progress plan is being created for the project, in accordance with the aforementioned reconciled project implementation plan (customers's project plan) and the project then enters into our production plan.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>4. Attachments to quotations</strong></p>
                                        <p>Uploaddrawing as an Attachment 1: Wall element layers</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>5. Signature</strong></p>
                                        <p>
                                            <b>For AEC Prefab AS</b> <br>

                                            Kind regards, <br>
                                            Sigbjørn Daasvatn <br>
                                            Managing Director <br>

                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    {{-- </textarea> --}}
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
            padding: 5px 10px !important ;
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
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/inline/ckeditor.js"></script> --}}


    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) ).catch( error => {
             console.error( error );
        } );
        ClassicEditor.create( document.querySelector( '#editor2' ) ).catch( error => {
             console.error( error );
        } );
    </script>
     
@endpush