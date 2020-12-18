<?php
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION['admin']))
	{
		header('location:login.php'); exit;
	}
?>

<?php
include ('subpage/connect.php');
$sql = "select * from admin";
$tam = $obj->query($sql);
$data = $tam->fetch();
?>

<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
<h1 id="sidebar-title"><a href="#">Quản trị viên</a></h1>
<!-- Logo (221px wide) -->
<a href="#"><img id="logo" src="resources/img/logo-shop-w.png" width="60%" height="60%" alt="Simpla Admin logo" /></a>
<!-- Sidebar Profile links -->

<div id="profile-links">

	<a><?php echo $_SESSION['admin'] ?></a><br>

	<a href="logout.php" title="Sign Out">Đăng xuất</a>
</div>
<ul id="main-nav">  <!-- Accordion Menu -->
<li>
	<a class="nav-top-item">Quản lý sản phẩm</a>
	<ul>
		<li><a href="sanpham.php">Sản phẩm</a></li>
		<li><a href="loaisanpham.php">Loại sản phẩm</a></li>
		<li><a href="nhasanxuat.php">Nhà sản xuất</a></li>
	</ul>
</li>
<li>
	<a class="nav-top-item">Quản lý đơn hàng</a>
	<ul>
		<li><a href="donhang.php">Danh sách đơn hàng</a></li>
		<li><a href="dangchoxuly.php">Đơn hàng đang chờ xử lý</a></li>
		<li><a href="daduyet.php">Đơn hàng đã duyệt</a></li>
		<li><a href="giaohang.php">Đơn hàng đang giao</a></li>
	</ul>
</li>
<li>
	<a href="khachhang.php" class="current">Quản lý khách hàng</a>
</li>	
<li>
	<a href="nhanvien.php" class="current">Quản lý nhân viên</a>
</li>
</ul> <!-- End #main-nav -->
</div>