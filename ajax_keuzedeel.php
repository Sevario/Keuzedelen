<?php
require "session.php";

$value = $_POST['val'];

$result001 = $conn->prepare("SELECT * FROM Keuzedeel WHERE Name = '$value'");

        $result001->execute();

        $row001 = $result001->fetch(PDO::FETCH_ASSOC);

        $keuzeinfo = $row001;

    
    $result002 = $conn->prepare("SELECT abbreviation FROM Docent WHERE ID = $keuzeinfo[Docent_ID]");

        $result002->execute();

        $row002 = $result002->fetch(PDO::FETCH_ASSOC);

        $docent_naam = $row002;

    $resultgetkeuze3 = $conn->prepare('SELECT abbreviation FROM Docent');
    
        $resultgetkeuze3->execute();

        $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

        $docenten = $rowkeuze3;
    
    function ReadyKeuzeDrop($docenten){
        $str = "";
        
        $str .= "<select name='docenten' class='keuzedrop'><option>Kies de Docent</option>";
        foreach ($docenten as $row) {
            $str .= "<option value=\"" . $row['abbreviation'] . "\">" . $row['abbreviation'] . "</option>";
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
                    <th class='text-left'>Min Students</th>
                    <th class='text-left'>Max Students</th>
                    <th class='text-left'>Informatie</th>
                    <th class='text-left'>Docent</th>
                    <th class='text-left'>K-Code</th>
                </tr>
            </thead>
             <tbody class='table-hover'>
            <tr>
                <td>
                    $keuzeinfo[ID]
                </td>
                <td>
                    $keuzeinfo[Name]
                </td>
                <td>
                    $keuzeinfo[MinStudents]
                </td>
                <td>
                    $keuzeinfo[MaxStudents]
                </td>
                <td>
                    $keuzeinfo[Information]
                </td>
                <td>
                    $docent_naam[abbreviation]
                </td>
                <td>
                    $keuzeinfo[Code]
                </td>
            </tr>
            <tr>
                <td>
                    <button class='deletekeuzedeel'>Delete</button>
                </td>
                <td>
                    <button class='namechange'>Edit</button>
                </td>
                <td>
                    <button class='minstuds'>Edit</button>
                </td>
                <td>
                    <button class='maxstuds'>Edit</button>
                </td>
                <td>
                    <button class='info'>Edit</button>
                </td>
                <td>" .
                    ReadyKeuzeDrop($docenten)
                . "</td>
                <td> 
                <button class='kcode'>Edit</button>
                </td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>
