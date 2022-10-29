<div class="row m-0 pt-2">
    <div class="{{ $latest_proposal->status == 'send' ? 'col-md-8' : 'col' }} p-0">
        <div class="card border shadow-sm">
            <div class="card-header">
                <h5 class="card-title m-0">LATEST PROPOSAL</h5>
            </div>
            <div class="card-body" style="max-height: 500px;overflow:auto">
                {!! $latest_proposal->documentary_content !!}  
            </div>
            <div class="card-footer text-end d-flex justify-content-between align-items-center">
                <div style="transform: scale(1.5)" class="ps-3">
                    {!! proposalStatusBadge($latest_proposal->proposal_status) !!}
                </div>
        
                <form action="{{ route('download_proposal') }}" method="POST">
                    <input type="hidden" name="documentary_content" value="{{ $latest_proposal->documentary_content }}">
                    <input type="hidden" name="documentary_status" value="{{ $latest_proposal->proposal_status }}">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm"><i class="mdi mdi-download me-1"></i> Download PDF</button>
                </form>
            </div>
        </div>
    </div>
    @if ($latest_proposal->status == 'send')
        <div class="col-md-4 pe-0">
            <div class="card border shadow-sm">
                <div class="card-header">
                    <h5 class="card-title m-0">PROPOSAL ACTIONS</h5>
                </div>
                <div class="card-body"> 
                    <form action="#" id="proposalActionForm"> 
                        <input type="hidden" value="{{ Crypt::encryptString($latest_proposal->proposal_id) }}" id="proposal_id">
                        <input type="hidden" value="{{ Crypt::encryptString(0) }}" id="version_id">
                        <input type="hidden" value="{{ $latest_proposal->enquiry_id }}" id="enquiry_id">
                        <select onchange="proposalAction(this.value)" name="proposal_status" id="proposal_status" class="fw-bold form-select my-3" required>
                            <option value=""> ---  Select ---</option>
                            <option value="approve" class="fw-bold">Approve</option>
                            <option value="deny" class="fw-bold">Deny</option>
                            <option value="change_request" class="fw-bold">Change Request</option>
                        </select>
                        <div class="mb-3 d-none" id="proposalActionComments">
                            <label for="emailaddress1" class="form-label">Comments</label>
                            <textarea required name="comments" class="form-control" id="proposal_comments"  cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <button onclick="proposalActionSubmit()"  class="btn rounded-pill btn-primary" type="button">Submit</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    @endif
</div>
<div class="card border shadow-sm"> 
    <div class="card-header">
        <h5 class="card-title m-0">REVISION LIST</h5>
    </div>
    <div class="card-body">      
        <table class="table table-sm table-bordered m-0">
            <thead>
                <tr>
                <th scope="col" >Version</th>
                <th scope="col" >Name</th>
                <th scope="col">Status</th>
                <th scope="col">Comments</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proposals as $proposal)
                    @if($proposal->status != 'awaiting')
                        <tr>
                            <td>{{ $proposal->enquiry->project_name }} | {{ $proposal->enquiry->enquiry_number }} | {{ $proposal->version }}</td>
                            <td>{{ $proposal->template_name }}</td>
                            <td>{!! proposalStatusBadge($proposal->proposal_status) !!} </td>
                            <td> {{ $proposal->comment ?? "-" }} </td>
                            <td width="100px">
                                <div class="btn-group">
                                    @if(is_null($proposal->id))
                                        <button class="btn btn-light border btn-sm" ng-click="getProposals({{ $proposal->enquiry_id }},{{ $proposal->proposal_id }},0)"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-primary btn-sm" ng-click="showCommentsToggle({{ $proposal->proposal_id }},'{{ $proposal->type }}')"><i class="fa fa-comment"></i></button>
                                    @else
                                        <button class="btn btn-light border btn-sm" ng-click="getProposals({{ $proposal->enquiry_id }},{{ $proposal->proposal_id }},{{ $proposal->id }})"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-primary btn-sm" ng-click="showCommentsToggle({{ $proposal->id }},'{{ $proposal->type }}')"><i class="fa fa-comment"></i></button>
                                    @endif
                                </div>
                            </td> 
                        </tr>
                    @endif
                    {{-- @if(count($proposal->getVersions) > 0 )
                        @foreach($proposal->getVersions as $proposalSub)
                            @if($proposalSub->status == 'sent')
                                <tr>
                                    <td style="text-align: left !important;">{{ $proposal->enquiry->project_name }} | {{ $proposal->enquiry->enquiry_number }} | R{{ $loop->iteration + 1 }}</td>
                                    <td style="text-align: left !important;">{!! proposalStatusBadge($proposalSub->proposal_status) !!} </td>
                                    <td style="text-align: left !important;">
                                        <button class="btn btn-primary btn-sm" ng-click="getProposals({{ $proposalSub->enquiry_id }},{{ $proposalSub->proposal_id }},{{ $proposalSub->id }})">View</button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif --}}
                @empty
                    <tr>
                        <td colspan="3">No data found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div> <!-- end card-body -->
</div> 