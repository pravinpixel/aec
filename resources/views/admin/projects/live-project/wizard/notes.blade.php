<style>
    .ck-restricted-editing_mode_standard{
        height:300px;
    }
</style>
<div class="">
    <div class="row p-2">
        <div class="col">
            <form action="">
                <p class="h5 mt-2">TrePrefab(customer)comments</p>   
                 <textarea  ng-model="customer_comments"  id="customer_comments" class="d-none" readonly></textarea>
            </form>
        </div>
        <div class="col">
            <p class="h5 mt-2">AECPrefab comments</p>
                <form action="">
                    <textarea ng-model="admin_comments"  id="admin_comments" class="d-none"></textarea>
                </form>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        {{-- <button class="btn btn-primary m-2" ng-click="getAdminCKValue()">submit</button> --}}
                    </div>
                </div>
        </div>
    </div> 
</div>  

<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a ng-click= "storegeneralinfo()" ng-show="SubmitRoute" class="btn btn-primary">Close</a>
    <a ng-click= "submitgeneralinfo()" ng-show="SubmitRoute" class="btn btn-primary" style="display: none;">Complete project</a>
</div>

