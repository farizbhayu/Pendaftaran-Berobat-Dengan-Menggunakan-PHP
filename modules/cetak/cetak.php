<?php
	include 'inc/config.php';
    session_start();

	
?>
<?php
$id=$_SESSION['suserid'];    
	$sql = "SELECT * FROM daftarberobat Where idpasien IN (SELECT idpasien FROM pasien WHERE iduser = '{$id}') order by id desc limit 1000";
		$exc = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($exc);



   
   if (isset($_POST['submitted'])) {
  foreach ($_POST AS $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con, $value);  
  	}
    //$sql = "SELECT * FROM daftarberobat WHERE idpasien IN (SELECT idpasien FROM pasien WHERE iduser = '{$id}')";
    //$hasil = mysqli_query($con, $sql);
	//$row = mysqli_fetch_array($hasil);
	
	
   }
	?>
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script> 	
    
<form id="form1" runat="server">
    <div id="printablediv" style="width: 100%; height: auto"> 
     <div class=" profile">
		<div class="profile-bottom">
        <?php if($_SESSION['alias'] == 'pasien'){  ?>
			<h3><i class="fa fa-user"></i>Cetak Antrian</h3>
			<div class="profile-bottom-top" align="center">
			
			<div class="col-md-8 profile-text" align="center">
				<h6><?php echo $row['nama']; ?></h6>
				<table align="center">
				<tr><td>Nomor Antrian</td>  
				<td>:</td>  
				<td><?php echo $row['nomor']; ?></td></tr>
				
                <tr><td>ID Pasien</td>  
				<td>:</td>  
				<td><?php echo $row['idpasien']; ?></td></tr>
				
				<tr>
				<td>Tanggal Berobat</td>
				<td> :</td>
				<td><?php echo $row['tgl_berobat']; ?></td>
				</tr>
                
				<tr>
				<td>Jam Layanan </td>
				<td>:</td>
				<td><?php echo $row['jam_layanan']; ?></td>
				</tr>
                
                <tr>
				<td>Jam Daftar </td>
				<td>:</td>
				<td><?php echo $row['jamdaftar']; ?></td>
				</tr>
                
                <tr>
				<td>Jam Kedatangan</td>
				<td> :</td>
				<td><?php echo $row['jam_kedatangan']; ?></td>
				</tr>
				<tr>
				<td>Jenis Penyakit</td>
				<td>:</td>
				<td><?php echo $row['jenispenyakit']; ?></td>
				</tr>
                
                <tr>
				<td>Analisis</td>
				<td> :</td>
				<td><?php echo $row['analisis']; ?></td>
				</tr>
                
				</table>
                
                
            <br>  


<p class="stdformbutton" align="left">
     &nbsp;&nbsp;&nbsp;<input type="button" value="Cetak" onClick="javascript:printDiv('printablediv')" />
</p>
     </div>	
      <div class="clearfix"></div>
   </div>
   </div>
   </div>
       </div>
            </form>       
  
             <?php } else {
		 echo '<meta http-equiv="refresh" content=1;url="error.php">';
		  } ?>
			<div class="clearfix"></div>
			
		
        
                   
			
	<!--//gallery-->
		<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->




        
</body>
  
</html>