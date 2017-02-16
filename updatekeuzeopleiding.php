<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];

$result2 = $conn->prepare("SELECT ID FROM Keuzedeel WHERE Name = '$newval'");
    
    $result2->execute();
    
    $rowkeuzes2 = $result2->fetch(2);
    
    $result3 = $conn->prepare("SELECT ID FROM Opleiding WHERE Naam = '$name'");
    
    $result3->execute();
    
    $rowkeuzes3 = $result3->fetch(3);
    

if (!empty($_POST['dropdownkeuzeop2'])){

    
    $result4 = $conn->prepare("SELECT Keuzedeel_ID FROM Keuzedeel_Opleiding WHERE Keuzedeel_ID = '$rowkeuzes2[ID]' AND Opleiding_ID = '$rowkeuzes3[0]'");
    
    $result4->execute();
    $rowkeuzes4 = $result4->fetch(4);
    
    if (empty($rowkeuzes4)) {
    $result021 = $conn->prepare("INSERT INTO Keuzedeel_Opleiding (Keuzedeel_ID, Opleiding_ID) VALUES ($rowkeuzes2[ID], $rowkeuzes3[0])");

    $result021->execute();
    }
}

if (!empty($_POST['dropdownkeuzeop'])){

$result021 = $conn->prepare("DELETE FROM Keuzedeel_Opleiding WHERE Keuzedeel_ID = '$rowkeuzes2[ID]' AND Opleiding_ID = '$rowkeuzes3[0]'");

$result021->execute();

}