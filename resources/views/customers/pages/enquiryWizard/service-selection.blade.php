<form id="profileForm" method="post" action="#" class="form-horizontal">
                                    
    <div class="row m-0 justify-content-center" >
        <label class="col-md-4 p-2" for="one_1_check" ng-repeat="service in services">
            <div class="lable-check  p-3 shadow-sm border"> 
                <input style="transform:scale(1.6)" ng-checked="serviceList.indexOf(service.id) > -1 " ng-model="active" type="checkbox" value="@{{ service.id  }}" name="@{{ service.service_name  }}" class="m-2" ng-change="changeService(service.id, active)" >
                <span>@{{ service.service_name }}</span>
            </div>
        </label> 		 
    </div>
</form>