
$(document).ready(function() {
    
    
    $(".addkeuze").click(function() {
        $("#keuzes").load("toevoegen.php?beheer=keuzes");
        $('#keuzes').show();
    });
    
    
    $(".addstudenten").click(function() {
        $("#beheerstudenten").load("toevoegen.php?beheer=student");
        $('#beheerstudenten').show();
    });
    
    
    $(".adddocenten").click(function() {
        $("#beheerdocenten").load("toevoegen.php?beheer=docent");
        $('#beheerdocenten').show();
    });
    
    
    $(".addopleidingen").click(function() {
        $("#beheeropleiding").load("toevoegen.php?beheer=opleiding");
        $('#beheeropleiding').show();
    });
    
    
    $(".addgebruikers").click(function() {
        $("#beheergebruikers").load("toevoegen.php?beheer=gebruiker");
        $('#beheergebruikers').show();
    });
    
    
    $(".addlesgroepen").click(function() {
        $("#beheerlesgroepen").load("toevoegen.php?beheer=lesgroep");
        $('#beheerlesgroepen').show();
    });
    
    
    
    //Keuzedelen Beheer.
    $("#sel_keuzedelen").change(function () {
        var oldname = $(this).val();
            
        $.post('ajax_keuzedeel.php', {val: oldname}, function (response) {
            
            var json = JSON.parse(response);
            
            console.log(json.echo);
            
            $("#keuzes").html(json.echo);

            $("#keuzes").text(json[0]);
            $('#keuzes').show();
            
            $(".keuzedropdown").on('click', function(){
                var docentpick = $(this).val();
                $.post('updatekeuzedelen.php', { updateColumn: "Docent_ID", newVal: docentpick, name: oldname, dropdownkeuze: '1'}, function (response) {});
            });
            
            
            $(".namechange").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatekeuzedelen.php', { updateColumn: "Name", newVal: newval, name: oldname}, function (response) {});
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
            
                $(".deletekeuzedeel").click(function() {
                if (confirm("Weet je zeker dat je dit keuzedeel wilt verwijderen?")) {
                $.post('verwijder.php', { name: oldname, table: "Keuzedeel", delcolumn: "Name"}, function (response) {});
            }
                    else {
                        
                    }});
            
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
            
            
            $(".studentdropdown").on('click', function(){
                var gebruikerpick = $(this).val();
                $.post('updatestudenten.php', { updateColumn: "User_ID", newVal: gebruikerpick, name: oldname, dropdownstudent: '1'}, function (response) {});
            });
            
            $(".studentdropdown2").on('click', function(){
                var opleidingpick = $(this).val();
                $.post('updatestudenten.php', { updateColumn: "Opleiding_ID", newVal: opleidingpick, name: oldname, dropdownstudent2: '1'}, function (response) {});
            });
              
                $(".email").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('deletebeheer.php', { updateColumn: "email", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".studnumber").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('deletebeheer.php', { updateColumn: "studentnumber", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".opleiding").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('deletebeheer.php', { updateColumn: "Opleiding_ID", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".delstudenten").click(function() {
                if (confirm("Weet je zeker dat je deze student wilt verwijderen?")) {
                $.post('deletebeheer.php', { name: oldname, table: "Student", delcolumn: "email"}, function (response) {});
                }
                    else {
                        
                 }});
            
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
            
            
            $(".docentdropdown").on('click', function(){
                var gebruikerpick = $(this).val();
                $.post('updatedocenten.php', { updateColumn: "User_ID", newVal: gebruikerpick, name: oldname, dropdowndocent: '1'}, function (response) {});
            });
            
                $(".docemail").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatedocenten.php', { updateColumn: "email", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".abbreviation").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatedocenten.php', { updateColumn: "abbreviation", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".deldocenten").click(function() {
                if (confirm("Weet je zeker dat je deze docent wilt verwijderen?")) {
                $.post('deletebeheer.php', { name: oldname, table: "Docent", delcolumn: "abbreviation"}, function (response) {});
                }
                    else {
                        
                 }});
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
            
            $(".opleidingnaam").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updateopleiding.php', { updateColumn: "Naam", newVal: newval, name: oldname}, function (response) {});
            });
            
            
            $(".keuzedeletedropdown").on('click', function(){
                var gebruikerpick = $(this).val();
                $.post('updatekeuzeopleiding.php', { newVal: gebruikerpick, name: oldname, dropdownkeuzeop: '1'}, function (response) {});
            });
            
            
            $(".keuzeadddropdown").on('click', function(){
                var gebruikerpick = $(this).val();
                $.post('updatekeuzeopleiding.php', { newVal: gebruikerpick, name: oldname, dropdownkeuzeop2: '2'}, function (response) {});
            });
            
                $(".delopleidingen").click(function() {
                if (confirm("Weet je zeker dat je deze opleiding wilt verwijderen?")) {
                $.post('deletebeheer.php', { name: oldname, table: "Opleiding", delcolumn: "Naam"}, function (response) {});
                }
                    else {
                        
                 }});
        });
    });
    $("#sel_gebruikers").change(function () {
         var oldname = $(this).val();
            
        $.post('ajax_gebruikers.php', {val: oldname}, function (response) {
            
            var json = JSON.parse(response);
            
            console.log(json.echo);
            
            $("#beheergebruikers").html(json.echo);

            $("#beheergebruikers").text(json[0]);
            $('#beheergebruikers').show();
            
            
            $(".gebruikersdropdown").on('click', function(){
                var gebruikerpick = $(this).val();
                $.post('updategebruikers.php', { updateColumn: "permission", newVal: gebruikerpick, name: oldname, dropdowngebruiker: '1'}, function (response) {});
            });
            
            
            $(".usernameedit").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updategebruikers.php', { updateColumn: "username", newVal: newval, name: oldname}, function (response) {});
            });
            $(".passwordedit").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updategebruikers.php', { updateColumn: "password", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".delgebruikers").click(function() {
                if (confirm("Weet je zeker dat je deze gebruiker wilt verwijderen?")) {
                $.post('deletebeheer.php', { name: oldname, table: "User", delcolumn: "username"}, function (response) {});
                }
                    else {
                        
                 }});
        });
    });
    $("#sel_lesgroepen").change(function () {
         var oldname = $(this).val();
            
        $.post('ajax_lesgroep.php', {val: oldname}, function (response) {
            
            var json = JSON.parse(response);
            
            console.log(json.echo);
            
            $("#beheerlesgroepen").html(json.echo);

            $("#beheerlesgroepen").text(json[0]);
            $('#beheerlesgroepen').show();
            
            
            $(".lesgroepdropdown").on('click', function(){
                var gebruikerpick = $(this).val();
                $.post('updatelesgroep.php', { updateColumn: "Docent_ID", newVal: gebruikerpick, name: oldname, dropdownles: '1'}, function (response) {});
            });
            
            
            $(".lesgroepdropdown2").on('click', function(){
                var gebruikerpick = $(this).val();
                $.post('updatelesgroep.php', { updateColumn: "Keuzedeel_ID", newVal: gebruikerpick, name: oldname, dropdownles2: '1'}, function (response) {});
            });
            
            $(".keuzedeeledit").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatelesgroep.php', { updateColumn: "Keuzedeel_ID", newVal: newval, name: oldname}, function (response) {});
            });
            
            $(".docentedit").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatelesgroep.php', { updateColumn: "Docent_ID", newVal: newval, name: oldname}, function (response) {});
            });
            
            $(".naamedit").click(function() {
                var newval = prompt("Vul de nieuwe waarde in");
                $.post('updatelesgroep.php', { updateColumn: "naam", newVal: newval, name: oldname}, function (response) {});
            });
            
                $(".dellesgroepen").click(function() {
                if (confirm("Weet je zeker dat je deze lesgroep wilt verwijderen?")) {
                $.post('deletebeheer.php', { name: oldname, table: "Lesgroep", delcolumn: "naam"}, function (response) {});
                }
                    else {
                        
                 }});
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





