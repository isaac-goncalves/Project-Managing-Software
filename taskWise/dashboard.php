<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxx" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['gantt']
        });
        google.charts.setOnLoadCallback(drawChart);

        function daysToMilliseconds(days) {
            return days * 24 * 60 * 60 * 1000;
        }

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Task ID');
            data.addColumn('string', 'Task Name');
            data.addColumn('date', 'Start Date');
            data.addColumn('date', 'End Date');
            data.addColumn('number', 'Duration');
            data.addColumn('number', 'Percent Complete');
            data.addColumn('string', 'Dependencies');

            data.addRows([
                ['Concept Design', 'Brainstorming and sketches',
                    new Date(2023, 3, 1), new Date(2023, 3, 5), null, 80, null
                ],
                ['Initial Analysis', 'Assess feasibility of design',
                    null, new Date(2023, 3, 8), daysToMilliseconds(2), 40, 'Concept Design'
                ],
                ['Detailed Design', 'Create detailed CAD model',
                    null, new Date(2023, 3, 15), daysToMilliseconds(5), 60, 'Initial Analysis'
                ],
                ['Testing', 'Perform structural testing',
                    null, new Date(2023, 3, 24), daysToMilliseconds(7), 0, 'Detailed Design'
                ],
                ['Manufacturing', 'Build final product',
                    null, new Date(2023, 4, 7), daysToMilliseconds(10), 0, 'Testing'
                ],
                ['Final Testing', 'Perform final quality assurance',
                    null, new Date(2023, 4, 18), daysToMilliseconds(3), 0, 'Manufacturing'
                ],
                ['Delivery', 'Deliver to client',
                    null, new Date(2023, 4, 22), daysToMilliseconds(1), 0, 'Final Testing'
                ]
            ]);

            var options = {
                height: 1000,


            };

            var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <?php require_once('navbar.php'); ?>
    <div class="container">
        <div class="card ">
            <div class="card-body">
                <h1>Dashboard</h1>
                <div id="chart_div"></div>
            </div>
            <!-- now a logout button -->
        </div>
    </div>
</body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>