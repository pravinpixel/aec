<div class="bg-white p-4  ">

   
    <div class="main-container">
        <div class="header gantt-demo-header">
            <ul class="gantt-controls">
                <li class="gantt-menu-item"><a ><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_collapse_all_24.png">Collapse All</a></li>
                <li class="gantt-menu-item gantt-menu-item-last"><a data-action="expandAll"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_expand_all_24.png">Expand All</a></li>
                <li class="gantt-menu-item"><a data-action="undo"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_undo_24.png">Undo</a></li>
                <li class="gantt-menu-item"><a data-action="redo"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_redo_24.png">Redo</a></li>
                <li id="fullscreen_button"   class="gantt-menu-item  gantt-menu-item-last"><a ><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_fullscreen_24.png">Fullscreen</a></li>
                <li class="gantt-menu-item gantt-menu-item-right gantt-menu-item-last"><a data-action="zoomToFit"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_to_fit_24.png">Zoom to Fit</a></li>
                <li class="gantt-menu-item gantt-menu-item-right"><a data-action="zoomOut"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_out.png">Zoom Out</a></li>
                <li class="gantt-menu-item gantt-menu-item-right"><a data-action="zoomIn"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_in.png">Zoom In</a></li>
            </ul>
        </div>
         
        <div class="demo-main-content">
            <div id="gantt_here"></div>
        </div> 
    </div>
</div>  
<div class="card-footer text-end">
    <a href="#!/team-setup" class="btn btn-light float-start">Prev</a>
    <a href="#!/invoice-plan" class="btn btn-primary">Next</a>
</div>

