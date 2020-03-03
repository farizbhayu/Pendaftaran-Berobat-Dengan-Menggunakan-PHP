<?php
	include 'inc/config.php';
	session_start();
?>

<?php	

	$id=$_SESSION['suserid'];    
	$sql2 = "SELECT idpasien, nama FROM pasien WHERE iduser = '{$id}'";
		$exc1 = mysqli_query($con,$sql2);
		$row = mysqli_fetch_array($exc1);
	


$tanggal1 = date("Y-m-d");
$h = date("h") + 5;
$clock1 = date("$h:i:s");
list($jam,$menit,$detik)= explode(':',$clock1);
$clock = date("H:i:s",mktime($jam,$menit,$detik,0,0,0));
$tanggal = $_POST['tgl_berobat'];
$jenispenyakit = $_POST['jenis_penyakit'];

if ($_POST['jam_layanan'] == "07.00 - 11.00") {
	$jamlayanan = "07.00 - 11.00";
}else{
	$jamlayanan = "16.00 - 20.00";
}
//echo $tanggal;
$q = mysqli_query($con, "SELECT * FROM daftarberobat where tgl_berobat = '{$tanggal}' AND jam_layanan = '{$jamlayanan}' order by id desc");
$jumlah = mysqli_num_rows($q);
$data = mysqli_fetch_array($q);

//$jamlayanan = "select  jam_layanan from daftarberobat where idpasien IN (SELECT idpasien FROM pasien WHERE iduser = '{$id}')";
//$jumlah3 = mysqli_num_rows(mysqli_query($con,$jamlayanan));




	if ($jumlah <= 0 || $data['tgl_berobat'] != $tanggal) {
		if ($_POST['jam_layanan'] == "07.00 - 11.00"  &&  $_POST['jenispenyakit'] == "Ringan") {
		$nomorbaru = 1;
		$long = 7;
		$mulai= "07:00:00";   
  		list($jam,$menit,$detik)= explode(':',$mulai);
  		$jam_selesai = date("H:i:s",mktime($jam,$menit+0,$detik,0,0,0));
		
		} elseif ($_POST['jam_layanan'] == "07.00 - 11.00"  &&  $_POST['jenispenyakit'] == "Berat") {
			$nomorbaru = 1;
			$long = 9;
			$mulai= "07:00:00";  
  			list($jam,$menit,$detik)= explode(':',$mulai);
  			$jam_selesai = date("H:i:s",mktime($jam,$menit+0,$detik,0,0,0));
		
		} elseif ($_POST['jam_layanan'] == "16.00 - 20.00"  &&  $_POST['jenispenyakit'] == "Ringan") {
			$nomorbaru = 1;
			$long = 7;
			$mulai= "16:00:00";   
  			list($jam,$menit,$detik)= explode(':',$mulai);
  			$jam_selesai = date("H:i:s",mktime($jam,$menit+0,$detik,0,0,0));
			
		} else {
			$nomorbaru = 1;
			$long = 9;
			$mulai= "16:00:00";
  			list($jam,$menit,$detik)= explode(':',$mulai);
  			$jam_selesai = date("H:i:s",mktime($jam,$menit+0,$detik,0,0,0));
		}
	} else {
		if ($_POST['jam_layanan'] == "07.00 - 11.00"  &&  $_POST['jenispenyakit'] == "Ringan") {
		$nomorbaru = $data[nomor] + 1;
		$long = 7;
		$long1 = $data['lama'];
		$jam_selesai1 = $data['jam_kedatangan'];
		list($jam,$menit,$detik)= explode(':',$jam_selesai1);
  		$jam_selesai = date("H:i:s",mktime($jam,$menit+$long1,$detik,0,0,0));
		
		}elseif ($_POST['jam_layanan'] == "07.00 - 11.00"  &&  $_POST['jenispenyakit'] == "Berat") {
		$nomorbaru = $data[nomor] + 1;
		$long = 9;
		$long1 = $data['lama'];
		$jam_selesai1 = $data['jam_kedatangan'];
		list($jam,$menit,$detik)= explode(':',$jam_selesai1);
  		$jam_selesai = date("H:i:s",mktime($jam,$menit+$long1,$detik,0,0,0));
		
		} elseif  ($_POST['jam_layanan'] == "16.00 - 20.00"  && $_POST['jenispenyakit'] == "Ringan") {
		$nomorbaru = $data[nomor] + 1;
		$long = 7;
		$long1 = $data['lama'];
		$jam_selesai1 = $data['jam_kedatangan'];
		list($jam,$menit,$detik)= explode(':',$jam_selesai1);
  		$jam_selesai = date("H:i:s",mktime($jam,$menit+$long1,$detik,0,0,0));	
		}else{
		$nomorbaru = $data[nomor] + 1;
		$long = 9;
		$long1 = $data['lama'];
		$jam_selesai1 = $data['jam_kedatangan'];
		list($jam,$menit,$detik)= explode(':',$jam_selesai1);
  		$jam_selesai = date("H:i:s",mktime($jam,$menit+$long1,$detik,0,0,0));	
		}
		
	}
	 
	
