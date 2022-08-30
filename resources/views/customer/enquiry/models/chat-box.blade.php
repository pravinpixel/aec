<div>
    <button type="button" class="btn btn-info rounded-pill btn-sm" ng-click="showCommentsToggle()" id="customer_chat"><i class='far fa-comment-dots'></i></button>
    <div id="viewConversations-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog h-100 modal-right" style="width:100% !important">            
            <div class="modal-content h-100 d-flex justify-content-center bg-light align-items-center" >
                <div class="card w-100 h-100">
                    <div class="card-header bg-primary pt-3 d-flex justify-content-between align-items-center">
                        <h4 class="text-white text-center m-0">   Chat Box  </h4>  
                        <button type="button" class="btn rounded-pill btn-outline-light" data-bs-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                    </div>
                    <div class="card-body m-0 p-0 py-3 h-100" id="chat-scroll" scroll-glue style="min-height:70vh;overflow:auto">
                        <ul class="conversation-list h-100">
                            <li class="clearfix @{{ msg.created_by }}_odd" ng-repeat="msg in commentsData track by msg.id">
                                <div class="chat-avatar">
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"  alt="@{{ msg.created_by }} Image">                                    
                                    <i>@{{ msg.created_by }}</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap"> 
                                        <p class="m-0">
                                            @{{ msg.comments }}
                                        </p> 
                                        <small class="timesOfMsg">@{{ msg.created_at | date:'hh:mm:ss a'  }}</small>
                                    </div>
                                </div> 
                            </li> 
                        </ul>
                    </div>
                    <div class="card-footer bg-light d-flex">
                        <form id="Inbox__commentsForm"  class="d-flex align-items-center">
                            <input type="text"  ng-model="inlineComments" id="inlineComments" name="inlineComments" class="form-control rounded-pill me-2" placeholder="Type here...">
                            <button class="btn btn-primary rounded-pill" type="button" ng-click="sendInboxComments('Customer')"><i class="fa fa-send"></i></button>
                        </form> 
                    </div>
                </div>  
            </div><!-- /.modal-content -->
            
        </div>
    </div>
</div>