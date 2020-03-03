<?php
	include 'inc/config.php';
    session_start();
	
	$tanggal = date("Y-m-d");
	$id=$_SESSION['suserid'];
    $sql = "SELECT id, nomor, nama, tgl_berobat, jam_layanan, jam_kedatangan, masuk FROM daftarberobat where masuk = 'N' and jam_layanan = '{$_POST['jam_layanan']}' AND tgl_berobat = '$tanggal' order by id asc";
    $result = mysqli_query($con, $sql);
    $kode = $_GET['id'];
	//$modname="user";	
?>
<div class="content-top">
			<div class="content-top">
			  <div class="banner">
		   
           <?php if($_SESSION['alias'] == 'admin' OR  $_SESSION['alias'] == 'dokter'){ ?>

                
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
<section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Antrian Berjalan</h3>
                <br>
              </div>
              
              
</ul>
        
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Antrian Berjalan
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
                  <form method="post" action="">
         <div class="clearfix"> </div>
              
           <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Jam Layanan</label>
            <select name="jam_layanan">
            <option>Pilih jam layanan</option>
                <option value="07.00 - 11.00">07.00 - 11.00</option>
            	<option value="16.00 - 20.00">16.00 - 20.00</option>
            </select>
            </div>     
        <button type"submit" class"btn">Submit</button>
        <input type="hidden" name="submitted" value="1"/>
        </div>
        
     <?php if($_SESSION['alias'] == 'admin'){ ?>
        <div class="col-sm-8">
                   <div class="input-group">
                        <div class="doc-buttons">
                           <a href="index.php?mod=antrianberjalan_new" class="btn btn-s-md btn-success">New</a></div>
                        </div>
                    </div>
                    <?php } else { ?>
        <?php } ?>
            </form>
                    
             <?php if($_SESSION['alias'] == 'dokter'){ ?>
                <table id="dyntable" class="table table-bordered responsive">
                    
                    <thead>
                        <tr> 
	                <th>Nomor Antrian</th>
                    <th>Nama</th>
                    <th>Tanggal Berobat</th>
	     			<th>Jam Layanan</th>
	     			<th>Jam Kedatangan</th>
                    <th>Masuk</th>
                    
		        </tr>
    		</thead>
    		<tbody>
	<?php
	    while($data = mysqli_fetch_array($result)){
	?>
        		<tr>
                <td align="center"><?php echo $data['nomor'] ?></td>
                <td align="center"><?php echo $data['nama'] ?></td>
                <td align="center"><?php echo $data['tgl_berobat'] ?></td>
                <td align="center"><?php echo $data['jam_layanan'] ?></td>
                <td align="center"><?php echo $data['jam_kedatangan'] ?></td>
                 <td align="center"><?php echo $data['masuk'] ?></td>
               </tr>
 	
                        <?php
	        			}
	    				?>
                        
                        
                  </tbody>
  </table>
  
   <?php } else { ?>
      <table id="dyntable" class="table table-bordered responsive">
                    
                    <thead>
                        <tr> 
	                <th>Nomor Antrian</th>
                    <th>Nama</th>
                    <th>Tanggal Berobat</th>
	     			<th>Jam Layanan</th>
	     			<th>Jam Kedatangan</th>
                    <th>Masuk</th>
                    <th>Action</th>
		        </tr>
    		</thead>
    		<tbody>
	<?php
	    while($data = mysqli_fetch_array($result)){
	?>
        		<tr>
                <td align="center"><?php echo $data['nomor'] ?></td>
                <td align="center"><?php echo $data['nama'] ?></td>
                <td align="center"><?php echo $data['tgl_berobat'] ?></td>
                <td align="center"><?php echo $data['jam_layanan'] ?></td>
                <td align="center"><?php echo $data['jam_kedatangan'] ?></td>
                 <td align="center"><?php echo $data['masuk'] ?></td>
                 <td align="center"><a href="index.php?mod=antrianberjalan_edit&id=<?php echo $data['id']; ?>"><i class="fa fa-edit" align="center"></i></a></a></div></td></tr>
 	
                        <?php
	        			}
	    				?>
                        
                        
                  </tbody>
  </table>
   
   <?php } ?>
    <?php } else {
		 echo '<meta http-equiv="refresh" content=1;url="error.php">';
		  } ?>
                
                
</div><!--maincontentinner-->
</div><!--maincontent-->
</div>