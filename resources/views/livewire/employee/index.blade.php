@extends('layouts.admin')
@section('admin-content')
    <div class="content-page">
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12">
                        <div class="page-title-box mt-3">
                            <div class="page-title-right mt-0">
                                <ol class="breadcrumb align-items-center m-0">
                                    <li class="breadcrumb-item"><a href="{{ route("admin-dashboard") }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Employees Details​​</li>
                                    <li class="breadcrumb- ms-2"> <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Employees Details​​</h4>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="text-end mb-3">
                <a href="{{ route('create.employee') }}" class="btn btn-success btn-sm ms-2">
                    <i class="mdi mdi-briefcase-plus me-1"></i> Register New Employee 
                </a>
            </div>
            <x-accordion open="true" title="Active Employees" path="false" argument='null'>
                <table class="table table-centered table-bordered table-hover w-100" id="active-employees">
                    <thead class="bg-primary2 text-white">
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Employee ID</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Mobile Phone</th>
                            <th class="text-left">Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Share Point</th>
                            <th class="text-center">BIM</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody> </tbody>
                </table>
            </x-accordion> 
            <x-accordion open="true" title="Deleted Employees" path="false" argument='null'>
                <table class="table table-centered table-bordered table-hover w-100" id="deleted-employee">
                    <thead class="bg-primary2 text-white">
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Employee ID</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Mobile Phone</th>
                            <th class="text-left">Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Share Point</th>
                            <th class="text-center">BIM</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </x-accordion> 
        </div>
    </div>
   
@endsection 


@push('custom-scripts') 
<script>
    UpdateUserStatus = (event,userId, status) => {
        let url = $("#baseurl").val()+`admin/employee/${userId}/status`;
        let text = status == 1 ? `Are you sure to in-active the user ?` : `Are you sure to active the user ?`;
        event.preventDefault();
        Swal.fire({
            html: text,
            icon: 'question',
            confirmButtonText: 'Yes',
            showCancelButton: true,
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then((response) => response.json())
                .then((data) => {
                    if(data.status == false) {
                        Message('danger', data.msg);
                        return false;
                    }
                    location.reload();
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
               
            }
        });
    }
</script>
@endpush
@push('custom-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        // const APP_URL = "{{ url('/') }}";
        const TOKEN   = "{{ csrf_token() }}";
        const table   = $('#active-employees').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employee.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'reference_number', name: 'reference_number'},
                {data: 'full_name', name: 'full_name'},
                {data: 'email', name: 'email'},
                {data: 'mobile_number', name: 'mobile_number'},
                {data: 'role', name: 'role'},
                {data: 'status', name: 'status'},
                {data: 'share_point_status', name: 'share_point_status'},
                {data: 'bim_id', name: 'bim_id'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
        const deletedEmpTable   = $('#deleted-employee').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('deleted-employee.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'reference_number', name: 'reference_number'},
                {data: 'full_name', name: 'full_name'},
                {data: 'email', name: 'email'},
                {data: 'mobile_number', name: 'mobile_number'},
                {data: 'role', name: 'role'},
                {data: 'status', name: 'status'},
                {data: 'share_point_status', name: 'share_point_status'},
                {data: 'bim_id', name: 'bim_id'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
        reload = () => {
            table.ajax.reload()
            deletedEmpTable.ajax.reload()
        };
        destroy = (id) => {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    fetch(`{{ route('delete.employee') }}/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': TOKEN
                        }                       
                    }).then(response => response.json()).then(data => {
                        Message('success', data.msg);
                        reload()
                    });
                } else {
                    Message('info', 'Your Data is safe');
                }
            }); 
        }
        powerDestroy = (id) => {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    fetch(`{{ route('hard-delete.employee') }}/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': TOKEN
                        }                       
                    }).then(response => response.json()).then(data => {
                        Message('success', data.msg);
                        reload()
                    });
                } else {
                    Message('info', 'Your Data is safe');
                }
            }); 
        }
        restore = (id) => {
            swal({
                title: "Are you sure?",
                text: "Want to Restore this Employee ?",
                icon: "info",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    fetch(`{{ route('restore.employee') }}/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': TOKEN
                        }                       
                    }).then(response => response.json()).then(data => {
                        Message('success', data.msg);
                        reload()
                    });
                } else {
                    Message('info', 'Your Data is safe');
                }
            }); 
        }
    </script>
@endpush