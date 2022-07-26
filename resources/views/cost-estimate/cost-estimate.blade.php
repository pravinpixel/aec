<div class="tab-pane show active" id="cost_estimate" ng-controller="CostEstimateController" >
    <div class="content container-fluid">
        <div class="main"> 
            <div class="row m-0"> 
                <div class="card-header pb-2 p-3 text-center border-0">
                    <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.customer_info.contact_person }}</span></h4>
                </div>
                <div class="card-body pt-0 p-0">
                    <table class="table custom shadow-none border m-0 table-bordered ">
                        <thead class="bg-light">
                            <tr>
                                <th>Enquiry Received Date</th>
                                <th>Person Contact</th>
                                <th>Type of Building</th>
                                <th>Enquiry Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>@{{ enquiry.enquiry.enquiry_date }}</td>
                                <td>@{{ enquiry.enquiry.customer.contact_person }}</td>
                                <td>@{{ enquiry.building_type.building_type_name  }}</td>
                                <td><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
               
                <div class="container-fluid">
                    <br>
                    <div class="row m-0  my-3">
                        <div class="col">
                            <label class="lead">
                                <input type="radio" ng-model="price_calculation" name="price_calculation"
                                class="form-check-input me-2"
                                    ng-value="'wood_engineering_estimation'">
                                Wood Engineering Estimation
                            </label>
                        </div>
                        <div class="col">
                            <label class="lead">
                                <input type="radio" ng-model="price_calculation" name="price_calculation"
                                class="form-check-input me-2"
                                    ng-value="'precast_engineering_estimation'">
                                Precast Engineering Estimation
                            </label>
                        </div>
            
                    </div>
                    <div ng-show="price_calculation == 'wood_engineering_estimation'">
                        @include('admin.enquiry.wizard.wood-estimation')
                    </div>
                    <div ng-show="price_calculation == 'precast_engineering_estimation'">
                        @include('admin.enquiry.wizard.precast-estimation')
                    </div>
                </div>
             
                {{-- view history start--}}
                <div class="card border p-0 shadow-sm my-3">
                    <div class="card-header">
                        <h5 class="m-0">
                            <a class="align-items-center d-flex  py-1" ng-click="getHistory('wood')"
                                ng-show="price_calculation == 'wood_engineering_estimation'">
                                <i class="fa fa-history me-2 fa-2x" aria-hidden="true"></i>
                                Cost Estimation History
                            </a>
                            <a class="align-items-center d-flex py-1" ng-click="getHistory('precast')"
                                ng-show="price_calculation == 'precast_engineering_estimation'">
                                <i class="fa fa-history me-2 fa-2x" aria-hidden="true"></i> Cost Estimation History
                            </a>
                        </h5>
                    </div>
                    <div class="card-body bg-light p-0" id="history_id">
                        <div ng-show="price_calculation == 'wood_engineering_estimation'">
                            <div id="wood_id"></div>
                        </div>
                        <div ng-show="price_calculation == 'precast_engineering_estimation'">
                            <div id="precast_id"></div>
                        </div>
                    </div>
                </div>
                {{-- view history end--}}
                @if(userRole()->slug == config('global.cost_estimater'))
                    <div class="text-end">
                        <button ng-click="printCostEstimate('wood')" class="btn btn-primary"
                            ng-show="price_calculation == 'wood_engineering_estimation'">
                            <i class="me-1 fa fa-print"></i> Print
                        </button>
                        <button ng-click="printCostEstimate('precast')" class="btn btn-primary"
                            ng-show="price_calculation == 'precast_engineering_estimation'">
                            <i class="me-1 fa fa-print"></i> Print
                        </button>
                        <button class="btn btn-success cost_estimate_comments_ul"  ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">
                            <i class="fa fa-send me-1"></i>  Send a Comments
                            @if(isset($comments['admin_role']))
                                <span class="cost_estimate_comments">
                                    {{ $comments['admin_role']   }}
                                </span>
                            @endif
                        </button>
                    </div>
                @endif
                @include("admin.enquiry.models.cost-estimate-chat-box") 
      
            </div>
        </div>
        <!-- container --> 
    </div> 
</div>