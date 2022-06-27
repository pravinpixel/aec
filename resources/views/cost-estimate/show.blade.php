@extends('layouts.cost-estimate')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content">
          
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('cost-estimate.includes.page-navigater')

                <!-- end page title -->
                  <!-- Start Content-->
                  <div id="CostEstimateController" class="container-fluid d-none" ng-controller="CostEstimateController" >
    
                    <div class="content container-fluid">
                        <div class="main"> 
                            <div class="row">
                                <div class="col-xl-12  ">
                                    <div class="row m-0">
                                     
                                        <div class="card-header pb-2 p-3 text-center border-0">
                                            <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.customer_info.contact_person }}</span></h4>
                                        </div>
                                        <div class="card-body pt-0 p-0">
                                            <table class="table custom shadow-none border m-0 table-bordered ">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>Enquiry Date</th>
                                                        <th>Person Contact</th>
                                                        <th>Type of Project</th>
                                                        <th>Enquiry Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>@{{ enquiry.enquiry.enquiry_date }}</td>
                                                        <td>@{{ enquiry.enquiry.customer.contact_person }}</td>
                                                        <td>@{{ enquiry.project_type  }}</td>
                                                        <td><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>
                                        @if(userHasAccess('cost_estimate_index'))
                                            <div class="container-fluid">
                                                <br>
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
                                                    @include('admin.enquiry.wizard.wood-estimation')
                                                </div>
                                                <div ng-show="price_calculation == 'precast_engineering_estimation'">
                                                    @include('admin.enquiry.wizard.precast-estimation')
                                                </div>
                                            </div>
                                        @endif
                                        {{-- view history start--}}
                                            <div ng-show="price_calculation == 'wood_engineering_estimation'">
                                                <a class="btn btn-link" ng-click="getHistory('wood')"> <i class="fa fa-eye"> </i> View history </a>
                                                {{-- <a class="btn btn-danger" onclick="$('#wood_id').html('')"> <i class="uil-sync"> </i> Close </a> --}}
                                                <div id="wood_id"></div>
                                            </div>
                                            <div ng-show="price_calculation == 'precast_engineering_estimation'">
                                                <a class="btn btn-info" ng-click="getHistory('precast')"> <i class="fa fa-eye"> </i> View history </a>
                                                <a class="btn btn-danger" onclick="$('#precast_id').html('')"> <i class="uil-sync"> </i> Close </a>
                                                <div id="precast_id"></div>
                                            </div>
                                        {{-- view history end--}}
                                        @if(userRole()->slug == config('global.cost_estimater'))
                                            <div class="card m-0 my-3 border col-md-9 me-auto">
                                                <div class="card-body">
                                                    <small class="btn link"  ng-click="showCommentsToggle('viewConversations', 'cost_estimation_assign', 'Cost Estimate')">
                                                        <i class="fa fa-send me-1"></i> <u>Send a Comments</u>
                                                    </small>
                                                </div>
                                            </div>
                                        @endif
                                      
                                        @include("admin.enquiry.models.cost-estimate-chat-box") 
                                    </div>
                                    <!--end card-->
                                </div> <!-- end col -->
    
                            </div> 
                        </div>
                        <!-- container --> 
                    </div> 
                    
                </div> 
            <!-- container -->
         
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')
<script>

    app.controller('CostEstimateController', function ($scope, $http, $timeout, API_URL) {
            let enquiryId =  '{{ $enquiry_id }}';
            $scope.current_user = '{{Admin()->id}}';

            $scope.getHistory = (type)  => {
                $http.get(`${API_URL}cost-estimate/get-history/${$scope.enquiry_id}/${type}`)
                    .then(function successCallback(res){
                        var costId = $(`#${type}_id`);
                        $(costId).html('');
                        res.data.length && res.data.map((item, key) => {
                            $(costId).append(`<h4> Version : ${key+1} Date : ${moment(item.created_at).format('YYYY-MM-DD')} </h4>`);
                            $(costId).append(item.history);
                            $(costId).append('<hr/>');
                        });
                    }, function errorCallback(error){
                        console.log(error);
                    });
            }

            getUsers = () => {
                $http.get(`${API_URL}admin/get-costestimate-employee`)
                .then(function successCallback(res){
                    $scope.userList = res.data;
                }, function errorCallback(error){
                    console.log(error);
                });
            }
            getUsers();

            $scope.assignUserToCostestimate = (user, cost_estimate_assign_for) => {
                let assign_to = user == '' ? null: user;
                if($scope.assign_to == '') {
                    Message('danger', "Please choose a user !");
                    return false;
                }
                $http.post(`${API_URL}cost-estimate/assign-user/${enquiryId}`, {assign_to: assign_to, type: cost_estimate_assign_for})
                    .then(function successCallback(res){
                       
                        if(res.data.status) {
                            $scope.getWizradStatus();
                            Message('success', res.data.msg);
                            return false;
                        }
                        Message('error', res.data.msg);
                    }, function errorCallback(error){
                        console.log(error);
                });
            }

            $scope.removeUser = () => {
                $scope.assign_to != '' && $http.post(`${API_URL}cost-estimate/remove-user/${enquiryId}`)
                    .then(function successCallback(res){
                        if(res.data.status) {
                            $scope.getWizradStatus();
                            $scope.assign_to = '';
                            Message('success', res.data.msg);
                            return false;
                        }
                    }, function errorCallback(error){
                        Message('danger', 'Something went wrong please contact administrator');
                    });
            }

            $scope.gotoNext = function() {
                $http.post(`${API_URL}cost-estimate/update-status/${enquiryId}`)
                .then(function successCallback(res){
                    $location.path('/proposal-sharing');
                });
            }

            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $enquiry_id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status      = res.data.progress.proposal_sharing_status;
                    $scope.customer_response            = res.data.progress.customer_response; 
                    $scope.cost_estimate                = res.data.cost_estimate;
                    $scope.ResultEngineeringEstimate    = JSON.parse(res.data.cost_estimate.build_json);
                    $scope.ResultPrecastComponent       = JSON.parse(res.data.cost_estimate.precast_build_json);
                    $scope.EngineeringEstimate          = $scope.ResultEngineeringEstimate.costEstimate;
                    $scope.PrecastComponent             = $scope.ResultPrecastComponent.precastEstimate;
                });
            }
            $scope.getWizradStatus();
          
            $scope.enquiry_id = '{{ $enquiry_id }}';
            // =========== Cost Estimate  ============
            $http.get("{{ route("CostEstimateData") }}").then(function (response) {
                $scope.cost = response.data; 
            });
            $http.get("{{ route('CostEstimateView', $enquiry_id) }}").then(function (response) {
                console.log(response.data.others);
                $scope.enquiry          =   response.data;  
                $scope.CostEstimate     =   response.data.cost_estimation; 
                $scope.assign_to        =   response.data.others.assign_to ?? '';
            });

            $scope.UpdateCostEstimate  = function(type) {  
                
                if($scope.EngineeringEstimate.length == 0){
                    Message('danger', "You Can't Update Empty Data");
                    return false;
                }
                if(type == 'wood') {
                    var data = $scope.ResultEngineeringEstimate;
                } else {
                    var data = $scope.ResultPrecastComponent;
                }
                console.log($scope.ResultPrecastComponent);
                console.log($scope.ResultEngineeringEstimate);
                let total =  $scope.ResultEngineeringEstimate.total.totalSum +  $scope.ResultPrecastComponent.total.totalSum;
                $http({
                    method: "POST",
                    url: "{{ route('enquiry-create.cost-estimate-value') }}",
                    data:{ enquiry_id: $scope.enquiry_id, data : data, type: type, total : total, history: true, html: $("#wood-cost-estimate").html()},
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $scope.getWizradStatus();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                }); 
            }

            $scope.sendAssignCostEstiComments  = function(type , chatSection) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   chatSection,
                    "created_by"      :   type,
                    "role_by"         : `Cost Estimater ${type}`
                }
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    document.getElementById("Inbox__commentsForm").reset();
                    $scope.showTechCommentsToggle('viewConversations', 'cost_estimation_assign', chatSection);
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }  

            $scope.showTechCommentsToggle = function (modalstate, type, docId) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.technical_docType_id   = docId; 
                $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                    $scope.commentsData = response.data.chatHistory; 
                    $scope.chatType     = response.data.chatType;  
                    $('#assing-viewConversations-modal').modal('show');
                });
            }

            $scope.showCommentsToggle = function (modalstate, type, header) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.chatHeader   = header; 
                switch (modalstate) {
                    case 'viewConversations':
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.commentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            $('#assing-viewConversations-modal').modal('show');
                        });
                        break;
                    default:
                        break;
                } 
            }
     // cost estimate calculation start..
            $scope.editable = false;
            $scope.wood_estimate_edit_id = false;
            $scope.precast_estimate_edit_id = false;
            $scope.wood_estimate_name = '';
            $scope.precast_estimate_name = '';
            $scope.price_calculation = 'wood_engineering_estimation';
            $scope.EngineeringEstimate = [];
            $scope.editorEnabled = false; // precast
            $http.get(`${API_URL}wood-estimate-json`).then((res) => {
                $scope.NewCostEstimate = res.data.json;
                let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            });
   
            $http.get(`${API_URL}precast-estimate`).then((res) => {
                $scope.precastEstimateTypes = res.data;
            });

            $http.get(`${API_URL}get-cost-estimate-types`).then((res) => {
                $scope.costEstimateTypes = res.data;
            });

            $scope.createNewCalculation = (type) => {
                if(type == 'wood') {
                    $scope.wood_estimate_edit_id = false;
                    $scope.wood_estimate_name = '';
                    $scope.EngineeringEstimate.length = 0;
                    let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                    $scope.EngineeringEstimate.push(newCostEstimate);
                } else {
                    $scope.precast_edit_id = false;
                    $scope.precast_estimate_name = '';
                    $scope.PrecastComponent.length = 0;
                    let newPrecastComponent = JSON.parse(JSON.stringify(precastComponent));
                    $scope.PrecastComponent.push(newPrecastComponent);
                }
            
            }
        
            $scope.addDynamicColumn = (index, columnName) => {
                $scope.editable = false;
                if(columnName == '' || typeof(columnName) == 'undefined') return false;
                $scope.EngineeringEstimate[index].ComponentsTotals.Dynamics.push({
                        "name"   : columnName,
                        "PriceM2": 0,
                        "Sum"    : 0
                });

                $scope.EngineeringEstimate[index].Components.forEach( (Component) => {
                    Component.Dynamics.push({
                        "name"   : columnName,
                        "PriceM2": 0,
                        "Sum"    : 0
                    });
                });
                $http.post(`${API_URL}wood-estimate`,{name:columnName}).then((res) => {
                    console.log(res.data);
                })
                $scope.columnName = '';
            }

            $scope.deleteDynamic = (rootIndex, dynamicIndex) => {
                $scope.EngineeringEstimate[rootIndex].ComponentsTotals.Dynamics.splice(dynamicIndex, 1);

                $scope.EngineeringEstimate[rootIndex].Components.forEach( (Component) => {
                    Component.Dynamics.splice(dynamicIndex, 1);
                });
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            }

            $scope.addEngineeringEstimate = () => {
                let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                console.log(newCostEstimate);
                $scope.EngineeringEstimate.push(newCostEstimate);
            }

            $scope.deleteEngineeringEstimate = (index) => {
                $scope.EngineeringEstimate.splice(index,1);
                Message('success', 'Engineering estimation deleted successfully');
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                if($scope.EngineeringEstimate.length == 0){
                    $scope.EngineeringEstimate.totalArea = 0;
                    $scope.EngineeringEstimate.totalSum =  0;
                    $scope.EngineeringEstimate.totalPris = 0;
                }
            }

            $scope.cloneCostEstimate = (index, CostEstimate) => {
                let cloneObject = JSON.parse(JSON.stringify(CostEstimate));
                $scope.EngineeringEstimate.splice(index, 0, cloneObject);
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            }
        
            $scope.addComponent  = function(index) {
                let newObj = JSON.parse(JSON.stringify($scope.EngineeringEstimate[index].Components[0]));
                $scope.EngineeringEstimate[index].Components.splice(0, 0, newObj);
            }

            $scope.delete   =   function(rootKey, index) { 
                $scope.EngineeringEstimate[rootKey].Components.splice(index,1);
                if($scope.EngineeringEstimate[rootKey].Components.length == 0) {
                    $scope.EngineeringEstimate.splice(rootKey,1);
                } 
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                Message('success', 'Component deleted successfully');
            }
            
            $http.get(`${API_URL}building-type`)
            .then((res)=> {
                $scope.buildingTypes = res.data;
            });

            $http.get(`${API_URL}get-for-cost-estimate`)
            .then((res)=> {
                $scope.buildingComponents = res.data;
                $("#CostEstimateController").removeClass('d-none');
            });

            $scope.getNum = (val) => {

                if (isNaN(val) || val == '') {
                    return 0;
                }
                return Number.parseFloat(val).toFixed(2);
            }

            // Precast
            $scope.PrecastComponent = [];
            let precastComponent = {
                    "type"                       : "Building Type 1",
                    "total_sqm"                  : 0,
                    "total_std_work_hours"       : 0,
                    "total_additional_work_hours": 0,
                    "total_hourly_rate"          : 0,
                    "total_work_hours"           : 0,
                    "engineering_cost"     : 0,
                    "total_central_approval"     : 0,
                    'total_engineering_cost' : 0,
                    "Components" : [    
                        {
                            'precast_component': null,
                            'no_of_staircase': '',
                            'no_of_new_component':'',
                            'no_of_different_floor_height': '',
                            'sqm'           : '',
                            'complexity'    : '', 
                            'std_work_hours': '',
                            'additional_work_hours': '',
                            'hourly_rate': '',
                            'total_work_hours': '',
                            'engineering_cost': '',
                            'total_central_approval': '',
                            'total_engineering_cost': ''
                        }
                    ]
                
            };
            $scope.PrecastComponent.push(precastComponent);
            $scope.addPrecasEstimate = () => {
                $scope.PrecastComponent.push({
                    "type"                       : "Building Type 1",
                    "total_sqm"                  : 0,
                    "total_std_work_hours"       : 0,
                    "total_additional_work_hours": 0,
                    "total_hourly_rate"          : 0,
                    "total_work_hours"           : 0,
                    "engineering_cost"     : 0,
                    "total_central_approval"     : 0,
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
                            'engineering_cost': '',
                            'total_central_approval': '',
                            'total_engineering_cost': ''
                        }
                    ]
                });

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
                            'engineering_cost': '',
                            'total_central_approval': '',
                            'total_engineering_cost':''
                        }
                );
            }

            $scope.deletePrecastComponent = (rootKey, index) => {
                $scope.PrecastComponent[rootKey].Components.splice(index,1);
                if($scope.PrecastComponent[rootKey].Components.length == 0){
                    $scope.PrecastComponent.splice(rootKey,1);
                    $timeout(function() {
                        angular.element('.psqm_').triggerHandler('keyup');
                    });
                }
                Message('success','Precast component deleted Successfully');
            }

            $scope.deletePrecastEstimate = (rootKey) => {
                $scope.PrecastComponent.splice(rootKey,1);
                Message('success','Precast estimation deleted Successfully');
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
            }

            $scope.clonePrecastEstimate = (index, precastEstimate) => {
                let cloneObject = JSON.parse(JSON.stringify(precastEstimate));
                $scope.PrecastComponent.splice(index, 0, cloneObject);
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
            }

            
            $scope.savePrecastComponent = () => {
                $http.post(`${API_URL}precast-estimate`,{name:$scope.precast_component_name, hours:  $scope.precast_component_hours})
                .then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $scope.editorEnabled = false;
                    $http.get(`${API_URL}precast-estimate`).then((res) => {
                        $scope.precastEstimateTypes = res.data;
                    });
                }, function errorCallback(response) {
                    Message('danger',response.data.errors.name[0]);
                });
            }

        }).directive('getCostDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('keyup', function () {
                        $(this).addClass('bg-warning');
                        let $TotalPriceM2   = 0
                        let $TotalSum       = 0
                        scope.CostEstimate.ComponentsTotals.Dynamics.forEach( (item, index) => {
                            scope.CostEstimate.Components[scope.index].Dynamics[index].Sum  = getNum(((scope.CostEstimate.Components[scope.index].Sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2  ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);
                            $TotalPriceM2   += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2);
                            $TotalSum       += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].Sum);
                        });

                        scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 = $TotalPriceM2;
                        scope.CostEstimate.Components[scope.index].TotalCost.Sum = $TotalSum;
                        scope.CostEstimate.Components[scope.index].TotalCost.Sum = $TotalSum;
                    // for column total
                        let $totalEstimateArea = 0;
                        let $totalEstimateSum = 0;
                        scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                            let $totalPrice = 0;
                            let $totalSum = 0;
                            let $sqmTotal = 0;
                            let $ribTotal = 0;
                           
                            Estimates.ComponentsTotals.Dynamics.forEach((dynamic) => {
                                dynamic.PriceM2 = 0;
                                dynamic.Sum = 0;
                               
                            })
                            Estimates.Components.forEach( (Component, componentIndex) => {
                                $sqmTotal += Number(Component.Sqm);
                                $totalEstimateArea += Number(Component.Sqm);
                                $ribTotal += Number(Component.Rib.Sum);
                                Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                    Estimates.ComponentsTotals.Dynamics[dynamicIndex].PriceM2 += Number(Dynamic.PriceM2);
                                    Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum += Number(Dynamic.Sum);
                                    $totalPrice += Number(Dynamic.PriceM2);
                                    $totalSum += Number(Dynamic.Sum);
                                    $totalEstimateSum += Number(Dynamic.Sum);
                                });
                            });
                            Estimates.ComponentsTotals.TotalCost.Sum     = getNum($totalSum);
                            Estimates.ComponentsTotals.TotalCost.PriceM2 = getNum($totalSum / $sqmTotal);
                            Estimates.ComponentsTotals.Sqm               = getNum($sqmTotal);
                            Estimates.ComponentsTotals.Rib.Sum           = getNum($ribTotal);

                        });
                        scope.ResultEngineeringEstimate.total.totalArea = getNum($totalEstimateArea);
                        scope.ResultEngineeringEstimate.total.totalSum = getNum($totalEstimateSum);
                        scope.ResultEngineeringEstimate.total.totalPris = getNum($totalEstimateSum /  $totalEstimateArea);
                        scope.ResultEngineeringEstimate.costEstimate =  scope.EngineeringEstimate;
                        scope.$apply();
                    });
                },
            };
        }]).directive('getPrecastDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
        return {
            restrict: 'A',
            link : function (scope, element, attrs) {
                let eventHandle = () => {
                    const precast_component = scope.precastEstimateTypes.find(precastEstimateType => scope.PrecastEstimate.Components[scope.index].precast_component == precastEstimateType.id);
                    if(scope.PrecastEstimate.Components[scope.index].no_of_staircase != 0) {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_staircase * precast_component.hours);
                    } else {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_new_component *  precast_component.hours );
                    }
                    scope.PrecastEstimate.Components[scope.index].total_work_hours = getNum(Number( scope.PrecastEstimate.Components[scope.index].std_work_hours) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours));                                                              
                    scope.PrecastEstimate.Components[scope.index].engineering_cost = getNum(
                                                                                            (Number( scope.PrecastEstimate.Components[scope.index].std_work_hours) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours)) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].hourly_rate) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].complexity)
                              
                                                                                            );
                    scope.PrecastEstimate.Components[scope.index].total_engineering_cost   = Number(scope.PrecastEstimate.Components[scope.index].engineering_cost)+ Number(scope.PrecastEstimate.Components[scope.index].total_central_approval)
                    let $total_sqm                   = 0;
                    let $total_std_work_hours        = 0;
                    let $total_additional_work_hours = 0;
                    let $total_hourly_rate           = 0;
                    let $total_work_hours            = 0;
                    let $engineering_cost      = 0;
                    let $total_central_approval      = 0;
                    let $total_engineering_cost = 0;

                    scope.PrecastEstimate.Components.forEach((row) => {
                        $total_sqm                   += Number(row.sqm);
                        $total_std_work_hours        += Number(row.std_work_hours);
                        $total_additional_work_hours += Number(row.additional_work_hours);
                        $total_hourly_rate           += Number(row.hourly_rate);
                        $total_work_hours            += Number(row.total_work_hours);
                        $engineering_cost      += Number(row.engineering_cost);
                        $total_central_approval      += Number(row.total_central_approval);
                        $total_engineering_cost     += Number(row.total_engineering_cost);
                    });

                    scope.PrecastEstimate.total_sqm                   = $total_sqm;
                    scope.PrecastEstimate.total_std_work_hours        = $total_std_work_hours;
                    scope.PrecastEstimate.total_additional_work_hours = $total_additional_work_hours;
                    scope.PrecastEstimate.total_hourly_rate           = $total_hourly_rate;
                    scope.PrecastEstimate.total_work_hours            = $total_work_hours;
                    scope.PrecastEstimate.engineering_cost      = $engineering_cost;
                    scope.PrecastEstimate.total_central_approval      = $total_central_approval;
                    scope.PrecastEstimate.total_engineering_cost     = $total_engineering_cost;
                    let $totalArea = 0;
                    let $totalPris = 0;
                    let $totalSum  = 0;

                    scope.PrecastComponent.forEach( (row) => {
                        $totalArea += row.total_sqm;
                        $totalSum  += row.total_engineering_cost;
                    });
                    scope.ResultPrecastComponent.total.totalArea = $totalArea;
                    scope.ResultPrecastComponent.total.totalSum  = $totalSum;
                    scope.ResultPrecastComponent.total.totalPris = $totalSum / $totalArea;
                    scope.ResultPrecastComponent.precastEstimate =  scope.PrecastComponent;
                    scope.$apply();
                }
                element.on('keyup', function () {
                    $(this).addClass('bg-warning');
                    eventHandle();
                });
                element.on('change', function () {
                    eventHandle();
                });
            },
        };
    }]);
</script>
@endpush