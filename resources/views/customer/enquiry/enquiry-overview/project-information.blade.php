<small class="comments-count" ng-if="enquiry_active_comments.project_information > 0"> @{{ enquiry_active_comments.project_information   }}</small>
<table class="table custom m-0 table-hover">
    <tbody>
        <tr ng-if="enquiry.project_infos.project_name != null">
            <td width="30%"><b>Project Name</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.project_name }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.site_address != null">
            <td><b>Construction Site Address</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.site_address }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.contact_person != null">
            <td><b>Contact Person name</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.contact_person }} </td>
        </tr> 
        <tr ng-if="customer_info.email != null">
            <td><b>Email</b></td>
            <td>:</td>
            <td>@{{ customer_info.email }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.mobile_no != null">
            <td><b>Contact number</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.mobile_no }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.secondary_mobile_no != null">
            <td><b>Secondary Contact number</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.secondary_mobile_no }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.zipcode != null">
            <td><b>Zip Code</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.zipcode }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.place != null">
            <td><b>City</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.place }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.state != null">
            <td><b>State</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.state }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.country != null">
            <td><b>Country</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.country }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.project_typenquiry.project_infos.project_type_name != null">
            <td><b>Type of Project</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.project_typenquiry.project_infos.project_type_name }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.building_typenquiry.project_infos.building_type_name != null">
            <td><b>Type of Building</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.building_typenquiry.project_infos.building_type_name }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.no_of_building != null">
            <td><b>No. of Buildings</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.no_of_building }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.delivery_typenquiry.project_infos.delivery_type_name != null">
            <td><b>Type of Delivery</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.delivery_typenquiry.project_infos.delivery_type_name }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.project_delivery_date != null">
            <td><b>Delivery Date</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.project_delivery_date }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.state != null">
            <td><b>State</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.state }}</td>
        </tr> 
        <tr ng-if="enquiry.project_infos.customerremarks != null">
            <td><b>Remarks</b></td>
            <td>:</td>
            <td>@{{ enquiry.project_infos.customer.remarks }}</td>
        </tr> 
    </tbody>
</table>
<form id="project_information__commentsForm" ng-submit="sendComments('project_information','Customer')" class="input-group mt-3">
    <input required type="text" ng-model="project_information__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-2">
    <a class="text-primary p-0 btn" ng-show="enquiry_comments.project_information" ng-click="showCommentsToggle('viewConversations', 'project_information', 'Project Information')">
        <i class="mdi mdi-eye"></i>  Previous chat history
    </a>
</div>