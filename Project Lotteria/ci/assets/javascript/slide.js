$(function(){
    $('a.fill_information').click(function(event) {
        $('.customer_informations').slideDown(700);
        $('.shopping_cart_area').slideUp(700);
        $('#review_shopping_cart').text('Xem lại giỏ hàng');
    });
    $('#review_shopping_cart').click(function(event) {
        var value = $(this).text();
        if( value == "Xem lại giỏ hàng")
        {
            $('.shopping_cart_area').slideDown(700);
            $(this).text('Ẩn giỏ hàng');
        }
        if( value == "Ẩn giỏ hàng")
        {
            $('.shopping_cart_area').slideUp(700);
            $(this).text('Xem lại giỏ hàng');
        }
    });
});