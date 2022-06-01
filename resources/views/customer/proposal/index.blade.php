     
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
            
            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">

                <li class="nav-item">
                    <a href="#enquiry" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                        <span >Summary</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#proposal" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                        <span >Proposal</span>
                    </a>
                </li>

            </ul>
            
            <div class="tab-content">
                <div class="tab-pane" id="proposal" ng-controller="ProposalController">
                    @include('customer.proposal.denied-modal')
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="text-end">
                                <a download="proposal-{{ date('Y-m-d-H:s:i') }}" href="{{ asset($latest_proposal->pdf_file_name) }}" type="button" class="btn btn-primary mb-3"><i class="mdi mdi-download me-1"></i> <span>Download PDF</span> </a>
                            </div>
                            <div class="p-3">
                                {!! $latest_proposal->documentary_content !!}
                            </div>
                            @if($latest_proposal->proposal_status == 'not_send')
                                <select ng-model="proposal_status" name="proposal_status" id="proposal_status" class="form-select my-3">
                                    <option value=""> ---  Select ---</option>
                                    <option value="approve">Approve</option>
                                    <option value="deny">Deny</option>
                                    <option value="change_request">Change Request</option>
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
                            @else
                                <div style="font-size: 200%;" class="text-center">
                                    {!!  proposalStatusBadge($latest_proposal->proposal_status) !!}
                                </div>
                            @endif

                            <div class="">

                            </div>

                        </div> 
                    </div>
            
                    <div class="card border">
                        <div class="card-body">      
                            <h4>Proposal List</h4>
                            <table class="table custom table-bordered m-0" id="proposalTable">
                                <thead>
                                  <tr>
                                    <th scope="col" >Version</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($proposals as $proposal)
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
                <div class="tab-pane show active" id="enquiry">
                    <div class="card border">
                        <div class="card-body pt-0 pb-0">
                                       
                            <div id="rootwizard" ng-controller="wizard" style="display: none">
                                <ul class="nav nav-pills nav-justified form-wizard-header bg-light ">
                                    <li class="nav-item projectInfoForm"  data-target-form="#projectInfoForm"> 
                                        <a href="#!/" style="min-height: 40px;" class="timeline-step  {{$enquiry->project_info == '1' ? "active" : ""}} " id="project-info">
                                            <div class="timeline-content">
                                                <div class="inner-circle projectInfoForm bg-success">
                                                    <i class="fa fa-project-diagram fa-2x "></i>
                                                </div>       
                                             
                                                <div class="pt-1 mt-2 position-relative" ng-class="{tab__comment__active: enquiry_active_comments.project_information > 0}">
                                                    Project Information
                                                    <span ng-show="enquiry_active_comments.project_information > 0" class="enquiry__comments__alert">
                                                        @{{ enquiry_active_comments.project_information   }}
                                                    </span>
                                                </div>                                                             
                                            </div> 
                                        </a>
                                    </li>
                                    <li class="nav-item serviceSelection" ng-click="updateWizardStatus(1)" data-target-form="#serviceSelection">
                                        <a href="#!/service" style="min-height: 40px;" class="timeline-step serviceSelection  {{$enquiry->service == 1 ? 'active' : ''}}" id="service">
                                            <div class="timeline-content">
                                                <div class="inner-circle  bg-secondary">
                                                    <i class="fa fa-list-alt fa-2x mb-1"></i>
                                                </div>      
                                                <div class="pt-1 mt-2 position-relative" ng-class="{tab__comment__active: enquiry_active_comments.service > 0}">
                                                    Service Selection
                                                    <span ng-show="enquiry_active_comments.service > 0"  class="enquiry__comments__alert">
                                                        @{{ enquiry_active_comments.service   }}
                                                    </span>
                                                </div>                              
                                            </div> 
                                        </a>
                                    </li>
                                    <li class="nav-item IFCModelUpload" ng-click="updateWizardStatus(2)" data-target-form="#IFCModelUpload">
                                        <a href="#!/ifc-model-upload" style="min-height: 40px;" class="timeline-step {{$enquiry->ifc_model_upload == 1 ? 'active' : ''}}" id="ifc-model-upload">
                                            <div class="timeline-content">
                                                <div class="inner-circle  bg-secondary">
                                                    <i class="fa fa-2x fa-file-upload mb-1"></i>
                                                </div>        
                                                <div class="pt-1 mt-2 position-relative"  ng-class="{tab__comment__active: enquiry_active_comments.ifc_model > 0}">
                                                    IFC Model & Uploads
                                                    <span ng-show="enquiry_active_comments.ifc_model > 0" class="enquiry__comments__alert">
                                                        @{{ enquiry_active_comments.ifc_model   }}
                                                    </span>
                                                </div>                                                                  
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item buildingComponent" ng-click="updateWizardStatus(3)"  data-target-form="#buildingComponent">
                                        <a href="#!/building-component"  style="min-height: 40px;" class="timeline-step {{$enquiry->building_component == 1 ? 'active' : ''}}" id="building-component">
                                            <div class="timeline-content">
                                                <div class="inner-circle  bg-secondary">
                                                    <i class="fa fa-2x fa-shapes mb-1"></i>
                                                </div>              
                                                <div class="pt-1 mt-2 position-relative"  ng-class="{tab__comment__active: enquiry_active_comments.building_components > 0}">
                                                    Building  Components
                                                    <span ng-show="enquiry_active_comments.building_components > 0" class="enquiry__comments__alert">
                                                        @{{ enquiry_active_comments.building_components   }}
                                                    </span>
                                                </div>                                                            
                                            
                                            </div> 
                                        </a>
                                    </li>
                                    <li class="nav-item additionalInformation" ng-click="updateWizardStatus(4)" data-target-form="#additionalInformation">
                                        <a href="#!/additional-info" style="min-height: 40px;" class="timeline-step {{$enquiry->additional_info == 1 ? 'active' : ''}}"  id="additional-info">
                                            <div class="timeline-content">
                                                <div class="inner-circle  bg-secondary">
                                                    <i class="fa fa-2x fa-info mb-1"></i>
                                                </div>   
                                                <div class="pt-1 mt-2 position-relative" ng-class="{tab__comment__active: enquiry_active_comments.add_info > 0}">
                                                    Additional Info
                                                    <span ng-show="enquiry_active_comments.add_info > 0" class="enquiry__comments__alert">
                                                        @{{ enquiry_active_comments.add_info   }}
                                                    </span>
                                                </div>             
                                                                                                      
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item last reviewSubmit"  ng-click="updateWizardStatus(5)"  data-target-form="#reviewSubmit" >
                                        <a href="#!/review" style="min-height: 40px;"  class="timeline-step" id="review">
                                            <div class="timeline-content">
                                                <div class="inner-circle  bg-secondary">
                                                    <i class="fa fa-2x fa-clipboard-check mb-1"></i>
                                                </div>          
                                                <div class="pt-1 mt-2 position-relative">
                                                    Review &  Submit
                                                </div>                                                   
                                            </div> 
                                        </a>
                                    </li>
                                </ul>  
                                <div class="tab-content my-3" >
                                   <ng-view></ng-view>
                                </div> <!-- tab-content -->
                            </div> <!-- end #rootwizard--> 
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
      
