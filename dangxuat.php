<?php 
if (!isset($_SESSION)) session_start();
unset($_SESSION['khachhang']);
header('location:index.php');
