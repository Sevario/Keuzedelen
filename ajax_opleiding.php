<?php
require "session.php";

$value = $_POST['val'];

$result001 = $conn->prepare("SELECT * FROM Opleiding WHERE Naam = '$value'");

    $result001->execute();

    $row001 = $result001->fetch(PDO::FETCH_ASSOC);

    $opleidinginfo = $row001;

    $result = $conn->prepare("SELECT Keuzedeel_ID FROM Keuzedeel_Opleiding WHERE Opleiding_ID = $opleidinginfo[ID]");
    
    $result->execute();
    
    $rowkeuzes = $result->fetchall(2);
    
    $result5 = $conn->prepare("SELECT Name FROM Keuzedeel");
    
    $result5->execute();
    
    $rowkeuzes5 = $result5->fetchall(2);
    
    $result2 = $conn->prepare("SELECT COUNT(Keuzedeel_ID) FROM Keuzedeel_Opleiding WHERE Opleiding_ID = $opleidinginfo[ID]");
    
    $result2->execute();
    
    $rowkeuzes2 = $result2->fetch(2);
    
    $keuzeamount = $rowkeuzes2['COUNT(Keuzedeel_ID)'];
    
    $keuzedelen = "";
    
    $i=0;
    
    for ($i=0;$i<$keuzeamount;$i++){
       $temp = $rowkeuzes[$i]['Keuzedeel_ID'];
       
    $result3 = $conn->prepare("SELECT Name FROM Keuzedeel WHERE ID = $temp");
    
    $result3->execute();
    
    $rowkeuzes3 = $result3->fetch(2);
    $keuzenamen[] = $rowkeuzes3['Name'];
    $keuzedelen .= $rowkeuzes3['Name'];
    $keuzedelen .= ", ";
    
    }
     function ReadyOpleidingDrop($keuzeamount, $keuzenamen){
        $str = "";
        
        $str .= "<select name='kdelen' class='blacktext keuzedeletedropdown'><option>Kies het Keuzedeel</option>";
        for ($i=0;$i<$keuzeamount;$i++){
            $str .= "<option value=\"" . $keuzenamen[$i] . "\">" . $keuzenamen[$i] . "</option>";
        }
            
        $str .= "</select> &nbsp; &nbsp;";
        return $str;
    }
    
    function ReadyOpleidingDrop2($rowkeuzes5){
        $str = "";
        
        $str .= "<select name='docenten' class='blacktext keuzeadddropdown'><option>Kies het Keuzedeel</option>";
        foreach ($rowkeuzes5 as $row) {
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
                    <th class='text-left'>Keuzedelen</th>
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
                <td>
                    $keuzedelen
                </td>
            </tr>
            <tr>
                <td>
                    <button class='delopleidingen'>Delete</button>
                </td>
                <td>
                    <button class='opleidingnaam'>Edit</button>
                </td>
                <td>
                Verwijderen: " . ReadyOpleidingDrop($keuzeamount, $keuzenamen) . " <br>
                Toevoegen: ". ReadyOpleidingDrop2($rowkeuzes5) . "
                </td>
            </tr>
        </table>
        




        ";






echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>

