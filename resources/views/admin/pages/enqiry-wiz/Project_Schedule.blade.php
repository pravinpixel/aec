<div class="app" ng-controller="InvoiceCtrl">
    <div class="card mt-3" >

        <div class="card shadow-sm border" id="myCover" >
            <div class="gantt_control card-header p-0">
                <div class="row m-0 p-0 bg-light"> 
                    <div class="btn-group text-center align-items-center justify-content-center col-10 p-0">
                        <div class="form-check  px-4">
                            <input type="radio" id="customRadiocolor1" name="scale" value="day" class="form-check-input" >
                            <label class="form-check-label" for="customRadiocolor1">Day scale</label>
                        </div>
                        <div class="form-check form-radio-success  px-4">
                            <input type="radio" id="customRadiocolor2" name="scale" value="week" class="form-check-input" checked>
                            <label class="form-check-label" for="customRadiocolor2">Week scale</label>
                        </div>
                        <div class="form-check form-radio-info  px-4">
                            <input type="radio" id="customRadiocolor3" name="scale"  value="month" class="form-check-input" >
                            <label class="form-check-label" for="customRadiocolor3">Month scale</label>
                        </div>
                        <div class="form-check form-radio-secondary  px-4">
                            <input type="radio" id="customRadiocolor6" name="scale" value="quarter" class="form-check-input" >
                            <label class="form-check-label" for="customRadiocolor6">Quarter scale</label>
                        </div>
                        <div class="form-check form-radio-warning px-4">
                            <input type="radio" id="customRadiocolor4" name="scale"  value="year" class="form-check-input" >
                            <label class="form-check-label" for="customRadiocolor4">Year scale</label>
                        </div> 
                    </div>
                    <div class="gantt_control text-end p-0 col">
                        <div class="btn-group badge-primary-lighten text-white">
                            <button class="btn text-primary" onclick="zoomOut()"><i class="feather-zoom-out"></i></button>
                            <button class="btn text-primary" onclick="zoomIn()"><i class="feather-zoom-in"></i></button>
                            <button class="btn text-primary" onclick="gantt.ext.fullscreen.toggle();"><i class="feather-maximize"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="gantt_here" style='width:100%; height:calc(80vh - 52px); '></div>
            </div>
        </div>  
    </div>
    <div class="card">
        <div class="card-header bg-light">
            <h3 class="header-title m-0">Invoice Plan</h3>
        </div>
        <div class="card-body">
            <h3 class="header-title m-0 mb-2">Milestones</h3>
            <form name="userForm" ng-submit="submit()">
                
                <table class="table table-bordered m-0">
                    <tr class="shadow-lg">
                        <td colspan="5">
                            <div class="form-group d-flex align-items-center justify-content-end col-md-8 ms-auto">
                                <div><label class="form-label m-0  me-3"> 
                                    <b>Project budget</b></label> </div>
                                <div>
                                    <input type="number" class="form-control" ng-model="Budget" placeholder="Type Here..." required>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-light" >
                            <div class="form-group">
                                <label class="form-lable text-dark shadow-sm position-absolute border">Date</label>
                                <input type="date" name="Date" required ng-required="true"  ng-model="Date" class="form-control form-control-sm my-2 mt-3" placeholder="Type here...">
                            </div>
                        </th>
                        <th  class="bg-light">
                            <div class="form-group">
                                <label class="form-lable text-dark shadow-sm position-absolute border">Description</label>
                                <input type="text" name="Description" required ng-required="true"  ng-model="Description" class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
                            </div>
                        </th>
                        <th  class="bg-light">
                            <div class="form-group">
                                <label class="form-lable text-dark shadow-sm position-absolute border">Percentage</label>
                                <input type="number" name="Percentage" required ng-required="true" ng-model="Percentage" ng-value="Result" ng-change="PercentageCal()" class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
                            </div>
                        </th>
                        <th  class="bg-light">
                            <div class="form-group">
                                <label class="form-lable text-dark shadow-sm position-absolute border">Amount</label>
                                <input type="number" name="Amount" required ng-required="true" ng-model="Amount" ng-value="PResult" ng-change="AmountCal()" class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
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
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#!/Cost_Estimate" class="btn btn-outline-primary">Prev</a>
            </div>
            <div>
                <a href="#!/Proposal_Sharing" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div> 
