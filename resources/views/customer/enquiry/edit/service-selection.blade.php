<form id="serviceSelection" method="post" action="#" class="form-horizontal">
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
                    <label for="service_@{{ service.id }}" class="col-md-4 p-0 ps-2  d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="one_1_check" ng-repeat="service in  outputType.services">
                        <div class="lable-check  p-0 "> 
                            <input id="service_@{{ service.id }}"  style="transform:scale(1.6)" ng-checked="serviceList.indexOf(service.id) > -1 " ng-model="active" type="checkbox" value="@{{ service.id  }}" name="@{{ service.service_name  }}" class="m-2" ng-change="changeService(service.id, active)" >
                            <span>@{{ service.service_name }}</span>
                        </div>
                    </label> 	
                </div>
            </div> 
        </div>
    </div>
    <input class="hidden-input" type="text" name="service_selection_mandatory" ng-model="service_selection_mandatory" required>
</form>