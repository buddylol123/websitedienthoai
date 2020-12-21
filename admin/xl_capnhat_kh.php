<?php 
	include 'subpage/connect.php';
	
	$makh = $_POST['makh'];
    $tenkh = $_POST['tenkh'];
    $email =$_POST['email'];
    $matkhau =$_POST['matkhau'];
    $sodienthoai =$_POST['sodienthoai'];
    $diachi =$_POST['diachi'];
	$sql = "UPDATE khachhang SET tenkh = '$tenkh', email='$email', matkhau='$matkhau', sodienthoai='$sodienthoai', diachi='$diachi' WHERE  makh='$makh'";
	echo($sql);
	$T = $obj->query($sql);
	header("location: khachhang.php")
 ?>
