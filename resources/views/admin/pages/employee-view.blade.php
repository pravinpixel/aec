@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page"  ng-app="AdminEnqView">
        <div class="content"  ng-controller="EnqController" >

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')

                <!-- end page title -->
                 
                <div class="card">
                    <div  class="card-header ">
                        <div class="d-flex justify-content-between ">
                            <a href="{{ route('admin.employee-add') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> New Employee</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table datatable="ng" dt-options="vm.dtOptions" class="table dt-responsive nowrap table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>S.No</th> -->
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!-- <th>Mobile</th> -->
                                    <th>Share Point</th>
                                    <th>BIM</th>
                                    <th>24*7</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody> 
                                <tr ng-repeat="(index,m) in module_employee">
                                    <!-- <td> @{{ index+1 }}</td> -->
                                    <td> 
                                        <span ng-click="toggle('edit', m.id)" class="badge badge-primary-lighten btn  p-2">@{{ m.employee_id }}</span>
                                    </td>
                                    <td>@{{ m.first_Name }}</td>
                                    <td>@{{ m.email }}</td>
                                    <!-- <td>@{{ m.number }}</td> -->
                                    
                                    <td>
                                        <div id="tooltip-container2" ng-click="toggle('edit', m.customer_id)">
                                       <span  ng-if="m.share_access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                       <span  ng-if="m.share_access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                            <!-- <button type="button" class="btn progress-btn active"  ng-if="m.share_access=='1'"  data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Enquiry initiation"> </button>
                                            <button type="button" class="btn progress-btn deactive"   ng-if="m.share_access=='0'"  data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Enquiry initiation"> </button>
                                            -->
                                        </div>
                                    </td>
                                    <td>
                                        <div id="tooltip-container2" ng-click="toggle('edit', m.customer_id)">
                                        <span  ng-if="m.bim_access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                       <span  ng-if="m.bim_access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <div id="tooltip-container2" ng-click="toggle('edit', m.customer_id)">
                                        <span  ng-if="m.access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                       <span  ng-if="m.access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                           
                                        </div>
                                    </td>
                                    <td>@{{ m.job_role }}</td>
                                    <td>	
                                        {{-- <div>
                                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="m.status == 1" data-switch="primary"/>
                                            <label for="switch__@{{index}}"   ng-click="checkIt(index, m.id)" ></label>
                                        </div>     --}}
                                        <div class="form-check form-switch" ng-click="checkIt(index, m.id)">
                                            <input type="checkbox" class="form-check-input" id="switch__@{{ index }}" ng-checked="m.status == 1">
                                            <label class="form-check-label" for="switch__@{{index}}" ></label>
                                        </div>
                                    </td>
                                    <td>
                                    <!-- <button class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ><i class="fa fa-pencil"></i></button>
                                    <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  "><i class="fa fa-trash"></i></button> -->
                                    <a class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ng-click=employeeEdit(m.id) "><i class="fa fa-edit"></i></a>
                                    <a class="shadow btn btn-sm btn-outline-secondary rounded-pill" ng-click="employeeDelete(m.id)" ><i class="fa fa-trash"></i></a>
                                    <!-- <a class="shadow btn btn-sm btn-outline-secondary rounded-pill" ng-click=""><i class="fa fa-paper-plane"></i></a> -->
                                        <!-- <div class="dropdown">
                                            <button type="button"  class="btn btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="dripicons-dots-3 "></i>
                                            </button>
                                            
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" ng-click=employeeEdit(m.id) ">Edit</a>
                                                <a class="dropdown-item" ng-click="employeeDelete(m.id)" >Delete</a>
                                                <a class="dropdown-item" ng-click=""s href="#">Sent Mail</a>
                                            </div>
                                        </div> -->
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                </div>
                <div id="right-modal-progress" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
                        <div class="p-3 shadow-sm">
                            <h3>Project Name : <b class="text-primary"> @{{ enqData.project_name }} </b></h3>
                            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
                        </div>
                        <div class="modal-content h-100 p-4" style="overflow: auto">
                            <div class="card mt-3">
                                <div class="card-body p-2">
                                    <table class="table table-bordered m-0">
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Job Role</th>
                                        </tr>
                                        <tr>
                                            <td>@{{ enqData.employee_id }}</td>
                                            <td>@{{ enqData.user_name }} </td>
                                            <td>@{{ enqData.number }}</td>
                                            <td>@{{ enqData.email }}</td>
                                            <td>@{{ enqData.job_role }} </td>
                                        </tr>
                                    </table>
                                </div>
                            </div> 
                            <div class="card">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item m-0">
                                      <h2 class="accordion-header m-0" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Platform Access
                                        </button>
                                      </h2>
                                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mx-0 container ">
                                                <div class="col-12 text-center">
                                                    <h4 class="f-20 m-0 p-3">Plat Information</h4>
                                                </div>
                                                <div class="col-md-6 mx-auto p-3">
                                                    <table class="table m-0  table-bordered">
                                                        <tbody>
                                                                <tr class="border">
                                                                    <th  class=" ">Share Point
                                                                    </th><td  class="bg-white">
                                                                    <span  ng-if="enqData.share_access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                                                    <span  ng-if="enqData.share_access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                                    </td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">BIM
                                                                    </th><td  class="bg-white">
                                                                    <span  ng-if="enqData.bim_access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                                                    <span  ng-if="enqData.bim_access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                                    </td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">24*7
                                                                    </th><td  class="bg-white">
                                                                    <span  ng-if="enqData.access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                                                    <span  ng-if="enqData.access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                                    </td>
                                                                </tr> 
                                                                
                                                               
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- <div class="col-md-6 p-3">
                                                    <table class="table m-0   table-bordered">
                                                    <tbody><tr class="border">
                                                            <th  class=" ">Type of Building
                                                            </th><td  class="bg-white">2</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Number of Buildings
                                                            </th><td  class="bg-white">@{{ enqData.no_of_building }}</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Type of Delivery
                                                            </th><td  class="bg-white">1</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Deliveryd Date 
                                                            </th><td  class="bg-white">2021-02-25</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">State
                                                            </th><td  class="bg-white">non</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">Contact Person name
                                                            </th><td  class="bg-white">@{{ enqData.customer.contact_person }} </td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th  class=" ">E-post
                                                            </th><td  class="bg-white">@{{ enqData.customer.email }} </td>
                                                        </tr> 
                                                    </tbody></table>
                                                </div> -->
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Client Listing
                                        </button>
                                      </h2>
                                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mx-0 container ">
                                                <div class="col-12 text-center">
                                                    <h4 class="f-20 m-0 p-3">Client Listing</h4>
                                                </div>
                                                <div class="col-md-6 p-3 mx-auto">
                                                    <table class="table m-0   table-bordered">
                                                        <tbody>
                                                            <tr class="border">
                                                                <th class="bg-primary text-white">S.no</th>
                                                                <th class="bg-primary text-white">Services</th>
                                                            </tr> 
                                                        <tr class="border">
                                                            <td class=" ">1
                                                            </td><td class="bg-white">CAD / CAM Modelling</td>
                                                        </tr>  
                                                        <tr class="border">
                                                            <td class=" ">2
                                                            </td><td class="bg-white">Approval Drawings</td>
                                                        </tr>  
                                                    </tbody></table>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Project Listing
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                No data!
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

            
            </div> <!-- container -->

        </div> <!-- content -->
    </div> 

    
    

