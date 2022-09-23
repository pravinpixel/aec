<table class="table table-bordered m-0 table-striped" ng-init="total = 0 ">
    <tbody > 
        <tr ng-repeat="building_component in building_components"  ng-show="building_component.detail.length">
            <td class="text-center" width="150px">
                <b>@{{ building_component.wall }}</b>
            </td>
            <td>
                <div class="py-2" ng-repeat="detail in building_component.detail">
                    <table class="shadow-sm custom border border-dark mb-0 table table-bordred bg-white">
                        <thead class="table-secondary text-dark">
                            <tr>
                                <th width="33%">Floor</th>
                                <th width="33%">Type of Delivery</th>
                                <th width="33%">Total Area </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: left !important">@{{ detail.floor }} </td>
                                <td>@{{ detail.delivery_type.delivery_type_name }}</td>
                                <td >@{{  building_component.totalWallArea }}</td> 
                            </tr>
                        </tbody> 
                    </table>
                    <table class="shadow-sm border table-bordered border-dark table m-0 bg-white">
                        <thead>
                            <tr> 
                                <td width="33%"><b>Name</b></td>
                                <td width="33%"><b>Thickness (mm)</b></td>
                                <td width="33%"><b>Breadth (mm)</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="layer in detail.layer">
                                <td>@{{ layer.layer_name }}</td>
                                <td>@{{ layer.thickness }}</td>
                                <td>@{{ layer.breath }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
            </td>
        </tr>  
        <tr ng-show="!building_components.length">
            <td colspan="4">No data found</td>
        </tr>
    </tbody>                     
</table> 
<table ng-show="project_info.building_component_process_type == 1" class="table custom custom table-hover">
    <thead>
        <tr>
            <th><b>S.No</b></th>
            <th><b>Date</b></th>
            <th><b>File Name</b></th>
            <th><b>File Type</b></th>
            <th class="text-center" width="150px"><b>Action</b></th>
        </tr>
        <tbody>
            <tr ng-show="building_components.length" ng-repeat="building_component in building_components">
                <td> @{{ $index + 1}} </td>
                <td> @{{ building_component.created_at }}</td>
                <td> @{{ building_component.file_name }}</td>
                <td> @{{ building_component.file_type }}</td>
                <td class="text-center">
                    <a download="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}" href="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                    <a href="javascript:void(0)" ng-click="getDocumentViews(building_component) "data-url="{{ url('/') }}/get-enquiry-document/@{{ buildingComponentUpload.id }}"><i class="document-modal fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                    {{-- <a target="_blank" href="{{ asset("public/uploads/") }}/@{{ building_component.file_path }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a> --}}
                </td>
            </tr>
            <tr ng-show="!building_components.length && !building_component.detail.length">
                <td colspan="4"> No data found </td>
            </tr>
        </tbody>
    </thead>
</table> 
<form id="building_component__commentsForm" ng-submit="sendComments('building_components','Admin', enqData.customer_info.id)" class="input-group mt-3">
    <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-3">
    <a class="text-primary p-0 btn"  ng-show="enquiry_comments.building_components" ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
        <i class="fa fa-eye"></i>  Previous chat history
    </a>
</div> 