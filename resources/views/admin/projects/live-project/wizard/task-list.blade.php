<div class="p-2" ng-controller="TasklistController">
    <table class="mb-2 table border custom" >
        <tbody>
            <tr>
                <td><b>Project Name</b></td>
                <td>:</td>
                <td>@{{ projectTypes.project_name}}</td>
                <td><b>Customer Name</b></td>
                <td>:</td>
                <td>@{{ projectTypes.customerdatails.first_name }}</td>
            </tr>
            <tr>
                <td><b>Project Lead</b></td>
                <td>:</td>
                <td>@{{lead}}</td>
                <td><b>Over All Status</b></td>
                <td>:</td>
                <td><div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: @{{overall}}%;" aria-valuenow="@{{overall}}" aria-valuemin="0" aria-valuemax="100">@{{overall}}%</div>
                </div></td>
            </tr>
        </tbody>
    </table>

    <table class="m-0 table table-hover table-bordered custom" ng-repeat="(index,check_list) in check_list_items">
        <thead>
            <tr>
                <th class="text-center">S.No</th>
                <th class="text-center">Deliverable Name</th>
                <th class="text-center">Assign To</th>
                <th class="text-center">Start date</th>
                <th class="text-center">end date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Date of Delivery</th>
            </tr>
        </thead>
        <tbody class="border"  ng-repeat="(index_2 , checkListData) in check_list.data" >
             <tr>
                <td colspan="5" class="bg-light">
                    <div class="text-center">
                        <strong>@{{ checkListData.name }}</strong>
                        
                    </div>
                </td>
                <td  colspan="5" class="bg-light">
                    
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: @{{countper[$index].completed}}%;" aria-valuenow="@{{countper[$index].completed}}" aria-valuemin="0" aria-valuemax="100">@{{countper[$index].completed}}%</div>
                    </div>
                   
                </td>
                
            </tr>
   
            <tr ng-repeat="(index_3 , taskListData) in checkListData.data">
                <td>@{{ index_3 +1 }}</td>
                <td>@{{ taskListData.task_list }}</td>
                <td>
                    <input get-to-do-lists  type = "hidden"   ng-model="taskListData.assign_to" value="@{{ taskListData.assign_to }}" >
                    <label ng-repeat="projectManager in projectManagers" value="@{{ taskListData.assign_to }}" >
                        @{{ projectManager.first_name }}
                    </label>

                   
                </td>
               
                <td> 
                    <input type="hidden" get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm">
                    
                    <label get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" id="" class=" border-0 form-control form-control-sm" ng-readonly="">@{{taskListData.start_date | date: 'dd-MM-yyyy'}}</label></td>
                <td> 
                    <input type="hidden" get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm">
                    <label get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" id="" class=" border-0 form-control form-control-sm" ng-readonly="">@{{taskListData.end_date | date: 'dd-MM-yyyy'}}</label></td>
                <td class="text-center"><input type="checkbox" name="" ng-model="taskListData.status" id="" class="form-check-input" ng-value = "taskListData.status" ng-change=storeTaskListsStatus(taskListData.status)></td>
                
                <td><input type="date" get-to-do-lists ng-value="taskListData.delivery_date | date: 'yyyy-MM-dd'" ng-model="taskListData.delivery_date" id="" class=" border-0 form-control form-control-sm" ng-change=storeTaskListsDeliverydate(taskListData.status)></td>
            </tr>  
            
            {{-- <tr>
                <td>2</td>
                <td>2D Connection Detail Drawing</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Structural Element Drawing</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked=""></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Foundation Concrete Drawing(optional)</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>5</td>
                <td>window and door legend drawings</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked=""></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            
            <tr>
                <td colspan="5" class="bg-light">
                    <div class="text-center">
                        <strong>2nd  set of delivery - Fabrication drawings</strong>
                    </div>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>External and Internal wall Fabrication drawings</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked=""></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Floor Fabrication drawings</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Roof Fabrication drawings</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked=""></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Beam and column manufacturing drawings</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            
            <tr>
                <td colspan="5" class="bg-light">
                    <div class="text-center">
                        <strong>3rd  set of delivery - Installation drawings</strong>
                    </div>
                </td>
            </tr>
            <tr>
                <td>10</td>
                <td>External and Internal wall Fabrication drawings</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked=""></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Floor Fabrication drawings</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>12</td>
                <td>Roof Fabrication drawings</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked=""></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>13</td>
                <td>3D Installation drawings ( optional)</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>14</td>
                <td>Total Material List(Timber and steel components)</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>15</td>
                <td>Foundation sill Drawings)</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>16</td>
                <td>Transport Packaging Drawing(client Optional)</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>17</td>
                <td>CNC DATA (client Optional)</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>
            <tr>
                <td>18</td>
                <td>Find set of drawings uploaded in BIM 360</td>
                <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
            </tr>--}}
        </tbody>
    </table>
    <div class="row" >
        <div class="col-8" ng-if="projectTypes">
            <project-open-comment  data="
            {'modalState':'viewConversations',
            'type': 'task', 
            'header':'task',
            'project_id':projectTypes.id,
            send_by: {{ Admin()->id }},
            'from':'Admin'
            }"/> 
        </div>                                
        <div class="col-4" ng-if="projectTypes">
            <project-comment data="
            {'modalState':'viewConversations',
            'type': 'task', 
            'header':'task',
            'project_id':projectTypes.id,
            send_by: {{ Admin()->id }},
            'from':'Admin'
            }"/>
        </div>                                
    </div>
</div>



<div class="card-footer text-end">
    <a href="#!/invoice-plan" class="btn btn-light float-start">Prev</a>
    <a href="#!/bim360" class="btn btn-primary">Next</a>
</div>