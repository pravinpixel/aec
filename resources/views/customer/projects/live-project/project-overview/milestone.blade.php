<div>
    <div class="header gantt-demo-header">
        <ul class="gantt-controls bg-light">
            <li class="gantt-menu-item"><a data-action="collapseAll"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_collapse_all_24.png">Collapse All</a></li>
            <li class="gantt-menu-item gantt-menu-item-last"><a data-action="expandAll"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_expand_all_24.png">Expand All</a></li>
            <li class="gantt-menu-item"><a data-action="undo"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_undo_24.png">Undo</a></li>
            <li class="gantt-menu-item"><a data-action="redo"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_redo_24.png">Redo</a></li>
            <li id="fullscreen_button"   class="gantt-menu-item  gantt-menu-item-last"><a ><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_fullscreen_24.png">Fullscreen</a></li>
            <li class="gantt-menu-item gantt-menu-item-right gantt-menu-item-last"><a data-action="zoomToFit"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_to_fit_24.png">Zoom to Fit</a></li>
            <li class="gantt-menu-item gantt-menu-item-right"><a data-action="zoomOut"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_out.png">Zoom Out</a></li>
            <li class="gantt-menu-item gantt-menu-item-right"><a data-action="zoomIn"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_in.png">Zoom In</a></li>
        </ul>
    </div> 
    <div class="demo-main-content">
        <div id="gantt_here"></div>
    </div> 
</div> 
<input type="hidden" id = "login_id" value = "{{Customer()->id}}">
<form id="milestone__commentsForm" ng-submit="sendComments('milestone','Customer', {{Customer()->id}})" class="input-group mt-3">
    <input required type="text" ng-model="milestone__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-2">
    <a class="text-primary p-0 btn" ng-show="project_comments.milestone" ng-click="showCommentsToggle('viewConversations', 'milestone', 'milestone')">
        <i class="mdi mdi-eye"></i>  Previous chat history
    </a>
</div>