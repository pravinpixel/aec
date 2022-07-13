<div class="text-end mt-2">
    <button class="btn btn-info btn-sm" ng-click="addEngineeringEstimate()">Add Building</button>
</div>
<div class="costEstimateCurrentData">
    <div class="card custom-div-table my-2 shadow-sm border" ng-repeat="(firstIndex,CostEstimate) in EngineeringEstimate track by $index">
        <div class="card-header bg-light p-2">
            <div class="row align-items-center  m-0">
                <div class="col-md-4 p-0">
                    <select class="form-select form-select-sm" ng-model="CostEstimate.type" name="type" id="type">
                        <option ng-value="">-- Select -- </option>
                        <option ng-value="costEstimateType" ng-selected="costEstimateType.type == CostEstimate.type"
                            ng-repeat="costEstimateType in costEstimateTypes">@{{ costEstimateType }}</option>
                    </select>
                </div>
                <div class="col-md-8 pe-0">
                    <div class="input-group justify-content-end">
                        <input type="text" class="form-control btn-sm " placeholder="Type here..." ng-model="column_name" ng-show="editable">
                        <button class="btn-sm btn btn-success" type="button" ng-click="editable = false; addDynamicColumn(firstIndex, column_name)"  ng-show="editable"><i class="fa fa-check"></i></button>
                        <button class="btn-sm btn btn-info" type="button" ng-click="editable = true" ng-show="editable == false"><i title="Add" class="fa fa-plus"></i></button>
                        <button class="btn-sm btn btn-warning" type="button" ng-click="cloneCostEstimate(firstIndex, CostEstimate)"><i title="Clone" class="fa fa-copy "></i></button>
                        <button class="btn-sm btn btn-danger" type="button" ng-click="deleteEngineeringEstimate(firstIndex)"><i title="remove" class="fa fa-trash"></i></button>
                    </div> 
                </div>
            </div> 
        </div>
        <div class="card-body p-2"> 
            <div class="auto-scroll" > 
                <div class="custom-row custom-border-left bg-primary text-white m-0">
                    <div class="custom-td text-center"> 
                        <small class="fw-bold">Total</small>
                        <button class="btn-sm btn font-12 btn-info py-0 mt-1" ng-click="addComponent(firstIndex)">
                            <i class="fa fa-plus"></i> Add 
                        </button>
                    </div>
                    <div class="custom-td text-center"><small class="fw-bold"> Type of Delivery </small> </div>
                    <div class="custom-td text-center"><small class="fw-bold"> Design Scope (%)</small> </div>
                    <div class="custom-td text-center">
                        <span class="text-center"><small class="fw-bold">1 to 2</small></span>
                        <span class="text-center"><small class="fw-bold">Complexity</small></span>
                    </div>
                    <div class="custom-td m_two_cross_column text-center">
                        <span class="text-center"><small class="fw-bold">m2 Gross</small></span> 
                        <span class="text-center"><small class="fw-bold"> @{{ CostEstimate.ComponentsTotals.Sqm }} </small></span>
                    </div>
                    <div  ng-model="CostEstimate.ComponentsTotals.Dynamics" class="d-flex">
                        <div class="custom-td text-center p-0 bg-primary2" ng-repeat="(dynamicIndex, Dynamic) in CostEstimate.ComponentsTotals.Dynamics track by $index">
                            <span class="border-bottom w-100 text-center custom-max-h">
                                <i class="fa fa-trash text-danger dynamic_name" ng-click="deleteDynamic(firstIndex,dynamicIndex)"> </i>
                                <small class="fw-bold">@{{ Dynamic.name }}</small> 
                            </span>
                            <div class="row text-center m-0 w-100">
                                <div class="col p-0 font-12 text-center">
                                    <small class="fw-bold">Pris/m2</small>
                                </div>
                                <div class="col p-0 font-12 text-center">
                                    <small class="fw-bold">Sum </small>
                                </div>
                            </div>
                            <div class="custom-row text-center m-0 h-100">
                                <div class="p-0">
                                    <input type="text" disabled onkeypress="return isNumber(event)" name="Dynamic.PriceM2" ng-value="Dynamic.PriceM2"
                                        ng-model="Dynamic.PriceM2" class="form-control  rounded-0 text-center form-control-sm">
                                </div>
                                <div class="p-0">
                                    <input type="text" disabled onkeypress="return isNumber(event)" name="Dynamic.Sum" ng-value="Dynamic.Sum"
                                        ng-model="Dynamic.Sum" class="form-control  rounded-0 text-center form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-td text-center p-0 justify-content-between">
                        <small class="fw-bold">
                            <span>RIB</span>
                            <div class="text-center m-0">
                                Hrs
                            </div>
                        </small>
                        <div class="text-center m-0">
                            <input type="text" disabled onkeypress="return isNumber(event)"
                                name="CostEstimate.ComponentsTotals.Rib.Sum"
                                ng-value="CostEstimate.ComponentsTotals.Rib.Sum"
                                ng-model="CostEstimate.ComponentsTotals.Rib.Sum"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                    <div class="custom-td text-center p-0 justify-content-between">
                        <span><small class="fw-bold">Total Cost</small></span>
                        <div class="custom-row text-center m-0">
                            <div class="col">
                                <small class="fw-bold">Pris/m2</small>
                            </div>
                            <div class="col">
                                <small class="fw-bold">Sum</small>
                            </div>
                        </div>
                        <div class="custom-row text-center m-0">
                            <div class="p-0">
                                <input type="text" onkeypress="return isNumber(event)"
                                    name="CostEstimate.ComponentsTotals.TotalCost.PriceM2"
                                    ng-model="CostEstimate.ComponentsTotals.TotalCost.PriceM2" ng-value="CostEstimate.ComponentsTotals.TotalCost.PriceM2"
                                    class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                            <div class="p-0">
                                <input type="text" disabled onkeypress="return isNumber(event)" ng-value="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                    name="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                    ng-model="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                    class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="col-1 custom-td text-center remove_history"> Action </div>
                </div>
                {{-- input data --}}
                <div class="custom-row custom-border-left custom-border-bottom" ng-repeat="(index, C) in CostEstimate.Components track by $index">
                    <div class="custom-td">
                        <input type="text" class="history_building_component_value" value="@{{ BuildingComponentObj[C.building_component_id] }}">
                        <select class="my-select w-100 history_building_component_input" get-master-data="[index]" ng-model="C.building_component_id" name="building_component_name">
                            <option value="">-- Select -- </option>
                            <option ng-value="@{{ buildingComponent.id }}" ng-selected="buildingComponent.id == C.Component"
                                ng-repeat="buildingComponent in buildingComponents">@{{ buildingComponent.building_component_name }}</option>
                        </select>
                    </div>
                    <div class="custom-td">
                        <input type="text" class="history_building_type_value" value="@{{ DeliveryTypeObj[C.type_id] }}">
                        <select class="my-select w-100 history_building_type_select" get-master-data="[index]" ng-model="C.type_id" ng-change="getMasterData(index)"
                            name="type_name">
                            <option value="">-- Select ---</option>
                            <option ng-value="@{{ deliveryType.id }}" ng-selected="deliveryType.id == C.Type"
                                ng-repeat="deliveryType in deliveryTypes">@{{ deliveryType.delivery_type_name }}</option>
                        </select>
                    </div>
                    <div class="custom-td"> <input type="text" onkeypress="return isNumber(event)"
                            name="C.DesignScope" get-cost-details-total="[index]" ng-model="C.DesignScope" ng-value="C.DesignScope" onkeyup="this.value = minmax(this.value, 1, 100)" onkeypress="return isNumber(event)"
                            class="form-control  rounded-0 text-center form-control-sm">
                    </div>
                    <div class="custom-td"> <input type="text" min="0" max="2" onkeyup="this.value = minmax(this.value, 1, 2)" onkeypress="return isNumber(event)" name="Complexity" ng-value="C.Complexity"
                            get-cost-details-total="[index]" ng-model="C.Complexity"
                            class="form-control  rounded-0 text-center form-control-sm">
                    </div>
                    <div class="custom-td "> <input type="text" onkeypress="return isNumber(event)" name="Sqm"  ng-value="C.Sqm"
                            get-cost-details-total="[index]" ng-model="C.Sqm"
                            class="form-control  rounded-0 text-center form-control-sm sqm_">
                    </div>
                    <div class="custom-td" ng-repeat="(thirdIndex, D) in C.Dynamics">
                        <div class="custom-row  text-center p-0">
                            <div class="p-0">
                                <input type="text" onkeypress="return isNumber(event)" get-cost-details-total="[index]" ng-value="D.PriceM2"
                                    name="D.PriceM2" ng-model="D.PriceM2"
                                    class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                            <div class="p-0">
                                <input type="text" onkeypress="return isNumber(event)" ng-model="D.Sum" name="D.Sum" ng-value="D.Sum"
                                    disabled class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="custom-td">
                        <div class="custom-row  text-center p-0">
                            <input type="text" get-cost-details-total="[index]" onkeypress="return isNumber(event)"
                                name="C.Rib.Sum" ng-model="C.Rib.Sum" ng-value="C.Rib.Sum"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                    <div class="custom-td">
                        <div class="text-center custom-row p-0">
                            <div class="p-0">
                                <input type="text"  get-cost-details-total="[index]" onkeypress="return isNumber(event)" name="C.TotalCost.PriceM2"
                                    ng-model="C.TotalCost.PriceM2" ng-value="C.TotalCost.PriceM2"
                                    class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                            <div class="p-0">
                                <input type="text" disabled onkeypress="return isNumber(event)" name="C.TotalCost.Sum" ng-value="C.TotalCost.Sum"
                                    ng-model="C.TotalCost.Sum" class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="remove_history custom-td text-center" ng-click="delete(firstIndex,secondIndex)">
                        <i class="fa fa-trash text-danger btn"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 