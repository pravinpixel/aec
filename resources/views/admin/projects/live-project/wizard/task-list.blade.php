<div class="p-2">
    <table class="mb-2 table border custom" ng-controller="TasklistController">
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
                <td>XXXX</td>
                <td><b>Final Delivery Date</b></td>
                <td>:</td>
                <td>@{{projectTypes.delivery_date}}</td>
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
            </tr>
            <tr ng-repeat="(index_3 , taskListData) in checkListData.data">
                <td>@{{ index_3 +1 }}</td>
                <td>@{{ taskListData.task_list }}</td>
                <td>

                    <input get-to-do-lists  type = "hidden"   ng-model="taskListData.assign_to" value="@{{ taskListData.assign_to }}" >
                    <label ng-repeat="projectManager in projectManagers" value="@{{ taskListData.assign_to }}" >
                        @{{ projectManager.first_Name }}
                    </label>

                   
                </td>
               
                <td> 
                    <input type="hidden" get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm">
                    
                    <label get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" id="" class=" border-0 form-control form-control-sm" ng-readonly="">@{{taskListData.start_date | date: 'dd-MM-yyyy'}}</label></td>
                <td> 
                    <input type="hidden" get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm">
                    <label get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" id="" class=" border-0 form-control form-control-sm" ng-readonly="">@{{taskListData.end_date | date: 'dd-MM-yyyy'}}</label></td>
                <td class="text-center"><input type="checkbox" name="" ng-model="taskListData.status" id="" class="form-check-input" ng-value = "taskListData.status" ></td>
                <td><input type="date" get-to-do-lists ng-value="taskListData.delivery_date | date: 'dd-MM-yyyy'" ng-model="taskListData.delivery_date" id="" class=" border-0 form-control form-control-sm"></td>
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
</div>

<div class="card-footer text-end">
    <a href="#!/invoice-plan" class="btn btn-light float-start">Prev</a>
    <a ng-click="storeTaskLists()" class="btn btn-primary">Next</a>
</div>