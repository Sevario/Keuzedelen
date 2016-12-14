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


        <form method="POST" action="password_change.php">
            <text>Change password</text>
            <table>
                <tr>
                    <td>Enter your username:</td>
                    <td><input type="username" size="10" name="username"></td>
                </tr>
                <tr>
                    <td>Enter your existing password:</td>
                    <td><input type="password" size="10" name="password"></td>
                </tr>
                <tr>
                    <td>Enter your new password:</td>
                    <td><input type="password" size="10" name="newpassword"></td>
                </tr>
                <tr>
                    <td>Re-enter your new password:</td>
                    <td><input type="password" size="10" name="confirmnewpassword"></td>
                </tr>
            </table>
            <button class="btn btn-lg btn-default btnwidth changepw" style="width: 70%; margin: 5px;">submit</button>
        </form>



    </div>


</body>
<footer id="profile">
    &copy; ROCA12 Ede
</footer>
</html>