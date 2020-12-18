<?php
$sql = "select * from sanpham";
?>
<table border="1">
	
	<tr>
		<td>Mã sản phẩm</td>
		<td>Hình</td>
		<td>Tên sản phẩm</td>
		<td>Giá</td>
		<td></td>
	</tr>
	<?php
		$maloai= $_GET['maloai'];
		$tam = $obj->query("select * from sanpham where maloai='$maloai'");
		$data = $tam->fetchAll();
		foreach ($data as $key => $value) {
	?>
	<tr>
		<td><ul><?php echo $value['masp']?></ul></td>
		<td><ul><img src="resources/img/<?php echo $value['hinh'] ?>" alt="image" width="60" height="60" /></ul></td>
		<td><ul><?php echo $value['tensp'] ?></ul></td>
		<td><ul><?php echo number_format($value['gia']) ?></ul></td>
		<td><a href="#">Cập nhật </a>|
			<a href="#"> Xóa</a></td>
	<?php 
	}
	?>
	</tr>
</table>