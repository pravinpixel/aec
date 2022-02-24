     
@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        
        <div class="content"> 
            @include('admin.includes.top-bar') 
            <!-- Start Content-->
            <div class="container-fluid"  ng-controller="WizzardCtrl"> 
                
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
                            <h4 class="page-title">
                                @{{ enquiry_number }} - @{{ project_info.project_name }}
                                {{-- EQ/2022/0001 - Project Name --}}
                            </h4>
                        </div>
                    </div>
                </div> 
                <div class="card border">
                    <div class="card-body py-0"> 
                        <div id="rootwizard">
                            {{-- <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
                                <li class="time-bar"></li>
                                <li class="nav-item Project_Info">
                                    <a href="#/project-summary" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle @{{ project_summary_status == 'Active' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Project summary</p>
                                    </a>
                                </li>
                                <li class="nav-item  admin-Technical_Estimate-wiz">
                                    <a href="#/technical-estimation" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle @{{ technical_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/technical-support.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Technical Estimate</p>
                                    </a>
                                </li>
                                <li class="nav-item admin-Cost_Estimate-wiz"  style="pointer-events: @{{ technical_estimation_status ==  0 ? 'none' :'unset' }}">
                                    <a href="#/cost-estimation" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  @{{ cost_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/budget.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Cost Estimate</p>
                                    </a>
                                </li> 
                                <li class="nav-item admin-Proposal_Sharing-wiz" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
                                    <a href="#/proposal-sharing" style="min-height: 40px;"  class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle @{{ proposal_sharing_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/share.png") }}" ng-click="getDocumentaryFun();" class="w-50 invert">
                                            </div>                                                                        
                                        </div>
                                        <p class="h5 mt-2">Proposal Sharing</p>
                                    </a>
                                </li> 
                                <li class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
                                    <a href="#/move-to-project" style="min-height: 40px;"  class="timeline-step" >
                                        <div class="timeline-content">
                                            <div class="inner-circle @{{ customer_response == '1' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5  mts-2">Customer Response</p>
                                    </a>
                                </li>
                            </ul> --}}
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
        app.directive('getTotalComponents',   ['$http' ,function ($http, $scope,$apply) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('keyup', function () {
                        var index   = scope.index;
                        let bcd = scope.building_building[index].building_component_number.map((item,i) => {
                            return item.sqfeet;
                        }); 
                        let result =  bcd.reduce(function(previousValue, currentValue){
                            if(typeof(previousValue) == 'undefined') {
                                previousValue = 0;
                            }
                            if(typeof(currentValue) == 'undefined') {
                                currentValue = 0;
                            }
                            return previousValue + currentValue
                        }, 0);
                        scope.building_building[index].total_component_area = result; 
                        scope.$apply();
                    });
                },
            };
        }]);
        app.directive('getTotalComponentsDelete',   ['$http' ,function ($http, $scope,$apply) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('click', function () {
                        var index       = scope.index;
                        var secindex    = scope.secindex;
                        scope.building_building[index].building_component_number.splice(secindex,1);

                        let bcd = scope.building_building[index].building_component_number.map((item,i) => {
                            return item.sqfeet;
                        }); 
                        let result =  bcd.reduce(function(previousValue, currentValue){
                            if(typeof(previousValue) == 'undefined') {
                                previousValue = 0;
                            }
                            if(typeof(currentValue) == 'undefined') {
                                currentValue = 0;
                            }
                            return previousValue + currentValue
                        }, 0);
                        scope.building_building[index].total_component_area = result; 
                        scope.$apply();
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
                templateUrl : "{{ route('enquiry.proposal-sharing') }}",
                controller : "Proposal_Sharing"
            })
            .when("/response-status", {
                templateUrl : "{{ route('enquiry.response-status') }}"
            })
            .when("/move-to-project", {
                templateUrl : "{{ route('enquiry.move-to-project') }}",
                controller : "Customer_response"
            })
            .otherwise({
                redirectTo: '{{ route('enquiry.project-summary') }}'
            });
        });  
        app.controller('WizzardCtrl', function ($scope, $http, API_URL,$rootScope) {
            $scope.enquiry_id = '{{ $id }}';
            getEnquiryCommentsCountById = (id) => {
                $http({
                    method: "get",
                    url:  API_URL + 'admin/comments-count/'+id ,
                }).then(function successCallback(response) {
                    $scope.enquiry_comments     = response.data;
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            getEnquiryActiveCommentsCountById = (id) => {
                $http({
                    method: "get",
                    url:  API_URL + 'admin/active-comments-count/'+id ,
                }).then(function successCallback(response) {
                    $scope.enquiry_active_comments     = response.data;
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }
    
            $scope.GetCommentsData = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status       = res.data.progress.proposal_sharing_status;
                    $scope.customer_response       = res.data.progress.customer_response;
                    $scope.enquiry_comments     = res.data.enquiry_comments;
                    $scope.enquiry_active_comments = res.data.enquiry_active_comments;
                  
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
                            getEnquiryCommentsCountById($scope.enquiry_id);
                            getEnquiryActiveCommentsCountById($scope.enquiry_id);
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
                console.log("type")
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
                    getEnquiryCommentsCountById($scope.enquiry_id);
                    getEnquiryActiveCommentsCountById($scope.enquiry_id);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            } 
        });
        app.controller('Tech_Estimate', function ($scope, $http, API_URL , $rootScope) {
            // [
            //     {
            //         "building_number":1,"building_component_number":
            //             [
            //                 {"name":"External Wall","sqfeet":0},
            //                 {"name":"Internal Wall","sqfeet":0},
            //                 {"name":"Partition Wall","sqfeet":0},
            //                 {"name":"Ceiling","sqfeet":0},
            //                 {"name":"Roof","sqfeet":0}
            //             ],
            //         "total_component_area":0
            //     }
            // ]
 
            $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                $scope.enquiry              =   response.data; 
                $scope.enquiry_id           =   response.data.enquiry_id; 
                $scope.building_building    =   response.data.building_component; 
            });
             
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status  = res.data.progress.proposal_sharing_status;
                    $scope.customer_response    = res.data.progress.customer_response; 
                });
            }
            $scope.getWizradStatus(); 

            $scope.Add_building = function() {

                $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                    $scope.building_building.push(response.data.building_component[0]);
                    console.log(response.data.building_component)
                });
                    
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

            $scope.dirOptions = {};

            $scope.Delete_component   =  function(index, secindex) {
                $scope.building_building[index].building_component_number.splice(secindex,1);
                $scope.dirOptions.directiveFunction(index);
            }
           
            $scope.updateTechnicalEstimate  = function() {
                

                const validator     = $scope.building_building;
          
                let validatorName       = false;
                let validatorSqfeet     = false;
                
                validator.forEach(element => {
                    for (let i = 0; i < element.building_component_number.length; i++) {
                        if(element.building_component_number[i].name == null) {
                            validatorName  = true;
                        }
                        if(element.building_component_number[i].sqfeet == null) {
                            validatorSqfeet  = true;
                        }
                    }
                });
                
                if(validatorName)  {
                    Message('warning',"Plese fill the component name !");
                    validatorName  = false;
                    return false;
                }
                if(validatorSqfeet)  {
                    Message('warning',"Plese fill the Sqfeet Estimate !");
                    validatorSqfeet  = false;
                    return false;
                }
 
                
                if($scope.building_building.length == 0 || $scope.building_building[0].building_component_number.length == 0) {
                    Message('danger',"You Can't Update Empty Building !");
                    $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                        $scope.enquiry              =   response.data; 
                        $scope.enquiry_id           =   response.data.enquiry_id; 
                        $scope.building_building    =   response.data.building_component; 
                    });
                    return false;
                } 
                $http({
                    method: "POST",
                    url: API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} , 
                    data:{ data : $scope.building_building},
                }).then(function successCallback(response) {
                    $scope.getWizradStatus();
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }
            
            // =====================
                $scope.GetCommentsData = function() {
                    $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                        $scope.enquiry_number       = res.data.enquiry_number;
                        $scope.enquiry_comments     = res.data.enquiry_comments;
                        $scope.enquiry_id           = res.data.enquiry_id;
                        $scope.project_info         = res.data.enquiry_comments;
                        $scope.project_info         = res.data.project_info;
                        $scope.building_component   = res.data.building_component;
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
        app.controller('Cost_Estimate', function ($scope, $http, API_URL) {
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status  = res.data.progress.proposal_sharing_status;
                    $scope.customer_response    = res.data.progress.customer_response; 
                });
            }
            $scope.getWizradStatus();
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
            
            
            // =========== Cost Estimate  ============
            $http.get("{{ route("CostEstimateData") }}").then(function (response) {
                $scope.cost = response.data; 
            });
            $http.get("{{ route('CostEstimateView', $data->id) }}").then(function (response) {
                $scope.enquiry          =   response.data;  
                $scope.CostEstimate     =   response.data.cost_estimation;
            });
            $scope.UpdateCostEstimate  = function() {  
                $http({
                    method: "POST",
                    url: "{{ route('enquiry-create.cost-estimate-value') }}",
                    data:{ data : $scope.CostEstimate},
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $scope.getWizradStatus();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                }); 
            }
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
                if(index == 0) {
                    return false
                }
                $scope.CostEstimate.Components.splice(index,1);
            }
        });
        app.controller('Proposal_Sharing', function ($scope, $http, API_URL) {
             
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status      = res.data.progress.proposal_sharing_status;
                    $scope.customer_response    = res.data.progress.customer_response; 
                });
            }
            $scope.getWizradStatus();

            $scope.getProposesalData = function () {
                $http.get('{{ route("index.proposal-sharing",$data->id) }}').then(function (res) {
                    $scope.proposal  = res.data;
                });
            }
            $scope.getProposesalData();

            $scope.sendMailToCustomer = function (proposal_id) { 
                $http.post(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/send-mail/'+proposal_id).then(function (response) {
                    Message('success',response.data.msg);
                    $scope.getWizradStatus();
                    $scope.getProposesalData();
                });
            }

            $scope.sendMailToCustomerVersion = function (proposal_id , Vid) { 
                $http.post(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/send-mail/'+proposal_id+'/version/'+Vid).then(function (response) {
                    Message('success',response.data.msg);
                    $scope.getWizradStatus();
                    $scope.getProposesalData();
                });
            }
            
            // View Propose Data
            $scope.ViewEditPropose = function (proposal_id) {
                $http.get(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id).then(function (response) {
                    $scope.edit_proposal  = response.data;
                    $scope.mail_content = $scope.edit_proposal[0].documentary_content;
                    $scope.proposalId = $scope.edit_proposal[0].proposal_id;
                });
                $('#bs-Preview-modal-lg').modal('show');
            }
            $scope.ViewEditProposeVersions = function (proposal_id , Vid) {
                $http.get(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id+'/version/'+Vid).then(function (response) {
                    $scope.edit_proposal  = response.data;
                    $scope.mail_content = $scope.edit_proposal[0].documentary_content;
                    $scope.proposalVersionId = $scope.edit_proposal[0].proposal_id;
                    $scope.proposalVId = $scope.edit_proposal[0].id;
                  
                });
                $('#bs-PreviewVersions-modal-lg').modal('show');
            }

            // ViewPropsalVersions
            $scope.ViewPropsalVersions = function (proposal_id) {
                $http.get(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/versions/'+proposal_id).then(function (response) {
                    $scope.proposal_versions  = response.data;
                });
            }

            // Duplicate Record
            $scope.DuplicatePropose = function (proposal_id) {
                $http.put(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/duplicate/'+proposal_id).then(function (response) {
                    $scope.edit_proposal  = response.data;
                    Message('success',response.data.msg);
                    $scope.getProposesalData();
                });
            }

            // DeletePropose
            $scope.DeletePropose = function (proposal_id) {
                $http.delete(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id).then(function (response) {
                    Message('success',response.data.msg);
                    $scope.getProposesalData();
                });
            }
            
            // DeletePropose
            $scope.DeleteProposeVersion = function (proposal_id, Vid) {
                $http.delete(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id+'/version/'+Vid).then(function (response) {
                    Message('success',response.data.msg);
                    $scope.getProposesalData();
                });
            }

            $scope.updateProposalMail = function(proposalId) {

                $scope.sendCommentsData = {
                    "mail_content"  : $scope.mail_content
                }

                $http({
                    method: "PUT",
                    url: API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposalId ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            $scope.updateProposalVersionMail = function() {

                $scope.sendCommentsData = {
                    "mail_content"  : $scope.mail_content
                }

                $http({
                    method: "PUT",
                    url: API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+$scope.proposalVersionId+'/version/'+$scope.proposalVId,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            $scope.getDocumentaryData = function() {
            $http({
                method: 'GET',
                url:  "{{ route('get-documentaryData') }}" ,
            }).then(function (response) {
                // alert(JSON.stringify(response.data))
                $scope.documentary_module_name = response.data;	
                $scope.getProposesalData();
            }, function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
            }
            
            $scope.documentaryOneData = function() {
                var documentId = $scope.documentary.documentary_title;
                var enquireId ={{ $data->id ?? " " }};


            $http({
                method: 'GET',
                url: "{{ route('get-documentaryOneData') }}",
                params:{'documentId':documentId,'enquireId':enquireId},
            }).then(function (response) {
                // alert(JSON.stringify(response))
                $scope.getDocumentaryData();
            }, function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
            }
            $scope.getDocumentaryData();

        });
        app.directive('getCostEstimateData',   ['$http' ,function ($http, $scope , $apply) {  
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
                                console.log(response.data.complexity)
                                scope.CostEstimate.Components[scope.index].sqm                  =   response.data.sqm;  
                                scope.CostEstimate.Components[scope.index].Complexity           =   response.data.complexity; 

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
                                                                                                    scope.CostEstimate.Components[scope.index].Details.Sum          =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Details.PriceM2 
                                    scope.CostEstimate.Components[scope.index].Statistics.Sum       =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Statistics.PriceM2 
                                    scope.CostEstimate.Components[scope.index].Logistics.Sum        =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Logistics.PriceM2 
                                    scope.CostEstimate.Components[scope.index].CadCam.Sum           =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].CadCam.PriceM2 

                                    scope.CostEstimate.Components[scope.index].TotalCost.PriceM2    =   Number(scope.CostEstimate.Components[scope.index].Details.PriceM2)     + 
                                                                                                        Number(scope.CostEstimate.Components[scope.index].Statistics.PriceM2)  + 
                                                                                                        Number(scope.CostEstimate.Components[scope.index].CadCam.PriceM2)      + 
                                                                                                        Number(scope.CostEstimate.Components[scope.index].Logistics.PriceM2) 
                            
                                    scope.CostEstimate.Components[scope.index].TotalCost.Sum        =   Number(scope.CostEstimate.Components[scope.index].Details.Sum)     + 
                                                                                                        Number(scope.CostEstimate.Components[scope.index].Statistics.Sum)  + 
                                                                                                        Number(scope.CostEstimate.Components[scope.index].CadCam.Sum)      + 
                                                                                                        Number(scope.CostEstimate.Components[scope.index].Logistics.Sum)
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
                                        $sqmTotal           +=  Number(item.sqm); 
                                        $complexity         +=  Number(item.Complexity);
                                        $DetailsPriceM2     +=  Number(item.Details.PriceM2); 
                                        $DetailsSum         +=  Number(item.Details.Sum);
                                        $StatisticsPriceM2  +=  Number(item.Statistics.PriceM2);
                                        $StatisticsSum      +=  Number(item.Statistics.Sum);
                                        $CadCamPriceM2      +=  Number(item.CadCam.PriceM2);
                                        $CadCamSum          +=  Number(item.CadCam.Sum);
                                        $LogisticsPriceM2   +=  Number(item.Logistics.PriceM2);
                                        $LogisticsSum       +=  Number(item.Logistics.Sum);
                                        $TotalCostPriceM2   +=  Number(item.TotalCost.PriceM2);
                                        $TotalCostSum       +=  Number(item.TotalCost.Sum);
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
                                    scope.$apply();
                            }, function error(response) { 
                                console.log("Code Eror")
                            }); 
                    });
                },
            };
        }]);
        app.directive('getCostDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('keyup', function () {
                        // alert("ok");
                         
                        // scope.CostEstimate.Components[scope.index].Details.Sum          =    3  scope.CostEstimate.Components[scope.index].complexity
                        scope.CostEstimate.Components[scope.index].Details.Sum          =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Details.PriceM2 
                        scope.CostEstimate.Components[scope.index].Statistics.Sum       =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Statistics.PriceM2 
                        scope.CostEstimate.Components[scope.index].Logistics.Sum        =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Logistics.PriceM2 
                        scope.CostEstimate.Components[scope.index].CadCam.Sum           =    scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].CadCam.PriceM2 

                        scope.CostEstimate.Components[scope.index].TotalCost.PriceM2    =   Number(scope.CostEstimate.Components[scope.index].Details.PriceM2)     + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].Statistics.PriceM2)  + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].CadCam.PriceM2)      + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].Logistics.PriceM2) 
                
                        scope.CostEstimate.Components[scope.index].TotalCost.Sum        =   Number(scope.CostEstimate.Components[scope.index].Details.Sum)     + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].Statistics.Sum)  + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].CadCam.Sum)      + 
                                                                                            Number(scope.CostEstimate.Components[scope.index].Logistics.Sum)
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
                            $sqmTotal           +=  Number(item.sqm); 
                            $complexity         +=  Number(item.Complexity);
                            $DetailsPriceM2     +=  Number(item.Details.PriceM2); 
                            $DetailsSum         +=  Number(item.Details.Sum);
                            $StatisticsPriceM2  +=  Number(item.Statistics.PriceM2);
                            $StatisticsSum      +=  Number(item.Statistics.Sum);
                            $CadCamPriceM2      +=  Number(item.CadCam.PriceM2);
                            $CadCamSum          +=  Number(item.CadCam.Sum);
                            $LogisticsPriceM2   +=  Number(item.Logistics.PriceM2);
                            $LogisticsSum       +=  Number(item.Logistics.Sum);
                            $TotalCostPriceM2   +=  Number(item.TotalCost.PriceM2);
                            $TotalCostSum       +=  Number(item.TotalCost.Sum);
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
                        scope.$apply();
                    });
                },
            };
        }]);
        app.controller('Customer_response', function ($scope, $http, API_URL) {
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status  = res.data.progress.proposal_sharing_status;
                    $scope.customer_response    = res.data.progress.customer_response; 
                });
            }
            $scope.getWizradStatus();
            // enquiry.show-comments
            $scope.GetCommentsData = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.enquiry_status = res.data.enquiry_status;
                  
                });
            }
            $scope.GetCommentsData();
        });
    </script>  
@endpush