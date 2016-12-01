//$(document).ready(function(){
//    $("#keuzedeel").click(function(){
//        $(this).animate({
//            height: '80vh',
//            width: '90%'
//        });
//    });
//});

var enlarged = false;
$(document).ready(function() {
    $('.keuzedeel').click(function () {
        $(this).stop(true, false).animate({
            width: enlarged ? 200 : 1000,
            height: enlarged ? 200 : 600,
        });

        enlarged = !enlarged;
    });
});