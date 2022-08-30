@extends('admin.setup.index')
@section('setup-content')
    <div ng-controller="constructionTypeController">
        <div class="card">
            <div class="card-header ">
                <div class="d-flex justify-content-between">
                    <h4 class="haeder-title">Building Type</h4>
                    <button class="btn btn-primary btn-sm" ng-click="toggleOutput('add', 0)">Create New Building Type</button>
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
                        <tr ng-repeat="(index,output) in output_module_get track by output.id">
                            <td class="align-items-center">@{{ output.output_type_name }}</td>
                            <td>
                                <div>
                                    <input type="checkbox" id="switch__@{{ index }}" ng-checked="output.is_active == 1" data-switch="success"/>
                                    <label for="switch__@{{index}}" data-on-label="On" ng-click="output_status(index,output.id)" data-off-label="Off"></label>
                                </div> 
                                <span ng-if="output.is_active == 1" class="d-none">1</span>              
                                <span ng-if="output.is_active == 0" class="d-none">0</span>             
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleOutput('edit', output.id)"><i class="fa fa-edit"></i></button>
                                    <button class="shadow btn btn-sm btn-outline-danger rounded-pill  " ng-click="confirmOutputDelete(output.id)"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-fooetr"></div>
        </div>  
        <div id="primary-output-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-@{{form_color}}">
                        <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="OutputModule" class="form-horizontal" novalidate="">
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Building Type Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control has-error" id="output_type_name" name="output_type_name" placeholder="Type Here.." ng-model="module_output.output_type_name" ng-required="true" required>
                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                </div>
                            </div>
                            <div class="row">
                              
                                    <div>
                                        <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                            <input type="radio"  ng-checked="module_output.is_active == 1" id="active" value="1" ng-model="module_output.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="module_output.is_active == 0" id="Deactive" value="0" ng-model="module_output.is_active" name="is_active" class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="Deactive">Inactive</label>
                                        </div>
                                    </div>
                              
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_output(modalstate, id); $event.stopPropagation();" ng-disabled="OutputModule.$invalid">Submit</button>
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
            $scope.toggleOutput = function (modalstate, id) {
                $scope.modalstate = modalstate;
                // $scope.module = null;
        
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Building Type";
                        $scope.form_color = "primary";
                        $scope.module_output = {};
                        // $scope.OutputModule.$setPristine();
                        // $scope.OutputModule.$setUntouched();   
                        $('#primary-output-modal').modal('show');

                        break;
                    case 'edit':
                        $scope.form_title = "Edit Building Type";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.module_output = {};
                        // $scope.OutputModule.$setPristine();
                        // $scope.OutputModule.$setUntouched();
                    $http.get(API_URL + 'output-type/' + id )
                        .then(function (response) {
                            $scope.module_output = response.data.data;
                            $('#primary-output-modal').modal('show');
                        });
                    break;
                } 
            }
            $scope.confirmOutputDelete = function (id) {
                var url = API_URL + 'output-type/'+ id;
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
            $scope.save_output = function (modalstate, id) {
                var url = API_URL + "output-type";
                var method = "POST";
                if (modalstate === 'edit') {
                    url += "/" + id;
                    method = "PUT";
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_output),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).then(function successCallback(response) {
                        $scope.getOutputData($http, API_URL);
                        $('#primary-output-modal').modal('hide');
                        Message('success',response.data.msg);
                        }, function errorCallback(response) {
                            Message('danger',response.data.errors.output_type_name);
                        });
                }else {
                    $http({
                        method: method,
                        url: url,
                        data: $.param($scope.module_output),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).then(function successCallback(response) {
                        $scope.getOutputData($http, API_URL);
                        $('#primary-output-modal').modal('hide');
                        Message('success',response.data.msg);
                    }, function errorCallback(response) {
                        Message('danger',response.data.errors.output_type_name);
                    });
                }
            }
            $scope.getOutputData = function($http, API_URL) {
                var url = API_URL + "output-type";  
                $http({
                    method: 'GET',
                    url: url,
                }).then(function (response) { 
                    $scope.output_module_get = response.data;		 
                }, function (error) {
                    console.log(error); 
                });
            } 
            $scope.getOutputData($http, API_URL);
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
                    });
                }
            }
        });
    </script>
@endpush