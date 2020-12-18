<?php 
	include 'subpage/connect.php';
	print_r($_POST);
	$mansx = $_POST['mansx'];
	$tenNSX = $_POST["tennsx"];
	$xuatXu = $_POST["xuatxu"];
	$sql = "UPDATE nhasx SET mansx='$mansx', tennsx = '$tenNSX',xuatxu='$xuatXu' WHERE mansx = '$mansx'";

	echo($sql);
	$T = $obj->query($sql);
	header("location: nhasanxuat.php")
 ?>
