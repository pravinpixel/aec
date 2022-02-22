<div class="cards p-4 pt-0">
    <div class="text-center ">
        <div class="btn-group col-4 p-2 px-3 rounded-pill border border-primary shadow mx-auto align-items-center">
            <span class="me-1"><strong class="text-primary">Share Point Access</strong></span>
            <div class="ms-auto">
                <input type="checkbox" id="switch__@{{ index }}"  ng-change="sharePoint_status(share_access)" ng-model="share_access"  ng-checked="share_access == 1" data-switch="primary"/>
                <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>  
            </div>
        </div>
    </div>
   
    <div class="card-body">
        <table datatable="ng" dt-options="vm.dtOptions" class="table custom table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">S.No</th>
                    <th class="text-center">Folder Name</th>
                    <th class="text-center">Active</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(index,employee) in sharePointFolder">
                    <td class="text-center">@{{ index+1 }}</td>
                    <td class="text-center">@{{ employee.folder_name }}</td>
                    <td class="text-center">
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}"  ng-checked="employee.is_active == 1"
                            ng-change="employee_status(share_access,employee.status,employee.data_name)" ng-model="employee.status" data-switch="primary"/>
                            <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
                        </div>          
                    </td>                    
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-end mt-3">
        <button class="btn btn-light" ng-click="edit_share_point_prev()" style="float: left;" >Prev</button>
        <button  ng-click="edit_share_point_next()" class="btn btn-primary font-weight-bold px-3"> Next </button>
    </div>
</div> 
<style>
    .profile-info{
        background-color:gray !important;
    }
    .share-point{
        background-color:#0acf97 !important;
    }
    .ibm-access{
        background-color:gray !important;
    }
</style>