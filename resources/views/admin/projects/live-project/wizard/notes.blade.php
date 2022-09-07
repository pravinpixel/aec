<div class="p-2 col-md-10 mx-auto my-3">
    <p class="h5 mt-2">General Notes</p>
    <div class="form-floating" id="additional_info_text_editor">
        <div dx-html-editor="htmlEditorOptions"> </div>
    </div>
</div> 
<div class="row" >
    <div class="col-8">
        <project-open-comment  data="
        {'modalState':'viewConversations',
        'type': 'notes', 
        'header':'notes',
        'project_id':projectId ,
        send_by: {{ Admin()->id }},
        'from':'Admin'
        }"/> 
    </div>                                
    <div class="col-4">
        <project-comment data="
        {'modalState':'viewConversations',
        'type': 'notes', 
        'header':'notes',
        'project_id':projectId ,
        send_by: {{ Admin()->id }},
        'from':'Admin'
        }"/>
    </div>                                
</div>

<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a ng-click= "storegeneralinfo()" ng-show="SubmitRoute" class="btn btn-primary">Close</a>
    <a ng-click= "submitgeneralinfo()" ng-show="SubmitRoute" class="btn btn-primary" style="display: none;">Complete project</a>
</div>