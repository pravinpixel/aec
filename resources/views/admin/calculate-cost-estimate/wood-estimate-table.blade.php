<div class="text-end mt-2">
    <button class="btn btn-info btn-sm" ng-click="addEngineeringEstimate()">Add Building</button>
</div>
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
        <div class="auto-scroll"> 
            <div class="custom-row custom-border-left bg-primary text-white m-0">
                <div class="custom-td text-center"> 
                    Component
                    <button class="btn-sm btn font-12 btn-info py-0 mt-1" ng-click="addComponent(firstIndex)">
                        <i class="fa fa-plus"></i> Add 
                    </button>
                </div>
                <div class="custom-td text-center"> Type </div>
                <div class="custom-td text-center"> Design Scope (%) </div>
                <div class="custom-td text-center">
                    <span class="text-center">1 to 2</span>
                    <span class="text-center">Complexity</span>
                </div>
                <div class="custom-td m_two_cross_column">
                    <span class="mb-1">m2 Gross</span> 
                    @{{ CostEstimate.ComponentsTotals.Sum }}
                    {{-- <input type="text" onkeypress="return isNumber(event)" disabled
                        ng-model="CostEstimate.ComponentsTotals.Sum"
                        class="form-control rounded-0 text-center form-control-sm"> --}}
                </div>
    
                <div class="custom-td text-center p-0 bg-primary2" ng-repeat="(dynamicIndex, Dynamic) in CostEstimate.ComponentsTotals.Dynamics">
                    <span class="border-bottom w-100 text-center custom-max-h">
                        @{{ Dynamic.name }} 
                        <i class="fa fa-trash text-danger dynamic_name" ng-click="deleteDynamic(firstIndex,dynamicIndex)"> </i>
                    </span>
                    <div class="row text-center m-0 w-100">
                        <div class="col p-0 font-12 text-center">
                            Nok/M2
                        </div>
                        <div class="col p-0 font-12 text-center">
                            Sum 
                        </div>
                    </div>
                    <div class="custom-row text-center m-0 h-100">
                        <div class="p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="Dynamic.PriceM2"
                                ng-model="Dynamic.PriceM2" class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="Dynamic.Sum"
                                ng-model="Dynamic.Sum" class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="custom-td text-center p-0">
                    <span>RIB</span>
                    <div class="text-center m-0">
                        Hrs
                    </div>
                    <div class="text-center m-0">
                        <input type="text" disabled onkeypress="return isNumber(event)"
                            name="CostEstimate.ComponentsTotals.Rib.Sum"
                            ng-model="CostEstimate.ComponentsTotals.Rib.Sum"
                            class="form-control  rounded-0 text-center form-control-sm">
                    </div>
                </div>
                <div class="custom-td text-center p-0">
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
                        <div class="p-0">
                            <input type="text" onkeypress="return isNumber(event)"
                                name="CostEstimate.ComponentsTotals.TotalCost.PriceM2"
                                ng-model="CostEstimate.ComponentsTotals.TotalCost.PriceM2"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)"
                                name="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                ng-model="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="col-1 custom-td text-center"> Action </div>
            </div>
            {{-- input data --}}
            <div class="custom-row custom-border-left custom-border-bottom" ng-repeat="(index, C) in CostEstimate.Components track by $index">
                <div class="custom-td">
                    <select class="my-select w-100" ng-model="C.building_component_id" name="building_component_name">
                        <option value="">-- Select -- </option>
                        <option ng-value="@{{ buildingComponent.id }}" ng-selected="buildingComponent.id == C.Component"
                            ng-repeat="buildingComponent in buildingComponents">@{{ buildingComponent.building_component_name }}</option>
                    </select>
                </div>
                <div class="custom-td">
                    <select class="my-select w-100" ng-model="C.type_id" ng-change="getCostEstimateData(index)"
                        name="type_name">
                        <option value="">-- Select ---</option>
                        <option ng-value="@{{ buildingType.id }}" ng-selected="buildingType.id == C.Type"
                            ng-repeat="buildingType in buildingTypes">@{{ buildingType.building_type_name }}</option>
                    </select>
                </div>
                <div class="custom-td"> <input type="text" onkeypress="return isNumber(event)"
                        name="C.DesignScope" get-cost-details-total="[index]" ng-model="C.DesignScope"
                        class="form-control  rounded-0 text-center form-control-sm">
                </div>
                <div class="custom-td"> <input type="text" onkeypress="return isNumber(event)" name="Complexity"
                        get-cost-details-total="[index]" ng-model="C.Complexity"
                        class="form-control  rounded-0 text-center form-control-sm">
                </div>
                <div class="custom-td "> <input type="text" onkeypress="return isNumber(event)" name="Sqm"
                        get-cost-details-total="[index]" ng-model="C.Sqm"
                        class="form-control  rounded-0 text-center form-control-sm sqm_">
                </div>
                <div class="custom-td" ng-repeat="(thirdIndex, D) in C.Dynamics">
                    <div class="custom-row  text-center p-0">
                        <div class="p-0">
                            <input type="text" onkeypress="return isNumber(event)" get-cost-details-total="[index]"
                                name="D.PriceM2" ng-model="D.PriceM2"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="p-0">
                            <input type="text" onkeypress="return isNumber(event)" ng-model="D.Sum" name="D.Sum"
                                disabled class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="custom-td">
                    <div class="custom-row  text-center p-0">
                        <input type="text" get-cost-details-total="[index]" onkeypress="return isNumber(event)"
                            name="C.Rib.Sum" ng-model="C.Rib.Sum"
                            class="form-control  rounded-0 text-center form-control-sm">
                    </div>
                </div>
                <div class="custom-td">
                    <div class="text-center custom-row p-0">
                        <div class="p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="C.TotalCost.PriceM2"
                                ng-model="C.TotalCost.PriceM2"
                                class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                        <div class="p-0">
                            <input type="text" disabled onkeypress="return isNumber(event)" name="C.TotalCost.Sum"
                                ng-model="C.TotalCost.Sum" class="form-control  rounded-0 text-center form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="custom-td text-center" ng-click="delete(firstIndex,secondIndex)">
                    <i class="fa fa-trash text-danger btn"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-styles')
    <style>
        .auto-scroll {
            overflow: auto;
            padding-bottom: 10px 
        }
        .auto-scroll::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        /* Track */
        .auto-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        .auto-scroll::-webkit-scrollbar-thumb {
            background: gray;
        }

        /* Handle on hover */
        .auto-scroll::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        .custom-border-left {
            border-left: 1px solid black !important;
        }
        .custom-border-bottom {
            border-bottom: 1px solid black !important;
        }
        .custom-td {
            border-right: 1px solid black !important; 
            border-top: 1px solid black !important;
            border-left:none !important;
            border-bottom:none !important; 
            width: 100px !important;
            min-width: 100px !important;
            max-width: 100px !important;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .custom-row {
            display: inline-flex !important;
        }
        .custom-td input {
            padding: 0 !important;
            height: 100%;
            width: 100%;
        }
        .custom-max-h {
            height: 40px !important;
            overflow: hidden;
        }
    </style>
@endpush