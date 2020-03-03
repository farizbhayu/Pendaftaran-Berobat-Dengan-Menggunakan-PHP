<?php
	include 'inc/config.php';
	session_start();
?>
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=daftar_berobat">Daftar Berobat</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-camera"></span></div>
            <div class="pagetitle">
                <h5>Pasien</h5>
                <h1>Daftar Berobat</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
    <div class="maincontentinner">
       	<div class="row-fluid">

<?php	
	$id=$_SESSION['suserid'];    
	$sql2 = "SELECT idpasien, nama FROM pasien WHERE iduser = '{$id}'";
		$exc = mysqli_query($con,$sql2);
		$row = mysqli_fetch_array($exc);
		
$q = mysqli_query($con, "SELECT * FROM daftarberobat ORDER BY nomor DESC LIMIT 1");
$jumlah = mysqli_num_rows($q);
$data = mysqli_fetch_array($q);

  if ($jumlah <= 0) {
    $nomorbaru = 1;
  } else {
    $nomorbaru = $data[nomor] + 1;
  }


if (isset($_POST['submitted'])) {
  foreach ($_POST AS $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con, $value);  }

$sql = "UPDATE INTO daftarberobat (nomor,nama,idpasien, tgl_berobat, jam_layanan,jenispenyakit, analisis) VALUES ('$nomorbaru','{$_POST['nama']}','{$_POST['idpasien']}','{$_POST['tgl_berobat']}', '{$_POST['jam_layanan']}','{$_POST['jenispenyakit']}','{$_POST['analisis']}')";
$exc = mysqli_query($con,$sql);

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
  } echo '<meta http-equiv="refresh" content="0;url=index.php?mod=cetak&id='.$id.'">';
}
$sql3 = "SELECT * FROM daftarberobat WHERE (SELECT idpasien FROM pasien WHERE iduser = '{$id}')";
$hasil = mysqli_query($con,$sql3);
$hasil2 = mysqli_fetch_array($hasil);
  
 
 ?>          
             <div id="dashboard-left" class="span8">                    
				  <div class="widgetbox">
					  <h4 class="widgettitle">Form Edit</h4>
					  <div class="widgetcontent nopadding">
						  <form class="stdform stdform2" method="post" action="" >
					
                            <P><label>ID Pasien</label>				
					<span class="field"><input type="hidden"  name="idpasien" id="" size="50" class="input-xlarge" value="<?php echo $hasil2['idpasien']; ?>"><?php echo $row['idpasien']; ?></span></P>

                  <P><label>Nama Pasien</label>       
          <span class="field"><input type="hidden"  name="nama" id="" size="50" class="input-xlarge" value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></span></P>
					 
                    
                    <P><label>Tanggal Berobat</label>				
					<span class="field"><input type="hidden"  name="tgl_berobat" id="tanggallahir" size="50" class="input-xlarge" value="<?php echo $hasil2['tgl_berobat']; ?>"/><?php echo $hasil2['tgl_berobat']; ?></span></P>
					 
                     <P><label>Jam Layanan</label>				
					<span class="field"><input type="hidden"  name="jam_layanan" id="jam_layanan" size="50" class="input-xlarge" value="<?php echo $hasil2['jam_layanan']; ?>"><?php echo $hasil2['jam_layanan']; ?></span></P>
        
                   <P><label>Jenis Penyakit</label>				
					<span class="field"><input type="hidden"  name="jenispenyakit" id="jenis_penyakit" size="50" class="input-xlarge" value="<?php echo $hasil2['jenispenyakit']; ?>"><?php echo $hasil2['jenispenyakit']; ?></span></P>
        
                                                      
                    <P><label>Analisis</label>				
					<span class="field"><input type="text"  name="analisis" id="analisis" size="50" class="input-xlarge" value="<?php echo $hasil2['analisis']; ?>"></span></P>
            
                    
                			<p class="stdformbutton">
                                <button class="btn btn-primary">Simpan</button>                                
                                <input type="hidden" value="1" name="submitted" /> 
                            </p>
                    </form>
                    </div><!--widgetcontent-->
            </div><!--widget-->
            
             </div><!--span8-->
			<div id="dashboard-right" class="span4">
                    

                    
                    </div><!--span4-->
                </div><!--row-fluid-->
                
                
                
                <?php include "footer.php"; ?>
     
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
