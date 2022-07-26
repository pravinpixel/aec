<form ng-submit="submitIFC()">

        <div class="row">
            <div ng-repeat="documentType in documentTypes" class="col-md-4">
                <div  class="card p-3 shadow-sm file-upload-card" style="overflow: hidden">
                    <h1>@{{  documentType.document_type_name }}</h1>
                    <div class="drag-area">
                    <p class="text-disable text-center"> </p>  
                    <input  type="file" file-drop-zone="@{{'file' + documentType.slug}}" class="form-control file-control rounded-pill" file-model="@{{'file' + documentType.slug}}" id ="@{{ documentType.slug }}"/>
                    </div>
                    <small class="text-center my-1">(OR)</small>
                    <input type="text" id="@{{'link' +documentType.slug}}" class="form-control rounded-pill border" placeholder="URL">
                    <a ng-click="uploadFile(documentType.slug, documentType.slug)"  class="fileupload btn btn-primary rounded-pill border-primary mt-2"><i class="fa fa-upload"></i> Upload</a>
                    <div class="progress mt-2">
                        <div ng-show="@{{documentType.slug+'showProgress'}}" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:@{{progress_value}}"> @{{progress_value}} </div>
                    </div>
                </div>
            </div>
        </div>
       
        @include('customer.enquiry.modal')
        <div ng-repeat="documentType in documentTypes">
            <div class="table custom-header">
                <h1>@{{documentType.document_type_name }}</h1>
                <br>
                <viewlist data="documentLists[documentType.slug]" file-type="autoDeskFileType"></viewlist><br/>
            </div>
        </div> 

    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#!/service" class="btn btn-light border shadow-sm">Prev</a></li>
            <li class="next list-inline-item float-end"><input  class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
        </ul>
    </div>
</form>
<style> 
    .IFCModelUpload .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 