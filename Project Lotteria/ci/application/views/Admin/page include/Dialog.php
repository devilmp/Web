<div class="dialog" id="confirm-dialog">
	<div class="announcement_title">Server announce</div>
	<div class="announcement">Are you sure to confirm this order?</div>
	<a href="<?php echo base_url();?>index.php/Administrator/OrdersInvoicesController/ConfirmOrder/
										<?php echo $infor->Ord_ID ?>" class="continue">Agree!</a>
	<a href="#" class="close">Disagree!</a>
</div>