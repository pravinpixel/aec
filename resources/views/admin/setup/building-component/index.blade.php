@extends('admin.setup.index')
@section('setup-content')
    <div ng-controller="buildingComponentController">
        <div class="card">
            <div class="card-header ">
                <div class="d-flex justify-content-between">
                    <h4 class="haeder-title">Building Component</h4>
                    <button class="btn btn-primary btn-sm" ng-click="toggleComponent('add', 0)">Create New Building Component</button>
                </div>
            </div>
            <div class="card-body">
                <table dt-options="vm.dtOptions" class="table custom table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Order Id</th>
                            <th>Label</th>
                            <th>Icon</th>
                            <th>Top Name</th>
                            <th>Bottom Name</th>
                            <th>Status</th>
                            <th>Cost Estimate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(index,comp) in component_module_get">
                            <td class="align-items-center">@{{ comp.building_component_name }}</td>
                            <td><span>@{{ comp.order_id }} </span></td>
                            <td><span>@{{ comp.label }} </span></td>
                            <td>
                                <img src="{{ asset('/public/uploads/building-component-icon/') }}/@{{ comp.building_component_icon }}"
                                    ng-show="comp.building_component_icon" alt="no image" width="60px">
                            </td>
                            <td><span>@{{ comp.top_position }} </span></td>
                            <td><span>@{{ comp.bottom_position }} </span></td>
                            <td>
                                <div>
                                    <input type="checkbox" id="switch__@{{ index }}"
                                        ng-checked="comp.is_active == 1" data-switch="success" />
                                    <label for="switch__@{{ index }}" data-on-label="On"
                                        ng-click="component_status(index,comp.id)" data-off-label="Off"></label>
                                </div>
                                <span ng-if="comp.is_active == 1" class="d-none">1</span>
                                <span ng-if="comp.is_active == 0" class="d-none">0</span>
                            </td>
                            <td>
                                <div>
                                    <input type="checkbox" id="switch_cost_estimate__@{{ index }}"
                                        ng-checked="comp.cost_estimate_status == 1" data-switch="success" />
                                    <label for="switch_cost_estimate__@{{ index }}" data-on-label="On"
                                        ng-click="component_cost_estimate_status(index,comp.id)"
                                        data-off-label="Off"></label>
                                </div>
                                <span ng-if="comp.cost_estimate_status == 1" class="d-none">1</span>
                                <span ng-if="comp.cost_estimate_status == 0" class="d-none">0</span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill"
                                        ng-click="toggleComponent('edit', comp.id)"><i class="fa fa-edit"></i></button>
                                    <button class="shadow btn btn-sm btn-outline-danger rounded-pill  "
                                        ng-click="confirmComponentDelete(comp.id)"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="primary-component-modal" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="@{{ form_color }}-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-@{{ form_color }}">
                        <h4 class="modal-title" id="@{{ form_color }}-header-modalLabel">@{{ form_title }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="ComponentModule" novalidate>
                            <div class="row m-0">
                                <div class="col-md-6 my-2">
                                    <strong class="mb-3"> Building Component Name <sup class="text-danger">*</sup></strong>
                                    <input type="text" class="form-control has-error" id="building_component_name"
                                        name="building_component_name" placeholder="Type Here.."
                                        ng-model="module_comp.building_component_name" ng-required="true">
                                </div>
                                <div class="col-md-6 my-2">
                                    <strong class="mb-3">Order Id</strong>
                                    <input type="text" onkeypress="return isNumber(event)"
                                        class="form-control has-error" id="order_id" name="order_id"
                                        placeholder="Type Here.." ng-model="module_comp.order_id" ng-required="true">
                                </div>
                                <div class="col-md-6 my-2">
                                    <strong class="mb-3">Menu Icon <sup class="text-danger">*</sup></strong>
                                    <input type="file" class="form-control" id="building_component_icon"
                                        name="building_component_icon" placeholder="Type Here.."
                                        ng-model="module_comp.building_component_icon">
                                    <img src="{{ asset('/public/uploads/building-component-icon/') }}/@{{ module_comp.building_component_icon }}"
                                        ng-show="module_comp.building_component_icon" alt="no image" width="60px"></td>
                                </div>
                                <div class="col-md-6 my-2">
                                    <strong class="mb-3">Top Name <sup class="text-danger">*</sup></strong>
                                    <input type="text" class="form-control has-error" id="top_position"
                                        name="top_position" placeholder="Type Here.."
                                        ng-model="module_comp.top_position">
                                </div>
                                <div class="col-md-6 my-2">
                                    <strong class="mb-3">Bottom Name <sup class="text-danger">*</sup></strong>
                                    <input type="text" class="form-control has-error" id="bottom_position"
                                        name="bottom_position" placeholder="Type Here.."
                                        ng-model="module_comp.bottom_position">
                                </div>
                                <div class="col-md-6 my-2">
                                    <strong class="mb-3">Status <sup class="text-danger">*</sup></strong>
                                    <div class="mt-2">
                                        <div class="form-check form-check-inline form-radio-@{{ form_color }}">
                                            <input type="radio" ng-checked="module_comp.is_active == 1" id="active"
                                                value="1" ng-model="module_comp.is_active" name="is_active"
                                                class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="module_comp.is_active == 0" id="Deactive"
                                                value="0" ng-model="module_comp.is_active" name="is_active"
                                                class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="Deactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <strong class="mb-3">Cost Estimate <sup class="text-danger">*</sup></strong>
                                    <div class="mt-2">
                                        <div class="form-check form-check-inline form-radio-@{{ form_color }}">
                                            <input type="radio" ng-checked="module_comp.cost_estimate_status == 1"
                                                id="active1" value="1" ng-model="module_comp.cost_estimate_status"
                                                name="cost_estimate_status" class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="active1">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="module_comp.cost_estimate_status == 0"
                                                id="Deactive1" value="0" ng-model="module_comp.cost_estimate_status"
                                                name="cost_estimate_status" class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="Deactive1">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <strong class="mb-3">Label Name <sup class="text-danger">*</sup></strong>
                                    <div>
                                        <input type="text" class="form-control has-error" id="label" name="label" placeholder="Type Here.." ng-model="module_comp.label">
                                    </div>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-@{{ form_color }}" id="btn-save" ng-click="save_component(modalstate, id); $event.stopPropagation();" ng-disabled="ComponentModule.$invalid">Submit</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        app.controller('buildingComponentController', function($scope, $http, API_URL, $location) {
            $scope.toggleComponent = function (modalstate, id) {
                $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Component";
                        $scope.form_color = "primary";
                        $scope.module_comp = {};
                        $('#primary-component-modal').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Component";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_comp = {};                      
                        $http.get(API_URL +'building-component/' + id ).then(function (response) {
                            $scope.module_comp = response.data.data;
                            $('#primary-component-modal').modal('show');
                        });
                        break;
                } 
            }
            $scope.save_component = function (modalstate, id) {
                var url = API_URL + "building-component-update";
                    var file =  document.getElementById('building_component_icon').files[0];
                    $scope.file = file;
                    var fd = new FormData();
                    fd.append('building_component_name', $scope.module_comp.building_component_name);
                    fd.append('order_id',$scope.module_comp.order_id);
                    fd.append('file',  $scope.file);
                    fd.append('top_position', $scope.module_comp.top_position);
                    fd.append('bottom_position',$scope.module_comp.bottom_position);
                    fd.append('is_active', $scope.module_comp.is_active);
                    fd.append('cost_estimate_status',$scope.module_comp.cost_estimate_status);
                    fd.append('label', $scope.module_comp.label);
                    fd.append('id', id);
                if (modalstate === 'edit') {
                    $http({
                        method: "POST",
                        url: url,
                        data:fd,
                        headers: { 'Content-Type': undefined},
                        transformRequest: angular.identity
                    }).then(function successCallback(response) {
                        $scope.getComponentData($http, API_URL);
                        $('#primary-component-modal').modal('hide');
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors.building_component_name);
                    });
                }else {
                    url = API_URL + "building-component";
                    $http({
                        method: "POST",
                        url: url,
                        data: fd,
                        headers: { 'Content-Type': undefined},
                          transformRequest: angular.identity
                    }).then(function successCallback(response) {
                        $scope.getComponentData($http, API_URL);
                        $('#primary-component-modal').modal('hide');
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors.building_component_name);
                    });
                }
            }
            $scope.getComponentData = function($http, API_URL) {
                var url = API_URL + "building-component";
                $http({
                    method: 'GET',
                    url: url,
                }).then(function (response) {
                    $scope.component_module_get = response.data;		
                }, function (error) {
                    console.log(error);
                });
            }
            $scope.getComponentData($http, API_URL);
            $scope.component_status = function (index  , id) {
                $http({
                    method: "PUT",
                    url: API_URL + "building-component" + "/status/" + id,
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
            $scope.component_cost_estimate_status = function(index  , id) {
                $http({
                    method: "PUT",
                    url: API_URL + "building-component" + "/cost-estimate-status/" + id,
                    data: $.param({'cost_estimate_status':0}),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                }).then(function (response) {
                    $scope.getComponentData($http, API_URL);
                    Message('success',response.data.msg);
                }), (function (error) {
                    console.log(error);
                });
            }
            $scope.confirmComponentDelete = function (id) {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $http({
                            method: 'DELETE',
                            url: API_URL + 'building-component/' + id                              
                        }).then(function (response) {
                            $scope.getComponentData($http, API_URL);
                            if(response.data.status == false) {
                                Message('warning',response.data.msg);
                            }
                            if(response.data.status == true) {
                                Message('success', response.data.msg);
                            }  
                        }, function (error) {
                            Message('warning',response.data.msg);
                        });
                    } else {
                        swal("Your Data is safe!");
                    }
                });
            }
        });
    </script>
@endpush