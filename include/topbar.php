<?php
	//include('connect.php');
	if (isset($_POST['dangnhap'])){
		$email=$_POST['email_dn']?$_POST['email_dn']:'';
		$matkhau=$_POST['matkhau_dn']?$_POST['matkhau_dn']:'';
		if(!isset($_SESSION)) session_start();
		$sql_dn= mysqli_query($con,"select * from khachhang where email='$email' and matkhau='$matkhau'");
		$count = mysqli_num_rows($sql_dn);
		$value = mysqli_fetch_array($sql_dn);
		if ($count>0){
			$_SESSION['khachhang']=$value['tenkh'];
			$_SESSION['makh']=$value['makh'];
			header('Location:index.php');
		}
		else{
			echo '<script>alert("Tài khoản mật khẩu sai")</script>';


		}
	}elseif(isset($_POST['dangky'])){
		$name = $_POST['tenkh'];
	 	$phone = $_POST['sodienthoai'];
	 	$mail = $_POST['email'];
	 	$mk = $_POST['matkhau'];
	 	$address = $_POST['diachi'];
 		$sql_dk = mysqli_query($con,"INSERT INTO khachhang( tenkh, email, matkhau, sodienthoai, diachi) values ('$name','$mail','$mk','$phone','$address')");
 		header('Location:index.php');
	}
?>
<!-- top-header -->
<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">
						<i class="fas fa-shopping-cart ml-1"></i>
					</p> 
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<?php
						if(isset($_SESSION['khachhang'])){ 
						?>
						<li class="text-center border-right text-white">
							<a href="index.php?quanly=xemdonhang&makh=<?php echo $_SESSION['makh'] ?>" class="text-white">
								<i class="fas fa-truck mr-2"></i>Đơn hàng của bạn</a>
						</li>
						<li class="text-center border-right text-white">
							<a href="#" class="text-white">Xin chào, <br><?php echo $_SESSION['khachhang'] ?></a>
						</li>
						<li class="text-center text-white">
							<a href="dangxuat.php" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất</a>
						</li>

						<?php
						}else{
						?>
						<li class="text-center border-right text-white">
							
								<i class="fas fa-truck mr-2"></i>
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 0909999999
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
						</li>
						<?php
						}
						?>
						</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>
	
	<!-- Đăng nhặp -->
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Đăng nhập </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email_dn" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="matkhau_dn" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangnhap" value="Đăng nhập">
						</div>
						<p class="text-center dont-do mt-3">Bạn chưa có tài khoản?
							<a href="#" data-toggle="modal" data-target="#dangky">
								Đăng ký ngay</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Đăng ký -->
	<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Đăng ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Họ tên</label>
							<input type="text" class="form-control" placeholder=" " name="tenkh" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="matkhau" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Địa chỉ</label>
							<input type="text" class="form-control" placeholder=" " name="diachi" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Số điện thoại</label>
							<input type="text" class="form-control" placeholder=" " name="sodienthoai" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangky" value="Đăng ký">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.php" class="font-weight-bold font-italic">
							<img src="./admin/resources/img/logo-shop.png" width="50%" height="50%" alt=" " class="img-fluid">YH SHOP
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="index.php?quanly=timkiem" method="post">
								<input class="form-control mr-sm-2" name="tukhoa" type="search" placeholder="Bạn muốn tìm gì?" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" name="timkiem" type="submit">Tìm kiếm</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="?quanly=giohang" method="post" class="last">									
									<button class="btn w3view-cart" type="submit" name="giohang" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>