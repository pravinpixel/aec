@extends('layouts.admin')

@section('admin-content')
   

    <div class="content-page" ng-app="Setting_App">
        <div class="content"  ng-controller="moduleController" >

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')

                <!-- end page title --> 

                <div class="row">
                    
                    <div class="col-sm-2 mb-2 mb-sm-0">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">
                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                <span class="d-none d-md-block">Module</span>
                            </a>
                            <a class="nav-link" id="v-pills-role-tab" data-bs-toggle="pill" href="#v-pills-role" role="tab" aria-controls="v-pills-role"
                                aria-selected="true">
                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                <span class="d-none d-md-block">Role</span>
                            </a>
                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                aria-selected="false">
                                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Menu Module</span>
                            </a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Menu</span>
                            </a>
                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                aria-selected="false">
                                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Settings</span>
                            </a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Menu</span>
                            </a>
                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                aria-selected="false">
                                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Settings</span>
                            </a>
                        </div>
                    </div> <!-- end col-->
                
                    <div class="col-sm-10">
                        
                        
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="  col-md-10 me-auto" style="position: relative">
                                    <div class="p-4 h-100 w-100 d-flex justify-content-center align-items-center" id="loader"  style="backdrop-filter: blur(1px);z-index:10;position: absolute; top:50%;left:50%;transform:translate(-50%,-50%)">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <span class="ps-2 text-primary"> Loading ... </span>
                                    </div>
                                    <div class="card">
                                        <div class="card-header ">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="haeder-title">Module</h3>
                                                <button class="btn btn-primary " ng-click="toggle('add', 0)">Create New</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table datatable="ng" dt-options="vm.dtOptions" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th class="text-center">Order Id</th>
                                                        <th>Icon</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                            
                                                <tbody>
                                                    <tr ng-repeat="(index,m) in module_get">
                                                        
                                                        <td class="align-items-center">@{{ m.module_name }} </td>
                                                        <td class="text-center"><span>@{{ m.order_id }} </span></td>
                                                        <td ><span style="font-size: 18px">@{{ m.icon }} </span></td>
                                                        <td>
                                                            <div>
                                                                <input type="checkbox" id="switch__@{{ index }}" ng-checked="m.is_active == 1" data-switch="primary"/>
                                                                <label for="switch__@{{index}}" data-on-label="On" ng-click="checkIt(index, m.id)" data-off-label="Off"></label>
                                                            </div>              
                                                        </td>
                                                        <td class="text-center" >
                                                            <div class="btn-group">
                                                                <button class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ng-click="toggle('edit', m.id)"><i class="fa fa-pencil"></i></button>
                                                                <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="confirmRoleDelete(m.id)"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-fooetr"></div>
                                    </div>
                                    
                                    <div class="container" >			 
                                        <!-- Modal -->
                                        <!-- Primary Header Modal -->
                                        <div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-colored-header bg-@{{form_color}}">
                                                        <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form name="module" class="form-horizontal" novalidate="">
                                                            <div class="form-group error mb-2">
                                                                <label for="inputEmail3" class="col-sm-12 control-label mb-2">Menu Name</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="module.module_name" ng-required="true">
                                                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="form-group col error">
                                                                    <label for="inputEmail3" class="col-sm-12 control-label mb-2">Order Id</label>
                                                                    <div class="col-sm-12 me-2">
                                                                        <input type="number" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="module.order_id" ng-required="true">
                                                                        <small class="help-inline text-danger" >This  Fields is Required</small>
                                                                    </div>
                                                                </div> 
                                                                <div class="form-group col error">
                                                                    <label for="inputEmail3" class="col-sm-12 control-label mb-2">Menu Icon</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="module.icon" ng-required="true">
                                                                        <small class="help-inline text-danger"  >This  Fields is Required</small>
                                                                    </div>
                                                                </div> 
                                                                <div class="col-12 pt-3">
                                                                    <div>
                                                                        <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                                                            <input type="radio"  ng-checked="module.is_active == 1" id="active" value="1" ng-model="module.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                                                            <label class="form-check-label" for="active">Active</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline form-radio-dark">
                                                                            <input type="radio" ng-checked="module.is_active == 0" id="Deactive" value="0" ng-model="module.is_active" name="is_active" class="form-check-input" ng-required="true">
                                                                            <label class="form-check-label" for="Deactive">Deactive</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save(modalstate, id); $event.stopPropagation();" ng-disabled="frmusers.$invalid">Submit</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                         
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-role" role="tabpanel" aria-labelledby="v-pills-role-tab">
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="haeder-title">Add Role</h3>
                                            <button class="btn btn-primary " ng-click="toggleRole('add', 0)">Create New Role</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table datatable="ng" dt-options="vm.dtOptions" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                <tr ng-repeat="(index,m) in role_module_get">
                                                    
                                                    <td class="align-items-center">@{{ m.role }}</td>

                                                    <td>
                                                        <div>
                                                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="m.status == 1" data-switch="primary"/>
                                                            <label for="switch__@{{index}}" data-on-label="On" ng-click="checkIt(index, m.id)" data-off-label="Off"></label>
                                                        </div>              
                                                    </td>
                                                    <td class="text-center" >
                                                        <div class="btn-group">
                                                            <button class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ng-click="toggleRole('edit', m.id)"><i class="fa fa-pencil"></i></button>
                                                            <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="confirmRoleDelete(m.id)"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-fooetr"></div>
                                </div> 
                                <div id="primary-role-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-@{{form_color}}">
                                                <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="RoleModule" class="form-horizontal" novalidate="">
                                                    <div class="form-group error mb-2">
                                                        <label for="inputEmail3" class="col-sm-12 control-label mb-2">Role Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control has-error" id="role_name" name="role_name" placeholder="Type Here.." ng-model="module_role.role" ng-required="true" required>
                                                            <small class="help-inline text-danger">This  Fields is Required</small>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-12 pt-3">
                                                            <div>
                                                                <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                                                    <input type="radio"  ng-checked="module.status == 1" id="active" value="1" ng-model="module_role.status" name="status" class="form-check-input"  ng-required="true">
                                                                    <label class="form-check-label" for="active">Active</label>
                                                                </div>
                                                                <div class="form-check form-check-inline form-radio-dark">
                                                                    <input type="radio" ng-checked="module.status == 0" id="Deactive" value="0" ng-model="module_role.status" name="status" class="form-check-input" ng-required="true">
                                                                    <label class="form-check-label" for="Deactive">Deactive</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_role(modalstate, id); $event.stopPropagation();" ng-disabled="module.$invalid">Submit</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <p class="mb-0">...</p>
                            </div>
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
            padding: 15px !important
        }
        
        .form-control.ng-touched   {
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

    </style>

    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('custom-scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.4.3/angular-datatables.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <!-- AngularJS Application Scripts -->
		<script >
			var app = angular.module('Setting_App', ['datatables']).constant('API_URL', $("#baseurl").val());           
		</script>

		<script >
            
			// menuController

			app.controller('moduleController', function ($scope, $http, API_URL) {
			    
			    //fetch users listing from 
				
				getData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
					$http({
						method: 'GET',
						url: API_URL + "module"
					}).then(function (response) {

                        angular.element(document.querySelector("#loader")).addClass("d-none");
                        console.log(response.data.data)
						$scope.module_get = response.data.data;		
						 
					}, function (error) {
						console.log(error);
						console.log('This is embarassing. An error has occurred. Please check the log for details');
					});
				} 
                getData($http, API_URL);
				
				// getMenuData($http, API_URL);

                    $scope.checkIt = function (index  , id) {

                        var url = API_URL + "module" + "/status";
                        // getData($http, API_URL);

                        if (id) {

			                url += "/" + id;
                            method = "PUT";

                            $http({
                                method: method,
                                url: url,
                                data: $.param({'is_active':0}),
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                            }).then(function (response) {
                                
                                getData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                    }
                    getRoleData = function($http, API_URL) {
                        var url = API_URL + "admin" + "/get_role";
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {

                        $scope.role_module_get = response.data.data;		
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                    } 

                    getRoleData($http, API_URL);
                    $scope.checkIt = function (index  , id) {

                        var url = API_URL + "admin" + "/status";
                        // getData($http, API_URL);

                        if (id) {

                            url += "/" + id;
                            method = "PUT";

                            $http({
                                method: method,
                                url: url,
                                data: $.param({'status':0}),
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                            }).then(function (response) {
                                
                                getRoleData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
			    //show modal form
			    $scope.toggle = function (modalstate, id) {
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create New";
			                $scope.form_color = "primary";
                            $('#primary-header-modal').modal('show');
			                break;
			            case 'edit':
			                $scope.form_title = "Edit an Update";
                            $scope.form_color = "success";
			                $scope.id = id;
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
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Role";
			                $scope.form_color = "primary";
                            $('#primary-role-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Role";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
			                $http.get(API_URL + 'admin/' +'edit_role/' + id )
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

						}).then(function (response) {
							 
							getData($http, API_URL);

							    $('#primary-header-modal').modal('hide');

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {

						$http({
							method: method,
							url: url,
							data: $.param($scope.module),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
							getData($http, API_URL);

							//location.reload();

							$('#primary-header-modal').modal('hide');


                            Message('success', response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
			

                $scope.save_role = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update_role/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_role),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
							getRoleData($http, API_URL);

							    $('#primary-role-modal').modal('hide');
                                $('#primary-role-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                        url+="add_role";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_role),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
							getRoleData($http, API_URL);

							//location.reload();

							$('#primary-role-modal').modal('hide');


                            Message('success', response.data.msg);
                            $scope.resetForm();


						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
                $scope.resetForm =  function() {
                    $scope.module_role = {};
                    $scope.RoleModule.$setPristine();
                    $scope.RoleModule.$setValidity();
                    $scope.RoleModule.$setUntouched();
                }
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
								 
								getData($http, API_URL);

                              
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
                    var url = API_URL + 'admin/' + 'delete_role/';
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
								 
								getRoleData($http, API_URL);

                              
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
			}); 
             
            Message = function (type, head) {
                $.toast({
                    heading: head,
                    icon: type,
                    showHideTransition: 'plain', 
                    allowToastClose: true,
                    hideAfter: 5000,
                    stack: 10, 
                    position: 'bootom-left',
                    textAlign: 'left', 
                    loader: true, 
                    loaderBg: '#252525',                
                });
            }
		</script>
       
@endpush