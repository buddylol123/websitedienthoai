<?php 
	if(!isset($_SESSION)){session_start();}
	include 'subpage/connect.php';
	$ma = isset($_GET['ma'])?$_GET['ma']:'';
	$nv_banhang = $_SESSION['manv'];
    $nv_giaohang = $_POST['giaohang'];
	$trangthai = $_POST["trangthai"];
	$sql = "UPDATE donhang SET manv='$nv_banhang', manvgh = '$nv_giaohang', trangthai='$trangthai' WHERE ma = '$ma'";	
	echo($sql);
	$T = $obj->query($sql);
    header("location:donhang.php");

 ?>
