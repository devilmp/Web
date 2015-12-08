<html>
	<head>
		<meta charset="utf-8">
	<title>Invoice report</title>
		<?php include 'page include/head.php';?>
	</head>
	<body>
		<form class="print" name="proposal_form" action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post" >
			<?php if(isset($del_infor)&&isset($order)&&isset($order_details)) { 
			?>
			<div class="title_row">
				<div class="header_area" id="left">
					<h3>Lotteria Việt Nam</h3>
					<h4>Chuỗi cửa hàng tp Hồ Chí Minh</h4>
				</div>
				<div class="header_area" id="mid">
					<h1>HÓA ĐƠN BÁN HÀNG</h1>
				</div>
				<?php foreach ($order as $row) { ?>
				<div class="header_area" if="right">
					<h3>HÓA ĐƠN SỐ: <?php echo $row->Ord_ID; ?></h3>
					<h3>KÝ HIỆU: HD00<?php echo $row->Ord_ID; ?></h3>
					<h3>NGÀY LẬP: <?php echo $row->Ord_Date; ?></h3>
				</div>
				<?php } ?>
			</div>
			<?php foreach ($del_infor as $infor) { ?>
			<div class="title_row">
				<div class="row">
					<h4>Họ tên khách hàng: </h4>
					<div class="infor"><h2><?php echo $infor->Del_Name; ?></h2></div>
				</div>
				<div class="row">
					<h4>Địa chỉ khách hàng: </h4>
					<div class="infor"><h2><?php echo $infor->Del_Address; ?>, <?php echo $infor->SA_Name; ?>, <?php echo $infor->Area_Name; ?></h2></div>
				</div>
				<div class="row">
					<h4>Số điện thoại: </h4>
					<div class="infor"><h2><?php echo $infor->Del_Phone; ?></h2></div>
				</div>
				<?php foreach ($order as $row) {
						if((int) $row->Ord_Status > 0){
				?>
				<div class="row">
					<h4>Tình trạng: </h4>
					<div class="infor"><h3><?php echo 'Đã xác nhận!'; ?></h3></div>
				</div>
				<?php } else { ?>
				<div class="row">
					<h4>Tình trạng: </h4>
					<div class="infor"><h3><?php echo 'Đang chờ xác nhận!'; ?></h3></div>
				</div>
				<?php } } ?>
			</div>
		<?php 
		 }
		 ?>
			<table class="printOrder" cellspacing="0" cellpadding="50" border="1">
			 	<tr> 
			 		<td><strong>STT</strong></td> 
			 		<td><strong>Tên Món Ăn</strong></td> 
			 		<td><strong>Số Lượng</strong></td>
			 		<td><strong>Giá</strong></td>
			 		<td><strong>Thành Tiền</strong></td>
			 		<td><strong>Ghi Chú</strong></td>
			 	</tr>
			 	<?php $stt = 1;
			 	foreach ($order_details as $row) {
			 	?>
			 	<tr>
			 		<td><?php echo $stt; ?></td>
			 		<td><?php echo $row->M_Name; ?></td>
			 		<td><?php echo $row->OD_Quantities; ?></td>
			 		<td><?php echo $row->M_Price; ?></td>
			 		<td><?php echo (((int)$row->OD_Quantities)*((int)$row->M_Price)); ?></td>
			 		<td></td>
			 	</tr>
			 	<?php $stt++;
			 	} ?>
			 	<?php foreach ($order as $row) { ?>
			 	<tr>
			 		<td colspan="6"><h2>Tổng tiền: <?php echo $row->Ord_Cost; ?> đ</h2></td>
			 	</tr>
			 	<?php } ?>
			</table>
			<div class="title_row margin">
				<div class="header_area" id="left">
					<h3>Người lập:</h3>
				</div>
				<div class="header_area" id="left">
					<h3>Người giao hàng:</h3>
				</div>
				<div class="header_area" id="left">
					<h3>Người nhận hàng:</h3>
				</div>
			</div>
			<input type="submit" name="action_print" value="Print this order"/>
		</form>
	 <?php
	  }  if($_SERVER['REQUEST_METHOD']=='POST'){
		header("Content-Type: application/vnd.msword");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("content-disposition: attachment;filename=invoice.doc");
	} ?>
	</body>
</html>