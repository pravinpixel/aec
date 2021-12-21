     
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
                                                    <label class="form-label" for="validationCustom01">Enquiry Number  <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text" ng-value="myWelcome"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom02">Enquiry Date <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text" value="{{  now()->toDateString() }}" class="form-control" >
                                                    <input style="position: absolute;opacity:0" type="radio" ng-checked="true" ng-checked="module.enquiry_date == {{  now()->toDateString() }}"  value="{{  now()->toDateString() }}" ng-model="module.enquiry_date" name="enquiry_date">
                                                </div>  
                                            </div>
                                            <div class="col">
                                                <div class="mb-2">
                                                    <label class="form-label" for="validationCustom02">Password </label>
                                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Auto generated password"  ng-disabled="true" >
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                   
                                        {{-- <div class="mb-3">                                             
                                            <label class="form-label" for="validationCustom01">Enquiry Number <sup class="text-danger">*</sup></label>
                                            <input ng-disabled="true" type="text" value="{{ $enq_number }}" class="form-control" >
                                            <input style="position: absolute;opacity:0" type="radio" ng-checked="true" ng-checked="module.enq_number == {{ $enq_number }}"  value="{{ $enq_number }}" ng-model="module.enq_number" name="enq_number">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Enquiry Date <sup class="text-danger">*</sup></label>
                                            <input ng-disabled="true" type="text" value="{{  now()->toDateString() }}" class="form-control" >
                                            <input style="position: absolute;opacity:0" type="radio" ng-checked="true" ng-checked="module.enquiry_date == {{  now()->toDateString() }}"  value="{{  now()->toDateString() }}" ng-model="module.enquiry_date" name="enquiry_date">
                                        </div> --}}
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom02">User Name<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" name="user_name" id="validationCustom02" ng-model="module.user_name" placeholder="Type Here..."  ng-required="true">
                                                <span class="help-inline" ng-show="frm.user_name.$invalid &amp;&amp; frm.user_name.$touched"><small class="text-danger">field is required</small></span>
                                                <span class="help-inline" ng-show="frm.user_name.$valid &amp;&amp; frm.user_name.$touched"><small class="text-success">Looks good!</small></span>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom02">Contact Person<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" name="contact_person" id="validationCustom02" ng-minlength="3" ng-model="module.contact_person" placeholder="Type Here..." ng-required="true">
                                                <span class="help-inline" ng-show="frm.contact_person.$invalid &amp;&amp; frm.contact_person.$touched"><small class="text-danger">field is required</small></span>
                                                <span class="help-inline" ng-show="frm.contact_person.$valid &amp;&amp; frm.contact_person.$touched"><small class="text-success">Looks good!</small></span>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>  
                                  
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Email \ E-Post<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" id="validationCustom01" name="email" ng-model="module.email" placeholder="Type Here..."  ng-required="true">
                                                <span class="help-inline" ng-show="frm.email.$invalid &amp;&amp; frm.email.$touched"><small class="text-danger">field is required</small></span>
                                                <span class="help-inline" ng-show="frm.email.$valid &amp;&amp; frm.email.$touched"><small class="text-success">Looks good!</small></span>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Telephone<sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="mobile_number" id="validationCustom02" ng-model="module.mobile_number" placeholder="Type Here..."  ng-required="true">
                                            <span class="help-inline" ng-show="frm.mobile_number.$invalid &amp;&amp; frm.mobile_number.$touched"><small class="text-danger">field is required</small></span>
                                            <span class="help-inline" ng-show="frm.mobile_number.$valid &amp;&amp; frm.mobile_number.$touched"><small class="text-success">Looks good!</small></span>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Company Name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="company_name" id="validationCustom01" ng-model="module.company_name" placeholder="Type Here..."  ng-required="true">
                                            <span class="help-inline" ng-show="frm.company_name.$invalid &amp;&amp; frm.company_name.$touched"><small class="text-danger">field is required</small></span>
                                            <span class="help-inline" ng-show="frm.company_name.$valid &amp;&amp; frm.company_name.$touched"><small class="text-success">Looks good!</small></span>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label col-md-12">Remarks <small class="text-scondary">(Optional)</small></label>
                                        <textarea name="remarks" id="" style="height: 100px" class="form-control form-control-sm" cols="150" placeholder="Type Here..." spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                    <button ng-disabled="frm.$invalid" ng-click="save()" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Send </button>
                                </div>
                            </form>
                            {{-- --}}
                            {{-- <form name="frmusers" class="form-horizontal" novalidate="">
								<div class="form-group error">
									<label for="inputEmail3" class="col-sm-12 control-label">Name</label>
									<div class="col-sm-12">
										<input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname"  ng-model="user.name" ng-required="true">
										<span class="help-inline" ng-show="frmusers.name.$invalid &amp;&amp; frmusers.name.$touched">Name field is required</span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-12 control-label">Email</label>
									<div class="col-sm-12">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email Address"  ng-model="user.email" ng-required="true">
										<span class="help-inline" ng-show="frmusers.email.$invalid &amp;&amp; frmusers.email.$touched">Valid Email field is required</span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-12 control-label">Contact No</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="username" name="username" placeholder="Contact Number"   ng-model="user.username" ng-required="true">
										<span class="help-inline" ng-show="frmusers.username.$invalid &amp;&amp; frmusers.username.$touched">Contact number field is required</span>
									</div>
								</div>
							</form> --}}
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
  
            $scope.getItems = function() {
                $http.get(API_URL + "admin/getEnquiryNumber").then(function(response) {
                    $scope.myWelcome = response.data;
                });
            }
            $scope.getItems();

            //save new record and update existing record
            $scope.save = function (modalstate, id) {

                $scope.day = new Date();

                var FormData = {
                    company_name    :   $scope.module.company_name, 
                    contact_person  :   $scope.module.contact_person,
                    mobile_no       :   $scope.module.mobile_number,
                    email           :   $scope.module.email,
                    enquiry_date    :   $scope.module.enquiry_date,
                    user_name       :   $scope.module.user_name,
                    enquiry_number  :   $scope.myWelcome,
                    remarks         :   $scope.module.remarks
                }
  
                $http({
                    method: "POST",
                    url: API_URL + "admin/enquiry",
                    // data: $.param($scope.module),
                    data: $.param(FormData),
                    headers: { 
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function (response) {
                    $scope.getItems();
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