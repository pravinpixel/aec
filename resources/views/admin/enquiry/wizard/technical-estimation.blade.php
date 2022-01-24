<div class="row mx-0 mt-3 " ng-controller="Cost_Estimate">
    <div class="col-lg-9 p-0">
        <div class="card shadow-none p-0">
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
            
            <div class="card-body ">
                <div class="row align-items-center mb-2">
                    <div class="col-sm-6">
                        <button class="btn btn-sm btn-outline-primary " ng-click="Add_Wall()"><i class="fa fa-plus"></i> Add Building</button>
                    </div>
                    <div class="col-sm-6 text-end">
                        <span class="text-secondary">Total Area :</span> <b> @{{sum(building_component)}} </b> 
                    </div>
                </div> 
                <table class="table m-0 " >
                    <thead class="bg-light">
                        <tr>
                            <th>Component Name</th>
                            <th>Sq. Mt. Estimate</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr ng-repeat="(i,est) in building_component">
                            <td style="padding:0 !important">
                                <input type="text" ng-model="est.wall" class="form-control">
                            </td>
                            <td  style="padding:0 !important">
                                <input type="text" emptyInput class="form-control" ng-model="est.total_wall_area" >
                            </td>
                            <td class="text-center"  style="padding:0 !important">
                                <a href="" class="btn btn-sm text-danger shadow btn-outline-light"ng-click="Delete_Wall(i)" ><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            
            <div class="card-footer ">
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
    <div class="col-lg-3 p-0">
        <div class="card mt-lg-5">
            <div class="card-header">
                <h4 class="m-0">Reference Doc's </h4>
            </div>
            <div>
                <ul class="list-group mt-0" ng-repeat="doc in enquiry.ifc_model_uploads">
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        <div class="d-flex align-items-center">
                            <div><a href="" data-bs-toggle="modal" data-bs-target="#right-modal" class="form-check-input me-2 border-0"><i class="uil-comment-alt-lines"></i></a></div>
                            <div class="d-flex  flex-column">
                                @{{ doc.document_type.document_type_name }} <small class="text-secondary">@{{ doc.document_type.created_at }}</small>
                            </div>
                        </div>
                        <a target="_child" href="{{ asset("public/uploads/") }}/@{{ doc.file_name }}" class="badge bg-primary rounded-pill"><i class="text-white fa fa-eye"></i></a>
                    </li> 
                </ul>
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