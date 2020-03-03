<?php
session_start();
//if (!empty($_SESSION['alias'])) {
	//$alias = $_SESSION['alias'];
include 'inc/config.php';

include 'inc/functions.php';
include 'inc/ceklogin.php';
include 'header_'.$_SESSION['alias'].'.php';
if(isset($_GET['mod'])){
	$mod=$_GET['mod'];
} else {
	$mod="";
}
?>	

<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
       $('#load_content').load('home.php', 'home_pasien', 'home_dokter').fadeIn("fast");
    }, 10000); // refresh setiap 10000 milliseconds
    
</script>
<div id="load_content"></div>
<?php
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
<div id="responsecontainer">
</div>

<div class="mainwrapper">
    
    <?php
	include 'leftmenu_'.$_SESSION['alias'].'.php';
	?>
    
  <?php
		if(!file_exists($mod.'.php')) {
			echo "Page not found";
		} else {
			include $mod.'.php';
		}
?>
 
<?php include 'footer.php';?>   
</div><!--mainwrapper-->
</body>
</html>

            
