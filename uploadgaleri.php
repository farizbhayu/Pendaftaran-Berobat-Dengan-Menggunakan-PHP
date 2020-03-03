<?php
$id=$_POST['id'];
$kodedokter=$_GET['kodedokter'];
include("inc/config.php");
function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}
$num=mt_rand (1,10000);
$tmp = $_FILES["image_file"]["tmp_name"];
$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);

$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefromjpeg($tmp);
list($width,$height)=getimagesize($tmp);

$newwidth=800;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=200;
$newheight1=($height/$width)*$newwidth1;
$tmp2=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
imagecopyresampled($tmp2,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

$filename = "images/gallery/".$num.'_'.$_FILES['image_file']['name'];
$filename2 = "images/gallery/thumb/".$num.'_'.$_FILES['image_file']['name'];

imagejpeg($tmp,$filename,100);
imagejpeg($tmp2,$filename2,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp2);


$foto=$num.'_'.$_FILES['image_file']['name'];
$sql="update dokter set foto='$foto' where kodedokter='$id'";
$hasil=mysqli_query($sql);
$rec=mysqli_affected_rows();
if($rec>0){
	echo 'Database: Update Success!';
	

} else {
	echo $sql;
	echo '<p>Database: Update Failed!';
}

//move_uploaded_file ($tmp, 'images/'.$sFileName);
echo <<<EOF
<p>Your file: {$sFileName} has been successfully received.</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
EOF;
