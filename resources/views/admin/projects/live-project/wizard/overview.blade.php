<div class="row m-0 align-items-end">
    <div class="col-sm-6 col-md-3 col-lg-3 my-3">
        <div class="d-flex">
            <i class="mdi mdi-account fa-3x text-success mb-0 me-2"></i>
            <div>
                <h4>Customer Name</h4>
                <p class="mb-0">William M. Iglesias</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 my-3">
        <div class="d-flex">
            <i class="mdi mdi-comment-account fa-3x text-primary mb-0 me-2"></i>
            <div>
                <h4>Contact Person</h4>
                <p class="mb-0">Douglas W. Puleo</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 my-3">
        <div class="d-flex">
            <i class="mdi mdi-email-open fa-3x text-danger mb-0 me-2"></i>
            <div>
                <h4>Email</h4>
                <p class="mb-0">DouglasWPuleo@jourrapide.com</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 my-3">
        <div class="d-flex">
            <i class="mdi mdi-deskphone fa-3x text-info mb-0 me-2"></i>
            <div>
                <h4>Phone</h4>
                <p class="mb-0">707-629-8764</p>
            </div>
        </div>
    </div>
</div>
<hr />
<div class="row m-0">
    <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card border shadow-none">
            <div class="card-header p-2">
                <h4 class="header-title text-uppercase mb-0">
                    Project Status
                </h4>
            </div>
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-xl-7 col-lg-6 col-md-12">
                        <div class="card border shadow-none mb-0">
                            <div class="card-header">
                                <h5 class="mb-0 float-start">
                                    Project Completion by Task
                                </h5>
                                <div class="dropdown float-end">
                                    <a href="javascript:void(0);"
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
                                <a href="#" class="btn float-end btn-xs">
                                    <i class="mdi mdi-arrow-expand"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div id="project-completion-chart"></div>
                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-12">
                        <div class="card border shadow-none mb-0">
                            <div class="card-header">
                                <h5 class="mb-0 float-start">
                                    Project Completion
                                </h5>
                                <div class="dropdown float-end">
                                    <a href="javascript:void(0);"
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
                            </div>
                            <div class="card-body">
                                <div id="project-completion-chart1"></div>
                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card border shadow-none">
            <div class="card-header p-2">
                <h4 class="header-title text-uppercase mb-0">
                    Project Status
                </h4>
            </div>
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-12">
                        <div class="card border shadow-none mb-0">
                            <div class="card-header">
                                <h5 class="m-0">
                                    Budget Amount
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="m-0 text-center min-h-300">
                                    <div>
                                        <canvas id="budgetChart" width="100%"></canvas>
                                        <h3 class="text-center">34%</h3>
                                    </div>
                                    <div class="row text-center mx-0 ">
                                        <div class="col-6">
                                            <small class="m-0"> Original Budget</small>
                                            <h5 class="fw-bold mt-0">
                                                <span>100,000 Kr</span>
                                            </h5>
                                        </div>
                                        <div class="col-6">
                                            <small class="m-0"> Received Amount</small>
                                            <h5 class="fw-bold mt-0">
                                                <span>34,000 Kr</span>
                                            </h5>
                                        </div>
                                        <div class="col-6">
                                            <small class="m-0"> Total Invoice</small>
                                            <h5 class="fw-bold mt-0">
                                                <span>5</span>
                                            </h5>
                                        </div>
                                        <div class="col-6">
                                            <small class="m-0"> Unsent Invoice</small>
                                            <h5 class="fw-bold mt-0">
                                                <span>1</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-12">
                        <div class="card border shadow-none mb-0">
                            <div class="card-header">
                                <h5 class="m-0">
                                    Invoice Paid Date
                                </h5>
                            </div>
                            <div class="card-body">
                                <div id="invoice-chart"></div>
                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

