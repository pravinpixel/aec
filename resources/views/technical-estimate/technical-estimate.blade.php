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
                <div class="d-flex justify-content-between">
                    <div class="row mx-0 align-items-center" >
                        <span ng-show="technical_estimate.assign_for == 'verification' && technical_estimate.assign_for_status == 1" class="alert d-flex align-items-center m-0 shadow border-success border alert-success bg-transparent text-success" role="alert">
                            <strong class="fa fa-check-circle fa-2x me-2" aria-hidden="true"></strong>
                            <span ng-show="technical_estimate.assign_for == 'verification' && technical_estimate.assign_for_status == 1"> Verification completed successfully</span>
                        </span>
                        <span  ng-show="technical_estimate.assign_for == 'verification' && technical_estimate.assign_for_status == 0" class="alert d-flex align-items-center m-0 shadow border-warning border alert-warning bg-transparent text-warning" role="alert">
                            <strong class="fa fa-exclamation-circle fa-2x me-2" aria-hidden="true"></strong>
                            <span> Waiting for verification</span>
                        </span>
                    </div>
                    <div class="text-end" ng-if="technical_estimate.assign_to == {{ Admin()->id }}">
                        <a class="btn btn-success" ng-click="updateTechnicalEstimate()"><i class="uil-sync"></i> Approve </a>
                    </div>
                </div>
            </div> 
            <div class="text-end mx-3 my-2">      
                <button class="btn btn-success" ng-click="showCommentsToggle('viewAssingTechicalConversations', 'technical_estimation_assign', 'Technical Estimate')">
                    <i class="fa fa-send me-1"></i> 
                    <span class="cost_estimate_comments_ul">
                        Send a Comments
                    </span>
                </button>
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