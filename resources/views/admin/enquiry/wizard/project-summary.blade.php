<div> 
    <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
        <li class="time-bar"></li>
        @if(userHasAccess('project_summary_index'))
        <li class="nav-item Project_Info">
            <a href="#!/project-summary" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ project_summary_status == 'Submitted' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Project summary</p>
            </a>
        </li>
        @endif
        @if(userHasAccess('technical_estimate_index'))
        <li class="nav-item  admin-Technical_Estimate-wiz" style="pointer-events: @{{ project_summary_status == 'Submitted' ? 'unset' :'none'  }}">
            <a href="#!/technical-estimation" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ technical_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/technical-support.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Technical Estimate</p>
            </a>
        </li>
        @endif
        @if(userHasAccess('cost_estimate_index'))
        <li class="nav-item admin-Cost_Estimate-wiz"  style="pointer-events: @{{ technical_estimation_status ==  0 ? 'none' :'unset' }}">
            <a href="#!/cost-estimation" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle  @{{ cost_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/budget.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Cost Estimate</p>
            </a>
        </li>
        @endif
        @if(userHasAccess('proposal_sharing_index'))
        <li class="nav-item admin-Proposal_Sharing-wiz" ng-class="{last:proposal_sharing_status == 0}" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
            <a href="#!/proposal-sharing" style="min-height: 40px;"  class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ proposal_sharing_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/share.png") }}" ng-click="getDocumentaryFun();" class="w-50 invert">
                    </div>                                                                        
                </div>
                <p class="h5 mt-2">Proposal Sharing</p>
            </a>
        </li>
        @endif
        @if(userHasAccess('customer_response_index'))
        <li  ng-show="proposal_sharing_status == 1" class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
            <a href="#!/move-to-project" style="min-height: 40px;"  class="timeline-step" >
                <div class="timeline-content">
                    <div class="inner-circle @{{ customer_response == '1' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5  mts-2">Customer Response</p>
            </a>
        </li>
        @endif
    </ul>
    @if(userHasAccess('project_summary_index'))
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
                                    <td><b>Number of Buildings</b></td>
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
                                    <td>@{{ project_info.project_delivery_date }}</td>
                                </tr> 
                           
                                <tr ng-if="project_info.customerremarks != null">
                                    <td><b>Remarks</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.customer.remarks }}</td>
                                </tr> 
                            </tbody>
                        </table>
                        <form id="project_information__commentsForm" ng-submit="sendComments('project_information','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="project_information__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-2">
                            <a class="text-primary p-0 btn"   ng-show="enquiry_comments.project_information"  ng-click="showCommentsToggle('viewConversations', 'project_information', 'Project Information')">
                                <i class="mdi mdi-eye"></i>  Previous chat history
                            </a>
                        </div>
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
                        <form id="service__commentsForm" ng-submit="sendComments('service','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="service__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn"   ng-show="enquiry_comments.service"  ng-click="showCommentsToggle('viewConversations', 'service', 'Selected Services')">
                                <i class="fa fa-eye"></i>  Previous chat history
                            </a>
                        </div>
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
                                        <td> @{{ ifc_model_upload.created_at }}</td>
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
                        <form id="ifc_model__commentsForm" ng-submit="sendComments('ifc_model','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="ifc_model__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn"  ng-show="enquiry_comments.ifc_model"  ng-click="showCommentsToggle('viewConversations', 'ifc_model', 'IFC Models & Uploaded Documents')">
                                <i class="fa fa-eye"></i>  Previous chat history
                            </a>
                        </div>
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
                                                                <th>Delivery Type</th>
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
                        <form id="building_component__commentsForm" ng-submit="sendComments('building_components','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn"  ng-show="enquiry_comments.building_components"   ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
                                <i class="fa fa-eye"></i>  Previous chat history
                            </a>
                        </div> 
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
                        <form id="building_components__commentsForm" ng-submit="sendComments('building_components','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn"  ng-show="enquiry_comments.building_components"   ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
                                <i class="fa fa-eye"></i>  Previous chat history
                            </a>
                        </div> 
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
                            <div dx-html-editor="htmlEditorOptions" contenteditable="false"> </div>
                            </div>
                        </div>
                        <form id="add_info__commentsForm" ng-submit="sendComments('add_info','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="add_info__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn" ng-show="enquiry_comments.add_info"   ng-click="showCommentsToggle('viewConversations', 'add_info', 'Additional Information')">
                                <i class="fa fa-eye"></i>  Previous chat history
                            </a>
                        </div>
                    </div> 
                </div>
            </fieldset> 
        {{-- Additional Info --}}
    </div>   
    @endif
    @include("admin.enquiry.models.chat-box")
    @include('customer.enquiry.models.document-modal')
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                
            </div>
            <div>
                <a href="#!/technical-estimation" class="btn btn-primary" ng-show="project_summary_status == 'Submitted'">Next</a>
            </div>
        </div>
    </div>
</div>
<style>
    .Project_Info .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 