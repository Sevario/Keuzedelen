<?php
require "session.php";

$value = $_POST['val'];

$result001 = $conn->prepare("SELECT * FROM User WHERE username = '$value'");

    $result001->execute();

    $row001 = $result001->fetch(PDO::FETCH_ASSOC);

    $gebruikersinfo = $row001;

    $permissiongeb = "";
    
if ($gebruikersinfo['permission'] == '1'){
    $permissiongeb = 'Student';
}

if ($gebruikersinfo['permission'] == '2'){
    $permissiongeb = 'Docent';
}

if ($gebruikersinfo['permission'] == '3'){
    $permissiongeb = 'Beheerder';
}



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
                    $permissiongeb
                </td>
            </tr>
            <tr>
                <td>
                    <button class='delgebruikers'>Delete</button>
                </td>
                <td>
                    <button class='usernameedit'>Edit</button>
                </td>
                <td>
                    <button class='passwordedit'>Edit</button>
                </td>
                <td>
                <select name='gebruikers' class='blacktext gebruikersdropdown'>
                <option>Kies de Permissies</option>
                <option value='1'>Student</option>
                <option value='2'>Docent</option>
                </td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>

