$(function() {
    $('img.delete').mouseenter(function(event) {
        $(this).animate({  borderSpacing: -360 }, {
            step: function(now,fx) {
              $(this).css('transform','rotate('+now+'deg)');  
            },
            duration: 1000
        },'linear');
    });
    $('img.delete').mouseleave(function(event) {
        $(this).animate({  borderSpacing: 360 }, {
            step: function(now,fx) {
              $(this).css('transform','rotate('+now+'deg)');  
            },
            duration: 1000
        },'linear');
    });
    $('.search_close').mouseenter(function(event) {
        $(this).animate({  borderSpacing: -360 }, {
            step: function(now,fx) {
              $(this).css('transform','rotate('+now+'deg)');  
            },
            duration: 1000
        },'linear');
    });
    $('.search_close').mouseleave(function(event) {
        $(this).animate({  borderSpacing: 360 }, {
            step: function(now,fx) {
              $(this).css('transform','rotate('+now+'deg)');  
            },
            duration: 1000
        },'linear');
    });

    $('.close_promo').mouseenter(function(event) {
        $(this).animate({  borderSpacing: -360 }, {
            step: function(now,fx) {
              $(this).css('transform','rotate('+now+'deg)');  
            },
            duration: 1000
        },'linear');
    });
    $('.close_promo').mouseleave(function(event) {
        $(this).animate({  borderSpacing: 360 }, {
            step: function(now,fx) {
              $(this).css('transform','rotate('+now+'deg)');  
            },
            duration: 1000
        },'linear');
    });

    $('.close_list img').mouseenter(function(event) {
        $(this).animate({  borderSpacing: -360 }, {
            step: function(now,fx) {
              $(this).css('transform','rotate('+now+'deg)');  
            },
            duration: 1000
        },'linear');
    });
    $('.close_list img').mouseleave(function(event) {
        $(this).animate({  borderSpacing: 360 }, {
            step: function(now,fx) {
              $(this).css('transform','rotate('+now+'deg)');  
            },
            duration: 1000
        },'linear');
    });
}); 