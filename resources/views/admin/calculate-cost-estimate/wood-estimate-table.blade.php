<div class="text-end mt-2">
    <button class="btn btn-info btn-sm" ng-click="addEngineeringEstimate()"> <i class="fa fa-plus"></i> Add Building</button>
</div>
<div class="costEstimateCurrentData">
    <div class="card custom-div-table my-2 shadow-sm border" ng-repeat="(firstIndex,CostEstimate) in EngineeringEstimate track by $index">
        <div class="card-header bg-light p-2">
            <div class="row align-items-center  m-0">
                <div class="col-md-3 p-0">
                    <select class="form-select form-select-sm" ng-model="CostEstimate.type" name="type" id="type">
                        <option value="">-- Select Building -- </option>
                        <option ng-value="costEstimateType" ng-selected="costEstimateType.type == CostEstimate.type"
                            ng-repeat="costEstimateType in costEstimateTypes">@{{ costEstimateType }}</option>
                    </select> 
                </div>  
                <div class="col-9 text-end">
                    <div class="btn-group">  
                        <button class="btn btn-sm btn-warning" title="Clone" ng-click="cloneCostEstimate(firstIndex, CostEstimate)"><i class="fa fa-copy me-1"></i></button>
                        <button class="btn btn-sm btn-danger" title="Delete" ng-click="deleteEngineeringEstimate(firstIndex)"><i class="mdi mdi-delete me-1"></i></button>
                    </div> 
                </div>
            </div> 
        </div> 
        <div class="card-body p-0"> 
            <div class="auto-scroll bg-primary2 pb-0" > 
                <div class="text-center border border-bottom-0 border-dark">
                    <div class="d-flex align-items-center p-1 justify-content-between bg-primary2">
                        <div class="btn-group">
                            <select title="Set as Template" class="form-select border-0"  ng-model="woodTemplate" ng-change="getWoodTemplate(woodTemplate, firstIndex)" name="woodTemplate" id="woodTemplate">
                                <option value="">Select  template</option>
                                <option ng-value="costEstimateWoodTemplate.id"  ng-selected="CostEstimate.woodTemplate == costEstimateWoodTemplate.id" ng-repeat="costEstimateWoodTemplate in costEstimateWoodTemplates">@{{ costEstimateWoodTemplate.name }}</option>
                            </select>
                            <button ng-click="callWoodTemplate(firstIndex)" title="Create / Save Template" class="btn btn-success btn-sm border-0"><i class="mdi mdi-plus-box-multiple"></i></button>
                            <button overwrite-template="{template:woodTemplate,type:'wood'}" title="Overwrite Template" class="btn btn-primary btn-sm border-0"><i class="mdi mdi-pencil"></i></button>
                            <button delete-template="{template:woodTemplate,type:'wood'}" title="Delete Template" class="btn btn-danger btn-sm border-0"><i class="mdi mdi-trash-can"></i></button>
                        </div>
                        <h5 class="m-0 bg-primary2 py-1 text-white">Engineering Estimation</h5>
                        <div class="btn-group">
                            <input type="text" class="form-control btn-sm " placeholder="Type here..." ng-model="column_name" ng-show="editable">
                            <button ng-click="editable = true" ng-show="editable == false" title="Add Column" class="btn btn-outline-success btn-sm "><i class="mdi mdi-plus"></i> Add</button>
                            <button class="btn-sm btn btn-outline-success" type="button" ng-click="editable = false; addDynamicColumn(firstIndex, column_name)"  ng-show="editable"><i class="fa fa-check"></i></button>
                        </div> 
                    </div>
                </div>
                <div class="custom-row custom-border-left bg-primary text-white m-0">
                    <div class="custom-td text-center"> 
                        <small class="fw-bold">Building Components</small>
                        <button class="btn-sm btn font-12 btn-info py-0 mt-1" ng-click="addComponent(firstIndex)">
                            <i class="fa fa-plus"></i> Add 
                        </button>
                    </div>
                    <div class="custom-td text-center"><small class="fw-bold"> Type of Delivery </small> </div>
                    <div class="custom-td text-center custom-td-sm"><small class="fw-bold"> Design Scope (%)</small> </div>
                    <div class="custom-td text-center custom-td-sm">
                        <span class="text-center"><small class="fw-bold">1 to 2</small></span>
                        <span class="text-center">
                            <small style="font-size: 10px !important">Complexity</small>
                        </span>
                    </div>
                    <div class="custom-td m_two_cross_column text-center custom-td-sm">
                        <span style="height: 50px;" class="text-center m_two_cross m-0 pt-1" ><small class="fw-bold">m<sup>2</sup> Gross</small></span> 
                        <input type="number" disabled onkeypress="return isNumber(event)" name="CostEstimate.ComponentsTotals.Sqm" ng-value="CostEstimate.ComponentsTotals.Sqm" ng-model="CostEstimate.ComponentsTotals.Sqm" class="form-control  rounded-0 text-center form-control-sm">
                    </div>
                    <div  ng-model="CostEstimate.ComponentsTotals.Dynamics" class="d-flex">
                        <div class="custom-td custom-td-lg d-block text-center p-0 bg-primary2" ng-repeat="(dynamicIndex, Dynamic) in CostEstimate.ComponentsTotals.Dynamics track by $index">
                            <div class="w-100" >
                                <div style="height: 50px;" class="custom-td custom-td-lg">
                                    <div class="d-flex align-items-center justify-content-around border-bottom w-100 text-center">
                                        <small class="fw-bold">@{{ Dynamic.name }} <small class="fw-normal">(kr)</small></small> 
                                        <i class="fa fa-trash text-danger dynamic_name" ng-click="deleteDynamic(firstIndex,dynamicIndex)"> </i>
                                    </div>
                                    <div class="row text-center m-0 w-100">
                                        <div class="col p-0 font-12 text-center mt-1">
                                            <small class="fw-bold">Pris/m<sup>2</sup></small>
                                        </div>
                                        <div class="col p-0 font-12 text-center mt-1">
                                            <small class="fw-bold">Sum </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center m-0 w-100">
                                    <div class="col p-0">
                                        <input type="number" disabled onkeypress="return isNumber(event)" name="Dynamic.PriceM2" ng-value="Dynamic.PriceM2"
                                            ng-model="Dynamic.PriceM2" class="form-control  rounded-0 text-center form-control-sm">
                                    </div>
                                    <div class="col p-0">
                                        <input type="number" disabled onkeypress="return isNumber(event)" name="Dynamic.Sum" ng-value="Dynamic.Sum"
                                            ng-model="Dynamic.Sum" class="form-control  rounded-0 text-center form-control-sm">
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="custom-td custom-td-sm text-center p-0 justify-content-between">
                        <small class="fw-bold">
                            <span>RIB</span>
                            <div class="text-center m-0">
                                Hrs
                            </div>
                        </small>
                        <div class="text-center m-0">
                            <input type="number" disabled onkeypress="return isNumber(event)"
                                name="CostEstimate.ComponentsTotals.Rib.Sum"
                                ng-value="CostEstimate.ComponentsTotals.Rib.Sum"
                                ng-model="CostEstimate.ComponentsTotals.Rib.Sum"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                    <div class="custom-td custom-td-lg text-center p-0 justify-content-between">
                        <span><small class="fw-bold">Total Cost</small> <small class="fw-normal">(kr)</small></small> </span>
                        <div class="custom-row text-center m-0">
                            <div class="col">
                                <small class="fw-bold">Pris/m<sup>2</sup></small>
                            </div>
                            <div class="col">
                                <small class="fw-bold">Sum</small>
                            </div>
                        </div>
                        <div class="custom-row text-center m-0">
                            <div class="p-0">
                                <input type="number" onkeypress="return isNumber(event)"
                                    name="CostEstimate.ComponentsTotals.TotalCost.PriceM2"
                                    ng-model="CostEstimate.ComponentsTotals.TotalCost.PriceM2" ng-value="CostEstimate.ComponentsTotals.TotalCost.PriceM2"
                                    class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                            <div class="p-0">
                                <input type="number" disabled onkeypress="return isNumber(event)" ng-value="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                    name="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                    ng-model="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                    class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="col-1 custom-td custom-td-sm text-center dd-sm remove_history pt-4" style="width:50px !important;min-width:50px !important;max-width:50px !important;"> <small>Action</small></div>
                </div>
                {{-- input data --}}
                <div psi-sortable="" ng-model="C">
                    <div ng-repeat="(index, C) in CostEstimate.Components track by $index" class="custom-row custom-border-left custom-border-bottom bg-white" >
                        <div class="custom-td  custom_drag_">
                            <div class="d-flex align-items-center">
                                <a class="mdi mdi-arrow-top-left-bottom-right-bold border bg-white text-primary shadow-sm"></a> 
                                <input type="text" class="history_building_component_value" value="@{{ BuildingComponentObj[C.building_component_id] }}">
                                <select class="my-select w-100 history_building_type_select" get-master-data="[index]" ng-model="C.building_component_id" name="building_component_name">
                                    <option value="">-- Select -- </option>
                                    <option ng-value="@{{ buildingComponent.id }}" ng-selected="buildingComponent.id == C.Component"
                                        ng-repeat="buildingComponent in buildingComponents">@{{ buildingComponent.building_component_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="custom-td">
                            <input type="text" class="history_building_type_value" value="@{{DeliveryTypeObj[C.type_id] }}">
                            <select class="my-select w-100 history_building_type_select" get-master-data="[index]" ng-model="C.type_id" ng-change="getMasterData(index)"
                                name="type_name">
                                <option value="">-- Select ---</option>
                                <option ng-value="@{{ deliveryType.id }}" ng-selected="deliveryType.id == C.Type"
                                    ng-repeat="deliveryType in deliveryTypes">@{{ deliveryType.delivery_type_name }}</option>
                            </select>
                        </div>
                        <div class="custom-td custom-td-sm position-relative" > 
                            <input type="number" name="C.DesignScope" get-cost-details-total="[index]" ng-model="C.DesignScope" ng-value="C.DesignScope" onkeypress="return isNumber(event)"
                                class="form-control  rounded-0 text-center form-control-sm">
                            <small class="position-absolute ms-4">%</small>
                        </div>
                        <div class="custom-td custom-td-sm"> <input type="number" onkeypress="return isNumber(event)" name="Complexity" ng-value="C.Complexity"
                                get-cost-details-total="[index]" ng-model="C.Complexity"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="custom-td custom-td-sm"> <input type="number" onkeypress="return isNumber(event)" name="Sqm"  ng-value="C.Sqm"
                                get-cost-details-total="[index]" ng-model="C.Sqm"
                                class="form-control  rounded-0 text-center form-control-sm sqm_">
                        </div>
                        <div class="custom-td custom-td-lg" ng-repeat="(thirdIndex, D) in C.Dynamics">
                            <div class="custom-row  text-center p-0">
                                <div class="p-0">
                                    <input type="number" onkeypress="return isNumber(event)" get-cost-details-total="[index]" ng-value="D.PriceM2"
                                        name="D.PriceM2" ng-model="D.PriceM2"
                                        class="form-control  rounded-0 text-center form-control-sm">
                                </div>
                                <div class="p-0">
                                    <input type="number" onkeypress="return isNumber(event)" ng-model="D.Sum" name="D.Sum" ng-value="D.Sum"
                                        disabled class="form-control  rounded-0 text-center form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="custom-td custom-td-sm">
                            <div class="custom-row  text-center p-0">
                                <input type="number" get-cost-details-total="[index]" onkeypress="return isNumber(event)"
                                    name="C.Rib.Sum" ng-model="C.Rib.Sum" ng-value="C.Rib.Sum"
                                    class="form-control  rounded-0 text-center form-control-sm">
                            </div>
                        </div>
                        <div class="custom-td custom-td-lg">
                            <div class="text-center custom-row p-0">
                                <div class="p-0">
                                    <input type="number"  get-cost-details-total="[index]" onkeypress="return isNumber(event)" name="C.TotalCost.PriceM2"
                                        ng-model="C.TotalCost.PriceM2" ng-value="C.TotalCost.PriceM2"
                                        class="form-control  rounded-0 text-center form-control-sm">
                                </div>
                                <div class="p-0">
                                    <input type="number" disabled onkeypress="return isNumber(event)" name="C.TotalCost.Sum" ng-value="C.TotalCost.Sum"
                                        ng-model="C.TotalCost.Sum" class="form-control  rounded-0 text-center form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="remove_history  text-center custom-td custom-td-sm" style="width:50px !important;min-width:50px !important;max-width:50px !important;" ng-click="delete(firstIndex,index)">
                            <i class="fa fa-trash text-danger btn"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> 
</div> 
@include('admin.calculate-cost-estimate.wood-template')