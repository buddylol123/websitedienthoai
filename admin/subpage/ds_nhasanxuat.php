<?php
$sql = "select * from nhasx";
?>
<table border="1">
	
	<tr>
		<td>Mã loại </td>
		<td>Tên loại </td>
		<td>Xuất xứ</td>
		<td><a href="them_nhasanxuat.php">Thêm nhà sản xuất</a></td>

	</tr>
	<?php
		$tam = $obj->query("select * from nhasx");
		$data = $tam->fetchAll();
		foreach ($data as $key => $value) {
	?>
	<tr>
		<td><ul><?php echo $value['mansx']?></ul></td>
		<td><ul><?php echo $value['tennsx'] ?></ul></td>
		<td><ul><?php echo $value['xuatxu'] ?></ul></td>
		<td><a href="capnhat_nhasanxuat.php?mansx=<?php echo($value['mansx']) ?>">Cập nhật </a>|
			<a onclick="return window.confirm('Bạn muốn xóa không');" href="xl_xoa_nsx.php?mansx=<?php echo($value['mansx']) ?>"> Xóa</a>
		</td>

	<?php 
	}
	?>
	</tr>
</table>
