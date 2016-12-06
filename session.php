<?php
    $dbhost     = "92.222.169.67";
    $dbname     = "Keuzedelen";
    $dbuser     = "root";
    $dbpass     = "garage";

    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

    session_start();
    $user_check=$_SESSION['login_user'];

    $result = $conn->prepare("SELECT * FROM User WHERE username = :user_check");
    
    $result->execute(array(":user_check"=>$user_check));
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $login_session =$row['username'];
    $user_id =$row['ID'];
    $user_passwords = $row['password'];
    $user_permissions = $row['permission'];

    $result = $conn->prepare("SELECT Opleiding_ID FROM Student WHERE ID = $user_id");

    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $opleiding_id =$row['Opleiding_ID'];

    $result = $conn->prepare("SELECT Naam FROM Opleiding WHERE ID = $opleiding_id");

    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $opleiding_naam =$row['Naam'];
    
    if(!isset($login_session))
        {
            $conn = null; 
        }
?>