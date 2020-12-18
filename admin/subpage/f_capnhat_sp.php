<?php
include ('connect.php');
$masp = $_GET["masp"];

$sql = "select * from sanpham where masp = '".$masp."' ";
$tam = $obj->query($sql);
$data = $tam->fetch();
$maloai = $data["maloai"];
$mansx = $data["mansx"];


?>

<h4>Cập nhật sản phẩm</h4>
<fieldset>
    <form method="post" action="xl_capnhat_sp.php" enctype="multipart/form-data">
        <p>
            <label>Mã sản phẩm</label>
            <input readonly class="text-input small-input" id="small-input" type="text" name="masp" value="<?php echo($data['masp']); ?>">
        </p>
        <p>
            <label>Hình</label>
            <input class="text-input small-input" id="small-input" type="file" name="hinh"><br>

        </p>
        <p>
            <label>Tên sản phẩm</label>
            <input class="text-input small-input" id="small-input" type="text" name="tensp" value="<?php echo($data['tensp']); ?>">
        </p>
        <p>
            <label>Giá</label>
            <input class="text-input small-input" id="small-input" type="text" name="gia" value="<?php echo($data['gia']); ?>">
        </p>
        <p>
            <label>Loại sản phẩm</label>
            <?php
            $lsp = $obj->query("select * from loaisp");
            ?>
            <select name="loaisanpham" class="small-input">
                <?php
                    $data = $lsp->fetchAll();
                    foreach ($data as $key => $value) {
                        if($maloai == $value['maloai']){
                ?>
                <option selected value="<?php echo $value['maloai'] ?>"><?php echo $value['tenloai'] ?></option>
                <?php 
					}else{
                ?>
                <option  value="<?php echo $value['maloai'] ?>"><?php echo $value['tenloai'] ?></option>

                <?php
                    }
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
                <?php
                    $data = $nsx->fetchAll();
                    foreach ($data as $key => $value) {
                        if($mansx == $value['mansx']){
                ?>
                <option selected value="<?php echo $value['mansx'] ?>"><?php echo $value['tennsx'] ?></option>
                <?php 
					}else{
                ?>
                <option value="<?php echo $value['mansx'] ?>"><?php echo $value['tennsx'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </p>
        <p>
            <input class="button" type="submit" name="capnhat_sp" value="Cập nhật"/>
        </p>
    </form>
</fieldset>