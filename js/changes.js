$(document).ready(function(){
    $("button").click(function(){
        $("#keuzedeel").animate({
            height: '80vh',
            width: '90%'
        });
        $('#keuzedeel').css('zIndex', '60');
    });
});
