<div class="" id="reviewSubmit">
    <div class="summary-group py-3 accordion rounded-0" id="summaryGroup">
        {{-- ProjectInfo --}}
            <fieldset class="accordion-item">
                <div class="accordion-header custom m-0 position-relative" id="ProjectInfo_header">
                    <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#ProjectInfo" aria-expanded="true" aria-controls="ProjectInfo">
                        <span class="position-relative btn py-0">Project Information </span> 

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
                <div id="ProjectInfo" class="accordion-collapse collapse show" aria-labelledby="ProjectInfo_header" >
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
                                <tr ng-if="project_info.mobile_no != null">
                                    <td><b>Contact number</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.mobile_no }}</td>
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
                                    <td><b>City</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.place }}</td>
                                </tr> 
                                {{-- <tr ng-if="project_info.city != null">
                                    <td><b>City</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.city }}</td>
                                </tr>  --}}
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
                                <tr ng-if="project_info.project_type.project_type_name != null">
                                    <td><b>Type of Project</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.project_type.project_type_name }}</td>
                                </tr> 
                                <tr ng-if="project_info.building_type.building_type_name != null">
                                    <td><b>Type of Building</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.building_type.building_type_name }}</td>
                                </tr> 
                                <tr ng-if="project_info.no_of_building != null">
                                    <td><b>No. of Buildings</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.no_of_building }}</td>
                                </tr> 
                                <tr ng-if="project_info.delivery_type.delivery_type_name != null">
                                    <td><b>Type of Delivery</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.delivery_type.delivery_type_name }}</td>
                                </tr> 
                                <tr ng-if="project_info.project_delivery_date != null">
                                    <td><b>Delivery Date</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.project_delivery_date }}</td>
                                </tr> 
                                <tr ng-if="project_info.customerremarks != null">
                                    <td><b>Remarks</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.customer.remarks }}</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div> 
                </div>
            </fieldset>
        {{-- ProjectInfo --}}

        {{-- Selected Services --}}
            <fieldset class="accordion-item">
                <div class="accordion-header custom m-0 position-relative" id="selected_service_header">
                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#selected_service" aria-expanded="false" aria-controls="selected_service">
                        <span class="position-relative btn py-0">Selected Services </span> 
                                
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
                <div id="selected_service" class="accordion-collapse collapse" aria-labelledby="selected_service_header" >
                    <div class="accordion-body">  
                        <ul>
                            <li ng-repeat="(key,outputType) in outputTypes" class=""> @{{ key }}
                                <ul  class="row m-0 ">
                                    <li ng-repeat="service in outputType" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
                                </ul>
                            </li>
                        </ul>  
                    </div> 
                </div>
            </fieldset> 
        {{-- Selected Services --}}

        {{-- IFC Models & Uploaded Documents --}}
            <fieldset class="accordion-item">
                <div class="accordion-header custom m-0 position-relative" id="ifc_model_header">
                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#ifc_model" aria-expanded="false" aria-controls="ifc_model">
                        <span class="position-relative btn py-0">IFC Models & Uploaded Documents </span> 

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
                <div id="ifc_model" class="accordion-collapse collapse " aria-labelledby="ifc_model_header" >
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
                                    
                                    <tr ng-show="ifc_model_uploads.length != 0" ng-repeat="ifc_model_upload in ifc_model_uploads">
                                        <td> @{{ $index + 1}} </td>
                                        <td> @{{ ifc_model_upload.created_at }}</td>
                                        <td> @{{ ifc_model_upload.file_type }}</td>
                                        <td> @{{ ifc_model_upload.document_type.document_type_name }}</td>
                                        <td class="text-center" ng-show="ifc_model_upload.file_type != 'link'">
                                            <a download="@{{ ifc_model_upload.client_file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                            <a ng-show="!autoDeskFileType.includes(ifc_model_upload.file_type)" ng-click="getDocumentView(ifc_model_upload) "><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                            <a ng-show="autoDeskFileType.includes(ifc_model_upload.file_type)" target="_blank" href="{{ url('/') }}/viewmodel/@{{ ifc_model_upload.id }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                        </td>
                                        <td class="text-center" ng-show="ifc_model_upload.file_type == 'link'">
                                            <a class="" target="_blank" href="@{{ ifc_model_upload.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                        </td>
                                    </tr>
                                    <tr ng-show="ifc_model_uploads.length == 0">
                                        <td colspan="5">No data found</td>
                                    </tr>
                                    
                                </tbody>
                            </thead>
                        </table>
                    </div> 
                </div>
            </fieldset>  
        {{-- IFC Models & Uploaded Documents --}}

        {{-- Building Components --}}
            <fieldset class="accordion-item">
                <div class="accordion-header custom m-0 position-relative" id="building_components_header">
                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#building_components" aria-expanded="false" aria-controls="building_components">
                        <span class="position-relative btn py-0">Building Components </span> 

                    </div>
                    <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                        <i data-bs-toggle="collapse" 
                            href="#building_components" 
                            aria-expanded="false" 
                            aria-controls="building_components" 
                            class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "></i>
                    </div>
                </div>
                <div ng-show="project_info.building_component_process_type == 0" id="building_components" class="accordion-collapse collapse  " aria-labelledby="building_components_header" >
                    <div class="accordion-body">  
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
                                                        <th>Delivery Type</th>
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
                        {{-- <div  style="max-height: 400px; overflow:auto"> 
                            <table class="table custom table-bordered" ng-init="total = 0 ">
                                <tbody >
                                    <tr class="table custom-bold text-center">
                                        <th width="150px"></th>
                                        <th style="padding: 0 !important">
                                            <table class="table custom m-0 ">
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
                                        <td style="padding: 0 !important">
                                            <table class="table custom m-0 ">
                                                <tr ng-repeat="detail in building_component.detail"> 
                                                    <td width="50%">
                                                        <table class="table custom m-0 table-bordered">
                                                            <tr>
                                                                <th>Floor</th>
                                                                <th>Delivery Type</th>
                                                                <th >Total Area </th>
                                                            </tr> 
                                                            <tr>
                                                                <td>@{{ detail.floor }}</td>
                                                                <td>@{{ detail.delivery_type.delivery_type_name }}</td>
                                                                <td ng-init="$parent.total = $parent.total ++ detail.approx_total_area">@{{ detail.approx_total_area }}</td>
                                                            </tr> 
                                                        </table>
                                                    </td>
                                                    <td style="padding: 0 !important" width="50%">
                                                        <table class="table custom m-0 table-bordered">
                                                            <tr class="table custom-bold">
                                                                <th>Name</th>
                                                                <th>Thickness (mm)</th>
                                                                <th>Breadth (mm)</th>
                                                            </tr> 
                                                            <tr ng-repeat="layer in detail.layer">
                                                                <td>@{{ layer.layer_name }}</td>
                                                                <td>@{{ layer.thickness }}</td>
                                                                <td>@{{ layer.breath }} </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr> 
                                            </table> 
                                        </td>
                                    </tr>  
                                    <tr ng-show="!building_components.length && !building_component.detail.length">
                                        <td colspan="4"> No data found </td>
                                    </tr>
                                </tbody>                     
                            </table> 
                        </div>  --}}
                    </div> 
                </div>
                <div ng-show="project_info.building_component_process_type == 1" id="building_components" class="accordion-collapse collapse " aria-labelledby="building_components_header" >
                    <div class="accordion-body"> 
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
                                    <tr ng-show="building_components.length" ng-repeat="building_component in building_components">
                                        <td> @{{ $index + 1}} </td>
                                        <td> @{{ building_component.created_at }}</td>
                                        <td> @{{ building_component.file_name }}</td>
                                        <td> @{{ building_component.file_type }}</td>
                                        <td class="text-center">
                                            <a download="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}" href="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                            <a href="javascript:void(0)" ng-click="getDocumentViews(building_component) "data-url="{{ url('/') }}/get-enquiry-document/@{{ buildingComponentUpload.id }}"><i class="document-modal fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                            {{-- <a target="_blank" href="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a> --}}
                                        </td>
                                    </tr>
                                    <tr ng-show="!building_components.length && !building_component.detail.length">
                                        <td colspan="4"> No data found </td>
                                    </tr>
                                </tbody>
                            </thead>
                        </table>
                    </div> 
                </div>
            </fieldset>
        {{-- Building Components --}}

        {{-- Additional Info --}} 
            <fieldset class="accordion-item">
                <div class="accordion-header custom m-0 position-relative" id="add_info_header">
                    <div class="accordion-button collapsed"
                    data-bs-toggle="collapse" 
                            href="#add_info" 
                            aria-expanded="false" 
                            aria-controls="add_info" > 
                            <span class="position-relative btn py-0">Additional Info</span> 

                    </div>
                    <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                        <i data-bs-toggle="collapse" 
                            href="#add_info" 
                            aria-expanded="false" 
                            aria-controls="add_info" 
                            class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "></i>
                    </div>
                </div>
                <div id="add_info" class="accordion-collapse collapse  " aria-labelledby="add_info_header" >
                    <div class="accordion-body">  
                        <div class="form-floating" id="additional_info_text_editor" style="pointer-events: none">
                            <div dx-html-editor="htmlEditorOptions" contenteditable="false"> </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </fieldset> 
        {{-- Additional Info --}}
    </div>   
    <div class="card-footer border-0 p-0 ">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"></li> 
        </ul>
        <div class="row m-0">
            <div class="col-6"><a href="#!/additional-info" class="btn btn-light border shadow-sm">Prev</a></div>
            <div class="col-6 text-end" ng-show="project_info.status == 'In-Complete'">
                <div class="btn-group">
                    <button class="next me-2 btn btn-light rounded border"  ng-click="saveOrSubmit('In-Complete')"> Save & Submit Later </button>
                    <button class="next btn-primary btn rounded"  ng-click="saveOrSubmit('Submitted')">Submit </button>
                </div>
            </div>
            <div class="col-6 text-end" ng-show="project_info.status == 'Submitted' ">
                <div class="btn-group">
                    <button class="next btn-primary btn rounded"  ng-click="saveOrSubmit('Submitted')">Submit </button>
                </div>
            </div>
        </div>
    </div>
    @include('customer.enquiry.models.document-modal')
</div>
<style> 
    .reviewSubmit .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 