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
                <div class="container-fluid d-none" id="TechEstimateController">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#project_summary" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                <div class="mx-auto inner-circle bg-secondary">
                                    <img src="{{ asset('public/assets/icons/information.png') }}" class="w-50 invert">
                                </div>
                                <span class="d-none d-md-block mt-2">Project Summary</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#technical_estimate" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                <div class="mx-auto inner-circle bg-secondary">
                                    <img src="{{ asset('public/assets/icons/budget.png') }}" class="w-50 invert">
                                </div>
                                <span class="d-none d-md-block mt-2">Technical Estimate</span>
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
                        <div class="tab-pane show active" id="technical_estimate" ng-controller="TechEstimateController">
                            <div class="row m-0" >
                                <div class="col-lg-9 p-0">
                                    <div class="card shadow-none p-0 m-0">
                                        <div class="card-header pb-0 border-0">
                                            <div class="card-header pb-2 p-3 text-center border-0">
                                                <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.enquiry.contact_person }}</span></h4>
                                            </div>
                                            <div class="card-body ps-0 pt-0 p-0">
                                                <table class="table custom shadow-none border m-0 table-bordered ">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>Enquiry Date</th>
                                                            <th>Person Contact</th>
                                                            <th>Type of Project</th>
                                                            <th>Enquiry Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>@{{ enquiry.enquiry.enquiry_date }}</td>
                                                            <td>@{{ enquiry.enquiry.contact_person }}</td>
                                                            <td>@{{ enquiry.enquiry.project_type.project_type_name  }}</td>
                                                            <td><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </div>
                                        </div> 
                                        <div class="card-body mb-0 pb-0"  >
                                            <div class="row align-items-center mb-2">
                                                <div class="col-sm-6">                        
                                                    <button class="btn btn-sm btn-primary" ng-click="Add_building()"><i class="fa fa-plus"></i> Add Building</button>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    {{-- <span class="text-secondary">Total Area :</span> <b>  </b>  --}}
                                                </div>
                                            </div>
                    
                                            <div ng-if="building_building == null || !building_building.length">
                                                <div class="p-5 text-center">
                                                    <strong>No Records</strong>
                                                </div>
                                            </div>
                                        
                                            <div psi-sortable="" ng-model="building_building">
                                                <div class="bg-white mb-2" ng-repeat="(index,buliding) in building_building track by $index">  
                                                    <div class="row m-0 justify-content-between align-items-center  border shadow-sm table-bordered bg-white" data-bs-toggle="collapse" href="#toggle_table_@{{ index }}" role="button" aria-expanded="false" aria-controls="toggle_table_@{{ index }}">
                                                        <div class="col">
                                                            <h1  class="h5 text-secondary "><a class="btn btn-danger btn-sm  me-2 p-1 py-0" ng-click="Delete_building(index)">
                                                                <i class="mdi mdi-delete text-white"></i> 
                                                            </a>Building No : @{{ index+1 }}</h1>
                                                        </div>
                                                        <div class="col text-end p-0">
                                                            
                                                            <a class="btn btn-light btn-sm border shadow-sm me-2 p-1 py-0" >
                                                                <i class="bi bi-arrows-move"></i>
                                                            </a> 
                                                        </div>
                                                    </div>
                                                    <table id="toggle_table_@{{ index }}" class="table custom border shadow-sm table-bordered collapse show">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th class="text-white text-center">S.No</th>
                                                                <th class="text-white">Component Name</th>
                                                                <th class="text-white">Sq. Mt. Estimate</th>
                                                                <th class="text-center" style="padding: 0 !important"> 
                                                                    <button type="button" class="btn btn-sm py-0 px-1 rounded bg-primary " ng-click="Add_component(index)"><b><i class="text-white mdi mdi-plus"></i></b></button>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody psi-sortable="" ng-model="buliding.building_component_number"> 
                                                            <tr ng-repeat="(secindex,est) in buliding.building_component_number track by $index">
                                                                <td class="col">
                                                                    <a class="btn btn-light btn-sm border shadow-sm me-2 p-1 py-0" >
                                                                        <i class="bi bi-arrows-move"></i>
                                                                    </a>
                                                                    @{{ secindex+1 }}
                                                                </td>
                                                                <td class="col" style="padding:0 !important">
                                                                    <input type="text"  required ng-required placeholder="Type here.." ng-model="est.name" class="form-control bg-none form-control-sm rounded-0 border-0">
                                                                </td>
                                                                <td class="col"  style="padding:0 !important" > 
                                                                    <input type="number" onkeypress="return isNumber(event)" min="0" required ng-required get-total-components="[index , secindex]" class="form-control form-control-sm rounded-0 border-0" ng-model="est.sqfeet">
                                                                </td>
                                                                <td class="col" class="text-center"  style="padding:0 !important">
                                                                    <a  class="btn btn-sm text-danger w-100 btn-outline-light" get-total-components-delete="[index , secindex]"><i class="mdi mdi-delete"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot class="bg-light">
                                                            <tr>
                                                                <td colspan="4">
                                                                    <strong class="text-secondary">Total :</strong>
                                                                    <b>@{{ buliding.total_component_area }}</b>
                                                                    <input type="text" ng-model="buliding.total_component_area" class="d-none">
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table> 
                                                </div> 
                                            </div>
                                            <div class="p-0 mb-2">
                                                @if(userHasAccess('technical_estimate_add'))
                                                    <div class="text-end">
                                                        <a class="btn btn-success" ng-click="updateTechnicalEstimate()"><i class="uil-sync"></i> Update</a>
                                                    </div>
                    
                                                    <p class="lead mb-2 text-danger" ng-show="technical_estimate.assign_for == 'estimation' && technical_estimate.assign_for_status == 0"> <strong>Waiting for estimation</strong></p>
                                                    <p class="lead mb-2 text-danger" ng-show="technical_estimate.assign_for == 'approval' && technical_estimate.assign_for_status == 0"> <strong>Waiting for approval</strong></p>
                                                    <p class="lead mb-2 text-success" ng-show="technical_estimate.assign_for_status == 1 && technical_estimate.assign_for == 'estimation'"> <strong>Estimated successfully</strong></p>
                                                    <p class="lead mb-2 text-success" ng-show="technical_estimate.assign_for_status == 1 && technical_estimate.assign_for == 'approval'"> <strong>Approved successfully </strong></p>
                                                @else
                                                    <div class="text-end" ng-if="technical_estimate.assign_for_status == 0 && technical_estimate.assign_to == {{ Admin()->id }}">
                                                        <a class="btn btn-success" ng-click="updateTechnicalEstimate()"><i class="uil-sync"></i> Update & Approve</a>
                                                    </div>
                                                    <div ng-if="technical_estimate.assign_for_status == 1">
                                                        <p class="lead mb-2 text-success" ng-show="technical_estimate.assign_for_status == 1 && technical_estimate.assign_for == 'approval'"> <strong> Approved successfully </strong></p>
                                                        <p class="lead mb-2 text-success" ng-show="technical_estimate.assign_for_status == 1 && technical_estimate.assign_for == 'estimation'"> <strong> Estimated successfully</strong></p>
                                                    </div>
                    
                                                @endif
                                            </div>
                                        </div>  
                                    </div> 
                                </div>
                                <div class="col-lg-3 p-0">
                                    
                                    <div class="card mt-lg-5" >
                                        <div class="card-header">
                                            <h4 class="m-0">Reference Doc's </h4>
                                        </div>
                                        <div>
                                            <ul class="list-group mt-0" ng-repeat="doc in enquiry.ifc_model_uploads">
                                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ps-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="h-100 p-0 ">
                                                            <a class="btn btn-sm btn-light border rounded-pill me-1"  ng-click="showTechCommentsToggle('viewTechicalDocsConversations', 'techical_estimation', doc.id)">
                                                                <i class="uil-comment-alt-lines"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <div class="d-flex flex-column">
                                                                @{{ doc.document_type.document_type_name }} <small class="text-secondary">@{{ doc.document_type.created_at }}</small>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <a ng-show="!autoDeskFileType.includes(doc.file_type) && doc.file_type != 'link'" ng-click="getDocumentView(doc)"  class="badge bg-success rounded-pill"><i class="text-white fa fa-eye"></i></a>
                                                    <a ng-show="autoDeskFileType.includes(doc.file_type)" class="badge bg-success rounded-pill" target="_child" href="{{ url('/') }}/viewmodel/@{{ doc.id }}"><i class="text-white fa fa-eye"></i></a>
                                                    <a ng-show="doc.file_type == 'link'" target="_child" href="@{{ doc.file_name }}" class="badge bg-success rounded-pill"><i class="text-white fa fa-eye"></i></a>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card mt-3" ng-show="project_info.building_component_process_type == 1">
                                        <div class="card-header">
                                            <h5 class="m-0">Building Component Doc's </h5>
                                        </div>
                                        <ul class="list-group mt-0" ng-repeat="building_comp in building_component">
                                            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ps-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="d-flex flex-column over" >
                                                            <small class="text-secondary">@{{  building_comp.created_at }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a ng-click="getDocumentViews(building_comp)"  class="badge bg-success rounded-pill" class="badge bg-success rounded-pill"><i class="text-white fa fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
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
    app.controller('TechEstimateController', function ($scope, $http, API_URL, $location) {
            let enquiryId =  '{{ $enquiry_id }}';
            $scope.current_user = '{{Admin()->id}}';
            getUsers = () => {
                $http.get(`${API_URL}admin/get-technicalestimate-employee`)
                .then(function successCallback(res){
                    $scope.userList = res.data;
                }, function errorCallback(error){
                    console.log(error);
                });
            }
            getUsers();
            getAutoDeskFileTypes = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("get-autodesk-file-type") }}'
                }).then(function (res) {
                    $scope.autoDeskFileType = res.data;
                });
            }
            getAutoDeskFileTypes();
            
            $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} ).then(function (response) {
                $scope.enquiry              =   response.data; 
                $scope.enquiry_id           =   response.data.enquiry_id; 
                $scope.building_building    =   response.data.building_component; 
                $scope.assign_to            =   response.data.others.assign_to ?? '';
            });
             
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $enquiry_id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status  = res.data.progress.proposal_sharing_status;
                    $scope.customer_response    = res.data.progress.customer_response; 
                    $scope.technical_estimate   = res.data.technical_estimate;
                });
            }
            $scope.getWizradStatus(); 

            $scope.Add_building = function() {

                $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} ).then(function (response) {
                    $scope.building_building.push(response.data.building_component[0]);
                   
                });
                    
            } 

            $scope.Add_component = function(index) {
                $scope.building_building[index].building_component_number.push(
                    {
                        "name": '',
                        "sqfeet": 0
                    }
                )
            }

            $scope.Delete_building   =   function(index) {
                $scope.building_building.splice(index,1);  
            }

            $scope.dirOptions = {};

            $scope.Delete_component   =  function(index, secindex) {
                $scope.building_building[index].building_component_number.splice(secindex,1);
                $scope.dirOptions.directiveFunction(index);
            }
           
            $scope.updateTechnicalEstimate  = function() {
                
                const validator     = $scope.building_building;
                let BuildingValidator   = false;
                let validatorName       = false;
                let validatorSqfeet     = false;
                
                validator.forEach(element => {
                    if(element.building_component_number.length == 0) {
                        BuildingValidator  = true;
                    }
                    for (let i = 0; i < element.building_component_number.length; i++) {
                        if(element.building_component_number[i].name == null || element.building_component_number[i].name == '') {
                            validatorName  = true;
                        }
                        if(element.building_component_number[i].sqfeet == null || element.building_component_number[i].sqfeet == '') {
                            validatorSqfeet  = true;
                        }
                    }
                });
                
                if(validatorName)  {
                    Message('warning',"Component name is required!");
                    validatorName  = false;
                    return false;
                }
                if(validatorSqfeet)  {
                    Message('warning',"Sqfeet Estimate is required!");
                    validatorSqfeet  = false;
                    return false;
                }
                if(BuildingValidator) {
                    Message('danger',"You Can't Update Empty Building !");
                    $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} ).then(function (response) {
                        $scope.enquiry              =   response.data; 
                        $scope.enquiry_id           =   response.data.enquiry_id; 
                        $scope.building_building    =   response.data.building_component; 
                    });
                    return false;
                }
                
                if($scope.building_building.length == 0 || $scope.building_building[0].building_component_number.length == 0 || $scope.building_building == []) {
                    Message('danger',"You Can't Update Empty Building !");
                    $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} ).then(function (response) {
                        $scope.enquiry              =   response.data; 
                        $scope.enquiry_id           =   response.data.enquiry_id; 
                        $scope.building_building    =   response.data.building_component; 
                    });
                    return false;
                } 
                $http({
                    method: "POST",
                    url: API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} , 
                    data:{ data : $scope.building_building},
                }).then(function successCallback(response) {
                    $scope.getWizradStatus();
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            $scope.assignTechnicalEstimate = (user, technical_estimate_assign_for) => {
                let assign_to = user == '' ? null: user;
                if($scope.assign_to == '') {
                    Message('danger', "Please choose a user !");
                    return false;
                }

                $http.post(`${API_URL}technical-estimate/assign-user/${enquiryId}`, {assign_to: assign_to, type: technical_estimate_assign_for})
                .then(function successCallback(res){
                    if(res.data.status) {
                        $scope.enable_techestimate = res.data.status;
                        $scope.getWizradStatus();
                        Message('success', res.data.msg);
                        return false;
                    }
                    Message('error', res.data.msg);
                },  function errorCallback(error){
                    console.log(error);
                });
            }

            $scope.gotoNext = function() {
                $http.post(`${API_URL}technical-estimate/update-status/${enquiryId}`)
                .then(function successCallback(res){
                    $location.path('/cost-estimation');
                });
            }

            $scope.showCommentsToggle  =  function (modalstate, type, header) {
                $scope.modalstate      =  modalstate;
                $scope.module          =  null;
                $scope.chatHeader      =  header; 
                switch (modalstate) {
                    case 'viewAssingTechicalConversations':
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.TechcommentsData = response.data.chatHistory; 
                            $scope.chatType         = response.data.chatType;  
                            $('#assing-viewConversations-modal').modal('show');
                        });
                        break;
                    default:
                    break;
                }
            }

            $scope.sendAssignTechInboxComments  = function(type , chatSection) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   chatSection,
                    "created_by"      :   type,
                    "role_by"         : `Techical Estimater ${type}`
                }
                console.log($scope.sendCommentsData);
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    $scope.showTechCommentsToggle('viewAssingTechicalConversations', 'techical_estimation', chatSection);
                    $scope.inlineComments = '';
                    document.getElementById("Inbox__commentsForm").reset();
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            // =====================
            $scope.GetCommentsData = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $enquiry_id ?? " " }} ).then(function (res) {
                    $scope.enquiry_number       = res.data.enquiry_number;
                    $scope.enquiry_comments     = res.data.enquiry_comments;
                    $scope.enquiry_id           = res.data.enquiry_id;
                    $scope.project_info         = res.data.enquiry_comments;
                    $scope.project_info         = res.data.project_info;
                    $scope.building_component   = res.data.building_component;
                });
            }
            $scope.showTechCommentsToggle = function (modalstate, type, docId) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.technical_docType_id   = docId; 
                switch (modalstate) {
                    case 'viewConversations':
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.commentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            $('#viewConversations-modal').modal('show');
                        });
                        break;
                    case 'viewTechicalDocsConversations' : 
                            $http.get(API_URL + 'admin/show-tech-comments/'+$scope.enquiry_id+'/type/'+$scope.technical_docType_id ).then(function (response) {
                                $scope.TechcommentsData = response.data.chatHistory; 
                                $scope.chatType     = response.data.chatType;  
                                $('#tech-viewConversations-modal').modal('show');
                            });

                        break; 
                    case 'viewAssingTechicalConversations' : 
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+$scope.technical_docType_id ).then(function (response) {
                            $scope.TechcommentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            $('#assing-viewConversations-modal').modal('show');
                        });

                    break; 
                    default:
                        break;
                } 
            }
            $scope.GetCommentsData();
            
            $scope.sendTechInboxComments  = function(type , chatSection) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "file_id"         :   $scope.technical_docType_id,
                    "type"            :   chatSection,
                    "created_by"      :   type,
                    "role_by"         : "Techical Estimater"
                }
                console.log($scope.sendCommentsData);
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    document.getElementById("Inbox__commentsForm").reset();
                    $scope.showTechCommentsToggle('viewTechicalDocsConversations', 'techical_estimation', $scope.technical_docType_id);
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }  
            $scope.sendInboxComments  = function(type) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   $scope.chatType,
                    "created_by"      :   type,
                }
                console.log($scope.sendCommentsData);
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

            $scope.sendComments  = function(type, created_by) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope[`${type}__comments`],
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   type,
                    "created_by"      :   created_by,
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
        $("#TechEstimateController").removeClass('d-none');

</script>

@endpush