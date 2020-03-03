<?php
// connect to db
$dbname='dbklinik';
$con = mysqli_connect('localhost', 'root', '',$dbname);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>