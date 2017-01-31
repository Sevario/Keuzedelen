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

    $row01 = $result01->fetchALL(PDO::FETCH_ASSOC);

    $arr = array();
    foreach($row01 as $key => $value) {
        array_push($arr, $value["Keuzedeel_ID"]);
    }
   
    
        if (in_array($IDkeuze, $arr)) {

            echo "<div id='inschrijffout' style='
                                    background-color: black;
                                    width: auto;
                                    height: auto;
                                    padding: 10px;
                                    border: 1px solid white;
                                    border-radius: 2px 2px 2px 2px;
                                    margin-left: 35%;
                                    margin-right: 40%;
                                    margin-top: 10%;'><h5 style='color: white;'>Het is niet mogelijk om je twee keer voor hetzelfde keuzedeel op te geven.
                    Je wordt teruggezonden naar de hoofdpagina.</h5></div>"; header("refresh:4;url=dashboard.php");
            }
            else {
            $insert1 = $conn->prepare("INSERT INTO Keuzedeel_Student (`Keuzedeel_ID`, `Student_ID`, `Ingeschreven`) VALUES ($IDkeuze, $student_info[ID], 'Y');");
            $insert1->execute();
            echo "<div id='inschrijffout 'style='
                                    background-color: black;
                                    width: auto;
                                    height: auto;
                                    padding: 10px;
                                    border: 1px solid white;
                                    border-radius: 2px 2px 2px 2px;
                                    margin-left: 35%;
                                    margin-right: 40%;
                                    margin-top: 10%;'><h5 style='color: white;'>Je bent succesvol ingeschreven voor het keuzedeel . ";
            echo "Je wordt teruggezonden naar de hoofdpagina.</h5></div>"; header("refresh:4;url=dashboard.php");

        }
    } 
Else {
echo "An unexpected error has occurred.";
}
?>
</html>