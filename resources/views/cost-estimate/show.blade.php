@extends('layouts.cost-estimate')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content">
          
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('cost-estimate.includes.page-navigater')

                <!-- end page title -->
                  <!-- Start Content-->
                <div class="container-fluid d-none" id="CostEstimateController">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#project_summary" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                <div class="mx-auto inner-circle bg-secondary">
                                    <img src="{{ asset('public/assets/icons/information.png') }}" class="w-50 invert">
                                </div>
                                <span class="d-none d-md-block">Project Summary</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#cost_estimate" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                <div class="mx-auto inner-circle bg-secondary">
                                    <img src="{{ asset('public/assets/icons/budget.png') }}" class="w-50 invert">
                                </div>
                                <span class="d-none d-md-block">Cost Estimate</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="project_summary" ng-controller="ProjectSummaryController">
                            @include("admin.enquiry.models.chat-box")
                            <div class="summary-group py-3 accordion rounded-0" id="summaryGroupx">
                                {{-- ProjectInfo --}}
                                    <fieldset class="accordion-item">
                                        <div class="accordion-header custom m-0 position-relative" id="ProjectInfo_header">
                                            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#ProjectInfo" aria-expanded="true" aria-controls="ProjectInfo">
                                                <span class="position-relative btn py-0">Project Information <small class="badge rounded-circle  bg-danger" ng-show="enquiry_active_comments.project_information > 0"> @{{ enquiry_active_comments.project_information   }}</small></span> 
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
                                                <table class="table custom m-0 table-hover">
                                                    <tbody>
                                                        <tr ng-if="project_info.project_name != null">
                                                            <td width="30%"><b>Project Name</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.project_name }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.site_address != null">
                                                            <td><b>Construction Site Address</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.site_address }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.contact_person != null">
                                                            <td><b>Contact Person name</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.contact_person }} </td>
                                                        </tr> 
                                                        <tr ng-if="customer_info.email != null">
                                                            <td><b>Email</b></td>
                                                            <td>:</td>
                                                            <td>@{{ customer_info.email }}</td>
                                                        </tr> 
                                                        <tr ng-if="customer_info.mobile_no != null">
                                                            <td><b>Contact number</b></td>
                                                            <td>:</td>
                                                            <td>@{{ customer_info.mobile_no }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.secondary_mobile_no != null">
                                                            <td><b>Secondary Contact number</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.secondary_mobile_no }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.zipcode != null">
                                                            <td><b>Zip Code</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.zipcode }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.place != null">
                                                            <td><b>Place</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.place }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.state != null">
                                                            <td><b>State</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.state }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.country != null">
                                                            <td><b>Country</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.country }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.project_typproject_info.project_type_name != null">
                                                            <td><b>Type of Project</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.project_typproject_info.project_type_name }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.building_typproject_info.building_type_name != null">
                                                            <td><b>Type of Building</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.building_typproject_info.building_type_name }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.no_of_building != null">
                                                            <td><b>No. of Buildings</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.no_of_building }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.delivery_typproject_info.delivery_type_name != null">
                                                            <td><b>Type of Delivery</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.delivery_typproject_info.delivery_type_name }}</td>
                                                        </tr> 
                                                        <tr ng-if="project_info.project_delivery_date != null">
                                                            <td><b>Delivery Date</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.project_delivery_date  | date: 'dd-MM-yyyy'  }}</td>
                                                        </tr> 
                                                
                                                        <tr ng-if="project_info.customerremarks != null">
                                                            <td><b>Remarks</b></td>
                                                            <td>:</td>
                                                            <td>@{{ project_info.customer.remarks }}</td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                                {{-- <form id="project_information__commentsForm" ng-submit="sendComments('project_information','Admin')" class="input-group mt-3">
                                                    <input required type="text" ng-model="project_information__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                                </form>  
                                                <div class="text-end pt-2">
                                                    <a class="text-primary p-0 btn"   ng-show="enquiry_comments.project_information"  ng-click="showCommentsToggle('viewConversations', 'project_information', 'Project Information')">
                                                        <i class="mdi mdi-eye"></i>  Previous chat history
                                                    </a>
                                                </div> --}}
                                            </div> 
                                        </div>
                                    </fieldset>
                                {{-- ProjectInfo --}}
                            
                                {{-- Selected Services --}}
                                    <fieldset class="accordion-item">
                                        <div class="accordion-header custom m-0 position-relative" id="service_header">
                                            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#service" aria-expanded="false" aria-controls="service">
                                                <span class="position-relative btn py-0">Selected Services <small class="badge rounded-circle  bg-danger" ng-show="enquiry_active_comments.service > 0"> @{{ enquiry_active_comments.service   }}</small></span> 
                                            </div>
                                            <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                                                <i data-bs-toggle="collapse" 
                                                    href="#service" 
                                                    aria-expanded="false" 
                                                    aria-controls="service" 
                                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                                                    >
                                                </i>
                                            </div>
                                        </div>
                                        <div id="service" class="accordion-collapse collapse" aria-labelledby="service_header" data-bs-parent="#summaryGroup">
                                            <div class="accordion-body">  
                                                <ul>
                                                    <li ng-repeat="(key,outputType) in services" class=""> @{{ key }}
                                                        <ul  class="row m-0 ">
                                                            <li ng-repeat="service in outputType" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
                                                        </ul>
                                                    </li>
                                                </ul>   
                                                {{-- <form id="service__commentsForm" ng-submit="sendComments('service','Admin')" class="input-group mt-3">
                                                    <input required type="text" ng-model="service__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                                </form>  
                                                <div class="text-end pt-3">
                                                    <a class="text-primary p-0 btn"   ng-show="enquiry_comments.service"  ng-click="showCommentsToggle('viewConversations', 'service', 'Selected Services')">
                                                        <i class="fa fa-eye"></i>  Previous chat history
                                                    </a>
                                                </div> --}}
                                            </div> 
                                        </div>
                                    </fieldset> 
                                {{-- Selected Services --}}
                            
                                {{-- IFC Models & Uploaded Documents --}}
                                    <fieldset class="accordion-item">
                                        <div class="accordion-header custom m-0 position-relative" id="ifc_model_header">
                                            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#ifc_model" aria-expanded="false" aria-controls="ifc_model">
                                                <span class="position-relative btn py-0">IFC Models & Uploaded Documents <small class="badge rounded-circle  bg-danger" ng-show="enquiry_active_comments.ifc_model > 0"> @{{ enquiry_active_comments.ifc_model   }}</small></span> 
                                            </div>
                                            <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                                <i data-bs-toggle="collapse" 
                                                href="#ifc_model" 
                                                aria-expanded="false" 
                                                aria-controls="ifc_model" 
                                                class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed ">
                                                </i>
                                            </div>
                                        </div>
                                        <div id="ifc_model" class="accordion-collapse collapse " aria-labelledby="ifc_model_header" data-bs-parent="#summaryGroup">
                                            <div class="accordion-body"> 
                                                <table class="table custom custom table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th><b>S.No</b></th>
                                                            <th><b>Date</b></th>
                                                            <th><b>File Type</b></th>
                                                            <th><b>View Type</b></th>
                                                            <th class="text-center" width="150px"><b>Action</b></th>
                                                        </tr>
                                                        <tbody>
                                                            <tr ng-repeat="ifc_model_upload in ifc_model_uploads">
                                                                <td> @{{ $index + 1}} </td>
                                                                <td> @{{ ifc_model_upload.created_at | date: 'dd-MM-yyyy' }}</td>
                                                                <td> @{{ ifc_model_upload.pivot.file_type }}</td>
                                                                <td> @{{ ifc_model_upload.document_type_name }}</td>
                                                                <td class="text-center">
                                                                    <a download="@{{ ifc_model_upload.pivot.file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.pivot.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                                                    {{-- <a ng-show="!autoDeskFileType.includes(ifc_model_upload.pivot.file_type)" target="_child" href="{{ url('/') }}/get-enquiry-document/@{{ifc_model_upload.pivot.id }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a> --}}
                                                                    <a ng-show="!autoDeskFileType.includes(ifc_model_upload.pivot.file_type)"  ng-click="getDocumentView(ifc_model_upload.pivot)" ><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                                                    <a ng-show="autoDeskFileType.includes(ifc_model_upload.pivot.file_type)" target="_child" href="{{ url('/') }}/viewmodel/@{{ ifc_model_upload.pivot.id }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </thead>
                                                </table>
                                                {{-- <form id="ifc_model__commentsForm" ng-submit="sendComments('ifc_model','Admin')" class="input-group mt-3">
                                                    <input required type="text" ng-model="ifc_model__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                                </form>  
                                                <div class="text-end pt-3">
                                                    <a class="text-primary p-0 btn"  ng-show="enquiry_comments.ifc_model"  ng-click="showCommentsToggle('viewConversations', 'ifc_model', 'IFC Models & Uploaded Documents')">
                                                        <i class="fa fa-eye"></i>  Previous chat history
                                                    </a>
                                                </div> --}}
                                            </div> 
                                        </div>
                                    </fieldset>  
                                {{-- IFC Models & Uploaded Documents --}}
                            
                                {{-- Building Components --}}
                                    <fieldset class="accordion-item">
                                        <div class="accordion-header custom m-0 position-relative" id="building_components_header">
                                            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#building_components" aria-expanded="false" aria-controls="building_components">
                                                <span class="position-relative btn py-0">Building Components<small class="badge rounded-circle  bg-danger" ng-show="enquiry_active_comments.building_components > 0"> @{{ enquiry_active_comments.building_components   }}</small></span> 
                            
                                            </div>
                                            <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                                <i data-bs-toggle="collapse" 
                                                    href="#building_components" 
                                                    aria-expanded="false" 
                                                    aria-controls="building_components" 
                                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "></i>
                                            </div>
                                        </div>
                                        <div id="building_components"  ng-show="project_info.building_component_process_type == 0" class="accordion-collapse collapse  " aria-labelledby="building_components_header" data-bs-parent="#summaryGroup">
                                            <div class="accordion-body">  
                                                {{-- <div  style="max-height: 400px; overflow:auto"> 
                                                    <table class="table custom table-bordered" ng-init="total = 0 ">
                                                        <tbody >
                                                            <tr class="table custom-bold text-center">
                                                                <th style="padding: 0 !important" colspan="2">
                                                                    <table class="table custom m-0 custom">
                                                                        <tr>
                                                                            <th width="50%">
                                                                                Wall details
                                                                            </th>
                                                                            <th style="padding: 0 !important" width="50%">
                                                                                Layer details
                                                                            </th>
                                                                        </tr>
                                                                    </table>
                                                                </th>
                                                            </tr> 
                                                            <tr ng-repeat="building_component in building_components" ng-show="building_component.detail.length">
                                                                <td>@{{ building_component.wall }}</td>
                                                                <td style="padding: 0 !important" >
                                                                    <table class="table custom m-0 custom">
                                                                        <tr ng-repeat="detail in building_component.detail"> 
                                                                            <td width="50%">
                                                                                <table class="table custom m-0 table-bordered">
                                                                                    <tr>
                                                                                        <th>Floor</th>
                                                                                        <th>wall Number</th>
                                                                                        <th>Type of Delivery</th>
                                                                                        <th >Total Area </th>
                                                                                    </tr> 
                                                                                    <tr>
                                                                                        <td>@{{ detail.floor }}</td>
                                                                                        <td>@{{ detail.exd_wall_number }}</td>
                                                                                        <td>@{{ detail.delivery_type.delivery_type_name }}</td>
                                                                                        <td ng-init="$parent.total = $parent.total ++ detail.approx_total_area">@{{ detail.approx_total_area }}</td>
                                                                                    </tr> 
                                                                                </table>
                                                                            </td>
                                                                            <td style="padding: 0 !important" width="50%">
                                                                                <table class="table custom m-0 table-bordered">
                                                                                    <tr class="table custom-bold">
                                                                                        <th>Name</th>
                                                                                        <th>Thickness</th>
                                                                                        <th>Breadth</th>
                                                                                    </tr> 
                                                                                    <tr ng-repeat="layer in detail.layer">
                                                                                        <td>@{{ layer.layer_name }}</td>
                                                                                        <td>@{{ layer.thickness }}</td>
                                                                                        <td>@{{ layer.breath }}</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr> 
                                                                    </table> 
                                                                </td>
                                                            </tr>  
                                                        </tbody>                     
                                                    </table> 
                                                </div>  --}}
                                                <table class="table table-bordered m-0 table-striped" ng-init="total = 0 ">
                                                    <tbody > 
                                                        <tr ng-repeat="building_component in building_components"  ng-show="building_component.detail.length">
                                                            <td class="text-center" width="150px">
                                                                <b>@{{ building_component.wall }}</b>
                                                            </td>
                                                            <td>
                                                                <div class="py-2" ng-repeat="detail in building_component.detail">
                                                                    <table class="shadow-sm custom border border-dark mb-0 table table-bordred bg-white">
                                                                        <thead class="table-secondary text-dark">
                                                                            <tr>
                                                                                <th>Floor</th>
                                                                                <th>Type of Delivery</th>
                                                                                <th>Total Area </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="text-align: left !important">@{{ detail.floor }} </td>
                                                                                <td>@{{ detail.delivery_type.delivery_type_name }}</td>
                                                                                <td >@{{ building_component.totalWallArea }}</td> 
                                                                            </tr>
                                                                        </tbody> 
                                                                    </table>
                                                                    <table class="shadow-sm border table-bordered border-dark table m-0 bg-white">
                                                                        <thead>
                                                                            <tr> 
                                                                                <td><b>Name</b></td>
                                                                                <td><b>Thickness (mm)</b></td>
                                                                                <td><b>Breadth (mm)</b></td>
                                                                            </tr> 
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr ng-repeat="layer in detail.layer">
                                                                                <td>@{{ layer.layer_name }}</td>
                                                                                <td>@{{ layer.thickness }}</td>
                                                                                <td>@{{ layer.breath }} </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div> 
                                                            </td>
                                                        </tr>  
                                                        <tr ng-show="!building_components.length">
                                                            <td colspan="4">No data found</td>
                                                        </tr>
                                                    </tbody>                     
                                                </table> 
                                                {{-- <form id="building_component__commentsForm" ng-submit="sendComments('building_components','Admin')" class="input-group mt-3">
                                                    <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                                </form>  
                                                <div class="text-end pt-3">
                                                    <a class="text-primary p-0 btn"  ng-show="enquiry_comments.building_components"   ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
                                                        <i class="fa fa-eye"></i>  Previous chat history
                                                    </a>
                                                </div>  --}}
                                            </div> 
                                        </div>
                            
                                        <div id="building_components" ng-show="project_info.building_component_process_type == 1" class="accordion-collapse collapse  " aria-labelledby="building_components_header" data-bs-parent="#summaryGroup">
                                            <div class="accordion-body">  
                                                <div  style="max-height: 400px; overflow:auto"> 
                                                    <table class="table custom custom table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th><b>S.No</b></th>
                                                                <th><b>Date</b></th>
                                                                <th><b>File Name</b></th>
                                                                <th><b>File Type</b></th>
                                                                <th class="text-center" width="150px"><b>Action</b></th>
                                                            </tr>
                                                            <tbody>
                                                                <tr ng-repeat="building_component in building_components">
                                                                    <td> @{{ $index + 1}} </td>
                                                                    <td> @{{ building_component.created_at }}</td>
                                                                    <td> @{{ building_component.file_name }}</td>
                                                                    <td> @{{ building_component.file_type }}</td>
                                                                    <td class="text-center">
                                                                        <a download="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}" href="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                                                        <a ng-click="getDocumentViews(building_component)"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </thead>
                                                    </table>
                                                </div> 
                                                {{-- <form id="building_components__commentsForm" ng-submit="sendComments('building_components','Admin')" class="input-group mt-3">
                                                    <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                                </form>  
                                                <div class="text-end pt-3">
                                                    <a class="text-primary p-0 btn"  ng-show="enquiry_comments.building_components"   ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
                                                        <i class="fa fa-eye"></i>  Previous chat history
                                                    </a>
                                                </div>  --}}
                                            </div> 
                                        </div>
                                    </fieldset>
                                {{-- Building Components --}}
                            
                                {{-- Additional Info --}}  
                                    <fieldset class="accordion-item">
                                        <div class="accordion-header custom m-0 position-relative" id="add_info_header">
                                            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#add_info" aria-expanded="false" aria-controls="add_info">
                                                <span class="position-relative btn py-0">Additional Info<small class="badge rounded-circle  bg-danger" ng-show="enquiry_active_comments.add_info > 0"> @{{ enquiry_active_comments.add_info   }}</small></span> 
                            
                                            </div>
                                            <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                                <i data-bs-toggle="collapse" 
                                                    href="#add_info" 
                                                    aria-expanded="false" 
                                                    aria-controls="add_info" 
                                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn collapsed"></i>
                                            </div>
                                        </div>
                                        <div id="add_info" class="accordion-collapse collapse  " aria-labelledby="add_info_header" data-bs-parent="#summaryGroup">
                                            <div class="accordion-body">  
                                                <div class="form-floating" id="additional_info_text_editor" style="pointer-events: none">
                                                    <div dx-html-editor="htmlEditorOptions" contenteditable="true"> </div>
                                                </div>
                                            </div>
                                            {{-- <form id="add_info__commentsForm" ng-submit="sendComments('add_info','Admin')" class="input-group mt-3">
                                                <input required type="text" ng-model="add_info__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                                <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                            </form>  
                                            <div class="text-end pt-3">
                                                <a class="text-primary p-0 btn" ng-show="enquiry_comments.add_info"   ng-click="showCommentsToggle('viewConversations', 'add_info', 'Additional Information')">
                                                    <i class="fa fa-eye"></i>  Previous chat history
                                                </a>
                                            </div> --}}
                                        </div> 
                                    </fieldset> 
                                {{-- Additional Info --}}
                            </div>
                        </div>
                        <div class="tab-pane show active" id="cost_estimate">
                            <div class="tab-pane show active" id="cost_estimate" ng-controller="CostEstimateController" >
                                <div class="content container-fluid">
                                    <div class="main"> 
                                        <div class="row m-0"> 
                                            <div class="card-header pb-2 p-3 text-center border-0">
                                                <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.customer_info.contact_person }}</span></h4>
                                            </div>
                                            <div class="card-body pt-0 p-0">
                                                <table class="table custom shadow-none border m-0 table-bordered ">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>Enquiry Received Date</th>
                                                            <th>Person Contact</th>
                                                            <th>Type of Building</th>
                                                            <th>Enquiry Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>@{{ enquiry.enquiry.enquiry_date }}</td>
                                                            <td>@{{ enquiry.enquiry.customer.contact_person }}</td>
                                                            <td>@{{ enquiry.building_type.building_type_name  }}</td>
                                                            <td><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </div>
                                           
                                            <div class="container-fluid">
                                                <br>
                                                <div class="row m-0  my-3">
                                                    <div class="col">
                                                        <label class="lead">
                                                            <input type="radio" ng-model="price_calculation" name="price_calculation"
                                                            class="form-check-input me-2"
                                                                ng-value="'wood_engineering_estimation'">
                                                            Wood Engineering Estimation
                                                        </label>
                                                    </div>
                                                    <div class="col">
                                                        <label class="lead">
                                                            <input type="radio" ng-model="price_calculation" name="price_calculation"
                                                            class="form-check-input me-2"
                                                                ng-value="'precast_engineering_estimation'">
                                                            Precast Engineering Estimation
                                                        </label>
                                                    </div>
                                        
                                                </div>
                                                <div ng-show="price_calculation == 'wood_engineering_estimation'">
                                                    @include('admin.enquiry.wizard.wood-estimation')
                                                </div>
                                                <div ng-show="price_calculation == 'precast_engineering_estimation'">
                                                    @include('admin.enquiry.wizard.precast-estimation')
                                                </div>
                                            </div>
                                         
                                            {{-- view history start--}}
                                            <div class="card border p-0 shadow-sm my-3">
                                                <div class="card-header">
                                                    <h5 class="m-0">
                                                        <a class="align-items-center d-flex  py-1" ng-click="getHistory('wood')"
                                                            ng-show="price_calculation == 'wood_engineering_estimation'">
                                                            <i class="fa fa-history me-2 fa-2x" aria-hidden="true"></i>
                                                            Cost Estimation History
                                                        </a>
                                                        <a class="align-items-center d-flex py-1" ng-click="getHistory('precast')"
                                                            ng-show="price_calculation == 'precast_engineering_estimation'">
                                                            <i class="fa fa-history me-2 fa-2x" aria-hidden="true"></i> Cost Estimation History
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="card-body bg-light p-0">
                                                    <div ng-show="price_calculation == 'wood_engineering_estimation'">
                                                        <div id="wood_id"></div>
                                                    </div>
                                                    <div ng-show="price_calculation == 'precast_engineering_estimation'">
                                                        <div id="precast_id"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- view history end--}}
                                            @if(userRole()->slug == config('global.cost_estimater'))
                                                <div class="text-end">
                                                    <button ng-click="printCostEstimate('wood')" class="btn btn-primary"
                                                        ng-show="price_calculation == 'wood_engineering_estimation'">
                                                        <i class="me-1 fa fa-print"></i> Print
                                                    </button>
                                                    <button ng-click="printCostEstimate('precast')" class="btn btn-primary"
                                                        ng-show="price_calculation == 'precast_engineering_estimation'">
                                                        <i class="me-1 fa fa-print"></i> Print
                                                    </button>
                                                    <button class="btn btn-success cost_estimate_comments_ul"  ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">
                                                        <i class="fa fa-send me-1"></i>  Send a Comments
                                                        @if(isset($comments['admin_role']))
                                                            <span class="cost_estimate_comments">
                                                                {{ $comments['admin_role']   }}
                                                            </span>
                                                        @endif
                                                    </button>
                                                </div>
                                            @endif
                                            @include("admin.enquiry.models.cost-estimate-chat-box") 
                                  
                                        </div>
                                    </div>
                                    <!-- container --> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
            <!-- container -->
    </div>
