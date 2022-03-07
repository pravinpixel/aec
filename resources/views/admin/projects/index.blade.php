@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" ng-controller="projectController">
        <div class="content" >

            @include('admin.includes.top-bar')
            <div class="container-fluid">
                
                <!-- start page title -->
                @include('admin.includes.page-navigater')
                <!-- end page title -->

                <div class="card border">
                    <div class="card-header p-0">
                        <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header m-0 p-0 bg-light timeline-steps">
                            <li class="time-bar"></li>
                            <li class="nav-item Create_Project">
                                <a href="#/" style="min-height: 40px;" class="timeline-step" data-is-active="active">
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Create Project</p>
                                </a>
                            </li> 
                            <li class="nav-item Platform">
                                <a href="#/platform" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Connect Platform</p>
                                </a>
                            </li> 
                            <li class="nav-item Team_Setup">
                                <a href="#/team-setup" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary ">
                                            <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Team Setup</p>
                                </a>
                            </li> 
                            <li class="nav-item Project_Scheduling">
                                <a href="#/project-scheduling" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary ">
                                            <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Project Scheduling</p>
                                </a>
                            </li> 
                            <li class="nav-item Invoice_Plan">
                                <a href="#/invoice-plan" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary ">
                                            <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Invoice Plan</p>
                                </a>
                            </li> 
                            <li class="nav-item To_Do_List">
                                <a href="#/to-do-listing" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary ">
                                            <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">To-do List</p>
                                </a>
                            </li>                                
                            <li class="nav-item admin-Delivery-wiz">
                                <a href="#/review-n-submit" style="min-height: 40px;"  class="timeline-step" data-is-active >
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary">
                                            <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5  mts-2">Review & Submit</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    {{-- =====NG View  =====--}}
                        <div ng-view></div>
                    {{-- =======NG View ==== --}}
                </div>
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')
    <script>        
        
        app.controller("projectController", function($rootScope, $scope, $location){
            $rootScope.$on("$locationChangeSuccess", function(event, newUrl){
                if($location.url() == '/') $scope.isMain = true;
                else $scope.isMain = false;
            });
        });
         
        app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('create-project') }}",
            }) 
            .when("/platform", {
                templateUrl : "{{ route('platform') }}",
            })
            .when("/team-setup", {
                templateUrl : "{{ route('team-setup') }}",
            })
            .when("/project-scheduling", {
                templateUrl : "{{ route('project-schedule') }}",
            })
            .when("/invoice-plan", {
                templateUrl : "{{ route('invoice-plan') }}",
            })
            .when("/to-do-listing", {
                templateUrl : "{{ route('to-do-listing') }}",
            })
            .when("/review-n-submit", {
                templateUrl : "{{ route('review-n-submit') }}",
            })
            .otherwise({
                redirectTo: "/"
            });
        });
    </script>
@endpush
 