$(function(){
    $('#search_icon').click(function(event) {
        $('.search_area').slideDown('800', function() {
            
        });
    });
    $('.search_close').click(function(event) {
        $('.search_area').slideUp('300', function() {
            
        });
    });
    $('.promotion_infor').click(function(event) {
        $('.promotion_details').slideDown('800', function() {
            
        });
    });  
    $('#report_close').click(function(event) {
        $('.search_area').slideUp('300', function() {
            
        });
    });
    $('.close_promo').click(function(event) {
        $('.promotion_details').slideUp('300', function() {
            
        });
    });
    $('.view_others').click(function(event) {
        $('.other_promotions').slideDown('300', function() {
            
        });
    });

    $('.close_list img').click(function(event) {
        $('.other_promotions').slideUp('300', function() {
            
        });
    });
});