<div class="row m-0">
    <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card border shadow-none">
            <div class="card-header">
                <h4 class="header-title text-uppercase mb-0 mt-2 float-start">
                    Estimated Vs. Utilized Hours by Milestone
                </h4>
                <div class="dropdown float-end">
                    <a href="javascript:void(0);" class="dropdown-toggle arrow-none btn btn-light btn-xs border"
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
                <a href="#" class="btn float-end btn-xs">
                    <i class="mdi mdi-arrow-expand"></i>
                </a>
            </div>
            <div class="card-body p-2">
                <div id="estimated-utilized-chart" style=" height: 380px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card shadow-sm border">
            <div class="card-header">
                <h4 class="header-title text-uppercase mb-0">
                    Variation Order Status
                </h4>
            </div>
            <div class="card-body p-0 py-2 bg-light">
                <div class="row m-0">
                    <div class="col-lg-4">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="x-y-center">
                                <div class="mdi mdi-check-circle fa-2x text-success"></div>
                                <strong class="lead fw-bold ms-2">15</strong>
                            </div>
                            <div>Approved</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="x-y-center">
                                <div class="mdi mdi-chat-processing fa-2x text-warning"></div>
                                <strong class="lead fw-bold ms-2">5</strong>
                            </div>
                            <div>Pending</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="x-y-center">
                                <div class="mdi mdi-close-circle fa-2x text-danger"></div>
                                <strong class="lead fw-bold ms-2">6</strong>
                            </div>
                            <div>Rejected</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
        <div class="row">


    <div class="col-xl-8 col-lg-8 col-md-12">
         <div class="card shadow-sm border mb-0 bg-light">
            <div class="card-body p-0 py-2">
                <div class="row m-0">
                    <div class="col-lg-4">
                        <h5>
                            BIM 360 Issues
                        </h5>
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Open</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-danger x-y-center count-box">15</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Answered</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-success x-y-center count-box">5</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Closed</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-secondary x-y-center count-box">6</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Void</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-light text-secondary border x-y-center count-box">6</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5>
                            Internal Issues
                        </h5>
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Open</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-danger x-y-center count-box">15</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Answered</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-success x-y-center count-box">5</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Closed</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-secondary x-y-center count-box">6</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Void</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-light text-secondary border x-y-center count-box">6</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5>
                            Customer Issues
                        </h5>
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Open</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-danger x-y-center count-box">15</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Answered</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-success x-y-center count-box">5</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Closed</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-secondary x-y-center count-box">6</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-between">
                                        <strong>Void</strong>
                                        <strong
                                            class="lead fw-bold ms-2 badge bg-light text-secondary border x-y-center count-box">6</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-4 col-lg-4 col-md-12">
      
         <div class="card shadow-sm border mb-0">
            <div class="card-header">
                <h5 class="m-0">
                    Issues by Severity
                </h5>
            </div>
            <div class="card-body p-0 py-2">
               <div class="m-0 text-center min-h-300">
            <div>
                <canvas id="project-status"></canvas>
            </div>
            
        </div>
            </div>
         </div>
      </div>

        </div>
        
    </div>
    <!-- end col -->

</div>

