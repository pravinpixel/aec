@extends('auth.layouts.customer')

@section('customer-content')
    <div class="authentication-bg pb-0 w-100" style="z-index: 99">

        <div class="auth-fluid">
            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center "
                style="background:url('https://images.unsplash.com/photo-1554469384-e58fac16e23a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');background-size: cover !important;background-position:center center">
                <footer class="footer footer-alt text-white">
                    © {{ now()->year }} AEC Prefab. All Rights Reserved.
                </footer>
            </div>
            <!-- end Auth fluid right content -->
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="text-center w-100 m-0">
                            <a href="#">
                                <span>
                                    <img src="{{ asset('public/assets/images/logo_customer.png') }}"
                                        alt="{{ env('APP_NAME') }}" width="150px">
                                </span>
                            </a>
                            <footer class="footer footer-alt">
                                <p class="text-muted">Already have account? <a href="{{ url('') }}"
                                        class="text-primary ms-1"><b>Log In</b></a></p>
                            </footer>
                        </div>

                        <!-- form -->
                        <div ng-controller="CompnayInfo" class="pt-3">
                            <form class="form-horizontal m-0  row" method="post"
                                action="{{ route('company-info', $data['id']) }}">
                                @csrf
                                <h4 class="mb-3"> Company Information</h4>
                                <div class="mb-3 col-lg-6">
                                    <label for="company_name" class="form-label text-secondary">Company Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="company_name" id="validationCustom01" class="form-control"
                                        value="{{ old('company_name') }}" placeholder="Type Here..." ng-required="true"
                                        list="companyList" ng-change="getCompany(company_name)" ng-model="company_name" />
                                    <datalist id="companyList">
                                        <option ng-repeat="item in companyList" value="@{{ item.company }}">
                                            @{{ item.company }}</option>
                                    </datalist>
                                    @if ($errors->has('company_name'))
                                        <span class="text-danger my-2">{{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="organization_no" class="form-label text-secondary">Organization Number <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="organization_no"
                                        value="{{ old('organization_no') }}" id="organization_no" required
                                        placeholder="Enter organization number">
                                    @if ($errors->has('organization_no'))
                                        <span class="text-danger my-2">{{ $errors->first('organization_no') }}</span>
                                    @endif
                                </div>
                                <h4 class="mb-3"> Contact Information</h4>
                                <div class="mb-3 col-lg-6">
                                    <label for="phone_no" class="form-label text-secondary">Phone <small
                                            class="text-danger my-2">( Either 8 or 12 numbers )</small></label>
                                    <input class="form-control" type="text" maxlength="12" minlength="8"
                                        onkeypress="return isNumber(event)" name="phone_no" id="phone_no"
                                        value="{{ old('phone_no') }}" placeholder="Enter phone no">
                                    @if ($errors->has('phone_no'))
                                        <span class="text-danger my-2">{{ $errors->first('phone_no') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="mobile_no" class="form-label text-secondary">Mobile no <span
                                            class="text-danger">*</span> <small class="text-danger my-2">( Either 8 or 12
                                            numbers )</small></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+47</div>
                                        </div>
                                        <input class="form-control" type="text" onkeypress="return isNumber(event)"
                                            maxlength="12" minlength="8" name="mobile_no" id="mobile_no"
                                            pattern="{{ config('global.mobile_no_pattern') }}"
                                            value="{{ old('mobile_no') }}" required placeholder="Enter mobile no">
                                    </div>
                                    @if ($errors->has('mobile_no'))
                                        <span class="text-danger my-2">{{ $errors->first('mobile_no') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="fax" class="form-label text-secondary">Fax</label>
                                    <input class="form-control" type="text" name="fax" id="fax"
                                        value="{{ old('fax') }}" placeholder="Enter fax">
                                    @if ($errors->has('fax'))
                                        <span class="text-danger my-2">{{ $errors->first('fax') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="email" class="form-label text-secondary">Email <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" id="email" readonly
                                        required placeholder="Enter email address" value="{{ $data['email'] }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger my-2">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="invoice_email" class="form-label text-secondary">Invoice Email</label>
                                    <input class="form-control" type="email" name="invoice_email"
                                        value="{{ old('invoice_email') }}" id="invoice_email"
                                        placeholder="Enter invoice email address">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="website" class="form-label text-secondary">Website</label>
                                    <input class="form-control" type="url" name="website" id="website"
                                        value="{{ old('website') }}" placeholder="Enter wesite url">
                                    @if ($errors->has('website'))
                                        <span class="text-danger my-2">{{ $errors->first('website') }}</span>
                                    @endif
                                </div>
                                <div class="mb-0  mt-3 text-center">
                                    <button class="btn btn-primary px-5 rounded-pill" type="submit"><i
                                            class="mdi mdi-account-circle"></i> Complete Sign Up </button>
                                </div>
                            </form>
                        </div>
                        <!-- end form-->

                        <!-- Footer-->

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

        </div>
        <!-- end auth-fluid-->
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </div>
@endsection

@push('custom-scripts')
    <script>
        app.controller('CompnayInfo', function($scope, $http, $rootScope, Notification, API_URL) {
            $scope.getCompany = (text) => {
                $http.get(`https://hotell.difi.no/api/json/brreg/enhetsregisteret?query=${text}`).then(
                    function successCallback(res) {
                        $scope.companyList = res.data.entries.slice(0, 50)
                            .map((item) => {
                                return {
                                    'company': item.navn,
                                    'mobile': item.tlf_mobil,
                                    'zip_code': item.forradrpostnr,
                                    'organization_no': item.orgnr,
                                    'site_address': item.forretningsadr,
                                    'adecommnr': item.forradrkommnr,
                                    'adrland': item.forradrland,
                                    'adrpostnr': item.forradrpostnr,
                                    'adrpoststed': item.forradrpoststed
                                }
                            });
                        if ($scope.companyList.length == 1) {
                            $scope.organization_no = ($scope.companyList[0].organization_no == '') ? '  ' :
                                $scope.companyList[0].organization_no;
                            $("#organization_no").val($scope.organization_no);
                        } else {
                            $("#organization_no").val('');
                        }
                    },
                    function errorCallback(error) {
                        console.log(error);
                    });
            }
        });
    </script>
@endpush
