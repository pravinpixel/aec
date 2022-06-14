@extends('layouts.admin')

@section('admin-content')
    <div class="content-page" >
        <div class="content"  ng-controller="moduleController" >

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')

                <!-- end page title --> 

                <div class="row">
                    
                    <div class="col-sm-2 mb-2 mb-sm-0">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            {{-- <a class="nav-link moduleTab" id="moduleTab"  href="#!/" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">
                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                <span class="d-none d-md-block" ng-click="moduleGetData()">Module</span>
                            </a> --}}
                            <a class="nav-link roleTab"   id="v-pills-role-tab"  id="roleTab" ng-model="btnClass" href="#!/role" role="tab" aria-controls="v-pills-role"
                                aria-selected="true">
                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                <span class="d-none d-md-block" ng-click="roleGetData()">Role</span>
                            </a>
                            <a class="nav-link masterTab" href="#!/master-estimate" role="tab" aria-controls="v-pills-master"
                                aria-selected="false">
                                <i class="mdi mdi-master-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Master Estimation</span>
                            </a>
                            <a class="nav-link componentTab" id="v-pills-component-tab" href="#!/component" role="tab" aria-controls="v-pills-component"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block" ng-click="componentGetData()">Building Component</span>
                            </a>
                            <a class="nav-link typeTab" id="v-pills-type-tab" href="#!/type" role="tab" aria-controls="v-pills-type"
                                aria-selected="false">
                                <i class="mdi mdi-type-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block"  ng-click="typeGetData()">Building Type</span>
                            </a>
                            <a class="nav-link projectTypeTab" id="v-pills-project_type-tab"  href="#!/projectType" role="tab" aria-controls="v-pills-project_type"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block"  ng-click="projectTypeGetData()">Project Type</span>
                            </a>
                            <a class="nav-link documentTab" id="v-pills-document-tab"  href="#!/documentType" role="tab" aria-controls="v-pills-document"
                                aria-selected="false">
                                <i class="mdi mdi-document-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block" ng-click="documentTypeGetData()">Document Type</span>
                            </a>
                            <a class="nav-link layerTab" id="v-pills-layer-tab" href="#!/layer" role="tab" aria-controls="v-pills-layer"
                                aria-selected="false">
                                <i class="mdi mdi-layer-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block"  ng-click="layerGetData()" >Layer</span>
                            </a>
                            
                            <a class="nav-link deliveryTab" id="v-pills-DeliveryLayer-tab" href="#!/deliveryType"  role="tab" aria-controls="v-pills-DeliveryLayer"
                                aria-selected="false">
                                <i class="mdi mdi-DeliveryLayer-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block" ng-click="deliveryTypeGetData()" >Delivery Type</span>
                            </a> 
                            <a class="nav-link outputTab" id="v-pills-output-tab" href="#!/output"  role="tab" aria-controls="v-pills-output"
                                aria-selected="false">
                                <i class="mdi mdi-output-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block"  ng-click="outputGetData()" >Output Type</span>
                            </a>
                            <a class="nav-link serviceTab" id="v-pills-service-tab" href="#!/service" role="tab" aria-controls="v-pills-service"
                                aria-selected="false">
                                <i class="mdi mdi-service-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block"  ng-click="serviceGetData()" >Service</span>
                            </a>
                            <a class="nav-link taskListTab" id="v-pills-service-tab" href="#!/task-list-view" role="tab" aria-controls="v-pills-service"
                                aria-selected="false">
                                <i class="mdi mdi-service-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block" >Task list</span>
                            </a>
                            <a class="nav-link checkListTab" id="v-pills-service-tab" href="#!/check-list" role="tab" aria-controls="v-pills-service"
                                aria-selected="false">
                                <i class="mdi mdi-service-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block"  ng-click="serviceGetData()" >Check list</span>
                            </a>

                            <a class="nav-link checkListTab" id="v-pills-wood-estimation-tab" href="#!/wood-estimation" role="tab" aria-controls="v-pills-wood-estimation"
                                aria-selected="false">
                                <i class="mdi mdi-service-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block"  ng-click="getWoodEstimation()" >Wood Estimation</span>
                            </a>

                            <a class="nav-link checkListTab" id="v-pills-precast-estimation-tab" href="#!/precast-estimation" role="tab" aria-controls="v-pills-precast-estimation"
                                aria-selected="false">
                                <i class="mdi mdi-service-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block"  ng-click="getPrecastEstimation()" >Precast Estimation</span>
                            </a>
                            
                        </div>
                    </div> <!-- end col-->
                
                    <div class="col-sm-10">
                        
                        
                        <div class="tab-content" id="v-pills-tabContent">
                              <ng-view/>
                        </div> <!-- end tab-content-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->
                
            </div> <!-- container --> 

        </div> <!-- content --> 
    </div> 
@endsection

