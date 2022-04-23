<form name="teamSetupForm" id="createTeamSetupForm" ng-submit="teamSetupFormSubmit()">
    <div class="col-md-11 mx-auto p-4">
        <h3 class="h3 text-center mb-4">Create Team</h3>
        <div class="card">
            <div class="card-header">
                <div class="row m-0">
                    <div class="col-4">
                        <div class="d-flex">
                            <select name="role" id="role"ng-model="selectedTemplate" class="form-select" ng-change="getTemplateChange(selectedTemplate)">
                                <option value="">@lang('global.select_template')</option>
                                <option value="@{{ template.id }}" ng-repeat="template in templateList"> @{{ template.template_name }}</option>
                            </select> 
                            <a href="#" title="Add template" data-bs-toggle="modal"data-bs-target="#add-template-modal" class="link btn btn-primary"> <span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="col ms-auto d-flex">
                        <select name="role" id="role" ng-model="teamRole.role"  class="form-select">
                            <option value="">@lang('project.select')</option>
                            <option value="@{{ role }}" ng-repeat="role in roles"> @{{ role.name }}</option>
                        </select> 
                        <div class="col-3">
                            <a href="" class="link btn btn-secondary w-100" ng-click="addResource(teamRole.role)"> + Add Resource </a>
                        </div>
                    </div>
                </div>
            </div>
         
            <div class="card-body">
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
                                        <div class="product-name"> @{{product.first_Name}}</div>
                                    </div>
                                </div>
                                    </div>
                                <a class="btn btn-light" ng-click="removeResource($key)"><i class="text-danger fa fa-trash"></i></a>
                            </div>
                        </div>
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
@include('admin.projects.add-tamplate-modal')

