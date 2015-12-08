$(document).ready(function() {
    $("input[id^='find']").click(function() {
        var id = $(this).parent().find('input.search_food').attr('value');
        $.ajax({
            url: "AdminFoodController",
            type: "get",
            data: "id=" + id+"&task="+"Tìm",
            async: true,
            success: function(result) {
                $('.stocked').empty();
                $('.stocked').html(result);
            }
        });
    });
});