@push('custom-styles')
    
    <style>
        .nav-link.active   {
            color: #727cf5 !important;
            background-color: rgba(114,124,245,.18) !important;
        }
        .dataTables_length {
            display: none !important
        }
        .table td  {
            padding: 5px 15px !important
        }
        .table thead tr th {
            padding: 10px !important
        }
        
        .form-control.ng-invalid   {
            border: 1px solid red !important
        }
        .form-control.ng-touched + .help-inline {
            visibility: visible;
        }
        .form-control.has-error.ng-not-empty.ng-dirty.ng-valid-parse.ng-valid.ng-valid-required {
            border: 1px solid lightgreen !important
        }

        .help-inline {
            visibility: hidden !important;
        }
        
        .req {
            font-size: 90%;
            font-style: italic;
            color: red;
        }
   
    </style>

    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('custom-scripts')
    <script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#menu-table').DataTable({
            "ordering": false
        });
    </script>
    <script >
        $(document).ready(function(){
            angular.element(document.querySelector("#loader")).addClass("d-none");
        }); 
        app.config(function($routeProvider,API_URL) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('role-file')  }}"
            })
            .when("/role", {
                templateUrl : "{{ route('role-file')  }}"
            }) 
            .when("/master-estimate", {
                templateUrl : "{{ route('masterEstimation-file')  }}"
            })
            .when("/component", {
                templateUrl : "{{ route('component-file')  }}"
            })
            .when("/type", {
                templateUrl : "{{ route('type-file')  }}"
            })
            .when("/documentType", {
                templateUrl : "{{ route('documentType-file')  }}"
            })
            .when("/projectType", {
                templateUrl : "{{ route('projectType-file')  }}"
            })
            .when("/layer", {
                templateUrl : "{{ route('layer-file')  }}"
            })
            .when("/deliveryType", {
                templateUrl : "{{ route('deliveryType-file')  }}"
            })
            .when("/layerType", {
                templateUrl : "{{ route('layerType-file')  }}"
            })
            .when("/output", {
                templateUrl : "{{ route('output-file')  }}"
            })
            .when("/service", {
                templateUrl : "{{ route('service-file')  }}"
            })
            .when("/task-list-view", {
                templateUrl : "{{ route('task-list-view')  }}",
                controller : "TaskListController"
            })
            .when("/check-list", {
                templateUrl : "{{ route('check-list-file')  }}",
                controller : "CheckListController"
            })
            .when("/permission/:id", {
                templateUrl: function(params) {
                    return API_URL +'permission/'+params.id;
                },
                controller: 'PermissionCtrl'
            })
            .when("/wood-estimation", {
                templateUrl : "{{ route('wood-estimation')  }}",
                controller : "WoodEstimateController"
            })
            .when("/precast-estimation", {
                templateUrl : "{{ route('precast-estimation')  }}",
                controller : "PrecastEstimateController"
            })
        });
        app.controller('PermissionCtrl', function($scope, $http, $routeParams,API_URL){
            $scope.setPermission = (role_id) => {
                $http({
                    method: 'PUT',
                    url: `${API_URL}set-permission/${role_id}`,
                    data: $scope.permissionForm
                }).then(function successCallback(res) {
                    if(res.data.status == true){
                        Message('success',res.data.msg);
                        return false;
                   }
                }, function errorCallback(error) {
                    return false;
                });
            }
            getPermission = (role_id) => {
                $http({
                    method: 'GET',
                    url: `${API_URL}get-permission/${role_id}`,
                }).then(function successCallback(res) {
                    if(res.data.status == true){
                        $scope.permissionForm = res.data.permission
                        return false;
                    } 
                }, function errorCallback(error) {
                    return false;
                });
            }
            var role_id = $routeParams.id
            getPermission(role_id);
        });

        app.controller('WoodEstimateController', function($scope, $http, $routeParams,API_URL){
            function getWoodEstimates() {
                $http.get(`${API_URL}wood-estimate`).then((res)=> {
                    $scope.woodEstimations = res.data; 
                });
            }
            getWoodEstimates();

            $scope.toggleModalForm = function (modalstate, id) {
                $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Task";
                        $scope.form_color = "primary";
                        $scope.modalstate   =   'add'
                        $scope.task_list_item = {};
                        $('#woodestimate-form-popup').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Task";
                        $scope.form_color = "success";
                        $scope.id = id; 
                        $scope.task_list_item = {};
                        $http.get(`${API_URL}wood-estimate/${id}`)
                            .then(function (response) {
                                $scope.wood_estimate_item = response.data.data;
                                $('#woodestimate-form-popup').modal('show');
                            });
                        break;
                    
                    default:
                        break;
                } 
            }

            $scope.storeModalWoodForm = (modalstate, id) => { 
                $http({
                    method: `${modalstate == 'edit' ? 'PUT' : 'POST'}`,
                    url: `${API_URL}wood-estimate${modalstate == 'edit' ? '/'+id : ''}`,
                    data:$.param($scope.wood_estimate_item),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function successCallback(response) {
                    $('#woodestimate-form-popup').modal('hide');
                    Message('success',response.data.msg);
                    getWoodEstimates();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors.name[0]);
                });
            }

            $scope.changeWoodEstimateStatus = (id , params) =>{
                $http({
                    method: "put",
                    url: `${API_URL}wood-estimate/${id}/status`,
                    data: $.param({'is_active':params == 1 ? 0 : 1}),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    getWoodEstimates();
                    Message('success',response.data.msg);
                }), (function (error) {
                    console.log(error);
                });
            }

            $scope.delete   =   (id) => {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if(willDelete) {
                        $http.delete(`${API_URL}wood-estimate/${id}`).then(function (response) {
                            getWoodEstimates();
                            Message('success',response.data.msg);
                        }); 
                    }
                });
            }
        });

        app.controller('PrecastEstimateController', function($scope, $http, $routeParams, API_URL){
            function getPrecastEstimates() {
                $http.get(`${API_URL}precast-estimate`).then((res)=> {
                    $scope.precastEstimations = res.data; 
                });
            }
            getPrecastEstimates();

            $scope.toggleModalForm = function (modalstate, id) {
                $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Task";
                        $scope.form_color = "primary";
                        $scope.modalstate   =   'add'
                        $scope.task_list_item = {};
                        $('#precastestimate-form-popup').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Task";
                        $scope.form_color = "success";
                        $scope.id = id; 
                        $scope.task_list_item = {};
                        $http.get(`${API_URL}precast-estimate/${id}`)
                            .then(function (response) {
                                $scope.precast_estimate_item = response.data.data;
                                $('#precastestimate-form-popup').modal('show');
                            });
                        break;
                    
                    default:
                        break;
                } 
            }

            $scope.storeModalprecastForm = (modalstate, id) => { 
                $http({
                    method: `${modalstate == 'edit' ? 'PUT' : 'POST'}`,
                    url: `${API_URL}precast-estimate${modalstate == 'edit' ? '/'+id : ''}`,
                    data:$.param($scope.precast_estimate_item),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function successCallback(response) {
                    $('#precastestimate-form-popup').modal('hide');
                    Message('success',response.data.msg);
                    getPrecastEstimates();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors.name[0]);
                });
            }

            $scope.changeprecastEstimateStatus = (id , params) =>{
                $http({
                    method: "put",
                    url: `${API_URL}precast-estimate/${id}/status`,
                    data: $.param({'is_active':params == 1 ? 0 : 1}),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    getPrecastEstimates();
                    Message('success',response.data.msg);
                }), (function (error) {
                    console.log(error);
                });
            }

            $scope.delete   =   (id) => {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if(willDelete) {
                        $http.delete(`${API_URL}precast-estimate/${id}`).then(function (response) {
                            getprecastEstimates();
                            Message('success',response.data.msg);
                        }); 
                    }
                });
            }
        });

        app.controller('moduleController', function ($scope, $http, API_URL, $location) {
            $location.path('/role');
            //fetch users listing from 
            $scope.moduleGetData = function () {
                $scope.active = "active";
                $scope.getData($http, API_URL);
                angular.element(document.querySelector("#loader")).addClass("d-none"); 
            }
 
            $scope.roleGetData = function () {
               
                // $scope.btnClass = $(this).addClass(active);
                // angular.element(document.querySelector("#roleTab")).addClass("active");
                $scope.getRoleData($http, API_URL);
            }
            $scope.masterGetData = function () {
                $scope.getMasterCalculation($http, API_URL);
            }
            $scope.componentGetData = function () {
                $scope.getComponentData($http, API_URL);
            }
            $scope.typeGetData = function () {
                $scope.getTypeData($http, API_URL);
            }
            $scope.projectTypeGetData = function () {
                $scope.getProjectTypeData($http);
            }
            $scope.documentTypeGetData = function () {
                $scope.getDocumentData($http, API_URL);
            }
            $scope.layerGetData = function () {
                $scope.getComponentLayerData($http, API_URL);
                $scope.getLayerData($http, API_URL);
            }
            $scope.deliveryTypeGetData = function () {
                $scope.getDeliveryLayerData($http, API_URL);
            }
            $scope.layerTypeGetData = function () {
                $scope.getComponentLayerData($http, API_URL);
                $scope.getSelectLayerData($http, API_URL);
                $scope.getLayerTypeData($http, API_URL);
            }
            $scope.outputGetData = function () {
                $scope.getOutputData($http, API_URL);
            }
            $scope.serviceGetData = function () {
                $scope.getOutputDataService($http, API_URL);
                $scope.getServiceData($http, API_URL);
            }

            // $scope.deleteRow = function () {
            //     alert()
            //     // $scope.getRoleData($http, API_URL);
            // }
            
                $(document).on('click','.cal_delete', function(){
                // alert()
                var delete_id = $(this).data('col_delete_id');
                // alert($(this).data('col_delete_id'))
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('admin.col-delete') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        delete_id:delete_id,
                        
                    },
                    success: function( msg ) {
                        Message('success',msg.msg);
                        // getMasterCalculation($http, API_URL);
                        $scope.getMasterCalculation($http, API_URL);
                    }
                    });
            });
            $(document).on('keyup change','.cal_submit', function(){
                // alert()
                console.log($(this).data('component_id'));
                console.log($(this).data('type_id'));
                console.log($(this).data('field_name'));
                console.log($(this).val());
                var component_id = $(this).data('component_id');
                var type_id = $(this).data('type_id');
                var field_name = $(this).data('field_name');
                var value = $(this).val();
                

                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.costMasterVal') }}",
                    data: {
                        
                        component_id:component_id,
                        type_id:type_id,
                        field_name:field_name,
                        value:value,
                    },
                    success: function( msg ) {
                    // alert(JSON.stringify(msg))
                    
                    // $scope.getMasterCalculation($http, API_URL);
                    
                    }
                    });
            });
            
                $scope.getData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: API_URL + "module"
                    }).then(function (response) {

                    
                        console.log(response.data)
                        $scope.module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }
                $scope.getRoleData = function($http, API_URL) {
                    var url = API_URL + "role";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.role_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                } 
                $scope.getOutputData = function($http, API_URL) {
                    var url = API_URL + "output-type";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.output_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                } 
                
                $scope.getComponentData = function($http, API_URL) {
                    var url = API_URL + "building-component";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.component_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                } 
                $scope.getTypeData = function($http, API_URL) {
                    var url = API_URL + "building-type";
            
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.type_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                
                } 
                $scope.getDocumentData = function($http, API_URL) {
                    var url = API_URL + "document-type";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.document_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                
                }
                $scope.getLayerData = function($http, API_URL) {
                    var url = API_URL + "layer";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.layer_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                
                } 
                $scope.getDeliveryLayerData = function($http, API_URL) {
                    var url = API_URL + "delivery-type";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.deliveryLayer_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                
                } 
                $scope.getLayerTypeData = function($http, API_URL) {
                    var url = API_URL + "layer-type";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.layerType_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                
                }
                $scope.getServiceData = function($http, API_URL) {
                    var url = API_URL + "service";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.service_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                
                } 
            
            
            
                $scope.component_status = function (index  , id) {

                    var url = API_URL + "building-component" + "/status";

                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            $scope.getComponentData($http, API_URL);
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }
                
                    
                    $scope.pType_status = function (index  , id) {
                    var url = API_URL + "projectTypeStatus";
                    

                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            
                            $scope.getProjectTypeData($http);
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }


                    
                    
                
                $scope.checkIt = function (index  , id) {

                    var url = API_URL + "module" + "/status";
                    

                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'is_active':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            // angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                            $scope.getData($http, API_URL);
                            
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                }

                $scope.checkItRole = function (index  , id) {

                    var url = API_URL + "role" + "/status";


                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            $scope.getRoleData($http, API_URL);

                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                }
                    $scope.type_status = function (index  , id) {
                    var url = API_URL + "building-type" + "/status";
                
                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            $scope.getTypeData($http, API_URL);
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }
                    
                    $scope.document_status = function (index  , id) {
                        
                        var url = API_URL + "document-type" + "/status";
                        

                        if (id) {

                            url += "/" + id;
                            method = "PUT";

                            $http({
                                method: method,
                                url: url,
                                data: $.param({'status':0}),
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                            }).then(function (response) {
                                $scope.getDocumentData($http, API_URL);
                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                        $scope.document_mandatory = function (index  , id) {
                        
                        var url = API_URL + "document-type" + "/mandatoryStatus";
                    

                        if (id) {

                            url += "/" + id;
                            method = "PUT";

                            $http({
                                method: method,
                                url: url,
                                data: $.param({'status':0}),
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                            }).then(function (response) {
                                $scope.getDocumentData($http, API_URL);
                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                    $scope.layer_status = function (index  , id) {
                    var url = API_URL + "layer" + "/status";
                    

                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            $scope.getLayerData($http, API_URL);
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }
                    $scope.output_status = function (index  , id) {
                    var url = API_URL + "output-type" + "/status";
                    

                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            $scope.getOutputData($http, API_URL);
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }
                    
                    $scope.deliveryLayer_status = function (index  , id) {
                    var url = API_URL + "delivery-type" + "/status";
                    

                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            $scope.getDeliveryLayerData($http, API_URL);
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }
                    $scope.layerType_status = function (index  , id) {
                    var url = API_URL + "layer-type" +"/status";
                    

                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                            
                            
                            $scope.getLayerTypeData($http, API_URL);
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }
                    $scope.service_status = function (index  , id) {
                    var url = API_URL + "service"+ "/status";
                    

                    if (id) {

                        url += "/" + id;
                        method = "PUT";

                        $http({
                            method: method,
                            url: url,
                            data: $.param({'status':0}),
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                        }).then(function (response) {
                        
                            $scope.getServiceData($http, API_URL);
                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }
                

                $scope.getProjectTypeData = function($http) {
                    // var url = API_URL + "admin" + "/project-type";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: "{{ route('project-type.index') }}",
                    }).then(function (response) {

                        $scope.pType_module_get = response.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                
                } 
                
            
            
                $scope.confirmpTypeDelete = function (id) {
                    
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: API_URL + 'project-type/' + id                                
                        }).then(function (response) {
                                
                            $scope.getProjectTypeData($http);
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
                $scope.getMasterCalculation = function($http, API_URL) {
                
                    var url = API_URL + "admin" + "/getMasterCalculation";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {
                    // alert(JSON.stringify(response))
                    $('#calculation_tbl').html(response.data);
                        // $scope.master_module_get = response.data.data;	
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                } 

                
                
            //show modal form
            $scope.toggle = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module1 = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Module";
                        $scope.form_color = "primary";
                        // $scope.resetModuleForm();
                        // $scope.ModuleForm.$setPristine();
                        // $scope.ModuleForm.$setUntouched();
                        $scope.module = {};
                        
                        
                        $('#primary-header-modal').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Module";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module = {};
                        // $scope.ModuleForm.$setPristine();
                        // $scope.ModuleForm.$setUntouched();
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL + 'module/' + id )
                            .then(function (response) {
                                $scope.module = response.data.data;
                                
                                $('#primary-header-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }

            $scope.toggleRole = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Role";
                        $scope.form_color = "primary";
                        $scope.module_role = {};
                        // $scope.RoleModule.$setPristine();
                        // $scope.RoleModule.$setUntouched();   
                        $('#primary-role-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Role";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_role = {};
                        // $scope.RoleModule.$setPristine();
                        // $scope.RoleModule.$setUntouched();
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL + 'role/' + id )
                            .then(function (response) {
                                $scope.module_role = response.data.data;
                                
                                $('#primary-role-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }
            $scope.toggleOutput = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Output Type";
                        $scope.form_color = "primary";
                        $scope.module_output = {};
                        // $scope.OutputModule.$setPristine();
                        // $scope.OutputModule.$setUntouched();   
                        $('#primary-output-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Output Type";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_output = {};
                        // $scope.OutputModule.$setPristine();
                        // $scope.OutputModule.$setUntouched();
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL + 'output-type/' + id )
                            .then(function (response) {
                                
                                $scope.module_output = response.data.data;
                                
                                $('#primary-output-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }
            
            $scope.toggleComponent = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Component";
                        $scope.form_color = "primary";
                        // $scope.resetForm();s
                        $scope.module_comp = {};
                        // $scope.ComponentModule.$setPristine();
                        // $scope.ComponentModule.$setUntouched();
                        $('#primary-component-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Component";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_comp = {};                      
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL +'building-component/' + id )
                            .then(function (response) {
                                $scope.module_comp = response.data.data;
                                
                                $('#primary-component-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }
            $scope.toggleType = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
                $scope.module_type = {};
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Type";
                        $scope.form_color = "primary";
                        // $scope.resetForm();
                        $('#primary-type-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Type";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_type = {};
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL +'building-type/' + id )
                            .then(function (response) {
                                $scope.module_type = response.data.data;
                                
                                $('#primary-type-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }
            $scope.toggleDocument = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Document Type";
                        $scope.form_color = "primary";
                        $scope.module_document = {};

                        $('#primary-document-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Document Type";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_document = {};
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL + 'document-type/' + id )
                            .then(function (response) {

                                $scope.module_document = response.data.data;
                                
                                // $(".is_mandatory").trigger("click");
                                $('#primary-document-modal').modal('show');
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }

            $scope.toggleLayer = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Layer";
                        $scope.form_color = "primary";
                        $scope.module_layer = {};
                        $('#primary-layer-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Layer";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_layer = {};
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL  +'layer/' + id )
                            .then(function (response) {
                                $scope.module_layer = response.data.data;
                                
                                $('#primary-layer-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }
            $scope.toggleDeliveryLayer = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Delivery Type";
                        $scope.form_color = "primary";
                        $scope.module_deliveryLayer = {};
                        $('#primary-deliveryLayer-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Delivery Type";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_deliveryLayer = {};
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL +'delivery-type/' + id )
                            .then(function (response) {
                                $scope.module_deliveryLayer = response.data.data;
                                
                                $('#primary-deliveryLayer-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }
            $scope.toggleLayerType = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Layer Type";
                        $scope.form_color = "primary";
                        $scope.module_layerType = {};
                        $('#primary-layerType-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Layer Type";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_layerType = {};
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL +'layer-type/' + id )
                            .then(function (response) {
                                // alert(JSON.stringify(response.data))
                                $scope.module_layerType = response.data.data;
                                
                                $('#primary-layerType-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }

            
            $scope.toggleService = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Service";
                        $scope.form_color = "primary";
                        $scope.module_service = {};
                        $('#primary-service-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Service";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_service = {};
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http.get(API_URL + 'service/' + id )
                            .then(function (response) {
                                $scope.module_service = response.data.data;
                                
                                $('#primary-service-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }

            // $scope.getData($http, API_URL);
            $scope.getRoleData($http, API_URL);
            // $scope.getMasterCalculation($http, API_URL);
            // $scope.getComponentData($http, API_URL);
            // $scope.getTypeData($http, API_URL);
            // $scope.getProjectTypeData($http);
            // $scope.getDocumentData($http, API_URL);
            // $scope.getLayerData($http, API_URL);
            // $scope.getDeliveryLayerData($http, API_URL);
            // $scope.getLayerTypeData($http, API_URL);
            // $scope.getServiceData($http, API_URL);
            // $scope.getOutputData($http, API_URL);
            // $scope.getOutputDataService($http, API_URL);
            // $scope.getSelectLayerData($http, API_URL);
            // $scope.getComponentLayerData($http, API_URL); 
            
            
            
            
            
            $scope.togglepType = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Project Type";
                        $scope.form_color = "primary";
                        $scope.module_pType = {};
                        // $scope.pTypeModule.$setPristine();
                        // $scope.pTypeModule.$setUntouched();  
                        $('#primary-pType-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Project Type";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_pType = {};
                        method = "GET";

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $http({
                        method: method,
                        url: API_URL +'project-type/' + id ,
                        
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function (response) {
                                $scope.module_pType = response.data.data;
                                
                                $('#primary-pType-modal').modal('show');

                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
                
            }
            angular.element(document.querySelector("#loader")).addClass("d-none");
            $scope.confirmModuleDelete = function (id) {
                var url = API_URL + "module/";
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url + id                              
                        }).then(function (response) {
                                
                            $scope.getData($http, API_URL);
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                            
                                Message('success', response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            
        
            //save new record and update existing record
            $scope.save = function (modalstate, id) {
                
                var url = API_URL + "module";
                var method = "POST";
                
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    method = "PUT";

                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-header-modal').modal('hide');
                        Message('success',response.data.msg);

                        }, function errorCallback(response) {
                            
                            Message('danger',response.data.errors.module_name);
                        });


                }else {

                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-header-modal').modal('hide');
                        Message('success',response.data.msg);

                        }, function errorCallback(response) {
                            
                            Message('danger',response.data.errors.module_name);
                        });

                }
                
            }
        

            $scope.save_role = function (modalstate, id) {
                
                var url = API_URL + "role";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    // alert(url)
                    method = "PUT";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_role),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getRoleData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-role-modal').modal('hide');
                        Message('success',response.data.msg);

                        }, function errorCallback(response) {
                            
                            Message('danger',response.data.errors.name);
                        });

                }else {
                    // url+="role";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_role),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getRoleData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-role-modal').modal('hide');
                        Message('success',response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.name);
                    });
                }
                
            }
            $scope.save_output = function (modalstate, id) {
                
                var url = API_URL + "output-type";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    // alert(url)
                    method = "PUT";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_output),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getOutputData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-output-modal').modal('hide');
                        Message('success',response.data.msg);

                        }, function errorCallback(response) {
                            
                            Message('danger',response.data.errors.output_type_name);
                        });

                }else {
                    // url+="role";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_output),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getOutputData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-output-modal').modal('hide');
                        Message('success',response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.output_type_name);
                    });
                }
                
            }
            
            $scope.save_type = function (modalstate, id) {
                
                var url = API_URL + "building-type";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    // alert(url)
                    method = "PUT";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_type),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getTypeData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-type-modal').modal('hide');

                        Message('success',response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.building_type_name);
                    });

                }else {
                    
                    console.log($scope.module_type);
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_type),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getTypeData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-type-modal').modal('hide');

                        Message('success',response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.building_type_name);
                    });
                }
                
            }
            $scope.save_component = function (modalstate, id) {
                
                var url = API_URL + "building-component";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    // alert(url)
                    method = "PUT";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_comp),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getComponentData($http, API_URL);
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        $('#primary-component-modal').modal('hide');
                        Message('success',response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.role);
                    });

                }else {
                    
                    console.log($scope.module_comp);
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_comp),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getComponentData($http, API_URL);
                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        $('#primary-component-modal').modal('hide');

                        Message('success',response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.building_component_name);
                    });
                }
                
            }
            $scope.save_document = function (modalstate, id) {
                
                var url = API_URL + "document-type";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    // alert(url)
                    method = "PUT";
                //    document.getElementsByClassName("checked");
                //    var foo =  $('.is_mandatory').attr('checked');
                //     // alert(foo)
                //     if(foo == "checked")
                //     {
                //         $scope.module_document.is_mandatory = 1;
                //     }
                //     else{
                //         $scope.module_document.is_mandatory = 0;
                //     }
                    
                    console.log($scope.module_document.is_mandatory);
                
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_document),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getDocumentData($http, API_URL);
                        $('#primary-document-modal').modal('hide');
                        Message('success', response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.document_type_name);
                    });
                }else {
                    // alert($scope.module_document.is_mandatory)
                //    if($scope.module_document.is_mandatory == true)
                //    {
                //         $scope.module_document.is_mandatory = 1;
                //    }
                //    else
                //    {
                //     $scope.module_document.is_mandatory = 0;
                //    }
                    console.log($scope.module_document);
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_document),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getDocumentData($http, API_URL);
                        $('#primary-document-modal').modal('hide');
                        Message('success', response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.document_type_name);
                    });
                }
                
            }
            $scope.save_layer = function (modalstate, id) {
                
                var url = API_URL + "layer";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    method = "PUT";
                    
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_layer),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getLayerData($http, API_URL);
                        $('#primary-layer-modal').modal('hide');

                        Message('success', response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.layer_name);
                    });
                }else {
                    
                    console.log($scope.module_layer);
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_layer),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getLayerData($http, API_URL);
                        $('#primary-layer-modal').modal('hide');

                        Message('success', response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.layer_name);
                    });
                }
                
            }
            $scope.save_deliveryLayer = function (modalstate, id) {
                
                var url = API_URL + "delivery-type";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    // alert(url)
                    method = "PUT";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_deliveryLayer),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $('#primary-deliveryLayer-modal').modal('hide');
                        $scope.getDeliveryLayerData($http, API_URL);
                        Message('success', response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.delivery_type_name);
                    });

                }else {
                    
                    // alert(url)
                    console.log($scope.module_deliveryLayer);
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_deliveryLayer),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $('#primary-deliveryLayer-modal').modal('hide');
                        $scope.getDeliveryLayerData($http, API_URL);
                        Message('success', response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.delivery_type_name);
                    });
                }
                
            }
            $scope.save_layerType = function (modalstate, id) {
                
                var url = API_URL + "layer-type";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    // alert(url)
                    method = "PUT";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_layerType),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getLayerTypeData($http, API_URL);
                        $('#primary-layerType-modal').modal('hide');                       
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.layer_type_name);
                    });


                }else {
                    
                    // console.log($scope.module_layerType);
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_layerType),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getLayerTypeData($http, API_URL);
                        $('#primary-layerType-modal').modal('hide');                       
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.layer_type_name);
                    });
                }
                
            }

            $scope.save_service = function (modalstate, id) {
                
                var url = API_URL + "service";
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "/" + id;
                    // alert(url)
                    method = "PUT";
                    // alert(url)
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_service),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                                                    
                        $scope.getServiceData($http, API_URL);
                        $('#primary-service-modal').modal('hide');                      
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.output_type_id);
                    });

                }else {
                    
                    // alert(url)
                    console.log($scope.module_service);
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_service),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                                            // alert(JSON.stringfy(response))	 
                        $scope.getServiceData($http, API_URL);
                        $('#primary-service-modal').modal('hide');                      
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.output_type_id);
                    });
                        
                }
                
            }
            
            
            
            
            
            
            
            
            $scope.save_pType = function (modalstate, id) {
                
                var url = API_URL;
                var method = "POST";
        
                //append module id to the URL if the form is in edit mode
                if (modalstate === 'edit') {
                    url += "project-type/" + id;
                    // alert(url)
                    method = "PUT";
                    
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_pType),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getProjectTypeData($http);
                        $('#primary-pType-modal').modal('hide');
                        Message('success', response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.project_type_name);
                    });

                }else {
                    url+="project-type";
                    // alert(url)
                    console.log($scope.module_pType);
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_pType),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                    }).then(function successCallback(response) {
                        $scope.getProjectTypeData($http);
                        $('#primary-pType-modal').modal('hide');
                        Message('success', response.data.msg);

                    }, function errorCallback(response) {
                        
                        Message('danger',response.data.errors.project_type_name);
                    });

                }
                
            }

                // $scope.resetModuleForm =  function() {
                //     $scope.module = {};
                //     $scope.ModuleForm.$setPristine();
                //     $scope.ModuleForm.$setValidity();
                //     $scope.ModuleForm.$setUntouched();
                // }
            // $scope.resetRoleForm =  function() {
            //     $scope.module_role = {};
                
            //     $scope.RoleModule.$setPristine();
            //     $scope.RoleModule.$setValidity();
            //     $scope.RoleModule.$setUntouched();  
            // }
            

            // $scope.resetForm =  function() {
                
                
            //     $scope.module_comp = {};
            //     $scope.module_type = {};
            //     $scope.module_pType = {};
            //     $scope.module_layer = {};
            //     $scope.module_service = {};
            //     $scope.module_layerType = {};
            //     $scope.module_deliveryLayer = {};
            //     $scope.module_document = {};
                

            


            //     $scope.ComponentModule.$setPristine();
            //     $scope.ComponentModule.$setValidity();
            //     $scope.ComponentModule.$setUntouched();
            //     $scope.TypeModule.$setPristine();
            //     $scope.TypeModule.$setValidity();
            //     $scope.TypeModule.$setUntouched();
            //     $scope.pTypeModule.$setPristine();
            //     $scope.pTypeModule.$setValidity();
            //     $scope.pTypeModule.$setUntouched();
            //     $scope.DocumentModule.$setPristine();
            //     $scope.DocumentModule.$setValidity();
            //     $scope.DocumentModule.$setUntouched();
            //     $scope.LayerModule.$setPristine();
            //     $scope.LayerModule.$setValidity();
            //     $scope.LayerModule.$setUntouched();
            //     $scope.deliveryLayerModule.$setPristine();
            //     $scope.deliveryLayerModule.$setValidity();
            //     $scope.deliveryLayerModule.$setUntouched();
            //     $scope.LayerTypeModule.$setPristine();
            //     $scope.LayerTypeModule.$setValidity();
            //     $scope.LayerTypeModule.$setUntouched();
            //     $scope.ServiceModule.$setPristine();
            //     $scope.ServiceModule.$setValidity();
            //     $scope.ServiceModule.$setUntouched();
                
                
            // }
            //delete record
            $scope.confirmDelete = function (id) {
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: API_URL + 'module/' + id                                
                        }).then(function (response) {
                                
                        
                            
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            $scope.confirmRoleDelete = function (id) {
                var url = API_URL + 'role/'+ id;
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url,                              
                        }).then(function (response) {
                            $scope.getRoleData($http, API_URL);
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            $scope.confirmOutputDelete = function (id) {
                var url = API_URL + 'output-type/'+ id;
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url,                              
                        }).then(function (response) {
                            $scope.getOutputData($http, API_URL);
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            $scope.confirmTypeDelete = function (id) {
                var url = API_URL + 'building-type/';
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url + id                              
                        }).then(function (response) {
                                
                            $scope.getTypeData($http, API_URL);
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            $scope.confirmComponentDelete = function (id) {
                var url = API_URL + 'building-component/';
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url + id                              
                        }).then(function (response) {
                                
                        
                            $scope.getComponentData($http, API_URL);
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            $scope.confirmDocumentDelete = function (id) {
                var url = API_URL + 'document-type/' + id;
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url,                             
                        }).then(function (response) {
                                
                            $scope.getDocumentData($http, API_URL);
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }

            $scope.confirmLayerDelete = function (id) {
                var url = API_URL + 'layer/' + id;
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url,                             
                        }).then(function (response) {
                            $scope.getLayerData($http, API_URL);
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            $scope.confirmDeliveryLayerDelete = function (id) {
                var url = API_URL + 'delivery-type/' + id;
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url,                            
                        }).then(function (response) {
                            $scope.getDeliveryLayerData($http, API_URL);
                            
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            
            $scope.confirmLayerTypeDelete = function (id) {
                var url = API_URL + 'layer-type/' + id;
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url,                              
                        }).then(function (response) {
                            $scope.getLayerTypeData($http, API_URL);
                            
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            $scope.confirmServiceDelete = function (id) {
                var url = API_URL + 'service/' + id;
                // var isConfirmDelete = confirm('Are you sure you want this record?');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                        $http({
                            method: 'DELETE',
                            url: url,                             
                        }).then(function (response) {
                            $scope.getServiceData($http, API_URL);
                            
                            if(response.data.status == false) {
                                
                                Message('warning',response.data.msg);
                                angular.element(document.querySelector("#loader")).addClass("d-none"); 

                            }
                            
                            if(response.data.status == true) {
                                
                                Message('success', response.data.msg);
                            }  
                            
                                
                        }, function (error) {
                            console.log(error);
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });

                    } else {
                        swal("Your Data is safe!");
                    }

                });
                
            }
            
            
            
                    $scope.getOutputDataService = function($http, API_URL) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        // http://localhost/AEC_PREFAB/aec/module?page=1
                        $http({
                            method: 'GET',
                            url: API_URL + "output-data"
                        }).then(function (response) {
                            // alert(JSON.stringify(response))
                            $scope.output_module_name = response.data.data;		
                            // $scope.employee_module.epm_id = response.data.data.emp_id.id;
                        }, function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });
                    }
            
            

                $scope.getComponentLayerData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: API_URL + "component-data"
                    }).then(function (response) {
                        // alert(JSON.stringify(response))
                        $scope.component_module_name = response.data.data;		
                        // $scope.employee_module.epm_id = response.data.data.emp_id.id;
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }


                $scope.getSelectLayerData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: API_URL + "layer-data"
                    }).then(function (response) {
                        // alert(JSON.stringify(response))
                        $scope.layer_module_name = response.data.data;		
                        // $scope.employee_module.epm_id = response.data.data.emp_id.id;
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }
                
            
            
        });  
        app.controller('TaskListController', function ($scope, $http, API_URL, $location) {
            
            $scope.getFreshTaskListData = () => {
                $http.get(`${API_URL}task-list-master`).then((res)=> {
                    $scope.taskLists = res.data; 
                });
            }
            $scope.getFreshTaskListData();


            $scope.toggleModalForm = function (modalstate, id) {
                $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Task";
                        $scope.form_color = "primary";
                        $scope.modalstate   =   'add'
                        $scope.task_list_item = {};
                        $('#tasklist-form-popup').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Task";
                        $scope.form_color = "success";
                        $scope.id = id; 
                        $scope.task_list_item = {};
                        $http.get(`${API_URL}task-list-master/${id}`)
                            .then(function (response) {
                                $scope.task_list_item = response.data.data;
                                $('#tasklist-form-popup').modal('show');
                                
                            });
                        break;
                    
                    default:
                        break;
                } 
            }

            $scope.storeModalTaskForm = (modalstate, id) => { 
                $http({
                    method: `${modalstate == 'edit' ? 'PUT' : 'POST'}`,
                    url: `${API_URL}task-list-master${modalstate == 'edit' ? '/'+id : ''}`,
                    data:$.param($scope.task_list_item),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function successCallback(response) {
                    $('#tasklist-form-popup').modal('hide');
                    Message('success',response.data.msg);
                    $scope.getFreshTaskListData();
                }, function errorCallback(response) {
                    console.log(response)
                    Message('danger',response.data.errors.task_list_name[0]);
                });
            }

            $scope.changeTaskListStatus = (id , params) =>{
                $http({
                    method: "put",
                    url: `${API_URL}task-list-master/${id}`,
                    data: $.param({'is_active':params == 1 ? 0 : 1}),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    $scope.getFreshTaskListData();
                    Message('success',response.data.msg);
                }), (function (error) {
                    console.log(error);
                });
            }

            $scope.deleteThisData   =   (id) => {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if(willDelete) {
                        $http.delete(`${API_URL}task-list-master/${id}`).then(function (response) {
                            $scope.getFreshTaskListData();
                            Message('success',response.data.msg);
                        }); 
                    }
                });
            }
        });
        app.controller('CheckListController', function ($scope, $http, API_URL, $location) {

            $scope.getFreshTaskListData = () => {
                $http.get(`${API_URL}task-list-master`).then((res)=> {
                    $scope.task_list_master = res.data; 
                });
            }
            $scope.getFreshTaskListData();

            $scope.getFreshCheckListData    =   ()  => {
                $http.get(`${API_URL}check-list-master`).then((res)=> {
                    $scope.checkList = res.data;
                });
            }
            $scope.getFreshCheckListData();

            $scope.toggleModalForm = (modalstate, id) => {
                $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Check List";
                        $scope.form_color = "primary";
                        $scope.check_list_item = {};
                        $('#checklist-form-popup').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Check List";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.check_list_item = {};
                        
                        $http.get(`${API_URL}check-list-master/${id}`).then(function (response) {
                            $scope.check_list_item = response.data.data;
                            $('#checklist-form-popup').modal('show');
                        });
                        break;
                    
                    default:
                        break;
                } 
            }

            $scope.storeModalForm = (modalstate, id) => {
                $http({
                    method: `${modalstate == 'edit' ? 'PUT' : 'POST'}`,
                    url: `${API_URL}check-list-master${modalstate == 'edit' ? '/'+id : ''}`,
                    data:$.param($scope.check_list_item),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function successCallback(response) {
                    $('#checklist-form-popup').modal('hide');
                    Message('success',response.data.msg);
                    $scope.getFreshCheckListData();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            $scope.changeCheckListStatus = (id , params) =>{
                $http({
                    method: "put",
                    url: `${API_URL}check-list-master/${id}`,
                    data: $.param({'is_active':params == 1 ? 0 : 1}),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    $scope.getFreshCheckListData();
                    Message('success',response.data.msg);
                }), (function (error) {
                    console.log(error);
                });
            }

            $scope.deleteThisData   =   (id) => {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if(willDelete) {
                        $http.delete(`${API_URL}check-list-master/${id}`).then(function (response) {
                            $scope.getFreshCheckListData();
                            Message('success',response.data.msg);
                        }); 
                    }
                });
            }
        });
    </script>
       
@endpush