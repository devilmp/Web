<html>
	<head>
		<title>Edit order</title>
		<?php include 'page include/head.php';?>
		<script type="text/javascript">
			$(function(){
				$('.area.orders_invoices_manager').attr('id', 'this');
				$('.page_name').append('<a href="#">Orders & Invoices Management</a>');
				$('.location .position').append("<div class='arrow'>></div><div class='page_name'>Order's infor</div>");
			});
		</script>
	</head>
	<body>
		<div class="body">
			<?php include'page include/Header.php';?>
			<?php include'page include/Side menu.php';?>
			<div class="work_area" id="meals_management">
				<div class="work_area home">
					<div class="task_area">
						<div class="area_title">Order's informations: </div>
						<div class="infor_area">
							<div class="form_area edit_order">
								<div class="row">
									<div class="label">Customer's name</div>
									<div class="input"><input type="text"></div>
								</div>
								<div class="row">
									<div class="label">Phone number</div>
									<div class="input"><input type="text"></div>
								</div>
								<div class="row">
									<div class="label">Email</div>
									<div class="input"><input type="text"></div>
								</div>
								<div class="row">
									<div class="label">Address</div>
									<div class="input"><input type="text"></div>
								</div>
								<div class="row combobox">
									<div class="label">Province</div>
									<div class="input">
										<select name="sltArea" class="cboGroup">
											<optgroup label="Select a province or city">
												<option>Hồ Chí Minh</option>
												<option>Đồng Nai</option>
												<option>Bình Dương</option>
												<option>Cần Thơ</option>
												<option>Đà nẵng</option>
												<option>Hà Nội</option>
												<option>Khánh Hòa</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="row combobox">
									<div class="label">District/ city</div>
									<div class="input">
										<select name="sltSub_Area" class="cboGroup">
											<optgroup label="Select a province or city">
												<option>Quận 1</option>
												<option>Biên Hòa</option>
												<option>Thủ dầu 1</option>
												<option>Cần Thơ</option>
												<option>Sơn Trà</option>
												<option>Ba Đình</option>
												<option>Nha Trang</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="row button">
									<input type="submit" class="excute left" value="Confirm">
									<input type="reset" class="excute" value="Cancel">
								</div>
							</div>
							<div class="form_area">
								<div class="head">Add more items</div>
								<div class="row">
									<div class="label">Meal</div>
									<div class="input">
										<select name="sltMeal" class="cboGroup">
											<optgroup label="Select a meal">
												<option>Finger Chicken (200 g)</option>
												<option>Big Star</option>
												<option>Bulgogi Burger</option>
												<option>Family Set (1)</option>
												<option>Gà Nuget</option>
												<option>Cơm</option>
												<option>Float Chanh</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="label">Quantities</div>
									<div class="input"><input type="text"></div>
								</div>
								<div class="row button"><input type="button" class="excute center" value="Add this item"></div>
								<div class="row">
									<div class="title_bar small">
										<div class="icon"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/ic_list.png"></div>
										<div class="title">Picked items</div>
										<a href="#" class="action" title="Delete"><img src="<?php echo base_url();?>assets/Admin/image/Work_area/ic_delete.png" width="16" height="16"></a>
									</div>
									<div class="table small">
										<div class="table_content">
											<table cellspacing="0" cellpadding="0">
												<tr class="head">
													<td class="small"><input type="checkbox"></td>
													<td>Meal's ID</td>
													<td>Meal's Name</td>
													<td>Quantities</td>
													<td class="change non_border_right">Task</td>
												</tr>
												<tr>
													<td class="small"><input type="checkbox" id="1"></td>
													<td>1</td>
													<td>Finger chicken (200 g)</td>
													<td>10</td>
													<td class="non_border_right">
														<div class="action">
															<a href="#" title="Delete" class="delete"></a>
														</div>
													</td>
												</tr>
												<tr class="odd">
													<td class="small"><input type="checkbox" id="1"></td>
													<td>1</td>
													<td>Finger chicken (200 g)</td>
													<td>10</td>
													<td class="non_border_right">
														<div class="action">
															<a href="#" title="Delete" class="delete"></a>
														</div>
													</td>
												</tr>
												<tr>
													<td class="small"><input type="checkbox" id="1"></td>
													<td>1</td>
													<td>Finger chicken (200 g)</td>
													<td>10</td>
													<td class="non_border_right">
														<div class="action">
															<a href="#" title="Delete" class="delete"></a>
														</div>
													</td>
												</tr>
												<tr class="odd">
													<td class="small"><input type="checkbox" id="1"></td>
													<td>1</td>
													<td>Finger chicken (200 g)</td>
													<td>10</td>
													<td class="non_border_right">
														<div class="action">
															<a href="#" title="Delete" class="delete"></a>
														</div>
													</td>
												</tr>
												<tr>
													<td class="small"><input type="checkbox" id="1"></td>
													<td>1</td>
													<td>Finger chicken (200 g)</td>
													<td>10</td>
													<td class="non_border_right">
														<div class="action">
															<a href="#" title="Delete" class="delete"></a>
														</div>
													</td>
												</tr>
												<tr class="odd">
													<td class="small"><input type="checkbox" id="1"></td>
													<td>1</td>
													<td>Finger chicken (200 g)</td>
													<td>10</td>
													<td class="non_border_right">
														<div class="action">
															<a href="#" title="Delete" class="delete"></a>
														</div>
													</td>
												</tr>
												<tr>
													<td class="small"><input type="checkbox" id="1"></td>
													<td>1</td>
													<td>Finger chicken (200 g)</td>
													<td>10</td>
													<td class="non_border_right">
														<div class="action">
															<a href="#" title="Delete" class="delete"></a>
														</div>
													</td>
												</tr>
												<tr class="non_border_bottom">
													<td class="small"><input type="checkbox" id="1"></td>
													<td>1</td>
													<td>Finger chicken (200 g)</td>
													<td>10</td>
													<td class="non_border_right">
														<div class="action">
															<a href="#" title="Delete" class="delete"></a>
														</div>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="label">Total cost: </div>
									<div class="text">
										<div class="number">1,000,000</div>
										<div class="currency">đ</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php if(isset($_SESSION)&&isset($_SESSION['announce'])){ ?>
			<div class="dialog" style="display:block;" id="confirm-dialog">
				<div class="announcement_title">Server announce</div>
				<div class="announcement"><?php echo $_SESSION['announce']; ?></div>
				<a href="#" style="margin-left: 130px;" class="close">Ok</a>
			</div>
			<div id="over" style="display: block;" ></div>
			<?php unset($_SESSION['announce']); } ?>
	</body>
</html>