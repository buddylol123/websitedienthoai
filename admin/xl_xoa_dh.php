<?php 
include ('subpage/connect.php'); 
$madonhang = $_GET['madonhang']; 
$sql = "DELETE FROM donhang where madonhang = '". $madonhang."'";   
echo($sql);
$T = $obj->query($sql);
header("location:donhang.php")
?>
