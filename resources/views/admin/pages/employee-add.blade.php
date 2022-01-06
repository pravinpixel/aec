     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page" ng-app="AppSale">
        <div class="content" ng-controller="SalesController">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater') 
            </div>                

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow-lg mb-0">
                        <div class="card-body p-4">
                            <form class="needs-validations"  novalidate name="frm"  >
                                
                                <div class="row m-0">
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label"  >Enquiry Number  <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text" ng-value="myWelcome" value="/@{$data[employee_id]}" class="form-control"  ng-required="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                        
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >First name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control"  name="epm_fname" id="validationCustom02"  value=""   ng-model="FormData.epm_fname" placeholder="Type Here..." ng-required="true">
                                        </div>
                                    </div>
                                    
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Last name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="epm_lname" id="validationCustom02" ng-minlength="1" ng-model="FormData.epm_lname" placeholder="Type Here..." ng-required="true">
                                        </div>
                                    </div>  
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Username<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" id="validationCustom01" name="epm_username" ng-model="FormData.epm_username" placeholder="Type Here..."  ng-required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Password<sup class="text-danger">*</sup></label>
                                            <input type="password" class="form-control" name="epm_password" id="validationCustom02" ng-model="FormData.epm_password" placeholder="Type Here..."  ng-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Job Role<sup class="text-danger">*</sup></label>
                                            <select  class="form-select"  ng-model="FormData.epm_job_role" name="epm_job_role" id="validationCustom02"   ng-required="true">
                                                        <option value="" selected>Select</option>
                                                        
                                                    <option value="@{{ emp.role }}"  ng-repeat="(index,emp) in employee_module_role">@{{ emp.role }}</option>
                                                        
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Mobile Number<sup class="text-danger">*</sup></label>


                                        <input type="number" class="form-control epm_number" ng-pattern="phoneNumber"  name="epm_number" id="epm_number" ng-model="FormData.epm_number" ng-minlength="12" placeholder="Type Here..."  ng-required="true">
                                        <span class="red-text" ng-if="frm.epm_number.$error.required && frm.epm_number.$dirty">Contact number is a required field</span>
                                        <span class="red-text" ng-show="frm.epm_number.$error.pattern">Please enter a 12 digit number</span>
                                            <!-- <span class="error" ng-show="frm.epm_number.$error.minlength">Enter Valid Phone Number.</span>
                                            <span class="error" ng-show="frm.epm_number.$error.maxlength">Enter Valid Phone Number.</span>
                                            <br><span class="error" ng-show="frm.epm_number.$error.pattern">Enter Valid Phone Number.</span> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Email Id<sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control" name="epm_email" id="validationCustom02" ng-model="FormData.epm_email" placeholder="Type Here..."  ng-required="true">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Image<sup class="text-danger">*</sup></label>
                                            <label for="files">Select Image File</label>
                                            <input type="file" class="form-control" id="file" ng-model="FormData.file" name="file" />
                                        </div>
                                    </div>


                                <div class="text-end mt-3">
                                    <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                    <button ng-click="submit(modalstate, id);" ng-disabled="frm.$invalid" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Send </button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> 
    <script>

        
    
// $( document ).ready(function() {
        
//         $("#employeeForm").validate({
            
            

//             rules: {
//                 'enquiry_date': {
//                     required: true,
//                     maxlength: 50
//                 },
//                 'epm_fname': {
//                     required: true,
//                     maxlength: 50
//                 },
                
//                 'epm_lname': {
//                     required: true,
//                 },
//                 'epm_username': {
//                     required: true,
//                 },
//                 'epm_password': {
//                     required: true,
//                 },
//                 'epm_job_role': {
//                     required: true,                        
//                 },
//                 'epm_number': {
//                     required: true, 
//                     maxlength: 12,
//                     minlength:9,               
//                 },
//                 'epm_email': {
//                     required: true,                        
//                 },
//                 'file': {
//                     required: true,                        
//                 },
                
//             },
//             // messages: {

//             //     'enquiry_date': {
//             //         required: "Please enter Date",
//             //     },
//             //     'contact': {
//             //         required: "Please enter Title",
//             //     },
//             //     'addmore[0][component]': {
//             //         required: "Please enter value1",
//             //     },
//             //     'addmore[0][type]': {
//             //         required: "Please enter value1",
//             //     },

//             // },
        
        
//     }); 
// });



        var app = angular.module('AppSale', []).constant('API_URL', $("#baseurl").val()); 

        app.controller('SalesController', function ($scope, $http, $rootScope,API_URL) { 
  
            getEmployeId = function($http, API_URL) {
               
               $http.get(API_URL + "admin/getEmployeeId").then(function(response) {

                
                   if( response.data.data == 1)
                   {
                    $scope.myWelcome = "EMP1";
                   }
                   else{
                    $scope.myWelcome = "EMP"+(response.data.data.id+1);
                   }
                  
               
                
                  
               });
           }
           getEmployeId($http, API_URL);
           $scope.phoneNumber =/^\+?\d{2}[- ]?\d{3}[- ]?\d{5}$/;
    
        //    $scope.ph_numbr = /^\+?\d{2}[- ]?\d{3}[- ]?\d{5}$/;
           getEmployeeData = function($http, API_URL) {

            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
            // http://localhost/AEC_PREFAB/aec/module?page=1
            $http({
                method: 'GET',
                url: API_URL + "admin/get_employee"
            }).then(function (response) {
            
                $scope.employee_module = response.data.data;		
                
            }, function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
            }
            getEmployeeData($http, API_URL);
            
            getRoleData = function($http, API_URL) {

            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
            // http://localhost/AEC_PREFAB/aec/module?page=1
            $http({
                method: 'GET',
                url: API_URL + "admin/employee_role"
            }).then(function (response) {
                // alert(JSON.stringify(response))
                $scope.employee_module_role = response.data.data;		
                // $scope.employee_module.epm_id = response.data.data.emp_id.id;
            }, function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
            }


            getRoleData($http, API_URL);

            // $scope.getItems();


       
                
                // $scope.uploadFile = function(files) {
                    
                //     var fd = new FormData();
                //    fd.append("file", files[0]);
                //    console.log(files);
                // }
                // var fd = new FormData();
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
                   
                        url+="add_employee";

                            // $scope.data = {
                                
                            //     epm_id          :   $scope.myWelcome,
                            //     epm_fname       :   $scope.FormData.epm_fname,
                            //     epm_lname       :   $scope.FormData.epm_lname,
                            //     epm_username    :   $scope.FormData.epm_username,
                            //     epm_password    :   $scope.FormData.epm_password,
                            //     epm_job_role    :   $scope.FormData.epm_job_role,
                            //     epm_number      :   $scope.FormData.epm_number,
                            //     epm_email       :   $scope.FormData.epm_email,
                            //     files           :   $scope.FileValue,

                            // }
                            // console.log($scope.data)
						$http({
							method: method,
							url: url,
							data: fd,
                             headers: { 'Content-Type': undefined},
                            transformRequest: angular.identity

						}).then(function (response) {
							 alert(JSON.stringify(response))
                             Message('success', response.data.msg);
                             $scope.resetForm();
                            //  $('.epm_number').val('');
                             $('#file').val('');
                            getEmployeId($http, API_URL);
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
                    $scope.frm.$setUntouched();
                }
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