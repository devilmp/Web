$(function() {
    $('button.add-to-cart').click(function()
    {
        var food = $(this).parent().find('.choosed_name_readonly').attr('value');
        var id = $(this).parent().find('.image_food_area').attr('id');

        var price = parseFloat($(this).parent().find('.food-cost').text());

        var curr_sum_cost = parseFloat($('.order_cart').find('.money').text());
        var final_sum_cost = curr_sum_cost + price;
        var sl = 0;



        if (($('.order_cart').find('#item-' + id)).length)
        {
            sl = parseFloat($('#item-' + id).find('.nums_of_item input').attr('value'));
            $('#item-' + id).find('.nums_of_item input').remove();
            $('#item-' + id).find('.descrease').detach();
            sl = sl + 1;
            $('<input type="text" class="item_amount_readonly" name ="item_amount" value="' + sl + '" readonly="readonly"/>').appendTo($('#item-' + id).find('.nums_of_item'));
            $('<div class="descrease"><button type="button" class="less">&#8744</button></div>').appendTo($('#item-' + id).find('.amount'));

        }
        else
        {
            $('<div class="order_item" id="item-' + id + '">'
                    + '<div class="close"><button type="button">&#215</button></div>'
                    + '<div class="item_name"><input type="text" class="item_name_readonly" name ="' + id + '" value="' + food + '" readonly="readonly"/></div>'
                    + '<div class="amount">'
                    + '<div class="increase"><button type="button" class="more">&#8743</button></div>'
                    + '<div class="nums_of_item"><input type="text" class="item_amount_readonly" name ="item_amount" value="1" readonly="readonly"/></div>'
                    + '<div class="descrease"><button type="button" class="less">&#8744</button></div>'
                    + '</div>'
                    + '<div class="price">' + price + '</div><div class="unit">&nbspđ</div>'
                    + '</div>').appendTo('div.detail_order');
        }
        $('.money').detach();
        $('<div class="money"><label type="text" name="paid">' + final_sum_cost + '</label>đ</div>').appendTo('.cost');


    });
    $('div.detail_order').on('dblclick', '.close', function()
    {
        var sl = parseFloat($(this).parents('.order_item').find('.nums_of_item input').attr('value'));
        var p = parseFloat($(this).parents('.order_item').find('.price').text());
        var curr_sum = parseFloat($(this).parents('.order_cart').find('.money label').text());
        var amount_lost = sl * p;
        var final_sum = curr_sum - amount_lost;
        $(this).parents('.order_cart').find('.money').detach();
        $('<div class="money"><label type="text" name="paid">' + final_sum + '</label>đ</div>').appendTo($(this).parents('.order_cart').find('.cost'));
        $(this).parent().remove();

    });


});