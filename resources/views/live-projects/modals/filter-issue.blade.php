<div class="modal fade" id="issues-filters" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="custom-modal-title" id="myCenterModalLabel">Advance Filters</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="d-flex"> 
                        <div class="col me-2">
                            <span class="custom-label">Priority</span>
                            <select name="priority" id="filterPriority" class="form-select form-select-sm select-filters"  data-placeholder="-- select --" required>
                                <option value="">-- select --</option>
                                <option value="CRITICAL">🔴 Critical</option>
                                <option value="HIGH">🟠 High</option>
                                <option value="MEDIUM">🟡 Medium</option>
                                <option value="LOW">🟢 Low</option>
                            </select>
                        </div>
                        <div class="col">
                            <span class="custom-label">Ticket Status</span>
                            <select name="Status" id="filterStatus" class="form-select form-select-sm select-filters"  data-placeholder="-- select --" required>
                                <option value="">-- select --</option>
                                <option value="HIGH">🟣 New</option>
                                <option value="LOW">🟢 Open</option>
                                <option value="MEDIUM">🟡 Pending</option>
                                <option value="CRITICAL">🔴 Closed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="custom-label">Due Date</span>
                    <div class="d-flex">
                        <div class="d-flex border rounded me-2">
                            <input type="text" id="filterDueStartDate" name="due_start_date" class="form-control form-control-sm border-0 custom-datepicker" required placeholder="Start Date"/>
                            <div class="fa fa-calendar btn"></div>
                        </div>
                        <div class="d-flex border rounded">
                            <input type="text" id="filterDueEndDate" name="due_end_date" class="form-control form-control-sm border-0 custom-datepicker"  required placeholder="End Date"/>
                            <div class="fa fa-calendar btn"></div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="custom-label">Request Date</span>
                    <div class="d-flex">
                        <div class="d-flex border rounded me-2">
                            <input type="text" id="filterRequestStartDate" name="request_start_date" class="form-control form-control-sm border-0 custom-datepicker" required placeholder="Start Date"/>
                            <div class="fa fa-calendar btn"></div>
                        </div>
                        <div class="d-flex border rounded">
                            <input type="text" id="filterRequestEndDate" name="request_end_date" class="form-control form-control-sm border-0 custom-datepicker"  required placeholder="End Date"/>
                            <div class="fa fa-calendar btn"></div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <div class="col me-2">
                            <span class="custom-label">Issue Type</span>
                            <select name="type" id="filterIssueType" id class="form-select form-select-sm select-filters"  data-placeholder="-- select --" required>
                                <option value="">-- select --</option>
                                <option value="INTERNAL">🔴 Internal</option>
                                <option value="EXTERNAL">🟠 External</option>
                            </select>
                        </div>
                        <div class="col">
                            <span class="custom-label">Issue #ID</span>
                            <input type="number" id="filterIssueId" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="clearAdvaceFilters()" class="btn btn-sm btn-outline-primary">Clear</button>
                <button type="button" onclick="advanceFilters()" class="btn btn-sm btn-primary">Filter</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>