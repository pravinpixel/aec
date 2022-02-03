     
@extends('layouts.customer')

@section('customer-content')
         
    
    <div class="content-page" ng-app="App">
        <div class="content">

            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('customer.includes.page-navigater') 
            </div>                
          
 
            <div class="card border">
                <div class="card-body pt-0 pb-0">
                               
                    <div id="rootwizard" ng-controller="wizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header bg-light ">
                            <li class="nav-item"  data-target-form="#projectInfoForm" style="pointer-events:none"> 
                                <a href="#!/" style="min-height: 40px;" class="timeline-step {{$enquiry->project_info == '1' ? "active" : ""}} " id="project-info">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-project-diagram fa-2x "></i>
                                        </div>       
                                        <div class="text-end d-none d-sm-inline mt-2">Project Information</div>                                                                 
                                    </div> 
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(1)" data-target-form="#serviceSelection" style="pointer-events:none">
                                <a href="#!/service" style="min-height: 40px;" class="timeline-step  {{$enquiry->service == 1 ? 'active' : ''}}" id="service">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-secondary">
                                            <i class="fa fa-list-alt fa-2x mb-1"></i>
                                        </div>        
                                        <span class="d-none d-sm-inline mt-2">Service Selection</span>                                                                
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(2)" data-target-form="#IFCModelUpload" style="pointer-events:none">
                                <a href="#!/ifc-model-upload" style="min-height: 40px;" class="timeline-step {{$enquiry->ifc_model_upload == 1 ? 'active' : ''}}" id="ifc-model-upload">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-secondary">
                                            <i class="fa fa-2x fa-file-upload mb-1"></i>
                                        </div>                                                                        
                                        <span class="d-none d-sm-inline mt-2">IFC Model & Uploads</span>
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(3)"  data-target-form="#buildingComponent" style="pointer-events:none">
                                <a href="#!/building-component"  style="min-height: 40px;" class="timeline-step {{$enquiry->building_component == 1 ? 'active' : ''}}" id="building-component">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-secondary">
                                            <i class="fa fa-2x fa-shapes mb-1"></i>
                                        </div>                                                                        
                                        <span class="d-none d-sm-inline mt-2">Building  Components</span>
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(4)" data-target-form="#additionalInformation" style="pointer-events:none">
                                <a href="#!/additional-info" style="min-height: 40px;" class="timeline-step {{$enquiry->additional_info == 1 ? 'active' : ''}}"  id="additional-info">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-secondary">
                                            <i class="fa fa-2x fa-info mb-1"></i>
                                        </div>       
                                        <span class="d-none d-sm-inline mt-2">Additional Info</span>                                                                 
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item last"  ng-click="updateWizardStatus(5)"  data-target-form="#reviewSubmit"  style="pointer-events:none">
                                <a href="#!/review" style="min-height: 40px;"  class="timeline-step" id="review">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-secondary">
                                            <i class="fa fa-2x fa-clipboard-check mb-1"></i>
                                        </div>                   
                                        <span class="d-none d-sm-inline mt-2">Review &  Submit </span>                                                     
                                    </div>
                                    
                                </a>
                            </li>
                        </ul>  
                        <div class="tab-content my-3" >
                           <ng-view></ng-view>
                        </div> <!-- tab-content -->
                    </div> <!-- end #rootwizard--> 
                </div> <!-- end card-body -->
            </div>
            </div> <!-- container -->

        </div> <!-- content -->


    </div> 
    <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-right" style="width:100% !important">
            <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
                <div>
                    <div class="border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <ul class="conversation-list" data-simplebar="init" style="max-height: 537px"><div class="simplebar-wrapper" style="margin: 0px -15px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px 15px;">
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N">
                                        <i>10:00</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Hello!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic">
                                        <i>10:01</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Hi, How are you? What about our next meeting?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N">
                                        <i>10:01</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Yeah everyThickness g is fine
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic">
                                        <i>10:02</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Wow that's great
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:02</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Let's have it today if you are free
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded">
                                        <i>10:03</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Sure Thickness g! let me know if 2pm works for you
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Sorry, I have another meeting scheduled at 2pm. Can we have it
                                                at 3pm instead?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                We can also discuss about the presentation talk format if you have some extra mins
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded">
                                        <i>10:05</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. 
                                                I am attaching the last year format and assets here...
                                            </p>
                                        </div>
                                        <div class="card mt-2 mb-1 shadow-none border text-start">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded">
                                                                .ZIP
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);" class="text-muted fw-bold">Hyper-admin-design.zip</a>
                                                        <p class="mb-0">2.3 MB</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                            <i class="dripicons-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                            </div></div></div></div><div class="simplebar-placeholder" style="width: 479px; height: 924px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 312px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></ul>

                            <div class="row">
                                <div class="col">
                                    <div class="mt-2 bg-light p-3 rounded">
                                        <form class="needs-validation" novalidate="" name="chat-form" id="chat-form">
                                            <div class="row">
                                                <div class="col mb-2 mb-sm-0">
                                                    <input type="text" class="form-control border-0" placeholder="Enter your text" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter your messsage
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-secondary"><i class="uil uil-paperclip"></i></a>
                                                        <a href="#" class="btn btn-secondary"> <i class="uil uil-smile"></i> </a>
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-success chat-send"><i class="uil uil-message"></i></button>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row-->
                                        </form>
                                    </div> 
                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->
                        </div> <!-- end card-body -->
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
      
