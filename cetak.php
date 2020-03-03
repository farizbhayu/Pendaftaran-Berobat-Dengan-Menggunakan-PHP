<?php
	include 'inc/config.php';
    session_start();

	
?>
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=cetak&id='.$id.'">Cetak Antrian</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-camera"></span></div>
            <div class="pagetitle">
                <h5>Antrian</h5>
                <h1>Cetak Antrian</h1>
            </div>
         </div>

<div class="maincontent">
            <div class="maincontentinner">
             	<div class="row-fluid">
<?php
$$id=$_SESSION['suserid'];    
	$sql2 = "SELECT idpasien, nama FROM pasien WHERE iduser = '{$id}'";
		$exc = mysqli_query($con,$sql2);
		$adt = mysqli_fetch_array($exc);
		
   
   if (isset($_POST['submitted'])) {
  foreach ($_POST AS $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con, $value);  
  	}
    $sql = "SELECT * FROM daftarberobat WHERE (SELECT idpasien FROM pasien WHERE iduser = '{$id}')";
    $hasil = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($hasil);
   }
	?>

			 <div id="dashboard-left" class="span8">                    
				  <div class="widgetbox">
					  <h4 class="widgettitle">Form Cetak</h4>
					  <div class="widgetcontent nopadding">
						  <form class="stdform stdform2" method="post" action="" >
					
                        <P><label>ID Pendaftaran</label>       
          <span class="field"><input type="hidden"  name="id" id="" size="50" class="input-medium" value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></span></P>
                        
                         <P><label>Nomor Antrian</label>       
          <span class="field"><input type="hidden"  name="nomor" id="" size="50" class="input-medium" value="<?php echo $row['nomor']; ?>"><?php echo $row['nomor']; ?></span></P>
          
          <P><label>Nama Pasien</label>       
          <span class="field"><input type="hidden"  name="nama" id="" size="50" class="input-medium" value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></span></P>
					                    
                         <P><label>ID Pasien</label>				
					<span class="field"><input type="text"  name="idpasien" id="" size="50" class="input-medium" value="<?php echo $adt['idpasien']; ?>"disabled></span></P>

                 
                    <P><label>Tanggal Berobat</label>				
					<span class="field"><input type="hidden"  name="tgl_berobat" id="" size="50" class="input-medium" value="<?php echo $row['tgl_berobat']; ?>"><?php echo $row['tgl_berobat']; ?></span></P>
					 
                     <P><label>Jam Layanan</label>				
					<span class="field"><input type="hidden"  name="jam_layanan" id="jam_layanan" size="50" class="input-medium" value="<?php echo $row['jam_layanan']; ?>"><?php echo $row['jam_layanan']; ?></span></P>
        
                   <P><label>Jenis Penyakit</label>				
					<span class="field"><input type="hidden"  name="jenispenyakit" id="jenispenyakit" size="50" class="input-medium" value="<?php echo $row['jenispenyakit']; ?>"><?php echo $row['jenispenyakit']; ?></span></P>
                                                      
                    <P><label>Analisis</label>				
					<span class="field"><input type="hidden"  name="analisis" id="analisis" size="50" class="input-medium" value="<?php echo $row['analisis']; ?>"><?php echo $row['analisis']; ?></span></P>
                    
                     <p><label>Klik untuk kembali ke&nbsp;<a href="localhost/klinik/index.php">halaman utama</a></label></p>   
                        
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