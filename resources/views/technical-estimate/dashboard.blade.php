@extends('layouts.technical-estimate')

@section('admin-content')
    <div class="content-page">
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid py-3">
                <h4 class="mb-3">Dashboard</h4>
                <div class="row">
                    <div class="col-md-5">
                        <div class="row text-center">
                            <div class="col-12">
                                <div class="live-status-bg">
                                    <h3>Total Enquiries</h3>
                                    <p class="count">{{ $total }}</p>
                                    <span class="btn btn-primary">
                                        <i class="mdi mdi-comment-check-outline"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="live-status-bg">
                                    <h3>Pending Enquiries</h3>
                                    <p class="count">{{ $pending }}</p>
                                    <span class="btn btn-danger">
                                        <i class="mdi mdi-comment-remove-outline"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="live-status-bg">
                                    <h3>Verfied Enquiries</h3>
                                    <p class="count">{{ $verifed }}</p>
                                    <span class="btn btn-success">
                                        <i class="mdi mdi-comment-plus-outline"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <div id="myChart" style="width:100%;height:500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Enquiries', 'count'],
                ['Total Enquiries', {{ $total }}],
                ['Pending Enquiries', {{ $pending }}],
                ['Verifed Enquiries', {{ $verifed }}]
            ]);

            var options = {
                title: 'Enquiries Dashboard',
                is3D: true,
                colors: ['#4199fc', '#cc001a', '#20cf98']
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>
@endpush
