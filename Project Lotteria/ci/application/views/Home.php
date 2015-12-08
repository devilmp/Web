<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>Lotteria</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<div clas="web_page">
			<!--Start Header-->
			<?php include'page include/Header.php';?>
			<!--End Header-->
			<div class="clr"></div>
			<!--Start Content-->
			<div class="content">
				<div class="slide-stage">
					<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/burger.jpg"/></div>
					<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/resource.jpg"/></div>
					<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/VN.jpg"/></div>
					<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/icecream.jpg"/></div>
				</div>
				<div class="view_options">
					<a href="#1" id="lanescape"><div class="lanescape"></div></a>
					<a href="#2" id="video"><div class="video"></div></a>
					<a href="#3" id="default"><div class="default"></div></a>
				</div>
				<div class="trans_box">
					<div class="area" id="first_area">
						<div class="area_title">THỰC ĐƠN</div>
						<div class="sub_area">
							<div class="area_detail"><a href="<?php echo base_url();?>index.php/Lotteria/Menu/Hamburger">Hamburger</a></div>
							<div class="area_detail"><a href="<?php echo base_url();?>index.php/Lotteria/Menu/Chicken">Gà</a></div>
							<div class="area_detail"><a href="<?php echo base_url();?>index.php/Lotteria/Menu/Rice">Cơm</a></div>
						</div>
						<div class="sub_area" id="sub_area1">
							<div class="area_detail"><a href="<?php echo base_url();?>index.php/Lotteria/Menu/Combo">Combo</a></div>
							<div class="area_detail"><a href="<?php echo base_url();?>index.php/Lotteria/Menu/Dessert">Tráng Miệng</a></div>
							<div class="area_detail"><a href="<?php echo base_url();?>index.php/Lotteria/Menu/Happy">Happy Menu</a></div>
						</div>
					</div>
					<div class="area">
						<div class="area_title">ĐẶT HÀNG</div>
						<div class="big_area" id="delivery"><div class="big">1800-8099</div>
							Miễn phí giao hàng
							<div class="area_image"></div>
						</div>
					</div>
					<div class="area">
						<div class="area_title">THÀNH VIÊN</div>
						<div class="big_area" id="member"><a href="">ĐĂNG KÝ THÀNH VIÊN ĐỂ NHẬN <br> NHIỀU ƯU ĐÃI</a>
							<div class="area_image"></div>
						</div>
					</div>
					<div class="area">
						<div class="area_title">TÌM CỬA HÀNG</div>
						<form class="position">
							<input type="text" name="position" id="pos" class="text" placeholder="    Bạn đang ở đâu?"/>
							<input type="submit" name="position" value="" class="click"/>
						</form>
					</div>
				</div>
			</div>
			<!--End Content-->
			<div class="clr"></div>
			<!--Start Footer-->
			<?php include'page include/Footer.php';?>
			<!--End Footer-->
		</div>
	</body>
</html>