@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content"  ng-controller="customerDetailController" >
          
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                @include('admin.includes.page-navigater')
                <section>
                    <x-accordion title="Un Verified Customers" path="admin.customer.inactive-table" open="true" argument='null'></x-accordion>
                    <x-accordion title="Active Customers" path="admin.customer.active-table" open="false" argument='null'></x-accordion>
                    <x-accordion title="Cancelled Customers" path="admin.customer.cancel-table" open="false" argument='null'></x-accordion>
                </section>
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/customer.js") }}"></script>  
@endpush