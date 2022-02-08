@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page"  ng-app="DocumentaryView">
        <div class="content"  ng-controller="DocumentaryController" >

            @include('admin.includes.top-bar')

            <div class="container-fluid">

                @include('admin.includes.page-navigater')

                <div class="card">
                    <div  class="card-header ">
                        <div class="d-flex justify-content-between ">
                            <a href="{{ route('admin.add-documentary') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> New Document</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table datatable="ng" dt-options="vm.dtOptions" class="table dt-responsive nowrap table-striped">
                            <thead>
                                <tr>
                                 
                                    <th>Documentary Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody> 
                                <tr ng-repeat="(index,m) in documentary">
                                   
                                    <td> 
                                        @{{ m.documentary_title }}
                                    </td>
                                    <!-- <td>@{{ m.documentary_type }}</td>                                   -->
                                    <td>	
                                        {{-- <div>
                                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="m.is_active == 1" data-switch="primary"/>
                                            <label for="switch__@{{index}}"   ng-click="documentary_status(index, m.id)" ></label>
                                        </div>     --}}
                                        <div class="form-check form-switch" ng-click="documentary_status(index, m.id)">
                                            <input type="checkbox" class="form-check-input" id="switch__@{{ index }}" ng-checked="m.is_active == 1">
                                            <label class="form-check-label" for="switch__@{{index}}" ></label>
                                        </div>
                                    </td>
                                    <td>
                                    
                                    <a class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ng-click="documentaryEdit(m.id)"><i class="fa fa-edit"></i></a>
                                    <a class="shadow btn btn-sm btn-outline-secondary rounded-pill" ng-click="documentaryDelete(m.id)" ><i class="fa fa-trash"></i></a>
                                   
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

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
        <script >

            app.controller('DocumentaryController', function ($scope, $http, API_URL) {
			    
			    //fetch users listing from 
                $scope.documentaryEdit = (id) => {
                    // alert(id)
                    let route =  $("#baseurl").val();
                    // console.log(route+'admin/employeeEdit/'+id);
                    window.location.href = route+'admin/documentaryEdit/'+id;
                }



				
				getData = function($http, API_URL) {

                    angular.element(document.querySelector("#loader")).removeClass("d-none"); 
                
					$http({
						method: 'GET',
						url: API_URL + "admin/documentary"
					}).then(function (response) {

                        // angular.element(document.querySelector("#loader")).addClass("d-none");
                        
						$scope.documentary = response.data;
						 
					}, function (error) {
						console.log(error);
						console.log('This is embarassing. An error has occurred. Please check the log for details');
					});
				} 
                getData($http, API_URL);

                 $scope.documentary_status = function(index, id){
                        var url = API_URL + "admin/" + "documentary/";
                        if(id)
                        {
                            url += "status/" + id;
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

                $scope.documentaryDelete = function (id) {
                    var url = API_URL + 'admin/' + 'documentary/';
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