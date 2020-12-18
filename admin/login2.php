<?php 
include ('subpage/connect.php');
$tennv= isset($_POST['tennv'])?$_POST['tennv']:'';
$manv= isset($_POST['manv'])?$_POST['manv']:'';
$admin= isset($_POST['admin'])?$_POST['admin']:'';
$matkhau= isset($_POST['matkhau'])?$_POST['matkhau']:'';

if (!isset($_SESSION)) session_start();
$sql = "SELECT * from admin where admin='$admin' and matkhau='$matkhau'";
$ad = $obj->query($sql);
$data = $ad->fetch();
if ($admin==$data['admin'] && $matkhau==$data['matkhau'])
{
    $_SESSION['admin']=$data['tennv'];
    $_SESSION['manv']=$data['manv'];
    $_SESSION['maquyen']=$data['maquyen'];

    header('location:index.php');exit;
}
header('location:login.php');
