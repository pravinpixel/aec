<div id="create-issues-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right modal-dialog-scrollable" role="document">
        <form class="modal-content h-100 w-100" action="{{ route('live-project.menus-store', ['menu_type' => request()->route()->menu_type, 'id' => session()->get('current_project')->id]) }}" enctype="multipart/form-data" method="POST"> 
            @csrf
            <input type="hidden" name="form_type" value="CREATE_ISSUE">
            <div class="modal-header bg-light-2">
                <h1 class="custom-modal-title">New Issue</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body p-3">
                <div class="mb-3">
                    <span class="custom-label">Issue Title <sup>*</sup></span>
                    <input type="text" name="title" class="form-control form-control-sm" placeholder="Type here..." required>
                </div>
                <div class="mb-3">
                    <span class="custom-label">Descriptions</span>
                    <textarea class="editor" name="descriptions" ></textarea>
                </div>
                <div class="mb-3">
                    <span class="custom-label">Attachments <sup>*</sup></span>
                    <input type="file" name="attachments[]" class="form-control form-control-sm attachments" multiple required>
                </div>
                <hr class="my-3">
                <h1 class="custom-modal-title">Issue Information</h1>
                <span class="custom-label mt-3">Assign Type <sup>*</sup></span>
                <div class="row">
                    <div class="col ps-0 mb-3">
                        <label class="form-control form-control-sm d-flex align-items-center" for="assign_type_in">
                            <input type="radio" value="INTERNAL" id="assign_type_in" name="assign_type" class="form-check-input me-2 my-0" required>
                            Internel
                        </label>
                    </div>
                    <div class="col mb-3">
                        <label class="form-control form-control-sm d-flex align-items-center" for="assign_type_ex">
                            <input type="radio" value="EXTERNAL" id="assign_type_ex" name="assign_type" class="form-check-input me-2 my-0" required>
                            Externel (customers)
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col ps-0 mb-3">
                        <span class="custom-label">Assignee <sup>*</sup></span> 
                        <select name="assignee" class="form-select form-select-sm single-select-field"  data-placeholder="-- select --" required>
                            <option value="">-- select --</option>
                            @foreach (getTeamByProjectId(Project()->id) as $user)
                                <option value="{{ $user['id'] }}">{{ $user['display_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col p-0 mb-3">
                        <span class="custom-label">Priority<sup>*</sup></span>
                        <select name="priority" class="form-select form-select-sm single-select-field"  data-placeholder="-- select --" required>
                            <option value="">-- select --</option>
                            @foreach (Priorities() as $priority) 
                                <option value="{{ $priority['type'] }}">{{ $priority['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col ps-0 mb-3">
                        <span class="custom-label">Due Date <sup>*</sup></span>
                        <div class="d-flex border rounded">
                            <input type="text" name="due_date" class="form-control form-control-sm border-0 custom-datepicker"  required/>
                            <div class="fa fa-calendar btn"></div>
                        </div>
                    </div>
                    <div class="col p-0 mb-3">
                        <span class="custom-label">Requester <sup>*</sup></span>
                        <select name="requester" class="form-select form-select-sm single-select-field" data-placeholder="-- select --" required>
                            <option value="">-- select --</option> 
                            @if (AuthUser() == 'ADMIN')
                                @foreach (getAllAdmin() as $user)
                                    <option {{ auth()->user()->id == $user['id'] ? 'selected' : '' }} value="{{ $user['id'] }}">{{ $user['display_name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="custom-label">Tags</span>
                    <select name="tags[]" class="form-select form-select-sm" id="multiple-select" data-placeholder="-- Select --" multiple>
                        @foreach (getAllAdmin() as $user)
                            <option value="{{ $user['id'] }}">{{ $user['display_name'] }}</option>
                        @endforeach
                    </select> 
                </div> 
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn-sm btn btn-outline-primary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn-sm btn btn-primary rounded-pill ms-1">Create</button>
            </div> 
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 