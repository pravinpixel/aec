@extends('layouts.admin')

@section('admin-content')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    
    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-ganttChart-modal">Add GanttChart</button>
                <button type="button" class="btn btn-info" onclick="addTask()">Add Task</button> -->
              <!-- <button class="btn btn-primary" id="add_grantt" >Addss</button> -->
              
                {{-- <div class="card">
                    <div class="card-body">
                        <div class="row">
            

                            <!-- gantt view -->
                            <div class=" col-12 ">
                                <div class="ps-xl-3">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="javascript: void(0);" class="btn btn-success btn-sm mb-2">Add New Task</a>
                                        </div>
                                        <div class="col text-sm-end">
                                            <div class="btn-group btn-group-sm mb-2" data-bs-toggle="buttons" id="modes-filter">
                                                <label class="btn btn-primary d-none d-sm-inline-block">
                                                    <input  class="btn-check" type="radio" name="modes" id="qday" value="Quarter Day"> Quarter Day
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input  class="btn-check" type="radio" name="modes" id="hday" value="Half Day"> Half Day
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input  class="btn-check" type="radio" name="modes" id="day" value="Day"> Day
                                                </label>
                                                <label class="btn btn-primary active">
                                                    <input  class="btn-check" type="radio" name="modes" id="week" value="Week" checked> Week
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input  class="btn-check" type="radio" name="modes" id="month" value="Month"> Month
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col mt-3">
                                            <svg id="tasks-gantt"></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end gantt view -->
                        </div>
                    </div>
                </div> --}}
                <div id="gantt_here" style='width:100%; height:100%;'></div>
               
                               
                
            </div> <!-- container -->

        </div> <!-- content -->
    
       
        <div id="add-ganttChart-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <a href="index.html" class="text-success">
                                <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <form class="ps-3 pe-3" action="" id="ganttChartForm" method="POST">
                        <!-- {{ csrf_field() }} -->
                        @csrf
                            <input class="form-control ganttchartKey" type="hidden" id="ganttchartKey" name="ganttchartKey" value="" placeholder="">
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Text</label>
                                <input class="form-control gantt_text" type="text" id="gantt_text" name="gantt_text" placeholder="Text">
                            </div>

                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Date</label>
                                <input class="form-control gantt_start_date" type="date" name="gantt_start_date" id="gantt_start_date" >
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Duration</label>
                                <input class="form-control " type="number"  name="gantt_duration" id="gantt_duration" placeholder="Enter your">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Progress</label>
                                <input class="form-control gantt_progress" type="text"  name="gantt_progress" id="gantt_progress" placeholder="Enter your">
                            </div>

                            <div class="mb-3 text-center">
                                <button class="btn btn-primary" id="gantt_chart" type="submit">Sign Up Free</button>
                            </div>

                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <table id="gantt-chart-datatable" class="table bordered-table gantt-chart-datatable" style="width:100%">
            <thead>
                <tr class="text-left">
                    <th>text</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Process</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
        </table> 
    </div>  


@endsection 

@push('custom-styles')
    {{-- <link href="{{ asset('public/assets/css/vendor/frappe-gantt.css') }} " rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset("public/assets/dhtmlx/dhtmlxgantt.css") }}" rel="stylesheet">
    <style>
    .gantt_container {
        min-height: 300px !important;
    }
    
    </style>
@endpush

<!-- @push('custom-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.4.3/angular-datatables.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="{{ asset('public/assets/js/vendor/frappe-gantt.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.project-gantt.js') }}"></script> --}}
    <script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset("public/assets/dhtmlx/dhtmlxgantt.js") }}"></script>
   
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
     
    <style>
        label.error {
        color:  red !important
        }
    </style>
    <script>
      $( document ).ready(function() {
            $("#ganttChartForm").validate({
                rules: {
                    gantt_text: {
                        required: true,
                        maxlength: 50
                    },
                    gantt_start_date: {
                        required: true,
                        maxlength: 50
                    },
                    gantt_duration: {
                        required: true,
                    },
                    gantt_progress: {
                        required: true,
                    },
                   
                },
                messages: {
                    gantt_text: {
                        required: "Please enter text",
                    },
                    gantt_start_date: {
                        required: "Please enter date",
                    },
                    gantt_duration: {
                        required: "Please enter duriantion",
                    },
                    
                    gantt_progress: {
                        required: "Please enter value",
                    },
                },
            });
        }); 
