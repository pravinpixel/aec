<ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
    <li class="time-bar"></li>
    @if (userHasAccess('project_summary_index'))
        <li class="nav-item Project_Info">
            <a href="#!/project-summary" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ project_summary_status == 'Submitted' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/information.png') }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Project summary</p>
            </a>
        </li>
    @endif
    @if (userHasAccess('technical_estimate_index'))
        <li class="nav-item  admin-Technical_Estimate-wiz">
            <a href="#!/technical-estimation" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ technical_estimation_status == '1' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/technical-support.png') }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Technical Estimate</p>
            </a>
        </li>
    @endif
    @if (userHasAccess('cost_estimate_index'))
        <li class="nav-item admin-Cost_Estimate-wiz {{ userRole()->slug == config('global.cost_estimater') ? 'last' : '' }}"
            style="pointer-events: @{{ technical_estimation_status == 0 ? 'none' : 'unset' }}">
            <a href="#!/cost-estimation" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle  @{{ cost_estimation_status == '1' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/budget.png') }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Cost Estimate</p>
            </a>
        </li>
    @endif
    @if (userHasAccess('proposal_sharing_index'))
        <li class="nav-item admin-Proposal_Sharing-wiz" ng-class="{last:proposal_sharing_status == 0}"
            style="pointer-events: @{{ cost_estimation_status == 0 ? 'none' : 'unset' }}">
            <a href="#!/proposal-sharing" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ proposal_sharing_status == '1' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/share.png') }}" ng-click="getDocumentaryFun();"
                            class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Proposal Sharing</p>
            </a>
        </li>
    @endif
    @if (userHasAccess('customer_response_index'))
        <li ng-show="proposal_sharing_status == 1" class="nav-item admin-Delivery-wiz"
            style="pointer-events: @{{ customer_response == null ? 'none' : 'unset' }}">
            <a href="#!/move-to-project" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ customer_response == '1' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/arrow-right.png') }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5  mts-2">Customer Response</p>
            </a>
        </li>
    @endif
</ul>
 
<div class="card-body pt-0 p-0">
    <table class="table custom shadow-none border m-0 mt-2 table-bordered ">
        <thead >
            <tr>
                <td colspan="4" class="text-center fw-bold">
                    Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.enquiry.contact_person }}</span>
                </td>
            </tr>
            <tr>
                <th>Enquiry Received Date</th>
                <th>Person Contact</th>
                <th>Type of Building</th>
                <th>Enquiry Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>@{{ enquiry.enquiry.enquiry_date | date:'dd-MM-yyyy' }}</td>
                <td>@{{ enquiry.enquiry.contact_person }}</td>
                <td>@{{ enquiry.building_type.building_type_name  }}</td>
                <td><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
            </tr>
        </tbody>
    </table> 
</div>
 
@if (userHasAccess('cost_estimate_index'))
    <div class="card mt-3 border shadow-sm">
        <div class="card-header bg-light p-2">
            <label class="lead border-end me-3 pe-3">
                <input type="radio" ng-model="price_calculation" name="price_calculation"
                    ng-value="'wood_engineering_estimation'" class="form-check-input me-2">
                    <b>Wood Engineering Estimation</b>
            </label>
            <label class="lead">
                <input type="radio" ng-model="price_calculation" name="price_calculation"
                    ng-value="'precast_engineering_estimation'" class="form-check-input me-2">
                <b>Precast Engineering Estimation</b>
            </label> 
        </div>
        <div class="card-body p-2">
            <div ng-show="price_calculation == 'wood_engineering_estimation'">
                @include('admin.enquiry.wizard.wood-estimation')
            </div>
            <div ng-show="price_calculation == 'precast_engineering_estimation'">
                @include('admin.enquiry.wizard.precast-estimation')
            </div>
        </div> 
    </div> 
@endif
@if (userRole()->slug == config('global.cost_estimater'))
    <div class="card m-0 my-3 border col-md-9 me-auto">
        <div class="card-body">
            <small class="btn link"
                ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">
                <i class="fa fa-send me-1"></i> 
                <u>  
                    Send a Comments
                    <span ng-show="cost_estimate_comments.admin_role > 0" class="enquiry__comments__alert">
                        @{{ cost_estimate_comments.admin_role   }}
                    </span>
                </u>
            </small>
        </div>
    </div>