@if (Route::is('project-schedule')) 
    <link href="{{ asset("public/assets/dhtmlx/dhtmlxgantt.css") }}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/styles/style.css?ver=1">
    <script src="{{ asset("public/assets/dhtmlx/dhtmlxgantt.js") }}"></script> 
    <script src="http://export.dhtmlx.com/gantt/api.js"></script> 
  
 
    <script>
    var button = document.getElementById("fullscreen_button");
        button.addEventListener("click", function(){
            if (!gantt.getState().fullscreen) {
                // expanding the gantt to full screen
                gantt.expand();
            }
            else {
                // collapsing the gantt to the normal mode
                gantt.collapse();
            }
        }, false);
    </script>
    <script >
        if (!window.ganttModules) {
            window.ganttModules = {};
        }
        gantt.config.autosize = "y";
        ganttModules.layout = {
            init: function(gantt, durationFormatter, linksFormatter) {
                gantt.config.layout = {
                    css: "gantt_container",
                    cols: [{
                            width: 524,
                            min_width: 300,

                            // adding horizontal scrollbar to the grid via the scrollX attribute
                            rows: [{
                                    view: "grid",
                                    scrollX: "gridScroll",
                                    scrollable: true,
                                    scrollY: "scrollVer"
                                },
                                {
                                    view: "scrollbar",
                                    id: "gridScroll",
                                    group: "horizontalScrolls"
                                }
                            ]
                        },
                        {
                            resizer: true,
                            width: 1
                        },
                        {
                            rows: [{
                                    view: "timeline",
                                    scrollX: "scrollHor",
                                    scrollY: "scrollVer"
                                },
                                {
                                    view: "scrollbar",
                                    id: "scrollHor",
                                    group: "horizontalScrolls"
                                }
                            ]
                        },
                        {
                            view: "scrollbar",
                            id: "scrollVer"
                        }
                    ]
                };

                var hourFormatter = gantt.ext.formatters.durationFormatter({
                    enter: "hour",
                    store: "hour",
                    format: "hour",
                    short: true
                });
                var textEditor = {
                    type: "text",
                    map_to: "text"
                };
                var dateEditor = {
                    type: "date",
                    map_to: "start_date",
                    min: new Date(2018, 0, 1),
                    max: new Date(2019, 0, 1)
                };
                var durationEditor = {
                    type: "duration",
                    map_to: "duration",
                    formatter: durationFormatter,
                    min: 0,
                    max: 10000
                };
                var hourDurationEditor = {
                    type: "duration",
                    map_to: "duration",
                    formatter: hourFormatter,
                    min: 0,
                    max: 10000
                }; 
                gantt.config.columns = [{
                        name: "",
                        width: 15,
                        resize: false,
                        template: function(task) {
                            return "<span class='   '>" + gantt.getWBSCode(task) + "</span>"
                        }
                    },
                    {
                        name: "text",
                        tree: true,
                        width: 180,
                        resize: true,
                        editor: textEditor
                    },
                    {
                        name: "start_date",
                        label: "Start",
                        align: "center",
                        resize: true,
                        editor: dateEditor
                    },
                    {
                        name: "duration",
                        label: "Duration",
                        resize: true,
                        align: "center",
                        template: function(task) {
                            return durationFormatter.format(task.duration);
                        },
                        editor: durationEditor
                    },
                    {
                        name: "duration_hours",
                        label: "<div style='white-space: normal;line-height: 20px;margin: 10px 0;'>Duration (hours)</div>",
                        resize: true,
                        align: "center",
                        template: function(task) {
                            return hourFormatter.format(task.duration);
                        },
                        editor: hourDurationEditor
                    }, 
                    {
                        name: "add",
                        "width": 44
                    }
                ];
            }
        };
        ganttModules.grid_struct = (function(gantt) {
            gantt.templates.grid_row_class = function(start, end, task) {
                return gantt.hasChild(task.id) ? "gantt_parent_row" : "";
            };
        })(gantt);
        ganttModules.grid_struct = (function(gantt) {
            gantt.config.font_width_ratio = 7;
            gantt.templates.leftside_text = function leftSideTextTemplate(start, end, task) {
                if (getTaskFitValue(task) === "left") {
                    return task.text;
                }
                return "";
            };
            gantt.templates.rightside_text = function rightSideTextTemplate(start, end, task) {
                if (getTaskFitValue(task) === "right") {
                    return task.text;
                }
                return "";
            };
            gantt.templates.task_text = function taskTextTemplate(start, end, task) {
                if (getTaskFitValue(task) === "center") {
                    return task.text;
                }
                return "";
            };

            function getTaskFitValue(task) {
                var taskStartPos = gantt.posFromDate(task.start_date),
                    taskEndPos = gantt.posFromDate(task.end_date);

                var width = taskEndPos - taskStartPos;
                var textWidth = (task.text || "").length * gantt.config.font_width_ratio;

                if (width < textWidth) {
                    var ganttLastDate = gantt.getState().max_date;
                    var ganttEndPos = gantt.posFromDate(ganttLastDate);
                    if (ganttEndPos - taskEndPos < textWidth) {
                        return "left"
                    } else {
                        return "right"
                    }
                } else {
                    return "center";
                }
            }
        })(gantt);
        ganttModules.zoomToFit = (function(gantt) {
            var cachedSettings = {};

            function saveConfig() {
                var config = gantt.config;
                cachedSettings = {};
                cachedSettings.scales = config.scales;
                cachedSettings.template = gantt.templates.date_scale;
                cachedSettings.start_date = config.start_date;
                cachedSettings.end_date = config.end_date;
            }

            function restoreConfig() {
                applyConfig(cachedSettings);
            }

            function applyConfig(config, dates) {
                if (config.scales[0].date) {
                    gantt.templates.date_scale = null;
                } else {
                    gantt.templates.date_scale = config.scales[0].template;
                }

                gantt.config.scales = config.scales;

                if (dates && dates.start_date && dates.start_date) {
                    gantt.config.start_date = gantt.date.add(dates.start_date, -1, config.scales[0].subscale_unit);
                    gantt.config.end_date = gantt.date.add(gantt.date[config.scales[0].subscale_unit + "_start"](dates.end_date), 2, config.scales[0].subscale_unit);
                } else {
                    gantt.config.start_date = gantt.config.end_date = null;
                }
            }


            function zoomToFit() {
                var project = gantt.getSubtaskDates(),
                    areaWidth = gantt.$task.offsetWidth;

                for (var i = 0; i < scaleConfigs.length; i++) {
                    var columnCount = getUnitsBetween(project.start_date, project.end_date, scaleConfigs[i].scales[0].subscale_unit, scaleConfigs[i].scales[0].step);
                    if ((columnCount + 2) * gantt.config.min_column_width <= areaWidth) {
                        break;
                    }
                }

                if (i == scaleConfigs.length) {
                    i--;
                }

                applyConfig(scaleConfigs[i], project);
                gantt.render();
            }

            // get number of columns in timeline
            function getUnitsBetween(from, to, unit, step) {
                var start = new Date(from),
                    end = new Date(to);
                var units = 0;
                while (start.valueOf() < end.valueOf()) {
                    units++;
                    start = gantt.date.add(start, step, unit);
                }
                return units;
            }

            //Setting available scales
            var scaleConfigs = [
                // minutes
                {
                    scales: [{
                            subscale_unit: "minute",
                            unit: "hour",
                            step: 1,
                            format: "%H"
                        },
                        {
                            unit: "minute",
                            step: 1,
                            format: "%H:%i"
                        }
                    ]
                },
                // hours
                {
                    scales: [{
                            subscale_unit: "hour",
                            unit: "day",
                            step: 1,
                            format: "%j %M"
                        },
                        {
                            unit: "hour",
                            step: 1,
                            format: "%H:%i"
                        }

                    ]
                },
                // days
                {
                    scales: [{
                            subscale_unit: "day",
                            unit: "month",
                            step: 1,
                            format: "%F"
                        },
                        {
                            unit: "day",
                            step: 1,
                            format: "%j"
                        }
                    ]
                },
                // weeks
                {
                    scales: [{
                            subscale_unit: "week",
                            unit: "month",
                            step: 1,
                            date: "%F"
                        },
                        {
                            unit: "week",
                            step: 1,
                            template: function(date) {
                                var dateToStr = gantt.date.date_to_str("%d %M");
                                var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
                                return dateToStr(date) + " - " + dateToStr(endDate);
                            }
                        }
                    ]
                },
                // months
                {
                    scales: [{
                            subscale_unit: "month",
                            unit: "year",
                            step: 1,
                            format: "%Y"
                        },
                        {
                            unit: "month",
                            step: 1,
                            format: "%M"
                        }
                    ]
                },
                // quarters
                {
                    scales: [{
                            subscale_unit: "month",
                            unit: "year",
                            step: 3,
                            format: "%Y"
                        },
                        {
                            unit: "month",
                            step: 3,
                            template: function(date) {
                                var dateToStr = gantt.date.date_to_str("%M");
                                var endDate = gantt.date.add(gantt.date.add(date, 3, "month"), -1, "day");
                                return dateToStr(date) + " - " + dateToStr(endDate);
                            }
                        }
                    ]
                },
                // years
                {
                    scales: [{
                            subscale_unit: "year",
                            unit: "year",
                            step: 1,
                            date: "%Y"
                        },
                        {
                            unit: "year",
                            step: 5,
                            template: function(date) {
                                var dateToStr = gantt.date.date_to_str("%Y");
                                var endDate = gantt.date.add(gantt.date.add(date, 5, "year"), -1, "day");
                                return dateToStr(date) + " - " + dateToStr(endDate);
                            }
                        }
                    ]
                },
                // decades
                {
                    scales: [{
                            subscale_unit: "year",
                            unit: "year",
                            step: 10,
                            template: function(date) {
                                var dateToStr = gantt.date.date_to_str("%Y");
                                var endDate = gantt.date.add(gantt.date.add(date, 10, "year"), -1, "day");
                                return dateToStr(date) + " - " + dateToStr(endDate);
                            }
                        },
                        {
                            unit: "year",
                            step: 100,
                            template: function(date) {
                                var dateToStr = gantt.date.date_to_str("%Y");
                                var endDate = gantt.date.add(gantt.date.add(date, 100, "year"), -1, "day");
                                return dateToStr(date) + " - " + dateToStr(endDate);
                            }
                        }
                    ]
                }
            ];

            var enabled = false;
            return {
                enable: function() {
                    if (!enabled) {
                        enabled = true;
                        saveConfig();
                        zoomToFit();
                        gantt.render();
                    }
                },
                isEnabled: function() {
                    return enabled;
                },
                toggle: function() {
                    if (this.isEnabled()) {
                        this.disable();
                    } else {
                        this.enable();
                    }
                },
                disable: function() {
                    if (enabled) {
                        enabled = false;
                        restoreConfig();
                        gantt.render();
                    }
                }
            };

        })(gantt);
        ganttModules.zoom = (function(gantt) {

            gantt.ext.zoom.init({
                levels: [{
                        name: "hours",
                        scales: [{
                                unit: "day",
                                step: 1,
                                format: "%d %M"
                            },
                            {
                                unit: "hour",
                                step: 1,
                                format: "%h"
                            },
                        ],
                        round_dnd_dates: true,
                        min_column_width: 30,
                        scale_height: 60
                    },
                    {
                        name: "days",
                        scales: [{
                                unit: "month",
                                step: 1,
                                format: "%M"
                            },
                            {
                                unit: "week",
                                step: 1,
                                format: "%W"
                            },
                            {
                                unit: "day",
                                step: 1,
                                format: "%D"
                            },
                        ],
                        round_dnd_dates: true,
                        min_column_width: 60,
                        scale_height: 60
                    },
                    {
                        name: "weeks",
                        scales: [{
                                unit: "year",
                                step: 1,
                                format: "%Y"
                            },
                            {
                                unit: "month",
                                step: 1,
                                format: "%M"
                            },
                            {
                                unit: "week",
                                step: 1,
                                format: "%W"
                            },
                        ],
                        round_dnd_dates: false,
                        min_column_width: 60,
                        scale_height: 60
                    },
                    {
                        name: "months",
                        scales: [{
                                unit: "year",
                                step: 1,
                                format: "%Y"
                            },
                            {
                                unit: "month",
                                step: 1,
                                format: "%M"
                            }
                        ],
                        round_dnd_dates: false,
                        min_column_width: 50,
                        scale_height: 60
                    },
                    {
                        name: "quarters",
                        scales: [{
                                unit: "year",
                                step: 1,
                                format: "%Y"
                            },
                            {
                                unit: "quarter",
                                step: 1,
                                format: function quarterLabel(date) {
                                    var month = date.getMonth();
                                    var q_num;

                                    if (month >= 9) {
                                        q_num = 4;
                                    } else if (month >= 6) {
                                        q_num = 3;
                                    } else if (month >= 3) {
                                        q_num = 2;
                                    } else {
                                        q_num = 1;
                                    }

                                    return "Q" + q_num;
                                }
                            },
                            {
                                unit: "month",
                                step: 1,
                                format: "%M"
                            }
                        ],
                        round_dnd_dates: false,
                        min_column_width: 50,
                        scale_height: 60
                    },
                    {
                        name: "years",
                        scales: [{
                            unit: "year",
                            step: 1,
                            format: "%Y"
                        }, ],
                        round_dnd_dates: false,
                        min_column_width: 50,
                        scale_height: 60
                    }
                ]

            });

            var isActive = true;

            return {
                deactivate: function() {
                    isActive = false;
                },
                setZoom: function(level) {
                    isActive = true;
                    gantt.ext.zoom.setLevel(level);
                },
                zoomOut: function() {
                    isActive = true;
                    gantt.ext.zoom.zoomOut();
                    gantt.render();
                },
                zoomIn: function() {
                    isActive = true;
                    gantt.ext.zoom.zoomIn();
                    gantt.render();
                },
                canZoomOut: function() {
                    var level = gantt.ext.zoom.getCurrentLevel();

                    return !isActive || !(level > 4);
                },
                canZoomIn: function() {
                    var level = gantt.ext.zoom.getCurrentLevel();
                    return !isActive || !(level === 0);
                }
            };
        })(gantt);
        ganttModules.grid_struct = (function(gantt) {
            gantt.config.font_width_ratio = 7;
            gantt.templates.leftside_text = function leftSideTextTemplate(start, end, task) {
                if (getTaskFitValue(task) === "left") {
                    return task.text;
                }
                return "";
            };
            gantt.templates.rightside_text = function rightSideTextTemplate(start, end, task) {
                if (getTaskFitValue(task) === "right") {
                    return task.text;
                }
                return "";
            };
            gantt.templates.task_text = function taskTextTemplate(start, end, task) {
                if (getTaskFitValue(task) === "center") {
                    return task.text;
                }
                return "";
            };

            function getTaskFitValue(task) {
                var taskStartPos = gantt.posFromDate(task.start_date),
                    taskEndPos = gantt.posFromDate(task.end_date);

                var width = taskEndPos - taskStartPos;
                var textWidth = (task.text || "").length * gantt.config.font_width_ratio;

                if (width < textWidth) {
                    var ganttLastDate = gantt.getState().max_date;
                    var ganttEndPos = gantt.posFromDate(ganttLastDate);
                    if (ganttEndPos - taskEndPos < textWidth) {
                        return "left"
                    } else {
                        return "right"
                    }
                } else {
                    return "center";
                }
            }
        })(gantt);
        ganttModules.menu = (function() {
            function addClass(node, className) {
                node.className += " " + className;
            }

            function removeClass(node, className) {
                node.className = node.className.replace(new RegExp(" *" + className.replace(/\-/g, "\\-"), "g"), "");
            }

            function getButton(name) {
                return document.querySelector(".gantt-controls [data-action='" + name + "']");
            }

            function highlightButton(name) {
                addClass(getButton(name), "menu-item-active");
            }

            function unhighlightButton(name) {
                removeClass(getButton(name), "menu-item-active");
            }

            function disableButton(name) {
                addClass(getButton(name), "menu-item-disabled");
            }

            function enableButton(name) {
                removeClass(getButton(name), "menu-item-disabled");
            }

            function refreshZoomBtns() {
                var zoom = ganttModules.zoom;
                if (zoom.canZoomIn()) {
                    enableButton("zoomIn");
                } else {
                    disableButton("zoomIn");
                }
                if (zoom.canZoomOut()) {
                    enableButton("zoomOut");
                } else {
                    disableButton("zoomOut");
                }
            }

            function refreshUndoBtns() {
                if (!gantt.getUndoStack || !gantt.getUndoStack().length) {
                    disableButton("undo");
                } else {
                    enableButton("undo");
                }

                if (!gantt.getRedoStack || !gantt.getRedoStack().length) {
                    disableButton("redo");
                } else {
                    enableButton("redo");
                }

            }

            setInterval(refreshUndoBtns, 1000);

            function toggleZoomToFitBtn() {
                if (ganttModules.zoomToFit.isEnabled()) {
                    highlightButton("zoomToFit");
                } else {
                    unhighlightButton("zoomToFit");
                }
            }

            var menu = {
                undo: function() {
                    gantt.undo();
                    refreshUndoBtns();
                },
                redo: function() {
                    gantt.redo();
                    refreshUndoBtns();
                },
                zoomIn: function() {
                    ganttModules.zoomToFit.disable();
                    var zoom = ganttModules.zoom;
                    zoom.zoomIn();
                    refreshZoomBtns();
                    toggleZoomToFitBtn()
                },
                zoomOut: function() {
                    ganttModules.zoomToFit.disable();
                    ganttModules.zoom.zoomOut();
                    refreshZoomBtns();
                    toggleZoomToFitBtn()
                },
                zoomToFit: function() {
                    ganttModules.zoom.deactivate();
                    ganttModules.zoomToFit.toggle();
                    toggleZoomToFitBtn();
                    refreshZoomBtns();
                },
                fullscreen: function() {
                    gantt.expand();
                },
                collapseAll: function() {
                    gantt.eachTask(function(task) {
                        task.$open = false;
                    });
                    gantt.render();

                },
                expandAll: function() {
                    gantt.eachTask(function(task) {
                        task.$open = true;
                    });
                    gantt.render();
                },
                toggleAutoScheduling: function() {
                    gantt.config.auto_scheduling = !gantt.config.auto_scheduling;
                    if (gantt.config.auto_scheduling) {
                        gantt.autoSchedule();
                        highlightButton("toggleAutoScheduling");
                    } else {
                        unhighlightButton("toggleAutoScheduling")
                    }
                },
                toggleCriticalPath: function() {
                    gantt.config.highlight_critical_path = !gantt.config.highlight_critical_path;
                    if (gantt.config.highlight_critical_path) {
                        highlightButton("toggleCriticalPath");
                    } else {
                        unhighlightButton("toggleCriticalPath")
                    }
                    gantt.render();
                },
                toPDF: function() {
                    gantt.exportToPDF();
                },
                toPNG: function() {
                    gantt.exportToPNG();
                },
                toExcel: function() {
                    gantt.exportToExcel();
                },
                toMSProject: function() {
                    gantt.exportToMSProject();
                }
            };


            return {
                setup: function() {

                    var navBar = document.querySelector(".gantt-controls");
                    gantt.event(navBar, "click", function(e) {
                        var target = e.target || e.srcElement;
                        while (!target.hasAttribute("data-action") && target !== document.body) {
                            target = target.parentNode;
                        }

                        if (target && target.hasAttribute("data-action")) {
                            var action = target.getAttribute("data-action");
                            if (menu[action]) {
                                menu[action]();
                            }
                        }
                    });
                    this.setup = function() {};
                }
            }
        })(gantt); 
    </script>
    <script type="text/javascript">
        gantt.plugins({
            marker: true,
            fullscreen: true,
            critical_path: true,
            auto_scheduling: true,
            tooltip: true,
            undo: true
        });
        gantt.config.row_height = 50;
        

        var dateToStr = gantt.date.date_to_str(gantt.config.task_date);
        var markerId = gantt.addMarker({
            start_date: new Date(), //a Date object that sets the marker's date
            css: "today", //a CSS class applied to the marker
            text: "Today", //the marker title
            title: dateToStr( new Date()) // the marker's tooltip
        }); 

        gantt.attachEvent("onTaskCreated", function(item) {
            if (item.duration == 1) {
                item.duration = 72;
            }
            return true;
        });

        gantt.ext.fullscreen.getFullscreenElement = function() {
            return document.querySelector(".main-container");
        };

        var formatter = gantt.ext.formatters.durationFormatter({
            enter: "day",
            store: "hour",
            format: "day",
            hoursPerDay: 24,
            hoursPerWeek: 40,
            daysPerMonth: 30,
            short: true
        });
        var linksFormatter = gantt.ext.formatters.linkFormatter({
            durationFormatter: formatter
        });

        ganttModules.layout.init(gantt, formatter, linksFormatter);

        gantt.config.lightbox.sections = [{
                name: "description",
                height: 70,
                map_to: "text",
                type: "textarea",
                focus: true
            },
            {
                name: "type",
                type: "typeselect",
                map_to: "type",
                filter: function(name, value) {
                    return !!(value != gantt.config.types.project);
                }
            },
            {
                name: "time",
                type: "duration",
                map_to: "auto",
                formatter: formatter
            }
        ];
        gantt.config.lightbox.project_sections = [{
                name: "description",
                height: 70,
                map_to: "text",
                type: "textarea",
                focus: true
            },

            {
                name: "time",
                type: "duration",
                readonly: true,
                map_to: "auto",
                formatter: formatter
            }
        ];
        gantt.config.lightbox.milestone_sections = [{
                name: "description",
                height: 70,
                map_to: "text",
                type: "textarea",
                focus: true
            },
            {
                name: "type",
                type: "typeselect",
                map_to: "type",
                filter: function(name, value) {
                    return !!(value != gantt.config.types.project);
                }
            },
            {
                name: "time",
                type: "duration",
                single_date: true,
                map_to: "auto",
                formatter: formatter
            }
        ];

        //Make resize marker for two columns
        gantt.attachEvent("onColumnResizeStart", function(ind, column) {
            if (!column.tree || ind == 0) return;

            setTimeout(function() {
                var marker = document.querySelector(".gantt_grid_resize_area");
                if (!marker) return;
                var cols = gantt.getGridColumns();
                var delta = cols[ind - 1].width || 0;
                if (!delta) return;

                marker.style.boxSizing = "content-box";
                marker.style.marginLeft = -delta + "px";
                marker.style.paddingRight = delta + "px";
            }, 1);
        });

        gantt.attachEvent("onCollapse", function() {
            var el = document.querySelector(".dhx-navigation");
            if (el) {
                el.removeAttribute("style");
            }

            var chatapp = document.getElementById("chat-application");
            if (chatapp) {
                chatapp.style.visibility = "visible";
            }
        });

        gantt.attachEvent("onExpand", function() {
            var el = document.querySelector(".dhx-navigation");
            if (el) {
                el.style.position = "static";
            }

            var chatapp = document.getElementById("chat-application");
            if (chatapp) {
                chatapp.style.visibility = "hidden";
            }

        });

        gantt.templates.tooltip_text = function(start, end, task) {
            var links = task.$target;
            var labels = [];
            for (var i = 0; i < links.length; i++) {
                var link = gantt.getLink(links[i]);
                labels.push(linksFormatter.format(link));
            }
            var predecessors = labels.join(", ");

            var html = "<b>Task:</b> " + task.text + "<br/><b>Start:</b> " +
                gantt.templates.tooltip_date_format(start) +
                "<br/><b>End:</b> " + gantt.templates.tooltip_date_format(end) +
                "<br><b>Duration:</b> " + formatter.format(task.duration);
            if (predecessors) {
                html += "<br><b>Predecessors:</b>" + predecessors;
            }
            return html;
        };

        gantt.config.auto_types = true;
        gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
        gantt.config.duration_unit = "hour";

        gantt.config.row_height = 23;
        gantt.config.order_branch = "marker";
        gantt.config.order_branch_free = true;
        gantt.config.grid_resize = true;

        gantt.config.auto_scheduling_strict = true;
        gantt.config.auto_scheduling_compatibility = true;
    </script>   
@endif