<?php
		$inputcari=$_POST['cari'];
    $cari = $_POST['cari'];


	$id=$_GET['id'];
	   //$tgl_berobat = "Select tgl_berobat from daftarberobat where = '{id}'";
    //$sql = "SELECT * FROM daftarberobat WHERE idpasien = '{$id}'";
    //$result = mysqli_query($con,$sql);
	  
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
    //minDate: 0, // hari kemaren disabled
    beforeShowDay: function(date){
      var day = date.getDay();
      return [(day !=0), ''];
    }
  })
})

$(document).ready(function(){
  $("#tanggaldaftar1").datepicker({
    dateFormat: "yy-mm-dd",
    //minDate: 0, // hari kemaren disabled
    beforeShowDay: function(date){
      var day = date.getDay();
      return [(day !=0), ''];
    }
  })
})
</script>
        <div class="content-top">
			<div class="content-top">
			  <div class="banner">
		   
             <?php if($_SESSION['alias'] == 'dokter'){ ?>
                
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
<section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Rekam Medis</h3>
                <br>
              </div>
              
              
</ul>
        
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Data Rekam Medis
                </header>
                <?php echo $msg; ?>
                <div class="validation-system">
 		  <div class="table-responsive">
                <form name="form1" method="post" action="">
        
 		    <div class="form-group">
                      <label class="col-sm-1 control-label">Tanggal Berobat :</label></div>
                <div class="col-sm-3">
                <div class="input-group">
                
                          <input type="text" name="cari" class="" id="tanggaldaftar"/>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go!</button>
                          </span>
                </div>
                </div>
                </div>
                <input type="hidden" name="kirim" value="1">
                </form>
                    
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
	     			   <th>Action</th>
		        </tr>
    		</thead>
    		<tbody>
	<?php 
	if ($cari) { // tombol cari diklik
            if ($inputcari != "") { // txtbox ga kosong
                $sql = mysqli_query($con, "SELECT * FROM daftarberobat WHERE tgl_berobat like '%$inputcari%' AND diagnosa != '' AND terapi != '' and idpasien = '{$id}'") or die (mysqli_error());
             } else {
                $sql = mysqli_query($con, "SELECT * FROM daftarberobat WHERE diagnosa != '' AND terapi != '' AND idpasien = '{$id}'") or die (mysqli_error());
			}
			}else {
                $sql = mysqli_query($con, "SELECT * FROM daftarberobat WHERE diagnosa != '' AND terapi != '' AND idpasien = '{$id}'") or die (mysqli_error());
            }

        $cek = mysqli_num_rows($sql);
         
            ?>
         
              

	<?php
	    $i=1;
	    while($data = mysqli_fetch_array($sql))
		{
	?>    
        		<tr>
                
 	 			<td align="center"><?php echo $i; ?></td>
 	 			<td align="center"><?php echo $data['idpasien'] ?></td>
 	 			<td align="center"><?php echo $data['tgl_berobat'] ?></td>
 	 			<td align="center"><?php echo $data['jam_layanan'] ?></td>
 	 			<td align="center"><?php echo $data['jenispenyakit'] ?></td>
 	 			<td align="center"><?php echo $data['analisis'] ?></td>
                <td align="center"><?php echo $data['diagnosa'] ?></td>
                <td align="center"><?php echo $data['terapi'] ?></td>
<td align="center"><a href="index.php?mod=datapasien_detailedit&id=<?php echo $data['id']; ?>"><i class="fa fa-edit" style="font-size:16px"></i></a>&nbsp;&nbsp;</a></div></td></tr>
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