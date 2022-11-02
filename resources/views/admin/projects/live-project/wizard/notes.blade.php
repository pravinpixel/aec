<div class="">
    {{-- <p class="h5 mt-2">General Notes</p> --}}
    <div class="row p-2">
        <div class="col">
            <p class="h5 mt-2">AECPrefab comments</p>
            <div class="textEditorWrapper d-none">
                <form action="">
                    <textarea ng-model="documentary_content" id="aec_admin"></textarea>
                    <p>@{{ documentary_content }}</p>
                    
                </form>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary m-2" ng-click="getAdminCKValue()">submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <form action="">
                <p class="h5 mt-2">TrePrefab(customer)comments</p>   
                 <textarea  ng-model="documentary_content"  id="aec_customer"></textarea>
            </form>
        </div>
    </div>
    {{-- <div class="form-floating" id="additional_info_text_editor">
        <div dx-html-editor="htmlEditorOptions"> </div>
    </div>
     --}}
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
<script> 
    $(document).ready(function() { 
        $('.textEditorWrapper').removeClass('d-none');  
        SetEditor('#aec_admin');
        SetEditor('#aec_customer');
    });
</script>

