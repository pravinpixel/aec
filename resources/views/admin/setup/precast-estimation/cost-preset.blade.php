@extends('admin.setup.index')
@section('setup-content')
    <section ng-controller="CostPrecastEstimateController">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="{{ route('setup.precast-estimation') }}" class="nav-link">Service</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setup.precast-estimation-cost-preset') }}" class="nav-link active fw-bold text-primary">Cost Preset</a>
            </li>
        </ul>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Hours</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(index,precastEstimation) in precastEstimations">
                    <td class="align-items-center">@{{ precastEstimation.name }}</td>
                    <td class="align-items-center">@{{ precastEstimation.hours }}</td>
                    <td>
                        <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="edit(precastEstimation)"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" >Edit Hours</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Hours</label>
                                <div class="col-sm-12">
                                    <input type="text" onkeypress="return isNumber(event)" class="form-control" required ng-model="editableData.hours">
                                </div>
                            </div> 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" ng-click="store()">Submit</button>
                            </div>
                        </div>
                    </div>
                   
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </section> 
@endsection
@push('custom-scripts') 
    <script>
         app.controller('CostPrecastEstimateController', function($scope, $http, $routeParams, API_URL){
            getPrecastEstimates = () => {
                $http.get(`${API_URL}precast-estimate`).then((res)=> {
                    $scope.precastEstimations = res.data; 
                });
            }
            getPrecastEstimates()
            $scope.edit = (data) => {
                $scope.editableData = data
                $('#editModal').modal('show')
            }
            $scope.store = () => {
                $http.put(`${API_URL}precast-estimate/${$scope.editableData.id}`, $scope.editableData).then((res)=> {
                    $scope.precastEstimations = res.data; 
                    if(res.status) {
                        $('#editModal').modal('hide')
                        Message('success',res.data.msg)
                        getPrecastEstimates()
                    }
                });
            }
        });
    </script>
@endpush