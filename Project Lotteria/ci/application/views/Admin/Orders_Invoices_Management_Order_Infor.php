<html>
	<head>
		<title>Confirm order</title>
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
							<form class="form_area edit_order">
								<?php if(isset($del_infor)){ 
									foreach ($del_infor as $infor) {
										?>
								<div class="row">
									<div class="label">Customer's name</div>
									<div class="text"><?php echo $infor->Del_Name; ?></div>
								</div>
								<div class="row">
									<div class="label">Phone number</div>
									<div class="text"><?php echo $infor->Del_Phone; ?></div>
								</div>
								<div class="row">
									<div class="label">Email</div>
									<div class="text"><?php echo $infor->Del_Email; ?></div>
								</div>
								<div class="row">
									<div class="label">Address</div>
									<div class="text"><?php echo $infor->Del_Address; ?></div>
								</div>
								<div class="row combobox">
									<div class="label">Province</div>
									<div class="text"><?php echo $infor->Area_Name; ?></div>
								</div>
								<div class="row combobox">
									<div class="label">District/ city</div>
									<div class="text"><?php echo $infor->SA_Name; ?></div>
								</div>
								<div class="row">
									<div class="label">Status</div>
										<?php if(isset($order)) {
											foreach ($order as $row) {
												if((int) $row->Ord_Status > 0){
												?>
									<div class="text"><?php echo 'Confirmed!'; ?></div>
									<?php } 
									else {?>
									<div class="text"><?php echo 'Waiting for confirmation!'; ?></div>
									<?php }  ?>
								</div>
								<div class="row button">
									<a href="#confirm-dialog" class="task show_dialog">Confirm</a>
									<?php include 'page include/Dialog.php';?>
									<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/printInvoice/<?php echo $row->Ord_ID; ?>" class="task">Print</a>
									<a href="#" class="task">Edit</a>
								</div>
								<?php } } } }?>
							</form>
							<div class="form_area">
								<div class="head">Picked items</div>
								<div class="row">
									<div class="title_bar small">
										<div class="icon"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/ic_list.png"></div>
										<div class="title">Picked items</div>
									</div>
									<div class="table small">
										<div class="table_content">
											<table cellspacing="0" cellpadding="0">
												<tr class="head">
													<td>Meal's ID</td>
													<td>Meal's Name</td>
													<td>Quantities</td>
													<td>Cost</td>
												</tr>
												<?php if(isset($order_details)){
													$flag = 0;
													foreach ($order_details as $od) {
														if($flag%2 == 0){
												 ?>
												<tr>
													<td><?php echo ($flag+1); ?></td>
													<td><?php echo $od->M_Name; ?></td>
													<td><?php echo $od->OD_Quantities; ?></td>
													<td class="non_border_right">
														<?php echo (((int)$od->OD_Quantities)*((int)$od->M_Price)); ?>
													</td>
												</tr>
												<?php } 
														else{ 
												?>
												<tr class="odd">
													<td><?php echo ($flag+1); ?></td>
													<td><?php echo $od->M_Name; ?></td>
													<td><?php echo $od->OD_Quantities; ?></td>
													<td class="non_border_right">
														<?php echo (((int)$od->OD_Quantities)*((int)$od->M_Price)); ?>
													</td>
												</tr>
												<?php }
												$flag++;
												 } }?>
											</table>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="label">Total cost: </div>
									<div class="text">
										<?php if(isset($order)) {
											foreach ($order as $row) {
												?>
										<div class="number"><?php echo $row->Ord_Cost; ?></div>
										<?php } }?>
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