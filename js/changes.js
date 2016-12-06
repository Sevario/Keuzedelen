//$(document).ready(function(){
//    $("#keuzedeel").click(function(){
//        $(this).animate({
//            height: '80vh',
//            width: '90%'
//        });
//    });
//});

$(document).ready(function() {
    $.each($('button'), function(key, value) {
        $(value).addClass('normal');
    });

    $('.normal').click(function () {
        if ($(this).hasClass('enlarged')) {
            $('.keuzedeel').animate({
                width:  350,
                height: 300
            });

            $(this).removeClass('enlarged');
            $(this).addClass('normal');

            $('.normal').show('fast');
        } else {
            $('.keuzedeel').animate({
                width:  '84%',
                height: '93vh'
            });

            $(this).removeClass('normal');
            $(this).addClass('enlarged');

            $('.normal').hide('fast');
        }
    });
});