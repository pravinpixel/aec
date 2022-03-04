     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page">
        <div class="content" ng-controller="SalesController">
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater') 
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
                                                    <label class="form-label" >@lang('customer.enquiry_number')  <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text" ng-value="Draft" ng-model="enq_number"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" >@lang('customer.enquiry_date') <sup class="text-danger">*</sup></label>
                                                    <input type="date" class="form-control" name="enq_date"  ng-model="enq_date_one" >
                                                </div>  
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-6"> 
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01"> @lang('customer.company_name') <sup class="text-danger">*</sup></label>
                                            <input type="text"  name="company_name" id="validationCustom01" class="form-control"  placeholder="Type Here..."  ng-required="true" list="companyList" ng-change="getCompany(module.company_name)" ng-model="module.company_name" />
                                            <datalist id="companyList">
                                                <option ng-repeat="item in companyList" value="@{{item.company}}">@{{item.company}}</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" > @lang('customer.contact_person') <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="contact_person" id="validationCustom02"   ng-model="module.contact_person" placeholder="Type Here..." ng-required="true">
                                        </div>
                                    </div>  
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">@lang('customer.email')<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" id="validationCustom01" name="email" ng-model="module.email" autocomplete="off"  placeholder="Type Here..." ng-pattern="/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/"  ng-required="true">
                                            </div>
                                        </div> 
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >@lang('customer.mobile_number')<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" max="12" ng-pattern="phoneNumbr"  onkeypress="return isNumber(event)" maxlength="12"  placeholder="Type Here..."  name="mobile_number" ng-model="module.mobile_number"  ng-required="true" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="col-form-label col-md-12">@lang('customer.remarks') <small class="text-scondary">@lang('global.optional')</small></label>
                                        <textarea name="remarks" ng-model="module.remarks" id="" style="height: 100px" class="form-control form-control-sm" cols="150" placeholder="Type Here..." spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-3"> 
                                    <input type="reset"  class="btn btn-outline-secondary font-weight-bold px-3" value="Cancel">
                                    <button type="submit" ng-disabled="enqForm.$invalid" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> @lang('global.send') </button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div> <!-- content -->


    </div> 
      
@endsection
  
@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/create-enquiry.js") }}"></script> 
@endpush