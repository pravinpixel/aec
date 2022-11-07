@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content"  ng-controller="customerDetailController" >
          
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                <div class="row ">
                    <div class="col-12">
                        <div class="page-title-box mt-3">
                            <div class="page-title-right mt-0">
                                <ol class="breadcrumb align-items-center m-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route("admin-dashboard") }}"><i class="fa fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">    
                                        @if (Route::is('admin.customer.edit')) Edit Customer @endif  
                                           
                                    </li>
                                    @if (Route::is('view-enquiry')) 
                                        <li class="breadcrumb-item">
                                            <a href="{{ route("admin-dashboard") }}">Overview</a>
                                        </li>
                                    @endif 
                                    <li class="breadcrumb- ms-2">
                                        <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i> 
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">         
                                @if (Route::is('admin.customer.edit')) Edit Customer @endif           
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="card-body" ng-controller="customerDetailController"> 
                    <form class="form-horizontal row m-0" id="customerDetailForm" method="post" action="{{ route('admin.customer.update', $customer->id) }}">
                        @method('put')
                        @csrf
                        <div class="my-2 col-md-6">
                            <label for="first_name" class="form-label text-secondary">First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="first_name" value="{{ $customer->first_name ?? old('first_name') }}" id="first_name" readonly placeholder="Enter firstname">
                            @if($errors->has('first_name'))
                                <span class="text-danger my-2">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                        <div class="my-2 col-md-6">
                            <label for="last_name" class="form-label text-secondary">Last Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="last_name" value="{{ $customer->last_name ?? old('last_name') }}" id="last_name" readonly placeholder="Enter last_name">
                            @if($errors->has('last_name'))
                                <span class="text-danger my-2">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="my-2 col-md-6">
                            <label for="email" class="form-label text-secondary">Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" id="email" readonly placeholder="Enter email address" value="{{  $customer->email ?? old('email') }}">
                            @if($errors->has('email'))
                                <span class="text-danger my-2">{{ $errors->first('email') }}</span>
                            @endif
                        </div> 

                        <div class="my-2 col-md-6">
                            <label for="password" class="form-label text-secondary">Password </label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Enter password" readonly>
                            @if($errors->has('password'))
                                <span class="text-danger my-2">{{ $errors->first('password') }}</span>
                            @endif
                        </div> 
                     
                        <h4> Company Information</h4>
                        <div class="my-2 col-md-6">
                            <label for="company_name" class="form-label text-secondary">Company Name <span class="text-danger">*</span></label>
                            <input type="text"  name="company_name" id="validationCustom01" class="form-control"  value="{{ $customer->company_name ?? old('company_name') }}" placeholder="Type Here..."  ng-required="true" list="companyList" ng-change="getCompany(company_name)" ng-model="company_name" readonly/>
                            <datalist id="companyList" readonly >
                                <option ng-click="getCompanyByName(company_name)" ng-repeat="item in companyList" value="@{{item.company}}">@{{item.company}}</option>
                            </datalist>
                            @if($errors->has('company_name'))
                                <span class="text-danger my-2">{{ $errors->first('company_name') }}</span>
                            @endif
                        </div>
                        <div class="my-2 col-md-6">
                            <label for="organization_no" class="form-label text-secondary">Organization Number <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" readonly name="organization_no" value="{{ $customer->organization_no ?? old('organization_no') }}" id="organization_no" required placeholder="Enter organization number">
                            @if($errors->has('organization_no'))
                                <span class="text-danger my-2">{{ $errors->first('organization_no') }}</span>
                            @endif
                        </div>
                        <h4> Contact Information</h4>
                        <div class="my-2 col-md-6">
                            <label for="phone_no" class="form-label text-secondary">Phone</label>
                            <input class="form-control" type="text" name="phone_no" onkeypress="return isNumber(event)" id="phone_no" value="{{ $customer->phone_no ?? old('phone_no')  }}" readonly  placeholder="Enter phone no">
                            @if($errors->has('phone_no'))
                                <span class="text-danger my-2">{{ $errors->first('phone_no') }}</span>
                            @endif
                        </div> 
                        <div class="my-2 col-md-6">
                            <label for="mobile_no" class="form-label text-secondary">Mobile no <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="mobile_no" id="mobile_no" onkeypress="return isNumber(event)" value="{{ $customer->mobile_no   ?? old('mobile_no') }}"  required placeholder="Enter mobile no" readonly>
                            @if($errors->has('mobile_no'))
                                <span class="text-danger my-2">{{ $errors->first('mobile_no') }}</span>
                            @endif
                        </div> 
                        <div class="my-2 col-md-6">
                            <label for="fax" class="form-label text-secondary">Fax</label>
                            <input class="form-control" type="text" name="fax" id="fax" value="{{ $customer->fax ?? old('fax') }}"   placeholder="Enter fax" readonly>
                            @if($errors->has('fax'))
                                <span class="text-danger my-2">{{ $errors->first('fax') }}</span>
                            @endif
                        </div> 
                       
                        <div class="my-2 col-md-6">
                            <label for="invoice_email" class="form-label text-secondary">Invoice Email</label>
                            <input class="form-control" type="email" name="invoice_email" value="{{ $customer->invoice_email  ?? old('invoice_email') }}"  id="invoice_email"  placeholder="Enter invoice email address" readonly>
                        </div> 

                        <div class="my-2 col-md-6">
                            <label for="website" class="form-label text-secondary">Website</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ $customer->website   ?? old('website')}}"  placeholder="Enter wesite url" readonly>
                            @if($errors->has('website'))
                                <span class="text-danger my-2">{{ $errors->first('website') }}</span>
                            @endif
                        </div> 

                        {{-- <div class="my-2 pull-right">
                            <button type="submit" class="btn btn-info text-center"> Update </button>
                        </div> --}}
                    </form>
                </div> <!-- end card-body -->
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')

    {{-- <script src="{{ asset("public/custom/js/ngControllers/admin/customer.js") }}"></script>   --}}
@endpush