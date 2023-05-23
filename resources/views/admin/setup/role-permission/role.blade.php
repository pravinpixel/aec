@extends('admin.setup.index')
@section('setup-content')
    <section>
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="{{ route('setup.roles') }}" class="nav-link active fw-bold text-primary">Role</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setup.permissions',1) }}" class="nav-link">Permissions</a>
            </li>
        </ul>
        <table class="table" id="setup-table">
            <thead>
                <th>S.No</th>
                <th>Role Name</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody></tbody>
        </table>
    </section>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        const APP_URL   = "{{ url('/') }}";
        const TOKEN   = "{{ csrf_token() }}";
        const table   = $('#setup-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('setup.roles') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
        reload = () => table.ajax.reload();

        $('.dataTables_filter').append(`
            <button onclick="createRole()" class="btn btn-primary btn-sm ms-2">+ Add</button>
        `)

        changeStatus = (id) => {
            fetch(`${APP_URL}/role/status/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': TOKEN
                },
                body: JSON.stringify({'status':0})
            }).then(response => response.json()).then(response => {
                Message('success', response.msg)
                reload()
            });
        }
        createRole = () => {
            Swal.fire({
                showConfirmButton: false,
                html: `
                    <div>
                        <h3 class="text-primary">Create Role</h3>
                        <hr/>
                        <div class="text-start">
                            <div class="row mb-3 mx-0 align-items-center">
                                <span class="col-3 fw-bold font-14">Role Name</span>
                                <div class="col-9">
                                    <input type="name" id="role_name" name="role_name" class="form-control" placeholder="Enter here.."  required>
                                </div>
                            </div>
                            <div class="row mx-0 align-items-center">
                                <span class="col-3 fw-bold font-14">Role Status</span>
                                <div class="col-9">
                                    <input type="checkbox"name="role_status" id="role_status" value="1" checked data-switch="success" />
                                    <label for="role_status" data-on-label="On" data-off-label="Off"></label>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="text-end">
                            <button onclick="storeRole()" class="btn btn-primary me-auto rounded-pill">Submit</button>
                        </div>
                    </div>
                `,
            });
        }
        editRole = (e, id) => {
            Swal.fire({
                showConfirmButton: false,
                html: `
                    <div>
                        <h3 class="text-primary">Edit Role</h3>
                        <hr/>
                        <div class="text-start">
                            <div class="row mb-3 mx-0 align-items-center">
                                <span class="col-3 fw-bold font-14">Role Name</span>
                                <div class="col-9">
                                    <input type="name" id="role_name" name="role_name" class="form-control" placeholder="Enter here.." value="${e.name}" required>
                                </div>
                            </div>
                            <div class="row mx-0 align-items-center">
                                <span class="col-3 fw-bold font-14">Role Status</span>
                                <div class="col-9">
                                    <input type="checkbox"name="role_status" id="role_status" ${e.getAttribute('status') == 1 ? 'checked' : ''} value="1" data-switch="success" />
                                    <label for="role_status" data-on-label="On" onclick="changeStatus(${id})" data-off-label="Off"></label>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="text-end">
                            <button onclick="updateRole(${id})" class="btn btn-primary me-auto rounded-pill">Submit</button>
                        </div>
                    </div>
                `,
            });
        }
        updateRole = (id) => {
            var role_name   =   document.getElementById('role_name').value
            fetch(`${APP_URL}/role/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': TOKEN
                },
                body: JSON.stringify({name  : role_name})
            }).then(response => response.json()).then(response => {
                Message('success', response.msg)
                reload()
                Swal.close();
            });
        }
        storeRole = () => {
            var role_name       =   document.getElementById('role_name').value
            var role_status     =   document.getElementById('role_status').value
            if(role_name == '' || role_name == null || role_name == undefined) {
                Message('info', 'Role name is Required !')
                return false
            }

            fetch(`${APP_URL}/role`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json",
                    'X-CSRF-TOKEN': TOKEN
                },
                body: JSON.stringify({name  : role_name,status  : role_status})
            }).then(response => response.json()).then(response => {
                if(response.msg !== undefined) {
                    Message('success', response.msg)
                } else {
                    Message('danger', response.errors.name[0])
                }
                reload()
                Swal.close();
            }).catch(error => {
                console.error('There was an error!', error);
            });
        }
        deleteRole = (id) => {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    fetch(`${APP_URL}/role/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': TOKEN
                        }
                    }).then(response => response.json()).then(response => {
                        Message(response.type, response.msg);
                        reload()
                    });
                } else {
                    Message('info', 'Your Data is safe');
                }
            });
        }
    </script>
@endpush
