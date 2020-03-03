<?php
$alias = $_SESSION['alias'];
if ($alias == 'pasien') {
	/*Start Backend of Pasien*/
	if ($_GET['modules'] == "home") {
		include "modules/home/home_pasien.php";
	}

	if ($_GET['modules'] == "pasien_detail") {
		include "modules/pasien/pasien_detail.php";
	}
	if ($_GET['modules'] == "daftar_berobat") {
		include "modules/daftar/daftar_berobat.php";
	}
	if ($_GET['modules'] == "cetak") {
		include "modules/cetak/cetak.php";
	}

	/*End Backend of Pasien*/
}


if ($alias == 'admin') {
	/*Start Backend of admin*/
	if ($_GET['modules'] == "home") {
		include "modules/home/home.php";
	}

	if ($_GET['modules'] == "datapasien_admin") {
		include "modules/datapasien/datapasien_admin.php";
	}
	if ($_GET['modules'] == "datapasien_edit") {
		include "modules/datapasien/datapasien_edit.php";
	}
	if ($_GET['modules'] == "datapasien_new") {
		include "modules/datapasien/datapasien_new.php";
	}
	
	if ($_GET['modules'] == "antrianberjalan") {
		include "modules/antrianberjalan/antrianberjalan.php";
	}
	if ($_GET['modules'] == "antrianberjalan_edit") {
		include "modules/antrianberjalan/antrianberjalan_edit.php";
	}
	
	if ($_GET['modules'] == "user") {
		include "modules/user/user.php";
	}
	if ($_GET['modules'] == "user_new") {
		include "modules/user/user_new.php";
	}
	if ($_GET['modules'] == "user_edit") {
		include "modules/user/user_edit.php";
	}
	if ($_GET['modules'] == "user_delete") {
		include "modules/user/user_delete.php";
	}
	
	if ($_GET['modules'] == "analisis") {
		include "modules/analisis/analisis.php";
	}
	/*End Backend of Admin*/
}


if ($alias == 'dokter') {
	/*Start Backend of Dokter*/
	if ($_GET['modules'] == "home") {
		include "modules/home/home_dokter.php";
	}

	if ($_GET['modules'] == "datapasien") {
		include "klinik/modules/datapasien/datapasien.php";
	}
	if ($_GET['modules'] == "datapasien_edit") {
		include "modules/datapasien/datapasien_edit.php";
	}
	if ($_GET['modules'] == "datapasien_new") {
		include "modules/datapasien/datapasien_new.php";
	}
	if ($_GET['modules'] == "datapasien_delete") {
		include "modules/datapasien/datapasien_delete.php";
	}
	
	if ($_GET['modules'] == "datapasien_detail") {
		include "modules/datapasien/datapasien_detail.php";
	}
	if ($_GET['modules'] == "datapasien_detailedit") {
		include "modules/datapasien/datapasien_detailedit.php";
	}
	
	if ($_GET['modules'] == "antrianberjalan") {
		include "modules/antrianberjalan/antrianberjalan.php";
	}
	if ($_GET['modules'] == "antrianberjalan_edit") {
		include "modules/antrianberjalan/antrianberjalan_edit.php";
	}
	
	if ($_GET['modules'] == "user") {
		include "modules/user/user.php";
	}
	if ($_GET['modules'] == "user_new") {
		include "modules/user/user_new.php";
	}
	if ($_GET['modules'] == "user_edit") {
		include "modules/user/user_edit.php";
	}
	if ($_GET['modules'] == "user_delete") {
		include "modules/user/user_delete.php";
	}
	
	if ($_GET['modules'] == "analisis") {
		include "modules/analisis/analisis.php";
	}
	/*End Backend of Dokter*/
}

?>
