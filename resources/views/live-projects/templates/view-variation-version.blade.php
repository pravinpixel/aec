<form onsubmit="StoreVersion({{ $variation->id }},'{{ $mode }}',this)" class="modal-content h-100 w-100">
    <input type="hidden" name="project_id" class="form-control"  value="{{ $variation->project_id }}"> 
    <input type="hidden" name="variation_id" class="form-control"  value="{{ $variation->variation_id }}"> 
    <div class="modal-header">
        <h4 class="custom-modal-title" id="create-variation-orderLabel"> <b class="text-primary">{{ str_replace('_',' ',$mode) }}</b> - VERSION - {{ $variation->version }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="$('#detail-variation-modal').modal('show')"></button> 
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">Title </label>
            <input type="text" name="title" class="form-control"  value="{{ $variation->title }}" required {{ $mode == 'VIEW' ? 'readonly' : '' }}>
        </div>
        <div class="mb-3">
            <label class="form-label">Description of Variation*</label>
            <textarea class="form-control" name="description" rows="10" spellcheck="false" required {{ $mode == 'VIEW' ? 'readonly' : '' }}>{{ $variation->description }}</textarea>
        </div>
        <div class="row m-0">
            <div class="col ps-0">
                <div class="mb-3">
                    <label class="form-label">Estimated Hours * </label>
                    <input type="number" class="form-control" name="hours" value="{{ $variation->hours }}" required {{ $mode == 'VIEW' ? 'readonly' : '' }}>
                </div>
            </div>
            <div class="col pe-0">
                <div class="mb-3">
                    <label class="form-label">Price/Hr *</label>
                    <input type="number" class="form-control" name="price" value="{{ $variation->price }}" required {{ $mode == 'VIEW' ? 'readonly' : '' }}>
                </div>
            </div>
        </div>
    </div>
    @if($mode == 'EDIT' || $mode == 'DUPLICATE')
        <div class="modal-footer">
            <button type="button" class="btn-sm btn btn-outline-primary rounded-pill" data-bs-dismiss="modal" onclick="$('#detail-variation-modal').modal('show')">Cancel</button>
            <button type="submit" class="btn-sm btn btn-primary rounded-pill ms-1">Save Changes</button>
        </div>
    @endif
</form>