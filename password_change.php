<?php
    include('session.php');
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: index.php");
    }


    
if (isset($_POST['submit'])){
		
		//check fields
		
		$oldpassword = $_POST['password'];
		$newpassword = $_POST['newpassword'];
		$confirmnewpassword = $_POST['confirmnewpassword'];

                

                $checkpass = $conn->prepare("SELECT password FROM User WHERE password = PASSWORD('$oldpassword')");
                $checkpass->execute();
                $rowcheckpass = $checkpass->fetch(2);
                
		if (!empty($rowcheckpass)) {
                 if ($newpassword == $confirmnewpassword) {
                    $newpass = $conn->prepare("UPDATE User SET password=PASSWORD('$newpassword') WHERE ID = $user_id");
                    $newpass->execute();
                    echo "Je wachtwoord is succesvol veranderd. <br>";
                    echo "Log in met je nieuwe wachtwoord."; header("refresh:4;url=logout.php");
                    }
                    else {
                       echo "Je nieuwe wachtwoord en het herhaal wachtwoord zijn niet hetzelfde. Probeer opnieuw a.u.b. <br>";
                       echo "Je wordt teruggezonden naar de vorige pagina."; header("refresh:4;url=account.php");
                    }
                 }
                 else {
                     echo "Het ingevoerde huidig wachtwoord klopt niet, probeer opnieuw a.u.b. <br>";
                     echo "Je wordt teruggezonden naar de vorige pagina."; header("refresh:4;url=account.php");
                 }
                }
?>