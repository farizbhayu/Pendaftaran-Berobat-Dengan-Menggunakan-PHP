<?php
	include 'inc/config.php';
?>
<?php

function Row_inserting($rsold, &$rsnew){
		$this->UpdateTable = "pasien";
		unset($rsnew["iduser"]);

		return TRUE;
	}
  
  $pass = trim($_POST['password']);
  $pass2 = trim($_POST['password2']);
  $pass3 = trim($_POST['password3']);
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
  }


	$sql = "UPDATE login set password='$password' WHERE iduser='$id'";
	$exc = mysqli_query($con,$sql); 
if($exc == 1) {
	$msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Sukses!</strong>
          Data berhasil diupdate. </div>'; 
echo '<meta http-equiv="refresh" content="0;url=index.php">';
	
} else {
    $msg= '
          <div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Oh Snap!</strong>
          Gagal!!</div>';
	echo '<meta http-equiv="refresh" content="0;url=index.php?mod=datapasien_editpass&id='.$id.'">'; 
}



 
}
//$row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM login WHERE iduser = '$id' ")); 
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
<div class="content-top">
			<div class="content-top">
			  <div class="banner">
		   
                <?php if($_SESSION['alias'] == 'admin' OR $_SESSION['alias'] == 'pasien' OR $_SESSION['alias'] == 'dokter'){ ?>
                  
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
<section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">User</h3>
                <br>
              </div>
              
              
</ul>
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Update Password
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
         <form method="post" name="valid" action="" onSubmit="return validasi()">
             <div class="vali-form vali-form1">
            <div class="col-md-6 form-group1">
              <label class="control-label">Create a password</label>
              <input type="password" name="password" id="password" placeholder="Create a password" required="">
            </div>
            <div class="col-md-6 form-group1 form-last">
              <label class="control-label">Repeated password</label>
              <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Repeated password" required="">
            </div>
              <div class="clearfix"> </div>
					<br>
                   <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <input type="hidden" name="submitted" value="1">
          
             <div class="clearfix"> </div>
        </form>
         <?php } else {
		 echo '<meta http-equiv="refresh" content=1;url="error.php">';
		  } ?>
               </div>
                    </div>
                  </form>
                </div>
              </section>
            </section>
          </section>