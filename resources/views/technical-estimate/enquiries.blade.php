@extends('layouts.technical-estimate')

@section('admin-content')
    <div class="content-page">
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                @include('technical-estimate.includes.page-navigater')
                <div class="card border shadow-sm">
                    <div class="card-body">
                        @include('technical-estimate.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('public/assets/js/pages/technical-estimate/dashboard.js') }}"></script>
@endpush
