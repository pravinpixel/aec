@extends('layouts.aproval')

@section('content')
@include('flash::message')
    <div ng-controller="MailProposalController">
        <div class="row m-0 p-3">
            <div class="col-12">
                <div class="card card-body p-3 border shadow-sm">
                    <div class=" d-flex justify-content-between align-items-center">
                        <div><img src="{{ asset('public/assets/images/customer/logo.png') }}" alt="AEC Prefab" width="100px"></div>
                        <p class="m-0 lead"> <span class="bg-primary-light rounded px-1 text-white"><i class="fa fa-user"></i> <b>Proposal Approval Portal</b></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card  border shadow-sm m-0">
                    <div class="card-body p-3">
                        <div style="max-height: 60vh;overflow:auto"> 
                            {!! $result->documentary_content !!}
                        </div>
                    </div>
                    {{-- @if ($result->proposal_status != 'not_send') --}} 
                        <div class="card-footer text-end">
                            <form action="{{ route('download_proposal') }}" method="POST">
                                <input type="hidden" name="documentary_content" value="{{ $result->documentary_content }}">
                                <input type="hidden" name="documentary_status" value="{{ $result->proposal_status }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm"><i class="mdi mdi-download me-1"></i> Download PDF</button>
                            </form>
                        </div>
                    {{-- @endif --}}
                </div> 
            </div>
            <div class="col-md-4">
                <div> 
                    @if ($result->proposal_status == 'not_send')
                        <div class="card card-body p-3 border shadow-sm m-0">
                            <h4>Proposal Action</h4>
                            <select ng-model="proposal_status" name="proposal_status" id="proposal_status" class="fw-bold form-select my-3">
                                <option value=""> ---  Select ---</option>
                                <option value="approve" class="fw-bold">Approve</option>
                                <option value="deny" class="fw-bold">Deny</option>
                                <option value="change_request" class="fw-bold">Change Request</option>
                            </select>
                            <form  ng-show="proposal_status == 'deny' || proposal_status == 'change_request' ">
                                <div class="mb-3">
                                    <label for="emailaddress1" class="form-label">Comments</label>
                                    <textarea required name="comments" ng-model="comments" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button class="btn rounded-pill btn-primary" ng-click="denyOrChangaeRequest(proposal_status)" type="submit">Submit</button>
                                </div>
                            </form>
                            <div class="mb-3" ng-show="proposal_status == 'approve'">
                                <button class="btn rounded-pill btn-primary" ng-click="updatePropodsals(proposal_status)" type="submit">Submit</button>
                            </div>
                        </div> 
                        @else
                        <div class="card border shadow-sm">
                            <div class="card-header bg-light"><b>Proposal status</b></div>
                            <div class="card-body p-3">
                                @switch($result->proposal_status) 
                                    @case('approved')
                                        <div class="shadow-sm border-white border alert alert-warning bg-success text-white fw-bold lead" role="alert">
                                            <i class="fa fa-check-circle"></i> @lang('proposal.proposal_approved')
                                        </div>
                                    @break
                                    @case('denied')
                                        <div class="shadow-sm border-white border alert alert-warning bg-danger text-white fw-bold lead" role="alert">
                                            <i class="fa fa-times-circle"></i> @lang('proposal.proposal_denied')
                                        </div>
                                    @break
                                    @case('change_request') 
                                        <div class="shadow-sm border-white border alert alert-warning bg-warning text-white fw-bold lead" role="alert">
                                           <i class="fa fa-clock"></i> @lang('proposal.proposal_obsoleted')
                                        </div>
                                    @break
                                @endswitch 
                            </div>
                        </div> 
                    @endif 
                </div>
            </div>
        </div>
        @include('admin.enquiry.approvals.denied-modal')
        <footer class="text-center  p-3">
            © {{ now()->year }} AEC Prefab. All Rights Reserved.
        </footer>
        <form id="proposalApproveForm" action="{{ route('customer-approval',['id'=>$enquiry_id, 'type' => 1]) }}" method="GET" class="d-none">
            <input type="hidden" name="pid" id="pid" value="{{ $additionalInfo['proposal_id'] }}">
            <input type="hidden" name="vid" id="vid" value="{{ $additionalInfo['version_id'] }}">
            <input type="hidden" name="enquiry_id" id="enquiry_id" value="{{ $enquiry_id }}">
        </form>
    </div>
@endsection

@push('custom-scripts')
<style>.footer{display: none !important}</style>
<script>
    app.controller('MailProposalController', function($scope,  $http, API_URL, $compile,  $timeout) {
        let redirectPath = `${API_URL}login`;
        $scope.updatePropodsals = (type) => { 
            $http({
                method: 'POST',
                url: `${API_URL}customer-approval/${$("#enquiry_id").val()}/approval-type/approve`,
                data: {id: $("#enquiry_id").val(), pid: $("#pid").val() ,vid: $("#vid").val() }
            }).then(function (res) {
                $("#approve-mail-preview").modal('hide');
                return swlAlertInfo(res.data.msg, redirectPath);
            }, function (error) {
                console.log('ifc_model_uploads error');
            });
        }

        $scope.denyOrChangaeRequest = (type) =>{ 
            if( $scope.comments == '' ||   typeof($scope.comments) == 'undefined'){
                Message('danger', 'Comments field required');
                return false;
            }
            $timeout(function(){
                window.onbeforeunload = null;
            });
            $http({
                method: 'post',
                url: `${API_URL}customer-approval/${$("#enquiry_id").val()}/approval-type/${type}`,
                data: {id: $("#enquiry_id").val(), pid: $("#pid").val() ,vid: $("#vid").val(), comment:  $scope.comments  }
            }).then(function (res) {
                $scope.comments == '';
                $("#approve-mail-preview").modal('hide');
                $("#proposal-denied").modal('hide');
                return swlAlertInfo(res.data.msg, redirectPath);
            }, function (error) {
                console.log('ifc_model_uploads error');
            });
        } 
    });
</script>
@endpush