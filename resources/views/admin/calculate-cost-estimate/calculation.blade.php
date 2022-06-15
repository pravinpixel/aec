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
     @push('custom-scripts')
         <script src="{{ asset('public/custom/js/ngControllers/admin/cost-estimate-calculator.js') }}"></script>
     @endpush
