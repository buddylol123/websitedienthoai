		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						
							<div class="row">
								<?php
								if(isset($_SESSION['khachhang'])){
									echo 'Đơn hàng : '.$_SESSION['khachhang'];
								} 
								?>
                            <div class="col-md-12">
								
								<?php
								if(isset($_GET['makh'])){
									$id_khachhang = $_GET['makh'];
								}else{
									$id_khachhang = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM donhang WHERE makh='$id_khachhang' GROUP BY ma"); 
								?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
					
										<th>Ngày đặt</th>
										<th>Quản lý</th>
										<th>Tình trạng</th>
										<!-- <th>Yêu cầu</th> -->
									</tr>
									<?php
									$i = 0;
									while($value  = mysqli_fetch_array($sql_select)){ 
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $value['ma']; ?></td>
										<td><?php echo $value['ngaydat'] ?></td>
										<td><a href="index.php?quanly=xemdonhang&makh=<?php echo $_SESSION['makh'] ?>&ma=<?php echo $value['ma'] ?>">Xem chi tiết</a></td>
										<td><?php 
											if($value['trangthai']==0){
												echo 'Đang chờ xử lý';
											}elseif($value['trangthai']==1){
												echo 'Đã duyệt';
											}elseif($value['trangthai']==2){
												echo 'Đang giao hàng';
											}elseif($value['trangthai']==3){
												echo 'Hoàn thành';
											}else{
												echo 'Đã hủy';
											}
											?>
										</td>		
									</tr>
									 <?php
									} 
									?> 
								</table>
							</div>
                            
                            <div class="col-md-12">
								<p>Chi tiết đơn hàng</p><br>
								<?php
								if(isset($_GET['ma'])){
									$madonhang = $_GET['ma'];
								}else{
									$madonhang = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM donhang, khachhang, sanpham WHERE donhang.masp=sanpham.masp AND khachhang.makh=donhang.makh AND donhang.ma='$madonhang' ORDER BY donhang.madonhang DESC"); 
								?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Ngày đặt</th>
										
									</tr>
									<?php
									$i = 0;
									while($row_donhang = mysqli_fetch_array($sql_select)){ 
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['ma']; ?></td>
									
										<td><?php echo $row_donhang['tensp']; ?></td>

										<td><?php echo $row_donhang['soluong']; ?></td>
										
										<td><?php echo $row_donhang['ngaydat'] ?></td>
									</tr>
									 <?php
									} 
									?> 
								</table>
							</div>
							</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
			</div>
		</div>
	