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
        if ($user_permissions == 1) {
            echo "<li><a href='dashboard.php' class='selected'>Home</a></li>";
        }
        if ($user_permissions == 2) {
            echo "<li><a href='dashboarddocent.php' class='selected'>Lesgroepen</a></li>";
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
<?php
if ($user_permissions == "2") {
    $result26 = $conn->prepare("SELECT ID FROM Docent WHERE User_ID = $user_id");

    $result26->execute();

    $row26 = $result26->fetch(PDO::FETCH_ASSOC);

    $Docent_id = $row26;


    $result25 = $conn->prepare("SELECT naam FROM Lesgroep WHERE Docent_ID = $Docent_id[ID]");

    $result25->execute();

    $row25 = $result25->fetch(PDO::FETCH_ASSOC);

    $lesgroep_naam = $row25;
    echo "<div id='gekozen_delen'>
            <text style='text-align: center'>";print_r($lesgroep_naam['naam']);
    echo "</text><br>";



}
   ?>
        <link rel='stylesheet' type='text/css' href='/keuzedelen/ajax.css' media='screen' />


<?php
//    print_r($lesgroep_naam);
    $getid = $conn->prepare("SELECT ID FROM Lesgroep WHERE naam = '$lesgroep_naam[naam]'");

    $getid->execute();

    $row28 = $getid->fetch(PDO::FETCH_ASSOC);

    $lesgroep = $row28;

    $getstudent = $conn->prepare("SELECT Student_ID FROM Student_Lesgroep WHERE Lesgroep_ID = $lesgroep[ID]");

    $getstudent->execute();

    $row27 = $getstudent->fetchAll(PDO::FETCH_ASSOC);

    echo "<table class='table-fill'>";
    echo "<thead>";
    echo "  <tr>
                <th>Student</th>
                <th>Behaald</th>
                <th>Bewerk</th>
            </tr>";
    foreach ($row27 as $row) {

        $getemail = $conn->prepare("SELECT email FROM Student WHERE ID = $row[Student_ID]");

        $getemail->execute();

        $row29 = $getemail->fetch(PDO::FETCH_ASSOC);


    echo "<tr><td>";
    print_r($row29['email']);
    echo "<td>Nee</td>";
    echo "<td><button class='namechange'>Edit</button></td>";
    echo "</td></tr>";}
    echo "<tr></tr>";
    echo "</thead>";
    echo "</table>";
    ?>


</body>




</div>

<div id="geheel"></div>
</body>
<footer id="profile">
    &copy; ROCA12 Ede
</footer>
</html>