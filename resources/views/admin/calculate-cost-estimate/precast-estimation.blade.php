<div ng-show="price_calculation == 'precast_engineering_estimation'">
    <table class="table text-center border shadow-sm m-0">
        <tr>
            <th colspan="6"><strong>Total Engineering Cost</strong></th>
        </tr>
        <tr>
            <th class="bg-light">Total Work Hours</th>
            <td class="bg-light">:</td>
            <td>@{{  getNum(ResultPrecastComponent.total.totalWorkHours) }}</td>
            <th class="bg-light">Sum (kr)</th>
            <td class="bg-light">:</td>
            <td>@{{ getNum(ResultPrecastComponent.total.totalSum) }}</td> 
        </tr>
    </table>
    {{-- <div class="table custom-responsive p-0">
        <table class="cost-estimate-total-table table table-bordered border text-end">
            <thead>
                <tr  style="background: var(--primary-bg) !important">
                    <th colspan="3" class="text-center"><h5 class="m-0 py-1 text-white">Total Engineering Cost</h5></th>
                </tr>
                <tr>
                    <th class="w-50">Total Work Hours</th>
                    <th class="w-50">Sum</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-50 font-12 p-0"><b>@{{ getNum(ResultPrecastComponent.total.totalWorkHours) }}</b></td>  
                    <td class="w-50 font-12 p-0"><b>@{{ getNum(ResultPrecastComponent.total.totalSum) }}</b></td>  
                </tr>
            </tbody>
        </table>
    </div> --}}
      
    <div class="input-group my-3 justify-content-end"> 
        <input type="text" ng-show="editorEnabled" class="form-control mx-1" ng-model="precast_component_name"  ng-value="precast_component_name" placeholder="Enter precast component">
        <input type="number" onkeypress="return isNumber(event)" ng-show="editorEnabled" class="form-control mx-1" ng-model="precast_component_hours" ng-value="precast_component_hours"placeholder="Enter hours">
        <button ng-show="editorEnabled" class="btn btn-info mx-1" ng-disabled="!precast_component_hours || !precast_component_name"  ng-click="savePrecastComponent()">Save</a>
        <button ng-show="editorEnabled" class="btn btn-danger mx-1" ng-click="editorEnabled = false">cancel</a>
        <button ng-hide="editorEnabled" class="btn btn-info mx-1" ng-click="editorEnabled = true"> <i class="fa fa-plus"></i> Component </button>
        <button class="btn btn-info mx-1" ng-click="addPrecasEstimate()"> <i class="fa fa-plus"></i> Add Building </button>
    </div>
