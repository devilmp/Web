$(document).ready(function() {
    $('a.food_image').click(function() {

        var food_id = $(this).find('img').attr('id');
		var food_img = $(this).find('img').attr('src');
		var food_price = $(this).find('img').attr('alt');
		var food_name = $(this).parent().find('.food_name').text();
        var loginBox = $(this).attr('href');
		$(loginBox).find('.image_food_area').attr('id',food_id);
		$(loginBox).find('.food_img img').attr('src',food_img);
		$(loginBox).find('.choosed_name_readonly').attr('value',food_name);
		$(loginBox).find('.food-cost').removeData();
		$(loginBox).find('.food-cost').text(food_price);
        
        $(loginBox).fadeIn("slow");

        
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });
	

    
    $(document).on('click', "a.close, #over", function() { 
        $('#over, .choosed').fadeOut(300 , function() {
            $('#over').remove();  
        }); 
        return false;
    });
	
});