</script>
<script>

        $(document).on('click','#gantt_chart', function(e){
            // alert()
            // $('#ganttChartForm')[0].reset();
            // $('#add-ganttChart-modal').modal('hide'); 
            e.preventDefault();
            $('#gantt-chart-datatable').DataTable().clear().draw();
            if(!$("#ganttChartForm").valid()){
                return false;
                }
              
            
            var datas = $('#ganttChartForm').serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('admin.ganttChartForm') }}",
                data:$('#ganttChartForm').serialize() ,
                
                success: function( msg ) {
                alert( JSON.stringify(msg));
                
                $('#ganttChartForm')[0].reset();
                $('#add-ganttChart-modal').modal('hide');
                    
                    loadGantt();

            }});

        });

        $(document).ready( function(e){
            // alert()
            // $('#gantt-chart-datatable').DataTable().clear().draw();
            var table = $('#gantt-chart-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.ganttChart.list') }}",
                  
                    columns: [
                        {data: 'text', name: 'text'},
                        {data: 'start_date', name: 'start_date'},
                        {data: 'duration', name: 'duration'},
                        {data: 'progress', name: 'progress'},
                        
                        {
                            data: 'action', 
                            name: 'action', 
                            orderable: true, 
                            searchable: true
                        },
                    ]
                });
        });


       
        gantt.init("gantt_here");

        var data = "{{ route('admin.ganttChart.list') }}";
        // var URL = "http://192.168.0.68/aec-santhosh/aec/data.json";
        gantt.load(data, "json");
            // gantt.parse(data);

        function  getGanttData() {
            // var data = "{{ route('admin.ganttChart.list') }}";
            // var URL = "http://192.168.0.68/aec-santhosh/aec/data.json";
            // gantt.load(URL, "json");
            // gantt.parse(data);
        }

        
        let  count = 0;
        let  task_name   = "Add me a Task"
        let  task_date   = "20219-12-25"
        let  dur_time    = "2"

        function addTask() {
     
            var taskId = gantt.addTask({
                parent: 14,
                id:  count += 1,
                text: task_name,
                start_date: task_date,
                duration: dur_time, 
            }, "project_2", 5);
        }



        $(document).on('click','.editGanttChart',function (e) {
 
                    let ganttChartId = $(this).data('gantt-chart-id');
                    // alert(ganttChartId)
                    // console.log();
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.ganttChartEdit') }}",
                    data: {id:ganttChartId}, 
                    success: function(msg) {
                    // alert(msg)
                    $('#gantt-chart-datatable').DataTable().clear().draw();
                    alert( JSON.stringify(msg)); 
                     
                    $('#add-ganttChart-modal').modal('show'); 
                    $("#ganttChartForm").html(''); 
                    // $("#ganttchartKey").val(msg.data.id).hide();
                    // $("#gantt_text").val(msg.data.text);
                    // $(".gantt_start_date").val(msg.data.start_date);
                    // $("#gantt_duration").val(msg.data.duration);
                    // $("#gantt_progress").val(msg.data.progress);                 


                    $("#ganttChartForm").html(`
                        <input class="form-control ganttchartKey" type="hidden" id="ganttchartKey" name="ganttchartKey" value="${msg.data.id} " placeholder="">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Text</label>
                            <input class="form-control gantt_text" type="text" id="gantt_text" name="gantt_text" value="${msg.data.text}" placeholder="Text">
                        </div>

                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Date</label>
                            <input class="form-control gantt_start_date" type="date" name="gantt_start_date" id="gantt_start_date" value="${msg.data.start_date}" >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Duration</label>
                            <input class="form-control " type="number"  name="gantt_duration" id="gantt_duration" value="${msg.data.duration}" placeholder="Enter your">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Progress</label>
                            <input class="form-control gantt_progress" type="text"  name="gantt_progress" id="gantt_progress" value="${msg.data.progress}" placeholder="Enter your">
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" id="gantt_chart" type="submit">Update</button>
                        </div>
                        `);

                    }
                    });
                });

                $(document).on('click','.delete_GanttChart',function (e) {
                    e.preventDefault();
                   let estimateId = $(this).data('gantt-chart-id');
                //    let estimateId = $('.delete_GanttChart').data();
                   alert( estimateId)
                   $.ajax({
                   type: "GET",
                   url: "{{ route('admin.ganttChartDelete') }}",
                   data: {id:estimateId},  
                   success: function( msg ) {
                       alert(JSON.stringify(msg))
                       $('#gantt-chart-datatable').DataTable().clear().draw();
                      
                   }
                   });

               });


    </script>
@endpush -->

@push('custom-scripts')

    <style>
       .admin-Project_Schedule-wiz .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
        .navbar-custom, .leftside-menu {
            z-index: 1 !important;
        }
        .gantt_grid_head_cell, .gantt_task_scale {
            background: #757CF2 !important;
            color: white !important
        }
        .gantt_task_scale .gantt_scale_cell {
            color: white !important
        }
        .gantt_grid_head_cell.gantt_grid_head_add {
            opacity: 1 !important;
        }
    </style> 

    <link href="{{ asset("public/assets/dhtmlx/dhtmlxgantt.css") }}" rel="stylesheet">
    <script src="{{ asset("public/assets/dhtmlx/dhtmlxgantt.js") }}"></script>
 
    <script>
        var URL = "{{ route('admin.ganttChart.list') }}";
       
        gantt.init("gantt_here");
        gantt.load(URL, "json");
          

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
        
    </script>
@endpush
