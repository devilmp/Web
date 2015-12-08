<html>
	<head>
		<meta charset="utf-8">
		<title>Log in to system</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Admin/css/Login.css" />
		<link rel="icon" href="<?php echo base_url();?>assets/image/favicon.ico">
	</head>
	<body>
		<form class="login" action="<?php echo base_url();?>index.php/Administrator/AccountController/LogIn" method="post">
			<div class="title">
				<div class="title_image">
					<img src="<?php echo base_url();?>assets/Admin/image/Header/favicon.ico">
				</div>
				<div class="title_name">Lotteria Administrator System</div>
			</div>
			<div class="infor">
				<div class="label">Username</div>
				<div class="input"><input type="text" name="txtUsername"></div>
			</div>
			<div class="infor">
				<div class="label">Password</div>
				<div class="input"><input type="password" name="txtPassword"></div>
			</div>
			<?php if(isset($_SESSION)&&isset($announce)){ ?>
			<div class="announce"><?php echo $announce; ?></div>
			<?php } ?>
			<div class="click">
				<input type="submit" name="btnConfirm" value="Log-in">
				<input type="reset" name="btnReset" value="Reset">
			</div>
		</form>
	</body>
</html>