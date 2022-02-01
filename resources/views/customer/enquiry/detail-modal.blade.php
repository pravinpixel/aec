{{-- <div id="right-modal-progress" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
        <div class="modal-content h-100 p-4" style="overflow: auto"> 
            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-hidden="true"></button>
            <div id="enquiryInfo">
                <h3>Project Name : <b>@{{ enquiry.project_infos.project_name }}</b></h3>
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
                                <td>@{{ enquiry.project_infos.enquiry_no }}</td>
                                <td>{{ Customer()->full_name }}</td>
                                <td>@{{ enquiry.project_infos.company_name }}</td>
                                <td>{{ Customer()->mobile_no }}</td>
                                <td>{{ Customer()->email }}</td>
                                <td>@{{ enquiry.project_infos.project_type.project_type_name}}</td>
                            </tr>
                        </table>
                    </div>
                </div> 
                <div class="card">
                    <div class="accordion" >
                        <div class="accordion-item m-0">
                        <h2 class="accordion-header m-0" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#project_info" aria-expanded="true" aria-controls="project_info">
                                Project Information
                            </button>
                        </h2>
                        <div id="project_info" class="accordion-collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
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
                                                        </th><td  class="bg-white"> @{{ enquiry.project_infos.project_name }} </td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Construction Site Address
                                                        </th><td  class="bg-white">  @{{ enquiry.project_infos.site_address }} </td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Post Code
                                                        </th><td  class="bg-white"> @{{ enquiry.project_infos.zipcode }}</td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Place
                                                        </th><td  class="bg-white"> @{{ enquiry.project_infos.place }}</td>
                                                    </tr>  
                                                    <tr class="border">
                                                        <th  class=" ">State
                                                        </th><td  class="bg-white"> @{{ enquiry.project_infos.state }}</td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Country
                                                        </th><td  class="bg-white">@{{ enquiry.project_infos.country }}</td>
                                                    </tr> 
                                                    <tr class="border">
                                                        <th  class=" ">Type of Project
                                                        </th><td  class="bg-white"> @{{ enquiry.project_infos.project_type.project_type_name }}</td>
                                                    </tr> 
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <table class="table m-0   table-bordered">
                                        <tbody><tr class="border">
                                                <th  class=" ">Type of Building
                                                </th><td  class="bg-white"> @{{ enquiry.project_infos.building_type.building_type_name }}</td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">Number of Buildings
                                                </th><td  class="bg-white"> @{{ enquiry.project_infos.no_of_building}} </td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">Type of Delivery
                                                </th><td  class="bg-white"> @{{ enquiry.project_infos.delivery_type.delivery_type_name }} </td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">Deliveryd Date 
                                                </th><td  class="bg-white">  @{{ enquiry.project_infos.project_delivery_date}} </td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">State
                                                </th><td  class="bg-white"> @{{ enquiry.project_infos.state}} </td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">Contact Person name
                                                </th><td  class="bg-white">@{{ enquiry.project_infos.contact_person}}  </td>
                                            </tr> 
                                            <tr class="border">
                                                <th  class=" ">E-post
                                                </th><td  class="bg-white"> {{  Customer()->email }}</td>
                                            </tr> 
                                        </tbody></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service" aria-expanded="false" aria-controls="service">
                                Services Selection
                            </button>
                        </h2>
                        <div id="service" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
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
                                                <tr class="border" ng-repeat="(key, service) in enquiry.services">
                                                    <td class=" "> @{{ key+1 }}
                                                    </td><td class="bg-white">@{{ service.service_name  }}</td>
                                                </tr>  
                                        </tbody></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ifc_model" aria-expanded="false" aria-controls="collapseThree">
                                    FC Model & Upload Docs 
                                </button>
                            </h2>
                            <div id="ifc_model" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table m-0  ">
                                                                    
                                        <tbody>
                                            <tr>
                                                <th class="">S.no</th>
                                                <th class="">File Name</th>
                                                <th class="">Type</th>
                                                <th class="">View Type</th>
                                            </tr> 
                                            <tr class="border" ng-repeat="(key, ifc_model) in enquiry.ifc_model_uploads">
                                                <th class="text-dark bg-white"> @{{ key + 1  }}</th>
                                                <td class="bg-white">@{{ ifc_model.client_file_name }}</td>
                                                <td class="bg-white"> @{{ ifc_model.file_type }} </td>
                                                <td> @{{ ifc_model.document_type.document_type_name }}</td>
                                            </tr>  
                                    </tbody></table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThreer">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#building_component" aria-expanded="false" aria-controls="collapseThree">
                                    Building components
                                </button>
                            </h2>
                            <div id="building_component" class="accordion-collapse collapse" aria-labelledby="headingThreer" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row mx-0 container ">
                                        <div class="col-12 text-center">
                                            <h4 class="f-20 m-0 p-3">Building components</h4>
                                        </div>
                                        <div class="col-md-8 p-3 mx-auto">
                                            <table class="table table-bordered" >
                                                <tbody>
                                                    <tr class="table-bold text-center">
                                                        <th width="150px"> </th>
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
                                                    
                                                    <tr  ng-repeat="building_component in enquiry.building_component">
                                                        <td>@{{ building_component.wall }}</td>
                                                        <td style="padding: 0 !important"  >
                                                            <table class="table m-0 ">
                                                                <tr ng-repeat="detail in building_component.detail"> 
                                                                    <td width="50%">
                                                                        <table class="table m-0 table-bordered">
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
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>S.no</th>
                                                <th>Date</th>
                                                <th>commented person</th>
                                                <th>comments</th>
                                            </tr>
                                            <tr ng-repeat="(key,additional_info) in enquiry.additional_infos">
                                                <td> @{{ key + 1  }}</td>
                                                <td>@{{ additional_info.created_at }}</td>
                                                <td>@{{ additional_info.customer.full_name }}</td>
                                                <td>@{{ additional_info.comments }}</td>
                                            </tr> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-md-12 text-center mt-4">
                <button class="btn button_print btn-info mx-2 px-3 btn-rounded" ng-click="printToCart('enquiryInfo')">
                    Print
                </button> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> --}}

