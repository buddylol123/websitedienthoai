<?php
$sql = "SELECT * from donhang";
$sql1 = "SELECT * from khachhang";
?>
<table border="1">
	
	<tr>
		<td>Mã đơn</td>
		<td>Tên khách hàng</td>
		<td>Tên người giao</td>
		<td>Ngày giao</td>
		<td>Trạng thái</td>
		<td></td>
	</tr>
	<?php
		$dh = $obj->query("SELECT * from donhang, khachhang, admin where donhang.makh=khachhang.makh and donhang.manvgh=admin.manv and donhang.trangthai=2 GROUP BY ma ORDER BY tenkh DESC");
		$data = $dh ->fetchAll();
		foreach ($data as $key => $value) {
	?>
	<tr>
		<td><?php echo $value['ma']?></td>
		<td><?php echo $value['tenkh'] ?></td>
		<td><?php echo $value['tennv'] ?></td>
		<td><?php echo $value['ngaygiao'] ?></td>
		<td> 
		<?php 
			if($value['trangthai']==0){
				echo 'Đang chờ xử lý';
			}elseif($value['trangthai']==1){
				echo 'Đã duyệt';
			}elseif($value['trangthai']==2){
				echo 'Đang giao hàng';
			}elseif($value['trangthai']==3){
				echo 'Hoàn thành';
			}else{
				echo 'Đã hủy';
			}
			?>
        </td>
        <td>
        <a onclick="return window.confirm('Xác nhận hoàn thành giao hàng'); "href="xl_giaohang.php?ma=<?php echo($value['ma']) ?>">Hoàn thành</a>
        </td>
    <?php 
	}
	?>
	</tr>
</table>


