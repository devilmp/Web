<html>
	<head>
		<title>Meals Management</title>
		<?php include 'page include/head.php';?>
		<script type="text/javascript">
			$(function(){
				$('.area.meals_manager').attr('id', 'this');
				$('.page_name').text('Meals Management');
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
						<div class="statistic">
							<div class="category red">
								<div class="statistic_summary">
									<div class="title">Meals Statistics</div>
									<div class="number">96 meals</div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">65</div>
										<div class="name">meals</div>
									</div>
									<div class="details">
										<div class="number">13</div>
										<div class="name">desserts and snacks</div>
									</div>
									<div class="details">
										<div class="number">18</div>
										<div class="name">drinks</div>
									</div>
								</div>
							</div>
							<div class="category green">
								<div class="statistic_summary">
									<div class="title">Top meal</div>
									<div class="name"><a href="#">Big star</a></div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">335</div>
										<div class="name">in current stock</div>
									</div>
									<div class="details">
										<div class="number">323</div>
										<div class="name">sold</div>
									</div>
									<div class="details">
										<div class="infor">Meal group: </div>
										<div class="name">Hambuger</div>
									</div>
								</div>
							</div>
							<div class="category blue" id="no_margin_right">
								<div class="statistic_summary">
									<div class="title">Newest meal</div>
									<div class="name"><a href="#">Finger Chicken (200 g)</a></div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">170</div>
										<div class="name">in stock</div>
									</div>
									<div class="details">
										<div class="number">20</div>
										<div class="name">sold</div>
									</div>
									<div class="details">
										<div class="number">150</div>
										<div class="name">remaining</div>
									</div>
								</div>
							</div>
						</div>
						<div class="divider" id="work_area_divider">
							<div class="inner_divider"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/divider_span.png"></div>
						</div>
						<form action="<?php echo base_url();?>index.php/Administrator/MealManagementController/Meal_delete" method="post"
						 class="main_category">
							<div class="title_bar">
								<div class="icon"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/ic_list.png"></div>
								<div class="title">Meals list</div>
								<a href="#" class="action" title="Config"><img src="<?php echo base_url();?>assets/Admin/image/Work_area/16_16/ic_settings.png"></a>
								<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/Meal_add" class="action" title="Add new meal"><img src="<?php echo base_url();?>assets/Admin/image/Work_area/16_16/ic_plus.png"></a>
								<a href="#confirm-dialog" class="task show_dialog" id="deletemulti">
									<img src="<?php echo base_url();?>assets/Admin/image/Work_area/ic_delete.png" 
									width="16" height="16">
								</a>
								<?php $announce = 'Are you sure to delete selected meal?';
										include 'page include/DialogSubmit.php'; ?>
							</div>
							<?php if(isset($list_meal)&&isset($_SESSION['currentMealPosition'])&&isset($numofMealPages)&&isset($offset)){
								$MealPageNumber = (int) $_SESSION['currentMealPosition'];
								$flag = 1;
								$startMealList = ($MealPageNumber - 1)*$offset + 1;
								$endMealList = $MealPageNumber*$offset;
								?>
							<div class="table">
								<?php if($numofMealPages > 0){ ?>
								<div class="table_content">
									<table cellspacing="0" cellpadding="0">
										<tr class="head">
											<td class="small"><input type="checkbox" class="checkAllMeal"></td>
											<td>Meal's name</td>
											<td>Meal Group</td>
											<td>Meal's cost</td>
											<td class="img">Image</td>
											<td >Stock</td>
											<td class="change non_border_right">Task</td>
										</tr>
										<?php
											foreach ($list_meal as $item) 
											{ 
												if($flag >= $startMealList && $flag <= $endMealList ){
													if($flag%2 == 0){
										?>
										<tr class="odd">
											<td class="small"><input type="checkbox" class="checkMeal" name="ckcMeal[]" value="<?php echo $item->M_ID?>"></td>
											<td><a href="#"><?php echo $item->M_Name?></a></td>
											<td><?php echo $item->MG_Name?></td>		
											<td><?php echo $item->M_Price?></td>
											<td><img src="<?php echo base_url();?>assets/<?php echo $item->M_Image ?>" width="66" height="66"></td>
											<td><?php echo $item->M_Stock?></td>
											<td>
												<div class="action">
													<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/
														DeleteMeal?id=<?php echo $item->M_ID?>" 
													title="Delete" class="delete">
													</a>
													<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/
														show_meal?id=<?php echo $item->M_ID?>" title="Edit" class="edit"></a>
												</div>
											</td>
										</tr>
										<?php }
										else{ ?>
										<tr>
											<td class="small"><input type="checkbox" class="checkMeal" name="ckcMeal[]" value="<?php echo $item->M_ID?>"></td>
											<td><a href="#"><?php echo $item->M_Name?></a></td>
											<td><?php echo $item->MG_Name?></td>		
											<td><?php echo $item->M_Price?></td>
											<td><img src="<?php echo base_url();?>assets/<?php echo $item->M_Image ?>" width="66" height="66"></td>
											<td><?php echo $item->M_Stock?></td>
											<td>
												<div class="action">
													<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/
														DeleteMeal?id=<?php echo $item->M_ID?>" 
													title="Delete" class="delete">
													</a>
													<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/
														show_meal?id=<?php echo $item->M_ID?>" title="Edit" class="edit"></a>
												</div>
											</td>
										</tr>
										<?php } } $flag++; }?>
									</table>
								</div>
								<?php } ?>
								<div class="pagination">
									<div class="pages">
										<?php if((int) $numofMealPages > 1){ 
											if($MealPageNumber==1) {
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/1"
										 class="page this">
											First</a>
										<?php } ?>
										<?php if($MealPageNumber > 1){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/
											1" class="page">
											First</a>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/
											<?php echo ((int) $MealPageNumber - 1);?>" class="page">Previous</a>
										<?php } ?>
											<?php
											for($i=1; $i<=(int) $numofMealPages; $i++){
												if($i == (int) $MealPageNumber){
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/
											<?php echo $i;?>" class="page this"><?php echo $i; ?></a>
										<?php } else{?>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/
											<?php echo $i;?>" class="page"><?php echo $i; ?></a>
										<?php } }?>
										<a href="#" class="page more">...</a>
										<?php if($MealPageNumber < $numofMealPages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/
											<?php echo ($MealPageNumber + 1);?>" class="page">Next</a>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/
											<?php echo $numofMealPages;?>" class="page">Last</a>
										<?php } ?>
										<?php if($MealPageNumber == $numofMealPages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/
											<?php echo $numofMealPages;?>" class="page this">Last</a>
										<?php } ?>
										<?php }
										else {?>
										<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController/listMeals/
											1" class="page this">1</a>
										<?php } } ?>
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