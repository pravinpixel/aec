<form class="row" ng-submit="submitAdditionalinfoForm()" name="additionalinfoForm" novalidate id="additionalInformation">
    <div class="col-sm-8 mx-auto">
        <div>
            <h3 class="text-center">Specify additional details</h3>
            <div class="py-3">
                <div class="form-floating">
                    {{-- <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" ng-model="additionalInfo" style="height: 100px;"></textarea> --}}
                    <div text-angular="text-angular" name="additionalInfo" ng-model="additionalInfo" ta-disabled='disabled'></div>
                    <input  type="hidden" ng-model="additionalInfo">
                    <div ng-bind-html="additionalInfo"></div>
                    <div class="d-none" ta-bind="text" ng-model="additionalInfo" ta-readonly='disabled'></div>
                </div> 
            </div>
        </div>
    </div>
    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#!/building-component" class="btn btn-outline-primary">Previous</a></li>
            <li class="next list-inline-item float-end"><input  class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
        </ul>
    </div> 
     
</form> 
 