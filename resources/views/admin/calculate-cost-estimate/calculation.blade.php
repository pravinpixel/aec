     @extends('layouts.admin')

     @section('admin-content')
         <div class="content-page">
             <div class="content">
                 @include('admin.includes.top-bar')
                 <!-- Start Content-->
                 <div class="container-fluid d-none" ng-controller="Cost_Estimate" id="cost_estimate">
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
                    <div ng-show="price_calculation == 'wood_engineering_estimation'">
                        @include('admin.calculate-cost-estimate.wood-estimation')
                    </div>
                    <div ng-show="price_calculation == 'precast_engineering_estimation'">
                        @include('admin.calculate-cost-estimate.precast-estimation')
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

             .box {
                width: 100px;
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
             .dynamic_name {
               
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
