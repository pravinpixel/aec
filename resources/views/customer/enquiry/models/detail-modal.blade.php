<div id="right-modal-progress" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
        <div class="p-3 shadow-sm">
            <h3>Project Name : <b class="text-primary"> @{{ enquiry.customer_info }} </b></h3>
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
                            <td style="text-align: left !important;"  ng-show="enquiry.project_infos.enquiry_no">@{{ enquiry.project_infos.enquiry_no }}</td>
                            <td style="text-align: left !important;" ng-show="!enquiry.project_infos.enquiry_no">@{{ enquiry.project_infos.customer_enquiry_number }}</td>
                            <td>{{ Customer()->full_name }}</td>
                            <td>@{{ enquiry.project_infos.company_name }}</td>
                            <td>{{ Customer()->mobile_no }}</td>
                            <td>{{ Customer()->email }}</td>
                            <td>@{{ enquiry.project_infos.project_type.project_type_name}}</td>
                        </tr>
                    </table>
                </div>
            </div> 
            
            <div class="summary-group py-3 accordion rounded-0" id="summaryGroup">
                {{-- ProjectInfo --}}
                    <fieldset class="accordion-item">
                        <div class="accordion-header custom m-0 position-relative" id="ProjectInfo_header">
                            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#project_info" aria-expanded="false" aria-controls="project_info">
                                <span class="position-relative btn py-0">Project Information <small class="badge rounded-circle  bg-danger" ng-show="enquiry_active_comments.project_information > 0"> @{{ enquiry_active_comments.project_information   }}</small></span> 
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                <i data-bs-toggle="collapse" 
                                    href="#project_info" 
                                    aria-expanded="false" 
                                    aria-controls="project_info" 
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                                </i>
                            </div>
                        </div>
                        <div id="project_info" class="project_info accordion-collapse custom-accordion-collapse collapsed collapse show" aria-labelledby="ProjectInfo_header">
                            <div id="ProjectInfo" class="accordion-body">  
                                <table class="table custom m-0 table-hover">
                                    <tbody>
                                        <tr ng-if="enquiry.project_infos.project_name != null">
                                            <td width="30%"><b>Project Name</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.project_name }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.site_address != null">
                                            <td><b>Construction Site Address</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.site_address }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.contact_person != null">
                                            <td><b>Contact Person name</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.contact_person }} </td>
                                        </tr> 
                                        <tr ng-if="customer_info.email != null">
                                            <td><b>Email</b></td>
                                            <td>:</td>
                                            <td>@{{ customer_info.email }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.mobile_no != null">
                                            <td><b>Conatct number</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.mobile_no }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.secondary_mobile_no != null">
                                            <td><b>Secondary conatct number</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.secondary_mobile_no }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.zipcode != null">
                                            <td><b>Zip Code</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.zipcode }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.place != null">
                                            <td><b>City</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.place }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.state != null">
                                            <td><b>State</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.state }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.country != null">
                                            <td><b>Country</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.country }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.project_typenquiry.project_infos.project_type_name != null">
                                            <td><b>Type of Project</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.project_typenquiry.project_infos.project_type_name }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.building_typenquiry.project_infos.building_type_name != null">
                                            <td><b>Type of Building</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.building_typenquiry.project_infos.building_type_name }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.no_of_building != null">
                                            <td><b>Number of Buildings</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.no_of_building }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.delivery_typenquiry.project_infos.delivery_type_name != null">
                                            <td><b>Type of Delivery</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.delivery_typenquiry.project_infos.delivery_type_name }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.project_delivery_date != null">
                                            <td><b>Delivered Date</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.project_delivery_date }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.state != null">
                                            <td><b>State</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.state }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.customerremarks != null">
                                            <td><b>Remarks</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.customer.remarks }}</td>
                                        </tr> 
                                    </tbody>
                                </table>
                                <form id="project_information__commentsForm" ng-submit="sendComments('project_information','Customer')" class="input-group mt-3">
                                    <input required type="text" ng-model="project_information__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                </form>  
                                <div class="text-end pt-2">
                                    <a class="text-primary p-0 btn" ng-show="enquiry_comments.project_information" ng-click="showCommentsToggle('viewConversations', 'project_information', 'Project Information')">
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
                            <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                <i data-bs-toggle="collapse" 
                                    href="#service" 
                                    aria-expanded="false" 
                                    aria-controls="service" 
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn collapsed">
                                </i>
                            </div>
                        </div>
                        <div id="service" class="service accordion-collapse custom-accordion-collapse collapse" aria-labelledby="service_header">
                            <div class="accordion-body">  
                                <ul>
                                    <li ng-repeat="(key,outputType) in enquiry.services" class=""> @{{ key }}
                                        <ul  class="row m-0 ">
                                            <li ng-repeat="service in outputType" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
                                        </ul>
                                    </li>
                                </ul>  
                                <form id="service__commentsForm" ng-submit="sendComments('service','Customer')" class="input-group mt-3">
                                    <input required type="text" ng-model="service__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                </form>  
                                <div class="text-end pt-3">
                                    <a class="text-primary p-0 btn"  ng-show="enquiry_comments.service" ng-click="showCommentsToggle('viewConversations', 'service', 'Selected Services')">
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
                        <div id="ifc_model" class="ifc_model accordion-collapse custom-accordion-collapse collapse " aria-labelledby="ifc_model_header">
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
                                            <tr  ng-repeat="(key, ifc_model) in enquiry.ifc_model_uploads">
                                                <td> @{{ $index + 1}} </td>
                                                <td> @{{ ifc_model.created_at }}</td>
                                                <td> @{{ ifc_model.file_type }}</td>
                                                <td> @{{ ifc_model.document_type.document_type_name }}</td>
                                                <td class="text-center" ng-show="ifc_model.file_type != 'link'">
                                                    <a download="{{ asset("public/uploads/") }}/@{{ ifc_model.file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                                    <a target="_child" href="{{ asset("public/uploads/") }}/@{{ ifc_model.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                                </td>
                                                <td class="text-center" ng-show="ifc_model.file_type == 'link'">
                                                    <a target="_blank" href="@{{ ifc_model.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                                </td>
                                            </tr>
                                            <tr  ng-show="!enquiry.ifc_model_uploads.length">
                                                <td colspan="5"> No data found </td>
                                            </tr>
                                        </tbody>
                                    </thead>
                                </table>
                                <form id="ifc_model__commentsForm" ng-submit="sendComments('ifc_model','Customer')" class="input-group mt-3">
                                    <input required type="text" ng-model="ifc_model__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                </form>  
                                <div class="text-end pt-3">
                                    <a class="text-primary p-0 btn" ng-show="enquiry_comments.ifc_model" ng-click="showCommentsToggle('viewConversations', 'ifc_model', 'IFC Models & Uploaded Documents')">
                                        <i class="fa fa-eye"></i>  Previous chat history
                                    </a>
                                </div>
                            </div> 
                        </div>
                    </fieldset>  
                {{-- IFC Models & Uploaded Documents --}}
        
                {{-- Building Components --}}
                    <fieldset class="accordion-item">
                        <div class="accordion-header custom m-0 position-relative" id="building_component_header">
                            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#building_component" aria-expanded="false" aria-controls="building_component">
                                <span class="position-relative btn py-0">Building Components<small class="badge rounded-circle  bg-danger" ng-show="enquiry_active_comments.building_components > 0"> @{{ enquiry_active_comments.building_components   }}</small></span> 

                            </div>
                            <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                <i data-bs-toggle="collapse" 
                                    href="#building_component" 
                                    aria-expanded="false" 
                                    aria-controls="building_component" 
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "></i>
                            </div>
                        </div>
                        <div id="building_component" ng-show="enquiry.project_infos.building_component_process_type == 0" class=" building_component accordion-collapse custom-accordion-collapse collapse  " aria-labelledby="building_component_header">
                            <div class="accordion-body">  
                                <div  style="max-height: 400px; overflow:auto">
                                     
                                    <table class="table custom table-bordered custom" >
                                        <tbody>
                                            <tr class="table custom-bold text-center">
                                                <th width="150px"> </th>
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
                                            
                                            <tr  ng-repeat="building_component in enquiry.building_components"  ng-show="building_component.detail.length">
                                                <td>@{{ building_component.wall }}</td>
                                                <td style="padding: 0 !important"  >
                                                    <table class="table custom m-0 ">
                                                        <tr ng-repeat="detail in building_component.detail"> 
                                                            <td width="50%">
                                                                <table class="table custom m-0 table-bordered">
                                                                    <tr>
                                                                        <th>Floor</th>
                                                                        <th>wall Number</th>
                                                                        <th>Delivery type</th>
                                                                        <th>Total Area</th>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td>@{{ detail.floor }}</td>
                                                                        <td>@{{ detail.exd_wall_number }}</td>
                                                                        <td>@{{ detail.delivery_type.delivery_type_name }}</td>
                                                                        <td>@{{ detail.approx_total_area }}</td>
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
                                                                        <td>@{{ layer.layer.layer_name }}</td>
                                                                        <td>@{{ layer.thickness }}</td>
                                                                        <td>@{{ layer.breath }}</td>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        
                                                    
                                                    </table>
                                                </td>
                                            </tr>  
                                            <tr ng-show="!enquiry.building_components.length">
                                                <td colspan="5">No data found</td>
                                            </tr>
                                        </tbody>
                                    
                                    </table> 
                                </div> 
                                <form id="building_component__commentsForm" ng-submit="sendComments('building_components','Customer')" class="input-group mt-3">
                                    <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                </form>  
                                <div class="text-end pt-3">
                                    <a class="text-primary p-0 btn"   ng-show="enquiry_comments.building_components"  ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
                                        <i class="fa fa-eye"></i>  Previous chat history
                                    </a>
                                </div> 
                            </div> 
                        </div>

                        <div id="building_component"  ng-show="enquiry.project_infos.building_component_process_type == 1" class="building_component accordion-collapse custom-accordion-collapse collapse  " aria-labelledby="building_component_header">
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
                                                <tr ng-repeat="building_component in enquiry.building_components">
                                                    <td> @{{ $index + 1}} </td>
                                                    <td> @{{ building_component.created_at }}</td>
                                                    <td> @{{ building_component.file_name }}</td>
                                                    <td> @{{ building_component.file_type }}</td>
                                                    <td class="text-center">
                                                        <a download="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}" href="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                                        <a target="_child" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.file_path }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                                    </td>
                                                </tr>
                                                <tr ng-show="!enquiry.building_components.length">
                                                    <td colspan="5">No data found</td>
                                                </tr>
                                            </tbody>
                                        </thead>
                                    </table>
                                </div>
                                <form id="building_components__commentsForm" ng-submit="sendComments('building_components','Customer')" class="input-group mt-3">
                                    <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                </form>  
                                <div class="text-end pt-3">
                                    <a class="text-primary p-0 btn"   ng-show="enquiry_comments.building_components" ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
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
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "></i>
                            </div>
                        </div>
                        <div id="add_info" class="additional_info accordion-collapse custom-accordion-collapse collapse  " aria-labelledby="add_info">
                            <div class="accordion-body">
                                <div ng-bind-html="enquiry.additional_infos.comments"> </div>
                                <form id="add_info__commentsForm" ng-submit="sendComments('add_info','Customer')" class="input-group mt-3">
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
             
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->