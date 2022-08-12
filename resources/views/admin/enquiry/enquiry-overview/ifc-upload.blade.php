<small class="comments-count" ng-if="enquiry_active_comments.ifc_model > 0"> @{{ enquiry_active_comments.ifc_model   }}</small>
<table class="table custom custom table-hover">
    <thead>
        <tr>
            <th><b>S.No</b></th>
            <th><b>Date</b></th>
            <th><b>File Type</b></th>
            <th><b>View Type</b></th>
            <th class="text-center" width="150px"><b>Action</b></th>
        </tr>
        <tbody>
            <tr ng-repeat="ifc_model_upload in ifc_model_uploads">
                <td> @{{ $index + 1}} </td>
                <td> @{{ ifc_model_upload.created_at | date:'dd-MM-yyyy' }}</td>
                <td> @{{ ifc_model_upload.pivot.file_type }}</td>
                <td> @{{ ifc_model_upload.document_type_name }}</td>
                <td class="text-center">
                    <a download="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.pivot.file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.pivot.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                    <a ng-show="!autoDeskFileType.includes(ifc_model_upload.pivot.file_type)"  href="javascript:void(0)" ng-click="getDocumentView(ifc_model_upload.pivot)"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                    <a ng-show="autoDeskFileType.includes(ifc_model_upload.pivot.file_type)" target="_child" href="{{ url('/') }}/viewmodel/@{{ ifc_model_upload.pivot.id }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                </td>
            </tr>
        </tbody>
    </thead>
</table>
<form id="ifc_model__commentsForm" ng-submit="sendComments('ifc_model','Admin', enqData.customer_info.id)" class="input-group mt-3">
    <input required type="text" ng-model="ifc_model__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-3">
    <a class="text-primary p-0 btn" ng-show="enquiry_comments.ifc_model" ng-click="showCommentsToggle('viewConversations', 'ifc_model', 'IFC Models & Uploaded Documents')">
        <i class="fa fa-eye"></i>  Previous chat history
    </a>
</div>