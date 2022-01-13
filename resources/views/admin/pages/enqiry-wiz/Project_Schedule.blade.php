<div class="app" ng-controller="InvoiceCtrl">
    <div class="card mt-3">
        <div class="card" id="myCover">
            <div class="card-header border-0 pb-0 pt-3"> 
                <div class="d-flex justify-content-between">
                    <div class="btn-group shadow-sm">
                        <button onclick="gantt.undo()" class="btn btn-light hover-btn border"><i class="mdi mdi-undo"></i></button>
                        <button onclick="gantt.redo()" class="btn btn-light hover-btn border"><i class="mdi mdi-redo"></i></button>
                        <button onclick="toggleNav()" class="btn btn-light hover-btn border"><i class="mdi toggle-icons mdi-folder-open mdi-folder"></i></button>                    
                    </div>
                   <div class="btn-group shadow-sm">
                        <label class="btn hover-btn btn-light border"><input class="me-2" type="radio" name="scale" value="day" checked/>Day scale</label>
                        <label class="btn hover-btn btn-light border"><input class="me-2" type="radio" name="scale" value="week"/>Week scale</label>
                        <label class="btn hover-btn btn-light border"><input class="me-2" type="radio" name="scale" value="month"/>Month scale</label>
                        <label class="btn hover-btn btn-light border"><input class="me-2" type="radio" name="scale" value="year"/>Year scale</label>
                   </div>
                    <div class="btn-group shadow-sm ">
                        <button class="btn btn-light hover-btn border" onclick="zoomOut()"><i class="feather-zoom-out"></i></button>
                        <button class="btn btn-light hover-btn border" onclick="zoomIn()"><i class="feather-zoom-in"></i></button>
                        <button onclick="gantt.ext.fullscreen.toggle();" class="border btn btn-light hover-btn"><i class="mdi mdi-arrow-expand-all"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class=" ">
                    <div id="gantt_here" style="min-height: 400px !important" class="w-100"></div>
                </div>
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
</div>
 
 
@if (Route::is('admin-Project_Schedule-wiz')) 
    
    <link href="{{ asset("public/assets/dhtmlx/dhtmlxgantt.css") }}" rel="stylesheet"> 

    <script src="{{ asset("public/assets/dhtmlx/dhtmlxgantt.js") }}"></script>
 
    <style>  
        .admin-Project_Schedule-wiz .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        } 
        .hover-btn:hover {
            background: #d1d1d1 !important
        }
        .weekend {
            background: #EEF2F7 !important;
            color: black !important;
            opacity: .5 !important;
        } 
        /* .gantt_scale_cell, .updColor, .gantt_grid_head_wbs{
            background: #122E66 !important;
            color: white !important 
        }
       
        .gantt_grid_data .gantt_row.odd:hover, .gantt_grid_data .gantt_row:hover,
        .gantt_grid_data .gantt_row.gantt_selected,
        .gantt_grid_data .gantt_row.odd.gantt_selected,
        .gantt_task_row.gantt_selected{
            background: #E5EEF4 !important; 
        }
        .gantt_tree_content {
            overflow:hidden;
            text-overflow: ellipsis;
        }
        .gantt_cell {
            border: 1px solid #eee !important
        }
        .gantt_row {
            border: 0px solid gray !important
        } */
        .gantt_task_line {
            border-radius: 20px !important;
            box-shadow: 1px 1px 5px grey;
            border: 2px solid white !important;
        }
        .navbar-custom, .leftside-menu {
            z-index: 1 !important;
        }
    </style>  
    <script type="text/javascript">
        gantt.config.row_height = 45;
        // ================== Zoom Config ========
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

        // ================= Zoom Config ====================

        // ====== REST API setTransactionMode ==========
            gantt.plugins({
                auto_scheduling: true,
                undo: true,
                fullscreen: true
            });
            var dp = new gantt.dataProcessor("{{ url("api") }}");
            dp.init(gantt);
            dp.setTransactionMode("REST");
        // ====== REST API setTransactionMode ==========
        
        //=== ==Floder Togglle Function =============
            var nav = false;
            function openNav() {
                gantt.eachTask(function(task){
                    task.$open = false;
                });
                gantt.render();
                $( ".toggle-icons" ).removeClass( "mdi-folder-open" )
                nav = true;
            }
            function closeNav() {
                gantt.eachTask(function(task){
                    task.$open = true;
                });
                gantt.render();
                $( ".toggle-icons" ).addClass( "mdi-folder-open" )
                nav = false;
            }
            function toggleNav() {
                nav ? closeNav() : openNav();
            }
        //=== ==Floder Togglle Function =============
 
        //  ====== Extra Column ==========
            gantt.config.auto_types = true;
            gantt.config.columns = [
                {name: "wbs", label: "S.no", width:50,  template: gantt.getWBSCode},
                {name: "text", label: "Task name", tree: true, width: 170},
                {name: "start_date", align: "center", width: 90},
                {name: "duration", align: "center", width: 60},
                {name: "add", width: 40}
            ];
        //  ====== Extra Column ==========

         
        // =========Weekend Color code changing ============
            var daysStyle = function(date){
                var dateToStr = gantt.date.date_to_str("%D");
                if (dateToStr(date) == "Sun"||dateToStr(date) == "Sat")  return "weekend";        
                return "";
            }; 
            
            gantt.templates.scale_cell_class = function(date) {
                if (!gantt.isWorkTime(date))
                    return "weekend";
            };
            gantt.templates.timeline_cell_class = function(item, date) {
                if (!gantt.isWorkTime(date))
                    return "weekend";
            };
            gantt.config.work_time = true;
            gantt.config.auto_scheduling = true;
            gantt.config.auto_scheduling_strict = true;
        // =========Weekend Color code changing ============
 
        //  Date Formate
        gantt.config.date_format = "%Y-%m-%d %H:%i:%s";

        //  Select Html element For Gantt Chart
        gantt.init("gantt_here");

        // Load Data For Gantt Chart
        gantt.load("{{ route("data") }}");
 

        // =============== Expand  fullscreen =============
    
            gantt.ext.fullscreen.getFullscreenElement = function() {
                return document.getElementById("myCover");
            } 
        // =============== Expand  fullscreen =============
         
        // =============== For Milestone Input ========
            gantt.config.scales = [{unit:"day", format:"%D", css:daysStyle }];
                
                var colors = [
                    {key:"", label:"Default"},
                    {key:"#4B0082",label:"Indigo"},
                    {key:"#FFFFF0",label:"Ivory"},
                    {key:"#F0E68C",label:"Khaki"} 
                ];

                var Type_of_Task = [
                    {key:"task",label:"Task"},
                    {key:"milestone",label:"Milestone"},
                ];
                    
            gantt.config.lightbox.sections = [
                {name: "description", height: 70, map_to: "text", type: "textarea"}, 
                {name: "type", type: "select", height: 30, map_to: "type", options:Type_of_Task},
                // {name: "priority", type: "select", height: 30, map_to: "color", options:colors},
                {name: "time", height: 72, type: "duration", map_to: "auto"},
            ];
        // =============== For Milestone Input ========

        
        // ============= Color Code Changing===========
            gantt.templates.grid_header_class = function(columnName, column){
                if(columnName == 'duration' ||columnName == 'text') {
                    return "updColor";
                }
                
                if(columnName == 'start_date' ||columnName == 'text') {
                    return "updColor"; 
                }
                
            };
        // ============= Color Code Changing===========

         
    </script> 
@endif