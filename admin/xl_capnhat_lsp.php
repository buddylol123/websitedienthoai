<?php 
	include 'subpage/connect.php';
	print_r($_POST);
	$maloai = $_POST['maloai'];
	$tenloai = $_POST["tenloai"];
	$sql = "UPDATE loaisp SET maloai='$maloai', tenloai = '$tenloai' WHERE maloai = '$maloai'";

	echo($sql);
	$T = $obj->query($sql);
	header("location: loaisanpham.php")
 ?>
