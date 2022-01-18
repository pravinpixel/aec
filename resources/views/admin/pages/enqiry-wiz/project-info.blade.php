<div ng-controller="WizzardCtrl">
    <div class="summary-group pt-3">
        
        {{-- ProjectInfo --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm"> 
            <div class="legend shadow-sm border rounded text-primary">Project Information </div>
            <div class="card-body">  
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
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div> 
               
                <div class="text-end pt-2">
                    <a href="" class="text-primary pe-2 pt-2" data-bs-toggle="modal" data-bs-target="#right-modal">
                        <i class="fa fa-eye"></i>  Previous chat history
                    </a>
                </div>
            </div> 
        </fieldset>
        {{-- ProjectInfo --}}

        {{-- Selected Services --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">Selected Services</div>
            <div class="card-body">
                <ul class="row m-0 " >
                    <li ng-repeat="service in services" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
                </ul> 
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div>
            </div> 
        </fieldset>
        {{-- Selected Services --}}

        {{-- IFC Models & Uploaded Documents --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">IFC Models & Uploaded Documents</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th><b>S.No</b></th>
                        <th><b>Date</b></th>
                        <th><b>File name</b></th>
                        <th><b>File Type</b></th>
                        <th class="text-center" width="150px"><b>Action</b></th>
                    </tr>
                    <tr ng-repeat="(index,doc) in ifc_model_uploads">
                        <td>@{{ index+1 }}</td>
                        <td>@{{ doc.pivot.date }}</td>
                        <td>@{{ doc.document_type_name }}</td>
                        <td>@{{ doc.pivot.file_type }}</td>
                        <td class="text-center">
                            <a download="{{ asset("public/uploads/") }}/@{{ doc.pivot.file_name }}" href="{{ asset("public/uploads/") }}/@{{ doc.pivot.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                            <a target="_child" href="{{ asset("public/uploads/") }}/@{{ doc.pivot.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                        </td>
                    </tr> 
                </table>
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div>
            </div> 
        </fieldset>
        {{-- IFC Models & Uploaded Documents --}}

        {{-- Building Components --}} 
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">Building Components</div>
            <div class="card-body">
                <div  style="max-height: 400px; overflow:auto">
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
                             
                            <tr  ng-repeat="building_component in building_components">
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
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div>
            </div> 
        </fieldset>
        {{-- Building Components --}}
 

        {{-- Additional Info --}} 
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">Additional Info</div>
            <div class="card-body pt-4">
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
                        <td>@{{ additional_info.comments }}</td>
                    </tr> 
                </table>
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div>
            </div> 
        </fieldset>
        {{-- Additional Info --}}
    </div>
</div>
<style>
   
    fieldset:hover ,   fieldset:hover  .legend {
        border: 1px solid #757CF2 !important
    }
    .legend {
      top: -15px;
      position: absolute;
      font-weight: bold;
      line-height: 25px;
      padding: 0px 10px;
      background: white;
      left: 25px;
    } 
    .table-bold {
        font-weight: bold !important
    }
    .Project_Info .timeline-step .inner-circle{
        background: #757CF2 !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style>