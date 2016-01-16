$(function(){
	$.delete({
		categories : {
			answer : {
				url : "/admin/module/polls/answer/delete.ajax"
			},
            category : {
                url : "/admin/module/polls/category/delete.ajax"
            }
		}
	});
});