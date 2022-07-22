@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page"  ng-app="AdminEnqView">
        <div class="content"  ng-controller="EnqController" >

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')
                @include('admin.pages.employee.employee-details')
                <!-- end page title -->
                <div class="mb-3 text-end">
                    <a href="{{ route('create.employee') }}" class="btn btn-primary">
                        <i class="mdi mdi-briefcase-plus me-1"></i> 
                        Register New Employee​
                    </a>
                </div>
                <div class="card">
                    
                    <div class="card-body">
                        <table datatable="ng" dt-options="vm.dtOptions" class="table custom custom dt-responsive nowrap table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">Employee ID</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-left">Email</th>
                                    <th class="text-left">Phone No​</th>
                                    <th class="text-center">Share Point</th>
                                    <th class="text-center">BIM</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody> 
                                <tr ng-repeat="(index,m) in module_employee">
                                    <td class="text-center">
                                        @{{ index+1 }}
                                    </td>
                                    <td class="text-center"> 
                                        <span ng-click="toggle('edit', m.id)" class="badge badge-primary-lighten btn  p-2">@{{ m.employee_id }}</span>
                                    </td>
                                    <td class="text-left">@{{ m.first_Name }}</td>
                                    <td class="text-left">@{{ m.email }}</td>
                                    <td class="text-left">@{{ m.number }}</td>
                                    <td class="text-center">
                                        <div id="tooltip-container2">
                                            <span  ng-if="m.share_access=='1'" class="text-success" > <i class="fa font-22 fa-check-circle"></i></span>
                                            <span  ng-if="m.share_access=='0'"  class="text-danger"> <i class="fa font-22 fa-times-circle"></i></span> 
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div id="tooltip-container2">
                                            <span  ng-if="m.bim_access=='1'" class="text-success" > <i class="fa font-22 fa-check-circle"></i></span>
                                            <span  ng-if="m.bim_access=='0'"  class="text-danger"> <i class="fa font-22 fa-times-circle"></i></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm shadow-sm btn-light border" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="dripicons-dots-3 "></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <button class="dropdown-item"  ng-click="employeeEdit(m.id)"><i class="fa fa-edit me-1"></i> View / Edit</button>
                                                {{-- <a class="dropdown-item" href="#" ng-click="employeeMail(m.id)"><i class="fa fa-envelope me-1"></i>Sent Mail</a> --}}
                                                {{-- <a class="dropdown-item text-danger" href="#" ng-click="employeeDelete(m.id)"><i class="fa fa-trash me-1"></i>Delete</a> --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                </div>
                <div id="right-modal-progress" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
                        <div class="p-3 shadow-sm">
                            <h3>Employee Name : <b class="text-primary"> @{{ employeeDetail.user_name }} </b></h3>
                            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
                        </div>
                        <div class="modal-content h-100 p-4" style="overflow: auto">
                            <div class="card mt-3">
                                <div class="card-body p-2">
                                    <table class="custom table table-bordered m-0">
                                        <tr>
                                            <th>Employee Id</th>
                                            <th>Name</th>
                                            <th>Job Role</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left !important">@{{ employeeDetail.employee_id }}</td>
                                            <td>@{{ employeeDetail.user_name }} </td>
                                            <td>@{{ employeeDetail.job_role }}</td>
                                            <td>@{{ employeeDetail.number }}</td>
                                            <td>@{{ employeeDetail.email }} </td>
                                            <td> <img src="{{ asset('/public/assets/images/') }}/@{{employeeDetail.image}}" alt="no image" width="60px"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div> 
                             
                            <fieldset class="accordion-item border mb-3">
                                <div class="accordion-header custom m-0 position-relative" id="Platform_Access">
                                    <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#Platform_Access_header" aria-expanded="true" aria-controls="Platform_Access_header">
                                        Platform Access
                                    </div>
                                    <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                        <i data-bs-toggle="collapse" 
                                            href="#Platform_Access_header" 
                                            aria-expanded="false" 
                                            aria-controls="Platform_Access_header" 
                                            class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                                        </i>
                                    </div>
                                </div>
                                <div id="Platform_Access_header" class="accordion-collapse collapse show" aria-labelledby="Platform_Access" >
                                    <div class="accordion-body">  
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                Share Point
                                                <span class="badge rounded-pill">
                                                    <span  ng-if="employeeDetail.share_access =='1'" class="text-success"> <i class="fa fa-2x fa-check-circle"></i></span>
                                                    <span  ng-if="employeeDetail.share_access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                </span>
                                            </li>
                                            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                BIM 360
                                                <span class="badge rounded-pill">
                                                    <span  ng-if="employeeDetail.bim_access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                                    <span  ng-if="employeeDetail.bim_access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                </span>
                                            </li>
                                            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                24*7
                                                <span class="badge rounded-pill">
                                                    <span  ng-if="employeeDetail.access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                                    <span  ng-if="employeeDetail.access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                </span>
                                            </li> 
                                        </ul>
                                    </div> 
                                </div>
                            </fieldset> 

                            <fieldset class="accordion-item border mb-3">
                                <div class="accordion-header custom m-0 position-relative" id="ProjectInfo_header">
                                    <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#ProjectInfo" aria-expanded="true" aria-controls="ProjectInfo">
                                        Folder Access
                                    </div>
                                    <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                        <i data-bs-toggle="collapse" 
                                            href="#ProjectInfo" 
                                            aria-expanded="false" 
                                            aria-controls="ProjectInfo" 
                                            class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                                        </i>
                                    </div>
                                </div>
                                <div id="ProjectInfo" class="accordion-collapse collapse show" aria-labelledby="ProjectInfo_header" >
                                    <div class="accordion-body">  
                                        <table dt-options="vm.dtOptions" class="table custom custom table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Folder Name</th>
                                                    <th class="text-center">Active</th>
                                                    <tr ng-repeat="(index,employee) in sharePointFolder">
                                                        <td class="text-center">@{{ employee.folder_name }}</td>
                                                        <td class="text-center">
                                                            <div>
                                                                <input type="checkbox" id="switch__@{{ index }}" abled="true" ng-disabled="true"  ng-checked="employee.is_active == 1"  ng-model="employee.is_active" data-switch="primary"/>
                                                                <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
                                                            </div>          
                                                        </td>                    
                                                    </tr>
                                                   
                                                </tr>
                                            </tbody>
                                        </table> 
                                    </div> 
                                </div>
                            </fieldset>

                            <fieldset class="accordion-item border mb-3">
                                <div class="accordion-header custom m-0 position-relative" id="Client_Listing">
                                    <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#Client_Listing_header" aria-expanded="true" aria-controls="Client_Listing_header">
                                        Client Listing
                                    </div>
                                    <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                        <i data-bs-toggle="collapse" 
                                            href="#Client_Listing_header" 
                                            aria-expanded="false" 
                                            aria-controls="Client_Listing_header" 
                                            class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                                        </i>
                                    </div>
                                </div>
                                <div id="Client_Listing_header" class="accordion-collapse collapse show" aria-labelledby="Client_Listing" >
                                    <div class="accordion-body">  
                                        <!-- <table  dt-options="vm.dtOptions" class="table custom custom table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Folder Name</th>
                                                    <th class="text-center">Active</th>
                                                </tr>
                                            </thead>
                                    
                                            <tbody>
                                                <tr ng-repeat="(index,employee) in sharePointFolder">
                                                    <td class="text-center">@{{ index+1 }}</td>
                                                    <td class="text-center">@{{ employee.folder_name }}</td>
                                                    <td class="text-center">
                                                        <div>
                                                            <input type="checkbox" id="switch__@{{ index }}" abled="true"  ng-checked="employee.is_active == 1"  ng-model="employee.is_active" data-switch="primary"/>
                                                            <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
                                                        </div>          
                                                    </td>                    
                                                </tr>
                                                
                                            </tbody>
                                        </table>  -->
                                    </div> 
                                </div>
                            </fieldset> 
                        </div>                            
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div> 

@endsection 


@push('custom-scripts')   
    <script>
        $('#menu-table').DataTable({
            "ordering": false
        });
    </script> 

		<script >
            
			// menuController

			app.controller('EnqController', function ($scope, $http, API_URL) {
			    
			    //fetch users listing from 
                $scope.employeeEdit = (id) => {
                    let route =  $("#baseurl").val();
                    // console.log(route+'admin/employeeEdit/'+id);
                    window.location.href = route+'admin/employeeEdit/'+id;
                }

                $scope.getEmployeeDetail = function(id) {        
                    $http({
                        method: 'GET',
                        url: API_URL + "admin/get-employee-detail/" + id
                    }).then(function (response) {
                        // alert(JSON.stringify(response.data.employeeDetail))
                        $scope.employeeDetail = response.data.employeeDetail;
                        $scope.employeeFolderStatus = response.data.employeeFolderStatus;
                        $scope.sharePointFolder = response.data.sharePointAccess;
                        $('#employee-detail-view-model').modal('show');
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                }
				
				getData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                
					$http({
						method: 'GET',
						url: API_URL + "admin/get-employee"
					}).then(function (response) {

                        // angular.element(document.querySelector("#loader")).addClass("d-none");
                        
						$scope.module_employee = response.data.data;
						 
					}, function (error) {
						console.log(error);
						console.log('This is embarassing. An error has occurred. Please check the log for details');
					});
				} 
                getData($http, API_URL);
                //delete record
                
			    $scope.fiterData = function () {
			         
                     // admin/api/v2/customers-enquiry
                    
                    var url = API_URL + "admin/api/v2/customers-enquiry" 

                    var FormData = {
                        from_date   :   $scope.filter.from_date,
                        to_date     :   $scope.filter.to_date,
                        status      :   $scope.filter.status,
                        type        :   $scope.filter.type,
                        others      :   $scope.filter.others
                    }
                    // alert( $scope.filter.from_date, 'DD/MM/YY');

                    $http({
                        method: "POST",
                        url: url,
                        data: $.param(FormData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
 
                     }).then(function (response) {
                         
                        // getData($http, API_URL);
                        $scope.module_get = response.data;	

                        Message('success',response.msg);
 
                     }), (function (error) {
                         console.log(error);
                         console.log('This is embarassing. An error has occurred. Please check the log for details');
                     });
                    
                 }
				 // getData($http, API_URL);
				// getMenuData($http, API_URL);

                 $scope.checkIt = function(index, id){
                        var url = API_URL + "admin/";
                        if(id)
                        {
                            url += "employee-status/" + id;
                            method = "PUT";
                            $http({
                                method: method,
                                url: url,
                                data: $.param({'status':0}),
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                            }).then(function(response){
                                getData($http, API_URL);
                                Message('success',response.data.msg);
                            }),(function(error){
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });
                        }
                 }

                $scope.employeeDelete = function (id) {
                    var url = API_URL + 'admin/' + 'employee-delete/';
			        // var isConfirmDelete = confirm('Are you sure you want this record?');
					swal({
						title: "Are you sure?",
						text: "Once deleted, you will not be able to recover this Data!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					}).then((willDelete) => {

						if (willDelete) {

                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 

							$http({
								method: 'DELETE',
								url: url + id                              
							}).then(function (response) {
								 
								getData($http, API_URL);

                              
                                if(response.data.status == false) {
                                    
                                    Message('warning',response.data.msg);
                                    angular.element(document.querySelector("#loader")).addClass("d-none"); 

                                }
                                
                                if(response.data.status == true) {
                                   
                                    Message('success', response.data.msg);
                                }  
                                
                                    
							}, function (error) {
								console.log(error);
                                Message('warning',response.data.msg);
								console.log('Unable to delete');
							});

						} else {
							swal("Your Data is safe!");
						}
 
					});
			       
			    }

                $scope.employeeMail = function (id) {
                    $http({
                        method: 'GET',
                        url: API_URL + "admin/employee-mail/" + id
                    }).then(function (response) {
                        Message('success',response.data.msg);
                        // alert(JSON.stringify(response))
                    }, function (error) {
                        console.log(error);
                        console.log('This is embarassing. An error has occurred. Please check the log for details');
                    });
                    
                }
                    
			    //show modal form
			    $scope.toggle = function (modalstate, id) {
                  
			        $scope.modalstate = modalstate;
			        $scope.module = null;
			
			        switch (modalstate) {
			            case 'add':
			                $scope.form_title = "Create New";
			                $scope.form_color = "primary";
                            $('#right-modal-progress').modal('show');
			                break;
			            case 'edit':
                          
			                $scope.form_title = "Edit an Update";
                            $scope.form_color = "success";
			                $scope.id = id;
                            angular.element(document.querySelector("#loader")).removeClass("d-none"); 

			                // $http.get(API_URL + 'admin/employee-enquiry/' + id )
                            $http({
                        method: 'GET',
                        url: API_URL + "admin/get-employee-detail/" + id
                                }).then(function (response) {
                                    // alert(JSON.stringify(response))
			                        // $scope.enqData = response.data.data;
                                    $scope.employeeDetail = response.data.employeeDetail;
                                    $scope.employeeFolderStatus = response.data.employeeFolderStatus;
                                    $scope.sharePointFolder = response.data.sharePointAccess;
                                    // console.log( $scope.enqData);
  
                                    $('#right-modal-progress').modal('show');

                                    angular.element(document.querySelector("#loader")).addClass("d-none"); 
                                    
			                    });
			                break;
                     
			            default:
			                break;
			        } 
			       
			    }
			
			    //save new record and update existing record
			    $scope.save = function (modalstate, id) {
					
			        var url = API_URL + "module";
			        var method = "POST";
			
			        //append module id to the URL if the form is in edit mode
			        if (modalstate === 'edit') {
			            url += "/" + id;
			            method = "PUT";

						$http({
							method: method,
							url: url,
							data: $.param($scope.module),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
							getData($http, API_URL);

							    $('#right-modal-progress').modal('hide');

                                Message('success',response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});

			        }else {

						$http({
							method: method,
							url: url,
							data: $.param($scope.module),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function (response) {
							 
							getData($http, API_URL);

							//location.reload();

							$('#right-modal-progress').modal('hide');


                            Message('success', response.data.msg);

						}), (function (error) {
							console.log(error);
							console.log('This is embarassing. An error has occurred. Please check the log for details');
						});
					}
			        
			    }
			
			    
			}); 
             
          
		</script>
       
@endpush