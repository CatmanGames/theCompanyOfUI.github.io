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
    <title>Company Coin</title>

    <link rel="stylesheet" href="style/default.css">
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/media-queries.css">
    <link rel="stylesheet" href="style/magnific-popup.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>
<header id="home">
    <div class="row banner">
        <div class="banner-text">
            <h1 class="responsive-headline">Company Coin</h1>
            <hr/>
        </div>
    </div>
</header>
<body style="min-height: 1000px; background: #101010">

<section id="section1">
    <div class="tochterunternehmen">
        <h3>Tochterunternehmen <br>der Company<br></h3>
        <a href="https://united-islands.net/Central-Informations">Central Informations<br></a>
        <a href="https://thecompany.social">Ghost Records<br></a>
        <a href="https://thecompany.social">Jägermeister GmbH<br></a>
        <a class="selected">Company Coin<br></a>
        <a href="https://dowoneywch.github.io">Dowoney Web Creation & Hosting<br></a>
        <a href="https://dowoneywch.github.io/TellerTree/index.html">Teller Tree</a>
    </div>
    <div class="info-cc">
        <h3>Was ist der Company Coin?</h3>
        <p>Der Company Coin ist eine Art digitaler Token und kann<br>
           weder physisch gedruckt noch durch eine Zentralbank oder<br>
           eine andere zentrale Institution gesteuert, reglementiert<br>
           oder gar manipuliert werden. Der Company Coin wird als Wertspeicher bei der Company verwendet und ist<br>
           für jeden Bürger von United Islands zugänglich. Das Company<br>
           Coin-Netzwerk ist das erste seiner Art in Untited Islands und<br>
           hat mit großem Abstand die meisten Netzwerkteilnehmer<br>
           und gilt daher als sicherste und stabilste.<br>
           Die Company berechnet 1% aller Transaktionen als Bearbeitungsgebühr für den Vertreib und die Instandhaltung. <br>
           Man kann ihn bei Leo Jakobs (17938/50044), Patrick Löffel (17938/66876) oder Jeremy Dowoney erwerben (17938/37806)! </p>

    </div>
    <div class="info-cc-course">
        <h3>Wie viel ist er aktuell Wert?</h3>
        <p>Der Kurs kann anhand des folgenden Graphen abgelesen werden:<br>
            <a href="course.php"> (klicken zum vergrößern)</a></p>
        <canvas id="myChart" class="graph"></canvas>
    </div>


</section>
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
                <li>Provided by <a href="https://dowoneywch.github.io" title="" target="_blank">Dowoney Web Creation & Hosting</a>
                </li>
            </ul>
        </div>
        <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>
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