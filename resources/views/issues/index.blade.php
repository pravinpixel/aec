@extends('live-projects.layout') 
@section('admin-content')
    <h4 class="my-3">
        <span class="text-primary">Issues</span>
        <span class="text-secondary"> / Live Projects</span>
    </h4>
    <div class="card shadow-sm border">
        <div class="card-body">
            <table class="table custom custom dt-responsive nowrap  w-100" id="live-project-table">
                <thead>
                    <tr>
                        <th class="text-center">@lang('project.project_id')</th>
                        <th class="text-center">@lang('project.company_name')</th>
                        <th class="text-center">@lang('project.project_number')</th>
                        <th class="text-center">@lang('project.start_date')</th>
                        <th class="text-center">@lang('project.delivery_date')</th>
                        <th class="text-center">Opened</th>
                        <th class="text-center">Closed</th>
                        <th class="text-center">Total Issues</th>
                        <th class="text-center">@lang('project.action')</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('live-project-custom-styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>tr:hover { cursor: pointer ;} .dataTables_length{margin-bottom:0!important}input:focus,select:focus{border:1px solid #4169e1!important}sup{color:red}.datepicker{width:270px!important}.select2-selection--multiple .select2-selection__choice{background:0 0!important}.row{margin:0!important}.ck-editor__editable{min-height:200px!important}.filepond--credits{display:none}</style>
@endpush
@push('live-project-custom-scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            var table = $('#live-project-table').DataTable({
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
                    url: "{{ route('issues.index') }}",
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
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'delivery_date',
                        name: 'delivery_date'
                    },
                    {
                        data: 'opened',
                        name: 'opened',
                        searchable:false,
                        sortable:false
                    },
                    {
                        data: 'closed',
                        name: 'closed',
                        searchable:false,
                        sortable:false
                    },
                    {
                        data: 'total_issues',
                        name: 'total_issues',
                        searchable:false,
                        sortable:false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable:false,
                        sortable:false
                    }
                ]
            });
        });
        function viewIssueByProject(id) {
            alert(id)
        }
    </script>
@endpush