@if (Route::is('live-project.overview'))
    {!! Html::script('public/assets/js/vendor/Chart.bundle.min.js') !!}
    <script>
        const project_status = document.getElementById('project-status').getContext('2d');

        const data = {
            labels: ['On Schedule', ' All Tasks', 'Overdue', ],
            datasets: [{
                label: 'Dataset 1',
                data: [100, 100, 100],
                backgroundColor: ["#20CF98", "#FDBC2A", "#F85A7E"]
            }]
        };
        const config = new Chart(project_status, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    text: ' '
                },
            },
        });

        var data2 = {
            datasets: [{
                data: [34, 66],
                backgroundColor: [
                    "#20CF98",
                    "#eee",
                ]
            }]
        };

        var ctx = document.getElementById("budgetChart");

        // And for a doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data2,
            options: {
                rotation: 1 * Math.PI,
                circumference: 1 * Math.PI,
                responsive: true,
                legend: {
                    display: false
                },
                title: {
                    display: false,
                    text: 'Project Tasks'
                },
            }
        });
    </script>
    <script src="{{ asset('public/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            series: [{
                data: [400, 430, 448, 470, 540, 580]
            }],
            chart: {
                type: 'bar',
                height: 230
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Design', 'Discovery', 'Out of Scope', 'Development', 'Quality Assurance', 'Production'],
            }
        };

        var chart = new ApexCharts(document.querySelector("#project-completion-chart"), options);
        chart.render();
    </script>

    <script>
        var options = {
            series: [{
                name: 'Project 1',
                data: [44, 55, 41, 37, 22]
            }, {
                name: 'Project 2',
                data: [53, 32, 33, 52, 13]
            }],
            chart: {
                type: 'bar',
                height: 250,
                stacked: true,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                },
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            title: {
                text: ' '
            },
            xaxis: {
                title: {
                    text: 'Invoice Sent Date'
                },
                categories: ['Invoice 7', 'Invoice 6', 'Invoice 5', 'Invoice 4', 'Invoice 3', 'Invoice 2', 'Invoice 1'],
                labels: {
                    formatter: function(val) {
                        return val + "K"
                    }
                }
            },
            yaxis: {
                title: {
                    text: ' '
                },
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + "K"
                    }
                }
            },
            fill: {
                opacity: 1
            },
            dataLabels: {
                enabled: true
            },
            legend: {
                show: false,
            },
        };

        var chart = new ApexCharts(document.querySelector("#invoice-chart"), options);
        chart.render();
    </script>

    <script>
        var options = {
            series: [{
                name: 'Income',
                type: 'column',
                data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
            }, {
                name: 'Cashflow',
                type: 'column',
                data: [1.1, 3, 3.1, 4, 4.1, 4.9, 6.5, 8.5]
            }, {
                name: 'Revenue',
                type: 'line',
                data: [20, 29, 37, 36, 44, 45, 50, 58]
            }],
            chart: {
                height: 350,
                type: 'line',
                stacked: false
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [1, 1, 4]
            },
            title: {
                text: 'XYZ - Stock Analysis (2009 - 2016)',
                align: 'left',
                offsetX: 110
            },
            xaxis: {
                categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016],
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
                        text: "Income (thousand crores)",
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
                        text: "Operating Cashflow (thousand crores)",
                        style: {
                            color: '#00E396',
                        }
                    },
                },
                {
                    seriesName: 'Revenue',
                    opposite: true,
                    axisTicks: {
                        show: true,
                    },
                    axisBorder: {
                        show: true,
                        color: '#FEB019'
                    },
                    labels: {
                        style: {
                            colors: '#FEB019',
                        },
                    },
                    title: {
                        text: "Revenue (thousand crores)",
                        style: {
                            color: '#FEB019',
                        }
                    }
                },
            ],
            tooltip: {
                fixed: {
                    enabled: true,
                    position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
                    offsetY: 30,
                    offsetX: 60
                },
            },
            legend: {
                horizontalAlign: 'left',
                offsetX: 40
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>



    <script>
        $(function() {
            $('#estimated-utilized-chart').highcharts({
                chart: {
                    zoomType: 'xy'
                },
                title: {
                    text: ' '
                },
                xAxis: [{
                    categories: ['Milstone_02', 'Milstone_15', 'Milstone_09', 'Milstone_01',
                        'Milstone_06', 'Milstone_12', 'Milstone_07', 'Milstone_04',
                        'Milstone_13', 'Milstone_03', 'Milstone_05', 'Milstone_10'
                    ],
                    crosshair: true
                }],
                yAxis: [{ // Primary yAxis
                    labels: {

                    },
                    title: {
                        text: '',
                    }
                }, { // Secondary yAxis
                    title: {
                        text: 'Estimated Hours',
                    },
                    labels: {
                        format: '{value}',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    opposite: true
                }],
                tooltip: {
                    shared: true
                },
                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },
                credits: {
                    enabled: false,
                },
                legend: {
                    enabled: false
                },
                series: [{
                    name: 'Rainfall',
                    type: 'column',
                    stack: 1,
                    yAxis: 1,
                    data: [{
                        y: 49.9,
                        color: '#008ffb'
                    }, {
                        y: 135.5,
                        color: '#008ffb'
                    }, {
                        y: 106.4,
                        color: '#00e396'
                    }, {
                        y: 129.2,
                        color: '#00e396'
                    }, {
                        y: 144.0,
                        color: '#008ffb'
                    }, {
                        y: 176.0,
                        color: '#008ffb'
                    }, {
                        y: 136.6,
                        color: '#00e396'
                    }, {
                        y: 148.5,
                        color: '#008ffb'
                    }, {
                        y: 216.4,
                        color: '#00e396'
                    }, {
                        y: 294.1,
                        color: '#008ffb'
                    }, {
                        y: 295.6,
                        color: '#008ffb'
                    }, {
                        y: 354.4,
                        color: '#00e396'
                    }],


                }, {
                    name: 'Temperature',
                    type: 'spline',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],

                }]
            });
        });
    </script>
@endif
