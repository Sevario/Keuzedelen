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
<?php
if ($user_permissions == "2"){
    echo "<div id='gekozen_delen'>
            <text style='text-align: center'>Klassen</text><br>

    </div>";
}
?>
<div id="geheel">
</body>
<footer id="profile">
    &copy; ROCA12 Ede
</footer>
</html>