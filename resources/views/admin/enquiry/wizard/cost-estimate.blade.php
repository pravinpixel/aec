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
    <li class="nav-item  admin-Technical_Estimate-wiz">
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
    <li class="nav-item admin-Cost_Estimate-wiz {{  userRole()->slug == config('global.cost_estimater') ? "last" : '' }}"  style="pointer-events: @{{ technical_estimation_status ==  0 ? 'none' :'unset' }}">
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
    <li class="nav-item admin-Proposal_Sharing-wiz" ng-class="{last:proposal_sharing_status == 0}" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
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
    <li  ng-show="proposal_sharing_status == 1" class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
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
<div class="card-header pb-2 p-3 text-center border-0">
    <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.customer_info.contact_person }}</span></h4>
</div>
<div class="card-body pt-0 p-0">
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
                <td>@{{ enquiry.enquiry.customer.contact_person }}</td>
                <td>@{{ enquiry.project_type  }}</td>
                <td><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
            </tr>
        </tbody>
    </table> 
</div>
@if(userHasAccess('cost_estimate_index'))
    @include('admin.calculate-cost-estimate.wood-estimation')
    <p class="lead mb-2 text-center text-danger" ng-show="cost_estimate.assign_for == 'estimation' && cost_estimate.assign_for_status == 0"> <strong>Waiting for estimation</strong></p>
    <p class="lead mb-2 text-center text-danger" ng-show="cost_estimate.assign_for == 'approval' && cost_estimate.assign_for_status == 0"> <strong>Waiting for approval</strong></p>
    <p class="lead mb-2 text-center text-success" ng-show="cost_estimate.assign_for_status == 1 && cost_estimate.assign_for == 'estimation'"> <strong>Estimated successfully</strong></p>
    <p class="lead mb-2 text-center text-success" ng-show="cost_estimate.assign_for_status == 1 && cost_estimate.assign_for == 'approval'"> <strong>Approved successfully </strong></p>
    <div class="text-end">
        <a class="btn btn-success" ng-click="UpdateCostEstimate()"><i class="uil-sync"></i> Update</a>
    </div>
@endif
<div class="card m-0 my-3 border col-md-9 me-auto">
    <div class="card-body">
        <p class="lead mb-2"> <strong>Assign for</strong></p>
        <div class="row my-2">
            <div class="col">
                <div class="form-check">
                    <input ng-checked="cost_estimate.assign_for == 'estimation'" class="form-check-input" ng-model="cost_estimate_assign_for" name="cost_estimate" type="radio" value="estimation" id="for_estimation">
                    <label class="form-check-label" for="for_estimation">
                        Estimation
                    </label>
                </div>
            </div>
            
            <div class="col">
                <div class="form-check">
                    <input ng-checked="cost_estimate.assign_for == 'approval'" class="form-check-input"  ng-model="cost_estimate_assign_for"  name="cost_estimate" type="radio" value="approval" id="for_approval">
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
           
            <button class="input-group-text btn btn-info"  ng-click="assignUserToCostestimate(assign_to, cost_estimate_assign_for)"> Assign  </button>
        </div> 
        <small class="float-end btn link p-0 mt-2"  ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">
            <i class="fa fa-send me-1"></i> <u>Send a Comments</u>
        </small>
    </div>
</div> 

<div class="card-footer">
    <div class="d-flex justify-content-between">
        <div>
            <a href="#!/technical-estimation" class="btn btn-light border shadow-sm">Prev</a>
        </div>
        <div>
            <a ng-show="cost_estimation_status  != 0  && cost_estimate.assign_to == {{ Admin()->id }} || (cost_estimate.assign_for_status == 1)" 
              href="#!/proposal-sharing"  
              ng-click="gotoNext()"
              class="btn btn-primary">Next</a>
        </div>
    </div>
</div> 
@include("admin.enquiry.models.cost-estimate-chat-box") 

@if (Route::is('enquiry.cost-estimation')) 
    <style>
        .admin-Cost_Estimate-wiz .timeline-step .inner-circle{
            background: var(--secondary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endif