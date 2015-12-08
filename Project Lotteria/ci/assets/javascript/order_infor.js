$(function(){
	$("input[name='txtName'").change(function(event) {
		$('.field_detail.customer_name').html($(this).val());
	});
	$("input[name='txtAddress'").change(function(event) {
		$('.field_detail.customer_address').html($(this).val());
	});
	$("input[name='txtPhone'").change(function(event) {
		$('.field_detail.customer_phone').html($(this).val());
	});
});