<form id="IFCModelUpload"  method="post" class="form-horizontal ng-pristine ng-invalid ng-invalid-required was-validated">
    <div class="row mx-0">
        @foreach($customer['document_types']  as $key => $documentType)
            <div class="col-md-3">
                <div class="card p-4 shadow-lg file-upload-card">
                    <h1 >{{  Str::of($documentType->document_type_name)->upper() }}</h1>
                    <p class="text-disable">Click here to save your file</p>
                    <label class="drop-box" for="{{ $documentType->slug }}">
                        <div class="text">
                            <input  type="file" onchange="angular.element(this).scope().fileName(this)" demo-file-model="{{ $documentType->slug }}" class="file-upload-input" id ="{{ $documentType->slug }}"/>
                            <label for="{{ $documentType->slug }}"><i class="fa fa-folder-plus fa-3x text-primary"></i></label>
                            <small>
                                <filename data ="{{ $documentType->slug }}__file_name"></filename>
                            </small>
                        </div>
                    </label>
                    <span ng-show="{{ $documentType->slug }}__error" class="text-center text-danger">The field is required.</span>
                    <span class="file-submit-btn" ng-click="uploadFile('{{ $documentType->slug }}')" > <i class="fa fa-upload"></i> </span>
                </div>
            </div>
        @endforeach
    </div>
    @include('customers.pages.modal') 
    @foreach($customer['document_types']  as $key => $documentType)
        <div class="table-header">
            <h1>{{  Str::of($documentType->document_type_name)->upper() }}</h1>
            <br>
            <viewlist data ="{{ $documentType->slug }}List"></viewlist><br/>
            @if($documentType->is_mandatory == 1) 
                <input class="hidden-input" type="text" name="{{ $documentType->slug }}mandatory" ng-model="{{ $documentType->slug }}mandatory" required>
            @endif
           
        </div> 
    @endforeach
</form>
<style>
    .hidden-input {
       position: absolute !important;
       opacity: 0;
       z-index: -111111111111;
    }
</style>