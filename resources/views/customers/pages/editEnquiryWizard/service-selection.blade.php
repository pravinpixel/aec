<form id="serviceSelection" method="post" action="#" class="form-horizontal">
    <div class="row m-0 justify-content-center " >
        <label for="service_@{{ service.id }}" class="col-md-4 p-0 ps-2  d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="one_1_check" ng-repeat="service in services">
            <div class="lable-check  p-0 "> 
                <input id="service_@{{ service.id }}"  style="transform:scale(1.6)" ng-checked="serviceList.indexOf(service.id) > -1 " ng-model="active" type="checkbox" value="@{{ service.id  }}" name="@{{ service.service_name  }}" class="m-2" ng-change="changeService(service.id, active)" >
                <span>@{{ service.service_name }}</span>
            </div>
        </label> 		 
    </div>
</form>
 