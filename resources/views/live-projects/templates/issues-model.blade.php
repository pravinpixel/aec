<div class="row">
    <div class="col-8 ps-0">
        <div class="row m-0">
            <div class="col">
                <div class="card shadow-sm border">
                    <div class="card-header">
                        <div class="custom-modal-title text-secondary">PROPERTIES</div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <span class="custom-label">#Issue Ticket ID</span>
                            <input type="text" class="form-control form-control-sm" value="{{ $issue->issue_id }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <span class="custom-label">Priority<sup>*</sup></span>
                            <select name="priority" class="form-select form-select-sm issue-select"
                                data-placeholder="-- select --" required>
                                <option value="">-- select --</option>
                                @foreach (Priorities() as $priority)
                                    <option {{ $issue->priority == $priority['type'] ? 'selected' : '' }}
                                        value="{{ $priority['type'] }}">{{ $priority['text'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <span class="custom-label">Ticket Status</span>
                            <select name="Status" id="filterStatus" class="form-select form-select-sm issue-select"
                                data-placeholder="-- select --" required>
                                <option value="">-- select --</option>
                                @foreach (TicketStatus() as $status)
                                    <option {{ $issue->status == $status['type'] ? 'selected' : '' }}
                                        value="{{ $status['type'] }}">{{ $status['text'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <div class="col">
                <div class="card shadow-sm border">
                    <div class="card-header">
                        <div class="custom-modal-title text-secondary">ISSUE INFORMATION </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <span class="custom-label">Assignee</span>
                            <input type="text" class="form-control form-control-sm"
                                value="{{ $issue->assignee_name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <span class="custom-label">Requester</span>
                            <input type="text" class="form-control form-control-sm" value="{{ $issue->request_name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <span class="custom-label">Due Date</span>
                            <input type="text" class="form-control form-control-sm" value="{{ $issue->due_date }}" readonly>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
        </div>
        <div class="card shadow-sm border">
            <div class="card-header">
                <div class="custom-modal-title text-secondary">DESCRIPTION</div>
            </div>
            <div class="card-body">
                <div class="small">{!! $issue->description !!}</div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

    <div class="col ps-0">
        <div class="card text-start mb-2 border">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <h5 class="mt-0 mb-0 font-14">Chat Box</h5>
                </div>
                <hr>
                <ul class="conversation__box" style="height: 450px">
                    <li class="left__conversation">
                        <div>
                            <h5 class="m-0 mb-1 font-14">
                                Rhonda D
                                <small>10:04</small>
                            </h5>
                            <p class="m-0 font-14">Yeah everything is fine</p>
                        </div>
                    </li>
                    <li class="right__conversation">
                        <div>
                            <h5 class="m-0 mb-1 font-14">Dominic</h5>
                            <p class="m-0 font-14">Wow that's great</p>
                            <small>10:04</small>
                        </div>
                    </li>
                    <li class="left__conversation">
                        <div>
                            <h5 class="m-0 mb-1 font-14">Rhonda D</h5>
                            <p class="m-0 font-14">Let's have it today if you are free</p>
                            <small>10:04</small>
                        </div>
                    </li>
                    <li class="right__conversation">
                        <div>
                            <h5 class="m-0 mb-1 font-14">Dominic</h5>
                            <p class="m-0 font-14">Sure thing! let me know if 2pm works for you</p>
                            <small>10:04</small>
                        </div>
                    </li>
                    <li class="left__conversation">
                        <div>
                            <h5 class="m-0 mb-1 font-14"> Rhonda D </h5>
                            <p class="m-0 font-14">Sorry, I have another meeting scheduled at 2pm. Can we have it at 3pm
                                instead?</p>
                            <small>10:04</small>
                        </div>
                    </li>
                    <li class="left__conversation">
                        <div>
                            <h5 class="m-0 mb-1 font-14">Rhonda D</h5>
                            <p class="m-0 font-14">We can also discuss about the presentation talk format if you have
                                some extra mins</p>
                            <small>10:04</small>
                        </div>
                    </li>
                </ul>
                <div class="input-group pt-2 border-top">
                    <input type="search" class="form-control form-control-sm" placeholder="Type here...">
                    <button class="btn btn-sm btn-success">Send a message</button>
                </div>
            </div>
        </div>
    </div>
</div>
