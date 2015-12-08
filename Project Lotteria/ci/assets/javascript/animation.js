$(function(){
    $('.kind_of_meal').mouseenter(function() {
        $(this).find('.meal_image').animate({
            top: '+=15'
            },250, function() {
        });
        $(this).find('.meal_name').css({
            color: '#d11920'
        });
    });
    $('.kind_of_meal').mouseleave(function() {
        $(this).find('.meal_image').animate({
            top: '-=15'
            },250, function() {
        });
        $(this).find('.meal_name').css({
            color: '#333'
        });
    });
    $('.item img').mouseenter(function() {
        $(this).animate({
            top: '+=15'
            },250, function() {
        });
    });
    $('.item img').mouseleave(function() {
            $(this).animate({
            top: '-=15'
            },250, function() {
        });
    });
});