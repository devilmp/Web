$(function() {

			$('button.add-to-cart').click(function() {
				alert('fly to cart');
				var cart = $('.order_cart');
			   var imgtofly = $(this).parents('.choosed').find('.food_img img').eq(0);
				if (imgtofly) {
					var imgclone = imgtofly.clone()
						.offset({ top:imgtofly.offset().top, left:imgtofly.offset().left })
						.css({'opacity':'0.7', 'position':'absolute', 'height':'150px', 'width':'150px', 'z-index':'1000'})
						.appendTo($('.choosed'))
						.animate({
							'top':cart.offset().top + 10,
							'left':cart.offset().left + 30,
							'width':55,
							'height':55
						}, 1000, 'easeInElastic');
					imgclone.animate({'width':0, 'height':0}, function(){ $(this).detach() });
				}
				return false;
			});
			});