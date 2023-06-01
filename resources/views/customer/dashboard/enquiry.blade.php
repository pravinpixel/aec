@extends('layouts.customer')

@section('customer-content')
    @include('flash::message')
    <div class="content-page">
        <div class="content">

            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid ">

                <div class="content container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="row my-2">
                            <div class="col-6">
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="main">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <div>
                                    <a href="{{ route('customers-enquiry-dashboard') }}" class="live-status-bg d-block">
                                        <h3>Active Enquiries</h3>
                                        <p class="count">{{ $totalActiveEnquiries }}</p>
                                        <span class="btn btn-success">
                                            <i class="mdi mdi-comment-check-outline"></i>
                                        </span>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('customers-enquiry-dashboard') }}" class="live-status-bg d-block">
                                        <h3>Proposals waiting for Approval</h3>
                                        <p class="count">{{ $totalWaitingApprovals }}</p>
                                        <span class="btn btn-secondary">
                                            <i class="mdi mdi-comment-processing-outline"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card border">
                                    <div class="modal-header">
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            @foreach (config('global.filters') as $key => $filter)
                                                <input type="radio" class="btn-check"
                                                    onchange="filterChart('{{ $filter['value'] }}')" name="btnradio"
                                                    id="btnradio{{ $filter['slug'] }}" autocomplete="off"
                                                    {{ $key == 0 ? 'checked' : '' }}>
                                                <label class="btn btn-outline-light text-secondary"
                                                    for="btnradio{{ $filter['slug'] }}">{{ $filter['name'] }}</label>
                                            @endforeach
                                        </div>
                                        <div>
                                            <div class="input-group">
                                                <input id="datepicker" width="276" class="form-control" />
                                                <div class="input-group-append rounded-0 rounded-end">
                                                    <span class="input-group-text rounded-0 rounded-end h-100"
                                                        id="basic-addon2"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="enquiryChartContainer"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script>
        const ctx = document.getElementById('enquiryChartContainer');
        var myChart = new Chart(ctx);
        renderChart = (data) => {
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: "Enquiries",
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        fetchDashboard = (filter) => {
            axios.post("{{ route('customers-enquiry-ajax') }}", filter).then(response => {
                myChart.destroy();
                renderChart(response.data)
            })
        }
        fetchDashboard({
            daycount: 7,
            start_date: null,
            end_date: null,
        })
        filterChart = (count) => {
            fetchDashboard({
                daycount: count,
                start_date: null,
                end_date: null,
            })
        }
        $('#datepicker').daterangepicker({
            opens: 'left',
            startDate: "{{ \Carbon\Carbon::now()->format('d-m-Y') }}", // after open picker you'll see this dates as picked
            endDate: "{{ \Carbon\Carbon::now()->addDays(7)->format('d-m-Y') }}", // after open picker you'll see this dates as picked
            locale: {
                format: 'DD-MM-YYYY',
            },
        }, function(start, end, label) {
            fetchDashboard({
                daycount: null,
                start_date: start.format('YYYY-MM-DD'),
                end_date: end.format('YYYY-MM-DD')
            })
        });
    </script>
@endpush
