<style>
    .ck-content{
        height:300px;
    }
</style>
<div class="row p-2" >
    <div class="col-6">
        <form action="">
            <p class="h5 mt-2">AECPrefab comments</p>
            <textarea ng-bind="ckText"  id="aec_admin_client_page" class="d-none"></textarea>
        </form>
    </div>
    <div class="col-6">
        <form action="">
            <p class="h5 mt-2">@{{ projectName }} comments</p>   
            <textarea id="aec_client_client_page" ng-model="send_to_admin"  class="d-none"></textarea>
        </form>
        <div class="row">
            <div class="col d-flex justify-content-end">
            </div>
        </div>
    </div>
</div>  

<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a ng-click= "submitgeneralinfo()" ng-show="SubmitRoute" class="btn btn-primary">Close</a>
</div> 