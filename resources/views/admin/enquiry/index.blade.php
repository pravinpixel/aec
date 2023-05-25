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
                   <div class=""> <a  href="{{ route('admin.enquiry-create') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> @lang('customer.new_customer_intro') </a></div>
                </div>
 
                <x-accordion title="Unattended Enquiries" path="admin.enquiry.table.unattended" open="true" argument='null'></x-accordion>
                <x-accordion title="Active Enquiries" path="admin.enquiry.table.active" open="true" argument='null'></x-accordion>
                <x-accordion title="Cancelled Enquiries" path="admin.enquiry.table.cancelled" open="true" argument='null'></x-accordion>
 
                @include('admin.enquiry.models.enquiry-qucik-view')
                @include('admin.enquiry.models.chat-box')
                @include('customer.enquiry.models.enquiry-filter-modal')
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/all-enquiries.js") }}"></script>  
@endpush