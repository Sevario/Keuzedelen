<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Keuzedeel` SET `$column`='$newval' WHERE `Name` = '$name'";

$result021 = $conn->prepare("UPDATE `Keuzedeel` SET `$column`='$newval' WHERE `Name` = '$name'");

    $result021->execute();