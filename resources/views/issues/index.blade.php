@extends('live-projects.layout')
@section('admin-content')
    <h4 class="my-3">
        <span class="text-primary">All Issues</span>
    </h4>
    <div class="card shadow-sm border">
        <div class="card-body">
            <table class="table custom custom dt-responsive nowrap  w-100" id="live-project-table">
                <thead>
                    <tr class="bg-light-2">
                        <th>#Issue Id</th>
                        <th width="200px">Title</th>
                        <th>Type</th>
                        <th>Assignee</th>
                        <th>Requester</th>
                        <th>Priority</th>
                        <th>Due Date</th>
                        <th width="100px">Status</th>
                        <th>Request Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    @include('live-projects.modals.detail-issue')
@endsection
@push('live-project-custom-styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        tr:hover {
            cursor: pointer;
        }

        .dataTables_length {
            margin-bottom: 0 !important
        }

        input:focus,
        select:focus {
            border: 1px solid #4169e1 !important
        }

        sup {
            color: red
        }

        .datepicker {
            width: 270px !important
        }

        .select2-selection--multiple .select2-selection__choice {
            background: 0 0 !important
        }

        .row {
            margin: 0 !important
        }

        .ck-editor__editable {
            min-height: 200px !important
        }

        .filepond--credits {
            display: none
        }
    </style>
@endpush
@push('live-project-custom-scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        FatchTable = () => {
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
                        data: 'request_name',
                        name: 'request_name'
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
                    }
                ],
            });
        }
        FatchTable()

        function viewIssueByProject(id) {
            alert(id)
        }

        showIssue = (id, element) => {
            startLoader(element)
            axios.get(`{{ route('live-project.show-issues.ajax') }}/${id}`).then((response) => {
                $('#detail-issue-modal').modal('show')
                $('#detail-issue-modal-content').html(response.data.view)
                if (response.data) {
                    stopLoader(element)
                }
            })
        }
        ChangeIssueStatus = (id, element) => {
            if (element.value === 'CLOSED') {
                $('#status_form').html('')
                $('#status_form').append(`<div class="card p-3 mt-3 border">
                       <div>
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea class="form-control mb-3" id="remarks" rows="3"></textarea>
                            <button type="button" onclick="$('#status_form').html('')" class="btn btn-light border btn-sm">Cancel</button>
                            <button type="button" onclick="setStatus(${id},'${element.value}')" class="btn btn-primary btn-sm">Change</button>
                        </div>
                    </div>`)
            } else {
                axios.put(`{{ route('live-project.change-status-issues.ajax') }}/${id}`, {
                    status: element.value
                }).then(() => {
                    Alert.success('Issue Status Changed!')
                    $('#live-project-table').DataTable().destroy();
                    FatchTable(null)
                });
            }
        }
        setStatus = (id, value) => {
            var remarks = $('#remarks').val()
            if (remarks !== '') {
                axios.put(`{{ route('live-project.change-status-issues.ajax') }}/${id}`, {
                    status: value,
                    remarks: remarks,
                }).then(() => {
                    Alert.success('Issue Status Changed!')
                    $('#live-project-table').DataTable().destroy();
                    FatchTable(null)
                    axios.get(`{{ route('live-project.show-issues.ajax') }}/${id}`).then(
                        response => {
                            $('#detail-issue-modal-content').html(response.data.view)
                        })
                });
            } else {
                Alert.error('Remarks is required!!')
            }
        }
        setcommentCount = comment_id => {
            axios.get(`{{ route('live-project.set-comment-count.ajax') }}/${comment_id}`);
        }
        editComment = (element, id) => {
            var text = $(element).attr('data-text');
            var textarea = $(`.${element.parentNode.parentNode.classList[0]} textarea`)
            if (textarea.length !== 0) return false;
            $(element.parentNode.parentNode).append(`
                    <div class="border rounded">
                        <div class="comment-area-box">
                            <textarea rows="4" class="form-control border-0 resize-none"
                                placeholder="Write here...." spellcheck="false" style="height: 100px;">${text}</textarea>
                            <div class="p-2 bg-light d-flex justify-content-end align-items-center">
                                <button type="button" onclick="updateComment(this,${id})" class="me-2 rounded-pill btn btn-sm btn-success">
                                    <i class="uil uil-repeat me-1"></i>Update Comment
                                </button>
                                <button type="button" onclick="cancelComment(this)" class="btn rounded-pill btn-sm btn-outline-success">
                                    <i class="uil uil-ban me-1"></i>Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                `)
        }
        cancelComment = element => {
            $(element.parentNode.parentNode.parentNode).remove()
        }
        updateComment = (element, id) => {
            var currentComment = $(element.parentNode.parentNode.parentNode.parentNode.childNodes[3])
            var newComment = element.parentNode.parentNode.childNodes[1].value
            $(element.parentNode.parentNode.parentNode.parentNode.childNodes[5].childNodes[3]).attr(
                'data-text', newComment)
            startLoader(element)
            axios.put(`{{ route('live-project.update-comment.ajax') }}/${id}`, {
                comment: newComment
            }).then((response) => {
                currentComment.text(newComment)
                setInterval(() => {
                    stopLoader(element)
                    cancelComment(element)
                }, 200);
            })
        }
        removeComment = (element, id) => {
            startLoader(element)
            axios.delete(`{{ route('live-project.delete-comment.ajax') }}/${id}`).then((response) => {
                stopLoader(element)
                $('#comments_content').html(response.data)
            })
        }
    </script>
@endpush
