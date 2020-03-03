<?php
	include 'inc/config.php';
    session_start();

	
?>
<?php
$id=$_SESSION['suserid'];    
$tanggal = date("Y-m-d");
	$sql = "SELECT * FROM daftarberobat Where idpasien IN (SELECT idpasien FROM pasien WHERE iduser = '{$id}') AND tgl_berobat = '$tanggal'  order by id desc limit 1000";
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
    
        <?php if($_SESSION['alias'] == 'pasien'){  ?>
 	  <?php
if(mysqli_num_rows($exc)>0) {?>

    
<form id="form1" runat="server">
    <div id="printablediv" style="width: 100%; height: auto"> 
     <div class=" profile">
		<div class="profile-bottom">
       
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
               	 <?php } else {?>
        
        
        <div class="content-top">
			<div class="content-top">
			  <div class="banner">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">Maaf hari ini anda belum mendaftar</h3>
              
              
			 <?php }?>    
            
                   <?php //<div class="col-md-12 form-group">
              //<button type="" class="btn btn-primary"  onClick="window.print()">Submit</button>
            
			//</div> ?>
           
             <?php } else {
		 echo '<meta http-equiv="refresh" content=1;url="error.php">';
		  } ?>
		
       
              
			
	<!--//gallery-->
		<!---->
<!--scrolling js-->
	<script src="../cetak/js/jquery.nicescroll.js"></script>
	<script src="../cetak/js/scripts.js"></script>
	<!--//scrolling js-->
   
                 
			<div class="clearfix"> </div>
	
          </section>
        </section>

