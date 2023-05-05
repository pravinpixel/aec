@extends('layouts.customer')

@section('customer-content')

    <div class="content-page"  >
        <div class="content" ng-controller="CustomerprojectController" >
            @include('customer.includes.top-bar')
            <div class="container-fluid" >
                <!-- start page title -->
                @include('customer.includes.page-navigater')
                <!-- end page title -->
                <div class="d-flex justify-content-between ">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#project-filter-modal" title="Click to Filter" class="btn btn-light shadow-sm border mb-3">
                        <i class="mdi mdi-filter-menu"></i> Filters
                    </button> 
                   
                </div>
                    <x-accordion title="Live Projects" path="customer.projects.table.live" open="true" argument='null'></x-accordion>
                </div>
                @include('customer.projects.quick-view')
            </div>
        </div> 
    </div>  
@endsection  
@push('custom-styles')
<style>
    .smallTag{
        font-size: 10px;
        position: absolute;
        top: 0;
        left: 40%;
        font-weight: 700 !important;
        color: black !important;
    }
</style>
@endpush
@push('custom-scripts')
   <script src="{{ asset("public/custom/js/ngControllers/customer/project/list.js") }}"></script> 
@endpush

