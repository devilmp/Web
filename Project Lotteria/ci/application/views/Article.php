<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>Article</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<div class="web_page">
			<!--Start Header-->
			<?php include'page include/Header.php';?>
			<!--End Header-->
			<div class="clr"></div>
			<!--Start Content-->
			<div class="content" id="article_details">
				<div class="article_slide_image">
					<div class="group_article">
						<div class="group_article_title">Tin Tức</div>
						<a href="#" class="icon"></a>
					</div>
					<div class="article_slide">
						<div class="slide-stage">
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news1.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news2.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news3.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news4.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news5.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news6.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news7.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news8.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news9.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news10.jpg"/></div>
							<div class="slide-image" id="home_slider"><img src="<?php echo base_url();?>assets/image/News/News1/news11.jpg"/></div>
						</div>
					</div>
					<div class="slide-pager">
						<ul></ul>
					</div>
				</div>
				<div class="article_subject">
					<div class="article_name">CHUYẾN TỪ THIỆN CHO FANS FACEBOOK LOTTERIA KV HỒ CHÍ MINH 24.08.2014
						<br><div class="article_border"></div>
					</div>
					<div class="date_and_reference">
						<div class="article_date">08/08/2014</div>
						<div class="article_reference">
							<a href="#" id="facebook"></a>
							<a href="#" id="bird"></a>
							<a href="#" id="google"></a>
							<a href="#" id="twister"></a>
						</div>
					</div>
					<div class="article_content">
						Nối tiếp thành công của những chuyến đi từ thiện ý nghĩa trong năm 2012 và 2013 mà Lotteria đã tổ chức tại 3 KV HCM, Đà Nẵng, Hà Nội kết hợp Event offline của các bạn Fans trên FB đã thành công tốt đẹp trước đó.
						<br>
						Tiếp tục năm 2014, Lotteria đã gặp lại các Fans tích cực năng động tại Hà Nội vào ngày 1.6 và lần này là các bạn tình nguyện viên tại HCM hôm 24.08 vừa qua.
						<br>
						--------------------
						<br>
						Chủ đề Chương Trình "TRUNG THU RỘN RÀNG" 
						<br>
						Hai Hoạt động chính là chương trình từ thiện tại Trung Tâm Trẻ mồ côi Picasso và Party giao lưu các Fans tại cửa hàng Lotteria 
						<br>
						Mong muốn chia sẻ phần nào về tinh thần với những em thiếu nhi mồ côi có hoàn cảnh khó khăn đang sinh sống tại Trung Tâm Trẻ Mồ Côi mang đến cho các em sự quan tâm ấm áp, những nụ cười lạc quan gắn kết tự tin hơn qua những trò chơi vận động cùng anh chị, những món quà ý nghĩa nho nhỏ, đồng thời chương trình còn tạo ra một hoạt động ý nghĩa và thiết thực cho các bạn Fans trên Facebook Lotteria tại HCM cùng tham gia gắn kết giao lưu cùng nhau.
						<br>
						BTC thực sự cảm thấy rất vui vì cảm nhận được sự nhiệt tình, tích cực của tất cả các bạn tham gia, ai cũng mau chóng hòa nhập và hết mình để không khí luôn tràn ngập tiếng cười.
						<br>
						Đặc biệt là buổi party trưa và các trò chơi teambulding giao lưu khá sôi nổi và hào hứng buổi chiều tại công viên cùng nhiều phần quà kỉ niệm dành cho các bạn. 
						<br>
						Hi vọng các bạn sẽ không thể quên 1 ngày trải nghiệm cùng Lotteria hôm đó.
						<br>
						Hứa hẹn còn nhiều buổi offline tương tự dành cho các Fans trên Facebook Lotteria tham gia trong thời gian tới.
						<br>
						----------
						<br>
						Một Lần nữa Lotteria xin chân thành cảm ơn sự tham gia của các bạn và mong các bạn cũng luôn yêu và ủng hộ Lotteria 
					</div>
					<div class="other_articles">
						<a href="" id="prev"></a>
						<a href="" id="next"></a>
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