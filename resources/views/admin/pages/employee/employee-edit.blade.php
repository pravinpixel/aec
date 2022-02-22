     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page">
        <div class="content">

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater') 
            </div>    
            <div class="card border">
               
               <div class="card-body pt-0 pb-0">
                              
                   <div id="rootwizard"  ng-controller="EmployeeWizard">
                       <ul class="nav nav-pills nav-justified form-wizard-header bg-light ">
                           <li class="nav-item projectInfoForm"  data-target-form="#projectInfoForm"  style="pointer-events:none">
                               <a href="#/" style="min-height: 40px;" class="timeline-step" id="project-info" style="pointer-events:none">
                                   <div class="timeline-content">
                                       <div class="inner-circle  bg-success profile-info">
                                           <i class="fa fa-project-diagram fa-2x "></i>
                                       </div>       
                                       <div class="text-end d-none d-sm-inline mt-2">Profile Information</div>                                                                 
                                   </div> 
                               </a>
                           </li>
                           <li class="nav-item serviceSelection" data-target-form="#serviceSelection" style="pointer-events:none" >
                               <a href="#/editSharePonitAccess" style="min-height: 40px;" class="timeline-step" id="service" >
                                   <div class="timeline-content">
                                       <div class="inner-circle  bg-secondary share-point">
                                           <i class="fa fa-list-alt fa-2x mb-1"></i>
                                       </div>        
                                       <span class="d-none d-sm-inline mt-2">share Point Access</span>                                                                
                                   </div>
                                   
                               </a>
                           </li>
                           <li class="nav-item IFCModelUpload" data-target-form="#IFCModelUpload"   style="pointer-events:none">
                               <a href="#/editIbmAccess" style="min-height: 40px;" class="timeline-step" id="ifc-model-upload" >
                                   <div class="timeline-content">
                                       <div class="inner-circle  bg-secondary ibm-access">
                                           <i class="fa fa-2x fa-file-upload mb-1"></i>
                                       </div>                                                                        
                                       <span class="d-none d-sm-inline mt-2">BIM 360 Access</span>
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

          
            
        </div> <!-- content -->


    </div> 
    <!-- ng-disabled="frm.$invalid"  -->
@endsection
          
@push('custom-styles')
    <style>
        .table tbody tr td {
            padding: 5px !important
        }
        .help-inline {
            position: absolute !important;
            font-size: 12px;
            right: 0;
        }
        .mb-3 {
            position: relative;
        }
        
    
    .error {
      color: red;
    }

    .red-text{
  color:red;
}
  
        
    </style>
@endpush

