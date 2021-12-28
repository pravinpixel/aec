<form id="serviceSelection" method="post" action="#" class="form-horizontal">
                                    
    <div class="row m-0 justify-content-center" >
        <label class="col-md-4 p-2 " for="service_@{{ service.id }}" ng-repeat="service in services">
            <div class="lable-check service-label p-3 shadow-sm border"> 
                <input id="service_@{{ service.id }}" style="transform:scale(1.6)" ng-checked="serviceList.indexOf(service.id) > -1 " ng-model="active" type="checkbox" value="@{{ service.id  }}" name="@{{ service.service_name  }}" class="m-2" ng-change="changeService(service.id, active)" >
                <span>@{{ service.service_name }}</span>
            </div>
        </label> 		 
    </div>
</form>