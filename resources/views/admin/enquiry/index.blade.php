@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content"  ng-controller="EnqController" >
          
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')

                <!-- end page title -->
         
                <div class="d-flex justify-content-between ">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#enquiry-filter-modal" title="Click to Filter" class="btn btn-light shadow-sm border mb-3">
                        <i class="mdi mdi-filter-menu"></i> Filters
                    </button> 
                   <div class=""> <a  href="{{ route('admin.enquiry-create') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> New Enquiry</a></div>
                </div>

                <h5>Unattended Enquiries</h5>  
                <div class="card">     
                    <div class="card-body">
                        @include('admin.enquiry.table.unattended')
                    </div>
                </div>

                <h5>Active Enquiries</h5>  
                <div class="card">     
                    <div class="card-body">
                        @include('admin.enquiry.table.active')
                    </div>
                </div>

                <h5>Cancelled Enquiries</h5>  
                <div class="card">     
                    <div class="card-body">
                        @include('admin.enquiry.table.cancelled')
                    </div>
                </div>
                @include('admin.enquiry.models.enquiry-qucik-view')
                @include('admin.enquiry.models.chat-box')
                @include('customer.enquiry.models.enquiry-filter-modal')
            </div> <!-- container -->

        </div> <!-- content -->
    </div> 
@endsection
 

@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/all-enquiries.js") }}"></script>  
     
@endpush