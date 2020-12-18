<?php 
include ('subpage/connect.php'); 
$mansx = $_GET['mansx']; 
$sql = "DELETE FROM nhasx where mansx = '$mansx' ";   
echo($sql);
$T = $obj->query($sql);
header("location: nhasanxuat.php")
?>
