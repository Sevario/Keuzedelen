
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
    
    
    $.each($('.beheerding_keuzedelen'), function(key, value) {
        $(value).addClass('normal2');
    });
            $('.verdwijn_keuzedelen').hide();
            $('.verdwijn_studenten').hide();
            $('.verdwijn_docenten').hide();
            $('.verdwijn_opleiding').hide();
            $('.verdwijn_gebruikers').hide();
    $('.normal2').click(function () {
        if ($(this).hasClass('enlarged2')) {
            $('.beheer_keuzedelen').animate({
                width:  '84%',
                height: 50
            });
            $(this).removeClass('enlarged2');
            $(this).addClass('normal2');
            $('.normal2').show('fast');
            $('.beheer_keuzedelen').css("border", '');
            $('beheerding_keuzedelen').css("opacity", '0.6');
            $('.verdwijn_keuzedelen').hide();
            $('.beheer_studenten').show();
            $('.beheer_docenten').show();
            $('.beheer_opleiding').show();
            $('.beheer_gebruikers').show();
        }

        else {
            $('.beheer_keuzedelen').animate({
                height: '87vh'
            });
            $(this).removeClass('normal2');
            $(this).addClass('enlarged2');
            $('.normal2').hide('fast');
            $('.beheer_keuzedelen').css("border", 'solid','white', '1');
            $('beheerding_keuzedelen').css("opacity", '1');
            $('.verdwijn_keuzedelen').show();
            $('.beheer_studenten').hide();
            $('.beheer_docenten').hide();
            $('.beheer_opleiding').hide();
            $('.beheer_gebruikers').hide();

        }
    });
    

    });




