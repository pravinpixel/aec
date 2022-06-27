@extends('layouts.aproval')

@section('content')
@include('flash::message')

    <div class="account-pages ">
        <div class="container py-4" ng-controller="MailProposalController">
            <div class="card my-4"> 
                <div class="card-header d-flex justify-content-between">
                    <div><img src="{{ asset('public/assets/images/customer/logo.png') }}" alt="AEC Prefab" width="150px"></div>
                    <h1 class="h3 text-dark-50 text-center text-primary"> <i class="fa fa-user"></i> Proposal Approval Portal</h1>
                </div>
                <div class="card-body">
                    
                    <div class="text-end">
                        <a download="{{ asset($result->pdf_file_name) }}" href="{{ asset($result->pdf_file_name) }}" type="button" class="btn btn-primary mb-3"><i class="mdi mdi-download me-1"></i> <span>Download PDF</span> </a>
                    </div>
                    <div style="max-height: 60vh;overflow:auto">
                        {!! $result->documentary_content !!} 
                    </div>
                </div>
                @include('admin.enquiry.approvals.denied-modal')
                
                <form id="proposalApproveForm" action="{{ route('customer-approval',['id'=>$enquiry_id, 'type' => 1]) }}" method="GET" class="d-none">
                    {{-- @csrf --}}
                    <input type="hidden" name="pid" id="pid" value="{{ $additionalInfo['proposal_id'] }}">
                    <input type="hidden" name="vid" id="vid" value="{{ $additionalInfo['version_id'] }}">
                    <input type="hidden" name="enquiry_id" id="enquiry_id" value="{{ $enquiry_id }}">
                    
                </form>
            </div>
            <div class="card card-body">
                @if($result->proposal_status == 'not_send')
                    <div class="row">
                        <div class="col-md-3 text-end pt-3 pe-5">
                            <h4>Proposal Action</h4>
                        </div>
                        <div class="col-md-9">
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
                    </div> 
                    {{-- <div class="text-center">
                        <a type="button"class="btn btn-danger px-4 py-2 me-2"  data-bs-toggle="modal" data-bs-target="#proposal-denied"><i class="fa fa-times-circle"></i> Deny</a>
                        <a class="btn btn-success px-4 py-2"  onclick="event.preventDefault(); document.getElementById('proposalApproveForm').submit();"><i class="fa fa-check-circle"></i>Approve</a>
                    </div> --}}
                @elseif ($result->proposal_status == 'approved')
                    <div class="text-center">
                        <h4 class="text-success"> @lang('proposal.proposal_approved')</h4>
                    </div>
                @elseif ($result->proposal_status == 'denied')
                    <div class="text-center">
                        <h4 class="text-danger">@lang('proposal.proposal_denied')</h4>
                    </div>
                @else
                    <div class="text-center">
                        <h4 class="text-primary">@lang('proposal.proposal_obsoleted') </h4>
                    </div>
                @endif
            </div>
        </div>
    </div> 

    <!-- end page --> 
    <footer class="footer footer-alt">
          © {{ now()->year }} All rights reserved | AecPrefab
    </footer> 
</body>
@endsection

@push('custom-scripts')
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