$(document).ready(function() {
    $('#confirm').click(function() {
        var loginBox = $('.report');
        
        $(loginBox).fadeIn("slow");

        
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });
	

    
    $(document).on('click', "a.close, #over, #report_close, #cancel_order", function() { 
        $('#over, .report').fadeOut(300 , function() {
            $('#over').remove();  
        }); 
        return false;
    });
	
});

