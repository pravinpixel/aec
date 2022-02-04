     
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
                            <h4 class="page-title" ng-controller="WizzardCtrl">
                                    @{{ enquiry_number }} - @{{   project_info.project_name }}
                                    {{-- EQ/2022/0001 - Project Name --}}
                            </h4>
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
        app.directive('getTotalComponents',   ['$http' ,function ($http, $scope) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('mouseover', function () {
                        var index       = scope.index;
                     
                        let bcd = scope.building_building[index].building_component_number.map((item,i) => {
                            return item.sqfeet;
                        });
                        
                        let result = bcd.reduce((previousValue, currentValue) => previousValue + currentValue);

                        scope.building_building[index].total_component_area = result; 
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
                controller : "Tech_Estimate"
            })
            .when("/cost-estimation", {
                templateUrl : "{{ route('enquiry.cost-estimation') }}",
                controller : "Cost_Estimate"
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
            $scope.showCommentsToggle = function (modalstate, type, header) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.chatHeader   = header; 
                switch (modalstate) {
                    case 'viewConversations':
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.commentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            $('#viewConversations-modal').modal('show');
                        });
                        break;
                    default:
                        break;
                } 
            }
            $scope.GetCommentsData();

             
            $scope.sendInboxComments  = function(type) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   $scope.chatType,
                    "created_by"      :   type,
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
                    document.getElementById("Inbox__commentsForm").reset();
                    $scope.showCommentsToggle('viewConversations', $scope.chatType);
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }
            
            $scope.sendComments  = function(type, created_by) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope[`${type}__comments`],
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   type,
                    "created_by"      :   created_by,
                }
              
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    document.getElementById(`${type}__commentsForm`).reset();
                    // $scope.GetCommentsData();
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }
        });
        app.controller('Tech_Estimate', function ($scope, $http, API_URL) {
            
            $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                $scope.enquiry             = response.data; 
                $scope.enquiry_id             = response.data.enquiry_id; 
                $scope.building_building   = response.data.building_component;
                
                $scope.Add_building = function() {
                    $scope.building_building.push(
                        {
                            "building_number": 1, 
                            "building_component_number": [
                                {
                                    "name": '',
                                    "sqfeet": 0
                                } 
                            ] ,
                            "total_component_area" : 0
                        }
                    )
                }
                
                $scope.Add_component = function(index) {
                    $scope.building_building[index].building_component_number.push(
                        {
                            "name": '',
                            "sqfeet": 0
                        }
                    )
                }
                $scope.Delete_building   =   function(index) {
                    $scope.building_building.splice(index,1);
                }  
                $scope.Delete_component   =   function(index, secindex) {
                    $scope.building_building[index].building_component_number.splice(secindex,1);
                }  
            });
           
            $scope.updateTechnicalEstimate  = function() {
                $http({
                    method: "POST",
                    url: API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} , 
                    data:{ data : $scope.building_building},
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            
            //  =====================
                $scope.GetCommentsData = function() {
                    $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                        $scope.enquiry_number       = res.data.enquiry_number;
                        $scope.enquiry_comments     = res.data.enquiry_comments;
                        $scope.enquiry_id           = res.data.enquiry_id;
                    });
                }
                $scope.showTechCommentsToggle = function (modalstate, type, docId) {
                    $scope.modalstate = modalstate;
                    $scope.module = null;
                    $scope.technical_docType_id   = docId; 
                    switch (modalstate) {
                        case 'viewConversations':
                            $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                                $scope.commentsData = response.data.chatHistory; 
                                $scope.chatType     = response.data.chatType;  
                                $('#viewConversations-modal').modal('show');
                            });
                            break;
                        case 'viewTechicalDocsConversations' : 
                                $http.get(API_URL + 'admin/show-tech-comments/'+$scope.enquiry_id+'/type/'+$scope.technical_docType_id ).then(function (response) {
                                    $scope.TechcommentsData = response.data.chatHistory; 
                                    $scope.chatType     = response.data.chatType;  
                                    $('#tech-viewConversations-modal').modal('show');
                                });

                            break; 
                        default:
                            break;
                    } 
                }
                $scope.GetCommentsData();
                
                $scope.sendTechInboxComments  = function(type , chatSection) { 
                    $scope.sendCommentsData = {
                        "comments"        :   $scope.inlineComments,
                        "enquiry_id"      :   $scope.enquiry_id,
                        "file_id"         :   $scope.technical_docType_id,
                        "type"            :   chatSection,
                        "created_by"      :   type,
                        "role_by"         : "Techical Estimater"
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
                        document.getElementById("Inbox__commentsForm").reset();
                        $scope.showTechCommentsToggle('viewTechicalDocsConversations', 'techical_estimation', $scope.technical_docType_id);
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors);
                    });
                }  
                $scope.sendInboxComments  = function(type) { 
                    $scope.sendCommentsData = {
                        "comments"        :   $scope.inlineComments,
                        "enquiry_id"      :   $scope.enquiry_id,
                        "type"            :   $scope.chatType,
                        "created_by"      :   type,
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
                        document.getElementById("Inbox__commentsForm").reset();
                        $scope.showCommentsToggle('viewConversations', $scope.chatType);
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors);
                    });
                }

                $scope.sendComments  = function(type, created_by) { 
                    $scope.sendCommentsData = {
                        "comments"        :   $scope[`${type}__comments`],
                        "enquiry_id"      :   $scope.enquiry_id,
                        "type"            :   type,
                        "created_by"      :   created_by,
                    } 
                    $http({
                        method: "POST",
                        url:  "{{ route('enquiry.comments') }}" ,
                        data: $.param($scope.sendCommentsData),
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded' 
                        }
                    }).then(function successCallback(response) {
                        document.getElementById(`${type}__commentsForm`).reset();
                        // $scope.GetCommentsData();
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors);
                    });
                }
        }); 
        app.controller('Cost_Estimate', function ($scope, $http, API_URL, $apply) {

            $http.get("{{ route('CostEstimateView', $data->id) }}").then(function (response) {
                $scope.enquiry  = response.data;  
                
                $scope.CostEstimate  = response.data.cost_estimation;  
            });
            // $scope.CostEstimate  = {
            //     "Components" : [ 
            //         {
            //             "Component"     : "",
            //             "Type"          : "", 
            //             "sqm"           : "",
            //             "complexity"    : "", 
            //             "Details": {
            //                 "PriceM2"   : "",
            //                 "Sum"       :  ""
            //             },
            //             "Statistics": {
            //                 "PriceM2"   : "", 
            //                 "Sum"       : "", 
            //             },
            //             "CadCam": {
            //                 "PriceM2"   : "",
            //                 "Sum"       : "", 
            //             } ,
            //             "Logistics": {
            //                 "PriceM2"   : "", 
            //                 "Sum"       : "",
            //             } ,
            //             "TotalCost": {
            //                 "PriceM2"   : "", 
            //                 "Sum"       : "", 
            //             }
            //         },
            //     ],
            //     "ComponentsTotals" :{
            //         "sqm"           : 0,
            //         "complexity"    : 0, 
            //         "Details": {
            //             "PriceM2"   : 0,
            //             "Sum"       :  0
            //         },
            //         "Statistics": {
            //             "PriceM2"   : 0, 
            //             "Sum"       : 0, 
            //         },
            //         "CadCam": {
            //             "PriceM2"   : 0,
            //             "Sum"       : 0, 
            //         } ,
            //         "Logistics": {
            //             "PriceM2"   : 0, 
            //             "Sum"       : 0,
            //         } ,
            //         "TotalCost": {
            //             "PriceM2"   : 0, 
            //             "Sum"       : 0, 
            //         },
            //         "grandTotal"    : 0, 
            //     },
            //     "enquiry_id" : '{{ $data->id ?? " " }}'
            // };  
            $scope.create  = function() {
                $scope.CostEstimate.Components.unshift({
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
                    "CadCam": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    } ,
                    "Logistics": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    } ,
                    "TotalCost": {
                        "PriceM2"   : "", 
                        "Sum"       : "", 
                    }
                }); 
                 
            }
            $scope.delete   =   function(index) {
                $scope.$apply();
                if(index == 0) {
                    return false
                }
                $scope.CostEstimate.Components.splice(index,1);
            }
            
            // =========== Cost Estimate  ============
            $http.get("{{ route("CostEstimateData") }}").then(function (response) {
                $scope.cost = response.data; 
            }); 
            
            $scope.UpdateCostEstimate  = function() {  
                $http({
                    method: "POST",
                    url: "{{ route('enquiry-create.cost-estimate-value') }}",
                    data:{ data : $scope.CostEstimate},
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                }); 
            }

        });
        app.directive('getCostEstimateData',   ['$http' ,function ($http, $scope) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('change', function () {  

                        $http({
                            method: 'GET',
                            url: '{{ route("CostEstimateMasterValue") }}',
                            params : {component_id: scope.c.building_component_name, type_id: scope.t.type_name}
                            
                            }).then(function success(response) {
                                scope.masterData = response.data; 
                                
                                scope.CostEstimate.Components[scope.index].sqm                  =   response.data.sqm; 
                                scope.CostEstimate[scope.index].complexity                      =   response.data.complexity; 

                                scope.CostEstimate.Components[scope.index].Details.PriceM2      =   response.data.detail_price;  
                                scope.CostEstimate.Components[scope.index].Details.Sum          =   response.data.sqm * response.data.complexity * response.data.detail_price;

                                scope.CostEstimate.Components[scope.index].Statistics.PriceM2  =   response.data.statistic_price;  
                                scope.CostEstimate.Components[scope.index].Statistics.Sum      =   response.data.sqm * response.data.complexity * response.data.statistic_price;

                                scope.CostEstimate.Components[scope.index].CadCam.PriceM2      =   response.data.cad_cam_price;  
                                scope.CostEstimate.Components[scope.index].CadCam.Sum          =   response.data.sqm * response.data.complexity * response.data.cad_cam_price;

                                scope.CostEstimate.Components[scope.index].Logistics.PriceM2   =   response.data.logistic_price;  
                                scope.CostEstimate.Components[scope.index].Logistics.Sum       =   response.data.sqm * response.data.complexity * response.data.logistic_price;

                                scope.CostEstimate.Components[scope.index].TotalCost.PriceM2   =    parseInt(response.data.detail_price)    + 
                                                                                                    parseInt(response.data.statistic_price) + 
                                                                                                    parseInt(response.data.cad_cam_price)   + 
                                                                                                    parseInt(response.data.logistic_price)
                                
                                scope.CostEstimate.Components[scope.index].TotalCost.Sum       =   parseInt(response.data.detail_price)    + 
                                                                                                    parseInt(response.data.statistic_price) + 
                                                                                                    parseInt(response.data.cad_cam_price)   + 
                                                                                                    parseInt(response.data.logistic_price) 
  
                                    
                            }, function error(response) { 
                                console.log("Code Eror")
                        });
                      
                       
                    });
                },
            };
        }]);
        app.directive('getCostDetailsTotal',   ['$http' ,function ($http, $scope) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('click', function () {
                        
                        scope.CostEstimate.Components[scope.index].Details.Sum          =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].complexity * scope.CostEstimate.Components[scope.index].Details.PriceM2 
                        scope.CostEstimate.Components[scope.index].Statistics.Sum       =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].complexity * scope.CostEstimate.Components[scope.index].Statistics.PriceM2 
                        scope.CostEstimate.Components[scope.index].Logistics.Sum        =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].complexity * scope.CostEstimate.Components[scope.index].Logistics.PriceM2 
                        scope.CostEstimate.Components[scope.index].CadCam.Sum           =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].complexity * scope.CostEstimate.Components[scope.index].CadCam.PriceM2 

                        scope.CostEstimate.Components[scope.index].TotalCost.PriceM2    =   parseInt(scope.CostEstimate.Components[scope.index].Details.PriceM2)     + 
                                                                                            parseInt(scope.CostEstimate.Components[scope.index].Statistics.PriceM2)  + 
                                                                                            parseInt(scope.CostEstimate.Components[scope.index].CadCam.PriceM2)      + 
                                                                                            parseInt(scope.CostEstimate.Components[scope.index].Logistics.PriceM2) 

                        scope.CostEstimate.Components[scope.index].TotalCost.Sum        =   parseInt(scope.CostEstimate.Components[scope.index].Details.Sum)     + 
                                                                                            parseInt(scope.CostEstimate.Components[scope.index].Statistics.Sum)  + 
                                                                                            parseInt(scope.CostEstimate.Components[scope.index].CadCam.Sum)      + 
                                                                                            parseInt(scope.CostEstimate.Components[scope.index].Logistics.Sum) 
                        let $sqmTotal           =   0;
                        let $complexity         =   0;
                        let $DetailsPriceM2     =   0;
                        let $DetailsSum         =   0;
                        let $StatisticsPriceM2  =   0;
                        let $StatisticsSum      =   0;
                        let $CadCamPriceM2      =   0;
                        let $CadCamSum          =   0;
                        let $LogisticsPriceM2   =   0;
                        let $LogisticsSum       =   0;
                        let $TotalCostPriceM2   =   0;
                        let $TotalCostSum       =   0;

                        scope.CostEstimate.Components.map( (item, index) => {
                            $sqmTotal           +=  parseFloat(item.sqm); 
                            $complexity         +=  parseFloat(item.complexity); 
                            $DetailsPriceM2     +=  parseFloat(item.Details.PriceM2); 
                            $DetailsSum         +=  parseFloat(item.Details.Sum);
                            $StatisticsPriceM2  +=  parseFloat(item.Statistics.PriceM2);
                            $StatisticsSum      +=  parseFloat(item.Statistics.Sum);
                            $CadCamPriceM2      +=  parseFloat(item.CadCam.PriceM2);
                            $CadCamSum          +=  parseFloat(item.CadCam.Sum);
                            $LogisticsPriceM2   +=  parseFloat(item.Logistics.PriceM2);
                            $LogisticsSum       +=  parseFloat(item.Logistics.Sum);
                            $TotalCostPriceM2   +=  parseFloat(item.TotalCost.PriceM2);
                            $TotalCostSum       +=  parseFloat(item.TotalCost.Sum);
                        });

                        scope.CostEstimate.ComponentsTotals.sqm                 = $sqmTotal;
                        scope.CostEstimate.ComponentsTotals.complexity          = $complexity;
                        scope.CostEstimate.ComponentsTotals.Details.PriceM2     = $DetailsPriceM2;
                        scope.CostEstimate.ComponentsTotals.Details.Sum         = $DetailsSum;
                        scope.CostEstimate.ComponentsTotals.Statistics.PriceM2  = $StatisticsPriceM2;
                        scope.CostEstimate.ComponentsTotals.Statistics.Sum      = $StatisticsSum;
                        scope.CostEstimate.ComponentsTotals.CadCam.PriceM2      = $CadCamPriceM2;
                        scope.CostEstimate.ComponentsTotals.CadCam.Sum          = $CadCamSum;
                        scope.CostEstimate.ComponentsTotals.Logistics.PriceM2   = $LogisticsPriceM2;
                        scope.CostEstimate.ComponentsTotals.Logistics.Sum       = $LogisticsSum;
                        scope.CostEstimate.ComponentsTotals.TotalCost.PriceM2   = $TotalCostPriceM2;
                        scope.CostEstimate.ComponentsTotals.TotalCost.Sum       = $TotalCostSum;

                        scope.CostEstimate.ComponentsTotals.grandTotal       =  $sqmTotal +
                                                                                $complexity +
                                                                                $DetailsPriceM2 +
                                                                                $DetailsSum +
                                                                                $StatisticsPriceM2 +
                                                                                $StatisticsSum +
                                                                                $CadCamPriceM2 +
                                                                                $CadCamSum +
                                                                                $LogisticsPriceM2 +
                                                                                $LogisticsSum +
                                                                                $TotalCostPriceM2 +
                                                                                $TotalCostSum ;
                    });
                },
            };
        }]);
    </script>  
@endpush