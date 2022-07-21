<ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
    <li class="time-bar"></li>
        @if(userHasAccess('project_summary_index') )
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
        <li class="nav-item admin-Proposal_Sharing-wiz" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
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
        <li class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
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
    <div class="card shadow mx-auto shadow col-md-8 my-4"  ng-show="enquiry_status == 0">
    <div class="row border-bottom m-0">
        <div class="p-0 col-md-4 bg-warning d-flex justify-content-center align-items-center">
            <i class="fa fa-warning fa-3x text-white"></i>
        </div>
        <div class="col-md-8">
            <div class="card-body p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Waiting for response</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="col-12 mb-3">
                <strong class="card-text text-secondary "><i class="text-secondary mdi-chevron-right-circle mdi " aria-hidden="true"></i> Set Next follow up date​</strong>
                <div class="input-group mt-2">
                    <input  ng-model="customer_response_obj.follow_up_date" type="date" class="form-control form-control-sm" data-date-inline-picker="true">
                    <button class="btn btn-info btn-sm">Set</button>
                </div>
            </div>
            <div class="col-12 mb-3">
                <strong class="card-text text-secondary"><i class="text-secondary mdi-chevron-right-circle mdi " aria-hidden="true"></i> Manual Override​</strong>
                <div class="input-group mt-2">
                    <select ng-model="customer_response_obj.follow_up_status" class="form-select form-control-sm">
                        <option value="">@lang('customer-enquiry.select')</option>
                        <option value="Approved"  ng-selected="true">Approved</option>
                    </select>
                    <button class="btn btn-info btn-sm">Move</button>
                </div>  
            </div>  
        </div>  
    </div>
</div>
@if(userHasAccess('customer_response_index'))
<div class="card shadow mx-auto shadow col-md-8 my-4" ng-show="enquiry_status == 1">
    <div class="row border-bottom m-0" >
        <div class="p-0 col-md-4 bg-success d-flex justify-content-center align-items-center">
            <i class="fa fa-check-circle fa-3x text-white"></i>
        </div>
        <div class="col-md-8">
            <div class="card-body p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Approved</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class=" mb-3">
            <strong class="card-text text-secondary"><i class="text-primary mdi-file-replace mdi" aria-hidden="true"></i> Assign to</strong>
            <select name="assign_user" ng-model="customer_response_obj.assign_user" id="" class="form-select shadow mt-2" style="padding: 10px 20px  !important; border: 1px solid lightgray !important" >
                <option value="">@lang('global.select')</option>
                <option ng-repeat="(index,user) in userList" value="@{{ user.id }}" ng-selected="user.id == response_data.progress.project_assign_to">
                    @{{ user.user_name }}
                </option>
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-light me-2 p-3 py-2">Cancel</button>
            <button class="btn btn-primary p-3 py-2 me-2 " ng-click="assignToProject()"> <i class="fa fa-check-circle me-1 text-white"></i> Assign </button>
            <button class="btn btn-success p-3 py-2" ng-click="moveToProject()"> <i class="fa fa-check-circle me-1 text-white"></i> Move to Project </button>
        </div>
    </div>
</div> 

<div class="card shadow mx-auto col-md-4 my-4" ng-show="enquiry_status == 2">
    <div class="row border-bottom m-0">
        <div class="p-0 col-md-12 py-2 bg-danger d-flex justify-content-center align-items-center">
            <i class="fa fa-times-circle fa-3x text-white"></i>
        </div>
        <div class="col-md-12">
            <div class="card-body text-center p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Denied</h3>
            </div>
        </div>
    </div> 
</div> 

<div class="card-footer">
    <label for="copy_enq" class="text-center mb-3 col-12">
        <input id="copy_enq" type="checkbox" class="form-check-input me-2"> Copy Enquiry details to Share Point​
    </label>
    <div class="d-flex justify-content-between">
        <div>
            <a href="#!/proposal-sharing" class="btn btn-light border" >Prev</a>
        </div>
        <div>
            <button class="btn btn-info border">Move to Project​</button>
        </div>
    </div>
</div>
@endif
@if (Route::is('enquiry.move-to-project')) 
    <style>
        .admin-Delivery-wiz .timeline-step .inner-circle{
            background: var(--secondary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        } 
    </style>
@endif