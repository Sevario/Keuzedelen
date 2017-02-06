<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Opleiding` SET `$column`='$newval' WHERE `Naam` = '$name'";

echo $newval;

$result021 = $conn->prepare("UPDATE `Opleiding` SET `$column`='$newval' WHERE `Naam` = '$name'");

    $result021->execute();