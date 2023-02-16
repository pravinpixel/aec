@extends('layouts.admin')

@push('custom-styles')
<style>
    .css-running-projects{
        height: 300px;
        overflow-y: scroll;
    }
</style>
@endpush
@section('admin-content')
    <div class="content-page"  ng-app="Myapp">
        <div class="content" ng-controller="projectController">
            @include('admin.includes.top-bar')
            <!-- Start Content-->
            <div class="container-fluid ">
                <div class="content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <form class="d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-light"
                                                id="dash-daterange">
                                            <span class="input-group-text bg-primary border-primary text-white">
                                                <i class="mdi mdi-calendar-range font-13"></i>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <h4 class="page-title">Project Summary</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="main">
                        <div class="row g-0">
                            <div class="col-xl-12">
                                <div class="row g-2 m-0">
                                       
                                    <div class="col-sm">
                                        <div class="live-status-bg">
                                            <h3>Ready for Project</h3>
                                            <p class="count">{{$ready_for_project}}</p>
                                            <span class="btn btn-info text-white">
                                                <i class="mdi mdi-playlist-check"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="live-status-bg">
                                            <h3>New Projects</h3>
                                            <p class="count">{{$new_project}}</p>
                                            <span class="btn btn-success">
                                                <i class="mdi mdi-coffee-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end card-->
                                    <div class="col-sm">
                                        <div class="live-status-bg">
                                            <h3>Current Projects</h3>
                                            <p class="count">{{$current_project}}</p>
                                            <span class="btn btn-primary">
                                                <i class="mdi mdi-gift-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end card-->
                                    <div class="col-sm">
                                        <div class="live-status-bg">
                                            <h3>Completed Projects</h3>
                                            <p class="count">{{$completed_project}}</p>
                                            <span class="btn btn-warning text-white">
                                                <i class="mdi mdi-comment-check-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end card-->
                                    <div class="col-sm">
                                        <div class="live-status-bg">
                                            <h3>New Variation Orders</h3>
                                            <p class="count">{{$new_variation_orders}}</p>
                                            <span class="btn btn-secondary text-white">
                                                <i class="mdi mdi-format-list-checks"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!-- end col -->
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <h4 class="header-title text-uppercase">
                                    Project Status
                                </h4>
                                <div class="card">
                                    <div class="card-body d-flex overflow-hidden">
                                        <nav class="sidebar">
                                            <ul class="nav flex-column" id="nav_accordion">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"> Link name </a>
                                                </li>
                                                <li class="nav-item has-submenu">
                                                    <a class="nav-link" href="#"> Submenu links </a>
                                                    <ul class="submenu collapse">
                                                        <li><a class="nav-link" href="#">Submenu item 1 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 2 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 3 </a> </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item has-submenu">
                                                    <a class="nav-link" href="#"> More menus </a>
                                                    <ul class="submenu collapse">
                                                        <li><a class="nav-link" href="#">Submenu item 4 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 5 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 6 </a></li>
                                                        <li><a class="nav-link" href="#">Submenu item 7 </a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"> Something </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"> Other link </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <div id="project-status-chart"></div>
                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card-->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <h4 class="header-title text-uppercase">Total Projects</h4>
                                <div class="card">
                                    <div class="card-header">
                                       
                                        <select onchange="totalSaleFilter()"  name="total_sale_filter" id="total_sale_filter" class="form-select float-end w-auto">
                                            <option value="">-- Choose -- </option>
                                            <option value="one_month" selected>1 Month</option>
                                            <option value="one_quarter">1 Quarter</option>
                                            <option value="one_year">1 Year</option>
                                            <option value="two_year">2 Years</option>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <div id="sales-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->


                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <h4 class="header-title text-uppercase">Sales by Customer</h4>
                                <div class="card">
                                    <div class="card-header">
                                        
                                        <select onchange="saleByCustomer()" name="sale_by_customer" id="sale_by_customer" class="form-select float-end w-auto">
                                            <option value="">-- Choose -- </option>
                                            <option value="one_month" selected>1 Month</option>
                                            <option value="one_quarter">1 Quarter</option>
                                            <option value="one_year">1 Year</option>
                                            <option value="two_year">2 Years</option>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <div id="customer-sales-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->


                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <h4 class="header-title text-uppercase">Running Projects</h4>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="dropdown float-end ms-2">
                                            <a href="#"
                                                class="dropdown-toggle arrow-none btn btn-light btn-xs border"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Monthly</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Quarter</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Year</a>
                                            </div>
                                        </div>
                                        <select name="" id="" class="form-select float-end w-auto">
                                            <option value="">-- Choose -- </option>
                                            <option value="" selected>Working Time</option>
                                            <option value="">Task</option>
                                        </select>
                                    </div>
                                    <div class="card-body  css-running-projects">
                                        <table class="table table-hover running-projects">
                                            <tbody>
                                                @foreach($running_projects as $running_project)
                                                    <tr>
                                                        <td width="50">
                                                            <div class="running-project-name bg-primary-lighten text-primary">{{strtoupper(mb_substr($running_project->project_name, 0, 1))}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{$running_project->project_name}} <span class="badge bg-primary ms-1"> {{$running_project->progress_percentage}} %</span>
                                                        </td>
                                                        <td class="text-end">
                                                            {{$running_project->time_diff}}
                                                        </td>
                                                        <td width="100">
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width:{{$running_project->progress_percentage}}%" aria-valuenow="{{$running_project->progress_percentage}}" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <a href="#">Show all projects <span
                                                class="mdi mdi-chevron-right"></span></a>
                                    </div> -->
                                </div>
                            </div>
                            <!-- end col -->


                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <h4 class="header-title text-uppercase">Estimated Hours vs. Actual Hours by Project</h4>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="dropdown float-end ms-2">
                                            <a href="#"
                                                class="dropdown-toggle arrow-none btn btn-light btn-xs border"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Monthly</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Quarter</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">1 Year</a>
                                            </div>
                                        </div>
                                        <select name="filter" id="" class="form-select float-end w-auto">
                                            <option value="">-- Choose -- </option>
                                            <option value="" selected>1 Month</option>
                                            <option value="">1 Quarter</option>
                                            <option value="">1 Year</option>
                                            <option value="">2 Years</option>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <div id="estimated-hours-chart" style="height:325px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                        @include('admin.dashboard.table.project-summary')
                        <!-- end row -->

                    </div>
                    <!-- container -->
                </div>
            </div>
            <!-- container -->
        </div>
        <!-- content -->
    </div>
