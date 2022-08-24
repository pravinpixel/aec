<div dx-html-editor="htmlEditorOptions" contenteditable="true"> </div>

<input type="hidden" id = "login_id" value = "{{Admin()->id}}">
<form id="notes__commentsForm" ng-submit="sendComments('notes','Admin', {{Admin()->id}})" class="input-group mt-3">
    <input required type="text" ng-model="notes__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-2">
    <a class="text-primary p-0 btn" ng-show="project_comments.notes" ng-click="showCommentsToggle('viewConversations', 'notes', 'notes')">
        <i class="mdi mdi-eye"></i>  Previous chat history
    </a>
</div>