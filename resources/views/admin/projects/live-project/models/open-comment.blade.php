<div class="col-6">
    <form id="Inbox__commentsForm">
        <div class="d-flex">
            <input  type="text"  ng-model="inlineComments" id="inlineComments" name="inlineComments" class="form-control rounded-pill" placeholder="Type here..."/>
            <button class="btn btn-primary rounded-pill mx-2" type="button" ng-click="sendInboxComments('Admin')">Send</button>
        </div>
    </form>
</div> 