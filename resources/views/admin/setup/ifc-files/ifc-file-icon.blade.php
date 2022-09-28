@extends('admin.setup.index')
@section('setup-content')
    <div class="card border shadow-sm">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="haeder-title">File Types</h4>
                <a href="{{ route('setup.ifc-file-icon.create') }}" class="btn btn-primary">Create New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-borderless align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>S.No</th>
                            <th>Type</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $i => $file)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $file->type }}</td>
                                <td><img src="{{ url("storage/app/ifc-icons")."/".$file->icon }}" width="20px" alt=""></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill"><i class="fa fa-edit"></i></button>
                                        <button onclick="deleteData({{ $file->id }})" class="shadow btn btn-sm btn-outline-danger rounded-pill"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> 
                </table>
                <div class="d-flex justify-content-center">
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
    <form id="delete_form" action="{{ route('setup.ifc-file-icon.destroy') }}" method="post">
        <input type="hidden" name="id" id="delete_id"> 
        @method('delete')
        @csrf
    </form>
@endsection
@push('custom-scripts') 
    <script>
        deleteData = function (id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var  input = document.getElementById('delete_id')
                    input.setAttribute("value", id)
                    $("#delete_form").submit()
                } else {
                    swal("Your Data is safe!");
                }
            });
        }
    </script>
@endpush