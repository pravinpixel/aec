@extends('layouts.customer')

@section('customer-content')
   
    <div class="content-page" ng-app="App">
        <div class="content" ng-controller="enquiryModalCtrl">

            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('customer.includes.page-navigater')

                <!-- end page title --> 
                <div class="card">
                    <div  class="card-header ">
                        <div class="d-flex justify-content-between ">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#right-modal" title="Click to Filter" class="btn btn-light border">
                                <i class="mdi mdi-filter-menu"></i> Filters
                            </button>
                            <a  href="{{ route('customers.create-enquiry') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> New Enquiry</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="scroll-vertical-datatable" class="table custom dt-responsive nowrap table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Enquiry No</th>
                                    <th>Type of Project</th>
                                    <th>No. Of Property</th>
                                    <th>Enquiry Date</th>
                                    <th>Pipeline</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td ng-click="getEnquiry('project_info',{{  $row->id  }})"> <span class="badge badge-primary-lighten btn p-2" >{{ $row->enquiry_number }} </span> </td>
                                        <td>{{ $row->projectType->project_type_name ?? '' }}</td>
                                        <td>{{ $row->no_of_building ?? '' }}</td>
                                        <td>{{ $row->enquiry_date }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button ng-click="getEnquiry('project_info',{{  $row->id  }})" class="btn progress-btn {{  $row->project_info == 1 ? 'active' : '' }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Information"></button>
                                                <button ng-click="getEnquiry('service',{{  $row->id  }})" class="btn progress-btn {{  $row->service == 1 ? 'active' : '' }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Services"></button>
                                                <button ng-click="getEnquiry('ifc_model',{{  $row->id  }})" class="btn progress-btn {{  $row->ifc_model_upload == 1 ? 'active' : '' }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="IFC Model and Uploads"></button>
                                                <button ng-click="getEnquiry('building_component',{{  $row->id  }})" class="btn progress-btn {{  $row->building_component == 1 ? 'active' : '' }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Building Component"></button>
                                            </div>
                                        </td>
                                        <td>	
                                            <span class="badge bg-success shadow-sm rounded-pill"> {{ $row->status }} </span>
                                        </td>
                                        <td>                                            
                                            <a class="btn btn-outline-primary btn-sm  rounded-pill shadow-sm" href="{{ route("customers.edit",$row->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div> <!-- container -->
            @include('customer.enquiry.models.detail-modal')
            @include('customer.enquiry.models.chat-box')
        </div> <!-- content --> 
    </div> 

    
    <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-right" style="width:100% !important">
            <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
                <div>
                    <div class="border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div >
                        <div class="my-3">
                            <h3 class="page-title">Filter</h3>
                        </div>
                        <div class="mb-3 row mx-0">
                            <div class="col p-0 me-md-2">
                                <label class="form-label">From Date</label>
                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                            </div>
                            <div class="col p-0">
                                <label class="form-label">End Date</label>
                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col p-0 me-md-2">
                                <div class="mb-3 ">
                                    <label class="form-label">Project Type</label>
                                    <select class="form-select">
                                        <option selected>-- select --</option>
                                        <option value="1">Construction</option>
                                        <option value="2">New Construction</option>
                                        <option value="3">Old Construction</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col p-0">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option selected>-- select --</option>
                                        <option value="1">In Progress </option>
                                        <option value="2">Awarded</option>
                                        <option value="3">Yet to Start</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enqiury Number | Project Name</label>
                            <input type="text" class="form-control" placeholder="Type Here...">
                        </div> 
                        <div class="text-center">
                            <button type="button" class="btn btn-primary  ">
                                <i class="mdi mdi-filter-menu"></i> Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- /.modal -->

@endsection

@push('custom-styles')

    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .progress-btn {
            clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
            background: lightgray
        }
        .progress-btn.active {
            background: #20CF98 !important
        }
        .table td,th {
            padding: 5px 10px !important     ;
            vertical-align: middle !important
        }
        .table thead,th {
            background: #757CF2 !important;
            color: white
        }
        #scroll-vertical-datatable th{
            padding:  0px !important     
        }
        .table tbody thead,th {
            background: #757CF2 !important
        }
        #scroll-vertical-datatable_wrapper .row:nth-child(1) {
            display: none !important
        }
        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
            top : 2px !important
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            top : 2px !important
        }
       .accordion-header {
           margin:  0 !important
       }
       .accordion-item {
           border: 1px solid gray
       }
    </style>
@endpush

@push('custom-scripts') 
    
    <script>
        app.controller('enquiryModalCtrl', function($scope,  $http, API_URL) {
           
            $scope.getEnquiry = (type,id) =>  {
                $(".accordion-collapse").addClass('collapsed');
                $(".accordion-collapse").removeClass('show');
                $(".accordion-collapse").addClass('collapse');
                    $http({
                        method: 'GET',
                        url: `${API_URL}customers/edit-enquiry-review/${id}`,
                    }).then(function (res){
                        $scope.enquiry = res.data;
                        $scope.enquiry_id = res.data.project_infos.enquiry_id;
                        $("#right-modal-progress").modal('show'); 
                        $(`#${type}`).addClass('show');
                     
                    }, function (error) {
                        console.log('ifc_model_uploads error');
                    });
            }

            $scope.printToCart = function(printSectionId) {
                var innerContents = document.getElementById(printSectionId).innerHTML;
                var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');
                popupWinindow.document.open();
                popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
                popupWinindow.document.close();
            }
            $scope.glued = true;
            $scope.sendComments  = function(type, created_by) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope[`${type}__comments`],
                    "enquiry_id"      :   $scope.enquiry_id,
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
                    document.getElementById(`${type}__commentsForm`).reset();
                    // $scope.GetCommentsData();
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
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.commentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            $('#viewConversations-modal').modal('show');
                        });
                        break;
                    default:
                        break;
                } 
            }
            $scope.sendInboxComments  = function(type) {
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
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
        });
    </script>
@endpush