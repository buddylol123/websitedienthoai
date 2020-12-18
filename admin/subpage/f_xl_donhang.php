<?php
include ('connect.php');
$ma = $_GET["ma"];
$dh = "SELECT * FROM donhang, khachhang, sanpham WHERE donhang.masp=sanpham.masp AND khachhang.makh=donhang.makh AND donhang.ma='$ma' ";
$donhang = $obj->query($dh);
$data = $donhang->fetch();
$masp = $data["masp"];
$makh = $data["makh"];
$manv = $data['manv'];
$manvgh = $data['manvgh'];
$trangthai = $data['trangthai'];
?>

<h4>Thông tin khách hàng</h4>
<table>
	<tr>
		<td>Tên khách hàng: <?php echo($data['tenkh']); ?></td>
	</tr>
	<tr>
		<td>Số điện thoại: <?php echo($data['sodienthoai']); ?></td>
	</tr>
	<tr>
		<td>Địa chỉ: <?php echo($data['diachi']); ?></td>
	</tr>
	<tr>
		<td>Ngày đặt hàng: <?php echo($data['ngaydat']); ?></td>
	</tr>
	<tr>
		<td>Trạng thái:
			<?php
				if($data['trangthai']==0){
					echo 'Đang chờ xử lý';
				}elseif($data['trangthai']==1){
					echo 'Đã duyệt';
				}elseif($data['trangthai']==2){
					echo 'Đang giao hàng';
				}elseif($data['trangthai']==3){
					echo 'Hoàn thành';
				}else{
					echo 'Đã hủy';
				}
			?>
		</td>
	</tr>
</table>
<br>
<br>
<h4>Thông tin đơn hàng</h4>
<table>
	<tr>
		<th>Thứ tự</th>
		<th>Mã giao dịch</th>
		<th>Tên sản phẩm</th>
		<th>Số lượng</th>
		<th>Giá</th>
	</tr>
	<?php
	$i = 0;
	$tongtien=0;
	$dsdh = $obj->query("SELECT * from donhang, sanpham where donhang.masp=sanpham.masp and donhang.ma='$ma'");
	$data = $dsdh->fetchAll();
	foreach ($data as $key => $value) {
		$thanhtien=$value['soluong']*$value['gia'];
		$tongtien+=$thanhtien;
		$i++;
	?>
	<tr>
		<th><?php echo $i; ?></th>
		<th><?php echo $value  ['ma']; ?></th>
		<th><?php echo $value['tensp']; ?></th>
		<th><?php echo $value['soluong']; ?></th>
		<th><?php echo number_format($value['gia']); ?></th>
		<th><a href="suadonhang.php?madonhang=<?php echo($value['madonhang']) ?>">Sửa</a> |
		<a onclick="return window.confirm('Bạn muốn xóa không');" href="xl_xoa_dh.php?madonhang=<?php echo($value['madonhang']) ?>"> Xóa</a>
	</th>
</tr>
<?php
}
?>
</table>
<p class="right">Tổng tiền: <?php echo number_format($tongtien)?></p>

<fieldset>
<form action="xl_luu_donhang.php?ma=<?php echo $ma ?>" method="post">
	<p>
		<label>Nhân viên xác nhận đơn hàng</label>
		<input readonly class="text-input small-input" id="small-input" type="text" value="<?php echo($_SESSION['admin']);?>">
	</p>
	<p>
		<label>Nhân viên giao hàng</label>
		<?php
		$gh = $obj->query("SELECT * from admin where maquyen = 3");
		?>
		<select name="giaohang" class="small-input">
			<?php
			$data = $gh->fetchAll();
			foreach ($data as $key => $value) {
			if($manvgh == $value['manv']){
			?>
			<option selected value="<?php echo $value['manv'] ?>"><?php echo $value['tennv'] ?></option>
			<?php
				}else{
			?>
			<option value="<?php echo $value['manv'] ?>"><?php echo $value['tennv'] ?></option>
			<?php
			}
			}
			?>
		</select>
	</p>
	<p>
		<label>Trạng thái</label>
		<?php
		$tt = $obj->query("SELECT * from trangthai");
		?>
		<select name="trangthai">
			<?php
			$data = $tt->fetchAll();
			foreach ($data as $key => $value) {
			if($trangthai == $value['trangthai']){
			?>
			<option selected value="<?php echo $value['trangthai'] ?>"><?php echo $value['tentt'] ?></option>
			<?php
				}else{
			?>
			<option value="<?php echo $value['trangthai'] ?>"><?php echo $value['tentt'] ?></option>
			<?php
			}
			}
			?>
		</select>
	</p>
	<input class="button" name="donhang" type="submit" value="Lưu">
</form>
</fieldset>