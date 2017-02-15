<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

if (!empty($_POST['dropdownkeuze'])) {
        $resultgetkeuze3 = $conn->prepare("SELECT ID FROM Docent WHERE abbreviation = '$newval'");
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetch(PDO::FETCH_ASSOC);

        $newval = $rowkeuze3['ID'];
}

echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Keuzedeel` SET `$column`='$newval' WHERE `Name` = '$name'";

$result021 = $conn->prepare("UPDATE `Keuzedeel` SET `$column`='$newval' WHERE `Name` = '$name'");

    $result021->execute();