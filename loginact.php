<?php
session_start();
include "inc/config.php";


//proses menerima kiriman dari form
$txt_user = $_POST['username'];
$en_pass = MD5($_POST['password']);

//proses validasi login
$sql = "select * from login where username='$txt_user' and 
password='$en_pass'";

$hasil = mysqli_query($con,$sql);
$rec = mysqli_num_rows($hasil);

if ($rec == 1) {   
    $data = mysqli_fetch_array($hasil);
    $sid = $data['iduser'];
    $kode_jabatan = $data['role_id'];
    $sql2 = "select * from role where id='$kode_jabatan'";
    $data2 = mysqli_fetch_array(mysqli_query($con,$sql2));
    $alias = $data2['role_name'];
    ("suserid");
    $_SESSION['suserid'] = $sid;
    $_SESSION['suser'] = $txt_user;
    $_SESSION['spass'] = $en_pass;
    $_SESSION['srole'] = $kode_jabatan;
    $_SESSION['alias'] = $alias;

    $valid = 1;
} else {
    $valid = 0;
}
if($valid==1){
      $msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Sukses!</strong>
          Berhasil. </div>';
		  echo '<meta http-equiv="refresh" content=2;url="index.php">';
		  
  } else {
    $msg= '
          <div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Oh Snap!</strong>
          Gagal. </div>';
		  echo '<meta http-equiv="refresh" content=2;url="login.php">';
  }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Klinik Pratama Niatha</title>
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
</head>
<body>
	<div class="login">
		<h1>Klinik Pratama Niatha </a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			 <form id="login" action="loginact.php" method="">
               <?php echo $msg; ?>
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="Username"  name="username" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
				 

			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="login">
					</label>
					<p>Do not have an account?</p>
				<a href="daftar_pasien.php" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	    </div>  
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>


            
