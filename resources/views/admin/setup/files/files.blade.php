@extends('admin.setup.index')
@section('setup-content')
    <section ng-controller="folderController">

        <!-- Primary Header Modal -->
        <div class="d-flex  flex-row-reverse">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#share-point-model">+ Add
                Folder</button>
        </div>
        <div id="share-point-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="share-point-modelLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="share-point-modelLabel">Add Share Point Folders</h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="folderModule" class="form-horizontal" novalidate="">
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Folder Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="share_point_folder_name" class="form-control has-error"
                                        placeholder="Type Here.." ng-model="share_point_folder_name" ng-required="true">
                                    <small class="help-inline text-danger ">This Fields is Required</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline form-radio-@{{ form_color }}">
                                            <input type="radio" ng-checked="is_active == 1" id="active" value="1"
                                                ng-model="is_active" name="is_active" class="form-check-input" ng-required>
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="is_active == 0" id="Deactive" value="0"
                                                ng-model="is_active" name="is_active" class="form-check-input" ng-required>
                                            <label class="form-check-label" for="Deactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btn-save"
                                    ng-click="store()">Submit</button>
                            </div>
                        </form>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(id,folder) in folders">
                    <td class="align-items-center" ng-bind="folder.name"></td>
                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ id }}" ng-checked="folder.status == 1"
                                data-switch="success" />
                            <label for="switch__@{{ id }}" data-on-label="On"
                                ng-click="changeFolderStatus(folder.id, folder.status)" data-off-label="Off"></label>
                        </div>
                        <span ng-if="folder.status == 1" class="d-none">1</span>
                        <span ng-if="folder.status == 0" class="d-none">0</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" data-bs-toggle="modal"
                                data-bs-target="#success-header-modals"
                                ng-click="togglesharePointFolderForm('edit', folder.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-danger rounded-pill  "
                                ng-click="deleteFolder(folder.id)"><i class="fa fa-trash"></i></button>
                        </div>

                    </td>
                </tr>
            </tbody>
        </table>


        {{-- update model --}}
        <div id="success-header-modals" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="success-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success">
                        <h4 class="modal-title" id="success-header-modalLabel">Edit Share Point Folder</h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="folderModule" class="form-horizontal" novalidate="">
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Folder
                                    Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="updated_share_point_folder_name"
                                        class="form-control has-error" placeholder="Type Here.." ng-model="editName"
                                        required>
                                    {{-- <small class="help-inline text-danger ">This Fields is Required</small> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="editStatus==1" id="active"
                                                name="editStatus" value="1" class="form-check-input" ng-required
                                                ng-model="editStatus">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="editStatus==0" id="Deactive"
                                                name="editStatus" value="0" class="form-check-input" ng-required
                                                ng-model="editStatus">
                                            <label class="form-check-label" for="Deactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btn-save"
                                    ng-disabled="folderModule.$invalid" ng-click="updateSharePoint()">Submit</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </section>
@endsection
@push('custom-scripts')
    <script>
        app.controller('folderController', function($scope, $http, API_URL, $rootScope) {

            $scope.store = () => {

                $http({
                    method: 'POST',
                    url: `${API_URL}admin/setup/files`,
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    data: {
                        'share_point_folder_name': $scope.share_point_folder_name,
                        'is_active': $scope.is_active
                    }
                }).then(function successCallback(response) {
                    $scope.folders = response.data.data;
                    $scope.getFolders();
                    $scope.share_point_folder_name = '';
                    $scope.is_active = '';
                    Message('success', 'created successfully!')
                    $('#share-point-model').modal('hide');
                }, function errorCallback(response) {
                    Message('danger', response.data.errors.name[0]);
                });


            }
            $scope.getFolders = () => {
                $http.get(`${API_URL}admin/setup/all-files`).then(function successCallback(response) {
                    $scope.folders = response.data.data;
                }, function errorCallback(response) {
                    Message('danger', response.data.errors.name[0]);
                });
            }
            $scope.getFolders();
            $scope.changeFolderStatus = (id, state) => {
                $http({
                    method: 'POST',
                    url: `${API_URL}admin/setup/state-change`,
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    data: {
                        'id': id,
                        'status': state
                    }
                }).then(function successCallback(response) {
                    Message('success', 'state changed sucessfully!');
                    $scope.getFolders();
                    console.log(response)
                }, function errorCallback(response) {
                    Message('danger', response.data.errors.name[0]);
                });
            }

            $scope.togglesharePointFolderForm = (type, id) => {
                console.log(type, id);
                if (type == 'edit') {
                    $http({
                        method: 'POST',
                        url: `${API_URL}admin/setup/get-edit-folder`,
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        data: {
                            'id': id,
                        }
                    }).then(function successCallback(response) {

                        $scope.editName = response.data.data.name;
                        $scope.editStatus = response.data.data.status;
                        $scope.editId = response.data.data.id;

                    }, function errorCallback(response) {
                        Message('danger', response.data.errors.name[0]);
                    });
                }
            }
            $scope.updateSharePoint = () => {
                var req = {
                    'id': $scope.editId,
                    'name': $scope.editName,
                    'status': $scope.editStatus
                };
                $http({
                    method: 'post',
                    url: `${API_URL}admin/setup/get-update-folder`,
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    data: {
                        'id': $scope.editId,
                        'name': $scope.editName,
                        'status': $scope.editStatus
                    }
                }).then(function successCallback(response) {
                    console.log(response);
                    $('#success-header-modals').modal('hide');
                    Message('success', 'form fields updated');
                    $scope.getFolders();
                }, function errorCallback(response) {
                    Message('danger', response.data.errors.name[0]);
                });
            }
            $scope.deleteFolder = (id) => {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $http({
                            method: 'post',
                            url: `${API_URL}admin/setup/delete-folder`,
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            data: {
                                'id': id
                            }
                        }).then(function successCallback(response) {
                            console.log(response);
                            Message('success', 'folder deleted sucessfully !');
                            $scope.getFolders();
                        }, function errorCallback(response) {
                            Message('danger', response.data.errors.name[0]);
                        });
                    } else {
                        Message('info', 'Your Data is safe');
                    }
                });
            }
        })
    </script>
@endpush
