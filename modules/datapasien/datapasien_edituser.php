<?php
	include 'inc/config.php';
?>
<?php

function Row_inserting($rsold, &$rsnew){
		$this->UpdateTable = "pasien";
		unset($rsnew["iduser"]);

		return TRUE;
	}
  

if (isset($_GET['id'])) {
  $id =  $_GET['id'];
}
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
	echo '<meta http-equiv="refresh" content="0;url=index.php?mod=datapasien_edituser&id='.$id.'">'; 
	
    die();
}
else {
	$sql = "UPDATE login set username='{$_POST['username']}' WHERE iduser='$id'";
	$exc = mysqli_query($con,$sql); 
	$msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Sukses!</strong>
          Data berhasil diupdate. </div>'; 

echo '<meta http-equiv="refresh" content="0;url=index.php?mod=datapasien_edituser&id='.$id.'">';

// Kalau username sudah ada yang pakai
	
}

$sql3 = "SELECT username FROM login WHERE iduser = '$id''";
$data = mysqli_query($con,$sql3);

if ($data > 0) {
	$msg ='<div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Oh Snap!</strong>
          Username masih sama!!</div>';
	echo $msg;	  
	echo '<meta http-equiv="refresh" content="0;url=index.php?mod=datapasien_edituser&id='.$id.'">'; 
	
    die();
}
else {
	$sql = "UPDATE login set username='{$_POST['username']}' WHERE iduser='$id'";
	$exc = mysqli_query($con,$sql); 
	$msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Sukses!</strong>
          Data berhasil diupdate. </div>'; 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=datapasien_edituser&id='.$id.'">';

// Kalau username sudah ada yang pakai
	
}
 
}
$xx = "SELECT * FROM login WHERE iduser = '$id'";
$vv = mysqli_query($con,$xx);
$aa = mysqli_fetch_array($vv);

//$row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM login WHERE iduser = '$id' ")); 
?>
<script>
  function validasi(){
	$user = "Select username from login";
	$sama = "Select username from login where iduser = '$id'";
	var user = valid.username.value;
   
    var pesan = '';

 	if ($user == user) {
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
                  Update Username
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
         <form method="post" name="valid" action="" onSubmit="return validasi()">
             <div class="vali-form vali-form1">
             <div class="col-md-12 form-group1">
              <label class="control-label">Input username</label>
              <input type="text" name="username" id="username" placeholder="Input username" required="">
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-6 form-group1">
              <label class="control-label">Ubah password ?</label>
              <input type="hidden" name="" id="" required=""><br><a href="index.php?mod=datapasien_editpass&id=<?php echo $aa['iduser'];?>">Klik Sini
            </div></a>
            
              <div class="clearfix"> </div>
					<br>
                   <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <input type="hidden" name="submitted" value="1">
       
             <div class="clearfix"> </div>
        </form>
         <?php include "footer.php";?>
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