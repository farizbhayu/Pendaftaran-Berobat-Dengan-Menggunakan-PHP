<?php
session_start();
include "inc/config.php";
include "inc/functions.php";


$txt_user = sanitize($_POST['username']);
$en_pass = md5(sanitize($_POST['password']));
$sql = "select * from user where username='$txt_user' and password='$en_pass'";
$hasil = mysqli_query($con,$sql);
$rec = mysqli_num_rows($hasil);

if ($rec > 0) {
    $hasil = mysqli_query($sql);
    $data = mysqli_fetch_array($hasil);
    $sid = $data['iduser'];
    $kode_jabatan = $data['role_id'];
    $sql2 = "select * from role where id='$kode_jabatan'";
    $data2 = mysqli_fetch_array(mysqli_query($sql2));
    $alias = $data2['role_name'];
    
    $_SESSION['suserid'] = $sid;
    $_SESSION['suser'] = $txt_user;
    $_SESSION['spass'] = $en_pass;
    $_SESSION['srole'] = $kode_jabatan;
    $_SESSION['alias'] = $alias;

    $valid = 1;
} else {
    $valid = 0;
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
<div class="maincontent">
            <div class="maincontentinner">
            
                <?php
                    if($valid==1){
                        pesan_sukses("Log in in process, please wait ...");
                        echo '<meta http-equiv="refresh" content="2;url=index.php" />';
                    } else {
                        pesan_gagal("Sorry username or Password do not Match, please try again!");							
                        echo '<meta http-equiv="refresh" content="3;url=login.php" />';
					   //echo sql;
                    }
                    ?>

                
                
                
                
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
    
</div><!--mainwrapper-->

</body>
</html>