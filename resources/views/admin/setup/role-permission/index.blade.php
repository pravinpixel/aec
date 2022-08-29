@extends('admin.setup.index')
@section('setup-content')
    <section>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        const APP_URL  = "{{ url('/') }}";
        const TOKEN   = "{{ csrf_token() }}";
        const table   = $('#setup-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('setup.role-permission') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
        reload = () => table.ajax.reload();

        $('.dataTables_filter').append(`
            <a class="btn btn-primary btn-sm ms-2">+ Add</a>
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
                            <button onclick="storeRole(${id})" class="btn btn-primary me-auto rounded-pill">Submit</button>    
                        </div>
                    </div>
                `,
            });
        }
        storeRole = (id) => {
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
                console.log("Swal.close();")
                Swal.close();
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
                    fetch(`${API_URL}/role/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': TOKEN
                        }                       
                    }).then(response => response.json()).then(response => {
                        Message('success', response.data.msg);
                        reload()
                    });
                } else {
                    Message('info', 'Your Data is safe');
                }
            }); 
        }
    </script>
@endpush