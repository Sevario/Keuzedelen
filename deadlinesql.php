<?php
  include('session.php');
            $datedeadline = date("Y/m/d",strtotime($_POST['datum']));
            $resultgetkeuze3 = $conn->prepare("UPDATE Datum SET Date = '$datedeadline' WHERE ID = '1'");
    
            $resultgetkeuze3->execute();
            
            header("Location: deadline.php");