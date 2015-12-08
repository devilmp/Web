<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title><?php echo $group_name; ?></title>
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
				<div class="banner" id="banner_<?php echo strtolower($group_name); ?>">
					<?php $image_count = 1;
					if(isset($list_image_ui)){
					 foreach ($list_image_ui as $image) {
						
					
					?>
					<img src="<?php echo base_url();?>assets/<?php echo $image->MGUI_Image?>" id="<?php echo strtolower($group_name).'_0'.$image_count ?>">
					<?php
						$image_count++;
					 } }
					?>
				</div>
				<div class="clr"></div>
					<?php include'page include/Quick Navigator.php';?>
				<div class="clr"></div>
				<?php $count = count($list_meals);
						$flag = 1;
				 foreach($list_meals as $meal){

				 	if($flag < $count && $flag % 3 != 0){
				?>
				<div class="item">
					<a href="<?php echo base_url();?>index.php/Lotteria/MealDetails/<?php echo $meal->M_ID ?>" class="item_detail">
						<img src="<?php echo base_url();?>assets/<?php echo $meal->M_Image ?>" width="234" height="232">
						<div class="item_name"><?php echo $meal->M_Name ?></div>
						<div class="price"><?php echo ($meal->M_Price/1000) ?>,000 đ</div>
						<a href="#<?php echo $meal->M_ID ?>" class="add_to_cart">CHỌN</a>
					</a>
				</div>
				<?php
						} 
						else{

				?>
				<div class="item non_border">
					<a href="<?php echo base_url();?>index.php/Lotteria/MealDetails/<?php echo $meal->M_ID ?>" class="item_detail">
						<img src="<?php echo base_url();?>assets/<?php echo $meal->M_Image ?>" width="234" height="232">
						<div class="item_name"><?php echo $meal->M_Name ?></div>
						<div class="price"><?php echo ($meal->M_Price/1000) ?>,000 đ</div>
						<a href="#<?php echo $meal->M_ID ?>" class="add_to_cart">CHỌN</a>
					</a>
				</div>
				<?php }
				 	$flag++;
				 }?>
			</div>
			<!--End Content-->
			<div class="clr"></div>
			<!--Start Footer-->
			<?php include'page include/Footer.php';?>
			<!--End Footer-->
		</div>
	</body>
</html>