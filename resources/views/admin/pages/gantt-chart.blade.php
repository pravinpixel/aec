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
                                    <div id="gantt_here" style='width:100%; height:calc(95vh - 52px); '></div>
                                </div>
                            </div>  
                        </div> 
                    </div>
                    
            </div> <!-- content -->
        
        
        </div>  


    @endsection 

    @push('custom-styles')
        
        <link href="{{ asset("public/assets/dhtmlx/dhtmlxgantt.css") }}" rel="stylesheet" />
        <style>
            /* .gantt_container {
                min-height: 300px !important;
            }  */
             .admin-Project_Schedule-wiz .timeline-step .inner-circle{
                background: #757CF2 !important;
                transform: scale(1.2);
                box-shadow: 0px 5px 10px #4f4f4fb2 !important
            }
            .navbar-custom, .leftside-menu {
                z-index: 1 !important;
            }
            /*.gantt_grid_head_cell, .gantt_task_scale {
                background: #757CF2 !important;
                color: white !important
            }
            .gantt_task_scale .gantt_scale_cell {
                color: white !important
            }
            .gantt_grid_head_cell.gantt_grid_head_add {
                opacity: 1 !important;
            } */
           
        </style> 
    @endpush
    

    @push('custom-scripts')
        

        <script src="{{ asset("public/assets/dhtmlx/dhtmlxgantt.js") }}"></script>
        
        <script>
            var URL = "{{ route("ganttChart_data") }}";
            
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
            });
            gantt.attachEvent("onAfterTaskUpdate", function(id,item){
                location.reload()
            });
            gantt.attachEvent("onAfterTaskDelete", function(id,item){
                location.reload()
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
                console.log(enquiryid);

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
            
            // resourcesStore.parse([// resources
            //     {key: '', label: "Invoice"},
                
            // ]);

            
        </script>
        
    
        
    @endpush
