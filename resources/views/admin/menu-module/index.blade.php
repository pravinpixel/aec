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
                <div class="card">
                    <div class="card-header">
                        <div>
                            {{-- <h4 class="header-title">Sales Enquiries</h4> --}}
                            <div class="btn-group shadow">
                                <a  href="{{ route('menu-module.create') }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i>  @lang('menu_module.create_menu_module')</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#right-modal" title="Click to Filter" class="btn btn-outline-dark border"><i class="mdi mdi-filter-menu"></i> </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        @include('admin.menu-module.table')
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
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
                            <h3 class="page-title">
                                Enquiries Filter
                            </h3>
                        </div>
                        <div class="mb-3 row mx-0">
                            <div class="col p-0 me-md-2">
                                <label class="form-label">From Date</label>
                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                            </div>
                            <div class="col p-0">
                                <label class="form-label">End Date</label>
                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col p-0 me-md-2">
                                <div class="mb-3 ">
                                    <label class="form-label">Project Type</label>
                                    <select class="form-select">
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
                                    <select class="form-select">
                                        <option selected>-- select --</option>
                                        <option value="1">In Progress </option>
                                        <option value="2">Awarded</option>
                                        <option value="3">Yet to Start</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="mb-3">
                            <label class="form-label">Project Name (or) Number</label>
                            <input type="text" class="form-control" placeholder="Type Here...">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary  ">
                                <i class="mdi mdi-filter-menu"></i> Submit filter 
                            </button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@push('custom-styles')
    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
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

    <script>
        $(function () {
                   var table = $('#menuModuleTable').DataTable({
                       aaSorting     : [[0, 'desc']],
                       responsive: true,
                       processing: true,    
                       pageLength: 50,
                       lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                       serverSide: true,
                       ajax          : {
                           url     : '{!! route('menu-module.datatable') !!}',
                           dataType: 'json'
                       },
                       columns       : [
                           {data: 'id', name: 'id', visible: false},
                           {data: 'module_name', name: 'module_name'},
                           {data: 'parent_name', name: 'parent_name'},
                           {data: 'icon', name: 'icon'},
                           {data: 'order_id', name: 'order_id'},
                           {
                               data: 'is_active', name: 'is_active', fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                                   $("a", nTd).tooltip({container: 'body'});
                               }
                           },
                           {
                               data         : 'action', name: 'action', orderable: false, searchable: false,
                               fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                                   $("a", nTd).tooltip({container: 'body'});
                               }
                           }
                       ],
                   });
               });
       </script>
@endpush