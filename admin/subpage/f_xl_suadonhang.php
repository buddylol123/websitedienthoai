<?php 
include ('connect.php'); 
$madonhang = $_GET['madonhang']; 
$sql = "SELECT * from donhang, sanpham where donhang.masp=sanpham.masp and madonhang = '".$madonhang."'";
$tam = $obj->query($sql); 
$data = $tam->fetch();   
?>

<form action="xl_sua_donhang.php" method="post">
    <table width="50%" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>Mã đơn hàng</td>
            <td>
                <input type="hidden" name="madonhang" value="<?php echo ($data['madonhang']); ?>">
                <input readonly type="text" name="ma" value="<?php echo ($data['ma']); ?>">
            </td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td>
                <input readonly type="text" name="tensp" value="<?php echo ($data['tensp']); ?>">
            </td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td>
                <input type="text" name="soluong" value="<?php echo ($data['soluong']); ?>">
            </td>
        </tr>
        <tr>
            <td>Giá</td>
            <td>
                <input readonly type="text" name="gia" value="<?php echo ($data['gia']); ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="sua" value="Sửa"/>
            </td>
        </tr>
    </table>
</form>