@endsection

@push('custom-styles')
    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
 

    <style>
        .progress-btn {
            clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
            background: lightgray
        }
        .progress-btn.active {
            background: #20CF98 !important
        }
        .table td,th {
            padding: 5px 10px !important     ;
            vertical-align: middle !important
        }
       
        
        #scroll-vertical-datatable th{
            padding:  0px !important     
        }
       
        #scroll-vertical-datatable_wrapper .row:nth-child(1) {
            display: none !important
        }
        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
            top : 2px !important
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            top : 2px !important
        }
        .accordion-header {
            margin:  0 !important
        }
        .accordion-item {
            border: 1px solid gray
        }
        
    </style>
@endpush

{{-- @push('custom-scripts')
    <script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.datatable-init.js') }}"></script>
@endpush --}}

@push('custom-scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.4.3/angular-datatables.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
    {{-- <script src="{{ asset('public/assets/js/pages/demo.datatable-init.js') }}"></script> --}}
 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#menu-table').DataTable({
            "ordering": false
        });
    </script>
    <!-- AngularJS Application Scripts -->
		<script >
			var app = angular.module('AdminEnqView', ['datatables']).constant('API_URL', $("#baseurl").val());           
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
				
				getData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                
					$http({
						method: 'GET',
						url: API_URL + "admin/get_employee"
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
                    alert( $scope.filter.from_date, 'DD/MM/YY');

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
                            url += "employee_status/" + id;
                            method = "PUT";
                            $http({
                                method: method,
                                url: url,
                                data: $.param({'status':0}),
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                            }).then(function(response){
                                Message('success',response.data.msg);
                            }),(function(error){
                                console.log(error);
                                console.log('This is embarassing. An error has occurred. Please check the log for details');
                            });
                        }
                 }

                $scope.employeeDelete = function (id) {
                    var url = API_URL + 'admin/' + 'employee_delete/';
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

			                $http.get(API_URL + 'admin/employee-enquiry/' + id )

			                    .then(function (response) {
                                    // alert(JSON.stringify(response))
			                        $scope.enqData = response.data.data;

                                    console.log( $scope.enqData);
  
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