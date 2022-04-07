@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" ng-controller="LiveProjectController">
        <div class="content">

            @include('admin.includes.top-bar')
            <div class="container-fluid">
                
                <!-- start page title -->
                @include('admin.includes.page-navigater')
                <!-- end page title -->

                <div class="card border">
                    <div class="card-header p-0">
                        <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header m-0 p-0 bg-light timeline-steps">
                            <li class="time-bar"></li>
                            <li class="nav-item">
                                <a href="#!/" style="min-height: 40px;" class="timeline-step" data-is-active="active">
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/create-plateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Project overview</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#!/milestone" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/connectplateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2"> milestone</p>
                                </a>
                            </li>    
                            <li class="nav-item">
                                <a href="#!/bim360" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/connectplateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">bim360</p>
                                </a>
                            </li>                         
                            <li class="nav-item">
                                <a href="#!/tickets" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/connectplateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">tickets</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#!/variation-orders" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/connectplateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">variation-orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#!/invoice-status" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/connectplateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">invoice-status</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#!/doc-management" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/connectplateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">doc-management</p>
                                </a>
                            </li>
                            <li class="nav-item last">
                                <a href="#!/notes" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/connectplateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">notes</p>
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
@push('custom-styles')
    <link href="{{ asset('public/assets/css/vendor/jstree.min.css') }}" rel="stylesheet" type="text/css">
@endpush
@push('custom-scripts')
    <script src="{{ asset('public/assets/js/vendor/jstree.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.jstree.js') }}"></script>

    <script>        
        
        app.controller("LiveProjectController", function($rootScope, $scope, $location){
            $rootScope.$on("$locationChangeSuccess", function(event, newUrl){
                if($location.url() == '/') $scope.isMain = true;
                else $scope.isMain = false;
            });
        });
         
        app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('live-project.overview') }}",
            }) 
            .when("/milestone", {
                templateUrl : "{{ route('live-project.milestone') }}",
            })
            .when("/task-list", {
                templateUrl : "{{ route('live-project.task-list') }}",
            })
            .when("/bim360", {
                templateUrl : "{{ route('live-project.bim360') }}",
            })
            .when("/tickets", {
                templateUrl : "{{ route('live-project.tickets') }}",
            })
            .when("/variation-orders", {
                templateUrl : "{{ route('live-project.variation-orders') }}",
            })
            .when("/invoice-status", {
                templateUrl : "{{ route('live-project.invoice-status') }}",
            })
            .when("/doc-management", {
                templateUrl : "{{ route('live-project.doc-management') }}",
            })
            .when("/notes", {
                templateUrl : "{{ route('live-project.notes') }}",
            }) 
            .otherwise({
                redirectTo: "/"
            });
        });
    </script>
@endpush
 