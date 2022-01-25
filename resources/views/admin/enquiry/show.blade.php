     
@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        
        <div class="content"> 
            @include('admin.includes.top-bar') 
            <!-- Start Content-->
            <div class="container-fluid"> 
                <!-- start page title --> 
                <div class="row ">
                    <div class="col-12">
                        <div class="page-title-box mt-3">
                            <div class="page-title-right mt-0">
                                <ol class="breadcrumb align-items-center m-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route("admin-dashboard") }}"><i class="fa fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Enquiries detail
                                    </li>
                                    @if (Route::is('view-enquiry')) 
                                        <li class="breadcrumb-item">
                                            <a href="">Overview</a>
                                        </li>
                                    @endif
                                    <li class="breadcrumb- ms-2">
                                        <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i> 
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title"><div ng-controller="WizzardCtrl">@{{ enquiry_number }} : @{{   project_info.project_name }}</div></h4>
                        </div>
                    </div>
                </div> 
                <div class="card border">
                    <div class="card-body py-0"> 
                        <div id="rootwizard">
                            <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
                                <li class="time-bar"></li>
                                <li class="nav-item Project_Info">
                                    <a href="#!/project-summary" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle bg-secondary">
                                                <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Project summary</p>
                                    </a>
                                </li>
                                <li class="nav-item  admin-Technical_Estimate-wiz">
                                    <a href="#!/technical-estimation" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle bg-secondary">
                                                <img src="{{ asset("public/assets/icons/technical-support.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Technical Estimate</p>
                                    </a>
                                </li>
                                <li class="nav-item admin-Cost_Estimate-wiz">
                                    <a href="#!/cost-estimation" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-secondary">
                                                <img src="{{ asset("public/assets/icons/budget.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Cost Estimate</p>
                                    </a>
                                </li>
                                <li class="nav-item admin-Project_Schedule-wiz">
                                    <a href="#!/project-schedule" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-secondary">
                                                <img src="{{ asset("public/assets/icons/timetable.png") }}" class="w-50 invert">
                                            </div>                                                                        
                                        </div>
                                        <p class="h5 mt-2">Project Schedule</p>
                                    </a>
                                </li>
                                <li class="nav-item admin-Proposal_Sharing-wiz">
                                    <a href="#!/proposal-sharing" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-secondary">
                                                <img src="{{ asset("public/assets/icons/share.png") }}" class="w-50 invert">
                                            </div>                                                                        
                                        </div>
                                        <p class="h5 mt-2">Proposal Sharing</p>
                                    </a>
                                </li>
                                <li class="nav-item admin-Project_Award-wiz" >
                                    <a href="#!/response-status"  style="min-height: 40px;"  class="timeline-step">
                                        <div class="timeline-content ">
                                            <div class="inner-circle  bg-secondary">
                                                <img src="{{ asset("public/assets/icons/result.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5  mt-2">Response status</p>
                                    </a>
                                </li>
                                <li class="nav-item admin-Delivery-wiz">
                                    <a href="#!/move-to-project" style="min-height: 40px;"  class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-secondary">
                                                <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5  mts-2">Move to project</p>
                                    </a>
                                </li>
                            </ul>
                            <!-- Wizz Contents -->
                            <div class="tab-content">
                                <div ng-view></div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-body -->
                </div>   
            </div> <!-- container --> 
        </div> <!-- content --> 
    </div> 
    
@endsection 

