<ul class="nav nav-tabs nav-justified nav-bordered mb-3">
    <li class="nav-item">
        <a class="nav-link roleTab ng-pristine ng-untouched ng-valid ng-empty" id="v-pills-role-tab" ng-model="btnClass"
            href="#!/role" role="tab" aria-controls="v-pills-role" aria-selected="true">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block" ng-click="roleGetData()">Roles</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#permission" ng-click="rolePermission()" data-bs-toggle="tab" aria-expanded="false"
            class="nav-link active">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">Permissions</span>
        </a>
    </li>
</ul>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form id="permissionForm" name="permissionForm"
                        ng-submit="setPermission({{ $li_role_data->id }})">
                        <div class="card-body">

                            <div class="table custom-responsive">
                                <table class="table custom table-bordered permission-table custom">
                                    <thead>
                                        <tr>
                                            <th colspan="5">
                                                <div class="row m-0 justify-content-between align-items-center">
                                                    <div class="col lead fw-bold">
                                                        {{ ucfirst($li_role_data->name) }} {{ trans(' Permission') }}
                                                    </div>
                                                    <div class="col-4 p-0">
                                                        <select ng-model="check_permission"
                                                            ng-change="changePermission(check_permission)"
                                                            class="form-select">
                                                            <option value="">-- select --</option>
                                                            <option value="@{{ row.id }}"
                                                                ng-repeat="row in check_permission_master">
                                                                @{{ row.name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th rowspan="2" class="text-center">Module Name</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">{{ trans('permission.view') }} </th>
                                            <th class="text-center">{{ trans('permission.add') }}</th>
                                            <th class="text-center">{{ trans('permission.edit') }} </th>
                                            <th class="text-center">{{ trans('permission.delete') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        {!! GlobalService::permissionHtmlView($appPermissions, [])  !!}
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group text-end">
                                <input type="submit" value="{{ trans('permission.update') }}"
                                    class="btn bg-primary-2 btn-sm btn-info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
