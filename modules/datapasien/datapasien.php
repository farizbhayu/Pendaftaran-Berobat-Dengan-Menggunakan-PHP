
<?php
    $inputcari=$_POST['cari'];
    $cari = $_POST['cari'];
        
    //$sql = "SELECT * FROM pasien";
    //$result = mysqli_query($con,$sql);
    $modname="datapasien";  
    $modname1="datapasien_detail";
    ;
?>
<div class="content-top">
            <div class="content-top">
              <div class="banner">
           
                  <?php if($_SESSION['alias'] == 'admin' OR $_SESSION['alias'] == 'dokter' ){ ?>
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
<section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Master Pasien</h3>
                <br>
              </div>
              
              
</ul>
        
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Data Pasien
                </header>
                <?php echo $msg; ?>
             <div class="validation-system">
          <div class="table-responsive">
        <form name="form1" method="post" action="">
                
        
                  <?php if($_SESSION['alias'] == 'admin'){ ?>
     
        <div class="col-sm-8">
                   <div class="input-group">
                        <div class="doc-buttons">
                           <a href="index.php?mod=datapasien_new" class="btn btn-s-md btn-success">New</a></div>
                        </div>
                    </div>
                     
                       <?php } else { ?>
                       <?php } ?>
                       
                <div class="form-group">
                      <label class="col-sm-1 control-label">Nama:</label></div>
                <div class="col-sm-3">
                <div class="input-group">
                
                          <input type="text" name="cari" class="form-control">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go!</button>
                          </span>
                </div>
                </div>
                </div>
                <input type="hidden" name="kirim" value="1">
              
            </form>
            
                  <?php if($_SESSION['alias'] == 'admin'){ ?>
        
                <table id="dyntable" class="table table-bordered responsive">
                    
                    <thead>
                        <tr> 
                    <th>No</th>
                    <th>ID Pasien</th>
                    <th>Nama Pasien</th>
                    <th>No Identitas</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Umur</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            
            
            <tbody>
    <?php
        if ($cari) { // tombol cari diklik
            if ($inputcari != "") { // txtbox ga kosong
                $sql = mysqli_query($con, "select * from pasien where nama like '%$inputcari%'") or die (mysqli_error());
             } else {
                $sql = mysqli_query($con, "select * from pasien") or die (mysqli_error());
			}
			}else {
                $sql = mysqli_query($con, "select * from pasien") or die (mysqli_error());
            }

        $cek = mysqli_num_rows($sql);
         
            ?>
         <?php
                $i = 1;
                while($data = mysqli_fetch_array($sql)){
                    ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['idpasien'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['no_ktp'] ?></td>
                    <td><?php echo $data['tgl_lahir'] ?></td>
                    <td><?php echo $data['jk'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['telepon'] ?></td>
                    <td><?php echo $data['umur'] ?></td>
              
           
      <?php if ($_SESSION['alias'] == 'admin') { ?>          
<td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['idpasien'] ?>"><i class="fa fa-edit" style="font-size:14px"></i></a>&nbsp;</div></td></tr>

<?php } else { ?>
<td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['idpasien'] ?>"><i class="fa fa-edit" style="font-size:14px"></i></a>&nbsp;<a href="index.php?mod=<?php echo $modname; ?>_detail&id=<?php echo $data['idpasien'] ?>"><i class="fa fa-table" style="font-size:14px"></i></a>&nbsp;</div></td></tr>
<?php } ?>
                         <?php
                $i++;
            }
    ?>    
                        
                    </tbody>
  </table>
               
               <?php } else { ?>
               
                 <table id="dyntable" class="table table-bordered responsive">
                    
                    <thead>
                        <tr align="center"> 
                    <th>No</th>
                    <th>ID Pasien</th>
                    <th>Nama Pasien</th>
                    <th>No Identitas</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Umur</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            
            
            <tbody>
    <?php
        if ($cari) { // tombol cari diklik
            if ($inputcari != "") { // txtbox ga kosong
                $sql = mysqli_query($con, "select * from pasien where nama like '%$inputcari%'") or die (mysqli_error());
             } else {
                $sql = mysqli_query($con, "select * from pasien") or die (mysqli_error());
			}
			}else {
                $sql = mysqli_query($con, "select * from pasien") or die (mysqli_error());
            }

        $cek = mysqli_num_rows($sql);
         
            ?>
         <?php
                $i = 1;
                while($data = mysqli_fetch_array($sql)){
                    ?>
                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['idpasien'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['no_ktp'] ?></td>
                    <td><?php echo $data['tgl_lahir'] ?></td>
                    <td><?php echo $data['jk'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['telepon'] ?></td>
                    <td><?php echo $data['umur'] ?></td>
              
           
      <?php if ($_SESSION['alias'] == 'admin') { ?>          
<td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['idpasien'] ?>"><i class="fa fa-edit" style="font-size:14px"></i></a>&nbsp;</div></td></tr>

<?php } else { ?>
<td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_detail&id=<?php echo $data['idpasien'] ?>"><i class="fa fa-table" style="font-size:14px"></i></a>&nbsp;</div></td></tr>
<?php } ?>
                         <?php
                $i++;
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