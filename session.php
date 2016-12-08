<?php
    $dbhost     = "92.222.169.67";
    $dbname     = "Keuzedelen";
    $dbuser     = "root";
    $dbpass     = "garage";

    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

    session_start();
    $user_check=$_SESSION['login_user'];

    $result0 = $conn->prepare("SELECT * FROM User WHERE username = :user_check");
    
    $result0->execute(array(":user_check"=>$user_check));
    $row0 = $result0->fetch(PDO::FETCH_ASSOC);

    $login_session =$row0['username'];
    $user_id =$row0['ID'];
    $user_passwords = $row0['password'];
    $user_permissions = $row0['permission'];

    $result1 = $conn->prepare("SELECT Opleiding_ID FROM Student WHERE ID = $user_id");

    $result1->execute();

    $row1 = $result1->fetch(PDO::FETCH_ASSOC);

    $opleiding_id =$row1['Opleiding_ID'];

    $result2 = $conn->prepare("SELECT Naam FROM Opleiding WHERE ID = $opleiding_id");

    $result2->execute();

    $row2 = $result2->fetch(PDO::FETCH_ASSOC);

    $opleiding_naam =$row2['Naam'];
    
    $result3 = $conn->prepare("SELECT Keuzedeel_ID FROM Keuzedeel_Opleiding WHERE `Opleiding_ID` = $opleiding_id LIMIT 0 , 30");
    
    $result3->execute();

    $row3 = $result3->fetchAll(PDO::FETCH_ASSOC);
    
    $keuzedelen = $row3;
    
    
    if(!isset($login_session))
        {
            $conn = null; 
        }
?>