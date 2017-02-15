<?php
include('session.php');


    $result24 = $conn->prepare("DELETE FROM `Keuzedeel_Student` WHERE Keuzedeel_ID = '$_GET[keuzedeelID]' AND Student_ID = '$student_info[ID]'");
    print_r($result24);
    $result24->execute();

    header("Location: account.php");
    
  