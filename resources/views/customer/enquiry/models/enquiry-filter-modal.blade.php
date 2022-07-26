<div id="enquiry-filter-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-right" style="width:100% !important">
        <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
            <div>
                <div class="border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div >
                    <div class="my-3">
                        <h3 class="page-title">Filter</h3>
                    </div>
                    <div class="mb-3 row mx-0">
                        
                        <div class="col p-0 me-md-2">
                            <label class="form-label">From Date</label>
                            <input type="date" class="form-control date" id="enquiry_from_date" ng-model="enquiry_from_date" name="enquiry_from_date">
                        </div>
                        <div class="col p-0">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control date" id="enquiry_to_date" ng-model="enquiry_to_date" name="enquiry_from_date">
                        </div>
                    </div>

                    <div class="row m-0">
                        <div class="col p-0 me-md-2">
                            <div class="mb-3 ">
                                <label class="form-label">Project Type</label>
                                <select class="form-select form-select-sm form-control" id="floatingSelect" aria-label="Floating label select example"  name="project_type"   ng-model="project_type" required>
                                    <option value="">@lang('customer-enquiry.select')</option>
                                    <option ng-repeat="projectType in projectTypes" value="@{{ projectType.id}}">
                                        @{{ projectType.project_type_name }}
                                    </option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Enquiry Number </label>
                        <input type="text" class="form-control" placeholder="Type Here..."  ng-model="enquiry_number" name="enquiry_number">
                    </div> 
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" ng-click="newEnquieyFilter()">
                            <i class="mdi mdi-filter-menu"></i> Submit
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>