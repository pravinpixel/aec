@extends('layouts.customer')

@section('customer-content')
   
    <div class="content-page" ng-app="App">
        <div class="content" > 
            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                @include('customer.includes.page-navigater')
            </div> <!-- container -->
            <div class="card border shadow-sm">
                <div class="card-header">
                    <ul class="nav nav-tabs m-0 nav-pills border-0">
                        <li class="nav-item">
                            <a href="#profile_info" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="mdi mdi-account-circle"></i>
                                <span>Profile Info</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#account_settings" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="mdi mdi-cog"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body"> 
                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile_info">
                            <form name="customer_profile_form" method="post" action="{{ route('customers-update-profile') }}" >
                                @method('put')
                                @csrf
                                <div class="row m-0">
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.first_name')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $customer->first_name }}" required>
                                            @if($errors->has('first_name'))
                                                <div class="alert alert-danger">{{$errors->first('first_name')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.company_name')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="company_name" readonly id="company_name" value="{{ $customer->company_name }}" required>
                                            @if($errors->has('company_name'))
                                                <div class="alert alert-danger">{{$errors->first('company_name')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.last_name')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $customer->last_name }}" required>
                                            @if($errors->has('first_name'))
                                                <div class="alert alert-danger">{{$errors->first('last_name')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.organization_no')<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="organization_no" id="organization_no" value="{{ $customer->organization_no }}" required>
                                            @if($errors->has('organization_no'))
                                                <div class="alert alert-danger">{{$errors->first('organization_no')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.mobile_no')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" onkeypress="return isNumber(event)" name="mobile_no" id="mobile_no" value="{{ $customer->mobile_no }}" required>
                                            @if($errors->has('mobile_no'))
                                                <div class="alert alert-danger">{{$errors->first('mobile_no')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.city')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="city" id="city" value="{{ $customer->city }}" required>
                                            @if($errors->has('city'))
                                                <div class="alert alert-danger">{{$errors->first('city')}}</div>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.email')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="email" readonly id="email" value="{{ $customer->email }}" required>
                                            @if($errors->has('email'))
                                                <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.postal_code')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" onkeypress="return isNumber(event)" name="postal_code" id="postal_code" value="{{ $customer->postal_code }}" required>
                                            @if($errors->has('postal_code'))
                                                <div class="alert alert-danger">{{$errors->first('postal_code')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.state')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="state" id="state" value="{{ $customer->state }}" required>
                                            @if($errors->has('state'))
                                                <div class="alert alert-danger">{{$errors->first('state')}}</div>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.country')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="country" id="country" value="{{ $customer->country }}" required>
                                            @if($errors->has('country'))
                                                <div class="alert alert-danger">{{$errors->first('country')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end"> 
                                    <input type="reset"  class="btn btn-light font-weight-bold px-3" value="Cancel">
                                    <button type="submit" ng-disabled="enqForm.$invalid" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle"></i> @lang('global.update') </button>
                                </div>
                            </form> 
                        </div>
                        <div class="tab-pane" id="account_settings">
                            <div>
                                <div class="col-md-8 mx-auto">
                                    <div class="card border shadow-sm">
                                        <div class="card-body row m-0 align-items-center">
                                            <div class="col border-end pe-4">
                                                <ul class="list-group list-group-flush">
                                                    <li class="fw-bold list-group-item d-flex justify-content-between align-items-center">
                                                        Payment Due
                                                        @if($paymentDue)
                                                            <i class="text-success fa fa-check-circle font-22"></i>
                                                        @else 
                                                            <i class="text-danger fa fa-times-circle font-22"></i>
                                                        @endif
                                                        
                                                    </li>
                                                    <li class="fw-bold list-group-item d-flex justify-content-between align-items-center">
                                                        Project in Live
                                                        @if($activeProject == 0)
                                                            <i class="text-success fa fa-check-circle font-22"></i>
                                                        @else 
                                                            <i class="text-danger fa fa-times-circle font-22"></i>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col text-center">
                                                <h5 class="card-title  h3">Deactivate Account ?</h5>
                                                <p class="card-text">This action will remove all here information assets data related to <b>AECPrefab</b></p>
                                                <button {{ $paymentDue && $activeProject == 0 ? '': 'disabled' }}   class="btn btn-{{ $paymentDue  && $activeProject == 0 ? 'danger' : 'secondary' }}  rounded-pill px-3" onclick="deactivateAccount()">Deactivate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="deactivate-form" action="{{ route('customer.deactivate-account') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <form id="reset-password-form" action="{{ route('forgot.password.post') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ Customer()->email }}">
                                    </form>
                                    <button class="btn btn-warning" onclick="document.getElementById('reset-password-form').submit()"><i class="fa fa-repeat me-1"></i> Reset Email Password</button>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div> <!-- content --> 
    </div> 

@endsection

@push('custom-styles')


@endpush

@push('custom-scripts') 
    
    <script>
        $(function(){
            $(document).on('keypress','#postal_code', function(){
                let  zipcode = $(this).val();
                // $.ajax({
                //     url:`https://api.zippopotam.us/NO/${zipcode}`,
                //     method: 'get',
                //     success: function (res) {
                //         $("#state").val(res.places[0].state);
                //         $("#city").val(res.places[0]['place name']);
                //         $("#county").val(res.country);
                //     }
                // });
            })
        })
    
    </script>
@endpush