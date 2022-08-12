<small class="badge rounded-circle  bg-danger" ng-if="enquiry_active_comments.building_components > 0"> @{{ enquiry_active_comments.building_components   }}</small>
<div  style="max-height: 400px; overflow:auto">
    <table class="table custom custom table-hover">
        <thead>
            <tr>
                <th><b>S.No</b></th>
                <th><b>Date</b></th>
                <th><b>File Name</b></th>
                <th><b>File Type</b></th>
                <th class="text-center" width="150px"><b>Action</b></th>
            </tr>
            <tbody>
                <tr ng-repeat="building_component in enquiry.building_components">
                    <td> @{{ $index + 1}} </td>
                    <td> @{{ building_component.created_at }}</td>
                    <td> @{{ building_component.file_name }}</td>
                    <td> @{{ building_component.file_type }}</td>
                    <td class="text-center">
                        <a download="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}" href="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                        <a target="_child" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.file_path }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                    </td>
                </tr>
                <tr ng-show="!enquiry.building_components.length">
                    <td colspan="5">No data found</td>
                </tr>
            </tbody>
        </thead>
    </table>
</div>
<form id="building_components__commentsForm" ng-submit="sendComments('building_components','Customer')" class="input-group mt-3">
    <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-3">
    <a class="text-primary p-0 btn"   ng-show="enquiry_comments.building_components" ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
        <i class="fa fa-eye"></i>  Previous chat history
    </a>
</div> 