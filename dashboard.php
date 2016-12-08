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
        <title>Your Home Page</title>
</head>
<body>

    <div id="profile">

        <b id="welcome">Welcome : <i><?php echo $login_session,  " " . $opleiding_naam; ?></i></b>
    </div>
    <div id="menu">
        <ul>
            <li><a href="dashboard.php" class="selected">Home</a></li>
            <li><a>Account</a></li>
            <li><a>Beheer(Admin only)</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <div id="myProgress">
                <div id="myBar">
                    <div id="label">1/3</div>
                </div>
            </div>
        </ul>


    </div>
    <div id="geheel">
        <div class="keuzedeel" id="test">

            <button>Naam keuzedeel</button><h2>Klik hier voor informatie</h2><button class="inschrijven">Inschrijven</button>
        </div>
        <div class="keuzedeel" id="test">
            <button>Naam keuzedeel</button><h2>Klik hier voor informatie</h2><button class="inschrijven">Inschrijven</button>
        </div>
        <div class="keuzedeel" id="test">
            <button>Naam keuzedeel</button><h2>Klik hier voor informatie</h2><button class="inschrijven">Inschrijven</button>
        </div>
        <div class="keuzedeel" id="test">
            <button>Naam keuzedeel</button><h2>Klik hier voor informatie</h2><button class="inschrijven">Inschrijven</button>
        </div>
        <div class="keuzedeel" id="test">
            <button>Naam keuzedeel</button><h2>Klik hier voor informatie</h2><button class="inschrijven">Inschrijven</button>
        </div>
        <div class="keuzedeel" id="test">
            <button>Naam keuzedeel</button><h2>Klik hier voor informatie</h2><button class="inschrijven">Inschrijven</button>
        </div>



</body>
</html>