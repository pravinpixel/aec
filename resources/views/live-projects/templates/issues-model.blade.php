<div class="modal-content p-0 h-100 w-100">

    <div class="modal-body p-0">
        <ul class="bg-white sticky-top nav nav-tabs nav-bordered m-0">
            <li class="nav-item">
                <a href="#properties-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                    <span>
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        Overview
                    </span>
                </a>
            </li>
            @if (count($issue->IssuesAttachments) > 0)
                <li class="nav-item">
                    <a href="#Attachments-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                        <span>Attachments</span>
                    </a>
                </li>
            @endif
            {{-- userRole()['slug'] == 'admin' || (userRole()['slug'] == 'customer' && $issue->type == 'EXTERNAL') --}}
            @if (hasIssueReadPermission($issue))
                @php
                    $count = $issue->MyIssueComments->count();
                @endphp
                <li class="nav-item">
                    <a href="#Comments-b1" onclick="setcommentCount('{{ $issue->id }}')" data-bs-toggle="tab"
                        aria-expanded="false" class="nav-link">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        Comments
                        @if ($count)
                            <span
                                class="position-absolute bottom-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $count }}
                            </span>
                        @endif
                    </a>
                </li>
            @endif
            <button type="button" class="btn-close top-0 mt-2" onclick="location.reload()" data-bs-dismiss="modal" aria-hidden="true"></button>
        </ul>
        <div class="tab-content p-2">
            <div class="tab-pane show active" id="properties-b1">
                <div class="card d-block shadow-sm border h-100 m-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class=""> {{ $issue->issue_id }} | <span
                                    class="text-primary">{{ $issue->title }}</span></h4>
                        </div>
                        @if ($issue->status == 'CLOSED')
                            <div class="mb-3">
                                <b>Status</b> :
                                <span
                                    class="badge text-dark border rounded-pill">{{ __('project.' . $issue->status) }}</span>
                            </div>
                            <div class="mb-3">
                                <b>Closed Remarks</b> :
                                <span>{{ $issue->remarks }}</span>
                            </div>
                        @else
                            <div class="mb-3">
                                <b>Status</b> :
                                <span>
                                    @if ($issue->requester_role === AuthUser() || AuthUser() === 'ADMIN')  
                                        <select name="Status" onchange="ChangeIssueStatus('{{ $issue->id }}',this)"
                                            class="rounded-pill shadow-sm border border-light"
                                            value="{{ $issue->status }}" style="outline:none">
                                            <option {{ select_status('OPEN', $issue) }} value="OPEN">{{ __('project.OPEN') }}</option>
                                            <option {{ select_status('CLOSED', $issue) }} value="CLOSED">{{ __('project.CLOSED') }}</option>
                                        </select>
                                        @else 
                                        <select name="Status" disabled class="rounded-pill shadow-sm border border-light"  value="{{ $issue->status }}" style="outline:none">
                                            <option {{ select_status('OPEN', $issue) }} value="OPEN">{{ __('project.OPEN') }}</option>
                                            <option {{ select_status('CLOSED', $issue) }} value="CLOSED">{{ __('project.CLOSED') }}</option>
                                        </select>
                                    @endif
                                    <div id="status_form"></div>
                                </span>
                            </div>
                        @endif
                        <div class="mb-3">
                            <b>Type</b> : <span>{{ $issue->type }}</span>
                        </div>
                        <h5>Issue Descriptions:</h5>
                        <div class="border rounded p-1 mb-3">
                            {!! $issue->description !!}
                        </div>
                        <div class="row">
                            <div class="col-md-3 ps-0">
                                <div>
                                    <h5>Requested Date</h5>
                                    <p>{{ $issue->created_at->format('Y-m-d') }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <h5>Due Date</h5>
                                    <p>{{ $issue->due_date }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <h5>Priority</h5>
                                    <p>{{ __('project.' . $issue->priority) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5>Assignee :</h5>
                            @if ($issue->type == 'INTERNAL')
                                <a href="javascript:void(0);" class="d-inline-block"
                                    title="{{ AecUser($issue->assignee_id)->first_name }}">
                                    <div class="d-flex align-items-center">
                                        {!! getUserAvatar($issue->assignee_id) !!}
                                        <div class="text-capitalize ps-1">
                                            <small>{{ AecUser($issue->assignee_id)->first_name }}</small> <br>
                                            <small class="text-dark">{{ $issue->assignee_name }}</small>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            @if ($issue->type == 'EXTERNAL')
                                @if (AuthUser() === 'CUSTOMER')
                                    <a href="javascript:void(0);" class="d-inline-block"
                                        title="{{  AecUser($issue->assignee_id)->full_name  }}">
                                        <div class="d-flex align-items-center">
                                            {!! getCustomerAvatar($issue->assignee_id) !!}
                                            <div class="text-capitalize ps-1">
                                                <small>{{ $issue->assignee_name }}</small> <br>
                                                <small class="text-dark">
                                                    {{ AecUser($issue->assignee_id)->full_name }}</small>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" class="d-inline-block"
                                        title="{{ AuthUserData($issue->assignee_id)->first_name }}">
                                        <div class="d-flex align-items-center">
                                            {!! getUserAvatar($issue->assignee_id) !!}
                                            <div class="text-capitalize ps-1">
                                                <small>{{ $issue->assignee_name }}</small> <br>
                                                <small class="text-dark">
                                                    {{ AuthUserData($issue->assignee_id)->full_name }}</small>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endif
                        </div>
                        @if ($issue->tags != 'null')
                            <div id="tooltip-container">
                                <h5>#Tag Members:</h5>
                                @foreach (json_decode($issue->tags) as $tager_id)
                            
                                    <a href="javascript:void(0);" class="d-inline-block"
                                        title="{{ AecUser($tager_id)->full_name }}">
                                        <div class="d-flex align-items-center">
                                            {!! getUserAvatar($tager_id) !!}
                                            <div class="text-capitalize ps-1">
                                                <small>{{ AecUser($tager_id)->full_name }}</small> <br>
                                                <small class="text-dark">{{ getUserRole($tager_id)->name }}</small>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if (count($issue->IssuesAttachments) > 0)
                <div class="tab-pane" id="Attachments-b1">
                    <div class="row">
                        @foreach ($issue->IssuesAttachments as $attachment)
                            <div class="col-6 ps-0">
                                <div class="card mt-2 mb-1 shadow-none border text-start">
                                    <div class="row align-items-center p-1 d-flex">
                                        <div class="col-auto ps-0" title="Click to preview"
                                            data-file="{{ str_replace('/', '_', $attachment->file_path) }}"
                                            data-path="{{ asset('storage/app/' . $attachment->file_path) }}"
                                            onclick="filePreview(this)">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded"
                                                    style="background-color: {{ color() }}">
                                                    {{ getFileType($attachment->file_path) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col ps-0" title="Click to preview"
                                            data-file="{{ str_replace('/', '_', $attachment->file_path) }}"
                                            data-path="{{ asset('storage/app/' . $attachment->file_path) }}"
                                            onclick="filePreview(this)">
                                            <a href="javascript:void(0);" class="text-muted fw-bold">
                                                {{ Str::limit($attachment->file_path, 15) }}
                                            </a>
                                            <p class="mb-0">{{ getFileSize($attachment->file_path) }}</p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="{{ asset('storage/app/' . $attachment->file_path) }}" download
                                                title="Click to download" class="btn btn-link btn-lg text-muted">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if (hasIssueReadPermission($issue))
                <div class="tab-pane" id="Comments-b1">
                    <div id="comments_content">
                        @php
                            $comments = $issue->IssueComments;
                        @endphp
                        @include('live-projects.templates.issue-comments')
                    </div>
                    <div class="row">
                        <div class="col-1 p-0">
                            <span class="account-user-avatar">
                                <img src="{{ AecAuthUser()->image }}" alt="user-image"
                                    class="rounded-circle img-thumbnail avatar-sm">
                            </span>
                        </div>
                        <div class="col p-0">
                            <div class="border rounded">
                                <div class="comment-area-box">
                                    <textarea id="comments_input" rows="4" class="form-control border-0 resize-none" placeholder="Write here...."
                                        spellcheck="false" style="height: 155px;"></textarea>
                                    <div class="p-2 bg-light d-flex justify-content-end align-items-center">
                                        <button type="button" onclick="addComment('{{ $issue->id }}')"
                                            class="btn btn-sm btn-success  rounded-pill">
                                            <i class="uil uil-message me-1"></i>Add Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <x-admin-layout>
            <button class="btn btn-outline-danger btn-sm me-2" onclick="convertVariation({{ $issue->id }},this)">
                Convert to Variation <i class="fa fa-share" aria-hidden="true"></i>
            </button>
        </x-admin-layout>
        <x-chat-box status="CHAT_BUTTON" :moduleId="$issue->project_id" moduleName="project" :menuName="str_replace('/', '_', $issue->issue_id)" />
    </div>
</div>
