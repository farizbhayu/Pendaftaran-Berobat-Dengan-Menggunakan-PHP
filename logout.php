<?php
session_start();
include 'inc/config.php';

$_SESSION['suserid'] = null;
$_SESSION['suser'] = null;
$_SESSION['spass'] = null;
$_SESSION['srole'] = null;
$_SESSION['alias'] = null;

session_destroy();    
?>
<?php 
include 'header.php';
?>

<div class="mainwrapper">
    
<?php
  include 'topnav.php';
  include 'leftmenu.php';
?>    
    
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=<?php echo $modname;?>>"><?php echo ucwords($modname);?></a> <span class="separator"></span></li>  
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-key"></span></div>
            <div class="pagetitle">
                <h5>Logout Process</h5>
                <h1>Log Out</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
            
                <?php
                    $msg= '
          <div class="widget-content">
          <div class="alert alert-success">
          <button type"button" class="close" data-dismiss="alert">&times;</button>
          <i class"fa fa-ok-sign"></i><strong>Sukses!</strong>
          Berhasil. </div>';("Loggin Out...please wait");	
		 echo '<meta http-equiv="refresh" content="2;url=login.php" />';
                 
                    ?>

                
                
                
                
          <?php echo $msg; ?>    
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
    
</div><!--mainwrapper-->

</body>
</html>   