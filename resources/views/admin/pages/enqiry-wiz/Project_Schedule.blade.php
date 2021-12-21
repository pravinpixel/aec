<div class="app" ng-controller="InvoiceCtrl">
    <div class="card mt-3" >
        <div class="card-header bg-light">
            <h3 class="header-title m-0">Gantt Chart</h3>
        </div>
        <div class="card-body">
            <div id="gantt_here" class="w-100 h-100"></div>
        </div>    
    </div>
    <div class="card">
        <div class="card-header bg-light">
            <h3 class="header-title m-0">Invoice Plan</h3>
        </div>
        <div class="card-body">
            <h3 class="header-title m-0 mb-2">Mailstone</h3>
            <form name="userForm" ng-submit="submit()">
                <table class="table table-bordered m-0">
                    <tr>
                        <th class="bg-light">
                            <div class="form-group">
                                <label class="form-lable text-dark shadow-sm position-absolute border">Date</label>
                                <input type="date" name="Date" required ng-required="true"  ng-model="Date" class="form-control form-control-sm my-2 mt-3" placeholder="Type here...">
                            </div>
                        </th>
                        <th  class="bg-light">
                            <div class="form-group">
                                <label class="form-lable text-dark shadow-sm position-absolute border">Discription</label>
                                <input type="text" name="Description" required ng-required="true"  ng-model="Description" class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
                            </div>
                        </th>
                        <th  class="bg-light">
                            <div class="form-group">
                                <label class="form-lable text-dark shadow-sm position-absolute border">Percentage</label>
                                <input type="number" name="Percentage" required ng-required="true"  ng-model="Percentage" class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
                            </div>
                        </th>
                        <th  class="bg-light">
                            <div class="form-group">
                                <label class="form-lable text-dark shadow-sm position-absolute border">Amount</label>
                                <input type="number" name="Amount" required ng-required="true" ng-model="Amount"  class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
                            </div>
                        </th> 
                        <th  class="bg-light">
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn-primary btn more-btn-layer" type="submit">
                                    <i class="fa fa-plus"></i>
                                </button> 
                            </div>
                        </th>
                    </tr>
                    <tbody>
                        <tr ng-repeat="(index,m) in Milestone">
                            <td> @{{  m.Date | date:'dd/MM/yyyy'}}</td>
                            <td>@{{ m.Description }}</td>
                            <td>@{{ m.Percentage }}</td>
                            <td>@{{ m.Amount }}  </td>
                            <td class="text-center">
                                <i class="fa fa-trash btn btn-danger" ng-click="delete(index)"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>


 
<script>
    // gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
    var URL = "http://192.168.0.68/aec-prabhu/aec/data.json";

    gantt.init("gantt_here");

    gantt.load(URL, "json");

    // var taskId = gantt.addTask({
    //     parent: 1,
    //     id:10,
    //     text:"Tasks",
    //     start_date:"02-09-2021",
    //     duration:28,
       
    // }, "project_2", 5);

    

</script>
 