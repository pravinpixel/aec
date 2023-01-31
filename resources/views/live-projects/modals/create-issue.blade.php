<div id="create-issues-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-right modal-dialog-scrollable" role="document">
        <div class="modal-content h-100 w-100">
            <div class="modal-header bg-light-2">
                <h1 class="custom-modal-title">New Issue</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body p-3">
                <div class="mb-3">
                    <span class="custom-label">Issue Title</span>
                    <input type="text" name="title" class="form-control form-control-sm" placeholder="Type here...">
                </div>
                <div class="mb-3">
                    <span class="custom-label">Descriptions</span>
                    <textarea class="editor" name="descriptions"></textarea>
                </div>
                <div class="mb-3">
                    <span class="custom-label">Attachments</span>
                    <input type="file" name="attachments" class="form-control form-control-sm attachments" multiple>
                </div>
                <h1 class="custom-modal-title">Issue Informations</h1>
                <div class="my-3">
                    <span class="custom-label">Assign Type </span>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="customRadio3" name="customRadio1" class="form-check-input">
                        <label class="custom-label" for="customRadio3">Internel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="customRadio4" name="customRadio1" class="form-check-input">
                        <label class="custom-label" for="customRadio4">Externel (customers)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col ps-0 mb-3">
                        <span class="custom-label">Assignee</span>
                        <select name="assignee" class="form-select form-select-sm single-select-field"  data-placeholder="-- select --">
                            <option value="Prabhu">Prabhu</option>
                            <option value="Surya">Surya</option>
                            <option value="Deepack">Deepack</option>
                        </select>
                    </div>
                    <div class="col p-0 mb-3">
                        <span class="custom-label">Priority</span>
                        <select name="priority" class="form-select form-select-sm single-select-field"  data-placeholder="-- select --">
                            <option value="">-- select --</option>
                            <option value="CRITICAL">Critical</option>
                            <option value="HIGH">High</option>
                            <option value="MEDIUM">Medium</option>
                            <option value="LOW">Low</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col ps-0 mb-3">
                        <span class="custom-label">Due Date</span>
                        <div class="input-group date">
                            <input type="date" name="due_date" class="form-control form-control-sm" id="date"/>
                            <span class="input-group-append">
                              <span class="input-group-text bg-light d-block btn-sm">
                                <i class="fa fa-calendar"></i>
                              </span>
                            </span>
                        </div>
                    </div>
                    <div class="col p-0 mb-3">
                        <span class="custom-label">Requester</span>
                        <select name="requester" class="form-select form-select-sm">
                            <option value="">-- select --</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="custom-label">Tags</span>
                    <select class="form-select form-select-sm" id="multiple-select" data-placeholder="-- Select --" multiple>
                        <option>Christmas Island</option>
                        <option>South Sudan</option>
                    </select> 
                </div> 
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn-sm btn btn-danger rounded-pill">Save changes</button>
                <button type="button" class="btn-sm btn btn-outline-danger rounded-pill" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 