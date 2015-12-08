$(function(){
	$('form.online_shopping').submit(function(event) {
		var name = $('input[name="txtName"]');
		var address = $('input[name="txtAddress"]');
		var area = $('select[name="sltArea"]');
		var subarea = $('select[name="sltSubArea"]');
		var phone = $('input[name="txtPhone"]');
		var flag = 0;
		var error = "You're missing ";
		if(name.val() == ''){
			flag = 1;
			error += "Name"
		}
		if(address.val() == ''){
			if(flag == 1) error += ", Address";
			else{
				error += "Address";
				flag = 1;
			}
		}
		if(phone.val() == ''){
			if(flag == 1) error += ", Phone";
			else{
				error += "Phone";
				flag = 1;
			}
		}
		if(subarea.val() == null){
			if(flag == 1) error += ", and please choose an area";
			else{
				error += "and please choose an area";
				flag = 1;
			}
		}
		if(flag == 1) {
			event.preventDefault();
	        $('#over, .report').fadeOut(300 , function() {
	            $('#over').remove();  
	        }); 
	        $('#forced').empty();
	        $('#forced').css('color', '#C03');
	        $('#forced').text(error);
		}
	});
});