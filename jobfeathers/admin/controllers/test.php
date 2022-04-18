<?php

$employer_email = $_POST['emp_email'];
$ref=  $_POST['ref'];
$subject = $_POST['subject'];
$jobseeker_name =$_POST['uname'];
$jobseeker_email = $_POST['uemail'];
$attachement = $_POST['attachment'];

$cid = $_POST['cid'];

$msg ="Name :".$jobseeker_name." Email :".$jobseeker_email;


// send email
if (mail("$employer_email", "'$subject'",$msg))
{
    header("Location:http://localhost/jobfeathers/admin/vacancies.php?id=$cid&&emsg=Application Sent");
}
 else {
echo "notsent";    
}

?>