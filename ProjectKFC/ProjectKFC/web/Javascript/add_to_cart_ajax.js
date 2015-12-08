$(document).ready(function() {
    $("button[id^='selected_item']").click(function() {
        id = $(this).parent().find('.image_food_area').attr('id');
        price = parseInt($(this).parent().find('.food-cost').text());
        food = $(this).parent().find('.choosed_name_readonly').attr('value');
        var curr_sum_cost = parseFloat($('.order_cart').find('.money').text());
        var final_sum_cost = curr_sum_cost + price;
        $.ajax({
            url: "ShoppingCartController",
            type: "post",
            data: "id=" + id + "&task=add" + "&name=" + food + "&price=" + price,
            async: true,
            success: function(result) {
                $('#list_items').empty();
                $('#list_items').html(result);
            }
        });
        $('.money').detach();
        $('<div class="money"><label type="text" name="paid">' + final_sum_cost + '</label>đ</div>').appendTo('.cost');
        $('#over, .choosed').fadeOut(300 , function() {
            $('#over').remove();  
        }); 
        return false;
    });
    
    $('div.detail_order').on('click','button.more',function() {
        id = $(this).parents('.order_item').attr('id');
        var price = parseInt($(this).parents('.order_item').find('.price').text());
        var curr_sum_cost = parseFloat($('.order_cart').find('.money').text());
        var final_sum_cost = curr_sum_cost + price;
        var List = id.split("item-");
	var ID = List[1];
        $.ajax({
            url: "ShoppingCartController",
            type: "post",
            data: "id=" + ID+"&task="+"more",
            async: true,
            success: function(result) {
                $('#list_items').empty();
                $('#list_items').html(result);
            }
        });
        $('.money').detach();
        $('<div class="money"><label type="text" name="paid">' + final_sum_cost + '</label>đ</div>').appendTo('.cost');
    });
    
    $('div.detail_order').on('click','button.less',function() {
        id = $(this).parents('.order_item').attr('id');
        var price = parseInt($(this).parents('.order_item').find('.price').text());
        var curr_sum_cost = parseFloat($('.order_cart').find('.money').text());
        var final_sum_cost = curr_sum_cost - price;
        if(final_sum_cost < 0)
            final_sum_cost = 0;
        var List = id.split("item-");
	var ID = List[1];
        $.ajax({
            url: "ShoppingCartController",
            type: "post",
            data: "id=" + ID+"&task="+"less",
            async: true,
            success: function(result) {
                $('#list_items').empty();
                $('#list_items').html(result);
            }
        });
        $('.money').detach();
        $('<div class="money"><label type="text" name="paid">' + final_sum_cost + '</label>đ</div>').appendTo('.cost');
    });
    $('div.detail_order').on('dblclick','.close button',function() {
        id = $(this).parents('.order_item').attr('id');
        var price = parseInt($(this).parents('.order_item').find('.price').text());
        var amount = parseInt($(this).parents('.order_item').find('input.item_amount_readonly').attr('value'));
        var curr_sum_cost = parseFloat($('.order_cart').find('.money').text());
        var final_sum_cost = curr_sum_cost - price*amount;
        if(final_sum_cost < 0)
            final_sum_cost = 0;
        var List = id.split("item-");
	var ID = List[1];
        $.ajax({
            url: "ShoppingCartController",
            type: "post",
            data: "id=" + ID+"&task="+"delete",
            async: true,
            success: function(result) {
                $('#list_items').empty();
                $('#list_items').html(result);
            }
        });
        $('.money').detach();
        $('<div class="money"><label type="text" name="paid">' + final_sum_cost + '</label>đ</div>').appendTo('.cost');
    });
});