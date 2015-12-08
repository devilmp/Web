$(function(){
    var view_status="default";
    $('a#lanescape').click(function(event) {
        if(view_status=="default")
        {
            view_status = "lanescape";
            $('.trans_box').slideUp(1000);
            $(this).parent().animate({
                bottom: '-=24%'},
                1000, function() {
                /* stuff to do after animation is complete */
            });
        }
        else
        {
            if (view_status == "lanescape") {
                view_status = "default";
                $('.trans_box').slideDown(700);
                $(this).parent().animate({
                    bottom: '+=24%'},
                    700, function() {
                    /* stuff to do after animation is complete */
                });
            };
        }
    });

    $('a#default').click(function(event) {
        if (view_status == "lanescape") {
                view_status = "default";
                $('.trans_box').slideDown(700);
                $(this).parent().animate({
                    bottom: '+=24%'},
                    700, function() {
                    /* stuff to do after animation is complete */
                });
            };
    });
});