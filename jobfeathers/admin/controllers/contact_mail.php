<?php

require 'phpmailer/PHPMailerAutoload.php';


$name = $_POST['name'];
$uemal = $_POST['uemail'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];


$mail = new PHPMailer;


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
$mail->Port = 465;                                    // TCP port to connect to
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jobfeathers@gmail.com';        // SMTP username
$mail->Password = '630087392';                          // SMTP password


$mail->setFrom('jobfeathers@gmail.com', 'Job Feathers);
	
$mail->addAddress('jobfeathers@gmail.com');                    // Add a recipient
$mail->addAddress(''jobfeathers@gmail.com'');                                       // Name is optional
$mail->addReplyTo('', '');
$mail->addCC('');
$mail->addBCC('');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject ='Job Feathers Web User Message : '. $subject;
$mail->Body = 'Name :' . $name .'<br/> Subject :'.$subject. '<br/> Email : ' . $uemal. ' <br/> Massage : '.$msg;


if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 

else {

    header("Location:../contact.php?emsg=Thanks Your Message Sent");
}