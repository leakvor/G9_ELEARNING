<?php
    require("database/database.php");
    require("models/course.model.php");
    require("models/admin.model.php");

    // Get data for the existing chart
    $datas = chartBar();
    // Calculate sum of total paid for today
    $sum = 0;
    foreach($datas as $data) {
        $sum += $data['total_paid'];
    }

    // Prepare data for the existing chart
    $monthNames = [
        1 => 'January', 2 => 'February', 3 => 'March',
        4 => 'April', 5 => 'May', 6 => 'June',
        7 => 'July', 8 => 'August', 9 => 'September',
        10 => 'October', 11 => 'November', 12 => 'December'
    ];   
    $dataPoints = [];
    if ($datas) {
        foreach ($datas as $data) {
            $monthName =  $monthNames[$data['month']];
            $dataPoints[] = [
                "label" => $monthName,
                "y"     => $data['total_paid']
            ];
        }
    } else {
        echo "No data found.";
    }

    // Get data for the new chart
    $courseData = getCourseUserData();
    // Prepare data for the new chart
    $dataPoints2 = [];
    foreach ($courseData as $data) {
        $dataPoints2[] = [
            "label" => $data['course_title'],
            "y"     => $data['user_count']
        ];
    }

    function displayPaymentTable() {
        $paymentData = getPaymentData();

        echo '<table class="table text-start align-middle table-bordered table-hover mb-0">';
        echo '<thead>';
        echo '<tr class="text-white">';
        echo '<th scope="col"><input class="form-check-input" type="checkbox"></th>';
        echo '<th scope="col">Date</th>';
        echo '<th scope="col">Customer</th>';
        echo '<th scope="col">Amount</th>';
        echo '<th scope="col">Status</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($paymentData as $payment) {
            echo '<tr>';
            echo '<td><input class="form-check-input" type="checkbox"></td>';
            echo '<td>' . date("d M Y", strtotime($payment['date'])) . '</td>';
            echo '<td>' . $payment['username'] . '</td>';
            echo '<td>$' . $payment['paid'] . '</td>';
            echo '<td>Paid</td>';
            echo '<td><a class="btn btn-sm btn-primary" href="">Detail</a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
?>

<!-- HTML content below -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Today Sale -->
        <div class="col-sm-6 col-xl-3">
            <!-- Content -->
        </div>
        <!-- Total Sale -->
        <div class="col-sm-6 col-xl-3">
            <!-- Content -->
        </div>
        <!-- Today Revenue -->
        <div class="col-sm-6 col-xl-3">
            <!-- Content -->
        </div>
        <!-- Total Revenue -->
        <div class="col-sm-6 col-xl-3">
            <!-- Content -->
        </div>
    </div>
</div>

<div class="pt-4 px-4">
    <div class="row g-5">
        <!-- Existing Chart Bar -->
        <div class="">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Courses sale</h6>
                    <a href="">Show All</a>
                </div>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>       
        </div>

        <!-- New Chart Bar -->
        <div class="">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">New Courses Data</h6>
                    <a href="">Show All</a>
                </div>
                <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
            </div>       
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Sales</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <?php displayPaymentTable(); ?>
        </div>
    </div>
</div>

<!-- Chart scripts -->
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "dark1",
            axisY: { title: "Total Paid" },
            data: [{
                type: "column",
                indexLabel: "{y}",
                yValueFormatString: "$#0.##",
                color: "orange",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "dark1",
            axisY: { title: "Number of Students" },
            data: [{
                type: "column",
                indexLabel: "{y}",
                yValueFormatString: "#,##0",
                color: "orange",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();
    }
</script>
