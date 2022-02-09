<form class="row" ng-submit="submitAdditionalinfoForm()" name="additionalinfoForm" novalidate id="additionalInformation">
    <div class="col-sm-8 mx-auto">
        <div>
            <h3 class="text-center">Specify additional details</h3>
            <div class="py-3">
                <div class="form-floating">
                 
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" ng-model="additionalInfo" style="height: 100px;"></textarea>
                    {{-- <div text-angular="text-angular" name="additionalInfo" ng-model="additionalInfo" ta-disabled='disabled'>
                         
                    </div> 
                   
                    <input class="d-none" ta-bind="text" ng-model="additionalInfo" ta-readonly='disabled'/>  --}}
                </div> 
            </div>
        </div>
    </div>
    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#/building-component" class="btn btn-light border shadow-sm">Prev</a></li>
            <li class="next list-inline-item float-end"><input  class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
        </ul>
    </div> 
     
</form> 
<style> 
    .additionalInformation .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style>  
 