<?php

require "session.php";

$newval = $_POST['newVal'];
$name = $_POST['name'];
$column = $_POST["updateColumn"];

echo $newval . " | " . $name . " | " . $column . " | " . "UPDATE `Student` SET `$column`='$newval' WHERE `studentnumber` = '$name'";

$result021 = $conn->prepare("UPDATE `Student` SET `$column`='$newval' WHERE `studentnumber` = '$name'");

    $result021->execute();