<table border="1">	
	<tr>
		<td>Mã sản phẩm</td>
		<td>Hình</td>
		<td>Tên sản phẩm</td>
		<td>Loại sản phẩm</td>
		<td>Nhà sản xuất</td>
		<td>Giá</td>
		<td><a href="them_sanpham.php">Thêm sản phẩm</a></td>
	</tr>
	<?php
		$sp = $obj->query("select * from sanpham, nhasx, loaisp where sanpham.mansx=nhasx.mansx and sanpham.maloai=loaisp.maloai");
		$data = $sp->fetchAll();
		foreach ($data as $key => $value) {
	?>
	<tr>
		<td><ul><?php echo $value['masp']?></ul></td>
		<td><ul><img src="resources/img/<?php echo $value['hinh'] ?>" alt="image" width="40" height="50" /></ul></td>
		<td><ul><?php echo $value['tensp'] ?></ul></td>
		<td><ul><?php echo $value['tenloai']?></ul></td>
		<td><ul><?php echo $value['tennsx']?></ul></td>
		<td><ul><?php echo number_format($value['gia']) ?></ul></td>
		<td>
			<a href="capnhat_sanpham.php?masp=<?php echo($value['masp']) ?>">Cập nhật </a> | 
			<a onclick="return window.confirm('Bạn muốn xóa không'); "href="xl_xoa_sp.php?masp=<?php echo($value['masp']) ?>"> Xóa</a>
		</td>
	<?php 
	}
	?>
	</tr>
</table>