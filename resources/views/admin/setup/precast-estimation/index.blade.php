@extends('admin.setup.index')
@section('setup-content')
    <section ng-controller="PrecastEstimateController">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="{{ route('setup.precast-estimation') }}" class="nav-link active fw-bold text-primary">Service</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setup.precast-estimation-cost-preset') }}" class="nav-link">Cost Preset</a>
            </li>
        </ul>
        <div class="text-end mb-2">
            <button class="btn btn-primary btn-sm" id="costEstimationTab" ng-click="toggleModalForm('add', 0)">+ Add new</button> 
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(index,precastEstimation) in precastEstimations">
                    <td class="align-items-center">@{{ precastEstimation.name }}</td>
                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="precastEstimation.is_active == 1" data-switch="success"/>
                            <label for="switch__@{{index}}" data-on-label="On" ng-click="changeprecastEstimateStatus(precastEstimation.id, precastEstimation.is_active)" data-off-label="Off"></label>
                        </div>
                        <span ng-if="precastEstimation.is_active == 1" class="d-none">1</span>              
                        <span ng-if="precastEstimation.is_active == 0" class="d-none">0</span>              
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleModalForm('edit', precastEstimation.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-danger rounded-pill  " ng-click="delete(precastEstimation.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="precastestimate-form-popup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-@{{form_color}}">
                        <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="LayerModule" class="form-horizontal" novalidate="">
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="precast_estimate_item.name" ng-required="true" required>
                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                </div>
                            </div> 
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Hours</label>
                                <div class="col-sm-12">
                                    <input type="text" onkeypress="" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="precast_estimate_item.hours" ng-required="true" required>
                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                            <input type="radio"  ng-checked="precast_estimate_item.is_active == 1" id="active" value="1" ng-model="precast_estimate_item.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="precast_estimate_item.is_active == 0" id="Deactive" value="0" ng-model="precast_estimate_item.is_active" name="is_active" class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="Deactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="storeModalprecastForm(modalstate, id)" ng-disabled="LayerModule.$invalid">Submit</button>
                            </div>
                        </form>
                    </div>
                   
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </section> 
@endsection
@push('custom-scripts') 
    <script>
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
                        $scope.precast_estimate_item = {};
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
                    $scope.precast_estimate_item = {};
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
                            getPrecastEstimates();
                            Message('success',response.data.msg);
                        }); 
                    }
                });
            }
        });
    </script>
@endpush