<form class="modal-content h-100 w-100" action="{{ route('live-project.menus-store', ['menu_type' => request()->route()->menu_type ?? "none", 'id' => $issue->project_id ]) }}" enctype="multipart/form-data" method="POST"> 
    @csrf
    <input type="hidden" name="form_type" value="EDIT_ISSUE">
    <input type="hidden" name="issue_id" value="{{ $issue->id }}">
    <div class="modal-header bg-light-2">
        <h1 class="custom-modal-title">Edit Issue</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="modal-body p-3">
        <div class="mb-3">
            <span class="custom-label">Issue Title <sup>*</sup></span>
            <input type="text" name="title" class="form-control form-control-sm" value="{{ $issue->title }}" placeholder="Type here..." required>
        </div>
        <div class="mb-3">
            <span class="custom-label">Descriptions</span>
            <textarea class="editeditor" name="descriptions" >{{ $issue->description }}</textarea>
        </div>
        <div class="mb-3">
            <span class="custom-label">Attachments <sup>*</sup></span>
            @foreach ($issue->IssuesAttachments as $attachment)
                <input type="hidden" class="editPreviewAttachment" value="{{ asset('storage/app/' . $attachment->file_path) }}">
            @endforeach
            <input type="file" name="attachments[]" class="form-control form-control-sm edit-attachments" multiple required>
        </div>
        <hr class="my-3">
        <h1 class="custom-modal-title pb-3">Issue Information</h1>
        {{-- <x-admin-layout> 
            <span class="custom-label">Assign Type <sup>*</sup></span>
            <div class="row">
                <div class="col ps-0 mb-3">
                    <label class="form-control form-control-sm d-flex align-items-center" for="assign_type_in">
                        <input type="radio" value="INTERNAL" {{ $issue->type == 'INTERNAL' ? 'checked' : '' }} id="assign_type_in" name="assign_type" class="form-check-input me-2 my-0" required>
                        Internel
                    </label>
                </div>
                <div class="col mb-3">
                    <label class="form-control form-control-sm d-flex align-items-center" for="assign_type_ex">
                        <input type="radio" value="EXTERNAL" {{ $issue->type == 'EXTERNAL' ? 'checked' : '' }} id="assign_type_ex" name="assign_type" class="form-check-input me-2 my-0" required>
                        Externel (customers)
                    </label>
                </div>
            </div>
        </x-admin-layout> --}}
        <div class="row">
            {{-- <div class="col ps-0 mb-3">
                <span class="custom-label">Assignee <sup>*</sup></span> 
                <select name="assignee" class="form-select form-select-sm edit-single-select-field"  data-placeholder="-- select --" required>
                    <option value="">-- select --</option>
                    @foreach (getTeamByProjectId($issue->project_id) as $user)
                        <option {{ $issue->assignee_id == $user['id'] ? 'selected' : '' }} value="{{ $user['id'] }}">{{ $user['display_name'] }}</option>
                    @endforeach
                </select>
            </div>  --}}
            <div class="col p-0 mb-3">
                <span class="custom-label">Priority<sup>*</sup></span>
                <select name="priority" class="form-select form-select-sm edit-single-select-field"  data-placeholder="-- select --" required>
                    <option value="">-- select --</option>
                    @foreach (Priorities() as $priority) 
                        <option {{ $issue->priority == $priority['type'] ? 'selected' : '' }} value="{{ $priority['type'] }}">{{ $priority['text'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <x-customer-layout>
            <input type="hidden" value="EXTERNAL" name="assign_type">
        </x-customer-layout>
        <div class="row">
            <div class="col ps-0 mb-3">
                <span class="custom-label">Due Date <sup>*</sup></span>
                <div class="d-flex border rounded">
                    <input type="text" name="due_date" value="{{ $issue->due_date }}" class="form-control form-control-sm border-0 edit-custom-datepicker"  required/>
                    <div class="fa fa-calendar btn"></div>
                </div>
            </div>
            <div class="col p-0 mb-3">
                <span class="custom-label">Requester <sup>*</sup></span>
                <select name="requester" class="form-select form-select-sm edit-single-select-field" data-placeholder="-- select --" required>
                    <option value="">-- select --</option> 
                    @if (AuthUser() == 'ADMIN')
                        @foreach (getAllAdmin() as $user)
                            <option {{ $issue->request_id == $user['id'] ? 'selected' : '' }} value="{{ $user['id'] }}">{{ $user['display_name'] }}</option>
                        @endforeach
                        @else 
                        <option selected value="{{ Customer()->id }}">{{  Customer()->full_name }}</option>
                    @endif
                </select>
            </div>
        </div>
        
        <x-admin-layout>
            <div class="mb-3">
                <span class="custom-label">Tags</span>
                <select name="tags[]" class="form-select form-select-sm edit-multiple-select"  data-placeholder="-- Select --" multiple>
                    @if (json_decode($issue->tags))
                        @foreach (getAllAdmin() as $user)
                            <option  {{ in_array($user['id'],json_decode($issue->tags)) ? 'selected' : '' }} value="{{ $user['id'] }}">{{ $user['display_name'] }}</option>
                        @endforeach
                    @endif
                </select> 
            </div>  
        </x-admin-layout>
    </div> 
    <div class="modal-footer">
        <button type="button" class="btn-sm btn btn-outline-primary rounded-pill" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn-sm btn btn-primary rounded-pill ms-1">Submit</button>
    </div>
</form><!-- /.modal-content -->