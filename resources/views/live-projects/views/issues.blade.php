<table class="table table-bordred" id="issues-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Descritons</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>  

@include('live-projects.modals.create-issue')

@push('live-project-custom-styles') 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.css" />
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css">
    <style>.row {margin: 0 !important}.ck-editor__editable { min-height: 200px !important; } .filepond--credits {display: none}</style>
@endpush 
@push('live-project-custom-scripts')  
    <script src="{{ asset('public/assets/js/ckeditor.js') }}"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script>
        $(function () { 
            FilePond.registerPlugin(FilePondPluginImagePreview);
            $('.attachments').filepond({
                allowMultiple: true,
            });
            ClassicEditor.create(document.querySelector('.editor')).then( editor => {
                window.editor = editor; 
            }).catch( error => {
                console.error( error );
            } );
            var table = $('#issues-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('live-project.issues.ajax',Project()->id) }}",
                paging:false,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                // dom: 'Bfrtip',
                // buttons: [{
                //     extend: 'colvis',
                //     // columnText: function ( dt, idx, title ) {
                //     //     return (idx+1)+': '+title;
                //     // }
                // }]
            });
            $('#issues-table_filter').append(`
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#create-issues-modal">Create Issue</button>
            `)
        });
    </script>
@endpush
