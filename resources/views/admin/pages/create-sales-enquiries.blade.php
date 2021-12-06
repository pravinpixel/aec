     
@extends('admin.layouts.app')

@section('admin-content')
         
    
    <div class="content-page">
        <div class="content">

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
                            <form class="needs-validation" action="#" novalidate>
                                <div class="row m-0">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Enquiry Number <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="Type Here..." required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Contact Person<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="Type Here..." required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Enquiry Date<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="validationCustom02">User Name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="Type Here..." required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Email \ E-Post<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="Type Here..." required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Telephone<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="Type Here..." required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Company Name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="Type Here..." required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="validationCustom02">Password<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="Type Here..." required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label col-md-12">Remarks </label>
                                        <textarea name="" id="" style="height: 100px" class="form-control form-control-sm" cols="150" placeholder="Type Here..." spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                    <button type="submit" onclick="submit()" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Submit</button>
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
</style>
@endpush

 