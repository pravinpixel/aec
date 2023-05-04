@extends('layouts.admin')

@section('admin-content')
    <div class="content-page" ng-controller="projectController">
        <div class="content" >
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
@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/project/list.js") }}"></script> 
@endpush