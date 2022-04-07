<div class="row m-0 align-items-center px-1 mt-2">
    <div class="col-md-6 px-1 mb-2">
        <div class="card shadow-sm bg-light mb-0 shadow-sm">
            <div class="card-header border-0 pb-0 bg-light">
                <strong class="fw-bold"> Variation Order Status</strong>
            </div>
            <div class="card-body p-0 py-2">
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
    </div>
    <div class="col-md-6 px-1 mb-2">
        <div class="card shadow-sm bg-light mb-0 shadow-sm">
            <div class="card-header border-0 pb-0 bg-light">
                <strong class="fw-bold"> Project Tasks</strong>
            </div>
            <div class="card-body p-0 py-2">
                <div class="row m-0">
                    <div class="col-lg-4">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="x-y-center">
                                <div class="mdi mdi-check-network fa-2x text-secondary"></div>
                                <strong class="lead fw-bold ms-2">10</strong>
                            </div>
                            <div>Not Started</div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="x-y-center">
                                <div class="mdi mdi-check-network fa-2x text-warning"></div>
                                <strong class="lead fw-bold ms-2">32</strong>
                            </div>
                            <div>In Progress</div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="x-y-center">
                                <div class="mdi mdi-check-network fa-2x text-success"></div>
                                <strong class="lead fw-bold ms-2">2584</strong>
                            </div>
                            <div>Completed</div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 px-1 mb-2">
        <div class="card shadow-sm border mb-0 shadow-sm bg-light">
            <div class="card-header border-0 pb-0 bg-light">
                <strong class="fw-bold"> BIM 360 Issues</strong>
            </div>
            <div class="card-body p-0 py-2">
                <div class="row m-0 ps-2">
                    <div class="col-lg-12 ps-0 mb-2">
                        <div class="card shadow-sm border m-0 p-3 text-center">
                            <div class="x-y-between">
                                <strong>Open</strong>
                                <strong class="lead fw-bold ms-2 badge bg-danger x-y-center count-box">15</strong>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-12 ps-0 mb-2">
                        <div class="card shadow-sm border m-0 p-3 text-center">
                            <div class="x-y-between">
                                <strong>Answered</strong>
                                <strong class="lead fw-bold ms-2 badge bg-success x-y-center count-box">5</strong>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-12 ps-0 mb-2">
                        <div class="card shadow-sm border m-0 p-3 text-center">
                            <div class="x-y-between">
                                <strong>Closed</strong>
                                <strong class="lead fw-bold ms-2 badge bg-secondary x-y-center count-box">6</strong>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-12 ps-0">
                        <div class="card shadow-sm border m-0 p-3 text-center">
                            <div class="x-y-between">
                                <strong>Void</strong>
                                <strong class="lead fw-bold ms-2 badge bg-light text-secondary border x-y-center count-box">6</strong>
                            </div> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>  
    <div class="col-md-6 px-1 mb-2">
        <div class="m-0 p-2 text-center">
            <div>
                <canvas id="project-status"></canvas> 
            </div>
            <div class="card shadow-sm border mt-3 bg-light">
                <div class="row text-center mx-0 p-2">
                    <div class="col-md-4">
                        <h3 class="fw-bold m-0">
                            <span>60</span>
                        </h3>
                        <p class="text-muted m-0"><i class="mdi mdi-checkbox-blank-circle text-success"></i> On Schedule</p>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fw-bold m-0">
                            <span>325</span>
                        </h3>
                        <p class="text-muted m-0"><i class="mdi mdi-checkbox-blank-circle text-warning"></i> All Tasks</p>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fw-bold m-0">
                            <span>12</span>
                        </h3>
                        <p class="text-muted m-0"><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Overdue</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 px-1 mb-2">
        <div class="m-0 p-2 text-center">
            <div>
                <canvas id="myChart" width="100%"></canvas>
            </div>
            <div class="card shadow-sm border m-0 mt-3  bg-light">
                <div class="row text-center mx-0 ">
                    <div class="col">
                        <small class="text-muted m-0"> Original Budget</small>
                        <h5 class="fw-bold">
                            <span>$ 93,258</span>
                        </h5>
                    </div>
                    <div class="col">
                        <small class="text-muted m-0"> Invoiced Amount</small>
                        <h5 class="fw-bold">
                            <span>$ 6,258</span>
                        </h5>
                    </div>
                    <div class="col">
                        <small class="text-muted m-0"> Original Hours</small>
                        <h5 class="fw-bold">
                            <span>$ 47,258</span>
                        </h5>
                    </div>
                    <div class="col">
                        <small class="text-muted m-0"> Used Hours</small>
                        <h5 class="fw-bold">
                            <span>$ 13,258</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 px-1 mb-2">
        <div class="card shadow-sm border mb-0 shadow-sm bg-light" style="min-height: 383px">
            <div class="card-header border-0 pb-0 bg-light">
                <strong class="fw-bold"> Financials</strong>
            </div>
            <div class="card-body p-0 py-2">
                <div class="row m-0 ps-2">
                    <div class="col-lg-12 ps-0 mb-2">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="text-success mb-1 x-y-center">
                                <i class="mdi mdi-arrow-up-bold fa-2x me-2 "></i> 
                                <span class="lead fw-bold">$ 196,254</span>
                            </div>
                            <strong class="text-secondary"> Paid Invoices</strong>
                        </div>
                    </div> 
                    <div class="col-lg-12 ps-0 mb-2">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="text-warning mb-1 x-y-center">
                                <i class="mdi mdi-arrow-down-bold fa-2x me-2"></i> 
                                <span class="lead fw-bold">$ 21,547</span>
                            </div>
                            <strong class="text-secondary"> Unpaid Invoices</strong>
                        </div>
                    </div> 
                    <div class="col-lg-12 ps-0">
                        <div class="card shadow-sm border m-0 p-2 text-center">
                            <div class="text-danger mb-1 x-y-center">
                                <i class="mdi mdi-arrow-right-bold fa-2x me-2"></i> 
                                <span class="lead fw-bold">$ 321,547</span>
                            </div>
                            <strong class="text-secondary"> Billed to Date</strong>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@if (Route::is("live-project.overview")) 
    
    {!! Html::script('public/assets/js/vendor/Chart.bundle.min.js') !!}
    
    <script>
        const project_status = document.getElementById('project-status').getContext('2d');
       
        const data = {
            labels: ['On Schedule', ' All Tasks', 'Overdue',],
            datasets: [
                {
                    label: 'Dataset 1',
                    data:  [100,100,100],
                    backgroundColor: ["#20CF98", "#FDBC2A", "#F85A7E"]
                }
            ]
        };
        const config = new Chart(project_status,{
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Project Tasks'
                },
            },
        }); 

        var data2 = {
            datasets: [
            {
                data: [50,10],
                backgroundColor: [
                    "#20CF98",
                    "#eee", 
                ]
            }]
        };

        var ctx = document.getElementById("myChart");

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
                    display: true,
                    text: 'Project Tasks'
                },
            } 
        });
    </script>
@endif
