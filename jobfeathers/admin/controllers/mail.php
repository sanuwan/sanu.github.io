<?php
require 'PHPMailer/PHPMailerAutoload.php';
include_once ('../lib/mainlib.php');

$employer_email = $_POST['emp_email'];
$ref = $_POST['ref'];
$subject = $_POST['subject'];
$jobseeker_name = $_POST['uname'];
$jobseeker_email = $_POST['uemail'];
$attachement = $_POST['filename'];
$cid = $_POST['cid'];


$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'jobfeathers@gmail.com';
$mail->Password = '630087392';

$mail->setFrom('jobfeathers@gmail.com','jobfeathers');
$mail->addAddress($employer_email);                           
$mail->addAddress('');                                      // Name is optional

$mail->addReplyTo('jobfeathers@gmail.com', '');
$mail->addCC('');
$mail->addBCC('');

$mail->addAttachment('../cv/' . $attachement);  // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Optional name
$mail->isHTML(true);                                        // Set email format to HTML

$mail->Subject = $subject.'(ref: #'.$ref.')';
$mail->Body = 'Applicants Name :' . $jobseeker_name . ' <br/> Applicants Email : ' . $jobseeker_email;

//send the message, check for errors
if (!$mail->send()) {
   echo 'Message could not be sent.'; 
   echo "ERROR: " . $mail->ErrorInfo;
} else {
	if (isset($cid)){
		$hits = new hits();
        $hits->job_apply_count($cid);
        
    }
    header("Location:../views/sucess.php?msg=Application Sent");
}