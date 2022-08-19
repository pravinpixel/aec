<table class="table custom m-0 table-hover">
    <tbody> 
        <tr ng-if="project_info.project_name != null">
            <td width="30%"><b>Project Name</b></td>
            <td>:</td>
            <td>@{{ project_info.project_name }}</td>
        </tr> 
        <tr ng-if="project_info.site_address != null">
            <td><b>Construction Site Address</b></td>
            <td>:</td>
            <td>@{{ project_info.site_address }}</td>
        </tr> 
        <tr ng-if="project_info.contact_person != null">
            <td><b>Contact Person name</b></td>
            <td>:</td>
            <td>@{{ project_info.contact_person }} </td>
        </tr> 
        <tr ng-if="customer_info.email != null">
            <td><b>Email</b></td>
            <td>:</td>
            <td>@{{ customer_info.email }}</td>
        </tr> 
        <tr ng-if="customer_info.mobile_no != null">
            <td><b>Contact number</b></td>
            <td>:</td>
            <td>@{{ customer_info.mobile_no }}</td>
        </tr> 
        <tr ng-if="project_info.secondary_mobile_no != null">
            <td><b>Secondary Contact number</b></td>
            <td>:</td>
            <td>@{{ project_info.secondary_mobile_no }}</td>
        </tr> 
        <tr ng-if="project_info.zipcode != null">
            <td><b>Zip Code</b></td>
            <td>:</td>
            <td>@{{ project_info.zipcode }}</td>
        </tr> 
        <tr ng-if="project_info.place != null">
            <td><b>City</b></td>
            <td>:</td>
            <td>@{{ project_info.place }}</td>
        </tr> 
        <tr ng-if="project_info.state != null">
            <td><b>State</b></td>
            <td>:</td>
            <td>@{{ project_info.state }}</td>
        </tr> 
        <tr ng-if="project_info.country != null">
            <td><b>Country</b></td>
            <td>:</td>
            <td>@{{ project_info.country }}</td>
        </tr> 
        <tr ng-if="project_info.project_type.project_type_name != null">
            <td><b>Type of Project</b></td>
            <td>:</td>
            <td>@{{ project_info.project_type.project_type_name }}</td>
        </tr> 
        <tr ng-if="project_info.building_type.building_type_name != null">
            <td><b>Type of Building</b></td>
            <td>:</td>
            <td>@{{ project_info.building_type.building_type_name }}</td>
        </tr> 
        <tr ng-if="project_info.no_of_building != null">
            <td><b>No. of Buildings</b></td>
            <td>:</td>
            <td>@{{ project_info.no_of_building }}</td>
        </tr> 
        <tr ng-if="project_info.delivery_type.delivery_type_name != null">
            <td><b>Type of Delivery</b></td>
            <td>:</td>
            <td>@{{ project_info.delivery_type.delivery_type_name }}</td>
        </tr> 
        <tr ng-if="project_info.project_delivery_date != null">
            <td><b>Delivery Date</b></td>
            <td>:</td>
            <td>@{{ project_info.project_delivery_date | date:'dd-MM-yyyy' }}</td>
        </tr>  
        <tr ng-if="project_info.customerremarks != null">
            <td><b>Remarks</b></td>
            <td>:</td>
            <td>@{{ project_info.customer.remarks }}</td>
        </tr> 
    </tbody>
</table>
<form id="project_information__commentsForm" ng-submit="sendComments('project_information','Admin', enqData.customer_info.id)" class="input-group mt-3">
    <input required type="text" ng-model="project_information__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-2">
    <a class="text-primary p-0 btn" ng-show="enquiry_comments.project_information" ng-click="showCommentsToggle('viewConversations', 'project_information', 'Project Information')">
        <i class="mdi mdi-eye"></i>  Previous chat history
    </a>
</div>