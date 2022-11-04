<style>
    .ck-restricted-editing_mode_standard{
        height:300px;
    }
</style>
<div class="row p-2" >
    <div class="col">
        <form action="">
            <p class="h5 mt-2">AECPrefab comments</p>
            <textarea ng-model="ckText"  id="aec_admin_client_page" class="d-none"></textarea>
        </form>
    </div>
    <div class="col">
        <form action="">
            <p class="h5 mt-2">@{{ projectName }} comments</p>   
            <textarea id="aec_client_client_page" ng-model="send_to_admin" class="d-none"></textarea>
        </form>
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button class="m-2 btn btn-primary" ng-click="clientComment()">submit</button>
            </div>
        </div>
    </div>
</div>  

<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a ng-click= "submitgeneralinfo()" ng-show="SubmitRoute" class="btn btn-primary">Close</a>
</div> 