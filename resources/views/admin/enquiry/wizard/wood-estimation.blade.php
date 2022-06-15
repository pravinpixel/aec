@include('admin.calculate-cost-estimate.wood-estimation')
@if(userHasAccess('cost_estimate_add'))
  
    <p class="lead mb-2 text-center text-danger" ng-show="cost_estimate.assign_for == 'estimation' && cost_estimate.assign_for_status == 0"> <strong>Waiting for estimation</strong></p>
    <p class="lead mb-2 text-center text-danger" ng-show="cost_estimate.assign_for == 'approval' && cost_estimate.assign_for_status == 0"> <strong>Waiting for approval</strong></p>
    <p class="lead mb-2 text-center text-success" ng-show="cost_estimate.assign_for_status == 1 && cost_estimate.assign_for == 'estimation'"> <strong>Estimated successfully</strong></p>
    <p class="lead mb-2 text-center text-success" ng-show="cost_estimate.assign_for_status == 1 && cost_estimate.assign_for == 'approval'"> <strong>Approved successfully </strong></p>
    <div class="text-end">
        <a class="btn btn-danger" ng-click="createNewCalculation('wood')"><i class="uil-sync"> </i>Clear</a>
        <a class="btn btn-success" ng-click="UpdateCostEstimate('wood')"><i class="uil-sync"></i> Update</a>
    </div>
@else
    <div class="text-end" ng-if="cost_estimate.assign_for_status == 0 && cost_estimate.assign_to == {{ Admin()->id }}">
        <a class="btn btn-danger" ng-click="createNewCalculation('wood')"><i class="uil-sync"> </i>Clear</a>
        <a class="btn btn-success" ng-click="UpdateCostEstimate('wood')"><i class="uil-sync"></i> Update & Approve</a>
    </div>
    <div ng-if="cost_estimate.assign_for_status == 1">
        <p class="lead mb-2 text-success" ng-show="cost_estimate.assign_for_status == 1 && cost_estimate.assign_for == 'approval'"> <strong> Approved successfully </strong></p>
        <p class="lead mb-2 text-success" ng-show="cost_estimate.assign_for_status == 1 && cost_estimate.assign_for == 'estimation'"> <strong> Estimated successfully</strong></p>
    </div>
@endif