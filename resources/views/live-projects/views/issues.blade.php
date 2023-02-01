<div>
    <ul class="nav nav-tabs nav-bordered mb-2">
        <li class="nav-item">
            <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active" onclick="tablesearch(null)">
                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                <span class="d-none d-md-block">All</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link" onclick="tablesearch('INTERNAL')">
                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                <span class="d-none d-md-block">Internal</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#settings-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link" onclick="tablesearch('EXTERNAL')">
                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                <span class="d-none d-md-block">Customer</span>
            </a>
        </li>
        <li class="end-0 me-3 position-absolute">
            <button type="button" class="btn btn-light btn-sm border" data-bs-toggle="modal" data-bs-target="#issues-filters"><i class="fa fa-filter" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#create-issues-modal"> <i class="fa fa-plus"></i> New Issue</button>
        </li>
    </ul>
    <table class="table table-bordred table-sm table-centered border" id="issues-table">
        <thead>
            <tr class="bg-light-2">
                <th>#Id</th>
                <th>Status</th>
                <th>Type</th>
                <th width="250px">Title</th>
                <th>Assignee</th> 
                <th>Due Date</th> 
                <th>Priority</th>
                <th>Request Date</th>                
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div> 

@push('live-project-custom-styles') 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.css" />
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>.dataTables_length{margin-bottom: 0 !important} input:focus,select:focus {border: 1px solid royalblue !important} sup {color: red} .datepicker {width: 270px !important} .select2-selection--multiple .select2-selection__choice {background: none !important} .row {margin: 0 !important}.ck-editor__editable { min-height: 200px !important; } .filepond--credits {display: none}</style>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {  
            $(".custom-datepicker" ).datepicker({
                dateFormat : 'yy-mm-dd'
            });  
            $('#multiple-select').select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: false,
                allowClear: true,
                dropdownParent: $('#create-issues-modal')
            } );
            $('.single-select-field').select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ), 
                dropdownParent: $('#create-issues-modal')
            });
            $('.select-filters').select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ), 
                dropdownParent: $('#issues-filters'),
                allowClear: true
            });
            FilePond.registerPlugin(FilePondPluginImagePreview);
            $('.attachments').filepond({
                allowMultiple: true,
                storeAsFile: true,
                imagePreviewHeight:44,
                imagePreviewMarkupShow:true
            });
            ClassicEditor.create(document.querySelector('.editor')).then( editor => {
                window.editor = editor; 
            }).catch( error => {
                console.error( error );
            } );
            FatchTable = (search,filters) => {
                $('#issues-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('live-project.issues.ajax',Project()->id) }}",
                        data: {
                            filters : filters,
                            search : {
                                regex:false,
                                value: search
                            }
                        }
                    },
                    columns: [
                        {data: 'issue_id', name: 'id'}, 
                        {data: 'status_type', name: 'status'},
                        {data: 'issue_type', name: 'type'},
                        {data: 'title_type', name: 'title'},
                        {data: 'assignee_name', name: 'assignee_name'},
                        {data: 'due_date', name: 'due_date'},
                        {data: 'priority_type', name: 'priority'},
                        {data: 'requested_date', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    // dom: 'Bfrtip',
                    // buttons: [{
                    //     extend: 'colvis',
                    //     columnText: function ( dt, idx, title ) {
                    //         return (idx+1)+': '+title;
                    //     }
                    // }]
                });
            }
            FatchTable(null)
            tablesearch = (search) => {
                $('#issues-table').DataTable().destroy();  
                FatchTable(search)
            }
            advanceFilters = () => {
                const filters = {
                    Priority        : $('#filterPriority').val(),
                    Status          : $('#filterStatus').val(),
                    DueStartDate    : $('#filterDueStartDate').val(),
                    DueEndDate      : $('#filterDueEndDate').val(),
                    RequestStartDate: $('#filterRequestStartDate').val(),
                    RequestEndDate  : $('#filterRequestEndDate').val(),
                    IssueType       : $('#filterIssueType').val(),
                    IssueId         : $('#filterIssueId').val(),
                }
                $('#issues-table').DataTable().destroy();
                FatchTable(null,filters)
            }
            clearAdvaceFilters = () => {
                $('#filterPriority').val("").trigger('change');
                $('#filterStatus').val("").trigger('change');
                $('#filterDueStartDate').val("")
                $('#filterDueEndDate').val("")
                $('#filterRequestStartDate').val("")
                $('#filterRequestEndDate').val("")
                $('#filterIssueType').val("").trigger('change');
                $('#filterIssueId').val("")
                $('#issues-table').DataTable().destroy();
                FatchTable(null)
            }
            showIssue = (id) => {   
                axios.get(`{{ route('live-project.show-issues.ajax') }}/${id}`).then((response) => { 
                    $('#detail-issue-modal').modal('show')
                    $('#detail-issue-modal-content').html(response.data.view)
                    $('#detail-issue-modal-title').html(response.data.title)
                    if(response.data) {
                        $('.issue-select').select2( {
                            theme: "bootstrap-5",
                            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                            placeholder: $( this ).data( 'placeholder' ), 
                            dropdownParent: $('#detail-issue-modal'),
                            allowClear: true
                        });
                    }
                })
            }
        });
    </script>
@endpush
