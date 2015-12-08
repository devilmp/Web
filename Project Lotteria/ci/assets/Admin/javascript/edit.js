$(function(){
		var list_group = ["HAMBURGER", "TRÁNG MIỆNG", "CƠM", "COMBO",
		"VALUE", "GÀ", "NƯỚC UỐNG", "HAPPY MENU"];
		//lấy dữ liệu
		var group_name = $('.group .details').text();
		var meal_name = $('.name .details').text();
		var meal_price = $('.price .number').text();
		var meal_stock = $('.stock .number').text();
		var meal_description = $('.description .content').text();
		var combobox = "<select name='sltGroup' class='cboGroup'>";
		combobox += "<optgroup label='Select a group for this meal'>";
		for(i=0; i<list_group.length; i++){
			if(list_group[i] == group_name) combobox += "<option value='"+(i+1)+"' selected>"+list_group[i]+"</option>";
			else combobox += "<option value='"+(i+1)+"'>"+list_group[i]+"</option>";
		}
		combobox += "</optgroup></select>"
	$('.do_actions.edit .action').on('click', '.edit', function(event) {
		$('.group .details').empty();
		$('.name .details').empty();
		$('.price .number').empty();
		$('.stock .number').empty();
		$('.description .content').empty();
		//chèn textbox vào các vùng chỉ định
		$('.group .details').append(combobox);
		$('.name .details').append('<input type="text" name="txtMeal_Name" value="'+meal_name+'"/>');
		$('.price .number').append('<input type="text" name="txtMeal_Price" value="'+meal_price+'"/>');
		$('.stock .number').append('<input type="text" name="txtMeal_Stock" value="'+meal_stock+'"/>');
		$('.description .content').append('<textarea name="txtMeal_Description">'+meal_description+'</textarea>');

		$('.action').empty();
		$('.action').append('<a href="#confirm-dialog" class="task show_dialog">Confirm</a>');
		$('.action').append('<input type="button" name="btnCancel" class="cancel_button" value="Cancel"/>');

		$('.edit_image').append('<input type="file" class="fImage" name="fImage"/>');
	});
	$('.do_actions.edit .action').on('click', '.cancel_button', function(event) {
		//empty
		$('.group .details').empty();
		$('.name .details').empty();
		$('.price .number').empty();
		$('.stock .number').empty();
		$('.description .content').empty();
		//khôi phục các label
		$('.group .details').text(group_name);
		$('.name .details').text(meal_name);
		$('.price .number').text(meal_price);
		$('.stock .number').text(meal_stock);
		$('.description .content').text(meal_description);
		//khôi phục lại các button
		$('.action').empty();
		$('.action').append('<button class="edit">Edit</button>');
		$('.edit_image').empty();
	});
});