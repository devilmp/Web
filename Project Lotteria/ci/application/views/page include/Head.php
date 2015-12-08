<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo base_url();?>assets/image/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Top.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Content.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Footer.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slide_show.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/radio.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Member.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Menu.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/report.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Shopping_Cart.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Promotion.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Introduction.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Contact.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/News.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Article.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Login.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/Announcement.css" />

<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/jquery-1.7.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/Slide_show.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/menu_toggle.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/animation.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/view.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/animate-image.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/toggle-area.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/transform-rotate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/navigator.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/report.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/slide.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/zoom.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/Login.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/add_to_cart_ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/form_validation.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/javascript/order_infor.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
	$('.add_to_cart').click(function(event) {
		var meal_id = $(this).attr('href').split('#')[1];
		$.ajax({
            url: "<?php echo base_url();?>index.php/ShoppingCartController/updateCart",
            type: "post",
            data: "id=" + meal_id + "&task=add",
            async: true,
            success: function(result) {
            	var current = parseInt($('#shopping_cart').text());
                $('#shopping_cart a').empty();
                $('#shopping_cart a').html(result);
                $('#num_of_items').empty();
                $('#num_of_items').html(result);
                $('.nav#order #quantities').empty();
                $('.nav#order #quantities').html(result);
            }
        });
	});

    $('a.less').click(function(event) {
        //get the id of meal
        var meal_id = $(this).attr('href').split('#')[1];
        //get te ordered row to delete if quantity = 0
        var item = $(this).parents('.ordered_item');
        //print the quantities here
        var target = $(this).parent().find('.curr_quantities');
        //get this item's row in report
        var report_row = $('.report').find('#'+meal_id);

        //get the area contain the total cost
        var cost_area = $(this).parents('.shopping_cart_area').find('#total_cost_amount');
        //get the item's price
        var price = parseInt($(this).parents('.ordered_item').find('#item_cost').text());
        //update total cost
        var curr_total = parseInt(cost_area.text()) - price;
        $.ajax({
            url: "<?php echo base_url();?>index.php/ShoppingCartController/updateCart",
            type: "post",
            data: "id=" + meal_id + "&task=decrease",
            dataType: "json",
            async: true,
            success: function(result) {
                if(parseInt(result.item_quantities) != 0){
                    target.empty();
                    target.html(result.item_quantities);
                    report_row.find('#item_quantities').empty();
                    report_row.find('#item_quantities').text(result.item_quantities);
                    report_row.find('#total_cost').empty();
                    report_row.find('#total_cost').text(parseInt(result.item_quantities)*price+' đ');
                }
                else{
                    item.remove();
                    report_row.remove();
                } 
                $('#shopping_cart a').empty();
                $('#shopping_cart a').html(result.total);
                cost_area.empty();
                cost_area.html(curr_total);
                $('.report').find('.payment_value').empty();
                $('.report').find('.payment_value').text(curr_total);
            }
        });
    });
    $('a.more').click(function(event) {
        //get the id of meal
        var meal_id = $(this).attr('href').split('#')[1];
        //get te ordered row to delete if quantity = 0
        var item = $(this).parents('.ordered_item');
        //print the quantities here
        var target = $(this).parent().find('.curr_quantities');
        //get this item's row in report
        var report_row = $('.report').find('#'+meal_id);

        //get the area contain the total cost
        var cost_area = $(this).parents('.shopping_cart_area').find('#total_cost_amount');
        //get the item's price
        var price = parseInt($(this).parents('.ordered_item').find('#item_cost').text());
        //update total cost
        var curr_total = parseInt(cost_area.text()) + price;
        $.ajax({
            url: "<?php echo base_url();?>index.php/ShoppingCartController/updateCart",
            type: "post",
            data: "id=" + meal_id + "&task=increase",
            dataType: "json",
            async: true,
            success: function(result) {
                target.empty();
                target.html(result.item_quantities);
                report_row.find('#item_quantities').empty();
                report_row.find('#item_quantities').text(result.item_quantities);
                report_row.find('#total_cost').empty();
                report_row.find('#total_cost').text(parseInt(result.item_quantities)*price+' đ');
                $('#shopping_cart a').empty();
                $('#shopping_cart a').html(result.total);
                cost_area.empty();
                cost_area.html(curr_total);
                $('.report').find('.payment_value').empty();
                $('.report').find('.payment_value').text(curr_total);
            }
        });
    });
    $('img.delete').click(function(event) {
        //get the item
        var item = $(this).parents('.ordered_item');
        //get the id of meal
        var meal_id = item.find('a.delete_item').attr('href').split('#')[1];
        //get the price
        var price = parseInt(item.find('#item_cost').text());
        //get this item's quantities
        var curr_quantities = parseInt(item.find('.curr_quantities').text());
        //get this item's row in report
        var report_row = $('.report').find('#'+meal_id);
        //get the total_cosr area
        var total_cost_area = $('#total_cost_amount');
        //get the total area in report
        var total_cost_report = $('.payment_value');
        //set the current total
        var total = parseInt(total_cost_area.text()) - curr_quantities*price;
        $.ajax({
            url: "<?php echo base_url();?>index.php/ShoppingCartController/updateCart",
            type: "post",
            data: "id=" + meal_id + "&task=delete",
            dataType: "json",
            async: true,
            success: function(result) {
                $('#shopping_cart a').empty();
                $('#shopping_cart a').html(result);
                item.remove();
                report_row.remove();
                total_cost_area.empty();
                total_cost_area.html(total);
                total_cost_report.html(total);
            }
        });
    });

    $('select.BigArea').change(function(event) {
        var area_id = parseInt($(this).val());
        $.ajax({
            url: "<?php echo base_url();?>index.php/AreaController/viewSubAreas",
            type: "post",
            data: "id=" + area_id + "&task=view",
            async: true,
            success: function(result) {
                $('select.SubArea').empty();
                $('select.SubArea').html(result);
            }
        });
    });
});
</script>
