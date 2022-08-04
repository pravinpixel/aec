<form name="teamSetupForm" id="createTeamSetupForm" ng-submit="teamSetupFormSubmit()">
    <div class="col-md-8 mx-auto p-4">
        <h3 class="h3 text-center mb-4">Create Team</h3>
        <div class="row m-0 mb-2">
            <div class="col-md-4">
                <select name="role" id="role" ng-model="teamRole.role"  class="form-select">
                    <option value="">@lang('project.select')</option>
                    <option value="@{{ role }}" ng-repeat="role in roles"> @{{ role.name }}</option>
                </select> 
            </div>
            <div class="col-md-8">
                <a href="" class="link btn btn-secondary " ng-click="addResource(teamRole.role)"> + Add Resoure </a>
            </div>
        </div>
        <div ng-repeat="($key, teamSetup) in teamSetups">
            <div class="row m-0 mb-2">
                <div class="col-md-4">
                    <input type="text"  get-role-user  data-value="@{{ $key }}" class="form-control" readonly ng-model="teamSetup.role.name">
                </div>
                <div class="col-md-8">
                    <div class="btn-group w-100 border rounded"> 
                        <div dx-tag-box="tagBox.customTemplate" dx-item-alias="product" select-user>
                            <div data-options="dxTemplate: { name: 'customItem' }">
                            <div class="custom-item" dx-click="getItem($key)">
                                <div class="product-name"> @{{product.first_name}}</div>
                            </div>
                        </div>
                            </div>
                        <a class="btn btn-light" ng-click="removeResource($key)"><i class="text-danger fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <a href="#!/platform" class="btn btn-light float-start">Prev</a>
        <input type="submit" name="submit" value="Next" class="btn btn-primary">
    </div>
</form>
