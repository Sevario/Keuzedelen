<?php
require "session.php";

$value = $_POST['val'];

$result001 = $conn->prepare("SELECT * FROM Opleiding WHERE Naam = '$value'");

    $result001->execute();

    $row001 = $result001->fetch(PDO::FETCH_ASSOC);

    $opleidinginfo = $row001;

$html = "
        <link rel='stylesheet' type='text/css' href='/keuzedelen/ajax.css' media='screen' />
 

<table class='table-fill'>
            <thead>
                <tr>
                    <th class='text-left'>ID</th>
                    <th class='text-left'>Naam</th>
                </tr>
            </thead>
             <tbody class='table-hover'>
            <tr>
                <td>
                    $opleidinginfo[ID]
                </td>
                <td>
                    $opleidinginfo[Naam]
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <button class='opleidingnaam'>Edit</button>
                </td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>

