<?php 
include ('connect.php');
$maloai = $_GET['maloai']; 
$sql = "select * from loaisp where maloai = '". $maloai."' ";
$lsp = $obj->query($sql);
$data = $lsp->fetch();
?>

<form action="xl_capnhat_lsp.php" method="post">
	<table width="50%" border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>Mã loại sản phẩm</td>
			<td>
				<input readonly type="text" name="maloai" value="<?php echo ($data['maloai']); ?>">
			</td>
		</tr>
		<tr>
			<td>Tên loại sản phẩm</td>
			<td>
				<input type="text" name="tenloai" value="<?php echo ($data['tenloai']); ?>">
			</td>
		</tr>
		<tr>
            <td></td>
            <td>
                <input type="submit" name="capnhat" value="Cập nhật"/>
            </td>
        </tr>
	</table>
</form>


