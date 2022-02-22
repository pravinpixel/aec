     
@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                @include('admin.includes.page-navigater') 
            </div>    
            <div class="card border">
                <div class="card-body p-0">
                   <div id="rootwizard"  ng-controller="EmployeeWizard">
                        <div class="w-100 bg-light">
                            <ul class="nav nav-pills nav-justified col-lg-8 mx-auto form-wizard-header bg-light ">
                                <li class="nav-item projectInfoForm"  data-target-form="#projectInfoForm"  style="pointer-events:none">
                                    <a href="#/" style="min-height: 40px;" class="timeline-step" id="project-info" >
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-success profile-info" >
                                                <i class="fa fa-project-diagram fa-2x " ng-click="setActive()"></i>
                                            </div>       
                                            <div class="text-end d-none d-sm-inline mt-2">Profile Information</div>                                                                 
                                        </div> 
                                    </a>
                                </li>
                                <li class="nav-item serviceSelection layerTab" data-target-form="#serviceSelection"  style="pointer-events:none" >
                                    <a href="#/sharePonitAccess" style="min-height: 40px;" class="timeline-step" id="service" >
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-secondary share-point">
                                                <i class="fa fa-list-alt fa-2x mb-1"></i>
                                            </div>        
                                            <span class="d-none d-sm-inline mt-2">share Point Access</span>                                                                
                                        </div>
                                        
                                    </a>
                                </li>
                                <!-- style="pointer-events:none" -->
                                <li class="nav-item last IFCModelUpload" data-target-form="#IFCModelUpload"  style="pointer-events:none" >
                                    <a href="#/ibmAccess" style="min-height: 40px;" class="timeline-step" id="ifc-model-upload" >
                                        <div class="timeline-content">
                                            <div class="inner-circle  bg-secondary ibm-access">
                                                <i class="fa fa-2x fa-file-upload mb-1"></i>
                                            </div>                                                                        
                                            <span class="d-none d-sm-inline mt-2">BIM 360 Access</span>
                                        </div>
                                    </a>
                                </li>   
                            </ul> 
                        </div> 
                        <div class="tab-content m-0 p-4" >
                            <ng-view></ng-view> 
                        </div> <!-- tab-content -->
                   </div>
                </div>
           </div>   
        </div>  
    </div> 
@endsection 

