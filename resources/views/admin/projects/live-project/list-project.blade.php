@extends('layouts.admin')

@section('admin-content')
    <div class="content-page" ng-controller="projectController">
        @include('admin.projects.quick-view')
        @include('admin.projects.live-project.models.chat-box')
        <div class="content" >
                @include('admin.projects.filter-modal')
                @include('admin.includes.top-bar')
                <div class="container-fluid">
                    @include('admin.includes.page-navigater')
                    <section>
                        <x-accordion title="Live Projects" path="admin.projects.table.live" open="true"></x-accordion>
                    </section>
                </div>
        </div> 
    </div> 
@endsection 
@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/project/list.js") }}"></script> 
@endpush