<div id="right-modal-progress" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
        <div class="p-3 shadow-sm">
            <h3>Project Name : <b class="text-primary"> @{{ enquiry.project_infos.project_name }} </b></h3>
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
                            <td>@{{ enquiry.project_infos.enquiry_no }}</td>
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
                                Project Information
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
                        <div id="project_info" class="accordion-collapse collapsed collapse" aria-labelledby="ProjectInfo_header" data-bs-parent="#summaryGroup">
                            <div class="accordion-body">  
                                <table class="table m-0 table-hover">
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
                                        <tr ng-if="customer_info.mobile_no != null">
                                            <td><b>Conatct number</b></td>
                                            <td>:</td>
                                            <td>@{{ customer_info.mobile_no }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.secondary_mobile_no != null">
                                            <td><b>Secondary conatct number</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.secondary_mobile_no }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.zipcode != null">
                                            <td><b>Post Code</b></td>
                                            <td>:</td>
                                            <td>@{{ enquiry.project_infos.zipcode }}</td>
                                        </tr> 
                                        <tr ng-if="enquiry.project_infos.place != null">
                                            <td><b>Place</b></td>
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
                        <div class="accordion-header custom m-0 position-relative" id="service_header">
                            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#service" aria-expanded="false" aria-controls="service">
                                Selected Services
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i data-bs-toggle="collapse" 
                                    href="#service" 
                                    aria-expanded="false" 
                                    aria-controls="service" 
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn show collapsed "
                                    >
                                </i>
                            </div>
                        </div>
                        <div id="service" class="accordion-collapse collapse" aria-labelledby="service_header" data-bs-parent="#summaryGroup">
                            <div class="accordion-body">  
                                <ul class="row m-0 " >
                                    <li ng-repeat="(key, service) in enquiry.services" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
                                </ul>  
                                <form id="service__commentsForm" ng-submit="sendComments('service','Admin')" class="input-group mt-3">
                                    <input required type="text" ng-model="service__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                </form>  
                                <div class="text-end pt-3">
                                    <a class="text-primary p-0 btn"  ng-click="showCommentsToggle('viewConversations', 'service', 'Selected Services')">
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
                                IFC Models & Uploaded Documents
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
                                            <tr  ng-repeat="(key, ifc_model) in enquiry.ifc_model_uploads">
                                                <td> @{{ $index + 1}} </td>
                                                <td> @{{ ifc_model.created_at }}</td>
                                                <td> @{{ ifc_model.file_type }}</td>
                                                <td> @{{ ifc_model.document_type.document_type_name }}</td>
                                                <td class="text-center"> 
                                                    <a download="{{ asset("public/uploads/") }}/@{{ ifc_model.file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                                    <a target="_child" href="{{ asset("public/uploads/") }}/@{{ ifc_model.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
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
                                    <a class="text-primary p-0 btn"  ng-click="showCommentsToggle('viewConversations', 'ifc_model', 'IFC Models & Uploaded Documents')">
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
                                Building Components
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                <i data-bs-toggle="collapse" 
                                    href="#building_component" 
                                    aria-expanded="false" 
                                    aria-controls="building_component" 
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "></i>
                            </div>
                        </div>
                        <div id="building_component" class="accordion-collapse collapse  " aria-labelledby="building_component_header" data-bs-parent="#summaryGroup">
                            <div class="accordion-body">  
                                <div  style="max-height: 400px; overflow:auto">
                                     
                                    <table class="table table-bordered custom" >
                                        <tbody>
                                            <tr class="table-bold text-center">
                                                <th width="150px"> </th>
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
                                            
                                            <tr  ng-repeat="building_component in enquiry.building_component">
                                                <td>@{{ building_component.wall }}</td>
                                                <td style="padding: 0 !important"  >
                                                    <table class="table m-0 ">
                                                        <tr ng-repeat="detail in building_component.detail"> 
                                                            <td width="50%">
                                                                <table class="table m-0 table-bordered">
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
                                <form id="building_component__commentsForm" ng-submit="sendComments('building_component','Admin')" class="input-group mt-3">
                                    <input required type="text" ng-model="building_component__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                </form>  
                                <div class="text-end pt-3">
                                    <a class="text-primary p-0 btn"  ng-click="showCommentsToggle('viewConversations', 'building_component', 'Building Components')">
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
                                <table class="table custom table-bordered">
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
                                        <td>@{{ additional_info.comments }}</td>
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
             
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->