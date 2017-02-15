<?php
require "session.php";

$value = $_POST['val'];

$result001 = $conn->prepare("SELECT * FROM Docent WHERE abbreviation = '$value'");

    $result001->execute();

    $row001 = $result001->fetch(PDO::FETCH_ASSOC);

    $docentinfo = $row001;

    
    $result002 = $conn->prepare("SELECT * FROM User WHERE ID = '$docentinfo[User_ID]'");

    $result002->execute();

    $row002 = $result002->fetch(PDO::FETCH_ASSOC);

    $userinfo = $row002;

    $resultgetkeuze = $conn->prepare("SELECT username FROM User");

    $resultgetkeuze->execute();

    $rowkeuze = $resultgetkeuze->fetchall(PDO::FETCH_ASSOC);

    $users = $rowkeuze;
    
    
    function ReadyDocentDrop($users){
        $str = "";
        
        $str .= "<select name='users' class='blacktext docentdropdown'><option>Kies de Gebruiker</option>";
        foreach ($users as $row) {
            $str .= "<option value=\"" . $row['username'] . "\">" . $row['username'] . "</option>";
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
                    <th class='text-left'>Email</th>
                    <th class='text-left'>Afkorting</th>
                    <th class='text-left'>Gebruiker</th>
                </tr>
            </thead>
             <tbody class='table-hover'>
            <tr>
                <td>
                    $docentinfo[ID]
                </td>
                <td>
                    $docentinfo[email]
                </td>
                <td>
                    $docentinfo[abbreviation]
                </td>
                <td>
                    $userinfo[username]
                </td>
            </tr>
            <tr>
                <td>
                    <button class='deldocenten'>Delete</button>
                </td>
                <td>
                    <button class='docemail'>Edit</button>
                </td>
                <td>
                    <button class='abbreviation'>Edit</button>
                </td>
                <td>". 
                ReadyDocentDrop($users)
            . " </td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>

