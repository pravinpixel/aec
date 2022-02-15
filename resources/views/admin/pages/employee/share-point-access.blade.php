<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow-lg mb-0">
            <div class="card">                              <!-- @{{component_module_get}} -->
                <div class="card-header ">
                    <div class="d-flex justify-content-between">
                        <h3 class="haeder-title">Share Point Access</h3>
                        <!-- <button class="btn btn-primary " ng-click="toggleLayer('add', 0)">Create New Layer</button> -->
                    </div>
                </div>
                @{{employeeRowId}}
                <div class="card-body">
                    <table datatable="ng" dt-options="vm.dtOptions" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Folder Name</th>
                                        <th>Active</th>
                                        
                                    </tr>
                                </thead>
                         
                                <tbody>
                                    <input type="hidden" value="@{{ employeeRowId }}" ng-model="employeeRowId" >
                                    <tr ng-repeat="(index,employee) in sharePointAccess_module">
                                        
                                        <td class="align-items-center">@{{ employee.folder_name }}</td>

                                        <td>
                                            <div>
                                                <input type="checkbox" id="switch__@{{ index }}"  ng-change="employee_status(employeeRowId,employee.status,employee.data_name)" ng-model="employee.status" data-switch="primary"/>
                                                <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
                                            </div> 
                                            <span ng-if="employee.is_active == 1" class="d-none">1</span>              
                                            <span ng-if="employee.is_active == 0" class="d-none">0</span>         
                                        </td>                    
                                    </tr>
                                    
                                </tbody>
                    </table>
                </div>
                <div class="card-fooetr"></div>
            </div> 
        </div>
    </div>
</div>