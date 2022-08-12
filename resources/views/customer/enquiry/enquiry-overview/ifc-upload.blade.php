<table class="table table-bordered m-0 table-striped" ng-init="total = 0 ">
    <tbody > 
        <tr ng-repeat="building_component in enquiry.building_components"  ng-show="building_component.detail.length">
            <td class="text-left" width="150px">
                <b>@{{ building_component.wall }}</b>
            </td>
            <td>
                <div class="py-2" ng-repeat="detail in building_component.detail">
                    <table class="shadow-sm custom border border-dark mb-0 table table-bordred bg-white">
                        <thead class="table-secondary text-dark">
                            <tr>
                                <th>Floor</th>
                                <th>Type of Delivery</th>
                                <th>Total Area </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: left !important">@{{ detail.floor }} </td>
                                <td>@{{ detail.delivery_type.delivery_type_name }}</td>
                                <td >@{{ building_component.totalWallArea }}</td> 
                            </tr>
                        </tbody> 
                    </table>
                    <table class="shadow-sm border table-bordered border-dark table m-0 bg-white">
                        <thead>
                            <tr> 
                                <td><b>Name</b></td>
                                <td><b>Thickness (mm)</b></td>
                                <td><b>Breadth (mm)</b></td>
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
        <tr ng-show="!enquiry.building_components.length">
            <td colspan="4">No data found</td>
        </tr>
    </tbody>                     
</table>  
<form id="building_component__commentsForm" ng-submit="sendComments('building_components','Customer')" class="input-group mt-3">
    <input required type="text" ng-model="building_components__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-3">
    <a class="text-primary p-0 btn"   ng-show="enquiry_comments.building_components"  ng-click="showCommentsToggle('viewConversations', 'building_components', 'Building Components')">
        <i class="fa fa-eye"></i>  Previous chat history
    </a>
</div> 