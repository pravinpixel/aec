     
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
                            <form class="needs-validations" name="enqForm" ng-submit="save()" novalidate>
                                <div class="row m-0">
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label"  >Enquiry Number  <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text" ng-value="myWelcome"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" >Enquiry Date <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text" value="{{  now()->toDateString() }}" class="form-control" >
                                                </div>  
                                            </div>
                                            <div class="col">
                                                <div class="mb-2">
                                                    <label class="form-label" >Password </label>
                                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Auto generated password"  ng-disabled="true" >
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                        
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >User Name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="user_name" id="validationCustom02" ng-model="module.user_name" placeholder="Type Here..."  ng-required="true">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Contact Person<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="contact_person" id="validationCustom02" ng-minlength="3" ng-model="module.contact_person" placeholder="Type Here..." ng-required="true">
                                        </div>
                                    </div>  
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Email \ E-Post<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" id="validationCustom01" name="email" ng-model="module.email" placeholder="Type Here..."  ng-required="true">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Telephone<sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="mobile_number" id="validationCustom02" ng-model="module.mobile_number" placeholder="Type Here..."  ng-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Company Name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="company_name" id="validationCustom01" ng-model="module.company_name" placeholder="Type Here..."  ng-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label col-md-12">Remarks <small class="text-scondary">(Optional)</small></label>
                                        <textarea name="remarks" ng-model="module.remarks" id="" style="height: 100px" class="form-control form-control-sm" cols="150" placeholder="Type Here..." spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    
                                    <button ng-click="resetForm()" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                    <button type="submit" ng-disabled="enqForm.$invalid" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Send </button>
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
  
            $scope.getItems = function() {
                $http.get(API_URL + "admin/getEnquiryNumber").then(function(response) {
                    $scope.myWelcome = response.data;
                });
            }
            $scope.getItems();

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
                    data: $.param($scope.data),
                    headers: { 
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function (response) {
                    if(response.data.errors) {
                        Message('success',response.data.errors);
                    }
                    Message('success',response.data.msg);
                    $scope.resetForm();

                }), (function (error) { 
                    console.log(error); 
                }); 
            }
           
            $scope.resetForm =  function() {
                $scope.module = {};
                $scope.enqForm.$setPristine();
                $scope.enqForm.$setValidity();
                $scope.enqForm.$setUntouched();
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