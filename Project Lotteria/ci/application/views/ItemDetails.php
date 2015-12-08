<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>Item's details</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<!--Start Header-->
		<?php include'page include/Header.php';?>
		<!--End Header-->
		<div class="clr"></div>
		<!--Start Content-->
		<div class="content">
			<div class="quick_nav">
				<a href="#">
					<div class="nav" id="order">
						<div class="img"></div>
						<div id="quantities">0</div>
					</div>
				</a>
				<a href="#">
					<div class="nav" id="ref">
						<div class="img"></div>
					</div>
				</a>
				<div class="hidden">
					<a href="#">
						<div class="nav" id="mail">
						</div>
					</a>
					<a href="#">
						<div class="nav" id="twitter">
						</div>
					</a>
					<a href="#">
						<div class="nav" id="google">
						</div>
					</a>
					<a href="#">
						<div class="nav" id="bird">
						</div>
					</a>
					<a href="#">
						<div class="nav" id="facebook">
						</div>
					</a>
				</div>
			</div>
			<div class="clr"></div>
			<div class="item_info">
				<img src="<?php echo base_url();?>assets/<?php echo $meal[0]->M_Image ?>">
				<div class="infor">
					<div class="group"><?php echo $meal[0]->MG_Name ?></div>
					<div class="back">Trở lại<a href="#back"></a></div>
					<div class="short_info">
						<div class="name"><p><?php echo $meal[0]->M_Name ?></p></div>
						<div class="price">Giá: <?php echo ($meal[0]->M_Price/1000) ?>,000 đ</div>
						<a href="#<?php echo $meal[0]->M_ID ?>" class="add_to_cart">CHỌN</a>
					</div>
					<div class="description">
						<div class="title">Giới thiệu</div>
						<div class="details">
							<?php echo $meal[0]->M_Description ?>
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
			<div class="suggest"><div class="suggest_title">GỢI Ý CHO BẠN</div></div>
			<div class="item">
				<a href="#5.1" class="item_detail">
					<img src="<?php echo base_url();?>assets/image/Menu/Value/bulgogi-value.png" width="234" height="232">
					<div class="item_name">BULGOGI VALUE</div>
					<div class="price">70,000 đ</div>
					<a href="#1" class="add_to_cart">CHỌN</a>
				</a>
			</div>
			<div class="item">
				<a href="#5.2" class="item_detail">
					<img src="<?php echo base_url();?>assets/image/Menu/Value/cheese-value.png" width="234" height="232">
					<div class="item_name">CHEESE VALUE</div>
					<div class="price">64,000 đ</div>
					<a href="#2" class="add_to_cart">CHỌN</a>
				</a>
			</div>
			<div class="item non_border">
				<a href="#5.3" class="item_detail">
					<img src="<?php echo base_url();?>assets/image/Menu/Value/grilled-chicken-value.png" width="234" height="232">
					<div class="item_name">GRILLED CHICKEN VALUE</div>
					<div class="price">72,000 đ</div>
					<a href="#3" class="add_to_cart">CHỌN</a>
				</a>
			</div>
		</div>
		<!--End Content-->
		<div class="clr"></div>
		<!--Start Footer-->
		<?php include'page include/Footer.php';?>
		<!--End Footer-->
	</body>
</html>