@endsection


@push('custom-scripts')
    <script>
        $(".has-submenu a.nav-link").click(function() {
            $(".has-submenu a.nav-link").removeClass("active");
            $(this).addClass("active");
            $(this).closest('.has-submenu').addClass("active");
        });
    </script>
    <!-- third party js -->
    <script src="{{ asset('public/assets/js/vendor/Chart.bundle.min.js') }}"></script>
    <!-- third party js ends -->
    <!-- third party js -->
    <!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
    <script src="{{ asset('public/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- third party js ends -->
    <!-- demo app -->
    <script src="{{ asset('public/assets/js/pages/demo.dashboard.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.dashboard-analytics.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.apex-column.js') }}"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {

                element.addEventListener('click', function(e) {

                    let nextEl = element.nextElementSibling;
                    let parentEl = element.parentElement;

                    if (nextEl) {
                        e.preventDefault();
                        let mycollapse = new bootstrap.Collapse(nextEl);

                        if (nextEl.classList.contains('show')) {
                            mycollapse.hide();
                        } else {
                            mycollapse.show();
                            // find other submenus with class=show
                            var opened_submenu = parentEl.parentElement.querySelector(
                                '.submenu.show');
                            // if it exists, then close all of them
                            if (opened_submenu) {
                                new bootstrap.Collapse(opened_submenu);
                            }
                        }
                    }
                }); // addEventListener
            }) // forEach
        });
    </script>
    <script>
        const baseUrl = $("#baseurl").val();
        var Highcharts =  Highcharts.chart('sales-chart', {
            chart: {
                type: 'area'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: 'No of Projects'
                }
            },
            plotOptions: {
                area: {
                    fillOpacity: 0.5
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                showInLegend: false,
                name: 'Total Project',
                color: '#008ffb',
                data: []
            }]
        });
       
        function totalSaleFilter(){
            let value = $("#total_sale_filter").val();
            axios.post(`${baseUrl}admin/get-total-sales`,{filter: value}).then((response) => { 
                var chart = $('#sales-chart').highcharts();
                chart.xAxis[0].update({categories:response.data.category}, true);
                chart.series[0].update({data:response.data.category_count}, true);
                chart.redraw();
            });
        }
       
        $(function(){
            totalSaleFilter();
        })
    </script>

    <script>
        var categories = {!! json_encode($sale_by_customer) !!}
		var data = {!! json_encode($sale_by_series) !!}
       
        var options = {
            series: [{
                data: data
            }],
            tooltip: {
                y: {
                formatter: function(val) {
                    return val;
                },
                title: {
                    formatter: function (seriesName) {
                    return 'Amount'
                    }
                }
                }
            },
            chart: {
                type: 'bar',
                height: 385,
                stacked: true,
                toolbar: {
                    show: true
                },
                zoom: {
                    enabled: true
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 10
                },
            },
            xaxis: {
                type: 'category',
                categories: categories
            },
            yaxis: {
                // categories: [0, 40, 80, 120, 160, 200, 240],
                labels: {
                    formatter: function(val) {
                        return val
                    }
                }
            },
            legend: {
                show: false,
            },
            fill: {
                opacity: 1
            }
        };

        var sales_chart = new ApexCharts(document.querySelector("#customer-sales-chart"), options);
        sales_chart.render();

        // function saleByCustomer(){
        //     let value = $("#sale-by-customer").val();
        //     axios.post(`${baseUrl}admin/get-total-sales`,{filter: value}).then((response) => { 
        //         sales_chart.updateOptions({
        //             xaxis: {
        //                 categories: response.data.sale_by_customer
        //             },
        //             series: [{
        //                 data: response.data.sale_by_series
        //             }],
        //         });
        //         sales_chart.render();
        //     });
        // }
        // saleByCustomer();
    </script>



    <script>

        var estimated_hours = {!! json_encode($estimated_hours) !!}
		var customers = {!! json_encode($estimated_customers) !!}


        var options = {
            series: [{
                name: 'Estimated Hours',
                type: 'column',
                data: estimated_hours
            }, {
                name: 'Actual Hours',
                type: 'line',
                data: []
            }],
            chart: {
                height: 312,
                type: 'line',
                stacked: false
            },
            dataLabels: {
                enabled: true,
                enabledOnSeries: [1]
            },
            stroke: {
                curve: 'smooth',
                width: [0, 3]
            },
            title: {
                text: ' ',
                align: 'left',
                offsetX: 110
            },
            xaxis: {
                categories: customers,
            },
            yaxis: [{
                    axisTicks: {
                        show: true,
                    },
                    axisBorder: {
                        show: true,
                        color: '#008FFB'
                    },
                    labels: {
                        style: {
                            colors: '#008FFB',
                        }
                    },
                    title: {
                        text: 'Hours',
                        style: {
                            color: '#008FFB',
                        }
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                {
                    seriesName: 'Income',
                    opposite: true,
                    axisTicks: {
                        show: true,
                    },
                    axisBorder: {
                        show: true,
                        color: '#00E396'
                    },
                    labels: {
                        style: {
                            colors: '#00E396',
                        }
                    },
                    title: {
                        text: " ",
                        style: {
                            color: '#00E396',
                        }
                    },
                },
            ],
            dataLabels: {
                enabled: false
            },
            tooltip: {
                fixed: {
                    enabled: true,
                    position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
                    offsetY: 30,
                    offsetX: 60
                },
            },
            legend: {
                show: false,
            }
        };

        var chart = new ApexCharts(document.querySelector("#estimated-hours-chart"), options);
        chart.render();
    </script>

    <script src="{{ asset('public/assets/js/vendor/apexcharts.min.js') }}"></script>

    <script>
        var options = {
            series: [{
                name: 'Project Name',
                data: [1, 2, 3, 4, 5, 6]
            }],
            chart: {
                type: 'bar',
                height: 300,
                toolbar: {
                    show: true
                },
                zoom: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 0,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            },
            yaxis: {
                categories: ['1', '2', '3', '4', '5', '6'],
            }
        };

        var chart = new ApexCharts(document.querySelector("#project-status-chart"), options);
        chart.render();
    </script>


    <!-- end demo js-->
    <script src="{{ asset("public/custom/js/ngControllers/admin/project/dashboard.js") }}"></script>
@endpush
