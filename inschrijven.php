<?php
include('session.php');

if (isset( $_GET["kd"]) && !empty($_GET["kd"]))
{
    $IDkeuze = $_GET["kd"];
  print_r($IDkeuze);

    
} 
    Else {
    echo "An unexpected error has occurred.";
}