@endsection
@push('custom-styles')
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    }

    input[type=number] {
    -moz-appearance: textfield;
    }
    #wood-cost-estimate .remove_history {
        display: block !important;
    }
</style>
@endpush
@push('custom-scripts')
<script> 
    app.controller('ProjectSummaryController', function ($scope, $http, API_URL,  $location) {
            $scope.enquiry_id =  '{{ $enquiry_id }}';
            var enquiryId     =  '{{ $enquiry_id }}';
            getEnquiryCommentsCountById = (id) => {
                $http({
                    method: "get",
                    url:  API_URL + 'admin/comments-count/'+id ,
                }).then(function successCallback(response) {
                    $scope.enquiry_comments     = response.data;
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            getEnquiryActiveCommentsCountById = (id) => {
                $http({
                    method: "get",
                    url:  API_URL + 'admin/active-comments-count/'+id ,
                }).then(function successCallback(response) {
                    $scope.enquiry_active_comments     = response.data;
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }
    
            $scope.GetCommentsData = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $enquiry_id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status       = res.data.progress.proposal_sharing_status;
                    $scope.customer_response       = res.data.progress.customer_response;
                    $scope.enquiry_comments     = res.data.enquiry_comments;
                    $scope.enquiry_active_comments = res.data.enquiry_active_comments;
                  
                    $scope.enquiry_number       = res.data.enquiry_number;
                    $scope.enquiry_comments     = res.data.enquiry_comments;
                    $scope.enquiry_id           = res.data.enquiry_id;
                    $scope.customer_info        = res.data.customer_info;
                    $scope.project_info         = res.data.project_info;
                    $scope.services             = res.data.services;
                    $scope.ifc_model_uploads    = res.data.ifc_model_uploads;
                    $scope.building_components  = res.data.building_component;
                    $scope.additional_infos     = res.data.additional_infos;
                    $scope.htmlEditorOptions = {
                        height: 300,
                        value: ( res.data.additional_infos == null ) ? '': res.data.additional_infos.comments,
                        mediaResizing: {
                        enabled: false,
                        },
                    };
                });
            }
            $scope.showCommentsToggle = function (modalstate, type, header) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.chatHeader   = header; 
                switch (modalstate) {
                    case 'viewConversations':
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.commentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            console.log($scope.commentsData);
                            $('#viewConversations-modal').modal('show');
                            getEnquiryCommentsCountById($scope.enquiry_id);
                            getEnquiryActiveCommentsCountById($scope.enquiry_id);
                             
                        });
                        break;
                    default:
                        break;
                } 
            }
            $scope.GetCommentsData();
 
            $scope.sendInboxComments  = function(type, seen_id) { 

                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   $scope.chatType,
                    "created_by"      :   type,
                    "send_by"         :   {{ Admin()->id }}
                }
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    document.getElementById("Inbox__commentsForm").reset();
                    $scope.showCommentsToggle('viewConversations', $scope.chatType);
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }
            
            $scope.sendComments  = function(type, created_by, seen_id) { 
       
                $scope.sendCommentsData = {
                    "comments"        :   $scope[`${type}__comments`],
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   type,
                    "created_by"      :   created_by,
                    "send_by"         :   {{ Admin()->id }}
                }
              
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    if(type == 'building_components'){
                        document.getElementById(`building_component__commentsForm`).reset();
                    }
                    document.getElementById(`${type}__commentsForm`).reset();
                    // $scope.GetCommentsData();
                    Message('success',response.data.msg);
                    getEnquiryCommentsCountById($scope.enquiry_id);
                    getEnquiryActiveCommentsCountById($scope.enquiry_id);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            } 

            $scope.getDocumentView = (file) => {
                $http({
                    method: 'POST',
                    url: `${API_URL}get-document-modal`,
                    data: {url: file.file_name},
                    }).then(function success(res) {
                        if(file.file_type == 'pdf')
                            var htmlPop = '<iframe id="iframe" src="data:application/pdf;base64,'+res.data+'"  width="100%" height="1000" allowfullscreen webkitallowfullscreen disableprint=true; ></iframe>';
                        else
                            var htmlPop = '<embed width="100%" height="1000" src="data:image/png;base64,'+res.data+'"></embed>'; 
                        $("#document-content").html(htmlPop);
                        $("#document-modal").modal('show');
                    }, function error(res) {

                });
            }
            $scope.getDocumentViews = (file) => {
                $http({
                    method: 'POST',
                    url: `${API_URL}get-document-modal`,
                    data: {url: file.file_path},
                    }).then(function success(res) {
                        if(file.file_type == 'pdf')
                            var htmlPop = '<iframe id="iframe" src="data:application/pdf;base64,'+res.data+'"  width="100%" height="1000" allowfullscreen webkitallowfullscreen disableprint=true; ></iframe>';
                        else
                            var htmlPop = '<embed width="100%" height="1000" src="data:image/png;base64,'+res.data+'"></embed>'; 
                        $("#document-content").html(htmlPop);
                        $("#document-modal").modal('show');
                    }, function error(res) {

                });
            }
    });
    app.controller('CostEstimateController', function ($scope, $http, $timeout, API_URL) {
            let enquiryId           =  '{{ $enquiry_id }}';
            $scope.current_user     =  '{{Admin()->id}}';
            $scope.historyStatus    =  true

            $scope.printCostEstimate = (type) => {
                $http.get(`${API_URL}cost-estimate/get-history/${$scope.enquiry_id}/${type}`)
                .then((res) => {
                    var currentTabelHistory   =   ''
                    res.data.forEach((item,i) => {
                        currentTabelHistory += item.history  
                    })
                    const currentTabel          =   $(".costEstimateCurrentData").html()
                    var a = window.open('', '', 'height=10000, width=10000');
                    a.document.write('<html>');
                    a.document.write('<body>');
                    a.document.write(`
                        <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
                        <link href="{{ asset('public/assets/css/app.css') }}"  rel="stylesheet" type="text/css"   />
                        <link href="{{ asset('public/assets/css/app.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
                        <link rel="stylesheet" href="{{ asset('public/custom/css/alert.css') }}">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
                        <link rel="stylesheet" href="https://dropways.github.io/feathericons/assets/themes/twitter/css/feather.css"> 
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
                        <link rel="stylesheet" href="{{ asset('public/custom/css/variable.css') }}"> 
                        <link rel="stylesheet" href="{{ asset('public/custom/css/app.css') }}"> 
                        <link rel="stylesheet" href="{{ asset('public/custom/css/table.css') }}">
                        <style>.card {border:0 !important; box-shadow: none !important} .card-header , button , .fa {display:none !important} .card-body { padding : 0 !important}  .custom-border-left{border-left:1px solid #000!important}.custom-border-bottom{border-bottom:1px solid #000!important}.custom-td{border-right:1px solid #000!important;border-top:1px solid #000!important;border-left:none!important;border-bottom:none!important;width:100px!important;min-width:100px!important;max-width:100px!important;display:flex;justify-content:center;align-items:center;flex-direction:column}.custom-td *{font-size:12px!important}.custom-row{display:inline-flex!important}.custom-td input{padding:0!important;height:100%;width:100%}.custom-td input,.custom-td select{color:#000!important}</style>
                    `);
                    a.document.write(currentTabel);
                    a.document.write(currentTabelHistory);
                    a.document.write('</html>');
                    a.document.close();
                    a.print();
                }); 
            }

            $scope.getHistory       = (type)  => {
                $http.get(`${API_URL}cost-estimate/get-history/${$scope.enquiry_id}/${type}`)
                    .then(function successCallback(res){
                        $scope.historyStatus    =   false
                        var costId              =   $(`#${type}_id`);
                        $(costId).html('');
                        $scope.costEstimateHistoryData = res.data
                        res.data.length && res.data.map((item, key) => {
                            $(costId).append(` 
                                <div class="card  p-2 border shadow-sm m-2">
                                    <div id="headingTableHistory${key+1}">
                                        <h5 class="m-0 d-flex align-items-center">
                                            <a class="custom-accordion-title collapsed d-block py-1"
                                                data-bs-toggle="collapse" href="#collapseTableHistory${key+1}"
                                                aria-expanded="true" aria-controls="collapseTableHistory${key+1}">
                                                <strong class="me-auto text-dark">Version : ${key+1}</strong>
                                                <span> - </span>
                                                <span>
                                                    <span class="fa fa-calendar text-dark"></span>
                                                    <small>${moment(item.created_at).format('dd-MM-yyyy h:s a')}</small>
                                                </span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTableHistory${key+1}" class="collapse ${key == 0 && 'show'}"
                                        aria-labelledby="headingTableHistory${key+1}" >
                                            ${item.history}
                                    </div>
                                </div> 
                            `); 
                        });
                    }, function errorCallback(error){
                        console.log(error);
                });
            }

            getUsers = () => {
                $http.get(`${API_URL}admin/get-costestimate-employee`)
                .then(function successCallback(res){
                    $scope.userList = res.data;
                }, function errorCallback(error){
                    console.log(error);
                });
            }
            getUsers();

            $scope.assignUserToCostestimate = (user, cost_estimate_assign_for) => {
                let assign_to = user == '' ? null: user;
                if($scope.assign_to == '') {
                    Message('danger', "Please choose a user !");
                    return false;
                }
                $http.post(`${API_URL}cost-estimate/assign-user/${enquiryId}`, {assign_to: assign_to, type: cost_estimate_assign_for})
                    .then(function successCallback(res){
                       
                        if(res.data.status) {
                            $scope.getWizradStatus();
                            Message('success', res.data.msg);
                            return false;
                        }
                        Message('error', res.data.msg);
                    }, function errorCallback(error){
                        console.log(error);
                });
            }

            $scope.removeUser = () => {
                $scope.assign_to != '' && $http.post(`${API_URL}cost-estimate/remove-user/${enquiryId}`)
                    .then(function successCallback(res){
                        if(res.data.status) {
                            $scope.getWizradStatus();
                            $scope.assign_to = '';
                            Message('success', res.data.msg);
                            return false;
                        }
                    }, function errorCallback(error){
                        Message('danger', 'Something went wrong please contact administrator');
                    });
            }

            $scope.gotoNext = function() {
                $http.post(`${API_URL}cost-estimate/update-status/${enquiryId}`)
                .then(function successCallback(res){
                    $location.path('/proposal-sharing');
                });
            }

            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $enquiry_id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status      = res.data.progress.proposal_sharing_status;
                    $scope.customer_response            = res.data.progress.customer_response; 
                    $scope.cost_estimate                = res.data.cost_estimate;
                    $scope.ResultEngineeringEstimate    = JSON.parse(res.data.cost_estimate.build_json);
                    $scope.ResultPrecastComponent       = JSON.parse(res.data.cost_estimate.precast_build_json);
                    $scope.EngineeringEstimate          = $scope.ResultEngineeringEstimate.costEstimate;
                    $scope.PrecastComponent             = $scope.ResultPrecastComponent.precastEstimate;
                });
            }
            $scope.getWizradStatus();
          
            $scope.enquiry_id = '{{ $enquiry_id }}';
            // =========== Cost Estimate  ============
            $http.get("{{ route("CostEstimateData") }}").then(function (response) {
                $scope.cost = response.data; 
            });
            $http.get("{{ route('CostEstimateView', $enquiry_id) }}").then(function (response) {
                console.log(response.data.others);
                $scope.enquiry          =   response.data;  
                $scope.CostEstimate     =   response.data.cost_estimation; 
                $scope.assign_to        =   response.data.others.assign_to ?? '';
            });

            $scope.UpdateCostEstimate  = function(type) {  
                
                if($scope.EngineeringEstimate.length == 0){
                    Message('danger', "You Can't Update Empty Data");
                    return false;
                }
                if(type == 'wood') {
                    var data = $scope.ResultEngineeringEstimate;
                    var html =  $("#wood-cost-estimate").html();
                } else {
                    var data = $scope.ResultPrecastComponent;
                    var html =  $("#precast-cost-estimate").html();
                }
              
                let total =  $scope.ResultEngineeringEstimate.total.totalSum +  $scope.ResultPrecastComponent.total.totalSum;
                $http({
                    method: "POST",
                    url: "{{ route('enquiry-create.cost-estimate-value') }}",
                    data:{ enquiry_id: $scope.enquiry_id, data : data, type: type, total : total, history: true, html:html},
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $scope.getWizradStatus();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                }); 
            }

            $scope.sendAssignCostEstiComments  = function(type , chatSection) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   chatSection,
                    "created_by"      :   type,
                    "role_by"         : `Cost Estimater ${type}`
                }
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    document.getElementById("Inbox__commentsForm").reset();
                    $scope.showTechCommentsToggle('viewConversations', 'cost_estimation_assign', chatSection);
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }  

            $scope.showTechCommentsToggle = function (modalstate, type, docId) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.technical_docType_id   = docId; 
                $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                    $scope.commentsData = response.data.chatHistory; 
                    $scope.chatType     = response.data.chatType;  
                    $('#assing-viewConversations-modal').modal('show');
                });
            }

            $scope.showCommentsToggle = function (modalstate, type, header) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.chatHeader   = header; 
                switch (modalstate) {
                    case 'viewConversations':
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.commentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            $('#assing-viewConversations-modal').modal('show');
                        });
                        break;
                    default:
                        break;
                } 
            }
     // cost estimate calculation start..
            $scope.editable = false;
            $scope.wood_estimate_edit_id = false;
            $scope.precast_estimate_edit_id = false;
            $scope.wood_estimate_name = '';
            $scope.precast_estimate_name = '';
            $scope.price_calculation = 'wood_engineering_estimation';
            $scope.EngineeringEstimate = [];
            $scope.editorEnabled = false; // precast
            $scope.template_name = '';
            $scope.is_template_update = false;
            $scope.is_precast_template_update = false;

            $scope.callWoodTemplate = (pos) => {
                $scope.costEstimateWoodTemplate = $scope.EngineeringEstimate[pos];
                $("#cost-estimate-wood-template-modal").modal('show');
            }   

            $scope.addWoodTemplate = (type) => {
                if($scope.template_name == '') {
                    Message('danger','Template field is required');
                    return false;
                }
                let templateData = {
                    name: $scope.template_name,
                    template: $scope.costEstimateWoodTemplate,
                    type: type
                } 
                $http.post(`${API_URL}admin/cost-estimate-template`, {data:templateData})
                .then(function successCallback(res){
                    if(res.data.status) {
                        $scope.is_template_update = !$scope.is_template_update;
                        Message('success', res.data.msg);
                        $("#cost-estimate-wood-template-modal").modal('hide');
                        return false;
                    }
                    Message('danger', res.data.msg);
                });
            }

            $scope.getWoodTemplate= (id, pos) => {
                if(id != '') {
                    let template = $scope.costEstimateWoodTemplates.find(obj => obj.id === id);
                    $scope.EngineeringEstimate[pos] = JSON.parse(template.json);
                }
            }

            $scope.$watch('is_template_update', function() {
                $http({
                    method: 'GET',
                    url: `${API_URL}admin/cost-estimate-wood-template`
                    }).then(function success(res) {
                       $scope.costEstimateWoodTemplates = res.data.data;
                    }, function error(response) {
                });
            });

            
            //  precast
        $scope.callPrecastTemplate = (pos) => {
            $scope.costEstimatePrecastTemplate = $scope.PrecastComponent[pos];
            $("#cost-estimate-precast-template-modal").modal('show');
        }   

        $scope.addPrecastTemplate = (type) => {
            if($scope.template_name == '') {
                Message('danger','Template field is required');
                return false;
            }
            let templateData = {
                name: $scope.template_name,
                template: $scope.costEstimatePrecastTemplate,
                type: type
            } 
            $http.post(`${API_URL}admin/cost-estimate-template`, {data:templateData})
            .then(function successCallback(res){
                if(res.data.status) {
                    $scope.is_precast_template_update = !$scope.is_precast_template_update;
                    Message('success', res.data.msg);
                    $("#cost-estimate-precast-template-modal").modal('hide');
                    return false;
                }
                Message('danger', res.data.msg);
            });
        }

        $scope.getPrecastTemplate= (id, pos) => {
            if(id != '') {
                let template = $scope.costEstimatePrecastTemplates.find(obj => obj.id === id);
                $scope.PrecastComponent[pos] = JSON.parse(template.json);
            }
        }

        $scope.$watch('is_precast_template_update', function() {
            $http({
                method: 'GET',
                url: `${API_URL}admin/cost-estimate-precast-template`
                }).then(function success(res) {
                    $scope.costEstimatePrecastTemplates = res.data.data;
                }, function error(response) {
            });
        });

            $http.get(`${API_URL}wood-estimate-json`).then((res) => {
                $scope.NewCostEstimate = res.data.json;
                let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            });
            $scope.precastEstimateTypeObj = {};
            $http.get(`${API_URL}precast-estimate`).then((res) => {
                $scope.precastEstimateTypes = res.data;
                res.data.forEach((item) => {
                    $scope.precastEstimateTypeObj[item.id] = item.name;
                });
            });

            $http.get(`${API_URL}get-cost-estimate-types`).then((res) => {
                $scope.costEstimateTypes = res.data;
            });

            $scope.createNewCalculation = (type) => {
                if(type == 'wood') {
                    $scope.wood_estimate_edit_id = false;
                    $scope.wood_estimate_name = '';
                    $scope.EngineeringEstimate.length = 0;
                    let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                    $scope.EngineeringEstimate.push(newCostEstimate);
                } else {
                    $scope.precast_edit_id = false;
                    $scope.precast_estimate_name = '';
                    $scope.PrecastComponent.length = 0;
                    let newPrecastComponent = JSON.parse(JSON.stringify(precastComponent));
                    $scope.PrecastComponent.push(newPrecastComponent);
                }
            
            }
        
            $scope.addDynamicColumn = (index, columnName) => {
                $scope.editable = false;
                if(columnName == '' || typeof(columnName) == 'undefined') return false;
                $scope.EngineeringEstimate[index].ComponentsTotals.Dynamics.push({
                        "name"   : columnName,
                        "PriceM2": 0,
                        "Sum"    : 0
                });

                $scope.EngineeringEstimate[index].Components.forEach( (Component) => {
                    Component.Dynamics.push({
                        "name"   : columnName,
                        "PriceM2": 0,
                        "Sum"    : 0
                    });
                });
                $http.post(`${API_URL}wood-estimate`,{name:columnName}).then((res) => {
                    console.log(res.data);
                })
                $scope.columnName = '';
            }

            $scope.deleteDynamic = (rootIndex, dynamicIndex) => {
                $scope.EngineeringEstimate[rootIndex].ComponentsTotals.Dynamics.splice(dynamicIndex, 1);

                $scope.EngineeringEstimate[rootIndex].Components.forEach( (Component) => {
                    Component.Dynamics.splice(dynamicIndex, 1);
                });
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            }

            $scope.addEngineeringEstimate = () => {
                let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                console.log(newCostEstimate);
                $scope.EngineeringEstimate.push(newCostEstimate);
            }

            $scope.deleteEngineeringEstimate = (index) => {
                $scope.EngineeringEstimate.splice(index,1);
                Message('success', 'Engineering estimation deleted successfully');
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                if($scope.EngineeringEstimate.length == 0){
                    $scope.EngineeringEstimate.totalArea = 0;
                    $scope.EngineeringEstimate.totalSum =  0;
                    $scope.EngineeringEstimate.totalPris = 0;
                }
            }

            $scope.cloneCostEstimate = (index, CostEstimate) => {
                let cloneObject = JSON.parse(JSON.stringify(CostEstimate));
                $scope.EngineeringEstimate.splice(index, 0, cloneObject);
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            }
        
            $scope.addComponent  = function(index) {
                let componentFirstObj = JSON.parse(JSON.stringify($scope.EngineeringEstimate[index].Components[0]));
                let removeVal = componentFirstObj.Dynamics.map((obj) => {
                    return {...obj, PriceM2: 0, Sum: 0};
                });
                let newObj = {...$scope.NewCostEstimate.Components[0],  ...{Dynamics: removeVal}}
                $scope.EngineeringEstimate[index].Components.push(JSON.parse(JSON.stringify(newObj)));
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            }

            $scope.delete   =   function(rootKey, index) { 
                $scope.EngineeringEstimate[rootKey].Components.splice(index,1);
                if($scope.EngineeringEstimate[rootKey].Components.length == 0) {
                    $scope.EngineeringEstimate.splice(rootKey,1);
                } 
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                Message('success', 'Component deleted successfully');
            }
        
            $scope.BuildingComponentObj = {};
            $scope.DeliveryTypeObj = {};
            $http.get(`${API_URL}delivery-type`)
            .then((res)=> {
                $scope.deliveryTypes = res.data;
                res.data.forEach((item) => {
                    $scope.DeliveryTypeObj[item.id] = item.building_type_name;
                });
            });
            
            $http.get(`${API_URL}get-for-cost-estimate`)
            .then((res)=> {
                $scope.buildingComponents = res.data;
                res.data.forEach((item) => {
                    $scope.BuildingComponentObj[item.id] = item.building_component_name;
                    $("#CostEstimateController").removeClass('d-none');
                });
            });

            
            $scope.getNum = (val) => {

                if (isNaN(val) || val == '') {
                    return 0;
                }
                return Number.parseFloat(val).toFixed(2);
            }

            // Precast
            $scope.PrecastComponent = [];
            let precastComponent = {
                    "type"                       : "Building Type 1",
                    "total_sqm"                  : 0,
                    "total_std_work_hours"       : 0,
                    "total_additional_work_hours": 0,
                    "total_hourly_rate"          : 0,
                    "total_work_hours"           : 0,
                    "engineering_cost"           : 0,
                    "total_central_approval"     : 0,
                    'total_engineering_cost'     : 0,
                    "Components" : [    
                        {
                            'precast_component': null,
                            'no_of_staircase'  : '',
                            'no_of_new_component'         : '',
                            'no_of_different_floor_height': '',
                            'sqm'                         : '',
                            'complexity'                  : '',
                            'std_work_hours'              : '',
                            'additional_work_hours'       : '',
                            'hourly_rate'                 : '',
                            'total_work_hours'            : '',
                            'engineering_cost'            : '',
                            'total_central_approval'      : '',
                            'total_engineering_cost'      : ''
                        }
                    ]
                
            };
            $scope.PrecastComponent.push(precastComponent);
            $scope.addPrecasEstimate = () => {
                $scope.PrecastComponent.push({
                    "type"                       : "Building Type 1",
                    "total_sqm"                  : 0,
                    "total_std_work_hours"       : 0,
                    "total_additional_work_hours": 0,
                    "total_hourly_rate"          : 0,
                    "total_work_hours"           : 0,
                    "engineering_cost"           : 0,
                    "total_central_approval"     : 0,
                    "Components"                 : [ 
                        {
                            'precast_component'           : '',
                            'no_of_staircase'             : '',
                            'no_of_new_component'         : '',
                            'no_of_different_floor_height': '',
                            'sqm'                         : '',
                            'complexity'                  : '',
                            'std_work_hours'              : '',
                            'additional_work_hours'       : '',
                            'hourly_rate'                 : '',
                            'total_work_hours'            : '',
                            'engineering_cost'            : '',
                            'total_central_approval'      : '',
                            'total_engineering_cost'      : ''
                        }
                    ]
                });

            }

            $scope.addPrecastComponent =  (rootKey) => {
                $scope.PrecastComponent[rootKey].Components.push(
                    {
                        'precast_component'           : '',
                        'no_of_staircase'             : '',
                        'no_of_new_component'         : '',
                        'no_of_different_floor_height': '',
                        'sqm'                         : '',
                        'complexity'                  : '',
                        'std_work_hours'              : '',
                        'additional_work_hours'       : '',
                        'hourly_rate'                 : '',
                        'total_work_hours'            : '',
                        'engineering_cost'            : '',
                        'total_central_approval'      : '',
                        'total_engineering_cost'      : ''
                    }
                );
            }

            $scope.deletePrecastComponent = (rootKey, index) => {
                $scope.PrecastComponent[rootKey].Components.splice(index,1);
                if($scope.PrecastComponent[rootKey].Components.length == 0){
                    $scope.PrecastComponent.splice(rootKey,1);
                    $timeout(function() {
                        angular.element('.psqm_').triggerHandler('keyup');
                    });
                }
                Message('success','Precast component deleted Successfully');
            }

            $scope.deletePrecastEstimate = (rootKey) => {
                $scope.PrecastComponent.splice(rootKey,1);
                Message('success','Precast estimation deleted Successfully');
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
            }

            $scope.clonePrecastEstimate = (index, precastEstimate) => {
                let cloneObject = JSON.parse(JSON.stringify(precastEstimate));
                $scope.PrecastComponent.splice(index, 0, cloneObject);
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
            }

            
            $scope.savePrecastComponent = () => {
                $http.post(`${API_URL}precast-estimate`,{name:$scope.precast_component_name, hours:  $scope.precast_component_hours})
                .then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $scope.editorEnabled = false;
                    $http.get(`${API_URL}precast-estimate`).then((res) => {
                        $scope.precastEstimateTypes = res.data;
                        res.data.forEach((item) => {
                            $scope.precastEstimateTypeObj[item.id] = item.name;
                        });
                    });
                }, function errorCallback(response) {
                    Message('danger',response.data.errors.name[0]);
                });
            }

        }).directive('getCostDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('keyup', function () {
                        $(this).addClass('bg-info');
                        let $TotalPriceM2   = 0;
                        let $TotalSum       = 0;
                        let $TotalRibSum    = 0;
                        scope.CostEstimate.ComponentsTotals.Dynamics.forEach( (item, index) => {

                             // designScope percentage validation
                             if(scope.CostEstimate.Components[scope.index].DesignScope > 100) {
                                scope.CostEstimate.Components[scope.index].DesignScope = 100;
                            } else if(scope.CostEstimate.Components[scope.index].DesignScope < 0) {
                                scope.CostEstimate.Components[scope.index].DesignScope = 1;
                            }

                            // complexity validation
                            if(scope.CostEstimate.Components[scope.index].Complexity > 2) {
                                scope.CostEstimate.Components[scope.index].Complexity = 2;
                            } else if(scope.CostEstimate.Components[scope.index].Complexity < 1) {
                                scope.CostEstimate.Components[scope.index].Complexity = 1;
                            }

                            scope.CostEstimate.Components[scope.index].Dynamics[index].Sum  = getNum(((scope.CostEstimate.Components[scope.index].Sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2  ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);
                            $TotalPriceM2   += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2);
                            $TotalSum       += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].Sum);
                        });

                        if(scope.CostEstimate.Components[scope.index].Rib.Sum != 0 && scope.CostEstimate.Components[scope.index].Rib.Sum != ''){
                            scope.CostEstimate.Components[scope.index].Sqm = 0;
                            $TotalRibSum = scope.CostEstimate.Components[scope.index].Rib.Sum * scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 ;
                            scope.CostEstimate.Components[scope.index].TotalCost.Sum = $TotalRibSum;
                        } else {
                            scope.CostEstimate.Components[scope.index].TotalCost.Sum = $TotalSum;
                            scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 = $TotalPriceM2;
                        }

                        // for column total
                        let $totalEstimateArea = 0;
                        let $totalEstimateSum = 0;
                        scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                            let $totalPrice = 0;
                            let $totalSum = 0;
                            let $sqmTotal = 0;
                            let $ribTotal = 0;
                            var $totalSql_ = 0;

                            Estimates.Components.forEach( (Component, componentIndex) => {
                                $totalSql_ += Number(Component.Sqm);
                            });

                            Estimates.ComponentsTotals.Dynamics.forEach((dynamic) => {
                                dynamic.PriceM2 = 0;
                                dynamic.Sum = 0;
                               
                            })
                            Estimates.Components.forEach( (Component, componentIndex) => {
                                
                                $sqmTotal += Number(Component.Sqm);
                                $totalEstimateArea += Number(Component.Sqm);
                                $ribTotal += Number(Component.Rib.Sum);
                                if(Component.Rib.Sum !=0 && Component.Rib.Sum !=''){
                                    $totalSum += Number(Component.Rib.Sum * Component.TotalCost.PriceM2);
                                    $totalEstimateSum += Number(Component.Rib.Sum * Component.TotalCost.PriceM2);
                                }else {
                                    Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                        Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum += Number(Dynamic.Sum);
                                        Estimates.ComponentsTotals.Dynamics[dynamicIndex].PriceM2 = getNum(Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum / $totalSql_);
                                        $totalPrice += Number(Dynamic.PriceM2);
                                        $totalSum += Number(Dynamic.Sum);
                                        $totalEstimateSum += Number(Dynamic.Sum);
                                    });
                                }
                                
                            });
                            Estimates.ComponentsTotals.TotalCost.Sum     = getNum($totalSum);
                            Estimates.ComponentsTotals.TotalCost.PriceM2 = getNum($totalSum / $sqmTotal);
                            Estimates.ComponentsTotals.Sqm               = getNum($sqmTotal);
                            Estimates.ComponentsTotals.Rib.Sum           = getNum($ribTotal);

                        });
                        scope.ResultEngineeringEstimate.total.totalArea = getNum($totalEstimateArea);
                        scope.ResultEngineeringEstimate.total.totalSum = getNum($totalEstimateSum);
                        scope.ResultEngineeringEstimate.total.totalPris = getNum($totalEstimateSum /  $totalEstimateArea);
                        scope.ResultEngineeringEstimate.costEstimate =  scope.EngineeringEstimate;
                        scope.$apply();
                    });
                },
            };
        }]).directive('getMasterData',   ['$http' ,function ($http, $scope, $apply, API_URL) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs, API_URL) {
                    element.on('change', function () {
                        var response;
                        if(scope.C.building_component_id == "" || scope.C.type_id == "") {
                            return false;
                        } 
                        $http({
                        method: 'GET',
                        url: '{{ route('CostEstimateMasterValue') }}',
                        params : {component_id: scope.C.building_component_id, type_id: scope.C.type_id}
                        }).then(function success(res) {
                            response = res.data;
                            scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                                Estimates.Components.forEach( (Component, componentIndex) => {
                                    if(scope.index == componentIndex) {
                                        Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                            if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Details') {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = response.detail_price || 0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = response.detail_sum || 0;
                                            } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Statics') {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = response.statistic_price || 0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = response.statistic_sum || 0;
                                            } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'CAD/CAM') {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = response.cad_cam_price || 0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = response.cad_cam_sum || 0;
                                            } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Logistics') {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = response.logistic_price || 0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = response.logistic_sum || 0 ;
                                            } else {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 =  0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum =  0 ;
                                            }
                                        });
                                        Estimates.Components[componentIndex].Complexity = 0;
                                        Estimates.Components[componentIndex].Sqm = 0;
                                    }
                                });
                            });
                            let finalJson = {...scope.ResultEngineeringEstimate.costEstimate, ...scope.EngineeringEstimate};
                            scope.ResultEngineeringEstimate.costEstimate =   JSON.parse(JSON.stringify(finalJson));
                        });
                    });
                },
            };
        }]).directive('getPrecastDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
        return {
            restrict: 'A',
            link : function (scope, element, attrs) {
                let eventHandle = () => {
                    // complexity validation
                    const precast_component = scope.precastEstimateTypes.find(precastEstimateType => scope.PrecastEstimate.Components[scope.index].precast_component == precastEstimateType.id);
                    if(scope.PrecastEstimate.Components[scope.index].complexity > 2) {
                        scope.PrecastEstimate.Components[scope.index].complexity= 2;
                    } else if(scope.PrecastEstimate.Components[scope.index].complexity< 1) {
                        scope.PrecastEstimate.Components[scope.index].complexity= 1;
                    }
                    if(typeof(precast_component) == 'undefined') {
                        scope.$apply();
                        return false;
                    }
                    if(scope.PrecastEstimate.Components[scope.index].no_of_staircase != 0) {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_staircase * precast_component.hours);
                    } else {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_new_component *  precast_component.hours );
                    }
                    scope.PrecastEstimate.Components[scope.index].total_work_hours = getNum(Number( scope.PrecastEstimate.Components[scope.index].std_work_hours) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours));                                                              
                    scope.PrecastEstimate.Components[scope.index].engineering_cost = getNum(
                                                                                            (Number( scope.PrecastEstimate.Components[scope.index].std_work_hours) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours)) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].hourly_rate) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].complexity)
                              
                                                                                            );
                    scope.PrecastEstimate.Components[scope.index].total_engineering_cost   = Number(scope.PrecastEstimate.Components[scope.index].engineering_cost)+ Number(scope.PrecastEstimate.Components[scope.index].total_central_approval)
                    let $total_sqm                   = 0;
                    let $total_std_work_hours        = 0;
                    let $total_additional_work_hours = 0;
                    let $total_hourly_rate           = 0;
                    let $total_work_hours            = 0;
                    let $engineering_cost      = 0;
                    let $total_central_approval      = 0;
                    let $total_engineering_cost = 0;

                    scope.PrecastEstimate.Components.forEach((row) => {
                        $total_sqm                   += Number(row.sqm);
                        $total_std_work_hours        += Number(row.std_work_hours);
                        $total_additional_work_hours += Number(row.additional_work_hours);
                        $total_hourly_rate           += Number(row.hourly_rate);
                        $total_work_hours            += Number(row.total_work_hours);
                        $engineering_cost      += Number(row.engineering_cost);
                        $total_central_approval      += Number(row.total_central_approval);
                        $total_engineering_cost     += Number(row.total_engineering_cost);
                    });

                    scope.PrecastEstimate.total_sqm                   = $total_sqm;
                    scope.PrecastEstimate.total_std_work_hours        = $total_std_work_hours;
                    scope.PrecastEstimate.total_additional_work_hours = $total_additional_work_hours;
                    scope.PrecastEstimate.total_hourly_rate           = $total_hourly_rate;
                    scope.PrecastEstimate.total_work_hours            = $total_work_hours;
                    scope.PrecastEstimate.engineering_cost      = $engineering_cost;
                    scope.PrecastEstimate.total_central_approval      = $total_central_approval;
                    scope.PrecastEstimate.total_engineering_cost     = $total_engineering_cost;
                    let $totalArea = 0;
                    let $totalPris = 0;
                    let $totalSum  = 0;

                    scope.PrecastComponent.forEach( (row) => {
                        $totalArea += row.total_sqm;
                        $totalSum  += row.total_engineering_cost;
                    });
                    scope.ResultPrecastComponent.total.totalArea = $totalArea;
                    scope.ResultPrecastComponent.total.totalSum  = $totalSum;
                    scope.ResultPrecastComponent.total.totalPris = $totalSum / $totalArea;
                    scope.ResultPrecastComponent.precastEstimate =  scope.PrecastComponent;
                    scope.$apply();
                }
                element.on('keyup', function () {
                    $(this).addClass('bg-info');
                    eventHandle();
                });
                element.on('change', function () {
                    $(this).addClass('bg-info');
                    eventHandle();
                });
            },
        };
    }]);
</script>

@endpush