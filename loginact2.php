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
    $kode_jabatan = $data['role_id'];
    $sql2 = "select * from role where id='$kode_jabatan'";
    $data2 = mysqli_fetch_array(mysqli_query($con,$sql2));
    $alias = $data2['role_name'];
   
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
<?php 
session_start();
include 'header.php';
?>

<div class="mainwrapper">
    
<?php
  include 'topnav.php';
  include 'leftmenu.php';
?>    
    
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=<?php echo $modname;?>>"><?php echo ucwords($modname);?></a> <span class="separator"></span></li>  
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-key"></span></div>
            <div class="pagetitle">
                <h5>Login Form</h5>
                <h1>Log In</h1>
            </div>
        </div><!--pageheader-->
        <?php echo $msg; ?>
<div class="maincontent">
            <div class="maincontentinner">
                           
                
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
    
</div><!--mainwrapper-->

</body>
</html>