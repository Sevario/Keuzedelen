<?php

require "session.php";

$value = $_POST['val'];
$value2 = $_POST['val2'];

$result021 = $conn->prepare("UPDATE Keuzedeel SET Name='$value' WHERE ");

    $result021->execute();

    $row021 = $result021->fetch(PDO::FETCH_ASSOC);

    $keuzeinfo = $row021;
