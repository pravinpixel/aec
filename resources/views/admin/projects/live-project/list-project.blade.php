@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" ng-controller="projectController">
        @include('admin.projects.quick-view')
        <div class="content" >
            @include('admin.projects.filter-modal')
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                
                <!-- start page title -->
                @include('admin.includes.page-navigater')
                <!-- end page title -->
                 <!--<div class="d-flex justify-content-between ">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#project-filter-modal" title="Click to Filter" class="btn btn-light shadow-sm border mb-3">
                        <i class="mdi mdi-filter-menu"></i> Filters
                    </button> 
                   <div class=""> <a  href="{{ route('create-projects') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> @lang('project.create_project') </a></div>
                </div>-->
                <div class="accordion" id="accordionPanelsStayOpenExample">
             
                    <div class="accordion-item mb-2 border rounded shadow-sm">
                        <h2 class="accordion-header m-0 position-relative" id="panelsStayOpen-headingTwo">
                            <div class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                @lang('project.live_projects')
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i  
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo"
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn collapsed">
                                </i>
                            </div>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                @include('admin.projects.table.live')
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            
        </div>

    </div> 
    
@endsection 
@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/project/list.js") }}"></script> 
@endpush

