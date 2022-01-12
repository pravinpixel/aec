     
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
                            <li class="nav-item last"  ng-click="updateWizardStatus(5)" data-target-form="#reviewSubmit">
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
                                @include('customers.pages.editEnquiryWizard.project-info')
                            </div>
                            <div class="tab-pane fade " id="second" ng-controller="ServiceSelection">
                                @include('customers.pages.editEnquiryWizard.service-selection')
                            </div>
                            <div class="tab-pane fade " id="four" ng-controller="IFCModelUpload">
                                @include('customers.pages.editEnquiryWizard.ifc-model-uploads')
                            </div>

                            <div class="tab-pane p-0 h-100 fade " id="five" ng-controller="CrudCtrl">
                                @include('customers.pages.editEnquiryWizard.building-component')
                            </div>
                           
                            <div class="tab-pane fade" id="six" ng-controller="AdditionalInfo">
                                @include('customers.pages.enquiryWizard.additional-info')
                            </div>
                            <div class="tab-pane fade" id="third"  ng-controller="Review">
                                @include('customers.pages.enquiryWizard.review')
                            </div>

                            <div class="card-footer border-0 p-0 " >
                                <ul class="list-inline wizard mb-0 pt-3">
                                    <li class="previous list-inline-item disabled" ng-click="gotoStep(currentStep - 1)"><a href="#" class="btn btn-primary">Previous</a></li>
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
        .table tbody tr td {
            padding: 5px !important
        }
        @media (min-width: 1200px) {
            .modal-xxl {
                width: 100% !important
            }
        }
        .x-y-center {
            display: flex !important;
            justify-content: center;
            align-items: center 
        } 
        thead, tbody, tfoot, tr, td, th {
            vertical-align: middle !important;
        }
        .accordion-button::after {
            margin:0px auto !important
        }
        .table > :not(caption) > * > * {
            padding: 0 !important
        }
        .table tr th  {
            padding: 0 10px !important
        }
        .form-lable {
            background: #f1f2fe;
            border-radius: 5px;
            padding: 0 5px;
            top: -10px;
            left: 10px;
            font-size:12px;
        }
        .form-group {
            position: relative;
        }
        .form-control-sm,.form-select-sm {
            padding-top:  15px !important
        }
        .accordion-body .table tbody tr:nth-child(1) .form-lable {
            display: block !important
        }
        
        .accordion-body .table tbody tr  .form-lable {
           display: none
        }
        .accordion-body .table tbody tr  .form-control-sm,.form-select-sm {
            padding-top: 7px !important
        }
        .accordion-body .table tbody tr:nth-child(1)  .form-control-sm,.form-select-sm {
            padding-top:  13px !important
        }
        .accordion-body .table tbody tr td {
            padding:  0 10px 5px 0  !important
        }
        .accordion-body .table tbody tr td .form-select,.form-control,.input-group-text  {
            line-height: 1.2 !important
        } 
        .wall-delete-btn {
            padding: 8px 10px;
            right: 0;
            z-index: 11;
            border-radius:0 3px 0 10px !important
        }
        .more-btn-layer.collapsed .fa {
            transform: rotate(0deg) !important;
            transition: all .5s
        }  
        .more-btn-layer .fa {
            transform: rotate(180deg) !important;
            transition: all .5s
        }   
        .p1 {
            padding: 5px !important
        }     
        
        .time-bar {
            width: 100% !important;
            height: 1px;
            position: absolute;
            border: 1px dashed  gray;
            top: 45px
        }
        .timeline-steps  {
            display: flex;
            justify-content:space-between;
            /* align-items: center; */
            position: relative;
         
        }
        .timeline-step {
            padding: 10px;
            z-index: 1;
            border-radius: 15px;
            margin: 10px
        }
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
            border: 3px solid white
        }
        .timeline-content {
            display: flex;
            justify-content:center;
            align-items: center;
            flex-direction: column;
        }
 
        .table td,th {
            padding: 5px 10px !important ;
            vertical-align: middle !important
        }
        .table thead,th {
            background: #757CF2 !important;
            color: white
        }
        
         .table tbody thead,th {
            background: #757CF2 !important
        }
        .daterangepicker .calendar-table th, .daterangepicker .calendar-table td {
            background:  white !important
        }
        .daterangepicker td.active, .daterangepicker td.active:hover {
            background: #757CF2 !important
        }
        .dashboard-icon {
            font-size: 3rem !important;
        }
        #SvgjsText1885 {
            display: none !important;
        }
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
        app.controller('wizard', function($scope, $http, $rootScope) {
            $scope.result = []
            $rootScope.currentStep = 0;
            $scope.updateWizardStatus = (newStep) => {
                $rootScope.currentStep = newStep;
            }
            $scope.gotoStep = function(newStep) {
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
                } else if ($rootScope.currentStep == 5) {
                    $scope.$broadcast('callReview');
                }
            }
        });
    
       	app.controller('ProjectInfo', function ($scope, $http, $rootScope) {
       
            let projectTypefiredOnce = false;
            let deliveryTypefiredOnce = false;
            let buildingTypefiredOnce = false;
           

            $scope.getProjectType = () => {
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

            $scope.getDeliveryType = () => {
                if(deliveryTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("delivery-type.index") }}'
                }).then(function (res) {
                    deliveryTypefiredOnce = true;
                    $rootScope.deliveryTypes = res.data;		    
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
  
            $scope.getBuildingType = () => {
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

            $scope.getLastEnquiry = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("customers.get-enquiry", [$id,"project_info"]) }}',
                }).then(function (res){
                    $scope.projectInfo = $scope.getProjectInfoInptuData(res.data.project_info);
                }, function (error) {
                    console.log('projectinfo error');
                });
            }


            $scope.getProjectType();
            $scope.getBuildingType();
            $scope.getDeliveryType();
            $scope.getLastEnquiry(); 

            $scope.$on('callProjectInfo', function(e) {  
                if(!$("#projectInfoForm")[0].checkValidity()){
                    $rootScope.currentStep = 0;
                    return false;
                }
                $http({
                    method: 'PUT',
                    url: '{{ route('customers.update', $id) }}',
                    data: {type: 'project_info', 'data': $scope.getProjectInfoInptuData($scope.projectInfo)}
                }).then(function (res) {
                    
                }, function (error) {
                    console.log(`callprojectinfo ${error}`);
                });         
            });
                
            $scope.getProjectInfoInptuData = function($projectInfo) {
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

        app.controller('ServiceSelection', function ($scope, $http) {
            $scope.serviceList = [];

            $scope.getLastEnquiry = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("customers.get-enquiry",[$id,"services"]) }}',
                }).then(function (res){
                    $scope.serviceList = res.data.services;
                }, function (error) {
                    console.log('projectinfo error');
                });
            }
            $scope.getLastEnquiry(); 

           $scope.$on('callServiceSelection', function(e) { 
            if($scope.serviceList.length == 0){
                $rootScope.currentStep = 1;
                return false;
            }              
               $http({
                    method: 'PUT',
                    url: '{{ route('customers.update', $id) }}',
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

        app.controller('IFCModelUpload', function ($scope, $http, $parse, fileUploadService,  $rootScope) {
            let mandatoryUpload= [];
            $scope.PlanView = [];
            $scope.posterTitle = 'click here';

            $scope.fileName= function(element) {
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
                    var uploadUrl = '{{ route('customers.update', $id) }}'
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
            $scope.getLastEnquiry = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("customers.get-enquiry",[$id,"ifc_model_uploads"]) }}',
                }).then(function (res){
                    res.data.ifc_model_uploads.map( (item, index) => {
                        let [id, type] = [item.enquiry_id , item.document_type.slug];
                        console.log(type);
                        $scope.getIFCViewList(id,type);
                    });
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }
            $scope.getDocumentTypes();
            $scope.getLastEnquiry();                        

            $scope.$on('callIFCModelUpload', function(e) {

                mandatoryUpload.length != 0 && mandatoryUpload.map((view) => {
                                                alert(`mandatory file upload ${view}`);
                                                $rootScope.currentStep = 2;
                                            });
                // $http({
                //     method: 'POST',
                //     url: '{{ route("customers.store-enquiry") }}',
                //     data: {type: 'ifc_model_upload_mandatory', 'data': false}
                // }).then(function (res) {
                //     if(res.data.status == false) {
                //         res.data.data.map((field) => {
                //             console.log(field);
                //         });
                //     }
                // }, function (error) {
                //     console.log('This is embarassing. An error has occurred. Please check the log for details');
                // });
            }); 
        });
       
        app.directive('demoFileModel', function ($parse) {
            return {
                restrict: 'A', //the directive can be used as an attribute only
                link: function (scope, element, attrs) {
                    var model = $parse(attrs.demoFileModel),
                        modelSetter = model.assign; 
                    element.bind('change', function () {
                        scope.$apply(function () {
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
        });

        app.controller('CrudCtrl', function ($scope, $http) { 
            $scope.wallGroup = [];
            $scope.$on('callBuildingComponent', function(e) {
                // console.log( $scope.wallGroup);
                $http({
                    method: 'PUT',
                    url: '{{ route('customers.update', $id) }}',
                    data: {type: 'building_component', 'data': $scope.wallGroup}
                }).then(function (res) {
                    
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });      
            });
            $scope.getLastEnquiry = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("customers.get-enquiry",[$id,"building_component"]) }}',
                }).then(function (res){
                    console.log(res);
                    if(res.data.building_component.length == 0) {
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
                        getBuildingComponent()
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
                                            LayerName:  layerObj.layer.layer_name,
                                            LayerType:  layerObj.layer_type.layer_type_name,
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
                                WallId: item.wallId,
                                WallName: item.wall,
                                WallIcon: item.icon,
                                Details: Details
                            }
                        $scope.wallGroup.push(wall);
                    });
            
                }, function (error) {
                    console.log('projectinfo error');
                });
            }
            $scope.getLastEnquiry(); 

            $scope.getBuildingComponentInptuData = function() {
                return $scope.wallGroup;
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
            getLayer();

            $scope.AddWall  =   function() {
                $scope.wallGroup.unshift({
                    "WallName" : "",
                    "Details": [{
                        "Layers": [] 
                    }]
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
                            "LayerType": '',
                            "Thickness ": '',
                            "Breadth": '',
                        }
                    ] 
                });
            } 
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
                        if(typeof(scope.w.WallId) == 'undefined' || typeof(scope.l.LayerName) == 'undefined') {
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
        });

        app.controller('Review', function($scope, $http, $rootScope) {

            $scope.$on('callReview', function(e) {
              
                getEnquiry = ()  => {
                    $http({
                        method: 'GET',
                        url: '{{ route("customers.edit-enquiry-review", $id) }}'
                    }).then(function (res) {
                        $scope.project_info = res.data.project_infos;
                        $scope.services = res.data.services;
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
            getLastEnquiry = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("customers.get-enquiry",[$id,"additional_info"]) }}',
                }).then(function (res){
                    $scope.comments = res.data.additional_infos;
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }
            getLastEnquiry();
            $scope.addComment = () => {
                if(typeof($scope.additionalInfo) == 'undefined') {
                    return false;
                }
                $http({
                    method: 'POST',
                    url: '{{ route("customers.update", $id) }}',
                    data: {type: 'addtional_info', 'data': $scope.additionalInfo}
                }).then(function (res) {
                   $scope.comments = res.data;
                }, function (error) {
                    console.log(`additional info ${error}`);
                });         
            }       
        });

    </script>
   
@endpush