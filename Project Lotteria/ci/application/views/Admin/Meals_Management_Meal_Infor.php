<html>
	<head>
		<title>Meal's informations</title>
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
						<div class="meal">
							<?php foreach ($meal_id as $key) {
									
							?>
							<div class="area_title">Meal's informations: </div>
							<div class="meal_image">
								<div class="image">
									<img src="<?php echo base_url();?>assets/<?php echo $key->M_Image?>" width="348" height="351">
								</div>
								<div class="edit_image"></div>
							</div>
							<div class="meal_details">
								<form action="<?php echo base_url();?>index.php/Administrator/MealManagementController/EditMeal/
									<?php echo $key->M_ID?>" method="post" class="informations">
									
									<div class="meal_infor margin_right">
										<div class="group"><div class="details"><?php echo $key->MG_Name?></div></div>
										<div class="name"><div class="details"><p><?php echo $key->M_Name?></p></div></div>
										<div class="price">
											<div class="title">Price: </div>
											<div class="number"><?php echo $key->M_Price?></div>
											<div class="currency"> đ</div>
										</div>
									</div>
									<div class="meal_infor">
										<div class="stock">
											<div class="title">Stock: </div>
											<div class="number"><?php echo $key->M_Stock?></div>
										</div>
										<div class="description">
											<div class="description_title">Descriptions</div>
											<div class="content"><p><?php echo $key->M_Description?></p></div>
										</div>
									</div>
									<div class="do_actions edit">
										<div class="action"><button class="edit">Edit</button></div>
										<?php $announce = 'Are you sure to update this meal?';
										include 'page include/DialogSubmit.php'; ?>
									</div>
								</form>
							</div>
							<?php }?>
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
		</div>
	</body>
</html>