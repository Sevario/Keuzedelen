<?php
include('session.php');
        if ($_POST['checkding'] == 'keuzedelen') {
            $resultgetkeuze3 = $conn->prepare("SELECT ID FROM Docent WHERE abbreviation = '$_POST[docent]'");
    
            $resultgetkeuze3->execute();
            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3[0];

            echo "<br>";

            $result = $conn->prepare("INSERT INTO Keuzedeel (Name, MaxStudents, MinStudents, Information, Docent_ID, Code) VALUES('$_POST[naam]', '$_POST[maxstuds]', '$_POST[minstuds]', '$_POST[info]', '$arraykeuzen3[ID]', '$_POST[kcode]')");
            print_r($result);
            $result->execute();
        }
        
        if ($_POST['checkding'] == 'student') {
            $resultgetkeuze3 = $conn->prepare("SELECT ID FROM Opleiding WHERE Naam = '$_POST[opleiding]'");
    
            $resultgetkeuze3->execute();
            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3[0];

            echo "<br>";

            $result = $conn->prepare("INSERT INTO Student (email, studentnumber, Opleiding_ID) VALUES('$_POST[email]', '$_POST[studnr]', '$arraykeuzen3[ID]')");
            print_r($result);
            $result->execute();
        }
        
        if ($_POST['checkding'] == 'docent') {
            $resultgetkeuze3 = $conn->prepare("SELECT ID FROM User WHERE username = '$_POST[user]'");
    
            $resultgetkeuze3->execute();
            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3[0];
            $result = $conn->prepare("INSERT INTO Docent (email, abbreviation, User_ID) VALUES('$_POST[email]', '$_POST[abbreviation]', '$arraykeuzen3[ID]')");
            print_r($result);
            $result->execute();
        }
        
        
        if ($_POST['checkding'] == 'opleiding') {
            $result = $conn->prepare("INSERT INTO Opleiding (Naam) VALUES('$_POST[naam]')");
            print_r($result);
            $result->execute();
        }
        
        if ($_POST['checkding'] == 'gebruiker') {
            $result = $conn->prepare("INSERT INTO User (username, password, permission) VALUES('$_POST[user]', '$_POST[password]', '$_POST[permissions]')");
            print_r($result);
            $result->execute();
        }
        
        if ($_POST['checkding'] == 'lesgroep') {
            
            $resultgetkeuze3 = $conn->prepare("SELECT ID FROM Keuzedeel WHERE Name = '$_POST[keuzedeel]'");
    
            $resultgetkeuze3->execute();
            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3[0];
            
            $resultgetkeuze4 = $conn->prepare("SELECT ID FROM Docent WHERE abbreviation = '$_POST[docent]'");
    
            $resultgetkeuze4->execute();
            $rowkeuze4 = $resultgetkeuze4->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen4 = $rowkeuze4[0];
            $result = $conn->prepare("INSERT INTO Lesgroep (naam, Docent_ID, Keuzedeel_ID) VALUES('$_POST[naam]', '$arraykeuzen4[ID]', '$arraykeuzen3[ID]')");
            print_r($result);
            $result->execute();
        }