</div>
 
 
@if (Route::is('admin-Project_Schedule-wiz')) 
    <style>
        .gantt_task_line  {
            background: #757CF2 !important;
        }
       .admin-Project_Schedule-wiz .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
        .navbar-custom, .leftside-menu {
            z-index: 1 !important;
        }
        /* .gantt_grid_head_cell, .gantt_task_scale {
            background: #757CF2 !important;
            color: white !important
        } */
        .gantt_task_scale .gantt_scale_cell {
            color: #757CF2 !important
        }
        /* .gantt_grid_head_cell.gantt_grid_head_add {
            opacity: 1 !important;
        } */
    </style> 

    <link href="{{ asset("public/assets/dhtmlx/dhtmlxgantt.css") }}" rel="stylesheet">
    <script src="{{ asset("public/assets/dhtmlx/dhtmlxgantt.js") }}"></script>
 
    <script>
        var URL = "{{ route("data") }}";
        
        var zoomConfig = {
            levels: [
                {
                    name:"day",
                    scale_height: 27,
                    min_column_width:80,
                    scales:[
                        {unit: "day", step: 1, format: "%d %M"}
                    ]
                },
                {
                    name:"week",
                    scale_height: 50,
                    min_column_width:50,
                    scales:[
                        {unit: "week", step: 1, format: function (date) {
                            var dateToStr = gantt.date.date_to_str("%d %M");
                            var endDate = gantt.date.add(date, -6, "day");
                            var weekNum = gantt.date.date_to_str("%W")(date);
                            return "#" + weekNum + ", " + dateToStr(date) + " - " + dateToStr(endDate);
                        }},
                        {unit: "day", step: 1, format: "%j %D"}
                    ]
                },
                {
                    name:"month",
                    scale_height: 50,
                    min_column_width:120,
                    scales:[
                        {unit: "month", format: "%F, %Y"},
                        {unit: "week", format: "Week #%W"}
                    ]
                },
                {
                    name:"quarter",
                    height: 50,
                    min_column_width:90,
                    scales:[
                        {unit: "month", step: 1, format: "%M"},
                        {
                            unit: "quarter", step: 1, format: function (date) {
                                var dateToStr = gantt.date.date_to_str("%M");
                                var endDate = gantt.date.add(gantt.date.add(date, 3, "month"), -1, "day");
                                return dateToStr(date) + " - " + dateToStr(endDate);
                            }
                        }
                    ]
                },
                {
                    name:"year",
                    scale_height: 50,
                    min_column_width: 30,
                    scales:[
                        {unit: "year", step: 1, format: "%Y"}
                    ]
                }
            ]
        };

        gantt.ext.zoom.init(zoomConfig);
        gantt.ext.zoom.setLevel("week");
        gantt.ext.zoom.attachEvent("onAfterZoom", function(level, config){
            document.querySelector(".gantt_radio[value='" +config.name+ "']").checked = true;
        }) 
         
        gantt.plugins({
            fullscreen: true
        });
       

        gantt.ext.fullscreen.getFullscreenElement = function() {
            return document.getElementById("myCover");
        }
        gantt.init("gantt_here");
        gantt.load(URL);
        
        // gantt.config.root_id = "root"; 

        gantt.attachEvent("onTaskCreated", function(task){
            task.enqid = enquiryid;
            task.etype = 0; 
            gantt.render();
            return true;
        });
         
        gantt.attachEvent("onAfterTaskAdd", function(id,item){
            location.reload()
            // gantt.refreshData();
            // gantt.load(URL);
             

        });
        gantt.attachEvent("onAfterTaskUpdate", function(id,item){
            location.reload()
            // gantt.load(URL);
        });
        gantt.attachEvent("onAfterTaskDelete", function(id,item){
            location.reload()
            // gantt.load(URL);
        });

        gantt.attachEvent("onLinkCreated", function(link){
            link.enqid = enquiryid;
            link.etype = 0;
            gantt.render();
            return true; 
        });
        
        gantt.attachEvent("onLightboxSave", function(id, task, is_new){
            var task = gantt.getTask(id); 
            task.text = "Task #10";  
            gantt.refreshTask(id);
            gantt.render();
            return true;
        });
        
        function zoomIn(){
            gantt.ext.zoom.zoomIn();
        }
        function zoomOut(){
            gantt.ext.zoom.zoomOut()
        }

        var radios = document.getElementsByName("scale");

        for (var i = 0; i < radios.length; i++) {

            radios[i].onclick = function (event) {
                gantt.ext.zoom.setLevel(event.target.value);
            };
        } 

        var dp = new gantt.dataProcessor(URL);
        var enquiryid = 0 ;
        dp.init(gantt);
        dp.setTransactionMode("REST");
        
        gantt.attachEvent("onTaskCreated", function(task){
            task.enqid = enquiryid;
            task.etype = 0;
            gantt.render();
            return true;
        });
        
        // console.log(enquiryid);
        
        gantt.attachEvent("onLinkCreated", function(link){
            link.enqid = enquiryid;
            link.etype = 0;
            gantt.render();
            return true;
        });
       
        gantt.attachEvent("onLightboxSave", function(id, task, is_new){
            
            var task = gantt.getTask(id);

            task.text = "Task #10"; 

            gantt.refreshTask(id);
            gantt.render();
            return true;
        });
        
        resourcesStore.parse([// resources
            {key: '', label: "Invoice"},
            
        ]);

        
    </script>
@endif