<form class="" id="reviewSubmit">
    <div class="summary-group py-3 accordion rounded-0" id="summaryGroup">
        {{-- ProjectInfo --}}
            <fieldset class="accordion-item">
                <div class="accordion-header custom m-0 position-relative" id="ProjectInfo_header">
                    <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#ProjectInfo" aria-expanded="true" aria-controls="ProjectInfo">
                        Project Information
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
                        <table class="table m-0 table-hover">
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
                                    <td><b>Conatct number</b></td>
                                    <td>:</td>
                                    <td>@{{ customer_info.mobile_no }}</td>
                                </tr> 
                                <tr ng-if="project_info.secondary_mobile_no != null">
                                    <td><b>Secondary conatct number</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.secondary_mobile_no }}</td>
                                </tr> 
                                <tr ng-if="project_info.zipcode != null">
                                    <td><b>Post Code</b></td>
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
                                    <td><b>Delivered Date</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.project_delivery_date }}</td>
                                </tr> 
                                <tr ng-if="project_info.state != null">
                                    <td><b>State</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.state }}</td>
                                </tr> 
                                <tr ng-if="project_info.customerremarks != null">
                                    <td><b>Remarks</b></td>
                                    <td>:</td>
                                    <td>@{{ project_info.customer.remarks }}</td>
                                </tr> 
                            </tbody>
                        </table>
                        <form id="project_infomation__commentsForm" ng-submit="sendComments('project_infomation','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="project_infomation__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-2">
                            <a class="text-primary p-0 btn"  ng-click="showCommentsToggle('viewConversations', 'project_infomation', 'Project Information')">
                                <i class="mdi mdi-eye"></i>  Previous chat history
                            </a>
                        </div>
                    </div> 
                </div>
            </fieldset>
        {{-- ProjectInfo --}}

        {{-- Selected Services --}}
            <fieldset class="accordion-item">
                <div class="accordion-header custom m-0 position-relative" id="selected_service_header">
                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#selected_service" aria-expanded="false" aria-controls="selected_service">
                        Selected Services
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
                <div id="selected_service" class="accordion-collapse collapse" aria-labelledby="selected_service_header" data-bs-parent="#summaryGroup">
                    <div class="accordion-body">  
                        <ul>
                            <li ng-repeat="(key,outputType) in outputTypes" class=""> @{{ key }}
                                <ul  class="row m-0 ">
                                    <li ng-repeat="service in outputType" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
                                </ul>
                            </li>
                        </ul>  
                        <form id="selected_service__commentsForm" ng-submit="sendComments('selected_service','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="selected_service__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn"  ng-click="showCommentsToggle('viewConversations', 'selected_service', 'Selected Services')">
                                <i class="fa fa-eye"></i>  Previous chat history
                            </a>
                        </div>
                    </div> 
                </div>
            </fieldset> 
        {{-- Selected Services --}}

        {{-- IFC Models & Uploaded Documents --}}
            <fieldset class="accordion-item">
                <div class="accordion-header custom m-0 position-relative" id="IFC_Models_Upload_Docs_header">
                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#IFC_Models_Upload_Docs" aria-expanded="false" aria-controls="IFC_Models_Upload_Docs">
                        IFC Models & Uploaded Documents
                    </div>
                    <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                        <i data-bs-toggle="collapse" 
                        href="#IFC_Models_Upload_Docs" 
                        aria-expanded="false" 
                        aria-controls="IFC_Models_Upload_Docs" 
                        class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed ">
                        </i>
                    </div>
                </div>
                <div id="IFC_Models_Upload_Docs" class="accordion-collapse collapse " aria-labelledby="IFC_Models_Upload_Docs_header" data-bs-parent="#summaryGroup">
                    <div class="accordion-body"> 
                        <table class="table custom table-hover">
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
                                        <td> @{{ ifc_model_upload.file_type }}</td>
                                        <td> @{{ ifc_model_upload.document_type.document_type_name }}</td>
                                        <td class="text-center">
                                            <a download="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                            <a target="_child" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </thead>
                        </table>
                        <form id="IFC_Models_Upload_Docs__commentsForm" ng-submit="sendComments('IFC_Models_Upload_Docs','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="IFC_Models_Upload_Docs__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn"  ng-click="showCommentsToggle('viewConversations', 'IFC_Models_Upload_Docs', 'IFC Models & Uploaded Documents')">
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
                        Building Components
                    </div>
                    <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                        <i data-bs-toggle="collapse" 
                            href="#building_components" 
                            aria-expanded="false" 
                            aria-controls="building_components" 
                            class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "></i>
                    </div>
                </div>
                <div id="building_components" class="accordion-collapse collapse  " aria-labelledby="building_components_header" data-bs-parent="#summaryGroup">
                    <div class="accordion-body">  
                        <div  style="max-height: 400px; overflow:auto"> 
                            <table class="table table-bordered" ng-init="total = 0 ">
                                <tbody >
                                    <tr class="table-bold text-center">
                                        <th width="150px"></th>
                                        <th style="padding: 0 !important">
                                            <table class="table m-0 ">
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
                                    <tr ng-repeat="building_component in building_components" >
                                        <td>@{{ building_component.wall }} @{{ total }}</td>
                                        <td style="padding: 0 !important" >
                                            <table class="table m-0 ">
                                                <tr ng-repeat="detail in building_component.detail"> 
                                                    <td width="50%">
                                                        <table class="table m-0 table-bordered">
                                                            <tr>
                                                                <th>Floor</th>
                                                                <th>wall Number</th>
                                                                <th>Delivery type</th>
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
                                                        <table class="table m-0 table-bordered">
                                                            <tr class="table-bold">
                                                                <th>Name</th>
                                                                <th>Type</th>
                                                                <th>Thickness</th>
                                                                <th>Breadth</th>
                                                            </tr> 
                                                            <tr ng-repeat="layer in detail.layer">
                                                                <td>@{{ layer.layer.layer_name }}</td>
                                                                <td>@{{ layer.layer_type.layer_type_name }}</td>
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
                        </div> 
                        <form id="building_components__commentsForm" ng-submit="sendComments('building_components','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn"  ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
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
                        Additional Info
                    </div>
                    <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                        <i data-bs-toggle="collapse" 
                            href="#add_info" 
                            aria-expanded="false" 
                            aria-controls="add_info" 
                            class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "></i>
                    </div>
                </div>
                <div id="add_info" class="accordion-collapse collapse  " aria-labelledby="add_info_header" data-bs-parent="#summaryGroup">
                    <div class="accordion-body">  
                        <table class="table table-bordered">
                            <tr>
                                <th>S.no</th>
                                <th>Date</th>
                                <th>commented person</th>
                                <th>comments</th>
                            </tr>
                            <tr ng-repeat="additional_info in additional_infos">
                                <td> @{{ index + 1  }}</td>
                                <td>@{{ additional_info.created_at }}</td>
                                <td>@{{ additional_info.customer.full_name }}</td>
                                <td>   @{{ additional_info.comments }} </td>
                            </tr> 
                        </table>
                        <form id="add_info__commentsForm" ng-submit="sendComments('add_info','Admin')" class="input-group mt-3">
                            <input required type="text" ng-model="add_info__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                        </form>  
                        <div class="text-end pt-3">
                            <a class="text-primary p-0 btn"  ng-click="showCommentsToggle('viewConversations', 'add_info', 'Additional Information')">
                                <i class="fa fa-eye"></i>  Previous chat history
                            </a>
                        </div>
                    </div> 
                </div>
            </fieldset> 
        {{-- Additional Info --}}
    </div>   
    <div class="card-footer border-0 p-0 ">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#!/additional-info" class="btn btn-outline-primary">Previous</a></li>
            <li class="next list-inline-item float-end"  ng-click="saveOrSubmit('Active')" ><a class="btn btn-primary">Submit</a></li>
            <li class="next list-inline-item float-end"  ng-click="saveOrSubmit('In-Complete')" ><a class="btn btn-primary">Save & Submit Later</a></li>
        </ul>
    </div>
 
</form>
