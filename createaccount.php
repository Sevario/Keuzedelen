<?php
$adress = $_POST["email"];
if (!empty($_POST["email"])) 
{
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
    $mail->Body    = 'Hallo,<br><br> je wachtwoord is: <br><b>wachtwoord</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'A message has been sent to ' . $adress . ".";
    }
}

Else {
    echo "There was an error sending your message.";
}
