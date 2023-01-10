<form id="estimateAssignEnquiry"  name="estimateAssignEnquiry" method="post">
    <div class="modal fade" id="estimate-assign-enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">Assign Engineering Estimation to Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                        name="building_type" ng-model="enquiry_id" required>
                        <option value="">@lang('customer-enquiry.select') </option>
                        <option ng-repeat="enquiry in enquiries" value="@{{ enquiry.id }}">
                            @{{ enquiry.enquiry_number }}
                        </option>
                    </select>
                    <small class="text-danger" ng-show="estimateAssignEnquiry.$invalid && formSubmit">This field
                        is required
                    </small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" ng-click="submitAssignEnquiry()" class="btn btn-primary">Assign</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</form>
    