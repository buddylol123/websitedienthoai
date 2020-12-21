<?php 
	include 'subpage/connect.php';
	print_r($_POST);
	$manv = $_POST['manv'];
	$tennv = $_POST["tennv"];
    $admin = $_POST["admin"];
    $matkhau = $_POST["matkhau"];
    $sodienthoai = $_POST["sodienthoai"];
    $diachi = $_POST["diachi"];
	$sql = "UPDATE admin SET manv='$manv', tennv = '$tennv',admin='$admin',matkhau='$matkhau',sodienthoai='$sodienthoai',diachi='$diachi' WHERE manv = '$manv'";

	echo($sql);
	$T = $obj->query($sql);
	header("location: nhanvien.php")
 ?>
