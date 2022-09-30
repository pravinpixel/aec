     
@extends('layouts.customer')

@section('customer-content')
    <div class="content-page">
        <div class="content">
            @include('customer.includes.top-bar')
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                @include('customer.includes.page-navigater') 
            </div>              
            
            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3 non-printable">

                <li class="nav-item">
                    <a href="#enquiry" data-bs-toggle="tab" aria-expanded="false" class="non-printable nav-link rounded-0">
                        <span >Summary</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#proposal" data-bs-toggle="tab" aria-expanded="true" class="non-printable nav-link rounded-0 active">
                        <span >Proposal</span>
                    </a>
                </li>

            </ul>
            
            <div class="tab-content"> 
                <div class="tab-pane" id="enquiry">
                    <div class="card border">
                        <div class="card-body pt-0 pb-0">
                            <div id="rootwizard" ng-controller="Review">
                                @include('customer.enquiry.models.document-modal')
                                <div class="p-3">
                                    <x-enquiry-quick-view table="0" chat="0" id="{{ $id }}" />
                                </div>
                            </div> <!-- end #rootwizard--> 
                        </div> <!-- end card-body -->
                    </div>
                </div>
                <div class="tab-pane active show" id="proposal" ng-controller="ProposalController">
                    @include('customer.proposal.denied-modal')
                    @include('customer.proposal.comment-box')
                    <div class="card border shadow-sm">
                        <div class="card-header text-end bg-light">
                            <a class="non-printable btn btn-success" download="proposal-{{ date('Y-m-d-H:s:i') }}" href="{{ asset($latest_proposal->pdf_file_name) }}" type="button"><i class="mdi mdi-download me-1"></i> <span>Download PDF</span> </a>
                            <a  class="non-printable btn btn-primary" onclick="printProposalLetter()"><i class="fa fa-print"></i> <span>Print</span> </a>
                        </div>
                        <div class="card-body"> 
                            <div id="printable">
                                <div class="p-3">
                                    {!! $latest_proposal->documentary_content !!}
                                </div>
                            </div>  
                        </div> 
                        <div class="card-footer bg-light">
                            <div class="non-printable">
                                @if($latest_proposal->proposal_status == 'not_send')
                                    <div class="row col-md-8 mx-auto">
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
                                @else
                                    <div style="font-size: 200%;" class="text-center">
                                        {!!  proposalStatusBadge($latest_proposal->proposal_status) !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
            
                    <div class="card border shadow-sm non-printable">
                        <div class="card-header bg-light">
                            <h4>Revision List</h4>
                        </div>
                        <div class="card-body">      
                            <table class="table custom table-bordered m-0">
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
                                                <td style="text-align: left !important;">{{ $proposal->enquiry->project_name }} | {{ $proposal->enquiry->enquiry_number }} | {{ $proposal->version }}</td>
                                                <td style="text-align: left !important;">{{ $proposal->template_name }}</td>
                                                <td style="text-align: left !important;">{!! proposalStatusBadge($proposal->proposal_status) !!} </td>
                                                <td style="text-align: left !important;"> {{ $proposal->comment ?? "-" }} </td>
                                                <td style="text-align: left !important;" width="100px">
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
                </div>
            </div>
            <!-- end row-->
          
            {{--  --}}
        </div> <!-- container -->
        @include('customer.enquiry.models.approve-modal')
        
        
    </div> <!-- content -->
    
@endsection

@push('custom-styles')
<style>
@media print
    {
        .non-printable { display: none; }
        #printable { display: block; }
    }
</style>    
@endpush

@push('custom-scripts')
<script>
    printProposalLetter = () => {
        var a = window.open('', '', 'height=10000, width=10000');
        a.document.write('<html>');
        a.document.write('<body>');
        a.document.write(`
            <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('public/assets/css/app.css') }}"  rel="stylesheet" type="text/css"   />
            <link href="{{ asset('public/assets/css/app.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
            <link rel="stylesheet" href="{{ asset('public/custom/css/alert.css') }}">
            <link rel="stylesheet" href="{{ asset('public/custom/css/variable.css') }}"> 
            <link rel="stylesheet" href="{{ asset('public/custom/css/app.css') }}"> 
            <link rel="stylesheet" href="{{ asset('public/custom/css/table.css') }}">
            <style>* {background : white !important}</style>
        `);
        a.document.write($("#printable").html());
        a.document.write('</body>');
        a.document.write('</html>');
        a.document.close();
        setTimeout(() => {
            a.print();
        }, 2000);
      
    }

    $(document).ready(function () {
        $('#proposalTable').DataTable({
            "ordering": false,
        });
    });
    
    app.controller('ProposalController', function($scope,  $http, API_URL, $compile,  $timeout) {
            let redirectPath = `${API_URL}customers/my-enquiries`;
            $scope.enquiry_id  = {{ $enquiry_id }};
            $scope.proposal_id = {{ $proposal_id }};
            $scope.version_id  = {{ $version_id }};
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
                    $("#status__").html(statusBadge($scope.proposal.proposal_status));    
                    $("#documentary_content").html(res.data.documentary_content); 
                    $("#approve-mail-preview").modal('show');   
                }, function (error) {
                    console.log('proposal error');
                });
            }
            $timeout(function(){
                window.onbeforeunload = null;
            });
            $scope.updatePropodsals = (type) => { 
                $http({
                    method: 'POST',
                    url: `${API_URL}proposal/approve-or-deny/approve`,
                    data: {id: $scope.enquiry_id, pid: $scope.proposal_id ,vid: $scope.version_id }
                }).then(function (res) {
                    $("#approve-mail-preview").modal('hide');
                    return swlAlertInfo(res.data.msg, redirectPath);
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }

            $scope.denyOrChangaeRequest = (type) =>{ 
                if( $scope.comments == '' ||   typeof($scope.comments) == 'undefined'){
                    Message('danger', 'Comment field required');
                    return false;
                }
                $timeout(function(){
                    window.onbeforeunload = null;
                });
                $http({
                    method: 'POST',
                    url: `${API_URL}proposal/approve-or-deny/${type}`,
                    data: {id: $scope.enquiry_id, pid: $scope.proposal_id ,vid: $scope.version_id, comment:  $scope.comments  }
                }).then(function (res) {
                    $scope.comments == '';
                    $("#approve-mail-preview").modal('hide');
                    $("#proposal-denied").modal('hide');
                    return swlAlertInfo(res.data.msg, redirectPath);
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }

            $scope.showCommentsToggle = (reference_id, version) => {
                $scope.reference_id = reference_id;
                $scope.version = version;
                var type = 'proposal_sharing';
                $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/'+$scope.version +'/'+$scope.reference_id).then(function (response) {
                    $scope.commentsData = response.data.chatHistory; 
                    $scope.chatType     = response.data.chatType;  
                    $('#proposalViewConversations-modal').modal('show');
                });
            };

            $scope.sendInboxComments  = (type) => {
                if($scope.inlineComments == '') {
                    Message('danger','Comment field required');
                    return false;
                }
                $scope.sendCommentsDataNew = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "reference_id"    :   $scope.reference_id,
                    "type"            :   $scope.chatType,
                    "version"         :   $scope.version,
                    "created_by"      :   type,
                }
                $http({
                    method: "POST",  
                    url:  API_URL + 'admin/add-comments',
                    data: $.param($scope.sendCommentsDataNew),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    $scope.inlineComments = '';
                    $scope.showCommentsToggle($scope.reference_id, $scope.version);
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }
           
    });


    app.controller('Review', function ($scope, $http, $rootScope, Notification, API_URL, $timeout, $location){
    
        var enquiry_id = {{$id}};
        $http({
            method: 'GET',
            url: '{{ route('get-customer-enquiry') }}'
        }).then( function(res) {
                getLastEnquiry(enquiry_id);
                if(res.data.status == "false") {
                    $scope.enquiry_number = res.data.enquiry_number;
                    
                } else {
                    $scope.enquiry_no = res.data.enquiry.enquiry_number;
                }
            }, function (err) {
                console.log('get enquiry error');
        });
        getEnquiryCommentsCountById = (id) => {
            $http({
                method: "get",
                url:  API_URL + 'admin/comments-count/'+id ,
            }).then(function successCallback(response) {
                $scope.enquiry_comments     = response.data;
            }, function errorCallback(response) {
                Message('danger',response.data.errors);
            });
        }

        getEnquiryActiveCommentsCountById = (id) => {
            $http({
                method: "get",
                url:  API_URL + 'admin/active-comments-count/'+id ,
            }).then(function successCallback(response) {
                $scope.enquiry_active_comments     = response.data;
            }, function errorCallback(response) {
                Message('danger',response.data.errors);
            });
        }

        getAutoDeskFileTypes = () => {
            $http({
                method: 'GET',
                url: '{{ route("get-autodesk-file-type") }}'
            }).then(function (res) {
                $scope.autoDeskFileType = res.data;
            });
        }
        getAutoDeskFileTypes();

        getLastEnquiry = (enquiry_id)  => {
            console.log(enquiry_id);
            if(typeof(enquiry_id) == 'undefined' || enquiry_id == ''){
                return false;
            }
            $http({
                method: 'GET',
                url: `${API_URL}customers/edit-enquiry-review/${enquiry_id}`,
            }).then(function (res) {
                enableActiveTabs(res.data.active_tabs);
                $scope.project_info = res.data.project_infos;
                $scope.outputTypes = res.data.services;
                $scope.ifc_model_uploads = res.data.ifc_model_uploads;
                $scope.building_components = res.data.building_components;
                $scope.enquiry_comments = res.data.enquiry_comments;
                $scope.htmlEditorOptions = {
                    height: 300,
                    value:  (res.data.additional_infos == null) ? '' : res.data.additional_infos.comments,
                    mediaResizing: {
                    enabled: false,
                    
                    },
                };
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }

        $scope.saveOrSubmit = (value) => {
            $http({
                method: 'POST',
                url: '{{ route('customers.update-enquiry', $id) }}',
                data: {type: 'save_or_submit', data: value}
                }).then(function successCallback(response) {
                    $timeout(function(){
                        window.onbeforeunload = null;
                    });
                    if(response.data.msg == 'submitted') {
                        Swal.fire({
                            title: `Enquiry submitted successfully`,
                            showDenyButton: false,
                            showCancelButton: false,
                            cancelButtonText: 'No',
                            }).then((result) => {
                            
                        });
                    } else {
                        Swal.fire({
                            title: `Enquiry saved locally are you want to leave the page ?`,
                            showDenyButton: false,
                            showCancelButton: true,
                            cancelButtonText: 'No',
                            confirmButtonText: 'Yes',
                            }).then((result) => {
                            
                        });
                    }
                    
                }, function errorCallback(response) {
                    Message('danger', 'Something went wrong');
                });
        }

        $scope.glued = true;

        $scope.sendComments  = function(type, created_by) { 
            $scope.sendCommentsData = {
                "comments"        :   $scope[`${type}__comments`],
                "enquiry_id"      :   {{$id}},
                "type"            :   type,
                "created_by"      :   created_by,
            } 
            $http({
                method: "POST",
                url:  "{{ route('enquiry.comments') }}" ,
                data: $.param($scope.sendCommentsData),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded' 
                }
            }).then(function successCallback(response) {
                if(type == 'building_components'){
                    document.getElementById(`building_component__commentsForm`).reset();
                }
                document.getElementById(`${type}__commentsForm`).reset();
                getEnquiryCommentsCountById(enquiry_id);
                getEnquiryActiveCommentsCountById(enquiry_id);
                Message('success',response.data.msg);
            }, function errorCallback(response) {
                Message('danger',response.data.errors);
            });
        }

        $scope.showCommentsToggle = function (modalstate, type, header) {
            $scope.modalstate = modalstate;
            $scope.module = null;
            $scope.chatHeader   = header; 
            switch (modalstate) {
                case 'viewConversations':
                    $http.get(API_URL + 'admin/show-comments/'+{{$id}}+'/type/'+type ).then(function (response) {
                        $scope.commentsData = response.data.chatHistory; 
                        $scope.chatType     = response.data.chatType;  
                        $('#viewConversations-modal').modal('show');
                        getEnquiryCommentsCountById(enquiry_id);
                        getEnquiryActiveCommentsCountById(enquiry_id);
                    });
                    break;
                default:
                    break;
            } 
        }

        $scope.sendInboxComments  = function(type) {
            $scope.sendCommentsData = {
                "comments"        :   $scope.inlineComments,
                "enquiry_id"      :   {{$id}},
                "type"            :   $scope.chatType,
                "created_by"      :   type,
            }
            console.log($scope.sendCommentsData);
            $http({
                method: "POST",
                url:  "{{ route('enquiry.comments') }}" ,
                data: $.param($scope.sendCommentsData),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded' 
                }
            }).then(function successCallback(response) {
                document.getElementById("Inbox__commentsForm").reset();
                $scope.showCommentsToggle('viewConversations', $scope.chatType);
                Message('success',response.data.msg);
            }, function errorCallback(response) {
                Message('danger',response.data.errors);
            });
        }
        $scope.getDocumentView = (file) => {
            $http({
                method: 'POST',
                url: `${API_URL}get-document-modal`,
                data: {url: file.file_name},
                }).then(function success(res) {
                    if(file.file_type == 'pdf')
                        var htmlPop = '<iframe id="iframe" src="data:application/pdf;base64,'+res.data+'"  width="100%" height="1000" allowfullscreen webkitallowfullscreen disableprint=true; ></iframe>';
                    else
                        var htmlPop = '<embed width="100%" height="1000" src="data:image/png;base64,'+res.data+'"></embed>'; 
                    $("#document-content").html(htmlPop);
                    $("#document-modal").modal('show');
                }, function error(res) {

            });
        }
        $scope.getDocumentViews = (file) => {
            $http({
                method: 'POST',
                url: `${API_URL}get-document-modal`,
                data: {url: file.file_path},
                }).then(function success(res) {
                    if(file.file_type == 'pdf')
                        var htmlPop = '<iframe id="iframe" src="data:application/pdf;base64,'+res.data+'"  width="100%" height="1000" allowfullscreen webkitallowfullscreen disableprint=true; ></iframe>';
                    else
                        var htmlPop = '<embed width="100%" height="1000" src="data:image/png;base64,'+res.data+'"></embed>'; 
                    $("#document-content").html(htmlPop);
                    $("#document-modal").modal('show');
                }, function error(res) {

            });
        }
    });

    window.onbeforeunload = function(e) {
        var dialogText = 'We are saving the status of your listing. Are you realy sure you want to leave ?';
        e.returnValue = dialogText;
        return dialogText;
    };

</script>

@endpush 