<?php 
session_start();
include 'inc/config.php';
?>



<?php
	function Row_inserting($rsold, &$rsnew){
		$this->UpdateTable = "pasien";
		unset($rsnew["iduser"]);

		return TRUE;
	}
  
  $pass = trim($_POST['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // password encrypt using SHA256();
  $password = hash('MD5', $pass);
  
  //$iduser = "UPDATE iduser FROM login";
if (isset($_POST['submitted'])) {
  foreach ($_POST AS $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con, $value);
  }


$ada = mysqli_query($con,"SELECT username FROM login WHERE username='{$_POST['username']}'");
$row = mysqli_num_rows($ada);

if ($row > 0) {
	$msg ='<div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Oh Snap!</strong>
          Username sudah ada!!</div>';
		  echo $msg;
	echo '<meta http-equiv="refresh" content="0;url=daftar_pasien.php">'; 
	
    die();
}
else {
	$sql2 = "INSERT INTO login (iduser,username, password) VALUES ('{$_POST['iduser']}','{$_POST['username']}','$password')";
$sql = "INSERT INTO pasien (iduser,nama, no_ktp, tgl_lahir, jk, alamat, telepon, umur) VALUES (LAST_INSERT_ID(),'{$_POST['nama']}', '{$_POST['no_ktp']}', '{$_POST['tgl_lahir']}', '{$_POST['jk']}',  '{$_POST['alamat']}', '{$_POST['telepon']}', '{$_POST['umur']}')"; 
$exc = mysqli_query($con,$sql2); // eksekusi perintah pertama $sql1
if($exc){ //jika benar perintah $exc 
mysqli_query($con,$sql);// jalankan perintah $sql2 
}
else{
echo "Nothing";
}
if ($exc==1) {
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
          <i class"fa fa-ok-circle"></i><strong>Oh Snap!</strong>
          Maaf data gagal disimpan. </div>';
  }echo '<meta http-equiv="refresh" content="0;url=daftar_pasien.php">'; 

}
   
} 
?>    
<script>
  function validasi(){
    var namaValid = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
    var ktpValid = /^[0-9]+$/;
    var teleponValid = /^[0-9]+$/;
    var umurValid = /^[0-9]+$/;

    var nama      = valid.nama.value;
    var username  = valid.username.value;
    var password  = valid.password.value;
    var ktp       = valid.no_ktp.value;
    var tgl_lahir = valid.tgl_lahir.value;
    var jk        = valid.jk.value;
    var alamat    = valid.alamat.value;
    var telepon   = valid.telepon.value;
    var umur      = valid.umur.value;
    var pria      = valid.jk[0].checked;
    var wanita      = valid.jk[1].checked;
    var pesan     = '';

    if (pria == false && wanita == false) {
      pesan += '-Pilih salah satu jenis kelamin\n';
    }


     if (nama != '' && !nama.match(namaValid)) {
      pesan += '-Nama tidak valid\n';
    }

    if (telepon != '' && !telepon.match(teleponValid)) {
      pesan += '-Nomor telepon tidak valid\n';
    }

    if (telepon.lenght < 8) {
      pesan += '-Nomor telepon tidak valid\n';
    }
	
	

    if (ktp != '' && !ktp.match(ktpValid)) {
      pesan += '-No KTP tidak valid\n';
    }

    if (umur != '' && !umur.match(umurValid)) {
      pesan += '-Umur tidak valid\n';
    }

    if (pesan != '') {
      alert('Maaf, ada kesalahan pengisian data : \n'+pesan);
      return false;
    }
  return true

  //if (password1 != password2){
    //alert('Password tidak sama');
    //return false;
  //}
  }

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
  <link rel="stylesheet" type="text/css" href="js/datepicker/datepicker.css"/>
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
<?php echo $msg;?>
	<div class="login">
		<h1><a href="">Klinik Pratama Niatha </a></h1>
        
                <form class="stdform stdform2" method="post" name="valid" action="" onSubmit="return validasi()">
		<div class="login-bottom">
			<h2>Register</h2>
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="Nama" name="nama" id="nama" required="">
					<i class="fa fa-envelope"></i>
				</div>
                <div class="login-mail">
					<input type="text" placeholder="Username" name="username" id="username" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name="password" id="password" required="">
					<i class="fa fa-lock"></i>
				</div>
				
				   <div class="login-mail">
					<input type="text" placeholder="No Identitas" name="no_ktp" id="no_ktp" required="">
					<i class="fa fa-envelope"></i>
				</div>
                 <div class="login-mail">
					<input type="date" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" placeholder="Tanggal Lahir" name="tgl_lahir" required=""> 
                     
				</div>
             <div class="login-mail">
                     <select name="jk" id="jk">
            	<option value="L">Laki-Laki</option>
            	<option value="P">Perempuan</option>
            </select>
                      </div>
                     <div class="login-mail">
					<input type="text" placeholder="Alamat" name="alamat" id="alamat" required="">
					<i class="fa fa-envelope"></i>
				</div>
                <div class="login-mail">
					<input type="text" placeholder="Telepon" name="telepon" id="telepon" required="">
					<i class="fa fa-envelope"></i>
				</div>
                <div class="login-mail">
					<input type="text" placeholder="Umur" name="umur" id="umur" required="">
					<i class="fa fa-envelope"></i>
				</div>
                
                 

			</div>
			
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="Submit" name="submitted">
					</label>
					<p>Already register</p>
				<a href="login.php" class="hvr-shutter-in-horizontal">Login</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	    </div>
	  
<!---->
<!--scrolling js-->
	<script src="jscroll-master/jquery.jscroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!--//scrolling js-->
</body>
</html>

