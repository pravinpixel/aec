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
                        <x-accordion title="Live Projects" path="admin.projects.table.live" open="true" argument='null'></x-accordion>
                    </section>
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
        color: #4299FA !important;
    }
</style>
@endpush
@push('custom-scripts')
<script>
       $("#customer_chat").hide();
</script>
    <script src="{{ asset("public/custom/js/ngControllers/admin/project/list.js") }}"></script> 
@endpush