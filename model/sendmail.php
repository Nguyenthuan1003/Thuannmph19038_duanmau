<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions

function sendmail($user,$email,$passwords,$title,$title2){
$mail = new PHPMailer(true);
// f d e d y x f e h l u f l p x l
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->CharSet = 'utf8';                                    // Tiếng việt
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'thuannmph19038@fpt.edu.vn';                     //SMTP username
    $mail->Password   = 'fdedyxfehluflpxl';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('thuannmph19038@fpt.edu.vn', "$title2");
    $mail->addAddress("$email","$user");     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('thuannmph19038@fpt.edu.vn', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$title";
    $mail->Body    = "$passwords";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>