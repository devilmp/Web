$(function(){
    $('a .nav#ref').click(function(event) {
        $('.hidden').animate({
        	width: 'toggle'},
        	600, function() {
        	/* stuff to do after animation is complete */
        });
    });
});