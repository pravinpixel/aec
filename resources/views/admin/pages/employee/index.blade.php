     
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
                              
                   <div id="rootwizard" >
                       <ul class="nav nav-pills nav-justified form-wizard-header bg-light ">
                           <li class="nav-item projectInfoForm"  data-target-form="#projectInfoForm">
                               <a href="#/" style="min-height: 40px;" class="timeline-step" id="project-info" style="pointer-events:none">
                                   <div class="timeline-content">
                                       <div class="inner-circle  bg-success">
                                           <i class="fa fa-project-diagram fa-2x "></i>
                                       </div>       
                                       <div class="text-end d-none d-sm-inline mt-2">Profile Information</div>                                                                 
                                   </div> 
                               </a>
                           </li>
                           <li class="nav-item serviceSelection" data-target-form="#serviceSelection"  style="pointer-events:none">
                               <a href="#/sharePonitAccess" style="min-height: 40px;" class="timeline-step" id="service" >
                                   <div class="timeline-content">
                                       <div class="inner-circle  bg-secondary">
                                           <i class="fa fa-list-alt fa-2x mb-1"></i>
                                       </div>        
                                       <span class="d-none d-sm-inline mt-2">share Point Access</span>                                                                
                                   </div>
                                   
                               </a>
                           </li>
                           <li class="nav-item IFCModelUpload" data-target-form="#IFCModelUpload"   style="pointer-events:none">
                               <a href="#/ibmAccess" style="min-height: 40px;" class="timeline-step" id="ifc-model-upload" >
                                   <div class="timeline-content">
                                       <div class="inner-circle  bg-secondary">
                                           <i class="fa fa-2x fa-file-upload mb-1"></i>
                                       </div>                                                                        
                                       <span class="d-none d-sm-inline mt-2">IBM 360 Access</span>
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
    {{-- <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> 
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
        // var app = angular.module('AppSale', []).constant('API_URL', $("#baseurl").val()); 

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

        app.controller('ProfileInfo', function ($scope, $http, $rootScope, API_URL){
            
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
                $scope.getEmployeId($http, API_URL);

                $scope.getRoleData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                    // http://localhost/AEC_PREFAB/aec/module?page=1
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
                    fd.append('epm_number',  $scope.epm_number);
                    fd.append('epm_email',  $scope.FormData.epm_email);
                    // console.log($scope.FormData.epm_number)
                        // alert(JSON.stringify($scope.FileValue))
                    // console.log(document.getElementById('file').files[0]);
                      var url = API_URL + "admin/";
                      var method = "POST";
                 
                      url+="add-employee";
                      $http({
                          method: method,
                          url: url,
                          data: fd,
                          headers: { 'Content-Type': undefined},
                          transformRequest: angular.identity

                      }).then(function (response) {
                       
                           Message('success', response.data.msg);
                           $scope.resetForm();
                        
                           $('#file').val('');
                           $scope.getEmployeId($http, API_URL);
                          getRoleData($http, API_URL);
                          getEmployeeData($http, API_URL);

                      }), (function (error) {
                          console.log(error);
                          console.log('This is embarassing. An error has occurred. Please check the log for details');
                      });  
                }
                    $scope.resetForm =  function() {
                        $scope.FormData = {};
                        $scope.frm.$setPristine();
                        $scope.frm.$setValidity();
                        // $scope.frm.$setUntouched();
                    }

            });
        

        app.controller('SalesController', function ($scope, $http, $rootScope,API_URL) { 
  
            
         
            
        
            //save new record and update existing record
            $scope.save = function (modalstate, id) {

                $scope.day = new Date();

                $scope.data = {
                    company_name    :   $scope.module.company_name, 
                    contact_person  :   $scope.module.contact_person,
                    mobile_no       :   $scope.module.mobile_number,
                    email           :   $scope.module.email,
                    user_name       :   $scope.module.user_name,
                    enquiry_number  :   $scope.myWelcome,
                    remarks         :   $scope.module.remarks
                }
  
                $http({
                    method: "POST",
                    url: API_URL + "admin/enquiry",
                    // data: $.param($scope.module),
                    data: $.param($scope.data),
                    headers: { 
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function (response) {
                    // $scope.getItems();

                    $scope.module = {};
                    $scope.frm.$setPristine();
                     
                    if(response.data.errors) {
                        Message('success',response.data.errors);
                    }
                    Message('success',response.data.msg);

                }), (function (error) { 
                    console.log(error); 
                }); 
            }  
        }); 
       
            
             
        Message = function (type, head) {
            $.toast({
                heading: head,
                icon: type,
                showHideTransition: 'plain', 
                allowToastClose: true,
                hideAfter: 5000,
                stack: 10, 
                position: 'bootom-left',
                textAlign: 'left', 
                loader: true, 
                loaderBg: '#252525',                
            });
        }


    </script>
@endpush