@push('custom-scripts')
<script>
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
           
    });

    app.config(function($routeProvider) {
        $routeProvider
        .when("/", {
            templateUrl : "{{ route('enquiry.project-info') }}",
            controller : "ProjectInfo"
        })
        .when("/service", {
            templateUrl : "{{ route('enquiry.service') }}",
            controller : "Service"
        })
        .when("/ifc-model-upload", {
            templateUrl : "{{ route('enquiry.ifc-model-upload') }}",
            controller : "IFCModelUpload"
        })
        .when("/building-component", {
            templateUrl : "{{ route('enquiry.building-component') }}",
            controller : "BuildingComponent"
        })
        .when("/additional-info", {
            templateUrl : "{{ route('enquiry.additional-info') }}",
            controller : "AdditionalInfo"
        })
        .when("/review", {
            templateUrl : "{{ route('enquiry.review') }}",
            controller : "Review"
        })
    }); 
    app.controller('wizard', function ($scope, $http, $rootScope, Notification, API_URL, $location) {
        $scope.enquiry_id = {{$id}};
        $http({
            method: 'GET',
            url: `${API_URL}customers/get-customer-enquiry/${$scope.enquiry_id}/project_info`,
        }).then(function (res) {
            $("#rootwizard").show();
            enableActiveTabs(res.data.active_tabs);
            $scope.enquiry_active_comments = res.data.enquiry_active_comments;
        });
    });
    
    app.controller('ProjectInfo', function ($scope, $http, $rootScope, Notification, API_URL, $location) {
        $scope.commentShow = true;
        let enquiry_id = {{$id}};
        $scope.enquiry_id = {{$id}};
        // console.log('enquiry_id',enquiry_id);
        $http({
            method: 'GET',
            url: '{{ route('get-login-customer') }}'
        }).then( function(res) {
            $scope.customer = res.data.customer;
        }, function (err) {
            console.log('get enquiry error');
        });
        getProjectType = () => {
            $http({
                method: 'GET',
                url: '{{ route("project-type.get") }}'
            }).then(function (res) {
                $scope.projectTypes = res.data;		
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        } 
        getDeliveryType = () => {
            $http({
                method: 'GET',
                url: '{{ route("delivery-type.get") }}'
            }).then(function (res) {
                $rootScope.deliveryTypes    = res.data;		
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }

        getBuildingType = () => {
            $http({
                method: 'GET',
                url: '{{ route("building-type.get") }}'
            }).then(function (res) {
                $scope.buildingTypes = res.data;		
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }
        getProjectInfoInptuData = function($projectInfo) {
            
            $scope.data = {
                'contact_person'       : $projectInfo.contact_person,
                'mobile_no'            : $projectInfo.mobile_no,
                'secondary_mobile_no'  : $projectInfo.secondary_mobile_no,
                'enquiry_date'         : new Date($projectInfo.enquiry_date),
                'customer_enquiry_number'       : $projectInfo.customer_enquiry_number,
                'project_name'         : $projectInfo.project_name,
                'zipcode'              : $projectInfo.zipcode,
                'city'                 : $projectInfo.city,
                'state'                : $projectInfo.state,
                'building_type_id'     : $projectInfo.building_type_id,
                'project_type_id'      : $projectInfo.project_type_id,
                'project_date'         : new Date($projectInfo.project_date),
                'site_address'         : $projectInfo.site_address,
                'place'                : $projectInfo.place,
                'country'              : $projectInfo.country,
                'no_of_building'       : $projectInfo.no_of_building,
                'delivery_type_id'     : $projectInfo.delivery_type_id,
                'project_delivery_date': new Date($projectInfo.project_delivery_date),
            };
            return  $scope.data;
        }
        getLastEnquiry = (enquiry_id) => {
            // console.log(enquiry_id);
            if(typeof(enquiry_id) == 'undefined' ||enquiry_id == ''){
                return false;
            } 
            $http({
                method: 'GET',
                url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/project_info`,
            }).then(function (res) {
                enableActiveTabs(res.data.active_tabs);
                $scope.customer_enquiry_number = res.data.project_info.customer_enquiry_number ?? res.data.project_info.enquiry_no;
                $scope.enquiry_date = new Date(res.data.project_info.enquiry_date);
                $scope.enquiry_number = res.data.project_info.enquiry_no;
                $scope.projectInfo = getProjectInfoInptuData(res.data.project_info);
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }
        getLastEnquiry(enquiry_id);
        getProjectType();
        getBuildingType();
        getDeliveryType();

        $scope.getZipcodeData = function() {
            let zipcode = $("#zipcode").val();
            if(typeof(zipcode) == 'undefined' || zipcode.length != 4){
                return false;
            }
            $http({
                method: 'GET',
                url: `https://api.zippopotam.us/NO/${zipcode}`
            }).then(function successCallback(res) {
                $scope.zipcodeData = res.data;
                console.log("API working") 
                $scope.projectInfo = {
                    ...$scope.projectInfo, 
                    ...{
                        'state'     :  $scope.zipcodeData.places[0].state,
                        'place'     :  $scope.zipcodeData.places[0]['place name'],
                        'country'   :  $scope.zipcodeData.country,
                        'zipcode'   :  zipcode,
                    }
                };
            }, function errorCallback(error) {
                Message('danger', 'Invalid zipcode');
                $scope.projectInfo = {
                    ...$scope.projectInfo, 
                    ...{
                        'state'     : '',
                        'place'     : '',
                        'country'   : '',
                        'zipcode'   :  zipcode,
                    }
                };
                return false;
            });
        } 
        $scope.formSubmit = false;
        $scope.submitProjectInfoForm = (formValid) => {
            if(formValid == true) {
                $scope.formSubmit = true;
                return false;
            }
            $http({
                method: 'POST',
                url: '{{ route("customers.update-enquiry", $id) }}',
                data: {type: 'project_info', 'data': getProjectInfoInptuData($scope.projectInfo)}
            }).then(function (res) {
                $location.path('/service');
                Message('success','Project Information inserted successfully');
            }, function (error) {
                console.log(`storeprojectinfo ${error}`);
            }); 
        }

        $scope.ProjectInfoSaveAndSubmit = (formValid) => {
            if(formValid == true) {
                $scope.formSubmit = true;
                return false;
            }
            $http({
                method: 'POST',
                url: '{{ route("customers.update-enquiry", $id) }}',
                data: {type: 'project_info', 'data': getProjectInfoInptuData($scope.projectInfo)}
            }).then(function (res) {
                Message('success','Project Information saved successfully');
                return false;
            }, function (error) {
                console.log(`storeprojectinfo ${error}`);
            }); 
            return false;
        }
    }); 
    

    app.controller('Service', function ($scope, $http, $rootScope, Notification, API_URL, $location){
            $scope.commentShow = true;
            $scope.serviceList = [];
            let enquiry_id = {{$id}};
            $scope.enquiry_id = {{$id}};
            $http({
                method: 'GET',
                url: '{{ route('get-customer-enquiry') }}'
            }).then( function(res) {
                    getLastEnquiry(enquiry_id);
                    if(res.data.status == "false") {
                        $scope.enquiry_number = res.data.enquiry_number;
                        // enquiry_id = res.data.enquiry_id
                      
                    } else {
                        $scope.enquiry_no = res.data.enquiry.enquiry_number;
                    }
                }, function (err) {
                    console.log('get enquiry error');
            });
            getOutputTypes = () => {
                $http({
                    method: 'GET',
                    url: '{{ route("output-type.get") }}'
                }).then(function (res) {
                    $scope.outputTypes =   res.data.map((serviceSelection) => { 
                                                return {...serviceSelection, 
                                                        services: serviceSelection.services.map((service) => { return  {...service, 'selected': false} })}
                                            });
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            getOutputTypes();

            getLastEnquiry = (enquiry_id) => {
                if(typeof(enquiry_id) == 'undefined' || enquiry_id == ''){
                    return false;
                } 
                $http({
                    method: 'GET',
                    url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/services`,
                }).then(function (res) {
                    enableActiveTabs(res.data.active_tabs);
                    $scope.serviceList = res.data.services;
                    $scope.outputTypes = $scope.outputTypes.map((serviceSelection) => { 
                        return {...serviceSelection, 
                                services: serviceSelection.services.map((service) => { 
                                    if($scope.serviceList.indexOf(service.id) > -1)
                                        return  {...service, 'selected': true} 
                                    return service;
                                })}
                    });
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            getServiceSelectionInptuData = function() {
                return Object.assign({}, $scope.serviceList);
            }
            $scope.changeService = function(list, active){
                if (active) {
                    if($scope.serviceList.indexOf(list) == -1)  $scope.serviceList.push(list);
                }else {
                    if($scope.serviceList.indexOf(list) > -1)  $scope.serviceList.splice($scope.serviceList.indexOf(list), 1);
                }
                Object.assign({}, $scope.serviceList);
            };
            $scope.formSubmit = false;
            $scope.submitService = (formValid) => {
                if(formValid == true) {
                    $scope.formSubmit = true;
                    return false;
                }
                $scope.formSubmit = false;
                $http({
                    method: 'POST',
                    url: '{{ route("customers.update-enquiry", $id) }}',
                    data: {type: 'services', 'data': getServiceSelectionInptuData()}
                }).then(function (res) {
                    $location.path('/ifc-model-upload');
                    Message('success','Service selection inserted successfully');
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });         
            }

            $scope.saveAndSubmitService = (formValid) => {
                if(formValid == true) {
                    $scope.formSubmit = true;
                    return false;
                }
                $scope.formSubmit = false;
                $http({
                    method: 'POST',
                    url: '{{ route("customers.update-enquiry", $id) }}',
                    data: {type: 'services', 'data': getServiceSelectionInptuData()}
                }).then(function (res) {
                    Message('success','Service selection saved successfully');
                    return false;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });         
            }
        });
    
    app.controller('BuildingComponent', function ($scope, $http, $rootScope, Notification, API_URL, $location, fileUpload ) { 
        $scope.commentShow = true;
        $scope.wallGroup = [];
        $scope.layerAdd = true;
        $scope.callTemplate = true;
        $scope.fileUploaded = false;
        $scope.buildingComponentUploads = [];
        let enquiry_id = {{$id}};
        $scope.enquiry_id = {{$id}};
        $http({
            method: 'GET',
            url: '{{ route('get-customer-enquiry') }}'
        }).then( function(res) {
                getLastEnquiry(enquiry_id);
                if(res.data.status == "false") {
                    $scope.enquiry_number = res.data.enquiry_number;
                    // enquiry_id = res.data.enquiry_id
                } else {
                    $scope.enquiry_no = res.data.enquiry.enquiry_number;
                }
            }, function (err) {
                console.log('get enquiry error');
        });
        
        $scope.callLayerModal = (wall_id) => {
            building_component_id = wall_id;
            $("#add-layer-modal").modal('show');
        }

        $scope.callTemplateModal = (index, wall_id, position_id) => {
            $scope.templateData = {
                building_component_id: wall_id,
                index_position: index,
                detail_position: position_id
            };
            $("#add-template-modal").modal('show');
        }

        $scope.getTemplate = (index, building_component_id, detail_id ,template_id) => {
            $http({
                method: 'get',
                url: `${API_URL}customers/enquiry-template/${template_id}`,
            }).then(function successCallback(response) {
                $scope.wallGroup[index].Details[detail_id] = response.data;
                Message('success', 'Template Added');
            }, function errorCallback(response) {
                Message('danger', 'Something went wrong');
            });
        }   

        $scope.submitTemplate = () => {
            let index =  $scope.templateData.index_position;
            let detail_position =  $scope.templateData.detail_position;
            let data =  $scope.wallGroup[index].Details[detail_position];
            $http({
                method: 'POST',
                url: '{{ route("enquiry-template.store") }}',
                data: {... $scope.templateData, data: data, template_name: $scope.TemplateForm.name}
            }).then(function successCallback(response) {
                if(response.data.status == false) {
                    Message('danger', response.data.msg);
                    return false;
                }
                $scope.callTemplate =  !$scope.callTemplate;
                $("#add-template-modal").modal('hide');
                $scope.TemplateForm.name = '';
                Message('success', response.data.msg);
            }, function errorCallback(response) {
                Message('danger', 'Something went wrong');
            });
        }

        $scope.submitLayer = () => {
            if($scope.layer_name =='' || typeof($scope.layer_name) == 'undefined') {
                return false;
            }
            $http({
                method: 'POST',
                url: '{{ route('layer.store-layer-from-customer') }}',
                data: {building_component_id: building_component_id, layer_name:  $scope.layer_name}
            }).then(function successCallback(response) {
                $scope.layerAdd  = !$scope.layerAdd;
                $("#add-layer-modal").modal('hide');
                $scope.layer_name = '';
                Message('success', 'Layer added successfully');
            }, function errorCallback(response) {
                Message('danger', 'Something went wrong');
            });
        }

        $scope.uploadBuildingComponentFile = function() {
            var file = false;
            if($scope.$parent['building_component_file']){
                file = $scope.$parent['building_component_file'];  
            }
            if(file == false){
                Message('danger', 'Please upload file');
                return false;
            }
            var uploadUrl = '{{ route('customers.update-enquiry',$id) }}';
            var type = 'building_component_upload';
            var file_type = 'buildingComponent';
            promise = fileUpload.uploadFileToUrl(file, type, file_type, uploadUrl, $scope);
            promise.then(function (response) {
                delete($scope.$parent['building_component_file']);
                angular.element("input[type='file']").val(null);
                if(response.data.status == true) {
                    $scope.buildingComponentUploads = [];
                    $scope.buildingComponentUploads =  response.data.data;
                    Message('success', response.data.msg);
                    return false;
                } 
                Message('danger', response.data.msg);
                return false;
            },function(){
            $scope.serverResponse = 'An error has occurred';
            });
        };

        $scope.performAction = () => {
            let route      = $("#exampleModalRoute").val();
            let method     = $("#exampleModalMethod").val();
            let id         = $("#exampleModalId").val();
            let enquiry_id = $("#exampleModalEnquiryId").val();
            let view_type  = $("#exampleModalViewType").val();
            $http({
                method: method,
                url: route,
                params: {id: id},
            }).then(function (res) {
                if(res.data.status) {
                    $scope.buildingComponentUploads = [];
                    $scope.buildingComponentUploads =  res.data.data;
                    $("#exampleModal").modal('hide');
                    Message('success',res.data.msg);
                    return false;
                }
                return false;
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }

        getDeliveryType = () => {
            $http({
                method: 'GET',
                url: '{{ route("delivery-type.get") }}'
            }).then(function (res) {
                $scope.deliveryTypes = res.data;		    
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        } 
        getDeliveryType();
        getBuildingComponent = () => {
            $http({
                method: 'GET',
                url: '{{ route("building-component.get") }}'
                }).then(function success(response) {
                    
                    response.data.map( (item , index) => {
                        
                        let wall = {
                            WallId    : item.id,
                            WallName  : item.building_component_name,
                            WallIcon  : item.building_component_icon,
                            WallTop   : item.top_position,
                            WallBottom: item.bottom_position,
                            Details: [
                                
                            ]
                        }
                        $scope.wallGroup.push(wall);
                    });
                    $scope.AddWallDetails(0);
                    
                }, function error(response) {
            });
        }
        getLastEnquiry = (enquiry_id) => {
            if(typeof(enquiry_id) == 'undefined' || enquiry_id == '')  {
                getBuildingComponent(); 
                return false;
            }
            $http({
                method: 'GET',
                url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/building_component`,
            }).then(function (res){
                enableActiveTabs(res.data.active_tabs);
                $scope.showHideBuildingComponent = res.data.building_component_process_type;
                if(res.data.building_component.length == 0 || res.data.building_component_process_type == 1) {
                    $scope.buildingComponentUploads = res.data.building_component;
                    getBuildingComponent();
                    return false;
                }
                res.data.building_component.map( (item , index) => {
                    let Details  = [];
                    if(typeof(item.detail) != 'undefined') {
                        Details =  item.detail.map( (detail, index) => {
                            let Layer  = [];
                            if(typeof(detail.layer) != 'undefined') {
                                Layer = detail.layer.map( (layerObj, index) => {
                                    
                                    return {
                                        LayerName:  layerObj.layer_name,
                                        // LayerNameText:  layerObj.layer_name,
                                        Thickness : Number(layerObj.thickness),
                                        Breadth:  Number(layerObj.breath),
                                    }
                                });
                            }
                            return {
                                FloorName   : detail.floor,
                                TotalArea   : Number(detail.approx_total_area),
                                DeliveryType:  detail.building_component_delivery_type_id,
                                Layers : Layer
                            }
                        });
                    }
                    let wall = {
                            WallId    : item.wallId,
                            WallName  : item.wall,
                            WallIcon  : item.icon,
                            WallTop   : item.top_position,
                            WallBottom: item.bottom_position,
                            Details: Details
                        }
                    $scope.wallGroup.push(wall);
                });
            }, function (error) {
                console.log('building component error');
            });
        }
        $scope.formSubmit = false;
        $scope.submitBuildingComponent = (formValid) => {
            console.log(formValid,'formValid');
            let isValidField = true;
            if($scope.showHideBuildingComponent == 0) {
                $scope.wallGroup.forEach((wall) => {
                    if( wall.Details.length > 0) {
                        wallName = wall.WallName;
                        wall.Details.forEach((detail, index) => {
                            wallIndex = index + 1;
                            if(detail.FloorName == '' || typeof(detail.FloorName) == 'undefined') {
                                Message('danger', `${wallName} ${wallIndex} field required `);
                                isValidField = false;
                                return false;
                            } if(detail.DeliveryType == '' || typeof(detail.DeliveryType) == 'undefined') {
                                Message('danger', `${wallName} ${wallIndex} field required `);
                                isValidField = false;
                                return false;
                            } if(detail.TotalArea == '' || typeof(detail.TotalArea) == 'undefined') {
                                Message('danger', `${wallName} ${wallIndex} field required `);
                                isValidField = false;
                                return false;
                            }
                            if( detail.Layers.length > 0) {
                                detail.Layers.forEach((layer) => {
                                    if(layer.LayerName == '' || typeof(layer.LayerName) == 'undefined') {
                                        Message('danger', `${wallName} ${wallIndex} field required `);
                                        isValidField = false;
                                        return false;
                                    } if(layer.Breadth == '' || typeof(layer.Breadth) == 'undefined') {
                                        Message('danger', `${wallName} ${wallIndex} field required `);
                                        isValidField = false;
                                        return false;
                                    } if(layer.Thickness == ''|| typeof(layer.Thickness) == 'undefined') {
                                        Message('danger', `${wallName} ${wallIndex} field required `);
                                        isValidField = false;
                                        return false;
                                    }
                                });
                            }
                        return false;
                        });
                    }
                    if(formValid == true) {
                        $scope.formSubmit = true;
                        return false;
                    }
                });
            }
            if(isValidField == false) { return false;}
            let skipUploads = [];
            if($scope.showHideBuildingComponent == 0) {
                $scope.wallGroup.forEach((wall) => {
                    if(wall.Details.length == 0) {
                        if(skipUploads.indexOf(wall.WallName) > -1 == false) {
                            skipUploads.push(wall.WallName);
                        }
                    }
                });
                if(skipUploads.length > 0) {
                    Swal.fire({
                        title: `${skipUploads.join(',')} are missing, Do you still want to skip it ?`,
                        showDenyButton: false,
                        showCancelButton: true,
                        cancelButtonText: 'No',
                        confirmButtonText: 'Yes',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $http({
                                method: 'POST',
                                url: '{{ route('customers.update-enquiry', $id) }}',
                                data: {type: 'building_component', 'data': $scope.wallGroup}
                            }).then(function (res) {
                                $location.path('/additional-info');
                                Message('success', `Building Component updated successfully`);
                            }, function (error) {
                                Message('error', `Somethig went wrong`);
                            }); 
                        }
                    });
                } else {
                    $http({
                        method: 'POST',
                        url: '{{ route('customers.update-enquiry', $id) }}',
                        data: {type: 'building_component', 'data': $scope.wallGroup}
                    }).then(function (res) {
                        $location.path('/additional-info');
                        Message('success', `Building Component updated successfully`);
                    }, function (error) {
                        Message('error', `Somethig went wrong`);
                    }); 
                
                }
                
                return false;
            }
            
            if($scope.showHideBuildingComponent == 1) { $location.path('/additional-info'); return false;}
            
        }

        $scope.saveAndSubmitBuildingComponent = (formValid) => {
            let isValidField = true;
            if($scope.showHideBuildingComponent == 0) {
                $scope.wallGroup.forEach((wall) => {
                    if( wall.Details.length > 0) {
                        wallName = wall.WallName;
                        wall.Details.forEach((detail, index) => {
                            wallIndex = index + 1;
                            if(detail.FloorName == '' || typeof(detail.FloorName) == 'undefined') {
                                Message('danger', `${wallName} ${wallIndex} field required `);
                                isValidField = false;
                                return false;
                            } if(detail.DeliveryType == '' || typeof(detail.DeliveryType) == 'undefined') {
                                Message('danger', `${wallName} ${wallIndex} field required `);
                                isValidField = false;
                                return false;
                            } if(detail.TotalArea == '' || typeof(detail.TotalArea) == 'undefined') {
                                Message('danger', `${wallName} ${wallIndex} field required `);
                                isValidField = false;
                                return false;
                            }
                            if( detail.Layers.length > 0) {
                                detail.Layers.forEach((layer) => {
                                    if(layer.LayerName == '' || typeof(layer.LayerName) == 'undefined') {
                                        Message('danger', `${wallName} ${wallIndex} field required `);
                                        isValidField = false;
                                        return false;
                                    } if(layer.Breadth == '' || typeof(layer.Breadth) == 'undefined') {
                                        Message('danger', `${wallName} ${wallIndex} field required `);
                                        isValidField = false;
                                        return false;
                                    } if(layer.Thickness == ''|| typeof(layer.Thickness) == 'undefined') {
                                        Message('danger', `${wallName} ${wallIndex} field required `);
                                        isValidField = false;
                                        return false;
                                    }
                                });
                            }
                        return false;
                        });
                    }
                    if(formValid == true) {
                        $scope.formSubmit = true;
                        return false;
                    }
                });
            }
            if(isValidField == false) { return false;}
            if($scope.showHideBuildingComponent == 0) {
                $http({
                        method: 'POST',
                        url: '{{ route('customers.update-enquiry', $id) }}',
                        data: {type: 'building_component', 'data': $scope.wallGroup}
                    }).then(function (res) {
                        Message('success', `Building Component saved successfully`);
                        return false;
                    }, function (error) {
                        Message('error', `Somethig went wrong`);
                    }); 
                return false;
            }
            if($scope.showHideBuildingComponent == 1) { 
                Message('success', `Building Component updated successfully`);
                return false;
            }
            return false;
        }


        $scope.AddWallDetails  =   function(index) {
            $scope.wallGroup[index].Details.push({
                "FloorName" : "",
                "TotalArea" : "",
                "DeliveryType" : "",
                "Layers": [
                    {
                        "LayerName": '',
                        "Thickness": '',
                        "Breadth": '',
                    }
                ] 
            });
            // console.log( $scope.wallGroup);
        } 
        // console.log($scope.wallGroup);
        $scope.AddLayers  =   function(fIndex, index) {
            $scope.wallGroup[fIndex].Details[index].Layers.push({
                "LayerName": '',
                "LayerType": '',
                "Thickness ": '',
                "Breadth": '',
            });
        }
        $scope.delWall = function(index){
            $scope.wallGroup.splice(index,1);
        } 
        $scope.delWallTwo = function(fIndex){
            $scope.wallGroup.splice(fIndex,1);
        }  
        $scope.RemoveDetails = function(fIndex, Secindex){
            $scope.wallGroup[fIndex].Details.splice(Secindex,1);                
        }
        $scope.removeLayer = function(fIndex, Secindex, ThreeIndex){
            $scope.wallGroup[fIndex].Details[Secindex].Layers.splice(ThreeIndex,1);
        }  
        $scope.removeWall = function(fIndex, Secindex){
            $scope.wallGroup[fIndex].Details.splice(Secindex,1);           
        } 
        $scope.getDocumentView = (file) => {
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
        }).directive('getLayerType', function layerType($http) {
        // return {
        //     restrict: 'A',
        //     link : function (scope, element, attrs) {
        //         element.on('click', function () {
        //             if(scope.w.WallId == 'undefined') {
        //                 return false;
        //             }
        //             $http({
        //                 method: 'GET',
        //                 url: '{{ route("layer-type.get-layer-type") }}',
        //                 params : {building_component_id: scope.w.WallId, layer_id: scope.l.LayerName}
        //                 }).then(function success(response) {
        //                     scope.layerTypes = response.data;
        //                 }, function error(response) {
        //             });
        //         });
        //     },
        // };
        }).directive('getCustomerLayer', function customerLayer($http) {
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    scope.$watch('layerAdd', function() {
                        $http({
                            method: 'GET',
                            url: '{{ route("layer.get-layer-by-building-component") }}',
                            params : {building_component_id: scope.w.WallId}
                            }).then(function success(response) {
                                scope.layers = response.data;
                            }, function error(response) {
                        });
                    });
                },
            };
        }).directive('getTemplate', function getTemplate($http) {
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    scope.$watch('callTemplate', function() {
                        $http({
                            method: 'GET',
                            url: '{{ route("get-template-by-building-component-id") }}',
                            params : {building_component_id: scope.w.WallId}
                            }).then(function success(response) {
                                scope.Templates = response.data;
                            }, function error(response) {
                        });
                    });
                },
            };
        });

    app.controller('AdditionalInfo', function ($scope, $http, $rootScope, Notification, API_URL, $location){
        $scope.commentShow = true;
        let enquiry_id = {{$id}};
        $scope.enquiry_id = {{$id}};
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

        getLastEnquiry = (enquiry_id) => {
            if(typeof(enquiry_id) == 'undefined' || enquiry_id == ''){
                return false;
            } 
            $http({
                method: 'GET',
                url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/additional_info`,
            }).then(function (res) {
                enableActiveTabs(res.data.active_tabs);
                $scope.additionalInfo = res.data.additional_infos == null ? '': res.data.additional_infos.comments;
                $scope.htmlEditorOptions = {
                    bindingOptions: {
                        'toolbar.multiline': 'multilineToolbar',
                    },
                    height: 300,
                    value:  $scope.additionalInfo,
                    toolbar: {
                        items: [
                            'undo', 'redo', 'separator',
                            {
                            name: 'size',
                            acceptedValues: ['8pt', '10pt', '12pt', '14pt', '18pt', '24pt', '36pt'],
                            },
                            {
                            name: 'font',
                            acceptedValues: ['Arial', 'Courier New', 'Georgia', 'Impact', 'Lucida Console', 'Tahoma', 'Times New Roman', 'Verdana'],
                            },
                            'separator', 'bold', 'italic', 'strike', 'underline', 'separator',
                            'alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'separator',
                            'orderedList', 'bulletList', 'separator',
                            {
                            name: 'header',
                            acceptedValues: [false, 1, 2, 3, 4, 5],
                            }, 'separator',
                            'color', 'background', 'separator',
                            'link', 'image', 'separator',
                            'clear', 'codeBlock', 'blockquote', 'separator',
                            'insertTable', 'deleteTable',
                            'insertRowAbove', 'insertRowBelow', 'deleteRow',
                            'insertColumnLeft', 'insertColumnRight', 'deleteColumn',
                        ],
                    },
                    mediaResizing: {
                    enabled: true,
                    },
                };
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }

        $scope.submitAdditionalinfoForm = () => {
            $http({
                method: 'POST',
                url: '{{ route("customers.update-enquiry", $id) }}',
                data: {type: 'additional_info', 'data': $(".dx-htmleditor-content").html()}
            }).then(function (res) {
                $location.path('/review');
                Message('success',`Comments added successfully`);
            }, function (error) {
                Message(`additional info ${error}`);
            });
            
        }  

        $scope.saveAndSubmitAdditionalinfoForm = () => {
            $http({
                method: 'POST',
                url: '{{ route("customers.update-enquiry", $id) }}',
                data: {type: 'additional_info', 'data': $(".dx-htmleditor-content").html()}
            }).then(function (res) {
                Message('success',`Comments saved successfully`);
                return false;
            }, function (error) {
                Message(`additional info ${error}`);
            });
            return false;
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

    app.controller('IFCModelUpload', function ($scope, $http, $rootScope, Notification, API_URL, $timeout, $location,  $timeout, fileUpload){
        $scope.commentShow = true;
        $("#ifc-model-upload").addClass('active');
        $scope.documentLists = [];
        $scope.mandatory = [];
        let enquiry_id = {{$id}};
        $scope.enquiry_id = {{$id}};
        $http({
            method: 'GET',
            url: '{{ route('get-customer-enquiry') }}'
        }).then( function(res) {
        getLastEnquiry(enquiry_id);
            if(res.data.status == "false") {
                $scope.enquiry_number = res.data.enquiry_number;
                enquiry_id = res.data.enquiry_id
                
            } else {
                $scope.enquiry_no = res.data.enquiry.enquiry_number;
            }
        }, function (err) {
            console.log('get enquiry error');
        });
        getLastEnquiry = (enquiry_id) => {
            let slug = [];
            if(typeof(enquiry_id) == 'undefined' || enquiry_id == ''){
                return false;
            } 
            $http({
                method: 'GET',
                url: `${API_URL}customers/get-customer-enquiry/${enquiry_id}/ifc_model_uploads`,
            }).then(function (res) {
                enableActiveTabs(res.data.active_tabs);
                res.data.ifc_model_uploads.map( (item, index) => {
                    let [id, type] = [item.enquiry_id , item.document_type.slug];
                    if(slug.indexOf(type) == -1) {
                        slug.push(type);
                        getIFCViewList(id,type);
                    }
                });
                
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
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

        getDocumentTypes = () => {
            $http({
                method: 'GET',
                url: '{{ route("document-type.get") }}'
            }).then(function (res) {
                $scope.documentTypes = res.data.map((item, index) => {
                    item.is_mandatory == 1 &&  ($scope.mandatory.push(item.slug));
                    $scope.documentLists[`${item.slug}`] = [];
                    return {...item, ...{'file_name': ''}};
                });
                // console.log($scope.documentLists);
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }
        getDocumentTypes();

        getIFCViewList = (id, view_type) => {
            $scope.documentLists[`${view_type}`] = [];
            $http({
                method: 'GET',
                url: '{{ route('customers.get-view-list') }}',
                params: {id: id, view_type: view_type},
            }).then(function (res) {
                if($scope.mandatory.indexOf(view_type) > -1)  $scope.mandatory.splice($scope.mandatory.indexOf(view_type), 1);
                $scope.documentLists[`${view_type}`] = [...$scope.documentLists[`${view_type}`], ...res.data];
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }

        // $scope.fileName= function(element) {
        //     $scope.$apply(function($scope) {
        //             var attribute_name = element.getAttribute('demo-file-model');
        //             $scope[`${attribute_name}`] = element.files[0].name;
        //     });
        // };
        var $callOnce = true;
        $scope.submitIFC  = () => {
            $http({
                method: 'POST',
                url: '{{ route('customers.update-enquiry', $id) }}',
                data: {type: 'ifc_model_upload_mandatory', 'data': false}
            }).then(function (res) {
                if(res.data.status == false) {
                    $callOnce && res.data.data.map( (item) => {
                        $scope.mandatory.indexOf(item) == -1 && $scope.mandatory.push(item);
                    });
                    if( $scope.mandatory.length != 0){   
                        Swal.fire({
                            title: 'Are you sure you want to skip the file uploads?',
                            confirmButtonText: 'Yes',
                            showCancelButton: true,
                            cancelButtonText: 'No',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $callOnce =  false;
                                $timeout(function(){
                                    $location.path('/building-component');
                                    Message('success',`IFC Models updated successfully`);      
                                });
                                // $scope.mandatory.shift();
                                // if( $scope.mandatory.length == 0){
                                    
                                // }
                            } else if (result.isDenied) {
                            }
                        })
                    }
                } else  {
                    $location.path('/building-component');
                    Message('success',`IFC Models added successfully`);
                }
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            }); 
            
        }

        $scope.saveAndSubmitIFC  = () => {
            $http({
                method: 'POST',
                url: '{{ route('customers.update-enquiry', $id) }}',
                data: {type: 'ifc_model_upload_mandatory', 'data': false}
            }).then(function (res) {
                Message('success',`IFC Models saved successfully`);     
                return false;
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            }); 
            
        }

        $scope.uploadFile = (filename, file_type) => {
            $(".fileupload").css('pointer-events','none');
            var file = false;
            var link = false;
            var callPromise = false;
            if($scope[`file${filename}`]){
                file = $scope[`file${filename}`];
                var type = 'ifc_model_upload';  
            } else if($(`#link${filename}`).val()){
                link =  $(`#link${filename}`).val();
                var type = 'ifc_link';
            }
            if(file == false && link == false){
                $(".fileupload").css('pointer-events','');
                Message('danger',`${file_type.replaceAll('_',' ') } file required`);
                return false;
            }
            var uploadUrl = '{{ route('customers.update-enquiry',$id) }}';
            if(file){
                promise = fileUpload.uploadFileToUrl(file, type, file_type, uploadUrl, $scope);
                callPromise = true;
            } else if(link) {
                promise = fileUpload.uploadLinkToUrl(link, type, file_type, uploadUrl, $scope);
                callPromise = true;
            }
            if(callPromise){
                promise.then(function (response) {
                    $(".fileupload").css('pointer-events','');
                    $scope[`file${filename}`] = '';
                    delete $scope[`file${filename}`];
                    callPromise = false;
                    angular.element("input[type='file']").val(null);
                    $(`#link${filename}`).val('');
                    Message('success',`${file_type.replaceAll('_',' ')} uploaded successfully`);
                    getIFCViewList(response.data, file_type);
                }, function () {
                    $scope.serverResponse = 'An error has occurred';
                });
            }

        }

        $scope.uploadLink = (filename, file_type) => {
            var file = $(`#${filename}`).val();
            if(typeof(file) == 'undefined'  || file == ''){
                Message('danger',`Please upload ${file_type.replaceAll('_',' ') } link`);
                return false;
            }
            var type = 'ifc_link';
            var uploadUrl = '{{ route('customers.update-enquiry', $id) }}',
            promise = fileUpload.uploadLinkToUrl(file, type, file_type, uploadUrl, $scope);
            promise.then(function (response) {
                    $scope[filename] = '';
                    Message('success',`${file_type.replaceAll('_',' ')} uploaded successfully`);
                    getIFCViewList(response.data, file_type);
                }, function () {
                    $scope.serverResponse = 'An error has occurred';
                });
        };
        
        $scope.performAction = () => {
            // console.log('called');
            let route      = $("#exampleModalRoute").val();
            let method     = $("#exampleModalMethod").val();
            let id         = $("#exampleModalId").val();
            let enquiry_id = $("#exampleModalEnquiryId").val();
            let view_type  = $("#exampleModalViewType").val();
            $http({
                method: method,
                url: route,
                params: {id: id},
            }).then(function (res) {
                if(res.status) {
                    getIFCViewList(enquiry_id, view_type);
                    $("#exampleModal").modal('hide');
                    Message('success','deleted successfully');
                    return false;
                }
                return false;
            }, function (error) {
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }
    });

    app.directive('fileModel', function ($parse) {
            return {
                restrict: 'A',
                link: function(scope, element, attrs) {
                    var model, modelSetter;
                    attrs.$observe('fileModel', function(fileModel){
                        model = $parse(attrs.fileModel);
                        modelSetter = model.assign;
                    });
                    
                    element.bind('change', function(){
                        scope.$apply(function(){
                            modelSetter(scope.$parent, element[0].files[0]);
                        });
                    });
                }
            };
    });

    app.directive('fileDropZone', function ($parse, fileUpload) {
        return {
            restrict: 'A',
            link: function($scope, element, attrs) {
                element.bind('change', function(){
                    var type = 'ifc_model_upload';  
                    var file =  element[0].files[0];
                    var file_type = `${attrs.id}`;
                    var filename = `file${attrs.id}`;
                    $(".fileupload").css('pointer-events','none');
                    var uploadUrl = '{{ route('customers.update-enquiry',$id) }}';
                    promise = fileUpload.uploadFileToUrl(file, type, file_type, uploadUrl, $scope);
                    promise.then(function (response) {
                        $(".fileupload").css('pointer-events','');
                        delete $scope.$parent[filename];
                        angular.element("input[type='file']").val(null);
                        console.log( $scope);
                        Message('success',`${file_type.replaceAll('_',' ')} uploaded successfully`);
                        getIFCViewList(response.data, file_type);
                    }, function () {
                        $scope.serverResponse = 'An error has occurred';
                    });
                });
            }
        };
    });
        

    app.service('fileUpload', function ($http, $q) {
        
        this.uploadFileToUrl = function(file, type, view_type, uploadUrl, $scope){
            $scope.progress_value = 0;
            $scope[`${view_type}showProgress`] = true;
            var fd = new FormData();
            fd.append('file', file);
            fd.append('type', type);
            fd.append('view_type', view_type);
            
            var deffered = $q.defer();
            $http.post(uploadUrl, fd, {
                transformRequest: angular.identity,
                headers: {'Content-Type':undefined, 'Process-Data': false},
                uploadEventHandlers: {
                    progress: function (e) {
                            if (e.lengthComputable) {
                                $scope.progress_value = Math.round((e.loaded / e.total) * 100) +'%';
                            }
                    }
                }
            }).then(function (response) {
                $scope[`${view_type}showProgress`] = false;
                $scope.fileUploaded = true;
                deffered.resolve(response);
            },function (response) {
                $scope[`${view_type}showProgress`] = false;
                Message("danger", "Something went wrong try again");
                deffered.reject(response);
            });
            return deffered.promise;
        }

        this.uploadLinkToUrl = function (link, type, view_type,  uploadUrl, $scope) {
            $scope.progress_value = 0;
            if(link == '' || typeof(link) == 'undefined'){
                return false;
            }
            $scope[`${view_type}showProgress`] = true;
            var fd = new FormData();
            fd.append('link', link);
            fd.append('type', type);
            fd.append('view_type',view_type);
            var deffered = $q.defer();
            
            $http.post(uploadUrl, fd, {
                transformRequest: angular.identity,
                headers: {'Content-Type':undefined, 'Process-Data': false},
                uploadEventHandlers: {
                    progress: function (e) {
                            if (e.lengthComputable) {
                                $scope.progress_value = Math.round((e.loaded / e.total) * 100) +'%';
                            }
                    }
                }
            }).then(function (response) {
                $scope[`${view_type}showProgress`] = false;
                deffered.resolve(response);
            },function (response) {
                deffered.reject(response);
            });
            return deffered.promise;
        }
        
    });
    
    window.onbeforeunload = function(e) {
        var dialogText = 'We are saving the status of your listing. Are you realy sure you want to leave ?';
        e.returnValue = dialogText;
        return dialogText;
    };

</script>

@endpush 