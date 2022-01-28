@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content"  ng-controller="EnqController" >

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')

                <!-- end page title -->
                 
                <div class="card">
                    <div  class="card-header ">
                        <div class="d-flex justify-content-between ">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#right-modal" title="Click to Filter" class="btn btn-light border">
                                <i class="mdi mdi-filter-menu"></i> Filters
                            </button>
                            <a  href="{{ route('admin.enquiry-create') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i> New Enquiry</a>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        <table datatable="ng" dt-options="vm.dtOptions" class="table table-responsive nowrap table-striped custom">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Enquiry No</th>
                                    <th>Contact person</th>
                                    <th>Mobile number</th>
                                    <th>Esti. Date</th>
                                    <th>Pipeline</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody> 
                                <tr ng-repeat="(index,m) in module_get">
                                    <td> @{{ index+1 }}</td>
                                    <td class="text-center"> 
                                        <span ng-click="toggle('edit', m.id)" class="badge badge-primary-lighten btn  p-2">@{{ m.enquiry_number }}</span>
                                    </td>
                                    <td>@{{ m.customer.contact_person }}</td>
                                    <td>@{{ m.customer.mobile_no }}</td>
                                    <td>@{{ m.enquiry_date }}</td>
                                    <td class="text-center">
                                        <div class="d-flex" id="toolTip_@{{ index+1 }}" ng-click="toggle('edit', m.id)">
                                            <button type="button" class="btn progress-btn active" data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Enquiry initiation"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical assessment"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Cost Estimated"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Invoice placed"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Proposal sharing"> </button>
                                            <button type="button" class="btn progress-btn " data-bs-container="#toolTip_@{{ index+1 }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project delivered"> </button>
                                        </div>
                                    </td>
                                    <td class="text-center">	
                                        <span class="badge bg-success shadow-sm rounded-pill">Active</span>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-info btn-sm  rounded-pill shadow-sm" href="{{ route('view-enquiry') }}/@{{ m.id }}"><i class="mdi mdi-eye"></i></a>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                </div>

                <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-right" style="width:100% !important">
                        <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
                            <div>
                                <div class="border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                </div>
                                <div >
                                    <div class="my-3">
                                        <h3 class="page-title">Filter</h3>
                                    </div>
                                    <div class="mb-3 row mx-0">
                                        
                                        <div class="col p-0 me-md-2">
                                            <label class="form-label">From Date</label>
                                            <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" ng-model="filter.from_date" name="from_date">
                                        </div>
                                        <div class="col p-0">
                                            <label class="form-label">End Date</label>
                                            <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" ng-model="filter.to_date" name="to_date">
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col p-0 me-md-2">
                                            <div class="mb-3 ">
                                                <label class="form-label">Project Type</label>
                                                <select class="form-select" ng-model="filter.type" name="type">
                                                    <option selected>-- select --</option>
                                                    <option value="1">Construction</option>
                                                    <option value="2">New Construction</option>
                                                    <option value="3">Old Construction</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col p-0">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" ng-model="filter.status" name="status">
                                                    <option selected>-- select --</option>
                                                    <option value="1">In Progress </option>
                                                    <option value="2">Awarded</option>
                                                    <option value="0">Yet to Start</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Enqiury Number | Project Name</label>
                                        <input type="text" class="form-control" placeholder="Type Here..."  ng-model="filter.others" name="others">
                                    </div> 
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" ng-click="fiterData()">
                                            <i class="mdi mdi-filter-menu"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal --> 

                @include('admin.enquiry.models.enquiry-qucik-view')
                @include('admin.enquiry.models.chat-box')

            </div> <!-- container -->

        </div> <!-- content -->
    </div> 
@endsection
 

@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/all-enquiries.js") }}"></script>   
@endpush