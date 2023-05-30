@extends('admin.setup.index')
@section('setup-content')
<div ng-controller="serviceController">
    <div class="card">
        <div class="card-header">
            <div class="align-items-center d-flex justify-content-between">
                <h4 class="haeder-title">Service</h4>
                <div> 
                    <label for="all" class="mx-2"><input ng-click="filter(0)" ng-model="mtFilter" ng-value="0" checked type="radio" name="filter" class="form-check-input me-2" id="all">All</label>
                    <label for="type1" class="mx-2"><input ng-click="filter(2)" ng-model="mtFilter" ng-value="2" type="radio" name="filter" class="form-check-input me-2" id="type1">Precast</label>
                    <label for="type2" class="mx-2"><input ng-click="filter(1)" ng-model="mtFilter" ng-value="1" type="radio" name="filter" class="form-check-input me-2" id="type2">Timber Frame</label>
                    <button class="btn btn-primary btn-sm" ng-click="toggleService('add', 0)">Create New Service</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table datatable="ng" dt-options="vm.dtOptions" class="table custom table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Output Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="(index,service) in service_module_get">
                        <td class="align-items-center">@{{ service.service_name }}</td>
                        <td>
                            <div>
                                <input type="checkbox" id="switch__@{{ index }}" ng-checked="service.is_active == 1" data-switch="success"/>
                                <label for="switch__@{{index}}" data-on-label="On" ng-click="service_status(index,service.id)" data-off-label="Off"></label>
                            </div>
                            <span ng-if="service.is_active == 1" class="d-none">1</span>              
                            <span ng-if="service.is_active == 0" class="d-none">0</span>             
                        </td>
                        <td class="align-items-center">@{{ service.output_type_name }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleService('edit', service.id)"><i class="fa fa-edit"></i></button>
                                <button class="shadow btn btn-sm btn-outline-danger rounded-pill" ng-click="confirmServiceDelete(service.id)"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="primary-service-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-@{{form_color}}">
                    <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form name="ServiceModule" class="form-horizontal" novalidate="">
                        <div class="form-group error mb-2">
                            <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Service Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error" id="service_name" name="service_name" placeholder="Type Here.." ng-model="module_service.service_name" ng-required="true" required>
                                <small class="help-inline text-danger">This  Fields is Required</small>
                            </div>
                        </div>
                        <div class="form-group error mb-2">
                            <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Output Type</label>
                            <div class="col-sm-12">
                                <select  class="form-select"  ng-model="module_service.output_type_id" name="output_type_id"    ng-required="true">
                                    <option value="" selected>Select</option>  
                                    <option value="@{{ emp.id }}"  ng-selected="emp.id == module_service.output_type_id" ng-repeat="(index,emp) in output_module_name">@{{ emp.output_type_name }}</option>  
                                </select>
                               
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-12 pt-3">
                                <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                <div>
                                    <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                        <input type="radio"  ng-checked="module_service.is_active == 1" id="active" value="1" ng-model="module_service.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline form-radio-dark">
                                        <input type="radio" ng-checked="module_service.is_active == 0" id="Deactive" value="0" ng-model="module_service.is_active" name="is_active" class="form-check-input" ng-required="true">
                                        <label class="form-check-label" for="Deactive">Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_service(modalstate, id); $event.stopPropagation();" ng-disabled="ServiceModule.$invalid">Submit</button>
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
        app.controller('serviceController', function ($scope, $http, API_URL, $location) {
            $scope.mtFilter  = 0
            $scope.getServiceData = function($http, API_URL) {
                $http({
                    method: 'GET',
                    url: url,
                }).then(function (response) {
                    $scope.service_module_get = response.data;		
                }, function (error) {
                    console.log(error);
                });
            } 
            $scope.getOutputDataService = function($http, API_URL) {
                $http({
                    method: 'GET',
                    url: API_URL + "output-data"
                }).then(function (response) {
                    $scope.output_module_name = response.data.data;		
                }, function (error) {
                    console.log(error);
                });
            }
            $scope.toggleService = function (modalstate, id) {
                $scope.modalstate = modalstate;
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
                        $http.get(API_URL + 'service/' + id ).then(function (response) {
                            $scope.module_service = response.data.data;
                            $('#primary-service-modal').modal('show');
                        });
                    break;
                } 
            }
            $scope.confirmServiceDelete = function (id) {
                var url = API_URL + 'service/' + id;
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
                            url: url,                             
                        }).then(function (response) {
                            $scope.filter($scope.mtFilter)
                            if(response.data.status == false) {
                                Message('warning',response.data.msg);
                            }
                            if(response.data.status == true) {
                                Message('success', response.data.msg);
                            }  
                        }, function (error) { 
                            Message('warning',response.data.msg);
                            console.log('Unable to delete');
                        });
                    } else {
                        swal("Your Data is safe!");
                    }
                });
            }
            $scope.getServiceData = function($http, API_URL) {
                $http({
                    method: 'GET',
                    url: API_URL + "service",
                }).then(function (response) {
                    $scope.service_module_get = response.data;
                }, function (error) {
                    console.log(error);
                });
            } 
            $scope.save_service = function (modalstate, id) {
                var url = API_URL + "service";
                var method = "POST";
                if (modalstate === 'edit') {
                    url += "/" + id;
                    method = "PUT";
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_service),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).then(function successCallback(response) {
                        $scope.filter($scope.mtFilter)
                        $('#primary-service-modal').modal('hide');                      
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors.output_type_id);
                    });
                }else {
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_service),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).then(function successCallback(response) {
                        $scope.filter($scope.mtFilter)
                        $('#primary-service-modal').modal('hide');                      
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors.output_type_id);
                    });
                }
            }
            $scope.serviceGetData = function () {
                $scope.getOutputDataService($http, API_URL);
                $scope.getServiceData($http, API_URL);
            }
            $scope.serviceGetData()
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
                        $scope.filter($scope.mtFilter)
                        Message('success',response.data.msg);
                    }), (function (error) {
                        console.log(error);
                    });
                }
            } 
            $scope.filter = (type_id) => {
                var tempData = [];
                $http({
                    method: 'GET',
                    url: API_URL + "service",
                }).then(function (response) {
                    if(type_id != 0) {
                        response.data.map((item) =>  {
                            if(item.output_type_id == type_id) {
                                tempData.push(item)
                            }
                        })
                        $scope.service_module_get =  tempData 
                    } else {
                        $scope.service_module_get = response.data
                    }
                }); 
            }
        });
    </script>
@endpush