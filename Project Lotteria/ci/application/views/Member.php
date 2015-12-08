<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>Member</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<div class="web_page">
			<!--Start Header-->
			<?php include'page include/Header.php';?>
			<!--End Header-->
			<div class="clr"></div>
			<!--Start Content-->
			<div class="content" id="member_register">
				<div class="out_1">
					<div class="out_2">
						<div class="title">ĐĂNG KÝ<br>NHẬN THẺ<br>THÀNH VIÊN
							<div class="note">Hiện tại, đang tạm ngưng chương trình đăng ký thẻ thành viên. Hãy quay lại sau để cập nhật thông tin mới nhất</div>
						</div>
						<form class="input_area" action="<?php echo base_url();?>index.php/AccountController/Register" method="post">
							<input type="text" class="infor_text" name="txtName" placeholder="Tên (*)">
							<div class="gender">
								Giới tính
								<div id="option">
									<input type="radio" id="option1" class="radio" name="rdGender" value="1" checked="checked">
									<label for="option1">Nam</label>
									<input type="radio" id="option2" class="radio" name="rdGender" value="0">
									<label for="option2">Nữ</label>
								</div>
							</div>
							<input type="text" class="infor_text" name="txtEmail" placeholder="Email">
							<input type="text" class="infor_text" name="txtPhone" placeholder="Số điện thoại (*)">
							<input type="date" class="infor_text" name="dtBirthday" placeholder="Ngày tháng năm sinh (*)">
							<input type="text" class="infor_text" name="txtAddress" placeholder="Địa chỉ (*)">
							<input type="text" class="infor_text" name="txtUsername" placeholder="Tên đăng nhập (*)">
							<input type="password" class="infor_text" name="txtPassword" placeholder="Mật khẩu (*)">
							<div class="send_option">Vui lòng lựa chọn
								<div id="option">
									<input type="radio" id="option1" class="radio" name="rdGetOption" value="1" checked="checked">
									<label for="option1">Nhận thẻ thành viên tại Lotteria gần nhất</label>
								</div>
								<div id="option">
									<input type="radio" id="option2" class="radio" name="rdGetOption" value="0">
									<label for="option2">Giao đến tận địa chỉ của khách hàng</label>
								</div>
							</div>
							<textarea class="infor_text" name="txtMessage" placeholder="Lời nhắn"></textarea>
							<input type="submit" name="btnSend" class="send_information" value="GỬI NGAY">
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