<html>
	<head>
		<title>Orders & Invoices Management</title>
		<?php include 'page include/head.php';?>
		<script type="text/javascript">
			$(function(){
				$('.area.orders_invoices_manager').attr('id', 'this');
				$('.page_name').text('Orders & Invoices Management');
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
									<div class="title">Orders Statistics</div>
									<div class="number">770</div>
									<div class="title">orders in this month</div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">150</div>
										<div class="name">new</div>
									</div>
									<div class="details">
										<div class="number">503</div>
										<div class="name">confirmed</div>
									</div>
									<div class="details">
										<div class="number">422</div>
										<div class="name">paid</div>
									</div>
									<div class="details">
										<div class="number">81</div>
										<div class="name">on deliver</div>
									</div>
									<div class="details">
										<div class="number">117</div>
										<div class="name">aborted</div>
									</div>
								</div>
							</div>
							<div class="category green">
								<div class="statistic_summary">
									<div class="title">Top order</div>
									<div class="title">Order-number: </div>
									<div class="name"><a href="#">465</a></div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">1.560.000</div>
										<div class="name">VND</div>
									</div>
									<div class="details">
										<div class="number">14</div>
										<div class="name">items</div>
									</div>
									<div class="details">
										<div class="number">125</div>
										<div class="name">number of items</div>
									</div>
									<div class="details">
										<div class="infor">Customer: </div>
										<div class="name"><a href="#">Miku</a></div>
									</div>
								</div>
							</div>
							<div class="category blue" id="no_margin_right">
								<div class="statistic_summary">
									<div class="title">Monthly comparison</div>
									<div class="name">1,475,687,000</div>
									<div class="title">VND sales in this month</div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">1,650,000</div>
										<div class="name">VND decrease</div>
									</div>
									<div class="details">
										<div class="number">780</div>
										<div class="name">items were sold</div>
									</div>
									<div class="details">
										<div class="infor">Top customer: </div>
										<div class="name"><a href="#">Miku</a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="divider" id="work_area_divider">
							<div class="inner_divider"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/divider_span.png"></div>
						</div>
						<form action="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/DeleteMultipleOrders" method="post" class="main_category">
							<div class="title_bar">
								<div class="icon"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/ic_list.png"></div>
								<div class="title">Orders list</div>
								<a href="#" class="action" title="Config"><img src="<?php echo base_url();?>assets/Admin/image/Work_area/16_16/ic_settings.png"></a>
								<a href="#confirm-dialog" class="task show_dialog" id="deletemulti">
									<img src="<?php echo base_url();?>assets/Admin/image/Work_area/ic_delete.png" 
									width="16" height="16">
								</a>
								<?php $announce = 'Are you sure to delete selected orders?';
										include 'page include/DialogSubmit.php'; ?>
							</div>
							<?php if(isset($list_orders)&&isset($_SESSION['currentOrderPosition'])&&isset($numofOrderPages)&&isset($offset)){
								$OrderPageNumber = (int) $_SESSION['currentOrderPosition'];
								$flag = 1;
								$startOrderList = ($OrderPageNumber - 1)*$offset + 1;
								$endOrderList = $OrderPageNumber*$offset;
								?>
							<div class="table">
								<?php if($numofOrderPages > 0){ ?>
								<div class="table_content">
									<table cellspacing="0" cellpadding="0">
										<tr class="head">
											<td class="small"><input type="checkbox" class="checkAllOrders"></td>
											<td>Order's ID</td>
											<td>Customer</td>
											<td>Order date</td>
											<td>Order's status</td>
											<td>Total cost</td>
											<td class="change">Task</td>
										</tr>
										<?php foreach ($list_orders as $order) {
											if($flag >= $startOrderList && $flag <= $endOrderList ){
													if($flag%2 == 0){
										?>
										<tr class="odd">
											<td class="small"><input type="checkbox" class="checkOrder" name="ckcOrder[]" value="<?php echo $order->Ord_ID; ?>"></td>
											<td><?php echo $flag; ?></td>
											<td class="identify"><a href="#"><?php echo $order->Del_Name; ?></a></td>
											<td><?php echo $order->Ord_Date; ?></td>
											<?php if((int) $order->Ord_Status == 0){ ?>
											<td>Waiting for confirming</td>
											<?php }
												else{ ?>
											<td>Checked out</td>
											<?php } ?>
											<td><?php echo $order->Ord_Cost; ?></td>
											<td>
												<div class="action three">
													<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/DeleteOrder/<?php echo $order->Ord_ID; ?>"
													 title="Delete" class="delete"></a>
													<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderEdit" title="Edit" class="edit"></a>
													<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInfor/
														<?php echo $order->Ord_ID; ?>" title="Convert to invoice" class="confirm"></a>
												</div>
											</td>
										</tr>
										<?php }
											else{ ?>
										<tr>
											<td class="small"><input type="checkbox" class="checkOrder" name="ckcOrder[]" value="<?php echo $order->Ord_ID; ?>"></td>
											<td><?php echo $flag; ?></td>
											<td class="identify"><a href="#"><?php echo $order->Del_Name; ?></a></td>
											<td><?php echo $order->Ord_Date; ?></td>
											<?php if((int) $order->Ord_Status == 0){ ?>
											<td>Waiting for confirming</td>
											<?php }
												else{ ?>
											<td>Checked out</td>
											<?php } ?>
											<td><?php echo $order->Ord_Cost; ?></td>
											<td>
												<div class="action three">
													<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/DeleteOrder/<?php echo $order->Ord_ID; ?>"
													 title="Delete" class="delete"></a>
													<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderEdit" title="Edit" class="edit"></a>
													<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInfor/
														<?php echo $order->Ord_ID; ?>" title="Convert to invoice" class="confirm"></a>
												</div>
											</td>
										</tr>
										<?php } 
											}
											$flag++; 
										} ?>
									</table>
								</div>
								<div class="pagination">
									<div class="pages">
										<?php if((int) $numofOrderPages > 1){ 
											if($OrderPageNumber==1) {
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/1/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page this">
											First</a>
										<?php } ?>
										<?php if($OrderPageNumber > 1){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/1/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page">
											First</a>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo ($OrderPageNumber - 1);?>/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page">Previous</a>
										<?php } ?>
											<?php
											for($i=1; $i<=(int) $numofOrderPages; $i++){
												if($i == (int) $OrderPageNumber){
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $i;?>/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page this"><?php echo $i; ?></a>
										<?php } else{?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $i;?>/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page"><?php echo $i; ?></a>
										<?php } }?>
										<a href="#" class="page more">...</a>
										<?php if($OrderPageNumber < $numofOrderPages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo ($OrderPageNumber + 1);?>/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page">Next</a>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $numofOrderPages;?>/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page">Last</a>
										<?php } ?>
										<?php if($OrderPageNumber == $numofOrderPages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $numofOrderPages;?>/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page this">Last</a>
										<?php } ?>
										<?php }
										else {?>
										<a href="<?php echo base_url();?>index.php/OrdersInvoicesController/OrderInvoicesList/
											1/
											<?php echo $_SESSION['currentInvoicePosition'];?>" class="page this">1</a>
										<?php } } ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</form>
						<div class="divider" id="work_area_divider">
							<div class="inner_divider"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/divider_span.png"></div>
						</div>
						<div class="main_category">
							<div class="title_bar">
								<div class="icon"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/ic_list.png"></div>
								<div class="title">Invoices list</div>
								<a href="#" class="action" title="Config"><img src="<?php echo base_url();?>assets/Admin/image/Work_area/16_16/ic_settings.png"></a>
								<a href="#" class="action" title="Delete"><img src="<?php echo base_url();?>assets/Admin/image/Work_area/ic_delete.png" width="16" height="16"></a>
							</div>
							<?php if(isset($list_invoices)&&isset($_SESSION['currentInvoicePosition'])&&isset($numofInvoicePages)
								&&isset($offset)){
								$InvoicePageNumber = (int) $_SESSION['currentInvoicePosition'];
								$flag = 1;
								$startInvoiceList = ($InvoicePageNumber - 1)*$offset + 1;
								$endInvoiceList = $InvoicePageNumber*$offset;
								?>
							<div class="table">
								<div class="table_content">
									<table cellspacing="0" cellpadding="0">
										<tr class="head">
											<td class="small"><input type="checkbox"></td>
											<td>Invoice's ID</td>
											<td>Order's ID</td>
											<td>Employee</td>
											<td>Created date</td>
											<td>Status</td>
											<td>Total cost</td>
											<td class="change">Task</td>
										</tr>
										<?php foreach ($list_invoices as $invoice) {
											if($flag >= $startInvoiceList && $flag <= $endInvoiceList ){
													if($flag%2 == 0){
										?>
										<tr class="odd">
											<td class="small"><input type="checkbox" id="<?php echo $invoice->Inv_ID; ?>"></td>
											<td><?php echo $invoice->Inv_ID; ?></td>
											<td><?php echo $invoice->Ord_ID; ?></td>
											<td class="identify"><a href="#"><?php echo $invoice->Del_Name; ?></a></td>
											<td ><?php echo $invoice->Inv_Date; ?></td>
											<?php if((int) $invoice->Inv_Status > 0) {?>
											<td>Paid</td>
											<?php }
												else{ ?>
											<td>On delivery</td>
											<?php } ?>
											<td><?php echo $invoice->Inv_Cost; ?> đ</td>
											<td>
												<div class="action">
													<a href="#" title="Delete" class="delete"></a>
													<a href="#invoice-confirm-dialog" title="<?php echo $invoice->Inv_ID; ?>" class="show_dialog confirm"></a>
												</div>
											</td>
										</tr>
										<?php }
											else{ ?>
										<tr>
											<td class="small"><input type="checkbox" id="<?php echo $invoice->Inv_ID; ?>"></td>
											<td><?php echo $invoice->Inv_ID; ?></td>
											<td><?php echo $invoice->Ord_ID; ?></td>
											<td class="identify"><a href="#"><?php echo $invoice->Del_Name; ?></a></td>
											<td ><?php echo $invoice->Inv_Date; ?></td>
											<?php if((int) $invoice->Inv_Status > 0) {?>
											<td>Paid</td>
											<?php }
												else{ ?>
											<td>On delivery</td>
											<?php } ?>
											<td><?php echo $invoice->Inv_Cost; ?> đ</td>
											<td>
												<div class="action">
													<a href="#" title="Delete" class="delete"></a>
													<a href="#invoice-confirm-dialog" title="<?php echo $invoice->Inv_ID; ?>" class="show_dialog confirm"></a>
												</div>
											</td>
										</tr>
										<?php } } 
										$flag++;
									}
									include 'page include/DialogInvoiceConfirm.php';?>
									</table>
								</div>
								<div class="pagination">
									<div class="pages">
										<?php if((int) $numofInvoicePages > 1){ 
											if($InvoicePageNumber==1) {
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/1" class="page this">
											First</a>
										<?php } ?>
										<?php if($InvoicePageNumber > 1){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/1" class="page">
											First</a>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/
											<?php echo ($InvoicePageNumber - 1);?>" class="page">Previous</a>
										<?php } ?>
											<?php
											for($i=1; $i<=(int) $numofInvoicePages; $i++){
												if($i == (int) $InvoicePageNumber){
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/
											<?php echo $i;?>" class="page this"><?php echo $i; ?></a>
										<?php } else{?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/
											<?php echo $i;?>" class="page"><?php echo $i; ?></a>
										<?php } }?>
										<a href="#" class="page more">...</a>
										<?php if($InvoicePageNumber < $numofInvoicePages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/
											<?php echo ($OrderPageNumber + 1);?>" class="page">Next</a>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/
											<?php echo $numofOrderPages;?>" class="page">Last</a>
										<?php } ?>
										<?php if($InvoicePageNumber == $numofInvoicePages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/
											<?php echo $numofOrderPages;?>" class="page this">Last</a>
										<?php } ?>
										<?php }
										else {?>
										<a href="<?php echo base_url();?>index.php/OrdersInvoicesController/OrderInvoicesList/
											<?php echo $_SESSION['currentOrderPosition'];?>/
											1" class="page this">1</a>
										<?php } } ?>
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