@push('custom-scripts') 
    <script src="{{ asset("public/custom/js/ngControllers/admin/enquiryWizzard.js") }}"></script>
    <script>
        app.directive('getCostEstimateData',   ['$http' ,function ($http, $scope) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('change', function () {
                         console.log(scope.index);
                        if(scope.t.type_name == 'undefined' || scope.c.building_component_name == 'undefined') {
                            return false;
                        }
                        $http({
                            method: 'GET',
                            url: '{{ route("CostEstimateMasterValue") }}',
                            params : {component_id: scope.c.building_component_name, type_id: scope.t.type_name}
                            }).then(function success(response) {
                                scope.masterData = response.data; 
                                console.log(scope.CostEstimate);

                                scope.CostEstimate[scope.index].sqm = response.data.sqm;

                                console.log(scope.CostEstimate);
                            }, function error(response) { 
                        });
                        
                    });
                },
            };
        }]);        
        app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('enquiry.project-summary') }}",
                controller : "WizzardCtrl"
            })
            .when("/project-summary", {
                templateUrl : "{{ route('enquiry.project-summary') }}"
            })
            .when("/technical-estimation", {
                templateUrl : "{{ route('enquiry.technical-estimation') }}",
                controller : "Cost_Estimate"
            })
            .when("/cost-estimation", {
                templateUrl : "{{ route('enquiry.cost-estimation') }}",
                controller : "Cost_Estimate"
            })
            .when("/project-schedule", {
                templateUrl : "{{ route('enquiry.project-schedule') }}"
            })
            .when("/proposal-sharing", {
                templateUrl : "{{ route('enquiry.proposal-sharing') }}"
            })
            .when("/response-status", {
                templateUrl : "{{ route('enquiry.response-status') }}"
            })
            .when("/move-to-project", {
                templateUrl : "{{ route('enquiry.move-to-project') }}"
            })
        }); 
        app.controller('WizzardCtrl', function ($scope, $http, API_URL) {
            // enquiry.show-comments
            $scope.GetCommentsData = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.enquiry_number       = res.data.enquiry_number;
                    $scope.enquiry_comments     = res.data.enquiry_comments;
                    $scope.enquiry_id           = res.data.enquiry_id;
                    $scope.customer_info        = res.data.customer_info;
                    $scope.project_info         = res.data.project_info;
                    $scope.services             = res.data.services;
                    $scope.ifc_model_uploads    = res.data.ifc_model_uploads;
                    $scope.building_components  = res.data.building_component;
                    $scope.additional_infos     = res.data.additional_infos;
                });
            }
            $scope.toggle = function (modalstate, id) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                switch (modalstate) {
                    case 'viewConversations':
                        $scope.form_title = "Edit an Update";
                        $scope.form_color = "success";
                        $scope.id = id;
                        

                        $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + id )

                            .then(function (response) {
                                $scope.enqData = response.data;
                                $('#right-modal').modal('show');
                            });
                        break;
                    default:
                        break;
                } 
                
            }
            $scope.GetCommentsData();

            $scope.sendComments  = function(type, created_by) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.comments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   type,
                    "created_by"      :   created_by,
                }
                console.log($scope.sendCommentsData);
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    $scope.GetCommentsData();
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            } 
        });
        app.controller('Cost_Estimate', function ($scope, $http, API_URL) {
            
            $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                $scope.enquiry             = response.data; 
                $scope.building_component  = response.data.building_component; 

                $scope.sum = function(list) {
                    var Bigtotal=0;
                    angular.forEach(list , function(item){

                        Bigtotal+= Number(item.total_wall_area);
                    });
                    return Bigtotal;
                }

                $scope.Add_Wall = function() {
                    $scope.building_component.push(
                        {
                            "building_component": {
                            "building_component_name"   : "type", 
                            },
                            "total_wall_area" : 0
                        }
                    )
                }
                $scope.Delete_Wall   =   function(index) {
                    $scope.building_component.splice(index,1);
                }  
            }); 
            $scope.technicalestimate  = function() {
                $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                    $scope.building_component  = response.data.building_component;  
                });
            } 
            $scope.updateTechnicalEstimate  = function() {
               
                $http({
                    method: "POST",
                    url: API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ,
                    // data : $scope.building_component,
                    data: $.param({ data : $scope.building_component}),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    
                    Message('success',response.data.msg);
                    $scope.technicalestimate(); 
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            } 
            $scope.total = 0;
            $scope.CostEstimate  = [
                {
                    "Component"     : "",
                    "Type"          : "", 
                    "sqm"           : "",
                    "Complexity"    : "", 
                    "Details": {
                        "PriceM2"   : "1", 
                        "Sum"       : ""
                    },
                    "Statistics": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    },
                    "CadCam	": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    } ,
                    "Logistics": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    } ,
                    "TotalCost": {
                        "PriceM2"   : "", 
                        "Sum"       : "10", 
                    } 
                } 
            ]; 
            $scope.create  = function() {
                $scope.CostEstimate.unshift({
                    "Component"     : "",
                    "Type"          : "", 
                    "sqm"           : "", 
                    "Complexity"    : "", 
                    "Details": {
                        "PriceM2"   : "", 
                        "Sum"       : ""
                    },
                    "Statistics": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    },
                    "CadCam	": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    } ,
                    "Logistics": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    } ,
                    "TotalCost": {
                        "PriceM2"   : "", 
                        "Sum"       : "1", 
                    } 
                });
                // $scope.total = 0;
                $scope.getTotal();
            }
            $scope.delete   =   function(index) {
                $scope.CostEstimate.splice(index,1);
            }
            $scope.getTotal = function(){
                $scope.total = 0;
                for(var i = 0; i < $scope.CostEstimate.length; i++){
                    $scope.total +=  parseInt($scope.CostEstimate[i].TotalCost.Sum);
                }
                return $scope.total;
            }
             
            $scope.call = function() {
                $scope.getTotal();

                alert("Working !");
            }
            // =========== Cost Estimate  ============
            $http.get("{{ route("CostEstimateData") }}").then(function (response) {
                $scope.cost = response.data; 
            });

            $scope.squarMeeter = function(list) {
                var Bigtotal=0;
                angular.forEach(list , function(item){
                    Bigtotal+= Number(item.sqm);
                });
                return Bigtotal;
            }
         
            $scope.totalAmount = function(){
                var total = 0;
                for(count=0;count<$scope.CostEstimate.length;count++){
                    total += Number($scope.CostEstimate[count].sqm);
                }
                return total;
            };
        }); 
    </script> 
@endpush