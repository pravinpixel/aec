<table class="table custom custom table-hover">
    <thead>
        <tr>
            <th><b>S.No</b></th>
            <th><b>Date</b></th>
            <th><b>File Type</b></th>
            <th><b>File Name</b></th>
            <th class="text-center" width="150px"><b>Action</b></th>
        </tr>
        <tbody>
            
            <tr ng-show="ifc_model_uploads.length != 0" ng-repeat="ifc_model_upload in ifc_model_uploads">
                <td> @{{ $index + 1}} </td>
                <td> @{{ ifc_model_upload.created_at | date:'dd-MM-yyyy' }}</td>
                <td> @{{ ifc_model_upload.file_type }}</td>
                <td> @{{ ifc_model_upload.client_file_name }}</td>
                <td class="text-center" ng-show="ifc_model_upload.file_type != 'link'">
                    <a download="@{{ ifc_model_upload.client_file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                    <a  ng-click="getDocumentView(ifc_model_upload) "><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                    {{-- <a ng-show="autoDeskFileType.includes(ifc_model_upload.file_type)" target="_blank" href="{{ url('/') }}/viewmodel/@{{ ifc_model_upload.id }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a> --}}
                </td>
                <td class="text-center" ng-show="ifc_model_upload.file_type == 'link'">
                    <a class="" target="_blank" href="@{{ ifc_model_upload.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                </td>
            </tr>
            <tr ng-show="ifc_model_uploads.length == 0">
                <td colspan="5">No data found</td>
            </tr>
            
        </tbody>
    </thead>
</table>