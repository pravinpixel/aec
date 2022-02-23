<div class="cardx">                            
    <div class="text-center py-3">
        <div class="btn-group p-2 px-3 col-4  border border-primary rounded-pill border shadow mx-auto align-items-center">
            <span class="me-1">Share Point Access</span>
            <div class="ms-auto">
                <input type="checkbox" id="switch__@{{ index }}"  ng-change="sharePoint_status(share_point_status)" ng-checked="share_point_status == 1" ng-model="share_point_status" data-switch="primary"/>
                <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table  dt-options="vm.dtOptions" class="custom table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">S.No</th>
                    <th class="text-center">Folder Name</th>
                    <th class="text-center">Active</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" value="@{{ employeeRowId }}" ng-model="employeeRowId" >
                <tr ng-repeat="(index,employee) in sharePointAccess_module">
                    <td class="text-center">@{{ index+1 }}</td>
                    <td class="text-center">@{{ employee.folder_name }}</td>
                    <td class="text-center">
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}"   ng-disabled="share_point_status ==0" ng-checked="employee.is_active == 1" 
                            ng-change="employee_status(share_point_status,employee.status,employee.data_name)" ng-model="employee.status" data-switch="primary"/>
                            <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
                        </div> 
                        <span ng-if="employee.is_active == 1" class="d-none">1</span>              
                        <span ng-if="employee.is_active == 0" class="d-none">0</span>         
                    </td> 
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-end">
        <button class="btn btn-light font-weight-bold px-3" ng-click="share_point_prev()" style="float: left;" >Prev</button>
        <button class="btn btn-primary font-weight-bold px-3" ng-click="share_point_next()">Next</button>
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