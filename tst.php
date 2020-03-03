<?php 
define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'dbklinik');
    
    // 1. Membuat fungsi koneksi ke database
    $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    // 2. Lakukan pengecekan. Jika Database gagal terhubung, Muncul error
    if (mysqli_connect_errno()) {
        die(
            "Koneksi database gagal: " 
            . mysqli_connect_errno() 
            . " (" . mysqli_connect_errno() . ")"
        );
    }

$xaxis = [];
    $yaxis = [];

    $result = mysqli_query($db, "SELECT DISTINCT tgl_berobat FROM daftarberobat WHERE tgl_berobat BETWEEN '2017-07-08' AND '2017-07-12'");

    while ($hasil = mysqli_fetch_array($result)) {
        $result2 = mysqli_query($db, "SELECT * FROM daftarberobat WHERE tgl_berobat = '" .$hasil['tgl_berobat'] . "'");

        $count = mysqli_num_rows($result2);

        $xaxis[] = [$hasil['tgl_berobat']];
        $yaxis[] = $count;
    }
    
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Klinik Pratama Niatha | Web</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
  <script src="Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
<html>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?= json_encode($xaxis); ?>,
                    datasets: [{
                            label: '# of Votes',
                            data: <?= json_encode($yaxis); ?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
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
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
        <div class="four">
		<a href="index.php" class="hvr-shutter-in-horizontal">Go To Home</a>
	</div>
    </body>
</html>