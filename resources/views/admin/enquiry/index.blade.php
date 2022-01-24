@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page"  ng-app="AdminEnqView">
        <div class="content"  ng-controller="EnqController" >

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
                            <a  href="{{ route('admin.enquiry-create') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> New Enquiry</a>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        <table datatable="ng" dt-options="vm.dtOptions" class="table table-responsive nowrap table-striped custom">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Enquiry No</th>
                                    <th>Contact person</th>
                                    <th>Mobile number</th>
                                    <th>Esti. Date</th>
                                    <th>Pipeline</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody> 
                                <tr ng-repeat="(index,m) in module_get">
                                    <td> @{{ index+1 }}</td>
                                    <td class="text-center"> 
                                        <span ng-click="toggle('edit', m.id)" class="badge badge-primary-lighten btn  p-2">@{{ m.enquiry_number }}</span>
                                    </td>
                                    <td>@{{ m.customer.contact_person }}</td>
                                    <td>@{{ m.customer.mobile_no }}</td>
                                    <td>@{{ m.enquiry_date }}</td>
                                    <td class="text-center">
                                        <div class="d-flex" id="toolTip_@{{ index+1 }}" ng-click="toggle('edit', m.id)">
                                            <button type="button" class="btn progress-btn active" data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Enquiry initiation"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical assessment"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Cost Estimated"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Invoice placed"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Proposal sharing"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project delivered"> </button>
                                        </div>
                                    </td>
                                    <td class="text-center">	
                                        <span class="badge bg-success shadow-sm rounded-pill">Active</span>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-info btn-sm  rounded-pill shadow-sm" href="{{ route('view-enquiry') }}/@{{ m.id }}"><i class="mdi mdi-eye"></i></a>
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
                                    <table class="custom table table-bordered m-0">
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
                                      <h2 class="accordion-header m-0 position-relative" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Project Information
                                        </button>
                                        <div class="icon m-0 position-absolute" style="right: 10px;top:25%; z-index:111 !important">
                                            <i 
                                                data-bs-toggle="collapse" 
                                                href="#collapseOne" 
                                                aria-expanded="true" 
                                                aria-controls="collapseOne" 
                                                class="accordion-button custom-accordion-button   bg-primary text-white toggle-btn ">
                                            </i>
                                        </div>
                                      </h2>
                                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mx-0 container ">
                                                <div class="col-12 text-center">
                                                    <h4 class="f-20 m-0 p-3">Project Information</h4> 
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <table class="table m-0 custom table-bordered">
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
                                                                    </th><td  class="bg-white">@{{ enqData.project_type_name }}</td>
                                                                </tr> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <table class="table m-0  custom table-bordered">
                                                    <tbody><tr class="border">
                                                            <th  class=" ">Type of Building
                                                            </th><td  class="bg-white">@{{ enqData.building_type_name }}</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Number of Buildings
                                                            </th><td  class="bg-white">@{{ enqData.no_of_building }}</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Type of Delivery
                                                            </th><td  class="bg-white">@{{ enqData.delivery_type_name }}</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Delivery Date 
                                                            </th><td  class="bg-white">@{{ enqData.project_delivery_date }}</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">State
                                                            </th><td  class="bg-white">@{{ enqData.state }}</td>
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
                                      <h2 class="accordion-header position-relative" id="headingTwo">
                                        <button class="accordion-button custom-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Services Selection
                                        </button>
                                        <div class="icon m-0 position-absolute" style="right: 10px;top:25%; z-index:111 !important">
                                            <i 
                                                data-bs-toggle="collapse" 
                                                href="#collapseTwo" 
                                                aria-expanded="true" 
                                                aria-controls="collapseTwo" 
                                                class="accordion-button custom-accordion-button  collapsed  bg-primary text-white toggle-btn ">
                                            </i>
                                        </div>
                                      </h2>
                                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mx-0 container ">
                                                <div class="col-12 text-center">
                                                    <h4 class="f-20 m-0 p-3">Selected Services</h4>
                                                </div>
                                                <div class="col-md-6 p-3 mx-auto">
                                                    <table class="table m-0 custom  table-bordered">
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
                                        <h2 class="accordion-header position-relative" id="headingThree">
                                            <button class="accordion-button custom-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                FC Model & Upload Docs 
                                            </button>
                                            <div class="icon m-0 position-absolute" style="right: 10px;top:25%; z-index:111 !important">
                                                <i 
                                                    data-bs-toggle="collapse" 
                                                    href="#collapseThree" 
                                                    aria-expanded="true" 
                                                    aria-controls="collapseThree" 
                                                    class="accordion-button custom-accordion-button  collapsed  bg-primary text-white toggle-btn ">
                                                </i>
                                            </div>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <table class="table m-0  custom">
                                                                                
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
                                        <h2 class="accordion-header  position-relative" id="headingThreer">
                                            <button class="accordion-button custom-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreer" aria-expanded="false" aria-controls="collapseThree">
                                                Building components
                                            </button>
                                            <div class="icon m-0 position-absolute" style="right: 10px;top:25%; z-index:111 !important">
                                                <i 
                                                    data-bs-toggle="collapse" 
                                                    href="#collapseThreer" 
                                                    aria-expanded="true" 
                                                    aria-controls="collapseThreer" 
                                                    class="accordion-button custom-accordion-button  collapsed  bg-primary text-white toggle-btn ">
                                                </i>
                                            </div>
                                        </h2>
                                        <div id="collapseThreer" class="accordion-collapse collapse" aria-labelledby="headingThreer" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row mx-0 container ">
                                                    <div class="col-12 text-center">
                                                        <h4 class="f-20 m-0 p-3">Building components</h4>
                                                    </div>
                                                    <div class="col-md-8 p-3 mx-auto">
                                                        <table class="table m-0 custom table-bordered " id="menu-table">
                                                            
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
                                        <h2 class="accordion-header  position-relative" id="headingThreew">
                                            <button class="accordion-button custom-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreew" aria-expanded="false" aria-controls="collapseThreew">
                                                Additional Info
                                            </button>
                                            <div class="icon m-0 position-absolute" style="right: 10px;top:25%; z-index:111 !important">
                                                <i 
                                                    data-bs-toggle="collapse" 
                                                    href="#collapseThreew" 
                                                    aria-expanded="true" 
                                                    aria-controls="collapseThreew" 
                                                    class="accordion-button custom-accordion-button  collapsed  bg-primary text-white toggle-btn ">
                                                </i>
                                            </div>
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
 

@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/all-enquiries.js") }}"></script>   
@endpush