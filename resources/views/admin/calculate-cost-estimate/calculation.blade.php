     @extends('layouts.admin')

     @section('admin-content')
         <div class="content-page">
             <div class="content">
                 @include('admin.includes.top-bar')
                 <!-- Start Content-->
                 <div class="container-fluid" ng-controller="Cost_Estimate">
                    @{{ EngineeringEstimate }}
                     <form class="card shadow-none p-0">
                         <h3 class="my-2">Price Calculation</h3>
                         <div class="row m-0">
                             <div class="col">
                                 <label>
                                     <input type="radio" ng-model="price_calculation" name="price_calculation"
                                         ng-value="'wood_engineering_estimation'">
                                     Wood Engineering Estimation
                                 </label>
                             </div>
                             <div class="col">
                                 <label>
                                     <input type="radio" ng-model="price_calculation" name="price_calculation"
                                         ng-value="'precast_engineering_estimation'">
                                     Precast Engineering Estimation
                                 </label>
                             </div>

                         </div>

                         <div class="card-body pt-0 p-0">
                             <div class="row m-0 mt-3">
                                 <div ng-show="price_calculation == 'wood_engineering_estimation'">
                                     <div class="table custom-responsive p-0">
                                         <h5> Wood Engineering Estimation </h5>
                                         <button class="btn btn-info btn-sm" ng-click="addEngineeringEstimate()">Add new building</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                     <div class="card">
                        <div class="custom-div-table my-2" ng-repeat="(firstIndex,CostEstimate) in EngineeringEstimate track by $index">
                            <div class="bg-primary text-white">
                                <div class="m-0">
                                    <h6 class="text-center m-0 py-2">Building Type</h6>
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
                                        <input type="text" get-cost-estimate-data  ng-model="CostEstimate.Sum"
                                            class="form-control rounded-0 text-center form-control-sm">
                                    </div>
                                
                                    <div class="col bg-primary2 custom-td text-center p-0" ng-repeat="(dynamicIndex, Dynamic) in CostEstimate.ComponentsTotals.Dynamics">
                                        <span>@{{ Dynamic.name  }}  <i class="fa fa-trash text-danger" ng-click="deleteDynamic(firstIndex,dynamicIndex)"> </i></span>
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
                                                <input type="text" name="Dynamic.PriceM2" ng-model="Dynamic.PriceM2"
                                                    class="form-control  rounded-0 text-center form-control-sm">
                                            </div>
                                            <div class="col p-0">
                                                <input type="text" name="Dynamic.Sum" ng-model="Dynamic.Sum"
                                                    class="form-control  rounded-0 text-center form-control-sm">
                                            </div>
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
                                                <input type="text" name="CostEstimate.ComponentsTotals.TotalCost.PriceM2" ng-model="CostEstimate.ComponentsTotals.TotalCost.PriceM2"
                                                    class="form-control  rounded-0 text-center form-control-sm">
                                            </div>
                                            <div class="col p-0">
                                                <input type="text" name="CostEstimate.ComponentsTotals.TotalCost.Sum" ng-model="CostEstimate.ComponentsTotals.TotalCost.Sum"
                                                    class="form-control  rounded-0 text-center form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col custom-td text-center"> Action </div>
                                </div>
                                {{-- input data --}}
                                <div class="custom-row" ng-repeat="(index, C) in CostEstimate.Components">
                                    <div class="col custom-td"> <input type="text" ng-model="C.building_component_id" name="C.building_component_id" get-cost-details-total="[index]"
                                            class="form-control  rounded-0 text-center form-control-sm" >
                                    </div>
                                    <div class="col custom-td"> <input type="text"  ng-model="C.type_id" name="C.type_id"  get-cost-details-total="[index]"
                                            class="form-control  rounded-0 text-center form-control-sm">
                                    </div>
                                    <div class="col custom-td"> <input type="text" name="C.DesignScope"  get-cost-details-total="[index]" ng-model="C.DesignScope"
                                            class="form-control  rounded-0 text-center form-control-sm">
                                    </div>
                                    <div class="col custom-td"> <input type="text" name="Complexity" get-cost-details-total="[index]" ng-model="C.Complexity"
                                            class="form-control  rounded-0 text-center form-control-sm">
                                    </div>
                                    <div class="col custom-td"> <input type="text" name="sqm" get-cost-details-total="[index]" ng-model="C.sqm"
                                            class="form-control  rounded-0 text-center form-control-sm">
                                    </div>
                                    <div class="col custom-td" ng-repeat="(thirdIndex, D) in C.Dynamics">
                                        <div class="custom-row  text-center p-0">
                                            <div class="col p-0">
                                                <input type="text" get-cost-details-total="[index]" name="D.PriceM2" ng-model="D.PriceM2"
                                                class="form-control  rounded-0 text-center form-control-sm">
                                            </div>
                                            <div class="col p-0">
                                                <input type="text" ng-model="D.Sum" name="D.Sum"
                                                    class="form-control  rounded-0 text-center form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col custom-td">
                                        <div class="custom-row  text-center p-0">
                                            <div class="col p-0">
                                                <input type="text" name="C.TotalCost.PriceM2" ng-model="C.TotalCost.PriceM2"
                                                    class="form-control  rounded-0 text-center form-control-sm">
                                            </div>
                                            <div class="col p-0">
                                                <input type="text" name="C.TotalCost.Sum" ng-model="C.TotalCost.Sum"
                                                    class="form-control  rounded-0 text-center form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col p-0 text-center" ng-click="delete(firstIndex,secondIndex)">
                                        <i class="fa fa-trash btn btn-light btn-sm border text-danger h-100 w-10"> </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
         </div>
     @endsection
     @push('custom-styles')
         <style>
             .custom-div-table div {
                 box-shadow: 0 0 2px black !important;
             }

             .m_two_cross_column {
                 display: flex;
                 flex-direction: column;
                 justify-content: space-between;
                 padding: 0;
                 text-align: center;
             }

             .m_two_cross_column span {
                 margin-top: 10px;
             }

             .custom_td {
                 width: 200px !important;
                 max-width: 200px !important;
                 min-width: 200px !important;
                 padding: 0 !important;
                 margin: 0 !important;
             }

             .custom-row {
                 margin: 0 !important;
                 display: flex !important;
             }

         </style>
     @endpush
     @push('custom-scripts')
         <script src="{{ asset('public/custom/js/ngControllers/admin/cost-estimate-calculator.js') }}"></script>
     @endpush
