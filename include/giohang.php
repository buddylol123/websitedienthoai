<?php
date_default_timezone_set('asia/ho_chi_minh');
if(isset($_POST['themgiohang'])){
$masp =$_POST['masp'];
$tensp =$_POST['tensp'];
$hinh =$_POST['hinh'];
$gia =$_POST['gia'];
$soluong =$_POST['soluong'];
$sql_gh = mysqli_query($con,"SELECT * FROM giohang where masp='$masp'");
$count = mysqli_num_rows($sql_gh);
	if($count>0){
		$sl = mysqli_fetch_array($sql_gh);
		$soluong=$sl['soluong']+1;
		$sql_giohang = "UPDATE giohang set soluong='$soluong' where masp='$masp'";
	}else{
		$soluong=$soluong;
		$sql_giohang ="INSERT INTO giohang(masp,tensp,hinh,gia,soluong) values ('$masp','$tensp','$hinh','$gia','$soluong')";
	}
$insert = mysqli_query($con,$sql_giohang);
	}elseif (isset($_POST['capnhatsoluong'])) {
		$masp =$_POST['ma'];
		$soluong =$_POST['soluong'];
		for($i=0;$i<count($_POST['ma']);$i++){
 			$masp = $_POST['ma'][$i];
 			$soluong = $_POST['soluong'][$i];
 			$sql_capnhat =  mysqli_query($con,"UPDATE giohang set soluong='$soluong' where masp='$masp'");
 		}
	}elseif(isset($_GET['xoa'])){
 		$id = $_GET['xoa'];
 		$sql_delete = mysqli_query($con,"DELETE FROM giohang WHERE magiohang='$id'");
	}elseif (isset($_POST['dathang'])) {
	$khachhang_id = $_SESSION['makh'];
 	$mahang = rand(0,9999);
 	$ngaydat= Date('Y-m-d h:i:s');	
 	for($i=0; $i<count($_POST['thanhtoan_product_id']); $i++){
	 		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
			 $soluong = $_POST['thanhtoan_soluong'][$i];
			 $gia1 = $_POST['thanhtoan_gia'][$i];
			$sql_donhang = mysqli_query($con,"INSERT INTO donhang (masp, makh, soluong, gia, ma, ngaydat) values ('$sanpham_id','$khachhang_id','$soluong','$gia1','$mahang','$ngaydat')");	 		
			$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM giohang WHERE masp='$sanpham_id'");
 		}

	}
?>
<?php
$sql_giohang_select = mysqli_query($con,"SELECT * FROM giohang");
	$count_giohang_select = mysqli_num_rows($sql_giohang_select);
	if($count_giohang_select<1){
		echo'
		<br>
		<center><img height="15%" width="15%" src="./admin/resources/img/cart.png"></center>
		
		<h2><center>Không có sản phẩm trong giỏ hàng của bạn</center></h2>
		
		<br>';
	
	}else{
?>
<div class="privacy py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
		<span>G</span>iỏ
		<span>H</span>àng
		</h3>
		<?php
			if(!isset($_SESSION['khachhang'])){ 
		?>
		<h3>Vui lòng đăng nhập để thanh toán</h3>
		<?php
			} 
		?>
		<!-- //tittle heading -->
		<div class="checkout-right">
			<?php
				$sql_view = mysqli_query($con,"SELECT * FROM giohang ORDER BY masp desc");
			?>
			<div class="table-responsive">
				<form action="" method="post">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Thứ tự</th>
								<th>Sản phẩm</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>Thành tiền</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$tongtien=0;
							while($value = mysqli_fetch_array($sql_view)){
							$thanhtien = $value['soluong'] * $value['gia'];
							$tongtien+=$thanhtien;
							$i++;
							?>
							<tr class="rem1">
								<td class="invert"><?php echo $i ?></td>
								<td class="invert-image">
									<a href="single.html">
										<img  src="admin/resources/img/<?php echo $value['hinh'] ?>"alt=" ">
									</a>
								</td>
								<td class="invert">
									<input type="number" min="1" name="soluong[]" value="<?php echo $value['soluong'] ?>">
									<input type="hidden" name="ma[]" value="<?php echo $value['masp'] ?>">
									
								</td>
								<td class="invert"><?php echo $value['tensp'] ?></td>
								<td class="invert"><?php echo number_format($value['gia'] ).'VNĐ' ?></td>
								<td class="invert"><?php echo number_format($thanhtien).'VNĐ' ?></td>
								<td class="invert">
									<a href="?quanly=giohang&xoa=<?php echo $value['magiohang'] ?>" class="nav-link">Xóa</a>
								</td>
							</tr>
							
							<?php
							}
							?>
							<tr>
								<td colspan="7">Tổng tiền: <?php echo number_format($tongtien).'VNĐ' ?></td>
							</tr>
							<tr>
								<td colspan="7"><input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong">
								
								<?php 
								$sql_giohang_select = mysqli_query($con,"SELECT * FROM giohang");
								$count_giohang_select = mysqli_num_rows($sql_giohang_select);

								if(isset($_SESSION['khachhang']) && $count_giohang_select>0){
									while($row_1 = mysqli_fetch_array($sql_giohang_select)){
								?>
								
								<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['masp'] ?>">
								<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['soluong'] ?>">
								<input type="hidden" name="thanhtoan_gia[]" value="<?php echo $row_1['gia'] ?>">

								<?php 
								}
								?>
								<input type="submit" class="btn btn-primary" value="Thanh toán giỏ hàng" name="dathang">
								
								<?php
								} 
								?>
								
								</td>
							
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
		
		<!-- 
		<div class="checkout-left">
			<div class="address_form_agile mt-sm-5 mt-4">
				<h4 class="mb-sm-4 mb-3"></h4>
				<form action="" method="post" >
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls form-group">
									<input class="billing-address-name form-control" type="text" name="tenkh" placeholder="Họ tên" required="">
								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left form-group">
										<div class="controls">
											<input type="mail" class="form-control" placeholder="Email" name="Email" required="">
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right form-group">
										<div class="controls">
											<input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau" required="">
										</div>
									</div>
								</div>
								<div class="controls form-group">
									<input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" required="">
								</div>
							</div>
							<button class="submit check_out btn">Thanh toán</button>
						</div>
					</div>
				</form>
			</div>
		</div> -->
	</div>
</div>
<?php } ?>