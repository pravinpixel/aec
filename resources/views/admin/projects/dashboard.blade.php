<h4 class="mb-3">Dashboard</h4>
<div class="row">
    <div class="col-md-5">
        <div class="row text-center">
            <div class="col-12">
                <div class="live-status-bg">
                    <h3>Total Projects</h3>
                    <p class="count" id="project-count">0</p>
                    <span class="btn btn-primary">
                        <i class="mdi mdi-comment-check-outline"></i>
                    </span>
                </div>
            </div>
            <div class="col-12">
                <div class="live-status-bg">
                    <h3>Total Issues</h3>
                    <p class="count" id="issues-count">0</p>
                    <span class="btn btn-danger">
                        <i class="mdi mdi-comment-remove-outline"></i>
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
@push('custom-scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        axios.get("{{ route('issues.project-manager-dashboard-data') }}").then((response) => {
            $('#issues-count').html(response.data.issues)
            $('#project-count').html(response.data.projects) 
            renderChart(response.data.new_issues,response.data.open_issues,response.data.closed_issues,response.data.issues)
        })
        function renderChart(a,b,c,d) {
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Enquiries', 'count'],
                    ['New Issues', a],
                    ['Open Issues', b],
                    ['Closed Issues', c]
                ]);
                var options = {
                    title: 'Total Issues '+d,
                    is3D: true,
                    colors: ['#4199fc', '#cc001a', '#20cf98']
                };
                var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        }
    </script>
@endpush