@push('custom-scripts') 
    <script>
         app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('admin.profile-info') }}",
                controller : "ProfileInfo"
            })
            .when("/sharePonitAccess", {
                templateUrl : "{{ route('admin.share-ponit-access') }}",
                controller : "SharePonitAccess"
            })
            .when("/ibmAccess", {
                templateUrl : "{{ route('admin.ibm-access') }}",
                controller : "IBMaccess"
            })
            
           
        }); 
    </script>
    <script>
        app.controller('EmployeeWizard', function($scope, $http,API_URL,$rootScope, $location) {
            $rootScope.projectNameLabel;
            // $scope.FormData = {};
            $location.path('/');
            
        });
        app.directive('validFile',function(){
            return {
                require:'ngModel',
                link:function(scope,el,attrs,ngModel){
                //change event is fired when file is selected
                el.bind('change',function(){   
                    scope.$apply(function(){
                        ngModel.$setViewValue(el.val());
                        ngModel.$render(); 
                    })
                })
                }
            }
        })

        .run(function($rootScope) {
            $rootScope.employeeId = "";
        })
        
     

        app.controller('ProfileInfo', function ($scope, $http, $rootScope,$location, API_URL){
            // $location.path('/');
            $scope.PreviewImage = false;
            $scope.getEmployeId = function($http, API_URL) {
                $http.get(API_URL + "admin/getEmployeeId").then(function(response) { 
                    // alert(JSON.stringify(response.data.data))
                    if( response.data.data == 1)
                    {
                        $scope.myWelcome = "EMP1";
                    }
                    else{
                    
                        $scope.myWelcome = "EMP"+(response.data.data.id+1);
                    } 
                    
                });
            }
        $scope.image_reset = function()
        {
            $scope.PreviewImage = {};
        }
        $scope.getEmployeId($http, API_URL);
            $scope.FormData = {};

            $scope.setActive = function(){
            //   alert()
                 
                            // var id = $rootScope.employeeId;
                            url= API_URL + "admin/get-employeeData/",
                            $http({
                            method: 'GET',
                            url: url,
                            }).then(function (response) {
                                // alert(JSON.stringify(response.data.data))
                                if(response.data.data)
                                {
                                    $scope.employeeRowId =   response.data.data.id;
                                    $scope.myWelcome = response.data.data.employee_id;	
                                    $scope.FormData.epm_fname = response.data.data.first_Name;
                                    $scope.FormData.epm_lname = response.data.data.last_name;
                                    $scope.FormData.epm_username = response.data.data.user_name;
                                    $scope.FormData.epm_password = response.data.data.password;
                                    $scope.FormData.epm_job_role = response.data.data.job_role;
                                    $scope.FormData.epm_number = response.data.data.number;
                                    $scope.FormData.epm_email = response.data.data.email;
                                    $scope.FormData.image = response.data.data.image;
                                    $scope.PreviewImage = "{{ asset('/public/uploads/employees/image') }}/"+response.data.data.image;
                                }
                                else{
                                    $location.path('/');
                                }
                            }, function (error) {
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });
            }
            $scope.setActive();
                // ******* image show ******
                $scope.SelectFile = function (e) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $scope.PreviewImage = e.target.result;
                        $scope.$apply();
                    };
    
                    reader.readAsDataURL(e.target.files[0]);
                };

                $scope.phoneNumber =/^\+?\d{3}[- ]?\d{3}[- ]?\d{6}$/;
            
                $scope.getRoleData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    $http({
                        method: 'GET',
                        url: API_URL + "admin/employee-role"
                    }).then(function (response) {
                        $scope.employee_module_role = response.data.data;		
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }

                $scope.getRoleData($http, API_URL);

                $scope.submit = function (modalstate, id) {
                    var fd = new FormData();
                    var file_name  =   document.getElementById('file').files[0];
                    var num = $('#epm_number').val();
                    $scope.epm_number  = num ;
                    console.log($scope.epm_number)
                    $scope.FileValue  = file_name ;
                    fd.append('file',  $scope.FileValue);
                    fd.append('epm_id',  $scope.myWelcome);
                    fd.append('epm_fname',  $scope.FormData.epm_fname);
                    fd.append('epm_lname',  $scope.FormData.epm_lname);
                    fd.append('epm_username',  $scope.FormData.epm_username);
                    fd.append('epm_password',  $scope.FormData.epm_password);
                    fd.append('epm_job_role',  $scope.FormData.epm_job_role);
                    fd.append('number',  $scope.epm_number);
                    fd.append('email',  $scope.FormData.epm_email);
                    fd.append('employeeRowId',  $scope.employeeRowId);
                      var url = API_URL + "admin/";
                      var method = "POST";
                 
                      
                        if($scope.employeeRowId)
                        {
                            var id = $scope.employeeRowId;
                            url += "update-employee/" + id;
                        }
                        else{
                            url+="add-employee";
                        }
                      $http({
                          method: method,
                          url: url,
                          data: fd,
                          headers: { 'Content-Type': undefined},
                          transformRequest: angular.identity

                      }).then(function successCallback(response) {
                           Message('success', response.data.msg);
                           $scope.resetForm();
                           $('#file').val('');
                     
                           $location.path('/sharePonitAccess');
                           $scope.getRoleData($http, API_URL);

                      },function errorCallback(response) { 
                            Message('danger',response.data.message);
                        });
                }

                $scope.resetForm =  function() {
                    $scope.FormData = {};
                    $scope.frm.$setPristine();
                    $scope.frm.$setValidity();
                }

            });
            app.controller('SharePonitAccess', function ($scope, $http, $rootScope,$location, API_URL){

                $scope.getSharePointAcess = function($http, API_URL) {
                    
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                //    var id = $rootScope.employeeId
                var url= API_URL + "admin/get-share-point-acess";
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function (response) {
                        // alert(JSON.stringify(response.data.data))
                        $scope.sharePointAccess_module = response.data.data;
                        $scope.share_point_status=response.data.employeeData.share_access;

                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }

                $scope.getSharePointAcess($http,API_URL);

                $scope.share_point_next = function($http, API_URL){
                    $location.path('/ibmAccess');
                }
                $scope.share_point_prev = function($http, API_URL){
            
                    $location.path('/');
                }
              
                

                $scope.employee_status =function(share_point_status,dataId,field){

                    $http({
                        method: 'POST',
                        url: API_URL + "admin/share-point-acess-status",
                        data:{share_point_status:share_point_status,dataId:dataId,fieldName:field},
                    }).then(function (response) {
                        // alert(JSON.stringify(response.data.data))
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });

                }
                $scope.sharePoint_status = function(dataId){
                    
                    // $scope.sharePointAccess_module = is_active;
                    $http({
                        method: 'POST',
                        url: API_URL + "admin/employee-share-point-access-status",
                        data:{dataId:dataId},
                    }).then(function (response) {
                        // alert(JSON.stringify(response.data.data.sharePointAccess))
                        $scope.sharePointAccess_module = response.data.data.sharePointAccess;
 
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });

                }
                $scope.bim_status = function(employeeId,dataId){
                    
                    $http({
                        method: 'POST',
                        url: API_URL + "admin/employee-bim-access-status",
                        data:{employeeId:employeeId,dataId:dataId},
                    }).then(function (response) {
                        // alert(JSON.stringify(response))
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });

                }

            });


            app.controller('IBMaccess', function ($scope, $http, $rootScope,$location, API_URL){
                $scope.employeeRowId = $rootScope.employeeId;
               
                $scope.bim_point_prev = function($http, API_URL){
                    $location.path('/sharePonitAccess');
                }
               
            });

       
        window.onbeforeunload = function(e) {
            var dialogText = 'We are saving the status of your listing. Are you realy sure you want to leave?';
            e.returnValue = dialogText;
            return dialogText;
        }; 
    </script>
@endpush