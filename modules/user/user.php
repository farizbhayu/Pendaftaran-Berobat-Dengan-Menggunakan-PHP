
<?php	
	include 'inc/config.php';
	$inputcari=$_POST['cari'];
  $cari = $_POST['cari'];

	
	//$id=$_GET['id'];    
    //$sql = "SELECT * FROM login ".$ket;
    //$result = mysqli_query($con,$sql);
	$modname="user";	
?>
<div class="content-top">
			<div class="content-top">
			  <div class="banner">
		   
                 <?php if($_SESSION['alias'] == 'admin' OR  $_SESSION['alias'] == 'dokter'){ ?>

                
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
<section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Daftar User</h3>
                <br>
              </div>
              
              
</ul>
        
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  User 
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		
 		<div class="validation-form">
                  <form method="post" action="">
       <div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">Username</label>
              <input type="text" required="" name="cari">
            </div>    
        <div class="clearfix"> </div>
					<br>
                   <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <input type="hidden" name="kirim" value="1">
        </div>
            </form>
                    
            <table id="dyntable" class="table table-bordered responsive">
                    
              <thead>
                <tr> 
	     			       <th width="20">No</th>
	     			       <th>ID User</th>
                   <th>Username</th>
                   
	     			       <th>Role ID</th>
		            </tr>
    		</thead>
    		<tbody>
  <?php
        if ($cari) { // tombol cari diklik
            if ($inputcari != "") { // txtbox ga kosong
                $sql = mysqli_query($con, "SELECT * FROM login WHERE username like '%$inputcari%'") or die (mysqli_error());
            } else {
                $sql = mysqli_query($con, "SELECT * FROM login order by iduser asc") or die (mysqli_error());
            }
            } else {
                $sql = mysqli_query($con, "SELECT * FROM login order by iduser asc") or die (mysqli_error());
            }

        $cek = mysqli_num_rows($sql);
  ?>
  <?php
      $i=1;
	    while($data = mysqli_fetch_array($sql)){
	?>    
        	<tr>
 	 			<td align="center"><?php echo $i; ?></td>
 	 			<td align="center"><?php echo $data['iduser'] ?></td>
                <td align="center"><?php echo $data['username'] ?></td>

                <td align="center"><?php echo $data['role_id'] ?></td>
           </tr>
 	 			
              <?php
		   					$i++;
	        			}
	    				?>  
                        
                        
                  </tbody>
  </table>
                
                <?php } else {
		 echo '<meta http-equiv="refresh" content=1;url="error.php">';
		  } ?>
               
</div><!--maincontentinner-->
</div><!--maincontent-->
</div>