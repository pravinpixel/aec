@extends('layouts.customer')

@section('customer-content')
   
    <div class="content-page" ng-app="App">
        <div class="content" ng-controller="enquiryModalCtrl">

            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                @include('customer.includes.page-navigater')
                
                <div class="summary-group py-3 accordion rounded-0" id="summaryGroup">
                    {{-- New enquiries --}}
                        <fieldset class="accordion-item">
                            <div class="accordion-header custom m-0 position-relative" id="ProjectInfo_header">
                                <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#ProjectInfo" aria-expanded="true" aria-controls="ProjectInfo">
                                    New enquiries
                                </div>
                                <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                    <i data-bs-toggle="collapse" 
                                        href="#ProjectInfo" 
                                        aria-expanded="false" 
                                        aria-controls="ProjectInfo" 
                                        class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                                    </i>
                                </div>
                            </div>
                            <div id="ProjectInfo" class="accordion-collapse collapse show" aria-labelledby="ProjectInfo_header" data-bs-parent="#summaryGroup">
                                <div class="accordion-body">  
                                    <div class="cardw"> 
                                        <div class="card-bodyw">  
                                            @include('customer.enquiry.table.new-enquiries')
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </fieldset>
                    {{-- New enquiries --}}
                
                    {{-- Active enquiries --}}
                        <fieldset class="accordion-item">
                            <div class="accordion-header custom m-0 position-relative" id="selected_service_header">
                                <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#selected_service" aria-expanded="false" aria-controls="selected_service">
                                    Active enquiries
                                </div>
                                <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                                    <i data-bs-toggle="collapse" 
                                        href="#selected_service" 
                                        aria-expanded="true" 
                                        aria-controls="selected_service" 
                                        class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                                        >
                                    </i>
                                </div>
                            </div>
                            <div id="selected_service" class="accordion-collapse collapse" aria-labelledby="selected_service_header" data-bs-parent="#summaryGroup">
                                <div class="accordion-body">  
                                    <div class="cardw"> 
                                        <div class="card-bodyw"> 
                                            @include('customer.enquiry.table.active-enquiries')
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </fieldset> 
                    {{-- Active enquiries --}}
                
                    {{--  Closed enquiries --}}
                        <fieldset class="accordion-item">
                            <div class="accordion-header custom m-0 position-relative" id="IFC_Models_Upload_Docs_header">
                                <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#IFC_Models_Upload_Docs" aria-expanded="false" aria-controls="IFC_Models_Upload_Docs">
                                    Closed enquiries
                                </div>
                                <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                    <i data-bs-toggle="collapse" 
                                    href="#IFC_Models_Upload_Docs" 
                                    aria-expanded="false" 
                                    aria-controls="IFC_Models_Upload_Docs" 
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed ">
                                    </i>
                                </div>
                            </div>
                            <div id="IFC_Models_Upload_Docs" class="accordion-collapse collapse " aria-labelledby="IFC_Models_Upload_Docs_header" data-bs-parent="#summaryGroup">
                                <div class="accordion-body"> 
                                    <div class="cardw"> 
                                        <div class="card-bodyw">  
                                            @include('customer.enquiry.table.completed-enquiries')
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </fieldset>  
                    {{-- Closed enquiries --}} 
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
        app.controller('enquiryModalCtrl', function($scope,  $http, API_URL, $compile ) {
           
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

            var newEnquiry = $('#new-enquiries').DataTable({
                aaSorting     : [[0, 'desc']],
                responsive: true,
                processing: true,    
                pageLength: 50,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                serverSide: true,
                ajax          : {
                    url     : '{!! route('get-customer-new-enquiries') !!}',
                    dataType: 'json'
                },
                columns       : [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'enquiry_number', name: 'enquiry_number'},
                    {data: 'projectType', name: 'projectType.project_type_name'},
                    {data: 'no_of_building', name: 'no_of_building'},
                    {data: 'enquiry_date', name: 'enquiry_date'},
                    {data: 'pipeline', name: 'pipeline'},
                    {data: 'status', name: 'status'},
                    {
                        data         : 'action', name: 'action', orderable: false, searchable: false,
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $("a", nTd).tooltip({container: 'body'});
                        }
                    }
                ],
                createdRow: function ( row, data, index ) {
                    $compile(row)($scope);  //add this to compile the DOM
                }
            });

            var activeEnquiry = $('#active-enquiries').DataTable({
                aaSorting     : [[0, 'desc']],
                responsive: true,
                processing: true,    
                pageLength: 50,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                serverSide: true,
                ajax          : {
                    url     : '{!! route('get-customer-active-enquiries') !!}',
                    dataType: 'json'
                },
                columns       : [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'enquiry_number', name: 'enquiry_number'},
                    {data: 'projectType', name: 'projectType.project_type_name'},
                    {data: 'no_of_building', name: 'no_of_building'},
                    {data: 'enquiry_date', name: 'enquiry_date'},
                    {data: 'pipeline', name: 'pipeline'},
                    {data: 'status', name: 'status'},
                    {
                        data         : 'action', name: 'action', orderable: false, searchable: false,
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $("a", nTd).tooltip({container: 'body'});
                        }
                    }
                ],
                createdRow: function ( row, data, index ) {
                    $compile(row)($scope);  //add this to compile the DOM
                }
            });

            var completedEnquiry = $('#completed-enquiries').DataTable({
                aaSorting     : [[0, 'desc']],
                responsive: true,
                processing: true,    
                pageLength: 50,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                serverSide: true,
                ajax          : {
                    url     : '{!! route('get-customer-completed-enquiries') !!}',
                    dataType: 'json'
                },
                columns       : [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'enquiry_number', name: 'enquiry_number'},
                    {data: 'projectType', name: 'projectType.project_type_name'},
                    {data: 'no_of_building', name: 'no_of_building'},
                    {data: 'enquiry_date', name: 'enquiry_date'},
                    {data: 'pipeline', name: 'pipeline'},
                    {data: 'status', name: 'status'},
                    {
                        data         : 'action', name: 'action', orderable: false, searchable: false,
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $("a", nTd).tooltip({container: 'body'});
                        }
                    }
                ],
                createdRow: function ( row, data, index ) {
                    $compile(row)($scope);  //add this to compile the DOM
                }
            });
    });
    </script>
@endpush