<?php
include('session.php');
if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: index.php");
}
if ($user_permissions != 1) { //if not user, redirect to login page.
    header ("Location: index.php");
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
        <li><a href="dashboard.php">Home</a></li>
        <?php
        if ($user_permissions == 1) {
            echo " <li><a href='account.php' class='selected'>Account</a></li>";
        }
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
    <div id="changepw">


        <form class="changepw" method="POST" action="password_change.php">
            <text>Verander je wachtwoord</text>
            <table>
                <tr>
                    <td>Gebruikersnaam:</td>
                    <td><?php
                        echo "$student_info[email]";
                        ?></td>
                </tr>
                <tr>
                    <td>Huidig wachtwoord:</td>
                    <td><input class="pwchange" type="password" size="10" name="password"></td>
                </tr>
                <tr>
                    <td>Nieuw wachtwoord:</td>
                    <td><input class="pwchange" type="password" size="10" name="newpassword"></td>
                </tr>
                <tr>
                    <td>Herhaal nieuw wachtwoord:</td>
                    <td><input class="pwchange" type="password" size="10" name="confirmnewpassword"></td>
                </tr>
            </table>
            <button class="btn btn-lg btn-default btnwidth wijzigww" style="width: 70%; margin: 5px;" name="submit" type="submit">submit</button>
        </form>



    </div>

    <?php

    if ($user_permissions == "1"){
    echo "{<div id='gekozen_delen'>
            <text style='text-align: center'>Gekozen delen</text><br>";
        foreach ($keuzedeel_id as $naam_keuzedeel){

            $result8 = $conn->prepare("SELECT Name FROM Keuzedeel WHERE ID = :keuzedeel_id");

            $result8->execute(array(':keuzedeel_id' => $naam_keuzedeel["Keuzedeel_ID"]));

            $row8 = $result8->fetch(PDO::FETCH_ASSOC);
            //echo "<pre>";var_dump($row8);echo "</pre>";
            echo " - " . $row8["Name"];
            echo "<br>";
        }
    echo "</div>";

    }


    ?>



</body>
<footer id="profile">
    &copy; ROCA12 Ede
</footer>
</html>