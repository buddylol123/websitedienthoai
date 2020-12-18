<?php
    if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
		$sql_tk = mysqli_query($con,"SELECT * FROM sanpham WHERE tensp LIKE '%$tukhoa%'");
	}

?>
<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            </h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
							<?php
								while($value = mysqli_fetch_array($sql_tk)){
							?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img height="80%" width="80%" src="admin/resources/img/<?php echo $value['hinh'] ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $value['masp'] ?>" class="link-product-add-cart">Chi tiết</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?quanly=chitietsp&id=<?php echo $value['masp'] ?>"><?php echo $value['tensp'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($value['gia']) ?>VNĐ</span>
												<!-- <del>$280.00</del> -->
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
												<fieldset>
														<input type="hidden" name="masp" value="<?php echo $value['masp'] ?>" />
														<input type="hidden" name="tensp" value="<?php echo $value['tensp'] ?>" />
														<input type="hidden" name="hinh" value="<?php echo $value['hinh'] ?>" />
														<input type="hidden" name="gia" value="<?php echo $value['gia'] ?>" />
														<input type="hidden" name="soluong" value="1" />
														<input type="submit" name="themgiohang" value="Thêm vào giỏ hàng" class="button btn" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
                                </div>
								<?php
									}
								?>
										
							</div>
						</div>
						<!-- //first section -->

					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Hãng sản xuất</h3>
							<div class="w3l-range">
								<ul>
								<?php 
									$sql_nsx = mysqli_query($con,'SELECT * FROM nhasx');
									while($value = mysqli_fetch_array($sql_nsx)){
								?>
									<li>
										<a href="?quanly=sanphamhang&id=<?php echo $value['mansx'] ?>"><?php echo $value['tennsx'] ?></a>
									</li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
						
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->
