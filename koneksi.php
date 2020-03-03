<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName	= "dbklinik";
mysqli_connect($host,$user,$password);
mysqli_select_db($dbName) or die ("Connect Failed !! : ".mysqli_error());