$sql="INSERT INTO daftarberobat (nomor,nama,idpasien, tgl_berobat, jamdaftar, jam_layanan, lama, jam_kedatangan,jenispenyakit, analisis) VALUES ('$nomorbaru','{$_POST['nama']}','{$_POST['idpasien']}','{$_POST['tgl_berobat']}','$clock' '{$_POST['jam_layanan']}','$long','$jam_selesai','{$_POST['jenispenyakit']}','{$_POST['analisis']}')";
$sql4 = "select nomor from daftarberobat where tgl_berobat = '{$_POST['tgl_berobat']}' AND jam_layanan = '{$_POST['jam_layanan']}'";
$query = mysqli_query($con,$sql4);
$count = mysqli_num_rows($query);

if ($count >= 40 && $_POST['jam_layanan'] == "07.00 - 11.00") {
$msg = '<div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Pendaftaran sudah ditutup!</strong>
          Silahkan diulangi. Klik daftar berobat pada menu disamping !!</div>';
		  echo '<meta http-equiv="refresh" content=2;url="index.php">';
		  echo $msg;
		  die();
}elseif ($count >= 45 && $_POST['jam_layanan'] == "16.00 - 20.00") {
$msg = '<div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Pendaftaran sudah ditutup!</strong>
          Silahkan diulangi. Klik daftar berobat pada menu disamping !!</div>';
		  echo '<meta http-equiv="refresh" content=2;url="index.php">';
		  echo $msg;
		  die();
}

if (isset($_POST['submitted'])) {
  foreach ($_POST AS $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con, $value);  
}

	
$cekdata="select tgl_berobat, idpasien from daftarberobat where tgl_berobat='{$_POST['tgl_berobat']}' AND jam_layanan = '{$_POST['jam_layanan']}' AND idpasien IN (SELECT idpasien FROM pasien WHERE iduser = '{$id}')";
	
$ada=mysqli_query($con,$cekdata) or die(mysqli_error($cekdata));

if(mysqli_num_rows($ada)>0)
{ 
  $msg= '
          <div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Oh Snap!</strong>
          Tanggal Berobat telah Terdaftar! Silahkan daftar di tanggal atau jam layanan yang berbeda.
		  Klik daftar berobat lagi. </div>';
		  echo '<meta http-equiv="refresh" content=2;url="index.php">';
} else {
  $sql="INSERT INTO daftarberobat (nomor,nama,idpasien, tgl_berobat, jamdaftar, jam_layanan, lama, jam_kedatangan,jenispenyakit, analisis) VALUES ('$nomorbaru','{$_POST['nama']}','{$_POST['idpasien']}','{$_POST['tgl_berobat']}','$clock', '{$_POST['jam_layanan']}','$long','$jam_selesai','{$_POST['jenispenyakit']}','{$_POST['analisis']}')";
  $exc = mysqli_query($con, $sql);
  $msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Sukses!</strong>
          </div>';
          echo '<meta http-equiv="refresh" content=1;url="index.php?mod=cetak">';
  } 
} 
?> 
<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">
    <script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.theme.css"> 
<script>
$(document).ready(function(){
  $("#tanggaldaftar").datepicker({
    dateFormat: "yy-mm-dd",
    minDate: 1, // hari kemaren disabled
    beforeShowDay: function(date){
      var day = date.getDay();
      return [(day !=0), ''];
    }
  })
})

  
function validasi(){
    var analisisValid = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
  
    var analisis      = valid.analisis.value;
    var pesan     = '';

   
     if (analisis != '' && !analisis.match(analisisValid)) {
      pesan += '-Analisis tidak valid\n';
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
		   
 <?php if($_SESSION['alias'] == 'pasien'){ ?>
                
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
<section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Berobat</h3>
                <br>
              </div>
              
              
</ul>
        
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Daftar Berobat
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
       

                <form class="stdform stdform2" method="post" name="valid" action="" onSubmit="return validasi()">
                 
                 <div class="vali-form">
            <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">ID Pasien</label>
              <input type="hidden" required="" name="idpasien" value="<?php echo $row['idpasien']; ?>"/><br><?php echo $row['idpasien']; ?>
            </div>
                        
           <div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">Nama</label>
              <input type="hidden" required="" name="nama" value="<?php echo $row['nama']; ?>"/><br><?php echo $row['nama'];?>
            </div>
                   <div class="clearfix"> </div>
                       <div class="col-md-12 form-group1 group-mail">
              <br><label class="control-label ">Tanggal Berobat</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="tgl_berobat" class="" id="tanggaldaftar" required=""/>
            </div>        
                   
                               
                   
                   <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Jam Layanan</label>
            <select name="jam_layanan">
            <option>Pilih jam layanan</option>
                <option value="07.00 - 11.00">07.00 - 11.00</option>
            	<option value="16.00 - 20.00">16.00 - 20.00</option>
            </select>
            </div>
                   
            
                   
                   <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Jenis Penyakit</label>
            <select name="jenispenyakit">
            <option>Pilih jenis penyakit</option>
                <option value="Ringan">Ringan</option>
            	<option value="Berat">Berat</option>
            </select>
            </div>
                          
                
                <div class="vali-form">
            <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Analisis</label>
              <input type="text" required="" name="analisis" id="analisis">
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
          </div>
          </div>
         