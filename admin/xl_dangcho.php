<?php 
date_default_timezone_set('asia/ho_chi_minh');
include ('subpage/connect.php'); 
$ma = $_GET['ma']; 
$trangthai = $_POST['trangthai'];
$ngaygiao= Date('Y-m-d h:i:s');
$sql = "UPDATE donhang set trangthai='1'where ma='$ma'";   
echo($sql);
$T = $obj->query($sql);
header("location: donhang.php")
?>
