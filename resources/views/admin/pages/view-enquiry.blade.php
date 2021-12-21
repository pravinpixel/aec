     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page"  ng-app="myApp">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater') 
            </div>                

            <div class="card border">
                <div class="card-body   py-0">
                    
                        <div id="rootwizard">
                       
                              
                            <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
                                <li class="time-bar"></li>
                                <li class="nav-item ">
                                    <a href="#!/"  style="min-height: 40px;" class="timeline-step  " >
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-success">
                                                <i class="fa fa-address-book "></i>
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Enquiry</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#!/Project_Info"   style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-success">
                                                <i class="fa fa-building "></i>
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Project Info</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#!/Technical_Estimate" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle bg-success">
                                                <i class="fa fa-briefcase "></i>
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Technical Estimate</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#!/Cost_Estimate" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-success">
                                                <i class="fa fa-money"></i>
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Cost Estimate</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#!/Proposal_Sharing" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-success">
                                                <i class="fa fa-share-alt "></i>
                                            </div>                                                                        
                                        </div>
                                        <p class="h5 mt-2">Proposal Sharing</p>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#!/Project_Award"  style="min-height: 40px;"  class="timeline-step">
                                        <div class="timeline-content ">
                                            <div class="inner-circle  bg-success">
                                                <i class="fa fa-trophy "></i>
                                            </div>
                                        </div>
                                        <p class="h5  mt-2">Project Award</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#!/Delivery" style="min-height: 40px;"  class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-success">
                                                <i class="fa  fa-truck "></i>
                                            </div>
                                        </div>
                                        <p class="h5  mts-2">Final</p>
                                    </a>
                                </li>
                            </ul>
                          
                            <!-- Wizz Contents -->
                            <div class="tab-content">
                                <div ng-view></div>
                            </div>
                             
                            <!-- End Wizz Contents -->
                             
                        </div>  
                    

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
        /* .table > :not(caption) > * > * {
            padding: 0 !important
        } */
        .table tbody tr td{
            padding:  10px !important
        }
        .table tbody thead tr  th{
            padding:  10px !important
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
       
    </style>
     <style>
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
        .nav-item.active .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
        
        .timeline-step .inner-circle:hover {
            background: #8a90ff !important;
        }
        .nav-item {
            z-index: 1 !important ;
        }
        .bg-light-primary {
            background: #ebecfd !important;
            color: #8a90ff !important;
            font-weight: bold
        }
    </style>   
@endpush

@push('custom-scripts')


    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("nav-item");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
    </script>

    

    <!-- end demo js-->
    <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    

    <script>
        var app = angular.module("myApp", ["ngRoute"]);

        app.config(function($routeProvider) {
            $routeProvider
        
            .when("/", {
                templateUrl : " {{ route('admin-enquiry-wiz') }} "
            })
            .when("/Project_Info", {
                templateUrl : "{{ route('admin-project-info-wiz') }}"
            })
            .when("/Technical_Estimate", {
                templateUrl : "{{ route('admin-Technical_Estimate-wiz') }}"
            })
            .when("/Cost_Estimate", {
                templateUrl : "{{ route('admin-Cost_Estimate-wiz') }}"
            })
            .when("/Proposal_Sharing", {
                templateUrl : "{{ route('admin-Proposal_Sharing-wiz') }}"
            })
            .when("/Project_Award", {
                templateUrl : "{{ route('admin-Project_Award-wiz') }}"
            })
            .when("/Delivery", {
                templateUrl : "{{ route('admin-Delivery-wiz') }}"
            })
        });
            // Code goes here

        // angular.module("myApp", ['ngRoute'])
        //     .constant("isActiveConfig", {
        //         activeClass: "active"
        //     })
        //     .controller("CommonCtrl", function($rootScope, $scope, $location){
        //         $rootScope.$on("$locationChangeSuccess", function(event, newUrl){
        //         if($location.url() == '/') $scope.isMain = true;
        //         else $scope.isMain = false;
        //         });
        //     })
        //     .directive("isActive", function($location, $rootScope, isActiveConfig) {
        //         return {
        //         restrict: "A",
        //         link: function(scope, element, attr) {
        //             if (element[0].nodeName.toLowerCase() !== "a") {
        //             return;
        //             }
        //             var locWatch = $rootScope.$on("$locationChangeSuccess", function(event, newUrl){
        //             var href = element.prop('href');
        //             if (newUrl !== href) {
        //                 attr.$removeClass(name);
        //             } else {
        //                 attr.$addClass(name);
        //             }
        //             });
        //             var name = attr.isActive || isActiveConfig.activeClass || "active";
        //             scope.$on("$destroy", locWatch);
        //         }
        //         }
        //     })
        //     .config(function($routeProvider) {
        //         $routeProvider
        //     .when("/", {
        //         templateUrl : " {{ route('admin-enquiry-wiz') }} "
        //     })
        //     .when("/Project_Info", {
        //         templateUrl : "{{ route('admin-project-info-wiz') }}"
        //     })
        //     .when("/Technical_Estimate", {
        //         templateUrl : "{{ route('admin-Technical_Estimate-wiz') }}"
        //     })
        //     .when("/Cost_Estimate", {
        //         templateUrl : "{{ route('admin-Cost_Estimate-wiz') }}"
        //     })
        //     .when("/Proposal_Sharing", {
        //         templateUrl : "{{ route('admin-Proposal_Sharing-wiz') }}"
        //     })
        //     .when("/Project_Award", {
        //         templateUrl : "{{ route('admin-Project_Award-wiz') }}"
        //     })
        //     .when("/Delivery", {
        //         templateUrl : "{{ route('admin-Delivery-wiz') }}"
        //     })
        //     .otherwise({
        //         redirectTo: "/"
        //     });
        // });
        app.controller('CrudCtrl', ['$scope', function($scope) {
            $scope.wallGroup  = [
                {
                    "WallName" : "External Wall",
                    "WallIcon" : "dripicons-store", 
                    "Details": [
                        {
                            "FloorName" : "Ground Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Internal Wall",
                    "WallIcon" : "uil uil-store-alt", 
                    "Details": [
                        {
                            "FloorName" : "First Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Partition Wall",
                    "WallIcon" : "uil uil-wall", 
                    "Details": [
                        {
                            "FloorName" : "New Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Ceiling",
                    "WallIcon" : "uil uil-layers", 
                    "Details": [
                        {
                            "FloorName" : "Top Right Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Roof",
                    "WallIcon" : "uil uil-mountains-sun", 
                    "Details": [
                        {
                            "FloorName" : "Top Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                } 
            ]; 
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
                    "FloorName" : "Ground Floor",
                    "FloorNumber" : "1",
                    "TotalArea" : "2500",
                    "DeliveryType" : "Fire Proof",
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
                // console.log(  fIndex , Secindex , ThreeIndex);
                $scope.wallGroup[fIndex].Details[Secindex].Layers.splice(ThreeIndex,1);
            } 
        }]);
    </script>

    
 
@endpush