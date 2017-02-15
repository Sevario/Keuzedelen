<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

echo $_POST['dropdownles'];
echo "<br>";
echo $newval;
echo "<br>";

if (!empty($_POST['dropdownles2'])) {
        $resultgetkeuze3 = $conn->prepare("SELECT ID FROM Keuzedeel WHERE Name = '$newval'");
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetch(PDO::FETCH_ASSOC);

        $newval = $rowkeuze3['ID'];
}

if (!empty($_POST['dropdownles'])) {
        $resultgetkeuze3 = $conn->prepare("SELECT ID FROM Docent WHERE abbreviation = '$newval'");
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetch(PDO::FETCH_ASSOC);

        $newval = $rowkeuze3['ID'];
}

echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Lesgroep` SET `$column`='$newval' WHERE `Naam` = '$name'";


$result021 = $conn->prepare("UPDATE `Lesgroep` SET `$column`='$newval' WHERE `Naam` = '$name'");

    $result021->execute();