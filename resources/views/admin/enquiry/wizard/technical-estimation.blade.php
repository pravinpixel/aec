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
        <li class="nav-item  admin-Technical_Estimate-wiz {{  userRole()->slug == config('global.technical_estimater') ? "last" : '' }}" >
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
        <li class="nav-item admin-Proposal_Sharing-wiz"  ng-class="{last:proposal_sharing_status == 0}" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
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
        <li class="nav-item admin-Delivery-wiz" ng-show="proposal_sharing_status == 1" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
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
    @if(userHasAccess('technical_estimate_index'))
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
                                        <th>Enquiry Received Date</th>
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
                    <div class="card-body mb-0 pb-0">
                        <div class="row align-items-center mb-2"  class="technicalEstimateCurrentData">
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
                    
                        <div psi-sortable="" ng-model="building_building" id="root_technical_estimate">
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
                                                <input type="text"  required ng-required placeholder="Type here.." ng-value="est.name" ng-model="est.name" class="form-control bg-none form-control-sm rounded-0 border-0">
                                            </td>
                                            <td class="col"  style="padding:0 !important" > 
                                                <input type="number" onkeypress="return isNumber(event)" min="0" required ng-required get-total-components="[index , secindex]" class="form-control form-control-sm rounded-0 border-0" ng-value="est.sqfeet"ng-model="est.sqfeet">
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
                        <div class="p-0 mb-2">
                            @if(userHasAccess('technical_estimate_add'))
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
                                    <div class="text-end">
                                        <a class="btn btn-success" ng-click="updateTechnicalEstimate()"><i class="uil-sync"></i> Update</a>
                                    </div>
                                </div>
                            @endif
                        </div>
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

        @if(userRole()->slug == config('global.technical_estimater'))
            <div class="card m-0 my-3 border col-md-9 me-auto">
                <div class="card-body">
                    <small class="btn link" ng-click="showCommentsToggle('viewAssingTechicalConversations', 'technical_estimation_assign', 'Technical Estimate')"  title="add and view technical estimate commnets" >
                        <i class="fa fa-send me-1"></i> <u>Send a Comments</u>
                    </small>
                </div>
            </div>
        @endif

        @if(userHasAccess('technical_estimate_add'))
            {{-- <div class="card m-0 my-3 border col-md-9 me-auto">
                <div class="card-body"> 
                    <p class="lead mb-2"> <strong>Assign for verification</strong></p>
                    <div class="row my-2">
                        <div class="col">
                            <div class="form-check">
                                <input ng-checked="technical_estimate.assign_for == 'estimation'" class="form-check-input" ng-model="technical_estimate_assign_for" name="technical_estimate" type="radio" value="estimation" id="for_estimation">
                                <label class="form-check-label" for="for_estimation">
                                    Estimation
                                </label>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="form-check">
                                <input ng-checked="technical_estimate.assign_for == 'approval'" class="form-check-input"  ng-model="technical_estimate_assign_for"  name="technical_estimate" type="radio" value="approval" id="for_approval">
                                <label class="form-check-label" for="for_approval">
                                    Approval
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group w-100">
                        <select class="form-select" ng-model="assign_to" id="inputGroupSelect01">
                            <option value=""> @lang('global.select') </option>
                            <option ng-repeat="user in userList" ng-selected="user.id == assign_to" value="@{{user.id}}"> @{{ user.id == current_user ? 'You' : user.user_name}}</option>
                        </select> 
                        <button class="input-group-text btn btn-info"   ng-click="assignTechnicalEstimate(assign_to, technical_estimate_assign_for)"> Assign  </button>
                    </div> 
                    
                </div>
            </div>  --}}

            <div class="card m-0 my-3 border col-md-9 me-auto">
                <div class="card-body">
                    <p class="lead mb-2"> <strong>Assign for verification</strong></p>
                    <div class="btn-group w-100">
                        <select class="form-select" ng-model="assign_to" id="inputGroupSelect01">
                            <option value=""> @lang('global.select') </option>
                            <option ng-repeat="user in userList" 
                                    ng-selected="user.id == assign_to" 
                                    value="@{{user.id}}"> @{{ user.id == current_user ? 'You' : user.first_Name}}
                            </option>
                        </select> 
                        <button class="input-group-text btn btn-info"
                            ng-click="assignTechnicalEstimate(assign_to, 'verification')"> Assign </button>
                        <button class="input-group-text btn btn-danger" ng-click="removeUser()"> Remove </button>
                    </div> 
                </div>
            </div>

            <div class="card border shadow-sm my-3 col-md-9 me-auto">
                <div class="card-header">
                    <h5 class="m-0">
                        <a class="align-items-center d-flex  py-1" ng-click="getHistory()">
                            <i class="fa fa-history me-2 fa-2x" aria-hidden="true"></i>
                            Technical Estimation History
                        </a>
                    </h5>
                </div>
                <div class="card-body bg-light p-0">
                    <div>
                        <div id="technical_estimate_histories"></div>
                    </div>
                </div>
            </div>

            <div class="text-end my-3  col-md-9 me-auto">
                <button ng-click="printTechnicalEstimate()" class="btn btn-primary">
                    <i class="me-1 fa fa-print"></i> Print
                </button>
               
                <button class="btn btn-success" ng-click="showCommentsToggle('viewAssingTechicalConversations', 'technical_estimation_assign', 'Technical Estimate')">
                    <i class="fa fa-send me-1"></i> 
                    <span class="cost_estimate_comments_ul">
                        Send a Comments
                    </span>
                </button>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="#!/project-summary" class="btn btn-light border shadow-sm">Prev</a>
                    </div>
                    <div>
                        <a ng-show="(technical_estimation_status != 0 && technical_estimate.assign_to == {{ Admin()->id }}) || (technical_estimate.assign_for_status == 1)" 
                            ng-click="gotoNext()"
                            class="btn btn-primary">
                        Next</a>
                    </div>
                </div>
            </div>
        @endif
    @endif
    @include("admin.enquiry.models.technical-estimation-chat-box") 
    @include("admin.enquiry.models.assign-technical-estimation-chat-box") 
    @include('customer.enquiry.models.document-modal')
</div>
{{-- @{{ building_component }} --}}
@if (Route::is('enquiry.technical-estimation'))
    <style>
        .admin-Technical_Estimate-wiz .timeline-step .inner-circle{
            background: var(--secondary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        } 
        .placeholder {
            background: lightgray !important;
            border: 2px dotted gray;
            min-height: 30px;
            width: 100% !important;
            margin: 10px 0 !important; 
        }
    </style>
@endif

