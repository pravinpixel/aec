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

                <div>
                <input type="checkbox" id="switch__@{{ index }}"  ng-change="sharePoint_status(employeeRowId,share_access)" ng-model="share_access"  ng-checked="share_access == 1" data-switch="primary"/>
                <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off">Share Point Access</label>  
                </div>
                <!-- @{{employeeRowId}} -->
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
                                    <tr ng-repeat="(index,employee) in sharePointFolder">
                                                        
                                            <td class="align-items-center">@{{ employee.folder_name }}</td>

                                            <td>
                                                <div>
                                                
                                                    <input type="checkbox" id="switch__@{{ index }}" ng-disabled="!share_access" ng-change="employee_status(employeeRowId,employee.is_active,employee.data_name)"  ng-checked="employee.is_active == 1"  ng-model="employee.is_active" data-switch="primary"/>
                                                    <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
                                                </div>          
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
<style>
    .profile-info{
        /* color: #0acf97 !important; */
        background-color:gray !important;
    }
    .share-point{
        /* color: #0acf97 !important; */
        background-color:#0acf97 !important;
    }
    .ibm-access{
        /* color: #0acf97 !important; */
        background-color:gray !important;
    }
</style>