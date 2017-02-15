<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];



if (!empty($_POST['dropdownstudent'])) {
        $resultgetkeuze3 = $conn->prepare("SELECT ID FROM User WHERE username = '$newval'");
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetch(PDO::FETCH_ASSOC);

        $newval = $rowkeuze3['ID'];
}


if (!empty($_POST['dropdownstudent2'])) {
        $resultgetkeuze3 = $conn->prepare("SELECT ID FROM Opleiding WHERE Naam = '$newval'");
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetch(PDO::FETCH_ASSOC);

        $newval = $rowkeuze3['ID'];
}


echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Student` SET `$column`='$newval' WHERE `email` = '$name'";

$result021 = $conn->prepare("UPDATE `Student` SET `$column`='$newval' WHERE `email` = '$name'");

    $result021->execute();