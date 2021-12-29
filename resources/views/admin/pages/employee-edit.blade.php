     
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
                            <input  ng-model="FormData.key" name="key" id="key" type="hidden" >
                                <div class="row m-0">
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label"  >Enquiry ID <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text"  name="epm_id" id="epm_id"  ng-model="FormData.epm_id"   class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                        
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >First name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control"  name="epm_fname" id="validationCustom02"  value=""   ng-model="FormData.epm_fname" placeholder="Type Here..."ng-required="true">
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
                                            <input type="text" class="form-control" name="epm_password" id="validationCustom02" ng-model="FormData.epm_password" placeholder="Type Here..."  ng-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Job Role<sup class="text-danger">*</sup></label>
                                            <select  class="form-control"  ng-model="FormData.epm_job_role" name="epm_job_role" id="validationCustom02"   ng-required="true">
                                                        <option value="" selected>Select</option>
                                                        
                                                            <option value="@{{ emp.role }}"  ng-repeat="(index,emp) in employee_module_role">@{{ emp.role }}</option>
                                                        
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Mobile Number<sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="epm_number" id="validationCustom02" ng-model="FormData.epm_number" placeholder="Type Here..."  ng-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Email Id<sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control" name="epm_email" id="validationCustom02" ng-model="FormData.epm_email" placeholder="Type Here..."  ng-required="true">
                                        </div>
                                    </div>
                                 
                                </div>
                                <div class="text-end mt-3">
                                    <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                    <button ng-disabled="frm.$invalid" ng-click="update(modalstate, id);"  class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Send </button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div> <!-- content -->


    </div> 
      
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
        
        
        
    </style>
@endpush

@push('custom-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> 
    <script>
        var app = angular.module('AppSale', []).constant('API_URL', $("#baseurl").val()); 

        app.controller('SalesController', function ($scope, $http, API_URL) { 
           
  
            
        //    getEmployeId($http, API_URL);
           $scope.callEmployee = () =>  {
          
            var id = {{ $id }} ;
            
                // alert(id) 
                $http({
                method: 'GET',
                url: API_URL + "admin/get_EditEmployee/" + id,
            }).then(function(res){

                alert(JSON.stringify(res.data.data))
                // $scope.FormData = res.data.data;
                    $scope.FormData = {
                        key:res.data.data.id,
                        epm_id  :   res.data.data.employee_id,
                        epm_fname  :  res.data.data.first_Name,
                        epm_lname       :  res.data.data.last_name,
                        epm_username           :  res.data.data.user_name,
                        epm_password       :  res.data.data.password,
                        epm_job_role         :  res.data.data.job_role,
                        epm_number       :  Number(res.data.data.number),
                        epm_email  :  res.data.data.email,
                }
               
                });

                
                
           
            },
            $scope.callEmployee ();
          
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


            
            $scope.update = function (modalstate, id) {
			        var url = API_URL + "admin/";
			        var method = "POST";
                    alert($scope.FormData.key)
                    var id = $scope.FormData.key;
			        //append module id to the URL if the form is in edit mode
			        if ($scope.FormData.key) {
			            url += "update_employee/" + id;
                        // alert(url)
			            method = "PUT";
                        $scope.data = {
                                
                                epm_id  :   $scope.FormData.epm_id,
                                epm_fname  :   $scope.FormData.epm_fname,
                                epm_lname       :   $scope.FormData.epm_lname,
                                epm_username           :   $scope.FormData.epm_username,
                                epm_password       :   $scope.FormData.epm_password,
                                epm_job_role         :   $scope.FormData.epm_job_role,
                                epm_number       :   $scope.FormData.epm_number,
                                epm_email  :   $scope.FormData.epm_email,
                                // epm_image :f,
                                
                            }
                        alert(JSON.stringify($scope.data))
						$http({
							method: method,
							url: url,
							data: $.param($scope.data),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
                            window.location.href = API_URL +"admin/admin-employee-control-view";
							// getData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-header-modal').modal('hide');

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }
			        
			    }

            $scope.submit = function (modalstate, id) {
					
			        var url = API_URL + "admin/";
			        var method = "POST";
                    // alert(image_emp)
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "update_role/" + id;
                        // alert(url)
			            method = "POST";
                        // alert(url)
						$http({
							method: method,
							url: url,
							data: $.param($scope.module),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
							getData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-header-modal').modal('hide');

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {
                       
                        url+="add_employee";
                       
                        // alert(JSON.stringify(fd))
                        
                                $scope.data = {
                                
                                epm_id  :   $scope.myWelcome,
                                epm_fname  :   $scope.FormData.epm_fname,
                                epm_lname       :   $scope.FormData.epm_lname,
                                epm_username           :   $scope.FormData.epm_username,
                                epm_password       :   $scope.FormData.epm_password,
                                epm_job_role         :   $scope.FormData.epm_job_role,
                                epm_number       :   $scope.FormData.epm_number,
                                epm_email  :   $scope.FormData.epm_email,
                                // epm_image :f,
                                
                            }
                      
						$http({
							method: method,
							url: url,
							data: $.param($scope.data),
                            
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							//  alert(JSON.stringify(response))
							getData($http, API_URL);
                            // getEmployeId($http, API_URL);
                            getRoleData($http, API_URL);
                            getEmployeeData($http, API_URL);
                            $("#employee_module").trigger("reset");
							//location.reload();
                            $scope.resetForm();
                            Message('success', response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
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


        // $scope.resetForm =  function() {
        //             $scope.FormData = {};
        //             $scope.frm.$setPristine();
        //             $scope.frm.$setValidity();
        //             $scope.frm.$setUntouched();
        //         }
    </script>
@endpush