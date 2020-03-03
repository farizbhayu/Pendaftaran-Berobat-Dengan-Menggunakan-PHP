<?php	
	$id=$_SESSION['suserid'];    
	$sql2 = "SELECT * FROM pasien WHERE iduser = '{$id}'";
		$exc = mysqli_query($con,$sql2);
		$row = mysqli_fetch_array($exc);
?>

   <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
				
                    <li>
                        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li>
                   
                    
                    <li>
                        <a href="index.php?mod=pasien_detail&id=<?php echo $row['idpasien'];?>" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Rekam Medis</span></span></a>
                        
                    </li>
                    
                    <li>
                        <a href="index.php?mod=daftar_berobat" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Daftar Berobat</span></span></a>
                        
                    </li>
                    
                      <li>
                        <a href="index.php?mod=cetak1" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Bukti daftar berobat</span></span></a>
                        
                    </li>
                    
                       <li>
                        <a href="index.php?mod=faq" class=" hvr-bounce-to-right"> <i class="fa fa-question-circle nav_icon"></i> <span class="nav-label">FAQ</span></span></a>
                        
                    </li>
                    
					 <li>
                        <a href="login.php" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i> <span class="nav-label">Log Out</span></span></a>
                        
                    </li>
                    
                 
                    
                   
                </ul>
            </div>
			</div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
				</h2>
		    </div>