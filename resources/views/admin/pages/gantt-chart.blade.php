    @extends('layouts.admin')

    @section('admin-content') 
        
        <div class="content-page" ng-app="">
            <div class="content">

                @include('admin.layouts.top-bar')

                <!-- Start Content-->
                <div class="container-fluid">
                    
                    <!-- start page title -->
                    
                    @include('admin.layouts.page-navigater')
                
                    <div class="app" ng-controller="InvoiceCtrl">
                        <div class="card mt-3">
                            <div class="card" id="myCover"> 
                                <div class="card-body">
                                    <div class="d-flex justify-content-between border">
                                        <div class="btn-group">
                                            <button onclick="toggleNav(this)" class="btn hover-btn rounded-0"><i class="mdi toggle-icons mdi-folder-open mdi-folder"></i></button>                    
                                            <button onclick="gantt.undo()" class="btn hover-btn  rounded-0"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_undo_24.png"> Undo</button>
                                            <button onclick="gantt.redo()" class="btn hover-btn  rounded-0"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_redo_24.png"> Redo</button>
                                            <button onclick="updateCriticalPath(this)" class="btn hover-btn  rounded-0"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_critical_path_24.png"> Critical Path</button>
                                            <div class="dropdown btn p-0 hover-btn  rounded-0">
                                                <button class="dropdown-toggle btn rounded-0 hover-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class=" dripicons-scale"></i> Scale
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><label class="dropdown-item"><input class="me-2" type="radio" name="scale" value="day" checked/>Day scale</label></li>
                                                    <li><label class="dropdown-item"><input class="me-2" type="radio" name="scale" value="week"/>Week scale</label></li>
                                                    <li><label class="dropdown-item"><input class="me-2" type="radio" name="scale" value="month"/>Month scale</label></li>
                                                    <li><label class="dropdown-item"><input class="me-2" type="radio" name="scale" value="year"/>Year scale</label></li>
                                                </ul>
                                            </div> 
                                        </div>
                                        <div class="btn-group">
                                            <div class="dropdown btn p-0 hover-btn rounded-0">
                                                <button class="dropdown-toggle btn hover-btn rounded-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-export"></i> Export
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> 
                                                    <li onclick='gantt.exportToPNG()'><a href="" class="dropdown-item">PNG</a></li>
                                                    <li onclick='gantt.exportToPDF()'><a href="" class="dropdown-item">PDF</a></li>
                                                    <li onclick='gantt.exportToExcel()'><a href="" class="dropdown-item">Excel</a></li>
                                                </ul>
                                            </div>
                                            <button class="btn hover-btn  rounded-0" onclick="zoomOut()"><i class="feather-zoom-out"></i></button>
                                            <button class="btn hover-btn  rounded-0" onclick="zoomIn()"><i class="feather-zoom-in"></i></button>
                                            <button onclick="gantt.ext.fullscreen.toggle();" class=" btn hover-btn"><i class="mdi mdi-arrow-expand-all"></i></button>
                                        </div>
                                    </div> 
                                    <div>
                                        <div id="gantt_here" style="min-height: 400px !important" class="w-100"></div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>
                    
            </div> <!-- content -->
        
        
        </div>  


    @endsection 

    @push('custom-styles')
        
    <link href="{{ asset("public/assets/dhtmlx/dhtmlxgantt.css") }}" rel="stylesheet"> 

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
   
    .navbar-custom, .leftside-menu {
        z-index: 1 !important;
    }
</style>  
    @endpush
    

    @push('custom-scripts')
        

 
 

    
   
    <script src="{{ asset("public/assets/dhtmlx/dhtmlxgantt.js") }}"></script>
    <script src="http://export.dhtmlx.com/gantt/api.js"></script>  
   
    <script type="text/javascript">
        // ======= PlugIns ============
            gantt.plugins({
                auto_scheduling: true,
                undo: true,
                fullscreen: true,
                tooltip: true ,
                marker: true,
                critical_path: true 
            });
            gantt.config.row_height = 30;
        // ======= PlugIns ============

        function updateCriticalPath(toggle) {
            toggle.enabled = !toggle.enabled;
            if (toggle.enabled) { 
                gantt.config.highlight_critical_path = true;
            } else { 
                gantt.config.highlight_critical_path = false;
            }
            gantt.render();
        }
        // gantt.config.work_time = true;  // removes non-working time from calculations 
        // gantt.config.skip_off_time = true;    // hides non-working time in the chart
        //============ Today Flag ==============
            var dateToStr = gantt.date.date_to_str(gantt.config.task_date);
            var markerId = gantt.addMarker({
                start_date: new Date(), //a Date object that sets the marker's date
                css: "today", //a CSS class applied to the marker
                text: "Today", //the marker title
                title: dateToStr( new Date()) // the marker's tooltip
            });
        //============ Today Flag ==============

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
            
            var dp = new gantt.dataProcessor("{{ url("api/cost") }}");
            dp.init(gantt);
            dp.setTransactionMode("REST");
        // ====== REST API setTransactionMode ==========
        
        //=== ==Floder Togglle Function =============
            function toggleNav(toggle) {
                toggle.enabled = !toggle.enabled;
                if (toggle.enabled) {
                    gantt.eachTask(function(task){
                        task.$open = false;
                    });
                    gantt.render();
                    $( ".toggle-icons" ).removeClass( "mdi-folder-open" )
                } else {
                    gantt.eachTask(function(task){
                        task.$open = true;
                    });
                    gantt.render();
                    $( ".toggle-icons" ).addClass( "mdi-folder-open" )
                }
                gantt.render();
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
        gantt.load("{{ route("costData") }}");
 

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

    
        
    @endpush
