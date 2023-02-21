<div>
    <x-admin-layout>
        <ul class="nav nav-tabs nav-bordered mb-2">
            <li class="nav-item">
                <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active"
                    onclick="tablesearch(null)">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">All</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link"
                    onclick="tablesearch('INTERNAL')">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span class="d-none d-md-block">Internal</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#settings-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                    onclick="tablesearch('EXTERNAL')">
                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                    <span class="d-none d-md-block">Customer</span>
                </a>
            </li>
            <li class="end-0 me-2 position-absolute  d-flex">
                <div class="dropdown">
                    <button type="button" class="btn btn-light btn-sm border dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-eye"></i> Show / Hide
                    </button>
                    <div class="dropdown-menu">
                        <ul class="list-group m-0 border-0" id="columnFilterMenu"></ul>
                    </div>
                </div>
                <button type="button" class="btn btn-light btn-sm border mx-1" data-bs-toggle="modal"
                    data-bs-target="#issues-filters"><i class="fa fa-filter" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#create-issues-modal"> <i class="fa fa-plus"></i> New Issue</button>
            </li>
        </ul>
    </x-admin-layout>
    <x-customer-layout>
        <ul class="nav nav-tabs nav-bordered mb-2">
            <li class="nav-item">
                <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active" onclick="tablesearch(null)">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">Issues summary</span>
                </a>
            </li> 
            <li class="end-0 me-2 position-absolute  d-flex">
                <div class="dropdown">
                    <button type="button" class="btn btn-light btn-sm border dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-eye"></i> Show / Hide
                    </button>
                    <div class="dropdown-menu">
                        <ul class="list-group m-0 border-0" id="columnFilterMenu"></ul>
                    </div>
                </div>
                <button type="button" class="btn btn-light btn-sm border mx-1" data-bs-toggle="modal"
                    data-bs-target="#issues-filters"><i class="fa fa-filter" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#create-issues-modal"> <i class="fa fa-plus"></i> New Issue</button>
            </li>
        </ul>
    </x-customer-layout>
    <table class="table table-bordred table-sm table-centered border table-hover" id="issues-table">
        <thead>
            <tr class="bg-light-2">
                <th>#Issue Id</th>
                <th width="200px">Title</th>
                <th>Type</th>
                <th>Assignee</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th width="100px">Status</th>
                <th>Request Date</th>
                <th class="text-center">Action</th>
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
    <style>
        .dataTables_length {
            margin-bottom: 0 !important
        }

        input:focus,
        select:focus {
            border: 1px solid royalblue !important
        }

        sup {
            color: red
        }

        .datepicker {
            width: 270px !important
        }

        .select2-selection--multiple .select2-selection__choice {
            background: none !important
        }

        .row {
            margin: 0 !important
        }

        .ck-editor__editable {
            min-height: 200px !important;
        }

        .filepond--credits {
            display: none
        }
    </style>
