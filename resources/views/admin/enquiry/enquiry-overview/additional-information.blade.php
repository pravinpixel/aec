<small class="badge rounded-circle  bg-danger" ng-show="enquiry_active_comments.add_info > 0"> @{{ enquiry_active_comments.add_info   }}</small>
<div>
    <div class="form-floating" id="additional_info_text_editor" style="pointer-events: none">
        <div dx-html-editor="htmlEditorOptions" contenteditable="true"> </div>
    </div>
    <form id="add_info__commentsForm" ng-submit="sendComments('add_info','Admin', enqData.customer_info.id)" class="input-group mt-3">
        <input required type="text" ng-model="add_info__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
        <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
    </form>  
    <div class="text-end pt-3">
        <a class="text-primary p-0 btn" ng-show="enquiry_comments.add_info"  ng-click="showCommentsToggle('viewConversations', 'add_info', 'Additional Information')">
            <i class="fa fa-eye"></i>  Previous chat history
        </a>
    </div>
</div>