
<?php 
if (isset($_GET['id'])) {
  $id =  $_GET['id'];
}
if (isset($_POST['submitted'])) {
  foreach ($_POST AS $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con,$value);
	
	$idpasien = $_POST['idpasien'];
 $sql = "UPDATE daftarberobat set diagnosa='{$_POST['diagnosa']}', terapi='{$_POST['terapi']}' WHERE id='$id'";
  $data = mysqli_query($con,$sql);// jalankan perintah $sql2 
  if ($data==1) {
       $msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-circle"></i><strong>Sukses!</strong>
          Data berhasil diupdate. </div>';
  } else {
  $msg= '
          <div class="widget-content">
          <div class="alert alert-danger">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Oh Snap!</strong>
          Maaf gagal diupdate. </div>';
  }
  echo '<meta http-equiv="refresh" content=1;url="index.php?mod=datapasien">';
}
}

$sql3 = "SELECT * FROM daftarberobat WHERE idpasien = '$id'";
$hasil = mysqli_query($con,$sql3);
$row = mysqli_fetch_array($hasil);

?>

<div class="content-top">
			<div class="content-top">
			  <div class="banner">
		   
                <?php if($_SESSION['alias'] == 'dokter'){ ?>
                
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
                  Rekam Medis Pasien
                </header>     
                
            <table id="dyntable" class="table table-bordered responsive">
            
        <thead>
            <tr> 
	     			   <th width="20">No</th>
	     			   <th>ID Pasien</th>
	     			   <th>Tanggal Berobat</th>
	     			   <th>Jam Layanan</th>
	     			   <th>Jenis Penyakit</th>
	     			   <th>Analisis</th>
               <th>Diagnosa</th>
               <th>Terapi</th>
		        </tr>
    		</thead>
    		<tbody>
            
	<?php 
    $sql1 = mysqli_query($con, "SELECT * FROM daftarberobat WHERE id = '{$id}'") or die (mysqli_error());

        $cek = mysqli_num_rows($sql1);
            ?>
              

	<?php
	   while($data1 = mysqli_fetch_array($sql1))
		{
	?>    
        		<tr>
                
 	 			<td align="center"><?php echo $i; ?></td>
 	 			<td align="center"><?php echo $data1['idpasien'] ?></td>
 	 			<td align="center"><?php echo $data1['tgl_berobat'] ?></td>
 	 			<td align="center"><?php echo $data1['jam_layanan'] ?></td>
 	 			<td align="center"><?php echo $data1['jenispenyakit'] ?></td>
 	 			<td align="center"><?php echo $data1['analisis'] ?></td>
                <td align="center"><?php echo $data1['diagnosa'] ?></td>
                <td align="center"><?php echo $data1['terapi'] ?></td>
                        <?php
	        			}
	    				?>  
                        
                        
                   </tbody>
  </table>
              
       </section>
       </section>
       </section>
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Edit Terapi dan Diagnosa
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
        
                  <form method="post" action="">
                  
                
                        
           <div class="vali-form">
             <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Diagnosa</label>
              <input type="text" required="" name="diagnosa" value="<?php echo $row['diagnosa'];?>" >
            </div>
            
               
           <div class="vali-form">
              <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Terapi</label>
              <input type="text" required="" name="terapi" value="<?php echo $data['terapi'];?>">
            </div>
            
                  
					
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