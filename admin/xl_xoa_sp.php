<?php 
include ('subpage/connect.php'); 
$masp = $_GET['masp']; 
$sql = "DELETE FROM sanpham where masp = '$masp'";   
echo($sql);
$T = $obj->query($sql);
header("location: sanpham.php")
?>
