@extends('admin.layouts.app')

@section('admin-content')
   
    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')
              

                <div class="card">
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
                </div>

                
            </div> <!-- container -->

        </div> <!-- content -->


    </div>  

@endsection 

@push('custom-styles')
    <link href="{{ asset('public/assets/css/vendor/frappe-gantt.css') }} " rel="stylesheet" type="text/css" />
@endpush

@push('custom-scripts')
    <script src="{{ asset('public/assets/js/vendor/frappe-gantt.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.project-gantt.js') }}"></script>
@endpush