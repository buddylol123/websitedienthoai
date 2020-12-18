<?php
include ('connect.php');
$sql = "SELECT * from admin ";
$tam = $obj->query($sql);
$data = $tam->fetch();
?>
<h4>Thêm nhân viên</h4>
<fieldset>
    <form method="post" action="xl_them_nv.php"  >
        

        <p>
            <label>Tên nhân viên</label>
            <input class="text-input small-input" id="small-input" type="text" name="tennv">
        </p>

        <p>
            <label>Email</label>
            <input class="text-input small-input" id="small-input" type="text" name="admin">
        </p>
        <p>
            <label>Mật khẩu</label>
            <input class="text-input small-input" id="small-input" type="text" name="matkhau">
        </p>
        <p>
            <label>Số điện thoại</label>
            <input class="text-input small-input" id="small-input" type="text" name="sodienthoai">
        </p>
        <p>
            <label>Dịa chỉ</label>
            <input class="text-input small-input" id="small-input" type="text" name="diachi">
        </p>
        <p>
            <label>Quyền truy cập</label>
            <?php
            $quyen = $obj->query("SELECT * from quyen");
            ?>
            <select name="maquyen" class="small-input">
                <option value="option1">Chọn quyền truy cập</option>
                <?php
                    $data = $quyen->fetchAll();
                    foreach ($data as $key => $value) {
                ?>
                <option value="<?php echo $value['maquyen'] ?>"><?php echo $value['Ten'] ?></option>
                <?php
                }
                ?>
            </select>  
        </p>
        <p>
            <input class="button" type="submit" name="them_nv" value="Thêm"/>
        </p>
    </form>
</fieldset>