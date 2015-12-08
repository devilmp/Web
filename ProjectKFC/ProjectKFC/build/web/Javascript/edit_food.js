$(function(){
				$('a.edit').click(function()
				{
					event.preventDefault();
					var n = $( "input:checked" ).length;
					if(n > 1)
					{
						alert('You can not edit more than one food each time');
					}
					else
					{
						var name = $( "input:checked" ).parent().parent().find('.infor.name').text();
						var id = $( "input:checked" ).parent().parent().find('.infor.id').text();
						var g_id = $( "input:checked" ).parent().parent().find('.infor.group_id').text();
						var price = $( "input:checked" ).parent().parent().find('.infor.food_cost').text();
                                                var Cost = price.split(" Đ");
                                                var cost = Cost[0];
						var amount = $( "input:checked" ).parent().parent().find('.infor.stock_amount').text();
						var image = $( "input:checked" ).parent().parent().find('.infor.image img').attr('src');
						var List = image.split("/");
						var image_name = List[3];
						
						$('#task2').find('.text_readonly').attr('value',id);
						$('#task2').find('.name_food').attr('value',name);
						$('#task2').find('.price_food').attr('value',cost);
						$('#task2').find('.amount_food').attr('value',amount);
						$('#task2').find('.pre_view_image_edit img').attr('src',image);
                                                if(g_id=="NH01")
                                                    $('#task2').find('#group1').attr('selected','selected');
                                                if(g_id=="NH02")
                                                    $('#task2').find('#group2').attr('selected','selected');
                                                if(g_id=="NH03")
                                                    $('#task2').find('#group3').attr('selected','selected');
                                                if(g_id=="NH04")
                                                    $('#task2').find('#group4').attr('selected','selected');
                                                if(g_id=="NH05")
                                                    $('#task2').find('#group5').attr('selected','selected');
                                                    
						
						var active_tab_selector = $('#task2');
						var curr_active_tab_selector = $('#task3');
						var curr_nav_active_tab_selector = $('#area3');
						var nav_active_tab_selector = $('#area2');
						curr_nav_active_tab_selector.removeClass('active');
						nav_active_tab_selector.addClass('active');
						curr_active_tab_selector.removeClass('active');
						curr_active_tab_selector.addClass('hide');
						active_tab_selector.removeClass('hide');
						active_tab_selector.addClass('active');
					}
				});
				
				$('#task2 input.reset').click(function()
				{
					$('#task2').find('.text_readonly').attr('value','Mã món ăn');
					$('#task2').find('.name_food').attr('value','');
					$('#task2').find('.price_food').attr('value','');
					$('#task2').find('.amount_food').attr('value','');
					$('#task2').find('.pre_view_image_edit img').attr('src','images/Home/img-location.png');
				});
});