     
@extends('layouts.customer')

@section('customer-content')
    <div class="content-page" ng-controller="ProposalController">
        <div class="content">
            @include('customer.includes.top-bar')
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                @include('customer.includes.page-navigater') 
            </div>                
          
            <div class="card border">
                <div class="card-body">      
                    <table class="table custom table-bordered m-0" id="proposalTable">
                        <thead>
                          <tr>
                            <th scope="col" >Version</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposals as $proposal)
                                @if($proposal->status == 'sent')
                                    <tr>
                                        <td style="text-align: left !important;">{{ $proposal->enquiry->project_name }} | {{ $proposal->enquiry->enquiry_number }} | {{ $proposal->version }}</td>
                                        <td style="text-align: left !important;">{!! proposalStatusBadge($proposal->proposal_status) !!} </td>
                                        <td style="text-align: left !important;">
                                            <button class="btn btn-primary btn-sm" ng-click="getProposals({{ $proposal->enquiry_id }},{{ $proposal->proposal_id }},0)">View</button>
                                        </td>
                                    </tr>
                                @endif
                                @if(count($proposal->getVersions) > 0 )
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
                                @endif
                            @endforeach
                        </tbody>
                      </table>
                </div> <!-- end card-body -->
            </div>
        </div> <!-- container -->
        @include('customer.enquiry.models.approve-modal')
        @include('customer.proposal.denied-modal')
    </div> <!-- content -->
    
@endsection
      
@push('custom-scripts')
<script>
    $(document).ready(function () {
        $('#proposalTable').DataTable({
            "ordering": false,
        });
    });
    
    app.controller('ProposalController', function($scope,  $http, API_URL, $compile ) {
            $scope.enquiry_id  = 0;
            $scope.proposal_id = 0;
            $scope.version_id  = 0;
            $scope.proposal = [];
            $scope.getProposals = (id,proposal_id, version_id) =>  {
                $scope.enquiry_id  = id;
                $scope.proposal_id = proposal_id;
                $scope.version_id  = version_id;
                $http({
                    method: 'GET',
                    url: `${API_URL}proposal/get-by-id`,
                    params: {id: $scope.enquiry_id, pid: $scope.proposal_id ,vid: $scope.version_id }
                }).then(function (res){
                    $scope.proposal = res.data;
                    $("#documentary_content").html(res.data.documentary_content); 
                    $("#approve-mail-preview").modal('show');   
                    $scope.status = statusBadge($scope.proposal.proposal_status);           
                }, function (error) {
                    console.log('proposal error');
                });
            }

            $scope.updatePropodsals = (type) =>{ 
                if(type == 'deny'){
                    $("#proposal-denied").modal('show');
                    return false;
                }
                $http({
                    method: 'POST',
                    url: `${API_URL}proposal/approve-or-deny/1`,
                    data: {id: $scope.enquiry_id, pid: $scope.proposal_id ,vid: $scope.version_id }
                }).then(function (res) {
                    $("#approve-mail-preview").modal('hide');
                    Message('success', res.data.msg);
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }

            $scope.denyProposal = (type) =>{ 
                if( $scope.comments == '' ||   typeof($scope.comments) == 'undefined'){
                    Message('danger', 'Comment field required');
                    return false;
                }
                $http({
                    method: 'POST',
                    url: `${API_URL}proposal/approve-or-deny/0`,
                    data: {id: $scope.enquiry_id, pid: $scope.proposal_id ,vid: $scope.version_id, comment:  $scope.comments  }
                }).then(function (res) {
                    $scope.comments == '';
                    $("#approve-mail-preview").modal('hide');
                    $("#proposal-denied").modal('hide');
                    Message('success', res.data.msg);
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }
           
    });
</script>

@endpush