@extends('layouts.customer')

@section('customer-content')
   
    <div class="content-page" ng-app="App">
        <div class="content" > 
            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">

                @include('customer.includes.page-navigater')

            </div> <!-- container -->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow-lg mb-0">
                        <div class="card-body p-4">
                            <form name="customer_profile_form" method="post" action="{{ route('customers-update-profile') }}" >
                                @method('put')
                                @csrf
                                <div class="row m-0">
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label" >@lang('customer.first_name')  <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $customer->first_name }}" required>
                                                    @if($errors->has('first_name'))
                                                        <div class="alert alert-danger">{{$errors->first('first_name')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label" >@lang('customer.last_name')  <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $customer->last_name }}" required>
                                                    @if($errors->has('first_name'))
                                                        <div class="alert alert-danger">{{$errors->first('last_name')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-6"> 
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.full_name')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="full_name" id="full_name" value="{{ $customer->full_name }}" required>
                                            @if($errors->has('full_name'))
                                                <div class="alert alert-danger">{{$errors->first('full_name')}}</div>
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
                                            <label class="form-label" >@lang('customer.company_name')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $customer->company_name }}" required>
                                            @if($errors->has('company_name'))
                                                <div class="alert alert-danger">{{$errors->first('company_name')}}</div>
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
                                            <label class="form-label" >@lang('customer.city')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="city" id="city" value="{{ $customer->city }}" required>
                                            @if($errors->has('city'))
                                                <div class="alert alert-danger">{{$errors->first('city')}}</div>
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