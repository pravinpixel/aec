<div class="modal-content p-0">
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
            <li class="nav-item position-absolute end-0 m-2 mt-1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </li>
        </ul>
        <div class="tab-content p-2">
            <div class="tab-pane show active" id="properties-b1">
                <div class="card d-block shadow-sm border h-100 m-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class="">{{ $issue->title }}</h4>
                        </div>
                        <div class="mb-3">
                            <b>Status</b> : <span>{{ __('project.'.$issue->status)  }}</span>
                        </div>
                        <div class="mb-3">
                            <b>Type</b> : <span>{{ $issue->type }}</span>
                        </div>
                        <h5>Issue Descriptions:</h5>
                        <p class="text-muted mb-2"> 
                            {!! $issue->description !!}
                        </p> 
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
                                    <p>{{ __('project.'.$issue->priority) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5>Assignee :</h5>
                            <a href="javascript:void(0);"  class="d-inline-block" title="{{ getUser($issue->assignee_id)->first_name }}">
                                <div class="d-flex align-items-center">
                                    {!! getUserAvatar($issue->assignee_id) !!}
                                    <div class="text-capitalize ps-1">
                                        <small>{{ getUser($issue->assignee_id)->first_name }}</small> <br>
                                        <small class="text-dark">{{ getUserRole($issue->assignee_id)->name }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div id="tooltip-container">
                            <h5>#Tag Members:</h5>
                            @foreach (json_decode($issue->tags) as $tager_id)
                                <a href="javascript:void(0);"  class="d-inline-block" title="{{ getUser($tager_id)->first_name }}">
                                    <div class="d-flex align-items-center">
                                        {!! getUserAvatar($tager_id) !!}
                                        <div class="text-capitalize ps-1">
                                            <small>{{ getUser($tager_id)->first_name }}</small> <br>
                                            <small class="text-dark">{{ getUserRole($tager_id)->name }}</small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach 
                        </div>
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
                                        <div class="col-auto ps-0">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded" style="background-color: {{ color() }}">
                                                    {{ getFileType($attachment->file_path) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold">
                                                {{ Str::limit($attachment->file_path,15) }}
                                            </a>
                                            <p class="mb-0">{{ getFileSize($attachment->file_path) }}</p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="{{ asset("storage/app/".$attachment->file_path) }}" download class="btn btn-link btn-lg text-muted">
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
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-outline-success btn-sm">Convert to Variation <i class="fa fa-share" aria-hidden="true"></i> </button>
        <x-chat-box
            status="CHAT_BUTTON"
            :moduleId="Project()->id"
            moduleName="project"
            :menuName="str_replace('/','_',$issue->issue_id)"
        />
    </div>
</div>
