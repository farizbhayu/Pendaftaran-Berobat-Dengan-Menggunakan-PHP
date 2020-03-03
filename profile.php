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
 	 <div class=" profile">

		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			
			<div class="col-md-8 profile-text">
				<h6><?php echo $row['nama']; ?></h6>
				<table>
				<tr><td>ID</td>  
				<td>:</td>  
				<td><?php echo $row['idpasien']; ?></td></tr>
				
				<tr>
				<td>Nama</td>
				<td> :</td>
				<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
				<td>No Identitas</td>
				<td> :</td>
				<td><?php echo $row['no_ktp']; ?></td>
				</tr>
				<tr>
				<td>Tanggal Lahir </td>
				<td>:</td>
				<td><?php echo $row['tgl_lahir']; ?></td>
				</tr>
                
                <tr>
				<td>Jenis Kelamin</td>
				<td> :</td>
				<td><?php echo $row['jk']; ?></td>
				</tr>
				<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $row['alamat']; ?></td>
				</tr>
                
                <tr>
				<td>Telepon</td>
				<td> :</td>
				<td><?php echo $row['telepon']; ?></td>
				</tr>
				<tr>
				<td>Umur</td>
				<td>:</td>
				<td><?php echo $row['umur']; ?></td>
				</tr>
                
                
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
		
			
	<!--//gallery-->
		<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->

</body>
</html>



