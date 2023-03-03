<x-admin-layout>
    <form onsubmit="StoreVersion({{ $variation->id }},'{{ $mode }}',this)" class="modal-content h-100 w-100">
        <input type="hidden" name="project_id" class="form-control" value="{{ $variation->project_id }}">
        <input type="hidden" name="variation_id" class="form-control" value="{{ $variation->variation_id }}">
        <div class="modal-header">
            <h4 class="custom-modal-title" id="create-variation-orderLabel"> <b class="text-primary">{{ str_replace('_', ' ', $mode) }}</b> - VERSION - {{ $variation->version }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="$('#detail-variation-modal').modal('show')"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Title </label>
                <input type="text" name="title" class="form-control" value="{{ $variation->title }}" required
                    {{ $mode == 'VIEW' ? 'readonly' : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label">Description of Variation*</label>
                <textarea class="form-control" name="description" rows="10" spellcheck="false"   {{ $mode == 'VIEW' ? 'readonly' : '' }}>{{ $variation->description }}</textarea>
            </div> 
            <div class="row m-0">
                <div class="col ps-0">
                    <div class="mb-3">
                        <label class="form-label">Estimated Hours * </label>
                        <input type="number" class="form-control" name="hours" value="{{ $variation->hours }}"
                            required {{ $mode == 'VIEW' ? 'readonly' : '' }}>
                    </div>
                </div>
                <div class="col pe-0">
                    <div class="mb-3">
                        <label class="form-label">Price/Hr *</label>
                        <input type="number" class="form-control" name="price" value="{{ $variation->price }}"
                            required {{ $mode == 'VIEW' ? 'readonly' : '' }}>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Change Request Comments*</label>
                <div class="form-control" style="height:250px">
                    {{ $variation->comments }}
                </div>
            </div> 
        </div>
        @if ($mode == 'EDIT' || $mode == 'DUPLICATE')
            <div class="modal-footer">
                <button type="button" class="btn-sm btn btn-outline-primary rounded-pill" data-bs-dismiss="modal" onclick="$('#detail-variation-modal').modal('show')">Cancel</button>
                <button type="submit" class="btn-sm btn btn-primary rounded-pill ms-1">Save Changes</button>
            </div>
        @endif
    </form>
</x-admin-layout>
<x-customer-layout>
    <form onsubmit="StoreVersion({{ $variation->id }},'EDIT',this)" class="modal-content h-100 w-100">
        <input type="hidden" name="project_id" class="form-control" value="{{ $variation->project_id }}">
        <input type="hidden" name="variation_id" class="form-control" value="{{ $variation->variation_id }}">
        <div class="modal-header">
            <h4 class="custom-modal-title" id="create-variation-orderLabel"> 
                <b class="text-primary">{{ str_replace('_', ' ', $mode) }}</b>
                 - VERSION - {{ $variation->version }}
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="$('#detail-variation-modal').modal('show')"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Title </label>
                <div class="form-control">
                    {{ $variation->title }}
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description of Variation*</label>
                <div class="form-control" style="height:250px">
                    {!! $variation->description !!}
                </div>
            </div>
            <div class="row m-0">
                <div class="col ps-0">
                    <div class="mb-3">
                        <label class="form-label">Estimated Hours * </label>
                        <div class="form-control">{{ $variation->hours }}</div>
                    </div>
                </div>
                <div class="col pe-0">
                    <div class="mb-3">
                        <label class="form-label">Price/Hr *</label>
                        <div class="form-control">{{ $variation->price }}</div> 
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Change Status</label>
                <select name="status" class="form-select" required onchange="this.value == 'CHANGE_REQUEST' ? $('#comments').toggle() : $('#comments').hide()">
                    <option value="">-- Choose --</option>
                    <option {{ $variation->status == 'ACCEPT' ? 'selected' : ''  }} value="ACCEPT">🟢 Accept</option>
                    <option {{ $variation->status == 'CHANGE_REQUEST' ? 'selected' : ''  }} value="CHANGE_REQUEST">🟡 Change Request</option>
                    <option {{ $variation->status == 'DENY' ? 'selected' : ''  }} value="DENY">🔴 Deny</option>
                </select>
            </div>
            <div class="mb-3" class="{{ $variation->status  === 'CHANGE_REQUEST' ? 'd-block' : 'd-none'}}" id="comments">
                <label class="form-label">Comments</label>
                <textarea  class="form-control" name="comments" rows="5" spellcheck="false" required>{{ $variation->comments }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-sm btn btn-outline-primary rounded-pill" data-bs-dismiss="modal" onclick="$('#detail-variation-modal').modal('show')">Cancel</button>
            <button type="submit" class="btn-sm btn btn-primary rounded-pill ms-1">Save Changes</button>
        </div>
    </form>
</x-customer-layout>