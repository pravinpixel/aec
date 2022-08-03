<div id="assing-viewConversations-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog h-100 modal-right" style="width:100% !important">            
        <div class="modal-content h-100 d-flex justify-content-center bg-light align-items-center" >
            <div class="card w-100 h-100">
                <div class="card-header bg-primary pt-3 d-flex justify-content-between align-items-center">
                    <h4 class="text-white text-center m-0">  {{--  @{{ chatHeader }} --}} Chat Box  </h4> 
                    <button type="button" class="btn rounded-pill btn-outline-light" data-bs-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                </div>
                <div class="card-body m-0 p-0 py-3 h-100" style="min-height:70vh;overflow:auto">
                    <ul class="conversation-list h-100">
                        <li class="clearfix @{{ msg.created_by == 'admin_role'? 'Admin' : 'Customer' }}_odd" ng-repeat="msg in commentsData">
                            <div class="chat-avatar">
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"  alt="@{{ msg.created_by }} Image">                                    
                                <i>@{{ msg.created_by }}</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap"> 
                                    <p class="m-0">
                                       @{{ msg.comments }}
                                    </p> 
                                    <small  class="text-secondary">@{{ msg.created_at | date:'hh:mm:ss a'  }}</small>
                                </div>
                            </div> 
                        </li> 
                    </ul>
                </div>
                <div class="card-footer bg-light">
                    <form id="Inbox__commentsForm" ng-submit="sendAssignCostEstiComments('{{ userRole()->slug }}_role', 'cost_estimation_assign')" class="d-flex align-items-center">
                        <input type="text" required ng-model="inlineComments" name="inlineComments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                        <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                    </form> 
                </div>
            </div> 
            <!-- end row -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->