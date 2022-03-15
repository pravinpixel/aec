@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" ng-controller="projectController">
        <div class="content" >

            @include('admin.includes.top-bar')
            <div class="container-fluid">
                
                <!-- start page title -->
                @include('admin.includes.page-navigater')
                <!-- end page title -->
                <div class="d-flex justify-content-between ">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#enquiry-filter-modal" title="Click to Filter" class="btn btn-light shadow-sm border mb-3">
                        <i class="mdi mdi-filter-menu"></i> Filters
                    </button> 
                   <div class=""> <a  href="{{ route('create-projects') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> @lang('project.create_project') </a></div>
                </div>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item mb-2 border rounded shadow-sm">
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
                                <table class="table custom dt-responsive nowrap  w-100">
                                    <thead>
                                        <tr>
                                            <th class="text-center">@lang('project.s_no')</th> 
                                            <th class="text-center">@lang('project.project_id')</th> 
                                            <th class="text-center">@lang('project.project_number')</th> 
                                            <th class="text-center">@lang('project.contact_person')</th> 
                                            <th class="text-center">@lang('project.start_date')</th> 
                                            <th class="text-center">@lang('project.delivery_date')</th>
                                            <th class="text-center">@lang('project.pipeline')</th>
                                            <th class="text-center">@lang('project.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @for ($i=0; $i < 4; $i++)
                                            <tr class="ng-scope odd">
                                                <td>{{ $i+1 }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary" ng-click="toggle(&quot;edit&quot;,2)">
                                                        <b>Draft</b>
                                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                                                    </button>
                                                </td>
                                                <td>New Project Name</td>
                                                <td>MR. Alex Raj</td>
                                                <td>18-05-2022</td>
                                                <td>14-03-2023</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button class="btn progress-btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Initiation"></button> 
                                                        <button class="btn progress-btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical Estimation"></button> 
                                                        <button class="btn progress-btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cost Estiringmation"></button> 
                                                        <button class="btn progress-btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proposal Sharing"></button> 
                                                        <button class="btn progress-btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Customer Response"></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#" title="View / Edit">View / Edit</a>
                                                            <a class="dropdown-item" href="#" title="Delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-2 border rounded shadow-sm">
                        <h2 class="accordion-header m-0 position-relative" id="panelsStayOpen-headingTwo">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                @lang('project.live_projects')
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i  
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo"
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn collapsed">
                                </i>
                            </div>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <table class="table custom dt-responsive nowrap  w-100">
                                    <thead>
                                        <tr>
                                            <th class="text-center">@lang('project.s_no')</th> 
                                            <th class="text-center">@lang('project.project_id')</th> 
                                            <th class="text-center">@lang('project.project_number')</th> 
                                            <th class="text-center">@lang('project.contact_person')</th> 
                                            <th class="text-center">@lang('project.start_date')</th> 
                                            <th class="text-center">@lang('project.delivery_date')</th>
                                            <th class="text-center">@lang('project.pipeline')</th>
                                            <th class="text-center">@lang('project.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @for ($i=0; $i < 4; $i++)
                                            <tr class="ng-scope odd">
                                                <td>{{ $i+1 }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary" ng-click="toggle(&quot;edit&quot;,2)">
                                                        <b>ENQ-PRO00{{ $i+1 }}</b>
                                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                                                    </button>
                                                </td>
                                                <td>New Project Name</td>
                                                <td>MR. Alex Raj</td>
                                                <td>18-05-2022</td>
                                                <td>14-03-2023</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Initiation"></button> 
                                                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical Estimation"></button> 
                                                        <button class="btn progress-btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cost Estiringmation"></button> 
                                                        <button class="btn progress-btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proposal Sharing"></button> 
                                                        <button class="btn progress-btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Customer Response"></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#" title="View / Edit">View / Edit</a>
                                                            <a class="dropdown-item" href="#" title="Delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor 
                                    </tbody>
                                </table>
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
                                <table class="table custom dt-responsive nowrap  w-100">
                                    <thead>
                                        <tr>
                                            <th class="text-center">@lang('project.s_no')</th> 
                                            <th class="text-center">@lang('project.project_id')</th> 
                                            <th class="text-center">@lang('project.project_number')</th> 
                                            <th class="text-center">@lang('project.contact_person')</th> 
                                            <th class="text-center">@lang('project.start_date')</th> 
                                            <th class="text-center">@lang('project.delivery_date')</th>
                                            <th class="text-center">@lang('project.pipeline')</th>
                                            <th class="text-center">@lang('project.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @for ($i=0; $i < 4; $i++)
                                            <tr class="ng-scope odd">
                                                <td>{{ $i+1 }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary" ng-click="toggle(&quot;edit&quot;,2)">
                                                        <b>ENQ-PRO00{{ $i+1 }}</b>
                                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                                                    </button>
                                                </td>
                                                <td>New Project Name</td>
                                                <td>MR. Alex Raj</td>
                                                <td>18-05-2022</td>
                                                <td>14-03-2023</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Initiation"></button> 
                                                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical Estimation"></button> 
                                                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cost Estiringmation"></button> 
                                                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proposal Sharing"></button> 
                                                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Customer Response"></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#" title="View / Edit">View / Edit</a>
                                                            <a class="dropdown-item" href="#" title="Delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection 


