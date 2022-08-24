<div class="p-2"> 
    <div class="row m-0">
       
        <div class="tab-pane p-3  show active" id="Sharepoint">
            <div class="dx-viewport">
                <div class="demo-container">
                  <div id="file-manager" class="dx-widget dx-filemanager" style="height: 450px;">
                    <div class="dx-filemanager-notification-container dx-widget">
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-8">
        <project-open-comment  data="
        {'modalState':'viewConversations',
        'type': 'document', 
        'header':'document',
        'project_id':4 ,
        send_by: {{ Admin()->id }},
        'from':'Admin'
        }"/> 
    </div>                                
    <div class="col-4">
        <project-comment data="
        {'modalState':'viewConversations',
        'type': 'document', 
        'header':'document',
        'project_id':4 ,
        send_by: {{ Admin()->id }},
        'from':'Admin'
        }"/>
    </div>                                
</div>
<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>

 