<?php 
	include 'subpage/connect.php';
	print_r($_POST);
	$maNSX = $_POST["mansx"];
	$tenNSX = $_POST["tennsx"];
	$xuatXu = $_POST["xuatxu"];
	$sql = "INSERT INTO nhasx (mansx, tennsx, xuatxu) VALUES ('$maNSX','$tenNSX','$xuatXu');";
	echo($sql);
	$T = $obj->query($sql);
	header("location:nhasanxuat.php")
 ?>