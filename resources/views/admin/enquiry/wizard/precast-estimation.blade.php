@include('admin.calculate-cost-estimate.precast-estimation')
@if(userHasAccess('cost_estimate_add'))
    <p class="lead mb-2 text-center text-danger" ng-show="cost_estimate.assign_for == 'verification' && cost_estimate.assign_for_status == 0"> <strong>Waiting for verification</strong></p>
    <p class="lead mb-2 text-center text-success" ng-show="cost_estimate.assign_for == 'verification' && cost_estimate.assign_for_status == 1"> <strong>verification completed successfully</strong></p>
   
    <div class="text-end">
        <a class="btn btn-danger" ng-click="createNewCalculation('precast')"><i class="uil-sync"> </i>Clear</a>
        <a class="btn btn-success" ng-click="UpdateCostEstimate('precast')"><i class="uil-sync"></i> Update</a>
    </div>
@endif