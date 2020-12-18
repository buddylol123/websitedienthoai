<?php 
	include 'subpage/connect.php';
	print_r($_POST);
	$maLOAI = $_POST["maloai"];
	$tenLOAI = $_POST["tenloai"];
	$sql = "INSERT INTO loaisp (maloai,tenloai) VALUES ('$maLOAI','$tenLOAI');";
	echo($sql);
	$T = $obj->query($sql);
	header("location: loaisanpham.php")
 ?>