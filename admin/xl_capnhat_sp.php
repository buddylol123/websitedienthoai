<?php
	include 'subpage/connect.php';
?>
<?php
	if(isset($_POST['capnhat_sp'])){
		$masp = $_POST["masp"];
		$hinh = $_FILES["hinh"]["name"];
		$tensp = $_POST["tensp"];
		$gia = $_POST["gia"];
		$loaisanpham = $_POST['loaisanpham'];
		$nhasanxuat = $_POST['nhasanxuat'];
		$path = "./resources/img/";
		$hinh_tmp = $_FILES["hinh"]["tmp_name"];
		if($hinh==''){
			$sql = "UPDATE sanpham SET masp= '$masp', tensp = '$tensp', gia = '$gia',mansx='$nhasanxuat', maloai='$loaisanpham' WHERE masp = '$masp'";
		}
		else{
move_uploaded_file($hinh_tmp, $path.$hinh);
$ext=['image/bmp', 'image/jpeg', 'image/gif', 'image/png'];
if($_FILES['hinh']['error']==0)
{
if(!in_array($_FILES['hinh']['type'], $ext))
{
echo "Không phải hình ảnh"; exit;
}
$ten = $_FILES['hinh']['name'];
move_uploaded_file($_FILES['hinh']['tmp_name'], "image/$ten");
echo "<img src='image/$ten'>";
$sql = "UPDATE sanpham SET masp= '$masp', tensp = '$tensp', hinh= '$hinh', gia = '$gia',mansx='$nhasanxuat', maloai='$loaisanpham' WHERE masp = '$masp'";
}
		
		}
		echo($sql);
		$T = $obj->query($sql);
	}
	header("location:sanpham.php")
?>