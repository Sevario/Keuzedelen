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



$html = "
        <link rel='stylesheet' type='text/css' href='/keuzedelen/ajax.css' media='screen' />
 

<table class='table-fill'>
            <thead>
                <tr>
                    <th class='text-left'>ID</th>
                    <th class='text-left'>Keuzedeel</th>
                    <th class='text-left'>Docent</th>
                    <th class='text-left'>Naam</th>
                </tr>
            </thead>
             <tbody class='table-hover'>
            <tr>
                <td>
                    $lesgroepinfo[ID]
                </td>
                <td>
                    $keuzename[Name]
                </td>
                <td>
                    $docentabb[abbreviation]
                </td>
                <td>
                    $lesgroepinfo[naam]
                </td>
            </tr>
            <tr>
                <td>
                    <button class='dellesgroepen'>Delete</button>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <button class='naamedit'>Edit</button>
                </td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>

