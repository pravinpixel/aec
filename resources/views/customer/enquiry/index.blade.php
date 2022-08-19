@extends('layouts.customer')

@section('customer-content')
   
    <div class="content-page" ng-app="App">
        <div class="content" ng-controller="enquiryModalCtrl"> 
            @include('customer.includes.top-bar')
        

            <!-- Start Content-->
            <div class="container-fluid">

                @include('customer.includes.page-navigater')

                <div class="row m-0">
                    <div class="col p-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#enquiry-filter-modal" title="Click to Filter" class="btn btn-light shadow-sm border mb-3">
                            <i class="mdi mdi-filter-menu"></i> Filters
                        </button> 
                    </div>
                    <div class="col text-end p-0">
                        <a href="{{ route('customers.create-enquiry') }}" class="btn btn-info shadow-sm border mb-3">
                            <i class="mdi mdi-plus"></i> Create New Enquiry
                        </a> 
                    </div>
                </div>
                <x-accordion title="New Enquiries" path="customer.enquiry.table.new-enquiries" open="true"></x-accordion>
                <x-accordion title="Active Enquiries" path="customer.enquiry.table.active-enquiries" open="false"></x-accordion>
                <x-accordion title="Closed Enquiries" path="customer.enquiry.table.completed-enquiries" open="false"></x-accordion>
            </div> <!-- container -->
            @include('customer.enquiry.models.enquiry-filter-modal') 
            @include('customer.enquiry.models.detail-modal')
            @include('customer.enquiry.models.approve-modal')
            @include('customer.enquiry.models.chat-box')
        </div> <!-- content --> 
    </div> 

<!-- /.modal -->

@endsection

@push('custom-styles')

    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .dataTables_wrapper .dataTables_processing {
           
            border: 1px solid black;
            border-radius: 3px;
        }
    </style>
@endpush

@push('custom-scripts') 
    
    <script>
        app.controller('enquiryModalCtrl', function($scope,  $http, API_URL, $compile ) {
            $("#customer_chat").hide();
            $scope.commentsCount = 0;
            $scope.getEnquiry = (type,id) =>  {
                $(".custom-accordion-collapse").addClass('collapsed');
                $(".custom-accordion-collapse").removeClass('show');
                $(".custom-accordion-collapse").addClass('collapse');
                    $http({
                        method: 'GET',
                        url: `${API_URL}customers/edit-enquiry-review/${id}`,
                    }).then(function (res){
                       
                        $scope.enquiry = res.data;
                        $scope.enquiry_active_comments = res.data.enquiry_active_comments;
                        $scope.enquiry_comments = res.data.enquiry_comments;
                        $scope.enquiry_id = res.data.project_infos.enquiry_id;
                        $scope.htmlEditorOptions = {
                            height: 300,
                            value: ($scope.enquiry.additional_infos == null) ? '' : $scope.enquiry.additional_infos.comments,
                            contentEditable: false,
                            mediaResizing: {
                            enabled: true,
                            },
                        };
                        $("#right-modal-progress").modal('show'); 
                        $(`.${type}`).addClass('show');
                    }, function (error) {
                        console.log('ifc_model_uploads error');
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

            $scope.getPropodsals = (id) =>  {
                  
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/approve-enquiry/preview/${id}`,
                }).then(function (res){
                    $scope.approvals = res.data; 
                    $("#approve-mail-preview").modal('show');                 
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }

            $scope.updatePropodsals = (type) =>{ 
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/approve-enquiry/${type}/${$scope.approvals.enquiry_id}`,
                }).then(function (res){
                    $("#approve-mail-preview").modal('hide');
                    Message('success', res.data);
                }, function (error) {
                    console.log('ifc_model_uploads error');
                });
            }

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

            getProjectType = () => {
                $http({
                        method: 'GET',
                        url: '{{ route('project-type.get') }}',
                    }).then(function (res){
                        $scope.projectTypes = res.data;
                    }, function (error) {
                        console.log('get project type error');
                    });
            }
            getProjectType();

            $scope.printToCart = function(printSectionId) {
                var innerContents = document.getElementById(printSectionId).innerHTML;
                var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');
                popupWinindow.document.open();
                popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
                popupWinindow.document.close();
            }
            
            $scope.glued = true;

            $scope.sendComments  = function(type, created_by, seen_id) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope[`${type}__comments`],
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   type,
                    "created_by"      :   created_by,
                    "seen_by"         :   1,
                    "send_by"         :   {{ Customer()->id }},
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
                    getEnquiryCommentsCountById($scope.enquiry_id);
                    getEnquiryActiveCommentsCountById($scope.enquiry_id);
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
                            getEnquiryCommentsCountById($scope.enquiry_id);
                            getEnquiryActiveCommentsCountById($scope.enquiry_id);
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
                    "seen_by"         :   1,
                    "send_by"         :   {{ Customer()->id }},
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
                    dataType: 'json',
                    data: function (d) {
                      d.from_date      = $scope.enquiry_from_date,
                      d.to_date        = $scope.enquiry_to_date,
                      d.enquiry_number = $scope.enquiry_number,
                      d.project_type   = $scope.project_type
                    }
                },
                columns       : [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'enquiry_number', name: 'enquiry_number'},
                    {data: 'project_name', name: 'project_name'},
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
                    dataType: 'json',
                    data: function (d) {
                      d.from_date      = $scope.enquiry_from_date,
                      d.to_date        = $scope.enquiry_to_date,
                      d.enquiry_number = $scope.enquiry_number,
                      d.project_type   = $scope.project_type
                    }
                },
                columns       : [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'enquiry_number', name: 'enquiry_number'},
                    {data: 'project_name', name: 'project_name'},
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
                rowCallback: function( row, data ) {
                    if(data.response_status == 1){
                        $(row).addClass('fw-bold bg-light');
                    }
                },
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
                    dataType: 'json',
                    data: function (d) {
                        d.from_date      = $scope.enquiry_from_date,
                        d.to_date        = $scope.enquiry_to_date,
                        d.enquiry_number = $scope.enquiry_number,
                        d.project_type   = $scope.project_type
                    }
                },
                columns       : [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'enquiry_number', name: 'enquiry_number'},
                    {data: 'project_name', name: 'project_name'},
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

            $scope.newEnquieyFilter = () => {
                newEnquiry.draw();
                activeEnquiry.draw();
                completedEnquiry.draw();
                $scope.enquiry_from_date = '';
                $scope.enquiry_to_date = '';
                $scope.enquiry_number = '';
                $scope.project_type = '';
                $("#enquiry-filter-modal").modal('hide');
            }

            $(document).on('submit', '#remove-form', function (event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $("#method").val(),
                    success: function(res){
                        $("#delete-confirmation-modal").modal('hide');
                        if(res.status == true){
                            Message('success',res.msg);
                            activeEnquiry.draw();
                            newEnquiry.draw();
                            completedEnquiry.draw();
                            return false;
                        }
                    }, error: function(er){
                        Message('error',res.msg);
                        return false;
                    }
                });
            });

            $http({
                url     : '{!! route('get-customer-active-comments-count') !!}',
                method: "GET",
            }).then(function (res) {
                $scope.commentsCount = res.data.count;
                $(".commentsCount").show();
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            })
    });

  
    </script>
@endpush