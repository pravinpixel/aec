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
                    <x-accordion title="Live Projects" path="admin.projects.table.live" open="true" argument='null'></x-accordion> 
                    <x-accordion title="Completed Projects" path="admin.projects.table.completed" open="true" argument='null'></x-accordion>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var liveproject_completed = $('#live-project-completed-table').DataTable({
            aaSorting: [
                [0, 'desc']
            ],
            responsive: true,
            processing: true,
            pageLength: 50,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            serverSide: true,
            ajax: {
                url: "{{ route('live-project.completed') }}",
                dataType: 'json',
            },
            columns: [{
                    data: 'reference_number',
                    name: 'reference_number'
                },
                {
                    data: 'company_name',
                    name: 'company_name'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'contact_person',
                    name: 'contact_person'
                },
                {
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'delivery_date',
                    name: 'delivery_date'
                },
                {
                    data: 'pipeline',
                    name: 'pipeline'
                },
            ],
            rowCallback: function(row, data) {
                if (data.is_new_enquiry == 1) {
                    $(row).addClass('font-weight-bold bg-light');
                }
            },
        });
    </script>
@endpush
