
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
                width:  '84%',
                height: '87vh'
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
    $.each($('.beheer_all'), function(key, value) {
        $(value).addClass('normal2');
    });

    //hide info before clicking

    //
    $('.normal2').click(function () {
        if ($(this).hasClass('enlarged2')) {
            $(this).animate({
                width:  '84%',
                height: 50
            });

            $(this).removeClass('enlarged2');
            $(this).addClass('normal2');

            $('.normal2').show('fast');
            $('.beheer_all').css("border", '');
        } else {
            $(this).animate({
                height: '87vh'
            });
            $(this).removeClass('normal2');
            $(this).addClass('enlarged2');

            $('.normal2').hide('fast');
            $('.beheer_all').css("border", 'solid','white', '1');

        }
    });


    });




