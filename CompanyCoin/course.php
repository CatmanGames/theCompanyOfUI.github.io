<?php
$servername = "localhost";
$username = "cc-webserver";
$password = "KacpercantCode";
$dbname = "companycoindb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date, course FROM Transactions WHERE type = 'Course'";
$result = $conn->query($sql);

$lables = array();
$course = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        $lables[] = $row['date'];


        $course[] = $row['course'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Coin | Course</title>

    <link rel="stylesheet" href="style/default.css">
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/media-queries.css">
    <link rel="stylesheet" href="style/magnific-popup.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>
<body style="background: #101010">
<canvas id="myChart" max-width="400px" max-height="400px"></canvas>

<footer id="footer">
    <div class="row">
        <div class="twelve columns">
            <li class="address">
                Company<br>
                Kirchweg 2,<br>
                Central Bay, United Islands.<br>
            </li>
            <ul class="copyright">
                <li>DWCH &copy; Copyright 2022</li>
                <li>Provided by <a href="../index.html" title="" target="_blank">Dowoney Web Creation & Hosting</a>
                </li>
            </ul>
        </div>
        <div id="go-top"><a class="smoothscroll" title="Back" href="index.php"><i class="icon-up-open"></i></a></div>
    </div>
</footer>

<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php  echo json_encode($lables); ?>,
            datasets: [{
                label: 'Kurs',
                data: <?php  echo json_encode($course); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
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
</script>


</body>
</html>