@endif
@if (userHasAccess('cost_estimate_add')) 
    <div class="row m-0">
        <div class="col-md-6 ps-0">
            <div class="card shadow-sm border mb-2"> 
                <div class="card-header bg-light p-2">
                    <h4 class="m-0">Assign for Estimation</h4>
                </div> 
                <div class="card-body p-2">
                    <select class="form-select form-select-sm" ng-model="assign_to" id="inputGroupSelect01">
                        <option value=""> @lang('global.select') </option>
                        <option ng-repeat="user in userList" 
                                ng-selected="user.id == assign_to" 
                                value="@{{user.id}}"> @{{ user.id == current_user ? 'You' : user.first_name}}
                        </option>
                    </select> 
                </div> 
                <div class="card-footer p-2 text-center">
                    <button class="input-group-text btn-sm btn btn-info" ng-click="assignUserToCostestimate(assign_to, 'verification')"><i class="fa fa-pen"></i> Assign </button>
                    <button class="input-group-text btn-sm btn btn-danger" ng-click="removeUser()"><i class="fa fa-times"></i> Remove </button>
                </div>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="card border shadow-sm mb-2"> 
                <div class="card-header bg-light p-2">
                    <h4 class="m-0">Estimation History</h4>
                </div> 
                <div class="card-body p-2 text-center">
                    <button type="button" ng-click="getHistory('wood')"  ng-show="price_calculation == 'wood_engineering_estimation'"class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Cost-estimate-history-modal">
                        <i class="fa fa-history"></i> View 
                     </button>
                     <button type="button" ng-click="getHistory('precast')" ng-show="price_calculation == 'precast_engineering_estimation'" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Cost-estimate-history-modal">
                        <i class="fa fa-history"></i> View  
                     </button> 
                    <button ng-click="printCostEstimate('wood')" class="btn btn-primary btn-sm"
                        ng-show="price_calculation == 'wood_engineering_estimation'">
                        <i class="me-1 fa fa-print"></i> Print
                    </button>
                    <button ng-click="printCostEstimate('precast')" class="btn btn-primary btn-sm"
                        ng-show="price_calculation == 'precast_engineering_estimation'">
                        <i class="me-1 fa fa-print"></i> Print
                    </button>
                    <button class="btn btn-success btn-sm"
                        ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">
                        <i class="fa fa-send me-1"></i> 
                        <span class="cost_estimate_comments_ul">
                            Send a Comments
                            <span class="cost_estimate_comments" ng-show="cost_estimate_comments.cost_estimate_role > 0">
                                @{{ cost_estimate_comments.cost_estimate_role }}
                            </span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
     
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#!/technical-estimation" class="btn btn-light border shadow-sm">Prev</a>
            </div>
            <div>
                <a ng-show="cost_estimation_status  != 0  && cost_estimate.assign_to == {{ Admin()->id }} || (cost_estimate.assign_for_status == 1)"
                    href="#!/proposal-sharing" ng-click="gotoNext()" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div>
@endif

@include('admin.enquiry.models.cost-estimate-chat-box')
<!-- Right modal -->

<div id="Cost-estimate-history-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right w-100 h-100">
        <div class="modal-content h-100">
            <div class="modal-header border-0 bg-light">
                <h3>Cost Estimation History</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body " style="max-height: 80vh;overflow:auto">
                <div id="history_id">
                    <div ng-show="price_calculation == 'wood_engineering_estimation'">
                        <div id="wood_id"></div>
                    </div>
                    <div ng-show="price_calculation == 'precast_engineering_estimation'">
                        <div id="precast_id"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-end">
                    <button ng-click="printCostEstimate('wood')" class="btn btn-primary btn-sm"
                        ng-show="price_calculation == 'wood_engineering_estimation'">
                        <i class="me-1 fa fa-print"></i> Print
                    </button>
                    <button ng-click="printCostEstimate('precast')" class="btn btn-primary btn-sm"
                        ng-show="price_calculation == 'precast_engineering_estimation'">
                        <i class="me-1 fa fa-print"></i> Print
                    </button>
                    <button class="btn btn-success btn-sm"
                        ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">
                        <i class="fa fa-send me-1"></i> 
                        <span class="cost_estimate_comments_ul">
                            Send a Comments
                            <span class="cost_estimate_comments" ng-show="cost_estimate_comments.cost_estimate_role > 0">
                                @{{ cost_estimate_comments.cost_estimate_role }}
                            </span>
                        </span>
                    </button>
                </div> 
            </div>
        </div>
    </div>
</div> 

@if (Route::is('enquiry.cost-estimation'))
    <style>
        .admin-Cost_Estimate-wiz .timeline-step .inner-circle {
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