<div class="row">
    <div ng-show="price_calculation == 'wood_engineering_estimation'">
        <div class="table custom-responsive p-0">
            <hr>
            <button class="btn btn-success btn-sm" ng-click="createNewCalculation('wood')">Create New Calculation</button>
        </div>
    </div>
</div>
<div class="table custom-responsive p-0">
    <table class="cost-estimate-total-table table table-bordered border">
        <thead>
            <tr style="background: var(--primary-bg) !important">
                <th colspan="3" class="text-center"><h5 class="m-0 py-1 text-white">Total Engineering Cost</h5></th>
            </tr>
            <tr>
                <th class="text-end">Area m<sup>2<sup></sup></sup></th>
                <th class="text-end">Pris/m<sup>2<sup></sup></sup></th>
                <th class="text-end">Sum</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-end font-12 p-0"> <b>@{{ ResultEngineeringEstimate.total.totalArea  }} </b></td>  
                <td class="text-end font-12 p-0"><b> @{{ ResultEngineeringEstimate.total.totalPris }}</b></td>  
                <td class="text-end font-12 p-0"><b> @{{ ResultEngineeringEstimate.total.totalSum }}</b></td>  
            </tr>
        </tbody>
    </table>
</div>
<div class="card">
    <div class="text-end mt-2">
        <button class="btn btn-info btn-sm" ng-click="addEngineeringEstimate()">Add Building</button>
    </div>
    <div class="custom-div-table my-2" ng-repeat="(firstIndex,CostEstimate) in EngineeringEstimate track by $index">
        <div class="bg-primary text-white">
            <div class="m-0">
                <div class="text-center m-0 py-2">
                    <select  class="my-select"  ng-model="CostEstimate.type" name="type" id="type">
                        <option ng-value="">-- Select -- </option> 
                        <option ng-value="costEstimateType" ng-selected="costEstimateType.type == CostEstimate.type" ng-repeat="costEstimateType in costEstimateTypes">@{{ costEstimateType }}</option>
                    </select>
                </div>
            </div>
            <div class="custom-row bg-primary text-white m-0">
                <div class="col-7 text-center">
                    Engineering Estimate
                </div>
                <div class="col d-flex" ng-show="editable">
                    <input type="text" ng-model="column_name">
                    <i class="fa fa-check btn btn-light btn-sm  text-danger " ng-click="editable = false; addDynamicColumn(firstIndex, column_name)"> </i>
                </div>
                <div class="col text-center" ng-click="editable = true" ng-show="editable == false">
                    <i title="add additional column"
                        class="fa fa-plus btn btn-light btn-sm  text-info "></i>
                </div>
                <div class="col-1 text-center" ng-click="cloneCostEstimate(firstIndex, CostEstimate)">
                    <i title="remove"
                        class="fa fa-copy btn btn-light btn-sm  text-danger "></i>
                </div>
                <div class="col-1  text-center" ng-click="deleteEngineeringEstimate(firstIndex)">
                    <i title="remove"
                        class="fa fa-trash btn btn-light btn-sm text-danger"></i>
                </div>
            </div>
            <div class="custom-row bg-primary text-white m-0">
                <div class="col custom-td text-center"> Component 
                    <button class="btn-sm btn font-12 btn-info shadow-0 w-100 py-0" ng-click="addComponent(firstIndex)"><i class="fa fa-plus"></i> Add </button>
                </div>
                <div class="col custom-td text-center"> Type </div>
                <div class="col custom-td text-center"> Design Scope (%) </div>
                <div class="col custom-td text-center">
                    <span class="text-center">1 to 2</span>
                    <span class="text-center">Complexity</span>
                </div>
                <div class="col custom-td m_two_cross_column">
                    <span>m2 Gross</span>
                    <input type="text" onkeypress="return isNumber(event)" disabled   ng-model="CostEstimate.ComponentsTotals.Sum"
                        class="form-control rounded-0 text-center form-control-sm">
                </div>
            
                <div class="col bg-primary2 custom-td text-center p-0" ng-repeat="(dynamicIndex, Dynamic) in CostEstimate.ComponentsTotals.Dynamics">
                    <span >@{{ Dynamic.name  }}  <i class="fa fa-trash text-danger dynamic_name" ng-click="deleteDynamic(firstIndex,dynamicIndex)"> </i></span>
                    <div class="custom-row text-center m-0">
                        <div class="col">
                            Nok/M2
                        </div>
                        <div class="col">
                            Sum
                        </div>
                    </div>
                    <div class="custom-row text-center m-0">
                        <div class="col p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="Dynamic.PriceM2" ng-model="Dynamic.PriceM2"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="col p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="Dynamic.Sum" ng-model="Dynamic.Sum"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="col custom-td text-center p-0">
                    <span>RIB</span>
                    <div class="text-center m-0">
                           Hrs
                    </div>
                    <div class="text-center m-0">
                        <input type="text" disabled onkeypress="return isNumber(event)" name="CostEstimate.ComponentsTotals.Rib.Sum" ng-model="CostEstimate.ComponentsTotals.Rib.Sum"
                            class="form-control  rounded-0 text-center form-control-sm">
                    </div>
                </div>
                <div class="col custom-td text-center p-0">
                    <span>Total Cost</span>
                    <div class="custom-row text-center m-0">
                        <div class="col">
                            Nok/M2
                        </div>
                        <div class="col">
                            Sum
                        </div>
                    </div>
                    <div class="custom-row text-center m-0">
                        <div class="col p-0">
                            <input type="text" onkeypress="return isNumber(event)" name="CostEstimate.ComponentsTotals.TotalCost.PriceM2" ng-model="CostEstimate.ComponentsTotals.TotalCost.PriceM2"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="col p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="CostEstimate.ComponentsTotals.TotalCost.Sum" ng-model="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="col-1 custom-td text-center"> Action </div>
            </div>
            {{-- input data --}}
            <div class="custom-row" ng-repeat="(index, C) in CostEstimate.Components track by $index">
                <div class="col custom-td box"> 
                    <select class="my-select"  ng-model="C.building_component_id" name="building_component_name">
                        <option value="">-- Select -- </option> 
                        <option ng-value="@{{ buildingComponent.id }}" ng-selected="buildingComponent.id == C.Component" ng-repeat="buildingComponent in buildingComponents">@{{ buildingComponent.building_component_name }}</option>
                    </select>
                </div>
                <div class="col custom-td box"> 
                    <select class="my-select"  ng-model="C.type_id" ng-change="getCostEstimateData(index)" name="type_name">
                        <option value="">-- Select ---</option> 
                        <option ng-value="@{{ buildingType.id }}" ng-selected="buildingType.id == C.Type" ng-repeat="buildingType in buildingTypes">@{{ buildingType.building_type_name }}</option>
                    </select>
                </div>
                <div class="col custom-td box"> <input type="text"  onkeypress="return isNumber(event)" name="C.DesignScope"  get-cost-details-total="[index]" ng-model="C.DesignScope"
                        class="form-control  rounded-0 text-center form-control-sm">
                </div>
                <div class="col custom-td"> <input type="text" onkeypress="return isNumber(event)" name="Complexity" get-cost-details-total="[index]" ng-model="C.Complexity"
                        class="form-control  rounded-0 text-center form-control-sm">
                </div>
                <div class="col custom-td "> <input type="text" onkeypress="return isNumber(event)" name="Sqm" get-cost-details-total="[index]" ng-model="C.Sqm"
                        class="form-control  rounded-0 text-center form-control-sm sqm_">
                </div>
                <div class="col custom-td" ng-repeat="(thirdIndex, D) in C.Dynamics">
                    <div class="custom-row  text-center p-0">
                        <div class="col p-0">
                            <input type="text" onkeypress="return isNumber(event)" get-cost-details-total="[index]" name="D.PriceM2" ng-model="D.PriceM2"
                            class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="col p-0">
                            <input type="text" onkeypress="return isNumber(event)" ng-model="D.Sum" name="D.Sum" disabled
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="col custom-td">
                    <div class="custom-row  text-center p-0">
                        <input type="text" get-cost-details-total="[index]"  onkeypress="return isNumber(event)" name="C.Rib.Sum" ng-model="C.Rib.Sum"
                            class="form-control  rounded-0 text-center form-control-sm">
                    </div>
                </div>
                <div class="col custom-td">
                    <div class="custom-row  text-center p-0">
                        <div class="col p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="C.TotalCost.PriceM2" ng-model="C.TotalCost.PriceM2"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="col p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="C.TotalCost.Sum" ng-model="C.TotalCost.Sum"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                </div>
                
                <div class="col-1 p-0 text-center" ng-click="delete(firstIndex,secondIndex)">
                    <i class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-10"> </i>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Route::is('enquiry.calculate-cost-estimation')) 
<div  ng-show="wood_estimate_edit_id == false && price_calculation == 'wood_engineering_estimation'" class="d-flex">
    <div class="col-2">
        Name 
    </div>
    <div class="col">
        <input type="text" class="form-control" ng-model="wood_estimate_name" name="wood_estimate_name">
    </div>
    <div class="col text-end">
        <button class="btn btn-info" ng-click="EstimateStore('wood')">Generate</button>
    </div>

</div>
<div ng-show="wood_estimate_edit_id && price_calculation == 'wood_engineering_estimation'" class="d-flex">
    <div class="col-2">
        Name 
    </div>
    <div class="col">
        <input type="text" class="form-control" ng-model="wood_estimate_name" name="wood_estimate_name">
    </div>
    <div class="col text-end">
        <button class="btn btn-info" ng-click="EstimateUpdate(wood_estimate_edit_id, 'wood')">Update Estimation</button>
    </div>
</div>
<div class="m-0">
    <h3 class="my-2">Wood Estimation List</h3>
    @include('admin.calculate-cost-estimate.wood-list')
</div>
@endif