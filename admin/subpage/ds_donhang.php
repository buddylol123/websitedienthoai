<?php
$sql = "SELECT * from donhang";
$sql1 = "SELECT * from khachhang"
?>
<table border="1">
	
	<tr>
		<td>Mã đơn</td>
		<td>Tên khách hàng</td>
		<td>Ngày đặt</td>
		<td>Trạng thái</td>
		<td></td>
	</tr>
	<?php
		$dh = $obj->query("SELECT * from donhang, khachhang, trangthai where donhang.trangthai=trangthai.trangthai and donhang.makh=khachhang.makh GROUP BY ma ORDER BY tenkh DESC");
		$data = $dh ->fetchAll();
		foreach ($data as $key => $value) {
	?>
	<tr>
		<td><?php echo $value['ma']?></td>
		<td><?php echo $value['tenkh'] ?></td>
		<td><?php echo $value['ngaydat'] ?></td>
		<td><?php echo $value['tentt'] ?></td>
		<?php
		if($value['trangthai'] == 3){
			?>
			<td>Đã hoàn thành</td>
			<?php
			 }elseif($value['trangthai'] == 4){
		?>
		<td>Đơn đã hủy</td>
		<?php
		}else{
		?>
		<td>
			<a href="xulydonhang.php?ma=<?php echo($value['ma']) ?>">Xử lý đơn</a> 
		</td>
	<?php 
		}
	}
	?>
	</tr>
</table>


