<?php
session_start();
include 'inc/config.php';
include 'inc/functions.php';
include 'inc/ceklogin.php';
//include 'header.php';
if(isset($_GET['mod'])){
	$mod=$_GET['mod'];
} else {
	$mod="";
}


if ($mod==""){
	$mod= 'modules/home/home';
} else {
	if (preg_match('/_/i', $mod)) {
		$modname=explode('_', $mod);
		$mod='modules/'.$modname[0].'/'.$mod;
	} else {
		$mod='modules/'.$mod.'/'.$mod;
	}
}
?>

<div class="mainwrapper">
    
    <?php
	//include 'topnav.php';
	//include 'leftmenu_'.$_SESSION['alias'].'.php';
	?>
    
  <?php
		if(!file_exists($mod.'.php')) {
			echo "Page not found";
		} else {
			include $mod.'.php';
		}
?>
    
</div><!--mainwrapper-->

</body>
</html>

            
