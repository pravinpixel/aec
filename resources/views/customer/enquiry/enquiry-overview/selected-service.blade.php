<small class="badge rounded-circle  bg-danger" ng-if="enquiry_active_comments.service > 0"> @{{ enquiry_active_comments.service   }}</small>
<ul>
    <li ng-repeat="(key,outputType) in enquiry.services" class=""> @{{ key }}
        <ul  class="row m-0 ">
            <li ng-repeat="service in outputType" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
        </ul>
    </li>
</ul>  
<form id="service__commentsForm" ng-submit="sendComments('service','Customer')" class="input-group mt-3">
    <input required type="text" ng-model="service__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-3">
    <a class="text-primary p-0 btn"  ng-show="enquiry_comments.service" ng-click="showCommentsToggle('viewConversations', 'service', 'Selected Services')">
        <i class="fa fa-eye"></i>  Previous chat history
    </a>
</div>