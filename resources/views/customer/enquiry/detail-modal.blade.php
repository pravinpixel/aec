<div id="right-modal-progress" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    
                                                    <tr  ng-repeat="building_component in enquiry.building_components">
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
</div>