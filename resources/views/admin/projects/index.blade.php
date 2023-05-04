@extends('layouts.admin')
@section('admin-content')
    <div class="content-page" ng-controller="projectController">
        <div class="content">
            @include('admin.projects.filter-modal')
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                @include('admin.includes.page-navigater')
                <div class="d-flex justify-content-between ">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#project-filter-modal" title="Click to Filter"
                        class="btn btn-light shadow-sm border mb-3">
                        <i class="mdi mdi-filter-menu"></i> Filters
                    </button>
                    <div> 
                        <a href="{{ route('create-projects') }}" class="btn btn-primary">
                            <i class="mdi mdi-briefcase-plus"></i> 
                            @lang('project.create_project') 
                        </a>
                    </div>
                </div>
                <section>
                    <x-accordion title="Un-Established Projects" path="admin.projects.table.unestablished" open="true" argument='null'></x-accordion>
                    {{-- <x-accordion title="Live Projects" path="admin.projects.table.live" open="false" argument='null'></x-accordion> --}}
                    {{-- <x-accordion title="Completed Projects" path="admin.projects.table.completed" open="false" argument='null'></x-accordion> --}}
                </section>
            </div>
        </div>
        @include('admin.projects.quick-view')
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
        color: #4299FA !important;
    }
</style>
@endpush
@push('custom-scripts')
    <script src="{{ asset('public/custom/js/ngControllers/admin/project/list.js') }}"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush