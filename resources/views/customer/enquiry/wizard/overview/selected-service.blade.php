<ul>
    <li ng-repeat="(key,outputType) in outputTypes" class=""> @{{ key }}
        <ul  class="row m-0 ">
            <li ng-repeat="service in outputType" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
        </ul>
    </li>
</ul>  