@extends('layouts.technical-estimate')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content">
          
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('cost-estimate.includes.page-navigater')

                <!-- end page title -->
                  <!-- Start Content-->
                <div class="container-fluid d-none" id="TechEstimateController">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#project_summary" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                <div class="mx-auto inner-circle bg-secondary">
                                    <img src="{{ asset('public/assets/icons/information.png') }}" class="w-50 invert">
                                </div>
                                <span class="d-none d-md-block mt-2">Project Summary</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#technical_estimate" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                <div class="mx-auto inner-circle bg-secondary">
                                    <img src="{{ asset('public/assets/icons/budget.png') }}" class="w-50 invert">
                                </div>
                                <span class="d-none d-md-block mt-2">Technical Estimate</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="project_summary" ng-controller="ProjectSummaryController">
                            @include("admin.enquiry.models.chat-box")
                            @include('technical-estimate.project-summary')
                        </div>
                        <div class="tab-pane show active" id="technical_estimate" ng-controller="TechEstimateController">
                            @include("admin.enquiry.models.assign-technical-estimation-chat-box") 
                            @include('technical-estimate.technical-estimate')
                          
                        </div>
                      
                    </div>
                </div>
            </div> 
        </div> 
            <!-- container -->
    </div>
@endsection
@push('custom-styles')
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    }

    input[type=number] {
    -moz-appearance: textfield;
    }
    #wood-cost-estimate .remove_history {
        display: block !important;
    }
