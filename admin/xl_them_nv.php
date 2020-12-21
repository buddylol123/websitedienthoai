<?php
	include 'subpage/connect.php';
?>
<?php
		$tennv = $_POST["tennv"];
		$admin = $_POST["admin"];
		$maquyen = $_POST['maquyen'];
		$matkhau = $_POST['matkhau'];
		$sodienthoai = $_POST['sodienthoai'];
		$diachi = $_POST['diachi'];
		$sql = "INSERT INTO admin (tennv, admin, maquyen, matkhau, sodienthoai, diachi) VALUES ( '$tennv', '$admin','$maquyen','$matkhau','$sodienthoai','$diachi');";
		echo($sql);
		$T = $obj->query($sql);
	
	header("location: nhanvien.php")
	
?>