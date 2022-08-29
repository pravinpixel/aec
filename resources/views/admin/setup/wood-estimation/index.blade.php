@extends('admin.setup.index')
@section('setup-content')
    <section ng-controller="WoodEstimateController">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="{{ route('setup.roles') }}" class="nav-link active fw-bold text-primary">Service</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setup.permissions',1) }}" class="nav-link">Cost Preset</a>
            </li>
        </ul>
        <div class="text-end mb-2">
            <button class="btn btn-primary" id="costEstimationTab" ng-click="toggleModalForm('add', 0)">+ Add new</button> 
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
                <tr ng-repeat="(index,woodEstimation) in woodEstimations">
                    <td class="align-items-center">@{{ woodEstimation.name }}</td>
                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="woodEstimation.is_active == 1" data-switch="success"/>
                            <label for="switch__@{{index}}" data-on-label="On" ng-click="changeWoodEstimateStatus(woodEstimation.id, woodEstimation.is_active)" data-off-label="Off"></label>
                        </div>
                        <span ng-if="woodEstimation.is_active == 1" class="d-none">1</span>              
                        <span ng-if="woodEstimation.is_active == 0" class="d-none">0</span>              
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleModalForm('edit', woodEstimation.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-danger rounded-pill  " ng-click="delete(woodEstimation.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="woodestimate-form-popup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-@{{form_color}}">
                        <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="LayerModule" class="form-horizontal" novalidate="">
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Wood Estimate Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="wood_estimate_item.name" ng-required="true" required>
                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                            <input type="radio"  ng-checked="wood_estimate_item.is_active == 1" id="active" value="1" ng-model="wood_estimate_item.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="wood_estimate_item.is_active == 0" id="Deactive" value="0" ng-model="wood_estimate_item.is_active" name="is_active" class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="Deactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="storeModalWoodForm(modalstate, id)" ng-disabled="LayerModule.$invalid">Submit</button>
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
        app.controller('WoodEstimateController', function($scope, $http,API_URL){
            $http.get(`${API_URL}get-for-cost-estimate`)
            .then((res) => {
                $scope.buildingComponents = res.data;
            });

            $http.get(`${API_URL}get-delivery-type`)
            .then((res) => {
                $scope.deliveryTypes = res.data;
            });

            $http.get(`${API_URL}wood-estimation-values`)
                .then((res) => {
                    $scope.calculations = res.data.map( (item) => {
                        return { ...item, ...{
                            detail_price: Number(item.detail_price),
                            detail_sum: Number(item.detail_sum),
                            statistic_price: Number(item.statistic_price),
                            statistic_sum:Number(item.statistic_sum),
                            cad_cam_price: Number(item.cad_cam_price),
                            cad_cam_sum:Number(item.cad_cam_sum),
                            logistic_price: Number(item.logistic_price),
                            logistic_sum: Number(item.logistic_sum),
                            total_price:Number(item.total_price)}
                        }
                    });
            });

            $scope.deleteCalculation =  (id) => {
                $http.delete(`${API_URL}admin/cal-wood-estimation/${id}`).then((res) => {
                    if(res.data.status) {
                        Message('success',res.data.msg);
                        $scope.calculations = $scope.calculations.map((obj) => {
                            if (obj.component_id == res.data.data.component_id && obj.type_id == res.data.data.type_id) {
                                return {...obj, ...{
                                            detail_price: 0,
                                            detail_sum: 0,
                                            statistic_price: 0,
                                            statistic_sum:0,
                                            cad_cam_price:0,
                                            cad_cam_sum:0,
                                            logistic_price:0,
                                            logistic_sum: 0,
                                            total_price:0,
                                            total_sum:0,
                                            status: 2
                                        }
                                    }
                                };
                            
                            return obj;
                        });
                    }
                });
            }

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
                    $scope.wood_estimate_item = {};
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
    </script>
@endpush