
@include('admin.calculate-cost-estimate.precast-estimation')
@if(userHasAccess('cost_estimate_add')) 
    <div class="row mx-0 align-items-center">
        <div class="col-md-4 p-0">
            <span ng-show="cost_estimate.assign_for == 'verification'" class="alert d-flex align-items-center m-0 shadow border-success border alert-success bg-transparent text-success" role="alert">
                <strong class="fa fa-check-circle fa-2x me-2" aria-hidden="true"></strong>
                <span ng-show="cost_estimate.assign_for == 'verification' && cost_estimate.assign_for_status == 0"> Waiting for verification</span>
                <span ng-show="cost_estimate.assign_for == 'verification' && cost_estimate.assign_for_status == 1"> Verification completed successfully</span>
            </span>
        </div>
        <div class="col-md-8 p-0">
            <div class="text-end">
                <a class="btn btn-danger" ng-click="createNewCalculation('wood')"><i class="uil-sync"> </i>Clear</a>
                <a class="btn btn-success" ng-click="UpdateCostEstimate('wood')"><i class="uil-sync"></i> Update </a>
            </div>
        </div> 
    </div>
@endif