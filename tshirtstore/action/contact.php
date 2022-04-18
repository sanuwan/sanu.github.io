<?php require_once("../../config/config.php");
require 'PHPMailermaster/src/PHPMailer.php';
require 'PHPMailermaster/src/SMTP.php';
require 'PHPMailermaster/src/Exception.php';
require 'PHPMailermaster/src/OAuth.php';
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<?php


if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($Connection,$_POST['name']);
    $email = mysqli_real_escape_string($Connection,$_POST['email']);
    $message = mysqli_real_escape_string($Connection,$_POST['message']);
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug =2 ;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '';                 // SMTP username
        $mail->Password = '';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($email);
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail ->IsHTML(true);
        $mail ->Subject = $name;
        $mail ->Body = $message;
        $mail ->AddAddress($email);

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    redirect("../contact.php");
}

?>
