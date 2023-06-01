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
                                                    onchange="fetchDashboard('{{ $filter['value'] }}')" name="btnradio"
                                                    id="btnradio{{ $filter['slug'] }}" autocomplete="off" {{ $key == 0 ? "checked" : ""}} >
                                                <label class="btn btn-outline-light text-secondary"
                                                    for="btnradio{{ $filter['slug'] }}">{{ $filter['name'] }}</label>
                                            @endforeach
                                        </div>
                                        <div>hey</div>
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

    <script>
        const ctx = document.getElementById('enquiryChartContainer');
        var myChart = new Chart(ctx);
        renderChart = (data) => {
            console.log(data)
            myChart =  new Chart(ctx, {
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
            axios.post("{{ route('customers-enquiry-ajax') }}", {
                filter:filter
            }).then(response => {
                myChart.destroy();
                renderChart(response.data)
            })
        }
        fetchDashboard(7)
    </script>
@endpush
