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
                                <tr class="text-center">
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

    <div id="duplicate-document" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="share-point-modelLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="share-point-modelLabel">Documentary Name</h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="folderModule" class="form-horizontal" novalidate="">
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Documentary Duplication Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="documentary_name" class="form-control has-error"
                                        placeholder="Type Here.." id="documentary_name">
                                    {{-- <small class="help-inline text-danger ">This Fields is Required</small> --}}
                                    <input type="hidden" name="" id="duplicate_by">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="duplicate()">Submit</button>
                            </div>
                        </form>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

@endsection

@push('custom-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
         
        const TOKEN   = "{{ csrf_token() }}";
        const table   = $('#contract-table').DataTable({
            processing: true,
            serverSide: true,
            columnDefs: [
                { "width": "7%", "targets": 0,"class" :"text-center"  },
                { "width": "15%", "targets": 2,"class" :"text-center" },
                { "width": "22%", "targets": 3 }
            ],
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
                        method: 'DELETE',
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
        function myfun(id){
            console.log(id);
            var a=document.getElementById('duplicate_by').value=id;
            $.ajax({
                method:'post',
                url:"{{ route('admin.getDocumentaryName') }}",
                data:{
                    id:a
                },
                success:function(res){
                    document.getElementById('documentary_name').value=res.name;
                    console.log(res)
                    // reload()
                }
            });
        }
        function duplicate(){
            var did=document.getElementById('duplicate_by').value;
            var dname=document.getElementById('documentary_name').value;
            $.ajax({
                method:'post',
                url:"{{ route('admin.documentaryUpdate') }}",
                data:{
                    id:did,
                    name:dname
                },
                success:function(res){
                    console.log(res)
                    if(res.msg=='success'){
                        Message('success', 'Document Duplicated successfully!')
                        $('#duplicate-document').modal('hide');
                        reload()
                    }
                },
                error:function(err){
                    Message('danger','documentary name should not same the existing one !');
                    reload();
                }
            });
        }
    </script>
@endpush