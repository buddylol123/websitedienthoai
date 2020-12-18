<?php
if ($_SESSION['maquyen'] == 1) {
?>
<table border="1">
	
	<tr>
		<td>Mã nhân viên</td>
		<td>Tên nhân viên </td>
        <td>Email</td>
        <td>Mật khẩu</td>
        <td>Số điện thoại</td>
        <td>Địa chỉ</td>
        <td><a href="them_nhanvien.php">Thêm nhân viên</a></td>

	</tr>
	<?php
	
		$ad = $obj->query("select * from admin");
		$data = $ad->fetchAll();
		foreach ($data as $key => $value) {
	?>
	<tr>
		<td><ul><?php echo $value['manv']?></ul></td>
		<td><ul><?php echo $value['tennv'] ?></ul></td>
        <td><ul><?php echo $value['admin'] ?></ul></td>
        <td><ul><?php echo $value['matkhau'] ?></ul></td>
        <td><ul><?php echo $value['sodienthoai'] ?></ul></td>
        <td><ul><?php echo $value['diachi'] ?></ul></td>
		<td>
			<a href="capnhat_nhanvien.php?manv=<?php echo($value['manv']) ?>">Cập nhật </a> | 
			<a onclick="return window.confirm('Bạn muốn xóa không'); "href="xl_xoa_nv.php?manv=<?php echo($value['manv']) ?>"> Xóa</a>
		</td>

	<?php 
	}
	?>
	</tr>
</table>
<?php
}else{
?>
<p><h3>Bạn không có quyền truy cập</h3></p>
<?php
}
?>

