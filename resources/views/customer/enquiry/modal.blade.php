
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <input type="hidden" id="exampleModalRoute" value="" name="action_route" ng-model="action_route">
                <input type="hidden" id="exampleModalMethod" value="" name="method" ng-model="action_method">
                <input type="hidden" id="exampleModalEnquiryId" value="" name="enquiry_id" ng-model="action_enquiry_id">
                <input type="hidden" id="exampleModalViewType" value="" name="view_type" ng-model="action_view_type">
                <input type="hidden" id="exampleModalId" value="" name="id" ng-model="action_id">
                <h5 class="modal-title" id="exampleModalLabel"> Delete </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body" id="exampleModalBody"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" ng-click="performAction()">Yes</button>
            </div>
        </div>
    </div>
</div>
 