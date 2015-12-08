$(function() {
    $('.promo_item img').mouseover(function(event) {
        $(this).animate({
            width: '140%',
            height: '170%',
            left: '-=20%',
            top: '-=20%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.promo_item img').mouseleave(function(event) {
        $(this).animate({
            width: '100%',
            height: '130%',
            left: '+=20%',
            top: '+=20%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.article_image img').mouseover(function(event) {
        $(this).animate({
            width: '140%',
            height: '140%',
            left: '-=20%',
            top: '-=20%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
    $('.article_image img').mouseleave(function(event) {
        $(this).animate({
            width: '100%',
            height: '100%',
            left: '+=20%',
            top: '+=20%'},
            300, function() {
            /* stuff to do after animation is complete */
        });
    });
}); 