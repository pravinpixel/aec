<ul class="nav nav-tabs m-0 mt-2">
    @foreach ($proposals as $index => $proposal)
        <li class="nav-item">
            <a href="#PROPOSAL_TABS_{{ $index}}" data-bs-toggle="tab" aria-expanded="false" style="border-bottom: none !important" class="nav-link nav-link-light-bg {{ $index == 0 ? 'active' : '' }}">
                <span>{{ ucfirst($proposal->template_name) }} </span>
            </a>
        </li>
    @endforeach
</ul>
<div class="tab-content border border-top-0 p-3 bg-light">
    @foreach ($proposals as $index => $proposal)
        <div class="tab-pane  {{ $index == 0 ? 'show active' : '' }}" id="PROPOSAL_TABS_{{ $index}}">
            <div class="row">
                <div class="col p-0">
                    <div class="card border shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title m-0 d-flex align-items-center justify-content-between">
                                <div class=" d-flex align-items-center">
                                    <span>{{ ucfirst($proposal->template_name) }}</span>
                                    <span class="mx-1">|</span>
                                    <span>{{ ucfirst($proposal->enquiry->project_name) }}</span>
                                    <span class="mx-1">|</span>
                                    <span>{{ $proposal->enquiry->enquiry_number }}</span>
                                    <span class="mx-1">|</span>
                                    <span class="badge bg-primary rounded-pill">{{ $proposal->version }}</span>
                                    <span class="mx-1">|</span>
                                    <span>{!! proposalStatusBadge($proposal->proposal_status) !!}</span>
                                </div>
                                <form action="{{ route('download_proposal') }}" method="POST">
                                    <input type="hidden" name="documentary_content" value="{{ $proposal->documentary_content }}">
                                    <input type="hidden" name="documentary_status" value="{{ $proposal->proposal_status }}">
                                    @csrf
                                    <button type="submit" class="btn btn-warning border text-dark border-dark btn-sm badge rounded-pill ms-1"><i class="mdi mdi-download me-1"></i> Download</button>
                                </form>
                            </h5>
                        </div>
                        <div class="card-body" style="max-height: 500px;overflow:auto">
                            {!! $proposal->documentary_content !!}
                        </div>
                    </div>
                </div>
                @if ($proposal->proposal_status == 'not_send')
                    <div class="col-md-4 pe-0">
                        <div class="card border shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title m-0">PROPOSAL ACTIONS</h5>
                            </div>
                            <div class="card-body">
                                <form action="#" id="proposalActionForm">
                                    <input type="hidden" value="{{ Crypt::encryptString($proposal->proposal_id) }}" id="proposal_id_{{ $index }}_id">
                                    <input type="hidden" value="{{ Crypt::encryptString(0) }}" id="version_id_{{ $index }}_id">
                                    <input type="hidden" value="{{ $proposal->enquiry_id }}" id="enquiry_id_{{ $index }}_id">
                                    <select onchange="proposalAction(this.value)" name="proposal_status" id="proposal_status_{{ $index }}_id" class="fw-bold form-select my-3" required>
                                        <option value=""> ---  Select ---</option>
                                        <option value="approve" class="fw-bold">Approve</option>
                                        <option value="deny" class="fw-bold">Deny</option>
                                        <option value="change_request" class="fw-bold">Change Request</option>
                                    </select>
                                    <div class="mb-3 d-none" id="proposalActionComments">
                                        <label for="emailaddress1" class="form-label">Comments</label>
                                        <textarea required name="comments" class="form-control" id="proposal_comments_{{ $index }}_id"  cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button onclick="proposalActionSubmit({{ $index }})"  class="btn btn-primary btn-sm" type="button"><i class="fa fa-save me-1"></i> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>