<section id="precast-cost-estimate">
    <div class="table custom-responsive p-0 table-responsive w-100">
        <div class="table-responsive w-100"  ng-repeat="(pRootKey,PrecastEstimate) in PrecastComponent track by $index">
                <table class="cost-estimate-table table table-bordered border">
                    <thead>
                        <tr>
                            <td colspan="18" style="padding: 0 !important">
                                <div class="p-2 bg-light ">
                                    <div class="col-3">
                                        <select  class="form-select form-select-sm "  ng-model="PrecastEstimate.type" name="type" id="type">
                                            <option value=""> -- Select -- </option> 
                                            <option ng-value="costEstimateType" ng-selected="PrecastEstimate.type == costEstimateType.type" ng-repeat="costEstimateType in costEstimateTypes">@{{ costEstimateType }}</option>
                                        </select>
                                    </div>
                                </div> 
                            </td>
                        </tr>
                        <tr  style="background: var(--secondary-bg) !important">
                            <td colspan="4">
                                <div class="d-flex">
                                    <select class="form-select form-select-sm" ng-model="precastTemplate" ng-change="getPrecastTemplate(precastTemplate, pRootKey)" name="woodTemplate" id="woodTemplate">
                                        <option value="">-- Select Template -- </option>
                                        <option ng-value="costEstimatePrecastTemplate.id"
                                            ng-repeat="costEstimatePrecastTemplate in costEstimatePrecastTemplates">@{{ costEstimatePrecastTemplate.name }}</option>
                                    </select>
                                    <button class="btn btn-success btn-sm" ng-click="callPrecastTemplate(pRootKey)"><i class="mdi mdi-plus-box-multiple"> </i></button>
                                    <button class="btn btn-sm btn-primary" overwrite-template="{template:precastTemplate, type:'precast'}"><i class="mdi mdi-pencil"></i></button> 
                                    <button class="btn btn-sm btn-danger" delete-template="{template:precastTemplate, type:'precast'}"><i class="fa fa-trash"></i></button> 
                                </div>
                            </td>
                            <td colspan="8" class="text-center"><h5 class="m-0 py-1 text-white">Engineering Estimation</h5></td>
                            <td colspan="2">
                                <button class="btn-sm btn btn-outline-warning" type="button" ng-click="clonePrecastEstimate(pRootKey,PrecastEstimate)"><i  title="clone"  class="fa fa-copy "></i></button>
                                <button class="btn-sm btn btn-outline-danger" type="button"  ng-click="deletePrecastEstimate(pRootKey)"><i title="remove" class="fa fa-trash"></i></button>
                            </td>
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
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Hourly Rate (kr) (550/Hr)</th>
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Total Work Hours</th>
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Engineering Cost  (kr)</th>
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Central Approval  (kr)</th>
                            <th rowspan="2" class="font-12 text-center" style="background: var(--secondary-bg) !important">Total Engineering Cost  (kr)</th>
                            <td rowspan="3" class="font-12 text-center" style="background: var(--primary-bg) !important"><b class="text-white">Action</b></td>
                        </tr>
                        <tr class="bg-light-primary border">
                            <th rowspan="2" class="text-center font-12" style="background: var(--primary-bg) !important" >Design Complexity</th> 
                        
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
                    <tbody psi-sortable  ng-model="PrecastSortable">
                        <tr ng-repeat="(index,C) in PrecastEstimate.Components" class="touched-td">
                            <td class="d-flex align-items-center custom_drag_"> 
                                <a class="mdi mdi-arrow-top-left-bottom-right-bold border bg-white text-primary shadow-sm"></a>
                                <input type="text" class="history_precast_value" value="@{{ precastEstimateTypesObj[C.precast_component] }}">
                                <select class="my-select history_precast_select" get-precast-details-total="[index]" ng-model="C.precast_component" name="precast_component">
                                    <option value="">-- Select -- </option> 
                                    <option ng-value="@{{ precastEstimateType.id }}" ng-selected="precastEstimateType.id == C.precast_component.id" ng-repeat="precastEstimateType in precastEstimateTypes">@{{ precastEstimateType.name }}</option>
                                </select>
                            </td> 
                            <td style="padding: 0 !important">
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" class="my-control"  ng-model="C.complexity"  ng-value="C.complexity" name="complexity">
                            </td>
                            <td style="padding: 0 !important">
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.no_of_staircase" ng-value="C.no_of_staircase" name="no_of_staircase">
                            </td>

                            <td style="padding:0px !important"><input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0"  min="100"  ng-model="C.no_of_new_component" ng-value="C.no_of_new_component" name="no_of_new_component" class="my-control"></td>

                            <td style="padding:0px !important"><input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0"  ng-model="C.no_of_different_floor_height" ng-value="C.no_of_different_floor_height" name="no_of_different_floor_height" class="my-control"></td>

                            <td style="padding:0px !important"><input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0"  ng-model="C.sqm" ng-value="C.sqm" name="sqm" class="my-control"> </td>
                        
                            <td>
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.std_work_hours" ng-value="C.std_work_hours"  name="std_work_hours">
                            </td>
                        
                            <td>
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.additional_work_hours"  ng-value="C.additional_work_hours" name="additional_work_hours">
                            </td>
                            <td>
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.hourly_rate"  ng-value="C.hourly_rate" name="hourly_rate">
                            </td>
                            <td>
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0" class="my-control psqm_"  ng-model="C.total_work_hours" ng-value="C.total_work_hours" name="total_work_hours">
                            </td>
                            <td>
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.engineering_cost" ng-value="C.engineering_cost"  name="engineering_cost">
                            </td>
                            <td>
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.total_central_approval" ng-value="C.total_central_approval" name="total_central_approval">
                            </td>
                            <td>
                                <input  get-precast-details-total="[index]" type="number" onkeypress="return isNumber(event)" min="0" class="my-control"  ng-model="C.total_engineering_cost" ng-value="C.total_engineering_cost" name="total_engineering_cost">
                            </td>
                            <td class="text-center" style="padding: 0 !important">
                                <i ng-click="deletePrecastComponent(pRootKey, index)" class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-100"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div> 
</section>
    
</div>
@if (Route::is('enquiry.calculate-cost-estimation')) 
<div  ng-show=" PrecastComponent.length &&  precast_estimate_edit_id == false && price_calculation == 'precast_engineering_estimation'" class="d-flex">
    <div class="col-2">
        Name 
    </div>
    <div class="col">
        <input type="text" class="form-control" ng-model="precast_estimate_name" name="precast_estimate_name">
    </div>
    <div class="col text-end">
        <a class="btn btn-danger" ng-click="createNewCalculation('precast')"><i class="uil-sync"> </i>Clear</a>
        <button class="btn btn-info" ng-click="EstimateStore('precast')">Generate</button>
    </div>
    .
</div>

<div ng-show="PrecastComponent.length &&  precast_estimate_edit_id && price_calculation == 'precast_engineering_estimation'" class="d-flex">
    <div class="col-2">
        Name 
    </div>
    <div class="col">
        <input type="text" class="form-control" ng-model="precast_estimate_name" name="precast_estimate_name">
    </div>
    <div class="col text-end">
        <a class="btn btn-danger" ng-click="createNewCalculation('precast')"><i class="uil-sync"> </i>Clear</a>
        <button class="btn btn-info" ng-click="EstimateUpdate(precast_estimate_edit_id, 'precast')">Update Estimation</button>
    </div>
</div>

<div class="m-0"  ng-show="price_calculation == 'precast_engineering_estimation'">
    <h3 class="my-2">Precast Estimation List</h3>
    @include('admin.calculate-cost-estimate.precast-list')
</div>
@endif
@include('admin.calculate-cost-estimate.precast-template')