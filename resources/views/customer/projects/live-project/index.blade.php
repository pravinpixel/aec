@extends('layouts.customer')

@section('customer-content')
   
    <div class="content-page" ng-controller="LiveProjectController">
        <div class="content">

            @include('customer.includes.top-bar')
            <div class="container-fluid">
                
                <!-- start page title -->
                @include('customer.includes.page-navigater')
                <!-- end page title --> 
                <input type="hidden" name="project_id" id="project_id" value="{{ $id }}"> 
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
                                    <p class="h5 mt-2"> Overview</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#!/milestone" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/mailtone.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2"> Milestone</p>
                                </a>
                            </li>    
                            <li class="nav-item">
                                <a href="#!/task-list" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/task-list.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2"> Task list</p>
                                </a>
                            </li>    
                            <li class="nav-item">
                                <a href="#!/bim360" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/bim360.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">BIM 360</p>
                                </a>
                            </li>                         
                            <li class="nav-item">
                                <a href="#!/tickets" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/tikets.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Issues</p>
                                </a>
                            </li>
                         <!--   <li class="nav-item">
                                <a href="#!/variation-orders" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/orders.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Variation Orders</p>
                                </a>
                            </li> -->
                                  <li class="nav-item">
                                <a href="#!/invoice-status" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/invoice.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Invoice Plan</p>
                                </a>
                            </li> 
                          {{--  <li class="nav-item">
                                <a href="#!/doc-management" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/doc-man.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Documents</p>
                                </a>
                            </li> --}}
                            <li class="nav-item last">
                                <a href="#!/notes" style="min-height: 40px;" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/notes.png") }}" class="w-50 invert">
                                        </div>
                                    </div> 
                                    <p class="h5 mt-2">General Notes</p>
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
    <script src="{{ asset("public/custom/js/ngControllers/customer/project/customer-project.js") }}"></script> 
    <script src="{{ asset("public/custom/js/ngControllers/admin/project/tag.js") }}"></script> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset("public/js/datepicker.js") }}"></script>
    <script> 





        app.controller("LiveProjectController", function($rootScope, $scope, $location){
            $rootScope.$on("$locationChangeSuccess", function(event, newUrl){

                if($location.url() == '/') $scope.isMain = true; else $scope.isMain = false; 
                $scope.PrevRoute    =  ""; $scope.NextRoute = ""; 
                $scope.id = $rootScope.categoryId;
                
                $scope.indexRoute       =   true;
                $scope.HideNextRoute    =   true;
                $scope.SubmitRoute      =   false;

                if($location.url()  == '/') {
                    $scope.NextRoute   =   "/milestone"
                    $scope.indexRoute   =   false;
                }
                if($location.path() == '/milestone') { 
                    $scope.PrevRoute   =   "/"
                    $scope.NextRoute   =   "/task-list"
                }
                if($location.path() == '/task-list') {
                    $scope.PrevRoute   =   "/milestone"
                    $scope.NextRoute   =   "/bim360"
                }
                if($location.path() == '/bim360') {
                    $scope.PrevRoute   =   "/task-list"
                    $scope.NextRoute   =   "/tickets"
                }
                if($location.path() == '/tickets') {
                    $scope.PrevRoute   =   "/bim360"
                    $scope.NextRoute   =   "/invoice-status"
                    //$scope.NextRoute   =   "/variation-orders"
                }
                if($location.path() == '/variation-orders') {
                    $scope.PrevRoute   =   "/tickets"
                    $scope.NextRoute   =   "/invoice-status"
                }
                if($location.path() == '/invoice-status') {
                    //$scope.PrevRoute   =   "/variation-orders"
                    $scope.PrevRoute   =   "/tickets"
                    $scope.NextRoute   =   "/doc-management"
                }
                if($location.path() == '/doc-management') {
                    $scope.PrevRoute   =   "/invoice-status"
                    $scope.NextRoute   =   "/notes"
                }
                if($location.path() == '/notes') {
                    $scope.PrevRoute        =   "/invoice-status"
                    $scope.NextRoute        =   "/notes"
                    $scope.HideNextRoute    =   false;
                    $scope.SubmitRoute      =   true;
                }
            });

          
        });

        app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('live-project.overview') }}",
            }) 
            .when("/milestone", {
                templateUrl : "{{ route('live-project.milestone') }}",
                controller: 'milestoneController',
            })
            .when("/task-list", {
                templateUrl : "{{ route('live-project.task-list') }}",
                controller: 'TasklistController',

            })
            .when("/bim360", {
                templateUrl : "{{ route('live-project.bim360') }}",
            })
            .when("/tickets", {
                templateUrl : "{{ route('live-project.tickets') }}",
                controller: 'CustomerTicketController',
            })
            .when("/variation-orders", {
                templateUrl : "{{ route('live-project.variation-orders') }}",
                controller: 'CustomerTicketController',
            })
            .when("/invoice-status", {
                templateUrl : "{{ route('live-project.invoice-status') }}",
                controller: 'InvoiceController',
            })
            .when("/doc-management", {
                templateUrl : "{{ route('live-project.doc-management') }}",
            })
            .when("/notes", {
                templateUrl : "{{ route('live-project.notes') }}",
                controller: 'GendralController',
            }) 
            .otherwise({
                redirectTo: "/"
            });
        });


    


  

       
    
    </script> 

    
@endpush