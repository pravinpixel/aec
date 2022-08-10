<div class="p-2 col-md-10 mx-auto my-3">
    <p class="h5 mt-2">General Notes</p>
    <div class="form-floating" id="additional_info_text_editor">
        <div dx-html-editor="htmlEditorOptions"> </div>
    </div>
</div> 

<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a ng-click= "submitgeneralinfo()" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>