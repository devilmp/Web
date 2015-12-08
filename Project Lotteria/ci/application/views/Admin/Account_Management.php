<html>
	<head>
		<title>Account Management</title>
		<?php include 'page include/head.php';?>
		<script type="text/javascript">
			$(function(){
				$('.area.account_manager').attr('id', 'this');
				$('.page_name').text('Account Management');
			});
		</script>
	</head>
	<body>
		<div class="body">
			<?php include'page include/Header.php';?>
			<?php include'page include/Side menu.php';?>
			<div class="work_area" id="accounts_management">
				<div class="work_area home">
					<div class="task_area">
						<div class="statistic">
							<div class="category red">
								<div class="statistic_summary">
									<div class="title">Account Statistics</div>
									<div class="number">20</div>
									<div class="title">in total</div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">15</div>
										<div class="name">customers</div>
									</div>
									<div class="details">
										<div class="number">5</div>
										<div class="name">administrators</div>
									</div>
								</div>
							</div>
							<div class="category green">
								<div class="statistic_summary">
									<div class="title">Top customer</div>
									<div class="name"><a href="#">KhonNan<br>CongKhai</a></div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">150</div>
										<div class="name">times log-in</div>
									</div>
									<div class="details">
										<div class="number">2</div>
										<div class="name">times per day</div>
									</div>
									<div class="details">
										<div class="infor">5</div>
										<div class="name">hours for longest time</div>
									</div>
								</div>
							</div>
							<div class="category blue" id="no_margin_right">
								<div class="statistic_summary">
									<div class="title">Newest customer</div>
									<div class="name"><a href="#">A Phương</a></div>
								</div>
								<div class="statistic_details">
									<div class="details">
										<div class="number">25-52015</div>
										<div class="name">join date</div>
									</div>
									<div class="details">
										<div class="number">1</div>
										<div class="name">time log-in</div>
									</div>
									<div class="details">
										<div class="number">20</div>
										<div class="name">minutes for longest time</div>
									</div>
								</div>
							</div>
						</div>
						<div class="divider" id="work_area_divider">
							<div class="inner_divider"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/divider_span.png"></div>
						</div>
						<form action="<?php echo base_url();?>index.php/Administrator/AccountController/
														deleteMultipleCus" method="post" class="main_category">
							<div class="title_bar">
								<div class="icon"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/ic_list.png"></div>
								<div class="title">Customer list</div>
								<a href="#confirm-dialog-cus" class="task show_dialog" id="deletemulti">
									<img src="<?php echo base_url();?>assets/Admin/image/Work_area/ic_delete.png" 
									width="16" height="16">
								</a>
								<div class="dialog" id="confirm-dialog-cus">
									<div class="announcement_title">Server announce</div>
										<div class="announcement">Area you sure to delete all selected customer?</div>
											<input type="submit" name="btnConfirm" class="continue" value="Agree!">
										<a href="#" class="close">Disagree!</a>
								</div>
							</div>
							<?php if(isset($list_customers)&&isset($_SESSION['currentCustomerPosition'])&&isset($numofCustomerPages)&&isset($offset)){
								$CustomerPageNumber = (int) $_SESSION['currentCustomerPosition'];
								$flag = 1;
								$startCustomerList = ($CustomerPageNumber - 1)*$offset + 1;
								$endCustomerList = $CustomerPageNumber*$offset;
								?>
							<div class="table">
								<?php if($numofCustomerPages > 0){ ?>
								<div class="table_content">
									<table cellspacing="0" cellpadding="0">
										<tr class="head">
											<td class="small"><input type="checkbox" class="checkAllCus"></td>
											<td>Customer's ID</td>
											<td>Name</td>
											<td>Gender</td>
											<td>Username</td>
											<td>Password</td>
											<td>Status</td>
											<td class="small">Task</td>
										</tr>
										<?php foreach ($list_customers as $customer) {
											if($flag >= $startCustomerList && $flag <= $endCustomerList ){
													if($flag%2 == 0){
										?>
										<tr class="odd">
											<td class="small"><input type="checkbox" class="checkCus" name="ckcCus[]" 
												value="<?php echo $customer->Cus_ID; ?>"></td>
											<td class="identify"><?php echo $customer->Cus_ID; ?></td>
											<td><a href="#"><?php echo $customer->Cus_Name; ?></a></td>
											<?php if((int) $customer->Cus_Gender == 0){ ?>
											<td>Female</td>
											<?php }
												else{ ?>
											<td>Male</td>
											<?php } ?>
											<td><?php echo $customer->Acc_Name; ?></td>
											<td><?php echo $customer->Acc_Password; ?></td>
											<?php if((int) $customer->Acc_Status != 0){ ?>
											<td>Online</td>
											<?php } else {?>
											<td>Offline</td>
											<?php } ?>
											<td>
												<div class="action one">
													<a href="<?php echo base_url();?>index.php/Administrator/AccountController/
														deleteCusAccount/<?php echo $customer->Cus_ID; ?>" title="Delete" class="delete"></a>
												</div>
											</td>
										</tr>
										<?php }
											else{ ?>
										<tr>
											<td class="small"><input type="checkbox" class="checkCus" name="ckcCus[]" 
												value="<?php echo $customer->Cus_ID; ?>"></td>
											<td class="identify"><?php echo $customer->Cus_ID; ?></td>
											<td><a href="#"><?php echo $customer->Cus_Name; ?></a></td>
											<?php if((int) $customer->Cus_Gender == 0){ ?>
											<td>Female</td>
											<?php }
												else{ ?>
											<td>Male</td>
											<?php } ?>
											<td><?php echo $customer->Acc_Name; ?></td>
											<td><?php echo $customer->Acc_Password; ?></td>
											<?php if((int) $customer->Acc_Status != 0){ ?>
											<td>Online</td>
											<?php } else {?>
											<td>Offline</td>
											<?php } ?>
											<td>
												<div class="action one">
													<a href="<?php echo base_url();?>index.php/Administrator/AccountController/
														deleteCusAccount/<?php echo $customer->Cus_ID; ?>" title="Delete" class="delete"></a>
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
										<?php if((int) $numofCustomerPages > 1){ 
											if($CustomerPageNumber==1) {
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/1/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page this">
											First</a>
										<?php } ?>
										<?php if($CustomerPageNumber > 1){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/1/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page">
											First</a>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo ($CustomerPageNumber - 1);?>/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page">Previous</a>
										<?php } ?>
											<?php
											for($i=1; $i<=(int) $numofCustomerPages; $i++){
												if($i == (int) $CustomerPageNumber){
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $i;?>/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page this"><?php echo $i; ?></a>
										<?php } else{?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $i;?>/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page"><?php echo $i; ?></a>
										<?php } }?>
										<a href="#" class="page more">...</a>
										<?php if($CustomerPageNumber < $numofCustomerPages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo ($CustomerPageNumber + 1);?>/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page">Next</a>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $numofCustomerPages;?>/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page">Last</a>
										<?php } ?>
										<?php if($CustomerPageNumber == $numofCustomerPages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $numofCustomerPages;?>/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page this">Last</a>
										<?php } ?>
										<?php }
										else {?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											1/
											<?php echo $_SESSION['currentEmployeePosition'];?>" class="page this">1</a>
										<?php } } ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</form>
						<div class="divider" id="work_area_divider">
							<div class="inner_divider"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/divider_span.png"></div>
						</div>
						<form action="<?php echo base_url();?>index.php/Administrator/AccountController/
														deleteMultipleEmp" method="post"  class="main_category">
							<div class="title_bar">
								<div class="icon"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/ic_list.png"></div>
								<div class="title">Employee list</div>
								<a href="<?php echo base_url();?>index.php/Administrator/AccountController/AccountInforPage" 
									class="action" title="Add new meal"><img src="<?php echo base_url();?>assets/Admin/image/Work_area/16_16/ic_plus.png"></a>
								<a href="#confirm-dialog-emp" class="task show_dialog" id="deletemulti">
									<img src="<?php echo base_url();?>assets/Admin/image/Work_area/ic_delete.png" 
									width="16" height="16">
								</a>
								<div class="dialog" id="confirm-dialog-emp">
									<div class="announcement_title">Server announce</div>
										<div class="announcement">Area you sure to delete all selected employee?</div>
											<input type="submit" name="btnConfirm" class="continue" value="Agree!">
										<a href="#" class="close">Disagree!</a>
								</div>
							</div>
							<?php if(isset($list_employees)&&isset($_SESSION['currentEmployeePosition'])&&isset($numofEmpPages)&&isset($offset)){
								$EmployeePageNumber = (int) $_SESSION['currentEmployeePosition'];
								$flag = 1;
								$startEmployeeList = ($EmployeePageNumber - 1)*$offset + 1;
								$endEmployeeList = $EmployeePageNumber*$offset;
								?>
							<div class="table">
								<?php if($numofEmpPages > 0){ ?>
								<div class="table_content">
									<table cellspacing="0" cellpadding="0">
										<tr class="head">
											<td class="small"><input type="checkbox" class="checkAllEmp"></td>
											<td>Employee's ID</td>
											<td>Name</td>
											<td>Gender</td>
											<td>Username</td>
											<td>Password</td>
											<td>Status</td>
											<td class="small">Task</td>
										</tr>
										<?php foreach ($list_employees as $emp) {
											if($flag >= $startEmployeeList && $flag <= $endEmployeeList ){
													if($flag%2 == 0){
										?>
										<tr class="odd">
											<td class="small"><input type="checkbox" class="checkEmp" name="ckcEmp[]" value="<?php echo $emp->Emp_ID; ?>"></td>
											<td class="identify"><?php echo $emp->Emp_ID; ?></td>
											<td><a href="<?php echo base_url();?>index.php/Administrator/AccountController/
												AccountEditInforPage/<?php echo $emp->Emp_ID; ?>"><?php echo $emp->Emp_Name; ?></a></td>
											<?php if((int) $emp->Emp_Gender == 0){ ?>
											<td>Female</td>
											<?php }
												else{ ?>
											<td>Male</td>
											<?php } ?>
											<td><?php echo $emp->Acc_Name; ?></td>
											<td><?php echo $emp->Acc_Password; ?></td>
											<?php if((int) $emp->Acc_Status != 0){ ?>
											<td>Online</td>
											<?php } else {?>
											<td>Offline</td>
											<?php } ?>
											<td>
												<div class="action one">
													<a href="<?php echo base_url();?>index.php/Administrator/AccountController/
														deleteEmpAccount/<?php echo $emp->Emp_ID; ?>" title="Delete" class="delete">
													</a>
												</div>
											</td>
										</tr>
										<?php }
											else{ ?>
										<tr>
											<td class="small"><input type="checkbox" class="checkEmp" name="ckcEmp[]" value="<?php echo $emp->Emp_ID; ?>"></td>
											<td class="identify"><?php echo $emp->Emp_ID; ?></td>
											<td><a href="<?php echo base_url();?>index.php/Administrator/AccountController/
												AccountEditInforPage/<?php echo $emp->Emp_ID; ?>"><?php echo $emp->Emp_Name; ?></a></td>
											<?php if((int) $emp->Emp_Gender == 0){ ?>
											<td>Female</td>
											<?php }
												else{ ?>
											<td>Male</td>
											<?php } ?>
											<td><?php echo $emp->Acc_Name; ?></td>
											<td><?php echo $emp->Acc_Password; ?></td>
											<?php if((int) $emp->Acc_Status != 0){ ?>
											<td>Online</td>
											<?php } else {?>
											<td>Offline</td>
											<?php } ?>
											<td>
												<div class="action one">
													<a href="<?php echo base_url();?>index.php/Administrator/AccountController/
														deleteEmpAccount/<?php echo $emp->Emp_ID; ?>" title="Delete" class="delete">
													</a>
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
										<?php if((int) $numofEmpPages > 1){ 
											if($EmployeePageNumber==1) {
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											1" class="page this">
											First</a>
										<?php } ?>
										<?php if($EmployeePageNumber > 1){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											1" class="page">
											First</a>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											<?php echo ($EmployeePageNumber - 1);?>" class="page">Previous</a>
										<?php } ?>
											<?php
											for($i=1; $i<=(int) $numofEmpPages; $i++){
												if($i == (int) $EmployeePageNumber){
											?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											<?php echo $i;?>" class="page this"><?php echo $i; ?></a>
										<?php } else{?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											<?php echo $i;?>" class="page"><?php echo $i; ?></a>
										<?php } }?>
										<a href="#" class="page more">...</a>
										<?php if($EmployeePageNumber < $numofEmpPages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											<?php echo ($EmployeePageNumber + 1);?>" class="page">Next</a>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											<?php echo $numofEmpPages;?>" class="page">Last</a>
										<?php } ?>
										<?php if($EmployeePageNumber == $numofEmpPages){ ?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											<?php echo $numofEmpPages;?>" class="page this">Last</a>
										<?php } ?>
										<?php }
										else {?>
										<a href="<?php echo base_url();?>index.php/Administrator/AccountController/listAccount/
											<?php echo $_SESSION['currentCustomerPosition'];?>/
											1" class="page this">1</a>
										<?php } } ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</form>
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