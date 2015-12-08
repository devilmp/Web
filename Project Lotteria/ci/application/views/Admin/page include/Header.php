<header>
	<div class="logo">
		<img src="<?php echo base_url();?>assets/Admin/image/Header/favicon.ico">
		Lotteria
	</div>
</header>
<div class="nav">
	<?php 
			if(!isset($_SESSION)) session_start();
			if(isset($_SESSION['admin_account'])){ ?>
	<div class="account">
		Hi, <a href="#"><?php echo $_SESSION['admin_account']; ?></a>
		<a href="#" class="arrow"><img src="<?php echo base_url();?>assets/Admin/image/Header/arrow_up.png"></a>
		<a href="<?php echo base_url();?>index.php/Administrator/AccountController/LogOut" style="color: black; float: right;">Log-out</a>
	</div>
	<?php } 
	else{
		$data['announce'] = 'Please login first!';
		redirect_back();
	} ?>
	<div class="location">
		<div class="position">
			<div class="admin">
				<a href="#">Administrator</a>
			</div>
			<div class="arrow">></div>
			<div class="page_name"></div>
		</div>
	</div>
	<div class="option">
		<div class="bg user"></div>
		<a href="#">Users list</a>
	</div>
	<div class="option">
		<div class="bg search"></div>
		<a href="#">Search</a>
	</div>
</div>