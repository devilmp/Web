<?php if(!isset($_SESSION)) session_start();?>
<html>
	<head>
		<title>Announce</title>
		<?php include'page include/Head.php';?>
	</head>
	<body>
		<!--Start Header-->
		<?php include'page include/Header.php';?>
		<!--End Header-->
		<div class="clr"></div>
		<!--Start Content-->
		<div class="content" id="member_register">
			<div class="announce">
				<div class="announce_title"><?php echo $result; ?></div>
				<a href="<?php echo $back; ?>" class="director"><?php echo $linkTitle; ?></div>
			</div>
		</div>
		<!--End Content-->
		<div class="clr"></div>
		<!--Start Footer-->
		<?php include'page include/Footer.php';?>
		<!--End Footer-->
	</body>
</html>