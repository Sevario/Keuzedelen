<?php
include('session.php');
    print_r($_POST);
    

    $result24 = $conn->prepare("DELETE FROM $_POST[table] WHERE $_POST[delcolumn]='$_POST[name]'");
    echo "<br>";
    print_r($result24);
    $result24->execute();
