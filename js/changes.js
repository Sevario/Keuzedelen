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
    
    //hide info before clicking
    $('h1').hide();
    $('p').hide();
    $('.inschrijven').hide();
    //
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
            $('.keuzedeel').css("padding", '');
            $('h1').hide('fast');
            $('p').hide('fast');
            $('.inschrijven').hide('fast');
        } else {
            $(this).animate({
                width:  '88%',
                height: '88vh'
            });
            $(this).removeClass('normal');
            $(this).addClass('enlarged');

            $('.normal').hide('fast');
            $('button').hide('fast');
            $('h2').hide('fast');
            $('.keuzedeel').css("border", 'solid','white', '1');
            $('.keuzedeel').css("padding", '2em');
            $('h1').show('fast');
            $('p').show('fast');
            $('.inschrijven').show('fast');
        }
    });
});
