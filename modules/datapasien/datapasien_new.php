<link rel="stylesheet" type="text/css" href="js/datepicker/datepicker.css"/>
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
  
  
  $iduser = "UPDATE iduser FROM login";
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
	echo '<meta http-equiv="refresh" content="0;url=index.php?mod=datapasien_new">'; 
	
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
}
if ($exc==1) {
    $msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Sukses!</strong>
          Data Berhasil Disimpan. </div>';
  } else {
    $msg= '
          <div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Oh Snap!</strong>
          Maaf data gagal disimpan. </div>';
  }//echo '<meta http-equiv="refresh" content="0;url=index.php?mod=datapasien">'; 
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
	
	if (ktp.length < 16 && ktp.length > 16) {
      pesan = '-No KTP tidak boleh kurang atau lebih dari 16\n';
      //return false;
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
<div class="content-top">
			<div class="content-top">
			  <div class="banner">
		   
                  <?php if($_SESSION['alias'] == 'admin' OR  $_SESSION['alias'] == 'dokter'){ ?>
                
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
<section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Data Pasien</h3>
                <br>
              </div>
              
              
</ul>
        
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Entry Pasien
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
        
                  <form class="stdform stdform2" method="post" name="valid" action="" onSubmit="return validasi()">
                  
                
                        
           <div class="vali-form">
             <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Nama</label>
              <input type="text" required="" name="nama" id="nama" >
            </div>
            
               
           <div class="vali-form">
              <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Username</label>
              <input type="text" required="" name="username">
            </div>
            
                         
           <div class="vali-form">
               <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Password</label>
              <input type="password" required="" name="password">
            </div>
            
           <div class="vali-form">
              <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">No KTP</label>
              <input type="text" required="" name="no_ktp" id="no_ktp">
            </div>
            
                   <div class="col-md-12 form-group1 group-mail">
          <label class="control-label ">Tanggal Lahir</label>
             <input type="date" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" placeholder="Tanggal Lahir" name="tgl_lahir" required="">     
                 </div>  
                               
                   
                   <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Jenis Kelamin</label>
            <select name="jk">
            <option>Pilih jenis kelamin</option>
                <option value="L">Laki - Laki</option>
            	<option value="P">Perempuan</option>
            </select>
            </div>
                 
                <div class="vali-form">
            <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Alamat</label>
              <input type="text" required="" name="alamat">
            </div>
            
              <div class="vali-form">
            <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Telepon</label>
              <input type="text" required="" name="telepon" id="telepon">
            </div>
                    <div class="vali-form">
            <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Umur</label>
              <input type="text" required="" name="umur" id="umur">
            </div>
          <div class="clearfix"> </div>
					
                   <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <input type="hidden" name="submitted" value="1">
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
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
