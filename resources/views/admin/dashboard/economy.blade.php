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
                     <h4 class="page-title">Dashboard</h4>
                  </div>
               </div>
            </div>
            <!-- end page title -->
            <div class="main">
               <div class="row g-0">
                  <div class="col-xl-12">
                     <div class="row g-2 m-0">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                           <div class="live-status-bg">
                              <h3>Bank Balance</h3>
                              <p class="count">₹ 10000</p>
                              <span class="btn btn-success">
                              <i class="mdi mdi-bank"></i>
                              </span>
                           </div>
                        </div>
                        <!--end card-->
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                           <div class="live-status-bg">
                              <h3>Unsent Invoices</h3>
                              <p class="count">25</p>
                              <span class="btn btn-primary">
                              <i class="mdi mdi-content-copy"></i>
                              </span>
                           </div>
                        </div>
                        <!--end card-->
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                           <div class="live-status-bg">
                              <h3>Unpaid Invoices</h3>
                              <p class="count">50</p>
                              <span class="btn btn-warning text-white">
                              <i class="mdi mdi-file-outline"></i>
                              </span>
                           </div>
                        </div>
                        <!--end card-->
                     </div>
                     <!--end card-->
                  </div>
                  <!-- end col -->
               </div>
               <hr/>
               <div class="row">
                  <div class="col-xl-12 col-lg-12">     
                    <p class="mb-0 text-muted">Overview</p>              
                     <h4 class="header-title text-uppercase">                        
                        Company Earnings
                     </h4>
                     <div class="card">
                        <div class="card-header">                                                          
                                <select name="" id="" class="form-select float-end w-auto">
									<option value="">-- Choose -- </option>
									<option value="" selected>1st Year</option>
									<option value="">2nd Year</option>
                                    <option value="">3rd Year</option>
								</select>
                            </div>
                        <div class="card-body">
                            <div id="company-earnings-chart"></div>
                        </div>
                        <!-- end card-body-->
                     </div>
                     <!-- end card--> 
                  </div>
                  <!-- end col -->

                  <div class="col-xl-6 col-lg-6 col-md-12">
                        <h4 class="header-title text-uppercase">Operating Revenue vs Cost</h4>
                        <div class="card">
                            <div class="card-header">
                                <div class="dropdown float-end ms-2">
									<a href="#" class="dropdown-toggle arrow-none btn btn-light btn-xs border" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="mdi mdi-dots-vertical"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<!-- item-->
										<a href="javascript:void(0);" class="dropdown-item">1 Quarter</a>
										<!-- item-->
									    <a href="javascript:void(0);" class="dropdown-item">1 Year</a>
										<!-- item-->
										<a href="javascript:void(0);" class="dropdown-item">2 years</a>
									</div>
								</div>       
                            </div>
									<div class="card-body">
										<div class="chart-content-bg">
											<div class="row text-center">
												<div class="col-md-6">
													<p class="text-muted mb-0 mt-3">Current Month</p>
													<h3 class="fw-normal mb-3">
														<small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
														<span>$58,254</span>
													</h3>
												</div>
												<div class="col-md-6">
													<p class="text-muted mb-0 mt-3">Previous Month</p>
													<h3 class="fw-normal mb-3">
														<small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
														<span>$69,524</span>
													</h3>
												</div>
											</div>
										</div>

										<div class="dash-item-overlay d-none d-md-block" dir="ltr">
											<h5>Total Enquiries: 125</h5>
										</div>
										<div dir="ltr">
											<div id="revenue-chart" class="apex-charts mt-3" data-currentMonth="12,30,23,45" data-colors="#727cf5,#0acf97"></div>
										</div>
									</div> <!-- end card-body-->
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
									<option value="" selected>1 Month</option>
                                    <option value="">1 Quarter</option>
                                    <option value="">1 Year</option>
                                    <option value="">2 Years</option>
								</select>
                            </div>
                            <div class="card-body">
                                <div id="customer-sales-chart" style="height: 480px;"></div>
                            </div>
                        </div>
                  </div>
                  <!-- end col -->

               </div>
               <!-- end row -->

               <div class="row">
						   <div class="col-lg-12">
                           <h4 class="header-title text-uppercase">Payment Summary</h4>
							   <div class="card">								   
								   <div class="card-body">
                                        <div class="table-responsive">
									   <table class="table table-hover economy-dashboard-table">
										   <thead>
											   <tr>
												   <th></th>
                                                   <th></th>
												   <th>Status</th>
												   <th>Receiver</th>
												   <th>Pay Date</th>
												   <th>Date Paid</th>
												   <th class="text-end">Amount</th>
												   <th class="text-end">Currency</th>
											   </tr>
										   </thead>
										   <tbody>
												<tr>
													<td>
                                                        <button type="button" class="btn btn-light border">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    </td>
													<td>
                                                        <button type="button" class="btn btn-success">
                                                            <i class="mdi mdi-file-outline"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary ms-2">
                                                            <i class="mdi mdi-checkbox-marked-outline"></i>
                                                        </button>
                                                    </td>
                                                    <td><i class="mdi mdi-calendar-check"></i> Due List</td>
													<td>XXXXX</td>
                                                    <td>18/01/2022</td>
                                                    <td>18/01/2022</td>
													<td class="text-end">11,719.04</td>
                                                    <td class="text-end">NOK</td>
												</tr> 
                                                <tr>
													<td>
                                                        <button type="button" class="btn btn-light border">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    </td>
													<td>
                                                        <button type="button" class="btn btn-success">
                                                            <i class="mdi mdi-file-outline"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary ms-2">
                                                            <i class="mdi mdi-checkbox-marked-outline"></i>
                                                        </button>
                                                    </td>
                                                    <td><i class="fa fa-money" aria-hidden="true"></i> Posted</td>
													<td>XXXXX</td>
                                                    <td>07/20/2022</td>
                                                    <td>07/20/2022</td>
													<td class="text-end">9,879.00</td>
                                                    <td class="text-end">EUR</td>
												</tr> 
                                                <tr>
													<td>
                                                        <button type="button" class="btn btn-light border">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    </td>
													<td>
                                                        <button type="button" class="btn btn-success">
                                                            <i class="mdi mdi-file-outline"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary ms-2">
                                                            <i class="mdi mdi-checkbox-marked-outline"></i>
                                                        </button>
                                                    </td>
                                                    <td><i class="fa fa-money" aria-hidden="true"></i> Posted</td>
													<td>XXXXX</td>
                                                    <td>07/19/2022</td>
                                                    <td>07/19/2022</td>
													<td class="text-end">8,860.00</td>
                                                    <td class="text-end">NOK</td>
												</tr> 
                                                <tr>
													<td>
                                                        <button type="button" class="btn btn-light border">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    </td>
													<td>
                                                        <button type="button" class="btn btn-success">
                                                            <i class="mdi mdi-file-outline"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary ms-2">
                                                            <i class="mdi mdi-checkbox-marked-outline"></i>
                                                        </button>
                                                    </td>
                                                    <td><i class="mdi mdi-format-list-bulleted"></i> Payment List</td>
													<td>XXXXX</td>
                                                    <td>07/20/2022</td>
                                                    <td></td>
													<td class="text-end">14,900.92</td>
                                                    <td class="text-end">NOK</td>
												</tr> 
                                                <tr>
													<td>
                                                        <button type="button" class="btn btn-light border">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    </td>
													<td>
                                                        <button type="button" class="btn btn-success">
                                                            <i class="mdi mdi-file-outline"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary ms-2">
                                                            <i class="mdi mdi-checkbox-marked-outline"></i>
                                                        </button>
                                                    </td>
                                                    <td><i class="mdi mdi-format-list-bulleted"></i> Payment List</td>
													<td>XXXXX</td>
                                                    <td>07/20/2022</td>
                                                    <td></td>
													<td class="text-end">14,900.92</td>
                                                    <td class="text-end">NOK</td>
												</tr>
                                                <tr>
													<td>
                                                        <button type="button" class="btn btn-light border">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    </td>
													<td>
                                                        <button type="button" class="btn btn-success">
                                                            <i class="mdi mdi-file-outline"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary ms-2">
                                                            <i class="mdi mdi-checkbox-marked-outline"></i>
                                                        </button>
                                                    </td>
                                                    <td><i class="mdi mdi-calendar-check"></i> Due List</td>
													<td>XXXXX</td>
                                                    <td>18/01/2022</td>
                                                    <td>18/01/2022</td>
													<td class="text-end">11,719.04</td>
                                                    <td class="text-end">NOK</td>
												</tr> 
                                                <tr>
													<td>
                                                        <button type="button" class="btn btn-light border">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    </td>
													<td>
                                                        <button type="button" class="btn btn-success">
                                                            <i class="mdi mdi-file-outline"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary ms-2">
                                                            <i class="mdi mdi-checkbox-marked-outline"></i>
                                                        </button>
                                                    </td>
                                                    <td><i class="fa fa-money" aria-hidden="true"></i> Posted</td>
													<td>XXXXX</td>
                                                    <td>07/20/2022</td>
                                                    <td>07/20/2022</td>
													<td class="text-end">9,879.00</td>
                                                    <td class="text-end">EUR</td>
												</tr> 
                                                <tr>
													<td>
                                                        <button type="button" class="btn btn-light border">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    </td>
													<td>
                                                        <button type="button" class="btn btn-success">
                                                            <i class="mdi mdi-file-outline"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary ms-2">
                                                            <i class="mdi mdi-checkbox-marked-outline"></i>
                                                        </button>
                                                    </td>
                                                    <td><i class="fa fa-money" aria-hidden="true"></i> Posted</td>
													<td>XXXXX</td>
                                                    <td>07/19/2022</td>
                                                    <td>07/19/2022</td>
													<td class="text-end">8,860.00</td>
                                                    <td class="text-end">NOK</td>
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
				var options = {
          series: [{
          name: 'series1',
          data: [31, 40, 28, 51, 42, 109, 100]
        }, {
          name: 'series2',
          data: [11, 32, 45, 32, 34, 52, 41]
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
        chart.render();
			</script>

<script src="{{ asset('public/assets/js/cdns/admin/highcharts.js') }}"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script>
    Highcharts.chart('company-earnings-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: ' '
    },
    legend: {
   enabled: false
   },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ' '
        },
        labels: {
            format: '₹{value} k',
        },
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px;font-weight:600;">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style=""color:{series.color};padding:0">{point.y:.1f} k</td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.1,
            borderWidth: 0
        }
    },
    credits: {
   enabled: false
   },
    series: [{
        showInLegend: false, 
        name: 'Company 1',
        data: [{y: 49.9, color: '#008ffb'}, {y: 135.5, color: '#008ffb'}, {y: 106.4, color: '#008ffb'}, {y: 129.2, color: '#008ffb'}, {y: 144.0, color: '#008ffb'}, {y: 176.0, color: '#008ffb'}, {y: 136.6, color: '#008ffb'}, {y: 148.5, color: '#008ffb'}, {y: 216.4, color: '#008ffb'}, {y: 294.1, color: '#008ffb'}, {y: 295.6, color: '#008ffb'}, {y: 354.4, color: '#008ffb'}]

    }, {
        showInLegend: false, 
        name: 'Company 2',
        data: [{y: 93.8, color: '#00e396'}, {y: 78.8, color: '#00e396'}, {y: 198.5, color: '#00e396'}, {y: 263.4, color: '#00e396'}, {y: 106.0, color: '#00e396'}, {y: 84.5, color: '#00e396'}, {y: 105.0, color: '#00e396'}, {y: 204.3, color: '#00e396'}, {y: 191.2, color: '#00e396'}, {y: 283.5, color: '#00e396'}, {y: 106.6, color: '#00e396'}, {y: 292.3, color: '#00e396'}]

    }]
});
   
</script>


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
Highcharts.chart('customer-sales-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: ' '
    },
    xAxis: {        
        categories: ['Customer 1', 'Customer 2', 'Customer 3', 'Customer 4', 'Customer 5']
    },
    yAxis: {
       categories: ['0k', '40k', '80k', '120k', '160k', '200k', '240k'],
        title: {
            text: 'No of Projects'
        }
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        showInLegend: false, 
        name: ' ',
        data: [{y: 2, color: '#00e396'}, {y: 3, color: '#00e396'}, {y: 1, color: '#00e396'}, {y: 4, color: '#00e396'}, {y: 2, color: '#00e396'}]
    }, {
        showInLegend: false, 
        name: ' ',
        data: [{y: 1, color: '#008ffb'}, {y: 4, color: '#008ffb'}, {y: 2, color: '#008ffb'}, {y: 3, color: '#008ffb'}, {y: 4, color: '#008ffb'}]
    }]
});
</script>
<!-- end demo js-->
@endpush