</style>
@endpush
@push('custom-scripts')
<script> 
    app.controller('ProjectSummaryController', function ($scope, $http, API_URL,  $location) {
            $scope.enquiry_id =  '{{ $enquiry_id }}';
            var enquiryId     =  '{{ $enquiry_id }}';
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
    
            $scope.GetCommentsData = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $enquiry_id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status       = res.data.progress.proposal_sharing_status;
                    $scope.customer_response       = res.data.progress.customer_response;
                    $scope.enquiry_comments     = res.data.enquiry_comments;
                    $scope.enquiry_active_comments = res.data.enquiry_active_comments;
                  
                    $scope.enquiry_number       = res.data.enquiry_number;
                    $scope.enquiry_comments     = res.data.enquiry_comments;
                    $scope.enquiry_id           = res.data.enquiry_id;
                    $scope.customer_info        = res.data.customer_info;
                    $scope.project_info         = res.data.project_info;
                    $scope.services             = res.data.services;
                    $scope.ifc_model_uploads    = res.data.ifc_model_uploads;
                    $scope.building_components  = res.data.building_component;
                    $scope.additional_infos     = res.data.additional_infos;
                    $scope.htmlEditorOptions = {
                        height: 300,
                        value: ( res.data.additional_infos == null ) ? '': res.data.additional_infos.comments,
                        mediaResizing: {
                        enabled: false,
                        },
                    };
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
                            console.log($scope.commentsData);
                            $('#viewConversations-modal').modal('show');
                            getEnquiryCommentsCountById($scope.enquiry_id);
                            getEnquiryActiveCommentsCountById($scope.enquiry_id);
                             
                        });
                        break;
                    default:
                        break;
                } 
            }
            $scope.GetCommentsData();
 
            $scope.sendInboxComments  = function(type, seen_id) { 

                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   $scope.chatType,
                    "created_by"      :   type,
                    "send_by"         :   {{ Admin()->id }}
                }
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
            
            $scope.sendComments  = function(type, created_by, seen_id) { 
       
                $scope.sendCommentsData = {
                    "comments"        :   $scope[`${type}__comments`],
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   type,
                    "created_by"      :   created_by,
                    "send_by"         :   {{ Admin()->id }}
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
                    // $scope.GetCommentsData();
                    Message('success',response.data.msg);
                    getEnquiryCommentsCountById($scope.enquiry_id);
                    getEnquiryActiveCommentsCountById($scope.enquiry_id);
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
    app.controller('TechEstimateController', function ($scope, $http, API_URL, $location) {
            let enquiryId =  '{{ $enquiry_id }}';
            $scope.current_user = '{{Admin()->id}}';
            getUsers = () => {
                $http.get(`${API_URL}admin/get-technicalestimate-employee`)
                .then(function successCallback(res){
                    $scope.userList = res.data;
                }, function errorCallback(error){
                    console.log(error);
                });
            }
            getUsers();
            getAutoDeskFileTypes = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("get-autodesk-file-type") }}'
                }).then(function (res) {
                    $scope.autoDeskFileType = res.data;
                });
            }
            getAutoDeskFileTypes();

            $scope.printTechnicalEstimate = () => {
                $http.get(`${API_URL}technical-estimate/get-history/${$scope.enquiry_id}`)
                .then((res) => {
                    var currentTabelHistory   =   ''
                    res.data.forEach((item,i) => {
                        currentTabelHistory += `<h5 class="m-0 d-flex align-items-center">
                                                    <strong class="me-auto text-dark">Version : ${i+1}</strong>
                                                    <span class="fa fa-calendar text-dark"></span>
                                                    <small>${moment(item.created_at).format('DD-MM-YYYY h:s a')}</small>
                                                </h5>`;
                        currentTabelHistory += item.history;
                    });
                    let currentTable         =   $("#root_technical_estimate").html();
                    var a = window.open('', '', 'height=10000, width=10000');
                    a.document.write('<html>');
                    a.document.write('<body>');
                    a.document.write(`
                        <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
                        <link href="{{ asset('public/assets/css/app.css') }}"  rel="stylesheet" type="text/css"   />
                        <link href="{{ asset('public/assets/css/app.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
                        <link rel="stylesheet" href="{{ asset('public/custom/css/alert.css') }}">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
                        <link rel="stylesheet" href="https://dropways.github.io/feathericons/assets/themes/twitter/css/feather.css"> 
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
                        <link rel="stylesheet" href="{{ asset('public/custom/css/variable.css') }}"> 
                        <link rel="stylesheet" href="{{ asset('public/custom/css/app.css') }}"> 
                        <link rel="stylesheet" href="{{ asset('public/custom/css/table.css') }}">
                        <style>.table {border:0 !important; box-shadow: none !important} .thead , button , .btn-group , .fa {display:none !important} .tbody { padding : 0 !important} .btn{display:none !important} input{pointer-events:none } .custom-border-left{border-left:1px solid #000!important}.custom-border-bottom{border-bottom:1px solid #000!important}.custom-td{border-right:1px solid #000!important;border-top:1px solid #000!important;border-left:none!important;border-bottom:none!important;width:100px!important;min-width:100px!important;max-width:100px!important;display:flex;justify-content:center;align-items:center;flex-direction:column}.custom-td *{font-size:12px!important}.custom-row{display:inline-flex!important}.custom-td input{padding:0!important;height:100%;width:100%}.custom-td input,.custom-td select{color:#000!important}</style>
                    `);
                    let enquiryData = `
                        <div class="card-body pt-0 p-0">
                            <table class="table custom shadow-none border m-0 table-bordered ">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Enquiry Received Date</th>
                                        <th>Project Name</th>
                                        <th>Person Contact</th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>${$scope.enquiry.enquiry.enquiry_date }</td>
                                        <td>${$scope.enquiry.enquiry.project_name }</td>
                                        <td>${$scope.enquiry.enquiry.contact_person }</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>`;
                    let startVersion = `<h5 class="text-center"> Version List </h5>`;
                    a.document.write(enquiryData);
                    a.document.write(currentTable);
                    a.document.write(startVersion);
                    a.document.write(currentTabelHistory);
                    a.document.write('</html>');
                    a.document.close();
                    setTimeout(() => {
                        a.print(); 
                    }, 1000);
                }); 
            }


            $scope.getHistory       = (type)  => {
                $http.get(`${API_URL}technical-estimate/get-history/${$scope.enquiry_id}`)
                    .then(function successCallback(res){
                        $scope.historyStatus    =   false;
                        $("#technical_estimate_histories").html('');
                        if(res.data.length == 0) {
                            Message('danger', 'Data not found');
                            return false;
                        }
                        res.data.map((item, key) => {
                            $("#technical_estimate_histories").append(`
                                <div class="card  p-2 border shadow-sm m-2">
                                    <div id="headingTableHistory${key+1}">
                                        <h5 class="m-0 d-flex align-items-center">
                                            <a class="custom-accordion-title collapsed d-block py-1"
                                                data-bs-toggle="collapse" href="#collapseTableHistory${key+1}"
                                                aria-expanded="true" aria-controls="collapseTableHistory${key+1}">
                                                <strong class="me-auto text-dark">Version : ${res.data.length - key}</strong>
                                                <span> - </span>
                                                <span>
                                                    <span class="fa fa-calendar text-dark"></span>
                                                    <small>${item.created_at}</small>
                                                </span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTableHistory${key+1}" class="collapse ${key == 0 && 'show'}"
                                        aria-labelledby="headingTableHistory${key+1}" >
                                            ${item.history}
                                    </div>
                                </div> 
                            `); 
                        });
                    }, function errorCallback(error){
                        console.log(error);
                    });
            }

            
            $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} ).then(function (response) {
                $scope.enquiry              =   response.data; 
                $scope.enquiry_id           =   response.data.enquiry_id; 
                $scope.building_building    =   response.data.building_component; 
                $scope.assign_to            =   response.data.others.assign_to ?? '';
            });
             
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $enquiry_id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status  = res.data.progress.proposal_sharing_status;
                    $scope.customer_response    = res.data.progress.customer_response; 
                    $scope.technical_estimate   = res.data.technical_estimate;
                });
            }
            $scope.getWizradStatus(); 

            $scope.Add_building = function() {

                $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} ).then(function (response) {
                    $scope.building_building.push(response.data.building_component[0]);
                   
                });
                    
            } 

            $scope.Add_component = function(index) {
                $scope.building_building[index].building_component_number.push(
                    {
                        "name": '',
                        "sqfeet": 0
                    }
                )
            }

            $scope.Delete_building   =   function(index) {
                $scope.building_building.splice(index,1);  
            }

            $scope.dirOptions = {};

            $scope.Delete_component   =  function(index, secindex) {
                $scope.building_building[index].building_component_number.splice(secindex,1);
                $scope.dirOptions.directiveFunction(index);
            }
           
            $scope.updateTechnicalEstimate  = function() {
                
                const validator     = $scope.building_building;
                let BuildingValidator   = false;
                let validatorName       = false;
                let validatorSqfeet     = false;
                
                validator.forEach(element => {
                    if(element.building_component_number.length == 0) {
                        BuildingValidator  = true;
                    }
                    for (let i = 0; i < element.building_component_number.length; i++) {
                        if(element.building_component_number[i].name == null || element.building_component_number[i].name == '') {
                            validatorName  = true;
                        }
                        if(element.building_component_number[i].sqfeet == null || element.building_component_number[i].sqfeet == '') {
                            validatorSqfeet  = true;
                        }
                    }
                });
                
                if(validatorName)  {
                    Message('warning',"Component name is required!");
                    validatorName  = false;
                    return false;
                }
                if(validatorSqfeet)  {
                    Message('warning',"Sqfeet Estimate is required!");
                    validatorSqfeet  = false;
                    return false;
                }
                if(BuildingValidator) {
                    Message('danger',"You Can't Update Empty Building !");
                    $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} ).then(function (response) {
                        $scope.enquiry              =   response.data; 
                        $scope.enquiry_id           =   response.data.enquiry_id; 
                        $scope.building_building    =   response.data.building_component; 
                    });
                    return false;
                }
                
                if($scope.building_building.length == 0 || $scope.building_building[0].building_component_number.length == 0 || $scope.building_building == []) {
                    Message('danger',"You Can't Update Empty Building !");
                    $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} ).then(function (response) {
                        $scope.enquiry              =   response.data; 
                        $scope.enquiry_id           =   response.data.enquiry_id; 
                        $scope.building_building    =   response.data.building_component; 
                    });
                    return false;
                } 
                $http({
                    method: "POST",
                    url: API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $enquiry_id ?? " " }} , 
                    data:{ data : $scope.building_building, history: true, html: $("#root_technical_estimate").html()},
                }).then(function successCallback(response) {
                    $scope.getWizradStatus();
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            $scope.assignTechnicalEstimate = (user, technical_estimate_assign_for) => {
                let assign_to = user == '' ? null: user;
                if($scope.assign_to == '') {
                    Message('danger', "Please Choose The User !");
                    return false;
                }

                $http.post(`${API_URL}technical-estimate/assign-user/${enquiryId}`, {assign_to: assign_to, type: technical_estimate_assign_for})
                .then(function successCallback(res){
                    if(res.data.status) {
                        $scope.enable_techestimate = res.data.status;
                        $scope.getWizradStatus();
                        Message('success', res.data.msg);
                        return false;
                    }
                    Message('error', res.data.msg);
                },  function errorCallback(error){
                    console.log(error);
                });
            }

            $scope.gotoNext = function() {
                $http.post(`${API_URL}technical-estimate/update-status/${enquiryId}`)
                .then(function successCallback(res){
                    $location.path('/cost-estimation');
                });
            }

            $scope.showCommentsToggle  =  function (modalstate, type, header) {
                $scope.modalstate      =  modalstate;
                $scope.module          =  null;
                $scope.chatHeader      =  header; 
                switch (modalstate) {
                    case 'viewAssingTechicalConversations':
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.TechcommentsData = response.data.chatHistory; 
                            $scope.chatType         = response.data.chatType;  
                            $('#assing-viewConversations-modal').modal('show');
                        });
                        break;
                    default:
                    break;
                }
            }

            $scope.sendAssignTechInboxComments  = function(type , chatSection) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   chatSection,
                    "created_by"      :   type,
                    "role_by"         : `Techical Estimater ${type}`
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
                    $scope.showTechCommentsToggle('viewAssingTechicalConversations', 'techical_estimation', chatSection);
                    $scope.inlineComments = '';
                    document.getElementById("Inbox__commentsForm").reset();
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            // =====================
            $scope.GetCommentsData = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $enquiry_id ?? " " }} ).then(function (res) {
                    $scope.enquiry_number       = res.data.enquiry_number;
                    $scope.enquiry_comments     = res.data.enquiry_comments;
                    $scope.enquiry_id           = res.data.enquiry_id;
                    $scope.project_info         = res.data.enquiry_comments;
                    $scope.project_info         = res.data.project_info;
                    $scope.building_component   = res.data.building_component;
                });
            }
            $scope.showTechCommentsToggle = function (modalstate, type, docId) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.technical_docType_id   = docId; 
                switch (modalstate) {
                    case 'viewConversations':
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                            $scope.commentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            $('#viewConversations-modal').modal('show');
                        });
                        break;
                    case 'viewTechicalDocsConversations' : 
                            $http.get(API_URL + 'admin/show-tech-comments/'+$scope.enquiry_id+'/type/'+$scope.technical_docType_id ).then(function (response) {
                                $scope.TechcommentsData = response.data.chatHistory; 
                                $scope.chatType     = response.data.chatType;  
                                $('#tech-viewConversations-modal').modal('show');
                            });

                        break; 
                    case 'viewAssingTechicalConversations' : 
                        $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+$scope.technical_docType_id ).then(function (response) {
                            $scope.TechcommentsData = response.data.chatHistory; 
                            $scope.chatType     = response.data.chatType;  
                            $('#assing-viewConversations-modal').modal('show');
                        });

                    break; 
                    default:
                        break;
                } 
            }
            $scope.GetCommentsData();
            
            $scope.sendTechInboxComments  = function(type , chatSection) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "file_id"         :   $scope.technical_docType_id,
                    "type"            :   chatSection,
                    "created_by"      :   type,
                    "role_by"         : "Techical Estimater"
                }
        
                $http({
                    method: "POST",
                    url:  "{{ route('enquiry.comments') }}" ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    document.getElementById("Inbox__commentsForm").reset();
                    $scope.showTechCommentsToggle('viewTechicalDocsConversations', 'techical_estimation', $scope.technical_docType_id);
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }  
            $scope.sendInboxComments  = function(type) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   $scope.chatType,
                    "created_by"      :   type,
                }
            
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
                    if(type == 'building_components'){
                        document.getElementById(`building_component__commentsForm`).reset();
                    }
                    document.getElementById(`${type}__commentsForm`).reset();
                    // $scope.GetCommentsData();
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
        $("#TechEstimateController").removeClass('d-none');

</script>

@endpush