     
@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        
        <div class="content"> 
            @include('admin.includes.top-bar') 
            <!-- Start Content-->
            <div class="container-fluid"> 
                
                <!-- start page title --> 
                <div class="row " ng-controller="rootEnquiryWizard">
                    <div class="col-12">
                        <div class="page-title-box mt-3">
                            <div class="page-title-right mt-0">
                                <ol class="breadcrumb align-items-center m-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route("admin-dashboard") }}"><i class="fa fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Enquiry detail
                                    </li>
                                    @if (Route::is('view-enquiry')) 
                                        <li class="breadcrumb-item">
                                            <a href="">Overview</a>
                                        </li>
                                    @endif
                                    <li class="breadcrumb- ms-2">
                                        <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i> 
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">
                                {{ $data->enquiry_number }} - {{ $data->project_name }}
                                {{-- EQ/2022/0001 - Project Name --}}
                            </h4>
                        </div>
                    </div>
                </div> 
                <div class="card border">
                    <div class="card-body py-0"> 
                        <div id="rootwizard">
                            {{-- <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
                                <li class="time-bar"></li>
                                <li class="nav-item Project_Info">
                                    <a href="#!/project-summary" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle @{{ project_summary_status == 'Active' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Project summary</p>
                                    </a>
                                </li>
                                <li class="nav-item  admin-Technical_Estimate-wiz">
                                    <a href="#!/technical-estimation" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle @{{ technical_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/technical-support.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Technical Estimate</p>
                                    </a>
                                </li>
                                <li class="nav-item admin-Cost_Estimate-wiz"  style="pointer-events: @{{ technical_estimation_status ==  0 ? 'none' :'unset' }}">
                                    <a href="#!/cost-estimation" style="min-height: 40px;" class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle  @{{ cost_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/budget.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5 mt-2">Cost Estimate</p>
                                    </a>
                                </li> 
                                <li class="nav-item admin-Proposal_Sharing-wiz" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
                                    <a href="#!/proposal-sharing" style="min-height: 40px;"  class="timeline-step">
                                        <div class="timeline-content">
                                            <div class="inner-circle @{{ proposal_sharing_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/share.png") }}" ng-click="getDocumentaryFun();" class="w-50 invert">
                                            </div>                                                                        
                                        </div>
                                        <p class="h5 mt-2">Proposal Sharing</p>
                                    </a>
                                </li> 
                                <li class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
                                    <a href="#!/move-to-project" style="min-height: 40px;"  class="timeline-step" >
                                        <div class="timeline-content">
                                            <div class="inner-circle @{{ customer_response == '1' ? 'bg-primary' :'bg-secondary' }}">
                                                <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                                            </div>
                                        </div>
                                        <p class="h5  mts-2">Customer Response</p>
                                    </a>
                                </li>
                            </ul> --}}
                            <!-- Wizz Contents -->
                            <div class="tab-content">
                                <div ng-view></div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-body -->
                </div>   
            </div> <!-- container --> 
        </div> <!-- content --> 
    </div> 
@endsection 

@push('custom-scripts')  
    <style>
        .mdi-loading::before {
            border-radius: 50%;
            border: 2px solid;
            background: #152950
        }
    </style>
    <style>  
        .m_two_cross_column {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 0;
            text-align: center;
        }

        .m_two_cross_column span {
            margin-top: 10px;
        }
        .dynamic_name {
          
        } 

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
        #history_id .remove_print_history {
            display: none;
        }
        #history_id input {
            border: none;
        }
    </style>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"> </script> 
  
    <script src="{{ asset("public/custom/js/ngControllers/admin/enquiryWizzard.js") }}"></script>
    <script> 
        app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('enquiry.project-summary') }}",
                controller : "WizzardCtrl"
            })
            .when("/project-summary", {
                templateUrl : "{{ route('enquiry.project-summary') }}",
                controller : "WizzardCtrl"
            })
            .when("/technical-estimation", {
                templateUrl : "{{ route('enquiry.technical-estimation') }}",
                controller : "Tech_Estimate"
            })
            .when("/cost-estimation", {
                templateUrl : "{{ route('enquiry.cost-estimation') }}",
                controller : "Cost_Estimate"
            }) 
            .when("/proposal-sharing", {
                templateUrl : "{{ route('enquiry.proposal-sharing') }}",
                controller : "Proposal_Sharing"
            })
            .when("/response-status", {
                templateUrl : "{{ route('enquiry.response-status') }}"
            })
            .when("/move-to-project", {
                templateUrl : "{{ route('enquiry.move-to-project') }}",
                controller : "Customer_response"
            })
            .otherwise({
                redirectTo: '{{ route('enquiry.project-summary') }}'
            });
        });  
        app.controller("rootEnquiryWizard",function ($scope, $http, API_URL,  $location) {
            $location.path('{{ $activeTab }}');
        });
        app.controller('WizzardCtrl', function ($scope, $http, API_URL,  $location) {
            $scope.enquiry_id = '{{ $id }}';
            getAutoDeskFileTypes = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("get-autodesk-file-type") }}'
                }).then(function (res) {
                    $scope.autoDeskFileType = res.data;
                });
            }
            getAutoDeskFileTypes();

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
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
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
                console.log(seen_id);
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   $scope.chatType,
                    "created_by"      :   type,
                    "send_by"         :   {{ Admin()->id }}
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
            
            $scope.sendComments  = function(type, created_by, seen_id) { 
                console.log(seen_id);
                
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
        app.controller('Tech_Estimate', function ($scope, $http, API_URL, $location) {
            let enquiryId =  '{{ $data->id }}'
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
                $http.get(`${API_URL}technical-estimate/get-history/${$scope.enquiry_id}/print`).then((res) => {
                    let currentTable        =   $("#root_technical_estimate").html();
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
                        <style>.history_precast_value{border: none} .table {border:0 !important; box-shadow: none !important} .thead , button , .btn-group , .fa {display:none !important} .tbody { padding : 0 !important} .btn{display:none !important} input{pointer-events:none } .custom-border-left{border-left:1px solid #000!important}.custom-border-bottom{border-bottom:1px solid #000!important}.custom-td{border-right:1px solid #000!important;border-top:1px solid #000!important;border-left:none!important;border-bottom:none!important;width:100px!important;min-width:100px!important;max-width:100px!important;display:flex;justify-content:center;align-items:center;flex-direction:column}.custom-td *{font-size:12px!important}.custom-row{display:inline-flex!important}.custom-td input{padding:0!important;height:100%;width:100%}.custom-td input,.custom-td select{color:#000!important}</style>
                    `);
                    a.document.write(`
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
                                        <td>${moment( $scope.enquiry.enquiry.enquiry_date ).format('DD-MM-YYYY') }</td>
                                        <td>${$scope.enquiry.enquiry.project_name }</td>
                                        <td>${$scope.enquiry.enquiry.contact_person }</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `);
                    a.document.write(currentTable); 
                    a.document.write(res.data);
                    a.document.write('</html>');
                    a.document.close();
                    setTimeout(() => {
                        a.print(); 
                    }, 1000);
                });
            }

            $scope.getHistory       = (type)  => {
                $http.get(`${API_URL}technical-estimate/get-history/${$scope.enquiry_id}/view`)
                    .then(function successCallback(res){
                        if(res.data.length == 0) {
                            Message('danger', 'Data not found');
                            return false;
                        }
                        $scope.historyStatus    =   false;
                        $("#technical_estimate_histories").html('');
                        $("#technical_estimate_histories").append(res.data);
                        $('#technical_history').modal('show');
                    }, function errorCallback(error){
                        console.log(error);
                    });
            }

            
            $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                $scope.enquiry              =   response.data; 
                $scope.enquiry_id           =   response.data.enquiry_id; 
                $scope.assign_to            =   response.data.others.assign_to ?? '';
                $scope.buildingJson         =   response.data.building_component;
                $scope.buildingJson.map((building) => {
                    building.building_component_number.map((item) => {
                       item.sqfeet = Number(item.sqfeet).toFixed(2)
                    })
                })
                $scope.building_building = $scope.buildingJson
            });
             
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
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

                $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
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
                    $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                        $scope.enquiry              =   response.data; 
                        $scope.enquiry_id           =   response.data.enquiry_id; 
                        $scope.building_building    =   response.data.building_component; 
                    });
                    return false;
                }
                
                if($scope.building_building.length == 0 || $scope.building_building[0].building_component_number.length == 0 || $scope.building_building == []) {
                    Message('danger',"You Can't Update Empty Building !");
                    $http.get(API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} ).then(function (response) {
                        $scope.enquiry              =   response.data; 
                        $scope.enquiry_id           =   response.data.enquiry_id; 
                        $scope.building_building    =   response.data.building_component; 
                    });
                    return false;
                } 
                $http({
                    method: "POST",
                    url: API_URL + 'admin/api/v2/customers-technical-estimate/' + {{ $data->id ?? " " }} , 
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

            $scope.removeUser = () => {
                $scope.assign_to != '' && $http.post(`${API_URL}technical-estimate/remove-user/${enquiryId}`)
                    .then(function successCallback(res){
                        if(res.data.status) {
                            $scope.getWizradStatus();
                            $scope.assign_to = '';
                            Message('success', res.data.msg);
                            return false;
                        }
                    }, function errorCallback(error){
                        Message('danger', 'Something went wrong please contact administrator');
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
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
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

        app.controller('Cost_Estimate', function ($scope, $http, $timeout, API_URL) {
            let enquiryId =  '{{ $data->id }}';
            $scope.current_user = '{{Admin()->id}}';
            $scope.template_name = '';
            $scope.is_template_update = false;
            $scope.historyStatus    =  true;
            $scope.is_precast_template_update = false;

            $scope.callWoodTemplate = (pos) => {
                $scope.costEstimateWoodTemplate = $scope.EngineeringEstimate[pos];
                $("#cost-estimate-wood-template-modal").modal('show');
            }   

            $scope.addWoodTemplate = (type) => {
                if($scope.template_name == '') {
                    Message('danger','Template field is required');
                    return false;
                }
                let templateData = {
                    name: $scope.template_name,
                    template: $scope.costEstimateWoodTemplate,
                    type: type
                } 
                $http.post(`${API_URL}admin/cost-estimate-template`, {data:templateData})
                .then(function successCallback(res){
                    if(res.data.status) {
                        $scope.is_template_update = !$scope.is_template_update;
                        Message('success', res.data.msg);
                        $("#cost-estimate-wood-template-modal").modal('hide');
                        return false;
                    }
                    Message('danger', res.data.msg);
                });
            }

            $scope.getWoodTemplate= (id, pos) => {
                if(id != '' && $scope.costEstimateWoodTemplates.length != 0) {
                    let template = $scope.costEstimateWoodTemplates.find(obj => obj.id === id);
                    $scope.EngineeringEstimate[pos] = JSON.parse(template.json);
                }
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                Message('success','Templated selected successfully');
            }

            $scope.$watch('is_template_update', function() {
                $http({
                    method: 'GET',
                    url: `${API_URL}admin/cost-estimate-wood-template`
                    }).then(function success(res) {
                       $scope.costEstimateWoodTemplates = res.data.data;
                    }, function error(response) {
                });
            });
   
    //  precast
        $scope.callPrecastTemplate = (pos) => {
            $scope.costEstimatePrecastTemplate = $scope.PrecastComponent[pos];
            $("#cost-estimate-precast-template-modal").modal('show');
        }   

        $scope.addPrecastTemplate = (type) => {
            if($scope.template_name == '') {
                Message('danger','Template field is required');
                return false;
            }
            let templateData = {
                name: $scope.template_name,
                template: $scope.costEstimatePrecastTemplate,
                type: type
            } 
            $http.post(`${API_URL}admin/cost-estimate-template`, {data:templateData})
            .then(function successCallback(res){
                if(res.data.status) {
                    $scope.is_precast_template_update = !$scope.is_precast_template_update;
                    Message('success', res.data.msg);
                    $("#cost-estimate-precast-template-modal").modal('hide');
                    return false;
                }
                Message('danger', res.data.msg);
            });
        }

        $scope.getPrecastTemplate= (id, pos) => {
            if(id != '' && $scope.costEstimatePrecastTemplates.length != 0) {
                let template = $scope.costEstimatePrecastTemplates.find(obj => obj.id === id);
                $scope.PrecastComponent[pos] = JSON.parse(template.json);
            }
            $timeout(function() {
                angular.element('.psqm_').triggerHandler('keyup');
            });
        }

        $scope.$watch('is_precast_template_update', function() {
            $http({
                method: 'GET',
                url: `${API_URL}admin/cost-estimate-precast-template`
                }).then(function success(res) {
                    $scope.costEstimatePrecastTemplates = res.data.data;
                }, function error(response) {
            });
        }); 
            $scope.printCostEstimate = (type) => { 
                $http.get(`${API_URL}cost-estimate/get-history/${$scope.enquiry_id}/${type}`)
                .then((res) => {
                    var currentTabelHistory   =   ''
                
                    res.data.forEach((item,i) => {
                        currentTabelHistory += `<h5 class="m-0 d-flex align-items-center">
                                                    <strong class="me-auto text-dark">Version : ${i+1}</strong>
                                                    <span class="fa fa-calendar text-dark"></span>
                                                    <small>${item.created_at}</small>
                                                </h5>`;
                        currentTabelHistory += item.history;
                    })
                    if(type =='wood'){
                        var currentTabel          =   $(".costEstimateCurrentData").html()
                    } else {
                        var currentTabel          =   $("#precast-cost-estimate").html()
                    }
                   
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
                        <style> .mdi , .remove_print_history{display:none} input,select{pointer-events:none; border:none},.card {border:0 !important; box-shadow: none !important} .card-header , button, .btn-group , .fa {display:none !important} .card-body { padding : 0 !important}  .custom-border-left{border-left:1px solid #000!important}.custom-border-bottom{border-bottom:1px solid #000!important}.custom-td{border-right:1px solid #000!important;border-top:1px solid #000!important;border-left:none!important;border-bottom:none!important;width:100px!important;min-width:100px!important;max-width:100px!important;display:flex;justify-content:center;align-items:center;flex-direction:column}.custom-td *{font-size:12px!important}.custom-row{display:inline-flex!important}.custom-td input{padding:0!important;height:100%;width:100%}.custom-td input,.custom-td select{color:#000!important}</style>
                    `);
                    let enquiryData = `
                        <div class="card-body pt-0 p-0">
                            <table class="table custom shadow-none border m-0 table-bordered ">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Enquiry Received Date</th>
                                        <th>Project Name</th>
                                        <th>Type of Building</th>
                                        <th>Person Contact</th>
                                        <th>Project Cost</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>${ moment($scope.enquiry.enquiry.enquiry_date).format('DD-MM-YYYY') }</td>
                                        <td>${$scope.enquiry.enquiry.project_name }</td>
                                        <td>${$scope.enquiry.building_type.building_type_name  }</td>
                                        <td>${$scope.enquiry.enquiry.contact_person }</td>
                                        <td>${$scope.cost_estimate.total_cost}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>`;
                    a.document.write(enquiryData);
                    a.document.write('<div id="history_id">');
                    a.document.write(currentTabel);
                    a.document.write(currentTabelHistory);
                    a.document.write('</div>');
                    a.document.write('</html>');
                    a.document.close();
                    setTimeout(() => {
                        a.print(); 
                    }, 3000);
                }); 
            }
            $scope.getHistory       = (type)  => {
                $http.get(`${API_URL}cost-estimate/get-history/${$scope.enquiry_id}/${type}`)
                    .then(function successCallback(res){
                        if(res.data.length == 0) {
                            Message('danger', 'Data not found');
                            return false;
                        }
                        $scope.historyStatus    =   false
                        var costId              =   $(`#${type}_id`);
                        $(costId).html('');
                     
                        res.data.length && res.data.map((item, key) => {
                            $(costId).append(`
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



            getUsers = () => {
                $http.get(`${API_URL}admin/get-costestimate-employee`)
                .then(function successCallback(res){
                    $scope.userList = res.data;
                }, function errorCallback(error){
                    console.log(error);
                });
            }
            getUsers();

            $scope.assignUserToCostestimate = (user, cost_estimate_assign_for) => {
                let assign_to = user == '' ? null: user;
                if($scope.assign_to == '') {
                    Message('danger', "Please Choose The User !");
                    return false;
                }
                $http.post(`${API_URL}cost-estimate/assign-user/${enquiryId}`, {assign_to: assign_to, type: cost_estimate_assign_for})
                    .then(function successCallback(res){
                       
                        if(res.data.status) {
                            $scope.getWizradStatus();
                            Message('success', res.data.msg);
                            return false;
                        }
                        Message('error', res.data.msg);
                    }, function errorCallback(error){
                        console.log(error);
                });
            }

            $scope.removeUser = () => {
                $scope.assign_to != '' && $http.post(`${API_URL}cost-estimate/remove-user/${enquiryId}`)
                    .then(function successCallback(res){
                        if(res.data.status) {
                            $scope.getWizradStatus();
                            $scope.assign_to = '';
                            Message('success', res.data.msg);
                            return false;
                        }
                    }, function errorCallback(error){
                        Message('danger', 'Something went wrong please contact administrator');
                    });
            }

            $scope.gotoNext = function() {
                $http.post(`${API_URL}cost-estimate/update-status/${enquiryId}`)
                .then(function successCallback(res){
                    $location.path('/proposal-sharing');
                });
            }

            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status      = res.data.progress.proposal_sharing_status;
                    $scope.customer_response            = res.data.progress.customer_response; 
                    $scope.cost_estimate                = res.data.cost_estimate;
                    $scope.ResultEngineeringEstimate    = JSON.parse(res.data.cost_estimate.build_json);
                    $scope.ResultPrecastComponent       = JSON.parse(res.data.cost_estimate.precast_build_json);
                    $scope.EngineeringEstimate          = $scope.ResultEngineeringEstimate.costEstimate;
                    $scope.PrecastComponent             = $scope.ResultPrecastComponent.precastEstimate;
                    $scope.cost_estimate_comments       = res.data.cost_estimate_comments;
                    $scope.customer_info                = res.data.customer_info;
                });
            }
            $scope.getWizradStatus();
          
            $scope.enquiry_id = '{{ $id }}';
            // =========== Cost Estimate  ============
            $http.get("{{ route("CostEstimateData") }}").then(function (response) {
                $scope.cost = response.data; 
            });
            $http.get("{{ route('CostEstimateView', $data->id) }}").then(function (response) {
                console.log(response.data.others);
                $scope.enquiry          =   response.data;  
                $scope.CostEstimate     =   response.data.cost_estimation; 
                $scope.assign_to        =   response.data.others.assign_to ?? '';
            });

            $scope.UpdateCostEstimate  = function(type) {  
                if($scope.EngineeringEstimate.length == 0){
                    Message('danger', "You Can't Update Empty Data");
                    return false;
                }
                if(type == 'wood') {
                    var data = $scope.ResultEngineeringEstimate;
                    var html = $("#wood-cost-estimate").html();
                } else {
                    var data = $scope.ResultPrecastComponent;
                    var html = $("#precast-cost-estimate").html();
                }
                let total =  $scope.ResultEngineeringEstimate.total.totalSum +  $scope.ResultPrecastComponent.total.totalSum;
                $http({
                    method: "POST",
                    url: "{{ route('enquiry-create.cost-estimate-value') }}",
                    data:{ enquiry_id: $scope.enquiry_id, data : data, type: type, total : total,  history: true, html: html},
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $scope.assign_to        =  ''; 
                    $scope.getWizradStatus();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                }); 
            }

            $scope.sendAssignCostEstiComments  = function(type , chatSection) { 
                $scope.sendCommentsData = {
                    "comments"        :   $scope.inlineComments,
                    "enquiry_id"      :   $scope.enquiry_id,
                    "type"            :   chatSection,
                    "created_by"      :   type,
                    "role_by"         : `Cost Estimater ${type}`
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
                    $scope.showTechCommentsToggle('viewConversations', 'cost_estimation_assign', chatSection);
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }  

            $scope.showTechCommentsToggle = function (modalstate, type, docId) {
                $scope.modalstate = modalstate;
                $scope.module = null;
                $scope.technical_docType_id   = docId; 
                $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                    $scope.commentsData = response.data.chatHistory; 
                    $scope.chatType     = response.data.chatType;  
                    $('#assing-viewConversations-modal').modal('show');
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
                            $('#assing-viewConversations-modal').modal('show');
                        });
                        break;
                    default:
                        break;
                } 
            }
        // cost estimate calculation start..
            $scope.editable = false;
            $scope.wood_estimate_edit_id = false;
            $scope.precast_estimate_edit_id = false;
            $scope.wood_estimate_name = '';
            $scope.precast_estimate_name = '';
            $scope.price_calculation = 'wood_engineering_estimation';
            $scope.EngineeringEstimate = [];
            $scope.editorEnabled = false; // precast
                $http.get(`${API_URL}wood-estimate-json`).then((res) => {
                    $scope.NewCostEstimate = res.data.json;
                    let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                    $timeout(function() {
                        angular.element('.sqm_').triggerHandler('keyup');
                    });
                });
                
            // $scope.ResultEngineeringEstimate = {'total': {totalArea: 0, totalSum: 0, totalPris: 0}, 'costEstimate': $scope.EngineeringEstimate};
            // $scope.ResultPrecastComponent = {'total': {totalArea: 0, totalSum: 0, totalPris: 0}, 'precastEstimate': $scope.PrecastComponent};
            $scope.precastEstimateTypesObj = {};
            $http.get(`${API_URL}precast-estimate`).then((res) => {
                $scope.precastEstimateTypes = res.data;
                res.data.forEach((item) => {
                    $scope.precastEstimateTypesObj[item.id] = item.name;
                });
            });

            $http.get(`${API_URL}get-cost-estimate-types`).then((res) => {
                $scope.costEstimateTypes = res.data;
            });

            $scope.createNewCalculation = (type) => {
                if(type == 'wood') {
                    $scope.wood_estimate_edit_id = false;
                    $scope.wood_estimate_name = '';
                    $scope.EngineeringEstimate.length = 0;
                    let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                    $scope.EngineeringEstimate.push(newCostEstimate);
                } else {
                    $scope.precast_edit_id = false;
                    $scope.precast_estimate_name = '';
                    $scope.PrecastComponent.length = 0;
                    let newPrecastComponent = JSON.parse(JSON.stringify(precastComponent));
                    $scope.PrecastComponent.push(newPrecastComponent);
                }
            
            }
        
            $scope.addDynamicColumn = (index, columnName) => {
                $scope.editable = false;
                if(columnName == '' || typeof(columnName) == 'undefined') return false;
                $scope.EngineeringEstimate[index].ComponentsTotals.Dynamics.push({
                        "name"   : columnName,
                        "PriceM2": 0,
                        "Sum"    : 0
                });

                $scope.EngineeringEstimate[index].Components.forEach( (Component) => {
                    Component.Dynamics.push({
                        "name"   : columnName,
                        "PriceM2": 0,
                        "Sum"    : 0
                    });
                });
                $http.post(`${API_URL}wood-estimate`,{name:columnName}).then((res) => {
                    console.log(res.data);
                })
                $scope.column_name = '';
                Message('success','Column added successfully');
            }

            $scope.deleteDynamic = (rootIndex, dynamicIndex) => {
                $scope.EngineeringEstimate[rootIndex].ComponentsTotals.Dynamics.splice(dynamicIndex, 1);

                $scope.EngineeringEstimate[rootIndex].Components.forEach( (Component) => {
                    Component.Dynamics.splice(dynamicIndex, 1);
                });
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                Message('success','Column removed successfully');
            }

            $scope.addEngineeringEstimate = () => {
                Message('success', 'Building component added successfully');
                let newCostEstimate = JSON.parse(JSON.stringify($scope.NewCostEstimate));
                console.log(newCostEstimate);
                $scope.EngineeringEstimate.push(newCostEstimate);
            }

            $scope.deleteEngineeringEstimate = (index) => {
                $scope.EngineeringEstimate.splice(index,1);
                Message('success', 'Engineering estimation deleted successfully');
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                if($scope.EngineeringEstimate.length == 0){
                    $scope.EngineeringEstimate.totalArea = 0;
                    $scope.EngineeringEstimate.totalSum =  0;
                    $scope.EngineeringEstimate.totalPris = 0;
                }
            }

            $scope.cloneCostEstimate = (index, CostEstimate) => {
                Message('success', 'Building component cloned successfully');
                let cloneObject = JSON.parse(JSON.stringify(CostEstimate));
                $scope.EngineeringEstimate.splice(index, 0, cloneObject);
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            }
        
            $scope.addComponent  = function(index) {
                let componentFirstObj = JSON.parse(JSON.stringify($scope.EngineeringEstimate[index].Components[0]));
                let removeVal = componentFirstObj.Dynamics.map((obj) => {
                    return {...obj, PriceM2: 0, Sum: 0};
                });
                let newObj = {...$scope.NewCostEstimate.Components[0],  ...{Dynamics: removeVal}}
                $scope.EngineeringEstimate[index].Components.push(JSON.parse(JSON.stringify(newObj)));
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                Message('success', 'Component added successfully');
            }

            $scope.delete   =   function(rootKey, index) { 
                $scope.EngineeringEstimate[rootKey].Components.splice(index,1);
                if($scope.EngineeringEstimate[rootKey].Components.length == 0) {
                    $scope.EngineeringEstimate.splice(rootKey,1);
                } 
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
                Message('success', 'Component deleted successfully');
            }
            $scope.BuildingComponentObj = {};
            $scope.DeliveryTypeObj = {};
            $http.get(`${API_URL}delivery-type`)
            .then((res)=> {
                $scope.deliveryTypes = res.data;
                res.data.forEach((item) => {
                    $scope.DeliveryTypeObj[item.id] = item.delivery_type_name;
                });
            });
            
            $http.get(`${API_URL}get-for-cost-estimate`)
            .then((res)=> {
                $scope.buildingComponents = res.data;
                res.data.forEach((item) => {
                    $scope.BuildingComponentObj[item.id] = item.building_component_name;
                });
            });

            $scope.getNum = (val) => {

                if (isNaN(val) || val == '') {
                    return 0;
                }
                return Number.parseFloat(val).toFixed(2);
            }

            // Precast
            $scope.PrecastComponent = [];
            let precastComponent = {
                    "type"                       : "Building Type 1",
                    "total_sqm"                  : 0,
                    "total_std_work_hours"       : 0,
                    "total_additional_work_hours": 0,
                    "total_hourly_rate"          : 0,
                    "total_work_hours"           : 0,
                    "engineering_cost"     : 0,
                    "total_central_approval"     : 0,
                    'total_engineering_cost' : 0,
                    "Components" : [    
                        {
                            'precast_component': null,
                            'no_of_staircase': '',
                            'no_of_new_component':'',
                            'no_of_different_floor_height': '',
                            'sqm'           : '',
                            'complexity'    : '', 
                            'std_work_hours': '',
                            'additional_work_hours': '',
                            'hourly_rate': '',
                            'total_work_hours': '',
                            'engineering_cost': '',
                            'total_central_approval': '',
                            'total_engineering_cost': ''
                        }
                    ]
                
            };
            $scope.PrecastComponent.push(precastComponent);
            $scope.addPrecasEstimate = () => {
                $scope.PrecastComponent.push({
                    "type"                       : "Building Type 1",
                    "total_sqm"                  : 0,
                    "total_std_work_hours"       : 0,
                    "total_additional_work_hours": 0,
                    "total_hourly_rate"          : 0,
                    "total_work_hours"           : 0,
                    "engineering_cost"     : 0,
                    "total_central_approval"     : 0,
                    "Components" : [ 
                        {
                            'precast_component': '',
                            'no_of_staircase': '',
                            'no_of_new_component':'',
                            'no_of_different_floor_height': '',
                            'sqm'           : '',
                            'complexity'    : '', 
                            'std_work_hours': '',
                            'additional_work_hours': '',
                            'hourly_rate': '',
                            'total_work_hours': '',
                            'engineering_cost': '',
                            'total_central_approval': '',
                            'total_engineering_cost': ''
                        }
                    ]
                });

            }

            $scope.addPrecastComponent =  (rootKey) => {
                $scope.PrecastComponent[rootKey].Components.push(
                    {
                            'precast_component': '',
                            'no_of_staircase': '',
                            'no_of_new_component':'',
                            'no_of_different_floor_height': '',
                            'sqm'           : '',
                            'complexity'    : '', 
                            'std_work_hours': '',
                            'additional_work_hours': '',
                            'hourly_rate': '',
                            'total_work_hours': '',
                            'engineering_cost': '',
                            'total_central_approval': '',
                            'total_engineering_cost':''
                        }
                );
            }

            $scope.deletePrecastComponent = (rootKey, index) => {
                $scope.PrecastComponent[rootKey].Components.splice(index,1);
                if($scope.PrecastComponent[rootKey].Components.length == 0){
                    $scope.PrecastComponent.splice(rootKey,1);
                }
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
                Message('success','Precast component deleted Successfully');
            }

            $scope.deletePrecastEstimate = (rootKey) => {
                $scope.PrecastComponent.splice(rootKey,1);
                Message('success','Precast estimation deleted Successfully');
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
            }

            $scope.clonePrecastEstimate = (index, precastEstimate) => {
                let cloneObject = JSON.parse(JSON.stringify(precastEstimate));
                $scope.PrecastComponent.splice(index, 0, cloneObject);
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
            }

            // $scope.EstimateStore = (type) => {
            //     if(type == 'wood') {
            //         var data = $scope.EngineeringEstimate;
            //         var name =  $scope.wood_estimate_name;
            //         if($scope.EngineeringEstimate.length == 0) {
            //             Message('danger','Please add building');
            //             return false;
            //         }
            //         if($scope.wood_estimate_name == '') {
            //             Message('danger','Please add name');
            //             return false;
            //         }
            //     } else {
            //         var data = $scope.PrecastComponent;
            //         var name =  $scope.precast_estimate_name;
            //         if($scope.PrecastComponent.length == 0) {
            //             Message('danger','Please add building');
            //             return false;
            //         }
            //         if($scope.precast_estimate_name == '') {
            //             Message('danger','Please add name');
            //             return false;
            //         }
            //     }
                
    
            //     $http.post(`
            //         ${API_URL}admin/calculate-cost-estimate/store`,
            //         {data: data, type: type, name: name}
            //     ).then(function successCallback(res){
            //         if(res.data.status) {
            //             Message('success', res.data.msg);
            //             getlist(type);
            //             return false;
            //         }
            //         Message('danger', res.data.msg);
            //         return false;
            //     });
            // }

            // $scope.EstimateUpdate = (id, type) => {
            //     if(type == 'wood') {
            //         var data = $scope.EngineeringEstimate;
            //         var name =  $scope.wood_estimate_name;
            //         if($scope.EngineeringEstimate.length == 0) {
            //             Message('danger','Please add building');
            //             return false;
            //         }
            //         if($scope.wood_estimate_name == '') {
            //             Message('danger','Please add name');
            //             return false;
            //         }
            //     } else {
            //         var data = $scope.PrecastComponent;
            //         var name =  $scope.precast_estimate_name;
            //         if($scope.PrecastComponent.length == 0) {
            //             Message('danger','Please add building');
            //             return false;
            //         }
            //         if($scope.precast_estimate_name == '') {
            //             Message('danger','Please add name');
            //             return false;
            //         }
            //     }
            //     $http.post(`
            //         ${API_URL}admin/calculate-cost-estimate/update/${id}`,
            //         {data: data, type:type ,name: name}
            //     ).then(function successCallback(res){
            //         if(res.data.status) {
            //             Message('success', res.data.msg);
            //             getlist(type);
            //             return false;
            //         }
            //         Message('danger', res.data.msg);
            //         return false;
            //     });
            // }

            // $scope.EstimateEdit = (Estimate, type) => {
            //     if(type == 'wood'){
            //         $scope.EngineeringEstimate.length = 0;
            //         $scope.wood_estimate_edit_id = Estimate.id;
            //         $scope.wood_estimate_name = Estimate.name;
            //         $scope.EngineeringEstimate  = JSON.parse(Estimate.calculation_json);
            //         $timeout(function() {
            //             angular.element('.sqm_').triggerHandler('keyup');
            //         });
            //     } else {
            //         $scope.PrecastComponent.length = 0;
            //         $scope.precast_estimate_edit_id = Estimate.id;
            //         $scope.precast_estimate_name = Estimate.name;
            //         $scope.PrecastComponent  = JSON.parse(Estimate.calculation_json);
            //         $timeout(function() {
            //             angular.element('.psqm_').triggerHandler('keyup');
            //         });
            //     }
            
            // }

            // $scope.EstimateDelete = (id, type) => {
            //     $http.post(`
            //         ${API_URL}admin/calculate-cost-estimate/delete/${id}/${type}`,
            //     ).then(function successCallback(res){
            //         if(res.data.status) {
            //             Message('success', res.data.msg);
            //             getlist(type);
            //             return false;
            //         }
            //         Message('danger', res.data.msg);
            //         return false;
            //     });
            // }

            $scope.savePrecastComponent = () => {
                $http.post(`${API_URL}precast-estimate`,{name:$scope.precast_component_name, hours:  $scope.precast_component_hours})
                .then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $scope.editorEnabled = false;
                    $http.get(`${API_URL}precast-estimate`).then((res) => {
                        $scope.precastEstimateTypes = res.data;
                    });
                }, function errorCallback(response) {
                    Message('danger',response.data.errors.name[0]);
                });
            }

        }).directive('getCostDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('keyup', function () {
                        $(this).addClass('admin_estimate_click');
                        let $TotalPriceM2   = 0;
                        let $TotalSum       = 0;
                        let $TotalRibSum    = 0;
                        scope.CostEstimate.ComponentsTotals.Dynamics.forEach( (item, index) => {

                             // designScope percentage validation
                             if(scope.CostEstimate.Components[scope.index].DesignScope > 100) {
                                scope.CostEstimate.Components[scope.index].DesignScope = 100;
                            } else if(scope.CostEstimate.Components[scope.index].DesignScope < 0) {
                                scope.CostEstimate.Components[scope.index].DesignScope = 1;
                            }

                            // complexity validation
                            if(scope.CostEstimate.Components[scope.index].Complexity > 2) {
                                scope.CostEstimate.Components[scope.index].Complexity = 2;
                            } else if(scope.CostEstimate.Components[scope.index].Complexity < 1) {
                                scope.CostEstimate.Components[scope.index].Complexity = 1;
                            }

                            scope.CostEstimate.Components[scope.index].Dynamics[index].Sum  = getNum(((scope.CostEstimate.Components[scope.index].Sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2  ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);
                            $TotalPriceM2   += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2);
                            $TotalSum       += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].Sum);
                        });
                        console.log(' scope.CostEstimate.Components[scope.index].Rib.Sum', scope.CostEstimate.Components[scope.index].Rib.Sum)
                        if(scope.CostEstimate.Components[scope.index].Rib.Sum != 0 && scope.CostEstimate.Components[scope.index].Rib.Sum != '' && scope.CostEstimate.Components[scope.index].Rib.Sum != 'undefined'){
                            scope.CostEstimate.Components[scope.index].Sqm = 0;
                            $TotalRibSum = scope.CostEstimate.Components[scope.index].Rib.Sum * scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 ;
                            scope.CostEstimate.Components[scope.index].TotalCost.Sum = getNum($TotalRibSum);
                        } else {
                            scope.CostEstimate.Components[scope.index].TotalCost.Sum = getNum($TotalSum);
                            scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 = getNum($TotalPriceM2);
                        }

                    // for column total
                        let $totalEstimateArea = 0;
                        let $totalEstimateSum = 0;
                        scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                            let $totalPrice = 0;
                            let $totalSum = 0;
                            let $sqmTotal = 0;
                            let $ribTotal = 0;
                            var $totalSql_ = 0;

                            Estimates.Components.forEach( (Component, componentIndex) => {
                                $totalSql_ += Number(Component.Sqm);
                            });

                            Estimates.ComponentsTotals.Dynamics.forEach((dynamic) => {
                                dynamic.PriceM2 = 0;
                                dynamic.Sum = 0;
                               
                            })
                            Estimates.Components.forEach( (Component, componentIndex) => {
                                
                                $sqmTotal += Number(Component.Sqm);
                                $totalEstimateArea += Number(Component.Sqm);
                                $ribTotal += Number(Component.Rib.Sum);
                                if(Component.Rib.Sum !=0 && Component.Rib.Sum !=''){
                                    $totalSum += Number(Component.Rib.Sum * Component.TotalCost.PriceM2);
                                    $totalEstimateSum += Number(Component.Rib.Sum * Component.TotalCost.PriceM2);
                                }else {
                                    Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                        Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum += Number(Dynamic.Sum);
                                        Estimates.ComponentsTotals.Dynamics[dynamicIndex].PriceM2 = getNum(Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum / $totalSql_);
                                        $totalPrice += Number(Dynamic.PriceM2);
                                        $totalSum += Number(Dynamic.Sum);
                                        $totalEstimateSum += Number(Dynamic.Sum);
                                        Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum = getNum(Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum);
                                    });
                                }
                                
                            });
                            Estimates.ComponentsTotals.TotalCost.Sum     = getNum($totalSum);
                            Estimates.ComponentsTotals.TotalCost.PriceM2 = getNum($totalSum / $sqmTotal);
                            Estimates.ComponentsTotals.Sqm               = getNum($sqmTotal);
                            Estimates.ComponentsTotals.Rib.Sum           = getNum($ribTotal);

                        });
                        scope.ResultEngineeringEstimate.total.totalArea = getNum($totalEstimateArea);
                        scope.ResultEngineeringEstimate.total.totalSum = getNum($totalEstimateSum);
                        scope.ResultEngineeringEstimate.total.totalPris = getNum($totalEstimateSum /  $totalEstimateArea);
                        scope.ResultEngineeringEstimate.costEstimate =  scope.EngineeringEstimate;
                        scope.$apply();
                    });
                },
            };
        }]).directive('getMasterData',   ['$http' ,function ($http, $scope, $apply, API_URL) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('change', function () {
                        var response;
                        if(scope.C.building_component_id == "" || scope.C.type_id == "") {
                            return false;
                        } 
                        $http({
                        method: 'GET',
                        url: '{{ route('CostEstimateMasterValue') }}',
                        params : {component_id: scope.C.building_component_id, type_id: scope.C.type_id}
                        }).then(function success(res) {
                            response = res.data;
                            scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                                Estimates.Components.forEach( (Component, componentIndex) => {
                                    if(scope.index == componentIndex) {
                                        Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                            if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Details') {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = Number(response.detail_price) || 0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum =  0;
                                            } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Statics') {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = Number(response.statistic_price) || 0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = 0;
                                            } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'CAD/CAM') {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = Number(response.cad_cam_price) || 0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = 0;
                                            } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Logistics') {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = Number(response.logistic_price) || 0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = 0;
                                            } else {
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 =  0;
                                                Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum =  0 ;
                                            }
                                        });
                                        Estimates.Components[componentIndex].Complexity = 1;
                                        // Estimates.Components[componentIndex].Sqm = 0;
                                        Estimates.Components[componentIndex].TotalCost.PriceM2 = Number(response.total_sum);
                                    }
                                });
                            });
                            let finalJson = {...scope.ResultEngineeringEstimate.costEstimate, ...scope.EngineeringEstimate};
                            scope.ResultEngineeringEstimate.costEstimate =   JSON.parse(JSON.stringify(finalJson));
                        });
                    });
                },
            };
        }]).directive('getPrecastDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
        return {
            restrict: 'A',
            link : function (scope, element, attrs) {
                let eventHandle = () => {
                    // complexity validation
                    scope.PrecastEstimate.Components[scope.index].hourly_rate = 550 
                    const precast_component = scope.precastEstimateTypes.find(precastEstimateType => scope.PrecastEstimate.Components[scope.index].precast_component == precastEstimateType.id);
                    if(scope.PrecastEstimate.Components[scope.index].complexity > 2) {
                        scope.PrecastEstimate.Components[scope.index].complexity= 2;
                    } else if(scope.PrecastEstimate.Components[scope.index].complexity< 1) {
                        scope.PrecastEstimate.Components[scope.index].complexity= 1;
                    }
                    if(typeof(precast_component) == 'undefined') {
                        scope.$apply();
                        return false;
                    }
                    if(scope.PrecastEstimate.Components[scope.index].no_of_staircase != 0) {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_staircase * precast_component.hours);
                    } else {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_new_component *  precast_component.hours );
                    }
                    scope.PrecastEstimate.Components[scope.index].total_work_hours = getNum(Number( scope.PrecastEstimate.Components[scope.index].std_work_hours) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours));                                                              
                    scope.PrecastEstimate.Components[scope.index].engineering_cost = getNum(
                                                                                            (Number( scope.PrecastEstimate.Components[scope.index].std_work_hours) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours)) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].hourly_rate) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].complexity)
                              
                                                                                            );
                    scope.PrecastEstimate.Components[scope.index].total_engineering_cost   = Number(scope.PrecastEstimate.Components[scope.index].engineering_cost)+ Number(scope.PrecastEstimate.Components[scope.index].total_central_approval)
                    let $total_sqm                   = 0;
                    let $total_std_work_hours        = 0;
                    let $total_additional_work_hours = 0;
                    let $total_hourly_rate           = 0;
                    let $total_work_hours            = 0;
                    let $engineering_cost      = 0;
                    let $total_central_approval      = 0;
                    let $total_engineering_cost = 0;

                    scope.PrecastEstimate.Components.forEach((row) => {
                        $total_sqm                   += Number(row.sqm);
                        $total_std_work_hours        += Number(row.std_work_hours);
                        $total_additional_work_hours += Number(row.additional_work_hours);
                        $total_hourly_rate           += Number(row.hourly_rate);
                        $total_work_hours            += Number(row.total_work_hours);
                        $engineering_cost      += Number(row.engineering_cost);
                        $total_central_approval      += Number(row.total_central_approval);
                        $total_engineering_cost     += Number(row.total_engineering_cost);
                    });

                    scope.PrecastEstimate.total_sqm                   = $total_sqm;
                    scope.PrecastEstimate.total_std_work_hours        = $total_std_work_hours;
                    scope.PrecastEstimate.total_additional_work_hours = $total_additional_work_hours;
                    scope.PrecastEstimate.total_hourly_rate           = $total_hourly_rate;
                    scope.PrecastEstimate.total_work_hours            = $total_work_hours;
                    scope.PrecastEstimate.engineering_cost      = $engineering_cost;
                    scope.PrecastEstimate.total_central_approval      = $total_central_approval;
                    scope.PrecastEstimate.total_engineering_cost     = $total_engineering_cost;
                    let $totalArea = 0;
                    let $totalPris = 0;
                    let $totalSum  = 0;
                    let $totalWorkHours = 0;

                    scope.PrecastComponent.forEach( (row) => {
                        $totalArea += row.total_sqm;
                        $totalSum  += row.total_engineering_cost;
                        $totalWorkHours += row.total_work_hours;
                    });
                    scope.ResultPrecastComponent.total.totalWorkHours = $totalWorkHours;
                    scope.ResultPrecastComponent.total.totalSum  = $totalSum;
                    // scope.ResultPrecastComponent.total.totalPris = $totalSum / $totalArea;
                    scope.ResultPrecastComponent.precastEstimate =  scope.PrecastComponent;
                    scope.$apply();
                }
                element.on('keyup', function () {
                    $(this).addClass('admin_estimate_click');
                    eventHandle();
                });
                element.on('change', function () {
                    $(this).addClass('admin_estimate_click');
                    eventHandle();
                });
            },
        };
    }]);

        app.controller('Proposal_Sharing', function ($scope, $http, API_URL, $location, $timeout) {
            $scope.enquiry_id = '{{ $data->id }}';
            $scope.proposalModal = true;
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status      = res.data.progress.proposal_sharing_status;
                    $scope.proposal_email_status        = res.data.progress.proposal_email_status;
                    $scope.customer_response    = res.data.progress.customer_response; 
                });
            }
            $scope.getWizradStatus();

            $scope.getProposesalData = function () {
                $http.get('{{ route("index.proposal-sharing",$data->id) }}').then(function (res) {
                    $scope.proposal  = res.data;
                });
            }
            $scope.getProposesalData();

            $scope.sendMailToCustomer = function (proposal_id) { 
                $http.post(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/send-mail/'+proposal_id).then(function (response) {
                    Message('success',response.data.msg);
                    // $scope.getWizradStatus();
                    $scope.getProposesalData();
                });
            }

            $scope.sendMailToCustomerVersion = function (proposal_id , Vid) { 
                $http.post(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/send-mail/'+proposal_id+'/version/'+Vid).then(function (response) {
                    Message('success',response.data.msg);
                    // $scope.getWizradStatus();
                    $scope.getProposesalData();
                    $timeout(function(){
                        window.onbeforeunload = null;
                    });
                });
            }

            $scope.sendProposal = function() {
                $http.post(API_URL + 'admin/proposal/send-proposal/'+$scope.enquiry_id).then(function (res) {
                    if(res.data.status) {
                        $timeout(function(){
                            window.onbeforeunload = null;
                        });
                        Swal.fire({
                            icon: 'success',
                            html: `<h3>${res.data.msg}</h3>`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $timeout(()=> {
                            location.href = '{{ route('admin.enquiry-list') }}'
                        }, 3000);
                        return false;
                    } else {
                        Message('danger', res.data.msg);
                        return false;
                    }
                   
                });
            }

           
            $scope.moveToProject = () => {
                $http.post(API_URL + 'proposal-move-to-project/'+{{ $data->id }}).then(function (response) {
                    $timeout(function(){
                        window.onbeforeunload = null;
                    });
                    $timeout(()=> {
                        window.location.href = `${API_URL}admin/enquiry-list`;
                    }, 1000);
                });
            }
            
            // View Propose Data
            $scope.ViewEditPropose = function (proposal_id, update_status = true) {
                $scope.proposalModal = update_status;
                $http.get(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id).then(function (response) {
                    $scope.edit_proposal  = response.data;
                    $scope.mail_content_first = $scope.edit_proposal[0].documentary_content;
                    $scope.proposalId = $scope.edit_proposal[0].proposal_id;
                });
                $('#bs-Preview-modal-lg').modal('show');
            }
            $scope.ViewEditProposeVersions = function (proposal_id , Vid, update_status = true) {
                $scope.proposalModal = update_status;
                $http.get(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id+'/version/'+Vid).then(function (response) {
                    $scope.edit_proposal  = response.data;
                    $scope.mail_content = $scope.edit_proposal[0].documentary_content;
                    $scope.proposalVersionId = $scope.edit_proposal[0].proposal_id;
                    $scope.proposalVId = $scope.edit_proposal[0].id;
                });
                $('#bs-PreviewVersions-modal-lg').modal('show');
            }
            $scope.ViewProposeVersions = function (proposal_id , Vid, update_status = true) {
                $http.get(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id).then(function (response) {
                    $scope.edit_proposal      = response.data;
                    $scope.mail_content_first = $scope.edit_proposal[0].documentary_content;
                    $scope.proposalId         = $scope.edit_proposal[0].proposal_id;
                });
                $('#ViewProposalModal').modal('show');
            }

            // ViewPropsalVersions
            $scope.ViewPropsalVersions = function (proposal_id) {
                $http.get(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/versions/'+proposal_id).then(function (response) {
                    $scope.proposal_versions  = response.data;
                });
            }

            // Duplicate Record
            $scope.DuplicatePropose = function (proposal_id) {
                $http.put(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/duplicate/'+proposal_id).then(function (response) {
                    $scope.edit_proposal  = response.data;
                    Message('success',response.data.msg);
                    $scope.getProposesalData();
                });
            }

            $scope.DuplicateProposalVersion = (proposal_id) => {
                $http.put(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/duplicate-version/'+proposal_id).then(function (response) {
                    $scope.edit_proposal  = response.data;
                    Message('success',response.data.msg);
                    $scope.getProposesalData();
                });
            }
            
            // DeletePropose
            $scope.DeletePropose = function (proposal_id) {
                $http.delete(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id).then(function (response) {
                    Message('success',response.data.msg);
                    $scope.getProposesalData();
                });
            }
            
            // DeletePropose
            $scope.DeleteProposeVersion = function (proposal_id, Vid) {
                $http.delete(API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposal_id+'/version/'+Vid).then(function (response) {
                    Message('success',response.data.msg);
                    $scope.getProposesalData();
                });
            }

            $scope.updateProposalMail = function(proposalId, modal) {

                $scope.sendCommentsData = {
                    "mail_content"  : $("#mail_content_first_text_editor [contenteditable=true]").html()
                }

                $http({
                    method: "PUT",
                    url: API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+proposalId ,
                    data: $.param($scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $(`#${modal}`).modal('hide');
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            $scope.updateProposalVersionMail = function(modal) {

                $scope.sendMailDtata = {
                    "mail_content"  : $("#mail_content_text_editor [contenteditable=true]").html()
                }
                $http({
                    method: "PUT",
                    url: API_URL + 'admin/proposal/enquiry/'+{{ $data->id }}+'/edit/'+$scope.proposalVersionId+'/version/'+$scope.proposalVId,
                    data: $.param($scope.sendMailDtata),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    Message('success',response.data.msg);
                    $(`#${modal}`).modal('hide');
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            $scope.getDocumentaryData = function() {
                $http({
                    method: 'GET',
                    url:  "{{ route('get-documentaryData') }}" ,
                }).then(function (response) {
                    // alert(JSON.stringify(response.data))
                    $scope.documentary_module_name = response.data;	
                    $scope.getProposesalData();
                }, function (error) {
                    console.log(error);
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            
            $scope.documentaryOneData = function() {
                var documentId = $scope.documentary.documentary_title;
                var enquireId = {{ $data->id ?? '' }};

                Swal.fire({ 
                    timerProgressBar: true,
                    showConfirmButton: false, 
                    allowOutsideClick: false,
                    html:`
                        <div class="text-center">
                            <h1 class="text-primary">Please Wait</h1>
                            <i class="mdi text-primary fa-4x mdi-spin mdi-loading"></i>
                            <h4 class="text-secondary">Proposal Creation On Process may be,</h4>
                            <h4 class="text-secondary"> it's take some times,</h4>
                        </div>
                    `,
                });

                $http({
                    method: 'GET',
                    url: "{{ route('get-documentaryOneData') }}",
                    params:{'documentId':documentId,'enquireId':enquireId},
                }).then(function (response) {
                    if(response.data.status == false){
                        Swal.close();
                        Message('danger', response.data.msg);
                        return false;
                    }
                    Swal.close();
                    $scope.getDocumentaryData();
                }, function (error) {
                    console.log(error);
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            $scope.getDocumentaryData();

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
        app.controller('Customer_response', function ($scope, $http, API_URL, $location, $timeout) {
            $scope.customer_response_obj = {};
            let enquiry_id = '{{ $id }}';
            var dt = new Date();
            $scope.followupDate = new Date(dt.setDate( dt.getDate() - 1)); 
            $scope.getWizradStatus = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.project_summary_status       = res.data.progress.status;
                    $scope.technical_estimation_status  = res.data.progress.technical_estimation_status;
                    $scope.cost_estimation_status       = res.data.progress.cost_estimation_status;
                    $scope.proposal_sharing_status  = res.data.progress.proposal_sharing_status;
                    $scope.proposal_email_status  = res.data.progress.proposal_email_status;
                    $scope.customer_response    = res.data.progress.customer_response; 
                    $scope.response_data        = res.data; 
                    $scope.customer_response_obj = {
                        follow_up_date: new Date(res.data.progress.follow_up_date),
                        follow_up_comment: res.data.progress.follow_up_comment
                    }
                });
            }
            $scope.getWizradStatus();
            // enquiry.show-comments
            $scope.GetCommentsData = function() {
                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + {{ $data->id ?? " " }} ).then(function (res) {
                    $scope.enquiry_status = res.data.enquiry_status;
                    $scope.customer_response_obj.follow_up_date = new Date(res.data.follow_up_date);
                    $scope.customer_response_obj.follow_up_status = res.data.follow_up_status;
                }).then(function(){
                    // $http.get(API_URL + 'admin/api/v2/get-denied-proposal/' + {{ $data->id ?? " " }} ).then(function (res) {
                    //     $scope.deniedComments = res.data;
                    // });
                    // $http.get(API_URL + 'admin/api/v2/get-approved-proposal/' + {{ $data->id ?? " " }} ).then(function (res) {
                    //     $scope.approvedComments = res.data;
                    //     console.log($scope.approvedComments);
                    // });
                });
            }
            $scope.GetCommentsData();
            getDeliveryManager = () => {
                $http.get(API_URL+'admin/get-delivery-manager').then(function successCallback(res){
                    $scope.userList = res.data;
                }, function errorCallback(error){
                    console.log(error);
                });
            }
            getDeliveryManager();

            $scope.moveToProject = () => {
               let assigned_to = $scope.customer_response_obj.assign_user ?? {{ Admin()->id }};
               if(assigned_to == false) {
                    Message('danger', 'Assign field required'); return false;
               }
               $http.post(API_URL+'customer-response/move-to-project', {assigned_to: assigned_to, enquiry_id, enquiry_id}).then(function successfunction(res){
                    $timeout(function(){
                        window.onbeforeunload = null;
                    });
                    if(res.data.status == true){
                        Swal.fire({
                            title: `Moved to project successfully`,
                            showDenyButton: false,
                            showCancelButton: false,
                            cancelButtonText: 'No',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                            }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = '{{ route('list-projects') }}'
                            }
                        });
                        return false;
                    }
                    Message('danger', res.data.msg);
                    return false;
               }, function errorCallback(error){});
            } 
            
            $scope.manualMoveToProject = () => {
               let assigned_to = $scope.customer_response_obj.follow_up_status ?? false;
               if(assigned_to == false) {
                    Message('danger', 'Select field required'); return false;
               }
               $http.post(API_URL+'customer-response/move-to-project', {assigned_to: '{{ Admin()->id }}', enquiry_id, enquiry_id, is_admin_approved: true}).then(function successfunction(res){
                    if(res.data.status == true){
                        Swal.fire({
                            icon: 'success',
                            html: `<h3>Move to project successfully..!!</h3>`,
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $timeout(()=> {
                            window.onbeforeunload = null;
                            location.href = '{{ route('admin.enquiry-list') }}'
                        }, 3000);
                        return false;
                    }
                    Message('danger', res.data.msg);
                    return false;
               }, function errorCallback(error){});
            } 


            $scope.assignToProject = () => {
               let assigned_to = $scope.customer_response_obj.assign_user ?? false;
               if(assigned_to == false) {
                    Message('danger', 'Assign field required'); return false;
               }

               $http.post(API_URL+'customer-response/assign-to-project', {assigned_to: assigned_to, enquiry_id, enquiry_id}).then(function successfunction(res){
                    if(res.data.status) {
                        Message('success',res.data.msg);
                        return false;
                    }
               });

            }

            // followup date
            $scope.updateFollow = () => {
                if($scope.customer_response_obj.follow_up_date == null || $scope.customer_response_obj.follow_up_date == ''){
                    Message('danger','Follow up date field is required');
                    return false;
                }
                $http.post(API_URL+'admin/update-followup', {
                    enquiry_id: enquiry_id, 
                    follow_up_date: $scope.customer_response_obj.follow_up_date,
                    follow_up_comment: $scope.customer_response_obj.follow_up_comment
                })
                .then((res) => {
                    Swal.fire({
                        icon: 'success',
                        html: `<h3>${res.data.msg}</h3>`,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $timeout(()=> {
                        window.onbeforeunload = null;
                        location.href = '{{ route('admin.enquiry-list') }}'
                    }, 1000);
                })
            } 

        });
        window.onbeforeunload = function(e) {
            var dialogText = 'We are saving the status of your listing. Are you realy sure you want to leave?';
            e.returnValue = dialogText;
            return dialogText;
        };
    </script>  
@endpush