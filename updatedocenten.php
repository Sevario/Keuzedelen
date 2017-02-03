<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Docent` SET `$column`='$newval' WHERE `abbreviation` = '$name'";

echo $newval;

$result021 = $conn->prepare("UPDATE `Docent` SET `$column`='$newval' WHERE `abbreviation` = '$name'");

    $result021->execute();