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
            <tr  ng-repeat="(key, ifc_model) in enquiry.ifc_model_uploads">
                <td> @{{ $index + 1}} </td>
                <td> @{{ ifc_model.created_at }}</td>
                <td> @{{ ifc_model.file_type }}</td>
                <td> @{{ ifc_model.document_type.document_type_name }}</td>
                <td class="text-center" ng-show="ifc_model.file_type != 'link'">
                    <a download="{{ asset("public/uploads/") }}/@{{ ifc_model.file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                    <a ng-show="!autoDeskFileType.includes(ifc_model.file_type)"  href="javascript:void(0)" ng-click="getDocumentView(ifc_model)"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                    <a ng-show="autoDeskFileType.includes(ifc_model.file_type)" target="_child" href="{{ url('/') }}/viewmodel/@{{ ifc_model.id }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                </td>
                <td class="text-center" ng-show="ifc_model.file_type == 'link'">
                    <a target="_blank" href="@{{ ifc_model.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                </td>
            </tr>
            <tr  ng-show="!enquiry.ifc_model_uploads.length">
                <td colspan="5"> No data found </td>
            </tr>
        </tbody>
    </thead>
</table>

<form id="ifc_model__commentsForm" ng-submit="sendComments('ifc_model','Customer')" class="input-group mt-3">
    <input required type="text" ng-model="ifc_model__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-3">
    <a class="text-primary p-0 btn" ng-show="enquiry_comments.ifc_model" ng-click="showCommentsToggle('viewConversations', 'ifc_model', 'IFC Models & Uploaded Documents')">
        <i class="fa fa-eye"></i>  Previous chat history
    </a>
</div>