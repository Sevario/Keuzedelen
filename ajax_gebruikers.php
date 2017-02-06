<?php
require "session.php";

$value = $_POST['val'];

$result001 = $conn->prepare("SELECT * FROM User WHERE username = '$value'");

    $result001->execute();

    $row001 = $result001->fetch(PDO::FETCH_ASSOC);

    $gebruikersinfo = $row001;


$html = "
        <link rel='stylesheet' type='text/css' href='/keuzedelen/ajax.css' media='screen' />
 

<table class='table-fill'>
            <thead>
                <tr>
                    <th class='text-left'>ID</th>
                    <th class='text-left'>Gebruiker</th>
                    <th class='text-left'>Wachtwoord</th>
                    <th class='text-left'>Permissies</th>
                </tr>
            </thead>
             <tbody class='table-hover'>
            <tr>
                <td>
                    $gebruikersinfo[ID]
                </td>
                <td>
                    $gebruikersinfo[username]
                </td>
                <td>
                    
                </td>
                <td>
                    $gebruikersinfo[permission]
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <button class='usernameedit'>Edit</button>
                </td>
                <td>
                    <button class='passwordedit'>Edit</button>
                </td>
                <td>
                </td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>

