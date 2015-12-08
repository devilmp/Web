$(function(){
    $('#menu_top').mouseenter(function(){
        $('.food_menu').slideDown(1000);
    });
    $('.food_menu').mouseleave(function(){
        $('.food_menu').slideUp(200);
    });
    $('.logo').mouseover(function() {
        $('.food_menu').slideUp(200);
    });
    $('.sub_page#order').mouseover(function() {
        $('.food_menu').slideUp(200);
    });
    $('.sub_page#promotion').mouseover(function() {
        $('.food_menu').slideUp(200);
    });
    $('.logo_Lotteria').mouseover(function() {
        $('.food_menu').slideUp(200);
    });
    $('.sub_page#restaurant').mouseover(function() {
        $('.food_menu').slideUp(200);
    });
});