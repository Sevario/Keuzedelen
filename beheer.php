<?php
    include('session.php');
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: index.php");
    }
    if ($user_permissions != 3) { //if not admin, redirect to login page.
        header ("Location: index.php");
    }
    
    echo "Successfully logged in as admin.";