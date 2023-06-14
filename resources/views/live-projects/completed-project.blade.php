@extends('live-projects.layout')

@section('admin-content')
    <div class="container-fluid">
        @include('admin.includes.page-navigater')
        <section>
            <x-accordion title="Completed Projects" path="false" open="true" argument='null'>
                <div class="table-min-height">
                    <table class="table dt-responsive custom nowrap w-100" id="live-project-completed-table">
                        <thead>
                            <tr>
                                <th class="text-center">@lang('project.project_id')</th>
                                <th class="text-center">@lang('project.company_name')</th>
                                <th class="text-center">@lang('project.project_number')</th>
                                <th class="text-center">@lang('project.contact_person')</th>
                                <th class="text-center">@lang('project.start_date')</th>
                                <th class="text-center">@lang('project.delivery_date')</th>
                                <th class="text-center">@lang('project.completed')</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </x-accordion>
        </section>
    </div>
@endsection

@push('live-project-custom-scripts')
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
