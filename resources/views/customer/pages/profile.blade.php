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
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $customer->first_name }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label" >@lang('customer.last_name')  <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $customer->last_name }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-6"> 
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.full_name')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="full_name" id="full_name" value="{{ $customer->full_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.mobile_no')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="{{ $customer->mobile_no }}">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.company_name')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $customer->company_name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.postal_code')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ $customer->postal_code }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.city')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="city" id="city" value="{{ $customer->city }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.state')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="state" id="state" value="{{ $customer->state }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">                                             
                                            <label class="form-label" >@lang('customer.country')  <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="country" id="country" value="{{ $customer->country }}">
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