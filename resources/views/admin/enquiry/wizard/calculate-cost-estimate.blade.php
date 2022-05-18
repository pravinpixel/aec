     
@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        
        <div class="content"> 
            @include('admin.includes.top-bar') 
            <!-- Start Content-->
            <div class="container-fluid"> 
                <form class="card shadow-none p-0" ng-controller="Cost_Estimate">
                    <div class="card-body pt-0 p-0">
                        <div class="row m-0 mt-3">
                            <div class="table custom-responsive p-0">  
                                <button class="btn btn-info btn-sm mb-2 pull-right" ng-click="addPrecasEstimate()">Add Precast Estimation </button>
                                <button class="btn btn-info btn-sm mb-2 pull-right mx-2" ng-click="addEngineeringEstimate()">Add Wood Estimation </button>
                                <h3> Wood Engineering Estimation </h3>
                                <table class="cost-estimate-table table table-bordered border" ng-repeat="(rootKey,CostEstimate) in EngineeringEstimate track by $index">
                                    <thead>
                                        <tr>
                                            <td colspan="18">
                                                <div  class="text-center">
                                                    <span ng-hide="editing" ng-click="editing = true">
                                                        @{{CostEstimate.type}} 
                                                    </span>
                                                    <span ng-show="editing" class="d-flex">
                                                        <input type="text" class="form-control" ng-model="CostEstimate.type"  ng-blur="editing = false" > 
                                                    </span>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr  style="background: var(--primary-bg) !important">
                                            <td colspan="16" class="text-center"><h5 class="m-0 py-1 text-white">Engineering Estimation</h5></td>
                                            <td colspan="2" class="text-center"><i ng-click="deleteEngineeringEstimate(index)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i></td>
                                        </tr>
                                        <tr class="font-weight-bold ">
                                            <th rowspan="3" class="text-center " style="background: var(--primary-bg) !important">
                                                <span class="mb-1 font-12">Component</span>
                                                <button class="btn-sm btn font-12 btn-info shadow-0 w-100 py-0" ng-click="addComponent(rootKey)"><i class="fa fa-plus"></i> Add </button>
                                            </th>
                                            <th rowspan="3" class="text-center font-12" style="background: var(--primary-bg) !important">Type</th>
                                            <th rowspan="3" class="text-center font-12" style="background: var(--primary-bg) !important">Design Scope (%)</th>
                                            
                                            <th class="text-center font-12" style="background: var(--primary-bg) !important" >1 to 2</th>
                                            <th rowspan="2" class="text-center font-12" style="background: var(--primary-bg) !important" >m2 Gross</th>
                                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Details</th>
                                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Statistics</th>
                                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">CAD/CAM</th>
                                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Logistics</th>
                                            <th colspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">RIP</th>
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
                                            <th colspan="2" class="text-center" style="background: var(--secondary-bg) !important"><small>Hrs</small></th> 
                                            <th class="text-center" style="background: var(--primary-bg) !important"><small>Nok/M<sup>2</sup></small></th>
                                            <th class="text-center" style="background: var(--primary-bg) !important"><small>Sum</small></th>  
                                        </tr>
                                        <tr class="bg-light-primary border">
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.sqm) }}</b></td>  
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Details.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Details.Sum) }}</b></td>   
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Statistics.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Statistics.Sum) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.CadCam.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.CadCam.Sum) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Logistics.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Logistics.Sum) }}</b></td> 
                                            <td colspan="2" class="text-center font-12 p-0"></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.TotalCost.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.TotalCost.Sum) }}</b></td> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="(index,C) in CostEstimate.Components" class="touched-td" >  
                                            <td> 
                                                <select class="my-select" get-cost-estimate-data ng-model="C.building_component_id" name="building_component_name">
                                                    <option value="">-- Select -- </option> 
                                                    <option ng-value="@{{ buildingComponent.id }}" ng-selected="buildingComponent.id == C.Component" ng-repeat="buildingComponent in buildingComponents">@{{ buildingComponent.building_component_name }}</option>
                                                </select>
                                            </td> 
                                            <td style="padding: 0 !important">
                                                <select class="my-select" get-cost-estimate-data ng-model="C.type_id" ng-change="getCostEstimateData(index)" name="type_name">
                                                    <option value="">-- Select ---</option> 
                                                    <option ng-value="@{{ buildingType.id }}" ng-selected="buildingType.id == C.Type" ng-repeat="buildingType in buildingTypes">@{{ buildingType.building_type_name }}</option>
                                                </select>
                                            </td>
                    
                                            <td style="padding:0px !important"><input get-cost-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  min="100"  ng-model="C.DesignScope" name="complexity" class="my-control"></td>
                    
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
                                            <td  style="background:  var(--primary-bg-light) !important">
                                                <input disabled type="text" onkeypress="return isNumber(event)" min="0" class="my-control" ng-model="C.CadCam.Sum" name="cad_cam_sum">
                                            </td>
                        
                                            {{-- Logistics --}}
                                            <td>
                                                <input  type="text" onkeypress="return isNumber(event)" min="0" get-cost-details-total class="my-control" ng-keyup="getCostDetailsTotal(index)" ng-model="C.Logistics.PriceM2" name="logistic_price">
                                            </td>
                                            <td style="background:  var(--primary-bg-light) !important">
                                                <input disabled  type="text" onkeypress="return isNumber(event)" min="0" class="my-control" ng-model="C.Logistics.Sum"  name="logistic_sum">
                                            </td>
                                            <td colspan="2">
                                                <input  type="text" onkeypress="return isNumber(event)" min="0" class="my-control" ng-model="C.Rip.Sum"  name="Rip">
                                            </td>
                                            {{-- Total Cost --}}
                                            <td><input disabled type="text" onkeypress="return isNumber(event)" min="0" class="my-control" name="total_price" ng-model="C.TotalCost.PriceM2"></td>
                                            <td><input disabled type="text" onkeypress="return isNumber(event)" min="0" class="my-control" name="total_sum" ng-model="C.TotalCost.Sum"></td>
                                            <td class="text-center" style="padding: 0 !important">
                                                <i ng-click="delete(rootKey, index)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
{{-- ************************************************************************************************************************************************************************************************** --}}
                            <div class="table custom-responsive p-0"> 
                                <h3> Precast Engineering Estimation </h3>
                                <table class="cost-estimate-table table table-bordered border" ng-repeat="(pRootKey,PrecastEstimate) in PrecastComponent track by $index">
                                    <thead>
                                        {{-- <tr>
                                            <td colspan="12">
                                                <div  class="text-center">
                                                    <span ng-hide="editing" ng-click="editing = true">
                                                        @{{CostEstimate.type}} 
                                                    </span>
                                                    <span ng-show="editing" class="d-flex">
                                                        <input type="text" class="form-control" ng-model="CostEstimate.type"  ng-blur="editing = false" > 
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="background: var(--primary-bg) !important">
                                            <td colspan="12" class="text-center"><h5 class="m-0 py-1 text-white">Engineering Estimation</h5></td>
                                            <td class="text-center"><i ng-click="deleteEngineeringEstimate(index)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i></td>
                                        </tr> --}}
                                        <tr class="font-weight-bold">
                                            <th rowspan="3" class="text-center " style="background: var(--primary-bg) !important">
                                                <span class="mb-1 font-12">Precast Component</span>
                                                <button class="btn-sm btn font-12 btn-info shadow-0 w-100 py-0" ng-click="addPrecastComponent(pRootKey)"><i class="fa fa-plus"></i> Add </button>
                                            </th>
                                            <th class="text-center font-12" style="background: var(--primary-bg) !important" >1 to 2</th>
                                            <th rowspan="3" class="text-center font-12" style="background: var(--primary-bg) !important" >No of Staircase Housing </th>
                                            <th rowspan="3" class="font-12 text-center" style="background: var(--primary-bg) !important">No of New component</th>
                                            <th rowspan="3" class="font-12 text-center" style="background: var(--primary-bg) !important">No of Different Floor Height</th>
                                            <th rowspan="2" class="font-12 text-center" style="background: var(--primary-bg) !important">m<sup>2</sup> Gross</th>
                                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Std work Hours</th>
                                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Additional Work Hours</th>
                                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Hourly Rate</th>
                                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Total Work Hours</th>
                                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Total Engineering Cost</th>
                                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Sentral</th>
                                            <td rowspan="3" class="font-12 text-center" style="background: var(--primary-bg) !important"><b class="text-white">Action</b></td>
                                        </tr>
                                        <tr class="bg-light-primary border">
                                            <th rowspan="2" class="text-center font-12" style="background: var(--primary-bg) !important" >Complexity</th> 
                                           
                                        </tr>
                                        <tr class="bg-light-primary border">
                                           <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.sqm) }}</b></td>  
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Details.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Details.Sum) }}</b></td>   
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Statistics.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Statistics.Sum) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.CadCam.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.CadCam.Sum) }}</b></td> 
                                            {{-- <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Logistics.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.Logistics.Sum) }}</b></td> 
                                            <td colspan="2" class="text-center font-12 p-0"></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.TotalCost.Sum / CostEstimate.ComponentsTotals.sqm) }}</b></td> 
                                            <td class="text-center font-12 p-0"><b>@{{ getNum(CostEstimate.ComponentsTotals.TotalCost.Sum) }}</b></td>   --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="(index,C) in PrecastEstimate.Components" class="touched-td" >  
                                            <td> 
                                                <select class="my-select" get-precast-details-total="[index]" ng-model="C.precast_component" name="precast_component">
                                                    <option value="">-- Select -- </option> 
                                                    <option value="32">Staircase House Wall</option>
                                                    <option value="8">Balcony </option>
                                                    {{-- <option ng-value="@{{ buildingComponent.id }}" ng-selected="buildingComponent.id == C.precast_component" ng-repeat="buildingComponent in buildingComponents">@{{ buildingComponent.building_component_name }}</option> --}}
                                                </select>
                                            </td> 
                                            <td style="padding: 0 !important">
                                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.complexity" name="complexity">
                                            </td>
                                            <td style="padding: 0 !important">
                                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.no_of_staircase" name="no_of_staircase">
                                            </td>
                    
                                            <td style="padding:0px !important"><input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  min="100"  ng-model="C.no_of_new_component" name="no_of_new_component" class="my-control"></td>
                    
                                            <td style="padding:0px !important"><input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  ng-model="C.no_of_different_floor_height" name="no_of_different_floor_height" class="my-control"></td>
                    
                                            <td style="padding:0px !important"><input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  ng-model="C.sqm" name="sqm" class="my-control"> </td>
                                          
                                            <td>
                                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.std_work_hours" name="std_work_hours">
                                            </td>
                                           
                                            <td>
                                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.additional_work_hours" name="additional_work_hours">
                                            </td>
                                            <td>
                                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.hourly_rate" name="hourly_rate">
                                            </td>
                                            <td>
                                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.total_work_hours" name="total_work_hours">
                                            </td>
                                            <td>
                                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.total_engineering_cost" name="total_engineering_cost">
                                            </td>
                                            <td>
                                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.sentral" name="sentral">
                                            </td>
                                            <td class="text-center" style="padding: 0 !important">
                                                <i ng-click="deletePrecast(pRootKey, index)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                           
                            {{-- <div class="col-12 d-flex justify-content-between align-items-center bg-white border p-2">
                                <h4 class="m-0"><span class="text-secondary">Total Cost :</span> <b>@{{ CostEstimate.ComponentsTotals.TotalCost.Sum  }}</b> </h4>
                                <div>
                                    <button class="btn btn-success" ng-click="UpdateCostEstimate()"><i class="uil-sync"></i> Update</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')  
<script>
    app.controller('Cost_Estimate', function ($scope, $http, API_URL) {
        $scope.EngineeringEstimate = [];
        const CostEstimate = {
            'type': 'Type 1',
            "Components" : [ 
                {
                    'building_component_id': '',
                    'type_id': '',
                    'design_scope': 0,
                    "Component"     : "",
                    "Type"          : "", 
                    "sqm"           : "",
                    "complexity"    : "", 
                    "Details" : {
                        "PriceM2"   : 0,
                        "Sum"       : 0
                    },
                    "Statistics" : {
                        "PriceM2"   : 0, 
                        "Sum"       : 0, 
                    },
                    "CadCam" : {
                        "PriceM2"   : 0,
                        "Sum"       : 0, 
                    },
                    "Logistics" : {
                        "PriceM2"   : 0, 
                        "Sum"       : 0,
                    },
                    "TotalCost" : {
                        "PriceM2"   : 0, 
                        "Sum"       : 0, 
                    },
                    "Rip": {
                        "Sum" : ""
                    }
                }
            ],
            "ComponentsTotals" : {
                "sqm"           : '',
                "complexity"    : '', 
                "Details" :{
                    "PriceM2"   : '',
                    "Sum"       : ''
                },
                "Statistics" : {
                    "PriceM2"   : '', 
                    "Sum"       : '', 
                },
                "CadCam" :{
                    "PriceM2"   : '',
                    "Sum"       : '', 
                },
                "Logistics" :{
                    "PriceM2"   : '', 
                    "Sum"       : '',
                },
                "TotalCost" :{
                    "PriceM2"   : '', 
                    "Sum"       : '', 
                },
                "Rip": {
                    "Sum" : ""
                },
                "grandTotal"    : '', 
            },
        }
        $scope.EngineeringEstimate.push(CostEstimate);

        $scope.addEngineeringEstimate = () => {
            $scope.EngineeringEstimate.push({
            'type': 'Type 1',
            "Components" : [ 
                {
                    'building_component_id': '',
                    'type_id': '',
                    'design_scope': 0,
                    "Component"     : "",
                    "Type"          : "", 
                    "sqm"           : "",
                    "complexity"    : "", 
                    "Details" : {
                        "PriceM2"   : '',
                        "Sum"       : ''
                    },
                    "Statistics" : {
                        "PriceM2"   : '', 
                        "Sum"       : '', 
                    },
                    "CadCam" : {
                        "PriceM2"   : '',
                        "Sum"       : '', 
                    },
                    "Logistics" : {
                        "PriceM2"   : '', 
                        "Sum"       : '',
                    },
                    "TotalCost" : {
                        "PriceM2"   : '', 
                        "Sum"       : '', 
                    },
                    "Rip": {
                        "Sum" : ""
                    }
                }
            ],
            "ComponentsTotals" : {
                "sqm"           : '',
                "complexity"    : '', 
                "Details" :{
                    "PriceM2"   : '',
                    "Sum"       : ''
                },
                "Statistics" : {
                    "PriceM2"   : '', 
                    "Sum"       : '', 
                },
                "CadCam" :{
                    "PriceM2"   : '',
                    "Sum"       : '', 
                },
                "Logistics" :{
                    "PriceM2"   : '', 
                    "Sum"       : '',
                },
                "TotalCost" :{
                    "PriceM2"   : '', 
                    "Sum"       : '', 
                },
                "Rip": {
                    "Sum" : ""
                },
                "grandTotal"    : '', 
            },
        });
            console.log( $scope.EngineeringEstimate)
        }

        $scope.deleteEngineeringEstimate = (index) => {
            $scope.EngineeringEstimate.splice(index,1);
            Message('success', 'Engineering estimation deleted successfully');
        }
       
        $scope.addComponent  = function(index) {
            $scope.EngineeringEstimate[index].Components.unshift({
                'building_component_id': '',
                'type_id'       : '',
                'design_scope'  : 0,
                'rip'           : 0,
                "Component"     : "",
                "Type"          : "", 
                "sqm"           : "", 
                "Complexity"    : "", 
                "Details": {
                    "PriceM2"   : "", 
                    "Sum"       : ""
                },
                "Statistics": {
                    "PriceM2"   : "", 
                    "Sum"       : "", 
                },
                "CadCam": {
                    "PriceM2"   : "", 
                    "Sum"       : "", 
                } ,
                "Logistics": {
                    "PriceM2"   : "", 
                    "Sum"       : "", 
                } ,
                "TotalCost": {
                    "PriceM2"   : "", 
                    "Sum"       : "", 
                },
                "Rip": {
                    "Sum" : ""
                }
            });
        }

        $scope.delete   =   function(rootKey, index) { 
            $scope.EngineeringEstimate[rootKey].Components.splice(index,1);
            if($scope.EngineeringEstimate[rootKey].Components.length == 0)  $scope.EngineeringEstimate.splice(rootKey,1);
            Message('success', 'Component deleted successfully');
        }
        
        $http.get(`${API_URL}building-type`)
        .then((res)=> {
            $scope.buildingTypes = res.data;
        });

        $http.get(`${API_URL}building-component`)
        .then((res)=> {
            $scope.buildingComponents = res.data;
        });

        $scope.getNum = (val) => {

            if (isNaN(val) || val == '') {
                return 0;
            }
            return Number.parseFloat(val).toFixed(2);
        }
        // Precast
        $scope.PrecastComponent = [{
                "Components" : [ 
                    {
                        'precast_component': '',
                        'no_of_staircase': '',
                        'no_of_new_component':'',
                        'no_of_different_floor_height': '',
                        'sqm'           : '',
                        'complexity'    : '', 
                        'std_work_hours': '',
                        'additional_work_hours': '',
                        'hourly_rate': '',
                        'total_work_hours': '',
                        'total_engineering_cost': '',
                        'sentral': ''
                    }
                ]
            }];
        $scope.addPrecasEstimate = () => {
            $scope.PrecastComponent = [{
                "Components" : [ 
                    {
                        'precast_component': '',
                        'no_of_staircase': '',
                        'no_of_new_component':'',
                        'no_of_different_floor_height': '',
                        'sqm'           : '',
                        'complexity'    : '', 
                        'std_work_hours': '',
                        'additional_work_hours': '',
                        'hourly_rate': '',
                        'total_work_hours': '',
                        'total_engineering_cost': '',
                        'sentral': ''
                    }
                ]
            }];
        }
        $scope.addPrecastComponent =  (rootKey) => {
            $scope.PrecastComponent[rootKey].Components.unshift(
                {
                        'precast_component': '',
                        'no_of_staircase': '',
                        'no_of_new_component':'',
                        'no_of_different_floor_height': '',
                        'sqm'           : '',
                        'complexity'    : '', 
                        'std_work_hours': '',
                        'additional_work_hours': '',
                        'hourly_rate': '',
                        'total_work_hours': '',
                        'total_engineering_cost': '',
                        'sentral': ''
                    }
            );
        }
        $scope.deletePrecast = (rootKey, index) => {
            $scope.PrecastComponent[rootKey].Components.splice(index,1);
            Message('success','Precast component deleted Successfully');
        }

    }).directive('getCostDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('keyup', function () {
                        scope.CostEstimate.Components[scope.index].Details.Sum          =    getNum(scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Details.PriceM2 );
                        scope.CostEstimate.Components[scope.index].Statistics.Sum       =    getNum(scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Statistics.PriceM2 );
                        scope.CostEstimate.Components[scope.index].Logistics.Sum        =    getNum(scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Logistics.PriceM2 );
                        scope.CostEstimate.Components[scope.index].CadCam.Sum           =    getNum(scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].CadCam.PriceM2 );
                        scope.CostEstimate.Components[scope.index].TotalCost.PriceM2    =   getNum(Number(scope.CostEstimate.Components[scope.index].Details.PriceM2)     + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].Statistics.PriceM2)  + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].CadCam.PriceM2)      + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].Logistics.PriceM2));
                
                        scope.CostEstimate.Components[scope.index].TotalCost.Sum        =   getNum(Number(scope.CostEstimate.Components[scope.index].Details.Sum)     + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].Statistics.Sum)  + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].CadCam.Sum)      + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].Logistics.Sum));
                        let  $sqmTotal          = 0;
                        let  $complexity        = 0;
                        let  $DetailsPriceM2    = 0;
                        let  $DetailsSum        = 0;
                        let  $StatisticsPriceM2 = 0;
                        let  $StatisticsSum     = 0;
                        let  $CadCamPriceM2     = 0;
                        let  $CadCamSum         = 0;
                        let  $LogisticsPriceM2  = 0;
                        let  $LogisticsSum      = 0;
                        let  $TotalCostPriceM2  = 0;
                        let  $TotalCostSum      = 0;
                        let  $RipSum            = 0;

                        scope.CostEstimate.Components.map( (item, index) => {
                            $sqmTotal           +=  Number(item.sqm); 
                            $complexity         +=  Number(item.Complexity);
                            $DetailsPriceM2     +=  Number(item.Details.PriceM2); 
                            $DetailsSum         +=  Number(item.Details.Sum);
                            $StatisticsPriceM2  +=  Number(item.Statistics.PriceM2);
                            $StatisticsSum      +=  Number(item.Statistics.Sum);
                            $CadCamPriceM2      +=  Number(item.CadCam.PriceM2);
                            $CadCamSum          +=  Number(item.CadCam.Sum);
                            $LogisticsPriceM2   +=  Number(item.Logistics.PriceM2);
                            $LogisticsSum       +=  Number(item.Logistics.Sum);
                            $TotalCostPriceM2   +=  Number(item.TotalCost.PriceM2);
                            $TotalCostSum       +=  Number(item.TotalCost.Sum);
                            $RipSum             +=  Number(item.Rip.Sum);
                        });

                        scope.CostEstimate.ComponentsTotals.sqm                 = $sqmTotal;
                        scope.CostEstimate.ComponentsTotals.complexity          = $complexity;
                        scope.CostEstimate.ComponentsTotals.Details.PriceM2     = $DetailsPriceM2;
                        scope.CostEstimate.ComponentsTotals.Details.Sum         = $DetailsSum;
                        scope.CostEstimate.ComponentsTotals.Statistics.PriceM2  = $StatisticsPriceM2;
                        scope.CostEstimate.ComponentsTotals.Statistics.Sum      = $StatisticsSum;
                        scope.CostEstimate.ComponentsTotals.CadCam.PriceM2      = $CadCamPriceM2;
                        scope.CostEstimate.ComponentsTotals.CadCam.Sum          = $CadCamSum;
                        scope.CostEstimate.ComponentsTotals.Logistics.PriceM2   = $LogisticsPriceM2;
                        scope.CostEstimate.ComponentsTotals.Logistics.Sum       = $LogisticsSum;
                        scope.CostEstimate.ComponentsTotals.TotalCost.PriceM2   = $TotalCostPriceM2;
                        scope.CostEstimate.ComponentsTotals.TotalCost.Sum       = $TotalCostSum;          
                        scope.CostEstimate.ComponentsTotals.Rip.Sum             = $RipSum;

                        scope.CostEstimate.ComponentsTotals.grandTotal       =  $sqmTotal +
                                                                                $complexity +
                                                                                $DetailsPriceM2 +
                                                                                $DetailsSum +
                                                                                $StatisticsPriceM2 +
                                                                                $StatisticsSum +
                                                                                $CadCamPriceM2 +
                                                                                $CadCamSum +
                                                                                $LogisticsPriceM2 +
                                                                                $LogisticsSum +
                                                                                $TotalCostPriceM2 +
                                                                                $TotalCostSum ;
                    scope.$apply();
                        
                    });
                },
            };
    }]).directive('getCostEstimateData',   ['$http' ,function ($http, $scope , $apply) {  
        return {
            restrict: 'A',
            link : function (scope, element, attrs) {
                element.on('change', function () {
                    if(scope.C.type_id == 'undefined' || scope.C.type_id == '' || scope.C.building_component_id == 'undefined' || scope.C.building_component_id == '' ){
                        return false;
                    }
                    $http({ 
                        method: 'GET',
                        url: '{{ route("CostEstimateMasterValue") }}',
                        params : {component_id: scope.C.building_component_id, type_id: scope.C.type_id}
                        }).then(function success(response) {
                            scope.masterData = response.data;
                            scope.CostEstimate.Components[scope.index].Component            =   response.data.component_id;  
                            scope.CostEstimate.Components[scope.index].Type                 =   response.data.type_id;  

                            scope.CostEstimate.Components[scope.index].sqm                  =   response.data.sqm;  
                            scope.CostEstimate.Components[scope.index].Complexity           =   response.data.complexity; 

                            scope.CostEstimate.Components[scope.index].Details.PriceM2      =   response.data.detail_price;  
                            scope.CostEstimate.Components[scope.index].Details.Sum          =   getNum(response.data.sqm * response.data.complexity * response.data.detail_price);

                            scope.CostEstimate.Components[scope.index].Statistics.PriceM2  =   response.data.statistic_price;  
                            scope.CostEstimate.Components[scope.index].Statistics.Sum      =  getNum(response.data.sqm * response.data.complexity * response.data.statistic_price);

                            scope.CostEstimate.Components[scope.index].CadCam.PriceM2      =   response.data.cad_cam_price;  
                            scope.CostEstimate.Components[scope.index].CadCam.Sum          =   getNum(response.data.sqm * response.data.complexity * response.data.cad_cam_price);

                            scope.CostEstimate.Components[scope.index].Logistics.PriceM2   =   response.data.logistic_price;  
                            scope.CostEstimate.Components[scope.index].Logistics.Sum       =   getNum(response.data.sqm * response.data.complexity * response.data.logistic_price);

                            scope.CostEstimate.Components[scope.index].TotalCost.PriceM2   =   getNum(parseInt(response.data.detail_price)    + 
                                                                                                parseInt(response.data.statistic_price) + 
                                                                                                parseInt(response.data.cad_cam_price)   + 
                                                                                                parseInt(response.data.logistic_price))
                            
                            scope.CostEstimate.Components[scope.index].TotalCost.Sum       =   getNum(parseInt(response.data.detail_price)    + 
                                                                                                parseInt(response.data.statistic_price) + 
                                                                                                parseInt(response.data.cad_cam_price)   + 
                                                                                                parseInt(response.data.logistic_price))
                                scope.CostEstimate.Components[scope.index].Details.Sum          =    getNum(scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Details.PriceM2) ;
                                scope.CostEstimate.Components[scope.index].Statistics.Sum       =    getNum(scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Statistics.PriceM2) ;
                                scope.CostEstimate.Components[scope.index].Logistics.Sum        =    getNum(scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Logistics.PriceM2);
                                scope.CostEstimate.Components[scope.index].CadCam.Sum           =    getNum(scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].CadCam.PriceM2) ;

                                scope.CostEstimate.Components[scope.index].TotalCost.PriceM2    =   getNum(Number(scope.CostEstimate.Components[scope.index].Details.PriceM2)     + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].Statistics.PriceM2)  + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].CadCam.PriceM2)      + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].Logistics.PriceM2) );
                        
                                scope.CostEstimate.Components[scope.index].TotalCost.Sum        =   getNum(Number(scope.CostEstimate.Components[scope.index].Details.Sum)     + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].Statistics.Sum)  + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].CadCam.Sum)      + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].Logistics.Sum));
                                let $sqmTotal           =   0;
                                let $complexity         =   0;
                                let $DetailsPriceM2     =   0;
                                let $DetailsSum         =   0;
                                let $StatisticsPriceM2  =   0;
                                let $StatisticsSum      =   0;
                                let $CadCamPriceM2      =   0;
                                let $CadCamSum          =   0;
                                let $LogisticsPriceM2   =   0;
                                let $LogisticsSum       =   0;
                                let $TotalCostPriceM2   =   0;
                                let $TotalCostSum       =   0;
                                let $RipSum             =   0;

                                scope.CostEstimate.Components.map( (item, index) => {
                                    $sqmTotal           +=  Number(item.sqm); 
                                    $complexity         +=  Number(item.Complexity);
                                    $DetailsPriceM2     +=  Number(item.Details.PriceM2); 
                                    $DetailsSum         +=  Number(item.Details.Sum);
                                    $StatisticsPriceM2  +=  Number(item.Statistics.PriceM2);
                                    $StatisticsSum      +=  Number(item.Statistics.Sum);
                                    $CadCamPriceM2      +=  Number(item.CadCam.PriceM2);
                                    $CadCamSum          +=  Number(item.CadCam.Sum);
                                    $LogisticsPriceM2   +=  Number(item.Logistics.PriceM2);
                                    $LogisticsSum       +=  Number(item.Logistics.Sum);
                                    $TotalCostPriceM2   +=  Number(item.TotalCost.PriceM2);
                                    $TotalCostSum       +=  Number(item.TotalCost.Sum);
                                    $RipSum             +=  Number(item.Rip.Sum);
                                });

                                scope.CostEstimate.ComponentsTotals.sqm                 = $sqmTotal;
                                scope.CostEstimate.ComponentsTotals.complexity          = $complexity;
                                scope.CostEstimate.ComponentsTotals.Details.PriceM2     = $DetailsPriceM2;
                                scope.CostEstimate.ComponentsTotals.Details.Sum         = $DetailsSum;
                                scope.CostEstimate.ComponentsTotals.Statistics.PriceM2  = $StatisticsPriceM2;
                                scope.CostEstimate.ComponentsTotals.Statistics.Sum      = $StatisticsSum;
                                scope.CostEstimate.ComponentsTotals.CadCam.PriceM2      = $CadCamPriceM2;
                                scope.CostEstimate.ComponentsTotals.CadCam.Sum          = $CadCamSum;
                                scope.CostEstimate.ComponentsTotals.Logistics.PriceM2   = $LogisticsPriceM2;
                                scope.CostEstimate.ComponentsTotals.Logistics.Sum       = $LogisticsSum;
                                scope.CostEstimate.ComponentsTotals.TotalCost.PriceM2   = $TotalCostPriceM2;
                                scope.CostEstimate.ComponentsTotals.TotalCost.Sum       = $TotalCostSum;
                                scope.CostEstimate.ComponentsTotals.Rip.Sum             = $RipSum;

                                scope.CostEstimate.ComponentsTotals.grandTotal       =  $sqmTotal +
                                                                                        $complexity +
                                                                                        $DetailsPriceM2 +
                                                                                        $DetailsSum +
                                                                                        $StatisticsPriceM2 +
                                                                                        $StatisticsSum +
                                                                                        $CadCamPriceM2 +
                                                                                        $CadCamSum +
                                                                                        $LogisticsPriceM2 +
                                                                                        $LogisticsSum +
                                                                                        $TotalCostPriceM2 +
                                                                                        $TotalCostSum ;
                                                                                
                        }, function error(response) { 
                            console.log("Code Eror")
                        }); 
                });
            },
        };
    }]).directive('getPrecastDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
        return {
            restrict: 'A',
            link : function (scope, element, attrs) {
                element.on('keyup', function () {
                    
                    scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_staircase * scope.PrecastEstimate.Components[scope.index].precast_component );
                    scope.PrecastEstimate.Components[scope.index].total_work_hours = getNum(Number(scope.PrecastEstimate.Components[scope.index].no_of_staircase * scope.PrecastEstimate.Components[scope.index].precast_component) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours));
                    scope.PrecastEstimate.Components[scope.index].total_engineering_cost = getNum(
                                                                                            (Number(scope.PrecastEstimate.Components[scope.index].no_of_staircase) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].precast_component) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours)) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].hourly_rate) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].complexity)
                                                                                        );
                    scope.$apply();
                });
            },
        };
    }]);
</script>
    
@endpush