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
                        <tr ng-repeat="(index,C) in CostEstimate.Components" class="touched-td" >  
                            <td> 
                                <select class="my-select" get-cost-estimate-data ng-model="c.building_component_name" name="building_component_name">
                                    <option value="">-- Select -- </option> 
                                    <option value="@{{ c.id }}" ng-selected="" ng-repeat="c in cost.component">@{{ c.building_component_name }}</option>
                                </select>
                            </td> 
                            <td style="padding: 0 !important">
                                <select get-cost-estimate-data class="my-select" ng-model="t.type_name" ng-change="getCostEstimateData(index)" name="type_name">
                                    <option value="">-- Select ---</option> 
                                    <option value="@{{ Ctype.id }}" ng-selected="" ng-repeat="Ctype in cost.type">@{{ Ctype.building_type_name }}</option>
                                </select>
                            </td>

                            <td style="padding:0px !important"><input get-cost-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  ng-model="C.sqm" name="sqm" class="my-control"> </td>

                            <td style="padding:0px !important"><input get-cost-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  ng-model="C.Complexity" name="complexity" class="my-control"></td>
        
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
                        <tr class="text-white " style="background: var(--primary-bg)"> 
                            <td colspan="2" class="text-center">
                                <b>Total</b>
                            </td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.sqm }}</td>
                            <td class="font-12 text-end">@{{CostEstimate.ComponentsTotals.complexity }}</td>
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
                        </tr> 
                    </tbody>
                </table>
            </div> 
            <div class="col-12 shadow text-dark bg-white border p-2 rounded">
                {{-- <h4 class="m-0"><span class="text-secondary">Total Cost :</span> <b>@{{ CostEstimate.ComponentsTotals.grandTotal }}</b> </h4> --}}
                <h4 class="m-0"><span class="text-secondary">Total Cost :</span> <b>@{{ CostEstimate.ComponentsTotals.TotalCost.Sum  }}</b> </h4>
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
                    <button class="btn btn-success" ng-click="UpdateCostEstimate()"><i class="uil-sync"></i> Update</button>
                </div>
            </div>
        </div>
         
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#/technical-estimation" class="btn btn-light border shadow-sm">Prev</a>
            </div>
            <div>
                <a href="#/proposal-sharing" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div> 
</form> 
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