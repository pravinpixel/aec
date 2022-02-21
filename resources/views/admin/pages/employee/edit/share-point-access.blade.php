<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow-lg mb-0">
            <div class="card">                            
                <div class="card-header ">
                    <div class="d-flex justify-content-between">
                        <h3 class="haeder-title">Share Point Access</h3>

                    </div>
                    
                </div>

                <div class="text-center py-3">
                    <div class="btn-group p-2 px-3 rounded-pill border shadow mx-auto align-items-center">
                        <span class="me-1">Share Point Access</span>
                        <div class="">
                            <input type="checkbox" id="switch__@{{ index }}"  ng-change="sharePoint_status(share_access)" ng-model="share_access"  ng-checked="share_access == 1" data-switch="primary"/>
                            <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>  
                        </div>
                    </div>
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
                                    <tr ng-repeat="(index,employee) in sharePointFolder">
                                                        
                                            <td class="align-items-center">@{{ employee.folder_name }}</td>

                                            <td>
                                                <div>
                                                    <!-- ng-disabled="!share_access" -->
                                                    <input type="checkbox" id="switch__@{{ index }}"  ng-checked="employee.is_active == 1"
                                                    ng-change="employee_status(share_access,employee.status,employee.data_name)" ng-model="employee.status" data-switch="primary"/>


                                                    <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
                                                </div>          
                                            </td>                    
                                        </tr>
                                    
                                </tbody>
                    </table>
                </div>
                <div class="card-fooetr">
                   
                        <button class="btn btn-success" ng-click="edit_share_point_prev()" style="float: left;" >Prev</button>
                    
                    <button class="btn btn-success" ng-click="edit_share_point_next()" style="float: right;" >Next</button>
               
                </div>
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