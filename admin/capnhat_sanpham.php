<?php 
	include '../connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Trang quản trị</title>
		
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
		
	</head>
	
	<body><div id="body-wrapper">
		<div id="sidebar">
			<?php
				include 'menu.php';
			?>
		</div>
		
		<div id="main-content">
			
			<noscript>
			<div class="notification error png_bg">
				</noscript>
				
				<!-- Page Head -->
				
				<div class="clear"></div>
				<div class="content-box">
					
					<div class="content-box-header">
						<?php
						include 'subpage/contentbox.php';
						?>
					</div>
					<div class="content-box-content">
						
						<div class="tab-content default-tab" id="tab1">
							<?php
							include 'subpage/f_capnhat_sp.php';
							?>
						</div>
					</div>
					
				</div>
				
				
				<div id="footer">
					<small> <!-- Remove this notice or replace it with whatever you want -->
					&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Trang quản trị</a> | <a href="#">Top</a>
					</small>
				</div>
				
			</div>
			
		</div></body>
	</html>