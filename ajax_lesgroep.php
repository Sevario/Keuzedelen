<?php
require "session.php";

$value = $_POST['val'];

$result001 = $conn->prepare("SELECT * FROM Lesgroep WHERE naam = '$value'");

    $result001->execute();

    $row001 = $result001->fetch(PDO::FETCH_ASSOC);

    $lesgroepinfo = $row001;
    
$result002 = $conn->prepare("SELECT Name FROM Keuzedeel WHERE ID = '$lesgroepinfo[Keuzedeel_ID]'");

    $result002->execute();

    $row002 = $result002->fetch(PDO::FETCH_ASSOC);

    $keuzename = $row002;
    
$result003 = $conn->prepare("SELECT abbreviation FROM Docent WHERE ID = '$lesgroepinfo[Docent_ID]'");

    $result003->execute();

    $row003 = $result003->fetch(PDO::FETCH_ASSOC);

    $docentabb = $row003;
    
        $resultgetkeuze3 = $conn->prepare('SELECT abbreviation FROM Docent');
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

        $docenten = $rowkeuze3;
        
        
        $resultgetkeuze3 = $conn->prepare('SELECT Name FROM Keuzedeel');
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

        $keuzedelenles = $rowkeuze3;
    
    function ReadyLesDrop($docenten){
        $str = "";
        
        $str .= "<select name='docenten' class='blacktext lesgroepdropdown'><option>Kies de Docent</option>";
        foreach ($docenten as $row) {
            $str .= "<option value=\"" . $row['abbreviation'] . "\">" . $row['abbreviation'] . "</option>";
        }
            
        $str .= "</select> &nbsp; &nbsp;";
        return $str;
    }
    
      function ReadyLesDrop2($keuzedelenles){
        $str = "";
        
        $str .= "<select name='docenten' class='blacktext lesgroepdropdown2'><option>Kies het Keuzedeel</option>";
        foreach ($keuzedelenles as $row) {
            $str .= "<option value=\"" . $row['Name'] . "\">" . $row['Name'] . "</option>";
        }
            
        $str .= "</select> &nbsp; &nbsp;";
        return $str;
    }
    



$html = "
        <link rel='stylesheet' type='text/css' href='/keuzedelen/ajax.css' media='screen' />
 

<table class='table-fill'>
            <thead>
                <tr>
                    <th class='text-left'>ID</th>
                    <th class='text-left'>Naam</th>
                    <th class='text-left'>Docent</th>
                    <th class='text-left'>Keuzedeel</th>
                </tr>
            </thead>
             <tbody class='table-hover'>
            <tr>
                <td>
                    $lesgroepinfo[ID]
                </td>
                <td>
                    $lesgroepinfo[naam]
                </td>
                <td>
                    $docentabb[abbreviation]
                </td>
                <td>
                    $keuzename[Name]
                </td>
            </tr>
            <tr>
                <td>
                    <button class='dellesgroepen'>Delete</button>
                </td>
                <td>
                    <button class='naamedit'>Edit</button>
                </td>
                <td>". 
                     ReadyLesDrop($docenten)
                ."</td>
                <td>".
                      ReadyLesDrop2($keuzedelenles)
                ."</td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>

