<?php
    $dbhost     = "92.222.169.67";
    $dbname     = "Keuzedelen";
    $dbuser     = "root";
    $dbpass     = "garage";

    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

    session_start();
    $user_check=$_SESSION['login_user'];

    $result = $conn->prepare("SELECT * FROM register WHERE email = :user_check");
                                                             /*^^^*/
    $result->execute(array(":usercheck"=>$user_check));
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $login_session =$row['email'];
    $user_id =$row['id'];
    $user_passwords = $row['password'];

    if(!isset($login_session))
        {
            $conn = null; 
            header('Location: index.php');
        }
?>