@endsection
          
@push('custom-styles')
    <link rel="stylesheet" href="{{ asset('public/assets/css/pages/customer-enquiry.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/angularjs/ui-notification.css') }}">
    <style>
        fieldset:hover ,   fieldset:hover  .legend {
            border: 1px solid #757CF2 !important
        }
        .legend {
            top: -15px;
            position: absolute;
            font-weight: bold;
            line-height: 25px;
            padding: 0px 10px;
            background: white;
            left: 25px;
        } 
        .table-bold {
            font-weight: bold !important
        }
        .timeline-step {
            display: inline !important;
        }
        .timeline-step.active .inner-circle {
            background: #757CF2 !important
        }
        .inner-circle .fa {
            transform: translateY(5px)
        }
         li.nav-item .timeline-step::after {
            content: "";
            position: absolute;
            top: 38%;
            right: -38px;
            border: 1px dashed;
            width: 50%; 
        }
        li.last .timeline-step::after {
            display: none;
        }
        li.nav-item {
            position: relative;
        }
        /* .timeline-steps  {
            display: flex;
            justify-content:center;
            align-items: center;
            position: relative; 
        }
        .timeline-step {
           
            z-index: 1;
            
            /* margin: 10px */
        } */
        .inner-circle {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px #bdbdbd;
            background: white;
            display: flex;
            justify-content:center;
            align-items: center;
            color: white;
            border: 3px solid white;
            transform: scale(1.1);

        }
        .timeline-content {
            display: flex;
            justify-content:center;
            align-items: center;
            /* flex-direction: column; */
        }
        .admin-Delivery-wiz .timeline-step::after {
            visibility: hidden;
        } 
    </style>
@endpush

