<div class="" id="reviewSubmit">
    <div class="summary-group pt-3">
        {{-- ProjectInfo --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">Project Information </div>
            <div class="card-body">
                <table class="table m-0  ">
                    <tbody>
                        <tr>
                            <td width="30%"><b>@lang('customer-enquiry.project_name')</b></td>
                            <td>@{{ project_info.project_name }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.construction_site_address')</b></td>
                            <td>@{{ project_info.site_address }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.post_code')</b></td>
                            <td>@{{ project_info.zipcode }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.place')</b></td>
                            <td>@{{ project_info.place }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.state')</b></td>
                            <td>@{{ project_info.state }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.country')</b></td>
                            <td>@{{ project_info.country }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.type_of_project')</b></td>
                            <td>@{{ project_info.project_type.project_type_name }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.type_of_building')</b></td>
                            <td>@{{ project_info.building_type.building_type_name }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.number_of_building')</b></td>
                            <td>@{{ project_info.no_of_building }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.type_of_delivery')</b></td>
                            <td>@{{ project_info.delivery_type.delivery_type_name }}</td>
                        </tr> 

                        <tr>
                            <td><b>@lang('customer-enquiry.contact_person_name')</b></td>
                            <td>@{{ project_info.contact_person }}</td>
                        </tr> 
                        <tr>
                            <td><b>@lang('customer-enquiry.e_post')</b></td>
                            <td>@{{ project_info.zipcode }}</td>
                        </tr> 
                    </tbody>
                </table> 
            </div> 
        </fieldset>
        {{-- ProjectInfo --}}

        {{-- Selected Services --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">@lang('customer-enquiry.select_service')</div>
            <div class="card-body">
                <ul class="row m-0 ">
                    <li ng-repeat="service in services" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
                </ul> 
            </div> 
        </fieldset>
        {{-- Selected Services --}}

        {{-- IFC Models & Uploaded Documents --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">@lang('customer-enquiry.ifc_model_upload_document')</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th><b>S.No</b></th>
                        <th><b>File name</b></th>
                        <th><b>File Type</b></th>
                        <th><b>View Type</b></th>
                        <th class="text-center" width="150px"><b>Action</b></th>
                    </tr>
                    <tr ng-repeat="ifc_model_upload in ifc_model_uploads">
                        <td> @{{ $index + 1}} </td>
                        <td> @{{ ifc_model_upload.client_file_name }}</td>
                        <td> @{{ ifc_model_upload.file_type }}</td>
                        <td> @{{ ifc_model_upload.document_type.document_type_name }}</td>
                        <td class="text-center">
                            <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                            <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                        </td>
                    </tr>
                </table> 
            </div> 
        </fieldset>
        {{-- IFC Models & Uploaded Documents --}}

        {{-- Building Components --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">@lang('customer-enquiry.building_component')</div>
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
            </div> 
        </fieldset>
        {{-- Additional Info --}}
    </div>
</div>
