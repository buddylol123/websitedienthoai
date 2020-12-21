<?php 
	include 'subpage/connect.php';
	print_r($_POST);
	$madonhang = $_POST['madonhang'];
	$soluong = $_POST["soluong"];
	$sql = "UPDATE donhang SET soluong='$soluong' WHERE madonhang = '$madonhang'";

	echo($sql);
	$T = $obj->query($sql);
	header("location: donhang.php");
 ?>
