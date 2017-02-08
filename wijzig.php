<?php
include('session.php');

$wijzigst = $conn->prepare("UPDATE Keuzedeel_Student SET Passed='Y' WHERE Keuzedeel_ID = $_GET[kd] AND Student_ID = $_GET[sd]");

$wijzigst->execute();


//$result24 = $conn->prepare("DELETE FROM `Keuzedeel_Student` WHERE Keuzedeel_id = :Keuzedeel_id AND Student_id = :Student_id");
//
//$result24->execute(array(':Keuzedeel_id' => $_POST["keuzedeelID"],":Student_id"=>$user_id));

header("Location: dashboarddocent.php");