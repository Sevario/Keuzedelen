//$(document).ready(function(){
//    $("#keuzedeel").click(function(){
//        $(this).animate({
//            height: '80vh',
//            width: '90%'
//        });
//    });
//});

$(document).ready(function() {
    $.each($('.keuzedeel'), function(key, value) {
        $(value).addClass('normal');
    });

    $('.normal').click(function () {
        if ($(this).hasClass('enlarged')) {
            $(this).animate({
                width:  350,
                height: 300
            });

            $(this).removeClass('enlarged');
            $(this).addClass('normal');

            $('.normal').show('fast');
            $('button').show('fast');
            $('h2').show('fast');
            $('.keuzedeel').css("border", '');
        } else {
            $(this).animate({
                width:  '84%',
                height: '93vh'
            });
            $(this).removeClass('normal');
            $(this).addClass('enlarged');

            $('.normal').hide('fast');
            $('button').hide('fast');
            $('h2').hide('fast');
            $('.keuzedeel').css("border", 'solid','white', '1');
        }
    });
});
