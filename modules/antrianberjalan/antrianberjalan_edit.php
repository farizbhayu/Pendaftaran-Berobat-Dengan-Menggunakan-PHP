
<?php 
$id =  $_GET['id'];
if (isset($_POST['submitted'])) {
  foreach ($_POST AS $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con,$value);

  $sql = "UPDATE daftarberobat set masuk='{$_POST['masuk']}' WHERE id='$id'";
  $jam = $_POST['jam_layanan'];
  
 
$exc = mysqli_query($con,$sql); // eksekusi perintah pertama $sql1
  if ($exc==1) {
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
  echo '<meta http-equiv="refresh" content=1;url="index.php?mod=antrianberjalan&id='.$jam.'">';
}
}
$sql3 = "SELECT * FROM daftarberobat WHERE id = '$id'";
$hasil = mysqli_query($con,$sql3);

$row = mysqli_fetch_array($hasil);

?>
<div class="content-top">
			<div class="content-top">
			  <div class="banner">
		   
                <?php if($_SESSION['alias'] == 'admin' OR  $_SESSION['alias'] == 'dokter'){ ?>

    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
<section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Data Antrian</h3>
                <br>
              </div>
              
              
</ul>


<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Antrian yang berjalan
                </header>     
                        
            <table id="dyntable" class="table table-bordered responsive" align="center">
                
                    <thead>
                        <tr> 
	                <th>Nomor Antrian</th>
                    <th align="center">Nama</th>
                    <th>Tanggal Berobat</th>
	     			<th>Jam Layanan</th>
	     			<th>Jam Kedatangan</th>
                    
		        </tr>
    		</thead>
    		<tbody>
            
            <?php 
$result = mysqli_query($con,"SELECT id, nomor, nama, tgl_berobat, jam_layanan, jam_kedatangan FROM daftarberobat where id = '$id'") or die (mysqli_error());

        $cek = mysqli_num_rows($result);
			?>
	<?php
	    $i = 1;
		while($data = mysqli_fetch_array($result))
		{
	?>
        		<tr align="center">
                <td align="center"><?php echo $data['nomor'] ?></td>
                <td align="center"><?php echo $data['nama'] ?></td>
                <td align="center"><?php echo $data['tgl_berobat'] ?></td>
                <td align="center"><?php echo $data['jam_layanan'] ?></td>
                <td align="center"><?php echo $data['jam_kedatangan'] ?></td>
                      
                 </tr>       
 	
                    <?php
		   					$i++;
	        			}
	    				?>  
                 
                        
                  </tbody>
  </table>
           </section>   
       </section>
       </section>

<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Entry Sudah Berobat
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
        
                  <form method="post" action="">
                  
                
                        
          <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Masuk</label>
            <select name="masuk"  value="<?php echo $row['masuk']; ?>"/>
            	<option value="<?php echo $row['masuk'];?>"><?php echo $row['masuk'];?></option>
                <option value="Y">Y</option>
            	<option value="N">N</option>
            </select>
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