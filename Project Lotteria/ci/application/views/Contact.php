<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>Contact</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<div class="web_page">
			<!--Start Header-->
			<?php include'page include/Header.php';?>
			<!--End Header-->
			<div class="clr"></div>
			<!--Start Content-->
			<div class="content" id="contact_area">
				<div class="contact" id="contact_title">
					<div class="address">
						<div class="company_name">VIETNAM LOTTERIA CO.,LTD</div>
						Tầng 7, Tòa nhà SÀI GÒN PARAGON<br>
						03 Nguyễn Lương Bằng, P.Tân Phú, Quận 7, Thành phố Hồ Chí Minh<br>
						Tel : (84-8) 5416 1072 ~ 79<br>
						Fax: (84-8) 5416 1080 ~ 81<br>
						Email: marketing@lotteria.vn
					</div>
				</div>
				<div class="contact" id="contact_input">
					<form class="input_area">
						<input type="text" class="infor_text" placeholder="Tên (*)">
						<input type="text" class="infor_text" placeholder="Email (*)">
						<input type="text" class="infor_text" placeholder="Số điện thoại (*)">
						<input type="text" class="infor_text" placeholder="Địa chỉ (*)">
						<textarea class="infor_text" placeholder="Lời nhắn"></textarea>
						<input type="submit" class="send_information" value="GỬI NGAY">
					</form>
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