@push('custom-scripts')
   
 
    <script>
         app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl : "{{ route('admin.edit-profile-information') }}",
                controller : "EditProfileInfo"
            })
            .when("/editSharePonitAccess", {
                templateUrl : "{{ route('admin.edit-share-ponit-access') }}",
                controller : "EditSharePonitAccess"
            })
            .when("/editIbmAccess", {
                templateUrl : "{{ route('admin.edit-ibm-access') }}",
                controller : "EditIBMaccess"
            })
            
           
        }); 
    </script>
    <script>
     $( document ).ready(function() {
        
        $("#frm").validate({
            
            

            rules: {
                'epm_fname': {
                    required: true,
                    maxlength: 50
                },
                'epm_lname': {
                    required: true,
                    maxlength: 50
                },
                
                'epm_username': {
                    required: true,
                },
                'epm_password': {
                    required: true,
                },
                'epm_job_role': {
                    required: true,
                },
                'epm_number': {
                    required: true,
                    minlength:8,
                    maxlength:12,
                },
                'epm_email': {
                    required: true,                        
                },
                
            },
        
        
    }); 
});
</script>
    <script>
        // var app = angular.module('AppSale', []).constant('API_URL', $("#baseurl").val()); 
        app.controller('EmployeeWizard', function($scope, $http,$rootScope, $location) {
            $rootScope.projectNameLabel;
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
        
     

        app.controller('EditProfileInfo', function ($scope, $http, $rootScope,$location, API_URL){

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

                $scope.callEmployee = () =>  {
          
                    var id = {{ $id }} ;
                        // alert(id) 
                        $http({
                        method: 'GET',
                        url: API_URL + "admin/get-editEmployee/" + id,
                    }).then(function(res){
                //    alert(JSON.stringify(res.data.data))
                        $scope.EmpData = res.data.data;

                        console.log($scope.EmpData);
                        
                    });
                },
                $scope.callEmployee ();

               

                $scope.getRoleData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    $http({
                        method: 'GET',
                        url: API_URL + "admin/employee-role"
                    }).then(function (response) {
                        // alert(JSON.stringify(response))
                        $scope.employee_module_role = response.data.data;		
                        // $scope.employee_module.epm_id = response.data.data.emp_id.id;
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }

                $scope.getRoleData($http, API_URL);

            $scope.update = function (modalstate, id) {
                if(!$("#frm").valid()){

                    return false;

                    }
                var fd = new FormData();
                var file_name  =   document.getElementById('file').files[0];
                var num = $('#epm_number').val();
                var epm_id = $('#epm_id').val();
                var id = $('#key').val();
                var job_role = $('#epm_job_role').val();
                var epm_fname = $('#epm_fname').val();
                var epm_lname = $('#epm_lname').val();
                var epm_username = $('#epm_username').val();
                var epm_password = $('#epm_password').val();
                var epm_email = $('#epm_email').val();
                $scope.epm_number  = num;
                $scope.epm_id  = epm_id;
                $scope.epm_fname  = epm_fname;
                $scope.epm_lname  = epm_lname;
                $scope.epm_username  = epm_username;
                $scope.epm_password  = epm_password;
                $scope.epm_email  = epm_email;
                $scope.FileValue  = file_name;
                $scope.job_role  = job_role;
                console.log($scope.epm_number)
                fd.append('file',  $scope.FileValue);
                fd.append('epm_id',  $scope.epm_id);
                fd.append('epm_fname', $scope.epm_fname);
                fd.append('epm_lname',  $scope.epm_lname);
                fd.append('epm_username', $scope.epm_username);
                fd.append('epm_password',   $scope.epm_password);
                fd.append('epm_job_role',  $scope.job_role);
                fd.append('number',  $scope.epm_number);
                fd.append('email',  $scope.epm_email);

                var url = API_URL + "admin/";
                    // var id = key;
                    console.log(id)
			        if (id) {
                    
			            url += "update-employee/" + id;
			            method = "POST";
                        console.log(fd)
                        // alert(JSON.stringify($scope.data))
						$http({
							method: method,
							url: url,
							data: fd,
                             headers: { 'Content-Type': undefined},
                            transformRequest: angular.identity

						}).then(function successCallback(response) {
                            Message('success',response.data.msg);
							//  alert(JSON.stringify(response.data.data))
                            $location.path('/editSharePonitAccess');
                            $scope.resetForm();

						},function errorCallback(response) {
                            Message('danger',response.data.message);
                        });

			        }
			        
			}
           
                    $scope.resetForm =  function() {
                        $scope.FormData = {};
                        $scope.frm.$setPristine();
                        $scope.frm.$setValidity();
                    }

        });
            app.controller('EditSharePonitAccess', function ($scope, $http, $rootScope,$location, API_URL){

                $scope.getSharePointAcess = function($http, API_URL) {
                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    $http({
                        method: 'GET',
                        url: API_URL + "admin/get-edit-share-point-acess"
                    }).then(function (response) {
                        // alert(JSON.stringify(response.data.data.employeeDetail.share_access))
                        $scope.sharePointFolder = response.data.data;
                        $scope.share_access = response.data.employeeData.share_access;
                        
                        
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }

                $scope.getSharePointAcess($http,API_URL);

                $scope.employee_status =function(share_access,dataId,field){
                    $http({
                        method: 'POST',
                        url: API_URL + "admin/share-point-acess-status",
                        data:{share_point_status:share_access,dataId:dataId,fieldName:field},
                    }).then(function (response) {  
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });

                }
                $scope.sharePoint_status = function(dataId){
                    
                    
                    $http({
                        method: 'POST',
                        url: API_URL + "admin/employee-share-point-access-status",
                        data:{dataId:dataId},
                    }).then(function (response) {
                        // alert(JSON.stringify(response)) 
                        $scope.sharePointFolder = response.data.data.sharePointAccess;
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
                $scope.edit_share_point_prev = function($http, API_URL){
                    $location.path('/');
                }
                $scope.edit_share_point_next = function($http, API_URL){
                    $location.path('/editIbmAccess');
                }

            });

            app.controller('EditIBMaccess', function ($scope, $http, $rootScope,$location, API_URL){
                $scope.bim_point_prev = function($http, API_URL){
                    $location.path('/editSharePonitAccess');
                }
            });

       
        window.onbeforeunload = function(e) {
            var dialogText = 'We are saving the status of your listing. Are you realy sure you want to leave?';
            e.returnValue = dialogText;
            return dialogText;
        };
             



    </script>
@endpush