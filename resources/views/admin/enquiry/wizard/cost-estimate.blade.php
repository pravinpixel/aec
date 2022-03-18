<ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
    <li class="time-bar"></li>
    @if(userHasAccess('project_summary_index'))
    <li class="nav-item Project_Info">
        <a href="#/project-summary" style="min-height: 40px;" class="timeline-step">
            <div class="timeline-content">
                <div class="inner-circle @{{ project_summary_status == 'Active' ? 'bg-primary' :'bg-secondary' }}">
                    <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                </div>
            </div>
            <p class="h5 mt-2">Project summary</p>
        </a>
    </li>
    @endif
    @if(userHasAccess('technical_estimate_index'))
    <li class="nav-item  admin-Technical_Estimate-wiz">
        <a href="#/technical-estimation" style="min-height: 40px;" class="timeline-step">
            <div class="timeline-content">
                <div class="inner-circle @{{ technical_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                    <img src="{{ asset("public/assets/icons/technical-support.png") }}" class="w-50 invert">
                </div>
            </div>
            <p class="h5 mt-2">Technical Estimate</p>
        </a>
    </li>
    @endif 
    @if(userHasAccess('cost_estimate_index')) {{config('role.cost_estimater')}}
    <li class="nav-item admin-Cost_Estimate-wiz {{  userRole()->slug == config('global.cost_estimater') ? "last" : '' }}"  style="pointer-events: @{{ technical_estimation_status ==  0 ? 'none' :'unset' }}">
        <a href="#/cost-estimation" style="min-height: 40px;" class="timeline-step">
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
        <a href="#/proposal-sharing" style="min-height: 40px;"  class="timeline-step">
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
        <a href="#/move-to-project" style="min-height: 40px;"  class="timeline-step" >
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
@if(userHasAccess('cost_estimate_index'))
<form class="card shadow-none p-0">
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
                    <td>@{{ enquiry.project_type  }}</td>
                    <td><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
                </tr>
            </tbody>
        </table> 
        <div class="row m-0 mt-3">
            <div class="table-responsive p-0">  
                <table class="cost-estimate-table table table-bordered border">
                    <thead>
                        <tr  style="background: var(--primary-bg) !important">
                            <td colspan="16" class="text-center"><h5 class="m-0 py-1 text-white">Engineering Estimation</h5></td>
                        </tr>
                        <tr class="font-weight-bold ">
                            <th rowspan="3" class="text-center " style="background: var(--primary-bg) !important">
                                <span class="mb-1 font-12">Component</span>
                                <button class="btn-sm btn font-12 btn-info shadow-0 w-100 py-0" ng-click="create()"><i class="fa fa-plus"></i> Add </button>
                            </th>
                            <th rowspan="3" class="text-center font-12" style="background: var(--primary-bg) !important">Type</th>
                            
                            <th class="text-center font-12" style="background: var(--primary-bg) !important" >1 to 2</th>
                            <th rowspan="2" class="text-center font-12" style="background: var(--primary-bg) !important" >m2 Gross</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Details</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Statistics</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">CAD/CAM</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Logistics</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--primary-bg) !important">Total Cost</th>
                            <td rowspan="3" class="font-12 text-center" style="background: var(--primary-bg) !important"><b class="text-white">Action</b></td>
                        </tr>
                        <tr class="bg-light-primary border">
                            <th rowspan="2" class="text-center font-12" style="background: var(--primary-bg) !important" >Complexity</th> 
                            <th class="text-center" style="background: var(--secondary-bg) !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: var(--secondary-bg) !important"><small>Sum</small></th> 
                            <th class="text-center" style="background: var(--secondary-bg) !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: var(--secondary-bg) !important"><small>Sum</small></th> 
                            <th class="text-center" style="background: var(--secondary-bg) !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: var(--secondary-bg) !important"><small>Sum</small></th> 
                            <th class="text-center" style="background: var(--secondary-bg) !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: var(--secondary-bg) !important"><small>Sum</small></th> 
                            <th class="text-center" style="background: var(--primary-bg) !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: var(--primary-bg) !important"><small>Sum</small></th>  
                        </tr>
                        <tr class="bg-light-primary border">
                            <td class="text-center font-12 p-0"><b>@{{CostEstimate.ComponentsTotals.sqm }}</b></td>  
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.Details.Sum / CostEstimate.ComponentsTotals.sqm }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.Details.Sum }}</b></td>   
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.Statistics.Sum / CostEstimate.ComponentsTotals.sqm }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.Statistics.Sum }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.CadCam.Sum / CostEstimate.ComponentsTotals.sqm }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.CadCam.Sum }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.Logistics.Sum / CostEstimate.ComponentsTotals.sqm }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.Logistics.Sum }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.TotalCost.Sum / CostEstimate.ComponentsTotals.sqm}}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ CostEstimate.ComponentsTotals.TotalCost.Sum }}</b></td> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(index,C) in CostEstimate.Components" class="touched-td" >  
                            <td> 
                                <select class="my-select" get-cost-estimate-data ng-model="c.building_component_name" name="building_component_name">
                                    <option value="">-- Select -- </option> 
                                    <option value="@{{ c.id }}" ng-selected="c.id == C.Component" ng-repeat="c in cost.component">@{{ c.building_component_name }}</option>
                                </select>
                            </td> 
                            <td style="padding: 0 !important">
                                <select get-cost-estimate-data class="my-select" ng-model="t.type_name" ng-change="getCostEstimateData(index)" name="type_name">
                                    <option value="">-- Select ---</option> 
                                    <option value="@{{ Ctype.id }}" ng-selected="Ctype.id == C.Type" ng-repeat="Ctype in cost.type">@{{ Ctype.building_type_name }}</option>
                                </select>
                            </td>

                            

                            <td style="padding:0px !important"><input get-cost-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  ng-model="C.Complexity" name="complexity" class="my-control"></td>

                            <td style="padding:0px !important"><input get-cost-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  ng-model="C.sqm" name="sqm" class="my-control"> </td>
        
                            {{-- Details --}}
                            <td>
                                <input  get-cost-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.Details.PriceM2" name="detail_price">
                            </td>

                            <td style="background: var(--primary-bg-light) !important">
                                <input disabled type="text" onkeypress="return isNumber(event)" class="my-control" ng-model="C.Details.Sum" name="detail_sum">
                            </td>
        
                            {{-- Statistics --}}
                            <td>
                                <input type="text" onkeypress="return isNumber(event)" min="0" get-cost-details-total ng-keyup="getCostDetailsTotal(index)" class="my-control"  ng-model="C.Statistics.PriceM2" name="statistic_price">
                            </td>
                            <td style="background:  var(--primary-bg-light) !important">
                                <input disabled type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.Statistics.Sum" name="statistic_sum">
                            </td>
        
                            {{-- CAD/CAM --}}
                            <td>
                                <input  type="text" onkeypress="return isNumber(event)" min="0" get-cost-details-total class="my-control" ng-keyup="getCostDetailsTotal(index)" ng-model="C.CadCam.PriceM2" name="cad_cam_price">
                            </td>
                            <td>
                                <input disabled type="text" onkeypress="return isNumber(event)" min="0" class="my-control" ng-model="C.CadCam.Sum" name="cad_cam_sum">
                            </td>
        
                            {{-- Logistics --}}
                            <td>
                                <input  type="text" onkeypress="return isNumber(event)" min="0" get-cost-details-total class="my-control" ng-keyup="getCostDetailsTotal(index)" ng-model="C.Logistics.PriceM2" name="logistic_price">
                            </td>
                            <td style="background:  var(--primary-bg-light) !important">
                                <input disabled  type="text" onkeypress="return isNumber(event)" min="0" class="my-control" ng-model="C.Logistics.Sum"  name="logistic_sum">
                            </td>
        
                            {{-- Total Cost --}}
                            <td><input disabled type="text" onkeypress="return isNumber(event)" min="0" class="my-control" name="total_price" ng-model="C.TotalCost.PriceM2"></td>
                            <td><input disabled type="text" onkeypress="return isNumber(event)" min="0" class="my-control" name="total_sum" ng-model="C.TotalCost.Sum"></td>
                            <td class="text-center" style="padding: 0 !important">
                                <i ng-click="delete(index)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i>
                            </td>
                        </tr>
                        {{-- <tr class="text-white " style="background: var(--primary-bg)"> 
                            <td colspan="2" class="text-center">
                                <b>Total</b>
                            </td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.complexity }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.sqm }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.Details.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.Details.Sum }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.Statistics.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.Statistics.Sum }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.CadCam.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.CadCam.Sum }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.Logistics.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.Logistics.Sum }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.TotalCost.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.TotalCost.Sum }}</td>
                            <td class="text-center">-</td>
                        </tr>  --}}
                    </tbody>
                </table>
            </div> 
           
            <div class="col-12 d-flex justify-content-between align-items-center bg-white border p-2">
                <h4 class="m-0"><span class="text-secondary">Total Cost :</span> <b>@{{ CostEstimate.ComponentsTotals.TotalCost.Sum  }}</b> </h4>
                <div>
                    <button class="btn btn-success" ng-click="UpdateCostEstimate()"><i class="uil-sync"></i> Update</button>
                </div>
            </div>
        </div>
    </div>
    @if(userRole()->slug == config('cost_estimater'))
    <div class="mx-1">
        <button class="btn btn-primary rounded-pill"  ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">  <i class="fa fa-eye"></i> </button>
    </div>
    @endif
    @if(userHasAccess('cost_estimate_add'))
    {{-- <div class="col-6 my-1">
        <div class="row m-0">
            <div class="col-md-10 p-0 d-flex">@{{ others.assign_to }}
                <div class="input-group border shadow-sm rounded">
                    <label class=" border-0 input-group-text text-white bg-primary font-weight-bold" for="inputGroupSelect01">Assign to</label>
                    <select class="form-select border-0" ng-model="assign_to" name="assign_to"  id="inputGroupSelect01">
                        <option value=''> @lang('global.select')</option>
                        <option ng-repeat="user in userList" value="@{{user.id}}" ng-selected="user.id == assign_to">@{{user.user_name}}</option>
                    </select>
                    <button class="input-group-text btn btn-info"  ng-click="assignUserToCostestimate(assign_to)"> Send </button>
                </div>
                <div class="mx-1">
                    <button class="btn btn-primary rounded-pill" >  <i class="fa fa-eye"></i> </button>
                </div>
            </div>
           
        </div>
    </div> --}}
    <div class="card m-0 my-3 border col-md-9 me-auto">
        <div class="card-body">
            <p class="lead mb-2"> <strong>Assign to</strong></p>
            <div class="btn-group w-100">
                <select class="form-select " ng-model="assign_to" name="assign_to"  id="inputGroupSelect01">
                    <option value=''> @lang('global.select')</option>
                    <option ng-repeat="user in userList" value="@{{user.id}}" ng-selected="user.id == assign_to">@{{user.user_name}}</option>
                </select>
                <button class="input-group-text btn btn-info"  ng-click="assignUserToCostestimate(assign_to)"> Assign  </button>
            </div> 
            <small class="float-end btn link p-0 mt-2"  ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">
                <i class="fa fa-send me-1"></i> <u>Send a Comments</u>
            </small>
        </div>
    </div> 

    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#/technical-estimation" class="btn btn-light border shadow-sm">Prev</a>
            </div>
            <div>
                <a ng-show="cost_estimation_status  != 0" href="#/proposal-sharing"  class="btn btn-primary">Next</a>
            </div>
        </div>
    </div> 
    @endif
</form> 
@endif
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