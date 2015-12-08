<html>
	<head>
		<title>Account Infor</title>
		<?php include 'page include/head.php';?>
		<script type="text/javascript">
			$(function(){
				$('.area.account_manager').attr('id', 'this');
				$('.page_name').append('<a href="#">Accounts Management</a>');
				$('.location .position').append("<div class='arrow'>></div><div class='page_name'>Account's infor</div>");
			    $('select.BigArea').change(function(event) {
			        var area_id = parseInt($(this).val());
			        $.ajax({
			            url: "<?php echo base_url();?>index.php/AreaController/viewSubAreas",
			            type: "post",
			            data: "id=" + area_id + "&task=view",
			            async: true,
			            success: function(result) {
			                $('select.SubArea').empty();
			                $('select.SubArea').html(result);
			            }
			        });
			    });
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
						<div class="area_title">Employee's informations: </div>
						<form action="<?php echo base_url();?>index.php/Administrator/AccountController/AccountInforPage" 
							method="post" class="infor_area">
							<div class="form_area edit_order">
								<div class="row">
									<div class="label">Employee's name</div>
									<div class="input"><input type="text" name="txtName"></div>
								</div>
								<div class="row">
									<div class="label">Birthday</div>
									<div class="input"><input type="date" name="dtBirthday"></div>
								</div>
								<div class="row">
									<div class="label">Gender</div>
									<div class="input">
										<select name="sltGender">
											<option value="0">Nữ</option>
											<option value="1">Nam</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="label">Phone number</div>
									<div class="input"><input type="text" name="txtPhone"></div>
								</div>
								<div class="row">
									<div class="label">Address</div>
									<div class="input"><input type="text" name="txtAddress"></div>
								</div>
								<div class="row combobox">
									<div class="label">Province</div>
									<div class="input">
										<?php if(isset($areas)){ ?>
										<select name="sltArea" class="BigArea">
											<optgroup label="Select a province or city">
												<?php foreach ($areas as $area) {
													?>
												<option value="<?php echo $area->Area_ID; ?>"><?php echo $area->Area_Name; ?></option>
												<?php } ?>
											</optgroup>
										</select>
										<?php } ?>
									</div>
								</div>
								<div class="row combobox">
									<div class="label">District/ city</div>
									<div class="input">
										<?php if(isset($sub_areas)){ ?>
										<select name="sltSubArea" class="SubArea">
											<optgroup label="Select a province or city">
												<?php foreach ($sub_areas as $sa) {
													?>
												<option value="<?php echo $sa->SA_ID; ?>"><?php echo $sa->SA_Name; ?></option>
												<?php } ?>
											</optgroup>
										</select>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="form_area">
								<div class="head">Account's infor</div>
								<div class="row">
									<div class="label">Username</div>
									<div class="input"><input type="text" name="txtUsername"></div>
								</div>
								<div class="row">
									<div class="label">Password</div>
									<div class="input"><input type="password" name="txtPassword"></div>
								</div>
								<div class="row">
									<div class="label">User's role</div>
									<div class="input">
										<?php if(isset($user_role)){ ?>
										<select name="sltRole" class="cboRole">
											<optgroup label="Grant a privilege for this user">
												<?php foreach ($user_role as $role) {
													?>
												<option value="<?php echo $role->UR_ID; ?>"><?php echo $role->UR_Name; ?></option>
												<?php } ?>
											</optgroup>
										</select>
										<?php } ?>
									</div>
								</div>
								<div class="row button">
									<a href="#confirm-dialog" class="task show_dialog">Confirm</a>
									<div class="dialog" id="confirm-dialog">
									<div class="announcement_title">Server announce</div>
										<div class="announcement">Are you sure to add this employee?</div>
										<input type="submit" name="btnConfirm" class="continue" value="Agree!">
										<a href="#" class="close">Disagree!</a>
									</div>
									<a href="#" class="task">Cancel</a>
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