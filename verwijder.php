<?php
include('session.php');
    print_r($_POST);

    $result24 = $conn->prepare("DELETE FROM `Keuzedeel_Student` WHERE Keuzedeel_id = :Keuzedeel_id AND Student_id = :Student_id");

    $result24->execute(array(':Keuzedeel_id' => $_POST["keuzedeelID"],":Student_id"=>$user_id));

    header("Location: account.php")

    ?>