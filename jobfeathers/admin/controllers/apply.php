<?php

$ref = $_POST['ref'];
$subject = $_POST['subject'];
$uname = $_POST['uname'];
$uemail = $_POST['uemail'];
//$cv = $_POST['cv'];

$date = date("Y/m/d");

$to = "jobfeathers@gmail.com";
$header = "Content-Transfer-Encoding: base64\r\n";
if (mail($to, $subject, "", $header)) {
    echo "email sent";
} else {
    echo "email not sent";
}