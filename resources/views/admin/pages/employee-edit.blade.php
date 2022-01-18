     
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
                            <form class="needs-validations"  novalidate name="frm" id="frm"  >
                            <input  ng-model="FormData.key" name="key" ng-value="EmpData.id" value="EmpData.id"  ng-model="FormData.id" id="key" type="hidden" >
                                <div class="row m-0">
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label"  >Enquiry ID <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text"  name="epm_id" id="epm_id" ng-value="EmpData.employee_id"  ng-model="FormData.epm_id" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                        
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >First name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control"  name="epm_fname" id="epm_fname"   ng-value="EmpData.first_Name"   ng-model="FormData.epm_fname" placeholder="Type Here..."ng-required="true">
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_fname.$touched && frm.epm_fname.$error.required">This field is required!</small> 
                                            </div> -->
                                        </div>
                                    </div>
                                    
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Last name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="epm_lname" id="epm_lname" ng-minlength="1"  ng-value="EmpData.last_name"  ng-model="FormData.epm_lname" placeholder="Type Here..." ng-required="true">
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_lname.$touched && frm.epm_lname.$error.required">This field is required!</small> 
                                            </div> -->
                                        </div>
                                    </div>  
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Username<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" id="epm_username" name="epm_username"  ng-value="EmpData.user_name"  ng-model="FormData.epm_username" placeholder="Type Here..."  ng-required="true">
                                                <!-- <div class="error-msg">
                                                    <small class="error-text" ng-if="frm.epm_username.$touched && frm.epm_username.$error.required">This field is required!</small> 
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Password<sup class="text-danger">*</sup></label>
                                            <input type="password" class="form-control" name="epm_password" id="epm_password"  ng-value="EmpData.password"  ng-model="FormData.epm_password" placeholder="Type Here..."  ng-required="true">
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_password.$touched && frm.epm_password.$error.required">This field is required!</small> 
                                            </div> -->
                                        </div>
                                    </div>


                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label class="form-label" >Job Role<sup class="text-danger">*</sup></label>
                                    
                                    <select aria-label="ngSelected demo" ng-model="EmpData.job_role" name="epm_job_role" id="epm_job_role"  class="form-select">
                                        <!-- <option value="@{{ EmpData.job_role}}"   selected>@{{EmpData.job_role}}</option> -->
                                        <option value="@{{ emp.role }}" ng-repeat="(index,emp) in employee_module_role">@{{ emp.role }}</option>
                                    </select>
                                    <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_job_role.$touched && frm.epm_job_role.$error.required">This field is required!</small> 
                                    </div> -->

                                </div>
                            </div>



                            <!-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" >Job Role<sup class="text-danger">*</sup></label>
                                        <select  class="form-control"  ng-model="FormData.epm_job_role" name="epm_job_role" id="validationCustom02"   ng-required="true">
                                            <option value="" selected>Select</option>
                                            
                                            <option value="@{{ emp.role }}"  ng-repeat="(index,emp) in employee_module_role">@{{ emp.role }}</option>

                                        </select>
                                </div>
                            </div> -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Mobile Number<sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="epm_number" min="8" id="epm_number"  ng-value="EmpData.number"  ng-model="FormData.epm_number" placeholder="Type Here..."  ng-required="true">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Email Id<sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control" name="epm_email" id="epm_email"  ng-value="EmpData.email"  ng-model="FormData.epm_email" placeholder="Type Here..."  ng-required="true">
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_email.$touched && frm.epm_email.$error.required">This field is required!</small> 
                                                <small class="error-text" ng-if="frm.epm_email.$touched && frm.epm_email.$error.email">Please enter valid email!</small> 
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3"> 
                                            <img src="{{ asset('/public/image/') }}/@{{EmpData.image}}" width="60px">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                       
                                        <div class="mb-3">
                                            <label class="form-label" >Image<sup class="text-danger">*</sup></label>
                                            <label for="files">Select Image File</label>
                                            <input type="file" class="form-control" id="file" ng-model="FormData.file" name="file" />
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.file.$touched && frm.file.$error.required">This field is required!</small>
                                            </div>   -->
                                        </div>
                                    </div>
                                 
                                </div>
                                <div class="text-end mt-3">
                                    <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                    <button  ng-click="update(modalstate, id);"  class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Send </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
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
        //     errorPlacement: function (error, element) {
        //     console.log('dd', element.attr("name"))
            
        //         error.appendTo(".error-msg");
            
        // },
        // errorPlacement: function (error, element) {
        //     console.log('dd', element.attr("name"))
        //     if (element.attr("name") == "epm_fname") {
        //         error.appendTo(".error-msg");
        //     } else {
        //         error.insertAfter(element)
        //     }
        // },
            // messages: {

            //     'enquiry_date': {
            //         required: "Please enter Date",
            //     },
            //     'contact': {
            //         required: "Please enter Title",
            //     },
            //     'addmore[0][component]': {
            //         required: "Please enter value1",
            //     },
            //     'addmore[0][type]': {
            //         required: "Please enter value1",
            //     },
            //     'addmore[0][complexity]': {
            //         required: "Please enter value",
            //     },
            //     'addmore[0][sqm]': {
            //         required: "Please enter value",
            //     },
            //     'addmore[0][complexity]': {
            //         required: "Please enter value",
            //     },
            //     'addmore[0][detail_price]': {
            //         required: "Please enter value",
            //     },
            //     'addmore[0][detail_sum]': {
            //         required: "Please enter sum",
            //     },
            //     'addmore[0][statistic_price]': {
            //         required: "Please enter value",
            //     },
            //     'addmore[0][statistic_sum]': {
            //         required: "Please enter sum",
            //     },
            //     'addmore[0][cad_cam_price]': {
            //         required: "Please enter value",
            //     },
            //     'addmore[0][cad_cam_sum]': {
            //         required: "Please enter sum",
            //     },
            //     'addmore[0][logistic_price]': {
            //         required: "Please enter value",
            //     },
            //     'addmore[0][logistic_sum]': {
            //         required: "Please enter sum",
            //     },
            //     'addmore[0][total_price]': {
            //         required: "Please value",
            //     },
            //     'addmore[0][total_sum]': {
            //         required: "Please enter sum",
            //     },
                
                
                

            // },
        
        
    }); 
});
</script>

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
               
                    $scope.EmpData =    res.data.data

                    console.log($scope.EmpData);
                    
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
                // alert(epm_fname)
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
                // alert( $scope.FileValue)
                fd.append('file',  $scope.FileValue);
                fd.append('epm_id',  $scope.epm_id);
                fd.append('epm_fname', $scope.epm_fname);
                fd.append('epm_lname',  $scope.epm_lname);
                fd.append('epm_username', $scope.epm_username);
                fd.append('epm_password',   $scope.epm_password);
                fd.append('epm_job_role',  $scope.job_role);
                fd.append('epm_number',  $scope.epm_number);
                fd.append('epm_email',  $scope.epm_email);

                var url = API_URL + "admin/";
                    // var id = key;
                    console.log(id)
			        if (id) {
                    
			            url += "update_employee/" + id;
                        // alert(url)
			            method = "POST";
                        console.log(fd)
                        // alert(JSON.stringify($scope.data))
						$http({
							method: method,
							url: url,
							data: fd,
                             headers: { 'Content-Type': undefined},
                            transformRequest: angular.identity

						}).then(function (response) {
                            Message('success',response.data.msg);
							//  alert(JSON.stringify(response))
                            window.location.href = API_URL +"admin/admin-employee-control-view";
							// getData($http, API_URL);
                            $scope.resetForm();
							    $('#primary-header-modal').modal('hide');

                                // Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }
			        
			    }
            
                // $scope.update = function (modalstate, id) {
			    //     var url = API_URL + "admin/";
			    //     var method = "POST";
                //     // alert($scope.FormData.epm_number)
                //     var id = $scope.FormData.key;
			    //     //append module id to the URL if the form is in edit mode
			    //     if ($scope.FormData.key) {
			    //         url += "update_employee/" + id;
                //         // alert(url)
			    //         method = "PUT";
                //         $scope.data = {
                                
                //                 epm_id  :   $scope.FormData.epm_id,
                //                 epm_fname  :   $scope.FormData.epm_fname,
                //                 epm_lname       :   $scope.FormData.epm_lname,
                //                 epm_username           :   $scope.FormData.epm_username,
                //                 epm_password       :   $scope.FormData.epm_password,
                //                 epm_job_role         :   $scope.FormData.epm_job_role,
                //                 epm_number       :   $scope.FormData.epm_number,
                //                 epm_email  :   $scope.FormData.epm_email,
                //                 // epm_image :f,
                                
                //             }
                //         // alert(JSON.stringify($scope.data))
				// 		$http({
				// 			method: method,
				// 			url: url,
				// 			data: $.param($scope.data),
				// 			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

				// 		}).then(function (response) {
							 
                //             window.location.href = API_URL +"admin/admin-employee-control-view";
				// 			// getData($http, API_URL);
                //             $scope.resetForm();
				// 			    $('#primary-header-modal').modal('hide');

                //                 Message('success',response.data.msg);

				// 		}), (function (error) {
				// 			console.log(error);
				// 			console.log('This is embarassing. An error has occurred. Please check the log for details');
				// 		});

			    //     }
			        
			    // }

            // $scope.submit = function (modalstate, id) {
					
			//         var url = API_URL + "admin/";
			//         var method = "POST";
            //         // alert(image_emp)
			//         //append module id to the URL if the form is in edit mode
			//         if (modalstate === 'edit') {
			//             url += "update_role/" + id;
            //             // alert(url)
			//             method = "POST";
            //             // alert(url)
			// 			$http({
			// 				method: method,
			// 				url: url,
			// 				data: $.param($scope.module),
			// 				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

			// 			}).then(function (response) {
							 
			// 				getData($http, API_URL);
            //                 $scope.resetForm();
			// 				    $('#primary-header-modal').modal('hide');

            //                     Message('success',response.data.msg);

			// 			}), (function (error) {
			// 				console.log(error);
			// 				console.log('This is embarassing. An error has occurred. Please check the log for details');
			// 			});

			//         }else {
                       
            //             url+="add_employee";
                       
            //             // alert(JSON.stringify(fd))
                        
            //                     $scope.data = {
                                
            //                     epm_id  :   $scope.myWelcome,
            //                     epm_fname  :   $scope.FormData.epm_fname,
            //                     epm_lname       :   $scope.FormData.epm_lname,
            //                     epm_username           :   $scope.FormData.epm_username,
            //                     epm_password       :   $scope.FormData.epm_password,
            //                     epm_job_role         :   $scope.FormData.epm_job_role,
            //                     epm_number       :   $scope.FormData.epm_number,
            //                     epm_email  :   $scope.FormData.epm_email,
            //                     // epm_image :f,
                                
            //                 }
                      
			// 			$http({
			// 				method: method,
			// 				url: url,
			// 				data: $.param($scope.data),
                            
			// 				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

			// 			}).then(function (response) {
			// 				//  alert(JSON.stringify(response))
			// 				getData($http, API_URL);
            //                 // getEmployeId($http, API_URL);
            //                 getRoleData($http, API_URL);
            //                 getEmployeeData($http, API_URL);
            //                 $("#employee_module").trigger("reset");
			// 				//location.reload();
            //                 $scope.resetForm();
            //                 Message('success', response.data.msg);

			// 			}), (function (error) {
			// 				console.log(error);
			// 				console.log('This is embarassing. An error has occurred. Please check the log for details');
			// 			});
			// 		}
			        
			//     }

            //save new record and update existing record
            // $scope.save = function (modalstate, id) {

            //     $scope.day = new Date();

            //     $scope.data = {
            //         company_name    :   $scope.module.company_name, 
            //         contact_person  :   $scope.module.contact_person,
            //         mobile_no       :   $scope.module.mobile_number,
            //         email           :   $scope.module.email,
            //         user_name       :   $scope.module.user_name,
            //         enquiry_number  :   $scope.myWelcome,
            //         remarks         :   $scope.module.remarks
            //     }
  
            //     $http({
            //         method: "POST",
            //         url: API_URL + "admin/enquiry",
            //         // data: $.param($scope.module),
            //         data: $.param($scope.data),
            //         headers: { 
            //             'Content-Type': 'application/x-www-form-urlencoded' 
            //         }
            //     }).then(function (response) {
            //         // $scope.getItems();

            //         $scope.module = {};
            //         $scope.frm.$setPristine();
                     
            //         if(response.data.errors) {
            //             Message('success',response.data.errors);
            //         }
            //         Message('success',response.data.msg);

            //     }), (function (error) { 
            //         console.log(error); 
            //     }); 
            // }  
            $scope.resetForm =  function() {
                    $scope.FormData = {};
                    $scope.frm.$setPristine();
                    $scope.frm.$setValidity();
                    $scope.frm.$setUntouched();
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