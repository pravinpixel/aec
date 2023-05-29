<x-admin-layout>
    @if ($mode == 'VIEW')
        <div class="modal-content h-100 w-100">
            <div class="modal-header">
                <h4 class="custom-modal-title" id="create-variation-orderLabel"> <b
                        class="text-primary">{{ str_replace('_', ' ', $mode) }}</b> - VERSION - {{ $variation->version }}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body ">
                <table class="table table-lg table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Title</b></td>
                            {{-- <td>:</td> --}}
                            <td>{{ $variation->title }}</td>
                        </tr>
                        <tr>
                            <td><b>Description of Variation</b></td>
                            {{-- <td>:</td> --}}
                            <td>{{ $variation->description }}</td>
                        </tr>
                        <tr>
                            <td><b>Estimated Hours</b></td>
                            {{-- <td>:</td> --}}
                            <td>{{ $variation->hours }}</td>
                        </tr>
                        <tr>
                            <td><b>Estimated Price/Hr</b></td>
                            {{-- <td>:</td> --}}
                            <td>{{ $variation->price }}</td>
                        </tr>
                        <tr>
                            <td><b>Total Cost:</b></td>
                            {{-- <td>:</td> --}}
                            <td>{{ $variation->price * $variation->hours }}</td>
                        </tr>
                        @if ($variation->comments)
                            <tr>
                                <td><b>Change Request Comments</b></td>
                                {{-- <td>:</td> --}}
                                <td>{{ $variation->comments }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <form onsubmit="StoreVersion({{ $variation->id }},'{{ $mode }}',this)"
            class="modal-content h-100 w-100">
            <input type="hidden" name="project_id" class="form-control" value="{{ $variation->project_id }}">
            <input type="hidden" name="variation_id" class="form-control" value="{{ $variation->variation_id }}">
            <div class="modal-header">
                <h4 class="custom-modal-title" id="create-variation-orderLabel"> <b
                        class="text-primary">{{ str_replace('_', ' ', $mode) }}</b> - VERSION -
                    {{ $variation->version }}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Title </label>
                    <input type="text" name="title" class="form-control" value="{{ $variation->title }}" required
                        {{ $mode == 'VIEW' ? 'readonly' : '' }}>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description of Variation*</label>
                    <textarea class="form-control" name="description" rows="10" spellcheck="false"
                        {{ $mode == 'VIEW' ? 'readonly' : '' }}>{{ $variation->description }}</textarea>
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
                    @if (!is_null($variation->price))
                        <div class="col-12 p-0">
                            <label class="form-label">Total Price :
                                <b>{{ $variation->price * $variation->hours }}</b></label>
                        </div>
                    @endif
                </div>
                @if ($variation->comments)
                    <div class="mb-3">
                        <label class="form-label">Change Request Comments*</label>
                        <div class="form-control" style="height:250px">
                            {{ $variation->comments }}
                        </div>
                    </div>
                @endif
            </div>
            @if ($mode == 'EDIT' || $mode == 'DUPLICATE')
                <div class="modal-footer">
                    <button type="button" class="btn-sm btn btn-outline-primary rounded-pill" data-bs-dismiss="modal"
                        onclick="$('#detail-variation-modal').modal('show')">Cancel</button>
                    <button type="submit" class="btn-sm btn btn-primary rounded-pill ms-1">Submit</button>
                </div>
            @endif
        </form>
    @endif
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
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                onclick="$('#detail-variation-modal').modal('show')"></button>
        </div>
        <div class="modal-body">
            <table class="table table-lg table-bordered">
                <tbody>
                    <tr>
                        <td><b>Title</b></td>
                        {{-- <td>:</td> --}}
                        <td>{{ $variation->title }}</td>
                    </tr>
                    <tr>
                        <td><b>Description of Variation</b></td>
                        {{-- <td>:</td> --}}
                        <td>{{ $variation->description }}</td>
                    </tr>
                    <tr>
                        <td><b>Estimated Hours</b></td>
                        {{-- <td>:</td> --}}
                        <td>{{ $variation->hours }}</td>
                    </tr>
                    <tr>
                        <td><b>Estimated Price/Hr</b></td>
                        {{-- <td>:</td> --}}
                        <td>{{ $variation->price }}</td>
                    </tr>
                    <tr>
                        <td><b>Total Cost:</b></td>
                        {{-- <td>:</td> --}}
                        <td>{{ $variation->price * $variation->hours }}</td>
                    </tr> 
                </tbody>
            </table>
            <div class="mb-3">
                <label class="form-label">Approve Status </label>
                <select name="status" class="form-select" required
                    onchange="this.value == 'CHANGE_REQUEST' ? $('#comments').toggle() : $('#comments').hide();$('#comments_input').attr('required', false)">
                    <option value="">-- Choose --</option>
                    <option {{ $variation->status == 'ACCEPT' ? 'selected' : '' }} value="ACCEPT">🟢 Accept</option>
                    <option {{ $variation->status == 'CHANGE_REQUEST' ? 'selected' : '' }} value="CHANGE_REQUEST">🟡
                        Change Request</option>
                    <option {{ $variation->status == 'DENY' ? 'selected' : '' }} value="DENY">🔴 Deny</option>
                </select>
            </div>
            <div class="mb-3" style="display:{{ $variation->status == 'CHANGE_REQUEST' ? 'block' : 'none' }}"
                id="comments">
                <label class="form-label">Comments</label>
                <textarea class="form-control" id="comments_input" required name="comments" rows="5" spellcheck="false">{{ $variation->comments }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-sm btn btn-outline-primary rounded-pill" data-bs-dismiss="modal"
                onclick="$('#detail-variation-modal').modal('show')">Cancel</button>
            <button type="submit" class="btn-sm btn btn-primary rounded-pill ms-1">Submit</button>
        </div>
    </form>
</x-customer-layout>
