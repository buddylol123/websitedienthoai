<?php 
include ('connect.php');
$makh = $_GET['makh']; 
$sql = "SELECT * from khachhang where makh = '". $makh."' ";
$lsp = $obj->query($sql);
$data = $lsp->fetch();
?>
<h4> Cập nhật thông tin khách hàng</h4>
<fieldset>
    <form method="post" action="xl_capnhat_kh.php" >
    <p>
        <label>Mã khách hàng</label>
        <input readonly class="text-input small-input" id="small-input" type="text" name="makh" value="<?php echo ($data['makh']); ?>">
    </p>
    <p>
            <label>Họ tên</label>
            <input readonly class="text-input small-input" id="small-input" type="text" name="tenkh" value="<?php echo ($data['tenkh']); ?>">
        </p>
        
        <p>
            <label>Email</label>
            <input class="text-input small-input" id="small-input" type="email" name="email" value="<?php echo ($data['email']); ?>">
        </p>
        <p>
            <label>Số điện thoại</label>
            <input class="text-input small-input" id="small-input" type="text" name="sodienthoai" value="<?php echo ($data['sodienthoai']); ?>" >
        </p>
        <p>
            <label>Mật khẩu</label>
            <input class="text-input small-input" id="small-input" type="text" name="matkhau" value="<?php echo ($data['matkhau']); ?>">
        </p>
        <p>
            <label>Địa chỉ</label>
            <input class="text-input small-input" id="small-input" type="text" name="diachi" value="<?php echo ($data['diachi']); ?>">
        </p>
        <p>
            <input class="button" type="submit" name="capnhat_kh" value="Cập nhật"/>
        </p>
    </form>
</fieldset>