<?php 
	include 'inc/config.php';

$xaxis = [];
    $yaxis = [];
	$q = mysqli_query($con,"Select masuk from daftarberobat where masuk ='Y'");
	$data = mysqli_fetch_array($q);
	$masuk = $data['masuk'];
    $result = mysqli_query($con, "SELECT DISTINCT tgl_berobat FROM daftarberobat WHERE tgl_berobat BETWEEN '{$_POST['tgl_berobat']}' AND '{$_POST['tgl_berobat1']}' order by tgl_berobat asc");

    while ($hasil = mysqli_fetch_array($result)) {
        $result2 = mysqli_query($con, "SELECT * FROM daftarberobat WHERE tgl_berobat = '" .$hasil['tgl_berobat'] . "' AND masuk = 'Y'");

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
<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">

    <script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.theme.css"> 
    <script>
	$(document).ready(function(){
  $("#tanggaldaftar").datepicker({
    dateFormat: "yy-mm-dd",
    //minDate: 0, // hari kemaren disabled
  })
})

$(document).ready(function(){
  $("#tanggaldaftar1").datepicker({
    dateFormat: "yy-mm-dd",
    //minDate: 0, // hari kemaren disabled    }
  })
})
</script>
    <body>
     <div class="content-main">
 
 	<!--banner-->	
		   <div class="banner">
                  
           <?php if($_SESSION['alias'] == 'admin' OR  $_SESSION['alias'] == 'dokter'){ ?>
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Analisis Jumlah Pasien
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
                  <form method="post" action="">
                   <div class="col-md-6 form-group1 group-mail">
              <br><label class="control-label ">Dari Tanggal</label>
               <input type="text" name="tgl_berobat" class="" id="tanggaldaftar"/>
            </div>   
            
            <div class="col-md-6 form-group1 group-mail">
              <br><label class="control-label ">Sampai Tanggal</label>
               <input type="text" name="tgl_berobat1" class="" id="tanggaldaftar1"/>
            </div>        
            <button type"submit" class"btn">Submit</button>
        <input type="hidden" name="submitted" value="1"/>
        </div>  
        
            <canvas id="myChart"></canvas>
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
                               
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                 'rgba(153, 102, 255, 1)'
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
  

		<div class="clearfix"> </div>
       </div>
  
<!---->

<script src="js/bootstrap.min.js"> </script>
  
  
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

<!----->

<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
    
    </form>
 <?php } else {
		 echo '<meta http-equiv="refresh" content=1;url="error.php">';
		  } ?>
</body>
</html>
