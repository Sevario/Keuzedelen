<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Lesgroep` SET `$column`='$newval' WHERE `Naam` = '$name'";

echo $newval;

$result021 = $conn->prepare("UPDATE `Lesgroep` SET `$column`='$newval' WHERE `Naam` = '$name'");

    $result021->execute();