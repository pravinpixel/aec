<div class="p-2 col-md-10 mx-auto my-3" id="additional_info_text_editor">
    <div text-angular="text-angular" name="live_project_notes" ng-model="live_project_notes" ta-disabled='disabled'>
    </div>  
</div> 

<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>