<?php
$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && ($password)) {
    include ('../lib/mainlib.php');
    $login = new login();
    $login->userlogin($username, $password);
} else {

    $msg = "Enter Your Username and Password";
    header("Location:../index.php?uneqmsg=$msg");
}
?>