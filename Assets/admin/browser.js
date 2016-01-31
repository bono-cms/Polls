$(function(){
    $.delete({
        categories : {
            answer : {
                url : "/admin/module/polls/answer/delete"
            },
            category : {
                url : "/admin/module/polls/category/delete"
            }
        }
    });
});