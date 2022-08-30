
@extends('admin.setup.index')
@section('setup-content')
    <div ng-controller="constructionTypeController">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="haeder-title">Construction Type</h4>
                    <button class="btn btn-primary btn-sm" ng-click="toggleType('add', 0)">Create New Construction Type</button>
                </div>
            </div>
            <div class="card-body">
                <table dt-options="vm.dtOptions" class="table custom table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(index,type) in type_module_get track by type.id">
                            <td class="align-items-center">@{{ type.building_type_name }}</td>
                            <td>
                                <div>
                                    <input type="checkbox" id="switch__@{{ index }}" ng-checked="type.is_active == 1" data-switch="success"/>
                                    <label for="switch__@{{index}}" data-on-label="On" ng-click="type_status(index,type.id)" data-off-label="Off"></label>
                                </div>  
                                <span ng-if="type.is_active == 1" class="d-none">1</span>              
                                <span ng-if="type.is_active == 0" class="d-none">0</span>               
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleType('edit', type.id)"><i class="fa fa-edit"></i></button>
                                    <button class="shadow btn btn-sm btn-outline-danger rounded-pill  " ng-click="confirmTypeDelete(type.id)"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 
        <div id="primary-type-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-@{{form_color}}">
                        <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="TypeModule" class="form-horizontal" novalidate="">
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12  text-dark control-label mb-2">Construction Type Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control has-error" id="type_name" name="type_name" placeholder="Type Here.." ng-model="module_type.building_type_name" ng-required="true" required>
                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                            <input type="radio"  ng-checked="module_type.is_active == 1" id="active" value="1" ng-model="module_type.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="module_type.is_active == 0" id="Deactive" value="0" ng-model="module_type.is_active" name="is_active" class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="Deactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_type(modalstate, id); $event.stopPropagation();" ng-disabled="TypeModule.$invalid">Submit</button>
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
        app.controller('constructionTypeController', function ($scope, $http, API_URL, $location) {
            
            $scope.toggleType = function (modalstate, id) {
                $scope.modalstate = modalstate;
                $scope.module_type = {};
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Type";
                        $scope.form_color = "primary";
                        $('#primary-type-modal').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Type";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_type = {};
                        $http.get(API_URL +'building-type/' + id ).then(function (response) {
                                $scope.module_type = response.data.data;
                                $('#primary-type-modal').modal('show');
                            });
                        break;
                } 
            }
            $scope.confirmTypeDelete = function (id) {
                var url = API_URL + 'building-type/';
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
                            url: url + id                              
                        }).then(function (response) {
                            $scope.getTypeData($http, API_URL);
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
            $scope.save_type = function (modalstate, id) {
                var url = API_URL + "building-type";
                var method = "POST";
                if (modalstate === 'edit') {
                    url += "/" + id;
                    method = "PUT";
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_type),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).then(function successCallback(response) {
                        $scope.getTypeData($http, API_URL);
                        $('#primary-type-modal').modal('hide');
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors.building_type_name);
                    });
                }else {
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_type),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).then(function successCallback(response) {
                        $scope.getTypeData($http, API_URL);
                        $('#primary-type-modal').modal('hide');
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors.building_type_name);
                    });
                } 
            } 
            $scope.getTypeData = function($http, API_URL) { 
                $http({
                    method: 'GET',
                    url: API_URL + "building-type",
                }).then(function (response) {
                    $scope.type_module_get = response.data;		
                }, function (error) {
                    console.log(error);
                });
            }
            $scope.getTypeData($http, API_URL);
            $scope.type_status = function (index  , id) {
                $http({
                    method: "PUT",
                    url: API_URL + "building-type/status/" + id,
                    data: $.param({'status':0}),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    $scope.getTypeData($http, API_URL);
                    Message('success',response.data.msg);
                }), (function (error) {
                    console.log(error);
                });
            }
        });
    </script>
@endpush