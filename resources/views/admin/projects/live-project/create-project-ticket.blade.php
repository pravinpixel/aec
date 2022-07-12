     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page">
        <div class="content" ng-controller="TicketController">
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
                            <form class="needs-validations"  id="createvariationForm" name="createvariationForm" ng-submit="submitcreatevariationForm()" novalidate>
                                <input type = "hidden" name = "project_id" id = "project_id" ng-model = "ticket.project_id" value = "{{$id}}">

                                <table class="table custom table-bordered">
                                    <thead>
                                        <tr>
                                            <td colspan="2" class="text-center" style="background: #F4F4F4"><b class="h4">Variation Request - 01</b></td>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="200px"><b>Ticket Title</b></td>
                                            <td><input type="text" ng-model = "ticket.title" class="form-control form-control-sm"></td>
                                        </tr>
                                        <tr>
                                            <td width="200px"><b>Project Name</b></td>
                                            <td>@{{ project.project_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Client Name</b></td>
                                            <td>@{{ project.company_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Project Incharge</b></td>
                                            <td>Mariusz Pierzgalski</td>
                                        </tr>
                                        <tr>
                                            <td><b>Date of Change Request</b></td>
                                                <td><input type="date" get-to-do-lists ng-value="ticket.change_date | date: 'dd-MM-yyyy'" ng-model="ticket.change_date" id="" class=" border-0 form-control form-control-sm"></td>
                                        </tr> 
                                    </tbody>
                                </table>
                                <div class="row m-0">
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label" >Description of Variation / Change  <sup class="text-danger">*</sup></label>
                                                    <div text-angular="text-angular" name="htmlcontent" ng-model="ticket.description" ta-disabled='disabled'></div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" >Reason for Variation / Change <sup class="text-danger">*</sup></label>
                                                    <div text-angular="text-angular" name="htmlcontent" ng-model="ticket.reason_for_variation" ta-disabled='disabled1'></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-6"> 
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Estimated Hours <sup class="text-danger">*</sup></label>
                                            <input type="text" ng-keyup="getRxcui(medicineA)"  ng-model="ticket.hours" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" > Price/Hr <sup class="text-danger">*</sup></label>
                                            <input type="text" ng-keyup="getRxcui(medicineB)"  ng-model="ticket.price" class="form-control form-control-sm">
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" > Total <sup class="text-danger">*</sup></label>
                                            kr@{{result}}
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
    <style>
        
    .form-control.ng-valid.ng-touched ,
    .form-select.ng-valid.ng-touched {
    border-bottom: 1px solid #008a60 !important
    }
    
    </style>
@endpush
@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/project/create-project.js") }}"></script> 
@endpush