<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `User` SET `$column`='$newval' WHERE `username` = '$name'";

echo $newval;

$result021 = $conn->prepare("UPDATE `User` SET `$column`='$newval' WHERE `username` = '$name'");

    $result021->execute();