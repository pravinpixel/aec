<div class="row">
    <div ng-show="price_calculation == 'precast_engineering_estimation'">
        <div class="table custom-responsive p-0">
            <hr>
            <button class="btn btn-success btn-sm" ng-click="createNewCalculation('precast')">Create new calculation</button>
        </div>
    </div>
</div>

<div ng-show="price_calculation == 'precast_engineering_estimation'">
    <div class="table custom-responsive p-0">
        <h5> Precast Engineering Estimation </h5>
        <table class="cost-estimate-total-table table table-bordered border">
            <thead>
                <tr  style="background: var(--primary-bg) !important">
                    <th colspan="3" class="text-center"><h5 class="m-0 py-1 text-white">Total Engineering Cost</h5></th>
                </tr>
                <tr>
                    <th class="text-end">Area m<sup>2</sup></th>
                    <th class="text-end">Pris/m<sup>2</sup></th>
                    <th class="text-end">Sum</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td class="text-end font-12 p-0"><b>@{{ getNum(PrecastComponent.totalArea) }}</b></td>  
                    <td class="text-end font-12 p-0"><b>@{{ getNum(PrecastComponent.totalPris) }}</b></td>  
                    <td class="text-end font-12 p-0"><b>@{{ getNum(PrecastComponent.totalSum) }}</b></td>  
                    
                </tr>
            </tbody>
        </table>
    </div>

    <button class="btn btn-info btn-sm mb-2 pull-right mx-2" ng-click="addPrecasEstimate()">Add New Building </button>
    <div class="table custom-responsive p-0 table-responsive w-100">
        <div class="table-responsive w-100"  ng-repeat="(pRootKey,PrecastEstimate) in PrecastComponent track by $index">
                <table class="cost-estimate-table table table-bordered border">
                    <thead>
                        <tr>
                            <td colspan="18" style="padding: 0 !important">
                                <div  class="text-center">
                                    <select  class="my-select"  ng-model="PrecastEstimate.type" name="type" id="type">
                                        <option ng-value="">-- Select -- </option> 
                                        <option ng-value="costEstimateType" ng-selected="PrecastEstimate.type == costEstimateType.type" ng-repeat="costEstimateType in costEstimateTypes">@{{ costEstimateType }}</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr  style="background: var(--primary-bg) !important">
                            <td colspan="12" class="text-center"><h5 class="m-0 py-1 text-white">Engineering Estimation</h5></td>
                            <td colspan="1" class="text-center"><i title="remove" ng-click="deletePrecastEstimate(pRootKey)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i></td>
                            <td colspan="1" class="text-center"><i  title="clone" ng-click="clonePrecastEstimate(pRootKey,PrecastEstimate)" class="fa fa-copy btn btn-light btn-sm border text-primary h-100 w-100"></i></td>
                        </tr>
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
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Hourly Rate (550/Hr)</th>
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Total Work Hours</th>
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Engineering Cost</th>
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Central Approval</th>
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Total Engineering Cost</th>
                            <td rowspan="3" class="font-12 text-center" style="background: var(--primary-bg) !important"><b class="text-white">Action</b></td>
                        </tr>
                        <tr class="bg-light-primary border">
                            <th rowspan="2" class="text-center font-12" style="background: var(--primary-bg) !important" >Complexity</th> 
                        
                        </tr>
                        <tr class="bg-light-primary border">
                        <td class="text-center font-12 p-0"><b>@{{ getNum(PrecastEstimate.total_sqm) }}</b></td>  
                            <td class="text-center font-12 p-0"><b>@{{ getNum(PrecastEstimate.total_std_work_hours) }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ getNum(PrecastEstimate.total_additional_work_hours) }}</b></td>   
                            <td class="text-center font-12 p-0"><b>@{{ getNum(PrecastEstimate.total_hourly_rate) }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ getNum(PrecastEstimate.total_work_hours) }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ getNum(PrecastEstimate.engineering_cost) }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ getNum(PrecastEstimate.total_central_approval) }}</b></td> 
                            <td class="text-center font-12 p-0"><b>@{{ getNum(PrecastEstimate.total_engineering_cost) }}</b></td> 
                        
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

                            <td style="padding:0px !important"><input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0"  ng-model="C.sqm" name="sqm" class="my-control psqm_"> </td>
                        
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
                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.engineering_cost" name="engineering_cost">
                            </td>
                            <td>
                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.total_central_approval" name="total_central_approval">
                            </td>
                            <td>
                                <input  get-precast-details-total="[index]" type="text" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.total_engineering_cost" name="total_engineering_cost">
                            </td>
                            <td class="text-center" style="padding: 0 !important">
                                <i ng-click="deletePrecastComponent(pRootKey, index)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div> 
</div>

<div  ng-show="precast_estimate_edit_id == false && price_calculation == 'precast_engineering_estimation'" class="d-flex">
    <div class="col-2">
        Name 
    </div>
    <div class="col">
        <input type="text" class="form-control" ng-model="precast_estimate_name" name="precast_estimate_name">
    </div>
    <div class="col text-end">
        <button class="btn btn-info" ng-click="EstimateStore('precast')">Generate</button>
    </div>

</div>

<div ng-show="precast_estimate_edit_id && price_calculation == 'precast_engineering_estimation'" class="d-flex">
    <div class="col-2">
        Name 
    </div>
    <div class="col">
        <input type="text" class="form-control" ng-model="precast_estimate_name" name="precast_estimate_name">
    </div>
    <div class="col text-end">
        <button class="btn btn-info" ng-click="EstimateUpdate(precast_estimate_edit_id, 'precast')">Update Estimation</button>
    </div>
</div>

<div class="row"  ng-show="price_calculation == 'precast_engineering_estimation'">
    <h3 class="my-2">Precast Estimation List</h3>
    @include('admin.calculate-cost-estimate.precast-list')
</div>