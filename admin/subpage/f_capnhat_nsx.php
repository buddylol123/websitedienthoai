<?php 
include ('connect.php'); 
$mansx = $_GET['mansx']; 
$sql = "select * from nhasx where mansx = '". $mansx."'";
$tam = $obj->query($sql); 
$data = $tam->fetch();   
?>

<form method="post" action="xl_capnhat_nsx.php">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Mã nhà sản xuất  </td>
            <td>
                <input readonly type="text" name="mansx" value="<?php echo($data['mansx']); ?>">
            </td>
        </tr>
        <tr>
            <td>Tên nhà sản xuất  </td>
            <td>
                <input type="text" name="tennsx" value="<?php echo($data['tennsx']); ?>">
            </td>
        </tr>
        <tr>
            <td>Xuất xứ</td>
            <td>
                <input type="text" name="xuatxu" value="<?php echo($data['xuatxu']); ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="capnhat_nsx" value="Cập nhật"/>
            </td>
        </tr>
    </table>
</form

xl_capnhat_nsx.php