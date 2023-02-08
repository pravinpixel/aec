<div>
    <table class="table table-bordred table-sm table-centered border table-hover" id="variation-order-table">
        <thead>
            <tr class="bg-light-2"> 
                <th>#Issue Id</th>
                <th>Title</th>
                <th>Hours</th>
                <th>Price</th>
                <th>Date & Time</th> 
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

@push('live-project-custom-styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css">
@endpush
@push('live-project-custom-scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        FatchTable = (filters) => {
            var table = $('#variation-order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('live-project.index-issue-variation.ajax', Project()->id) }}",
                    data: {
                        filters: filters,
                    }
                },
                columns: [
                    { data:'issue_id', name:'issue_id'},
                    { data:'title', name:'title'},
                    { data:'hours', name:'hours'},
                    { data:'price', name:'price'},
                    { data:'date_time', name:'date_time'},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        }
        FatchTable(null)
    </script>
@endpush
