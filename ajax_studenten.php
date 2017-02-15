<?php
require "session.php";

$value = $_POST['val'];

$result001 = $conn->prepare("SELECT * FROM Student WHERE email = '$value'");

    $result001->execute();

    $row001 = $result001->fetch(PDO::FETCH_ASSOC);

    $studentinfo = $row001;

    
    $result002 = $conn->prepare("SELECT * FROM User WHERE ID = '$studentinfo[User_ID]'");

    $result002->execute();

    $row002 = $result002->fetch(PDO::FETCH_ASSOC);

    $userinfo = $row002;
    
    $result003 = $conn->prepare("SELECT * FROM Opleiding WHERE ID = '$studentinfo[Opleiding_ID]'");

    $result003->execute();

    $row003 = $result003->fetch(PDO::FETCH_ASSOC);

    $opleidinginfo = $row003;

    $resultgetkeuze = $conn->prepare("SELECT username FROM User");

    $resultgetkeuze->execute();

    $rowkeuze = $resultgetkeuze->fetchall(PDO::FETCH_ASSOC);

    $users = $rowkeuze;
    
    $resultgetkeuze = $conn->prepare("SELECT Naam FROM Opleiding");

    $resultgetkeuze->execute();

    $rowkeuze = $resultgetkeuze->fetchall(PDO::FETCH_ASSOC);

    $opleidingen = $rowkeuze;

    
    function ReadyStudentDrop($users){
        $str = "";
        
        $str .= "<select name='users' class='blacktext studentdropdown'><option>Kies de Gebruiker</option>";
        foreach ($users as $row) {
            $str .= "<option value=\"" . $row['username'] . "\">" . $row['username'] . "</option>";
        }
            
        $str .= "</select> &nbsp; &nbsp;";
        return $str;
    }
    
    
    function ReadyStudentDrop2($opleidingen){
        $str = "";
        
        $str .= "<select name='opleidingen' class='blacktext studentdropdown2'><option>Kies de Opleiding</option>";
        foreach ($opleidingen as $row) {
            $str .= "<option value=\"" . $row['Naam'] . "\">" . $row['Naam'] . "</option>";
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
                    <th class='text-left'>Student Nummer</th>
                    <th class='text-left'>Gebruiker</th>
                    <th class='text-left'>Opleiding</th>
                </tr>
            </thead>
             <tbody class='table-hover'>
            <tr>
                <td>
                    $studentinfo[ID]
                </td>
                <td>
                    $studentinfo[email]
                </td>
                <td>
                    $studentinfo[studentnumber]
                </td>
                <td>
                    $userinfo[username]
                </td>
                <td>
                    $opleidinginfo[Naam]
                </td>
            </tr>
            <tr>
                <td>
                    <button class='delstudenten'>Delete</button>
                </td>
                <td>
                    <button class='email'>Edit</button>
                </td>
                <td>
                    <button class='studnumber'>Edit</button>
                </td>
               <td>" .
                   ReadyStudentDrop($users)
                . " </td>
                <td>".
                    ReadyStudentDrop2($opleidingen)
                . "</td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>

