@extends('admin.setup.index')
@section('setup-content')
    <div class="card border shadow-sm">
        <div class="card-header ">
            <div class="d-flex justify-content-between">
                <h4 class="haeder-title">Edit File Icon</h4>
                <div>
                    <a href="{{ url()->previous() }}" class="btn btn-light btn-sm border">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('setup.ifc-file-icon.update', $file->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label class="small mb-1" for="inputUsername">File Type </label>
                        <input class="form-control form-control-sm" id="inputFileType" maxlength="5" type="text" placeholder="Example : png / jpg / svg" value="{{ $file->type }}" name="type" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="small mb-1" for="inputFirstName">File Icon</label>
                        <input class="form-control form-control-sm" id="inputFirstName" accept="image/png, image/jpeg, image/jpg" type="file" placeholder="Enter your first name" name="icon" required>
                        <img src="{{ url("storage/app/ifc-icons")."/".$file->icon }}" width="20px" alt="" class="mt-3">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm float-end"><i class="fa fa-save me-1"></i>Save</button>
            </form>
        </div>
    </div> 
@endsection