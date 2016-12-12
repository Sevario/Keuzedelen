<?php
include('session.php');

if (isset( $_GET["kd"]) && !empty($_GET["kd"]))
{
    $IDkeuze = $_GET["kd"];
     
     
    $insert1 = $conn->prepare("INSERT INTO Keuzedeel_Student (`Keuzedeel_ID`, `Student_ID`, `Ingeschreven`) VALUES ($IDkeuze, $student_info[User_ID], 'Y');");

    $insert1->execute();
    
} 
    Else {
    echo "An unexpected error has occurred.";
}