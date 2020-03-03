<?php 
session_start();
include 'inc/config.php';
?>



<?php
	function Row_inserting($rsold, &$rsnew){
		$this->UpdateTable = "login";
		unset($rsnew["iduser"]);

		return TRUE;
	}
  
  $pass = trim($_POST['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // password encrypt using SHA256();
  $password = hash('MD5', $pass);
  
  //$iduser = "UPDATE iduser FROM login";
  if (isset($_GET['id'])) {
  $id =  $_GET['id'];
}
if (isset($_POST['submitted'])) {
  foreach ($_POST AS $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con, $value);
  
  
  $user = trim(strip_tags($_GET['iduser']));
  
  $query = "SELECT * FROM login WHERE iduser ='$user'";
$hasil = mysqli_query($con,$query);
$data = mysqli_fetch_array($hasil);

$iduser = trim(strip_tags($_GET['iduser']));
  $user = trim(strip_tags($_POST['username']));
  

  
$sql = "UPDATE login set password='$password' WHERE username='$id'";
	$exc = mysqli_query($con,$sql); 
if($exc == 1) {
	$msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Sukses!</strong>
          Data berhasil diupdate. </div>'; 
echo '<meta http-equiv="refresh" content="0;url=login.php">';
	
} else {
    $msg= '
          <div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Oh Snap!</strong>
          Password tidak sama!!</div>';
	echo '<meta http-equiv="refresh" content="0;url=lupapasstrue.php?&id='.$id.'">'; 
}



  }
  
}
?>    
<script>
  function validasi(){
    var pass = valid.password.value;
    var conpass = valid.confirmpassword.value;
    var pesan = '';

    if (pass.length < 3) {
      pesan = '-Password Tidak Boleh Kurang Dari 3 Karakter\n';
      //return false;
    }
    
    if (pass != conpass) {
      pesan += '-Password Anda Berbeda\n';
      //return false;
    }

    if (pesan != '') {
      alert('Maaf, Ada Kesalahan Pengisian Data : \n'+pesan);
      return false;
    }

    return true;
  }
</script>    
</script>    
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
<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">
    <script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.theme.css"> 
    <script>
	$(document).ready(function(){
  $("#tanggaldaftar").datepicker({
    dateFormat: "yy-mm-dd",
    })
	})
</script>
</head>
<body>
	<div class="login">
		<h1><a href="">Klinik Pratama Niatha </a></h1>
        
               
		<div class="login-bottom">
			<h2>Lupa Password</h2>
            <?php echo $msg; ?><header class="panel-heading font-bold">
                  Masukan password
                </header>
                         <form method="post" name="valid" action="" onSubmit="return validasi()">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="password" placeholder="Password" name="password" id="password" required="">
					<i class="fa fa-envelope"></i>
				</div>
                <div class="login-mail">
					<input type="password" placeholder="Ulangi Password" name="confirmpassword" id="confirmpassword" required="">
					<i class="fa fa-envelope"></i>
				</div>
		</div>	
			
			 <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <input type="hidden" name="submitted" value="1">
          
            </div>
			<div class="clearfix"> </div>
		</div>
	</div>
    </form>
		<!---->
<div class="copy-right">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	    </div>
	  
<!---->
<!--scrolling js-->
	<script src="jscroll-master/jquery.jscroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