@push('custom-scripts')

    <script>
        app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('enquiry.project-info') }}",
                controller : "ProjectInfo"
            })
            .when("/service", {
                templateUrl : "{{ route('enquiry.service') }}",
                controller : "Service"
            })
            .when("/ifc-model-upload", {
                templateUrl : "{{ route('enquiry.ifc-model-upload') }}",
                controller : "IFCModelUpload"
            })
            .when("/building-component", {
                templateUrl : "{{ route('enquiry.building-component') }}",
                controller : "BuildingComponent"
            })
            .when("/additional-info", {
                templateUrl : "{{ route('enquiry.additional-info') }}",
                controller : "AdditionalInfo"
            })
            .when("/review", {
                templateUrl : "{{ route('enquiry.review') }}",
                controller : "Review"
            })
        }); 
        app.controller('wizard', function ($scope, $http, $rootScope, Notification, API_URL, $location) {
            $location.path('/{{$activeTab}}');
        });
      
        app.controller('ProjectInfo', function ($scope, $http, $rootScope, Notification, API_URL, $location) {
            $("#project-info").addClass('active');
            let enquiry_id = {{$id}};
            console.log('enquiry_id',enquiry_id);
            $http({
                method: 'GET',
                url: '{{ route('get-login-customer') }}'
            }).then( function(res) {
                $scope.customer = res.data.customer
            }, function (err) {
                console.log('get enquiry error');
            });
            getProjectType = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("project-type.get") }}'
                }).then(function (res) {
                    $scope.projectTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
            getDeliveryType = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("delivery-type.get") }}'
                }).then(function (res) {
                    $rootScope.deliveryTypes    = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
            getBuildingType = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("building-type.get") }}'
                }).then(function (res) {
                    $scope.buildingTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            getProjectInfoInptuData = function($projectInfo) {
               
                $scope.data = {
                    'secondary_mobile_no'  : $projectInfo.secondary_mobile_no,
                    'enquiry_date'         : new Date($projectInfo.enquiry_date),
                    'enquiry_number'       : $projectInfo.enquiry_number,
                    'project_name'         : $projectInfo.project_name,
                    'zipcode'              : $projectInfo.zipcode,
                    'state'                : $projectInfo.state,
                    'building_type_id'     : $projectInfo.building_type_id,
                    'project_type_id'      : $projectInfo.project_type_id,
                    'project_date'         : new Date($projectInfo.project_date),
                    'site_address'         : $projectInfo.site_address,
                    'place'                : $projectInfo.place,
                    'country'              : $projectInfo.country,
                    'no_of_building'       : $projectInfo.no_of_building,
                    'delivery_type_id'     : $projectInfo.delivery_type_id,
                    'project_delivery_date': new Date($projectInfo.project_delivery_date),
                };
                return  $scope.data;
            }
            getLastEnquiry = (enquiry_id) => {
                console.log(enquiry_id);
                if(typeof(enquiry_id) == 'undefined' ||enquiry_id == ''){
                    return false;
                } 
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/project_info`,
                }).then(function (res) {
                    $scope.enquiry_number = res.data.project_info.enquiry_no;
                    $scope.enquiry_date = new Date(res.data.project_info.enquiry_date);
                    $scope.projectInfo = getProjectInfoInptuData(res.data.project_info);
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            getLastEnquiry(enquiry_id);
            getProjectType();
            getBuildingType();
            getDeliveryType();

            $scope.getZipcodeData = function() {
                let zipcode = $("#zipcode").val();
                if(typeof(zipcode) == 'undefined' || zipcode.length != 4){
                    return false;
                }
                $http({
                    method: 'GET',
                    url: `https://api.zippopotam.us/NO/${zipcode}`
                }).then(function successCallback(res) {
                    $scope.zipcodeData = res.data;
                    console.log("API working") 
                    $scope.projectInfo = {
                        ...$scope.projectInfo, 
                        ...{
                            'state'     :  $scope.zipcodeData.places[0].state,
                            'place'     :  $scope.zipcodeData.places[0]['place name'],
                            'country'   :  $scope.zipcodeData.country,
                            'zipcode'   :  zipcode,
                        }
                    };
                }, function errorCallback(error) {
                    Message('danger', 'Invalid zipcode');
                    $scope.projectInfo = {
                        ...$scope.projectInfo, 
                        ...{
                            'state'     : '',
                            'place'     : '',
                            'country'   : '',
                            'zipcode'   :  zipcode,
                        }
                    };
                    return false;
                });
            } 

            $scope.submitProjectInfoForm = () => {
                $http({
                    method: 'POST',
                    url: '{{ route("customers.update-enquiry", $id) }}',
                    data: {type: 'project_info', 'data': getProjectInfoInptuData($scope.projectInfo)}
                }).then(function (res) {
                    $location.path('/service');
                    Message('success','Project Information inserted successfully');
                }, function (error) {
                    console.log(`storeprojectinfo ${error}`);
                }); 
            }
        }); 

        app.controller('Service', function ($scope, $http, $rootScope, Notification, API_URL, $location){
            $("#service").addClass('active');
            $scope.serviceList = [];
            let enquiry_id = {{$id}};
            $http({
                method: 'GET',
                url: '{{ route('get-customer-enquiry') }}'
            }).then( function(res) {
                    getLastEnquiry(enquiry_id);
                    if(res.data.status == "false") {
                        $scope.enquiry_number = res.data.enquiry_number;
                        // enquiry_id = res.data.enquiry_id
                      
                    } else {
                        $scope.enquiry_no = res.data.enquiry.enquiry_number;
                    }
                }, function (err) {
                    console.log('get enquiry error');
            });
            getLastEnquiry = (enquiry_id) => {
                if(typeof(enquiry_id) == 'undefined' || enquiry_id == ''){
                    return false;
                } 
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/services`,
                }).then(function (res) {
                    $scope.serviceList = res.data.services;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            getOutputTypes = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("output-type.get") }}'
                }).then(function (res) {
                        $scope.outputTypes = res.data;	
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            getServiceSelectionInptuData = function() {
                return Object.assign({}, $scope.serviceList);
            }
            $scope.changeService = function(list, active){
                if (active) {
                    $scope.serviceList.push(list);
                }else {
                    if($scope.serviceList.indexOf(list) > -1)  $scope.serviceList.splice($scope.serviceList.indexOf(list), 1);
                }
            };
            $scope.submitService = () => {
                $http({
                    method: 'POST',
                    url: '{{ route("customers.update-enquiry", $id) }}',
                    data: {type: 'services', 'data': getServiceSelectionInptuData()}
                }).then(function (res) {
                    $location.path('/ifc-model-upload');
                    Message('success','Service selection inserted successfully');
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });         
            }
            getOutputTypes();
        });
        
        app.controller('BuildingComponent', function ($scope, $http, $rootScope, Notification, API_URL, $location) { 
            $("#building-component").addClass('active');
            $scope.wallGroup = [];
            $scope.layerAdd = true;
            let enquiry_id = {{$id}};
            $http({
                method: 'GET',
                url: '{{ route('get-customer-enquiry') }}'
            }).then( function(res) {
                    getLastEnquiry(enquiry_id);
                    if(res.data.status == "false") {
                        $scope.enquiry_number = res.data.enquiry_number;
                        // enquiry_id = res.data.enquiry_id
                    } else {
                        $scope.enquiry_no = res.data.enquiry.enquiry_number;
                    }
                }, function (err) {
                    console.log('get enquiry error');
            });
           
            $scope.callLayerModal = (wall_id) => {
                building_component_id = wall_id;
                $("#add-layer-modal").modal('show');
            }
            $scope.submitLayer = () => {
                if($scope.layer_name =='' || typeof($scope.layer_name) == 'undefined') {
                    return false;
                }
                $http({
                    method: 'POST',
                    url: '{{ route('layer.store-layer-from-customer') }}',
                    data: {building_component_id: building_component_id, layer_name:  $scope.layer_name}
                }).then(function successCallback(response) {
                    $scope.layerAdd  = !$scope.layerAdd;
                    $("#add-layer-modal").modal('hide');
                    $scope.layer_name = '';
                    Message('success', 'Layer added successfully');
                }, function errorCallback(response) {
                    Message('danger', 'Something went wrong');
                });
            }

            getDeliveryType = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("delivery-type.get") }}'
                }).then(function (res) {
                    $scope.deliveryTypes = res.data;		    
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
            getDeliveryType();
            getBuildingComponent = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("building-component.get") }}'
                    }).then(function success(response) {
                        
                        response.data.map( (item , index) => {
                            
                            let wall = {
                                WallId    : item.id,
                                WallName  : item.building_component_name,
                                WallIcon  : item.building_component_icon,
                                WallTop   : item.top_position,
                                WallBottom: item.bottom_position,
                                Details: [
                                    
                                ]
                            }
                            $scope.wallGroup.push(wall);
                        });
                        $scope.AddWallDetails(0);
                        
                    }, function error(response) {
                });
            }
            getLastEnquiry = (enquiry_id) => {
                if(typeof(enquiry_id) == 'undefined' || enquiry_id == '')  {
                    getBuildingComponent(); 
                    return false;
                }
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/building_component`,
                }).then(function (res){
                    if(res.data.building_component.length == 0) {
                        getBuildingComponent();
                        return false;
                    }
                    res.data.building_component.map( (item , index) => {
                        let Details  = [];
                        if(typeof(item.detail) != 'undefined') {
                            Details =  item.detail.map( (detail, index) => {
                                let Layer  = [];
                                if(typeof(detail.layer) != 'undefined') {
                                    Layer = detail.layer.map( (layerObj, index) => {
                                       
                                        return {
                                            LayerName:  String(layerObj.layer.id),
                                            LayerNameText:  layerObj.layer.layer_name,
                                            Thickness : Number(layerObj.thickness),
                                            Breadth:  Number(layerObj.breath),
                                        }
                                    });
                                }
                                return {
                                    FloorName   : detail.floor,
                                    FloorNumber : Number(detail.exd_wall_number),
                                    TotalArea   : Number(detail.approx_total_area),
                                    DeliveryType:  detail.building_component_delivery_type_id,
                                    Layers : Layer
                                }
                            });
                        }
                        let wall = {
                                WallId    : item.wallId,
                                WallName  : item.wall,
                                WallIcon  : item.icon,
                                WallTop   : item.top_position,
                                WallBottom: item.bottom_position,
                                Details: Details
                            }
                        $scope.wallGroup.push(wall);
                    });
                }, function (error) {
                    console.log('building component error');
                });
            }
            
            $scope.submitBuildingComponent = () => {
                $http({
                    method: 'POST',
                    url: '{{ route('customers.update-enquiry', $id) }}',
                    data: {type: 'building_component', 'data': $scope.wallGroup}
                }).then(function (res) {
                    $location.path('/additional-info')
                    Message('success', `Building Component updated successfully`);
                }, function (error) {
                    Message('error', `Somethig went wrong`);
                }); 
            }
            $scope.AddWallDetails  =   function(index) {
                $scope.wallGroup[index].Details.push({
                    "FloorName" : "",
                    "FloorNumber" : "",
                    "TotalArea" : "",
                    "DeliveryType" : "",
                    "Layers": [
                        {
                            "LayerName": '',
                            "Thickness": '',
                            "Breadth": '',
                        }
                    ] 
                });
                // console.log( $scope.wallGroup);
            } 
            // console.log($scope.wallGroup);
            $scope.AddLayers  =   function(fIndex, index) {
                $scope.wallGroup[fIndex].Details[index].Layers.unshift({
                    "LayerName": '',
                    "LayerType": '',
                    "Thickness ": '',
                    "Breadth": '',
                });
            }
            $scope.delWall = function(index){
                $scope.wallGroup.splice(index,1);
            } 
            $scope.delWallTwo = function(fIndex){
                $scope.wallGroup.splice(fIndex,1);
            }  
            $scope.RemoveDetails = function(fIndex, Secindex){
                $scope.wallGroup[fIndex].Details.splice(Secindex,1);                
            }
            $scope.removeLayer = function(fIndex, Secindex, ThreeIndex){
                $scope.wallGroup[fIndex].Details[Secindex].Layers.splice(ThreeIndex,1);
            }  
            $scope.removeWall = function(fIndex, Secindex){
                $scope.wallGroup[fIndex].Details.splice(Secindex,1);           
            } 
            }).directive('getLayerType', function layerType($http) {
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('click', function () {
                        if(scope.w.WallId == 'undefined') {
                            return false;
                        }
                        $http({
                            method: 'GET',
                            url: '{{ route("layer-type.get-layer-type") }}',
                            params : {building_component_id: scope.w.WallId, layer_id: scope.l.LayerName}
                            }).then(function success(response) {
                                scope.layerTypes = response.data;
                            }, function error(response) {
                        });
                    });
                },
            };
            }).directive('getCustomerLayer', function customerLayer($http) {
                return {
                    restrict: 'A',
                    link : function (scope, element, attrs) {
                        scope.$watch('layerAdd', function() {
                            $http({
                                method: 'GET',
                                url: '{{ route("layer.get-layer-by-building-component") }}',
                                params : {building_component_id: scope.w.WallId}
                                }).then(function success(response) {
                                    scope.layers = response.data;
                                }, function error(response) {
                            });
                        });
                    },
                };
            });


        app.controller('AdditionalInfo', function ($scope, $http, $rootScope, Notification, API_URL, $location){
            $("#additional-info").addClass('active');
            let enquiry_id = {{$id}};
            $http({
                method: 'GET',
                url: '{{ route('get-customer-enquiry') }}'
            }).then( function(res) {
                    getLastEnquiry(enquiry_id);
                    if(res.data.status == "false") {
                        $scope.enquiry_number = res.data.enquiry_number;
                     
                    } else {
                        $scope.enquiry_no = res.data.enquiry.enquiry_number;
                    }
                }, function (err) {
                    console.log('get enquiry error');
            });

            getLastEnquiry = (enquiry_id) => {
                if(typeof(enquiry_id) == 'undefined' || enquiry_id == ''){
                    return false;
                } 
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/additional_info`,
                }).then(function (res) {
                    $scope.additionalInfo = res.data.additional_info;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }

            $scope.submitAdditionalinfoForm = () => {
                if($scope.additionalInfo == '' || typeof($scope.additionalInfo) == 'undefined'){
                    $location.path('/review');
                    return false;
                }
                $http({
                    method: 'POST',
                    url: '{{ route("customers.update-enquiry", $id) }}',
                    data: {type: 'additional_info', 'data': $scope.additionalInfo}
                }).then(function (res) {
                    $location.path('/review');
                    Message('success',`Comments added successfully`);
                }, function (error) {
                    Message(`additional info ${error}`);
                });
            }  
        });


        app.controller('Review', function ($scope, $http, $rootScope, Notification, API_URL, $location){
            $("#review").addClass('active');
            let enquiry_id = {{$id}};
            $http({
                method: 'GET',
                url: '{{ route('get-customer-enquiry') }}'
            }).then( function(res) {
                    getLastEnquiry(enquiry_id);
                    if(res.data.status == "false") {
                        $scope.enquiry_number = res.data.enquiry_number;
                        // enquiry_id = res.data.enquiry_id
                       
                    } else {
                        $scope.enquiry_no = res.data.enquiry.enquiry_number;
                    }
                }, function (err) {
                    console.log('get enquiry error');
            });

            getLastEnquiry = (enquiry_id)  => {
                console.log(enquiry_id);
                if(typeof(enquiry_id) == 'undefined' || enquiry_id == ''){
                    return false;
                }
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/edit-enquiry-review/${enquiry_id}`,
                }).then(function (res) {
                    $scope.project_info = res.data.project_infos;
                    $scope.outputTypes = res.data.services;
                    $scope.ifc_model_uploads = res.data.ifc_model_uploads;
                    $scope.building_components = res.data.building_components;
                    $scope.additional_infos = res.data.additional_infos;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }

            $scope.saveOrSubmit = (value) => {
                $http({
                    method: 'POST',
                    url: '{{ route('customers.update-enquiry', $id) }}',
                    data: {type: 'save_or_submit', data: value}
                    }).then(function successCallback(response) {
                        return location.href = '{{ route('customers-my-enquiries') }}'
                    }, function errorCallback(response) {
                        Message('danger', 'Something went wrong');
                    });
            }
        });

        app.controller('IFCModelUpload', function ($scope, $http, $rootScope, Notification, API_URL, $location, fileUpload){
            $("#ifc-model-upload").addClass('active');
            $scope.documentLists = [];
            $scope.mandatory = [];
            let enquiry_id = {{$id}};
            $http({
                method: 'GET',
                url: '{{ route('get-customer-enquiry') }}'
            }).then( function(res) {
            getLastEnquiry(enquiry_id);
                if(res.data.status == "false") {
                    $scope.enquiry_number = res.data.enquiry_number;
                    enquiry_id = res.data.enquiry_id
                    
                } else {
                    $scope.enquiry_no = res.data.enquiry.enquiry_number;
                }
            }, function (err) {
                console.log('get enquiry error');
            });
            getLastEnquiry = (enquiry_id) => {
                let slug = [];
                if(typeof(enquiry_id) == 'undefined' || enquiry_id == ''){
                    return false;
                } 
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/ifc_model_uploads`,
                }).then(function (res) {
                    res.data.ifc_model_uploads.map( (item, index) => {
                        let [id, type] = [item.enquiry_id , item.document_type.slug];
                        if(slug.indexOf(type) == -1) {
                            slug.push(type);
                            getIFCViewList(id,type);
                        }
                    });
                  
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }

            getDocumentTypes = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("document-type.get") }}'
                }).then(function (res) {
                    $scope.documentTypes = res.data.map((item, index) => {
                        item.is_mandatory == 1 &&  ($scope.mandatory.push(item.slug));
                        $scope.documentLists[`${item.slug}`] = [];
                        return {...item, ...{'file_name': ''}};
                    });
                    console.log($scope.documentLists);
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            getDocumentTypes();

            getIFCViewList = (id, view_type) => {
                $scope.documentLists[`${view_type}`] = [];
                $http({
                    method: 'GET',
                    url: '{{ route('customers.get-view-list') }}',
                    params: {id: id, view_type: view_type},
                }).then(function (res) {
                    $scope.documentLists[`${view_type}`] = [...$scope.documentLists[`${view_type}`], ...res.data];
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }

            $scope.fileName= function(element) {
                $scope.$apply(function($scope) {
                        var attribute_name = element.getAttribute('demo-file-model');
                        $scope[`${attribute_name}`] = element.files[0].name;
                });
            };

            $scope.submitIFC  = () => {
                $http({
                    method: 'POST',
                    url: '{{ route('customers.update-enquiry', $id) }}',
                    data: {type: 'ifc_model_upload_mandatory', 'data': false}
                }).then(function (res) {
                    if(res.data.status == false) {
                       res.data.data.map( (item) => {
                            Message('danger', `${item.replaceAll('_',' ')} field is required`);
                            return false;
                       });
                    } else  {
                        $location.path('/building-component');
                    }
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                }); 
                
            }

            $scope.uploadFile = (filename, file_type) => {
                $(".fileupload").css('pointer-events','none');
                var file = false;
                var link = false;
                var callPromise = false;
                if($scope[`file${filename}`]){
                    file = $scope[`file${filename}`];
                    var type = 'ifc_model_upload';  
                } else if($(`#link${filename}`).val()){
                    link =  $(`#link${filename}`).val();
                    var type = 'ifc_link';
                }
                if(file == false && link == false){
                    $(".fileupload").css('pointer-events','');
                    Message('danger',`${file_type.replaceAll('_',' ') } file required`);
                    return false;
                }
                var uploadUrl = '{{ route('customers.store-enquiry') }}';
                if(file){
                    promise = fileUpload.uploadFileToUrl(file, type, file_type, uploadUrl, $scope);
                    callPromise = true;
                } else if(link) {
                    promise = fileUpload.uploadLinkToUrl(link, type, file_type, uploadUrl, $scope);
                    callPromise = true;
                }
                if(callPromise){
                    promise.then(function (response) {
                        $(".fileupload").css('pointer-events','');
                        delete $scope[`file${filename}`];
                        callPromise = false;
                        $(`#link${filename}`).val('');
                        Message('success',`${file_type.replaceAll('_',' ')} uploaded successfully`);
                        getIFCViewList(response.data, file_type);
                    }, function () {
                        $scope.serverResponse = 'An error has occurred';
                    });
                }

            }

            $scope.uploadLink = (filename, file_type) => {
                var file = $(`#${filename}`).val();
                if(typeof(file) == 'undefined'  || file == ''){
                    Message('danger',`Please upload ${file_type.replaceAll('_',' ') } link`);
                    return false;
                }
                var type = 'ifc_link';
                var uploadUrl = '{{ route('customers.update-enquiry', $id) }}',
                promise = fileUpload.uploadLinkToUrl(file, type, file_type, uploadUrl, $scope);
                promise.then(function (response) {
                        $scope[filename] = '';
                        Message('success',`${file_type.replaceAll('_',' ')} uploaded successfully`);
                        getIFCViewList(response.data, file_type);
                    }, function () {
                        $scope.serverResponse = 'An error has occurred';
                    });
            };
         
            $scope.performAction = function()  {
                let route      = $("#exampleModalRoute").val();
                let method     = $("#exampleModalMethod").val();
                let id         = $("#exampleModalId").val();
                let enquiry_id = $("#exampleModalEnquiryId").val();
                let view_type  = $("#exampleModalViewType").val();
                $http({
                    method: method,
                    url: route,
                    params: {id: id},
                }).then(function (res) {
                    if(res.status) {
                        getIFCViewList(enquiry_id, view_type);
                        $("#exampleModal").modal('hide');
                        Message('success','deleted successfully');
                        return false;
                    }
                    return false;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
        });

        app.directive('fileModel', function ($parse) {
                return {
                    restrict: 'A',
                    link: function(scope, element, attrs) {
                        var model, modelSetter;
                        attrs.$observe('fileModel', function(fileModel){
                            model = $parse(attrs.fileModel);
                            modelSetter = model.assign;
                        });
                        
                        element.bind('change', function(){
                            scope.$apply(function(){
                                modelSetter(scope.$parent, element[0].files[0]);
                            });
                        });
                    }
                };
            });

            

            app.service('fileUpload', function ($http, $q) {
               
                this.uploadFileToUrl = function(file, type, view_type, uploadUrl, $scope){
                    $scope[`${view_type}showProgress`] = true;
                    var fd = new FormData();
                    fd.append('file', file);
                    fd.append('type', type);
                    fd.append('view_type', view_type);
                  
                    var deffered = $q.defer();
                    $http.post(uploadUrl, fd, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type':undefined, 'Process-Data': false},
                        uploadEventHandlers: {
                            progress: function (e) {
                                    if (e.lengthComputable) {
                                        // $scope[`${view_type}showProgress`] = false;
                                    }
                            }
                        }
                    }).then(function (response) {
                        $scope[`${view_type}showProgress`] = false;
                        deffered.resolve(response);
                    },function (response) {
                        deffered.reject(response);
                    });
                    return deffered.promise;
                }

                this.uploadLinkToUrl = function (link, type, view_type,  uploadUrl, $scope) {
                    if(link == '' || typeof(link) == 'undefined'){
                        return false;
                    }
                    $scope[`${view_type}showProgress`] = true;
                    var fd = new FormData();
                    fd.append('link', link);
                    fd.append('type', type);
                    fd.append('view_type',view_type);
                    var deffered = $q.defer();
                  
                    $http.post(uploadUrl, fd, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type':undefined, 'Process-Data': false},
                        uploadEventHandlers: {
                            progress: function (e) {
                                    if (e.lengthComputable) {
                                        // $scope[`${view_type}showProgress`] = false;
                                    }
                            }
                        }
                    }).then(function (response) {
                        $scope[`${view_type}showProgress`] = false;
                        deffered.resolve(response);
                    },function (response) {
                        deffered.reject(response);
                    });
                    return deffered.promise;
                }
              
            });
        
        window.onbeforeunload = function(e) {
            var dialogText = 'We are saving the status of your listing. Are you realy sure you want to leave?';
            e.returnValue = dialogText;
            return dialogText;
        };
</script>

  
@endpush