<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>Shopping Cart</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<!--Start Header-->
		<?php include'page include/Header.php';?>
		<!--End Header-->
		<div class="clr"></div>
		<!--Start Content-->
		<div class="content">
			<div class="banner">
				<div class="slide-stage" id="shopping_cart_banner">
					<div class="slide-image"><img src="<?php echo base_url();?>assets/image/Order/dn_5121.jpg"/></div>
					<div class="slide-image"><img src="<?php echo base_url();?>assets/image/Order/hn_2124.jpg"/></div>
					<div class="slide-image"><img src="<?php echo base_url();?>assets/image/Order/banner-dathang.jpg"/></div>
				</div>
				<div class="delivery_banner">
					<img src="<?php echo base_url();?>assets/image/Order/hotline.png">
					<div class="delivery_title">Thanh toán tiền khi nhận hàng</div>
				</div>
			</div>
			<div class="clr"></div>
			<div class="shopping_cart_area" id="shopping_cart_area">
				<?php 
						$current_quantities = 0;
						$total = 0;
						if(isset($list_items)){
				?>
				<div class="shopping_cart_title">Phần ăn đã chọn</div>
				<div class="field_title">
					<div id="item_name">Sản phẩm</div>
					<div id="description">Mô tả</div>
					<div id="quantities">Số lượng</div>
					<div id="cost">Giá tiền</div>
				</div>
				<?php
						foreach($list_items as $item){
							$current_quantities = (int) $_SESSION['shoppingcart'][(int) $item->M_ID];
							$total += $current_quantities*((int) $item->M_Price);
							if($current_quantities != 0){
				 ?>
				<div class="ordered_item">
					<div id="item_image">
						<a href="#<?php echo $item->M_ID?>" class="delete_item"><img src="<?php echo base_url();?>assets/image/Order/del-icon.png" class="delete"></a>
						<img src="<?php echo base_url();?>assets/<?php echo $item->M_Image ?>" class="image_detail">
					</div>
					<div id="item_description"><?php echo $item->M_Name?></div>
					<div class="item_quantities">
						<a href="#<?php echo $item->M_ID?>" class="less">-</a>
						<div class="curr_quantities"><?php echo $current_quantities; ?></div>
						<a href="#<?php echo $item->M_ID?>" class="more">+</a>
					</div>
					<div id="item_cost"><?php echo $item->M_Price ?></div>
				</div>
				<?php } } ?>
				<div class="total_cost">
					<div id="total_cost_currency">vnđ</div>
					<div id="total_cost_amount"><?php echo $total ?></div>
					<div id="total_cost_title">TỔNG CỘNG</div>
				</div>
				<a href="#submit_order" class="fill_information">ĐẶT HÀNG</a>
				<?php } ?>
			</div>
			<div class="customer_informations" id="submit_order">
				<div class="form_title">ĐẶT HÀNG TRỰC TUYẾN</div>
				<form method="post" class="online_shopping" action="<?php echo base_url();?>index.php/ShoppingCartController/checkout">
					<div class="infor_field">
						<div class="field_title">Họ và tên (*): </div><input type="text" name="txtName">
					</div>
					<div class="infor_field">
						<div class="field_title">Địa chỉ (*): </div><input type="text" name="txtAddress">
					</div>
					<div class="infor_field">
						<div class="field_title">Tỉnh/ Thành phố (*): </div> 
						<select class="BigArea" name="sltArea">
							<optgroup label="Tỉnh/ Thành Phố">
								<?php if(isset($list_areas)){
									$count = 0;
									foreach ($list_areas as $area) {
										if($count == 0){
								?>
								<option value="<?php echo $area->Area_ID?>" selected><?php echo $area->Area_Name?></option>
								<?php
										$count++;
								 	}
									else{
								?>
								<option value="<?php echo $area->Area_ID?>" ><?php echo $area->Area_Name?></option>
								<?php } } }?>
							</optgroup>
						</select>
						<div class="field_title" id="quan_huyen">Quận/ Huyện (*): </div>
						<select class="SubArea" name="sltSubArea">
							<optgroup label="Quận/ Huyện">
								<?php if(isset($sub_area)){
									$count = 0;
									foreach ($sub_area as $sa) {
										if($count == 0){
								?>
								<option value="<?php echo $sa->SA_ID?>" selected><?php echo $sa->SA_Name?></option>
								<?php
										$count++;
								 	}
									else{
								?>
								<option value="<?php echo $sa->SA_ID?>" ><?php echo $sa->SA_Name?></option>
								<?php } } }?>
							</optgroup>
						</select>
					</div>
					<div class="infor_field">
						<div class="field_title">Số điện thoại (*): </div> <input type="text" name="txtPhone">
					</div>
					<div class="infor_field">
						<div class="field_title">E-mail: </div> <input type="text" name="txtEmail">
					</div>
					<div class="infor_field">
						<div class="field_title">Mã số thành viên (nếu có): </div> <input type="text" name="txtmemberID">
					</div>
					<div class="infor_field">
						<div class="field_title" id="forced"> (*): thông tin bắt buộc </div>
					</div>
					<div class="infor_field">
						<input type="button" name="confirm_order_information" id="confirm" class="input_click" value="Xác Nhận">
						<input type="reset" name="reset_all_information" class="input_click" value="Hủy">
						<a href="#shopping_cart_area" id="review_shopping_cart">Xem lại giỏ hàng</a>
					</div>
					<div class="report">
						<div class="report_title">
							XÁC NHẬN THÔNG TIN ĐƠN HÀNG
							<div class="report_close" id="report_close">&times;</div>
						</div>
						<div class="title">THÔNG TIN KHÁCH HÀNG</div>
						<div class="customer_infor">
							<div class="field_title">Khách hàng</div>:<div class="field_detail customer_name">a</div>
						</div>
							<div class="customer_infor">
							<div class="field_title">Địa chỉ</div>:<div class="field_detail customer_address">b</div>
						</div>
							<div class="customer_infor">
							<div class="field_title">Số điện thoại</div>:<div class="field_detail customer_phone">c</div>
						</div>
						<div class="title">THÔNG TIN ĐƠN HÀNG</div>
						<div class="shopping_cart_infor">
							<div id="column_name">
								<div id="item_name">THÔNG TIN SẢN PHẨM</div>
								<div id="item_cost">ĐƠN GIÁ</div>
								<div id="item_quantities">SỐ LƯỢNG</div>
								<div id="total_cost">THÀNH TIỀN</div>
							</div>
							<?php $total = 0;
									if(isset($list_items)){
									$current_quantities = 0;
									foreach($list_items as $item){
										$current_quantities = (int) $_SESSION['shoppingcart'][(int) $item->M_ID];
										$total += $current_quantities*((int) $item->M_Price);
										if($current_quantities != 0){
							?>
							<div class="infor_row" id="<?php echo $item->M_ID; ?>">
								<div id="item_name"><?php echo $item->M_Name; ?></div>
								<div id="item_cost"><?php echo $item->M_Price; ?> đ</div>
								<div id="item_quantities"><?php echo $current_quantities; ?></div>
								<div id="total_cost"><?php echo $current_quantities*($item->M_Price); ?> đ</div>
							</div>
							<?php } } } ?>
						</div>
						<div class="clr"></div>
						<div class="payment">
							<div class="payment_currency">vnđ</div>
							<div class="payment_value"><i><?php echo $total; ?></i></div>
							<div class="payment_title">Tổng tiền đơn hàng</div>
						</div>
						<div class="confirm_area">
							<input type="submit" name="btnAction" value="Đồng ý đặt hàng">
							<input type="button" class="input_click" name="action" id="cancel_order" value="Hủy đơn hàng">
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--End Content-->
		<div class="clr"></div>
		<!--Start Footer-->
		<?php include'page include/Footer.php';?>
		<!--End Footer-->
	</body>
</html>