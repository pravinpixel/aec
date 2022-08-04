<form ng-submit="submitIFC()" name="ifcForm" ng-model="ifcForm">

        <div class="row">
            <div ng-repeat="documentType in documentTypes" class="col-md-4">
                <div  class="card p-3 shadow-sm file-upload-card" style="overflow: hidden">
                    <h4>@{{  documentType.document_type_name }}</h4>
                    <div class="drag-area">
                    <p class="text-disable text-center"> </p>  
                    <input  type="file" file-drop-zone="@{{'file' + documentType.slug}}" class="form-control file-control rounded-pill" file-model="@{{'file' + documentType.slug}}" id ="@{{ documentType.slug }}"/>
                    </div>
                    <small class="text-center my-1">(OR)</small>
                    <input type="url" id="@{{'link' +documentType.slug}}" class="form-control rounded-pill border" name="url" ng-model="url" placeholder="URL">
                    <a ng-disabled="ifcForm.!$invalid" ng-click="uploadFile(documentType.slug, documentType.slug)"  class="fileupload btn btn-primary rounded-pill border-primary mt-2"><i class="fa fa-upload"></i> Upload</a>
                    <div class="progress mt-2">
                        <div ng-show="@{{documentType.slug+'showProgress'}}" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:@{{progress_value}}"> @{{progress_value}} </div>
                    </div>
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

   
        <div class="row" ng-show="commentShow">
            <div class="col-8">
                <open-comment  data="
                {'modalState':'viewConversations',
                'type': 'ifc_model', 
                'header':'IFC Models & Uploaded Documents',
                'enquiry_id':enquiry_id,
                send_by: {{ Customer()->id }},
                'from':'Customer'
                }"/> 
            </div>
            <div class="col-4">
                <comment  ng-show="commentShow" data="
                {'modalState':'viewConversations',
                'type': 'ifc_model', 
                'header':'IFC Models & Uploaded Documents',
                'enquiry_id':enquiry_id,
                send_by: {{ Customer()->id }},
                'from':'Customer'
                }"/>
            </div>
        </div>
   
    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
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
</style> 