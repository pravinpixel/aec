@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')

                <!-- end page title --> 
                
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <div >
                            <form class="d-flex p-2 justify-content-between">
                                <div>
                                    <small>Project From Date</small>
                                    <input type="date" name="" id="" class="form-control">
                                </div>
                                <div>
                                    <small>Project From Date</small>
                                    <input type="date" name="" id="" class="form-control">
                                </div>
                                <div>
                                    <small>Type of Project</small>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Options</option>
                                        <option value="">Select Options</option>
                                        <option value="">Select Options</option>
                                        <option value="">Select Options</option>
                                    </select>
                                </div>
                                <div>
                                    <small>Status</small>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Options</option>
                                        <option value="">Select Options</option>
                                        <option value="">Select Options</option>
                                        <option value="">Select Options</option>
                                    </select>
                                </div>
                                <div>
                                    <small>Search by Name | E.No</small>
                                    <input type="text" name="" id="" placeholder="Type to Search .." class="form-control">
                                </div>
                                <div>
                                    <small style="opacity:0">Search</small>
                                    <button type="submit" class="btn btn-primary form-control"><i class="fa fa-search"></i></button>
                                </div>
                            </form> 
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <table id="scroll-vertical-datatable" class="table dt-responsive nowrap pt-2">
                            <thead class="">
                                <tr>
                                    <th>S.No</th>
                                    <th>Enquiry No</th>
                                    <th>Contact Person</th>
                                    <th>Enquiry Date</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @for ($i = 0; $i < 35;  $i++)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>ENQ0{{ $i+1 }}</td>
                                        <td>Nishanth_{{ $i+1 }}</td>
                                        <td>10-12-2022</td>
                                        <td>abcd@gmail.com</td>
                                        <td>73328254164</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button"  class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="dripicons-dots-3 "></i>
                                                </button>
                                                
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route("admin-cost-estimation-single-view") }}">View</a>
                                                    <a class="dropdown-item" href="{{ route("admin-cost-estimation-single-view") }}">Cost Estimate</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> 
                                    
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

                
            </div> <!-- container -->

        </div> <!-- content -->


    </div>  

@endsection

@push('custom-styles')
    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .table td,th {
            padding: 5px 10px !important     ;
            vertical-align: middle !important
        }
        .table thead,th {
            background: #757CF2 !important;
            color: white
        }
        #scroll-vertical-datatable th{
            padding:  0px !important     
        }
        .table tbody thead,th {
            background: #757CF2 !important
        }
        #scroll-vertical-datatable_wrapper .row:nth-child(1) {
            display: none !important
        }
        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
            top : 2px !important
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            top : 2px !important
        }
    </style>
@endpush

@push('custom-scripts')
    <script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.datatable-init.js') }}"></script>
@endpush