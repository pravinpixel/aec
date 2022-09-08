<form name="teamSetupForm" id="createTeamSetupForm" ng-submit="teamSetupFormSubmit()">
    <div class="col-md-11 mx-auto p-4">
        <h3 class="h3 text-center mb-4">Create Team</h3>
        <div class="card">
            <div class="card-header bg-light border shadow-sm">
                <div class="row m-0">
                    <div class="col-4 p-0">
                        <div class="btn-group border w-100">
                            <select title="Set as Template" class="form-select border-0" ng-change="getTemplateChange(selectedTemplate)" ng-model="selectedTemplate">
                                <option value="">@lang('global.select_template')</option>
                                <option value="@{{ template.id }}" ng-repeat="template in templateList"> @{{ template.template_name }}</option>
                            </select>
                            <a href="#" title="Add template" data-bs-toggle="modal" data-bs-target="#add-template-modal" class="link btn btn-success"> <i class="mdi mdi-plus-box-multiple"></i></a>
                            <button type="button" ng-click="editTemplate(selectedTemplate)" title="Overwrite Template" class="btn btn-primary btn-sm border-0"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" ng-click="deleteTemplate(selectedTemplate)" title="Delete Template" class="btn btn-danger btn-sm border-0"><i class="mdi mdi-trash-can"></i></button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <select name="role" id="role" ng-model="teamRole.role"  class="form-select border-0">
                                <option value="">@lang('project.select')</option>
                                <option value="@{{ role }}" ng-repeat="role in roles"> @{{ role.name }}</option>
                            </select> 
                            <button class="btn btn-warning" ng-click="addResource(teamRole.role)"> + Add Resource </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table m-0 table-borderless">
                    <tbody>
                        <tr ng-repeat="($key, teamSetup) in teamSetups">
                            <td>
                                <input type="text"  get-role-user  data-value="@{{ $key }}" class="form-control form-control" readonly ng-model="teamSetup.role.name">
                            </td>
                            <td>
                                <div dx-tag-box="tagBox.customTemplate" dx-item-alias="product" select-user>
                                    <div data-options="dxTemplate: { name: 'customItem' }">
                                        <div class="custom-item" dx-click="getItem($key)">
                                            <div class="product-name"> @{{product.first_name}}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm" ng-click="removeResource($key)"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div> 
    </div>
    <div class="card-footer text-end">
        <a href="#!/platform" class="btn btn-light float-start">Prev</a>
        <input type="submit" name="submit" value="Next" class="btn btn-primary">
    </div>
</form>
@include('admin.projects.add-tamplate-modal')
<style> 
    .Team_Setup .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 

