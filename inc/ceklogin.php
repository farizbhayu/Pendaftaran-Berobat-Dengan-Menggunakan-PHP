<?php
$u=$_SESSION['suser'];
$p=$_SESSION['spass'];
$sql = "select * from login where username='$u' and password='$p'";
if(mysqli_num_rows(mysqli_query($con,$sql))==0) {
    echo '<meta http-equiv="refresh" content="2;url=login.php" />';
	die();
}
?>