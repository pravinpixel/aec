<form ng-submit="submitIFC()" name="ifcForm" ng-model="ifcForm"> 
    <div class="p-3">
        <div class="row">
            <div ng-repeat="documentType in documentTypes" class="col-md-4">
                <div  class="card p-3 shadow-sm file-upload-card" style="overflow: hidden">
                    <h4>@{{  documentType.document_type_name }}</h4>
                    <div class="drag-area">
                    <p class="text-disable text-center"> </p>  
                    <input  type="file" file-drop-zone="@{{'file' + documentType.slug}}" accept="{{ implode(',',config('global.upload_file_extension')) }}" class="form-control file-control rounded-pill" file-model="@{{'file' + documentType.slug}}" id ="@{{ documentType.slug }}"/>
                    </div>
                    <small class="text-center my-1">(OR)</small>
                    <input type="url" id="@{{'link' +documentType.slug}}" class="form-control rounded-pill border" name="url" ng-model="url" placeholder="URL">
                    <a ng-disabled="ifcForm.!$invalid" ng-click="uploadFile(documentType.slug, documentType.slug)"  class="fileupload btn btn-primary rounded-pill border-primary mt-2"><i class="fa fa-upload"></i> Upload</a>
                    <br>    
                    <div ng-show="@{{documentType.slug+'showProgress'}}" class="progress bg-white border border-dark border-warning rounded-pill" id="progressBar" style="position: relative !important">
                        {{-- <div ng-show="@{{documentType.slug+'showProgress'}}" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="@{{progress_value }}" aria-valuemin="0" aria-valuemax="100" style="width:@{{progress_value}}" ng-bind="progress_value">
                        </div> --}}
                        <div ng-show="@{{documentType.slug+'showProgress'}}" class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" aria-valuenow="@{{progress_value }}" aria-valuemin="0" aria-valuemax="100" style="width:@{{progress_value}}" >
                        </div>
                    </div>
                    <span id="numspan" ng-show="@{{documentType.slug+'showProgress'}}" >@{{progress_value }}</span>
                </div>
            </div>
        </div> 
        @include('customer.enquiry.modal')
        <div ng-repeat="documentType in documentTypes">
            <div class="table custom-header">
                <h4>@{{documentType.document_type_name }}</h4>
                <br>
                <viewlist data="documentLists[documentType.slug]" file-type="autoDeskFileType"></viewlist><br/>
            </div>
        </div>  
        @if (session('enquiry_id'))
            <div class="card border shadow-sm mb-0 col-md-4 ms-auto"  ng-show="commentShow">
                <div class="card-header bg-light"><strong>CHAT BOX</strong></div>
                <div class="card-body">
                    <x-chat-box 
                        :status="1" 
                        moduleId="{{ session('enquiry_id') }}" 
                        moduleName="enquiry"
                        menuName="{{ __('app.IFC_Models_and_Uploaded_Documents') }}"
                    />
                </div>
            </div>
        @endif 
    </div>
    <div class="card-footer p-3">
        <ul class="list-inline wizard m-0 p-0">
            <li class="previous list-inline-item disabled"><a href="#!/service" class="btn btn-light border shadow-sm">Prev</a></li>
            <li class="next list-inline-item float-end"><input  class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
            <li class="next list-inline-item float-end mx-2"><input class="btn btn-light border shadow-sm"   ng-click="saveAndSubmitIFC()" type="button" name="submit" value="Save & Submit Later"/></li>
        </ul>
    </div>
</form>
<style> 
    .IFCModelUpload .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
    #numspan{
        position: absolute !important;
        bottom:22px;
        left:47%;
        color: #000;
        font-size: 12px;
        z-index: 1000000000000000000000;
        font-weight:800;
    }
</style> 