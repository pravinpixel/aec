<form id="IFCModelUpload"  method="post" class="form-horizontal ng-pristine ng-invalid ng-invalid-required was-validated">
    <div class="row mx-0">
        @foreach($customer['document_types']  as $key => $documentType)
            <div class="col-md-3">
                <div class="card p-3 shadow-sm file-upload-card " style="overflow: hidden">
                    <h1 >{{  Str::of($documentType->document_type_name)->upper() }}</h1>
                    <p class="text-disable">Click here to save your file</p>
                    <label class="drop-box shadow-sm" for="{{ $documentType->slug }}">
                        <div class="text">
                            <input  type="file" onchange="angular.element(this).scope().fileName(this)" demo-file-model="{{ $documentType->slug }}" class="file-upload-input" id ="{{ $documentType->slug }}"/>
                            <label for="{{ $documentType->slug }}"><i class="fa fa-folder-plus fa-2x text-primary"></i></label>
                            <small>
                                <filename data ="{{ $documentType->slug }}__file_name"></filename>
                            </small>
                        </div>
                    </label>
                    <button ng-click="uploadFile('{{ $documentType->slug }}')" class="btn btn-primary rounded-pill border-primary mt-2"><i class="fa fa-upload"></i> Upload</button>
                    <small class="text-center my-1">(OR)</small>
                    <input type="text" ng-model="{{  $documentType->slug  }}__link" class="form-control rounded-pill border" placeholder="Other links">
                    <button ng-click="uploadLink('{{ $documentType->slug }}')" class="btn btn-primary rounded-pill border-primary mt-2"><i class="fa fa-upload"></i> Upload</button>
                    <small ng-show="{{ $documentType->slug }}__error" class="text-center text-danger w-100" style="position: absolute;top:0;left:0;background:#F9E2E5"><strong>This field is required.</strong></small>
                    {{-- <span class="file-submit-btn" ng-click="uploadFile('{{ $documentType->slug }}')" > <i class="fa fa-upload"></i> </span> --}}
                </div>
            </div>
        @endforeach
    </div>
    @include('customer.enquiry.modal') 
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