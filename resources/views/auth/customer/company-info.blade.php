@extends('auth.layouts.customer')

@section('customer-content')
    <div class="account-pages ">
        <div class="container">
            <div class="card">  
                <div class="card-header border-primary">
                    <div class="text-center py-2 w-75 m-auto">
                        <span><img src="{{ asset("public/assets/images/logo_customer.png") }}" alt="{{ env('APP_NAME') }}" width="150px"></span>
                    </div>
                </div>
                <div class="card-body p-4" ng-controller="CompnayInfo"> 
                    <form class="form-horizontal row m-0" method="post" action="{{ route('company-info', $data['id']) }}">
                        @csrf
                        <h4> Company Information</h4>
                        <div class="my-3 col-md-6">
                            <label for="company_name" class="form-label text-secondary">Company Name <span class="text-danger">*</span></label>
                            <input type="text"  name="company_name" id="validationCustom01" class="form-control"  placeholder="Type Here..."  ng-required="true" list="companyList" ng-change="getCompany(company_name)" ng-model="company_name" />
                            <datalist id="companyList">
                                <option ng-click="getCompanyByName(company_name)" ng-repeat="item in companyList" value="@{{item.company}}">@{{item.company}}</option>
                            </datalist>
                            @if($errors->has('company_name'))
                                <span class="text-danger my-2">{{ $errors->first('company_name') }}</span>
                            @endif
                        </div>
                        <div class="my-3 col-md-6">
                            <label for="organization_no" class="form-label text-secondary">Organization Number <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="organization_no" id="organization_no" required placeholder="Enter organization number">
                            @if($errors->has('organization_no'))
                                <span class="text-danger my-2">{{ $errors->first('organization_no') }}</span>
                            @endif
                        </div>
                        <h4> Contact Information</h4>
                        <div class="my-3 col-md-6">
                            <label for="phone_no" class="form-label text-secondary">Phone</label>
                            <input class="form-control" type="text" name="phone_no" id="phone_no"  placeholder="Enter phone no">
                            @if($errors->has('phone_no'))
                                <span class="text-danger my-2">{{ $errors->first('phone_no') }}</span>
                            @endif
                        </div> 
                        <div class="my-3 col-md-6">
                            <label for="mobile_no" class="form-label text-secondary">Mobile no <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="mobile_no" id="mobile_no"  required placeholder="Enter mobile no">
                            @if($errors->has('mobile_no'))
                                <span class="text-danger my-2">{{ $errors->first('mobile_no') }}</span>
                            @endif
                        </div> 
                        <div class="my-3 col-md-6">
                            <label for="fax" class="form-label text-secondary">Fax</label>
                            <input class="form-control" type="text" name="fax" id="fax"  placeholder="Enter fax">
                            @if($errors->has('fax'))
                                <span class="text-danger my-2">{{ $errors->first('fax') }}</span>
                            @endif
                        </div> 
                        <div class="my-3 col-md-6">
                            <label for="email" class="form-label text-secondary">Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" id="email" readonly required placeholder="Enter email address" value="{{  $data['email'] }}">
                            @if($errors->has('email'))
                                <span class="text-danger my-2">{{ $errors->first('email') }}</span>
                            @endif
                        </div> 
                        <div class="my-3 col-md-6">
                            <label for="invoice_email" class="form-label text-secondary">Invoice Email</label>
                            <input class="form-control" type="email" name="invoice_email" id="invoice_email"  placeholder="Enter invoice email address">
                        </div> 
                        <div class="my-3 col-md-6">
                            <label for="website" class="form-label text-secondary">Website</label>
                            <input class="form-control" type="text" name="website" id="website"  placeholder="Enter wesite url">
                            @if($errors->has('website'))
                                <span class="text-danger my-2">{{ $errors->first('website') }}</span>
                            @endif
                        </div> 
                        <div class="my-3">
                            <button type="submit" class="btn btn-info text-center"> Complete Sign-up</button>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div>
        </div>
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
          © {{ now()->year }} All rights reserved | AecPrefab
    </footer>
    
</body>
@endsection

@push('custom-scripts')

<script>
    app.controller('CompnayInfo', function ($scope, $http, $rootScope, Notification, API_URL) {
        $scope.getCompany = (text) => {
            $http.get(`https://hotell.difi.no/api/json/brreg/enhetsregisteret?query=${text}`)
            .then(function successCallback(res){
                $scope.companyList = res.data.entries.slice(0, 50)
                    .map((item) => {
                        return {'company':item.navn, 'mobile': item.tlf_mobil, 'zip_code': item.forradrpostnr, 'organization_no': item.orgnr, 'site_address': item.forretningsadr} 
                    });
                    if($scope.companyList.length == 1) {
                        $scope.organization_no = ($scope.companyList[0].organization_no == '') ? '  ' : $scope.companyList[0].organization_no;
                        $("#organization_no").val($scope.organization_no);
                    } else {
                        $("#organization_no").val('');
                    }
            }, function errorCallback(error){
                console.log(error);
            });
        }

        $scope.getCompanyByName = (companyName) => {
            console.log(companyName);
        }
    });
</script>
    
@endpush