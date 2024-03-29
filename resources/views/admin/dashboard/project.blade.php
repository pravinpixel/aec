@extends('layouts.admin')
@section('admin-content')
<div class="content-page">
   <div class="content">
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
                              <input type="text" class="form-control form-control-light" id="dash-daterange">
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
                              <h3>New Projects</h3>
                              <p class="count">10</p>
                              <span class="btn btn-success">
                              <i class="mdi mdi-coffee-outline"></i>
                              </span>
                           </div>
                        </div>
                        <!--end card-->
                        <div class="col-sm">
                           <div class="live-status-bg">
                              <h3>Current Projects</h3>
                              <p class="count">25</p>
                              <span class="btn btn-primary">
                              <i class="mdi mdi-gift-outline"></i>
                              </span>
                           </div>
                        </div>
                        <!--end card-->
                        <div class="col-sm">
                           <div class="live-status-bg">
                              <h3>Completed Projects</h3>
                              <p class="count">50</p>
                              <span class="btn btn-warning text-white">
                              <i class="mdi mdi-comment-check-outline"></i>
                              </span>
                           </div>
                        </div>
                        <!--end card-->
                        <div class="col-sm">
                           <div class="live-status-bg">
                              <h3>New Variation Orders</h3>
                              <p class="count">5</p>
                              <span class="btn btn-secondary text-white">
                              <i class="mdi mdi-format-list-checks"></i>
                              </span>
                           </div>
                        </div>
                        <!--end card-->
                        <div class="col-sm">
                           <div class="live-status-bg">
                              <h3>Ready for Projet</h3>
                              <p class="count">25</p>
                              <span class="btn btn-info text-white">
                              <i class="mdi mdi-playlist-check"></i>
                              </span>
                           </div>
                        </div>
                     </div>
                     <!--end card-->
                  </div>
                  <!-- end col -->
               </div>
               <hr/>
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
                                        <a class="nav-link" href="#"> Submenu links  </a>
                                        <ul class="submenu collapse">
                                            <li><a class="nav-link" href="#">Submenu item 1 </a></li>
                                            <li><a class="nav-link" href="#">Submenu item 2 </a></li>
                                            <li><a class="nav-link" href="#">Submenu item 3 </a> </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item has-submenu">
                                        <a class="nav-link" href="#"> More menus  </a>
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
                        <h4 class="header-title text-uppercase">Total Sales</h4>
                        <div class="card">
                            <div class="card-header">
                                <div class="dropdown float-end ms-2">
									<a href="#" class="dropdown-toggle arrow-none btn btn-light btn-xs border" data-bs-toggle="dropdown" aria-expanded="false">
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
									<option value="" selected>January</option>
									<option value="">February</option>
									<option value="">March</option>
                                    <option value="">April</option>
                                    <option value="">May</option>
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
                                <div class="dropdown float-end ms-2">
									<a href="#" class="dropdown-toggle arrow-none btn btn-light btn-xs border" data-bs-toggle="dropdown" aria-expanded="false">
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
									<option value="" selected>January</option>
									<option value="">February</option>
									<option value="">March</option>
                                    <option value="">April</option>
                                    <option value="">May</option>
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
									<a href="#" class="dropdown-toggle arrow-none btn btn-light btn-xs border" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <div class="card-body">
                                <table class="table table-hover running-projects">
                                    <tbody>
                                        <tr>
                                            <td width="50">
                                                <div class="running-project-name bg-primary-lighten text-primary">F</div>
                                            </td>
                                            <td>
                                                Falcon <span class="badge bg-primary ms-1">90%</span>
                                            </td>
                                            <td class="text-end">
                                                58:20:00
                                            </td>
                                            <td width="100">
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="running-project-name bg-success-lighten text-success">R</div>
                                            </td>
                                            <td>
                                                Regin <span class="badge bg-success ms-1">78%</span>
                                            </td>
                                            <td class="text-end">
                                                31:50:00
                                            </td>
                                            <td>
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 78%;" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="running-project-name bg-secondary-lighten text-secondary">B</div>
                                            </td>
                                            <td>
                                                Boots4 <span class="badge bg-secondary ms-1">79%</span>
                                            </td>
                                            <td class="text-end">
                                                25:20:00
                                            </td>
                                            <td>
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 79%;" aria-valuenow="79" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="running-project-name bg-warning-lighten text-warning">R</div>
                                            </td>
                                            <td>
                                                Raven <span class="badge bg-warning ms-1 text-dark">38%</span>
                                            </td>
                                            <td class="text-end">
                                                12:50:00
                                            </td>
                                            <td>
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 38%;" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="running-project-name bg-info-lighten text-info">S</div>
                                            </td>
                                            <td>
                                                Slick <span class="badge bg-info ms-1">40%</span>
                                            </td>
                                            <td class="text-end">
                                                21:20:00
                                            </td>
                                            <td>
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#">Show all projects <span class="mdi mdi-chevron-right"></span></a>
                            </div>
                        </div>
                  </div>
                  <!-- end col -->


                  <div class="col-xl-6 col-lg-6 col-md-12">
                        <h4 class="header-title text-uppercase">Estimated Hours vs. Actual Hours by Project</h4>
                        <div class="card">
                            <div class="card-header">
                                <div class="dropdown float-end ms-2">
									<a href="#" class="dropdown-toggle arrow-none btn btn-light btn-xs border" data-bs-toggle="dropdown" aria-expanded="false">
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
									<option value="" selected>January</option>
									<option value="">February</option>
									<option value="">March</option>
                                    <option value="">April</option>
                                    <option value="">May</option>
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

                 <div class="row">
						   <div class="col-lg-12">
							   <div class="card">								   
								   <div class="card-body">
                                        <div class="table-responsive">
									   <table class="table table-hover project-dashboard-table">
										   <thead>
											   <tr>
												   <th>Month</th>
                                                   <th>S.No</th>
												   <th>Project ID</th>
												   <th>Customer Name</th>
												   <th>Project Name</th>
												   <th>Building Site</th>
												   <th>Delivery Type</th>
												   <th>Original Price</th>
                                                   <th>VR - 1</th>
                                                   <th>VR - 2</th>
                                                   <th>Total Amount</th>
                                                   <th>Enginerring Hours</th>
                                                   <th>Strat Date</th>
                                                   <th>End Date</th>
                                                   <th>% Completed</th>
                                                   <th>Comments</th>
											   </tr>
										   </thead>
										   <tbody>
												<tr>
													<td>Jan</td>
													<td>01</td>
                                                    <td>P016</td>
													<td>Trefab AS</td>
                                                    <td>Skoldhasgda Eneboling</td>
													<td>Jorpeland</td>
                                                    <td>Panel</td>
													<td class="text-end">₹ 49,556.00</td>
                                                    <td class="text-end">₹ 10,000.00</td>
													<td class="text-end"></td>
													<td class="text-end">₹ 59,556.00</td>
                                                    <td>120</td>
													<td class="no-wrap">21-Jan-2022</td>
                                                    <td class="no-wrap">30-May-2022</td>
													<td>100%</td>
                                                    <td>100% Invoiced</td>
												</tr> 
                                                <tr>
													<td>Feb</td>
													<td>02</td>
                                                    <td>P017</td>
													<td>Egersung Betong Tek AS</td>
                                                    <td>Stange Ungdomsskole tapper og amfi</td>
													<td>Stange</td>
                                                    <td>Precast</td>
													<td class="text-end no-wrap">₹ 156,899.00</td>
                                                    <td class="text-end no-wrap">₹ 40,000.00</td>
													<td class="text-end no-wrap"></td>
													<td class="text-end no-wrap">₹ 196,899.00</td>
                                                    <td>250</td>
													<td class="no-wrap">05-Feb-2022</td>
                                                    <td class="no-wrap">30-Aug-2022</td>
													<td>50%</td>
                                                    <td>50% Invoiced</td>
												</tr>
										   </tbody>
									   </table>
                                       </div>
								   </div>
							   </div>
						   </div> <!-- end col--> 
					   </div>
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
   $(".has-submenu a.nav-link").click(function(){
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>


<script>
document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
</script>
<script>
    Highcharts.chart('sales-chart', {
    chart: {
        type: 'area'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['Jan 1', 'Jan 5', 'Jan 9', 'Jan 13', 'Jan 17', 'Jan 21', 'Jan 25', 'Jan 29']
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
        name: 'Total Sales',
        data: [0, 30, 10, 0, 120, 50, 80, 20]
    }]
});
</script>

<script>

var options = {
          series: [{
          name: 'Customer 1',
          data: [44, 55, 41, 67, 22, 43]
        }, {
          name: 'Customer 2',
          data: [13, 23, 20, 8, 13, 27]
        }],
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
          categories: ['Customer 1', 'Customer 2', 'Customer 3', 'Customer 4', 'Customer 5', 'Customer 6'
          ],
        },
        yaxis: {
          categories: [0, 40, 80, 120, 160, 200, 240],
          labels: {
            formatter: function (val) {
              return val + " K"
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

        var chart = new ApexCharts(document.querySelector("#customer-sales-chart"), options);
        chart.render();


</script>

<script>

 var options = {
          series: [{
          name: 'Income',
          type: 'column',
          data: [35, 40, 50, 30, 20, 60, 30, 10]
        }, {
          name: 'Revenue',
          type: 'line',
          data: [35, 20, 30, 30, 10, 50, 20, 8]
        }],
          chart: {
          height: 312,
          type: 'line',
          stacked: false
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [0, 3, 4]
        },
        title: {
          text: ' ',
          align: 'left',
          offsetX: 110
        },
        xaxis: {
          categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016],
        },
        yaxis: [
          {
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
              text: " ",
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
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'
          ],
        },
        yaxis: {
          categories: ['1', '2', '3', '4', '5', '6'
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#project-status-chart"), options);
        chart.render();
      
</script>


<!-- end demo js-->
@endpush