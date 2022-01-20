     
@extends('layouts.customer')

@section('customer-content')
         
    
    <div class="content-page" ng-app="App">
        <div class="content">

            @include('customers.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('customers.layouts.page-navigater') 
            </div>                
          
 
            <div class="card border">
                <div class="card-body pt-0 pb-0">
                               
                    <div id="rootwizard" ng-controller="wizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header bg-light ">
                            <li class="nav-item" ng-click="updateWizardStatus(0)" data-target-form="#projectInfoForm">
                                <a href="#first" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="timeline-step active">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-project-diagram fa-2x "></i>
                                        </div>       
                                        <div class="text-end d-none d-sm-inline mt-2">Project Information</div>                                                                 
                                    </div> 
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(1)" data-target-form="#serviceSelection">
                                <a href="#second" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="timeline-step  ">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-list-alt fa-2x mb-1"></i>
                                        </div>        
                                        <span class="d-none d-sm-inline mt-2">Service Selection</span>                                                                
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(2)" data-target-form="#IFCModelUpload">
                                <a href="#four" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="timeline-step ">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-2x fa-file-upload mb-1"></i>
                                        </div>                                                                        
                                        <span class="d-none d-sm-inline mt-2">IFC Model & Uploads</span>
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(3)"  data-target-form="#buildingComponent">
                                <a href="#five" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="timeline-step ">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-2x fa-shapes mb-1"></i>
                                        </div>                                                                        
                                        <span class="d-none d-sm-inline mt-2">Building  Components</span>
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(4)" data-target-form="#additionalInformation">
                                <a href="#six" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="timeline-step ">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-2x fa-info mb-1"></i>
                                        </div>       
                                        <span class="d-none d-sm-inline mt-2">Additional Info</span>                                                                 
                                    </div>
                                    
                                </a>
                            </li>
                            <li class="nav-item last"  ng-click="updateWizardStatus(5)"  data-target-form="#reviewSubmit">
                                <a href="#third" data-bs-toggle="tab" data-toggle="tab"style="min-height: 40px;"  class="timeline-step">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-2x fa-clipboard-check mb-1"></i>
                                        </div>                   
                                        <span class="d-none d-sm-inline mt-2">Review &  Submit </span>                                                     
                                    </div>
                                    
                                </a>
                            </li>
                        </ul>  
                        <div class="tab-content my-3" >
                            <div class="tab-pane active" id="first" ng-controller="ProjectInfo">
                                @include('customers.pages.enquiryWizard.project-info')
                            </div>
                            <div class="tab-pane fade " id="second" ng-controller="ServiceSelection">
                                @include('customers.pages.enquiryWizard.service-selection')
                            </div>
                            <div class="tab-pane fade " id="four" ng-controller="IFCModelUpload">
                                @include('customers.pages.enquiryWizard.ifc-model-uploads')
                            </div> 

                            <div class="tab-pane p-0 h-100 fade " id="five" ng-controller="CrudCtrl">
                                @include('customers.pages.enquiryWizard.building-component')
                            </div>

                            <div class="tab-pane fade" id="six" ng-controller="AdditionalInfo">
                                @include('customers.pages.enquiryWizard.additional-info')
                            </div>
                         
                            <div class="tab-pane fade" id="third" ng-controller="Review">
                                @include('customers.pages.enquiryWizard.review')
                            </div>

                            <div class="card-footer border-0 p-0 " >
                                <ul class="list-inline wizard mb-0 pt-3">
                                    <li class="previous list-inline-item disabled" ng-click="gotoStep(currentStep - 1)"><a href="#" class="btn btn-outline-primary">Previous</a></li>
                                    <li class="next list-inline-item float-end" ng-click="gotoStep(currentStep + 1)" ><a href="#" class="btn btn-primary">Next</a></li>
                                </ul>
                            </div>
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

    

    <!-- end demo js-->
    <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/ui/component.fileupload.js') }}"></script>
   
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.angularjs.org/1.2.16/angular.js"></script>

    <script >
        var app = angular.module('App', []).constant('API_URL', $("#baseurl").val());           
    </script>
        <script src="{{ asset('public/assets/js/pages/customers/directives.js') }}"></script>
    <script>
        // const result = [];
        app.controller('wizard', function($scope, $http,$rootScope) {
            $scope.result = []
            $rootScope.currentStep = 0;

            $rootScope.updateWizardStatus = (newStep) => {
                $rootScope.currentStep = newStep;
            }
            $rootScope.gotoStep = function(newStep) {
                if($rootScope.currentStep > newStep) {
                    $rootScope.currentStep = newStep;
                    return false;
                }
                $rootScope.currentStep = newStep;
              
                if($rootScope.currentStep == 1 ) {
                    $scope.$broadcast('callProjectInfo');
                } else if ($rootScope.currentStep == 2) {
                    $scope.$broadcast('callServiceSelection');
                } else if ($rootScope.currentStep == 3) {
                    $scope.$broadcast('callIFCModelUpload');
                } else if ($rootScope.currentStep == 4) {
                   
                    $scope.$broadcast('callBuildingComponent');
                }
                else if ($rootScope.currentStep == 5) {
                    $scope.$broadcast('callReview');
                }
            }
          
        });
    
       	app.controller('ProjectInfo', function ($scope, $http, $rootScope ) {
          
            let projectTypefiredOnce = false;
            let deliveryTypefiredOnce = false;
            let buildingTypefiredOnce = false;
            $scope.mobilenoRegex = /^[0-9]{1,8}$/;
            getProjectType = () => {
                if(projectTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("project-type.index") }}'
                }).then(function (res) {
                    projectTypefiredOnce = true;
                    $scope.projectTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 

            getDeliveryType = () => {
                if(deliveryTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("delivery-type.index") }}'
                }).then(function (res) {
                    deliveryTypefiredOnce       = true;
                    $rootScope.deliveryTypes    = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
  
            getBuildingType = () => {
                if(buildingTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("building-type.index") }}'
                }).then(function (res) {
                    buildingTypefiredOnce = true;
                    $scope.buildingTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 

            getProjectType();
            getBuildingType();
            getDeliveryType();

            $scope.$on('callProjectInfo', function(e) {  
                if(!$("#projectInfoForm")[0].checkValidity()){
                    $rootScope.currentStep = 0;
                    return false;
                }
                $http({
                    method: 'POST',
                    url: '{{ route("customers.store-enquiry") }}',
                    data: {type: 'project_info', 'data': getProjectInfoInptuData($scope.projectInfo)}
                }).then(function (res) {
                    
                }, function (error) {
                    console.log(`callprojectinfo ${error}`);
                });         
            });
        
            getProjectInfoInptuData = function($projectInfo) {
                $scope.data = {
                    // 'company_name'         : $projectInfo.company_name,
                    // 'contact_person'       : $projectInfo.contact_person,
                    // 'mobile_no'            : $projectInfo.mobile_no,
                    'secondary_mobile_no'  : $projectInfo.secondary_mobile_no,
                    'project_name'         : $projectInfo.project_name,
                    'zipcode'              : $projectInfo.zipcode,
                    'state'                : $projectInfo.state,
                    'building_type_id'     : $projectInfo.building_type_id,
                    'project_type_id'      : $projectInfo.project_type_id,
                    'project_date'         : $projectInfo.project_date,
                    'site_address'         : $projectInfo.site_address,
                    'place'                : $projectInfo.place,
                    'country'              : $projectInfo.country,
                    'no_of_building'       : $projectInfo.no_of_building,
                    'delivery_type_id'     : $projectInfo.delivery_type_id,
                    'project_delivery_date': $projectInfo.project_delivery_date,
                };
                return  $scope.data;
            }

        }); 

        app.controller('ServiceSelection', function ($scope, $http, $rootScope) {
            $scope.serviceList = [];

           $scope.$on('callServiceSelection', function(e) { 
                if($scope.serviceList.length == 0){
                    $scope.service_selection_mandatory = null;
                    $rootScope.currentStep = 1;
                    return false;
                }
                $scope.service_selection_mandatory = true;      
               $http({
                    method: 'POST',
                    url: '{{ route("customers.store-enquiry") }}',
                    data: {type: 'services', 'data': $scope.getServiceSelectionInptuData()}
                }).then(function (res) {
                    
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });         
           });

           $scope.getServiceSelectionInptuData = function() {
                return Object.assign({}, $scope.serviceList);
           }
    
            $scope.changeService = function(list, active){
                if (active) {
                    $scope.serviceList.push(list);
                }else {
                    $scope.serviceList.splice($scope.serviceList.indexOf(list), 1);
                }
            };
           let servicefireOnce = false;
           $scope.getServices = () => {
               if(servicefireOnce){ return; }
               $http({
                   method: 'GET',
                   url: '{{ route("service.index") }}'
               }).then(function (res) {
                    servicefireOnce = true;
                    $scope.services = res.data;	
               }, function (error) {
                   console.log('This is embarassing. An error has occurred. Please check the log for details');
               });
           } 
           $scope.getServices();
        }); 

        app.directive('demoFileModel', function ($parse) {
            return {
                restrict: 'A', //the directive can be used as an attribute only
                /*
                link is a function that defines functionality of directive
                scope: scope associated with the element
                element: element on which this directive used
                attrs: key value pair of element attributes
                */
                link: function (scope, element, attrs) {
                    var model = $parse(attrs.demoFileModel),
                        modelSetter = model.assign; //define a setter for demoFileModel

                    //Bind change event on the element
                    element.bind('change', function () {
                        //Call apply on scope, it checks for value changes and reflect them on UI
                        scope.$apply(function () {
                            //set the model value
                            modelSetter(scope, element[0].files[0]);
                            
                        });
                    });
                }
            };
        });

        
        app.directive('customModal', function ($parse) {
            return {
                link: function(scope, element, attributes){
                    let title = attributes.modalTitle;
                    let body = attributes.modalBody;
                    let route = attributes.modalRoute;
                    let id = attributes.modalId;
                    let view_type = attributes.modalViewType;
                    let enquiry_id = attributes.modalEnquiryId;
                    let method = attributes.modalMethod;
                    element.bind('click', function () {
                        $("#exampleModalLabel").html(title);
                        $("#exampleModalBody").html(body);
                        $("#exampleModalRoute").val(route);
                        $("#exampleModalId").val(id);
                        $("#exampleModalEnquiryId").val(enquiry_id);
                        $("#exampleModalViewType").val(view_type);
                        $("#exampleModalMethod").val(method);
                        $("#exampleModal").modal('show');
                    });
                }
            };
        });
        
        app.service('fileUploadService', function ($http, $q) {
            this.uploadFileToUrl = function (file, type, view_type,  uploadUrl) {
                var fileFormData = new FormData();
                fileFormData.append('file', file);
                fileFormData.append('type',type);
                fileFormData.append('view_type',view_type);

                var deffered = $q.defer();
                $http.post(uploadUrl, fileFormData, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}

                }).success(function (response) {
                    deffered.resolve(response);

                }).error(function (response) {
                    deffered.reject(response);
                });

                return deffered.promise;
            }
            this.uploadLinkToUrl = function (link, type, view_type,  uploadUrl) {
                var fileFormData = new FormData();
                fileFormData.append('link', link);
                fileFormData.append('type', type);
                fileFormData.append('view_type',view_type);
                var deffered = $q.defer();
                $http.post(uploadUrl, fileFormData, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                }).success(function (response) {
                    deffered.resolve(response);
                }).error(function (response) {
                    deffered.reject(response);
                });
                return deffered.promise;
            }
        });

        app.controller('IFCModelUpload', function ($scope, $http, $parse, fileUploadService,  $rootScope) {
            let mandatoryUpload= [];
            $scope.PlanView = [];
            $scope.posterTitle = 'click here';
            
            $scope.$on('callIFCModelUpload', function(e) {

                mandatoryUpload.length != 0 && mandatoryUpload.map((view) => {
                                                alert(`mandatory file upload ${view}`);
                                                $rootScope.currentStep = 2;
                                            });
                
                $http({
                    method: 'POST',
                    url: '{{ route("customers.store-enquiry") }}',
                    data: {type: 'ifc_model_upload_mandatory', 'data': false}
                }).then(function (res) {
                    if(res.data.status == false) {
                        res.data.data.map((field) => {
                           
                        });
                    }
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            });

            $scope.fileName= function(element, attribute) {
                $scope.$apply(function($scope) {
                    var attribute_name = element.getAttribute('demo-file-model');
                    $scope[`${attribute_name}__file_name`] = element.files[0].name;
                });
            };
            $scope.uploadFile = function (view_type) { 
               
                if(view_type){
                    var file = $scope[view_type];
                    if(typeof(file) == 'undefined') {
                        $scope[`${view_type}__error`] = true;
                        return  false;
                    }
                    $scope[`${view_type}__error`] = false;
                    var type = 'ifc_model_upload';
                    var view_type = view_type;
                    var uploadUrl = '{{ route('customers.store-enquiry') }}'
                    promise = fileUploadService.uploadFileToUrl(file, type, view_type, uploadUrl);
                    promise.then(function (response) {
                        $scope.getIFCViewList(response, view_type);
                        $scope.serverResponse = response;
                        $scope[`${view_type}__file_name`] = '';
                        $scope[`${view_type}`] = undefined;
                        const index = mandatoryUpload.indexOf(view_type);
                        if (index > -1) {
                            mandatoryUpload.splice(index, 1);
                        }
                        $scope[`${view_type}mandatory`] = 'true';
                    }, function () {
                        $scope.serverResponse = 'An error has occurred';
                    });
                 
                }
            }
            $scope.uploadLink = function (view_type) { 
                var link = $scope[`${view_type}__link`];
                if(typeof(link) == 'undefined') {
                    $scope[`${view_type}__error`] = true;
                    return  false;
                }
                $scope[`${view_type}__error`] = false;
               
                var uploadUrl = '{{ route('customers.store-enquiry') }}'
                promise = fileUploadService.uploadLinkToUrl(link, 'ifc_link', view_type, uploadUrl);
                promise.then(function (response) {
                    console.log(response);
                    $scope.getIFCViewList(response, view_type);
                    $scope.serverResponse = response;
                    $scope[`${view_type}__file_name`] = '';
                    $scope[`${view_type}__link`] = undefined;
                    const index = mandatoryUpload.indexOf(view_type);
                    if (index > -1) {
                        mandatoryUpload.splice(index, 1);
                    }
                    $scope[`${view_type}mandatory`] = 'true';
                }, function () {
                    $scope.serverResponse = 'An error has occurred';
                });   
           }
        
            $scope.getIFCViewList = (id, view_type) => {
              
                $http({
                    method: 'GET',
                    url: '{{ route('customers.get-view-list') }}',
                    params: {id: id, view_type: view_type},
                }).then(function (res) {
                    $scope[`${view_type}List`] = res.data;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }

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
                        $scope.getIFCViewList(enquiry_id, view_type);
                        $("#exampleModal").modal('hide');
                        return false;
                    }
                    return false;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            let documentTypefireOnce = false;
            $scope.getDocumentTypes = () => {
                if(documentTypefireOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("document-type.index") }}'
                }).then(function (res) {
                    documentTypefireOnce = true;
                    res.data.map((item) => {
                        item.is_mandatory == 1 && mandatoryUpload.push(item.slug);
                    });
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
            $scope.getDocumentTypes();
        });
       

        app.controller('CrudCtrl', function ($scope, $http, $rootScope) { 
           
            $scope.$on('callBuildingComponent', function(e) {
                // console.log( $scope.wallGroup);
                $http({
                    method: 'POST',
                    url: '{{ route("customers.store-enquiry") }}',
                    data: {type: 'building_component', 'data': $scope.wallGroup}
                }).then(function (res) {
                    
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });   
            });
            $scope.wallGroup = [];
            getBuildingComponent = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("building-component.index") }}'
                    }).then(function success(response) {
                        response.data.map( (item , index) => {
                            
                            let wall = {
                                WallId: item.id,
                                WallName: item.building_component_name,
                                WallIcon: item.building_component_icon,
                                Details: [
                                    
                                ]
                            }
                            $scope.wallGroup.push(wall);
                        });
                        $scope.AddWallDetails(0);
                    }, function error(response) {


                        
                });
            }
         
            getLayer = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("layer.index") }}'
                    }).then(function success(response) {
                        $scope.layers = response.data;
                    }, function error(response) {
                        // console.log('layer');
                });
            }
          
            $scope.getLayerType = (building_component_id, layer_id) => {

                
            }

            getBuildingComponent();
            getLayer();

            $scope.AddWallDetails  =   function(index) {
                $scope.wallGroup[index].Details.push({
                    "FloorName" : "",
                    "FloorNumber" : "",
                    "TotalArea" : "",
                    "DeliveryType" : "",
                    "Layers": [
                        {
                            "LayerName": '',
                            "LayerType": '',
                            "Thickness ": '',
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
                    element.on('change', function () {
                        if(scope.w.WallId == 'undefined' || scope.l.LayerName == 'undefined') {
                            return false;
                        }
                        $http({
                            method: 'GET',
                            url: '{{ route("layer-type.get-layer-type") }}',
                            params : {building_component_id: scope.w.WallId, layer_id: scope.l.LayerName}
                            }).then(function success(response) {
                                scope.layerTypes = response.data;
                            }, function error(response) {
                                // console.log('layer');
                        });
                    });
                },
            };
        });;

        app.controller('Review', function($scope, $http, $rootScope) {
          
            $scope.$on('callReview', function(e) {
              
                getEnquiry = ()  => {
                    $http({
                        method: 'GET',
                        url: '{{ route("customers.enquiry-review") }}'
                    }).then(function (res) {
                        $scope.project_info = res.data.project_infos;
                        $scope.services     = res.data.services;
                        $scope.ifc_model_uploads = res.data.ifc_model_uploads;
                        $scope.building_components = res.data.building_components;
                        $scope.additional_infos = res.data.additional_infos;
            
                    }, function (error) {
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }
                getEnquiry();
            });
        });

        app.controller('AdditionalInfo', function($scope, $http, $rootScope) {
            $scope.addComment = () => {
                if($scope.additionalInfo == 'undefined') {
                    return false;
                }
                $http({
                    method: 'POST',
                    url: '{{ route("customers.store-enquiry") }}',
                    data: {type: 'additional_info', 'data': $scope.additionalInfo}
                }).then(function (res) {
                   $scope.comments = res.data;
                }, function (error) {
                    console.log(`additional info ${error}`);
                });         
            }       
        });
    </script>
  
@endpush