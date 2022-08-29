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
        <table class="table custom table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(index,precastEstimation) in precastEstimations">
                    <td class="align-items-center">@{{ precastEstimation.name }}</td>
                    <td class="align-items-center">@{{ precastEstimation.hours }}</td>
                </tr>
            </tbody>
        </table>
    </section> 
@endsection
@push('custom-scripts') 
    <script>
         app.controller('CostPrecastEstimateController', function($scope, $http, $routeParams, API_URL){
            function getPrecastEstimates() {
                $http.get(`${API_URL}precast-estimate`).then((res)=> {
                    $scope.precastEstimations = res.data; 
                });
            }
            getPrecastEstimates(); 
        });
    </script> 
@endpush