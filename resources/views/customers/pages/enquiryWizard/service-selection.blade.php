<form id="profileForm" method="post" action="#" class="form-horizontal">
                                    
    <div class="row m-0 justify-content-center" >
        <label class="col-md-4 p-2" for="one_1_check" ng-repeat="service in services">
            <div class="lable-check  p-3 shadow-sm border"> 
                <input style="transform:scale(1.6)"  ng-model="service.selected" type="checkbox" value="@{{ service.id  }}" name="@{{ service.service_name  }}" class="m-2" id="one_1_check">
                <span>@{{ service.service_name }}</span>
            </div>
        </label> 		 
    </div>
</form>