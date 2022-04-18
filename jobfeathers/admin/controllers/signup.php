<?php

include ('../lib/mainlib.php');

$name = $_POST['name'];
$comname = $_POST['comname'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$passr = $_POST['passr'];
$phone = $_POST['phone'];
$web = $_POST['web'];
$facebook = $_POST['facebook'];
$date = date("Y/m/d");

if ($pass == $passr) {

    $table = "users";
    $user_group = 2;
    $header = "../index.php";

    $rows = "(name, company_name, company_address1,company_address2,email,password,phone,facebook,website,user_group,date)";
    $values = "('$name', '$comname','$add1','$add2','$email','$pass','$phone','$web','$facebook', '$user_group', '$date')";

    $in = new user();

    $in->insert($table, $rows, $values, $email, $header);
} else {
    $msg = "Your Passwords are Not Matching";
    header("Location:../views/signup.php?msg=$msg");
}
?>