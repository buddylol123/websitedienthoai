<?php 
include ('subpage/connect.php'); 
$maloai = $_GET['maloai']; 
$sql = "DELETE FROM `loaisp` where maloai = '". $maloai."'";   
echo($sql);
$T = $obj->query($sql);
header("location:loaisanpham.php")
?>
