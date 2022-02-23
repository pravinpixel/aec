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
                    <div class="card-body py-0"> 
                        <div id="rootwizard">
                            <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
                                <li class="time-bar"></li>
                                <li class="nav-item Create_Project">
                                    <a href="#/create-project" style="min-height: 40px;" class="timeline-step" data-is-active="active">
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
                                        <p class="h5 mt-2">Platform</p>
                                    </a>
                                </li> 
                                <li class="nav-item Team_Setup">
                                    <a href="#/team-setup" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle bg-secondary ">
                                                <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Team-setup</p>
                                    </a>
                                </li> 
                                <li class="nav-item Project_Scheduling">
                                    <a href="#/project-scheduling" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle bg-secondary ">
                                                <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">project-scheduling</p>
                                    </a>
                                </li> 
                                <li class="nav-item Invoice_Plan">
                                    <a href="#/invoice-plan" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle bg-secondary ">
                                                <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Invoice_Plan</p>
                                    </a>
                                </li> 
                                <li class="nav-item To_Do_List">
                                    <a href="#/to-do-listing" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle bg-secondary ">
                                                <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">To-do List</p>
                                    </a>
                                </li>                                
                                <li class="nav-item admin-Delivery-wiz">
                                    <a href="#/move-to-project" style="min-height: 40px;"  class="timeline-step" >
                                        <div class="timeline-content">
                                            <div class="inner-circle bg-secondary">
                                                <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5  mts-2">Review & Submit</p>
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
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')
    <script>        
        app.constant("isActiveConfig", {
            activeClass: "active"
        });
        app.controller("projectController", function($rootScope, $scope, $location){
            $rootScope.$on("$locationChangeSuccess", function(event, newUrl){
                if($location.url() == '/') $scope.isMain = true;
                else $scope.isMain = false;
            });
        });
        app.directive("isActive", function($location, $rootScope, isActiveConfig) {
            return {
                restrict: "A",
                link: function(scope, element, attr) {
                    if (element[0].nodeName.toLowerCase() !== "a") {
                        return;
                    }
                    var locWatch = $rootScope.$on("$locationChangeSuccess", function(event, newUrl){
                        var href = element.prop('href');
                        if (newUrl !== href) {
                            attr.$removeClass(name);
                        } else {
                            attr.$addClass(name);
                        }
                    });
                    var name = attr.isActive || isActiveConfig.activeClass || "active";
                    scope.$on("$destroy", locWatch);
                }
            }
        });
        app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                template : "Create Project",
            }) 
            .when("/create-project", {
                template : "Create Project",
            }) 
            .when("/platform", {
                template : "platform",
            }) 
            .otherwise({
                redirectTo: "{{ route('projects') }}"
            });
        });
    </script>
@endpush
 