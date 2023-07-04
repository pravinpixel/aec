@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                <h4 class="my-3">
                    <span class="text-primary">Dashboard</span>
                </h4>
                <div class="card shadow-sm border">
                    <div class="card-body">
                        @include('cost-estimate.table')
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')
<script src="{{ asset('public/assets/js/pages/cost-estimate/dashboard.js') }}"></script>
@endpush