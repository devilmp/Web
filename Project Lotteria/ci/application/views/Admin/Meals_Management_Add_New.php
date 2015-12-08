<html>
	<head>
		<title>New Meal</title>
		<?php include 'page include/head.php';?>
		<script type="text/javascript">
			$(function(){
				$('.area.meals_manager').attr('id', 'this');
				$('.page_name').append('<a href="#">Meals Management</a>');
				$('.location .position').append("<div class='arrow'>></div><div class='page_name'>Meal's Infor</div>");
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
						<form action="<?php echo base_url();?>index.php/Administrator/MealManagementController/InsertMeal" method="POST" 
									enctype="multipart/form-data" class="meal">
							<div class="area_title">Meal's informations: </div>
							<div class="meal_image">
								<div class="image">
									<img id="preview" src="<?php echo base_url();?>assets/image/Menu/Chicken/finger-chicken-200-g.png" width="348" height="351">
								</div>
								<div class="edit_image">
									<input type="file" class="fImage" name="fImage">
								</div>
							</div>
							<div class="meal_details">
								<div class="informations">
									<div class="meal_infor margin_right">
										<div class="group">
											<div class="details">
												<select name="sltGroup" class="cboGroup">
													<optgroup label="Select a group for this meal">
														<option value="1">HAMBURGER</option>
														<option value="2">TRÁNG MIỆNG</option>
														<option value="3">CƠM</option>
														<option value="4">COMBO</option>
														<option value="5">VALUE</option>
														<option value="6">GÀ</option>
														<option value="7">NƯỚC UỐNG</option>
														<option value="8">HAPPY MENU</option>
													</optgroup>
												</select>
											</div>
										</div>
										<div class="name add_new"><div class="details">Name: &nbsp;
											<input type="text" name="txtMeal_Name" value=""/></div></div>
										<div class="price">
											<div class="title">Price: </div>
											<div class="number"><input type="text" name="txtMeal_Price" value=""/></div>
											<div class="currency"> đ</div>
										</div>
									</div>
									<div class="meal_infor">
										<div class="stock">
											<div class="title">Stock: </div>
											<div class="number"><input type="text" name="txtMeal_Stock" value=""/></div>
										</div>
										<div class="description">
											<div class="description_title">Descriptions</div>
											<div class="content">
												<textarea name="txtMeal_Description"></textarea>
											</div>
										</div>
									</div>
									<div class="do_actions add_new">
										<div class="action">
											<a href="#confirm-dialog" class="task show_dialog">Confirm</a>
											<div class="dialog" id="confirm-dialog">
											<div class="announcement_title">Server announce</div>
												<div class="announcement">Are you sure to add this meal?</div>
												<input type="submit" name="btnConfirm" class="continue" value="Agree!">
												<a href="#" class="close">Disagree!</a>
											</div>
											<input type="button" name="btnCancel" class="cancel_button" value="Hủy"/>
										</div>
									</div>
								</div>
							</div>
						</form>
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
		</div>
	</body>
</html>