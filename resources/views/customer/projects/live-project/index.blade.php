     
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
            <input type="hidden" name="project_id" id="project_id" value="{{ $id }}"> 
            <div class="card border">
               
                <div class="card-body pt-0 pb-0">
                               
                    <div id="rootwizard" ng-controller="CustomerProjectController">
                        <ul class="nav nav-pills nav-justified form-wizard-header bg-light ">
                            <li class="nav-item">
                                <a href="#!/" style="min-height: 40px;" id= "overview" class="timeline-step wizard_active active" data-is-active="active">
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/create-plateform.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2"> Overview</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#!/milestone" id= "milestone" style="min-height: 40px;" class="timeline-step wizard_active" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/mailtone.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2"> Milestone</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#!/bim360" style="min-height: 40px;" id="bim360" class="timeline-step wizard_active" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/bim360.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">BIM 360</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#!/tickets" style="min-height: 40px;" id="issues" class="timeline-step wizard_active" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <span class="position-absolute  translate-middle badge rounded-pill bg-danger" >{{ ($data['issues'] ) }}</span>
                                            <img src="{{ asset("public/assets/icons/tikets.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Issues</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#!/variation-orders" style="min-height: 40px;" id = "variation" class="timeline-step" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/orders.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Variation Orders</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#!/doc-management" style="min-height: 40px;" id="document" class="timeline-step wizard_active" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/doc-man.png") }}" class="w-50 invert">
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Documents</p>
                                </a>
                            </li>
                            <li class="nav-item last">
                                <a href="#!/notes" style="min-height: 40px;" id="notes" class="timeline-step wizard_active" data-is-active>
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary " >
                                            <img src="{{ asset("public/assets/icons/notes.png") }}" class="w-50 invert">
                                        </div>
                                    </div> 
                                    <p class="h5 mt-2">Final Feedback</p>
                                </a>
                            </li> 
                        </ul>  
                        <div ng-view></div> <!-- tab-content -->
                    </div> <!-- end #rootwizard--> 
                </div> <!-- end card-body -->
            </div>
            </div> <!-- container -->
            
            
        </div> <!-- content --> 

    </div>  
@endsection
 

@push('custom-scripts')

<script src="{{ asset('public/assets/js/vendor/jstree.min.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/demo.jstree.js') }}"></script>
<script src="{{ asset("public/custom/js/ngControllers/customer/project/customer-project.js") }}"></script> 
{{--<script data-require="jquery@*" data-semver="2.0.3" src="https://code.jquery.com/jquery-2.0.3.min.js"></script>--}}
{{--  <script src="{{ asset("public/custom/js/ngControllers/admin/project/tag.js") }}"></script> --}}
       
    <script>
            app.controller("CustomerProjectController", function($rootScope, $scope, $location){
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
                    $scope.NextRoute   =   "/bim360"
                }
                
                if($location.path() == '/bim360') {
                  
                    $scope.PrevRoute   =   "/task-list"
                    $scope.NextRoute   =   "/tickets"
                }
                if($location.path() == '/tickets') {
                    $scope.PrevRoute   =   "/bim360"
                    $scope.NextRoute   =   "/doc-management"
                    //$scope.NextRoute   =   "/variation-orders"
                }
                if($location.path() == '/variation-orders') {
                    $scope.PrevRoute   =   "/tickets"
                    $scope.NextRoute   =   "/doc-management"
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
                    $scope.PrevRoute        =   "/doc-management"
                    $scope.NextRoute        =   "/notes"
                    $scope.HideNextRoute    =   false;
                    $scope.SubmitRoute      =   true;
                }
            });
         });
         app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('customer-live-project.overview') }}",
                controller: 'OverviewController',
            }) 
            .when("/milestone", {
                templateUrl : "{{ route('live-project.milestone') }}",
                controller: 'milestoneController',
            })
           
            .when("/bim360", {
                templateUrl : "{{ route('customer-live-project.bim360') }}",
                controller: 'Bim360Controller',
            })
            .when("/tickets", {
                templateUrl : "{{ route('customer-live-project.tickets') }}",
                controller: 'TicketController',
            })
            .when("/variation-orders", {
                templateUrl : "{{ route('customer-live-project.variation-orders') }}",
                controller: 'VariationController',
            })
           
            .when("/doc-management", {
                templateUrl : "{{ route('customer-live-project.doc-management') }}",
                controller: 'DocumentController',
            })
            .when("/notes", {
                templateUrl : "{{ route('customer-live-project.notes') }}",
                controller: 'GendralController',
            }) 
            .otherwise({
                redirectTo: "/"
            });
        });


</script>

  
@endpush