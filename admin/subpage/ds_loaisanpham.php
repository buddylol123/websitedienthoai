<table border="1">
	<tr>
		<td>Mã loại</td>
		<td>Tên loại</td>
		<td><a href="them_loaisanpham.php">Thêm loại sản phẩm</a></td>
	</tr>
	<?php
		$lsp = $obj->query("select * from loaisp");
		$data = $lsp ->fetchAll();
		foreach ($data as $key => $value) {
	?>
	<tr>
		<td><?php echo $value['maloai']?></td>
		<td><a href="phanloaisp.php?maloai=<?php echo $value['maloai'] ?>"><?php echo $value['tenloai'] ?></a></td>
		<td>
			<a href="capnhat_loaisanpham.php?maloai=<?php echo($value['maloai']) ?>" >Cập nhật </a>|
			<a onclick="return window.confirm('Bạn muốn xóa không');" href="xl_xoa_lsp.php?maloai=<?php echo($value['maloai']) ?>"> Xóa</a>
		</td>
	<?php 
	}
	?>
	</tr>
</table>


