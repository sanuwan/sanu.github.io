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
if (isset($_POST["user"])) {
    $Username = mysqli_real_escape_string($Connection,$_POST["username"]);
    $email = mysqli_real_escape_string($Connection,$_POST["email"]);
    $Password = mysqli_real_escape_string($Connection,$_POST["password"]);
    $ConfirmPassword = mysqli_real_escape_string($Connection,$_POST["confirmpassword"]);
    $validation = 1234567890;
    $active = 0;
    if (empty($Username)||empty($Password)||empty($ConfirmPassword) ) {
        $_SESSION["ErrorMessage"] = "All Fields must  be filled out";
        redirect("../Registration.php");
    }
    else if(strlen($Password)<4) {
        $_SESSION["ErrorMessage"] = "Atleast 4 Characters For Password are Required";
        redirect("../Registration.php");
    }
    else if($Password!==$ConfirmPassword) {
        $_SESSION["ErrorMessage"] = "Password / Confirm Password does not match";
        redirect("../Registration.php");}
    else {
        global $Connection;
        $Query = "INSERT INTO customer(username,email,password,validation_code,active) VALUES('$Username','$email','$Password','$validation','$active')";
        $Execute = mysqli_query($Connection,$Query);
        $subject = "Activate Account";
        $msg = "Please click the link below to activate your Account
        http://localhost/tshirtstoreonline/tshirtstore/thank_you.php?email=$email&code=$validation";
        $headers = "From: noreply@gmail.com";
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
            $mail ->Subject = $subject;
            $mail ->Body = $msg;
            $mail ->AddAddress($email);

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        if($Execute){
            $_SESSION["SuccessMessage"]= "Admin Added Successfully";
            redirect("../email.php");
        }
        else{
            $_SESSION["ErrorMessage"] = "Admin failed to Add";
            redirect("../Registration.php");
        }
    }


}
?>
