$(document).ready(function() {
    $('a.show_dialog').click(function() {
        //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
        var dialog = $(this).attr('href');

        //cho hiện hộp đăng nhập trong 300ms
        $(dialog).fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });
    $('.show_dialog.confirm').click(function() {
        //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
        var dialog = $(this).attr('href');
        var id = $(this).attr('title');

        var link = $(dialog).find('a.continue').attr('href')+id;
        $(dialog).find('a.continue').attr('href', link);

        //cho hiện hộp đăng nhập trong 300ms
        $(dialog).fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });
    $('.action').on('click', '.show_dialog', function(event) {
        //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
        var dialog = $(this).attr('href');
        var id = $(this).attr('title');

        var link = $(dialog).find('a.continue').attr('href')+id;
        $(dialog).find('a.continue').attr('href', link);

        //cho hiện hộp đăng nhập trong 300ms
        $(dialog).fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });

    // khi click đóng hộp thoại
    $(document).on('click', "a.close, #over", function() { 
        $('#over, .dialog').fadeOut(300 , function() {
            $('#over').remove();  
        }); 
        return false;
    });
	
});


