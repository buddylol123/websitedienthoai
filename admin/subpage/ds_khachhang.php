<?php
$sql = "select * from khachhang";
?>
<table border="1">
	
	<tr>
		<td>Mã khách hàng</td>
		<td>Tên khách hàng </td>
        <td>Email</td>
        <td>Mật khẩu</td>
        <td>Số điện thoại</td>
        <td>Địa chỉ</td>
        <td></td>
	</tr>
	<?php
		$kh = $obj->query("select * from khachhang");
		$data = $kh->fetchAll();
		foreach ($data as $key => $value) {
	?>
	<tr>
		<td><ul><?php echo $value['makh']?></ul></td>
		<td><ul><?php echo $value['tenkh'] ?></ul></td>
        <td><ul><?php echo $value['email'] ?></ul></td>
        <td><ul><?php echo $value['matkhau'] ?></ul></td>
        <td><ul><?php echo $value['sodienthoai'] ?></ul></td>
        <td><ul><?php echo $value['diachi'] ?></ul></td>
		<td>
			<a href="capnhat_khachhang.php?makh=<?php echo($value['makh']) ?>" >Cập nhật </a>|
			<a onclick="return window.confirm('Bạn muốn xóa không');" href="xl_xoa_kh.php?makh=<?php echo($value['makh']) ?>"> Xóa</a>
		</td>

	<?php 
	}
	?>
	</tr>
</table>
