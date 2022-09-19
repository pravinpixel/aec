@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                @include('admin.includes.page-navigater') 
                <div class="card border shadow-sm">
                    <div class="card-header d-flex align-items-center justify-content-between px-3">
                        <h4 class="h4 m-0">Contracts</h4>
                        <div>
                            <a href="{{ route('admin.add-documentary') }}" class="btn btn-primary btn-sm">
                                <i class="mdi mdi-briefcase-plus"></i> 
                                New Document
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <table id="contract-table" class="table table-bordered table-lg">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>S.No</th>
                                    <th>Documentary Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div> 
                </div> 
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection

@push('custom-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        const APP_URL = "{{ url('/') }}";
        const TOKEN   = "{{ csrf_token() }}";
        const table   = $('#contract-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin-documentary-view') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'documentary_title', name: 'documentary_title'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

        reload = () => {
            table.ajax.reload()
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
                    fetch(`{{ url('') }}/admin/documentary/${id}`, {
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
        changeStatus = (element,id) => { 
            fetch(`{{ route('admin.documentary.status') }}/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': TOKEN
                },
                body: JSON.stringify({
                    data : element.value == 1 ? 0 : 1
                })
            }).then(response => response.json()).then(data => {
                Message('success', data.msg);
                reload()
            });  
        }
    </script>
@endpush