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
                    
                </td>
                <td>
                    <button class='namechange'>Test</button>
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    ]
                </td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>
