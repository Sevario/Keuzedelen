
$(document).ready(function() {

    // $("select").change(function() {
    //
    //     console.log($("select option:selected").val());
    // });
    
    
    //Keuzedelen Beheer.
    $("#sel_keuzedelen").change(function () {
        var oldname = $(this).val();
            
        $.post('ajax_keuzedeel.php', {val: oldname}, function (response) {
            
            var json = JSON.parse(response);
            
            console.log(json.echo);
            
            $("#keuzes").html(json.echo);

            $("#keuzes").text(json[0]);
            $('#keuzes').show();
            
            
            $(".namechange").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatekeuzedelen.php', { updateColumn: "Name", newName: newval, name: oldname}, function (response) {});
            });
            
                $(".minstuds").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatekeuzedelen.php', { updateColumn: "MinStudents", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".maxstuds").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatekeuzedelen.php', { updateColumn: "MaxStudents", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".info").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatekeuzedelen.php', { updateColumn: "Information", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".docent").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatekeuzedelen.php', { updateColumn: "Docent_ID", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".kcode").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatekeuzedelen.php', { updateColumn: "Code", newVal: newval, name: oldname}, function (response) {});
            });
            
        });
    });
    $("#sel_studenten").change(function () {
         var oldname = $(this).val();
            
        $.post('ajax_studenten.php', {val: oldname}, function (response) {
            
            var json = JSON.parse(response);
            
            console.log(json.echo);
            
            $("#beheerstudenten").html(json.echo);

            $("#beheerstudenten").text(json[0]);
            $('#beheerstudenten').show();
            
        });
    });
    $("#sel_docenten").change(function () {
         var oldname = $(this).val();
            
        $.post('ajax_docenten.php', {val: oldname}, function (response) {
            
            var json = JSON.parse(response);
            
            console.log(json.echo);
            
            $("#beheerdocenten").html(json.echo);

            $("#beheerdocenten").text(json[0]);
            $('#beheerdocenten').show();
        });
    });
    $("#sel_opleiding").change(function () {
         var oldname = $(this).val();
            
        $.post('ajax_opleiding.php', {val: oldname}, function (response) {
            
            var json = JSON.parse(response);
            
            console.log(json.echo);
            
            $("#beheeropleiding").html(json.echo);

            $("#beheeropleiding").text(json[0]);
            $('#beheeropleiding').show();
        });
    });
    $("#sel_gebruikers").change(function () {
        $.post('my_ajax_receiver.php', 'val=' + $(this).val(), function (response) {
            var json = JSON.parse(response);

            $("#keuzes5").text(json[0]);
            $('#keuzes5').show();
        });
    });
    $("#sel_lesgroepen").change(function () {
        $.post('my_ajax_receiver.php', 'val=' + $(this).val(), function (response) {
            var json = JSON.parse(response);

            $("#keuzes6").text(json[0]);
            $('#keuzes6').show();
        });
    });


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
            $('.verdwijn_lesgroepen').hide();
    $('.normal2').click(function () {
        if ($(this).hasClass('enlarged2')) {
            $('.beheer_keuzedelen').animate({
                width:  '84%',
                height: 53
            });
            $(this).removeClass('enlarged2');
            $(this).addClass('normal2');
            $('.normal2').show('fast');
            $('.beheer_keuzedelen').css("border", '');
            $('h2').css("opacity", '0.6');
            $('beheerding_keuzedelen').css("opacity", '0.6');
            $('.verdwijn_keuzedelen').hide();
            $('.beheer_studenten').show();
            $('.beheer_docenten').show();
            $('.beheer_opleiding').show();
            $('.beheer_gebruikers').show();
            $('.beheer_lesgroepen').show();
            $('#keuzes').hide();
        }

        else {
            $('.beheer_keuzedelen').animate({
                height: '87vh'
            });
            $(this).removeClass('normal2');
            $(this).addClass('enlarged2');
            $('.normal2').hide('fast');
            $('h2').css("opacity", '1');
            $('.beheer_keuzedelen').css("border", 'solid','white', '1');
            $('beheerding_keuzedelen').css("opacity", '1');
            $('.verdwijn_keuzedelen').show();
            $('.beheer_studenten').hide();
            $('.beheer_docenten').hide();
            $('.beheer_opleiding').hide();
            $('.beheer_gebruikers').hide();
            $('.beheer_lesgroepen').hide();


        }
    });
    
  $.each($('.beheerding_studenten'), function(key, value) {
        $(value).addClass('normal3');
    });
            $('.verdwijn_studenten').hide();
            $('.verdwijn_keuzedelen').hide();
            $('.verdwijn_docenten').hide();
            $('.verdwijn_opleiding').hide();
            $('.verdwijn_gebruikers').hide();
            $('.verdwijn_lesgroepen').hide();
    $('.normal3').click(function () {
        if ($(this).hasClass('enlarged2')) {
            $('.beheer_studenten').animate({
                width:  '84%',
                height: 53
            });
            $(this).removeClass('enlarged2');
            $(this).addClass('normal3');
            $('.normal3').show('fast');
            $('.beheer_studenten').css("border", '');
            $('h2').css("opacity", '0.6');
            $('beheerding_studenten').css("opacity", '0.6');
            $('.verdwijn_studenten').hide();
            $('.beheer_keuzedelen').show();
            $('.beheer_docenten').show();
            $('.beheer_opleiding').show();
            $('.beheer_gebruikers').show();
            $('.beheer_lesgroepen').show();
            $('#beheerstudenten').hide();
        }

        else {
            $('.beheer_studenten').animate({
                height: '87vh'
            });
            $(this).removeClass('normal3');
            $(this).addClass('enlarged2');
            $('.normal3').hide('fast');
            $('h2').css("opacity", '1');
            $('.beheer_studenten').css("border", 'solid','white', '1');
            $('beheerding_studenten').css("opacity", '1');
            $('.verdwijn_studenten').show();
            $('.beheer_keuzedelen').hide();
            $('.beheer_docenten').hide();
            $('.beheer_opleiding').hide();
            $('.beheer_gebruikers').hide();
            $('.beheer_lesgroepen').hide();

        }
    });

    $.each($('.beheerding_docenten'), function(key, value) {
            $(value).addClass('normal4');
        });
                $('.verdwijn_docenten').hide();
                $('.verdwijn_keuzedelen').hide();
                $('.verdwijn_studenten').hide();
                $('.verdwijn_opleiding').hide();
                $('.verdwijn_gebruikers').hide();
                $('.verdwijn_lesgroepen').hide();
        $('.normal4').click(function () {
            if ($(this).hasClass('enlarged2')) {
                $('.beheer_docenten').animate({
                    width:  '84%',
                    height: 53
                });
                $(this).removeClass('enlarged2');
                $(this).addClass('normal4');
                $('.normal4').show('fast');
                $('.beheer_docenten').css("border", '');
                $('h2').css("opacity", '0.6');
                $('beheerding_docenten').css("opacity", '0.6');
                $('.verdwijn_docenten').hide();
                $('.beheer_keuzedelen').show();
                $('.beheer_studenten').show();
                $('.beheer_opleiding').show();
                $('.beheer_gebruikers').show();
                $('.beheer_lesgroepen').show();
                $('#beheerdocenten').hide();
            }

            else {
                $('.beheer_docenten').animate({
                    height: '87vh'
                });
                $(this).removeClass('normal4');
                $(this).addClass('enlarged2');
                $('.normal4').hide('fast');
                $('h2').css("opacity", '1');
                $('.beheer_docenten').css("border", 'solid','white', '1');
                $('beheerding_docenten').css("opacity", '1');
                $('.verdwijn_docenten').show();
                $('.beheer_keuzedelen').hide();
                $('.beheer_studenten').hide();
                $('.beheer_opleiding').hide();
                $('.beheer_gebruikers').hide();
                $('.beheer_lesgroepen').hide();

            }
        });
        $.each($('.beheerding_opleiding'), function(key, value) {
            $(value).addClass('normal5');
        });
                $('.verdwijn_opleiding').hide();
                $('.verdwijn_keuzedelen').hide();
                $('.verdwijn_studenten').hide();
                $('.verdwijn_docenten').hide();
                $('.verdwijn_gebruikers').hide();
                $('.verdwijn_lesgroepen').hide();
        $('.normal5').click(function () {
            if ($(this).hasClass('enlarged2')) {
                $('.beheer_opleiding').animate({
                    width:  '84%',
                    height: 53
                });
                $(this).removeClass('enlarged2');
                $(this).addClass('normal5');
                $('.normal5').show('fast');
                $('.beheer_opleiding').css("border", '');
                $('h2').css("opacity", '0.6');
                $('beheerding_opleiding').css("opacity", '0.6');
                $('.verdwijn_opleiding').hide();
                $('.beheer_keuzedelen').show();
                $('.beheer_studenten').show();
                $('.beheer_docenten').show();
                $('.beheer_gebruikers').show();
                $('.beheer_lesgroepen').show();
                $('#beheeropleiding').hide();
            }

            else {
                $('.beheer_opleiding').animate({
                    height: '87vh'
                });
                $(this).removeClass('normal5');
                $(this).addClass('enlarged2');
                $('.normal5').hide('fast');
                $('h2').css("opacity", '1');
                $('.beheer_opleiding').css("border", 'solid','white', '1');
                $('beheerding_opleiding').css("opacity", '1');
                $('.verdwijn_opleiding').show();
                $('.beheer_keuzedelen').hide();
                $('.beheer_studenten').hide();
                $('.beheer_docenten').hide();
                $('.beheer_gebruikers').hide();
                $('.beheer_lesgroepen').hide();

            }
        });
        $.each($('.beheerding_gebruikers'), function(key, value) {
            $(value).addClass('normal6');
        });
                $('.verdwijn_gebruikers').hide();
                $('.verdwijn_keuzedelen').hide();
                $('.verdwijn_studenten').hide();
                $('.verdwijn_docenten').hide();
                $('.verdwijn_opleiding').hide();
                $('.verdwijn_lesgroepen').hide();
        $('.normal6').click(function () {
            if ($(this).hasClass('enlarged2')) {
                $('.beheer_gebruikers').animate({
                    width:  '84%',
                    height: 53
                });
                $(this).removeClass('enlarged2');
                $(this).addClass('normal6');
                $('.normal6').show('fast');
                $('.beheer_gebruikers').css("border", '');
                $('h2').css("opacity", '0.6');
                $('beheerding_gebruikers').css("opacity", '0.6');
                $('.verdwijn_gebruikers').hide();
                $('.beheer_keuzedelen').show();
                $('.beheer_studenten').show();
                $('.beheer_docenten').show();
                $('.beheer_opleiding').show();
                $('.beheer_lesgroepen').show();
                $('#beheergebruikers').hide();
            }

            else {
                $('.beheer_gebruikers').animate({
                    height: '87vh'
                });
                $(this).removeClass('normal6');
                $(this).addClass('enlarged2');
                $('.normal6').hide('fast');
                $('h2').css("opacity", '1');
                $('.beheer_gebruikers').css("border", 'solid','white', '1');
                $('beheerding_gebruikers').css("opacity", '1');
                $('.verdwijn_gebruikers').show();
                $('.beheer_keuzedelen').hide();
                $('.beheer_studenten').hide();
                $('.beheer_docenten').hide();
                $('.beheer_opleiding').hide();
                $('.beheer_lesgroepen').hide();

            }
        });
    $.each($('.beheerding_lesgroepen'), function(key, value) {
        $(value).addClass('normal7');
    });
    $('.verdwijn_gebruikers').hide();
    $('.verdwijn_keuzedelen').hide();
    $('.verdwijn_studenten').hide();
    $('.verdwijn_docenten').hide();
    $('.verdwijn_opleiding').hide();
    $('.verdwijn_lesgroepen').hide();
    $('.normal7').click(function () {
        if ($(this).hasClass('enlarged2')) {
            $('.beheer_lesgroepen').animate({
                width:  '84%',
                height: 53
            });
            $(this).removeClass('enlarged2');
            $(this).addClass('normal7');
            $('.normal7').show('fast');
            $('.beheer_lesgroepen').css("border", '');
            $('h2').css("opacity", '0.6');
            $('beheerding_lesgroepen').css("opacity", '0.6');
            $('.verdwijn_lesgroepen').hide();
            $('.beheer_keuzedelen').show();
            $('.beheer_studenten').show();
            $('.beheer_docenten').show();
            $('.beheer_opleiding').show();
            $('.beheer_gebruikers').show();
            $('#beheerlesgroepen').hide();
        }

        else {
            $('.beheer_lesgroepen').animate({
                height: '87vh'
            });
            $(this).removeClass('normal7');
            $(this).addClass('enlarged2');
            $('.normal7').hide('fast');
            $('h2').css("opacity", '1');
            $('.beheer_lesgroepen').css("border", 'solid','white', '1');
            $('beheerding_lesgroepen').css("opacity", '1');
            $('.verdwijn_lesgroepen').show();
            $('.beheer_keuzedelen').hide();
            $('.beheer_studenten').hide();
            $('.beheer_docenten').hide();
            $('.beheer_opleiding').hide();
            $('.beheer_gebruikers').hide();

        }
    });
    });





