<?php
	include 'inc/config.php';
	session_start();
?>
<?php	
	$id=$_SESSION['suserid'];    
	$sql2 = "SELECT * FROM pasien WHERE iduser = '{$id}'";
		$exc = mysqli_query($con,$sql2);
		$row = mysqli_fetch_array($exc);
?>
<div class="header">
        <div class="logo">
        
                
            <a href="dashboard.html"></a>
        </div>
        <div class="headerinner">
        <ul class="headmenu">
          <div style="position:absolute; top:20px; left: 120px; color:#FFFFFF; z-index:3">
            
                        <div class="pagetitle">
                    <h2>Aplikasi Layanan Klinik</h2><h5>Klinik Pratama Niatha</h5>
                </div>
        	</div>
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="images/photos/thumb1.png" alt="" />
                        <div class="userinfo">
                            <h5><?php echo $row['nama'];?></small></h5>
                            <ul>
                                <li><a href="index.php?mod=pasien_edit&id=<?php echo $row['idpasien']; ?>">Edit Profile</a></li>
                                <li><a href="index.php?mod=pasien_password&id=<?php echo $row['iduser']; ?>">Ubah Password</a></li>
                                <li><a href="login.php">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>