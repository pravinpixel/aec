@extends('admin.setup.index')
@section('setup-content')
    <section ng-controller="permissionControler">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="{{ route('setup.roles') }}" class="nav-link">Role</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setup.permissions',1) }}" class="nav-link active fw-bold text-primary">Permissions</a>
            </li>
        </ul>
        <div class="card">
            <form id="permissionForm" ng-model="permissionForm" ng-submit="setPermission({{ $li_role_data->id }})">
                <div class="card-body">
                    <div class="table custom-responsive">
                        <table class="table custom table-bordered permission-table custom">
                            <thead>
                                <tr class="bg-primary-light">
                                    <td colspan="5">
                                        <div class="row m-0 justify-content-between align-items-center">
                                            <div class="col font-16 fw-bold text-white">
                                                {{ ucfirst($li_role_data->name) }} {{ trans(' Permission') }}
                                            </div>
                                            <div class="col-4 p-0">
                                                <select onchange="changeRole(this.value)" class="form-select form-select-sm">
                                                    <option value="">-- select --</option> 
                                                    @foreach ($check_permission_master as $role)
                                                        <option {{ $role->id == request()->route()->id  ? 'selected' : ''}} value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="bg-light">
                                    <td rowspan="2" class="text-center fw-bold">Module Name</td>
                                </tr>
                                <tr class="bg-light">
                                    <td class="text-center fw-bold">{{ trans('permission.view') }} </td>
                                    <td class="text-center fw-bold">{{ trans('permission.add') }}</td>
                                    <td class="text-center fw-bold">{{ trans('permission.edit') }} </td>
                                    <td class="text-center fw-bold">{{ trans('permission.delete') }}</td>
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
    </section>
@endsection
@push('custom-scripts')
    <script>
        app.controller('permissionControler', function($scope, $http,API_URL){
            $scope.setPermission = (role_id) => {
                $http({
                    method: 'PUT',
                    url: `${API_URL}set-permission/${role_id}`,
                    data: $scope.permissionForm
                }).then(function successCallback(res) {
                    if(res.data.status == true){
                        Message('success',res.data.msg);
                        return false;
                    }
                }, function errorCallback(error) {
                    return false;
                });
            }
            $scope.rolePermission = function () {
                $http({
                    method: 'GET',
                    url: `${API_URL}get-permission/{{ request()->route()->id }}`,
                }).then(function successCallback(res) {
                    if(res.data.status == true){
                        $scope.permissionForm = res.data.permission
                        return false;
                    } 
                }, function errorCallback(error) {
                    return false;
                }); 
            }
            $scope.rolePermission() 
            changeRole = (id) => {
                location.replace("{{ route('setup.permissions') }}" +'/'+id )
            }
        });
       
    </script>
@endpush