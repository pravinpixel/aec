@extends('admin.setup.index')
@section('setup-content')
<div ng-controller="ProjectController">
    <div class="card">  
        <div class="card-header ">
            <div class="d-flex justify-content-between">
                <h4 class="haeder-title">Project Type</h4>
                <button class="btn btn-primary " ng-click="togglepType('add', 0)">Create New Project Type</button>
            </div>
        </div>
        <div class="card-body">
            <table  dt-options="vm.dtOptions" class="table custom table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="(index,pType) in pType_module_get track by pType.id">
                        <td class="align-items-center">@{{ pType.project_type_name }}</td>
                        <td>
                            <div>
                                <input type="checkbox" id="switch__@{{ index }}" ng-checked="pType.is_active == 1" data-switch="success"/>
                                <label for="switch__@{{index}}" data-on-label="On" ng-click="pType_status(index,pType.id)" data-off-label="Off"></label>
                            </div> 
                            <span ng-if="pType.is_active == 1" class="d-none">1</span>              
                            <span ng-if="pType.is_active == 0" class="d-none">0</span>              
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="togglepType('edit', pType.id)"><i class="fa fa-edit"></i></button>
                                <button class="shadow btn btn-sm btn-outline-danger rounded-pill  " ng-click="confirmpTypeDelete(pType.id)"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-fooetr"></div>
    </div> 
    <div id="primary-pType-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-@{{form_color}}">
                    <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form name="pTypeModule" class="form-horizontal" novalidate="">
                        <div class="form-group error mb-2">
                            <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Project Type Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error" id="project_type_name" name="project_type_name" placeholder="Type Here.." ng-model="module_pType.project_type_name" ng-required="true" required>
                                <small class="help-inline text-danger">This  Fields is Required</small>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-12 pt-3">
                                <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                <div>
                                    <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                        <input type="radio"  ng-checked="module_pType.is_active == 1" id="active" value="1" ng-model="module_pType.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline form-radio-dark">
                                        <input type="radio" ng-checked="module_pType.is_active == 0" id="Deactive" value="0" ng-model="module_pType.is_active" name="is_active" class="form-check-input" ng-required="true">
                                        <label class="form-check-label" for="Deactive">Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_pType(modalstate, id); $event.stopPropagation();" ng-disabled="pTypeModule.$invalid">Submit</button>
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
        app.controller('ProjectController', function($scope, $http,API_URL){
            $scope.getProjectTypeData = function($http) {
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
            $scope.togglepType = function (modalstate, id) {
                $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Project Type";
                        $scope.form_color = "primary";
                        $scope.module_pType = {};
                        $('#primary-pType-modal').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Project Type";
                            $scope.form_color = "success";
                            $scope.id = id;
                            $scope.module_pType = {};
                            method = "GET";
                            $http({
                                method: method,
                                url: API_URL +'project-type/' + id ,
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                            }).then(function (response) {
                                $scope.module_pType = response.data.data;
                                $('#primary-pType-modal').modal('show');
                            });
                    break;
                    
                    default:
                        break;
                } 
                
            }
            $scope.save_pType = function (modalstate, id) {
                var url = API_URL;
                var method = "POST";
                if (modalstate === 'edit') {
                    url += "project-type/" + id;
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
            $scope.confirmpTypeDelete = function (id) {
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
                            url: API_URL + 'project-type/' + id                                
                        }).then(function (response) {
                            $scope.getProjectTypeData($http);
                            if(response.data.status == false) {
                                Message('warning',response.data.msg);
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
            };
        });
    </script>
@endpush