<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/keuzedelen/bootstrap/css/bootstrap.min.css"  />
        <link rel="stylesheet" type="text/css" href="/keuzedelen/style.css" media="screen" />
    </head>


<?php
include('session.php');

if (isset( $_GET["kd"]) && !empty($_GET["kd"]))
{
    $IDkeuze = $_GET["kd"];
     
    $result01 = $conn->prepare("SELECT Keuzedeel_ID FROM Keuzedeel_Student WHERE Student_ID = $student_info[ID]");
    
    $result01->execute();

    $row01 = $result01->fetch(PDO::FETCH_ASSOC);
     
    if ($row01 == !$IDkeuze ) {
        $insert1 = $conn->prepare("INSERT INTO Keuzedeel_Student (`Keuzedeel_ID`, `Student_ID`, `Ingeschreven`) VALUES ($IDkeuze, $student_info[ID], 'Y');");

        $insert1->execute();
        $result4 = $conn->prepare("SELECT * FROM Keuzedeel WHERE ID = $IDkeuze"); 
        echo "<h1>Je bent succesvol ingeschreven voor het Keuzedeel: " . $IDkeuze . "</h1>";
    
         }
        else {
              echo "<div id='inschrijffout' style=
                                            'background-color: black;
                                            width: 350px;
                                            height: auto;
                                            padding: 10px;
                                            border: 1px solid white;
                                            border-radius: 2px 2px 2px 2px;
                                            margin-left: 35%;
                                            margin-right: 40%;
                                            margin-top: 10%;'><h5 style='color: white;'>Het is niet mogelijk om je twee keer voor hetzelfde keuzedeel op te geven,
                    Je wordt teruggezonden naar de hoofdpagina.</h5></div>"; header("refresh:2;url=dashboard.php");
            }
    } 
    Else {
    echo "An unexpected error has occurred.";
}
?>
</html>