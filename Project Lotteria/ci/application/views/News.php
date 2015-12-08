<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>News</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<!--Start Header-->
		<?php include'page include/Header.php';?>
		<!--End Header-->
		<div class="clr"></div>
		<!--Start Content-->
		<div class="content" id="lotteria_news">
			<div class="news_area">
				<div class="news_navigation">
					<div class="news">
						Tin Tức
						<a href="#" class="icon"></a>
					</div>
					<div class="kind_of_news">
						<a href="#">Hoạt động nội bộ</a><br>
						<a href="#">Hoạt động xã hội</a><br>
						<a href="#">Các hoạt động khác</a>
					</div>
					<div class="social_reference">
						<a href="#" id="facebook"></a>
						<a href="#" id="bird"></a>
						<a href="#" id="google"></a>
						<a href="#" id="twister"></a>
					</div>
				</div>
				<div class="articles">
					<div class="article">
						<div class="acrticle_group"><a href="">HOẠT ĐỘNG XÃ HỘI</a></div>
						<a href="Article.php" class="acrticle_title">CHUYẾN TỪ THIỆN CHO FANS FACEBOOK LOTTERIA KV HỒ CHÍ MINH 24.08.2014</a>
						<div class="article_time">
							<div class="time"></div>
							08/09/2014
						</div>
						<div class="article_image">
							<img src="<?php echo base_url();?>assets/image/News/news1.jpg" width="100%" height="100%">
						</div>
						<a href="Article.php" class="detail">Chi tiết</a>
					</div>
					<div class="article">
						<div class="acrticle_group"><a href="">HOẠT ĐỘNG NỘI BỘ</a></div>
						<a href="#" class="acrticle_title">LOTTERIA KHAI TRƯƠNG CỬA HÀNG THỨ 200</a>
						<div class="article_time">
							<div class="time"></div>
							08/09/2014
						</div>
						<div class="article_image">
							<img src="<?php echo base_url();?>assets/image/News/news2.jpg" width="100%" height="100%">
						</div>
						<a href="#" class="detail">Chi tiết</a>
					</div>
					<div class="article">
						<div class="acrticle_group"><a href="">HOẠT ĐỘNG NỘI BỘ</a></div>
						<a href="#" class="acrticle_title">LOTTERIA CAM KẾT KHÔNG SỬ DỤNG CÁC THỰC PHẨM CÓ XUẤT XỨ TỪ TRUNG QUỐC</a>
						<div class="article_time">
							<div class="time"></div>
							29/07/2014
						</div>
						<div class="article_image">
							<img src="<?php echo base_url();?>assets/image/News/news3.jpg" width="100%" height="100%">
						</div>
						<a href="#" class="detail">Chi tiết</a>
					</div>
					<div class="article">
						<div class="acrticle_group"><a href="">CÁC HOẠT ĐỘNG KHÁC</a></div>
						<a href="#" class="acrticle_title">CHƯƠNG TRÌNH MIỄN PHÍ BURGER</a>
						<div class="article_time">
							<div class="time"></div>
							07/07/2014
						</div>
						<div class="article_image">
							<img src="<?php echo base_url();?>assets/image/News/news4.jpg" width="100%" height="100%">
						</div>
						<a href="#" class="detail">Chi tiết</a>
					</div>
					<div class="article">
						<div class="acrticle_group"><a href="">CÁC HOẠT ĐỘNG KHÁC</a></div>
						<a href="#" class="acrticle_title">CHƯƠNG TRÌNH LÂU ĐÀI BURGER</a>
						<div class="article_time">
							<div class="time"></div>
							20/06/2014
						</div>
						<div class="article_image">
							<img src="<?php echo base_url();?>assets/image/News/news5.jpg" width="100%" height="100%">
						</div>
						<a href="#" class="detail">Chi tiết</a>
					</div>
					<div class="article">
						<div class="acrticle_group"><a href="">CÁC HOẠT ĐỘNG KHÁC</a></div>
						<a href="#" class="acrticle_title">LOTTERIA CHALLENGE CUP 2013</a>
						<div class="article_time">
							<div class="time"></div>
							20/06/2014
						</div>
						<div class="article_image">
							<img src="<?php echo base_url();?>assets/image/News/news6.jpg" width="100%" height="100%">
						</div>
						<a href="#" class="detail">Chi tiết</a>
					</div>
					<div class="article">
						<div class="acrticle_group"><a href="">HOẠT ĐỘNG XÃ HỘI</a></div>
						<a href="#" class="acrticle_title">CHUYẾN TỪ THIỆN CHO FANS FACEBOOK LOTTERIA HÀ NỘI</a>
						<div class="article_time">
							<div class="time"></div>
							02/06/2014
						</div>
						<div class="article_image">
							<img src="<?php echo base_url();?>assets/image/News/news7.jpg" width="100%" height="100%">
						</div>
						<a href="#" class="detail">Chi tiết</a>
					</div>
				</div>
			</div>
		</div>
		<!--End Content-->
		<div class="clr"></div>
		<!--Start Footer-->
		<?php include'page include/Footer.php';?>
		<!--End Footer-->
	</body>
</html>