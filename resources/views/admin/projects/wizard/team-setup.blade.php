<form name="teamSetupForm" id="teamSetupForm" ng-submit="teamSetupForm()">
<div class="col-md-8 mx-auto p-4">
    <h3 class="h3 text-center mb-4">Create Team</h3>
    {{-- <div class="row mb-2 mx-0">
        <div class="col-md-4">
            <label for="">Lead Team</label>
        </div>
        <div class="col-md-8">
            <select name="" id="" class="form-select ">
                <option value=""> -- select ---</option>
            </select>
        </div>
    </div>
   
    <div class="row m-0 mb-2">
        <div class="col-md-4">
            <select name="" id="" class="form-select ">
                <option value="">Project Manager</option>
            </select>
        </div>
        <div class="col-md-8">
            <div class="btn-group w-100 border rounded">
                <select name="" id="" class="border-0 form-select ">
                    <option value=""> -- select ---</option>
                </select>
                <button class="btn btn-light"><i class="text-danger fa fa-trash"></i></button>
            </div>
        </div>
    </div> --}}
    <div ng-repeat="($key, teamSetup) in teamSetups  track by $index">
        
        <div class="row m-0 mb-2">
            <div class="col-md-4">
                <select name="role" id="role" ng-model="teamSetup.role" data-value="@{{ $key }}" get-role-user ng-change="getRoleUser(teamSetup.role)" class="form-select">
                    <option value="">@lang('project.select')</option>
                    <option value="@{{ role.id }}" ng-repeat="role in roles"> @{{ role.name }}</option>
                </select> 
            </div>
            <div class="col-md-8">
                <div class="btn-group w-100 border rounded"> 
                    <div dx-tag-box="tagBox.customTemplate" dx-item-alias="product" select-user>
                        <div data-options="dxTemplate: { name: 'customItem' }">
                          <div class="custom-item" dx-click="getItem($key)">
                            <div class="product-name"> @{{product.first_Name}}</div>
                          </div>
                        </div>
                      </div>
                    <a class="btn btn-light" ng-click="removeResource($key)"><i class="text-danger fa fa-trash"></i></a>
                </div>
            </div>
        </div>   
    </div>
   
    <div class="text-end px-2 my-s">
        <a href="" class="link btn btn-secondary btn-sm" ng-click="addResource()"> + Add Resoure </a>
    </div>
</div>
<div class="card-footer text-end">
    <a href="#!/platform" class="btn btn-light float-start">Prev</a>
    <input type="submit" value="Next" class="btn btn-primary">
</div>
</form>
