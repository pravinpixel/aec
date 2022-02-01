<form id="serviceSelection" name="serviceSelection" ng-submit="submitService()" method="post" class="form-horizontal" novalidate>
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item" ng-repeat="(index,outputType) in outputTypes">
            <a href="#tab_@{{ outputType.id }}_content" data-bs-toggle="tab" aria-expanded="true" class="nav-link @{{ index == 0 ? 'active' :'' }}">
                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                <span>@{{ outputType.output_type_name }}</span>
            </a>
        </li> 
    </ul>
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane @{{ index == 0 ? 'active' :'' }}"  id="tab_@{{ outputType.id }}_content" ng-repeat="(index,outputType) in outputTypes">
                <div class="row">
                    <label for="service_@{{ service.id }}"  ng-repeat="service in outputType.services" class="col-md-4 p-0 ps-2  d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" >
                        <div class="lable-check p-0 "> 
                            <input id="service_@{{ service.id }}"  style="transform:scale(1.6)" ng-checked="serviceList.indexOf(service.id) > -1"  ng-model="active" type="checkbox" value="@{{ service.id  }}" name="@{{ service.service_name  }}" class="m-2" ng-change="changeService(service.id, active)" >
                            <span>@{{ service.service_name }}</span>
                        </div>
                    </label> 
                </div>
            </div> 
        </div>
    </div>
    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#!/" class="btn btn-outline-primary">Previous</a></li>
            <li class="next list-inline-item float-end"><input ng-disabled="!serviceList.length" type="submit" name="submit" value="Next" class="btn btn-primary"></li>
        </ul>
    </div>
</form>
