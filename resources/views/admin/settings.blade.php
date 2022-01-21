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
                            <a class="nav-link" id="v-pills-master-tab" data-bs-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-master"
                                aria-selected="false">
                                <i class="mdi mdi-master-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Master Estimation</span>
                            </a>
                            <a class="nav-link" id="v-pills-component-tab" data-bs-toggle="pill" href="#v-pills-component" role="tab" aria-controls="v-pills-component"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Building Component</span>
                            </a>
                            <a class="nav-link" id="v-pills-type-tab" data-bs-toggle="pill" href="#v-pills-type" role="tab" aria-controls="v-pills-type"
                                aria-selected="false">
                                <i class="mdi mdi-type-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Building Type</span>
                            </a>
                            <a class="nav-link" id="v-pills-project_type-tab" data-bs-toggle="pill" href="#v-pills-project_type" role="tab" aria-controls="v-pills-project_type"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Project Type</span>
                            </a>
                            <a class="nav-link" id="v-pills-document-tab" data-bs-toggle="pill" href="#v-pills-document" role="tab" aria-controls="v-pills-document"
                                aria-selected="false">
                                <i class="mdi mdi-document-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Document Type</span>
                            </a>
                            <a class="nav-link" id="v-pills-layer-tab" data-bs-toggle="pill" href="#v-pills-layer" role="tab" aria-controls="v-pills-layer"
                                aria-selected="false">
                                <i class="mdi mdi-layer-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Layer</span>
                            </a>
                            
                            <a class="nav-link" id="v-pills-DeliveryLayer-tab" data-bs-toggle="pill" href="#v-pills-DeliveryLayer" role="tab" aria-controls="v-pills-DeliveryLayer"
                                aria-selected="false">
                                <i class="mdi mdi-DeliveryLayer-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Delivery Type</span>
                            </a>
                            <a class="nav-link" id="v-pills-layerType-tab" data-bs-toggle="pill" href="#v-pills-layerType" role="tab" aria-controls="v-pills-layerType"
                                aria-selected="false">
                                <i class="mdi mdi-layerType-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Layer Type</span>
                            </a>
                            <a class="nav-link" id="v-pills-service-tab" data-bs-toggle="pill" href="#v-pills-service" role="tab" aria-controls="v-pills-service"
                                aria-selected="false">
                                <i class="mdi mdi-service-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Service Development</span>
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
                                                                <button class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ng-click="toggle('edit', m.id)"><i class="fa fa-edit"></i></button>
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
                                                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Menu Name</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="module.module_name" ng-required="true">
                                                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="form-group col error">
                                                                    <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Order Id</label>
                                                                    <div class="col-sm-12 me-2">
                                                                        <input type="number" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="module.order_id" ng-required="true">
                                                                        <small class="help-inline text-danger" >This  Fields is Required</small>
                                                                    </div>
                                                                </div> 
                                                                <div class="form-group col error">
                                                                    <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Menu Icon</label>
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
                                                        <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save(modalstate, id); $event.stopPropagation();" ng-disabled="module.$invalid">Submit</button>
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
                                                            <button class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ng-click="toggleRole('edit', m.id)"><i class="fa fa-edit"></i></button>
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
                                                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Role Name</label>
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
                                                <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_role(modalstate, id); $event.stopPropagation();" ng-disabled="module_role.$invalid">Submit</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-master-tab">
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="haeder-title">Master Estimation</h3>
                                            <!-- <button class="btn btn-primary " ng-click="toggleMaster('add', 0)">Create New Role</button> -->
                                        </div>
                                    </div>
                                    <div class="card-body" >
                                       <div id="calculation_tbl">

                                       </div>
                                    </div>
                                    <div class="card-fooetr"></div>
                                </div> 
                                <!-- <div id="primary-role-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
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
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                           
                            <div class="tab-pane fade" id="v-pills-component" role="tabpanel" aria-labelledby="v-pills-component-tab">
                               @include('admin.setting-tabs.component')
                            </div>
                            <div class="tab-pane fade" id="v-pills-type" role="tabpanel" aria-labelledby="v-pills-type-tab">
                               @include('admin.setting-tabs.type')
                            </div>
                            <div class="tab-pane fade" id="v-pills-project_type" role="tabpanel" aria-labelledby="v-pills-project_type-tab">
                               @include('admin.setting-tabs.project_type')
                            </div>
                            <div class="tab-pane fade" id="v-pills-document" role="tabpanel" aria-labelledby="v-pills-document-tab">
                               @include('admin.setting-tabs.document')
                            </div>
                            <div class="tab-pane fade" id="v-pills-layer" role="tabpanel" aria-labelledby="v-pills-layer-tab">
                               @include('admin.setting-tabs.layer')
                            </div>
                            <div class="tab-pane fade" id="v-pills-DeliveryLayer" role="tabpanel" aria-labelledby="v-pills-DeliveryLayer-tab">
                               @include('admin.setting-tabs.deliveryLayer')
                            </div>
                            <div class="tab-pane fade" id="v-pills-layerType" role="tabpanel" aria-labelledby="v-pills-layerType-tab">
                               @include('admin.setting-tabs.layerType')
                            </div>
                            <div class="tab-pane fade" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab">
                               @include('admin.setting-tabs.service')
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
            padding: 10px !important
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
                     
                    }
                    });
            });
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
                
                $scope.component_status = function (index  , id) {

                    var url = API_URL + "admin" + "/component_status";
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
                            
                            $scope.getComponentData($http, API_URL);

                            Message('success',response.data.msg);

                        }), (function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });

                    }
                    }
                    $scope.type_status = function (index  , id) {
                        var url = API_URL + "admin" + "/type_status";
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
                                
                                $scope.getTypeData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                        $scope.layer_status = function (index  , id) {
                        var url = API_URL + "admin" + "/layer-status";
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
                                
                                $scope.getLayerData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                        $scope.service_status = function (index  , id) {
                        var url = API_URL + "admin" + "/service-status";
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
                                
                                $scope.getServiceData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                        
                        $scope.layerType_status = function (index  , id) {
                        var url = API_URL + "admin" + "/layerType-status";
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
                                
                                $scope.getLayerTypeData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                        $scope.deliveryLayer_status = function (index  , id) {
                        var url = API_URL + "admin" + "/deliveryLayer-status";
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
                                
                                $scope.getDeliveryLayerData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                        
                        $scope.document_status = function (index  , id) {
                         
                        var url = API_URL + "admin" + "/document_status";
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
                                
                                $scope.getDocumentData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                        $scope.document_mandatory = function (index  , id) {
                         
                        var url = API_URL + "admin" + "/document_mandatory";
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
                                
                                $scope.getDocumentData($http, API_URL);

                                Message('success',response.data.msg);

                            }), (function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });

                        }
                        }
                        
                        $scope.pType_status = function (index  , id) {
                        var url = API_URL + "projectTypeStatus";
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
                    $scope.getRoleData = function($http, API_URL) {
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
                    $scope.getComponentData = function($http, API_URL) {
                        var url = API_URL + "admin" + "/get_component";
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        // http://localhost/AEC_PREFAB/aec/module?page=1
                        $http({
                            method: 'GET',
                            url: url,
                        }).then(function (response) {

                            $scope.component_module_get = response.data.data;		
                            
                        }, function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });
                    } 
                    $scope.getTypeData = function($http, API_URL) {
                        var url = API_URL + "admin" + "/get_type";
                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        // http://localhost/AEC_PREFAB/aec/module?page=1
                        $http({
                            method: 'GET',
                            url: url,
                        }).then(function (response) {

                            $scope.type_module_get = response.data.data;		
                            
                        }, function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });
                    
                    } 
                    $scope.getDeliveryLayerData = function($http, API_URL) {
                        var url = API_URL + "admin" + "/get-deliveryLayer";
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
                    $scope.getLayerData = function($http, API_URL) {
                        var url = API_URL + "admin" + "/get-layer";
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
                    $scope.getServiceData = function($http, API_URL) {
                        var url = API_URL + "admin" + "/get-service";
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
                    $scope.getLayerTypeData = function($http, API_URL) {
                        var url = API_URL + "admin" + "/get-layerType";
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
                    $scope.getDocumentData = function($http, API_URL) {
                        var url = API_URL + "admin" + "/get_document";
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
                    
                    $scope.getServiceData($http, API_URL); 
                    $scope.getLayerTypeData($http, API_URL); 
                    $scope.getDeliveryLayerData($http, API_URL); 
                    $scope.getLayerData($http, API_URL); 
                    $scope.getDocumentData($http, API_URL); 
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
                    
              
                    $scope.getProjectTypeData($http);
                    $scope.getTypeData($http, API_URL);
                    $scope.getComponentData($http, API_URL);
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



                    $scope.getMasterCalculation($http, API_URL);
                    $scope.getRoleData($http, API_URL);
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
                                
                                $scope.getRoleData($http, API_URL);

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
                $scope.toggleComponent = function (modalstate, id) {
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Component";
			                $scope.form_color = "primary";
                            $('#primary-component-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Component";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
			                $http.get(API_URL + 'admin/' +'edit_component/' + id )
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
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Type";
			                $scope.form_color = "primary";
                            $scope.resetForm();
                            $('#primary-type-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Type";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
			                $http.get(API_URL + 'admin/' +'edit_type/' + id )
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
                $scope.toggleLayer = function (modalstate, id) {
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Layer";
			                $scope.form_color = "primary";
                            $scope.resetForm();
                            $('#primary-layer-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Layer";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
			                $http.get(API_URL + 'admin/' +'edit-layer/' + id )
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
                $scope.toggleService = function (modalstate, id) {
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Service";
			                $scope.form_color = "primary";
                            $scope.resetForm();
                            $('#primary-service-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Service";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
			                $http.get(API_URL + 'admin/' +'edit-service/' + id )
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
                $scope.toggleLayerType = function (modalstate, id) {
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Layer Type";
			                $scope.form_color = "primary";
                            $scope.resetForm();
                            $('#primary-layerType-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Layer Type";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
			                $http.get(API_URL + 'admin/' +'edit-layerType/' + id )
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
                $scope.toggleDeliveryLayer = function (modalstate, id) {
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Delivery Layer";
			                $scope.form_color = "primary";
                            $scope.resetForm();
                            $('#primary-deliveryLayer-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Delivery Layer";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
			                $http.get(API_URL + 'admin/' +'edit-deliveryLayer/' + id )
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
                $scope.toggleDocument = function (modalstate, id) {
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Document";
			                $scope.form_color = "primary";
                            $scope.resetForm();
                            $('#primary-document-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Document";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
			                $http.get(API_URL + 'admin/' +'edit-document/' + id )
			                    .then(function (response) {
			                        $scope.module_document = response.data.data;
                                    
                                    $('#primary-document-modal').modal('show');

                                    angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                    
			                    });
			                break;
                     
			            default:
			                break;
			        } 
			       
			    }
                $scope.togglepType = function (modalstate, id) {
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create Project Type";
			                $scope.form_color = "primary";
                            $scope.resetForm();
                            $('#primary-pType-modal').modal('show');

			                break;
			            case 'edit':
			                $scope.form_title = "Update Project Type";
                            $scope.form_color = "success";
			                $scope.id = id;
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
							 
                            $scope.getRoleData($http, API_URL);
                            $scope.resetForm();
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
							 
                            $scope.getRoleData($http, API_URL);
                            $scope.resetForm();
							//location.reload();

							$('#primary-role-modal').modal('hide');


                            Message('success', response.data.msg);
                           


						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }


                $scope.save_component = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update_component/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_comp),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getComponentData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-component-modal').modal('hide');
                                $('#primary-component-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                        url+="add_component";
                        // alert(url)
                        console.log($scope.module_comp);
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_comp),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getComponentData($http, API_URL);
                            // $('#primary-component-modal').reset();
                            $scope.resetForm();
							//location.reload();
							$('#primary-component-modal').modal('hide');
                            Message('success', response.data.msg);
						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
                $scope.save_type = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update_type/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_type),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getTypeData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-type-modal').modal('hide');
                                $('#primary-type-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                        url+="add_type";
                        // alert(url)
                        console.log($scope.module_type);
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_type),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getTypeData($http, API_URL);
                            // $('#primary-component-modal').reset();
                            $scope.resetForm();
							//location.reload();
							$('#primary-type-modal').modal('hide');
                            Message('success', response.data.msg);
						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
                $scope.save_layer = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update-layer/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_layer),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getLayerData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-layer-modal').modal('hide');
                                // $('#primary-layer-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                        url+="add-layer";
                        // alert(url)
                        console.log($scope.module_layer);
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_layer),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getLayerData($http, API_URL);
                            // $('#primary-component-modal').reset();
                            $scope.resetForm();
							//location.reload();
							$('#primary-layer-modal').modal('hide');
                            Message('success', response.data.msg);
						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
                $scope.save_service = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update-service/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_service),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getServiceData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-service-modal').modal('hide');
                                // $('#primary-layer-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                        url+="add-service";
                        // alert(url)
                        console.log($scope.module_service);
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_service),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getServiceData($http, API_URL);
                            // $('#primary-component-modal').reset();
                            $scope.resetForm();
							//location.reload();
							$('#primary-service-modal').modal('hide');
                            Message('success', response.data.msg);
						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
                $scope.save_layerType = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update-layerType/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_layerType),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getLayerTypeData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-layerType-modal').modal('hide');
                                // $('#primary-layer-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                        url+="add-layerType";
                        // alert(url)
                        console.log($scope.module_layerType);
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_layerType),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getLayerTypeData($http, API_URL);
                            // $('#primary-component-modal').reset();
                            $scope.resetForm();
							//location.reload();
							$('#primary-layerType-modal').modal('hide');
                            Message('success', response.data.msg);
						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
                $scope.save_deliveryLayer = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update-deliveryLayer/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_deliveryLayer),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getDeliveryLayerData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-deliveryLayer-modal').modal('hide');
                                // $('#primary-layer-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                        url+="add-deliveryLayer";
                        // alert(url)
                        console.log($scope.module_deliveryLayer);
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_deliveryLayer),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getDeliveryLayerData($http, API_URL);
                            // $('#primary-component-modal').reset();
                            $scope.resetForm();
							//location.reload();
							$('#primary-deliveryLayer-modal').modal('hide');
                            Message('success', response.data.msg);
						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
                
                $scope.save_document = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update-document/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_document),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getDocumentData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-document-modal').modal('hide');
                                // $('#primary-document-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                        url+="add-document";
                        // alert(url)
                        console.log($scope.module_document);
						$http({
							method: method,
							url: url,
							data: $.param($scope.module_document),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            $scope.getDocumentData($http, API_URL);
                            // $('#primary-component-modal').reset();
                            $scope.resetForm();
							//location.reload();
							$('#primary-document-modal').modal('hide');
                            Message('success', response.data.msg);
						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
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

						}).then(function (response) {
						
                            $scope.getProjectTypeData($http);
                           
							    $('#primary-pType-modal').modal('hide');
                                $scope.resetForm();
                                // $('#primary-pType-modal').reset();

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
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

						}).then(function (response) {
							 
                            $scope.getProjectTypeData($http);
                            // $('#primary-component-modal').reset();
                            $scope.resetForm();
							//location.reload();
							$('#primary-pType-modal').modal('hide');
                            Message('success', response.data.msg);
						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
                $scope.resetForm =  function() {
                    $scope.module_role = {};
                    $scope.module_comp = {};
                    $scope.module_type = {};
                    $scope.module_pType = {};
                    $scope.module_layer = {};
                    $scope.module_service = {};
                    $scope.module_layerType = {};
                    $scope.module_deliveryLayer = {};
                    $scope.module_document = {};
                    $scope.RoleModule.$setPristine();
                    $scope.RoleModule.$setValidity();
                    $scope.RoleModule.$setUntouched();
                    $scope.ComponentModule.$setPristine();
                    $scope.ComponentModule.$setValidity();
                    $scope.ComponentModule.$setUntouched();
                    $scope.TypeModule.$setPristine();
                    $scope.TypeModule.$setValidity();
                    $scope.TypeModule.$setUntouched();
                    $scope.pTypeModule.$setPristine();
                    $scope.pTypeModule.$setValidity();
                    $scope.pTypeModule.$setUntouched();
                    $scope.DocumentModule.$setPristine();
                    $scope.DocumentModule.$setValidity();
                    $scope.DocumentModule.$setUntouched();
                    $scope.LayerModule.$setPristine();
                    $scope.LayerModule.$setValidity();
                    $scope.LayerModule.$setUntouched();
                    $scope.deliveryLayerModule.$setPristine();
                    $scope.deliveryLayerModule.$setValidity();
                    $scope.deliveryLayerModule.$setUntouched();
                    $scope.LayerTypeModule.$setPristine();
                    $scope.LayerTypeModule.$setValidity();
                    $scope.LayerTypeModule.$setUntouched();
                    $scope.ServiceModule.$setPristine();
                    $scope.ServiceModule.$setValidity();
                    $scope.ServiceModule.$setUntouched();
                    
                    
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
                
                
                $scope.confirmTypeDelete = function (id) {
                    var url = API_URL + 'admin/' + 'delete_type/';
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
                $scope.confirmLayerDelete = function (id) {
                    var url = API_URL + 'admin/' + 'delete-layer/';
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
                $scope.confirmServiceDelete = function (id) {
                    var url = API_URL + 'admin/' + 'delete-service/';
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
                
                $scope.confirmLayerTypeDelete = function (id) {
                    var url = API_URL + 'admin/' + 'delete-layerType/';
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

                getComponentLayerData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
                    $http({
                        method: 'GET',
                        url: API_URL + "admin/component-data"
                    }).then(function (response) {
                        // alert(JSON.stringify(response))
                        $scope.component_module_name = response.data.data;		
                        // $scope.employee_module.epm_id = response.data.data.emp_id.id;
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                    }
                    getLayerTypeData = function($http, API_URL) {

                        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                        // http://localhost/AEC_PREFAB/aec/module?page=1
                        $http({
                            method: 'GET',
                            url: API_URL + "admin/layer-data"
                        }).then(function (response) {
                            // alert(JSON.stringify(response))
                            $scope.layer_module_name = response.data.data;		
                            // $scope.employee_module.epm_id = response.data.data.emp_id.id;
                        }, function (error) {
                            console.log(error);
                            console.log('This is embarassing. An error has occurred. Please check the log for details');
                        });
                        }
                    
                        getLayerTypeData($http, API_URL);
                    getComponentLayerData($http, API_URL);

                $scope.confirmDeliveryLayerDelete = function (id) {
                    var url = API_URL + 'admin/' + 'delete-deliveryLayer/';
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
                
                $scope.confirmDocumentDelete = function (id) {
                    var url = API_URL + 'admin/' + 'delete_document/';
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
                
                $scope.confirmComponentDelete = function (id) {
                    var url = API_URL + 'admin/' + 'delete_component/';
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
								 
                                $scope.getRoleData($http, API_URL);

                              
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