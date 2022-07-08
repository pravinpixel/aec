<div class="p-2">
    <div class="card border-primary border my-3 col-md-6 mx-auto">
        <div class="card-body">
            <h5 class="card-title h3 text-primary">Invoice Overview </h5>
            <p class="card-text">Status From 24/7</p>
        </div>
    </div>
</div>
<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>