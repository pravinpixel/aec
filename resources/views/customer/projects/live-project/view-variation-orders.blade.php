     
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
                        <span >Summary </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#proposal" data-bs-toggle="tab" aria-expanded="true" class="non-printable nav-link rounded-0 active">
                        <span >Variation</span>
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
                                    <x-accordion title="Project Information" path="customer.enquiry.wizard.overview.project-information" open="true" argument='null'></x-accordion>
                                    <x-accordion title="Selected Services" path="customer.enquiry.wizard.overview.selected-service" open="false" argument='null'></x-accordion>
                                    <x-accordion title="IFC Models and Uploaded Documents" path="customer.enquiry.wizard.overview.ifc-upload" open="false" argument='null'></x-accordion>
                                    <x-accordion title="Building Components" path="customer.enquiry.wizard.overview.building-components" open="false" argument='null'></x-accordion>
                                    <x-accordion title="Additional Information" path="customer.enquiry.wizard.overview.additional-information" open="false" argument='null'></x-accordion>
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
                            {{--<a class="non-printable btn btn-success" download="proposal-{{ date('Y-m-d-H:s:i') }}" href="{{ asset($latest_proposal->pdf_file_name) }}" type="button"><i class="mdi mdi-download me-1"></i> <span>Download PDF</span> </a>--}}
                            <a  class="non-printable btn btn-primary" onclick="printProposalLetter()"><i class="fa fa-print"></i> <span>Print</span> </a>
                        </div>
                        <div class="card-body"> 
                            <div id="printable">
                                <div class="p-3">
                                    <div id= "printable">
                                        <table class="table custom table-bordered">
                                            <thead>
                                                <tr>
                                                    <td colspan="2" class="text-center" style="background: #F4F4F4"><b class="h4">Variation Request - {{ $countvariation}}</b></td>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="200px"><b>Title</b></td>
                                                    <td class="ng-binding">{{ $project_ticket_show->title }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="200px"><b>Project Name</b></td>
                                                    <td class="ng-binding">{{ $project->project_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Client Name</b></td>
                                                    <td class="ng-binding">{{ $project->company_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Project Incharge</b></td>
                                                    <td>{{ $project->customerdatails->full_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Date of Change Request</b></td>
                                                        <td>{{ $project_ticket_show->change_date }}</td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                        <table class="table custom table-bordered">
                                            <tbody>
                                                <tr><td colspan="2" class="text-center" style="background: #F4F4F4"><b>Change Request Overview</b></td></tr>
                                                <tr>
                                                    <td width="250px"><b>Description of Variation / Change</b> </td>
                                                  
                                                    <td>{!! $project_ticket_show->description !!}</td>
                                                </tr> 
                                                <tr>
                                                    <td><b>Reason for Variation / Change</b></td>
                                                    <td>{!! $project_ticket_show->response !!}</td>
                                                 
                                                </tr>  
                                            </tbody>
                                        </table>



                                        <table class="table custom table-bordered">
                                            <tbody>
                                                <tr><td colspan="4" class="text-center" style="background: #F4F4F4"><b>Change in Contract Price</b></td></tr>
                                                <tr>
                                                    <td><b>Estimated Hours</b></td>
                                                    <td><b>Price/Hr</b></td>
                                                    <td rowspan="2"></td> 
                                                    <td rowspan="2" class="text-center"></td> 
                                                </tr> 
                                                <tr>
                                                    <td>{{$project_ticket_show->project_hrs  }}</td>
                                                    <td>{{$project_ticket_show->project_price  }}</td> 
                                                </tr> 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                <td colspan="2"></td>
                                                    <td rowspan="2" class="text-end"><b>Total Price</b></td> 
                                                    <td rowspan="2" class="text-center"><b class="ng-binding">kr{{$project_ticket_show->total_price  }}</b>  </td> 
                                                </tr> 
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>  
                        </div> 
                        <div class="card-footer bg-light">
                            <div class="non-printable">
                                @if($project_ticket_show->customer_response == '1')
                                    <div class="row col-md-8 mx-auto">
                                        <div class="col-md-3 text-end pt-3 pe-5">
                                            <h4>Variation Action</h4>
                                        </div>
                                        <div class="col-md-9">
                                            <select ng-model="proposal_status" name="proposal_status" id="proposal_status" class="fw-bold form-select my-3">
                                                <option value=""> ---  Select ---</option>
                                                <option value="approve" class="fw-bold">Approve</option>
                                                <option value="deny" class="fw-bold">Deny</option>
                                                
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

                                        {!!  proposalStatusBadge($latest_proposal->variation_status) !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
            
                    <div class="card border shadow-sm non-printable">
                        <div class="card-header bg-light">
                            <h4>Veriation List</h4>
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
                                    @php
                                          $key = 1;
                                    @endphp
                                    @forelse ($getveriationorder as $variation)
                                    @php
                                         $rootin = $key++;
                                         if( count($getveriationorder) > $rootin){
                                            $type = 'root';

                                         }else{
                                            $type = 'child';
                                         }
                                    @endphp
                                    <input type = "hidden" class = "project_id" value = "{{$variation->project_id  }}">
                                    
                                        @if($variation->is_sent == '1')
                                            <tr>
                                                <td style="text-align: left !important;">{{ $variation->id }} </td>
                                                <td style="text-align: left !important;">{!! $variation->title !!}</td>
                                                <td style="text-align: left !important;">{!! $variation->variation_status !!} </td>
                                                <td style="text-align: left !important;">{!! $variation->action_comment !!}</td>
                                                <td style="text-align: left !important;" width="100px">
                                                    <div class="btn-group">
                                                       
                                                            <button class="btn btn-light border btn-sm" ng-click="projectticketshow({{ $variation->id }})"><i class="fa fa-eye"></i></button>
                                                            <button class="btn btn-primary btn-sm" ng-click="showVariationCommentsToggle({{ $variation->id }},'{{ $type }}')"><i class="fa fa-comment"></i></button>
                                                       
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
                            <div id="Variation_mdal-box" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg modal-right h-100" style="width:100% !important">
                                    <div class="modal-content h-100">
                                        <div class="modal-header border-0">
                                            <h4 class="modal-title" id="myLargeModalLabel"></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body  "  style="overflow: auto">
                                            
                                            <form id="createvariationForm" name="createvariationForm" ng-submit="submitcreatevariationForm()">
                                                <table class="table custom table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="2" class="text-center" style="background: #F4F4F4"><b class="h4">Variation Request </b></td>
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td width="200px"><b>Project Name</b></td>
                                                            <td>@{{ viewmodelcustomer.project_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Client Name</b></td>
                                                            <td>@{{ viewmodelcustomer.company_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Project Incharge</b></td>
                                                            <td>@{{ viewmodelcustomer.contact_person }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Date of Change Request</b></td>
                                                                <td><span>@{{ viewmodelptickets.change_date | date: 'dd-MM-yyyy' }}</span></td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                                <table class="table custom table-bordered">
                                                    <tbody>
                                                        <tr><td colspan="2" class="text-center" style="background: #F4F4F4"><b>Change Request Overview</b></td></tr>
                                                        <tr>
                                                            <td width="250px"><b>Description of Variation / Change</b></td>
                                                            <td ng-bind-html="viewmodelptickets.description">@{{viewmodelptickets.description}}</td>
                                                        </tr> 
                                                        <tr>
                                                            <td><b>Reason for Variation / Change</b></td>
                                                            <td ng-bind-html="viewmodelptickets.response">@{{viewmodelptickets.response}}</td>
                                                        </tr>  
                                                    </tbody>
                                                </table>
                                                <table class="table custom table-bordered">
                                                    <tbody>
                                                        <tr><td colspan="4"class="text-center" style="background: #F4F4F4"><b>Change in Contract Price</b></td></tr>
                                                        <tr>
                                                            <td><b>Estimated Hours</b></td>
                                                            <td><b>Price/Hr</b></td>
                                                            <td rowspan="2"></td> 
                                                            <td rowspan="2" class="text-center">kr @{{viewmodelptickets.total_price}}</td> 
                                                        </tr> 
                                                        <tr>
                                                            <td>@{{viewmodelptickets.project_hrs}}</td>
                                                            <td>@{{viewmodelptickets.project_price}}</td> 
                                                        </tr> 
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        <td colspan="2"></td>
                                                            <td rowspan="2" class="text-end"><b>Total Price</b></td> 
                                                            <td rowspan="2" class="text-center"><b>kr@{{viewmodelptickets.total_price}}</b></td> 
                                                        </tr> 
                                                    </tfoot>
                                                </table> 
                                            </form>
                                        </div>  
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog modal-dialog-centered -->
                            </div> 
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
        
            let redirectPath = `${API_URL}customers/list-projects`;
            $scope.enquiry_id  = {{ $ticket_comment_id }};
            $scope.proposal_id ='';
            $scope.ticket_comment_id  = {{ $ticket_comment_id }};
            $scope.ticket_id = {{ $ticket_id }};
            $scope.version_id  = {{ $version_id }};
            $scope.project_id = $('.project_id').val();
            $scope.proposal = [];
            $scope.projectticketshow = (id) =>
  {
    $http.get(`${API_URL}admin/api/v2/variationticketfind/${id}`).then((res) => {
      $scope.viewmodelptickets = res.data.ticket == null ? [] : res.data.ticket;
      //console.log($scope.viewmodelptickets);
      $scope.viewmodelcustomer = res.data.project == null ? false : res.data.project
      if (res.data.ticket != '')
      {
        $('#Variation_mdal-box').modal('show');
      }
    });
  }
            $timeout(function(){
                window.onbeforeunload = null;
            });
            $scope.updatePropodsals = (type) => { 

                $http({
                    method: 'POST',
                    url: `${API_URL}customers/veriation/approve-or-deny`,
                    data: {ticket_id: $scope.ticket_id, ticket_comment_id: $scope.ticket_comment_id ,vid: $scope.version_id ,type:'approved'}
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
                    url: `${API_URL}customers/veriation/approve-or-deny`,
                    data: {ticket_id: $scope.ticket_id, ticket_comment_id: $scope.ticket_comment_id ,vid: $scope.version_id ,type:'deny', comment:  $scope.comments  }
                }).then(function (res) {
                    $scope.comments == '';
                    $("#approve-mail-preview").modal('hide');
                    $("#proposal-denied").modal('hide');
                    return swlAlertInfo(res.data.msg, redirectPath);
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }

            $scope.showVariationCommentsToggle = (reference_id, version) => {
      $scope.reference_id = reference_id;
      $scope.version = version;
      let project_id =  $scope.project_id;
      var type = 'variation_order';
      $http.get(API_URL + 'admin/show-comments/'+project_id+'/'+$scope.version +'/'+$scope.reference_id).then(function (response) {
          $scope.commentsData = response.data.chatHistory; 
          $scope.chatType     = response.data.chatType;  
          $('#proposalViewConversations-modal').modal('show');
      });
  };

  $scope.sendInboxComments  = (type) => {
    let project_id = $('#project_id').val();
      if($scope.inlineComments == '') {
          Message('danger','Comment field required');
          return false;
      }
      $scope.sendCommentsDataNew = {
          "comments"        :   $scope.inlineComments,
          "project_id"      :   project_id,
          "reference_id"    :   $scope.reference_id,
          "type"            :   $scope.chatType,
          "version"         :   $scope.version,
          "created_by"      :   type,
      }
      $http({
          method: "POST",  
          url:  API_URL + 'admin/add-comments-veriation',
          data: $.param($scope.sendCommentsDataNew),
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded' 
          }
      }).then(function successCallback(response) {
          $scope.inlineComments = '';
          $scope.showVariationCommentsToggle($scope.reference_id, $scope.version);
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