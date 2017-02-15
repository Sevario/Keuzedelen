<?php
    include('session.php');

    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: index.php");

}
?>
<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="/keuzedelen/bootstrap/css/bootstrap.min.css"  />
        <link rel="stylesheet" type="text/css" href="/keuzedelen/style.css" media="screen" />
        <script src="js/jquery.js"></script>
        <script src="js/changes.js"></script>
        <title>Dashboard</title>
</head>
<body>
    <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $login_session?></i></b> <?php  if ($user_permissions == "1") {echo $opleiding_naam;} ?>
    </div>
    <div id="menu">
        <ul>
            <?php
            if ($user_permissions == 2) {
                header("Location: dashboarddocent.php");
            }
            if ($user_permissions == 1) {
                echo "<li><a href='dashboard.php' class='selected'>Home</a></li>";
            }
            if ($user_permissions == 2) {
                echo "<li><a href='dashboarddocent.php' class='selected'>Home</a></li>";
            }
            if ($user_permissions == 3) {
            header("Location: beheer.php");
            }
            echo "<li><a href='account.php'>Account</a></li>";

?>
            <li><a href="logout.php">Log Out</a></li>
            <br>
            <div id="myProgress">
                <div id="myBar">
                    <div id="label">1/3</div>
                </div>
            </div>

        </ul>

    </div>
    <div id="geheel">
        <?php

// SET DATUM VOOR INSCHRIJF DEADLINE!!!

$date = new DateTime('2017-07-20');
$now = new DateTime();

if($date > $now) {

    if ($user_permissions == "1") {
        foreach ($keuzedelen as $keuzedeel) {
            $result4 = $conn->prepare("SELECT * FROM Keuzedeel WHERE ID = :keuzedeel");

            $result4->execute(array(':keuzedeel' => $keuzedeel["Keuzedeel_ID"]));

            $row4 = $result4->fetch(PDO::FETCH_ASSOC);

            $keuzedelen_info = $row4;

            $docent = $keuzedelen_info['Docent_ID'];

            $result5 = $conn->prepare("SELECT * FROM Docent WHERE ID = $docent");

            $result5->execute(array(':keuzedeel' => $keuzedeel["Keuzedeel_ID"]));

            $row5 = $result5->fetch(PDO::FETCH_ASSOC);

            $docent_info = $row5;


//                    $_SESSION ["keuzedelenid"] = $keuzedelen_info['ID'];

            echo ' <div class="keuzedeel" id="test">
                <button>' . $keuzedelen_info['Name'] . '</button>
                <h2 id="dashboardh2">Klik hier voor informatie</h2>
                <h1>' . $keuzedelen_info['Name'] . '</h1>
                <p>Minimale studenten nodig om een klas te vormen: ' . $keuzedelen_info['MinStudents'] . '</p>
                <p>Maximale studenten per klas: ' . $keuzedelen_info['MaxStudents'] . '</p>
                <p>Informatie over het geselecteerde keuzedeel:<br> ' . $keuzedelen_info['Information'] . '</p>
                <p>Keuzedeeel code: ' . $keuzedelen_info['Code'] . '</p>
                <p>Informatie over docent:<br> Afkorting:' . $docent_info['abbreviation'] . '<br>E-mail:' . $docent_info['email'] . '</p>
                <a href="inschrijven.php?kd=' . $keuzedelen_info['ID'] . '" class="btn btn-lg btn-default btnwidth inschrijven">Inschrijven</a>
                </div>';
        }

    }
}
else {
    Echo "<div id='inschrijffout 'style='
                                    background-color: black;
                                    width: auto;
                                    height: auto;
                                    padding: 10px;
                                    border: 1px solid white;
                                    border-radius: 2px 2px 2px 2px;
                                    margin-left: 35%;
                                    margin-right: 40%;
                                    margin-top: 10%;'><h5 style='color: white;'>De inschrijfperiode is voorbij, u kunt u niet meer inschrijven voor de keuzedelen.</h5></div>";
}
        ?>
       



</body>
<footer id="profile">
    &copy; ROCA12 Ede
</footer>
</html>