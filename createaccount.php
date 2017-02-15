<?php
$dbhost     = "92.222.169.67";
$dbname     = "Keuzedelen";
$dbuser     = "root";
$dbpass     = "garage";

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);


    $getemail = $conn->prepare("SELECT email FROM Student WHERE email = '$_POST[email]'");

    $getemail->execute();

    $row400 = $getemail->fetch(PDO::FETCH_ASSOC);

    $doublecheck= $conn->prepare("SELECT username FROM User WHERE username = '$_POST[email]'");

    $doublecheck->execute();

    $rowiets = $doublecheck->fetch(PDO::FETCH_ASSOC);

    if(empty($rowiets)) {


        if (!empty($row400)) {


            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $getpass = "";
            for ($i = 0; $i < 8; $i++) {
                $getpass .= $pass[$i];
            }

            $getuser = $conn->prepare("INSERT INTO User (username,password) VALUES ('$_POST[email]', PASSWORD('$getpass'))");

            $getuser->execute();

            $getid = $conn->prepare("SELECT ID FROM User WHERE username = '$_POST[email]'");

            $getid->execute();

            $rowid = $getid->fetch(PDO::FETCH_ASSOC);

            $updateid = $conn->prepare("UPDATE Student SET User_ID = '$rowid[ID]' WHERE email = '$_POST[email]'");

            $updateid->execute();


            $adress = $_POST["email"];
            if (!empty($_POST["email"])) {
                require 'phpmailer/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'peterphptester@hotmail.com';                 // SMTP username
                $mail->Password = 'P1phptester';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom('peterphptester@hotmail.com', 'Mailer');
                $mail->addAddress($adress);     // Add a recipient
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Keuzedelen Registratie ROCA12';
                    echo $getpass;
                $mail->Body = 'Uw inlognaam: ' . $adress . '<br>' .
                    'Uw wachtwoord: ' . $getpass . "<br>U kunt uw wachtwoord wijzigen zodra u bent ingelogd.";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo '<p>U bent succesvol geregistreerd.</p>';
                    echo 'Uw inloggegevens zijn naar' . ' ' . $adress . ' ' . 'gestuurd.';
                    header("refresh:3;url=index.php");
                }
            } Else {
                echo "There was an error sending your message.";
            }
        }
    }
    else {
        echo "Email niet succesvol geregisteerd. Neem contact op met de beheerder.";
    }
