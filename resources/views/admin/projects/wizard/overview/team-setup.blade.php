<ul>
    <li ng-repeat="(key,teamSetup) in teamSetups" class="">
        <strong>@{{ teamSetup.role.name }}</strong>
        <div class="row m-0">
            <div ng-repeat="(key,team) in teamSetup.team" class="col-md-4 list-group-item border-0 "> 
                <i class="fa fa-check-circle text-primary me-1"></i>
                @{{ team }}
            </div>
        </div>
    </li>
</ul>