<h4 class="mb-3">Dashboard</h4>
<div class="row">
    <div class="col-md-3">
        <div class="row text-center">
            <div class="col-12">
                <div class="live-status-bg">
                    <h3>Total Projects</h3>
                    <p class="count" id="project-count">0</p>
                    <span class="btn rounded shadow btn-primary">
                        <i class="mdi mdi-comment-check-outline"></i>
                    </span>
                </div>
            </div>
            <div class="col-12">
                <div class="live-status-bg">
                    <h3>Total Issues</h3>
                    <p class="count" id="issues-count">0</p>
                    <span class="btn rounded shadow btn-warning">
                        <i class="mdi mdi-comment-remove-outline"></i>
                    </span>
                </div>
                <div class="live-status-bg">
                    <h3>Internal Issues</h3>
                    <p class="count" id="internal-issues-count">0</p>
                    <span class="btn rounded shadow btn-light" style="background: pink">
                        <i class="mdi mdi-comment-remove-outline"></i>
                    </span>
                </div>
                <div class="live-status-bg">
                    <h3>External Issues</h3>
                    <p class="count" id="external-issues-count">0</p>
                    <span class="btn rounded shadow btn-light text-white" style="background: purple">
                        <i class="mdi mdi-comment-remove-outline"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card border shadow-sm">
            <div class="card-body">
                <div id="myChart" style="width:100%;height:450px;"></div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card border shadow-sm">
            <div class="card-body">
                <canvas id="myChart2" style="width:100%;height:400px;"></canvas>
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        axios.get("{{ route('issues.project-manager-dashboard-data') }}").then((response) => {
            $('#issues-count').html(response.data.issues)
            $('#project-count').html(response.data.projects)
            $('#external-issues-count').html(response.data.external_issues)
            $('#internal-issues-count').html(response.data.internal_issues)
            renderChart(response.data.new_issues, response.data.open_issues, response.data.closed_issues, response .data.issues,response.data.external_issues,response.data.internal_issues)
        })

        function renderChart(a, b, c, d,e,f) {
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Enquiries', 'count'],
                    ['New', a],
                    ['Open', b],
                    ['Closed', c]
                ]);
                var options = {
                    title: 'Total Issues ' + d,
                    is3D: true,
                    colors: ['#4199fc', '#cc001a', '#20cf98']
                };
                var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
            var xValues = [ "External", "Internal"];
            var yValues = [e, f];
            var barColors = [
                "pink",
                "purple",
            ];

            new Chart("myChart2", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Issues Overview"
                    }
                }
            });
        }
    </script>
@endpush
