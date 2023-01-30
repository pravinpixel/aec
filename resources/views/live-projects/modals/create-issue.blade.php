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
                <button type="button" class="btn-sm btn btn-primary rounded-pill">Save changes</button>
                <button type="button" class="btn-sm btn btn-outline-primary rounded-pill" data-bs-dismiss="modal">Cancel</button>
            </div> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 