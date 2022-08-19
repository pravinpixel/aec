<table class="mb-2 table border custom ng-scope" >
    <tbody>
        <tr>
            <td><b>Project Name</b></td>
            <td>:</td>
            <td >@{{ projectTypes.project_name}}</td>
            <td><b>Customer Name</b></td>
            <td>:</td>
            <td >@{{ projectTypes.customerdatails.first_name }}</td>
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
<table class="m-0 table custom" ng-repeat="(index,check_list) in check_list_items">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Deliverable Name</th>
            
            <th class="text-center">Assign To</th>
            <th class="text-center">Status</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Date</th>
        </tr>
    </thead>
    <tbody class="border" ng-repeat="(index_2 , checkListData) in check_list.data">
        <tr ng-show="checkListData.text != 'others'">
            <td colspan="5" class="bg-light">
                <div class="text-start">
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
                <label ng-repeat="projectManager in projectManagers" value="@{{ taskListData.assign_to }}" >
                    @{{ projectManager.first_name }}
                </label>
            </td>
              <td class="text-center">  
                 @{{(taskListData.status) == 1 ? 'Completed' : 'Pending'}}
                    
                   
            </td>
            <td><input disabled  type="text" get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
            <td><input disabled  type="text" get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
        </tr> 
    </tbody>
</table>

<input type="hidden" id = "login_id" value = "{{Admin()->id}}">
<form id="task__commentsForm" ng-submit="sendComments('task','Admin', {{Admin()->id}})" class="input-group mt-3">
    <input required type="text" ng-model="task__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-2">
    <a class="text-primary p-0 btn" ng-show="project_comments.task" ng-click="showCommentsToggle('viewConversations', 'task', 'task')">
        <i class="mdi mdi-eye"></i>  Previous chat history
    </a>
</div>