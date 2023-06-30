<ul class="nav nav-tabs m-0 mt-2">
    @foreach ($enquiry->MailedEnquiryProposal as $index => $proposal)
        <li class="nav-item">
            <a href="#PROPOSAL_TABS_{{ $index}}" data-bs-toggle="tab" aria-expanded="false" style="border-bottom: none !important" class="nav-link nav-link-light-bg {{ $index == 0 ? 'active' : '' }}">
                <span>{{ ucfirst($proposal->title) }} </span>
                <span class="badge bg-primary rounded-pill">{{ $proposal->version }}</span>
            </a>
        </li>
    @endforeach
</ul>
<div class="tab-content border border-top-0 p-3 bg-light">
    @foreach ($enquiry->MailedEnquiryProposal as $index => $proposal)
        <div class="tab-pane  {{ $index == 0 ? 'show active' : '' }}" id="PROPOSAL_TABS_{{ $index}}">
            <div class="row">
                <div class="col p-0"> 
                    <div class="card border shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title m-0 d-flex align-items-center justify-content-between">
                                <div class=" d-flex align-items-center">
                                    <span>{{ ucfirst($proposal->title) }}</span>
                                    <span class="mx-1">|</span>
                                    <span>{{ ucfirst($proposal->enquiry->project_name) }}</span>
                                    <span class="mx-1">|</span>
                                    <span>{{ $proposal->enquiry->enquiry_number }}</span>
                                    <span class="mx-1">|</span>
                                    <span class="badge bg-primary rounded-pill">{{ $proposal->version }}</span>
                                    <span class="mx-1">|</span>
                                    <span>{!! proposalStatusBadge($proposal->customer_status) !!}</span>
                                </div>
                                <form action="{{ route('download_proposal',$proposal->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"><i class="mdi mdi-download me-1"></i>
                                        Download PDF</button>
                                </form> 
                            </h5>
                        </div>
                        <div class="card-body" style="max-height: 500px;overflow:auto">
                            {!! $proposal->content !!}
                        </div>
                    </div>
                </div>
                @if ($enquiry->MailedEnquiryProposal()->latest()->first()->id == $proposal->id && $proposal->customer_status == 'PENDING')
                    <div class="col-md-4 pe-0">
                        <div class="card border shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title m-0">PROPOSAL ACTIONS </h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('customer-approval', $proposal->id) }}" method="POST">
                                    @csrf
                                    <select onchange="proposalAction(this.value)" name="customer_status" id="customer_status_{{ $index }}_id" class="fw-bold form-select my-3" required>
                                        <option value=""> ---  Select ---</option>
                                        <option value="approve" class="fw-bold">Approve</option>
                                        <option value="deny" class="fw-bold">Deny</option>
                                        <option value="change_request" class="fw-bold">Change Request</option>
                                    </select>
                                    <div class="mb-3 d-none" id="proposalActionComments">
                                        <label for="emailaddress1" class="form-label">Comments</label>
                                        <textarea required name="comments" class="form-control" id="commentsTextarea"  cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-sm" type="button"><i class="fa fa-save me-1"></i> Submit</button>
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

