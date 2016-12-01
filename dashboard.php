<?php
    include('session.php');
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
        <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <b id="logout" class="btn btn-default"><a href="logout.php">Log Out</a></b>
    </div>
    <div id="geheel">
        <div class="keuzedeel" id="test">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>
        <div class="keuzedeel">
            <button>Get information</button>
        </div>

</body>
</html>