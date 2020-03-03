
<?php
	session_start();	
	$cari=$_GET['cari'];
	if(isset($cari)){
		$ket="where nama like '%".$cari."%'";
	} else {
		$ket="";
	}
	
	$id=$_SESSION['suserid'];    
    $sql = "SELECT * FROM pasien where iduser = '{$id}'";
    $result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$modname="pasien";	
	$modname1="pasien_detail";
	;
?>
<div class="rightpanel">

             	 
<ul class="breadcrumbs">
 <?php if($_SESSION['alias'] == 'pasien'){ ?>
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=<?php echo $modname;?>>"><?php echo ucwords($modname);?></a> <span class="separator"></span></li>  
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-camera"></span></div>
            <div class="pagetitle">
                <h5>Pasien</h5>
                <h1>Data Pasien</h1>
            </div>
         </div>




<div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
             <div id="dashboard-left" class="span8">                    
				  <div class="widgetbox">
                  
					  <h4 class="widgettitle">Form Pasien</h4>
					  <div class="widgetcontent nopadding">
						  <form class="stdform stdform2" method="post" action="" >
						 
                                <p><label>ID Pasien</label>				
					<span class="field"><input type="hidden"  name="idpasien" id="idpasien" value="<?php echo $row['idpasien']; ?>"/><?php echo $row['idpasien'];?></span></p>
                       
                    <P><label>Nama Pasien</label>				
					<span class="field"><input type="hidden"  name="nama" id="nama" size="50" class="input-xlarge" value="<?php echo $row['nama']; ?>"/><?php echo $row['nama']; ?></span></P>
					 
                    <P><label>No Identitas</label>				
					<span class="field"><input type="hidden"  name="no_ktp" id="no_ktp" size="50" class="input-xlarge" value="<?php echo $row['no_ktp']; ?>"/><?php echo $row['no_ktp']; ?></span></P>
					                      
                    <P><label>Tanggal Lahir</label>				
					<span class="field"><input type="hidden"  name="tgl_lahir" id="tanggallahir" size="50" class="input-xlarge" value="<?php echo $row['tgl_lahir']; ?>"/><?php echo $row['tgl_lahir']; ?></span></P>
                    
                    <P><label>Jenis Kelamin</label>				
					<span class="field"><input type="hidden"  name="tgl_lahir" id="tanggallahir" size="50" class="input-xlarge" value="<?php echo $row['jk']; ?>"/><?php echo $row['jk']; ?></span></P>
                    
                    <P><label>Alamat</label>				
					<span class="field"><input type="hidden"  name="alamat" id="alamat" size="50" class="input-xlarge" value="<?php echo $row['alamat']; ?>"/><?php echo $row['alamat']; ?></span></P>
                    
                    <P><label>Telepon</label>				
					<span class="field"><input type="hidden"  name="telepon" id="telepon" size="50" class="input-xlarge" value="<?php echo $row['telepon']; ?>"/><?php echo $row['telepon']; ?></span></P>
					
                    <P><label>Umur</label>				
					<span class="field"><input type="hidden"  name="umur" id="umur" size="50" class="input-xlarge" value="<?php echo $row['umur']; ?>"/><?php echo $row['umur']; ?></span></P>
                    
				    <P><label>Edit Data Pasien</label>				
					<span class="field"><input type="hidden"  name="" id="" size="50" class="input-xlarge"/><i><a href="index.php?mod=pasien_edit&id=<?php echo $row['idpasien']; ?>"><font color="blue">Klik disini</font></i></a></span></P>
              
                		</form>
                 <?php } else {
		 echo '<meta http-equiv="refresh" content=1;url="error.php">';
		  } ?>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
             </div><!--span8-->
			<div id="dashboard-right" class="span4">
                    

                    
                    </div><!--span4-->
                </div><!--row-fluid-->
                
                
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
