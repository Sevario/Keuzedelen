<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

if (!empty($_POST['dropdowndocent'])) {
        $resultgetkeuze3 = $conn->prepare("SELECT ID FROM User WHERE username = '$newval'");
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetch(PDO::FETCH_ASSOC);

        $newval = $rowkeuze3['ID'];
}


echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Docent` SET `$column`='$newval' WHERE `abbreviation` = '$name'";


$result021 = $conn->prepare("UPDATE `Docent` SET `$column`='$newval' WHERE `abbreviation` = '$name'");

    $result021->execute();