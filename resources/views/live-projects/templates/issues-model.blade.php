<div class="row">
    <div class="col-4 ps-0">
        <div class="card shadow-sm border">
            <div class="card-header">
                <div class="custom-modal-title text-secondary">PROPERTIES</div>
            </div>
            <div class="card-body p-3">
                <div class="mb-3">
                    <span class="custom-label">#Issue Ticket ID</span>
                    <input type="text" class="form-control form-control-sm" value="{{ $issue->issue_id }}" readonly>
                </div>
                <div class="mb-3">
                    <span class="custom-label">Priority<sup>*</sup></span>
                    <select name="priority" class="form-select form-select-sm issue-select"  data-placeholder="-- select --" required>
                        <option value="">-- select --</option>
                        <option value="CRITICAL">🔴&emsp;Critical</option>
                        <option value="HIGH">🟠&emsp;High</option>
                        <option value="MEDIUM">🟡&emsp;Medium</option>
                        <option value="LOW">🟢&emsp;Low</option>
                    </select>
                </div>
                <div>
                    <span class="custom-label">Ticket Status</span>
                    <select name="Status" id="filterStatus" class="form-select form-select-sm issue-select"  data-placeholder="-- select --" required>
                        <option value="">-- select --</option>
                        <option value="HIGH">🟣 New</option>
                        <option value="LOW">🟢 Open</option>
                        <option value="MEDIUM">🟡 Pending</option>
                        <option value="CRITICAL">🔴 Closed</option>
                    </select>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col">
        <div class="card text-start mb-2 border"> 
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <h5 class="mt-0 mb-0 font-14 ng-binding">
                        Denial
                    </h5>
                </div> 
                <hr>
                <ul class="conversation__box">
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
                            <p class="m-0 font-14">Sorry, I have another meeting scheduled at 2pm. Can we have it at 3pm instead?</p> 
                            <small>10:04</small>
                        </div>
                    </li>
                    <li class="left__conversation">
                        <div>
                            <h5 class="m-0 mb-1 font-14">Rhonda D</h5>
                            <p class="m-0 font-14">We can also discuss about the presentation talk format if you have some extra mins</p> 
                            <small>10:04</small>
                        </div>
                    </li>
                </ul>
           
            <div class="input-group">
                <input type="search" class="form-control form-control-sm">
                <button class="btn btn-sm btn-success">Send</button>
            </div>
        </div>
    </div>
</div>