@endpush
@push('live-project-custom-scripts')
    <script src="{{ asset('public/assets/js/ckeditor.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $(".custom-datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $('#multiple-select').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
                allowClear: true,
                dropdownParent: $('#create-issues-modal')
            });
            $('.single-select-field').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                dropdownParent: $('#create-issues-modal')
            });
            $('.select-filters').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                dropdownParent: $('#issues-filters'),
                allowClear: true
            });
            FilePond.registerPlugin(FilePondPluginImagePreview);
            $('.attachments').filepond({
                allowMultiple: true,
                storeAsFile: true,
                imagePreviewHeight: 44,
                imagePreviewMarkupShow: true
            });
            ClassicEditor.create(document.querySelector('.editor')).then(editor => {
                window.editor = editor;
            }).catch(error => {
                console.error(error);
            });
            FatchTable = (filters) => {
                var table = $('#issues-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('live-project.issues.ajax', Project()->id) }}",
                        data: {
                            filters: filters,
                        }
                    },
                    columns: [{
                            data: 'issue_id',
                            name: 'id'
                        },
                        {
                            data: 'title_type',
                            name: 'title'
                        },
                        {
                            data: 'issue_type',
                            name: 'type'
                        },
                        {
                            data: 'assignee_name',
                            name: 'assignee_name'
                        },
                        {
                            data: 'priority_type',
                            name: 'priority'
                        },
                        {
                            data: 'due_date',
                            name: 'due_date'
                        },
                        {
                            data: 'status_type',
                            name: 'status'
                        },
                        {
                            data: 'requested_date',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    drawCallback: function(settings) {
                        var thead = $('#issues-table thead tr')
                        var checkBox = ""
                        Object.entries(thead[0].childNodes).map((item, i) => {
                            var column = ['Action', '#Issue Id', 'Title', 'Status']
                            if (column.includes(item[1].innerText) == false) {
                                checkBox += `
                                    <li class="list-group-item d-flex align-item-center ps-2 py-1">
                                        <input class="form-check-input me-1" type="checkbox" onclick="hideColumn(${i},this)" checked />
                                        ${item[1].innerText}
                                    </li>
                                `
                            }
                        })
                        $('#columnFilterMenu').html(checkBox)
                    }
                });
            }
            FatchTable(null)
            tablesearch = (search) => {
                $('#issues-table').DataTable().destroy();
                FatchTable({
                    IssueType: search
                })
            }
            advanceFilters = () => {
                const filters = {
                    Priority: $('#filterPriority').val(),
                    Status: $('#filterStatus').val(),
                    DueStartDate: $('#filterDueStartDate').val(),
                    DueEndDate: $('#filterDueEndDate').val(),
                    RequestStartDate: $('#filterRequestStartDate').val(),
                    RequestEndDate: $('#filterRequestEndDate').val(),
                    IssueType: $('#filterIssueType').val(),
                    IssueId: $('#filterIssueId').val(),
                }
                $('#issues-table').DataTable().destroy();
                FatchTable(filters)
            }
            hideColumn = (column, element) => {
                $('#issues-table').DataTable().column(column).visible(element.checked);
                // $('#issues-table').DataTable().columns.adjust().draw( false );
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
            showIssue = (id, element) => {
                startLoader(element)
                axios.get(`{{ route('live-project.show-issues.ajax') }}/${id}`).then((response) => {
                    $('#detail-issue-modal').modal('show')
                    $('#detail-issue-modal-content').html(response.data.view)
                    if (response.data) {
                        $('.issue-select').select2({
                            theme: "bootstrap-5",
                            width: $(this).data('width') ? $(this).data('width') : $(this)
                                .hasClass('w-100') ? '100%' : 'style',
                            placeholder: $(this).data('placeholder'),
                            dropdownParent: $('#detail-issue-modal'),
                            allowClear: true
                        });
                        stopLoader(element)
                    }
                })
            }
            ChangeIssueStatus = (id, element) => {
                axios.put(`{{ route('live-project.change-status-issues.ajax') }}/${id}`, {
                    status: element.value
                });
            }
            deleteIssue = (id) => {
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel',
                    reverseButtons: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`{{ route('live-project.delete-issues.ajax') }}/${id}`).then((
                            response) => {
                            if (response.data.status) {
                                Alert.success('Successfully Deleted !')
                                $('#issues-table').DataTable().destroy();
                                FatchTable(null)
                            }
                        })
                    }
                })
            }
            convertVariation = (id, element) => {
                $('#detail-issue-modal').modal('hide')
                startLoader(element)
                axios.get(`{{ route('live-project.create-issue-variation.ajax') }}/${id}`).then((response) => {
                    $('#create-variation-order').modal('show')
                    $('#create-variation-order-content').html(response.data.view)
                    if (response.data) {
                        stopLoader(element)
                    }
                })
            }
        });
    </script>
@endpush
