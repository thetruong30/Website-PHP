<?php

if (!$_SESSION['user']) {
    header("location: ../index.php");
    die;
} else {
    extract($_SESSION['user']);
    if ($vai_tro == 0) {
        header("location: ../index.php");
    }
} ?>
<div class="container">
    <div class="row mb">
        <div class="frmtitle">
            <h1>Biểu đồ thống kê loại hàng</h1>
        </div>
        <div class="row  text">
            <h1>My Web Page</h1>

            <div id="piechart"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                // Draw the chart and set the chart values
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Loại hàng', 'Số lượng loại hàng'],
                        <?php
                        $tonglh = count($listtklh);
                        $i = 1;
                        foreach ($listtklh as $tk) {
                            extract($tk);
                            if ($i == $tonglh) $dauphay = "";
                            else $dauphay = ",";
                            echo "['" . $tk['ten_loai'] . "'," . $tk['so_luong'] . "]" . $dauphay;
                            $i += 1;
                        }
                        ?>
                    ]);

                    // Optional; add a title and set the width and height of the chart
                    var options = {
                        'title': 'Số lượng loại hàng',
                        'width': 550,
                        'height': 400
                    };

                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            </script>
        </div>
    </div>
</div>
</div>