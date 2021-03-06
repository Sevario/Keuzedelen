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

    //deadline check

    $deadlinecheck = $conn->prepare("SELECT Date FROM Datum WHERE ID = '1'");

    $deadlinecheck->execute();

    $deadline = $deadlinecheck->fetch(PDO::FETCH_ASSOC);


    if ($user_permissions == "1") {
    
    $result6 = $conn->prepare("SELECT * FROM Student WHERE `User_ID` = $user_id");
    
    $result6->execute();

    $row6 = $result6->fetch(PDO::FETCH_ASSOC);
    
    $student_info = $row6;
    
     
    $result1 = $conn->prepare("SELECT Opleiding_ID FROM Student WHERE ID = $student_info[ID]");

    $result1->execute();

    $row1 = $result1->fetch(PDO::FETCH_ASSOC);

    $opleiding_id =$row1['Opleiding_ID'];
        
    $result2 = $conn->prepare("SELECT Naam FROM Opleiding WHERE ID = $opleiding_id");

    $result2->execute();

    $row2 = $result2->fetch(PDO::FETCH_ASSOC);

    $opleiding_naam =$row2['Naam'];
    
    $result3 = $conn->prepare("SELECT Keuzedeel_ID FROM Keuzedeel_Opleiding WHERE `Opleiding_ID` = $opleiding_id");
    
    $result3->execute();

    $row3 = $result3->fetchAll(PDO::FETCH_ASSOC);
    
    $keuzedelen = $row3;

    $result7 = $conn->prepare("SELECT Keuzedeel_ID FROM Keuzedeel_Student WHERE `Student_ID` = $student_info[ID]");

    $result7->execute();

        $row7 = $result7->fetchAll(PDO::FETCH_ASSOC);

        $keuzedeel_id = $row7;

//    $now = new DateTime();
//    $newnow = $now->format('Y/m/d');
//    $datedeadline = date("Y/m/d",strtotime($deadline['Date']));
//
//        if($datedeadline > $newnow) {
//            
//            $result1 = $conn->prepare("SELECT * FROM Keuzedeel_Student WHERE `Ingeschreven` = 'Y'");
//
//            $result1->execute();
//
//            $row1 = $result1->fetchAll(PDO::FETCH_ASSOC);
//
//            $ingeschreven = $row1;
//            
//            echo "<pre>"; print_r($ingeschreven); echo "</pre>";
//            
//            
//            
//            
//        
//        }
    }
   

    
    

    
    
    if(!isset($login_session))
        {
            $conn = null; 
        }
?>