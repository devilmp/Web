$(function(){
	var list = new Array(1,2,3);
	$('a.month').click(function(event) {
		event.preventDefault();
		var id = $(this).attr('href').slice(1);
		for(i=0; i<list.length; i++){
			if(list[i] == parseInt(id)) $('#'+(list[i])).slideDown(400);
			else $('#'+list[i]).slideUp(400);
		}
		
	});
});