<?php
include ('connect.php');
$sql = "select * from sanpham ";
$tam = $obj->query($sql);
$data = $tam->fetch();
?>
<h4>Thêm sản phẩm</h4>
<fieldset>
    <form method="post" action="xl_them_sp.php"  enctype="multipart/form-data">
        

        <p>
            <label>Hình</label>
            <input class="text-input small-input" id="small-input" type="file" name="hinh">
        </p>

        <p>
            <label>Tên sản phẩm</label>
            <input class="text-input small-input" id="small-input" type="text" name="tensp">
        </p>

        <p>
            <label>Loại sản phẩm</label>
            <?php
            $lsp = $obj->query("select * from loaisp");
            ?>
            <select name="loaisanpham" class="small-input">
                <option value="option1">Chọn loại sản phẩm</option>
                <?php
                    $data = $lsp->fetchAll();
                    foreach ($data as $key => $value) {
                ?>
                <option value="<?php echo $value['maloai'] ?>"><?php echo $value['tenloai'] ?></option>
                <?php
                }
                ?>
            </select>  
        </p>

        <p>
            <label>Nhà sản xuất</label>
            <?php
            $nsx = $obj->query("select * from nhasx");
            ?>
            <select name="nhasanxuat" class="small-input">
                <option value="option">Chọn nhà sản xuất</option>
                <?php
                    $data = $nsx->fetchAll();
                    foreach ($data as $key => $value) {
                ?>
                <option value="<?php echo $value['mansx'] ?>"><?php echo $value['tennsx'] ?></option>
                <?php
                }
                ?>
            </select>
        </p>
        
        <p>
            <label>Giá</label>
            <input class="text-input small-input" id="small-input" type="text" name="gia">
        </p>

        <p>
            <input class="button" type="submit" name="them_sp" value="Thêm"/>
        </p>
    </form>
</fieldset>