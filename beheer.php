<?php
    include('session.php');
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: index.php");
    }
    if ($user_permissions != 3) { //if not admin, redirect to login page.
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
            <li><a href="dashboard.php" class="selected">Home</a></li>
            <li><a>Account</a></li>
            <?php
            if ($user_permissions == 3) {
            echo "<li><a href='beheer.php'>Beheer(Admin only)</a></li>";
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

        
    <div id="selectie">
        <div class="keuzedelen_beheer">
        <h2>Keuzedelen</h2>
        </div>
    
    
    </div>
        
        
</body>
<footer id="profile">
    &copy; ROCA12 Ede
</footer>
</html>