@include('admin.calculate-cost-estimate.wood-estimation')
<p class="lead mb-2 text-center text-danger" ng-show="cost_estimate.assign_for == 'estimation' && cost_estimate.assign_for_status == 0"> <strong>Waiting for estimation</strong></p>
<p class="lead mb-2 text-center text-danger" ng-show="cost_estimate.assign_for == 'approval' && cost_estimate.assign_for_status == 0"> <strong>Waiting for approval</strong></p>
<p class="lead mb-2 text-center text-success" ng-show="cost_estimate.assign_for_status == 1 && cost_estimate.assign_for == 'estimation'"> <strong>Estimated successfully</strong></p>
<p class="lead mb-2 text-center text-success" ng-show="cost_estimate.assign_for_status == 1 && cost_estimate.assign_for == 'approval'"> <strong>Approved successfully </strong></p>
<div class="text-end">
    <a class="btn btn-success" ng-click="UpdateCostEstimate('wood')"><i class="uil-sync"></i> Update</a>
</div>