<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>Introduction</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<div class="web_page">
			<!--Start Header-->
			<?php include'page include/Header.php';?>
			<!--End Header-->
			<div class="clr"></div>
			<!--Start Content-->
			<div class="content">
				<div class="intro" id="lotteria_vietNam">
					<div class="slide-stage">
						<div class="slide-image"><img src="<?php echo base_url();?>assets/image/Intro/logo-about.jpg"/></div>
						<div class="slide-image"><img src="<?php echo base_url();?>assets/image/Intro/logo-about1.jpg"/></div>
					</div>
					<div class="intro_title">GIỚI THIỆU VỀ LOTTERIA VIỆT NAM</div>
					<div class="about_lotteria">
						<p><strong>Lotteria</strong> là chuỗi nhà hàng thức ăn nhanh trực thuộc tập đoàn Lotte – một trong năm tập đoàn lớn nhất Hàn Quốc.
						 Suốt 7 năm liền đứng vị trí số 1 về “Brand Power”, được cấp bởi “Korea Management Association”,
						 và được chọn là vị trí số 1 về năng lực cạnh tranh thương hiệu với danh hiệu “Brand Stock” 
						của cơ quan đánh giá giá trị thương hiệu.</p>

						<p>Trong suốt thời gian qua, Lotteria đã nỗ lực không ngừng để cung cấp cho khách hàng các dịch vụ chu đáo,
						 ân cần và không ngừng nghiên cứu để phát triển nền văn hóa ẩm thực tốt cho sức khoẻ. 
						Hơn nữa, để đảm bảo vệ sinh, an toàn thực phẩm và bảo vệ môi trường, Lotteria tự hào đạt được các chứng nhận quốc tế như: 
						</p>

						<p>- An toàn thực phẩm (RVA HACCP)<br>
						- Vệ sinh môi trường (ISO 14001)<br>
						- Chất lượng sản phẩm (ISO 9001)</p>
						<br>
						<p><strong>Lotteria</strong> có mặt tại thị trường Việt Nam từ năm 1998.
						Hiện nay, mang tầm vóc của doanh nghiệp quốc tế, Lotteria đang dẫn đầu ngành công nghiệp ăn uống quốc nội với
						 hơn 200 nhà hàng tại hơn 30 tỉnh/thành trên cả nước. Đây là kết quả của những nỗ lực không ngừng mà Lotteria đạt được.
						</p>
						</div>
				</div>
				<div class="intro" id="philosophy">
					<div class="top_philosophy"></div>
					<div class="body_philosophy">
						<div class="title_philosophy">Our Philosophy</div>
						<div class="content_philosophy">
							<div class="area_philosophy" id="quality">
								<div class="big">Quality</div>
								<div class="small">Top-quality product</div>
							</div>
							<div class="area_philosophy" id="clean_environment">
								<div class="big">Clean Environment</div>
								<div class="small">Neat and stylish store environment</div>
							</div>
							<div class="area_philosophy">
								<div class="big">Service</div>
								<div class="small">Smile, caring service and appreciating short but valuable moment customers</div>
							</div>
							<div class="area_philosophy">
								<div class="big">Time</div>
								<div class="small">Rapid service tolerating no wait time to customers</div>
							</div>
						</div>
						<div class="bottom_philosophy"></div>
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