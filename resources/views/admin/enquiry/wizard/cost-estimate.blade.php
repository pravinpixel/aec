<form class="card shadow-none p-0">
    <div class="card-header pb-2 p-3 text-center border-0">
        <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.customer_info.contact_person }}</span></h4>
    </div>
    <div class="card-body pt-0 p-0">
        <table class="table shadow-none border m-0 table-bordered">
            <thead class="bg-light">
                <tr class="text-white">
                    <th style="background: var(--secondary-bg) !important">Enquiry Date</th>
                    <th style="background: var(--secondary-bg) !important">Project Name</th>
                    <th style="background: var(--secondary-bg) !important">Type of Project</th>
                    <th style="background: var(--secondary-bg) !important">Enquiry Status</th>
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
        <div class="row m-0 mt-3">
            <div class="table-responsive p-0">  
                <table class="cost-estimate-table table table-bordered border">
                    <thead>
                        <tr  style="background: var(--primary-bg) !important">
                            <td colspan="16" class="text-center"><h5 class="m-0 py-1 text-white">Engineering Estimation</h5></td>
                        </tr>
                        <tr class="font-weight-bold ">
                            <th rowspan="2" class="text-center " style="background: var(--primary-bg) !important">
                                <span class="mb-1 font-12">Component</span>
                                <button class="btn-sm btn font-12 btn-info shadow-0 w-100 py-0" ng-click="create()"><i class="fa fa-plus"></i> Add </button>
                            </th>
                            <th rowspan="2" class="text-center font-12" style="background: var(--primary-bg) !important">Type</th>
                            <th rowspan="2" class="text-center font-12" style="background: var(--primary-bg) !important" >Sq.M</th>
                            <th class="text-center font-12" style="background: var(--primary-bg) !important" >1 to 2</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Details</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Statistics</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">CAD/CAM</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Logistics</th>
                            <th colspan="2" class="font-12 text-center" style="background: var(--primary-bg) !important">Total Cost</th>
                            <td rowspan="2" class="font-12 text-center" style="background: var(--primary-bg) !important"><b class="text-white">Action</b></td>
                        </tr>
                        <tr class="bg-light-primary border">
                            <th class="text-center font-12" style="background: var(--primary-bg) !important" >Complexity</th> 
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
                    </thead>
                    <tbody> 
                        <tr ng-repeat="(index,C) in CostEstimate" class="touched-td" >  
                            <td> 
                                <select class="my-select" get-cost-estimate-data ng-model="c.building_component_name" name="building_component_name">
                                    <option value="">-- Select -- </option> 
                                    <option value="@{{ c.id }}" ng-repeat="c in cost.component">@{{ c.building_component_name }}</option>
                                </select>
                            </td> 
                            <td style="padding: 0 !important">
                                <select get-cost-estimate-data class="my-select" ng-model="t.type_name" ng-change="getCostEstimateData(index)" name="type_name">
                                    <option value="">-- Select ---</option> 
                                    <option value="@{{ Ctype.id }}" ng-repeat="Ctype in cost.type">@{{ Ctype.building_type_name }}</option>
                                </select>
                            </td>

                            <td style="padding:0px !important"><input get-cost-details-total ng-click="getCostDetailsTotal(index)" type="number" min="0" ng-model="C.sqm" ng-value="masterData.sqm" name="sqm" class="my-control"></td>
                            <td style="padding:0px !important"><input get-cost-details-total ng-click="getCostDetailsTotal(index)" type="number" min="0" ng-model="C.complexity"  ng-value="masterData.complexity" name="complexity" class="my-control"></td>
        
                            {{-- Details --}}
                            <td style="background: var(--primary-bg-light) !important">
                                <input get-cost-details-total ng-click="getCostDetailsTotal(index)" type="number" min="0" class="my-control"  ng-model="C.Details.PriceM2" ng-value="masterData.detail_price" name="detail_price">
                            </td>
                            <td style="background: var(--primary-bg-light) !important">
                                <input disabled type="text" class="my-control" ng-model="C.Details.Sum" name="detail_sum">
                            </td>
        
                            {{-- Statistics --}}
                            <td style="background:  var(--primary-bg-light) !important">
                                <input type="number" min="0" get-cost-details-total ng-click="getCostDetailsTotal(index)" class="my-control"  ng-model="C.Statistics.PriceM2"  ng-value="masterData.statistic_price" name="statistic_price">
                            </td>
                            <td style="background:  var(--primary-bg-light) !important">
                                <input disabled type="number" min="0" class="my-control"  ng-model="C.Statistics.Sum" ng-value="masterData.statistic_sum" name="statistic_sum">
                            </td>
        
                            {{-- CAD/CAM --}}
                            <td style="background:  var(--primary-bg-light) !important">
                                <input  type="number" min="0" get-cost-details-total class="my-control" ng-click="getCostDetailsTotal(index)" ng-model="C.CadCam.PriceM2" ng-value="masterData.cad_cam_price" name="cad_cam_price">
                            </td>
                            <td style="background:  var(--primary-bg-light) !important">
                                <input disabled type="number" min="0" class="my-control" ng-model="C.CadCam.Sum" ng-value="masterData.cad_cam_sum" name="cad_cam_sum">
                            </td>
        
                            {{-- Logistics --}}
                            <td style="background:  var(--primary-bg-light) !important">
                                <input  type="number" min="0" get-cost-details-total class="my-control" ng-click="getCostDetailsTotal(index)" ng-model="C.Logistics.PriceM2" ng-value="masterData.logistic_price" name="logistic_price">
                            </td>
                            <td style="background:  var(--primary-bg-light) !important">
                                <input disabled  type="number" min="0" class="my-control" ng-model="C.Logistics.Sum" ng-value="masterData.logistic_sum" name="logistic_sum">
                            </td>
        
                            {{-- Total Cost --}}
                            <td><input disabled type="number" min="0" class="my-control" ng-value="C.TotalCost.PriceM2" name="total_price"></td>
                            <td><input disabled type="number" min="0" class="my-control" ng-value="C.TotalCost.Sum" name="total_sum"></td>
                            <td class="text-center" style="padding: 0 !important">
                                <i ng-click="delete(index)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i>
                            </td>
                        </tr>
                        <tr class="text-white " style="background: var(--primary-bg)" ng-repeat="T in CostEstimateTotals"> 
                            <td colspan="2" class="text-center">
                                <b>Total</b>
                            </td>
                            <td class="font-12 text-end" >@{{ T.sqm }}</td>
                            <td class="font-12 text-end">@{{ T.complexity }}</td>
                            <td class="font-12 text-end">@{{ T.Details.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{ T.Details.Sum }}</td>
                            <td class="font-12 text-end">@{{ T.Statistics.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{ T.Statistics.Sum }}</td>
                            <td class="font-12 text-end">@{{ T.CadCam.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{ T.CadCam.Sum }}</td>
                            <td class="font-12 text-end">@{{ T.Logistics.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{ T.Logistics.Sum }}</td>
                            <td class="font-12 text-end">@{{ T.TotalCost.PriceM2 }}</td>
                            <td class="font-12 text-end">@{{ T.TotalCost.Sum }}</td>
                            <td class="text-center">-</td>
                        </tr> 
                    </tbody>
                </table>  
                @{{ CostEstimate }} 
                <hr>
                @{{ CostEstimateTotals }} 
            </div>
            <div class="col-12 shadow text-dark bg-white border p-2 rounded">
                <h4 class="m-0"><span class="text-secondary">Total Cost :</span> <b>XXXXX</b> </h4>
            </div>
        </div>
    </div>
    <div class="card-footer border-0">
        <div class="row m-0">
            <div class="col-md-8 p-0">
                <div class="input-group ">
                    <label class="input-group-text bg-white font-weight-bold" for="inputGroupSelect01">Assign to</label>
                    <select class="form-select border" id="inputGroupSelect01">
                      <option selected>Choose...</option>
                      <option value="1">User One</option> 
                      <option value="1">User Two</option> 
                      <option value="1">User Three</option> 
                    </select>
                    <label class="input-group-text btn btn-info" for="inputGroupSelect01">Send</label>
                </div>
            </div>
            <div class="col-md-4 p-0">
                <div class="text-end">
                    <button type="reset" class="btn btn-light font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                    <a class="btn btn-success" onclick="submit()" href=""><i class="uil-sync"></i> Update</a>
                </div>
            </div>
        </div>
         
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#!/technical-estimation" class="btn btn-outline-primary">Prev</a>
            </div>
            <div>
                <a href="#!/proposal-sharing" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div> 
</form> 
@if (Route::is('enquiry.cost-estimation')) 
    <style>
        .admin-Cost_Estimate-wiz .timeline-step .inner-circle{
            background: var(--primary-bg) !important;
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