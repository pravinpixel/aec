<form ng-submit="submitIFC()">

        <div class="row">
            <div ng-repeat="documentType in documentTypes" class="col-md-4">
                <div  class="card p-3 shadow-sm file-upload-card" style="overflow: hidden">
                    <h1>@{{  documentType.document_type_name }}</h1>
                    <p class="text-disable text-center">Click here to save your file</p>
                    <label class="drop-box shadow-sm" for="@{{ documentType.slug }}">
                        <div class="text">
                            <input type="file" file-model="@{{'file' + documentType.slug}}" onchange="angular.element(this).scope().fileName(this)"id ="@{{ documentType.slug }}"/>
                            <label for="@{{ documentType.slug }}"><i class="fa fa-folder-plus fa-2x text-primary"></i></label>
                        </div>
                    </label> @{{ documentType.file_name }}
                    <small class="text-center my-1">(OR)</small>
                    <input type="text" id="@{{'link' +documentType.slug}}" class="form-control rounded-pill border" placeholder="links">
                    <a ng-click="uploadFile(documentType.slug, documentType.slug)"  class="fileupload btn btn-primary rounded-pill border-primary mt-2"><i class="fa fa-upload"></i> Upload</a>
                    <div class="progress mt-2">
                        <div ng-show="@{{documentType.slug+'showProgress'}}" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
       
        @include('customer.enquiry.modal')
        <div ng-repeat="documentType in documentTypes">
            <div class="table-header">
                <h1>@{{documentType.document_type_name }}</h1>
                <br>
                <viewlist data="documentLists[documentType.slug]"></viewlist><br/>
            </div>
        </div> 

    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#!/service" class="btn btn-outline-primary">Previous</a></li>
            <li class="next list-inline-item float-end"><input  class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
        </ul>
    </div>
</form>
