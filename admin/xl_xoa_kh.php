<?php 
include ('subpage/connect.php'); 
$makh = $_GET['makh']; 
$sql = "DELETE FROM khachhang where makh = '". $makh."'";   
echo($sql);
$T = $obj->query($sql);
header("location:khachhang.php")
?>
