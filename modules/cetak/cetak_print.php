<?php
session_start();
include 'inc/config.php';
require("fpdf181/fpdf.php");
ob_end_clean();
ob_start();
$id=$_SESSION['suserid'];
$kode = $_GET['id'];    
$sql = "SELECT * FROM `daftarberobat` WHERE id = $kode";
///$sql1 = "SELECT * FROM nomor_antrian";
$result = mysqli_query($con,$sql);

//header kolom
$column_id = "";
$column_idpasien = "";
$column_nomor = "";
$column_nama = "";
$column_tgl_berobat = "";
$column_jam_layanan = "";
$column_jam_kedatangan = "";

while($row = mysqli_fetch_array($result)){
  $id = $row['id'];
  $idpasien = $row['idpasien'];
  $nomor = $row['nomor'];
  $nama = $row['nama'];
  $tgl_berobat = $row['tgl_berobat'];
  $jam_layanan = $row['jam_layanan'];
  $jam_kedatangan = $row['jam_kedatangan'];

  $column_id = $column_id.$id."\n";
  $column_idpasien = $column_idpasien.$idpasien."\n";
  $column_nomor = $column_nomor.$nomor."\n";
  $column_nama = $column_nama.$nama."\n";
  $column_tgl_berobat = $column_tgl_berobat.$tgl_berobat."\n";
  $column_jam_layanan = $column_jam_layanan.$jam_layanan."\n";
  $column_jam_kedatangan = $column_jam_kedatangan.$jam_kedatangan."\n";

  $pdf = new FPDF('L','mm',array(297,210)); // L = Landscape, P = Portrait
  $pdf->addPage();
  $pdf->SetFont('Arial','B','13');
  $pdf->Cell(125);
  $pdf->Cell(30,10,'Nomor Antrian',0,0,'C');
  $pdf->Ln();
  $pdf->Cell(125);
  $pdf->Cell(30,10,'Klinik Pratama Niatha',0,0,'C');
  $pdf->Ln();
}

  $Y_Fields_Name_position = 30;

  //Membuat nama field
  $pdf->SetFillColor(110,180,230);
  $pdf->SetFont('Arial','B','10');
  $pdf->SetY($Y_Fields_Name_position);
  $pdf->SetX(25); // 1
  $pdf->Cell(25,8,'ID',1,0,'C',1);
  $pdf->SetX(50); // 2
  $pdf->Cell(25,8,'ID Pasien',1,0,'C',1);
  $pdf->SetX(75); // 3
  $pdf->Cell(30,8,'Nomor Antrian',1,0,'C',1);
  $pdf->SetX(105); // 4
  $pdf->Cell(50,8,'Nama',1,0,'C',1);
  $pdf->SetX(155); // 5
  $pdf->Cell(30,8,'Tanggal Berobat',1,0,'C',1);
  $pdf->SetX(185); // 6
  $pdf->Cell(35,8,'Jam Layanan',1,0,'C',1);
  $pdf->SetX(220); // 7
  $pdf->Cell(35,8,'Jam Kedatangan',1,0,'C',1);
  

  $Y_Table_Position = 38; //Jarak posisi table dengan nama field

  //menampilkan isi kolom
  $pdf->SetFont('Arial','',10);

  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(25); // 1
  $pdf->MultiCell(25,6,$column_id,1,'C');

  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(50); // 2 = SetX(A)+Multicel(25)
  $pdf->MultiCell(25,6,$column_idpasien,1,'C');

  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(75); // 3
  $pdf->MultiCell(30,6,$column_nomor,1,'C');

  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(105); // 4
  $pdf->MultiCell(50,6,$column_nama,1,'C');

  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(155); // 5
  $pdf->MultiCell(30,6,$column_tgl_berobat,1,'C');

  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(185); // 6
  $pdf->MultiCell(35,6,$column_jam_layanan,1,'C');

  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(220); // 7
  $pdf->MultiCell(35,6,$column_jam_kedatangan,1,'C');

  $pdf->Output();
  ob_end_flush();

?>