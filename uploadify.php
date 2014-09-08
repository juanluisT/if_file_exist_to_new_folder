<?php
echo $archivo = $_FILES['Filedata'];
 echo    $targetFolder = '/uploads'; // Relative to the root
 echo $targetPath = $targetFolder."/".$archivo;
/*if (file_exists($targetPath)) {
	echo  "exists";
} else {*/
// Define adestination
    $bd_host = "localhost";
	$bd_usuario = "root";
	$bd_password = "root";
	$bd_base = "calidad";
	$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error en la conexión a MsSql");
	mysql_select_db($bd_base, $con);
	$archivo = $_FILES['Filedata']['name'];
	/*
	$sql = "select * from photos where code='$archivo'";
	$per = mysql_query($sql);
	$num_rs_per = mysql_num_rows($per);
	if($num_rs_per == 0) { 
	*/
     $targetFolder = '/uploads'; // Relative to the root
     $targetPath = $_SERVER['DOCUMENT_ROOT'] ."/administrator/gestion_samples/photodrop". $targetFolder;
    $verifyToken = md5('unique_salt' . $_POST['timestamp']);
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	 $targetPath = $_SERVER['DOCUMENT_ROOT'] ."/administrator/gestion_samples/photodrop". $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','xls','xlsx'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
// insert into DB	
	$archivo=$_FILES['Filedata']['name'];
	$con=mysqli_connect("localhost","root","root","calidad");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $inserted_date=date("Y-m-d H:i:s");
  $inserted_by=$_SERVER['PHP_AUTH_USER'];
  $inserted_from=$_SERVER['REMOTE_ADDR']." & ".gethostbyaddr($_SERVER['REMOTE_ADDR']);	
$sql="INSERT INTO photos (code,inserted_date,inserted_by,inserted_from)
VALUES('$archivo','$inserted_date','$inserted_by','$inserted_from')";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
 "1 record added";
mysqli_close($con);

/// eror file type
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>
