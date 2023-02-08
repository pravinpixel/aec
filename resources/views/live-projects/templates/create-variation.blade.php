<form action="{{ route('live-project.create-issue-variation', $issue->id) }}" method="POST"class="modal-content h-100 w-100">
    @csrf
    <div class="modal-header">
        <h4 class="custom-modal-title" id="create-variation-orderLabel">{{ $issue->issue_id }} | Convert to Variation Order</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col ps-0">
                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input type="text" class="form-control" value="{{ Project()->project_name }}" readonly>
                </div>
            </div>
            <div class="col pe-0">
                <div class="mb-3">
                    <label class="form-label">Client Name</label>
                    <input type="text" class="form-control" value="{{ Project()->project_name }}" readonly>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">#Issue ID </label>
            <input type="text" name="issue_id" class="form-control" value="{{ $issue->issue_id }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Title </label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description of Variation*</label>
            <textarea class="form-control" name="description" rows="10" spellcheck="false" required></textarea>
        </div>
        <div class="row">
            <div class="col ps-0">
                <div class="mb-3">
                    <label class="form-label">Estimated Hours * </label>
                    <input type="number" class="form-control" name="hours" required>
                </div>
            </div>
            <div class="col pe-0">
                <div class="mb-3">
                    <label class="form-label">Price/Hr *</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn-sm btn btn-outline-primary rounded-pill"
            data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn-sm btn btn-primary rounded-pill ms-1">Create</button>
    </div>
</form>
