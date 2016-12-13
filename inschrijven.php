<?php
include('session.php');

if (isset( $_GET["kd"]) && !empty($_GET["kd"]))
{
    $IDkeuze = $_GET["kd"];
     
    $result01 = $conn->prepare("SELECT Keuzedeel_ID FROM Keuzedeel_Student WHERE Student_ID = $student_info[ID]");
    
    $result01->execute();

    $row01 = $result01->fetch(PDO::FETCH_ASSOC);
     
    if ($row01 == !$IDkeuze ) {
        $insert1 = $conn->prepare("INSERT INTO Keuzedeel_Student (`Keuzedeel_ID`, `Student_ID`, `Ingeschreven`) VALUES ($IDkeuze, $student_info[User_ID], 'Y');");

        $insert1->execute();
        $result4 = $conn->prepare("SELECT * FROM Keuzedeel WHERE ID = $IDkeuze"); 
        echo "<h1>Je bent succesvol ingeschreven voor het Keuzedeel:" . $IDkeuze . "</h1>";
    
         }
        else {
              echo "<h1>Het is niet mogelijk om je twee keer voor hetzelfde Keuzedeel op te geven.";
            }
    } 
    Else {
    echo "An unexpected error has occurred.";
}