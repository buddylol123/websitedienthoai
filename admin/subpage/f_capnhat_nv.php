<?php 
include ('connect.php'); 
$manv = $_GET['manv']; 
$sql = "SELECT * from admin where manv = '".$manv."'";
$tam = $obj->query($sql); 
$data = $tam->fetch();   
?>

<form method="post" action="xl_capnhat_nv.php">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Mã nhân viên</td>
            <td>
                <input readonly type="text" name="manv" value="<?php echo($data['manv']); ?>">
            </td>
        </tr>
        <tr>
            <td>Tên nhân viên</td>
            <td>
                <input type="text" name="tennv" value="<?php echo($data['tennv']); ?>">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="admin" value="<?php echo($data['admin']); ?>">
            </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td>
                <input type="text" name="matkhau" value="<?php echo($data['matkhau']); ?>">
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td>
                <input type="text" name="sodienthoai" value="<?php echo($data['sodienthoai']); ?>">
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input type="text" name="diachi" value="<?php echo($data['diachi']); ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="capnhat_nv" value="Cập nhật"/>
            </td>
        </tr>
    </table>
</form
