<div class="row mx-0 mt-3 " ng-controller="Cost_Estimate">
   
    <div class="col-lg-9 p-0">
        <div class="card shadow-none p-0 m-0">
            <div class="card-header pb-0 border-0">
                <div class="card-header pb-2 p-3 text-center border-0">
                    <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.customer_info.contact_person }}</span></h4>
                </div>
                <div class="card-body pt-0 p-0">
                    <table class="table shadow-none border m-0 table-bordered ">
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
                                <td>@{{ enquiry.enquiry.customer.contact_person }}</td>
                                <td>@{{ enquiry.enquiry.project_type.project_type_name  }}</td>
                                <td class="text-center"><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div> 
            <div class="card-body mb-0 pb-0" >
                <div class="row align-items-center mb-2">
                    <div class="col-sm-6">                        
                        <button class="btn btn-sm btn-primary " ng-click="Add_building()"><i class="fa fa-plus"></i> Add Building</button>
                    </div>
                    <div class="col-sm-6 text-end">
                        <span class="text-secondary">Total Area :</span> <b>  </b> 
                    </div>
                </div> 
                <div > 
                    <table ng-repeat="(index,buliding) in building_building" class="table  border shadow-sm table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>S.No</th>
                                <th>Component Name</th>
                                <th>Sq. Mt. Estimate</th>
                                <th class="text-center"> 
                                    <div class="btn-group border">
                                        <button type="button" class="btn btn-outline-primary btn-sm " ng-click="Add_component(index)"><i class="mdi mdi-plus"></i> Add</button>
                                        <button type="button" class="btn btn-primary  btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" ng-click="Delete_building(index)">
                                                <span class=" btn p-0"><i class="fa fa-trash text-danger"></i> Delete Building</span>
                                            </a>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr ng-repeat="(secindex,est) in buliding.building_component_number">
                                <td>@{{ secindex+1 }}</td>
                                <td style="padding:0 !important">
                                    <input type="text" ng-model="est.name" class="form-control form-control-sm rounded-0 border-0">
                                </td>
                                <td  style="padding:0 !important" > 
                                    <input type="number" get-total-components="[index , secindex]" class="form-control form-control-sm rounded-0 border-0" ng-model="est.sqfeet" >
                                </td>
                                <td class="text-center"  style="padding:0 !important">
                                    <a href="" class="btn btn-sm text-danger w-100 btn-outline-light"ng-click="Delete_component(index, secindex)" ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <td colspan="4">Total :
                                    <b>@{{ buliding.total_component_area }}</b>
                                    <input type="text" ng-model="buliding.total_component_area" class="d-none">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>  
        </div> 
    </div>
    <div class="col-lg-3 p-0">
        
        <div class="card mt-lg-5">
            <div class="card-header">
                <h4 class="m-0">Reference Doc's </h4>
            </div>
            <div>
                <ul class="list-group mt-0" ng-repeat="doc in enquiry.ifc_model_uploads">
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ps-2">
                        <div class="d-flex align-items-center">
                            <div class="h-100 p-0 ">
                                <a class="text-primary btn btn-sm btn-light border rounded-pill me-1"  ng-click="showTechCommentsToggle('viewTechicalDocsConversations', 'techical_estimation', doc.id)">
                                    <i class="uil-comment-alt-lines"></i>
                                </a>
                            </div>
                            <div>
                                <div class="d-flex flex-column">
                                 
                                    @{{ doc.document_type.document_type_name }} <small class="text-secondary">@{{ doc.document_type.created_at }}</small>
                                </div>
                            </div>
                        </div>
                        <a target="_child" href="{{ asset("public/uploads/") }}/@{{ doc.file_name }}" class="badge bg-primary rounded-pill"><i class="text-white fa fa-eye"></i></a>
                    </li> 
                </ul>
            </div>
        </div>
    </div> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row m-0">
                    <div class="col-md-8 p-0">
                        <div class="input-group ">
                            <label class="input-group-text bg-white font-weight-bold" for="inputGroupSelect01">Assign to</label>
                            <select class="form-select" id="inputGroupSelect01">
                              <option selected>Choose...</option>
                              <option value="1">User One</option> 
                              <option value="1">User Two</option> 
                              <option value="1">User Three</option> 
                            </select>
                            <label class="input-group-text btn btn-info" for="inputGroupSelect01">send</label>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="text-end">
                            <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban"></i> Cancel</button>
                            <a class="btn btn-success" ng-click="updateTechnicalEstimate()"><i class="uil-sync"></i> Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#!/project-summary" class="btn btn-outline-primary">Prev</a>
            </div>
            <div>
                <a href="#!/cost-estimation" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div>
    @include("admin.enquiry.models.technical-estimation-chat-box")
</div>
{{-- @{{ building_component }} --}}
@if (Route::is('enquiry.technical-estimation'))
    <style>
        .admin-Technical_Estimate-wiz .timeline-step .inner-circle{
            background: var(--primary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        } 
    </style>
@endif