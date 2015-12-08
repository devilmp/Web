<div class="side_menu">
	<div class="area dashboard">
		<div class="icon"></div>
		<a href="<?php echo base_url();?>index.php/Administrator/Administrator">Dashboard</a>
	</div>
	<div class="area meals_manager">
		<div class="icon"></div>
		<a href="<?php echo base_url();?>index.php/Administrator/MealManagementController">Meals Manager</a>
	</div>
	<div class="area orders_invoices_manager">
		<div class="icon"></div>
		<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController">Orders & Invoices Manager</a>
	</div>
	<div class="area account_manager">
		<div class="icon"></div>
		<a href="<?php echo base_url();?>index.php/Administrator/AccountController">Account Manager</a>
	</div>
	<div class="area articles_manager">
		<div class="icon"></div>
		<a href="#">Articles Manager</a>
	</div>
	<div class="area promotions_manager">
		<div class="icon"></div>
		<a href="#">Promotions Manager</a>
	</div>
	<div class="divider" id="side_menu_divider">
		<div class="inner_divider"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/divider_span.png"></div>
	</div>
	<div class="search">
		<form class="input">
			<input type="text" name="txtInfor">
			<input type="submit" name="btnSearch" value="Search">
		</form>
	</div>
	<div class="divider" id="side_menu_divider">
		<div class="inner_divider"><img src="<?php echo base_url();?>assets/Admin/image/Side_menu/divider_span.png"></div>
	</div>
	<div class="visit_statistic">
		<div class="past">
			<div class="last_visit">
				<div class="title">Last visits</div>
				<div class="visit_count">6,302</div>
				<div class="details" id="unique">
					<div class="details_in_number">5,774</div>
					<div class="details_title">unique</div>
				</div>
				<div class="details" id="returning">
					<div class="details_in_number">3,512</div>
					<div class="details_title">returning</div>
				</div>
			</div>
		</div>
		<div class="present">
			<div class="title">Today</div>
			<div class="today">
				<div class="details" id="unique">
					<div class="details_in_number">65%</div>
					<div class="details_title">New</div>
				</div>
				<div class="details" id="returning">
					<div class="details_in_number">35%</div>
					<div class="details_title">Returning</div>
				</div>
			</div>
		</div>
	</div>
</div>