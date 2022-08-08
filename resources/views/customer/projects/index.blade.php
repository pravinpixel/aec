@extends('layouts.customer')

@section('customer-content')

    <div class="content-page"  >
        <div class="content" ng-controller="CustomerprojectController" >
           {{-- @include('admin.projects.filter-modal')--}}
            @include('customer.includes.top-bar')
            <div class="container-fluid">
                
                <!-- start page title -->
                @include('customer.includes.page-navigater')
                <!-- end page title -->
                <div class="d-flex justify-content-between ">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#project-filter-modal" title="Click to Filter" class="btn btn-light shadow-sm border mb-3">
                        <i class="mdi mdi-filter-menu"></i> Filters
                    </button> 
                   
                </div>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    {{--<div class="accordion-item mb-2 border rounded shadow-sm">
                        <h2 class="accordion-header m-0 position-relative" id="panelsStayOpen-headingOne">
                            <div class="accordion-button"  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                @lang('project.un_established')
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn">
                                </i>
                            </div>
                        </h2>
                       <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                @include('customer.projects.table.unestablished')
                            </div>
                        </div>
                    </div>--}}
                    <div class="accordion-item mb-2 border rounded shadow-sm">
                        <h2 class="accordion-header m-0 position-relative" id="panelsStayOpen-headingTwo">
                            <div class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                @lang('project.live_projects')
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i  
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo"
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                                </i>
                            </div>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                @include('customer.projects.table.live')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-2 border rounded shadow-sm">
                        <h2 class="accordion-header m-0 position-relative" id="panelsStayOpen-headingThree">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                @lang('project.completed_projects')
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree"
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn collapsed">
                                </i>
                            </div>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                @include('admin.projects.table.completed')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        @include('customer.projects.quick-view')
    </div> 
    
@endsection 
@push('custom-scripts')
   <script src="{{ asset("public/custom/js/ngControllers/customer/project/list.js") }}"></script> 
  <script>
  
   
  </script>
   @endpush

