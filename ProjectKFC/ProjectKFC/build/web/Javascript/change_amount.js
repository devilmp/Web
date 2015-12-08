$(function(){
				$('div.detail_order').on('click','button.more',function()
				{
					var sl = parseFloat($(this).parents('.amount').find('.nums_of_item input').attr('value'));
					sl = sl + 1;
					var price = parseFloat($(this).parents('.order_item').find('.price').text());
					var curr_sum = parseFloat($(this).parents('.order_cart').find('.money label').text());
					var sum = price + curr_sum;
					$(this).parents('.amount').find('.nums_of_item input').remove();
					$(this).parents('.order_cart').find('.money').remove();
					$('<input type="text" class="item_amount_readonly" name ="item_amount" value="'+sl+'" readonly="readonly"/>').appendTo($(this).parents('.amount').find('.nums_of_item'));
					$('<div class="money"><label type="text" name="paid">'+sum+'</label>đ</div>').appendTo($(this).parents('.order_cart').find('.cost'));
				});
				
				$('div.detail_order').on('click','button.less',function()
				{
					var sl = parseFloat($(this).parents('.amount').find('.nums_of_item input').attr('value'));
					sl = sl - 1;
					if(sl <= 0)
					{
						sl = 0;
					}
					var price = parseFloat($(this).parents('.order_item').find('.price').text());
					var curr_sum = parseFloat($(this).parents('.order_cart').find('.money label').text());
					var sum = curr_sum - price;
					if(sum <= 0)
					{
						sum = 0;
					}
					$(this).parents('.amount').find('.nums_of_item input').remove();
					$(this).parents('.order_cart').find('.money').remove();
					$('<input type="text" class="item_amount_readonly" name ="item_amount" value="'+sl+'" readonly="readonly"/>').appendTo($(this).parents('.amount').find('.nums_of_item'));
					$('<div class="money"><label type="text" name="paid">'+sum+'</label>đ</div>').appendTo($(this).parents('.order_cart').find('.cost'));
				});
			});